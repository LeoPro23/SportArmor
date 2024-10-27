@extends('plantilla.plantilla')

@section('contenido')

<section id="inicio" class=" bg-[url('recursos/fondo1.png')] bg-cover grid" style="font-family: 'Orbitron', cursive;">
    <div class="container mx-auto lg:px-20 py-20">
        
        <div class="px-4 lg:px-20 py-10 bg-white rounded-lg shadow-lg">
            <div class="flex justify-center items-center px-20 lg:px-20 lg:pl-20 py-20">
                <p class="text-black lg:text-5xl text-2xl text-center">Declaración de Privacidad</p>
            </div>
            <h2 class="text-3xl font-semibold mb-4">¿Qué hace SportArmor para garantizar la privacidad de mis datos?</h2>
            <p class="mb-4">En SportArmor, respetamos tu intimidad y estamos comprometidos a garantizar la seguridad y privacidad de tus datos. Nos esforzamos por ser absolutamente transparentes en el tratamiento de tus datos personales.</p>
            
            <h3 class="text-2xl font-semibold mb-2">En todo momento puedes:</h3>
            <ul class="list-disc list-inside mb-4">
                <li>Ver o descargar tus datos personales.</li>
                <li>Modificar o rectificar información personal.</li>
                <li>Cambiar tus preferencias de correo electrónico.</li>
                <li>Borrar tu perfil.</li>
            </ul>
            <p class="mb-4">Puedes realizar todas estas acciones iniciando sesión en nuestra página web y accediendo a la página "Mi cuenta". Tienes la libertad para realizar todos estos cambios de manera rápida y sin necesidad de llamar al servicio de atención al cliente. También queremos garantizarte que solo utilizamos tus datos para mejorar nuestros productos y los servicios que te ofrecemos.</p>
            
            <h3 class="text-2xl font-semibold mb-2">Tus datos personales son utilizados para:</h3>
            <ul class="list-disc list-inside mb-4">
                <li>Procesar tus pedidos, mostrarte tu historial de pedidos y ayudarte a gestionar tu cuenta SportArmor.</li>
                <li>Mantenerte al tanto de nuestros nuevos productos, noticias y ofertas especiales.</li>
                <li>Mejorar tu experiencia de compra personalizando el contenido y la comunicación que te llega para que sea relevante para ti.</li>
                <li>Mejorar nuestros productos, servicios y páginas de acuerdo con tus comentarios.</li>
                <li>Proporcionarte asistencia.</li>
                <li>Garantizar la seguridad de nuestras plataformas y prevenir fraudes.</li>
                <li>Cumplir con nuestras obligaciones legales y reglamentarias.</li>
            </ul>
            
            <h3 class="text-2xl font-semibold mb-2">Medidas de Seguridad Implementadas</h3>
            <ul class="list-disc list-inside mb-4">
                <li><strong>Cifrado SSL:</strong> Protegemos la transferencia de datos mediante el uso de cifrado SSL (Secure Socket Layer) para asegurar que la información intercambiada entre tu navegador y nuestros servidores esté cifrada y protegida contra accesos no autorizados.</li>
                <li><strong>Almacenamiento Seguro:</strong> Tus datos personales se almacenan en servidores seguros con acceso restringido solo al personal autorizado. Implementamos medidas físicas, electrónicas y administrativas para salvaguardar la información.</li>
                <li><strong>Auditorías de Seguridad:</strong> Realizamos auditorías regulares de seguridad para identificar y corregir posibles vulnerabilidades en nuestros sistemas.</li>
                <li><strong>Actualizaciones Constantes:</strong> Mantenemos nuestros sistemas y software actualizados con los últimos parches de seguridad para protegerlos contra amenazas emergentes.</li>
                <li><strong>Política de Acceso:</strong> Solo el personal autorizado tiene acceso a tus datos personales y está capacitado en el manejo seguro de la información.</li>
            </ul>
            
            <h3 class="text-2xl font-semibold mb-2">Derechos y Opciones Adicionales</h3>
            <ul class="list-disc list-inside mb-4">
                <li><strong>Portabilidad de Datos:</strong> Puedes solicitar la portabilidad de tus datos personales para transferirlos a otro proveedor de servicios.</li>
                <li><strong>Limitación del Tratamiento:</strong> Puedes solicitar la limitación del tratamiento de tus datos en ciertas circunstancias, por ejemplo, si cuestionas la exactitud de los datos.</li>
                <li><strong>Derecho al Olvido:</strong> Tienes derecho a solicitar la eliminación completa de tus datos personales de nuestros sistemas en determinadas condiciones.</li>
            </ul>
            
            <h3 class="text-2xl font-semibold mb-2">Transparencia y Comunicación</h3>
            <p class="mb-4">Nos comprometemos a mantener una comunicación clara y abierta sobre el uso de tus datos.</p>
            
            <h3 class="text-2xl font-semibold mb-2">Contacto</h3>
            <p class="mb-4">Si tienes alguna duda o solicitud sobre el tratamiento de tus datos, nuestro equipo de protección de datos está aquí para asistirte. Puedes contactarnos en <a href="mailto:DataProtection@SportArmor.com" class="text-blue-600 hover:underline">DataProtection@SportArmor.com</a>.</p>
            
            <p>Estamos aquí para asegurar que tus datos estén protegidos y que tengas control total sobre ellos en todo momento. Tu privacidad es nuestra prioridad.</p>
        </div>
    </div>
    
</section>


@endsection