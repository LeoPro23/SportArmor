@extends('plantilla.plantilla')

@section('contenido')
<div class="container mx-auto py-6">
    <h2 class="text-2xl font-bold mb-4">Eliminar Cupón</h2>
    <p>¿Estás seguro de que deseas eliminar el cupón con código <strong>{{ $cupon->codigo }}</strong>?</p>
    <form action="{{ route('cupones.destroy', $cupon->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Confirmar</button>
        <a href="{{ route('cupones.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Cancelar</a>
    </form>
</div>
@endsection
