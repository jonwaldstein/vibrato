<?php

namespace Vibrato;

use Vibrato\Core\BaseTheme;
use Vibrato\ValueObjects\Sidebar;

class ThemeWidgets extends BaseTheme
{
    protected function register()
    {
        add_action('widgets_init', array($this, 'register_sidebars'));
    }

    /**
     * Register sidebars
     */
    public function register_sidebars()
    {
        register_sidebar([
            'name'          => __(Sidebar::primary()->label, 'vibrato'),
            'id'            => Sidebar::primary()->value,
            'before_widget' => '<section class="widget %1$s %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h3>',
            'after_title'   => '</h3>'
        ]);

        register_sidebar([
            'name'          => __(Sidebar::footer()->label, 'vibrato'),
            'id'            => Sidebar::footer()->value,
            'before_widget' => '<section>',
            'after_widget'  => '</section>',
            'before_title'  => '<h4 class="text-md font-semibold tracking-wide text-gray-900 mb-2">',
            'after_title'   => '</h4>'
        ]);
    }
}
