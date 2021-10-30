<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Company extends Authenticatable {
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'abbreviation',
        'admin_id',
        'email',
        'password',
        'image',
        'logo',
    ];

    public function admin() {
        return $this->belongsTo(Admin::class);
    }
}
