<?php

namespace Vibrato;

use Vibrato\CustomFields\ThemeCarbonFields;
use Vibrato\Traits\Booted;

/**
 * class Theme
 *
 * @since 1.0.0
 */
final class Theme
{
    use Booted;

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

    public static function asset_path($filename)
    {
        $public_path = get_template_directory_uri() . '/public/';
        $directory = dirname($filename) . '/';
        $file = basename($filename);

        return $public_path . $directory . $file;
    }

    /**
     * Page titles
     */
    public static function title()
    {
        if (is_home()) {
            if (get_option('page_for_posts', true)) {
                return get_the_title(get_option('page_for_posts', true));
            } else {
                return __('Latest Posts', 'vibrato');
            }
        } elseif (is_archive()) {
            return get_the_archive_title();
        } elseif (is_search()) {
            return sprintf(__('Search Results for %s', 'vibrato'), get_search_query());
        } elseif (is_404()) {
            return __('Not Found', 'vibrato');
        } else {
            return get_the_title();
        }
    }
}
