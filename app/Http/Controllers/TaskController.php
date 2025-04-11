<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    // Show all tasks for the logged-in user
    public function index(Request $request)
    {
        // Start by fetching only tasks for the logged-in user
        $tasks = Task::where('user_id', Auth::id());

        // Apply status filter if specified in the request
        if ($request->has('status') && $request->status != '') {
            $tasks->where('status', $request->status);
        }

        // Fetch the filtered tasks
        $tasks = $tasks->get();

        // Pass the tasks to the view
        return view('tasks.index', compact('tasks'));
    }


    // Show create form
    public function create()
    {
        return view('tasks.create');
    }

    // Store new task
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'status' => 'required|in:Pending,In_Progress,Completed',
            'due_date' => 'nullable|date'
        ]);

        Task::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
            'due_date' => $request->due_date
        ]);

        return redirect()->route('tasks.index')->with('success', 'Task created successfully!');
    }

    // Show edit form
    public function edit(Task $task)
    {
        if ($task->user_id !== Auth::id()) {
            abort(403);
        }

        return view('tasks.edit', compact('task'));
    }

    // Update task
    public function update(Request $request, Task $task)
    {
        if ($task->user_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'status' => 'required|in:Pending,In_Progress,Completed',
            'due_date' => 'nullable|date'
        ]);

        $task->update([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
            'due_date' => $request->due_date
        ]);

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully!');
    }

    // Delete task
    public function destroy($id)
    {
        $task = Task::findOrFail($id);

        if ($task->user_id !== Auth::id()) {
            abort(403);
        }

        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully!');
    }
}
