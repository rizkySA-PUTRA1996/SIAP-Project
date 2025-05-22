<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class LoginApiController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $login = Auth::attempt($credentials);
        if ($login) {
            $user = Auth::user();

            if (!$user instanceof User) {
                return response()->json([
                    'response_code' => 500,
                    'message' => 'User object is not valid'
                ]);
            }

            $user->remember_token = Str::random(100);
            $user->save();

            return response()->json([
                'response_code' => 200,
                'message' => 'Login Berhasil',
                'content' => $user
            ]);
        }else{
            return response()->json([
                'response_code' => 404,
                'message' => 'email atau Password Tidak Ditemukan!'
            ]);
        }
    }
}
