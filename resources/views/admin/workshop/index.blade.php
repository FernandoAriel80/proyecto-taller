<x-admin.admin-template title="Tareas Asignadas">
    <div class="grid grid-cols-2 md:grid-cols-4 gap-2">
         @foreach ($assigned_vehicles as $assigned_vehicle)
            <div class="md:col-start-2 col-span-2">
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
        @endforeach
    </div>
</x-admin.admin-template>
