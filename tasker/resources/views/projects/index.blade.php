@extends('layouts.admin')

@section('title', 'Projects List')

@section('content')
<div class="row">

    {{-- Main Content --}}
    <div class="col-md-9">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="mb-0">Projects</h2>
            <a href="{{ url('projects/create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Add Project
            </a>
        </div>
        <div class="panel panel-default">
            <div class="panel-body">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Project Name</th>
                            <th>Created By</th>
                            <th>Tasks Count</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($projects as $project)
                        <tr>
                            <td>{{ $project->project_name }}</td>
                            <td>{{ $project->user->name ?? 'N/A' }}</td>
                            <td>{{ $project->tasks_count ?? '0' }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection