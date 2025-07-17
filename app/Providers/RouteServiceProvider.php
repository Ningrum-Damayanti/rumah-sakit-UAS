<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Default redirect route (fallback).
     */
    public const HOME = '/dashboard';

    /**
     * Tentukan redirect sesuai role user
     */
    public static function redirectTo()
    {
        $user = auth()->user();

        return match ($user->role) {
            'admin' => '/admin/dashboard',
            'dokter' => '/dokter/dashboard',
            'user' => '/user/dashboard',
            default => self::HOME,
        };
    }

    /**
     * Register routes.
     */
    public function boot(): void
    {
        $this->routes(function () {
            Route::middleware('web')
                ->group(base_path('routes/web.php'));

            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));
        });
    }
}
