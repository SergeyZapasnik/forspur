@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add new task</div>
                <div class="card-body">

                    <form method="POST" action="{{ route('admin.tasks.update', $task->id) }}">
                        {{ method_field('PUT') }}
                        @csrf
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Status</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="status_id">
                                @foreach($statuses as $status)
                                    <option value="{{ $status->id }}" {{ $task->status_id == $status->id ? 'selected' : '' }}>
                                        {{ $status->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                    <br>

                    <ul class="list-unstyled">
                        <ul>
                            @forelse($comments as $comment)
                                <li>{{ $comment->content }}</li>
                            @empty
                                <li>No comments found.</li>
                            @endforelse
                        </ul>
                    </ul>
                    <a href="{{ route('admin.createcomment', ['task_id' => $task->id]) }}" class="btn btn-sm btn-primary">Add new comment</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
