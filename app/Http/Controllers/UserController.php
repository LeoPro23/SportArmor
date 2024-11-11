<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // Mostrar la lista de usuarios
    public function index()
    {
        if (auth()->user()->isSuperAdmin()) {
            $users = User::where('id', '!=', auth()->id())->paginate(5);
        } else {
            // Excluir al superadministrador de la lista para administradores regulares
            $users = User::where('id', '!=', auth()->id())
                         ->where('role', '!=', 'superadmin')
                         ->paginate(5);
        }
        return view('usuarios.index', compact('users'));
    }    

    // Mostrar formulario para crear un nuevo usuario
    public function create()
    {
        return view('usuarios.create');
    }

    // Almacenar un nuevo usuario en la base de datos
    public function store(Request $request)
    {
        $allowedRoles = ['cliente'];
        if (auth()->user()->isAdmin()) {
            $allowedRoles[] = 'admin';
        }
        if (auth()->user()->isSuperAdmin()) {
            $allowedRoles[] = 'superadmin';
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
            'role' => ['required', Rule::in($allowedRoles)],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('usuarios.index')->with('success', 'Usuario creado correctamente.');
    }

    // Mostrar formulario para editar un usuario existente
    public function edit($id)
    {
        $user = User::findOrFail($id);
    
        // Si el usuario autenticado no es superadmin y el usuario a editar es superadmin, denegar acceso
        if (!$this->canModifyUser($user)) {
            return redirect()->route('usuarios.index')->with('error', 'No tienes permisos para editar a este usuario.');
        }
    
        return view('usuarios.edit', compact('user'));
    }

    // Actualizar un usuario existente en la base de datos
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        if (!$this->canModifyUser($user)) {
            return redirect()->route('usuarios.index')->with('error', 'No tienes permisos para actualizar a este usuario.');
        }

        $allowedRoles = ['cliente'];
        if (auth()->user()->isAdmin()) {
            $allowedRoles[] = 'admin';
        }
        if (auth()->user()->isSuperAdmin()) {
            $allowedRoles[] = 'superadmin';
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
            'password' => 'nullable|string|confirmed|min:8',
            //'role' => 'required|in:admin,cliente',
            'role' => ['required', Rule::in($allowedRoles)],
            'profile_image' => ['nullable', 'image', 'max:2048'], // Máximo 2MB
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;

        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        // Después de actualizar los campos del usuario
        if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');
            $imageName = time() . '_' . $user->id . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('perfil'), $imageName);

            // Eliminar la imagen anterior si existe
            if ($user->profile_image && file_exists(public_path('perfil/' . $user->profile_image))) {
                unlink(public_path('perfil/' . $user->profile_image));
            }

            $user->profile_image = $imageName;
        }

        $user->save();


        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado correctamente.');
    }

    // Eliminar un usuario de la base de datos
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        if (!$this->canModifyUser($user)) {
            return redirect()->route('usuarios.index')->with('error', 'No tienes permisos para eliminar a este usuario.');
        }

        // Evitar que el usuario se elimine a sí mismo
        if ($user->id == auth()->id()) {
            return redirect()->route('usuarios.index')->with('error', 'No puedes eliminar tu propio usuario.');
        }

        // Eliminar la imagen de perfil si existe
        if ($user->profile_image && file_exists(public_path('perfil/' . $user->profile_image))) {
            unlink(public_path('perfil/' . $user->profile_image));
        }

        $user->delete();

        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado correctamente.');
    }

    // Confirmación de eliminación
    public function confirm($id)
    {
        $user = User::findOrFail($id);
    
        if (!$this->canModifyUser($user)) {
            return redirect()->route('usuarios.index')->with('error', 'No tienes permisos para eliminar a este usuario.');
        }
    
        return view('usuarios.confirm', compact('user'));
    }

    // Método auxiliar para verificar si el usuario puede ser modificado
    private function canModifyUser($user)
    {
        // Si el usuario autenticado es superadmin, puede modificar a cualquiera
        if (auth()->user()->isSuperAdmin()) {
            return true;
        }

        // Si el usuario a modificar es superadmin, negar acceso
        if ($user->isSuperAdmin()) {
            return false;
        }

        // Si el usuario a modificar es un administrador y el usuario autenticado es administrador, permitir
        return true;
    }
}
