<x-admin.admin-template title=" Vehiculos Asignados a Empleados">
    <div>
        <section class="flex justify-end">
            <x-search-button text="Buscar" route="assigned.employees" placeholder="Buscar..." />
        </section>
        @if ($assigned_employees->count())
            <section class="mt-8">
                <div class="overflow-x-auto shadow-md rounded-lg">
                    <table class="min-w-full bg-white  border-gray-200">
                        <thead class="bg-slate-500 text-white">
                            <tr>
                                <th class="px-4 py-2 text-left">ID</th>
                                <th class="px-4 py-2 text-left">Nombre Empleado</th>
                                <th class="px-4 py-2 text-left">Detalles Empleado</th>
                                <th class="px-4 py-2 text-left">Patente del Auto</th>
                                <th class="px-4 py-2 text-left">Detalles Cliente</th>
                                <th class="px-4 py-2 text-left">Fecha de asignacion</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($assigned_employees as $assigned_employee)
                                <tr class="hover:bg-gray-50 transition-colors border-b border-gray-200">
                                    <td class="px-4 py-2">{{ $assigned_employee->id }}</td>
                                    <td class="px-4 py-2">{{ $assigned_employee->user->name }}</td>
                                    <td>
                                        <x-open-modal-button anyFunction="openDescriptionEmployeeModal"
                                            current_id="{{ $assigned_employee->id }}">
                                            Descripción
                                        </x-open-modal-button>
                                        <section>
                                            <x-details-modal id="modalDescriptionEmployee{{ $assigned_employee->id }}">
                                                <div>
                                                    <x-close-modal-button anyFunction="claseDescriptionEmployeeModal"
                                                        current_id="{{ $assigned_employee->id }}">
                                                        Cerrar
                                                    </x-close-modal-button>
                                                    <div class="bg-slate-500">
                                                        <h4 class="text-2xl text-center font-semibold text-white">
                                                            Detalles Empleado
                                                        </h4>
                                                    </div>
                                                    <div class="grid grid-cols-1 md:grid-cols-3 ">
                                                        <label>Nombre: <p class="font-semibold text-gray-800">
                                                                {{ $assigned_employee->user->name }}</p>
                                                        </label>
                                                        <label>Correo: <p class="font-semibold text-gray-800">
                                                                {{ $assigned_employee->user->email }}</p>
                                                        </label>
                                                        <label>Numero de celular: <p
                                                                class="font-semibold text-gray-800">
                                                                {{ $assigned_employee->user->phone_number }}
                                                            </p> </label>
                                                        <label>DNI: <p class="font-semibold text-gray-800">
                                                                {{ $assigned_employee->user->dni }}</p>
                                                        </label>
                                                        <label>Rol: <p class="font-semibold text-gray-800">
                                                                {{ $assigned_employee->user->role }}</p>
                                                        </label>
                                                    </div>
                                                </div>
                                            </x-details-modal>
                                        </section>
                                    </td>
                                    <td class="px-4 py-2">
                                        {{ $assigned_employee->vehicleInWorkshop->license_plate }}</td>
                                    <td>
                                        <x-open-modal-button anyFunction="openDescriptionVehicleModal"
                                            current_id="{{ $assigned_employee->id }}">
                                            Descripción
                                        </x-open-modal-button>
                                        <section>
                                            <x-details-modal id="modalDescriptionVehicle{{ $assigned_employee->id }}">
                                                <div>
                                                    <x-close-modal-button anyFunction="claseDescriptionVehicleModal"
                                                        current_id="{{ $assigned_employee->id }}">
                                                        Cerrar
                                                    </x-close-modal-button>
                                                    <div class="bg-slate-500">
                                                        <h4 class="text-2xl text-center font-semibold text-white">
                                                            Detalles Cliente
                                                        </h4>
                                                    </div>
                                                    <div class="grid grid-cols-1 md:grid-cols-3 ">
                                                        <label>Nombre: <p class="font-semibold text-gray-800">
                                                                {{ $assigned_employee->vehicleInWorkshop->name }}
                                                            </p>
                                                        </label>
                                                        <label>Correo: <p class="font-semibold text-gray-800">
                                                                {{ $assigned_employee->vehicleInWorkshop->email }}
                                                            </p> </label>
                                                        <label>Numero de celular: <p
                                                                class="font-semibold text-gray-800">
                                                                {{ $assigned_employee->vehicleInWorkshop->phone_number }}
                                                            </p> </label>
                                                        <label>Vehiculo: <p class="font-semibold text-gray-800">
                                                                {{ $assigned_employee->vehicleInWorkshop->vehicle_type }}
                                                            </p></label>
                                                        <label>Patente: <p class="font-semibold text-gray-800">
                                                                {{ $assigned_employee->vehicleInWorkshop->license_plate }}
                                                            </p></label>
                                                        <label>Marca: <p class="font-semibold text-gray-800">
                                                                {{ $assigned_employee->vehicleInWorkshop->brand }}
                                                            </p></label>
                                                        <label>Año: <p class="font-semibold text-gray-800">
                                                                {{ $assigned_employee->vehicleInWorkshop->year }}
                                                            </p></label>

                                                    </div>

                                                    <label>Descripción:</label>
                                                    <p class="font-semibold text-gray-800">
                                                        {{ $assigned_employee->vehicleInWorkshop->description }}
                                                    </p>
                                                </div>
                                            </x-details-modal>
                                        </section>
                                    </td>
                                    <td class="px-4 py-2">{{ $assigned_employee->created_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </section>
            <section>
                <!-- Paginación -->
                <div class="mt-4">
                    {{ $assigned_employees->appends(['search' => request('search')])->links() }}
                </div>
            </section>
        @else
            <section class="mt-8">
                <h4 class="text-xl text-gray-50">No hay asignaciones</h4>
            </section>
        @endif
    </div>
</x-admin.admin-template>

<script>
    // Funciones para abrir y cerrar modales empleados
    function openDescriptionEmployeeModal(id) {
        document.getElementById('modalDescriptionEmployee' + id).classList.remove('hidden');
    }

    function claseDescriptionEmployeeModal(id) {
        document.getElementById('modalDescriptionEmployee' + id).classList.add('hidden');
    }

    // Funciones para abrir y cerrar modales vehiculos
    function openDescriptionVehicleModal(id) {
        document.getElementById('modalDescriptionVehicle' + id).classList.remove('hidden');
    }

    function claseDescriptionVehicleModal(id) {
        document.getElementById('modalDescriptionVehicle' + id).classList.add('hidden');
    }
</script>
