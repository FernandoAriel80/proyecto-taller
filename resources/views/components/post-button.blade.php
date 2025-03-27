@props(['current_color'=> 'green','method','route','current_id'])
@php
    $color = "bg-{$current_color}-500 hover:bg-{$current_color}-700";
@endphp

<form method="POST" action="{{ route($route,$current_id) }}">
    @csrf
    @method($method)
    <button type="submit"
        class="p-2 m-1 flex-1 min-w-20 min-h-10 rounded-md text-white {{ $color }}">
       {{ $slot }}
    </button>
</form>