<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Subcategoria;

class CatalogoController extends Controller
{
    public function index()
    {
        // Obtener todos los productos
        $productos = Producto::get();
        // Obtener categorias y subcategorias
        $categorias = Categoria::all();
        $subcategorias = Subcategoria::all();
        // Retornar la vista con los productos, categorias y subcategorias
        return view('catalogo.catalogo', compact('productos', 'categorias', 'subcategorias'));
    }

    public function show($id)
    {
        $producto = Producto::with('tallas')->findOrFail($id);
    
        // Obtener productos relacionados de la misma subcategoría
        $relacionados = Producto::where('subcategoria_id', $producto->subcategoria_id)
                                ->where('id', '!=', $id)
                                ->take(4)
                                ->get();
    
        return view('catalogo.detalle_producto', compact('producto', 'relacionados'));
    }    

    public function catalogo(Request $request)
    {
        $categorias = Categoria::all();
        $subcategorias = Subcategoria::all();
        $productos = Producto::query();

        // Aplicar filtros
        if ($request->has('categoria') && $request->categoria != 'Todas') {
            $productos = $productos->where('categoria_id', $request->categoria);
        }

        if ($request->has('subcategoria') && $request->subcategoria != 'Todas') {
            $productos = $productos->where('subcategoria_id', $request->subcategoria);
        }

        $productos = $productos->get();

        return view('catalogo', compact('productos', 'categorias', 'subcategorias'));
    }

}
