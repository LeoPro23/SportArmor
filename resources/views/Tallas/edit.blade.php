@extends('plantilla.plantilla')

@section('contenido')
<div class="container mx-auto py-6">
    <h2 class="text-2xl font-bold mb-4">Editar Talla</h2>
    <form action="{{ route('tallas.update', $talla->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="subcategoria_id" class="block text-gray-700 text-sm font-bold mb-2">Subcategoría:</label>
            <select name="subcategoria_id" id="subcategoria_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                @foreach($subcategorias as $subcategoria)
                    <option value="{{ $subcategoria->id }}" {{ $talla->subcategoria_id == $subcategoria->id ? 'selected' : '' }}>{{ $subcategoria->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label for="talla" class="block text-gray-700 text-sm font-bold mb-2">Nombre:</label>
            <input type="text" id="talla" name="talla" value="{{ $talla->talla }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Actualizar</button>
        <a href="{{ route('tallas.index') }}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Cancelar</a>
    </form>
</div>
@endsection
