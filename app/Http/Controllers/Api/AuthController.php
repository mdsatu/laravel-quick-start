<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:back_api')->except('login');
    }

    // Login
    public function login(Request $request){
        $request->validate([
            'email' => 'required|email|exists:admins,email',
            'password' => 'required'
        ]);

        if (Auth::guard('back')->attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::guard('back')->user();

            $token = $user->createToken($user->email . '-back-' . now());

            return response()->json([
                'token' => $token->accessToken
            ]);
        }

        return response()->json([
            'message' => 'Email or password wrong.'
        ]);
    }

    // Logout
    public function logout(Request $request){
        $request->user()->token()->revoke();
        return response()->json([
            'status' => true
        ]);
    }
}
