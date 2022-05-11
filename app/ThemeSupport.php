<?php

namespace Vibrato;

use Vibrato\Core\Provider;

class ThemeSupport extends Provider
{
    public function register(): void
    {
        add_action('after_setup_theme', array($this, 'add_theme_support'));
    }

    /**
     * Theme setup
     */
    public function add_theme_support()
    {
        // Make theme available for translation
        // Community translations can be found at https://github.com/roots/sage-translations
        load_theme_textdomain('vibrato', get_template_directory() . '/lang');

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support(
            'custom-logo',
            array(
                'height'      => 190,
                'width'       => 190,
                'flex-width'  => false,
                'flex-height' => false,
            )
        );

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
        add_theme_support('title-tag');

        /*
     * Enable support for Post Thumbnails on posts and pages.
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
        add_theme_support('post-thumbnails');
        set_post_thumbnail_size(1568, 9999);
        add_image_size('logo', '', 100, false);

        /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
        add_theme_support(
            'html5',
            array(
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
            )
        );

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support(
            'custom-logo',
            array(
                'height'      => 190,
                'width'       => 190,
                'flex-width'  => false,
                'flex-height' => false,
            )
        );

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        // Add support for Block Styles.
        add_theme_support('wp-block-styles');

        // Add support for full and wide align images.
        add_theme_support('align-wide');

        // Add support for editor styles.
        add_theme_support('editor-styles');

        // Enqueue editor styles.
        add_editor_style('style-editor.css');

        // Add custom editor font sizes.
        add_theme_support(
            'editor-font-sizes',
            array(
                array(
                    'name'      => __('Small', 'vibrato'),
                    'shortName' => __('S', 'vibrato'),
                    'size'      => 19.5,
                    'slug'      => 'small',
                ),
                array(
                    'name'      => __('Normal', 'vibrato'),
                    'shortName' => __('M', 'vibrato'),
                    'size'      => 22,
                    'slug'      => 'normal',
                ),
                array(
                    'name'      => __('Large', 'vibrato'),
                    'shortName' => __('L', 'vibrato'),
                    'size'      => 36.5,
                    'slug'      => 'large',
                ),
                array(
                    'name'      => __('Huge', 'vibrato'),
                    'shortName' => __('XL', 'vibrato'),
                    'size'      => 49.5,
                    'slug'      => 'huge',
                ),
            )
        );

        // Editor color palette.
        add_theme_support(
            'editor-color-palette',
            array(
                array(
                    'name'  => __('Primary', 'vibrato'),
                    'slug'  => 'primary',
                    'color' => '#333',
                ),
                array(
                    'name'  => __('White', 'vibrato'),
                    'slug'  => 'white',
                    'color' => '#FFF',
                ),
            )
        );

        // Add support for responsive embedded content.
        add_theme_support('responsive-embeds');

        //Some blocks can have padding controls.
        add_theme_support('custom-spacing');

        // In addition to pixels, users can use other units to define sizes, paddings…
        // The available units are: px, em, rem, vh, vw.
        add_theme_support('custom-units', 'rem');

        //remove_theme_support('core-block-patterns');

        // @see https://developer.wordpress.org/themes/functionality/custom-headers/
        add_theme_support('custom-header', [
            // Display the header text along with the image
            'header-text' => true,
            // Header text color default
            'default-text-color' => '000',
            // Header image width (in pixels)
            'width' => 1000,
            // Header image height (in pixels)
            'height' => 198,
            ]
        );
    }
}
