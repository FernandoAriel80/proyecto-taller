<x-app-layout>
    <div class="p-4  bg-slate-700">
        <div class="flax items-center content-center mx-20 py-5">
            <h1 class="text-xl font-bold mb-4 text-gray-200 text-center">Actualizar Vehiculo en Taller</h1>

            <section>
                <div class="px-20">
                    <form action="{{ route('register.vehicle.update',$in_workshop->id) }}" method="POST">
                        @csrf
                        @method("PUT")
                        <div class=" grid md:grid-cols-3 gap-4 grid-cols-1 ">
                            <div class="">
                                <h3 class="text-center text-white">Datos de Cliente</h3>
                                <x-input-modal name="name" type="text" value="{{ $in_workshop->name }}"
                                    placeholder="Nombre" required />
                                <x-input-modal name="email" type="email" value="{{ $in_workshop->email }}"
                                    placeholder="Correo" required />
                                <x-input-modal name="phone_number" type="text"
                                    value="{{ $in_workshop->phone_number }}" placeholder="Numero de Telefono"
                                    required />
                            </div>
                            <div>
                                <h3 class="text-center text-white">Datos de Cliente</h3>
                                <x-input-modal name="vehicle" type="text"
                                    value="{{ $in_workshop->vehicle_type }}"
                                    placeholder="Tipo de Vehiculo" required />
                                <x-input-modal name="brand" type="text"
                                    value="{{ $in_workshop->brand }}" placeholder="Marca" required />
                                <x-input-modal name="license_plate" type="text"
                                    value="{{ $in_workshop->license_plate }}" placeholder="Patente" required />
                                <x-input-modal name="year" type="text" value="{{ $in_workshop->year }}"
                                    placeholder="Año de Fabricacion" required />
                            </div>
                            <div>
                                <h3 class="text-white text-center">Detalles de la Falla</h3>
                                <textarea name="description" class="text-left text-black bg-gray-300 h-3/4 w-full p-2">
                                    {{ $in_workshop->description }}
                                </textarea>
                            </div>
                        </div>
                        <button type="submit" class="w-full bg-red-600 hover:bg-red-700 p-2 rounded-md text-white"> Actualizar
                        </button>
                    </form>
                </div>
            </section>
        </div>
    </div>
</x-app-layout>
