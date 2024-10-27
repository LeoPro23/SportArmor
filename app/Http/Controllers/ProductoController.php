<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use App\Models\Subcategoria;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::get();
        return view('productos.index', compact('productos'));
    }

    public function create()
    {
        $subcategorias = Subcategoria::get();
        return view('productos.create', compact('subcategorias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric',
            'stock' => 'required|integer',
            'subcategoria_id' => 'required|exists:subcategorias,id',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048' // Validación de imagen
        ]);
    
        if ($request->hasFile('imagen')) {
            $imagenNombre = time() . '_' . $request->file('imagen')->getClientOriginalName();
            $request->file('imagen')->move(public_path('imagenes'), $imagenNombre);
            $request->merge(['imagen' => $imagenNombre]);
        }
    
        Producto::create($request->all());

        return redirect()->route('productos.index')->with('success', 'Producto creado exitosamente.');
    }
    
    public function show($id)
    {
        return Producto::with('subcategoria')->findOrFail($id);
    }

    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        return view('productos.edit', compact('producto'));
    }

    public function update(Request $request, $id)
    {
        $producto = Producto::findOrFail($id);
    
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric',
            'stock' => 'required|integer',
            'subcategoria_id' => 'required|exists:subcategorias,id',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg|max:2048' // Validación de imagen
        ]);
    
        if ($request->hasFile('imagen')) {
            // Elimina la imagen anterior si existe
            if ($producto->imagen && file_exists(public_path('imagenes/' . $producto->imagen))) {
                unlink(public_path('imagenes/' . $producto->imagen));
            }
            $imagenNombre = time() . '_' . $request->file('imagen')->getClientOriginalName();
            $request->file('imagen')->move(public_path('imagenes'), $imagenNombre);
            $request->merge(['imagen' => $imagenNombre]);
        }
    
        $producto->update($request->all());
        return redirect()->route('productos.index')->with('success', 'Producto actualizado exitosamente.');
    }
    

    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();
        return response()->noContent();
    }

    public function confirm($id)
    {
        $producto = Producto::findOrFail($id);
        return view('productos.confirm', compact('producto'));
    }

}
