<!DOCTYPE html>
<html class="scroll-smooth scroll-p-20" lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sport Armor</title>

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

            <!-- Mostrar botones de autenticación -->
            <div class="flex items-center md:order-3">
                @if (Auth::check())
                    <!-- Dropdown para usuario autenticado con Alpine.js -->
                    <div x-data="{ open: false }" class="relative">
                        <button @click="open = !open" class="flex items-center text-gray-800 hover:text-gray-600">
                            <span>{{ Auth::user()->name }}</span>
                            <svg class="w-4 h-4 ml-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div x-show="open" @click.outside="open = false" class="absolute right-0 mt-2 w-48 bg-white shadow-lg rounded-lg py-2">
                            <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-200">Perfil</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="block w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-200">
                                    Cerrar Sesión
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <!-- Mostrar botón de iniciar sesión si no está autenticado -->
                    <a href="{{ route('login') }}" class="text-gray-800 hover:text-gray-600">Iniciar Sesión</a>
                @endif
            </div>
        </div>
    </nav>
    
    <!-- Botón de Chat -->
    <div>
        <button id="chatButton" class="bg-white rounded-full w-12 h-12 flex items-center justify-center fixed bottom-4 right-4 z-40">
            <i class="fa-solid fa-comment-dots fa-2xl" style="color: #2a88e0"></i>
        </button>
    </div>

    <!-- Ventana de Chat -->
    <div id="chat-container" class="hidden fixed bottom-16 right-4 w-96 z-50">
        <div class="bg-white shadow-md rounded-lg max-w-lg w-full">
            <div class="p-4 border-b bg-blue-500 text-white rounded-t-lg flex items-center space-x-3">
                <!-- Imagen del bot -->
                <img src="{{ asset('imagenes/bot.jpg') }}" alt="Bot" class="w-8 h-8 rounded-full">
                <p class="text-lg font-semibold">Sport Armor Bot</p>
                <button id="close-chat" class="ml-auto text-gray-300 hover:text-gray-400 focus:outline-none focus:text-gray-400 absolute right-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <div id="chatbox" class="p-4 h-80 overflow-y-auto">
                <!-- Mensajes de chat -->
                <div class="mb-2 flex items-start space-x-2">
                    <img src="{{ asset('imagenes/bot.jpg') }}" alt="Bot" class="w-6 h-6 rounded-full">
                    <p class="bg-gray-200 text-gray-700 rounded-lg py-2 px-4 inline-block">Esta es una respuesta del chatbot.</p>
                </div>
                <div class="mb-2 text-right">
                    <p class="bg-blue-500 text-white rounded-lg py-2 px-4 inline-block">Hola</p>
                </div>
                <div class="mb-2 flex items-start space-x-2">
                    <img src="{{ asset('imagenes/bot.jpg') }}" alt="Bot" class="w-6 h-6 rounded-full">
                    <p class="bg-gray-200 text-gray-700 rounded-lg py-2 px-4 inline-block">Esta es otra respuesta del chatbot.</p>
                </div>
            </div>
            <div class="p-4 border-t flex">
                <input id="user-input" type="text" placeholder="Escribe un mensaje" class="w-full px-3 py-2 border rounded-l-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                <button id="send-button" class="bg-blue-500 text-white px-4 py-2 rounded-r-md hover:bg-blue-600 transition duration-300">Enviar</button>
            </div>
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
        const chatButton = document.getElementById("chatButton");
        const chatContainer = document.getElementById("chat-container");
        const closeChat = document.getElementById("close-chat");

        chatButton.addEventListener("click", () => {
            chatContainer.classList.toggle("hidden");
        });

        closeChat.addEventListener("click", () => {
            chatContainer.classList.add("hidden");
        });
    </script>

</body>
</html>
