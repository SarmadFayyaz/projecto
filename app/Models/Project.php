<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model {
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'company_id',
        'name',
        'strategic_goal',
        'purpose',
        'project_goal',
        'project_leader',
        'start_date',
        'end_date',
        'color',
        'description',
    ];

    public function projectLeader() {
        return $this->hasOne(User::class, 'id', 'project_leader')->withTrashed();
    }

    public function projectUser() {
        return $this->hasMany(ProjectUser::class);
    }

    public function task() {
        return $this->hasMany(Task::class);
    }

    public function groupConversation() {
        return $this->hasMany(GroupConversation::class);
    }
}
