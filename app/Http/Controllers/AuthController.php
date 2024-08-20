<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(LoginRequest $request): Object
    {
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => [__('auth.failed')],
            ]);
        }

        return response()->json([
            'status' => true,
            'user' => $user,
            'token' =>$user->createToken('auth_')->plainTextToken,
            'token_type'=>'Bearer'
        ], 200);
    }

    public function logout(Request $request): Object
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json(['status'=>true, 'message' => __('auth.logout_success')], 200);
    }
}
