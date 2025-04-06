<x-admin.workshop.assignedVehicle.workshop-template sidebar="admin.components.sidebar" menu_workshop="admin.workshop.assignedVehicle.components.menu-workshop" sub_title="Notas del Empleado" :current_id="$id">
    <div>
        <x-open-modal-button anyFunction="openModalCreate"> Crea nota</x-open-modal-button>
    </div>
    <div>
        @include('admin.workshop.assignedVehicle.components.modal-create-note-form')
    </div>
    <div class="grid gap-2">
        @if ($notes->count())
            @foreach ($notes as $note)
                <div class="grid p-2 gap-1 rounded-md bg-white ">
                    <x-admin.workshop.assignedVehicle.card-note-image parag="{{ $note->description }}"
                        src="{{ $note->image_url }}" alt="Imagen" :id="$note->id"/>
                    <div class="w-full text-end bg-white">
                        <x-color-button><a href="{{ route('workshop.employee.note.edit',[$note->id]) }}">Actualizar</a></x-color-button>
                    </div>
                </div>
            @endforeach
        @else
            <div class="grid p-2 gap-2 rounded-md bg-white ">
                <p>No hay notas..</p>
            </div>
        @endif
    </div>
</x-admin.workshop.assignedVehicle.workshop-template>
<script>
    function openModalCreate() {
        document.getElementById("modalCreate").classList.remove("hidden");
    }

    function closeModalCreate() {
        document.getElementById("modalCreate").classList.add("hidden");
    }

</script>
