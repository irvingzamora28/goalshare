<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MessageBoard extends Model
{
    use HasFactory;

    protected $fillable = ['group_id', 'topic'];

    // Relationship with GoalGroup
    public function goalGroup()
    {
        return $this->belongsTo(GoalGroup::class);
    }

    // Relationship with Message
    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}
