<x-app-layout>
    <div class="flex items-center justify-center p-10 bg-gray-900 bg-opacity-50 ">
        <div class="bg-gray-700 p-6 rounded-lg shadow-lg w-96">
            <h2 class="text-xl font-bold mb-4 text-gray-200 text-center">Actualiza Empleado</h2>
            <x-color-button current_color="red">
                <a href="{{ route('employee.index') }}">Volver</a>
            </x-color-button>
            <form action="{{ route('employee.update', $employee->id) }}" method="POST" class="m-5">
                @csrf
                @method('PUT')
                <x-input-modal name="name" type="text" value="{{ $employee->name }}" placeholder="Nombre"
                    required />
                <x-input-modal name="email" type="email" value="{{ $employee->email }}" placeholder="Correo"
                    required />
                <x-input-modal name="dni" type="text" value="{{ $employee->dni }}" placeholder="DNI" required />
                <x-input-modal name="phone_number" type="text" value="{{ $employee->phone_number }}"
                    placeholder="Numero de Celular" required />
                <x-input-modal name="password" type="password" placeholder="Clave" required />
                <x-input-modal name="password_confirmation" type="password" placeholder="Confirmar Clave" required />
                <div class="flex">
                    <x-color-button type="submit" current_color="green">
                        Guardar
                    </x-color-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
