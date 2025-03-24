<x-admin.admin-template title="Registrar Vehiculo">
    <div>
        <section>
            <div class="flex justify-end">
                <form action="{{ route('register.vehicle.index') }}" method="GET">
                    <input type="search" class="rounded-md" name="search" value="{{ request('search') }}"
                        placeholder="Buscar">
                    <button type="submit"
                        class="p-2 bg-red-600 hover:bg-red-700 rounded-md text-white ">Buscar</button>
                </form>
            </div>
        </section>

        <!-- Modal (oculto por defecto) -->
        @include('admin.registerVehicle.components.delete-modal')


        <!-- Tabla de Reservas -->
        @include('admin.registerVehicle.components.reservation-table')
    </div>
    <!-- tabla de empelado asignado -->
    @include('admin.registerVehicle.components.assigned-table')
</x-admin.admin-template>
