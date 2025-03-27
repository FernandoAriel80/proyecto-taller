@props(['route','text','placeholder' => ''])

<form action="{{ route($route) }}" method="GET">
    @csrf
    <input type="search" class="rounded-md" name="search" value="{{ request('search') }}"
        placeholder={{ $placeholder }}>
    <button type="submit"
        class="m-1 flex-1 md:max-w-20 md:max-h-10 min-w-20 min-h-10 rounded-md text-white bg-blue-400 hover:bg-blue-500">{{ $text }}</button>
</form>