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
use App\Http\Controllers\UserController;
use App\Http\Middleware\SuperAdminMiddleware;
use App\Http\Controllers\GeminiChatbotController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\InteligenciaNegociosController;

Route::get('/', function () {
    return view('inicio');
})->name('inicio');

Route::get('/privacidad', function () {
    return view('privacidad');
})->name('privacidad');

// Rutas de administrador
Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::resource('categorias', CategoriaController::class);
    Route::get('categorias/{id}/confirm', [CategoriaController::class, 'confirm'])->name('categorias.confirm');
    
    Route::resource('subcategorias', SubcategoriaController::class);
    Route::get('subcategorias/{id}/confirm', [SubcategoriaController::class, 'confirm'])->name('subcategorias.confirm');
    
    Route::resource('productos', ProductoController::class);
    Route::get('productos/{id}/confirm', [ProductoController::class, 'confirm'])->name('productos.confirm');
    Route::get('/get-subcategorias/{categoria_id}', [ProductoController::class, 'getSubcategorias']);
    
    Route::resource('tallas', TallaController::class);
    Route::get('tallas/{talla}/confirm', [TallaController::class, 'confirm'])->name('tallas.confirm');
    
    Route::resource('cupones', CuponController::class);
    Route::get('cupones/{cupon}/confirm', [CuponController::class, 'confirm'])->name('cupones.confirm');
    
    Route::get('/ventas', [VentaController::class, 'index'])->name('ventas.index');
    Route::get('/ventas/{id}', [VentaController::class, 'show'])->name('ventas.show');
    
    Route::resource('usuarios', UserController::class);
    Route::get('usuarios/{id}/confirm', [UserController::class, 'confirm'])->name('usuarios.confirm');

    Route::get('/mensajes', [MessageController::class, 'index'])->name('mensajes.index');
    Route::get('/mensajes/chats/{userId}', [MessageController::class, 'getChats'])->name('mensajes.getChats');
    Route::get('/mensajes/chat/{chatId}', [MessageController::class, 'getMessages'])->name('mensajes.getMessages');

    Route::get('/admin/inteligencia-negocios', [InteligenciaNegociosController::class, 'inteligenciaNegocios'])->name('graficasbi.inteligencia_negocios');
    Route::get('/admin/charts/chat-valuations', [InteligenciaNegociosController::class, 'chatValuationsData'])->name('graficasbi.chart.chatValuations');
});

// Rutas exclusivas para el superadministrador
Route::middleware(['auth', SuperAdminMiddleware::class])->group(function () {

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

// Rutas de perfil
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Historial de Compras
    Route::get('/historial-compras', [PurchaseController::class, 'index'])->name('historial_compras');
});

require __DIR__.'/auth.php';

Route::post('/gemini-chatbot', [GeminiChatbotController::class, 'handle'])->middleware('auth');
Route::post('/gemini-chatbot/reset', [GeminiChatbotController::class, 'resetHistory'])->middleware('auth')->name('gemini-chatbot.reset');
Route::post('/gemini-chatbot/valorar', [GeminiChatbotController::class, 'rateChat'])->middleware('auth');
