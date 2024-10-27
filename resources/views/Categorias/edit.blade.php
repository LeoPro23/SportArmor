@extends('plantilla.plantilla')

@section('contenido')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Editar Categoría</h1>
    <form action="{{ route('categorias.update', $categoria->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="nombre" class="block text-sm font-medium">Nombre de la Categoría</label>
            <input type="text" name="nombre" id="nombre" class="mt-1 block w-full rounded border-gray-300" value="{{ $categoria->nombre }}" required>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Actualizar</button>
    </form>
</div>
@endsection
