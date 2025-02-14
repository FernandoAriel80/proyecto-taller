<x-app-layout>
    <div class="px-4 bg-slate-700">
        <div class="flax items-center content-center mx-20">
            <div class="py-5">
                @if (session('success'))
                    <p class="text-green-400 mb-4">{{ session('success') }}</p>
                @endif

                <h1 class="text-center text-3xl font-bold mb-4 text-gray-200">Empleados</h1>
                <!-- Botón para abrir el modal -->
                <button onclick="openCreateModal()"
                    class="p-1 bg-red-600 hover:bg-red-700 text-white rounded-md text-xl transition">
                    Crear Empleado
                </button>

                <!-- ModalCreate -->
                <div id="modalCreate"
                    class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 hidden">
                    <div class="bg-gray-700 p-6 rounded-lg shadow-lg w-96">
                        <h2 class="text-xl font-bold mb-4 text-gray-200 text-center">Crea Empleado</h2>
                        <button onclick="closeCreateModal()" class="bg-red-500 text-white px-4 py-2 rounded-md">
                            Cerrar
                        </button>
                        <form action="#" method="POST" class="m-5">
                            @csrf
                            <x-input-modal name="name" type="text" placeholder="Nombre" required />
                            <x-input-modal name="email" type="email" placeholder="Correo" required />
                            <x-input-modal name="dni" type="text" placeholder="DNI" required />
                            <x-input-modal name="phone_number" type="text" placeholder="Numero de Celular"
                                required />
                            <x-input-modal name="password" type="password" placeholder="Clave" required />
                            <x-input-modal name="password_confirmation" type="password" placeholder="Confirmar Clave"
                                required />
                            <button type="submit" class="w-full bg-blue-600 p-2 rounded-md text-white"> Guardar
                            </button>
                        </form>
                    </div>
                </div>
                <!-- End ModalCreate -->

                <section class="p-4">
                    <div class="overflow-x-auto shadow-md rounded-lg">
                        <table class="min-w-full bg-white border border-gray-200">
                            <thead class="bg-slate-500 text-white">
                                <tr>
                                    <th class="py-3 px-4 text-left">ID</th>
                                    <th class="py-3 px-4 text-left">Nombre</th>
                                    <th class="py-3 px-4 text-left">Correo</th>
                                    <th class="py-3 px-4 text-left">DNI</th>
                                    <th class="py-3 px-4 text-left">Número de Teléfono</th>
                                    <th class="py-3 px-4 text-left">Fecha de Creación</th>
                                    <th class="py-3 px-4 text-left">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($employees as $employee)
                                    <tr class="hover:bg-gray-50 transition-colors border-b border-gray-200">
                                        <td class="py-3 px-4">{{ $employee->id }}</td>
                                        <td class="py-3 px-4">{{ $employee->name }}</td>
                                        <td class="py-3 px-4">{{ $employee->email }}</td>
                                        <td class="py-3 px-4">{{ $employee->dni }}</td>
                                        <td class="py-3 px-4">{{ $employee->phone_number }}</td>
                                        <td class="py-3 px-4">
                                            @if ($employee->created_at)
                                                {{ $employee->created_at->timezone('America/Argentina/Buenos_Aires')->format('d/m/Y H:i:s') }}
                                            @else
                                                Fecha no disponible
                                            @endif
                                        </td>
                                        <td>
                                            <button class="p-1 bg-blue-600 hover:bg-blue-700 text-white rounded-md">
                                                <a href="{{ route('employee.edit', [$employee->id]) }}">Actualizar</a>
                                            </button>

                                            <!-- Botón de Eliminar -->
                                            <form action="{{ route('employee.destroy', $employee->id) }}" method="POST"
                                                class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="p-1 bg-red-600 hover:bg-red-700 text-white rounded-md"
                                                    onclick="return confirm('¿Estás seguro de eliminar este usuario?')">
                                                    Eliminar
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </section>

            </div>
        </div>
    </div>

</x-app-layout>

<script>
    //create
    function openCreateModal() {
        document.getElementById("modalCreate").classList.remove("hidden");
    }

    function closeCreateModal() {
        document.getElementById("modalCreate").classList.add("hidden");
    }
</script>
