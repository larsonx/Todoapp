<!-- resources/views/edit.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Todo
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">

                <h1 class="text-2xl font-bold mb-4">Edit Todo</h1>

                @if ($errors->any())
                    <div class="bg-red-200 text-red-800 p-4 mb-4">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('dashboard.update', $todo->id) }}" class="mb-4">
                    @csrf
                    @method('PATCH')
                    <label for="title" class="block text-gray-700">Title:</label>
                    <input type="text" name="title" id="title" class="border rounded py-2 px-3 w-full" value="{{ $todo->title }}" required>
                    <br>
                    <label for="description" class="block text-gray-700">Description:</label>
                    <textarea name="description" id="description" class="border rounded py-2 px-3 w-full" required>{{ $todo->description }}</textarea>
                    <br>
                    <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Update Todo</button>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
