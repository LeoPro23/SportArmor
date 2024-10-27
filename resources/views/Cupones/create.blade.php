@extends('plantilla.plantilla')

@section('contenido')
<div class="container mx-auto py-6">
    <h2 class="text-2xl font-bold mb-4">Crear Cupón</h2>
    <form action="{{ route('cupones.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="codigo" class="block text-gray-700 text-sm font-bold mb-2">Código:</label>
            <input type="text" id="codigo" name="codigo" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div class="mb-4">
            <label for="descuento" class="block text-gray-700 text-sm font-bold mb-2">Descuento (%):</label>
            <input type="number" id="descuento" name="descuento" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div class="mb-4">
            <label for="fecha_expiracion" class="block text-gray-700 text-sm font-bold mb-2">Fecha de Expiración:</label>
            <input type="date" id="fecha_expiracion" name="fecha_expiracion" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Guardar</button>
    </form>
</div>
@endsection
