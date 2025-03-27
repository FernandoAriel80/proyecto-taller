@props(['current_color'=> 'blue','type' => 'button'])
@php
    $color = "bg-{$current_color}-500 hover:bg-{$current_color}-700";
@endphp

<button type={{ $type }} class="p-2 m-1 flex-1 max-h-10 min-w-20 min-h-10 rounded-md text-white {{ $color }}">
    {{ $slot }}
</button>
