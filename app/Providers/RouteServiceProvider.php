<?php

namespace App\Providers;

use App\Models\Language;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;

class RouteServiceProvider extends ServiceProvider
{
    public const HOME = '/home';

    public function boot(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        $this->routes(function () {
            if (! Schema::hasTable('languages')) {
                Artisan::call('migrate --seed');
            }

            Route::prefix(Language::routePrefix())
                ->group(function () {
                    Route::middleware('web')
                        ->group(base_path('routes/main.php'));

                    Route::middleware('web')
                        ->prefix('admin')->name('admin.')
                        ->group(base_path('routes/admin.php'));
                });


            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));
        });
    }
}
