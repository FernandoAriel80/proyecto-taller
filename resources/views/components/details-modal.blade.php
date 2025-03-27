@props(['id'])

<div id={{ $id }} class="fixed z-10 inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 hidden">
    <div class="bg-white p-8 rounded-lg shadow-lg w-11/12 max-w-4xl">
        {{ $slot }}
    </div>
</div>