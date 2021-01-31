<?php

namespace Vibrato\Classes;


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
        if (class_exists('Vibrato\\Classes\\Setup')) {
            $Setup = new Setup();
            $Setup->init();
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

    /**
     * Like get_template_part() put lets you pass args to the template file
     * Args are available in the template as $template_args array
     * @param string filepart
     * @param mixed wp_args style argument list
     */
    public static function get_template_part($file, $template_args = array(), $cache_args = array())
    {
        $template_args = wp_parse_args($template_args);
        $cache_args = wp_parse_args($cache_args);
        if ($cache_args) {
            foreach ($template_args as $key => $value) {
                if (is_scalar($value) || is_array($value)) {
                    $cache_args[$key] = $value;
                } else if (is_object($value) && method_exists($value, 'get_id')) {
                    $cache_args[$key] = call_user_method('get_id', $value);
                }
            }
            if (($cache = wp_cache_get($file, serialize($cache_args))) !== false) {
                if (!empty($template_args['return']))
                    return $cache;
                echo $cache;
                return;
            }
        }
        $file_handle = $file;
        do_action('start_operation', 'get_template_part::' . $file_handle);
        if (file_exists(get_stylesheet_directory() . '/' . $file . '.php'))
            $file = get_stylesheet_directory() . '/' . $file . '.php';
        elseif (file_exists(get_template_directory() . '/' . $file . '.php'))
            $file = get_template_directory() . '/' . $file . '.php';
        ob_start();
        $return = require($file);
        $data = ob_get_clean();
        do_action('end_operation', 'get_template_part::' . $file_handle);
        if ($cache_args) {
            wp_cache_set($file, $data, serialize($cache_args), 3600);
        }
        if (!empty($template_args['return']))
            if ($return === false)
                return false;
            else
                return $data;
        echo $data;
    }
}
