<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserGroupMembership extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'group_id'];

    // Relationship with User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relationship with GoalGroup
    public function goalGroup()
    {
        return $this->belongsTo(GoalGroup::class);
    }
}
