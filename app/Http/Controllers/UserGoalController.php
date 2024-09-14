<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserGoalRequest;
use App\Http\Requests\UpdateUserGoalRequest;
use App\Services\UserGoalService;
use App\Models\UserGoal;
use App\Http\Resources\UserGoalResource;

class UserGoalController extends Controller
{
    protected $userGoalService;

    public function __construct(UserGoalService $userGoalService)
    {
        $this->userGoalService = $userGoalService;
    }

    // Retrieve all goals that the user is tracking
    public function index()
    {
        $userGoals = $this->userGoalService->getAllUserGoals();
        return UserGoalResource::collection($userGoals);
    }

    // Assign a goal to the user
    public function store(StoreUserGoalRequest $request, $goalId)
    {
        $userGoal = $this->userGoalService->assignGoalToUser($goalId, $request->status ?? 'not completed');
        return new UserGoalResource($userGoal);
    }

    // Show the user's progress on a specific goal
    public function show(UserGoal $userGoal)
    {
        return new UserGoalResource($userGoal);
    }

    // Update the status of a user's goal
    public function update(UpdateUserGoalRequest $request, UserGoal $userGoal)
    {
        $updatedUserGoal = $this->userGoalService->updateUserGoalStatus($userGoal, $request->status);
        return new UserGoalResource($updatedUserGoal);
    }

    // Unassign (delete) the goal from the user's list
    public function destroy(UserGoal $userGoal)
    {
        $this->userGoalService->deleteUserGoal($userGoal);
        return response()->noContent();
    }

    // Get the progress (status) of a user's goal
    public function progress(UserGoal $userGoal)
    {
        $progress = $this->userGoalService->getUserGoalProgress($userGoal);
        return response()->json(['progress' => $progress]);
    }
}
