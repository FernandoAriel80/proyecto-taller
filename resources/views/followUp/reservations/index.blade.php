<x-app-layout>
    <div class="px-4 bg-slate-700">
        <div class="flax items-center content-center mx-20 py-5">
            <h1 class="text-xl font-bold mb-4 text-gray-200 text-center">Reservas</h1>

            <!-- Modal Vehicle -->
            <section>
                <div id="modalVehicle"
                    class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 hidden">
                    <div class="bg-white p-8 rounded-lg shadow-lg w-11/12 max-w-4xl">
                        <div class="flex justify-between items-center mb-6">
                            <h4 class="text-2xl font-semibold text-gray-800">Detalles del Vehículo</h4>
                            <button onclick="closeVehiclesModal()"
                                class="p-1 bg-red-600 hover:bg-red-700 text-white rounded-md">
                                Cerrar
                            </button>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="min-w-full bg-gray-100 rounded-lg">
                                <thead class="bg-slate-500 text-white">
                                    <tr>
                                        <th class="px-4 py-2 text-left">ID</th>
                                        <th class="px-4 py-2 text-left">Vehículo</th>
                                        <th class="px-4 py-2 text-left">Placa</th>
                                        <th class="px-4 py-2 text-left">Nombre</th>
                                        <th class="px-4 py-2 text-left">Modelo</th>
                                        <th class="px-4 py-2 text-left">Año</th>
                                        <th class="px-4 py-2 text-left">Combustible</th>
                                        <th class="px-4 py-2 text-left">Recorrido</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($reservations as $reservation)
                                        <tr class="hover:bg-gray-50 transition-colors border-b border-gray-200">
                                            <td class="px-4 py-2">{{ $reservation->vehicle->id }}</td>
                                            <td class="px-4 py-2">
                                                {{ $reservation->vehicle->vehicle_type->name }}</td>
                                            <td class="px-4 py-2">
                                                {{ $reservation->vehicle->license_plate }}
                                            </td>
                                            <td class="px-4 py-2">{{ $reservation->vehicle->brand->name }}
                                            </td>
                                            <td class="px-4 py-2">{{ $reservation->vehicle->model }}</td>
                                            <td class="px-4 py-2">{{ $reservation->vehicle->year }}</td>
                                            <td class="px-4 py-2">{{ $reservation->vehicle->fuel_type }}
                                            </td>
                                            <td class="px-4 py-2">
                                                {{ $reservation->vehicle->current_mileage }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Modal User -->
            <section>
                <div id="modalUser"
                    class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 hidden">
                    <div class="bg-white p-8 rounded-lg shadow-lg w-11/12 max-w-4xl">
                        <div class="flex justify-between items-center mb-6">
                            <h4 class="text-2xl font-semibold text-gray-800">Detalles del Usuario</h4>
                            <button onclick="closeUserModal()"
                                class="p-1 bg-red-600 hover:bg-red-700 text-white rounded-md">
                                Cerrar
                            </button>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="min-w-full bg-gray-100 rounded-lg">
                                <thead class="bg-slate-500 text-white">
                                    <tr>
                                        <th class="px-4 py-2 text-left">ID</th>
                                        <th class="px-4 py-2 text-left">Nombre</th>
                                        <th class="px-4 py-2 text-left">Correo</th>
                                        <th class="px-4 py-2 text-left">Teléfono</th>
                                        <th class="px-4 py-2 text-left">DNI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($reservations as $reservation)
                                        <tr class="hover:bg-gray-50 transition-colors border-b border-gray-200">
                                            <td class="px-4 py-2">{{ $reservation->user->id }}</td>
                                            <td class="px-4 py-2">{{ $reservation->user->name }}</td>
                                            <td class="px-4 py-2">{{ $reservation->user->email }}</td>
                                            <td class="px-4 py-2">{{ $reservation->user->phone_number }}
                                            </td>
                                            <td class="px-4 py-2">{{ $reservation->user->dni }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Tabla de Reservas -->
            @if ($reservations->count())
                <section class="mt-8">
                    <div class="overflow-x-auto shadow-md rounded-lg">
                        <table class="min-w-full bg-white  border-gray-200">
                            <thead class="bg-slate-500 text-white">
                                <tr>
                                    <th class="px-4 py-2 text-left">ID</th>
                                    <th class="px-4 py-2 text-left">Nombre</th>
                                    <th class="px-4 py-2 text-left">Hora</th>
                                    <th class="px-4 py-2 text-left">Fecha</th>
                                    <th class="px-4 py-2 text-left">Detalles</th>
                                    <th class="px-4 py-2 text-left">Confirmación</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reservations as $reservation)
                                    <tr class="hover:bg-gray-50 transition-colors border-b border-gray-200">
                                        <td class="px-4 py-2">{{ $reservation->id }}</td>
                                        <td class="px-4 py-2">{{ $reservation->user->name }}</td>
                                        <td class="px-4 py-2">{{ \Carbon\Carbon::parse($reservation->time)->format("H:i") }}</td>
                                        <td class="px-4 py-2">{{ \Carbon\Carbon::parse($reservation->date)->format("d-m-Y") }}</td>
                                        <td class="px-4 py-2">
                                            <div class="flex space-x-2">
                                                <button onclick="openUserModal()"
                                                    class="p-1 bg-red-600 hover:bg-red-700 text-white rounded-md">
                                                    Ver Usuario
                                                </button>
                                                <button onclick="openVehiclesModal()"
                                                    class="p-1 bg-red-600 hover:bg-red-700 text-white rounded-md">
                                                    Ver Vehículo
                                                </button>
                                            </div>
                                        </td>
                                        @if ($reservation->is_confirmed == 0)
                                            <td class="px-4 py-2 text-red-700">No Confirmado</td>
                                        @else
                                            <td class="px-4 py-2 text-green-700">Confirmado</td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </section>
            @else
                <section class="mt-8">
                    <h4 class="text-xl text-gray-50">No hay reservas</h4>
                </section>
            @endif
        </div>
    </div>
</x-app-layout>

<script>
    // Funciones para abrir y cerrar modales
    function openVehiclesModal() {
        document.getElementById("modalVehicle").classList.remove("hidden");
    }

    function closeVehiclesModal() {
        document.getElementById("modalVehicle").classList.add("hidden");
    }

    function openUserModal() {
        document.getElementById("modalUser").classList.remove("hidden");
    }

    function closeUserModal() {
        document.getElementById("modalUser").classList.add("hidden");
    }
</script>
