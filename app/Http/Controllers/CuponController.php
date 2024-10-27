<?php

namespace App\Http\Controllers;

use App\Models\Cupon;
use Illuminate\Http\Request;

class CuponController extends Controller
{
    public function index()
    {
        $cupones = Cupon::all();
        return view('cupones.index', compact('cupones'));
    }
    
    
    public function create()
    {
        return view('cupones.create');
    }    

    public function store(Request $request)
    {
        $request->validate([
            'codigo' => 'required|string|unique:cupones,codigo|max:255',
            'descuento' => 'required|numeric',
            'fecha_expiracion' => 'nullable|date'
        ]);

        Cupon::create($request->all());

        return redirect()->route('cupones.index')->with('success', 'Cupón creado exitosamente.');
    }

    public function show($id)
    {
        return Cupon::findOrFail($id);
    }

    public function edit($id)
    {
        $cupon = Cupon::findOrFail($id);
        return view('cupones.edit', compact('cupon'));
    }
    
    public function update(Request $request, $id)
    {
        $cupon = Cupon::findOrFail($id);
        $cupon->update($request->all());
        return redirect()->route('cupones.index');
    }    

    public function destroy($id)
    {
        $cupon = Cupon::findOrFail($id);
        $cupon->delete();
        return response()->noContent();
    }

    public function confirm($id)
    {
        $cupon = Cupon::findOrFail($id);
        return view('cupones.confirm', compact('cupon'));
    }
    
}
