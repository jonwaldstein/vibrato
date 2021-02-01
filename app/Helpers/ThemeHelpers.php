<?php

namespace Vibrato\Helpers;

use Vibrato\Theme;

/**
 * class ThemeHelpers
 *
 * @since 1.0.0
 */
trait ThemeHelpers
{
    /**
     * Get the path to the public folder
     *
     * @since 1.0.0
     */
    public static function asset_path($filename): string
    {
        $public_path = get_template_directory_uri() . '/public/';
        $directory = dirname($filename) . '/';
        $file = basename($filename);

        return $public_path . $directory . $file;
    }

    /**
     * Page titles
     *
     * @since 1.0.0
     */
    public static function title(): string
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

    /**
     * Simple WP Loop helper with addition of get_template_part
     *
     * @since 1.0.0
     */
    public static function wp_loop(string $page_template): void
    {
        while (have_posts()) : the_post();

            self::get_template_part($page_template);

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

        if (is_front_page()) {
            $template = $template_dir . 'front-page';
        } else if (is_home()) {
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

    /**
     * Simple navigation helper
     *
     * @since 1.0.0
     */
    public static function display_navigation(string $navigation_name, ?string $menu_class = 'menu'): void
    {
        if (has_nav_menu($navigation_name)) {
            wp_nav_menu([
                'theme_location'  => $navigation_name,
                'menu_class' => $menu_class,
            ]);
        }
    }

    /**
     * Display logo using the native wp customizer logo field
     *
     * @since 1.0.0
     */
    public static function display_logo(): void
    {
        if (!has_custom_logo()){
            echo '<image class="h-16 w-auto" src=' . Theme::asset_path('images/wp-logo.png') . ' />';
        }

        echo wp_get_attachment_image(get_theme_mod('custom_logo'), 'full', false, ['class' => 'h-8 w-auto']);
    }

    /**
     * make it easier to get resources folder
     *
     * @since 1.0.0
     */
    public static function get_template_part(string $slug, ?string $name = null, ?array $args = []): void
    {
        get_template_part('resources/views/' . $slug, $name, $args);
    }
}
