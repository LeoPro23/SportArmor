@extends('plantilla.plantilla')

@section('contenido')
<div class="container mx-auto py-6">
    <h2 class="text-2xl font-bold mb-4">Lista de Tallas</h2>
    <a href="{{ route('tallas.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Agregar Talla</a>
    <table class="table-auto w-full mt-4">
        <thead>
            <tr>
                <th class="px-4 py-2">ID</th>
                <th class="px-4 py-2">Subcategoría</th>
                <th class="px-4 py-2">Nombre</th>
                <th class="px-4 py-2">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tallas as $talla)
            <tr>
                <td class="border px-4 py-2">{{ $talla->id }}</td>
                <td class="border px-4 py-2">{{ $talla->subcategoria->nombre }}</td>
                <td class="border px-4 py-2">{{ $talla->talla }}</td>
                <td class="border px-4 py-2">
                    <a href="{{ route('tallas.edit', $talla->id) }}" class="text-blue-600 hover:text-blue-900">Editar</a>
                    |
                    <a href="{{ route('tallas.confirm', $talla->id) }}" class="text-red-600 hover:text-red-900">Eliminar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
