<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GoalType extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    // Relationship with Goal
    public function goals()
    {
        return $this->belongsToMany(Goal::class, 'goal_goal_type');
    }
}
