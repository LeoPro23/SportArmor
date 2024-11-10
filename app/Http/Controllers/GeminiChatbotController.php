<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class GeminiChatbotController extends Controller
{
    public function handle(Request $request)
    {
        $message = $request->input('message');

        // Obtiene la clave de API de manera segura
        $apiKey = config('services.gemini.api_key');

        // Verifica que la clave de API esté configurada
        if (!$apiKey) {
            Log::error('Clave de API de Gemini no configurada.');
            return response()->json(['message' => 'La clave de API no está configurada.'], 500);
        }

        // Especifica el modelo de Gemini que deseas usar
        $model = 'gemini-1.5-pro';

        // Construye la URL de la API
        $url = "https://generativelanguage.googleapis.com/v1beta/models/{$model}:generateContent?key={$apiKey}";

        // Prepara el cuerpo de la solicitud según la documentación de la API
        $requestBody = [
            'contents' => [
                [
                    'parts' => [
                        [
                            'text' => $message,
                        ],
                    ],
                ],
            ],
        ];

        try {
            // Realiza la solicitud HTTP POST a la API de Gemini sin verificar SSL (solo en desarrollo)
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
            ])->withoutVerifying()->post($url, $requestBody);

            if ($response->successful()) {
                $data = $response->json();

                // Extrae la respuesta del chatbot
                //$reply = $data['candidates'][0]['content'] ?? 'Lo siento, no pude procesar tu solicitud.';
                $reply = $data['candidates'][0]['content']['parts'][0]['text'] ?? 'Lo siento, no pude procesar tu solicitud.';

                // Devuelve la respuesta al frontend
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
}
