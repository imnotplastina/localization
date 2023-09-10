<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class LanguageController extends Controller
{
    public function __invoke(Language $language): RedirectResponse
    {
        abort_unless($language->id, 404);

        $cookie = Cookie::forever('language', $language->id);

        return back()->withCookie($cookie);
    }
}
