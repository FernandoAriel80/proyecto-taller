<x-app-layout>

    <div class="container mx-auto mt-8">
        <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">Reservas</h1>

        <div class="overflow-x-auto">
            <table class="table-auto w-full border-collapse border border-gray-300 shadow-md">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="border border-gray-300 px-4 py-2 text-left">ID</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Nombre</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Patente del Vehiculo</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Tipo de vehiculo</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Fecha</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Hora</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Detalles</th>

                        {{--  <th class="border border-gray-300 px-4 py-2 text-left">Acciones</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reservations as $reservation)
                        <tr class="odd:bg-white even:bg-gray-100">
                            <td class="border border-gray-300 px-4 py-2">{{ $reservation->id }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $reservation->user->name }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $reservation->vehicle->license_plate }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $reservation->vehicle->brand->name }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $reservation->date }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $reservation->time }}</td>
                            <td class="border border-gray-300 px-4 py-2"><a href="{{ route('followUp.details') }}">Ver</a></td>
                            {{--  @if (Carbon::parse($reservation->created_at)->isPaset())
                                <td class="border border-gray-300 px-4 py-2">{{ $reservation->date }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ $reservation->time }}</td>
                            @else
                                <td class="border border-red-300 text-red-500 px-4 py-2">{{ $reservation->date }}</td>
                                <td class="border border-red-300 text-red-500 px-4 py-2">{{ $reservation->time }}</td>
                            @endif --}}
                            {{-- <td class="border border-gray-300 px-4 py-2">
                                <a href="{{ route('reservations.edit', $reservation->id) }}"
                                    class="text-blue-500 hover:text-blue-700">Editar</a> |
                                <form action="{{ route('reservations.destroy', $reservation->id) }}" method="POST"
                                    class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700"
                                        onclick="return confirm('¿Estás seguro de eliminar esta reserva?')">Eliminar</button>
                                </form>
                            </td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
