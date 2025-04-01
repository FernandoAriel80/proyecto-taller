@props(['type' => 'button'])

<button type={{ $type }} class="p-2 m-1 flex-1 max-h-10 min-w-20 min-h-10 rounded-md bg-gray-200 text-gray-800 hover:bg-gray-300 ">
    {{ $slot }}
</button>
