<!DOCTYPE html>
<html class="scroll-smooth scroll-p-20" lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sport Armor</title>

    <!-- Agregar CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
    
    <!-- ICONOS / FUENTES-->

    <link rel="icon" href="{{ asset('imagenes/logo.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Russo+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400..900&display=swap" rel="stylesheet">
    
    <!-- JS / LIBRERÍAS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
    <script src="{{ asset('js/cards.js') }}"></script>
    <script src="{{ asset('js/multilenguaje.js') }}"></script>
    <script src="{{ asset('js/carrousel.js') }}"></script>
    <script src="{{ asset('js/modooscuro.js') }}"></script>

    <!-- Alpine.js para interactividad -->
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

</head>
<body style="font-family: 'Poppins', sans-serif;">
    
    <nav id="header-ff" class="fixed top-0 left-0 right-0 z-50 bg-gray-200">
        <div class="container mx-auto flex flex-wrap items-center justify-between p-4">
            <div>
                <a href="#"><img id="logo-header" class="h-14 md:h-16 lg:h-20" src="{{ asset('imagenes/logo-header.png') }}" alt="LOGO"></a>
            </div>

            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-cta">
                <ul id="navitems" class="flex flex-col font-semibold p-4 bg-gray-900 rounded-lg md:items-center md:bg-transparent md:p-0 mt-4 md:flex-row md:space-x-8 md:mt-0 md:border-0 lg:text-black text-white hover:text-black md:hover:text-black">
                    <li><a href="{{ url('/') }}" class="block py-2 pl-3 pr-4 rounded-lg hover:bg-black md:hover:bg-transparent">Inicio</a></li>
                    <li><a href="{{ url('/#pregunta') }}" class="block py-2 pl-3 pr-4 rounded-lg hover:bg-black md:hover:bg-transparent">Nosotros</a></li>
                    <li><a href="{{ url('/catalogo') }}" class="block py-2 pl-3 pr-4 rounded-lg hover:bg-black md:hover:bg-transparent">Catálogo</a></li>
                    <li><a href="{{ url('/#testimonios') }}" class="block py-2 pl-3 pr-4 rounded-lg hover:bg-black md:hover:bg-transparent">Testimonios</a></li>
                    <li><a href="{{ url('/privacidad') }}" class="block py-2 pl-3 pr-4 rounded-lg hover:bg-black md:hover:bg-transparent">Privacidad</a></li>
                </ul>      
            </div>

            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-2" id="navbar-cta">
                <ul id="navitems" class="flex flex-col font-semibold p-4 bg-gray-900 rounded-lg md:items-center md:bg-transparent md:p-0 mt-4 md:flex-row md:space-x-8 md:mt-0 md:border-0 lg:text-black text-white hover:text-black md:hover:text-black">
                    <li class="relative">
                        <a href="{{ url('/carrito') }}" class="block py-2 pl-3 pr-4 rounded-lg hover:bg-black md:hover:bg-transparent">
                            <i class="fa-solid fa-shopping-cart"></i>
                            Carrito
                            
                        </a>
                    </li>
                </ul>
            </div>

            <div class="flex items-center md:order-3">
                @if (Auth::check())
                    <!-- Dropdown para usuario autenticado con Alpine.js -->
                    <div x-data="{ open: false }" class="relative">
                        <button @click="open = !open" class="flex items-center text-gray-800 hover:text-gray-600">
                            @if(Auth::user()->profile_image)
                                <img src="{{ asset('perfil/' . Auth::user()->profile_image) }}" alt="Foto de Perfil" class="w-8 h-8 rounded-full object-cover mr-2">
                            @else
                                <img src="{{ asset('perfil/default-profile.png') }}" alt="Foto de Perfil" class="w-8 h-8 rounded-full mr-2">
                            @endif
                            <span>{{ Auth::user()->name }}</span>
                            <svg class="w-4 h-4 ml-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div x-show="open" @click.outside="open = false" class="absolute right-0 mt-2 w-48 bg-white shadow-lg rounded-lg py-2">
                            <a href="{{ url(route('profile.edit')) }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-200">Perfil</a>
                            <a href="{{ url(route('historial_compras')) }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-200">Historial de Compras</a>
                            <form method="POST" action="{{ url(route('logout')) }}">
                                @csrf
                                <button type="submit" class="block w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-200">
                                    Cerrar Sesión
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <!-- Mostrar botón de iniciar sesión si no está autenticado -->
                    <a href="{{ url(route('login')) }}" class="text-gray-800 hover:text-gray-600">Iniciar Sesión</a>
                @endif
            </div>
        </div>
        <!-- Opciones de mantenedor para administradores -->
        @auth
            @if(Auth::user()->isAdmin())
                <ul class="flex flex-col font-semibold bg-gray-900 p-4 rounded-lg md:items-center md:bg-transparent mt-2 md:flex-row md:space-x-4 text-center text-white">
                    <li><a href="{{ url(route('categorias.index')) }}" class="text-gray-800 hover:text-blue-500">Categorías</a></li>
                    <li><a href="{{ url(route('subcategorias.index')) }}" class="text-gray-800 hover:text-blue-500">Subcategorías</a></li>
                    <li><a href="{{ url(route('productos.index')) }}" class="text-gray-800 hover:text-blue-500">Productos</a></li>
                    <li><a href="{{ url(route('tallas.index')) }}" class="text-gray-800 hover:text-blue-500">Tallas</a></li>
                    <li><a href="{{ url(route('cupones.index')) }}" class="text-gray-800 hover:text-blue-500">Cupones</a></li>
                    <li><a href="{{ url(route('ventas.index')) }}" class="text-gray-800 hover:text-blue-500">Ventas</a></li>
                    <li><a href="{{ url(route('usuarios.index')) }}" class="text-gray-800 hover:text-blue-500">Usuarios</a></li>
                    <li><a href="{{ url(route('mensajes.index')) }}" class="text-gray-800 hover:text-blue-500">Mensajes Chatbot</a></li>
                    <li><a href="{{ url(route('graficasbi.inteligencia_negocios')) }}" class="text-gray-800 hover:text-blue-500">Graficas BI</a></li>

                    @if(Auth::user()->isSuperAdmin())
                        <!-- Opciones exclusivas para superadministrador -->
                    @endif
                </ul>
            @endif
        @endauth
    </nav>

    <!-- Botón del Chatbot de Google Gemini -->
    <div>
        <button id="chatButtonGemini" class="bg-white rounded-full w-12 h-12 flex items-center justify-center fixed bottom-4 right-4 z-40">
            <i class="fa-solid fa-comment-dots fa-2xl" style="color: #2a88e0"></i>
        </button>
    </div>

    <!-- Ventana de Chat para Google Gemini -->
    <div id="chat-container-gemini" class="hidden fixed bottom-16 right-4 w-96 z-50">
        <div class="bg-white shadow-md rounded-lg max-w-lg w-full">
            <!-- Encabezado del chat -->
            <div class="p-4 border-b bg-blue-500 text-white rounded-t-lg flex items-center space-x-3">
                <img src="{{ asset('imagenes/bot.jpg') }}" alt="Bot Gemini" class="w-8 h-8 rounded-full">
                <p class="text-lg font-semibold">Sport Armor Bot</p>
                <button id="close-chat-gemini" class="ml-auto text-gray-300 hover:text-gray-400 focus:outline-none focus:text-gray-400 absolute right-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            @auth
            <!-- Contenido del chat para usuarios autenticados -->
            <div id="chatbox-gemini" class="p-4 h-80 overflow-y-auto">
                <!-- Mensaje de bienvenida -->
                <div class="mb-2 flex items-start space-x-2">
                    <img src="{{ asset('imagenes/bot.jpg') }}" alt="Bot Gemini" class="w-6 h-6 rounded-full">
                    <p class="bg-gray-200 text-gray-700 rounded-lg py-2 px-4 inline-block">¡Hola! Soy Sport Armor Bot. ¿En qué puedo ayudarte?</p>
                </div>
            </div>
            <!-- Contenedor de valoración (inicialmente oculto) -->
            <div id="rating-container-gemini" class="hidden p-4 border-t items-center">
                <span class="mr-2">Valora mi atención:</span>
                <div class="flex space-x-1" id="rating-stars">
                    <!-- Ejemplo: 5 estrellas -->
                    <button class="star text-gray-500 hover:text-yellow-500" data-value="1">★</button>
                    <button class="star text-gray-500 hover:text-yellow-500" data-value="2">★</button>
                    <button class="star text-gray-500 hover:text-yellow-500" data-value="3">★</button>
                    <button class="star text-gray-500 hover:text-yellow-500" data-value="4">★</button>
                    <button class="star text-gray-500 hover:text-yellow-500" data-value="5">★</button>
                </div>
                <button id="submit-rating" class="bg-blue-500 text-white px-4 py-2 ml-4 rounded-md hover:bg-blue-600 transition duration-300">Valorar</button>
            </div>
            <div class="p-4 border-t flex">
                <input id="user-input-gemini" type="text" placeholder="Escribe un mensaje" class="w-full px-3 py-2 border rounded-l-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                <button id="send-button-gemini" class="bg-blue-500 text-white px-4 py-2 rounded-r-md hover:bg-blue-600 transition duration-300">Enviar</button>
            </div>
            <!-- Botón para reiniciar el historial del chatbot de Gemini -->
            <button id="reset-chat-gemini" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 transition duration-300">
                Reiniciar Chat
            </button>
            @endauth

            @guest
            <!-- Contenido para usuarios no autenticados -->
            <div class="p-4 h-80 flex items-center justify-center">
                <a href="{{ url(route('login')) }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-300">
                    Iniciar Sesión para usar el chat
                </a>
            </div>
            @endguest
        </div>
    </div>
    
    @yield('contenido-inicio')

    <section id="contenido" class="py-40 transition-colors duration-500 p-10 {{ $sectionClass ?? 'bg-white' }}">
        @yield('contenido')
    </section>

    <footer id="footer" class="grid grid-cols-2 lg:grid-cols-3 lg:px-20 pt-10 bg-gradient-to-l from-blue-700 via-blue-200 to-blue-700 gap-7 text-white">
        <div class="flex flex-col md:items-center text-center" style="font-family: 'Russo One', cursive;">
            <a href="#" class="font" id="f1">Recursos</a>
            <a href="#" class="font"><br></a>
            <a href="#inicio" class="font" id="f2">Inicio</a>
            <a href="/Privacidad.html" class="font" id="f3">Privacidad</a>
            <a href="/Catalogo.html" class="font" id="f4">Catalogo</a>
            <a href="#pregunta" class="font" id="f5">Nosotros</a>
            <a href="#testimonios" class="font" id="f6">Testimonios</a>
        </div>
        <div class="hidden lg:flex items-center justify-center" style="font-family: 'Russo One', cursive;">
            <p id="llamapoleNombre" class="text-blue-700 hover:text-blue-900 text-xl transition-colors duration-500 cursor-pointer">SPORT ARMOR</p>
        </div>
        <div class="flex flex-col justify-center text-center">
            <a href="#"><i class="fa-brands fa-facebook fa-xl " style="color: white;"></i></a> 
            <a href="#"><i class="fa-brands fa-instagram fa-xl" style="color: white;"></i></a>
            <a href="#"><i class="fa-brands fa-twitter fa-xl" style="color: white;"></i></a>
            <a href="#"><i class="fa-brands fa-youtube fa-xl" style="color: white;"></i></a>
        </div>
        <div class="hidden lg:flex col-span-3 m-4 justify-center gap-10">
            <a href="#" class="font text-black" id="f7">Libro de Reclamaciones</a>
            <a href="#" class="font text-black" id="f8">Términos y Condiciones</a>
            <a href="#" class="font text-black" id="f9">Política de Devoluciones</a>
            <a href="#" class="font text-black" id="f10">Contacto</a>
        </div>
    </footer>

    <!-- Scripts -->
    <script>
        // Variables para el chatbot de Gemini
        const chatButtonGemini = document.getElementById("chatButtonGemini");
        const chatContainerGemini = document.getElementById("chat-container-gemini");
        const closeChatGemini = document.getElementById("close-chat-gemini");
        const sendButtonGemini = document.getElementById("send-button-gemini");
        const userInputGemini = document.getElementById("user-input-gemini");
        const chatboxGemini = document.getElementById("chatbox-gemini");

        let userInactivityTimer;
        let selectedRating = 0; // para almacenar la valoración seleccionada

        // Funciones para el chatbot de Gemini
        chatButtonGemini.addEventListener("click", () => {
            chatContainerGemini.classList.toggle("hidden");
        });

        closeChatGemini.addEventListener("click", () => {
            chatContainerGemini.classList.add("hidden");
        });

        @auth
        sendButtonGemini.addEventListener("click", async () => {
            const message = userInputGemini.value.trim();
            if (message === "") return;

            // Mostrar el mensaje del usuario en el chat
            const userMessageDiv = document.createElement("div");
            userMessageDiv.classList.add("mb-2", "text-right");
            userMessageDiv.innerHTML = `<p class="bg-blue-500 text-white rounded-lg py-2 px-4 inline-block">${message}</p>`;
            chatboxGemini.appendChild(userMessageDiv);
            chatboxGemini.scrollTop = chatboxGemini.scrollHeight;
            userInputGemini.value = "";

            // Mostrar indicador de carga
            const loadingMessageDiv = document.createElement("div");
            loadingMessageDiv.classList.add("mb-2", "flex", "items-start", "space-x-2");
            loadingMessageDiv.innerHTML = `
                <img src="{{ asset('imagenes/bot.jpg') }}" alt="Bot Gemini" class="w-6 h-6 rounded-full">
                <p class="bg-gray-200 text-gray-700 rounded-lg py-2 px-4 inline-block">Escribiendo...</p>
            `;
            chatboxGemini.appendChild(loadingMessageDiv);
            chatboxGemini.scrollTop = chatboxGemini.scrollHeight;

            // Enviar el mensaje al servidor
            try {
                const response = await fetch("{{ url('/gemini-chatbot') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    },
                    body: JSON.stringify({ message }),
                });

                const data = await response.json();

                // Eliminar el indicador de carga
                chatboxGemini.removeChild(loadingMessageDiv);

                // Mostrar la respuesta del chatbot en el chat
                const botMessageDiv = document.createElement("div");
                botMessageDiv.classList.add("mb-2", "flex", "items-start", "space-x-2");
                botMessageDiv.innerHTML = `
                    <img src="{{ asset('imagenes/bot.jpg') }}" alt="Bot Gemini" class="w-6 h-6 rounded-full">
                    <p class="bg-gray-200 text-gray-700 rounded-lg py-2 px-4 inline-block">${data.message}</p>
                `;
                chatboxGemini.appendChild(botMessageDiv);
                chatboxGemini.scrollTop = chatboxGemini.scrollHeight;

            } catch (error) {
                console.error("Error:", error);
                // Mostrar mensaje de error
                chatboxGemini.removeChild(loadingMessageDiv);
                const errorMessageDiv = document.createElement("div");
                errorMessageDiv.classList.add("mb-2", "flex", "items-start", "space-x-2");
                errorMessageDiv.innerHTML = `
                    <img src="{{ asset('imagenes/bot.jpg') }}" alt="Bot Gemini" class="w-6 h-6 rounded-full">
                    <p class="bg-red-200 text-red-700 rounded-lg py-2 px-4 inline-block">Ocurrió un error. Por favor, intenta nuevamente.</p>
                `;
                chatboxGemini.appendChild(errorMessageDiv);
                chatboxGemini.scrollTop = chatboxGemini.scrollHeight;
            }

            resetInactivityTimer();
        });

        userInputGemini.addEventListener("keypress", function(event) {
            if (event.key === "Enter") {
                event.preventDefault();
                sendButtonGemini.click();
                resetInactivityTimer();
            }
        });

        document.getElementById("reset-chat-gemini").addEventListener("click", async () => {
            try {
                const response = await fetch("{{ url('/gemini-chatbot/reset') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    },
                });

                const data = await response.json();
                if (response.ok) {
                    // Limpiar el chatbox en el frontend
                    chatboxGemini.innerHTML = `
                        <div class="mb-2 flex items-start space-x-2">
                            <img src="{{ asset('imagenes/bot.jpg') }}" alt="Bot Gemini" class="w-6 h-6 rounded-full">
                            <p class="bg-gray-200 text-gray-700 rounded-lg py-2 px-4 inline-block">¡Hola! Soy Gemini Bot. ¿En qué puedo ayudarte?</p>
                        </div>
                    `;
                    alert(data.message);
                } else {
                    alert(data.message);
                }
            } catch (error) {
                console.error("Error:", error);
                alert("Ocurrió un error al reiniciar el chat. Por favor, intenta nuevamente.");
            }
        });

        function resetInactivityTimer() {
            clearTimeout(userInactivityTimer);
            userInactivityTimer = setTimeout(() => {
                // Después de 20 segundos sin interacción del usuario
                showRatingPrompt();
            }, 20000); // 20 segundos
        }

        function showRatingPrompt() {
            // Mostrar mensaje de verificación y la interfaz de valoración
            const botMessageDiv = document.createElement("div");
            botMessageDiv.classList.add("mb-2", "flex", "items-start", "space-x-2");
            botMessageDiv.innerHTML = `
                <img src="{{ asset('imagenes/bot.jpg') }}" alt="Bot Gemini" class="w-6 h-6 rounded-full">
                <p class="bg-gray-200 text-gray-700 rounded-lg py-2 px-4 inline-block">¿Sigues ahí? Si ya has terminado, por favor valora mi atención.</p>
            `;
            chatboxGemini.appendChild(botMessageDiv);
            chatboxGemini.scrollTop = chatboxGemini.scrollHeight;

            // Mostrar el contenedor de valoraciones
            document.getElementById("rating-container-gemini").classList.remove("hidden");
        }

        // Seleccionar la valoración
        document.querySelectorAll('#rating-stars .star').forEach(star => {
            star.addEventListener('click', () => {
                selectedRating = parseInt(star.getAttribute('data-value'));
                // Marcar estrellas hasta la seleccionada
                document.querySelectorAll('#rating-stars .star').forEach(s => {
                    const val = parseInt(s.getAttribute('data-value'));
                    if (val <= selectedRating) {
                        s.classList.remove('text-gray-500');
                        s.classList.add('text-yellow-500');
                    } else {
                        s.classList.remove('text-yellow-500');
                        s.classList.add('text-gray-500');
                    }
                });
            });
        });

        // Enviar valoración al backend
        document.getElementById('submit-rating').addEventListener('click', async () => {
            if (selectedRating === 0) {
                alert('Por favor, selecciona una valoración.');
                return;
            }

            // Petición AJAX para guardar la valoración
            try {
                const response = await fetch("{{ url('/gemini-chatbot/valorar') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    },
                    body: JSON.stringify({ valoracion: selectedRating }),
                });

                const data = await response.json();
                if (response.ok) {
                    alert("¡Gracias por tu valoración! El chat se reiniciará.");
                    // Ocultar el contenedor de valoración
                    document.getElementById("rating-container-gemini").classList.add("hidden");
                    // Reiniciar el chat
                    chatboxGemini.innerHTML = `
                        <div class="mb-2 flex items-start space-x-2">
                            <img src="{{ asset('imagenes/bot.jpg') }}" alt="Bot Gemini" class="w-6 h-6 rounded-full">
                            <p class="bg-gray-200 text-gray-700 rounded-lg py-2 px-4 inline-block">¡Hola! Soy Sport Armor Bot. ¿En qué puedo ayudarte?</p>
                        </div>
                    `;
                    selectedRating = 0;
                    resetInactivityTimer();
                } else {
                    alert('Ocurrió un error al enviar la valoración: ' + data.message);
                }
            } catch (error) {
                console.error(error);
                alert("Ocurrió un error al enviar la valoración. Por favor, inténtalo de nuevo.");
            }
        });

        @endauth
        
        
    </script>

    @yield('scripts')  


</body>
</html>
