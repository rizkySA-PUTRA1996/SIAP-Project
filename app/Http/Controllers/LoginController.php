<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /**
     * Display the login view.
     */
    public function index(): View
    {
        return view('login');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        // Login ke backend API
        $response = Http::post('https://ti054a04.agussbn.my.id/api/login', [
            'email' => $request->email,
            'password' => $request->password,
        ]);

        if ($response->successful()) {
            $data = $response->json();
            $token = $data['token'];

            Session::put('token', $token);

            $userResponse = Http::withToken($token)->get('https://ti054a04.agussbn.my.id/api/user');

            if ($userResponse->successful()) {
                $user = $userResponse->json();
                Session::put('user', $user);

                return match ($user['role']) {
                    'Admin' => redirect()->route('admin.dashboard'),
                    'Petugas' => redirect()->route('petugas.dashboard'),
                    default => redirect()->route('login')->withErrors(['role' => 'Role tidak dikenali.']),
                };
            }

            return redirect()->route('login')->withErrors([
                'login' => 'Gagal mengambil data user dari API.',
            ]);
        }

        return back()->withErrors([
            'email' => 'Email atau password tidak valid.',
        ])->withInput();
    }
}
