<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chat;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class MessageController extends Controller
{
    /**
     * Muestra el índice de mensajes (historial de chats).
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $user = Auth::user();

        if ($user->isSuperAdmin()) {
            // Para superadministradores, mostrar todos los usuarios
            $users = User::all();
        } elseif ($user->isAdmin()) {
            // Para administradores, mostrar solo usuarios con rol 'admin' y 'cliente'
            $users = User::whereIn('role', ['admin', 'cliente'])->get();
        } else {
            // Para otros roles (clientes u otros), denegar acceso
            abort(403, 'No tienes permiso para acceder a esta página.');
        }

        return view('mensajes.index', compact('users'));
    }

    /**
     * Muestra los chats de un usuario.
     *
     * @param int $userId
     * @return \Illuminate\Http\JsonResponse
     */
    public function getChats($userId)
    {
        $user = Auth::user();
    
        if ($user->isSuperAdmin()) {
            // Superadministradores pueden ver chats de cualquier usuario
            $targetUser = User::find($userId);
            if (!$targetUser) {
                return response()->json(['message' => 'Usuario no encontrado.'], 404);
            }
        } elseif ($user->isAdmin()) {
            // Administradores solo pueden ver chats de usuarios con rol 'admin' y 'cliente'
            $targetUser = User::where('id', $userId)->whereIn('role', ['admin', 'cliente'])->first();
            if (!$targetUser) {
                return response()->json(['message' => 'Usuario no encontrado o no tienes permiso para ver sus chats.'], 404);
            }
        } else {
            // Otros roles no tienen permiso
            return response()->json(['message' => 'No tienes permiso para ver estos chats.'], 403);
        }
    
        $chats = Chat::where('user_id', $userId)->orderBy('created_at', 'desc')->get();
    
        return response()->json(['chats' => $chats]);
    }    

    /**
     * Muestra los mensajes de un chat específico.
     *
     * @param int $chatId
     * @return \Illuminate\Http\JsonResponse
     */
    public function getMessages($chatId)
    {
        $user = Auth::user();
    
        $chat = Chat::with('user')->find($chatId);
    
        if (!$chat) {
            return response()->json(['message' => 'Chat no encontrado.'], 404);
        }
    
        if ($user->isSuperAdmin()) {
            // Superadministradores pueden ver cualquier chat
            // No se necesita ninguna restricción adicional
        } elseif ($user->isAdmin()) {
            // Administradores solo pueden ver chats de usuarios con rol 'admin' y 'cliente'
            if (!in_array($chat->user->role, ['admin', 'cliente'])) {
                return response()->json(['message' => 'No tienes permiso para ver estos mensajes.'], 403);
            }
        } else {
            // Otros roles no tienen permiso
            return response()->json(['message' => 'No tienes permiso para ver estos mensajes.'], 403);
        }
    
        $messages = $chat->messages()->orderBy('created_at')->get();
    
        return response()->json(['messages' => $messages]);
    }    
}
