<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
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
        $user = Session::get('user');

        if ($user) {
            return match ($user['role']) {
                'Admin'   => redirect()->route('admin.dashboard'),
                'Petugas' => redirect()->route('petugas.dashboard'),
                default   => redirect()->route('login')->withErrors(['role' => 'Role tidak dikenali.']),
            };
        }

        return $next($request);
    }
}
