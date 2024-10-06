<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function createUser(Request $request)
    {
        $user = User::create($request->all());
        return $request->all();
    }

    function register(Request $request)
    {
        $user = User::create($request->all());
        return $user;
    }
    function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return response()->json(['message' => 'User Not Found'], 401);
        }

        if (Hash::check($request->password, $user->password)) {
            // Creating a token without scopes...
            $token = $user->createToken('Token Name')->accessToken;

            return response()->json([
                'user' => $user,
                'token' => $token,
            ], 200);
        } else {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }
    }
}
