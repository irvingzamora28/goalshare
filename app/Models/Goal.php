<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description'];

    // Many-to-Many relationship with GoalType
    public function goalTypes()
    {
        return $this->belongsToMany(GoalType::class, 'goal_goal_type');
    }

    // One-to-Many relationship with UserGoal
    public function userGoals()
    {
        return $this->hasMany(UserGoal::class);
    }

    // Relationship with GoalGroup
    public function goalGroups()
    {
        return $this->hasMany(GoalGroup::class);
    }
}
