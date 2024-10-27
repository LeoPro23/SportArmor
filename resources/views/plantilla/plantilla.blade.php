<!DOCTYPE html>
<html class="scroll-smooth scroll-p-20" lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sport Armor</title>

    <!-- CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    
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

            <div id="toggleButtonModoOscuro" onclick="toggleDarkMode()" class="pointer-events-auto h-6 w-10 rounded-full p-1 ring-1 ring-inset transition duration-200 ease-in-out bg-black ring-black md:order-2">
                <div id="bolitaBotonModoOscuro" class="h-4 w-4 rounded-full bg-white shadow-sm ring-1 ring-slate-700/10 transition duration-200 ease-in-out"></div>
            </div>

            <div class="flex items-center md:order-3">
                <button id="botonidioma" type="button" data-dropdown-toggle="language-dropdown-menu" class="flex items-center font-medium justify-center px-4 py-2 rounded-lg cursor-pointer text-black"> 
                    <img src="{{ asset('imagenes/flecha.png') }}" alt="">
                    <span id="current-language">Español</span>
                </button>
                <div class="z-50 hidden my-4 text-base list-none bg-gray-600 divide-y divide-gray-100 rounded-lg shadow" id="language-dropdown-menu">
                  <ul class="py-2 font-medium">
                    <li><a href="#" onclick="changeLanguage('Español')" class="block px-4 py-2 text-sm text-white hover:bg-gray-100 hover:text-black">Español</a></li>
                    <li><a href="#" onclick="changeLanguage('English')" class="block px-4 py-2 text-sm text-white hover:bg-gray-100 hover:text-black">English</a></li>
                    <li><a href="#" onclick="changeLanguage('Portugues')" class="block px-4 py-2 text-sm text-white hover:bg-gray-100 hover:text-black">Portugues</a></li>
                  </ul>
                </div>
                <button data-collapse-toggle="navbar-cta" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-white rounded-lg md:hidden" aria-controls="navbar-cta" aria-expanded="false">
                    <img src="{{ asset('imagenes/menuhamburguesa.svg') }}" alt="Hamburguesa">
                </button>
            </div>
        </div>
    </nav>
    
    <div>
        <a href="https://whatsapp.com" target="_blank" class="bg-white rounded-full w-12 h-12 flex items-center justify-center focus:ring ring focus:ring-blue-300 fixed bottom-4 right-4 z-40">
            <i class="fa-brands fa-whatsapp fa-2xl" style="color: #40e02a"></i>
        </a>
    </div>

    @yield('contenido')

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
        <div class="hidden lg:flex justify-center items-center justify-center" style="font-family: 'Russo One', cursive;">
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
</body>
</html>
