<x-admin.workshop.workshop-template>
    <div class="grid grid-cols-2 rounded-md gap-2 p-2 row-span-1 bg-white ">
        {{-- Detalles del cliente --}}
        <section>
            <h4 class="font-bold mb-4">Detalles del cliente:</h4>
            <article class="grid grid-cols-1 md:grid-cols-2 gap-3">
                <label class=" font-bold" for="">Nombre:</label>
                <p>{{ $assigned_employee->vehicleInWorkshop->name }}</p>
                <label class=" font-bold" for="">Correo:</label>
                <p>{{ $assigned_employee->vehicleInWorkshop->email }}</p>
                <label class=" font-bold" for="">Telefono:</label>
                <p>{{ $assigned_employee->vehicleInWorkshop->phone_number }}</p>
            </article>
        </section>
        {{-- Detalles del vehiculo --}}
        <section>
            <h4 class="font-bold mb-4">Detalles del vehiculo:</h4>
            <article class="grid grid-cols-1 md:grid-cols-2 gap-3">
                <label class=" font-bold" for="">Vehiclulo:</label>
                <p>{{ $assigned_employee->vehicleInWorkshop->vehicle_type }}</p>
                <label class=" font-bold" for="">Marca:</label>
                <p>{{ $assigned_employee->vehicleInWorkshop->brand }}</p>
                <label class=" font-bold" for="">Patente:</label>
                <p>{{ $assigned_employee->vehicleInWorkshop->license_plate }}</p>
                <label class=" font-bold" for="">Del año:</label>
                <p>{{ $assigned_employee->vehicleInWorkshop->year }}</p>

            </article>
        </section>
    </div>
    <div class=" rounded-md p-2 bg-white  row-start-2">
        <h4 class="font-bold mb-4">Descripción del problema:</h4>
        <article>
            <p>{{ $assigned_employee->vehicleInWorkshop->description }}</p>
        </article>
    </div>
    <div class=" rounded-md p-2 bg-white  row-span-2">
        <h4 class="font-bold mb-4">Detalles del presupuesto actual:</h4>
        <article>

        </article>
    </div>
</x-admin.workshop.workshop-template>
