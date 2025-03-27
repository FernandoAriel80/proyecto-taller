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
                        <th class="px-4 py-2 text-center">Detalles</th>
                        <th class="px-4 py-2 text-left">Confirmación</th>
                        <th class="px-4 py-2 text-center">Acciones</th>
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
                                    <x-open-modal-button anyFunction="openUserModal">
                                        Ver Usuario
                                    </x-open-modal-button>
                                    <x-open-modal-button anyFunction="openVehiclesModal">
                                        Ver Vehículo
                                    </x-open-modal-button>
                                </div>
                            </td>
                            @if ($reservation->is_confirmed == 0)
                                <td class="px-4 py-2 text-red-700">No Confirmado</td>
                                <td class="px-4 py-2">
                                    <div class="flex space-x-2">
                                        <x-post-button current_color="green" method="PUT"
                                            route="reservations.confirmed" current_id="{{ $reservation->id }}">
                                            Confirmar
                                        </x-post-button>
                                    </div>
                                </td>
                            @else
                                <td class="px-4 py-2 text-green-700">Confirmado</td>
                                <td class="px-4 py-2">
                                    <div class="flex space-x-2">
                                        <x-post-button current_color="red" method="PUT" route="reservations.decline"
                                            current_id="{{ $reservation->id }}">
                                            Rechazar
                                        </x-post-button>
                                        <a href="{{ route('register.vehicle.create', $reservation->id) }}">
                                            <x-color-button current_color="red">
                                                Registrar en taller
                                            </x-color-button>
                                        </a>
                                    </div>
                                </td>
                            @endif

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
    <section>
        <!-- Paginación -->
        <div class="mt-4">
            {{ $reservations->appends(['search' => request('search')])->links() }}
        </div>
    </section>
@else
    <section class="mt-8">
        <h4 class="text-xl text-gray-300">No hay reservas</h4>
    </section>
@endif
