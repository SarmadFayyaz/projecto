<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TaskNote extends Model {
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'task_id',
        'user_id',
        'notes',
    ];

    public function task() {
        return $this->belongsTo(Task::class);
    }
    public function user() {
        return $this->belongsTo(User::class)->withTrashed();
    }
}
