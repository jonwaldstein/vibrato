<?php

namespace Vibrato\Core;

use Give\ServiceProviders\ProviderInterface;

/**
 * @since 1.0.0
 */
abstract class Provider implements ProviderInterface
{
    /**
     * Flag if booted
     */
    public bool $booted = false;

    /**
     * Singleton implementation
     *
     * @since 1.0.0
     *
     * @return $this
     */
    public static function instance(): ?Provider
    {
        static $instance = null;

        if ($instance === null) {
            $instance = new static();
        }

        return $instance;
    }

    /**
     * Check if booted
     *
     * @since 1.0.0
     */
    public static function isBooted(): bool
    {
        return static::instance()->booted;
    }

    /**
     * Boot and mark as booted
     *
     * @since 1.0.0
     */
    public static function boot(): void
    {
        if (static::isBooted()) {
            return;
        }

        static::instance()->register();

        static::instance()->booted = true;
    }
}
