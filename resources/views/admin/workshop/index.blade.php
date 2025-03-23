<x-app-layout>
    <div class="grid grid-cols-8 h-screen">
        <!-- Sidebar -->
        <div class="col-span-1">
            <x-menu-admin></x-menu-admin>
        </div>
        <!-- Main Content -->
        <div class="col-span-7 bg-slate-700 p-6">
            <div class="flex flex-col mx-auto max-w-6xl">
                <h1 class="text-center text-3xl font-bold mb-4 text-gray-200">EN EL TALLER</h1>
                <section>
                    <div class="grid md:grid-cols-2 grid-rows-2 gap-2  p-2 min-h-[300px] bg-back text-gray-900">
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
                        
                    </div>
              {{--   </section>
                <section>
                    <div class="grid grid-rows-1 gap-2 p-2 min-h-[300px] bg-back text-white">
                        <section>
                            <div class="rounded-sm p-2 bg-slate-500">
                                <h4 class="font-bold mb-4">Descripción del problema:</h4>
                                <article>

                                </article>
                            </div>
                        </section>
                    </div>
                </section>
                <section>
                    <div class="grid grid-rows-1 gap-2  p-2 min-h-[300px] bg-back text-white">
                        <section>
                            <div class="rounded-sm p-2 bg-slate-500">
                                <h4 class="font-bold mb-4">Descripción del problema:</h4>
                                <article>

                                </article>
                            </div>
                        </section>
                    </div>
                </section> --}}
            </div>
        </div>
</x-app-layout>
