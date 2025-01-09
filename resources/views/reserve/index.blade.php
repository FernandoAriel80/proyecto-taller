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

    @if (session('success'))
        <div class="bg-green-500 text-white p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class=" items-center justify-center bg-gradient-to-br from-gray-900 to-gray-800">

        <div class="flex items-center justify-center py-10">
            <div>
                <a href="{{ route('dashboard') }}" class="text-3xl font-bold text-gray-400">
                    A&M Service
                </a>
            </div>
        </div>

        <div class="flex justify-center items-center ">
            <div class="bg-white bg-opacity-10 backdrop-blur-lg rounded-lg shadow-lg w-7/12 p-3">
                <!-- Botones de navegación -->
                <div class="flex justify-around mb-6">
                    @if ($vehicles->isEmpty())
                        <button id="btnDatosVehiculo" class="tab-button bg-gray-700 text-white px-4 py-2 rounded">Datos
                            del
                            Vehículo</button>
                        <button id="btnDatosReserva"
                            class="tab-button bg-gray-700 text-white px-4 py-2 rounded disabled:opacity-50 disabled:cursor-not-allowed"
                            disabled>
                            Datos de Reserva
                        </button>
                    @else
                        <button id="btnDatosVehiculo" class="tab-button bg-gray-700 text-white px-4 py-2 rounded">Datos
                            del
                            Vehículo</button>
                        <button id="btnDatosReserva" class="tab-button bg-gray-700 text-white px-4 py-2 rounded">Datos
                            de
                            Reserva</button>
                    @endif
                </div>

                <!-- Contenido vehiculo -->
                {{--  {{ $slot }} --}}
                @include('reserve.vehicle-form')

                @include('reserve.reserve-form')

            </div>
        </div>
    </div>



    <script>
        const btnDatosVehiculo = document.getElementById('btnDatosVehiculo');
        const btnDatosReserva = document.getElementById('btnDatosReserva');
        const datosVehiculo = document.getElementById('datosVehiculo');
        const datosReserva = document.getElementById('datosReserva');

        btnDatosVehiculo.addEventListener('click', () => {
            datosVehiculo.classList.remove('hidden');
            datosReserva.classList.add('hidden');

        });

        btnDatosReserva.addEventListener('click', () => {
            datosReserva.classList.remove('hidden');
            datosVehiculo.classList.add('hidden');
        })

        ////////////dateeee
    </script>
</body>
<style>
    input[type="number"] {
        width: 100px;
    }

    input+span {
        padding-right: 30px;
    }

    input:invalid+span::after {
        position: absolute;
        content: "✖";
        padding-left: 5px;
    }

    input:valid+span::after {
        position: absolute;
        content: "✓";
        padding-left: 5px;
    }

</style>

</html>
