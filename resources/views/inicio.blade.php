@extends('plantilla.plantilla')

@section('contenido')

<section id="inicio" class="h-screen bg-[url('{{ asset('imagenes/fondo1.png') }}')] bg-cover pt-28 grid lg:grid-cols-2" style="font-family: 'Orbitron', cursive;">
    <div class="flex justify-center items-center px-20 lg:px-0 lg:pl-20">
        <p class="text-black lg:text-5xl text-2xl text-center" id="slogan">ESTILO Y RESISTENCIA EN CADA DETALLE</p>
    </div>
    <div class="hidden lg:flex justify-center items-center pr-20">
        <img src="{{ asset('imagenes/img-inicio.png') }}" class="hover:scale-105 transition-transform" alt="">
    </div>
    <div class="flex justify-center items-center absolute bottom-0 w-full">
        <div class="mb-5">
            <a href="#nosotros"><i class="fa-solid fa-angles-down fa-beat-fade text-3xl text-blue-950 dark:text-white"></i></a>
        </div>
    </div>
</section>

<div class="relative">
    <video class="inset-0 w-full h-full object-cover" autoplay muted loop>
        <source src="{{ asset('videos/adidas_video.mp4') }}" type="video/mp4">
    </video>
    <div class="absolute bottom-0 bg-black bg-opacity-50 text-white p-4">
        <h2 class="lg:text-2xl lg:font-bold">Adidas socio de Sport Armor</h2>
        <p class="hidden sm:block">Adidas, una marca líder mundial en ropa y accesorios deportivos, se enorgullece de ser socio de Sport Armor. Ofrecemos una amplia gama de productos Adidas para satisfacer todas tus necesidades deportivas. Ven y descubre la calidad y el estilo que Adidas aporta a nuestra tienda.</p>
    </div>
</div>

<section id="nosotros" class="py-20 bg-blue-200">
    <article class="md:flex">
        <div class="w-full md:w-1/2">
            <div id="swiper-cards" class="swiper w-52 h-62 sm:w-80 sm:h-96 my-8">
                <div class="swiper-wrapper">
                    @foreach (range(1, 14) as $i)
                        <div class="swiper-slide rounded-lg shadow-xl">
                            <img class="w-full h-full object-cover" src="{{ asset("imagenes/$i.png") }}">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="md:w-1/2 py-10 px-10 text-center">
            <div class="lg:mr-16 xl:mr-24 space-y-6">
                <h6 id="pregunta" class="lg:text-3xl text-2xl text-blue-700 font-bold" style="font-family: 'Orbitron', cursive;">
                    TU CONFORT, NUESTRA RESPONSABILIDAD
                </h6>
                <p id="t1">
                    En SportArmor, la calidad y el prestigio se fusionan en cada jersey que ofrecemos. Destacamos por la durabilidad, comodidad y diseño impecable de nuestras prendas y productos deportivos. Cada producto refleja nuestro compromiso inquebrantable con la excelencia. Desde las marcas renombradas como Adidas, Nike, Umbro y otras grandes, hasta nuestros diseños exclusivos, te ofrecemos una gama única para satisfacer tus exigencias en cada ocasión.
                </p>
                <p id="t2">
                    Descubre por qué SportArmor es la elección preferida de aquellos que buscan la combinación perfecta de calidad, prestigio y servicio excepcional rindiendo homenaje a tu garra y pasión.
                </p>
            </div>
        </div>
    </article>
</section>

