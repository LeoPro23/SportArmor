@extends('plantilla.plantilla')

@section('contenido')
<div class="container mx-auto py-6">
    <h2 class="text-2xl font-bold mb-4">Lista de Cupones</h2>
    <a href="{{ route('cupones.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Agregar Cupón</a>
    <table class="table-auto w-full mt-4">
        <thead>
            <tr>
                <th class="px-4 py-2">Código</th>
                <th class="px-4 py-2">Descuento (%)</th>
                <th class="px-4 py-2">Fecha Expiración</th>
                <th class="px-4 py-2">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cupones as $cupon)
            <tr>
                <td class="border px-4 py-2">{{ $cupon->codigo }}</td>
                <td class="border px-4 py-2">{{ $cupon->descuento }}</td>
                <td class="border px-4 py-2">{{ $cupon->fecha_expiracion }}</td>
                <td class="border px-4 py-2">
                    <a href="{{ route('cupones.edit', $cupon->id) }}" class="text-blue-600 hover:text-blue-900">Editar</a>
                    |
                    <a href="{{ route('cupones.confirm', $cupon->id) }}" class="text-red-600 hover:text-red-900">Eliminar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
