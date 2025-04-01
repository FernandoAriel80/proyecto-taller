@props(['name' => '','method','route','current_id' =>''])

<form id={{ $name  }} name={{ $name  }} method="POST" action="{{ route($route,$current_id) }}">
    @csrf
    @method($method)
    <button type="submit"
        class="p-2 m-1 flex-1 min-w-20 min-h-10 rounded-md text-white bg-slate-700 hover:bg-slate-600">
       {{ $slot }}
    </button>
</form>