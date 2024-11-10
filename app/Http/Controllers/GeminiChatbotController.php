<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session; // Importar la fachada de Session

class GeminiChatbotController extends Controller
{
    public function handle(Request $request)
    {
        $message = $request->input('message');

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

        // Agregar el nuevo mensaje del usuario al historial
        $chatHistory[] = [
            'role' => 'user',
            'parts' => [
                [
                    'text' => $message,
                ],
            ],
        ];

        // Preparar el cuerpo de la solicitud con el historial completo
        $requestBody = [
            'contents' => $chatHistory,
            // Puedes agregar 'generationConfig' u otros parámetros si lo deseas
        ];

        // Registrar la solicitud para depuración
        Log::info('Solicitud a Gemini:', ['url' => $url = "https://generativelanguage.googleapis.com/v1beta/models/{$model}:generateContent?key={$apiKey}", 'body' => $requestBody]);

        try {
            // Realizar la solicitud HTTP POST a la API de Gemini
            // Realiza la solicitud HTTP POST a la API de Gemini sin verificar SSL (solo en desarrollo)
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

    public function resetHistory(Request $request)
    {
        Session::forget('gemini_chat_history');
        return response()->json(['message' => 'Historial de conversación reiniciado.']);
    }

}
