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
        return view('information', compact('todo'));
    }
   

    public function edit(Todo $todo)
{
    return view('edit', compact('todo'));
}
    


public function update(Request $request, Todo $todo)
{
    $request->validate([
        'title' => 'required',
        'description' => 'required',
        // Add validation rules for other fields
    ]);

    $todo->update([
        'title' => $request->title,
        'description' => $request->description
        // Update other fields as needed
    ]);

    return redirect()->route('dashboard')->with('message', 'Todo Updated Successfully');
}
    








    public function destroy(Todo $todo)
    {
        $todo->delete();
        return redirect()->route('dashboard')->with('message', 'Todo Deleted Successfully');
    }
}

