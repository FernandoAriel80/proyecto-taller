<x-app-layout>
    <div class="px-4 bg-slate-700">
        <div class="flax items-center content-center mx-20 py-5">
            <h1 class="text-xl font-bold mb-4 text-gray-200 text-center">Registrar Vehiculo</h1>
            <section>
                <div class="flex space-x-2">
                    <button onclick="openVehiclesModal()" class="p-1 bg-red-600 hover:bg-red-700 text-white rounded-md">
                        Ver modal
                    </button>
                </div>
            </section>
            <section>
                <div class="flex justify-end">
                    <form action="{{ route('register.vehicle.index') }}" method="GET">
                        {{-- @csrf --}}
                        <input type="search" class="rounded-md" name="search" value="{{ request('search') }}"
                            placeholder="Buscar">
                        <button type="submit"
                            class="p-2 bg-red-600 hover:bg-red-700 rounded-md text-white ">Buscar</button>
                    </form>
                </div>
            </section>
            <!-- Modal Vehicle -->
            <section>
                <div id="modalVehicle"
                    class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 hidden">
                    <div class="bg-white p-8 rounded-lg shadow-lg w-11/12 max-w-4xl">
                        <div class="flex justify-between items-center mb-6">
                            <h4 class="text-2xl font-semibold text-gray-800">ingresar</h4>
                            <button onclick="closeVehiclesModal()"
                                class="p-1 bg-red-600 hover:bg-red-700 text-white rounded-md">
                                Cerrar
                            </button>
                        </div>

                    </div>
                </div>
            </section>

            <!-- Tabla de Reservas -->
            @if ($in_workshops->count())
                <section class="mt-8">
                    <div class="overflow-x-auto shadow-md rounded-lg">
                        <table class="min-w-full bg-white  border-gray-200">
                            <thead class="bg-slate-500 text-white">
                                <tr>
                                    <th class="px-4 py-2 text-left">ID</th>
                                    <th class="px-4 py-2 text-left">Nombre</th>
                                    <th class="px-4 py-2 text-left">Patente</th>
                                    <th class="px-4 py-2 text-left">Detalles</th>
                                    <th class="px-4 py-2 text-left">Fecha Entrada</th>
                                    <th class="px-4 py-2 text-left">Fecha Salida</th>
                                    <th class="px-4 py-2 text-left">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($in_workshops as $in_workshop)
                                    <tr class="hover:bg-gray-50 transition-colors border-b border-gray-200">
                                        <td class="px-4 py-2">{{ $in_workshop->id }}</td>
                                        <td class="px-4 py-2">{{ $in_workshop->name }}</td>
                                        <td class="px-4 py-2">{{ $in_workshop->license_plate }}</td>
                                        <td>
                                            <button onclick="openDescriptionModal({{ $in_workshop->id }})"
                                                class="p-1 bg-red-600 hover:bg-red-700 text-white rounded-md">
                                                Descripción
                                            </button>

                                            <section>
                                                <div id="modalDescription{{ $in_workshop->id }}"
                                                    class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 hidden">
                                                    <div class="bg-white p-8 rounded-lg shadow-lg w-11/12 max-w-4xl">
                                                        <div>
                                                            <button
                                                                onclick="claseDescriptionModal({{ $in_workshop->id }})"
                                                                class="p-1 bg-red-600 hover:bg-red-700 text-white rounded-md">
                                                                Cerrar
                                                            </button>
                                                            <h4
                                                                class="text-2xl text-center font-semibold text-gray-800">
                                                                Detalles
                                                            </h4>
                                                            <div class="grid grid-cols-1 md:grid-cols-3 ">
                                                                <label>Correo: <p class="font-semibold text-gray-800">
                                                                        {{ $in_workshop->email }}</p> </label>
                                                                <label>Numero de celular: <p
                                                                        class="font-semibold text-gray-800">
                                                                        {{ $in_workshop->phone_number }}</p> </label>
                                                                <label>Vehiculo: <p class="font-semibold text-gray-800">
                                                                        {{ $in_workshop->vehicle_type }}</p></label>
                                                                <label>Patente: <p class="font-semibold text-gray-800">
                                                                        {{ $in_workshop->license_plate }}</p></label>
                                                                <label>Marca: <p class="font-semibold text-gray-800">
                                                                        {{ $in_workshop->brand }}</p></label>
                                                                <label>Año: <p class="font-semibold text-gray-800">
                                                                        {{ $in_workshop->year }}</p></label>

                                                            </div>

                                                            <label>Descripción:</label>
                                                            <p class="font-semibold text-gray-800">
                                                                {{ $in_workshop->description }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>

                                        </td>
                                        <td class="px-4 py-2">
                                            {{ \Carbon\Carbon::parse($in_workshop->check_in_date)->format('d-m-Y') }}
                                        </td>
                                        <td class="px-4 py-2">
                                            {{ $in_workshop->check_out_date != null ? \Carbon\Carbon::parse($in_workshop->check_out_date)->format('d-m-Y') : 'No hay fecha' }}
                                        </td>
                                        <td>
                                            {{--  --}}
                                            <button class="p-1 bg-red-600 hover:bg-red-700 text-white rounded-md">
                                                <a
                                                    href="{{ route('register.vehicle.edit', $in_workshop->id) }}">Actualizar</a>
                                            </button>
                                            <button onclick="confirmedModal({{ $in_workshop->id }})"
                                                class="p-1 bg-red-600 hover:bg-red-700 text-white rounded-md">
                                                Dar de Alta
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </section>
                <section>
                    <!-- Paginación -->
                    <div class="mt-4">
                        {{ $in_workshops->appends(['search' => request('search')])->links() }}
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
    // Funciones para abrir y cerrar modales
    function openDescriptionModal(id) {
        document.getElementById('modalDescription' + id).classList.remove('hidden');
    }

    function claseDescriptionModal(id) {
        document.getElementById('modalDescription' + id).classList.add('hidden');
    }
</script>
