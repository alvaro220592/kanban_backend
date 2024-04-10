<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'background_color', 'order', 'task_status_id', 'priority_id'];

    public function status(){
        return $this->belongsTo(TaskStatus::class, 'task_status_id');
    }

    public function priority(){
        return $this->belongsTo(Priority::class, 'priority_id');
    }
}
