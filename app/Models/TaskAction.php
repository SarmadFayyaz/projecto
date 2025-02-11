<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TaskAction extends Model {
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'task_id',
        'name',
        'note',
        'status',
        'completed_by',
    ];

    public function task() {
        return $this->belongsTo(Task::class);

    }
}
