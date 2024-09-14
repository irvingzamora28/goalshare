<?php

namespace App\Http\Controllers;

use App\Services\SubscriptionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{
    protected $subscriptionService;

    public function __construct(SubscriptionService $subscriptionService)
    {
        $this->subscriptionService = $subscriptionService;
    }

    // Subscribe a user to the premium plan
    public function subscribe(Request $request)
    {
        // Validate the request (e.g., payment details) if necessary
        $user = $this->subscriptionService->subscribeUser($request->all());
        return response()->json(['message' => 'Subscription successful', 'user' => $user]);
    }

    // Check the subscription status of the current user
    public function status()
    {
        $status = $this->subscriptionService->checkSubscriptionStatus();
        return response()->json(['subscription_status' => $status]);
    }
}
