<section>
    <nav class="grid md:grid-rows-1 grid-cols-3 grid-rows-3 md:grid-cols-5 p-1 text-center rounded-md bg-gray-800 text-white">
        <div>
            <a class="hover:bg-slate-400 p-1 rounded-sm" href="{{ route('customer.index') }}">Clientes</a>
        </div>
        <div>
            <a class="hover:bg-slate-400 p-1 rounded-sm" href="{{ route('employee.index') }}">Empleados</a>
        </div>
        <div>
            <a class="hover:bg-slate-400 p-1  rounded-sm"
                href="{{ route('reservations.index') }}">Reservas</a>
        </div>
        <div>
            <a class="hover:bg-slate-400 p-1 rounded-sm"
                href="{{ route('register.vehicle.index') }}">Registrados</a>
        </div>
        <div>
            <a class="hover:bg-slate-400 p-1 rounded-sm" href="{{ route('assign.index') }}">En Taller</a>
        </div>
    </nav>
</section>
