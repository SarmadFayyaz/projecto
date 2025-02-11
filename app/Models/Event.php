<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model {
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'project_id',
        'user_id',
        'title',
        'type',
        'days_of_week',
        'start_date',
        'end_date',
        'start_time',
        'end_time',
    ];

    public function project() {
        return $this->belongsTo(Project::class);
    }

    public function user() {
        return $this->belongsTo(User::class)->withTrashed();
    }

    public function eventUser() {
        return $this->hasMany(EventUser::class);
    }
}
