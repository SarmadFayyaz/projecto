<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model {
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'project_id',
        'name',
        'start_date',
        'end_date',
        'description',
        'added_by',
        'status',
    ];

    public function project() {
        return $this->belongsTo(Project::class);
    }

    public function taskUser() {
        return $this->hasMany(TaskUser::class);
    }

    public function taskAction() {
        return $this->hasMany(TaskAction::class);
    }
    public function taskNote() {
        return $this->hasMany(TaskNote::class)->where('user_id', auth()->user()->id);
    }

    public function addedBy() {
        return $this->hasOne(User::class, 'id', 'added_by')->withTrashed();
    }
}
