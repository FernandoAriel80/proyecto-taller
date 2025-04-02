@props(['label'])
<div class="flex flex-col items-center gap-2">
    <label for="image" class="cursor-pointer bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">
        {{ $label }}
    </label>
    <input type="file" name="image" id="image" accept="image/*" class="hidden">
    <img id="preview" class="mt-3 w-40 h-40 object-cover rounded-lg shadow-lg hidden" />
    @error("image")
        <p class="text-red-400 text-sm">{{ $message }}</p>
    @enderror
</div>

<script>
    document.getElementById('image').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('preview').src = e.target.result;
                document.getElementById('preview').classList.remove('hidden');
            };
            reader.readAsDataURL(file);
        }
    });
</script>
