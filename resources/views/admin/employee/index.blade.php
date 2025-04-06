<x-admin.admin-template title="" sidebar="admin.components.sidebar">
    <div class="py-5">
        @if (session('success'))
            <p class="text-green-400 mb-4">{{ session('success') }}</p>
        @endif

        <h1 class="text-center text-3xl font-bold mb-4 text-gray-200">Empleados</h1>
        <div class="grid grid-rows-1 grid-cols-1 md:grid-cols-3 gap-2 p-2">
            <div>
                <!-- Botón para abrir el modal -->
                <x-open-modal-button anyFunction="openCreateModal">
                    Crear Empleado
                </x-open-modal-button>
            </div>
            <div class="md:col-start-3">
                <x-search-button text="Buscar" route="employee.index"  placeholder="Buscar..."/>
            </div>
        </div>

        <!-- ModalCreate -->
        <section>
            @include('admin.employee.components.create-modal')
        </section>
        <!-- table -->
        @include('admin.employee.components.employee-table')

    </div>
</x-admin.admin-template>



<script>
    //create
    function openCreateModal() {
        document.getElementById("modalCreate").classList.remove("hidden");
    }
</script>
