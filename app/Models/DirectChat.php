<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DirectChat extends Model
{
    use HasFactory;

    protected $fillable = ['user_1_id', 'user_2_id'];

    // Relationship with Users
    public function user1()
    {
        return $this->belongsTo(User::class, 'user_1_id');
    }

    public function user2()
    {
        return $this->belongsTo(User::class, 'user_2_id');
    }

    // Relationship with ChatMessages
    public function chatMessages()
    {
        return $this->hasMany(ChatMessage::class);
    }
}
