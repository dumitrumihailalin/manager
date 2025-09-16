{{-- filepath: resources/views/projects/index.blade.php --}}
@extends('layouts.admin')

@section('title', 'Projects List')

@section('content')
<div class="row">
    <div class="col-md-9">
        {{-- Create Project Form --}}
        <div class="card mb-4">
            <div class="card-header">
                <strong>Create New Project</strong>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ url('projects') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="project_name">Project Name</label>
                        <input type="text" name="project_name" id="project_name" class="form-control" required maxlength="255" value="{{ old('project_name') }}">
                    </div>
                    <div class="form-group">
                        <label for="project_date">Project Date</label>
                        <input type="date" name="project_date" id="project_date" class="form-control" required value="{{ old('project_date') }}">
                    </div>
                    
                    <div class="form-group">
                        <label for="customer_id">Customer ID</label>
                        <input type="number" name="customer_id" id="customer_id" class="form-control" required value="{{ old('customer_id') }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Create Project</button>
                </form>
            </div>
        </div>


    </div>
</div>
@endsection