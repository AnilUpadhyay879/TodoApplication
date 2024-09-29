<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTaskRequest;
use App\Models\Task;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    public function index()
    {
        $todayTasks = Task::whereDate('created_at', today())->get();


        return view('task.index',[
            'tasks' => DB::table('tasks')->simplePaginate(7),
            'todayTasks' => $todayTasks
        ]);
    }

    public function all()
    {
        return view('task.all',[
            'tasks' => DB::table('tasks')->simplePaginate(7),
        ]);
    }

    public function create()
    {
        $task = new Task();

        return view('task.create', [
            'task' => $task
        ]);
    }

    public function store(CreateTaskRequest $request)
    {
        $task = Task::create($request->validated());

        return redirect()->route('index')->with('success', "Task created successfully");
    }

    public function edit(Task $task)
    {
        return view('task.edit',[
            'task' => $task
        ]);
    }

    public function update(Task $task, CreateTaskRequest $request)
    {
        $task->update($request->validated());

        return redirect()->route('index')->with('success', "Task updated successfully");
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('index')->with('success', 'Task deleted successfully');
    }
}
