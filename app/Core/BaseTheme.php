<?php

namespace Vibrato\Core;

use Vibrato\Core\Bootable;

/**
 * class Theme
 *
 * @since 1.0.0
 */
abstract class BaseTheme
{
    use Bootable;

    /**
     * @since 1.0.0
     */
    abstract protected function register(): void;
}
