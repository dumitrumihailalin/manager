{{-- filepath: resources/views/tasks/index.blade.php --}}
@extends('layouts.admin')

@section('title', 'Tasks List')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Tasks</h2>
    <a href="{{ url('tasks/create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Add Task
    </a>
</div>
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Task Name</th>
            <th>Project</th>
            <th>Status</th>
            <th>Created</th>
            <th>Assigned To</th>
            <th>Due Date</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tasks as $task)
        <tr>
            <td>{{ $task->task_name }}</td>
            <td>{{ $task->project->project_name ?? 'N/A' }}</td>
            <td>
            @php
                $statusColors = [
                'completed' => 'bg-success text-white',
                'in_progress' => 'bg-primary text-white',
                'pending' => 'bg-warning text-dark'
                ];
                $statusClass = $statusColors[$task->status] ?? '';
            @endphp
            <span class="badge {{ $statusClass }}">
                {{ ucfirst(str_replace('_', ' ', $task->status)) }}
            </span>
            </td>
            <td>{{ $task->assignedTo->name ?? 'N/A' }}</td>

            <td>{{ $task->user->name ?? 'N/A' }}</td>
            <td>
                @if($task->due_date)
                    <span @if(\Carbon\Carbon::parse($task->due_date)->isPast()) class="text-danger" @endif>
                        {{ $task->due_date }}
                    </span>
                @else
                    N/A
                @endif
            </td>
            <td>
            <a href="{{ url('tasks/'.$task->id.'/edit') }}" class="btn btn-sm btn-warning">Edit</a>
            <!-- Add delete button if needed -->
            <a href="{{ url('tasks/'.$task->id) }}" class="btn btn-sm btn-info">View</a>
            <form action="{{ url('tasks/'.$task->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this task?')">Delete</button>
            </form>

        </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="d-flex justify-content-center">
    {{ $tasks->links() }}
</div>
@endsection