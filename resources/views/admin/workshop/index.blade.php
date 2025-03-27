<x-admin.admin-template title="Tareas Asignadas">
    <div class=" grid grid-cols-1 gap-2 mx-4">
        @foreach ($assigned_vehicles as $assigned_vehicle)
            <div
                class="md:flex p-2 w-full border rounded-md bg-white  text-gray-700 active:bg-gray-700 hover:bg-gray-700 hover:text-white">
                <div class="md:w-full">
                    <a href="{{ route('workshop.general.data.show', $assigned_vehicle->id) }}">
                        <x-admin.workshop.data-card-workshop :name="$assigned_vehicle->vehicleInWorkshop->name" :email="$assigned_vehicle->vehicleInWorkshop->email" :vehicle_type="$assigned_vehicle->vehicleInWorkshop->vehicle_type"
                            :brand="$assigned_vehicle->vehicleInWorkshop->brand" :check_in_date="$assigned_vehicle->vehicleInWorkshop->check_in_date" :check_out_date="$assigned_vehicle->vehicleInWorkshop->check_out_date ?? ''" />
                    </a>
                </div>
                <div class="flex w-auto">
                    @if ($assigned_vehicle->vehicleInWorkshop->check_out_date == null)
                        <x-open-modal-button anyFunction="openConfirmModal" current_id="{{ $assigned_vehicle->vehicleInWorkshop->id }}"
                            current_color="green">
                            Dar de alta
                        </x-open-modal-button>
                    @endif
                </div>
            </div>
        @endforeach
    </div>

    <!-- -->

    @include('admin.components.delete-modal',[
        'message' => 'Vas a dar de alta este vehiculo, esta acción no se puede deshacer.',
        'method' =>'PUT'
        ])


</x-admin.admin-template>

<script>
    function openConfirmModal(productId) {
        document.getElementById('deleteModal').classList.remove('hidden');
        document.getElementById('deleteForm').action = `/dar-de-alta-vehiculo-desde-taller/${productId}`;
    }
</script>
