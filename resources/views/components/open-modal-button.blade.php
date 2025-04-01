@props(['anyFunction', 'current_id' => null])

<button 
    onclick="{{ $anyFunction }}('{{ $current_id }}')" 
    class="p-2 m-1 flex-1 max-h-10 min-w-28 min-h-10 rounded-md text-white bg-slate-500 hover:bg-slate-600"
>
    {{ $slot }}
</button>
