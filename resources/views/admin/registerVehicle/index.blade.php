<x-admin.admin-template title="Registrar Vehiculo">
    <div>
        <div class="flex justify-between">
            <section>
                <x-color-button>
                    <a href="{{ route('assigned.employees') }}">Ver empleados asignados</a>
                </x-color-button>
            </section>
            <section>
                <x-search-button text="Buscar" route="register.vehicle.index" placeholder="Buscar..." />
            </section>
        </div>

        <!-- Modal (oculto por defecto) -->
        @include('admin.components.delete-modal', [
            'message' => 'Vas a dar de alta este vehiculo, esta acción no se puede deshacer.',
            'method' => 'PUT',
        ])



        <!-- Tabla de Reservas -->
        @include('admin.registerVehicle.components.reservation-table')
    </div>
</x-admin.admin-template>
