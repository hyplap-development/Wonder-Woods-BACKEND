<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppAuthController extends Controller
{
    //

    public function login(Request $request)
    {
        return response()->json([
            'status' => 200,
            'message' => 'Login Success',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            // $token = $user->createToken('token')->accessToken;
            return response()->json([
                'status' => 200,
                'message' => 'Login Success',
                // 'token' => $token,
            ]);
        } else {
            return response()->json([
                'status' => 201,
                'message' => 'Login Failed',
            ]);
        }
    }
}
