<div id="datosReserva" class="tab-content hidden">
    <h2 class="text-xl text-white mb-4">Datos de Reserva </h2>
    <form action="{{ route('reserve.save') }}" method="POST">
        @csrf

        <div class="flex text-white">
            <div class="p-3 ">
                <div class="p-2">
                    <label for="date">Fecha de la cita a reservar</label>
                    <input type="date" id="date" name="date"
                        class="w-full px-4 py-2 rounded bg-gray-700 text-white" min="{{ $today }}"
                        max="{{ $futureDate }}" required />
                    <span class="validity"></span>
                    <small>Solo de luens a viernes</small>
                    @error('date')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="p-2">
                    <label for="time"> Hora de la reserva</label>
                    <input type="time" id="time" name="time"
                        class="w-full px-4 py-2 rounded bg-gray-700 text-white" min="09:00" max="18:00">
                    <span class="validity"></span>

                    <small>Hora de atencion de 9am a 6pm</small>
                </div>

            </div>
            <div class="p-3">
                <label for="description">Descripción breve de la razón de la cita </label>
                <input type="text" name="description" id="description"
                    class="w-full px-4 py-2 rounded bg-gray-700 text-white">

            </div>
        </div>

        <!-- Botón de acción -->
        <div class="flex justify-end mt-6">
            <button type="submit" id="btnSubmit"
                class="bg-red-600 hover:bg-red-700 text-white px-6 py-2 rounded">Guardar</button>
        </div>
    </form>
</div>
