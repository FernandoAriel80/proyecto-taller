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
                            <td class="flex p-2">
                                <x-color-button  current_color="blue">
                                    <a href="{{ route('employee.edit', [$employee->id]) }}">Actualizar</a>
                                </x-color-button>

                                <!-- Botón de Eliminar -->

                                <x-open-modal-button anyFunction="openConfirmModal" current_id="{{ $employee->id }}">
                                    Eliminar
                                </x-open-modal-button>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @include('admin.components.delete-modal', [
            'message' => 'Vas a eliminar a un empleado, esta acción no se puede deshacer.',
            'method' => 'DELETE',
        ])

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
<script>
    function openConfirmModal(productId) {
        document.getElementById('deleteModal').classList.remove('hidden');
        document.getElementById('deleteForm').action = `/eliminar-empleados/${productId}`;
    }
</script>
