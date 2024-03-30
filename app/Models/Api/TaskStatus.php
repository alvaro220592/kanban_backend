<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskStatus extends Model
{
    use HasFactory;

    protected $fillable = ['title'];

    public function tasks(){
        return $this->hasMany(Task::class, 'task_status_id');
    }
}
