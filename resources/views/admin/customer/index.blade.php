<x-app-layout>
    <h1>clientes</h1>
    <!-- Botón para abrir el modal -->
    <button onclick="openModal()" class="p-1 bg-red-600 hover:bg-red-700 text-white rounded-md text-xl transition">
        Crear Cliente
    </button>

    <!-- Modal -->
    <div id="modal" class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 hidden">
        <div class="bg-white p-6 rounded-lg shadow-lg w-96">
            <h2 class="text-xl font-bold mb-4">Título del Modal</h2>
            <p class="mb-4">Este es un modal con JavaScript y TailwindCSS.</p>
            <button onclick="closeModal()" class="bg-red-500 text-white px-4 py-2 rounded-md">
                Cerrar
            </button>
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
