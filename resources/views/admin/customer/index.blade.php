<x-admin.admin-template title="Clientes">
    <div>
        <form action="{{ route('customer.index') }}" method="GET" class="mb-4 flex justify-end gap-x-4">
            <input type="search" class="rounded-md p-2 w-64" name="search" value="{{ request('search') }}"
                placeholder="Buscar...">
            <button type="submit" class="px-4 py-2 bg-red-600 hover:bg-red-700 rounded-md text-white">
                Buscar
            </button>
        </form>

       @include('admin.customer.components.customer-table')

    </div>
</x-admin.admin-template>
