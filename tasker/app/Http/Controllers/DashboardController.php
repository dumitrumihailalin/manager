<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $projectsCount = \App\Models\Project::count();
        $usersCount = \App\Models\User::count();
        $tasksCount = \App\Models\Task::count();
        return view('admin.dashboard', compact('projectsCount', 'usersCount', 'tasksCount'));
    }
}
