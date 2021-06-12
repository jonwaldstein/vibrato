<?php

/**
 * Composer Autoload - Using PSR4 with Namespace Roots\vibrato pointing to the lib folder.
 */
if (file_exists(dirname(__FILE__) . '/vendor/autoload.php')) {
    require_once dirname(__FILE__) . '/vendor/autoload.php';
}


/**
 * Boot Theme class
 */
if (class_exists('Vibrato\\Theme')) {
    Vibrato\Theme::boot();
}
