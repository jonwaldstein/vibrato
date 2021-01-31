<?php

namespace Vibrato\Core;

use Vibrato\Core\Booted;

/**
 * class Theme
 *
 * @since 1.0.0
 */
abstract class BaseTheme
{
    use Booted;

    /**
     * @since 1.0.0
     */
    abstract protected function register();
}
