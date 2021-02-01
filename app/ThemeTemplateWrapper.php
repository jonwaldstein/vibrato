<?php

namespace Vibrato;

/**
 * class ThemeTemplateWrapper
 *
 * @since 1.0.0
 *
 * @link https://roots.io/vibrato/docs/theme-wrapper/
 * @link http://scribu.net/wordpress/theme-wrappers.html
 */
class ThemeTemplateWrapper
{
    // Stores the base template directory path to each template
    public static $template_dir = '/resources/views/layout/';

    // Stores the full path to the main template file
    public static $main_template;

    // Basename of template file
    public $slug;

    // Array of templates
    public $templates;

    // Stores the base name of the template file; e.g. 'page' for 'page.php' etc.
    public static $base;

    public function __construct($template = 'base.php')
    {
        $this->slug = basename($template, '.php');
        $this->templates = [self::$template_dir . $template];

        if (self::$base) {
            $str = substr($template, 0, -4);
            array_unshift($this->templates, sprintf($str . '-%s.php', self::$base));
        }
    }

    public function __toString()
    {
        return locate_template($this->templates);
    }

    public static function wrap($main)
    {
        // Check for other filters returning null
        if (!is_string($main)) {
            return $main;
        }

        self::$main_template = $main;
        self::$base = basename(self::$main_template, '.php');

        if (self::$base === 'index') {
            self::$base = false;
        }

        return new self();
    }

    public static function template_path()
    {
        return self::$main_template;
    }

    public static function sidebar_path()
    {
        return new self('templates/sidebar.php');
    }
}
