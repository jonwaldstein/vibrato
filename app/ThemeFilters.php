<?php

namespace Vibrato;

use Vibrato\Traits\Booted;

/**
 * class ThemeFilters
 *
 * @since 1.0.0
 */
class ThemeFilters
{
    use Booted;

    public $primary_navs = ['primary_navigation'];

    protected function register()
    {
        add_filter('template_include', ['Vibrato\\ThemeTemplateWrapper', 'wrap'], 109);
        add_filter('body_class', array($this, 'body_class'));
        add_filter('excerpt_more', array($this, 'excerpt_more'));
        add_filter('mce_buttons_2', array($this, 'custom_tinymce_buttons'));
        add_filter('tiny_mce_before_init', array($this, 'custom_tinymce_text_sizes'));
        add_filter('nav_menu_css_class', array($this, 'nav_menu_css_class'), 10, 4);
        add_filter('nav_menu_submenu_css_class', array($this, 'nav_menu_submenu_css_class'), 10, 4);
        add_filter('nav_menu_link_attributes', array($this, 'nav_menu_link_attributes'), 10, 4);
    }

    /**
     * Add <body> classes
     */
    public function body_class($classes)
    {
        // Add page slug if it doesn't exist
        if (is_single() || is_page() && !is_front_page()) {
            if (!in_array(basename(get_permalink()), $classes)) {
                $classes[] = basename(get_permalink());
            }
        }

        // Add class if sidebar is active
        if (ThemeSetup::display_sidebar()) {
            $classes[] = 'sidebar-primary';
        }

        return $classes;
    }

    /**
     * Clean up the_excerpt()
     */
    public function excerpt_more()
    {
        return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'sage') . '</a>';
    }

    /**
     * Enable font size & font family selects in the editor
     */
    public function custom_tinymce_buttons($buttons)
    {
        array_unshift($buttons, 'fontselect'); // Add Font Select
        array_unshift($buttons, 'fontsizeselect'); // Add Font Size Select
        return $buttons;
    }

    /**
     * Enable font size & font family selects in the editor
     */
    public function custom_tinymce_text_sizes($initArray)
    {
        $initArray['fontsize_formats'] = "12px 14px 16px 18px 24px 28px 32px 36px";
        $initArray['font_formats'] = 'Roboto=Roboto;';
        $initArray['theme_advanced_disable'] = 'underline,spellchecker,wp_help';
        //$initArray['textcolor_map'] = 'ffffff,02253b,a58343,c29b50,a0b0b5,5f828b,393b44,474a53,6a6c7e,83848d';
        return $initArray;
    }


    /**
     * Nav Menu - <li> item </li>
     */
    public function nav_menu_css_class($classes, $item, $args, $depth)
    {

        // Primary Navigation
        if (in_array($args->theme_location, $this->primary_navs)) {
            //Parent Item Classes
            if ($depth === 0) {
                $classes[] = 'relative block lg:inline-block lg:mt-0 mr-4';
                //Children Item Classes
            } else {
                $classes[] = 'relative block text-black hover:text-grey';
            }
        } else {
            //Parent Item Classes
            if ($depth === 0) {
                $classes[] = 'relative block lg:inline-block lg:mt-0 mr-4';
                //Children Item Classes
            } else {
                $classes[] = 'relative block text-black hover:text-grey';
            }
        }
        return $classes;
    }

    /**
     * Nav Menu - <a> item </a>
     */
    public function nav_menu_link_attributes($atts, $item, $args, $depth)
    {
        // Primary Navigation
        if (in_array($args->theme_location, $this->primary_navs)) {
            if ($depth === 0) {
                $atts['class'] = 'inline-block text-sm text-teal-200 hover:text-white';
                if ($item->current) {
                    $atts['class'] = 'inline-block text-sm text-gray-800 hover:text-black';
                }
            } else {
                $atts['class'] = 'block px-4 py-2 text-gray-800 hover:bg-black hover:text-white text-sm';
                if ($item->current) {
                    $atts['class'] = 'block px-4 py-2 text-gray-800 hover:bg-black hover:text-white text-sm underline';
                }
            }
        } else {
            if ($depth === 0) {
                $atts['class'] = 'inline-block text-sm text-teal-200 hover:text-white';
                if ($item->current) {
                    $atts['class'] = 'inline-block text-sm text-gray-800 hover:text-black';
                }
            } else {
                $atts['class'] = 'block px-4 py-2 text-gray-800 hover:bg-black hover:text-white text-sm';
                if ($item->current) {
                    $atts['class'] = 'block px-4 py-2 text-gray-800 hover:bg-black hover:text-white text-sm underline';
                }
            }
        }

        return $atts;
    }

    /**
     * Nav Sub Menu - <ul> </ul>
     */
    public function nav_menu_submenu_css_class($classes, $args, $depth)
    {
        // Primary Navigation
        if (in_array($args->theme_location, $this->primary_navs)) {
            $classes[] = 'relative hidden lg:absolute block bg-white w-64 right-0 bg-white shadow-sm';
        } else {
            $classes[] = 'relative hidden lg:absolute block bg-white w-64 right-0 bg-white shadow-sm';
        }

        return $classes;
    }
}
