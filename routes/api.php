<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function () {
    // Goal Management Routes
    Route::get('/goals', [GoalController::class, 'index']);
    Route::post('/goals', [GoalController::class, 'store']);
    Route::get('/goals/{goal}', [GoalController::class, 'show']);
    Route::put('/goals/{goal}', [GoalController::class, 'update']);
    Route::delete('/goals/{goal}', [GoalController::class, 'destroy']);

    // User Goal Management
    Route::post('/goals/{goal}/assign', [UserGoalController::class, 'assign']);
    Route::put('/goals/{goal}/status', [UserGoalController::class, 'updateStatus']);
    Route::get('/goals/{goal}/progress', [UserGoalController::class, 'progress']);
    Route::get('/user/goals', [UserGoalController::class, 'userGoals']);
    Route::delete('/goals/{goal}/unassign', [UserGoalController::class, 'unassign']);

    // Community Features (Premium)
    Route::middleware('premium')->group(function () {
        Route::get('/community/{goal_id}', [CommunityController::class, 'index']);
        Route::get('/community/{goal_id}/message-board', [MessageBoardController::class, 'show']);
        Route::post('/community/{goal_id}/message-board', [MessageController::class, 'store']);
        Route::get('/community/{goal_id}/messages', [MessageController::class, 'index']);
    });

    // Subscription Routes
    Route::post('/subscribe', [SubscriptionController::class, 'subscribe']);
    Route::get('/subscription/status', [SubscriptionController::class, 'status']);
});
