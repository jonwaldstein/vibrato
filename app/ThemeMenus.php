<?php

namespace Vibrato;

use Vibrato\Core\BaseTheme;
use Vibrato\ValueObjects\Menu;

/**
 * class ThemeMenus
 *
 * @since 1.0.0
 */
class ThemeMenus extends BaseTheme
{
    protected function register()
    {
        add_action('after_setup_theme', array($this, 'register_nav_menus'));
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

}
