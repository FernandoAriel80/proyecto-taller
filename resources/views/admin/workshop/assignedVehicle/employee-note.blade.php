<x-admin.workshop.assignedVehicle.workshop-template sub_title="Notas del Empleado" :current_id="$id">
    <div>
        <x-open-modal-button anyFunction="openModal"> Crea nota</x-open-modal-button>
    </div>
    <div>
        @include('admin.workshop.assignedVehicle.components.modal-form')
    </div>
    <div class="grid gap-2">
        @if ($notes->count())
            @foreach ($notes as $note)
                <div class="grid p-2 gap-1 rounded-md bg-slate-200 ">
                    <x-admin.workshop.assignedVehicle.card-note-image parag="{{ $note->description }}"
                        src="{{ $note->image_url }}" alt="Imagen" :id="$note->id"/>
                    <div class="w-full text-end bg-slate-600">
                        <x-color-button> Actualizar</x-color-button>
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
    function openModal() {
        document.getElementById("modalThings").classList.remove("hidden");
    }

    function closeModal() {
        document.getElementById("modalThings").classList.add("hidden");
    }
</script>
