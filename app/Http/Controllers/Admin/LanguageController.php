<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SaveLanguageRequest;
use App\Models\Language;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class LanguageController extends Controller
{
    public function index(): View
    {
        return view('admin.languages.index', [
            'languages' => Language::all(),
        ]);
    }

    public function create(): View
    {
        return view('admin.languages.create', [
            'language' => new Language,
        ]);
    }

    public function store(SaveLanguageRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        Language::query()->create($validated);

        return to_route('admin.languages.index');
    }

    public function edit(Language $language): View
    {
        return view('admin.languages.edit', [
            'language' => $language,
        ]);
    }

    public function update(SaveLanguageRequest $request, Language $language): RedirectResponse
    {
        $validated = $request->validated();

        $language->update(array_merge($validated, [
            'active' => $validated['active'] ?? false,
            'default' => $validated['default'] ?? false,
            'fallback' => $validated['fallback'] ?? false,
        ]));

        return to_route('admin.languages.index');
    }

    public function destroy(Language $language): RedirectResponse
    {
        $language->delete();

        return back();
    }
}
