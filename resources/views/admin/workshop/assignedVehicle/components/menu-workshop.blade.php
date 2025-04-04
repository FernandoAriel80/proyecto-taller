@props(['current_id'])
<section>
    <nav
        class="grid md:grid-rows-1 grid-cols-3 grid-rows-3 md:grid-cols-5 p-1 text-center rounded-md bg-gray-800 text-white">
        <div>
            <a class="flex w-full hover:bg-slate-400 p-1 rounded-sm justify-center" href="{{ route('workshop.general.data.show',$current_id) }}">Información</a>
        </div>
        <div>
            <a class="flex w-full hover:bg-slate-400 p-1 rounded-sm justify-center"
                href="{{ route('workshop.employee.report.show',$current_id) }}">Reporte</a>
        </div>
        <div>
            <a class="flex w-full hover:bg-slate-400 p-1 rounded-sm justify-center" href="{{ route('workshop.employee.note.index',$current_id) }}">Notas</a>
        </div>
       {{--  <div>
            <a class="hover:bg-slate-400 p-1 rounded-sm" href="{{ route('register.vehicle.index') }}">Registrados</a>
        </div>
        <div>
            <a class="hover:bg-slate-400 p-1 rounded-sm" href="{{ route('assign.index') }}">En Taller</a>
        </div> --}}
    </nav>
</section>
