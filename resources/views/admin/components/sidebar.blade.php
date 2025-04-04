<div class="col-span-1 hidden md:block bg-gray-800">
    @include('admin.components.menu')
</div>
<div class="absolute md:hidden bg-gray-800 ">
    <button class="p-3 rounded-e-md bg-gray-800 active:bg-gray-500 text-white" onclick="modalSide()">
        ☰
    </button>
    <div id="sideModal" class="hidden h-96">
        @include('admin.components.menu')
    </div>
</div>
<script>
    function modalSide() {
        const sideModal = document.getElementById("sideModal");

        if (sideModal.classList.contains("hidden")) {
            sideModal.classList.remove("hidden");
        } else {
            sideModal.classList.add("hidden");
        }
    }
</script>
