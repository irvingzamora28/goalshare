<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatMessage extends Model
{
    use HasFactory;

    protected $fillable = ['chat_id', 'sender_id', 'content'];

    // Relationship with DirectChat
    public function directChat()
    {
        return $this->belongsTo(DirectChat::class);
    }

    // Relationship with User (Sender)
    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }
}
