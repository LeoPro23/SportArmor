@extends('plantilla.plantilla')

@section('contenido')
    <div class="flex h-screen py-5">
        <!-- Menú lateral de usuarios -->
        <div class="w-1/4 bg-gray-100 p-4 overflow-y-auto">
            <h2 class="text-2xl font-bold mb-4">
                @if(Auth::user()->isSuperAdmin())
                    Todos los Usuarios
                @else
                    Administradores y Clientes
                @endif
            </h2>
            <ul id="user-list" class="space-y-2">
                @foreach($users as $user)
                    <li>
                        <button data-user-id="{{ $user->id }}" class="user-button w-full text-left p-2 bg-white rounded shadow hover:bg-blue-100">
                            {{ $user->name }} 
                            @if($user->isSuperAdmin())
                                <span class="text-sm text-gray-500">(Superadmin)</span>
                            @elseif($user->isAdmin())
                                <span class="text-sm text-gray-500">(Admin)</span>
                            @else
                                <span class="text-sm text-gray-500">(Cliente)</span>
                            @endif
                        </button>
                    </li>
                @endforeach
            </ul>
        </div>

        <!-- Menú lateral de chats -->
        <div class="w-1/4 bg-gray-50 p-4 overflow-y-auto">
            <h2 class="text-2xl font-bold mb-4">Chats</h2>
            <ul id="chat-list" class="space-y-2">
                <!-- Chats se cargarán dinámicamente -->
                <p class="text-gray-500">Selecciona un usuario para ver sus chats.</p>
            </ul>
        </div>

        <!-- Área principal para mostrar mensajes -->
        <div class="w-2/4 bg-white p-4 overflow-y-auto">
            <h2 class="text-2xl font-bold mb-4" id="chat-title">Selecciona un chat para ver los mensajes</h2>
            <div id="messages-container" class="space-y-4">
                <!-- Mensajes se cargarán dinámicamente -->
            </div>
        </div>
    </div>

    <!-- Scripts para manejar la carga dinámica -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const userList = document.getElementById('user-list');
            const chatList = document.getElementById('chat-list');
            const messagesContainer = document.getElementById('messages-container');
            const chatTitle = document.getElementById('chat-title');

            let selectedUserId = null;
            let selectedChatId = null;

            // Manejar clic en un usuario
            userList.addEventListener('click', async (e) => {
                if (e.target.classList.contains('user-button')) {
                    selectedUserId = e.target.getAttribute('data-user-id');
                    chatList.innerHTML = '';
                    messagesContainer.innerHTML = '';
                    chatTitle.textContent = 'Selecciona un chat para ver los mensajes';

                    // Obtener chats del usuario seleccionado
                    const response = await fetch(`/mensajes/chats/${selectedUserId}`);
                    const data = await response.json();

                    if (response.ok && data.chats.length > 0) {
                        data.chats.forEach(chat => {
                            const li = document.createElement('li');
                            const button = document.createElement('button');
                            const fecha = new Date(chat.created_at).toLocaleString();
                            button.textContent = `Chat iniciado el ${fecha}`;
                            button.setAttribute('data-chat-id', chat.id);
                            button.classList.add('chat-button', 'w-full', 'text-left', 'p-2', 'bg-white', 'rounded', 'shadow', 'hover:bg-blue-100');
                            li.appendChild(button);
                            chatList.appendChild(li);
                        });
                    } else if (response.ok) {
                        chatList.innerHTML = '<p class="text-gray-500">No hay chats disponibles para este usuario.</p>';
                    } else {
                        chatList.innerHTML = `<p class="text-red-500">${data.message}</p>`;
                    }
                }
            });

            // Manejar clic en un chat
            chatList.addEventListener('click', async (e) => {
                if (e.target.classList.contains('chat-button')) {
                    selectedChatId = e.target.getAttribute('data-chat-id');
                    messagesContainer.innerHTML = '';
                    chatTitle.textContent = `Chat ID: ${selectedChatId}`;

                    // Obtener mensajes del chat seleccionado
                    const response = await fetch(`/mensajes/chat/${selectedChatId}`);
                    const data = await response.json();

                    if (response.ok && data.messages.length > 0) {
                        data.messages.forEach(msg => {
                            const div = document.createElement('div');
                            div.classList.add('flex', msg.sender === 'user' ? 'justify-end' : 'justify-start');

                            const p = document.createElement('p');
                            p.classList.add('p-2', 'rounded-lg', 'max-w-xs');

                            if (msg.sender === 'user') {
                                p.classList.add('bg-blue-500', 'text-white');
                            } else {
                                p.classList.add('bg-gray-200', 'text-gray-700');
                            }

                            p.textContent = msg.message;
                            div.appendChild(p);
                            messagesContainer.appendChild(div);
                        });
                        // Scroll al final del contenedor de mensajes
                        messagesContainer.scrollTop = messagesContainer.scrollHeight;
                    } else if (response.ok) {
                        messagesContainer.innerHTML = '<p class="text-gray-500">No hay mensajes en este chat.</p>';
                    } else {
                        messagesContainer.innerHTML = `<p class="text-red-500">${data.message}</p>`;
                    }
                }
            });
        });
    </script>
@endsection
