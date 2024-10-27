@extends('plantilla.plantilla')

@section('contenido')
<div class="container mx-auto py-6">
    <h2 class="text-2xl font-bold mb-4">Eliminar Talla</h2>
    <p>¿Estás seguro de que deseas eliminar la talla <strong>{{ $talla->talla }}</strong>?</p>
    <form action="{{ route('tallas.destroy', $talla->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Confirmar</button>
        <a href="{{ route('tallas.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Cancelar</a>
    </form>
</div>
@endsection
