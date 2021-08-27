<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Company extends Authenticatable {
    use HasFactory;

    protected $fillable = [
        'name',
        'admin_id',
        'email',
        'password',
        'image',
    ];

    public function admin() {
        return $this->belongsTo(Admin::class);
    }
}
