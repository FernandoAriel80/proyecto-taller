@props(['title','sidebar'])
<x-app-layout>
    <!-- Main Content -->
    <div class=" grid grid-cols-8 bg-slate-700 ">
        <!-- Sidebar -->
        @include( $sidebar )
        <div class=" col-span-8 md:col-span-7 flex-col  mx-10 max-w-6xl">
            <h1 class="text-center text-3xl font-bold mb-4 text-gray-200">{{ $title }}</h1>
            {{ $slot }}
        </div>
    </div>

</x-app-layout>
