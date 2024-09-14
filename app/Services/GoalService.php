<?php

namespace App\Services;

use App\Models\Goal;
use Illuminate\Support\Facades\Auth;

class GoalService
{
    public function getAllGoals()
    {
        return Goal::all();
    }

    public function createGoal($validatedData)
    {
        return Goal::create($validatedData);
    }

    public function getGoalById($goalId)
    {
        return Goal::findOrFail($goalId);
    }

    public function updateGoal(Goal $goal, $validatedData)
    {
        $goal->update($validatedData);
        return $goal;
    }

    public function deleteGoal(Goal $goal)
    {
        return $goal->delete();
    }
}
