<?php

namespace App\Providers;

use App\Models\Language;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

/**
 * @method app()
 */
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
        if (Schema::hasTable((new Language())->getTable())) {
            $this->setDefaultLocale();
            $this->setFallbackLocale();
        }
    }

    private function setDefaultLocale(): void
    {
        $defaultLanguage = Language::getDefault();

        $defaultLanguage && $this->app->setLocale($defaultLanguage->id);
    }

    private function setFallbackLocale(): void
    {
        $fallbackLanguage = Language::getFallback();

        $fallbackLanguage && $this->app->setFallbackLocale($fallbackLanguage->id);
    }
}
