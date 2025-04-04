@props(['type' => 'button'])

<button type={{ $type }} class="p-2 m-1 flex-1 min-w-20 min-h-10 rounded-md text-white bg-slate-500 hover:bg-slate-600">
    {{ $slot }}
</button>
