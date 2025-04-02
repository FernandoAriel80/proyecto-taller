@props(['name', 'label'])
<label for={{ $name }} class="block text-sm font-medium text-gray-200">{{ $label }}</label>
<textarea id={{ $name }} name={{ $name }} rows="4"
    class="mt-1 p-2 w-full border rounded-md bg-gray-300  focus:ring-2 focus:ring-blue-500 focus:outline-none">
{{ $slot }}
</textarea>
@error($name)
    <p class="text-red-400 text-sm">{{ $message }}</p>
@enderror
