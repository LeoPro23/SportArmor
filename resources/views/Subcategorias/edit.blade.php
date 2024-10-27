@extends('plantilla.plantilla')

@section('contenido')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Editar Subcategoría</h1>
    <form action="{{ route('subcategorias.update', $subcategoria->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="nombre" class="block text-sm font-medium">Nombre de la Subcategoría</label>
            <input type="text" name="nombre" id="nombre" class="mt-1 block w-full rounded border-gray-300" value="{{ $subcategoria->nombre }}" required>
        </div>
        <div class="mb-4">
            <label for="categoria_id" class="block text-sm font-medium">Categoría</label>
            <select name="categoria_id" id="categoria_id" class="mt-1 block w-full rounded border-gray-300">
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}" @if($categoria->id == $subcategoria->categoria_id) selected @endif>{{ $categoria->nombre }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Actualizar</button>
    </form>
</div>
@endsection
