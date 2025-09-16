{{-- filepath: resources/views/tasks/create.blade.php --}}
@extends('layouts.admin')

@section('title', 'Create Task')

@section('content')
<div class="col-md-6 mx-auto">
    <h2>Create Task</h2>
    <form action="{{ url('tasks') }}" method="POST">
        @csrf
        <div class="form-group mb-2">
            <label for="task_name">Task Name</label>
            <input type="text" name="task_name" class="form-control" required>
        </div>
        <div class="form-group mb-2">
            <label for="project_id">Project</label>
            <select name="project_id" class="form-control" required>
                <option value="">Select Project</option>
                @foreach($projects as $project)
                    <option value="{{ $project->id }}">{{ $project->project_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mb-2">
            <label for="user_id">User</label>
            <select name="user_id" class="form-control" required>
                <option value="">Select User</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mb-2">
            <label for="status">Status</label>
            <select name="status" class="form-control">
                <option value="pending">Pending</option>
                <option value="in_progress">In Progress</option>
                <option value="completed">Completed</option>
            </select>
        </div>
        <div class="form-group mb-3">
            <label for="due_date">Due Date</label>
            <input type="date" name="due_date" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Create Task</button>
        <a href="{{ url('tasks') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection