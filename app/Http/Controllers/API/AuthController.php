<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    
    public function login(LoginRequest $request)
    {
       
        if (!auth()->attempt($request->only('email', 'password'))) {
            return response()->json([
                'message' => 'Invalid credentials',
            ], 401);
        }

        $user = auth()->user();
        $token = $user->createToken('auth_token')->accessToken;

        return response()->json([
            'message' => 'User authenticated successfully',
            'user' => $user,
            'access_token' => $token,
        ]);
    }
    public function logout(): JsonResponse
    {
        $user = Auth::user();
        $user->token()->revoke();
        return response()->json([], 200);
    }
}
