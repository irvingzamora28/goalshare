<?php

namespace App\Services;

use App\Models\GoalGroup;

class CommunityService
{
    public function getCommunityForGoal($goalId)
    {
        // Retrieve all groups (communities) related to a specific goal
        return GoalGroup::where('goal_id', $goalId)->get();
    }
}
