
@props(['anyFunction','current_id'=>'','current_color'=> 'orange'])
@php
    $color = "bg-{$current_color}-500 hover:bg-{$current_color}-700";
@endphp
<button onclick="{{ $anyFunction }}({{ $current_id }})" class="p-2 m-1 flex-1  md:max-h-10 min-h-10 rounded-md text-white {{ $color }}" >{{ $slot }}</button>