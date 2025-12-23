@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Tasks</h1>
        <a href="{{ route('tasks.create') }}" class="btn btn-primary">Add Task</a>
    </div>

    <div class="mb-3">
        <form method="GET" action="{{ route('tasks.index') }}" class="row g-2">
            <div class="col-auto">
                <select name="filter_status" class="form-select">
                    <option value="">All statuses</option>
                    <option value="Pending" {{ request('filter_status') == 'Pending' ? 'selected' : '' }}>Pending</option>
                    <option value="Completed" {{ request('filter_status') == 'Completed' ? 'selected' : '' }}>Completed</option>
                </select>
            </div>
            <div class="col-auto">
                <button class="btn btn-outline-secondary">Filter</button>
                <a href="{{ route('tasks.index') }}" class="btn btn-link">Reset</a>
            </div>
        </form>
    </div>

    @if($tasks->isEmpty())
        <div class="alert alert-secondary">No tasks yet.</div>
    @else
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Title</th>
                <th>Priority</th>
                <th>Status</th>
                <th>Created</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($tasks as $task)
                <tr>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->priority->value ?? $task->priority }}</td>
                    <td>{{ $task->status->value ?? $task->status }}</td>
                    <td>{{ $task->created_at->diffForHumans() }}</td>
                    <td class="text-end">
                        @if(($task->status->value ?? $task->status) !== 'Completed')
                            <form action="{{ route('tasks.complete', $task) }}" method="POST" class="d-inline">
                                @csrf
                                @method('PATCH')
                                <button class="btn btn-success btn-sm">Complete</button>
                            </form>
                        @endif

                        <a href="{{ route('tasks.edit', $task) }}" class="btn btn-sm btn-outline-primary">Edit</a>

                        <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this task?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@endsection
