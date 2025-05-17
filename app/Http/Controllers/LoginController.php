<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
            'email'    => 'required|email',
            'password' => 'required|string',
            'role'     => 'required|in:admin,petugas',
        ]);

        $user = User::where('email', $request->email)
                    ->where('role', $request->role)
                    ->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);

            // Redirect berdasarkan role
            if ($user->role === 'Admin') {
                return redirect()->route('admin.dashboard');
            } elseif ($user->role === 'Petugas') {
                return redirect()->route('petugas.antrian');
            }

            // Fallback jika role tidak dikenali
            Auth::logout();
            return back()->withErrors(['role' => 'Role tidak dikenali.']);
        }

        return back()->withErrors([
            'email' => 'Email, password, atau role tidak sesuai.',
        ])->withInput();
    }

    public function destroy(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
