<!-- resources/views/todos/index.blade.php -->

@extends('dashboard')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Todos</h1>

    @if(session('message'))
        <div class="bg-green-200 text-green-800 p-4 mb-4">
            {{ session('message') }}
        </div>
    @endif

    <ul>
        @foreach($todos as $todo)
            <li class="mb-2">
                <a href="{{ route('todos.show', $todo->id) }}" class="text-blue-500">{{ $todo->title }}</a>
                <a href="{{ route('todos.edit', $todo->id) }}" class="text-yellow-500 ml-2">Edit</a>
                <form method="POST" action="{{ route('todos.destroy', $todo->id) }}" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500 ml-2">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>

    <a href="{{ route('todos.create') }}" class="text-green-500">Create New Todo</a>
@endsection
