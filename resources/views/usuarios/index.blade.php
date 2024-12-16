@extends('plantilla.plantilla')

@section('contenido')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Gestión de Usuarios</h1>
    
    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    <a href="{{ route('usuarios.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Crear Nuevo Usuario</a>

    <!-- Formulario de búsqueda -->
    <form action="{{ route('usuarios.index') }}" method="GET" class="mt-4 mb-6">
        <div class="flex gap-4">
            <input type="text" name="search_id" placeholder="ID" class="px-4 py-2 border rounded" value="{{ request()->get('search_id') }}">
            <input type="text" name="search_name" placeholder="Nombre" class="px-4 py-2 border rounded" value="{{ request()->get('search_name') }}">
            <input type="text" name="search_email" placeholder="Email" class="px-4 py-2 border rounded" value="{{ request()->get('search_email') }}">
            
            <select name="role" class="px-4 py-2 border rounded">
                <option value="">Seleccionar Rol</option>
                <option value="admin" {{ request()->get('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                
                @if(auth()->user()->isSuperAdmin())
                    <option value="superadmin" {{ request()->get('role') == 'superadmin' ? 'selected' : '' }}>Superadmin</option>
                @endif

                <option value="cliente" {{ request()->get('role') == 'cliente' ? 'selected' : '' }}>Cliente</option>
            </select>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Buscar</button>
        </div>
    </form>

    <table class="table-auto w-full mt-4">
        <thead>
            <tr>
                <th class="px-4 py-2">ID</th>
                <th class="px-4 py-2">Foto</th>
                <th class="px-4 py-2">Nombre</th>
                <th class="px-4 py-2">Email</th>
                <th class="px-4 py-2">Rol</th>
                <th class="px-4 py-2">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td class="border px-4 py-2">{{ $user->id }}</td>

                <td class="border px-4 py-2">
                    @if($user->profile_image)
                        <img src="{{ asset('perfil/' . $user->profile_image) }}" alt="Foto de Perfil" class="w-12 h-12 rounded-full object-cover">
                    @else
                        <img src="{{ asset('perfil/default-profile.png') }}" alt="Foto de Perfil" class="w-12 h-12 rounded-full object-cover">
                    @endif
                </td>

                <td class="border px-4 py-2">{{ $user->name }}</td>
                <td class="border px-4 py-2">{{ $user->email }}</td>
                <td class="border px-4 py-2  items-center gap-2">
                    @if($user->role === 'admin')
                        <i class="fas fa-user-shield text-blue-500"></i>
                    @elseif($user->role === 'superadmin')
                        <i class="fas fa-crown text-yellow-500"></i>
                    @elseif($user->role === 'cliente')
                        <i class="fas fa-user text-green-500"></i>
                    @endif
                    <span>{{ ucfirst($user->role) }}</span>
                </td>
                <td class="border px-4 py-2">
                    <a href="{{ route('usuarios.edit', $user->id) }}" class="text-blue-500 hover:text-blue-700">Editar</a>
                    <a href="{{ route('usuarios.confirm', $user->id) }}" class="text-red-500 hover:text-red-700 ml-2">Eliminar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Paginación -->
    <div class="mt-4">
        {{ $users->links() }}
    </div>
</div>

@endsection
