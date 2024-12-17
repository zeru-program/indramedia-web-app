<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // Pastikan pengguna sudah login
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Ambil role pengguna
        $userRole = Auth::user()->role;

        // Periksa apakah role pengguna termasuk dalam daftar yang diizinkan
        if (!in_array($userRole, $roles)) {
            abort(403, 'Unauthorized');
        }

        return $next($request);
    }
}
