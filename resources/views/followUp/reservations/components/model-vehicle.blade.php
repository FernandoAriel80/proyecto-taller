<section>
    <div id="modalVehicle{{ $reservation->vehicle->id }}"
        class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 hidden">
        <div class="bg-white p-8 rounded-lg shadow-lg w-11/12 max-w-4xl">
            <div class="flex justify-between items-center mb-6">
                <h4 class="text-2xl font-semibold text-gray-800">Detalles del Vehículo</h4>
                <x-close-modal-button anyFunction="closeVehiclesModal" current_id="{{ $reservation->vehicle->id }}">
                    Cerrar
                </x-close-modal-button>
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

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<script>
    // Funciones para abrir y cerrar modales
    function openVehiclesModal(id) {
        document.getElementById("modalVehicle" + id).classList.remove("hidden");
    }

    function closeVehiclesModal(id) {
        document.getElementById("modalVehicle" + id).classList.add("hidden");
    }
</script>
