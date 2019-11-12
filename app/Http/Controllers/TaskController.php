<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('tasks', ['tasks' => $tasks]);
    }

    public function store(Request $request)
    {
        $task = new Task;
        $task->name = request('name');
        $task->save();
        return redirect('/tasks');
    }

    public function destroy(Request $request, $id, Task $task)
    {
        $task = Task::find($id);
        $task->delete();
        return redirect('/tasks');
    }
}
