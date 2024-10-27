@extends('plantilla.plantilla')

@section('contenido')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Lista de Subcategorías</h1>
    <a href="{{ route('subcategorias.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Nueva Subcategoría</a>
    <table class="table-auto w-full mt-4">
        <thead>
            <tr>
                <th class="px-4 py-2">ID</th>
                <th class="px-4 py-2">Nombre</th>
                <th class="px-4 py-2">Categoría</th>
                <th class="px-4 py-2">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($subcategorias as $subcategoria)
            <tr>
                <td class="border px-4 py-2">{{ $subcategoria->id }}</td>
                <td class="border px-4 py-2">{{ $subcategoria->nombre }}</td>
                <td class="border px-4 py-2">{{ $subcategoria->categoria->nombre }}</td>
                <td class="border px-4 py-2">
                    <a href="{{ route('subcategorias.edit', $subcategoria->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded">Editar</a>
                    <a href="{{ route('subcategorias.confirm', $subcategoria->id) }}" class="bg-red-500 text-white px-4 py-2 rounded">Eliminar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
