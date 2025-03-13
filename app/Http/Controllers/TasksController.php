<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task; 

class TasksController extends Controller
{
    public function index()
    {
        $tasks = Task::all(); 
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Task::create($request->only(['title', 'description'])); 
        return redirect()->route('tasks.index')->with('success', 'Task created successfully!');
    }

    public function show(Task $task) 
    {
        return view('tasks.show', compact('task'));
    }

    public function edit(Task $task) 
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task) 
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'is_completed' => 'sometimes|boolean',
        ]);

        $task->update($request->only(['title', 'description', 'is_completed']));
        return redirect()->route('tasks.index')->with('success', 'Task updated successfully!');
    }

    public function destroy(Task $task) 
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully!');
    }
}
