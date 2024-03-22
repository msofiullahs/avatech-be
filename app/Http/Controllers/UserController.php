<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function info()
    {
        $user = Auth::user();
        $role = $user->role;

        return response()->json([
            'user'  => $user,
            'role'  => $role
        ]);
    }

    public function token()
    {
        $auth = Auth::user();
        $user = User::find($auth->id);
        $token = $user->createToken('api')->plainTextToken;

        return response()->json(['token' => $token]);
    }
}
