<?php

namespace Give\ServiceProviders;

/**
 *
 * @since 1.0.0
 */
interface ProviderInterface
{
    /**
     * @since 1.0.0
     */
    public function register(): void;

    /**
     * @since 1.0.0
     */
    public static function boot(): void;
}
