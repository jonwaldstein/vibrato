<?php

namespace Vibrato\Classes;

/**
 * class Theme
 *
 * @since 1.0.0
 */
final class Theme
{
    public function add_filters()
    {
        if (class_exists('Vibrato\\Classes\\ThemeFilters')) {
            $Filters = new ThemeFilters();
            $Filters->init();
        }
    }

    public function add_actions()
    {
        if (class_exists('Vibrato\\Classes\\ThemeActions')) {
            $Actions = new ThemeActions();
            $Actions->init();
        }
    }

    public function add_shortcodes()
    {
        //add_shortcode( 'custom_shortcode', array($this, 'custom_shortcode'));
    }

    public function register_custom_taxonomies()
    {
        add_action('init', function () {
            get_template_part('app/callbacks/tax/tax-sectionpage');
        });
    }

    public function register_custom_post_types()
    {
        add_action('init', function () {
            get_template_part('app/callbacks/cpt/cpt-sections');
        }, 0);
    }

    public function register_widgets()
    {
        // $this->widget_recent_posts();

        // add_action( 'widgets_init', function(){
        // 	register_widget( 'widget_recent_posts' );
        // });

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
