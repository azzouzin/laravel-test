<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Role;
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
            $token = $user->createToken("auth_token");

            return response()->json([
                'user' => $user,
                'token' => $token->plainTextToken,
            ], 200);
        } else {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }
    }

    function deleteUser($id)
    {
        $user = User::find($id);
        $user->delete();
        return $user;
    }

    function attachRole(Request $request)
    {
        // Assuming you have a user and role
        $user = User::find(102);
        $role = Role::find(2);

        // Attach a role to the user
        $user->roles()->syncWithoutDetaching($role->id);
        return response()->json($user->roles->toArray());
    }
}
