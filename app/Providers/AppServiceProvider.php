<?php

namespace App\Providers;

use App\Models\Language;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $language = Language::query()
            ->where('active', true)
            ->where('default', true)
            ->first();

        $language && $this->app->setLocale($language->id);
    }
}
