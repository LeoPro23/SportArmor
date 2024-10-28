<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OpenAI;
use App\Models\Venta;
use Exception;
use GuzzleHttp\Client; // Importa el cliente HTTP si no está ya importado

class ChatbotController extends Controller
{
    public function handle(Request $request)
    {
        $user = $request->user();
        $mensajeUsuario = $request->input('message');

        $request->validate([
            'message' => 'required|string|max:500',
        ]);

        $ventas = Venta::where('user_id', $user->id)
            ->with('detalles.producto')
            ->orderBy('fecha_venta', 'desc')
            ->take(5)
            ->get();

        $historialCompras = $ventas->map(function ($venta) {
            $productos = $venta->detalles->map(function ($detalle) {
                return "{$detalle->producto->nombre} (Cantidad: {$detalle->cantidad})";
            })->join(', ');
            return "Venta del {$venta->fecha_venta}: {$productos}";
        })->join("\n");

        $prompt = "El usuario ha realizado las siguientes compras:\n{$historialCompras}\n\nUsuario: {$mensajeUsuario}\nAsistente:";

        try {
            // Configura Guzzle para ignorar la verificación SSL
            $client = new Client([
                'base_uri' => 'https://api.openai.com',
                'verify' => false, // Desactiva la verificación SSL
                'headers' => [
                    'Authorization' => 'Bearer ' . env('OPENAI_API_KEY'),
                ],
            ]);

            $response = $client->post('/v1/chat/completions', [
                'json' => [
                    'model' => 'gpt-3.5-turbo',
                    'messages' => [
                        [
                            'role' => 'system',
                            'content' => 'Eres un asistente amigable de Sport Armor que ayuda a los clientes con sus consultas sobre compras y productos.',
                        ],
                        ['role' => 'user', 'content' => $prompt],
                    ],
                    'temperature' => 0.7,
                    'max_tokens' => 500,
                ],
            ]);

            $data = json_decode($response->getBody(), true);
            $respuestaChatbot = $data['choices'][0]['message']['content'];

        } catch (Exception $e) {
            $respuestaChatbot = "Lo siento, ha ocurrido un error al procesar tu solicitud. Error: " . $e->getMessage();
        }

        return response()->json(['message' => $respuestaChatbot]);
    }
}
