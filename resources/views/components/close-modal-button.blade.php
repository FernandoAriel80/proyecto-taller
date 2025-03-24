@props(['anyFunction'])
<button class="p-2 rounded-md bg-red-600 hover:bg-red-700 text-white" onclick="{{ $anyFunction }}()">{{ $slot }}</button>