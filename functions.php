<?php

use Vibrato\Theme;

/**
 * Composer Autoload - Using PSR4 with Namespace Roots\vibrato pointing to the lib folder.
 */
if (file_exists(__DIR__ . '/vendor/autoload.php')) {
    require_once __DIR__ . '/vendor/autoload.php';
}


/**
 * Boot Theme class
 */
if (class_exists(Theme::class)) {
    Vibrato\Theme::boot();
}
