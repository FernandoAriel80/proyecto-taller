
@props(['anyFunction'])
<button class="p-2 rounded-md bg-green-600 hover:bg-green-700 text-white" onclick="{{ $anyFunction }}()">{{ $slot }}</button>