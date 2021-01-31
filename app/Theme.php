<?php

namespace Vibrato;

use Vibrato\Core\BaseTheme;
use Vibrato\CustomFields\ThemeCarbonFields;

/**
 * class Theme
 *
 * @since 1.0.0
 */
final class Theme extends BaseTheme
{
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

    public static function wp_loop(string $page_template): void
    {
        while (have_posts()) : the_post();

            get_template_part($page_template);

        endwhile;
    }

    /**
     *
     * This allows us to use our views folder for default wp templates
     *
     * @since 1.0.0
     */
    public static function get_default_template(): void
    {
        $template_dir = 'resources/views/';

        if (is_home()) {
            $template = $template_dir . 'home';
        } else if (is_404()) {
            $template = $template_dir . '404';
        } else if (is_single()) {
            $template = $template_dir . 'single';
        } else if (is_archive()) {
            $template = $template_dir . 'archive';
        } else {
            $template = $template_dir . get_post_type();
        }

        get_template_part($template);
    }
}
