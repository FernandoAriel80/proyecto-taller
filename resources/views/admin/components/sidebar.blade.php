<div class="col-span-1 hidden md:block">
    @include('admin.components.menu')
</div>
<div class="absolute md:hidden ">
    <button class="text-white" onclick="modalSide()">
        //
    </button>
    <div id="sideModal" class="hidden">
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
