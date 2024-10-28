@extends('plantilla.plantilla')

@section('contenido')
<div class="container mx-auto my-8">
    <h2 class="text-2xl font-bold mb-6 text-center">Listado de Ventas</h2>
    
    <table class="w-full border border-gray-300">
        <thead>
            <tr class="bg-gray-100">
                <th class="py-2 px-4 border-b">ID</th>
                <th class="py-2 px-4 border-b">ID Usuario</th>
                <th class="py-2 px-4 border-b">Fecha de Venta</th>
                <th class="py-2 px-4 border-b">Cupón</th>
                <th class="py-2 px-4 border-b">Total</th>
                <th class="py-2 px-4 border-b">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ventas as $venta)
            <tr>
                <td class="py-2 px-4 border-b text-center">{{ $venta->id }}</td>
                <td class="py-2 px-4 border-b text-center">{{ $venta->user ? $venta->user->id : 'N/A' }}</td>
                <td class="py-2 px-4 border-b text-center">{{ $venta->fecha_venta }}</td>
                <td class="py-2 px-4 border-b text-center">{{ $venta->cupon ? $venta->cupon->codigo : 'N/A' }}</td>
                <td class="py-2 px-4 border-b text-center">${{ number_format($venta->total, 2) }}</td>
                <td class="py-2 px-4 border-b text-center">
                    <a href="{{ route('ventas.show', $venta->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Ver Detalles</a>
                    <button class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-700">Visualizar</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
