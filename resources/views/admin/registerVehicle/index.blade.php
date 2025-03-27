<x-admin.admin-template title="Registrar Vehiculo">
    <div>
        <section>
            <div class="flex justify-end">
                <x-search-button text="Buscar" route="register.vehicle.index"  placeholder="Buscar..." />
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
