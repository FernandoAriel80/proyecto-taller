<x-app-layout>
    <div  class="flex items-center justify-center p-10 bg-gray-900 bg-opacity-50 ">
        <div class="bg-gray-700 p-6 rounded-lg shadow-lg w-96">
            <h2 class="text-xl font-bold mb-4 text-gray-200 text-center">Actualiza Empleado</h2>
            <button class="bg-red-500 text-white px-4 py-2 rounded-md">
                <a href="{{ route('employee.index') }}">Volver</a>
            </button>
            <form action="{{ route('employee.update', $user->id) }}" method="POST" class="m-5">
                @csrf
                @method("PUT")
                <x-input-modal name="name" type="text" value="{{ $user->name }}" placeholder="Nombre" required />
                <x-input-modal name="email" type="email" value="{{ $user->email }}" placeholder="Correo" required />
                <x-input-modal name="dni" type="text" value="{{ $user->dni }}" placeholder="DNI" required />
                <x-input-modal name="phone_number" type="text" value="{{ $user->phone_number }}" placeholder="Numero de Celular" required />
                <x-input-modal name="password" type="password" placeholder="Clave" required />
                <x-input-modal name="password_confirmation" type="password" placeholder="Confirmar Clave" required />
                <button type="submit" class="w-full bg-blue-600 p-2 rounded-md text-white"> Guardar
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
