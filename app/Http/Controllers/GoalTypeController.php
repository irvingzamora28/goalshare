<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGoalTypeRequest;
use App\Services\GoalTypeService;
use App\Models\GoalType;
use App\Http\Resources\GoalTypeResource;

class GoalTypeController extends Controller
{
    protected $goalTypeService;

    public function __construct(GoalTypeService $goalTypeService)
    {
        $this->goalTypeService = $goalTypeService;
    }

    // Retrieve all goal types
    public function index()
    {
        $goalTypes = $this->goalTypeService->getAllGoalTypes();
        return GoalTypeResource::collection($goalTypes);
    }

    // Create a new goal type
    public function store(StoreGoalTypeRequest $request)
    {
        $goalType = $this->goalTypeService->createGoalType($request->validated());
        return new GoalTypeResource($goalType);
    }

    // Show a specific goal type
    public function show($goalTypeId)
    {
        $goalType = $this->goalTypeService->getGoalTypeById($goalTypeId);
        return new GoalTypeResource($goalType);
    }

    // Delete a specific goal type
    public function destroy(GoalType $goalType)
    {
        $this->goalTypeService->deleteGoalType($goalType);
        return response()->noContent();
    }
}
