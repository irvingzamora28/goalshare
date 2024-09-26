<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;

class AuthService
{
    /**
     * Authenticate user and generate a token
     */
    public function authenticateUser(array $credentials)
    {
        // Attempt to authenticate the user
        if (!Auth::attempt($credentials)) {
            return ['error' => 'Invalid login credentials', 'status' => 401];
        }

        // Generate token for authenticated user
        $user = Auth::user();
        $token = $user->createToken('User Token')->plainTextToken;

        // Return token
        return ['token' => $token, 'status' => 200];
    }
}
