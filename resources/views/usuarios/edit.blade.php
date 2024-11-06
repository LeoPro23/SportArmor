@extends('plantilla.plantilla')

@section('contenido')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Editar Usuario</h1>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>- {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('usuarios.update', $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="name" class="block text-gray-700">Nombre</label>
            <input type="text" name="name" id="name" class="w-full border rounded px-3 py-2" value="{{ old('name', $user->name) }}" required>
        </div>

        <div class="mb-4">
            <label for="email" class="block text-gray-700">Email</label>
            <input type="email" name="email" id="email" class="w-full border rounded px-3 py-2" value="{{ old('email', $user->email) }}" required>
        </div>

        <div class="mb-4">
            <label for="password" class="block text-gray-700">Contraseña (dejar en blanco para mantener la actual)</label>
            <input type="password" name="password" id="password" class="w-full border rounded px-3 py-2">
        </div>

        <div class="mb-4">
            <label for="password_confirmation" class="block text-gray-700">Confirmar Contraseña</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="w-full border rounded px-3 py-2">
        </div>

        <div class="mb-4">
            <div x-data="{ open: false, role: '{{ old('role', $user->role ?? '') }}' }" class="mb-4 relative">
                <label for="role" class="block text-gray-700">Rol</label>
                <div @click="open = !open" class="border rounded px-3 py-2 w-full cursor-pointer flex items-center justify-between">
                    <span x-text="role ? role.charAt(0).toUpperCase() + role.slice(1) : 'Selecciona un rol'"></span>
                    <i class="fas fa-caret-down"></i>
                </div>
            
                <div x-show="open" @click.away="open = false" class="absolute mt-1 w-full border rounded bg-white shadow-lg z-10">
                    <div @click="role = 'cliente'; open = false" class="px-3 py-2 cursor-pointer hover:bg-gray-100 flex items-center">
                        <i class="fas fa-user text-green-500 mr-2"></i> Cliente
                    </div>
                    @if(auth()->user()->isSuperAdmin())
                        <div @click="role = 'admin'; open = false" class="px-3 py-2 cursor-pointer hover:bg-gray-100 flex items-center">
                            <i class="fas fa-user-shield text-blue-500 mr-2"></i> Administrador
                        </div>
                        <div @click="role = 'superadmin'; open = false" class="px-3 py-2 cursor-pointer hover:bg-gray-100 flex items-center">
                            <i class="fas fa-crown text-yellow-500 mr-2"></i> Superadministrador
                        </div>
                    @elseif(auth()->user()->isAdmin())
                        <div @click="role = 'admin'; open = false" class="px-3 py-2 cursor-pointer hover:bg-gray-100 flex items-center">
                            <i class="fas fa-user-shield text-blue-500 mr-2"></i> Administrador
                        </div>
                    @endif
                </div>
                <input type="hidden" name="role" :value="role" />
            </div>            
        </div>

        <!-- Campo para imagen de perfil -->
        <div class="mb-4">
            <label for="profile_image" class="block text-gray-700">Foto de Perfil</label>
            @if($user->profile_image)
                <img src="{{ asset('perfil/' . $user->profile_image) }}" alt="Foto de Perfil" class="w-32 h-32 object-cover mb-2">
            @else
                <img src="{{ asset('perfil/default-profile.png') }}" alt="Foto de Perfil" class="w-32 h-32 object-cover mb-2">
            @endif
            <input type="file" name="profile_image" id="profile_image" class="w-full border rounded px-3 py-2">
            <p class="text-sm text-gray-600">Deja este campo vacío si no deseas cambiar la foto.</p>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Actualizar Usuario</button>
        <a href="{{ route('usuarios.index') }}" class="text-gray-700 ml-4">Cancelar</a>
    </form>
</div>
@endsection
