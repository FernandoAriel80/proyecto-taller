<x-admin.workshop.assignedVehicle.workshop-template sub_title="Datos Generales" :current_id="$assigned_employee->id">
    <div class="grid grid-cols-1 md:grid-cols-2 grid-rows-2 gap-2">
        <div class="grid md:grid-cols-2 rounded-md gap-2 p-1 row-span-1 bg-white ">
            <section class="w-full max-w-full overflow-hidden">
                <h4 class="flex font-bold mb-4 bg-slate-500 text-white p-1 rounded-tl rounded-tr">
                    Detalles del cliente:
                </h4>
                <article class="grid grid-cols-3 gap-2">
                    <label class="font-bold truncate" for="">Nombre:</label>
                    <p class="break-words overflow-auto col-span-2">{{ $assigned_employee->vehicleInWorkshop->name }}</p>

                    <label class="font-bold truncate " for="">Correo:</label>
                    <p class="break-words overflow-auto col-span-2"><a
                            href="mailto:{{ $assigned_employee->vehicleInWorkshop->email }}"><img
                                src="https://img.icons8.com/?size=100&id=13826&format=png&color=000000" alt="WhatsApp"
                                style="width: 20px; vertical-align: middle;"></a>
                        {{ $assigned_employee->vehicleInWorkshop->email }}
                    </p>

                    <label class="font-bold truncate" for="">Teléfono:</label>

                    <p class="break-words overflow-auto flex col-span-2"><a
                            href="https://wa.me/54{{ $assigned_employee->vehicleInWorkshop->phone_number }}"
                            target="_blank"><img src="https://img.icons8.com/?size=100&id=16713&format=png&color=000000"
                                alt="WhatsApp"
                                style="width: 20px; vertical-align: middle;"></a>{{ $assigned_employee->vehicleInWorkshop->phone_number }}
                    </p>


                </article>
            </section>

            <section class="w-full max-w-full overflow-hidden">
                <h4 class="flex font-bold mb-4 bg-slate-500 text-white p-1 rounded-tl rounded-tr">Detalles del vehiculo:
                </h4>
                <article class="grid grid-cols-3 gap-3">
                    <label class=" font-bold truncate" for="">Vehiclulo:</label>
                    <p class="break-words overflow-auto col-span-2">{{ $assigned_employee->vehicleInWorkshop->vehicle_type }}</p>
                    <label class=" font-bold truncate" for="">Marca:</label>
                    <p class="break-words overflow-auto col-span-2">{{ $assigned_employee->vehicleInWorkshop->brand }}</p>
                    <label class=" font-bold truncate" for="">Patente:</label>
                    <p class="break-words overflow-auto col-span-2">{{ $assigned_employee->vehicleInWorkshop->license_plate }}</p>
                    <label class=" font-bold truncate" for="">Del año:</label>
                    <p class="break-words overflow-auto col-span-2">{{ $assigned_employee->vehicleInWorkshop->year }}</p>
                </article>
            </section>
        </div>
        <div class=" rounded-md p-1 bg-white  row-start-2">
            <h4 class="flex font-bold mb-4 bg-slate-500 text-white p-1 rounded-tl rounded-tr">Descripción del problema:
            </h4>
            <article>
                <p>{{ $assigned_employee->vehicleInWorkshop->description }}</p>
            </article>
        </div>
        <div class=" rounded-md p-1 bg-white  row-span-2">
            <h4 class="flex font-bold mb-4 bg-slate-500 text-white p-1 rounded-tl rounded-tr">Detalles del presupuesto
                actual:</h4>
            <article>

            </article>
        </div>
    </div>
</x-admin.workshop.assignedVehicle.workshop-template>
