<?php

namespace App\Http\Middleware;

use App\Models\Language;
use Closure;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;

class LanguageRouteMiddleware
{
    private ?string $prefix;
    private string $currentLanguage;
    private string $defaultLanguage;

    public function __construct()
    {
        $this->prefix = Language::routePrefix();
        $this->currentLanguage = app()->getLocale();
        $this->defaultLanguage = Language::getDefault()->id;
    }

    /**
     * Processes the request and determines whether the user should be redirected to another page
     * based on the selected language. If the current language matches the default language,
     * then the function checks for the presence of a prefix in the URL. If there is no prefix,
     * then the request is passed on for processing. Otherwise, you will be redirected to another page.
     * If the current language does not match the prefix, then the request is also passed on for processing.
     * In other cases, a redirection occurs to another page.
     */
    public function handle(Request $request, Closure $next): RedirectResponse|Response
    {
        if ($this->currentLanguage === $this->defaultLanguage) {
            if (is_null($this->prefix)) {
                return $next($request);
            }

            return $this->redirect($request);
        }

        if ($this->prefix === $this->currentLanguage) {
            return $next($request);
        }

        return $this->redirect($request);
    }

    private function redirect(Request $request): RedirectResponse|Response
    {
        $url = $this->currentLanguage;

        if ($this->currentLanguage === $this->defaultLanguage) {
            $url = '';
        }

        $segments = $request->segments();

        $this->prefix && array_shift($segments);

        if ($path = implode('/', $segments)) {
            $url .= "/{$path}";
        }

        if ($query = $request->getQueryString()) {
            $url .= "?{$query}";
        }

        return redirect($url);
    }
}
