<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'tasks';

    public $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'task_name',
        'project_id',
        'status',
        'user_id',
        'created_by',
        'due_date'
    ];

    // Each task belongs to one project
    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id', 'id');
    }

    // Each task may belong to one user (optional)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id'); 
    }

    public function assignedTo()
    {
        return $this->belongsTo(User::class, 'created_by', 'id'); 
    }
}
