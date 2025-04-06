<x-admin.workshop.assignedVehicle.workshop-template sidebar="followUp.components.sidebar" menu_workshop="followUp.details.inWorkshop.components.menu-workshop" sub_title="Reporte del Empleado" :current_id="$id">
    <div class="grid gap-1">
 
        <!-- div muestra reporte -->

        <div class="rounded-md min-h-20 bg-white p-3">
            @if ($report != null)
                {{ $report->description }}
            @else
                <h4 class="text-black">No hay reportes...</h4>
            @endif
            
        </div>

    </div>


</x-admin.workshop.assignedVehicle.workshop-template>