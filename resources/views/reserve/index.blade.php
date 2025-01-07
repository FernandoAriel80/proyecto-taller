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

    <div class="flex justify-center items-center min-h-screen bg-gradient-to-br from-gray-900 to-gray-800">
        <div class="bg-white bg-opacity-10 backdrop-blur-lg rounded-lg shadow-lg w-7/12 p-6">
            <!-- Botones de navegación -->
            <div class="flex justify-around mb-6">
                @if ($vehicles->isEmpty())
                    <button id="btnDatosVehiculo" class="tab-button bg-gray-700 text-white px-4 py-2 rounded">Datos del
                        Vehículo</button>
                    <button id="btnDatosReserva"
                        class="tab-button bg-gray-700 text-white px-4 py-2 rounded disabled:opacity-50 disabled:cursor-not-allowed"
                        disabled>
                        Datos de Reserva
                    </button>
                @else
                    <button id="btnDatosVehiculo" class="tab-button bg-gray-700 text-white px-4 py-2 rounded">Datos del
                        Vehículo</button>
                    <button id="btnDatosReserva" class="tab-button bg-gray-700 text-white px-4 py-2 rounded">Datos de
                        Reserva</button>
                @endif
            </div>

            <!-- Contenido dinámico -->
            <div id="datosVehiculo" class="tab-content">
                <h2 class="text-xl text-white mb-4">Datos del Vehículo</h2>
                <div>
                    @if ($vehicles->isEmpty())
                        <form action="{{ route('reserve.store') }}" method="POST">
                            @csrf

                            <div class="grid grid-cols-2 gap-6">
                                <!-- Primera columna -->
                                <div>
                                    <div class="mb-4">
                                        <label for="license_plate" class="block text-gray-200 mb-2">Patente</label>
                                        <input type="text" id="license_plate" name="license_plate"
                                            class="w-full px-4 py-2 rounded bg-gray-700 text-white">
                                        @error('license_plate')
                                            <div class="text-red-500 p-2 rounded ">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label for="brand" class="block text-gray-200 mb-2">Marca</label>
                                        <select id="brand" name="brand"
                                            class="w-full px-4 py-2 rounded bg-gray-700 text-white">
                                            <option value="">Seleccione una marca</option>
                                            @foreach ($brands as $brand)
                                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('brand')
                                            <div class="text-red-500 p-2 rounded">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label for="model" class="block text-gray-200 mb-2">Modelo</label>
                                        <input type="text" id="model" name="model"
                                            class="w-full px-4 py-2 rounded bg-gray-700 text-white">
                                        @error('model')
                                            <div class="text-red-500 p-2 rounded">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Segunda columna -->
                                <div>
                                    <div class="mb-4">
                                        <label for="year" class="block text-gray-200 mb-2">Año del Vehículo
                                            (xxxx)</label>
                                        <input type="number" id="year" name="year"
                                            class="w-full px-4 py-2 rounded bg-gray-700 text-white">
                                        @error('year')
                                            <div class="text-red-500 p-2 rounded">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label for="vehicle_type" class="block text-gray-200 mb-2">Tipo de
                                            Vehículo</label>
                                        <select id="vehicle_type" name="vehicle_type"
                                            class="w-full px-4 py-2 rounded bg-gray-700 text-white">
                                            <option value="">Seleccione un tipo</option>
                                            @foreach ($vehicle_types as $vehicle_type)
                                                <option value="{{ $vehicle_type->id }}">{{ $vehicle_type->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('vehicle_type')
                                            <div class=" text-red-500 p-2 rounded">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Botón de acción -->
                            <div class="flex justify-end mt-6">
                                <button type="submit"
                                    class="bg-red-600 hover:bg-red-700 text-white px-6 py-2 rounded">Guardar
                                    y Seguir</button>
                            </div>
                        </form>
                    @else
                        <form action="{{ route('reserve.store') }}" method="POST">
                            @csrf

                            <div class="grid grid-cols-2 gap-6">
                                <!-- Primera columna -->
                                <div>
                                    <div class="mb-4">
                                        <label for="license_plate" class="block text-gray-200 mb-2">Patente</label>
                                        <input type="text" id="license_plate" name="license_plate"
                                            value="{{ $vehicle->license_plate }}"
                                            class="w-full px-4 py-2 rounded bg-gray-700 text-white">
                                        @error('license_plate')
                                            <div class="text-red-500 p-2 rounded ">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label for="brand" class="block text-gray-200 mb-2">Marca</label>
                                        <select id="brand" name="brand"
                                            class="w-full px-4 py-2 rounded bg-gray-700 text-white">
                                            <option value="">Seleccione una marca</option>
                                            @foreach ($brands as $brand)
                                                <option value="{{ $brand->id }}" @selected($brand->id == $vehicle->brand_id)>
                                                    {{ $brand->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('brand')
                                            <div class="text-red-500 p-2 rounded ">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label for="model" class="block text-gray-200 mb-2">Modelo</label>
                                        <input type="text" id="model" name="model"
                                            value="{{ $vehicle->model }}"
                                            class="w-full px-4 py-2 rounded bg-gray-700 text-white">
                                        @error('model')
                                            <div class="text-red-500 p-2 rounded ">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Segunda columna -->
                                <div>
                                    <div class="mb-4">
                                        <label for="year" class="block text-gray-200 mb-2">Año del Vehículo
                                            (xxxx)</label>
                                        <input type="number" id="year" name="year"
                                            value="{{ $vehicle->year }}"
                                            class="w-full px-4 py-2 rounded bg-gray-700 text-white">
                                        @error('year')
                                            <div class="text-red-500 p-2 rounded ">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label for="vehicle_type" class="block text-gray-200 mb-2">Tipo de
                                            Vehículo</label>
                                        <select id="vehicle_type" name="vehicle_type"
                                            class="w-full px-4 py-2 rounded bg-gray-700 text-white">
                                            <option value="">Seleccione un tipo</option>
                                            @foreach ($vehicle_types as $vehicle_type)
                                                <option value="{{ $vehicle_type->id }}" @selected($vehicle_type->id == $vehicle->vehicle_type_id)>
                                                    {{ $vehicle_type->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('year')
                                            <div class="text-red-500 p-2 rounded ">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label for="vehicles" class="block text-gray-200 mb-2">Tus vehiculos</label>
                                        <select id="vehicles" name="vehicles"
                                            class="w-full px-4 py-2 rounded bg-gray-700 text-white">
                                            {{-- <option value="">Seleccione un tipo</option> --}}
                                            @foreach ($vehicles as $vehicleAll)
                                                <option value="{{ $vehicleAll->id }}" @selected($vehicleAll->id == $vehicle->id)>
                                                    Patente: {{ $vehicleAll->license_plate }} -- Marca:
                                                    {{ $vehicleAll->brand->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Botón de acción -->
                            <div class="flex justify-end mt-6">
                                <button type="submit"
                                    class="bg-red-600 hover:bg-red-700 text-white px-6 py-2 rounded">Guardar
                                    y Seguir</button>
                            </div>
                        </form>
                    @endif

                </div>

            </div>

            <div id="datosReserva" class="tab-content hidden">
                <h2 class="text-xl text-white mb-4">Datos de Reserva </h2>
                <p class="text-gray-300">Formulario de datos del vehículo (en construcción).</p>

                <form action="{{ route('dashboard') }}" method="POST">
                    @csrf

                    <!-- Botón de acción -->
                    <div class="flex justify-end mt-6">
                        <button type="submit"
                            class="bg-red-600 hover:bg-red-700 text-white px-6 py-2 rounded">Guardar
                            y Seguir</button>
                    </div>
                </form>
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
    </script>
</body>

</html>
