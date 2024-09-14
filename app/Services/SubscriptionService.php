<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SubscriptionService
{
    public function subscribeUser(array $validatedData): User
    {
        /** @var User $user */
        $user = Auth::user();

        // Update subscription status
        $user->subscription_status = 'premium';

        // Save the updated user data
        $user->save();

        return $user;
    }

    public function checkSubscriptionStatus(): string
    {
        /** @var User $user */
        $user = Auth::user();

        return $user->subscription_status;
    }
}
