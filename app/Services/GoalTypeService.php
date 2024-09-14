<?php

namespace App\Services;

use App\Models\GoalType;

class GoalTypeService
{
    public function getAllGoalTypes()
    {
        // Retrieve all goal types
        return GoalType::all();
    }

    public function createGoalType($validatedData)
    {
        // Create a new goal type
        return GoalType::create($validatedData);
    }

    public function getGoalTypeById($goalTypeId)
    {
        // Retrieve a specific goal type by ID
        return GoalType::findOrFail($goalTypeId);
    }

    public function deleteGoalType(GoalType $goalType)
    {
        // Delete a goal type
        return $goalType->delete();
    }
}
