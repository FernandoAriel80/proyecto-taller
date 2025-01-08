<x-app-layout>
    <!-- Main Content -->

    <!-- Banner -->
    <section class="relative bg-cover bg-center h-96"
        style="background-image: url('ruta-de-tu-imagen-del-taller-de-moto.jpg');">
        <div class="absolute inset-0 bg-black opacity-50"></div> <!-- Filtro oscuro sobre la imagen -->
        <div class="relative z-10 flex flex-col items-center justify-center h-full text-center text-white">
            <h1 class="text-4xl sm:text-5xl font-bold mb-4">
                ¡Tu vehículo en las mejores manos!
            </h1>
            <p class="text-lg sm:text-xl mb-6 max-w-2xl mx-auto">
                En nuestro taller especializado, ofrecemos mantenimiento, reparaciones y personalización para tu
                vehículo.
            </p>
            <div class="flex justify-between">
                <a href="#services"
                    class="px-6 py-3 mx-3 bg-blue-600 hover:bg-blue-700 text-white rounded-md text-xl transition">
                    Ver nuestros servicios
                </a>
                <a href="#reserve"
                    class="px-6 py-3 mx-3 bg-blue-600 hover:bg-blue-700 text-white rounded-md text-xl transition">
                    Hacer una reserva
                </a>
            </div>
        </div>
    </section>

    <!-- Información sobre el Taller -->
    <section class="bg-gray-100 py-16">
        <div class="container mx-auto text-center">
            <h1 class="text-4xl sm:text-5xl font-bold text-blue-600 mb-6">
                A&M Service
            </h1>
            <p class="text-lg sm:text-xl text-gray-700 max-w-2xl mx-auto">
                En <span class="font-semibold">A&M Service</span>, nos especializamos en el cuidado y mantenimiento
                de todo tipo de vehículos, desde motocicletas hasta automóviles. Ofrecemos servicios integrales de
                reparación, mantenimiento preventivo y personalización, asegurándonos de que tu vehículo esté
                siempre en óptimas condiciones.
            </p>
            <p class="text-lg sm:text-xl text-gray-700 mt-4 max-w-2xl mx-auto">
                Con un equipo de expertos y herramientas de última tecnología, garantizamos un servicio confiable,
                rápido y de alta calidad.
                <span class="font-semibold">¡Tu vehículo, en las mejores manos!</span>
            </p>
        </div>
    </section>

    <section id="services" class="py-16 bg-gray-100">
        <div class="container mx-auto">
            <h2 class="text-3xl sm:text-4xl font-bold text-center mb-8">
                Otros Servicios
            </h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Este contenedor será repetido por cada servicio -->
                @foreach ($services as $service)
                    <div class="service-card bg-white p-6 rounded-lg shadow-md">
                        <h3 class="text-2xl font-semibold mb-4 text-blue-600">{{ $service->name }}</h3>
                        <p class="text-gray-700 mb-4">{{ $service->description }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    <!-- Banner Solicitar Servicio -->
    <section id="reserve" class="relative bg-gradient-to-r from-black to-gray-800 text-white py-20">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl sm:text-4xl font-bold mb-6">
                ¿Tu vehículo necesita atención?
            </h2>
            <p class="text-lg sm:text-xl mb-8 max-w-2xl mx-auto">
                En <span class="font-semibold">A&M Service</span>, estamos listos para ayudarte. Solicita nuestro
                servicio de mantenimiento, reparación o personalización y disfruta de un vehículo en perfectas
                condiciones.
            </p>
            <a href="{{ route('reserve.create') }}"
                class="px-6 py-3 bg-red-600 hover:bg-red-700 text-white rounded-md text-xl transition">
                Solicitar Servicio
            </a>
        </div>
    </section>

    <!-- Botón flotante para volver al inicio -->
    <a href="#top" class="fixed bottom-8 right-8 bg-red-600 hover:bg-red-700 text-white p-4 rounded-full shadow-lg">
        ↑
    </a>
</x-app-layout>
