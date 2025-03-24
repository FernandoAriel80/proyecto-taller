<x-admin.admin-template title="EN EL TALLER">
    <div>

        @include('admin.workshop.components.menu-workshop')

        <section>
            <div class="grid md:grid-cols-2 grid-rows-2 gap-2  p-2 min-h-[300px] bg-back text-gray-900">
                {{ $slot }}
            </div>
        </section>
    </div>
</x-admin.admin-template>
