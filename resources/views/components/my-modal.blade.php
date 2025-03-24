@props(['nameID'])
<div id={{ $nameID }} class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 hidden">
    <div class="bg-gray-700 p-6 rounded-lg shadow-lg w-7/12">
        {{ $slot }}
    </div>
</div>
