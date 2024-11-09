<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use App\Models\Subcategoria;
use App\Models\Categoria;
use Illuminate\Validation\Rule;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::get();
        return view('productos.index', compact('productos'));
    }

    public function create()
    {
        // Obtiene todas las categorías para el select
        $categorias = Categoria::get();
        $subcategorias = Subcategoria::get();
        return view('productos.create', compact('subcategorias','categorias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric',
            'stock' => 'required|integer',
            //'categoria_id' => 'required|exists:categorias,id',
            'subcategoria_id' => [
                'required',
                Rule::exists('subcategorias', 'id')->where(function ($query) use ($request) {
                    return $query->where('categoria_id', $request->categoria_id);
                }),
            ],
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:8192'
        ]);        
    
        $datos = $request->all();
    
        if ($request->hasFile('imagen')) {
            // Genera un nombre único para la imagen con timestamp y hash
            $imagenNombre = time() . '_' . uniqid() . '.' . $request->file('imagen')->getClientOriginalExtension();
            
            // Mueve la imagen a la carpeta public/imagenes
            $request->file('imagen')->move(public_path('imagenes'), $imagenNombre);
            
            // Agrega el nombre de la imagen al array de datos
            $datos['imagen'] = $imagenNombre;
        }
    
        Producto::create($datos);
    
        return redirect()->route('productos.index')->with('success', 'Producto creado exitosamente.');
    }  
    
    public function show($id)
    {
        return Producto::with('subcategoria')->findOrFail($id);
    }

    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        $categorias = Categoria::get();
        // Obtiene todas las subcategorías para el select
        $subcategorias = Subcategoria::get();
        return view('productos.edit', compact('producto', 'subcategorias','categorias'));
    }

    public function update(Request $request, $id)
    {
        $producto = Producto::findOrFail($id);
    
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric',
            'stock' => 'required|integer',
            'categoria_id' => 'required|exists:categorias,id',
            'subcategoria_id' => [
                'required',
                Rule::exists('subcategorias', 'id')->where(function ($query) use ($request) {
                    return $query->where('categoria_id', $request->categoria_id);
                }),
            ],
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:8192'
        ]);        
    
        $datos = $request->all();
    
        if ($request->hasFile('imagen')) {
            // Elimina la imagen anterior si existe
            if ($producto->imagen && file_exists(public_path('imagenes/' . $producto->imagen))) {
                unlink(public_path('imagenes/' . $producto->imagen));
            }
    
            // Genera un nombre único para la imagen con timestamp y hash
            $imagenNombre = time() . '_' . uniqid() . '.' . $request->file('imagen')->getClientOriginalExtension();
            
            // Mueve la imagen a la carpeta public/imagenes
            $request->file('imagen')->move(public_path('imagenes'), $imagenNombre);
            
            // Agrega el nombre de la imagen al array de datos
            $datos['imagen'] = $imagenNombre;
        } else {
            unset($datos['imagen']); // No actualices el campo de imagen si no se ha subido ninguna
        }
        
        $producto->update($datos);
        
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

    public function getSubcategorias($categoria_id)
    {
        $subcategorias = Subcategoria::where('categoria_id', $categoria_id)->get(['id', 'nombre']);
        return response()->json($subcategorias);
    }

}
