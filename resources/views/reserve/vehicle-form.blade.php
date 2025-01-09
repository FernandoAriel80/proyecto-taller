


    <div id="datosVehiculo" class="tab-content  bg-gray-700 mx-auto p-6 rounded-lg shadow-md">
        <h2 class="text-xl text-white mb-4">Datos del Vehículo</h2>
        <div>
            @if ($vehicles->isEmpty())
                <form action="{{ route('reserve.store') }}" method="POST">
                    @csrf
    
                    <div class="grid grid-cols-2 gap-6">
                        <!-- Primera columna -->
                        <div>
                            <div class="mb-4">
                                <label for="license_plate" class="block text-gray-200 mb-2">Patente</label>
                                <input type="text" id="license_plate" name="license_plate"
                                    class="w-full px-4 py-2 rounded bg-gray-500 text-white">
                                @error('license_plate')
                                    <div class="text-red-500 p-2 rounded ">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="brand" class="block text-gray-200 mb-2">Marca</label>
                                <select id="brand" name="brand"
                                    class="w-full px-4 py-2 rounded bg-gray-500 text-white">
                                    <option value="">Seleccione una marca</option>
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                    @endforeach
                                </select>
                                @error('brand')
                                    <div class="text-red-500 p-2 rounded">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="model" class="block text-gray-200 mb-2">Modelo</label>
                                <input type="text" id="model" name="model"
                                    class="w-full px-4 py-2 rounded bg-gray-500 text-white">
                                @error('model')
                                    <div class="text-red-500 p-2 rounded">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
    
                        <!-- Segunda columna -->
                        <div>
                            <div class="mb-4">
                                <label for="year" class="block text-gray-200 mb-2">Año del Vehículo
                                    (xxxx)</label>
                                <input type="number" id="year" name="year"
                                    class="w-full px-4 py-2 rounded bg-gray-500 text-white">
                                @error('year')
                                    <div class="text-red-500 p-2 rounded">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="vehicle_type" class="block text-gray-200 mb-2">Tipo de
                                    Vehículo</label>
                                <select id="vehicle_type" name="vehicle_type"
                                    class="w-full px-4 py-2 rounded bg-gray-500 text-white">
                                    <option value="">Seleccione un tipo</option>
                                    @foreach ($vehicle_types as $vehicle_type)
                                        <option value="{{ $vehicle_type->id }}">{{ $vehicle_type->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('vehicle_type')
                                    <div class=" text-red-500 p-2 rounded">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
    
                    <!-- Botón de acción -->
                    <div class="flex justify-end mt-6">
                        <button type="submit"
                            class="bg-red-600 hover:bg-red-700 text-white px-6 py-2 rounded">Guardar</button>
                    </div>
                </form>
            @else
                <div>
                    <form action="{{ route('reserve.create') }}" method="GET">
                        <div class="mb-4">
                            <label for="vehicles" class="block text-gray-200 mb-2">Seleccione uno de tus
                                vehículo</label>
                            <select id="vehicles" name="vehicle_id"
                                class="w-full px-4 py-2 rounded bg-gray-500 text-white"
                                onchange="this.form.submit()">
                                @foreach ($vehicles as $vehicleAll)
                                    <option value="{{ $vehicleAll->id }}" @selected($vehicleAll->id == $vehicle->id)
                                        @if (request('vehicle_id') == $vehicleAll->id) selected @endif>
                                        Patente: {{ $vehicleAll->license_plate }} -- Marca:
                                        {{ $vehicleAll->brand->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </form>
                    <form action="{{ route('reserve.store') }}" method="POST">
                        @csrf
    
                        <div class="grid grid-cols-2 gap-6">
                            <!-- Primera columna -->
                            <div>
                                <div class="mb-4">
                                    <label for="license_plate"
                                        class="block text-gray-200 mb-2">Patente</label>
                                    <input type="text" id="license_plate" name="license_plate"
                                        value="{{ $vehicle->license_plate }}"
                                        class="w-full px-4 py-2 rounded bg-gray-500 text-white">
                                    @error('license_plate')
                                        <div class="text-red-500 p-2 rounded ">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="brand" class="block text-gray-200 mb-2">Marca</label>
                                    <select id="brand" name="brand"
                                        class="w-full px-4 py-2 rounded bg-gray-500 text-white">
                                        <option value="">Seleccione una marca</option>
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}"
                                                @selected($brand->id == $vehicle->brand_id)>
                                                {{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('brand')
                                        <div class="text-red-500 p-2 rounded ">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="model" class="block text-gray-200 mb-2">Modelo</label>
                                    <input type="text" id="model" name="model"
                                        value="{{ $vehicle->model }}"
                                        class="w-full px-4 py-2 rounded bg-gray-500 text-white">
                                    @error('model')
                                        <div class="text-red-500 p-2 rounded ">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
    
                            <!-- Segunda columna -->
                            <div>
                                <div class="mb-4">
                                    <label for="year" class="text-gray-200 mb-2">Año del
                                        Vehículo
                                        (xxxx)</label>
                                    <input type="number" id="year" name="year"
                                        value="{{ $vehicle->year }}"
                                        class="w-full px-4 py-2 rounded bg-gray-500 text-white">
                                    @error('year')
                                        <div class="text-red-500 p-2 rounded ">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="vehicle_type" class="block text-gray-200 mb-2">Tipo de
                                        Vehículo</label>
                                    <select id="vehicle_type" name="vehicle_type"
                                        class="w-full px-4 py-2 rounded bg-gray-500 text-white">
                                        <option value="">Seleccione un tipo</option>
                                        @foreach ($vehicle_types as $vehicle_type)
                                            <option value="{{ $vehicle_type->id }}"
                                                @selected($vehicle_type->id == $vehicle->vehicle_type_id)>
                                                {{ $vehicle_type->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('year')
                                        <div class="text-red-500 p-2 rounded ">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
    
                        <!-- Botón de acción -->
                        <div class="flex justify-end mt-6">
                            <button type="submit"
                                class="bg-red-600 hover:bg-red-700 text-white px-6 py-2 rounded">Guardar</button>
                        </div>
                    </form>
                    <p class="text-gray-300">Si ya cargo su vehiculo, pase a datos de reserva.</p>
                </div>
            @endif
        </div>
    </div>
