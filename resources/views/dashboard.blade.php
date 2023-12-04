<!-- resources/views/todos.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Todos
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">

                <!-- Display Todos -->
                <h1 class="text-2xl font-bold mb-4">Todo List</h1>

                @if(session('message'))
                    <div class="bg-green-200 text-green-800 p-4 mb-4">
                        {{ session('message') }}
                    </div>
                @endif

                <ul>
                    @forelse($todos as $todo)
                        <li class="mb-2">
                            <a href="{{ route('dashboard.show', $todo->id) }}" class="text-blue-500">{{ $todo->title }}</a>
                            <a href="{{ route('dashboard.edit', $todo->id) }}" class="text-yellow-500 ml-2">Edit</a>
                            <form method="POST" action="{{ route('dashboard.destroy', $todo->id) }}" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 ml-2">Delete</button>
                            </form>
                        </li>
                    @empty
                        <p>No todos available.</p>
                    @endforelse
                </ul>

                <!-- Create Todo Form -->
                <h1 class="text-2xl font-bold mt-6 mb-4">Create New Todo</h1>

                @if ($errors->any())
                    <div class="bg-red-200 text-red-800 p-4 mb-4">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('dashboard.store') }}" class="mb-4">
                    @csrf
                    <label for="title" class="block text-gray-700">Title:</label>
                    <input type="text" name="title" id="title" class="border rounded py-2 px-3 w-full" required>
                    <br>
                    <label for="description" class="block text-gray-700">Description:</label>
                    <textarea name="description" id="description" class="border rounded py-2 px-3 w-full" required></textarea>
                    <br>
                    <!-- Add fields for other attributes if needed -->
                    <button type="submit" class="bg-green-500 text-white py-2 px-4 rounded">Create Todo</button>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
