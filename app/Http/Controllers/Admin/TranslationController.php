<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Translation\SaveTranslationRequest;
use App\Models\Language;
use App\Models\Translation;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TranslationController extends Controller
{
    public function index(Request $request): View
    {
        $translations = Translation::query()
            ->filter($request->all())
            ->latest()->paginate(21);

        return view('admin.translations.index', [
            'translations' => $translations,
        ]);
    }

    public function create(): View
    {
        return view('admin.translations.create', [
            'translation' => new Translation,
        ]);
    }

    public function edit(Translation $translation): View
    {
        return view('admin.translations.edit',
            compact('translation'));
    }

    public function store(SaveTranslationRequest $request): RedirectResponse
    {
        Translation::query()
            ->create($request->validated());

        return to_route('admin.translations.index');
    }

    public function update(SaveTranslationRequest $request, Translation $translation): RedirectResponse
    {
        $translation->update($request->validated());

        return to_route('admin.translations.index');
    }

    public function destroy(Translation $translation): RedirectResponse
    {
        $translation->delete();

        return to_route('admin.translations.index');
    }
}
