<x-admin.admin-template title="Detalles" sidebar="followUp.components.sidebar">
    <div class=" grid grid-cols-1 gap-2 mx-4">
        @foreach ($details_vehicles as $detail_vehicle)
            <div
                class="md:flex p-2 w-full border rounded-md bg-white  text-gray-700 active:bg-gray-700 hover:bg-gray-700 hover:text-white">
                <div class="md:w-full">
                    <a href="{{ route('followUp.details.general.data.show', $detail_vehicle->id) }}">
                        <x-admin.workshop.data-card-workshop :name="$detail_vehicle->vehicleInWorkshop->name" :email="$detail_vehicle->vehicleInWorkshop->email" :vehicle_type="$detail_vehicle->vehicleInWorkshop->vehicle_type"
                            :brand="$detail_vehicle->vehicleInWorkshop->brand" :check_in_date="$detail_vehicle->vehicleInWorkshop->check_in_date" :check_out_date="$detail_vehicle->vehicleInWorkshop->check_out_date ?? ''" />
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</x-admin.admin-template>
