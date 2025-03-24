<section>
    <div id="deleteModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
        <div class="bg-white p-6 rounded-lg shadow-lg w-1/3">
            <h2 class="text-xl font-semibold">¿Estás seguro?</h2>
            <p>Vas a dar de alta este vehiculo, esta acción no se puede deshacer.</p>

            <div class="mt-4 flex justify-end space-x-2">
                <button onclick="closeConfirmModal()" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-700">
                    Cancelar
                </button>
                <form id="deleteForm" method="POST">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-700">
                        Confirmar
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
<script>
  

    function closeConfirmModal() {
        document.getElementById('deleteModal').classList.add('hidden');
    }
</script>
