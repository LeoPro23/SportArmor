@extends('plantilla.plantilla')

@section('contenido')
<div class="container mx-auto my-8">
    <h2 class="text-2xl font-bold mb-6 text-center">Catálogo de Productos</h2>
    
    <!-- Buscador y filtros -->
    <form method="GET" action="{{ route('catalogo.index') }}" class="max-w-lg mx-auto mb-8">
        <div class="flex gap-2">
            <!-- Filtro de categoría -->
            <select name="categoria" class="py-2.5 px-4 text-sm font-medium bg-gray-100 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-100">
                <option value="">Todas las Categorías</option>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}" {{ request('categoria') == $categoria->id ? 'selected' : '' }}>
                        {{ $categoria->nombre }}
                    </option>
                @endforeach
            </select>

            <!-- Filtro de subcategoría -->
            <select name="subcategoria" class="py-2.5 px-4 text-sm font-medium bg-gray-100 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-100">
                <option value="">Todas las Subcategorías</option>
                @foreach($subcategorias as $subcategoria)
                    <option value="{{ $subcategoria->id }}" {{ request('subcategoria') == $subcategoria->id ? 'selected' : '' }}>
                        {{ $subcategoria->nombre }}
                    </option>
                @endforeach
            </select>

            <!-- Campo de búsqueda -->
            <input type="text" name="buscar" value="{{ request('buscar') }}" class="flex-grow p-2.5 text-sm bg-gray-50 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-100" placeholder="Buscar producto...">
            <button type="submit" class="p-2.5 bg-blue-700 text-white rounded-lg hover:bg-blue-800 focus:ring-2 focus:ring-blue-300">
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6a4 4 0 014 4 4 4 0 01-.883 2.668l-4.389 6.182A4 4 0 116 10h1a4 4 0 013-3.901V6a2 2 0 114 0v1a2 2 0 11-4 0V6z" />
                </svg>
            </button>
        </div>
    </form>

    <!-- Grid de productos -->
    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach($productos as $producto)
            <div class="border rounded-lg overflow-hidden shadow-md p-4 bg-white dark:bg-gray-800">
                <a href="{{ route('catalogo.show', $producto->id) }}">
                    <img src="{{ asset('imagenes/' . $producto->imagen) }}" alt="{{ $producto->nombre }}" class="p-8 rounded-t-lg w-full h-40 object-cover mb-4">
                </a>
                <h3 class="text-lg font-semibold tracking-tight text-gray-900 dark:text-white">{{ $producto->nombre }}</h3>
                <div class="flex items-center mt-2.5 mb-5">
                    <!-- Estrellas de calificación -->
                    <div class="flex items-center space-x-1">
                        <svg class="w-4 h-4 text-yellow-300" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                            <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                        </svg>
                        <!-- Repite o ajusta las estrellas según la calificación del producto -->
                    </div>
                    <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded ml-3">5.0</span>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-3xl font-bold text-gray-900 dark:text-white">${{ number_format($producto->precio, 2) }}</span>
                    <a href="{{ route('catalogo.show', $producto->id) }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5">
                        Ver más
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
