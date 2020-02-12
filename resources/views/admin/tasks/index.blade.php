@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Tasks</div>
                <div class="card-body">

                    <a href="{{ route('admin.tasks.create') }}" class="btn btn-sm btn-primary">Add new task</a>
                    <br><br>

                    <div class="container">
                        <div class="row">
                            @foreach ($statuses as $status)
                            <div class="col">
                                <h2>{{ $status->name }}</h2>
                                @foreach($tasks as $task)
                                    @if ($task->status_id !== $status->id)
                                        @continue
                                    @endif
                                        <h4>{{ $task->name }}</h4>
                                        <p>{{ $task->description }}<br>
                                            Comments: <b>{{ $task->comment_count }}</b>
                                        </p>
                                        <p><a class="btn btn-warning" href="{{ route('admin.tasks.edit', $task->id) }}">Edit</a></p>
                                        <br><br>
                                @endforeach
                            </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
