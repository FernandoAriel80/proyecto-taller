<x-admin.workshop.assignedVehicle.workshop-template sub_title="Notas del Empleado" :current_id="$id">
    <div>
        <x-open-modal-button anyFunction="openModalCreate"> Crea nota</x-open-modal-button>
    </div>
    <div>
        @include('admin.workshop.assignedVehicle.components.modal-create-form')
    </div>
    <div class="grid gap-2">
        @if ($notes->count())
            @foreach ($notes as $note)
                <div class="grid p-2 gap-1 rounded-md bg-slate-200 ">
                    <x-admin.workshop.assignedVehicle.card-note-image parag="{{ $note->description }}"
                        src="{{ $note->image_url }}" alt="Imagen" :id="$note->id"/>
                    <div class="w-full text-end bg-slate-800">
                        <x-open-modal-button anyFunction="openModalUpdate" current_id="{{ $note->id }}"> Actualizar</x-open-modal-button>
                    </div>
                </div>
            @endforeach
        @else
            <div class="grid p-2 gap-2 rounded-md bg-slate-200 ">
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
    function openModalUpdate(id) {
       // document.getElementById("modalUpdate").classList.remove("hidden");
       alert(id)
    }

    function closeModalUpdate() {
        document.getElementById("modalUpdate").classList.add("hidden");
    }
</script>
