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
                                <x-open-modal-button anyFunction="openDescriptionModal"
                                    current_id="{{ $in_workshop->id }}">
                                    Descripción
                                </x-open-modal-button>

                                <section>
                                    <x-details-modal id="modalDescription{{ $in_workshop->id }}">
                                        <div>
                                            <x-close-modal-button anyFunction="claseDescriptionModal"
                                                current_id="{{ $in_workshop->id }}">
                                                Cerrar
                                            </x-close-modal-button>
                                            <div class="bg-slate-500">
                                                <h4 class="text-2xl text-center font-semibold text-white">
                                                    Detalles
                                                </h4>
                                            </div>
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
                                    </x-details-modal>
                                </section>

                            </td>
                            <td class="px-4 py-2">
                                {{ \Carbon\Carbon::parse($in_workshop->check_in_date)->format('d-m-Y') }}
                            </td>
                            <td class="px-4 py-2">
                                {{ $in_workshop->check_out_date != null ? \Carbon\Carbon::parse($in_workshop->check_out_date)->format('d-m-Y') : 'No hay fecha' }}
                            </td>
                            <td class="grid grid-rows-2 md:flex mt-1">
                                <!-- Botón para actualizar -->
                                <x-color-button>
                                    <a href="{{ route('register.vehicle.edit', $in_workshop->id) }}">Actualizar</a>
                                </x-color-button>
                                <!-- Botón para eliminar -->

                                @if ($in_workshop->check_out_date == null)
                                    <x-open-modal-button anyFunction="openConfirmModal"
                                        current_id="{{ $in_workshop->id }}" current_color="green">
                                        Dar de alta
                                    </x-open-modal-button>
                                @endif
                                {{-- asignar empleado --}}
                                <div>
                                    <x-post-button route="assign.store" method="POST" name="vehicle_in_workshop_id"
                                        current_id="{{ $in_workshop->id }}" current_color="red">
                                        Tomar Pedido
                                    </x-post-button>
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
