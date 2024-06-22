<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    public function __invoke(LoginRequest $request)
    {
        if(auth()->attempt($request->only('email', 'password'))) {
            $user = auth()->user();
            $token = $user->createToken('api_token')->plainTextToken;
            return response()->json([
                'message' => 'Login successful',
                'token' => $token,
                'user' => $user
            ], 200);
            return response()->json(auth()->user(), 200);
        }else {
            return response()->json([
                'message' => 'Invalid login details',
            ], 422);
        }
    }
}
