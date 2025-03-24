<x-admin.admin-template title="">
    <div class="py-5">
        @if (session('success'))
            <p class="text-green-400 mb-4">{{ session('success') }}</p>
        @endif

        <h1 class="text-center text-3xl font-bold mb-4 text-gray-200">Empleados</h1>
        <div class="grid grid-rows-1 grid-cols-1 md:grid-cols-3 gap-2 p-2">
            <div>
                <!-- Botón para abrir el modal -->
                <button onclick="openCreateModal()"
                    class="p-1 bg-red-600 hover:bg-red-700 text-white rounded-md text-xl transition">
                    Crear Empleado
                </button>
            </div>
            <div class="md:col-start-3">
                <form action="{{ route('employee.index') }}" method="GET">
                    {{-- @csrf --}}
                    <input type="search" class="rounded-md" name="search" value="{{ request('search') }}"
                        placeholder="Buscar">
                    <button type="submit" class="p-2 bg-red-600 hover:bg-red-700 rounded-md ">Buscar</button>
                </form>
            </div>
        </div>

        <!-- ModalCreate -->
        <section>
            @include('admin.employee.components.create-modal')
        </section>
        <!-- End ModalCreate -->
        @include('admin.employee.components.employee-table')

    </div>
</x-admin.admin-template>



<script>
    //create
    function openCreateModal() {
        document.getElementById("modalCreate").classList.remove("hidden");
    }
</script>
