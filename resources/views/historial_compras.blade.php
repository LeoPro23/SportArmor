@extends('plantilla.plantilla')

@section('contenido')
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6">Historial de Compras</h1>

        @if($ventas->isEmpty())
            <p class="text-gray-600">No tienes compras registradas.</p>
        @else
            @foreach($ventas as $venta)
                <div class="bg-white shadow-md rounded-lg mb-6">
                    <div class="flex justify-between items-center bg-gray-200 p-4 rounded-t-lg">
                        <div>
                            <span class="font-semibold">Fecha de Compra:</span> {{ \Carbon\Carbon::parse($venta->fecha_venta)->format('d/m/Y H:i') }}
                        </div>
                        <div>
                            <span class="font-semibold">Total:</span> ${{ number_format($venta->total, 2) }}
                        </div>
                    </div>
                    <div class="p-4">
                        @if($venta->cupon)
                            <div class="mb-4">
                                <span class="font-semibold">Cupón Aplicado:</span> {{ $venta->cupon->codigo }} ({{ $venta->cupon->descuento }}% de descuento)
                            </div>
                        @endif
                        <table class="min-w-full bg-white">
                            <thead>
                                <tr>
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
                                        <td class="py-2 px-4 border-b">{{ $detalle->producto->nombre }}</td>
                                        <td class="py-2 px-4 border-b">{{ $detalle->talla ? $detalle->talla->talla : 'N/A' }}</td>
                                        <td class="py-2 px-4 border-b">{{ $detalle->cantidad }}</td>
                                        <td class="py-2 px-4 border-b">${{ number_format($detalle->precio_unitario, 2) }}</td>
                                        <td class="py-2 px-4 border-b">${{ number_format($detalle->cantidad * $detalle->precio_unitario, 2) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
@endsection
