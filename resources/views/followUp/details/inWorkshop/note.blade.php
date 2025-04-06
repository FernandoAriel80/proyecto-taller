<x-admin.workshop.assignedVehicle.workshop-template sidebar="followUp.components.sidebar" menu_workshop="followUp.details.inWorkshop.components.menu-workshop" sub_title="Reporte del Empleado" :current_id="$id">
    <div class="grid gap-2">
        @if ($notes->count())
            @foreach ($notes as $note)
                <div class="grid p-2 gap-1 rounded-md bg-white ">
                    <x-admin.workshop.assignedVehicle.card-note-image parag="{{ $note->description }}"
                        src="{{ $note->image_url }}" alt="Imagen" :id="$note->id"/>
                </div>
            @endforeach
        @else
            <div class="grid p-2 gap-2 rounded-md bg-white ">
                <p>No hay notas..</p>
            </div>
        @endif
    </div>

</x-admin.workshop.assignedVehicle.workshop-template>