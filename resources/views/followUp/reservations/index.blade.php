<x-admin.admin-template title="Reservas" sidebar="followUp.components.sidebar">

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
                                <td class="px-4 py-2">
                                    {{ \Carbon\Carbon::parse($reservation->time)->format('H:i') }}</td>
                                <td class="px-4 py-2">
                                    {{ \Carbon\Carbon::parse($reservation->date)->format('d-m-Y') }}</td>
                                <td class="px-4 py-2">
                                    <div class="flex space-x-2">
                                        <x-open-modal-button anyFunction="openUserModal"
                                            current_id="{{ $reservation->user->id }}">
                                            Ver Usuario
                                        </x-open-modal-button>
                                        <!-- Modal User -->
                                        @include('followUp.reservations.components.model-user')

                                        <x-open-modal-button anyFunction="openVehiclesModal"
                                            current_id="{{ $reservation->vehicle->id }}">
                                            Ver Vehículo
                                        </x-open-modal-button>
                                        <!-- Modal Vehicle -->
                                        @include('followUp.reservations.components.model-vehicle')
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

</x-admin.admin-template>
