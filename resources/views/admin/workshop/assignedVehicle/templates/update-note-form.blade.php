<x-app-layout>
    <div class="flex items-center justify-center bg-gray-900 bg-opacity-50 ">
        <div class="bg-gray-600 p-6 rounded-lg shadow-lg md:w-7/12">
            <x-color-button>
                <a href="{{ url()->previous() }}"> Volver</a>
            </x-color-button>
            <div class="text-black">
                <form action="{{ route('workshop.employee.note.update', [$employeeNote->id]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <x-input-textarea label="Ingresa tu nota"
                        name="text_note">{{ $employeeNote->description }}</x-input-textarea>

                    <x-input-image label="Ingresa Imagen" image="{{ $employeeNote->image_url }}" />

                    <div class="text-end">
                        <x-color-button type="submit">
                            Enviar
                        </x-color-button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>
