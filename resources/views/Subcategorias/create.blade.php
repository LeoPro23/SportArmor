@extends('plantilla.plantilla')

@section('contenido')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Nueva Subcategoría</h1>
    <form action="{{ route('subcategorias.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="nombre" class="block text-sm font-medium">Nombre de la Subcategoría</label>
            <input type="text" name="nombre" id="nombre" class="mt-1 block w-full rounded border-gray-300" required>
        </div>
        <div class="mb-4">
            <label for="categoria_id" class="block text-sm font-medium">Categoría</label>
            <select name="categoria_id" id="categoria_id" class="mt-1 block w-full rounded border-gray-300">
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Guardar</button>
    </form>
</div>
@endsection
