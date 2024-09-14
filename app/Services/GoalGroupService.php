<?php

namespace App\Services;

use App\Models\GoalGroup;

class GoalGroupService
{
    public function getAllGoalGroups()
    {
        // Retrieve all goal groups
        return GoalGroup::all();
    }

    public function getGoalGroupById($goalGroupId)
    {
        // Retrieve a specific goal group by ID
        return GoalGroup::findOrFail($goalGroupId);
    }

    public function deleteGoalGroup(GoalGroup $goalGroup)
    {
        // Delete a goal group
        return $goalGroup->delete();
    }
}
