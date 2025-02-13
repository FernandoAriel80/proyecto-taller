<x-app-layout>
    <div class="px-4 bg-slate-700">
        <div class="flax items-center content-center mx-20">
            <div class="py-5">
                @if (session('success'))
                    <p class="text-green-400 mb-4">{{ session('success') }}</p>
                @endif

                <h1 class="text-center text-3xl font-bold mb-4 text-gray-200">Empleados</h1>
                <!-- Botón para abrir el modal -->
                <button onclick="openModal()"
                    class="p-1 bg-red-600 hover:bg-red-700 text-white rounded-md text-xl transition">
                    Crear Empleado
                </button>

                <!-- Modal -->
                <div id="modal"
                    class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 hidden">
                    <div class="bg-gray-700 p-6 rounded-lg shadow-lg w-96">
                        <h2 class="text-xl font-bold mb-4 text-gray-200 text-center">Crea Empleado</h2>
                        <button onclick="closeModal()" class="bg-red-500 text-white px-4 py-2 rounded-md">
                            Cerrar
                        </button>

                        <form action="#" method="POST" class="m-5">
                            @csrf
                            <x-input-modal name="name" type="text" value="Nombre" required />
                            <x-input-modal name="email" type="email" value="Correo" required />
                            <x-input-modal name="dni" type="text" value="DNI" required />
                            <x-input-modal name="password" type="password" value="Clave" required />
                            <x-input-modal name="password_confirmation" type="password" value="Confirmar Clave" required />
                            <button type="submit" class="w-full bg-blue-600 p-2 rounded-md text-white"> Guardar
                            </button>
                        </form>
                    </div>
                </div>

                <!-- End Modal -->


            </div>
        </div>
    </div>

</x-app-layout>

<script>
    function openModal() {
        document.getElementById("modal").classList.remove("hidden");
    }

    function closeModal() {
        document.getElementById("modal").classList.add("hidden");
    }
</script>
