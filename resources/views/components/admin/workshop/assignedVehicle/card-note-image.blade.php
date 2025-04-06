@props(['src', 'alt', 'parag', 'id'])

<div class="grid md:grid-cols-2 md:h-60 rounded-md bg-white">
    <div class=" rounded-md bg-white border-2 border-slate-500 p-2">
        <p>{{ $parag }}</p>
    </div>
    <div class="flex justify-center items-center rounded-l-md ">
        <!-- Clickable Image -->
        <img id="thumbnail" onclick="openModalImage({{ $id }})" class="h-60 max-w-auto cursor-pointer transition duration-300 "
            src="{{ asset('storage/' . $src) }}" alt="{{ $alt }}">
    </div>

    <!-- Full-Screen Modal -->
    <div id="imageModal{{ $id }}" class="fixed inset-0 bg-black bg-opacity-75 flex justify-center items-center z-50 hidden">
        <div class="relative">
            <!-- Close Button -->
            <button id="closeModal" onclick="closeModalImage({{ $id }})" class="absolute top-2 right-2 text-white text-2xl font-bold">&times;</button>

            <!-- Expanded Image -->
            <img id="expandedImg" src="{{ asset('storage/' . $src) }}" alt="{{ $alt }}"
                class="md:max-w-6xl md:max-h-screen rounded-lg shadow-lg">
        </div>
    </div>
</div>

<script>

    function openModalImage(id){
        document.getElementById("imageModal"+id).classList.remove("hidden");
    }
    function closeModalImage(id){
        document.getElementById("imageModal"+id).classList.add("hidden");
    }
 
</script>
