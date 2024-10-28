<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Cupon;
use App\Models\Venta;


class CarritoController extends Controller
{
    public function agregar(Request $request, $id)
    {
        // Validar la solicitud
        $request->validate([
            'talla' => 'required|exists:tallas,id',
            'cantidad' => 'required|integer|min:1'
        ]);

        // Obtener el producto
        $producto = Producto::findOrFail($id);

        // Crear o actualizar el carrito en la sesión
        $carrito = session()->get('carrito', []);

        // Generar una clave única para cada producto-talla en el carrito
        $key = "{$id}_{$request->talla}";

        // Verificar si el producto-talla ya está en el carrito
        if (isset($carrito[$key])) {
            // Si ya existe, simplemente incrementamos la cantidad
            $carrito[$key]['cantidad'] += $request->cantidad;
        } else {
            // Si no existe, lo agregamos
            $carrito[$key] = [
                'producto_id' => $id,
                'nombre' => $producto->nombre,
                'precio' => $producto->precio,
                'talla_id' => $request->talla,
                'cantidad' => $request->cantidad,
                'imagen' => $producto->imagen,
            ];
        }

        // Guardar el carrito actualizado en la sesión
        session()->put('carrito', $carrito);

        // Redirigir al catálogo o mostrar un mensaje de éxito
        return redirect()->route('catalogo.index')->with('success', 'Producto añadido al carrito.');
    }

    public function verCarrito()
    {
        // Obtener el carrito de la sesión
        $carrito = session()->get('carrito', []);
    
        // Pasar los datos a la vista del carrito
        return view('carrito.index', compact('carrito'));
    }

    
    public function actualizar(Request $request, $key)
    {
        $request->validate(['cantidad' => 'required|integer|min:1']);
    
        // Obtener el carrito de la sesión
        $carrito = session()->get('carrito', []);
    
        // Actualizar la cantidad del producto en el carrito
        if (isset($carrito[$key])) {
            $carrito[$key]['cantidad'] = $request->cantidad;
            session()->put('carrito', $carrito);
        }
    
        return redirect()->route('carrito.index')->with('success', 'Cantidad actualizada correctamente.');
    }
    
    public function eliminar($key)
    {
        // Obtener el carrito de la sesión
        $carrito = session()->get('carrito', []);
    
        // Eliminar el producto del carrito
        if (isset($carrito[$key])) {
            unset($carrito[$key]);
            session()->put('carrito', $carrito);
        }
    
        return redirect()->route('carrito.index')->with('success', 'Producto eliminado del carrito.');
    }   

    public function aplicarCupon(Request $request)
    {
        $cupon = Cupon::where('codigo', $request->codigo_cupon)
                    ->where('fecha_expiracion', '>=', now())
                    ->first();

        if ($cupon) {
            session()->put('descuento_cupon', $cupon->descuento);
            session()->put('cupon_aplicado', $cupon->id);
            return redirect()->route('carrito.index')->with('success', 'Cupón aplicado con éxito.');
        }

        return redirect()->route('carrito.index')->with('error', 'Cupón inválido o expirado.');
    }

    // finalizar compra sin actualizar el stock
    /*
    public function finalizarCompra()
    {
        $carrito = session()->get('carrito', []);
        $descuento = session()->get('descuento_cupon', 0);
    
        if (empty($carrito)) {
            return redirect()->route('carrito.index')->with('error', 'El carrito está vacío.');
        }
    
        // Calcular el total de la compra
        $total = collect($carrito)->sum(fn($item) => $item['precio'] * $item['cantidad']);
        $totalConDescuento = $total - ($total * ($descuento / 100));
    
        // Crear la venta
        $venta = Venta::create([
            'fecha_venta' => now(),
            'cupon_id' => session()->get('cupon_aplicado'),
            'total' => $totalConDescuento,
        ]);
    
        // Crear el detalle de la venta para cada producto
        foreach ($carrito as $item) {
            $venta->detalles()->create([
                'producto_id' => $item['producto_id'],
                'talla_id' => $item['talla_id'],
                'cantidad' => $item['cantidad'],
                'precio_unitario' => $item['precio'],
            ]);
        }
    
        // Limpiar el carrito y los datos del cupón en la sesión
        session()->forget(['carrito', 'descuento_cupon', 'cupon_aplicado']);
    
        return redirect()->route('carrito.index')->with('success', 'Compra finalizada con éxito.');
    }
    */

    // finalizar compra actualizando el stock
    public function finalizarCompra()
    {
        $carrito = session()->get('carrito', []);
        $descuento = session()->get('descuento_cupon', 0);

        if (empty($carrito)) {
            return redirect()->route('carrito.index')->with('error', 'El carrito está vacío.');
        }

        // Calcular el total de la compra
        $total = collect($carrito)->sum(fn($item) => $item['precio'] * $item['cantidad']);
        $totalConDescuento = $total - ($total * ($descuento / 100));

        // Crear la venta
        $venta = Venta::create([
            'fecha_venta' => now(),
            'cupon_id' => session()->get('cupon_aplicado'),
            'total' => $totalConDescuento,
        ]);

        // Crear el detalle de la venta y actualizar el stock de cada producto
        foreach ($carrito as $item) {
            $producto = Producto::find($item['producto_id']);

            // Verificar si hay suficiente stock
            if ($producto->stock < $item['cantidad']) {
                return redirect()->route('carrito.index')->with('error', 'Stock insuficiente para el producto: ' . $producto->nombre);
            }

            // Reducir el stock del producto
            $producto->stock -= $item['cantidad'];
            $producto->save();

            // Crear el detalle de venta
            $venta->detalles()->create([
                'producto_id' => $item['producto_id'],
                'talla_id' => $item['talla_id'],
                'cantidad' => $item['cantidad'],
                'precio_unitario' => $item['precio'],
            ]);
        }

        // Limpiar el carrito y los datos del cupón en la sesión
        session()->forget(['carrito', 'descuento_cupon', 'cupon_aplicado']);

        return redirect()->route('carrito.index')->with('success', 'Compra finalizada con éxito.');
    }

}
