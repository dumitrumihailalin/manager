<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = \App\Models\Project::with('user')->withCount('tasks')->get();
        return view('projects.index', compact('projects'));
    }

    // Controller methods (index, create, store, show, edit, update, destroy) go here
    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'project_name' => 'required|string|max:255',
            'project_date' => 'required|date',
            // 'customer_id' => 'required|exists:customers,id',
        ]);
        $request->merge(['user_id' => 1]);
        \App\Models\Project::create($request->all());

        return redirect('/projects')->with('success', 'Project created successfully.');
    }

    public function show(\App\Models\Project $project)
    {
        return view('admin.show_project', compact('project'));
    }
    public function edit(\App\Models\Project $project)
    {
        return view('admin.edit_project', compact('project'));
    }

    public function update(Request $request, \App\Models\Project $project)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'user_id' => 'required|exists:users,id',
        ]);

        $project->update($request->all());

        return redirect('/projects')->with('success', 'Project updated successfully.');
    }

    public function destroy(\App\Models\Project $project)
    {
        $project->delete();
        return redirect('/projects')->with('success', 'Project deleted successfully.');
    }
}
