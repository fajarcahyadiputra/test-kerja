<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register()
    {
        $field = request()->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => "required|string|confirmed"
        ]);
        $field['password'] = bcrypt($field['password']);
        $user = User::create($field);
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'status' => 'success',
            'statusCode' => 201,
            'user' => $user,
            'token' => $token,
            'token_type' => 'Bearer'
        ], 201);
    }
    public function login()
    {
        $field = request()->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);
        //check email
        $user = User::where('email', $field['email'])->first();
        if (!$user || !Hash::check($field['password'], $user->password)) {
            return response()->json([
                'status' => 'error',
                'statusCode' => 401,
                'message' => 'bed creds'
            ], 401);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'status' => 'success',
            'statusCode' => 200,
            'user' => $user,
            'token' => $token,
            'token_type' => 'Bearer'
        ], 200);
    }
    public function logout()
    {
        auth()->user()->tokens()->delete();
        return response()->json([
            'status' => 'success',
            'statusCode' => 200,
            'message' => 'Success logout'
        ], 200);
    }
}
