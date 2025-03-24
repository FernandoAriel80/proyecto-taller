<div>
    <h1 class="text-xl font-bold mb-4 text-gray-200 text-center">Vehiculos Asignados a Empleados</h1>
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
                            <th class="px-4 py-2 text-left">Detalles Vehiculo</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($assigned_employees as $assigned_employee)
                            <tr class="hover:bg-gray-50 transition-colors border-b border-gray-200">
                                <td class="px-4 py-2">{{ $assigned_employee->id }}</td>
                                <td class="px-4 py-2">{{ $assigned_employee->user->name }}</td>
                                <td>
                                    <button onclick="openDescriptionEmployeeModal({{ $assigned_employee->id }})"
                                        class="p-1 bg-red-600 hover:bg-red-700 text-white rounded-md">
                                        Descripción
                                    </button>
                                    <section>
                                        <div id="modalDescriptionEmployee{{ $assigned_employee->id }}"
                                            class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 hidden">
                                            <div class="bg-white p-8 rounded-lg shadow-lg w-11/12 max-w-4xl">
                                                <div>
                                                    <button
                                                        onclick="claseDescriptionEmployeeModal({{ $assigned_employee->id }})"
                                                        class="p-1 bg-red-600 hover:bg-red-700 text-white rounded-md">
                                                        Cerrar
                                                    </button>
                                                    <h4 class="text-2xl text-center font-semibold text-gray-800">
                                                        Detalles Empleado
                                                    </h4>
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
                                            </div>
                                        </div>
                                    </section>
                                </td>
                                <td class="px-4 py-2">
                                    {{ $assigned_employee->vehicleInWorkshop->license_plate }}</td>
                                <td>
                                    <button onclick="openDescriptionVehicleModal({{ $assigned_employee->id }})"
                                        class="p-1 bg-red-600 hover:bg-red-700 text-white rounded-md">
                                        Descripción
                                    </button>
                                    <section>
                                        <div id="modalDescriptionVehicle{{ $assigned_employee->id }}"
                                            class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 hidden">
                                            <div class="bg-white p-8 rounded-lg shadow-lg w-11/12 max-w-4xl">
                                                <div>
                                                    <button
                                                        onclick="claseDescriptionVehicleModal({{ $assigned_employee->id }})"
                                                        class="p-1 bg-red-600 hover:bg-red-700 text-white rounded-md">
                                                        Cerrar
                                                    </button>
                                                    <h4 class="text-2xl text-center font-semibold text-gray-800">
                                                        Detalles Cliente
                                                    </h4>
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
                                            </div>
                                        </div>
                                    </section>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    @else
        <section class="mt-8">
            <h4 class="text-xl text-gray-50">No hay asignaciones</h4>
        </section>
    @endif
</div>
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
