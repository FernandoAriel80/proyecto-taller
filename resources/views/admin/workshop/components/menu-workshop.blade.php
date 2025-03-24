<section>
    <nav
        class="grid md:grid-rows-1 grid-cols-3 grid-rows-3 md:grid-cols-5 p-1 text-center rounded-md bg-gray-800 text-white">
        <div>
            <a class="hover:bg-slate-400 p-1 rounded-sm" href="{{ route('workshop.general.data.index') }}">Información</a>
        </div>
        <div>
            <a class="hover:bg-slate-400 p-1 rounded-sm"
                href="{{ route('workshop.employee.report.index') }}">Reporte</a>
        </div>
        <div>
            <a class="hover:bg-slate-400 p-1  rounded-sm" href="{{ route('workshop.employee.note.index') }}">Notas</a>
        </div>
       {{--  <div>
            <a class="hover:bg-slate-400 p-1 rounded-sm" href="{{ route('register.vehicle.index') }}">Registrados</a>
        </div>
        <div>
            <a class="hover:bg-slate-400 p-1 rounded-sm" href="{{ route('assign.index') }}">En Taller</a>
        </div> --}}
    </nav>
</section>
