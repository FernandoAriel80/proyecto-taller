<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased bg-black">
    <div class="min-h-screen flex flex-col justify-center items-center pt-6 sm:pt-0">
        <div class="mb-6">
            <a href="{{ route('dashboard') }}" class="text-4xl font-extrabold text-gray-200 hover:text-gray-400">
                A&M Service
            </a>
        </div>

        <div class="bg-gray-900 shadow-lg rounded-lg p-6 w-80 text-center">
            <h1 class="text-2xl font-bold text-gray-100 mb-4">Menu Admin</h1>
            <nav class="flex flex-col space-y-3">
                <a href="{{ route('customer.index') }}" class="text-lg font-medium text-gray-300 hover:text-white">Clientes</a>
                <a href="{{ route('employee.index') }}" class="text-lg font-medium text-gray-300 hover:text-white">Empleados</a>
                <a href="{{ route('reservations.index') }}" class="text-lg font-medium text-gray-300 hover:text-white">Reservas y Registrar Vehiculos</a>
                <a href="{{ route('register.vehicle.index') }}" class="text-lg font-medium text-gray-300 hover:text-white">Vehiculos en Taller</a>
            </nav>
        </div>
    </div>
</body>

</html>
