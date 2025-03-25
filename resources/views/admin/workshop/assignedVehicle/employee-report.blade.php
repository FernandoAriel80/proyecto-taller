<x-admin.workshop.assignedVehicle.workshop-template sub_title="Reporte del Empleado" :current_id="$id">

    <div class="grid gap-1">
        <section>
            <x-open-modal-button anyFunction="openModal">
                Crear Reporte
            </x-open-modal-button>
        </section>

        <x-my-modal nameID="modalCosas">
            <div class="">
                <x-close-modal-button anyFunction="closeModal">
                    Cerrar
                </x-close-modal-button>

            </div>
            <form action="{{ route('workshop.employee.report.store') }}" method="POST">
                @csrf
                <input type="hidden" name="current_id" value={{ $id }} />
                <x-input-textarea name="message_report" label="Escriba su reporte" />
                <x-submit-button-modal>Guardar</x-submit-button-modal>
            </form>
        </x-my-modal>


        <!-- div muestra reporte -->

        <div class="rounded-md min-h-20 bg-white ">

        </div>

    </div>

</x-admin.workshop.assignedVehicle.workshop-template>

<script>
    function openModal() {
        document.getElementById("modalCosas").classList.remove("hidden");
    }

    function closeModal() {
        document.getElementById("modalCosas").classList.add("hidden");
    }
</script>
