<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\SubcategoriaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\TallaController;
use App\Http\Controllers\CuponController;
use App\Http\Controllers\CatalogoController;

Route::get('/', function () {
    return view('inicio');
});

Route::get('/privacidad', function () {
    return view('privacidad');
})->name('privacidad');

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

Route::get('/catalogo', [CatalogoController::class, 'index'])->name('catalogo.index');
Route::get('/catalogo/{id}', [CatalogoController::class, 'show'])->name('catalogo.show');
