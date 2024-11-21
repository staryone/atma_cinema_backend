<?php

namespace App\Http\Controllers;

use App\Models\User;
use Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'fullName' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'dateOfBirth' => 'required|date',
            'phoneNumber' => 'required|string|max:15',
        ]);

        $user = User::create([
            'userID' => User::generateUserID(),
            'fullName' => $request->fullName,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'dateOfBirth' => $request->dateOfBirth,
            'registrationDate' => now(),
            'gender' => 'Undefined',
            'phoneNumber' => $request->phoneNumber,
            'profilePicture' => null,
        ]);

        $token = $user->createToken('authToken')->plainTextToken;

        return response()->json([
            'userID' => $user->userID,
            'fullName' => $user->fullName,
            'email' => $user->email,
            'token' => $token,
        ], 201);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        $token = $user->createToken('authToken')->plainTextToken;

        return response()->json([
            'userID' => $user->userID,
            'fullName' => $user->fullName,
            'email' => $user->email,
            'token' => $token,
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Logged out successfully']);
    }

    public function profile(Request $request)
    {
        return response()->json($request->user());
    }
}
