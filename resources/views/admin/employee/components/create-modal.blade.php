<div id="modalCreate" class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 hidden">
    <div class="bg-gray-700 p-6 rounded-lg shadow-lg w-96">
        <h2 class="text-xl font-bold mb-4 text-gray-200 text-center">Crea Empleado</h2>
        <x-close-modal-button anyFunction="closeCreateModal">
            Cerrar
        </x-close-modal-button>
        <form action="#" method="POST" class="m-5">
            @csrf
            <x-input-modal name="name" type="text" placeholder="Nombre" required />
            <x-input-modal name="email" type="email" placeholder="Correo" required />
            <x-input-modal name="dni" type="text" placeholder="DNI" required />
            <x-input-modal name="phone_number" type="text" placeholder="Numero de Celular" required />
            <x-input-modal name="password" type="password" placeholder="Clave" required />
            <x-input-modal name="password_confirmation" type="password" placeholder="Confirmar Clave" required />
            <div class="flex">
                <x-color-button type="submit" current_color="green">
                    Guardar
                </x-color-button>
            </div>
        </form>
    </div>
</div>
<script>
    function closeCreateModal() {
        document.getElementById("modalCreate").classList.add("hidden");
    }
</script>
