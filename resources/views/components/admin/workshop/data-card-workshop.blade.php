@props(['name', 'email', 'vehicle_type', 'brand', 'check_in_date', 'check_out_date'])
<div class="border rounded-md bg-slate-500 text-black p-2 hover:bg-slate-400">
    <div class="grid grid-cols-2 grid-rows-3 md:grid-cols-3 md:grid-rows-2 gap-2 md:text-center">
        <label>{{ $name }}</label>
        <label>{{ $email }}</label>
        <label>{{ $vehicle_type }}</label>
        <label>{{ $brand }}</label>
        <label>{{ $check_in_date }}</label>
        <label>{{ $check_out_date }}</label>
    </div>
</div>
