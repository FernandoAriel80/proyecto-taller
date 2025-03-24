@props(['title'])
<x-app-layout>
    <div class="grid grid-cols-8 h-screen">
        <!-- Sidebar -->
        @include('admin.components.sidebar')
        <!-- Main Content -->
        <div class="col-span-8 md:col-span-7 bg-slate-700 p-6">
            <div class="flex flex-col mx-auto max-w-6xl">
                <h1 class="text-center text-3xl font-bold mb-4 text-gray-200">{{ $title }}</h1>
                {{ $slot }}
            </div>
        </div>
    </div>
</x-app-layout>

