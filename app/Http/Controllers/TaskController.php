<?php

namespace App\Http\Controllers;

use App\Task;
use App\Http\Resources\TaskResource;
use App\Http\Resources\TasksResource;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return TasksResource
     * @throws \Throwable
     */
    public function index()
    {
        return new TasksResource(Task::with('comments')->paginate());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return TaskResource
     */
    public function show(Task $task)
    {
        TaskResource::withoutWrapping();

        return new TaskResource($task);
    }
}
