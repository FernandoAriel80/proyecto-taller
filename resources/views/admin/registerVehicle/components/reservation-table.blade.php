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
                                                <button onclick="claseDescriptionModal({{ $in_workshop->id }})"
                                                    class="p-1 bg-red-600 hover:bg-red-700 text-white rounded-md">
                                                    Cerrar
                                                </button>
                                                <h4 class="text-2xl text-center font-semibold text-gray-800">
                                                    Detalles
                                                </h4>
                                                <div class="grid grid-cols-1 md:grid-cols-3 ">
                                                    <label>Correo: <p class="font-semibold text-gray-800">
                                                            {{ $in_workshop->email }}</p> </label>
                                                    <label>Numero de celular: <p class="font-semibold text-gray-800">
                                                            {{ $in_workshop->phone_number }}</p>
                                                    </label>
                                                    <label>Vehiculo: <p class="font-semibold text-gray-800">
                                                            {{ $in_workshop->vehicle_type }}</p>
                                                    </label>
                                                    <label>Patente: <p class="font-semibold text-gray-800">
                                                            {{ $in_workshop->license_plate }}</p>
                                                    </label>
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
                            <td class="flex mt-1">
                                {{--  --}}
                                <button class="p-1 mx-2 bg-red-600 hover:bg-red-700 text-white rounded-md">
                                    <a href="{{ route('register.vehicle.edit', $in_workshop->id) }}">Actualizar</a>
                                </button>
                                <!-- Botón para eliminar -->

                                @if ($in_workshop->check_out_date == null)
                                    <button onclick="openConfirmModal({{ $in_workshop->id }})"
                                        class="p-1 mx-2 bg-red-600 hover:bg-red-700 text-white rounded-md">
                                        Dar de alta
                                    </button>
                                @endif
                                {{-- asignar empleado --}}
                                <div class="">
                                    <form method="POST" action="{{ route('assign.store') }}">
                                        @csrf
                                        <input type="hidden" name="vehicle_in_workshop_id"
                                            value="{{ $in_workshop->id }}">
                                        <button type="submit"
                                            class="p-1 mx-2 bg-red-600 hover:bg-red-700 text-white rounded-md">
                                            Tomar Pedido
                                        </button>
                                    </form>
                                </div>
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

<script>
    function openConfirmModal(productId) {
        document.getElementById('deleteModal').classList.remove('hidden');
        document.getElementById('deleteForm').action = `/dar-de-alta-vehiculo-en-taller/${productId}`;
    }

    // Funciones para abrir y cerrar modales
    function openDescriptionModal(id) {
        document.getElementById('modalDescription' + id).classList.remove('hidden');
    }

    function claseDescriptionModal(id) {
        document.getElementById('modalDescription' + id).classList.add('hidden');
    }
</script>
