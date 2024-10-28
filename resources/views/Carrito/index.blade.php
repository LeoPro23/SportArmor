@extends('plantilla.plantilla')

@section('contenido')
<div class="container mx-auto my-8">

    @if(session('success'))
        <div class="bg-green-500 text-white p-4 rounded mb-4 text-center">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-500 text-white p-4 rounded mb-4 text-center">
            {{ session('error') }}
        </div>
    @endif

    <h2 class="text-2xl font-bold mb-6 text-center">Carrito de Compras</h2>

    @if(count($carrito) > 0)
        <div class="bg-white shadow-md rounded-lg p-6">
            @foreach($carrito as $key => $item)
                <div class="flex items-center justify-between border-b pb-4 mb-4">
                    <div class="flex items-center gap-4">
                        <img src="{{ asset('imagenes/' . $item['imagen']) }}" alt="{{ $item['nombre'] }}" class="w-20 h-20 object-cover">
                        <div>
                            <h3 class="text-lg font-semibold">{{ $item['nombre'] }}</h3>
                            <p class="text-gray-600">Talla: {{ $item['talla_id'] }}</p>
                            <p class="text-gray-600">Precio: ${{ number_format($item['precio'], 2) }}</p>
                        </div>
                    </div>

                    <div class="flex items-center gap-4">
                        <form action="{{ route('carrito.update', $key) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <input type="number" name="cantidad" value="{{ $item['cantidad'] }}" min="1" class="w-16 border rounded p-2 text-center">
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Actualizar</button>
                        </form>

                        <form action="{{ route('carrito.remove', $key) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-700">Eliminar</button>
                        </form>
                    </div>
                </div>
            @endforeach

            <!-- Aplicar Cupón -->
            <form action="{{ route('carrito.aplicarCupon') }}" method="POST" class="my-4">
                @csrf
                <label for="cupon" class="block text-lg font-semibold mb-2">Código de Cupón</label>
                <input type="text" name="codigo_cupon" id="cupon" class="border rounded w-full p-2 mb-2" placeholder="Ingrese su cupón">
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-700">Aplicar Cupón</button>
            </form>

            <!-- Total del carrito -->
            <div class="text-right mt-6">
                <h3 class="text-xl font-semibold">
                    Total: ${{ number_format(collect($carrito)->sum(fn($item) => $item['precio'] * $item['cantidad']), 2) }}
                </h3>
                <form action="{{ route('carrito.finalizarCompra') }}" method="POST" class="mt-4">
                    @csrf
                    <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-800">Finalizar Compra</button>
                </form>
            </div>
        </div>
    @else
        <p class="text-center text-gray-600">El carrito está vacío.</p>
    @endif
</div>
@endsection
