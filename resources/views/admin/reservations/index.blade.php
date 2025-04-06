<x-admin.admin-template title="Reservas" sidebar="admin.components.sidebar">
    <div>
        <section>
            <div class="flex justify-end">
                <div class="grid grid-cols-1 gap-1">
                    <h4 class="text-gray-300">Se pueden filtrar por:</h4>
                    <h4 class="text-gray-300">Fecha:DD-MM-AAAA, Nombre, DNI y Patente</h4>
                    <x-search-button text="Buscar" route="reservations.index"  placeholder="Buscar..."/>
                </div>
            </div>
        </section>

        <!-- Tabla de Reservas -->
        @include('admin.reservations.components.reservation-table')

    </div>
</x-admin.admin-template>
