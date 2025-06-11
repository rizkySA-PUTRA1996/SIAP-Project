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

        if (!Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'Login gagal',
            ], 401);
        }

        $user = User::where('email', $request->email)->first();

        $token = $user->createToken('API Token')->plainTextToken;

        return response()->json([
            'message' => 'Login berhasil',
            'token' => $token
        ]);
    }

    public function logout(Request $request)
    {
        $user = $request->user();

        if ($user) {
            $user->tokens()->delete(); // Menghapus semua token aktif
            return response()->json([
                'response_code' => 200,
                'message' => 'Logout berhasil.'
            ]);
        }

        return response()->json([
            'response_code' => 401,
            'message' => 'User tidak ditemukan atau belum login.'
        ]);
    }
}
