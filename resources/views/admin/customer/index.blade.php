<x-admin.admin-template title="Clientes">
    <div>
        <div class="flex justify-end">
            <x-search-button text="Buscar" route="customer.index" placeholder="Buscar..." />
        </div>

        @include('admin.customer.components.customer-table')

    </div>
</x-admin.admin-template>
