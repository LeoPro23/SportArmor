<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chat;
use App\Models\Venta;
use App\Models\Message;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class InteligenciaNegociosController extends Controller
{
    public function inteligenciaNegocios()
    {
        return view('graficasbi.inteligencia_negocios');
    }

    public function chatValuationsData(Request $request)
    {
        $range = $request->query('range', 'all');

        // Determinar el rango de fechas
        $query = Chat::query()->whereNotNull('valoracion_id');

        $now = Carbon::now();
        switch ($range) {
            case 'year':
                $query->where('ended_at', '>=', $now->copy()->subYear());
                break;
            case 'semester':
                $query->where('ended_at', '>=', $now->copy()->subMonths(6));
                break;
            case 'month':
                $query->where('ended_at', '>=', $now->copy()->subMonth());
                break;
            case '7days':
                $query->where('ended_at', '>=', $now->copy()->subDays(7));
                break;
            case 'day':
                $query->where('ended_at', '>=', $now->copy()->subDay());
                break;
            case 'all':
            default:
                // No filtrar fecha
                break;
        }

        // Contar las valoraciones. Inicializar a 0
        $counts = [1 => 0, 2 => 0, 3 => 0, 4 => 0, 5 => 0];

        $results = $query->selectRaw('valoracion_id, COUNT(*) as total')
            ->groupBy('valoracion_id')
            ->get();

        // Llenar $counts con los resultados
        foreach ($results as $result) {
            if (isset($counts[$result->valoracion_id])) {
                $counts[$result->valoracion_id] = $result->total;
            }
        }

        $labels = ['1 Estrella', '2 Estrellas', '3 Estrellas', '4 Estrellas', '5 Estrellas'];
        $series = array_values($counts); // Valores en orden de 1 a 5

        Log::info("Contenido de counts:", $counts);
        Log::info("Contenido de series:", $series);

        return response()->json([
            'labels' => $labels,
            'series' => $series,
        ]);
    }

    /**
     * Obtiene los tiempos de respuesta promedio del chatbot.
     */
    public function responseTimesData(Request $request)
    {
        $range = $request->query('range', 'all');

        // Determinar el rango de fechas
        $query = Chat::query()->whereNotNull('ended_at');

        $now = Carbon::now();
        switch ($range) {
            case 'year':
                $query->where('ended_at', '>=', $now->copy()->subYear());
                break;
            case 'semester':
                $query->where('ended_at', '>=', $now->copy()->subMonths(6));
                break;
            case 'month':
                $query->where('ended_at', '>=', $now->copy()->subMonth());
                break;
            case '7days':
                $query->where('ended_at', '>=', $now->copy()->subDays(7));
                break;
            case 'day':
                $query->where('ended_at', '>=', $now->copy()->subDay());
                break;
            case 'all':
            default:
                // No filtrar fecha
                break;
        }

        // Obtener todos los chats en el rango con sus mensajes ordenados
        $chats = $query->with(['messages' => function ($q) {
            $q->orderBy('created_at');
        }])->get();

        // Agrupar los tiempos de respuesta por fecha
        $groupedTimes = [];

        foreach ($chats as $chat) {
            $chatDate = Carbon::parse($chat->ended_at)->format('Y-m-d');
            if (!isset($groupedTimes[$chatDate])) {
                $groupedTimes[$chatDate] = [];
            }

            $messages = $chat->messages;
            $lastUserMessageTime = null;

            foreach ($messages as $message) {
                if ($message->sender === 'user') {
                    $lastUserMessageTime = Carbon::parse($message->created_at);
                } elseif ($message->sender === 'bot' && $lastUserMessageTime) {
                    $botResponseTime = Carbon::parse($message->created_at)->diffInSeconds($lastUserMessageTime);
                    $groupedTimes[$chatDate][] = $botResponseTime;
                    $lastUserMessageTime = null;
                }
            }
        }

        // Calcular el tiempo de respuesta promedio por día
        $labels = [];
        $series = [];

        foreach ($groupedTimes as $date => $times) {
            $avgTime = count($times) > 0 ? array_sum($times) / count($times) : 0;
            $labels[] = $date;
            $series[] = round($avgTime, 2); // Redondear a 2 decimales
        }

        // Ordenar por fecha
        array_multisort($labels, $series);

        return response()->json([
            'labels' => $labels,
            'series' => [
                [
                    'name' => 'Tiempo de Respuesta (segundos)',
                    'data' => $series
                ]
            ],
        ]);
    }

    /**
     * Obtiene las tasas de conversión del chatbot.
     */
    public function conversionRatesData(Request $request)
    {
        $range = $request->query('range', 'all');

        // Determinar el rango de fechas
        $query = Chat::query()->whereNotNull('ended_at');

        $now = Carbon::now();
        switch ($range) {
            case 'year':
                $query->where('ended_at', '>=', $now->copy()->subYear());
                break;
            case 'semester':
                $query->where('ended_at', '>=', $now->copy()->subMonths(6));
                break;
            case 'month':
                $query->where('ended_at', '>=', $now->copy()->subMonth());
                break;
            case '7days':
                $query->where('ended_at', '>=', $now->copy()->subDays(7));
                break;
            case 'day':
                $query->where('ended_at', '>=', $now->copy()->subDay());
                break;
            case 'all':
            default:
                // No filtrar fecha
                break;
        }

        // Obtener todos los chats en el rango
        $chats = $query->get();

        // Total de chats
        $totalChats = $chats->count();

        // Total de conversiones: Chats que han llevado a una venta
        // Asumiremos que una conversión es una venta realizada después de la finalización del chat
        $conversionChats = 0;

        foreach ($chats as $chat) {
            // Buscar ventas del mismo usuario después de 'ended_at'
            $hasConversion = Venta::where('user_id', $chat->user_id)
                ->where('fecha_venta', '>=', $chat->ended_at)
                ->exists();

            if ($hasConversion) {
                $conversionChats++;
            }
        }

        $conversionRate = $totalChats > 0 ? ($conversionChats / $totalChats) * 100 : 0;

        // Para una gráfica de barras, mostramos "Conversión" y "No Conversión"
        $labels = ['Conversión', 'No Conversión'];
        $series = [
            [
                'name' => 'Tasa de Conversión (%)',
                'data' => [
                    round($conversionRate, 2),
                    round(100 - $conversionRate, 2)
                ]
            ]
        ];

        return response()->json([
            'labels' => $labels,
            'series' => $series,
        ]);
    }
}
