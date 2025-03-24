<x-admin.admin-template title="Reservas">
    <div>
        <section>
            <div class="flex justify-end">
                <div class="grid grid-cols-1 gap-1">
                    <h4 class="text-gray-300">Se pueden filtrar por:</h4>
                    <h4 class="text-gray-300">Fecha:DD-MM-AAAA, Nombre, DNI y Patente</h4>
                    <form action="{{ route('reservations.index') }}" method="GET">
                        <input type="search" class="rounded-md" name="search" value="{{ request('search') }}"
                            placeholder="Buscar">
                        <button type="submit"
                            class="p-2 bg-red-600 hover:bg-red-700 rounded-md text-white">Buscar</button>
                    </form>
                </div>
            </div>
        </section>
        <!-- Modal Vehicle -->
        @include('admin.reservations.components.modal-vehicle')

        <!-- Modal User -->
        @include('admin.reservations.components.modal-user')

        <!-- Tabla de Reservas -->
        @include('admin.reservations.components.reservation-table')

    </div>
</x-admin.admin-template>
