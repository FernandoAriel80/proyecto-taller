@props(['sub_title','current_id','menu_workshop','sidebar'])

<x-admin.admin-template title="EN EL TALLER" sidebar="{{ $sidebar }}">
    <div>
        <!-- menu menu del workshop -->
        @include($menu_workshop,['current_id'  => $current_id])
        <h4 class="text-xl font-bold mb-4 text-gray-200">{{ $sub_title }}</h4>
        <section>
            <div class="grid gap-2 p-2 min-h-[300px] bg-back text-gray-900">
                {{ $slot }}
            </div>
        </section>
    </div>
</x-admin.admin-template>
