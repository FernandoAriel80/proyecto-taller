<x-app-layout>
    <div class="grid grid-cols-8 h-screen">
        <!-- Sidebar -->
        <div class="col-span-1">
            <x-menu-admin></x-menu-admin>
        </div>

        <!-- Main Content -->
        <div class="col-span-7 bg-slate-700 p-6">
            <div class="flex flex-col mx-auto max-w-6xl">
                <h1 class="text-center text-3xl font-bold mb-6 text-gray-200">Clientes</h1>

                <form action="{{ route('customer.index') }}" method="GET" class="mb-4 flex justify-end gap-x-4">
                    <input type="search" class="rounded-md p-2 w-64" name="search" value="{{ request('search') }}"
                        placeholder="Buscar...">
                    <button type="submit" class="px-4 py-2 bg-red-600 hover:bg-red-700 rounded-md text-white">
                        Buscar
                    </button>
                </form>

                @if ($customers->count())
                    <section class="p-4">
                        <div class="overflow-x-auto shadow-md rounded-lg">
                            <table class="min-w-full bg-white border-gray-200">
                                <thead class="bg-slate-500 text-white">
                                    <tr>
                                        <th class="py-3 px-4 text-left">ID</th>
                                        <th class="py-3 px-4 text-left">Nombre</th>
                                        <th class="py-3 px-4 text-left">Correo</th>
                                        <th class="py-3 px-4 text-left">DNI</th>
                                        <th class="py-3 px-4 text-left">Número de Teléfono</th>
                                        <th class="py-3 px-4 text-left">Fecha de Creación</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($customers as $customer)
                                        <tr class="hover:bg-gray-50 transition-colors border-b border-gray-200">
                                            <td class="py-3 px-4">{{ $customer->id }}</td>
                                            <td class="py-3 px-4">{{ $customer->name }}</td>
                                            <td class="py-3 px-4">{{ $customer->email }}</td>
                                            <td class="py-3 px-4">{{ $customer->dni }}</td>
                                            <td class="py-3 px-4">{{ $customer->phone_number }}</td>
                                            <td class="py-3 px-4">
                                                @if ($customer->created_at)
                                                    {{ $customer->created_at->timezone('America/Argentina/Buenos_Aires')->format('d/m/Y H:i:s') }}
                                                @else
                                                    Fecha no disponible
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </section>

                    <div class="mt-4">
                        {{ $customers->appends(['search' => request('search')])->links() }}
                    </div>
                @else
                    <p class="text-gray-500 mt-4">No se encontraron clientes.</p>
                @endif
            </div>
        </div>
    </div>

</x-app-layout>
