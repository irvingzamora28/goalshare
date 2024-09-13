<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserGoal extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'goal_id', 'status', 'start_date', 'end_date'];

    // Relationship with Goal
    public function goal()
    {
        return $this->belongsTo(Goal::class);
    }

    // Relationship with User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
