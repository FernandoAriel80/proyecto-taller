<div>
    <div class="mb-4">
        <input type="{{ $type }}" name="{{ $name }}" class="w-full p-2 bg-gray-300 rounded-md"
            placeholder="{{ $value  }}" >
        @error( $name)
            <p class="text-red-400 text-sm">{{ $message }}</p>
        @enderror
    </div>
</div>