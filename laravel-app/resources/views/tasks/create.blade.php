@extends('layouts.app')

@section('content')
    <h1>Create Task</h1>

    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" value="{{ old('title') }}" class="form-control">
            @error('title') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control">{{ old('description') }}</textarea>
            @error('description') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Priority</label>
            <select name="priority" class="form-select">
                <option value="Low" {{ old('priority') == 'Low' ? 'selected' : '' }}>Low</option>
                <option value="Medium" {{ old('priority', 'Medium') == 'Medium' ? 'selected' : '' }}>Medium</option>
                <option value="High" {{ old('priority') == 'High' ? 'selected' : '' }}>High</option>
            </select>
            @error('priority') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-select">
                <option value="Pending" {{ old('status', 'Pending') == 'Pending' ? 'selected' : '' }}>Pending</option>
                <option value="Completed" {{ old('status') == 'Completed' ? 'selected' : '' }}>Completed</option>
            </select>
            @error('status') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <button class="btn btn-primary">Create</button>
        <a href="{{ route('tasks.index') }}" class="btn btn-link">Cancel</a>
    </form>
@endsection
