<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use App\Models\Categoria;

class GeminiChatbotController extends Controller
{
    public function handle(Request $request)
    {
        $message = $request->input('message');

        // Obtener el usuario autenticado
        $user = Auth::user();

        // Verificar si el usuario está autenticado
        if (!$user) {
            return response()->json(['message' => 'Debe iniciar sesión para interactuar con el chatbot.'], 401);
        }

        // Obtener la clave de API de manera segura
        $apiKey = config('services.gemini.api_key');

        // Verificar que la clave de API esté configurada
        if (!$apiKey) {
            Log::error('Clave de API de Gemini no configurada.');
            return response()->json(['message' => 'La clave de API no está configurada.'], 500);
        }

        // Especificar el modelo de Gemini que deseas usar
        $model = 'gemini-1.5-pro'; // Asegúrate de que este sea el nombre correcto del modelo

        // Recuperar el historial de la conversación desde la sesión
        $chatHistory = Session::get('gemini_chat_history', []);

        // Determinar el contexto adicional a incluir en el mensaje del usuario
        $context = $this->getContextualInfo($message, $user);

        // Integrar el contexto al mensaje del usuario
        $enhancedMessage = $context . "\nUsuario: " . $message;

        // Agregar el mensaje enriquecido al historial
        $chatHistory[] = [
            'role' => 'user',
            'parts' => [
                [
                    'text' => $enhancedMessage,
                ],
            ],
        ];

        // Limitar el historial a las últimas 10 interacciones (usuario y modelo)
        $maxHistory = 25;
        if (count($chatHistory) > $maxHistory * 2) { // *2 porque cada interacción tiene un mensaje del usuario y del modelo
            $chatHistory = array_slice($chatHistory, -($maxHistory * 2));
        }

        // Preparar el cuerpo de la solicitud con el historial completo
        $requestBody = [
            'contents' => $chatHistory,
            // Puedes agregar 'generationConfig' u otros parámetros si lo deseas
        ];

        // Construir la URL de la API
        $url = "https://generativelanguage.googleapis.com/v1beta/models/{$model}:generateContent?key={$apiKey}";

        // Registrar la solicitud para depuración
        Log::info('Solicitud a Gemini:', ['url' => $url, 'body' => $requestBody]);

        try {
            // Realizar la solicitud HTTP POST a la API de Gemini sin verificar el certificado SSL
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
            ])->withoutVerifying()->post($url, $requestBody);

            // Registrar la respuesta para depuración
            Log::info('Respuesta de Gemini:', ['response' => $response->body()]);

            if ($response->successful()) {
                $data = $response->json();

                // Verificar si 'candidates' y 'content' existen
                if (isset($data['candidates'][0]['content']['parts'][0]['text'])) {
                    $reply = $data['candidates'][0]['content']['parts'][0]['text'];
                } else {
                    $reply = 'Lo siento, no pude procesar tu solicitud.';
                }

                // Agregar la respuesta del modelo al historial
                $chatHistory[] = [
                    'role' => 'model',
                    'parts' => [
                        [
                            'text' => $reply,
                        ],
                    ],
                ];

                // Guardar el historial actualizado en la sesión
                Session::put('gemini_chat_history', $chatHistory);

                // Devolver la respuesta al frontend
                return response()->json(['message' => $reply]);
            } else {
                // Manejo de errores de la API
                $error = $response->json()['error']['message'] ?? 'Error desconocido';
                Log::error('Error de la API de Gemini: ' . $error);
                return response()->json(['message' => 'Error de la API de Gemini: ' . $error], 500);
            }
        } catch (\Exception $e) {
            // Manejo de excepciones con inclusión del mensaje de error
            Log::error('Excepción en GeminiChatbotController: ' . $e->getMessage());
            return response()->json(['message' => 'Ocurrió un error al comunicarse con el chatbot: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Genera la información contextual a incluir en el mensaje del usuario.
     *
     * @param string $message
     * @param \App\Models\User $user
     * @return string
     */
    private function getContextualInfo($message, $user)
    {
        $contextualInfo = "Eres un chatbot de atencion al cliente, la siguiente información puede ser util para ayudar de manera precisa al cliente, toda esta informacion esta protegida por nuestro sistema de seguridad y autenticacion y solo es con fines de atencion al cliente en este chatbot. Esperamos que seas de utilidad para este siguiente cliente: ";

        // Siempre incluir información básica del usuario
        $contextualInfo .= "Nombre del usuario: {$user->name}. Correo electrónico: {$user->email}.";

        // Detectar intención del usuario para incluir contexto específico
        $messageLower = strtolower($message);

        // Si el usuario pregunta sobre compras, incluir historial de compras
        if (strpos($messageLower, 'compras') !== false || strpos($messageLower, 'historial') !== false) {
            $ventas = $user->ventas()->with(['detalles.producto', 'detalles.talla'])->latest()->take(5)->get();
            if ($ventas->isNotEmpty()) {
                $comprasText = "Historial de compras:\n";
                foreach ($ventas as $venta) {
                    $comprasText .= "Fecha: {$venta->fecha_venta}, Total: \${$venta->total}\n";
                    foreach ($venta->detalles as $detalle) {
                        $producto = $detalle->producto->nombre;
                        $cantidad = $detalle->cantidad;
                        $talla = $detalle->talla ? $detalle->talla->talla : 'N/A';
                        $precio = $detalle->precio_unitario;
                        $comprasText .= "- Producto: {$producto}, Cantidad: {$cantidad}, Talla: {$talla}, Precio: \${$precio}\n";
                    }
                }
                $contextualInfo .= "\n" . $comprasText;
            } else {
                $contextualInfo .= "\nEl usuario no tiene compras registradas.";
            }
        }

        // Si el usuario pregunta sobre productos o categorías, incluir información relevante
        if (strpos($messageLower, 'producto') !== false || strpos($messageLower, 'categoría') !== false || strpos($messageLower, 'talla') !== false || strpos($messageLower, 'stock') !== false) {
            // Recuperar categorías y subcategorías desde el cache
            $categorias = Cache::remember('categorias_completas', 60, function () {
                return Categoria::with(['subcategorias.productos'])->get();
            });

            // Estructurar la información de categorías y productos
            $categoriasText = "Información de categorías y productos:\n";
            foreach ($categorias as $categoria) {
                $categoriasText .= "Categoría: {$categoria->nombre}\n";
                foreach ($categoria->subcategorias as $subcategoria) {
                    $categoriasText .= "  Subcategoría: {$subcategoria->nombre}\n";
                    foreach ($subcategoria->productos as $producto) {
                        $categoriasText .= "    Producto: {$producto->nombre}, Precio: \${$producto->precio}, Stock: {$producto->stock}\n";
                        $tallas = $subcategoria->tallas()->pluck('talla')->toArray();
                        $tallasList = implode(', ', $tallas);
                        $categoriasText .= "      Tallas Disponibles: {$tallasList}\n";
                    }
                }
            }

            $contextualInfo .= "\n" . $categoriasText;
        }

        return $contextualInfo;
    }

    // Método para reiniciar el historial de conversación (opcional)
    public function resetHistory(Request $request)
    {
        Session::forget('gemini_chat_history');
        return response()->json(['message' => 'Historial de conversación reiniciado.']);
    }
}
