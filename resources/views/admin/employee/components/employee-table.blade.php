@if ($employees->count())
    <section class="p-4">
        <div class="overflow-x-auto shadow-md rounded-lg">
            <table class="min-w-full bg-white border-gray-200">
                <thead class="bg-slate-500 text-white">
                    <tr>
                        <th class="py-3 px-4 text-left">ID</th>
                        <th class="py-3 px-4 text-left">Nombre</th>
                        <th class="py-3 px-4 text-left">Correo</th>
                        <th class="py-3 px-4 text-left">DNI</th>
                        <th class="py-3 px-4 text-left">Número de Teléfono</th>
                        <th class="py-3 px-4 text-left">Fecha de Creación</th>
                        <th class="py-3 px-4 text-left">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employees as $employee)
                        <tr class="hover:bg-gray-50 transition-colors border-b border-gray-200">
                            <td class="py-3 px-4">{{ $employee->id }}</td>
                            <td class="py-3 px-4">{{ $employee->name }}</td>
                            <td class="py-3 px-4">{{ $employee->email }}</td>
                            <td class="py-3 px-4">{{ $employee->dni }}</td>
                            <td class="py-3 px-4">{{ $employee->phone_number }}</td>
                            <td class="py-3 px-4">
                                @if ($employee->created_at)
                                    {{ $employee->created_at->timezone('America/Argentina/Buenos_Aires')->format('d/m/Y H:i:s') }}
                                @else
                                    Fecha no disponible
                                @endif
                            </td>
                            <td>
                                <button class="p-1 bg-blue-600 hover:bg-blue-700 text-white rounded-md">
                                    <a href="{{ route('employee.edit', [$employee->id]) }}">Actualizar</a>
                                </button>

                                <!-- Botón de Eliminar -->
                                <form action="{{ route('employee.destroy', $employee->id) }}" method="POST"
                                    class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-1 bg-red-600 hover:bg-red-700 text-white rounded-md"
                                        onclick="return confirm('¿Estás seguro de eliminar este usuario?')">
                                        Eliminar
                                    </button>
                                </form>
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
            {{ $employees->appends(['search' => request('search')])->links() }}
        </div>
    </section>
@else
    <p class="text-gray-500 mt-4">No se encontraron empleados.</p>
@endif
