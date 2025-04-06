<x-my-modal nameID="modalCreate">
    <div class="">
        <x-close-modal-button anyFunction="closeModalCreate">
            Cerrar
        </x-close-modal-button>

        <div>
            <form action="{{ route('workshop.employee.note.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="current_id" value="{{ $id }}">
                <x-input-textarea label="Ingresa tu nota" name="text_note" />

                <x-input-image label="Ingresa Imagen" />

                <div class="text-end">
                    <x-color-button type="submit" >
                        Enviar
                    </x-color-button>
                </div>
            </form>
        </div>
    </div>
</x-my-modal>
