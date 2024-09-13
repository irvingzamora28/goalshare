<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = ['message_board_id', 'user_id', 'content'];

    // Relationship with MessageBoard
    public function messageBoard()
    {
        return $this->belongsTo(MessageBoard::class);
    }

    // Relationship with User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
