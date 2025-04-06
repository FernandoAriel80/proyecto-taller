<section>
    <x-details-modal id="modalUser{{ $reservation->user->id }}">
        <div class="flex justify-between items-center mb-6">
            <h4 class="text-2xl font-semibold text-gray-800">Detalles del Usuario</h4>
            <x-close-modal-button anyFunction="closeUserModal" current_id="{{ $reservation->user->id }}">
                Cerrar
            </x-close-modal-button>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-gray-100 rounded-lg">
                <thead class="bg-slate-500 text-white">
                    <tr>
                        <th class="px-4 py-2 text-left">ID</th>
                        <th class="px-4 py-2 text-left">Nombre</th>
                        <th class="px-4 py-2 text-left">Correo</th>
                        <th class="px-4 py-2 text-left">Teléfono</th>
                        <th class="px-4 py-2 text-left">DNI</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="hover:bg-gray-50 transition-colors border-b border-gray-200">
                        <td class="px-4 py-2">{{ $reservation->user->id }}</td>
                        <td class="px-4 py-2">{{ $reservation->user->name }}</td>
                        <td class="px-4 py-2">{{ $reservation->user->email }}</td>
                        <td class="px-4 py-2">{{ $reservation->user->phone_number }}
                        </td>
                        <td class="px-4 py-2">{{ $reservation->user->dni }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </x-details-modal>
</section>
<script>
    function openUserModal(id) {
        document.getElementById("modalUser"+id).classList.remove("hidden");
    }

    function closeUserModal(id) {
        document.getElementById("modalUser"+id).classList.add("hidden");
    }
</script>
