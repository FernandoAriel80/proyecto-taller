<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulario</title>

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="flex justify-center items-center min-h-screen bg-gradient-to-br from-gray-900 to-gray-800">
        <div class="bg-white bg-opacity-10 backdrop-blur-lg rounded-lg shadow-lg w-7/12 p-6">
            <!-- Botones de navegación -->
            <div class="flex justify-around mb-6">
                <button id="btnDatosVehiculo" class="tab-button bg-gray-700 text-white px-4 py-2 rounded">Datos del Vehículo</button>
                <button id="btnDatosReserva" class="tab-button bg-gray-700 text-white px-4 py-2 rounded">Datos de Reserva</button>
            </div>

            <!-- Contenido dinámico -->
            <div id="datosVehiculo" class="tab-content">
                <h2 class="text-xl text-white mb-4">Datos del Vehículo</h2>
                <form action="{{ route('vehicle.store') }}" method="POST">
                    @csrf
                
                    <div class="grid grid-cols-2 gap-6">
                        <!-- Primera columna -->
                        <div>
                            <div class="mb-4">
                                <label for="patente" class="block text-gray-200 mb-2">Patente</label>
                                <input type="text" id="patente" name="patente" class="w-full px-4 py-2 rounded bg-gray-700 text-white">
                            </div>
                            <div class="mb-4">
                                <label for="marca" class="block text-gray-200 mb-2">Marca</label>
                                <select id="marca" name="marca" class="w-full px-4 py-2 rounded bg-gray-700 text-white">
                                    <option value="">Seleccione una marca</option>
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="modelo" class="block text-gray-200 mb-2">Modelo</label>
                                <input type="text" id="modelo" name="modelo" class="w-full px-4 py-2 rounded bg-gray-700 text-white">
                            </div>
                        </div>

                        <!-- Segunda columna -->
                        <div>
                            <div class="mb-4">
                                <label for="anio" class="block text-gray-200 mb-2">Año del Vehículo (xxxx)</label>
                                <input type="number" id="anio" name="anio" class="w-full px-4 py-2 rounded bg-gray-700 text-white">
                            </div>
                            <div class="mb-4">
                                <label for="tipo_vehiculo" class="block text-gray-200 mb-2">Tipo de Vehículo</label>
                                <select id="tipo_vehiculo" name="tipo_vehiculo" class="w-full px-4 py-2 rounded bg-gray-700 text-white">
                                    <option value="">Seleccione un tipo</option>
                                    @foreach ($vehicleTypes as $vehicleType)
                                        <option value="{{ $vehicleType->id }}">{{ $vehicleType->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Botón de acción -->
                    <div class="flex justify-end mt-6">
                        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-6 py-2 rounded">Guardar y Seguir</button>
                    </div>
                </form>
            </div>

            <div id="datosReserva" class="tab-content hidden">
                <h2 class="text-xl text-white mb-4">Datos de Reserva </h2>
                <p class="text-gray-300">Formulario de datos del vehículo (en construcción).</p>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const tabButtons = document.querySelectorAll('.tab-button');
            const tabContents = document.querySelectorAll('.tab-content');

            tabButtons.forEach(button => {
                button.addEventListener('click', () => {
                    tabContents.forEach(content => content.classList.add('hidden'));
                    tabButtons.forEach(btn => btn.classList.remove('bg-gray-800'));

                    const target = button.id.replace('btn', '').toLowerCase();
                    document.getElementById(target).classList.remove('hidden');
                    button.classList.add('bg-gray-800');
                });
            });
        });
    </script>
</body>

</html>
