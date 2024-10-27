@extends('plantilla.plantilla')

@section('contenido')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Nuevo Producto</h1>
    <form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label for="nombre" class="block text-sm font-medium">Nombre del Producto</label>
            <input type="text" name="nombre" id="nombre" class="mt-1 block w-full rounded border-gray-300" required>
        </div>
        <div class="mb-4">
            <label for="descripcion" class="block text-sm font-medium">Descripción</label>
            <textarea name="descripcion" id="descripcion" class="mt-1 block w-full rounded border-gray-300"></textarea>
        </div>
        <div class="mb-4">
            <label for="subcategoria_id" class="block text-sm font-medium">Subcategoría</label>
            <select name="subcategoria_id" id="subcategoria_id" class="mt-1 block
            w-full rounded border-gray-300" required>
                @foreach($subcategorias as $subcategoria)
                    <option value="{{ $subcategoria->id }}">{{ $subcategoria->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label for="precio" class="block text-sm font-medium">Precio</label>
            <input type="number" name="precio" id="precio" class="mt-1 block w-full rounded border-gray-300" required>
        </div>
        <div class="mb-4">
            <label for="stock" class="block text-sm font-medium">Stock</label>
            <input type="number" name="stock" id="stock" class="mt-1 block w-full rounded border-gray-300" required>
        </div>
        <div class="mb-4">
            <label for="imagen" class="block text-sm font-medium">Imagen</label>
            <input type="file" name="imagen" id="imagen" class="mt-1 block w-full rounded border-gray-300">
        </div>
        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Guardar</button>
        <a href="{{ route('productos.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Cancelar</a>
    </form>
</div>
@endsection
