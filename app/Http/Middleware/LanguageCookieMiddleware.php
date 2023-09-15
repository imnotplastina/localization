<?php

namespace App\Http\Middleware;

use App\Models\Language;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LanguageCookieMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $id = $request->cookie('language');

        if(is_null($id)) {
            return $next($request);
        }

        if(app()->isLocale($id)) {
            return $next($request);
        }

        $language = Language::getActive()
            ->where('id', $id);

        $language && app()->setLocale($id);

        return $next($request);
    }
}
