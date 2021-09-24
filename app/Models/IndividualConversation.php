<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class IndividualConversation extends Model {
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'project_id',
        'user_id',
        'receiver_id',
        'message',
        'document_id',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function document() {
        return $this->belongsTo(Document::class);
    }
}
