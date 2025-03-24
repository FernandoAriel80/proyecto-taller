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
                                <td class="px-4 py-2">
                                    <div class="flex space-x-2">
                                        <form action="{{ route('reservations.confirmed', $reservation->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit"
                                                class="p-1 bg-red-600 hover:bg-red-700 text-white rounded-md">
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
                                                class="p-1 bg-red-600 hover:bg-red-700 text-white rounded-md">
                                                Rechazar
                                            </button>
                                        </form>
                                        <a href="{{ route('register.vehicle.create', $reservation->id) }}">
                                            <button type="submit"
                                                class="p-1 bg-red-600 hover:bg-red-700 text-white rounded-md">
                                                Registrar en taller
                                            </button>
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
