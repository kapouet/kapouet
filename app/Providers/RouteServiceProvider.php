<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    public const HOME = '/';

    public function boot(): void
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::prefix(config('admin.prefix', 'admin'))
                ->middleware('web')
                ->namespace($this->namespace)
                ->as('admin::')
                ->group(base_path('routes/admin/web.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->as('admin::')
                ->group(base_path('routes/front/web.php'));
        });
    }

    protected function configureRateLimiting(): void
    {
        RateLimiter::for(
            'api',
            static fn(Request $request) => Limit::perMinute(60)->by(optional($request->user())->id ?: $request->ip())
        );
    }
}
