<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
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

    public function projectLeader(){
        return $this->hasOne(User::class, 'id', 'project_leader');
    }

    public function projectUser(){
        return $this->hasMany(ProjectUser::class);
    }
}
