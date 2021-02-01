<?php

namespace Vibrato\ValueObjects;

use Closure;
use Spatie\Enum\Enum;

/**
 * @method static self primary()
 * @method static self secondary()
 * @method static self footer()
 */
class Sidebar extends Enum
{
    protected static function labels(): Closure
    {
        return function (string $name): string {
            return ucfirst($name);
        };
    }
}
