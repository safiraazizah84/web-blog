<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-welcome />
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7x1 mx-auto sm:px-6 lg:px-8" style="max-width: 800px;">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg" style="height: 70px;">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight" style="margin-top: 24px; margin-bottom: 24px; margin-left: 25px;">You're logged in!</h2>
            </div>
        </div>
    </div>

</x-app-layout>
