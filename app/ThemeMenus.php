<?php

namespace Vibrato;

use Vibrato\Core\Provider;
use Vibrato\ValueObjects\Menu;

/**
 * class ThemeMenus
 *
 * @since 1.0.0
 */
class ThemeMenus extends Provider
{
    public function register(): void
    {
        add_action('after_setup_theme', array($this, 'register_nav_menus'));
        add_filter('nav_menu_css_class', array($this, 'nav_menu_list_item_css_class'), 10, 4);
        add_filter('nav_menu_submenu_css_class', array($this, 'nav_menu_submenu_css_class'), 10, 4);
        add_filter('nav_menu_link_attributes', array($this, 'nav_menu_link_attributes'), 10, 4);
    }

    /**
     * Register nav menus
     */
    public function register_nav_menus()
    {
        // Register wp_nav_menu() menus
        // http://codex.wordpress.org/Function_Reference/register_nav_menus
        register_nav_menus([
            Menu::primary()->value => __('Primary Navigation', 'vibrato'),
            Menu::secondary()->value => __('Secondary Navigation', 'vibrato'),
        ]);
    }


    /**
     * Nav Menu - <li> item </li>
     */
    public function nav_menu_list_item_css_class($classes, $item, $args, $depth)
    {
        // Primary Navigation
        if ($args->theme_location === Menu::primary()->value) {
            // Check for Parent or Children Item Classes
            $classes[] = $depth === 0 ? '' : '';
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
        if ($args->theme_location === Menu::primary()->value) {
            if ($depth === 0) {
                $atts['class'] = $item->current ? 'bg-gray-900 text-white px-3 py-2 rounded-md text-sm font-medium block' : 'text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium block';
            } else {
                $atts['class'] = $item->current ? '' : '';
            }
        }

        // Secondary Navigation
        if ($args->theme_location === Menu::secondary()->value) {
            $atts['class'] = $item->current ? 'block px-4 py-2 text-sm text-gray-900 bg-gray-100 hover:text-gray-900' : 'block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900';

            return $atts;
        }

        // Default Navigation
        if (empty($args->theme_location)){
            $atts['class'] = 'text-sm text-gray-600 hover:text-black hover:underline';
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
