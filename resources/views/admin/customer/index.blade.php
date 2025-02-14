<x-app-layout>
    <div class="px-4 bg-slate-700">
        <div class="flax items-center content-center mx-20">
            <div class="py-5">
                <h1 class="text-center text-3xl font-bold mb-4 text-gray-200">Clientes</h1>

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

            </div>
        </div>
    </div>

</x-app-layout>
