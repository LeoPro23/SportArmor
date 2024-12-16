<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use App\Models\Categoria;
use App\Models\Chat;
use App\Models\Message;

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

        // Obtener o crear el chat actual
        $chatId = Session::get('gemini_chat_id');

        if ($chatId) {
            $chat = Chat::find($chatId);
            // Verificar si el chat existe y está activo
            if (!$chat || $chat->ended_at) {
                $chat = $this->createNewChat($user);
            }
        } else {
            $chat = $this->createNewChat($user);
        }

        // Guardar el mensaje del usuario en la base de datos
        $userMessage = Message::create([
            'chat_id' => $chat->id,
            'sender' => 'user',
            'message' => $message,
        ]);

        // Recuperar el historial de la conversación desde la base de datos
        $chatHistory = $chat->messages()->orderBy('created_at')->get()->map(function ($msg) {
            return [
                'role' => $msg->sender === 'user' ? 'user' : 'assistant',
                'parts' => [
                    [
                        'text' => $msg->message,
                    ],
                ],
            ];
        })->toArray();

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

        // Limitar el historial a las últimas 25 interacciones (usuario y modelo)
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
            //])->post($url, $requestBody);
            
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

                // Guardar la respuesta del bot en la base de datos
                $botMessage = Message::create([
                    'chat_id' => $chat->id,
                    'sender' => 'bot',
                    'message' => $reply,
                ]);

                // Actualizar el historial de la conversación
                $chatHistory[] = [
                    'role' => 'assistant',
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
     * Crea un nuevo chat para el usuario.
     *
     * @param \App\Models\User $user
     * @return \App\Models\Chat
     */
    private function createNewChat($user)
    {
        $chat = Chat::create([
            'user_id' => $user->id,
            'started_at' => now(),
        ]);

        // Guardar el chat_id en la sesión
        Session::put('gemini_chat_id', $chat->id);

        return $chat;
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
        $contextualInfo = "Eres un chatbot de atención al cliente de Sport Armor. Utiliza la siguiente información para ayudar al usuario de manera precisa y eficiente. Toda esta información está protegida por nuestro sistema de seguridad y autenticación, y solo se usa con fines de atención al cliente.\n";

        // Siempre incluir información básica del usuario
        $contextualInfo .= "Nombre del usuario: {$user->name}. Correo electrónico: {$user->email}.\n";

        // Detectar intención del usuario para incluir contexto específico
        $messageLower = strtolower($message);

        // Si el usuario pregunta sobre compras, incluir historial de compras
        if (strpos($messageLower, 'compras') !== false || strpos($messageLower, 'historial') !== false) {
            $ventas = $user->ventas()->with(['detalles.producto', 'detalles.talla'])->latest()->take(5)->get();
            if ($ventas->isNotEmpty()) {
                $comprasText = "Historial de compras reciente:\n";
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
                $contextualInfo .= $comprasText . "\n";
            } else {
                $contextualInfo .= "El usuario no tiene compras registradas.\n";
            }
        }

        // Si el usuario pregunta sobre productos o categorías, incluir información relevante
        if (strpos($messageLower, 'producto') !== false || strpos($messageLower, 'categoría') !== false || strpos($messageLower, 'talla') !== false || strpos($messageLower, 'stock') !== false) {
            // Recuperar categorías y subcategorías desde el cache
            $categorias = Cache::remember('categorias_completas', 60, function () {
                return Categoria::with(['subcategorias.productos'])->get();
            });

            // Estructurar la información de categorías y productos
            $categoriasText = "Información de categorías y productos disponibles:\n";
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

            $contextualInfo .= $categoriasText . "\n";
        }

        return $contextualInfo;
    }

    /**
     * Finaliza el chat actual.
     *
     * @param \App\Models\Chat $chat
     * @return void
     */
    private function endChat($chat)
    {
        $chat->ended_at = now();
        $chat->save();

        // Eliminar el chat_id de la sesión
        Session::forget('gemini_chat_id');
    }

    /**
     * Método para reiniciar el historial de conversación.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function resetHistory(Request $request)
    {
        $chatId = Session::get('gemini_chat_id');

        if ($chatId) {
            $chat = Chat::find($chatId);
            if ($chat && !$chat->ended_at) {
                $this->endChat($chat);
            }
        }

        // Crear un nuevo chat
        $newChat = $this->createNewChat(Auth::user());

        // Devolver la respuesta
        return response()->json(['message' => 'Historial de conversación reiniciado.']);
    }

    public function rateChat(Request $request)
    {
        $user = Auth::user();
        if (!$user) {
            return response()->json(['message' => 'No autorizado.'], 401);
        }

        $valoracion = $request->input('valoracion');

        // Validar la valoración: debe estar entre 1 y 5
        if (!in_array($valoracion, [1,2,3,4,5])) {
            return response()->json(['message' => 'Valoración inválida'], 400);
        }

        // Obtener el chat actual
        $chatId = Session::get('gemini_chat_id');
        if (!$chatId) {
            return response()->json(['message' => 'No hay un chat activo'], 404);
        }

        $chat = Chat::find($chatId);
        if (!$chat) {
            return response()->json(['message' => 'No se encontró el chat'], 404);
        }

        // Buscar la valoración en la tabla valoraciones
        $valoracionRecord = \App\Models\Valoracion::where('valor', $valoracion)->first();
        if (!$valoracionRecord) {
            return response()->json(['message' => 'No se encontró el registro de la valoración'], 404);
        }

        // Asignar la valoración al chat y finalizarlo
        $chat->valoracion_id = $valoracionRecord->id;
        $chat->ended_at = now();
        $chat->save();

        // Reiniciar el chat
        Session::forget('gemini_chat_id');
        // Opcional: Crear un nuevo chat si así lo deseas:
        // $newChat = $this->createNewChat($user);

        return response()->json(['message' => 'Valoración guardada y chat finalizado.']);
    }
}
