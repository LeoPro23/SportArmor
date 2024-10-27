@extends('plantilla.plantilla')

@section('contenido')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Confirmar Eliminación</h1>
    <p>¿Estás seguro de que deseas eliminar la subcategoría "{{ $subcategoria->nombre }}"?</p>
    <form action="{{ route('subcategorias.destroy', $subcategoria->id) }}" method="POST" class="mt-4">
        @csrf
        @method('DELETE')
        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Eliminar</button>
        <a href="{{ route('subcategorias.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Cancelar</a>
    </form>
</div>
@endsection
