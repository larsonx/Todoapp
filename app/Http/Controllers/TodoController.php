<?php
namespace App\Http\Controllers;
use App\Models\Todo;
use Illuminate\Http\Request;



class TodoController extends Controller
{

    public function index()
{
    $todos = Todo::all();
    
    return view('dashboard', compact('todos'));
}



    public function create()
    {
        return view('dashboard');
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            // Add validation rules for other fields
        ]);

        Todo::create($request->all());

        return redirect()->route('dashboard')->with('success', 'Record created successfully.');
    }

    public function show(Todo $todo)
    {
        return view('dashboard', compact('todo'));
    }


    public function edit(Todo $todo)
{
    $todos = Todo::all();
    return view('/dashboard', compact('todo', 'todos'));
}   
    


    public function update(Request $request, Todo $todo)
    {
        $todo->update([
            'title' => $request->title,
            'description' => $request->description
        ]);
    
        // Update the todos collection in the view
        $todos = Todo::all();
    
        return redirect()->route('dashboard.index')->with('message', 'Todo Updated Successfully')->with('todos', $todos);
    }
    



    public function destroy(Todo $todo)
    {
        $todo->delete();
        return redirect()->route('dashboard')->with('message', 'Todo Deleted Successfully');
    }
}