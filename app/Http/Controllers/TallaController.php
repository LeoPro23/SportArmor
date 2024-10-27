<?php

namespace App\Http\Controllers;

use App\Models\Talla;
use Illuminate\Http\Request;
use App\Models\Subcategoria;

class TallaController extends Controller
{
    public function index()
    {
        $tallas = Talla::all();
        return view('tallas.index', compact('tallas'));
    }
    
    public function create()
    {
        $subcategorias = Subcategoria::all();
        return view('tallas.create', compact('subcategorias'));
    }
    
    public function store(Request $request)
    {
        try {
            $request->validate([
                'talla' => 'required|string|max:50',
                'subcategoria_id' => 'required|exists:subcategorias,id'
            ]);

            Talla::create($request->all());

            return redirect()->route('tallas.index')->with('success', 'Talla creada exitosamente.');
        } catch (\Exception $e) {
            return redirect()->route('tallas.create')
                ->withInput()
                ->withErrors(['error' => 'Error al crear la talla: ' . $e->getMessage()]);
        }
    }

    public function show($id)
    {
        return Talla::findOrFail($id);
    }

    public function edit($id)
    {
        $subcategorias = Subcategoria::all();
        $talla = Talla::findOrFail($id);
        return view('tallas.edit', compact('talla', 'subcategorias'));
    }

    public function update(Request $request, $id)
    {
        $talla = Talla::findOrFail($id);
        $talla->update($request->all());
        return redirect()->route('tallas.index');
    }

    public function destroy($id)
    {
        $talla = Talla::findOrFail($id);
        $talla->delete();
        response()->noContent();
        return redirect()->route('tallas.index');
    }
    
    public function confirm($id)
    {
        $talla = Talla::findOrFail($id);
        return view('tallas.confirm', compact('talla'));
    }
    
}
