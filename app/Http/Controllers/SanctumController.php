<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SanctumController extends Controller
{
    public function create(Request $request)
    {
        $token = $request->user()->createToken($request->token_name);

        return response()->json(['token'=> $token]);
    }

    public function abort(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
    }
}
