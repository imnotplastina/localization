<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
}
