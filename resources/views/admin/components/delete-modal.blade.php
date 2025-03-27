@props(['message','method'])
<section>
    <div id="deleteModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
        <div class="bg-white p-6 rounded-lg shadow-lg w-1/3">
            <h2 class="text-xl font-semibold">¿Estás seguro?</h2>
            <p>{{ $message }}</p>

            <div class="mt-4 flex justify-end space-x-2">
                <x-close-modal-button anyFunction="closeConfirmModal">
                    Cancelar
                </x-close-modal-button>
                <form id="deleteForm" method="POST">
                    @csrf
                    @method($method)
                    <x-color-button type="submit" current_color="green">
                        Confirmar
                    </x-color-button>
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
