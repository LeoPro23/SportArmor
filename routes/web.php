<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\SubcategoriaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\TallaController;
use App\Http\Controllers\CuponController;
use App\Http\Controllers\CatalogoController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\AdminMiddleware;

Route::get('/', function () {
    return view('inicio');
})->name('inicio');

Route::get('/privacidad', function () {
    return view('privacidad');
})->name('privacidad');

Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::resource('categorias', CategoriaController::class);
    Route::get('categorias/{id}/confirm', [CategoriaController::class, 'confirm'])->name('categorias.confirm');
    
    Route::resource('subcategorias', SubcategoriaController::class);
    Route::get('subcategorias/{id}/confirm', [SubcategoriaController::class, 'confirm'])->name('subcategorias.confirm');
    
    Route::resource('productos', ProductoController::class);
    Route::get('productos/{id}/confirm', [ProductoController::class, 'confirm'])->name('productos.confirm');
    
    Route::resource('tallas', TallaController::class);
    Route::get('tallas/{talla}/confirm', [TallaController::class, 'confirm'])->name('tallas.confirm');
    
    Route::resource('cupones', CuponController::class);
    Route::get('cupones/{cupon}/confirm', [CuponController::class, 'confirm'])->name('cupones.confirm');
    
    Route::get('/ventas', [VentaController::class, 'index'])->name('ventas.index');
    Route::get('/ventas/{id}', [VentaController::class, 'show'])->name('ventas.show');
    
});

Route::get('/catalogo', [CatalogoController::class, 'index'])->name('catalogo.index');
Route::get('/catalogo/{id}', [CatalogoController::class, 'show'])->name('catalogo.show');

// Rutas de carrito
Route::post('/carrito/agregar/{producto}', [CarritoController::class, 'agregar'])->name('carrito.add');
Route::get('/carrito', [CarritoController::class, 'verCarrito'])->name('carrito.index');
Route::patch('/carrito/actualizar/{key}', [CarritoController::class, 'actualizar'])->name('carrito.update');
Route::delete('/carrito/eliminar/{key}', [CarritoController::class, 'eliminar'])->name('carrito.remove');
Route::post('/carrito/aplicar-cupon', [CarritoController::class, 'aplicarCupon'])->name('carrito.aplicarCupon');
Route::post('/carrito/finalizar-compra', [CarritoController::class, 'finalizarCompra'])->name('carrito.finalizarCompra');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
