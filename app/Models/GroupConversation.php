<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GroupConversation extends Model {
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'project_id',
        'user_id',
        'message',
        'message_type',
        'document_id',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function document() {
        return $this->belongsTo(Document::class);
    }
}
