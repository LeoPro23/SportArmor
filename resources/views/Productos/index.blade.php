@extends('plantilla.plantilla')

@section('contenido')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Lista de Productos</h1>
    <a href="{{ route('productos.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Nuevo Producto</a>
    <table class="table-auto w-full mt-4">
        <thead>
            <tr>
                <th class="px-4 py-2">ID</th>
                <th class="px-4 py-2">Subcategoria</th>
                <th class="px-4 py-2">Nombre</th>
                <th class="px-4 py-2">Descripción</th>
                <th class="px-4 py-2">Precio</th>
                <th class="px-4 py-2">Stock</th>
                <th class="px-4 py-2">Imagen</th>
                <th class="px-4 py-2">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productos as $producto)
            <tr>
                <td class="border px-4 py-2">{{ $producto->id }}</td>
                <td class="border px-4 py-2">{{ $producto->subcategoria->nombre }}</td>
                <td class="border px-4 py-2">{{ $producto->nombre }}</td>
                <td class="border px-4 py-2">{{ $producto->descripcion }}</td>
                <td class="border px-4 py-2">S/.{{ $producto->precio }}</td>
                <td class="border px-4 py-2">{{ $producto->stock }}</td>
                <td class="border px-4 py-2">
                    @if($producto->imagen)
                        <img src="{{ asset('imagenes/' . $producto->imagen) }}" alt="{{ $producto->nombre }}" class="h-16">
                    @else
                        Sin Imagen
                    @endif
                </td>
                <td class="border px-4 py-2">
                    <a href="{{ route('productos.edit', $producto->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded">Editar</a>
                    <a href="{{ route('productos.confirm', $producto->id) }}" class="bg-red-500 text-white px-4 py-2 rounded">Eliminar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
