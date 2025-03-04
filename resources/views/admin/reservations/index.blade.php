<x-app-layout>

    <h1>Reservas</h1>
    <section>
        <div class="flex justify-between p-5">
            <!-- Botón para abrir el modal -->

            <div>
                <div id="modalCreate"
                    class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 hidden">
                    <div class="bg-gray-700 p-6 rounded-lg shadow-lg w-auto">
                        <button onclick="closeVehiclesModal()" class="bg-red-500 text-white px-4 py-2 rounded-md">
                            Cerrar
                        </button>
                        <h4>Lista de autos</h4>
                        <table>
                            <tr>
                                <td>id</td>
                                <td>Vehiculo</td>
                                <td>Placa</td>
                                <td>Nombre</td>
                                <td>Modelo</td>
                                <td>Año</td>
                                <td>Combustible</td>
                                <td>Recorrido</td>
                            </tr>
                            @foreach ($reservations as $reservation)
                                <tr>
                                    <td>{{ $reservation->vehicle->id }}</td>
                                    <td>{{ $reservation->vehicle->vehicle_type->name }}</td>
                                    <td>{{ $reservation->vehicle->license_plate }}</td>
                                    <td>{{ $reservation->vehicle->brand->name }}</td>
                                    <td>{{ $reservation->vehicle->model }}</td>
                                    <td>{{ $reservation->vehicle->year }}</td>
                                    <td>{{ $reservation->vehicle->fuel_type }}</td>
                                    <td>{{ $reservation->vehicle->current_mileage }}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if ($reservations->count())
        <section>
            <div>
                <table>
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Nombre</th>
                            <th>Hora</th>
                            <th>Fecha</th>
                            <th>Accion</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @foreach ($reservations as $reservation)
                                <td>{{ $reservation->id }}</td>
                                <td>{{ $reservation->user->name }}</td>
                                <td>{{ $reservation->date }}</td>
                                <td>{{ $reservation->time }}</td>
                                <td>
                                    <button onclick="openVehiclesModal()"
                                        class="p-1 bg-red-600 hover:bg-red-700 text-white rounded-md text-xl transition">
                                        Ver autos
                                    </button>
                                </td>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
    @else
        <section>
            <h4>No hay reservas pendientes</h4>
        </section>
    @endif
</x-app-layout>

<script>
    //create
    function openVehiclesModal() {
        document.getElementById("modalCreate").classList.remove("hidden");
    }

    function closeVehiclesModal() {
        document.getElementById("modalCreate").classList.add("hidden");
    }
</script>
