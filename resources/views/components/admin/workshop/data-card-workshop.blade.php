@props(['name', 'email', 'vehicle_type', 'brand', 'check_in_date', 'check_out_date'])

<div class="grid grid-cols-2 gap-2 p-2 sm:grid-cols-2 md:grid-cols-6 md:justify-between md:text-center">
    <label class="break-words overflow-auto">{{ $name }}</label>
    <label class="break-words overflow-auto">{{ $email }}</label>
    <label class="break-words overflow-auto">{{ $vehicle_type }}</label>
    <label class="break-words overflow-auto">{{ $brand }}</label>
    <label class="break-words overflow-auto">{{ $check_in_date }}</label>
    <label class="break-words overflow-auto">{{ $check_out_date == null ? 'Sin Fecha': $check_out_date }}</label>
</div>



