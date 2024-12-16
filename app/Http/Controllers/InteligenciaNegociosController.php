<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chat;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

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
                $query->where('ended_at', '>=', $now->subYear());
                break;
            case 'semester':
                $query->where('ended_at', '>=', $now->subMonths(6));
                break;
            case 'month':
                $query->where('ended_at', '>=', $now->subMonth());
                break;
            case '7days':
                $query->where('ended_at', '>=', $now->subDays(7));
                break;
            case 'day':
                $query->where('ended_at', '>=', $now->subDay());
                break;
            case 'all':
            default:
                // No filtrar fecha
                break;
        }

        // Contar las valoraciones. Usamos un array asociativo para inicializar a 0.
        $counts = [1 => 0, 2 => 0, 3 => 0, 4 => 0, 5 => 0]; // Inicializamos a 0

        $results = $query->selectRaw('valoracion_id, COUNT(*) as total')
            ->groupBy('valoracion_id')
            ->get();

        // Llenamos $counts con los resultados de la consulta.
         foreach ($results as $result) {
            $counts[$result->valoracion_id] = $result->total;
        }

        $labels = ['1 Estrella', '2 Estrellas', '3 Estrellas', '4 Estrellas', '5 Estrellas'];
        $series = array_values($counts); // Obtenemos solo los valores, respetando el orden de las claves (1-5)


        Log::info("Contenido de counts:", $counts);
        Log::info("Contenido de series:", $series);

        return response()->json([
            'labels' => $labels,
            'series' => $series,
        ]);
    }
}
