<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Venta;


class PurchaseController extends Controller
{

    /**
     * Muestra el historial de compras del usuario autenticado.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $user = Auth::user();

        // Obtener todas las ventas del usuario, ordenadas por fecha de venta descendente
        $ventas = Venta::with(['detalles.producto', 'detalles.talla', 'cupon'])
                        ->where('user_id', $user->id)
                        ->orderBy('fecha_venta', 'desc')
                        ->get();

        return view('historial_compras', compact('ventas'));
    }
}
