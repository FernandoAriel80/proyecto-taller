<x-admin.admin-template title="Tareas Asignadas">
    <div class=" grid grid-cols-1 gap-2 mx-4">
        @foreach ($assigned_vehicles as $assigned_vehicle)
            <div class="md:flex p-2 w-full border rounded-md bg-white  text-gray-700 active:bg-gray-700 hover:bg-gray-700 hover:text-white">
                <div class="md:w-full">
                    <a href="{{ route('workshop.general.data.show', $assigned_vehicle->id) }}">
                        <x-admin.workshop.data-card-workshop :name="$assigned_vehicle->vehicleInWorkshop->name" :email="$assigned_vehicle->vehicleInWorkshop->email" :vehicle_type="$assigned_vehicle->vehicleInWorkshop->vehicle_type"
                            :brand="$assigned_vehicle->vehicleInWorkshop->brand" :check_in_date="$assigned_vehicle->vehicleInWorkshop->check_in_date" :check_out_date="$assigned_vehicle->vehicleInWorkshop->check_out_date ?? ''" />
                    </a>
                </div>
                <div class="flex">
                    <x-color-button current_color="blue" >Actualizar</x-color-button>
                    <x-color-button current_color="red" >Eliminar</x-color-button>
                </div>
            </div>
        @endforeach
    </div>

    <!-- -->

</x-admin.admin-template>
