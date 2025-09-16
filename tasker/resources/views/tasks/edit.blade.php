{{-- filepath: resources/views/tasks/edit.blade.php --}}
@extends('layouts.admin')

@section('title', 'Edit Task')

@section('content')
<div class="col-md-6 mx-auto">
    <h2>Edit Task</h2>
    <form action="{{ url('tasks/'.$task->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group mb-2">
            <label for="task_name">Task Name</label>
            <input type="text" name="task_name" class="form-control" value="{{ $task->task_name }}" required>
        </div>
        <div class="form-group mb-2">
            <label for="project_id">Project</label>
            <select name="project_id" class="form-control" required>
                @foreach($projects as $project)
                    <option value="{{ $project->id }}" @if($task->project_id == $project->id) selected @endif>
                        {{ $project->project_name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group mb-2">
            <label for="status">Status</label>
            <select name="status" class="form-control">
                <option value="pending" @if($task->status == 'pending') selected @endif>Pending</option>
                <option value="in_progress" @if($task->status == 'in_progress') selected @endif>In Progress</option>
                <option value="completed" @if($task->status == 'completed') selected @endif>Completed</option>
            </select>
        </div>
        <div class="form-group mb-3">
            <label for="due_date">Due Date</label>
            <input type="date" name="due_date" class="form-control" value="{{ $task->due_date }}">
        </div>
        <div class="form-group mb-3">
            <label for="user_id">Assign To</label>
            <select name="user_id" class="form-control">
                <option value="">-- Select User --</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" @if($task->user_id == $user->id) selected @endif>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
        <button type="submit" class="btn btn-primary">Update Task</button>
        <a href="{{ url('tasks') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection