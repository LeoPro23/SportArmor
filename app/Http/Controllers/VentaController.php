<?php

namespace App\Http\Controllers;

use App\Models\Venta;

class VentaController extends Controller
{
    public function index()
    {
        $ventas = Venta::with('cupon')->get(); // Traer todas las ventas con el cupón si existe
        return view('ventas.index', compact('ventas'));
    }

    public function show($id)
    {
        $venta = Venta::with(['detalles.producto', 'detalles.talla'])->findOrFail($id);
        return view('ventas.show', compact('venta'));
    }
}
