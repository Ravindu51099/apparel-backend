<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Task::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'order_id' => 'required',
            'task_name' => 'required',
            'time_spent' => 'sometimes|required',
            'status' => 'sometimes|required',
        ]);
        return Task::create(
            $request->all()
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return $task;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'user_id' => 'sometimes|required',
            'order_id' => 'sometimes|required',
            'task_name' => 'sometimes|required',
            'time_spent' => 'sometimes|required',
            'status' => 'sometimes|required',
        ]);

        return $task->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        return $task->delete();
    }
}
