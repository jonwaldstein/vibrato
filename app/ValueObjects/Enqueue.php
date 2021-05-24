<?php

namespace Vibrato\ValueObjects;

use Spatie\Enum\Enum;

/**
 * @method static self themeScripts()
 * @method static self themeStyles()
 * @method static self blockScripts()
 * @method static self blockStyles()
 */
class Enqueue extends Enum
{
    protected static function values(): array
    {
        return [
            'themeScripts' => 'vibrato/js',
            'themeStyles' => 'vibrato/css',
            'blockScripts' => 'vibrato/js-blocks',
            'blockStyles' => 'vibrato/css-blocks',
        ];
    }
}
