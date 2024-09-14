<?php

namespace App\Http\Controllers;

use App\Services\CommunityService;
use App\Http\Resources\GoalGroupResource;

class CommunityController extends Controller
{
    protected $communityService;

    public function __construct(CommunityService $communityService)
    {
        $this->communityService = $communityService;
    }

    // Retrieve the community (groups) for a specific goal
    public function index($goalId)
    {
        $goalGroups = $this->communityService->getCommunityForGoal($goalId);
        return GoalGroupResource::collection($goalGroups);
    }
}
