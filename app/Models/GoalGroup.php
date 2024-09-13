<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GoalGroup extends Model
{
    use HasFactory;

    protected $fillable = ['goal_id', 'group_name'];

    // Relationship with Goal
    public function goal()
    {
        return $this->belongsTo(Goal::class);
    }

    // Relationship with UserGroupMembership
    public function userGroupMemberships()
    {
        return $this->hasMany(UserGroupMembership::class);
    }
}
