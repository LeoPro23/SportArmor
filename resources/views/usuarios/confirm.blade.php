@extends('plantilla.plantilla')

@section('contenido')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Eliminar Usuario</h1>

    <div class="bg-yellow-100 text-yellow-700 p-4 rounded mb-4 flex items-center">
        @if($user->role === 'admin')
            <i class="fas fa-user-shield text-blue-500 mr-2"></i>
        @elseif($user->role === 'superadmin')
            <i class="fas fa-crown text-yellow-500 mr-2"></i>
        @elseif($user->role === 'cliente')
            <i class="fas fa-user text-green-500 mr-2"></i>
        @endif
        <p>¿Estás seguro de que deseas eliminar al usuario <strong>{{ $user->name }}</strong> con el rol <strong>{{ ucfirst($user->role) }}</strong>? Esta acción no se puede deshacer.</p>
    </div>

    <form action="{{ route('usuarios.destroy', $user->id) }}" method="POST">
        @csrf
        @method('DELETE')

        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Sí, eliminar usuario</button>
        <a href="{{ route('usuarios.index') }}" class="text-gray-700 ml-4">Cancelar</a>
    </form>
</div>
@endsection
