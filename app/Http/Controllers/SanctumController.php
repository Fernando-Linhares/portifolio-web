<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;

class SanctumController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
     
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        $token =  $user->createToken($request->email)->plainTextToken;

        return response()->json(['token'=> $token]);
    }

    public function abort(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'login aborted successfully'], 200);
    }
}
