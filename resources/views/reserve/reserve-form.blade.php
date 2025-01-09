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
            {{-- <div>
                <div class="mb-4">
                    <label for="date" class="block text-lg font-medium">Selecciona la fecha:</label>
                    <select name="date" id="date" class="w-full px-4 py-2 border rounded bg-gray-500" required>
                        <option value="">Seleccione una fecha</option>

                        @foreach ($fechasDisponibles as $disponible)
                            <option value="{{ $disponible['date'] }}">
                                {{ $disponible['date'] }}
                            </option>
                        @endforeach

                    </select>
                    <small>Solo de luens a viernes</small>
                    @error('date')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="time" class="block text-lg font-medium">Selecciona la hora:</label>
                    <select name="time" id="time" class="w-full px-4 py-2 border rounded bg-gray-500" required>
                        <option value="">Seleccione una hora</option>

                        @foreach ($fechasDisponibles as $disponible)
                            <option value="{{ $disponible['time'] }}">
                                {{ $disponible['time'] }}
                            </option>
                        @endforeach
                    </select>
                    <small>Hora de atencion de 9am a 6pm</small>
                    @error('time')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>
            </div> --}}
            <div>
                <!-- Selección de la fecha -->
                <div class="mb-4">
                    <label for="date" class="block text-lg font-medium">Selecciona la fecha:</label>
                    <select name="date" id="date" class="w-full px-4 py-2 border rounded bg-gray-500" required>
                        <option value="">Seleccione una fecha</option>
                        @foreach ($fechasHorasDisponibles['fechasDisponibles'] as $fecha)
                            <option value="{{ $fecha }}">
                                {{ \Carbon\Carbon::parse($fecha)->format('d/m/Y') }}
                            </option>
                        @endforeach
                    </select>
                    <small>Solo de lunes a viernes</small>
                    @error('date')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Selección de la hora -->
                <div class="mb-4">
                    <label for="time" class="block text-lg font-medium">Selecciona la hora:</label>
                    <select name="time" id="time" class="w-full px-4 py-2 border rounded bg-gray-500" required>
                        <option value="">Seleccione una hora</option>

                        @foreach ($fechasHorasDisponibles['horasDisponibles'] as $hora)
                            <option value="{{ $hora }}">
                                {{ $hora }}
                            </option>
                        @endforeach
                    </select>
                    <small>Hora de atención de 9 AM a 5 PM</small>
                    @error('time')
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
