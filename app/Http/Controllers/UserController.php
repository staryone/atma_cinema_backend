<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Hash;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Storage;

class UserController extends Controller
{

    // public function redirectToGoogle()
    // {
    //     return Socialite::driver('google')->stateless()->redirect();
    // }

    public function handleGoogleCallback(Request $request)
    {
        try {
            $googleUser = $request;
            $user = User::where('email', $googleUser->email)->first();

            if (!$user) {
                $user = User::create([
                    'userID' => User::generateUserID(),
                    'fullName' => $googleUser->name,
                    'email' => $googleUser->email,
                    'password' => Hash::make('google_login'),
                    'dateOfBirth' => now(),
                    'registrationDate' => now(),
                    'gender' => 'Undefined',
                    'phoneNumber' => '+621818181818',
                    'profilePicture' => $googleUser->profilePicture,
                ]);
            }

            $token = $user->createToken('authToken')->plainTextToken;

            return response()->json([
                'userID' => $user->userID,
                'fullName' => $user->fullName,
                'email' => $user->email,
                'token' => $token,
            ]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Google Login failed: ' . $e->getMessage()], 500);
        }
    }
    public function register(Request $request)
    {
        $request->validate([
            'fullName' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'dateOfBirth' => 'required|string',
            'phoneNumber' => 'required|string|max:15',
        ]);

        $request['dateOfBirth'] = Carbon::createFromFormat('d/m/Y', $request['dateOfBirth'])->format('Y-m-d');

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

        return response()->json([
            'userID' => $user->userID,
            'fullName' => $user->fullName,
            'email' => $user->email,
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
        if ($request->user()->profilePicture != null) {
            $request->user()->profilePicture = Storage::disk('s3')->temporaryUrl(
                $request->user()->profilePicture,
                now()->addHours(2)
            );
        }

        return response()->json($request->user());
    }

    public function updateProfile(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'fullName' => 'nullable|string|max:255',
            'email' => 'nullable|email|unique:users,email,' . $user->userID . ',userID',
            'dateOfBirth' => 'nullable|string',
            'gender' => 'nullable|in:Undefined,Male,Female',
            'phoneNumber' => 'nullable|string|max:15',
            'profilePicture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:4096',
        ]);

        if ($request->has('fullName') && $request->fullName != $user->fullName) {
            $user->fullName = $request->fullName;
        }
        if ($request->has('email') && $request->email != $user->email) {
            $user->email = $request->email;
        }
        if ($request->has('gender') && $request->gender != $user->gender) {
            $user->gender = $request->gender;
        }


        if ($request->has('dateOfBirth')) {
            $request['dateOfBirth'] = Carbon::createFromFormat('d/m/Y', $request['dateOfBirth'])->format('Y-m-d');
            if ($request->dateOfBirth != $user->dateOfBirth) {
                $user->dateOfBirth = $request->dateOfBirth;
            }
        }
        if ($request->has('phoneNumber') && $request->phoneNumber != $user->phoneNumber) {
            $user->phoneNumber = $request->phoneNumber;
        }

        if ($request->hasFile('profilePicture')) {
            if ($user->profilePicture) {
                \Storage::disk('s3')->delete($user->profilePicture);
            }

            $path = $request->file('profilePicture')->store('profile_pictures', 's3');
            $user->profilePicture = $path;
        }

        $user->save();

        return response()->json([
            'message' => 'Profile updated successfully',
            'user' => $user,
        ]);
    }

}
