<!-- resources/views/todos/show.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Todo Details
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">

                <h1 class="text-2xl font-bold mb-4">{{ $todo->title }}</h1>

                <p class="text-gray-700 mb-4">{{ $todo->description }}</p>

            </div>
        </div>
    </div>
</x-app-layout>
