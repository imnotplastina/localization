<?php

namespace App\Http\Middleware;

use App\Models\Language;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LanguageHeaderMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $languages = Language::query()
            ->where('active', true)
            ->get();

        $preferredLanguage = $request->getPreferredLanguage(
            $languages->pluck('id')->toArray()
        );

        $preferredLanguage && app()->setLocale($preferredLanguage);

        return $next($request);
    }
}
