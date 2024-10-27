@extends('plantilla.plantilla')

@section('contenido')
<div class="container mx-auto py-6">
    <h2 class="text-2xl font-bold mb-4">Crear Talla</h2>
    <!-- Mensajes de error -->
    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('tallas.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="subcategoria_id" class="block text-gray-700 text-sm font-bold mb-2">Subcategoría:</label>
            <select name="subcategoria_id" id="subcategoria_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                @foreach($subcategorias as $subcategoria)
                    <option value="{{ $subcategoria->id }}">{{ $subcategoria->nombre }}</option>
                @endforeach
            </select>
        </div>
            <label for="talla" class="block text-gray-700 text-sm font-bold mb-2">Nombre:</label>
            <input type="text" id="talla" name="talla" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Guardar</button>
        <a href="{{ route('tallas.index') }}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Cancelar</a>
    </form>
</div>
@endsection
