<?php

namespace App\Services;

use App\Models\UserGoal;
use Illuminate\Support\Facades\Auth;

class UserGoalService
{
    public function getAllUserGoals()
    {
        // Retrieve all goals assigned to the authenticated user
        return UserGoal::where('user_id', Auth::id())->get();
    }

    public function assignGoalToUser($goalId, $status = 'not completed')
    {
        // Assign a goal to the authenticated user
        return UserGoal::create([
            'user_id' => Auth::id(),
            'goal_id' => $goalId,
            'status'  => $status,
            'start_date' => now(),
        ]);
    }

    public function updateUserGoalStatus(UserGoal $userGoal, $status)
    {
        // Update the status of the user's goal
        $userGoal->update(['status' => $status]);
        return $userGoal;
    }

    public function deleteUserGoal(UserGoal $userGoal)
    {
        // Unassign (delete) the user's goal
        return $userGoal->delete();
    }

    public function getUserGoalProgress(UserGoal $userGoal)
    {
        // Get the progress (status) of a specific user's goal
        return $userGoal->status;
    }
}
