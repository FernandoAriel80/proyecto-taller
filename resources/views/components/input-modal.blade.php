<div>
    <div class="mb-4">
        <input id="{{ $name }}" type="{{ $type }}" name="{{ $name }}" value="{{ $value }}" class="w-full p-2 bg-gray-300 rounded-md"
            placeholder="{{ $placeholder  }}" >
        @error( $name)
            <p class="text-red-400 text-sm">{{ $message }}</p>
        @enderror
    </div>
</div>