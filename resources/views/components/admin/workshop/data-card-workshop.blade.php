@props(['name', 'email', 'vehicle_type', 'brand', 'check_in_date', 'check_out_date'])
<div class="p-2 text-blackrounded-l-sm ">
    <div class="grid grid-cols-2 grid-rows-2 md:grid-rows-1 md:grid-cols-5 gap-2 md:text-center">
        <label>{{ $name }}</label>
        <label>{{ $email }}</label>
        <label>{{ $vehicle_type }}</label>
        <label>{{ $brand }}</label>
        <label>{{ $check_in_date }}</label>
        <label>{{ $check_out_date }}</label>
    </div>
</div>


