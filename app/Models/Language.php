<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

/**
 * @property int $id
 * @property string $name
 *
 * @property bool $active
 * @property bool $default
 * @property bool $fallback
 */
class Language extends Model
{
    protected $keyType = 'string';

    public $incrementing = false;

    protected $fillable = [
        'id', 'name',
        'active', 'default', 'fallback',
    ];

    protected $casts = [
        'active' => 'boolean',
        'default' => 'boolean',
        'fallback' => 'boolean',
    ];

    public static function booted(): void
    {
        self::saved(function (self $language) {
            Cache::forget('languages');
        });
    }

    public function getStateText(): string
    {
        $state = [];

        if ($this->active) {
            $state[] = 'Активный';
        }

        if ($this->default) {
            $state[] = 'По-умолчанию';
        }

        if ($this->fallback) {
            $state[] = 'Резервный';
        }

        return implode(', ', $state);
    }

    public static function getDefault(): ?Language
    {
        return Language::getActive()
            ->firstWhere('default', true);
    }

    public static function getFallback(): ?Language
    {
        return Language::getActive()
            ->firstWhere('fallback', true);
    }

    public static function getActive(): Collection
    {
        return Cache::remember(
            key: 'languages',
            ttl: now()->addDay(),
            callback: function () {
                return self::query()
                    ->where('active', true)
                    ->get();
            }
        );
    }

    public static function routePrefix(): ?string
    {
        $prefix = request()->segment(1);

        $activeLanguages = Language::query()
            ->where('active', true)
            ->get();

        if($activeLanguages->doesntContain('id', $prefix)) {
            $prefix = null;
        }

        return $prefix;
    }
}
