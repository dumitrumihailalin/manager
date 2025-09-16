<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Project extends Model
{
    protected $table = 'projects';

    public $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'project_name',
        'user_id',
        'project_date',
        'customer_id'
    ];
    // Each project belongs to one user (creator)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function tasks()
    {
        return $this->hasMany(Task::class, 'project_id', 'id');
    }
}
