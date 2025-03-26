<x-admin.admin-template title="Tareas Asignadas">
    <div class="md:flex grid m-5 grid-cols-2 md:grid-cols-4">
         @foreach ($assigned_vehicles as $assigned_vehicle)
            <div class="grid grid-cols-6 grid-rows-4 col-span-2 md:grid-rows-1 md:col-span-4 border rounded-md bg-white  text-gray-700 focus:bg-gray-700 hover:bg-gray-700 hover:text-white transition-transform transform md:hover:scale-105 duration-300">
                <div class="col-span-6 md:col-span-5 row-span-3">
                    <a href="{{ route('workshop.general.data.show',$assigned_vehicle->id) }}">
                        <x-admin.workshop.data-card-workshop 
                            :name="$assigned_vehicle->vehicleInWorkshop->name" 
                            :email="$assigned_vehicle->vehicleInWorkshop->email"
                            :vehicle_type="$assigned_vehicle->vehicleInWorkshop->vehicle_type" 
                            :brand="$assigned_vehicle->vehicleInWorkshop->brand"
                            :check_in_date="$assigned_vehicle->vehicleInWorkshop->check_in_date" 
                            :check_out_date="$assigned_vehicle->vehicleInWorkshop->check_out_date ?? ''" 
                        />
                    </a>
                </div>
                <div class="grid gap-2 grid-rows-1 row-span-1 col-span-6 grid-cols-2 md:col-span-1">
                    <x-blue-button text="Actualizar"/>
                    <x-red-button text="Eliminar"/>
                </div>
            </div>
        @endforeach
    </div>

    <!-- -->
    
</x-admin.admin-template>
