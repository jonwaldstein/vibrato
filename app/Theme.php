<?php

namespace Vibrato;

use Vibrato\Core\BaseTheme;
use Vibrato\CustomFields\ThemeCarbonFields;
use Vibrato\Helpers\ThemeHelpers;

/**
 * class Theme
 *
 * @since 1.0.0
 */
final class Theme extends BaseTheme
{
    use ThemeHelpers;

    protected function register()
    {
        $this->setup();
        $this->add_filters();
        $this->add_actions();
        $this->register_widgets();
        $this->register_custom_taxonomies();
        $this->register_custom_post_types();
        $this->register_custom_fields();
    }

    protected function setup()
    {
        ThemeSetup::boot();
    }

    protected function add_filters()
    {
        ThemeFilters::boot();
    }

    protected function add_actions()
    {
        ThemeActions::boot();
    }

    protected function register_widgets()
    {
        ThemeWidgets::boot();
    }

    protected function register_custom_taxonomies()
    {
        add_action('init', function () {
            //register_taxonomy('', []);
        });
    }

    protected function register_custom_post_types()
    {
        add_action('init', function () {
            //register_post_type('', []);
        }, 0);
    }

    protected function register_custom_fields()
    {
        /**
         * Initialize all the Carbon Fields
         */
        add_action('after_setup_theme', function () {
            \Carbon_Fields\Carbon_Fields::boot();
        });

        ThemeCarbonFields::boot();
    }
}