<div id="bgNosotros" class="py-20 bg-blue-700">
    <p id="testimonios" class="text-center text-3xl text-white font-bold" style="font-family: 'Orbitron', cursive;">TESTIMONIOS</p>
    <div class="swiper mySwiper1 mt-10">
        <div class="swiper-wrapper">
            <div class="swiper-slide relative border-4 rounded-3xl h-80 w-80 bg-white">
                <div class="absolute top-0 left-1/2 transform -translate-x-1/2 translate-y-3">
                    <img class="mx-auto rounded-full w-40 h-40 shadow-lg" src="{{ asset('imagenes/Wuajhon.jpg') }}" alt="Wuajhon Zegarra">
                </div>
                <div class="mt-20 mb-4 px-8 py-24 text-center space-y-2">
                    <div>
                        <p class="font-bold">Wuajhon Zegarra</p>
                    </div>
                    <p>Variedad de colores y estilos para cualquier ocasión.</p>
                </div>
            </div>
            
            <div class="swiper-slide relative border-4 rounded-3xl h-80 w-80 bg-white">
                <div class="absolute top-0 left-1/2 transform -translate-x-1/2 translate-y-3">
                    <img class="mx-auto rounded-full w-40 h-40 shadow-lg" src="{{ asset('imagenes/Camilo.jpg') }}" alt="Camilo Villaruel">
                </div>
                <div class="mt-20 mb-4 px-8 py-24 text-center space-y-2">
                    <div>
                        <p class="font-bold">Camilo Villaruel</p>
                    </div>
                    <p>Que buenos productos tienen! Ideal para futbol, super recomendado!</p>
                </div>
            </div>

            <div class="swiper-slide relative border-4 rounded-3xl h-80 w-80 bg-white">
                <div class="absolute top-0 left-1/2 transform -translate-x-1/2 translate-y-3">
                    <img class="mx-auto rounded-full w-40 h-40 shadow-lg" src="{{ asset('imagenes/Taylor.jpg') }}" alt="Taylor Swift">
                </div>
                <div class="mt-20 mb-4 px-8 py-24 text-center space-y-2">
                    <div>
                        <p class="font-bold">Taylor Swift</p>
                    </div>
                    <p>Que productos que siguen luciendo como nuevos. Increíble durabilidad.</p>
                </div>
            </div>

            <div class="swiper-slide relative border-4 rounded-3xl h-80 w-80 bg-white">
                <div class="absolute top-0 left-1/2 transform -translate-x-1/2 translate-y-3">
                    <img class="mx-auto rounded-full w-40 h-40 shadow-lg" src="{{ asset('imagenes/Camila.jpg') }}" alt="Camila Soriano">
                </div>
                <div class="mt-20 mb-4 px-8 py-24 text-center space-y-2">
                    <div>
                        <p class="font-bold">Camila Soriano</p>
                    </div>
                    <p>Compra fácil y rápida. Equipo de atención al cliente excepcional.</p>
                </div>
            </div>

            <div class="swiper-slide relative border-4 rounded-3xl h-80 w-80 bg-white">
                <div class="absolute top-0 left-1/2 transform -translate-x-1/2 translate-y-3">
                    <img class="mx-auto rounded-full w-40 h-40 shadow-lg" src="{{ asset('imagenes/Eladio.png') }}" alt="Eladio Carrión">
                </div>
                <div class="mt-20 mb-4 px-8 py-24 text-center space-y-2">
                    <div>
                        <p class="font-bold">Eladio Carrión</p>
                    </div>
                    <p>Productos duraderos y cómodos. La elección perfecta para cualquier deporte.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<section id="contacto" class="py-20 transition-colors duration-500 bg-white p-10">
    <article class="lg:flex items-center p-10">
        <div class="hidden lg:flex">
            <ul class="px-10">
                <li class="p-3 text-center">
                    <div class="flex justify-center text-blue-600">
                        <i class="fa-brands fa-instagram fa-2xl" style="color: #3071c7;"></i>                         
                    </div> 
                    <p id="InstagramDark" class="mt-4 font-semibold text-black">Instagram</p>
                    <div id="divInstagramGaaaa" class="contacto-txt-gray transition duration-500 text-sm text-gray-500">
                        <p>@sportarmor</p>
                        <p>instagram.com/sportarmor</p>
                    </div>                    
                </li>
                <li class="p-3 text-center">
                    <div class="flex justify-center text-yellow-600">
                        <i class="fa-brands fa-whatsapp fa-2xl" style="color: #3071c7;"></i>                            
                    </div> 
                    <p id="WhatsAppDark" class="mt-4 font-semibold text-black">WhatsApp</p>
                    <div id="divNumerosGaaaa" class="contacto-txt-gray transition duration-500 text-sm text-gray-500">
                        <p id="NumberDark">+51 987654321</p>
                        <p id="NumberDark2">+51 980000001</p>
                    </div>                    
                </li>
            </ul>
        </div>
        <div class="lg:px-20 space-y-6 lg:border-l-2 border-blue-400">
            <div>
                <p class="text-xl font-bold text-blue-500" id="fti">Contáctanos</p>
                <p id="fte" class="text-black">¿Tienes preguntas o sugerencias? Estamos aquí para ayudarte. Contáctanos y descubre el servicio personalizado de Sport Armor. ¡Tu opinión es importante para nosotros!</p>
            </div>
            <div class="flex relative">
                <input id="usuario" type="text" class="contacto-input py-1 w-full border-b focus:outline-none focus:border-blue-600 focus:border-b-2 peer transition-colors duration-500 bg-white">
                <label for="usuario" class="text-gray-500 absolute left-0 top-1 cursor-text peer-focus:text-xs peer-focus:text-blue-600 peer-focus:-top-4 font-semibold transition-all duration-500" id="l1">Ingresa tu nombre</label>
            </div>
            <div class="flex relative">
                <input id="correo" type="text" class="contacto-input py-1 w-full border-b focus:outline-none focus:border-blue-600 focus:border-b-2 peer transition-colors duration-500 bg-white">
                <label for="correo" class="text-gray-500 absolute left-0 top-1 cursor-text peer-focus:text-xs peer-focus:text-blue-600 peer-focus:-top-4 font-semibold transition-all duration-500" id="l2">Ingresa tu correo</label>
            </div>
            <div class="flex relative">
                <input id="telefono" type="text" class="contacto-input py-1 w-full border-b focus:outline-none focus:border-blue-600 focus:border-b-2 peer transition-colors duration-500 bg-white">
                <label for="telefono" class="text-gray-500 absolute left-0 top-1 cursor-text peer-focus:text-xs peer-focus:text-blue-600 peer-focus:-top-4 font-semibold transition-all duration-500" id="l3">Ingresa tu teléfono</label>
            </div>
            <div class="space-y-4">
                <button class="py-1 px-4 bg-black font-semibold text-white rounded-xl" id="lb">Enviar</button>
            </div>
        </div>
        <div class="lg:hidden">
            <ul class="py-6 flex flex-wrap items-center">
                <li class="p-3 text-center grow">
                    <div>
                        <i class="fa-brands fa-instagram fa-2xl"></i>                          
                    </div> 
                    <p id="InstagramDark2" class="font-semibold">Instagram</p>
                    <div class="text-sm text-gray-500">
                        <p id="LlamapoleDark2gaa">@llamapole</p>
                        <p id="LlamapoleDark2" >instagram.com/llamapole</p>
                    </div>                    
                </li>
                <li class="p-3 text-center grow">
                    <div>
                    <i class="fa-brands fa-whatsapp fa-2xl"></i>                            
                    </div> 
                    <p id="WhatsAppDark2" class="font-semibold">WhatssApp</p>
                    <div class="text-sm text-gray-500">
                        <p id="NumberDark.">+51 987654321</p> 
                        <p id="NumberDark2.">+51 980000001</p>
                    </div>                    
                </li>
            </ul>
        </div>
    </article>
</section>

@endsection