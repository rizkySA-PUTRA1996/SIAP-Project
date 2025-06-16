<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserApiController extends Controller
{
    public function index(): JsonResponse
    {
        try {
            $users = User::all();

            return response()->json([
                'status'  => true,
                'message' => 'Data semua user',
                'data'    => UserResource::collection($users),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status'  => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage(),
                'data'    => [],
            ], 500);
        }
    }

    public function show($id): JsonResponse
    {
        try {
            $user = User::findOrFail($id);

            return response()->json([
                'status'  => true,
                'message' => 'Data user ditemukan',
                'data'    => new UserResource($user),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status'  => false,
                'message' => 'User tidak ditemukan',
                'error'   => $e->getMessage(),
            ], 404);
        }
    }
}
