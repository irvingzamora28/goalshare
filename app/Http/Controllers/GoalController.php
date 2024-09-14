<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGoalRequest;
use App\Http\Requests\UpdateGoalRequest;
use App\Services\GoalService;
use App\Models\Goal;
use App\Http\Resources\GoalResource;

class GoalController extends Controller
{
    protected $goalService;

    public function __construct(GoalService $goalService)
    {
        $this->goalService = $goalService;
    }

    public function index()
    {
        $goals = $this->goalService->getAllGoals();
        return GoalResource::collection($goals);
    }

    public function store(StoreGoalRequest $request)
    {
        $goal = $this->goalService->createGoal($request->validated());
        return new GoalResource($goal);
    }

    public function show($goalId)
    {
        $goal = $this->goalService->getGoalById($goalId);
        return new GoalResource($goal);
    }

    public function update(UpdateGoalRequest $request, Goal $goal)
    {
        $updatedGoal = $this->goalService->updateGoal($goal, $request->validated());
        return new GoalResource($updatedGoal);
    }

    public function destroy(Goal $goal)
    {
        $this->goalService->deleteGoal($goal);
        return response()->noContent();
    }
}
