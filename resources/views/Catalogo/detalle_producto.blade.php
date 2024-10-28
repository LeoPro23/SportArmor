@extends('plantilla.plantilla')

@section('contenido')
<div class="container mx-auto my-8">
    <div class="flex flex-col lg:flex-row gap-8">
        <!-- Imagen del producto -->
        <div class="w-full lg:w-1/2">
            <img src="{{ asset('imagenes/' . $producto->imagen) }}" alt="{{ $producto->nombre }}" class="w-full h-auto object-cover">
        </div>

        <!-- Detalles del producto -->
        <div class="w-full lg:w-1/2">
            <h2 class="text-2xl font-bold mb-4">{{ $producto->nombre }}</h2>
            <p class="text-gray-600 mb-4">{{ $producto->descripcion }}</p>
            <p class="text-3xl font-semibold text-blue-600 mb-4">${{ number_format($producto->precio, 2) }}</p>
            
            <!-- Formulario para seleccionar talla y cantidad -->
            <form method="POST" action="{{ route('carrito.add', $producto->id) }}">
                @csrf
                
                <!-- Tallas disponibles -->
                <h3 class="text-lg font-semibold mb-2">Tallas Disponibles</h3>
                <select name="talla" class="border border-gray-300 rounded px-4 py-2 mb-4 w-full">
                    <option value="" disabled selected>Selecciona una talla</option>
                    @foreach($producto->tallas as $talla)
                        <option value="{{ $talla->id }}">{{ $talla->talla }}</option>
                    @endforeach
                </select>

                <!-- Cantidad -->
                <label for="cantidad" class="block text-lg font-semibold mb-2">Cantidad</label>
                <input type="number" name="cantidad" id="cantidad" min="1" max="{{ $producto->stock }}" value="1" class="border border-gray-300 rounded px-4 py-2 mb-4 w-full">

                <!-- Stock disponible -->
                <p class="text-gray-500 mb-4">Stock disponible: {{ $producto->stock }}</p>

                <!-- Botón añadir al carrito -->
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Añadir al carrito</button>
            </form>
        </div>
    </div>

    <!-- Productos relacionados -->
    <div class="mt-12">
        <h3 class="text-xl font-bold mb-4">Productos Relacionados</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($relacionados as $relacionado)
                <div class="border rounded-lg overflow-hidden shadow-md p-4">
                    <img src="{{ asset('imagenes/' . $relacionado->imagen) }}" alt="{{ $relacionado->nombre }}" class="w-full h-40 object-cover mb-4">
                    <h4 class="text-lg font-semibold">{{ $relacionado->nombre }}</h4>
                    <p class="text-gray-600">${{ number_format($relacionado->precio, 2) }}</p>
                    <a href="{{ route('catalogo.show', $relacionado->id) }}" class="text-blue-500 hover:text-blue-700">Ver más</a>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
