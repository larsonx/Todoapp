<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;


class TodoController extends Controller
{

    public function index()
    {
        // Show all resources
        $todos = Todo::all();
        return view('todos.index', compact('todos'));
    }


    public function create()
    {
        return view('todos.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            // Add validation rules for other fields
        ]);

        Todo::create($request->all());

        return redirect()->route('todos.index')->with('success', 'Record created successfully.');
    }

    public function show(Todo $todo)
    {
        return view('todos.show', compact('todo'));
    }


    public function edit(Todo $todo)
    {
        return view('edit', compact('todo'));
    }


    public function update($request, Todo $todo)
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