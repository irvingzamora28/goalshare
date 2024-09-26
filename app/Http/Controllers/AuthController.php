<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AuthService;

class AuthController extends Controller
{
    protected $authService;

    // Inject AuthService into the controller
    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    /**
     * Login and generate a token for the user
     */
    public function generateToken(Request $request)
    {
        // Validate the request data
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Call the service to authenticate the user
        $response = $this->authService->authenticateUser($credentials);

        // Return response with the appropriate status code
        return response()->json(['message' => $response['token'] ?? $response['error']], $response['status']);
    }
}
