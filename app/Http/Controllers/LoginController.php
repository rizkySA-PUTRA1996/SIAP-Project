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
            'email'    => 'required|string|email',
            'password' => 'required|string',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);
            $request->session()->regenerate();

            return match ($user->role) {
                'Admin' => redirect()->route('admin.stokObat.index'),
                'Petugas' => redirect()->route('petugas.antrian'),
                default => redirect()->route('login')->withErrors(['role' => 'Role tidak dikenali.']),
            };
            // Fallback jika role tidak dikenali
            Auth::logout();
            return back()->withErrors(['role' => 'Role tidak dikenali.']);
        }

        return back()->withErrors([
            'email' => 'email atau password tidak sesuai.',
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
