<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function store(Request $request)
    {
        Task::create([
            'title' => $request->title,
            'status' => 'todo',
            'user_id' => auth()->id()
        ]);

        return back();
    }

    public function doing(Task $task)
    {
        $task->update([
            'status' => 'doing'
        ]);

        return back();
    }

    public function done(Task $task)
    {
        $task->update([
            'status' => 'done'
        ]);

        return back();
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return back();
    }
    public function move(Request $request, Task $task)
{
    $task->update([
        'status' => $request->status
    ]);

    return response()->json(['success' => true]);
}
}