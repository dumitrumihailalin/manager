{{-- filepath: resources/views/tasks/show.blade.php --}}
@extends('layouts.admin')

@section('title', 'Task Details')

@section('content')
<div class="col-md-8 mx-auto">
    <div class="card mt-4">
        <div class="card-header">
            <h3>Task Details</h3>
        </div>
        <div class="card-body">
            <dl class="row">
                <dt class="col-sm-4">Task Name</dt>
                <dd class="col-sm-8">{{ $task->task_name }}</dd>

                <dt class="col-sm-4">Project</dt>
                <dd class="col-sm-8">{{ $task->project->project_name ?? 'N/A' }}</dd>

                <dt class="col-sm-4">Status</dt>
                <dd class="col-sm-8">
                    @php
                        $statusColors = [
                            'completed' => 'badge bg-success text-white',
                            'in_progress' => 'badge bg-primary text-white',
                            'pending' => 'badge bg-warning text-dark'
                        ];
                        $statusClass = $statusColors[$task->status] ?? 'badge bg-secondary';
                    @endphp
                    <span class="{{ $statusClass }}">
                        {{ ucfirst(str_replace('_', ' ', $task->status)) }}
                    </span>
                </dd>

                <dt class="col-sm-4">Assigned To</dt>
                <dd class="col-sm-8">{{ $task->user->name ?? 'N/A' }}</dd>

                <dt class="col-sm-4">Due Date</dt>
                <dd class="col-sm-8">
                    @if($task->due_date)
                        <span @if(\Carbon\Carbon::parse($task->due_date)->isPast()) class="text-danger" @endif>
                            {{ $task->due_date }}
                        </span>
                    @else
                        N/A
                    @endif
                </dd>

                <dt class="col-sm-4">Created At</dt>
                <dd class="col-sm-8">{{ $task->created_at ? $task->created_at->format('Y-m-d H:i') : 'N/A' }}</dd>

                <dt class="col-sm-4">Updated At</dt>
                <dd class="col-sm-8">{{ $task->updated_at ? $task->updated_at->format('Y-m-d H:i') : 'N/A' }}</dd>
            </dl>
            <a href="{{ url('tasks/'.$task->id.'/edit') }}" class="btn btn-warning">Edit</a>
            <a href="{{ url('tasks') }}" class="btn btn-secondary">Back to List</a>
        </div>
    </div>
</div>
@endsection