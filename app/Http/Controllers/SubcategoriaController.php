<?php

namespace App\Http\Controllers;

use App\Models\Subcategoria;
use Illuminate\Http\Request;
use App\Models\Categoria;

class SubcategoriaController extends Controller
{
    public function index()
    {
        $subcategorias = Subcategoria::all();
        return view('subcategorias.index', compact('subcategorias'));
    }

    public function create()
    {
        return view('subcategorias.create', [
            'categorias' => Categoria::all()
        ]);
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'categoria_id' => 'required|exists:categorias,id',
        ]);
        Subcategoria::create($request->all());
    
        return redirect()->route('subcategorias.index')->with('success', 'Subcategoría creada exitosamente.');
    }
    
    public function show($id)
    {
        return Subcategoria::with('categoria')->findOrFail($id);
    }

    public function edit($id)
    {
        $subcategoria = Subcategoria::findOrFail($id);
        return view('subcategorias.edit', compact('subcategoria'));
    }
    
    public function update(Request $request, $id)
    {
        $subcategoria = Subcategoria::findOrFail($id);
        $subcategoria->update($request->all());
        return redirect()->route('subcategorias.index');
    }    

    public function destroy($id)
    {
        $subcategoria = Subcategoria::findOrFail($id);
        $subcategoria->delete();
        return response()->noContent();
    }

    public function confirm($id)
    {
        $subcategoria = Subcategoria::findOrFail($id);
        return view('subcategorias.confirm', compact('subcategoria'));
    }
    
}
