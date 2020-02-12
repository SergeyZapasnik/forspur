<?php

namespace App\Http\Controllers\Admin;

use App\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @param $taskId
     * @return \Illuminate\Http\Response
     */
    public function create($taskId)
    {
        return view('admin.comments.create', ['taskId' => $taskId]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Comment::create($request->all());

        return redirect()->route('admin.tasks.edit', $request->get('task_id'));
    }
}
