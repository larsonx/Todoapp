<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Todo;


class TodoController extends Controller
{

    public function index()
    {
        $todos = Todo::latest()->paginate(10);
        return view('todos.index', compact('todos'));
    }


    public function create()
    {
        return view('todos.create');
    }


    public function store(PostRequest $request)
    {
        Todo::create($request->validated());
        return redirect()->route('todos.index')->with('message', 'Post Created Successfully');
    }


    public function show(Todo $todo)
    {
        return view('todos.show', compact('todo'));
    }


    public function edit(Todo $todo)
    {
        return view('todos.edit', compact('todo'));
    }


    public function update(PostRequest $request, Todo $todo)
    {
        $todo->update([
            'title' => $request->title,
            'description' => $request->description
        ]);

        return redirect()->route('todos.index')->with('message', 'Todo Updated Successfully');
    }


    public function destroy(Todo $todo)
    {
        $todo->delete();
        return redirect()->route('todos.index')->with('message', 'Todo Deleted Successfully');
    }
}