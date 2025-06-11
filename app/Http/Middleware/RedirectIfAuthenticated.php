<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next):Response
    {
        $user = Auth::user();

        if ($user) {
            if ($user->role === 'Admin') {
                return redirect()->route('admin.stokObat');
            } elseif ($user->role === 'Petugas') {
                return redirect()->route('petugas.antrian');
            }

            // Jika role tidak dikenali, logout
            Auth::logout();
            return redirect()->route('login')->withErrors(['role' => 'Role tidak dikenali.']);
        }

        return $next($request);
    }
}
