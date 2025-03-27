@props(['anyFunction', 'current_id' => null, 'current_color' => 'orange'])

@php
    $color = "bg-".$current_color."-500 hover:bg-".$current_color."-700";
@endphp

<button 
    onclick="{{ $anyFunction }}('{{ $current_id }}')" 
    class="p-2 m-1 flex-1 max-h-10 min-w-28 min-h-10 rounded-md text-white {{ $color }}"
>
    {{ $slot }}
</button>
