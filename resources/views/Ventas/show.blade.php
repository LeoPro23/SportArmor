@extends('plantilla.plantilla')

@section('contenido')
<div class="container mx-auto my-8">
    <h2 class="text-2xl font-bold mb-6 text-center">Detalles de la Venta #{{ $venta->id }}</h2>
    
    <p><strong>Fecha de Venta:</strong> {{ $venta->fecha_venta }}</p>
    <p><strong>Cupón:</strong> {{ $venta->cupon ? $venta->cupon->codigo : 'N/A' }}</p>
    <p><strong>Total:</strong> ${{ number_format($venta->total, 2) }}</p>

    <h3 class="text-xl font-semibold mt-6 mb-4">Productos en la Venta</h3>
    <table class="w-full border border-gray-300">
        <thead>
            <tr class="bg-gray-100">
                <th class="py-2 px-4 border-b">Imagen</th>
                <th class="py-2 px-4 border-b">Producto</th>
                <th class="py-2 px-4 border-b">Talla</th>
                <th class="py-2 px-4 border-b">Cantidad</th>
                <th class="py-2 px-4 border-b">Precio Unitario</th>
                <th class="py-2 px-4 border-b">Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($venta->detalles as $detalle)
            <tr>
                <td class="py-2 px-4 border-b text-center">
                    <img src="{{ asset('imagenes/' . $detalle->producto->imagen) }}" alt="{{ $detalle->producto->nombre }}" class="w-16 h-16 object-cover">
                </td>
                <td class="py-2 px-4 border-b">{{ $detalle->producto->nombre }}</td>
                <td class="py-2 px-4 border-b">{{ $detalle->talla ? $detalle->talla->talla : 'N/A' }}</td>
                <td class="py-2 px-4 border-b text-center">{{ $detalle->cantidad }}</td>
                <td class="py-2 px-4 border-b text-center">${{ number_format($detalle->precio_unitario, 2) }}</td>
                <td class="py-2 px-4 border-b text-center">${{ number_format($detalle->cantidad * $detalle->precio_unitario, 2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        <a href="{{ route('ventas.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-700">Regresar a Ventas</a>
    </div>
</div>
@endsection
