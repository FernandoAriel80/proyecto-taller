<div id="datosReserva" class=" mx-auto p-6 bg-gray-700 text-white rounded-lg shadow-md mb-20 hidden">
    <h2 class="text-2xl font-semibold text-center mb-6">Reservar Turno - Taller de Vehículos</h2>

    <form action="{{ route('reserve.save') }}" method="POST">
        @csrf
        <div>
            @foreach ($vehicles as $vehicleAll)
                @if ($vehicleAll->id == $vehicle->id)
                    <label for="vehicle_id" class="block text-lg font-medium"> Auto elegido:
                        Patente: {{ $vehicleAll->license_plate }} -- Marca:
                        {{ $vehicleAll->brand->name }}</label>
                    <input type="hidden" id="vehicle_id" name="vehicle_id" value="{{ $vehicleAll->id }}"
                        class="w-full px-4 py-2 rounded bg-gray-500 text-white">
                @endif
            @endforeach
        </div>
        <div class="flex">
            <div>
                <div class="mb-4">
                    <label for="datetime" class="block text-lg font-medium">Selecciona la fecha:</label>
                    <select name="datetime" id="datetime" class="w-full px-4 py-2 border rounded bg-gray-500" required>
                        <option value="">Seleccione una fecha</option>
                        @foreach ($availableDates as $available)
                            <option value="{{ $available['date'] }} {{ $available['time'] }}">
                                {{ $available['date'] }} - {{ date('H:i', strtotime($available['time'])) }}
                            </option>
                        @endforeach
                    </select>
                    <small>Solo de luens a viernes</small>
                    @error('datetime')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>

            </div>

            <div>
                <div class="p-3">
                    <label for="description">Descripción breve de la razón de la cita </label>
                    <textarea name="description" id="description" class="w-full h-40 px-4 py-2 rounded bg-gray-500 text-white"
                        placeholder="Escribe una descripción..."></textarea>
                </div>
                <div class="flex justify-end mt-6">
                    <button type="submit" id="btnSubmit"
                        class="bg-red-600 hover:bg-red-700 text-white px-6 py-2 rounded">Guardar</button>
                </div>
            </div>
        </div>

    </form>
</div>
