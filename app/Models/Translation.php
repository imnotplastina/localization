<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Validation\ValidationException;
use Spatie\TranslationLoader\LanguageLine;

class Translation extends LanguageLine
{
    /**
     * @throws ValidationException
     */
    public function scopeFilter(Builder $query, array $filter = []): Builder
    {
        $validated = validator($filter, [
            'group' => ['nullable', 'string', 'max:50'],
            'key' => ['nullable', 'string', 'max:50'],
            'text' => ['nullable', 'string', 'max:100'],
        ])->validate();

        if ($group = $validated['group'] ?? null) {
            $query->where(compact('group'));
        }

        if ($key = $validated['key'] ?? null) {
            $query->where(compact('key'));
        }

        if ($text = $validated['text'] ?? null) {
            $query->where('text', 'ilike', "%{$text}%");
        }

        return $query;
    }
}
