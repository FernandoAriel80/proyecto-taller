<x-app-layout>
    <div class="p-4  bg-slate-700">
        <div class="flax items-center content-center mx-20 py-5">
            <h1 class="text-xl font-bold mb-4 text-gray-200 text-center">Registrar en Taller</h1>

            <section>
                <div class="px-20">
                    <form action="{{ route('register.vehicle.store') }}" method="POST">
                        @csrf
                        <div class=" grid md:grid-cols-3 gap-4 grid-cols-1 ">
                            <div class="">
                                <h3 class="text-center text-white">Datos de Cliente</h3>
                                <x-input-modal name="name" type="text" value="{{ $reservation->user->name }}"
                                    placeholder="Nombre" required />
                                <x-input-modal name="email" type="email" value="{{ $reservation->user->email }}"
                                    placeholder="Correo" required />
                                <x-input-modal name="phone_number" type="text"
                                    value="{{ $reservation->user->phone_number }}" placeholder="Numero de Telefono"
                                    required />
                            </div>
                            <div>
                                <h3 class="text-center text-white">Datos de Cliente</h3>
                                <x-input-modal name="vehicle" type="text"
                                    value="{{ $reservation->vehicle->vehicle_type->name }}"
                                    placeholder="Tipo de Vehiculo" required />
                                <x-input-modal name="brand" type="text"
                                    value="{{ $reservation->vehicle->brand->name }}" placeholder="Marca" required />
                                <x-input-modal name="license_plate" type="text"
                                    value="{{ $reservation->vehicle->license_plate }}" placeholder="Patente" required />
                                <x-input-modal name="year" type="text" value="{{ $reservation->vehicle->year }}"
                                    placeholder="Año de Fabricacion" required />
                            </div>
                            <div>
                                <x-input-textarea name="description" label="Detalles de la Falla">
                                    {{ $reservation->description }}
                                </x-input-textarea>
                            </div>
                        </div>
                        <div class="flex">
                            <x-color-button type="submit" current_color="green">
                                Guardar
                            </x-color-button>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>
</x-app-layout>
