<?php

use App\Models\Project;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return redirect('/login');
});
Route::get('/login', [\App\Http\Controllers\AuthenticationController::class, 'login'])->name('login');
Route::get('/register', [\App\Http\Controllers\AuthenticationController::class, 'register'])->name('register');
Route::get('/forgot-password', [\App\Http\Controllers\AuthenticationController::class, 'forgotPassword'])->name('password.request');
Route::get('/reset-password', [\App\Http\Controllers\AuthenticationController::class, 'resetPassword'])->name('password.reset');    
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');
Route::post('/store', [\App\Http\Controllers\AuthenticationController::class, 'store'])->name('store');
Route::post('/authenticate', [\App\Http\Controllers\AuthenticationController::class, 'authenticate'])->name('authenticate');
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');

Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');

Route::get('/projects/create', [ProjectController::class, 'create']);
Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');
Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('projects.show');
Route::get('/projects/{project}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
Route::put('/projects/{project}', [ProjectController::class, 'update'])->name('projects.update');
Route::delete('/projects/{project}', [ProjectController::class  , 'destroy'])->name('projects.destroy');

Route::resource('tasks', TaskController::class);