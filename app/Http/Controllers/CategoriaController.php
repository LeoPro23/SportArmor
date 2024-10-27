<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();
        return view('categorias.index', compact('categorias'));
    }

    public function create()
    {
        return view('categorias.create');
    }    

    public function store(Request $request)
    {
        $request->validate(['nombre' => 'required|string|max:255']);
        Categoria::create($request->all());
    
        return redirect()->route('categorias.index')->with('success', 'Categoría creada exitosamente.');
    }
    
    public function show($id)
    {
        return Categoria::findOrFail($id);
    }

    public function edit($id)
    {
        $categoria = Categoria::findOrFail($id);
        return view('categorias.edit', compact('categoria'));
    }

    public function update(Request $request, $id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->update($request->all());
        return redirect()->route('categorias.index');
    }

    public function destroy($id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->delete();
        return response()->noContent();
    }

    public function confirm($id)
    {
        $categoria = Categoria::findOrFail($id);
        return view('categorias.confirm', compact('categoria'));
    }
    
}
