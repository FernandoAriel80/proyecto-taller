<x-app-layout>
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Reservas</h1>

        <!-- Modal Vehicle -->
        <section>
            <div id="modalVehicle"
                class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 hidden">
                <div class="bg-white p-8 rounded-lg shadow-lg w-11/12 max-w-4xl">
                    <div class="flex justify-between items-center mb-6">
                        <h4 class="text-2xl font-semibold text-gray-800">Detalles del Vehículo</h4>
                        <button onclick="closeVehiclesModal()"
                            class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 transition">
                            Cerrar
                        </button>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-gray-100 rounded-lg">
                            <thead class="bg-gray-200">
                                <tr>
                                    <th class="px-4 py-2 text-left text-gray-700">ID</th>
                                    <th class="px-4 py-2 text-left text-gray-700">Vehículo</th>
                                    <th class="px-4 py-2 text-left text-gray-700">Placa</th>
                                    <th class="px-4 py-2 text-left text-gray-700">Nombre</th>
                                    <th class="px-4 py-2 text-left text-gray-700">Modelo</th>
                                    <th class="px-4 py-2 text-left text-gray-700">Año</th>
                                    <th class="px-4 py-2 text-left text-gray-700">Combustible</th>
                                    <th class="px-4 py-2 text-left text-gray-700">Recorrido</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reservations as $reservation)
                                    <tr class="border-b border-gray-200 hover:bg-gray-50">
                                        <td class="px-4 py-2 text-gray-700">{{ $reservation->vehicle->id }}</td>
                                        <td class="px-4 py-2 text-gray-700">
                                            {{ $reservation->vehicle->vehicle_type->name }}</td>
                                        <td class="px-4 py-2 text-gray-700">{{ $reservation->vehicle->license_plate }}
                                        </td>
                                        <td class="px-4 py-2 text-gray-700">{{ $reservation->vehicle->brand->name }}
                                        </td>
                                        <td class="px-4 py-2 text-gray-700">{{ $reservation->vehicle->model }}</td>
                                        <td class="px-4 py-2 text-gray-700">{{ $reservation->vehicle->year }}</td>
                                        <td class="px-4 py-2 text-gray-700">{{ $reservation->vehicle->fuel_type }}</td>
                                        <td class="px-4 py-2 text-gray-700">{{ $reservation->vehicle->current_mileage }}
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
            <div id="modalUser" class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 hidden">
                <div class="bg-white p-8 rounded-lg shadow-lg w-11/12 max-w-4xl">
                    <div class="flex justify-between items-center mb-6">
                        <h4 class="text-2xl font-semibold text-gray-800">Detalles del Usuario</h4>
                        <button onclick="closeUserModal()"
                            class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 transition">
                            Cerrar
                        </button>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-gray-100 rounded-lg">
                            <thead class="bg-gray-200">
                                <tr>
                                    <th class="px-4 py-2 text-left text-gray-700">ID</th>
                                    <th class="px-4 py-2 text-left text-gray-700">Nombre</th>
                                    <th class="px-4 py-2 text-left text-gray-700">Correo</th>
                                    <th class="px-4 py-2 text-left text-gray-700">Teléfono</th>
                                    <th class="px-4 py-2 text-left text-gray-700">DNI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reservations as $reservation)
                                    <tr class="border-b border-gray-200 hover:bg-gray-50">
                                        <td class="px-4 py-2 text-gray-700">{{ $reservation->user->id }}</td>
                                        <td class="px-4 py-2 text-gray-700">{{ $reservation->user->name }}</td>
                                        <td class="px-4 py-2 text-gray-700">{{ $reservation->user->email }}</td>
                                        <td class="px-4 py-2 text-gray-700">{{ $reservation->user->phone_number }}</td>
                                        <td class="px-4 py-2 text-gray-700">{{ $reservation->user->dni }}</td>
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
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white rounded-lg shadow-md">
                        <thead class="bg-gray-200">
                            <tr>
                                <th class="px-4 py-2 text-left text-gray-700">ID</th>
                                <th class="px-4 py-2 text-left text-gray-700">Nombre</th>
                                <th class="px-4 py-2 text-left text-gray-700">Hora</th>
                                <th class="px-4 py-2 text-left text-gray-700">Fecha</th>
                                <th class="px-4 py-2 text-left text-gray-700">Detalles</th>
                                <th class="px-4 py-2 text-left text-gray-700">Confirmación</th>
                                <th class="px-4 py-2 text-left text-gray-700">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reservations as $reservation)
                                <tr class="border-b border-gray-200 hover:bg-gray-50">
                                    <td class="px-4 py-2 text-gray-700">{{ $reservation->id }}</td>
                                    <td class="px-4 py-2 text-gray-700">{{ $reservation->user->name }}</td>
                                    <td class="px-4 py-2 text-gray-700">{{ $reservation->time }}</td>
                                    <td class="px-4 py-2 text-gray-700">{{ $reservation->date }}</td>
                                    <td class="px-4 py-2">
                                        <div class="flex space-x-2">
                                            <button onclick="openUserModal()"
                                                class="p-2 bg-red-600 hover:bg-red-700 text-white rounded-md transition">
                                                Ver Usuario
                                            </button>
                                            <button onclick="openVehiclesModal()"
                                                class="p-2 bg-red-600 hover:bg-red-700 text-white rounded-md transition">
                                                Ver Vehículo
                                            </button>
                                        </div>
                                    </td>
                                    @if ($reservation->is_confirmed == 0)
                                        <td class="px-4 py-2 text-red-700">No Confirmado</td>
                                        <td class="px-4 py-2">
                                            <div class="flex space-x-2">
                                                <form action="{{ route('reservations.confirmed', $reservation->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit"
                                                        class="p-2 bg-red-600 hover:bg-red-700 text-white rounded-md transition">
                                                        Confirmar
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    @else
                                        <td class="px-4 py-2 text-green-700">Confirmado</td>
                                        <td class="px-4 py-2">
                                            <div class="flex space-x-2">
                                                <form action="{{ route('reservations.decline', $reservation->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit"
                                                        class="p-2 bg-red-600 hover:bg-red-700 text-white rounded-md transition">
                                                        Rechazar
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    @endif

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </section>
        @else
            <section class="mt-8">
                <h4 class="text-xl text-gray-700">No hay reservas pendientes</h4>
            </section>
        @endif
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
