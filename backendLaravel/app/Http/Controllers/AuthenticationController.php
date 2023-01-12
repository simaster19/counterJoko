<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthenticationController extends Controller
{
    public function login(Request $request)
    {
        //dd("OK");
        $request->validate([
            'role' => 'required',
            'username' => 'required',
            'password' => 'required'
        ]);

        $role = User::where('role', $request->role)->first();
        $user = User::where('username', $request->username)->first();

        if (!$user || !$role || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }
        return $user->createToken('userLogin')->plainTextToken;
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
    }
}
