<?php

namespace Vibrato\Classes;

/**
 * class ThemeActions
 *
 * @since 1.0.0
 */
class ThemeActions
{
    public function init()
    {
        if (class_exists('Vibrato\\Classes\\Setup')) {
            $Setup = new Setup();
            $Setup->init();
        }
        if (class_exists('Vibrato\\Classes\\ThemeWidgets')) {
            $ThemeWidgets = new ThemeWidgets();
            $ThemeWidgets->init();
        }
    }
}
