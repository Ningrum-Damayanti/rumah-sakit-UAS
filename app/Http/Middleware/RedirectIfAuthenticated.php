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
     */
    public function handle(Request $request, Closure $next, ...$guards): Response
    {
        $guards = empty($guards) ? ['web'] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $user = Auth::guard($guard)->user();

                // Arahkan berdasarkan role
                return match ($user->role) {
                    'admin' => redirect()->route('dashboard'),
                    'user' => redirect()->route('user.dashboard'),
                    'dokter' => redirect()->route('jadwal-dokter.index'),
                    default => abort(403, 'Role tidak dikenali'),
                };
            }
        }

        return $next($request);
    }
}
