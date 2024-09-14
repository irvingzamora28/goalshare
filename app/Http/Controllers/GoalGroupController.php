<?php

namespace App\Http\Controllers;

use App\Services\GoalGroupService;
use App\Models\GoalGroup;
use App\Http\Resources\GoalGroupResource;

class GoalGroupController extends Controller
{
    protected $goalGroupService;

    public function __construct(GoalGroupService $goalGroupService)
    {
        $this->goalGroupService = $goalGroupService;
    }

    // Retrieve all goal groups
    public function index()
    {
        $goalGroups = $this->goalGroupService->getAllGoalGroups();
        return GoalGroupResource::collection($goalGroups);
    }

    // Show a specific goal group
    public function show($goalGroupId)
    {
        $goalGroup = $this->goalGroupService->getGoalGroupById($goalGroupId);
        return new GoalGroupResource($goalGroup);
    }

    // Delete a specific goal group
    public function destroy(GoalGroup $goalGroup)
    {
        $this->goalGroupService->deleteGoalGroup($goalGroup);
        return response()->noContent();
    }
}
