<?php

namespace Vibrato;

use Vibrato\Core\BaseTheme;
use Vibrato\ValueObjects\Menu;

/**
 * class ThemeFilters
 *
 * @since 1.0.0
 */
class ThemeFilters extends BaseTheme
{
    protected function register()
    {
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
        if ($args->theme_location === Menu::primary()->value) {
            // Check for Parent or Children Item Classes
            $classes[] = $depth === 0 ? '' : '' ;
        // Default Navigation
        } else {
            // Check for Parent or Children Item Classes
            $classes[] = $depth === 0 ? '' : '';
        }
        return $classes;
    }

    /**
     * Nav Menu - <a> item </a>
     */
    public function nav_menu_link_attributes($atts, $item, $args, $depth)
    {
        // Primary Navigation
        if ($args->theme_location !== Menu::primary()->value){
            $atts['class'] = $item->current ? 'block px-4 py-2 text-sm text-gray-900 bg-gray-100 hover:text-gray-900' : 'block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900';

            return $atts;
        }

        // Primary Navigation
        if ($depth === 0) {
            $atts['class'] = $item->current ? 'bg-gray-900 text-white px-3 py-2 rounded-md text-sm font-medium block' : 'text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium block';
        } else {
            $atts['class'] = $item->current ? '' : '';
        }

        return $atts;
    }

    /**
     * Nav Sub Menu - <ul> </ul>
     */
    public function nav_menu_submenu_css_class($classes, $args, $depth)
    {
        // Primary Navigation
        if ($args->theme_location === Menu::primary()->value) {
            $classes[] = '';
        // Default Navigation
        } else {
            $classes[] = '';
        }

        return $classes;
    }
}
