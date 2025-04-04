<section>
    <nav class=" text-white max-h-screen md:min-h-screen rounded-e-md md:rounded-none">
        <div class="grid gap-2 ">
            <a class=" flex active:bg-slate-400 hover:bg-slate-400 px-3 p-1 h-16 items-center rounded-sm"
                href="{{ route('customer.index') }}">Clientes</a>

            <a class=" flex active:bg-slate-400 hover:bg-slate-400 px-3 p-1 h-16 items-center w-full rounded-sm"
                href="{{ route('employee.index') }}">Empleados</a>

            <a class=" flex active:bg-slate-400 hover:bg-slate-400 px-3 p-1 h-16 items-center w-full rounded-sm"
                href="{{ route('reservations.index') }}">Reservas</a>

            <a class=" flex active:bg-slate-400 hover:bg-slate-400 px-3 p-1 h-16 items-center w-full rounded-sm"
                href="{{ route('register.vehicle.index') }}">Registrados</a>

            <a class=" flex active:bg-slate-400 hover:bg-slate-400 px-3 p-1 h-16 items-center w-full rounded-sm"
                href="{{ route('assign.index') }}">En Taller</a>
        </div>
    </nav>
</section>
