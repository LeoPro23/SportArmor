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
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:8192' // Validación de imagen
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
        // Obtiene todas las subcategorías para el select
        $subcategorias = Subcategoria::get();
        return view('productos.edit', compact('producto', 'subcategorias'));
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
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:8192' // Validación de imagen
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

}
