<?php

namespace Vibrato;

use Vibrato\Traits\Booted;

class ThemeWidgets
{
    use Booted;

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
            'name'          => __('Primary', 'vibrato'),
            'id'            => 'sidebar-primary',
            'before_widget' => '<section class="widget %1$s %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h3>',
            'after_title'   => '</h3>'
        ]);

        register_sidebar([
            'name'          => __('Footer', 'vibrato'),
            'id'            => 'sidebar-footer',
            'before_widget' => '<section class="widget %1$s %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h4>',
            'after_title'   => '</h4>'
        ]);

        register_sidebar([
            'name'          => __('Footer Column 1', 'vibrato'),
            'id'            => 'footer-column-1',
            'before_widget' => '<section class="widget %1$s %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h4>',
            'after_title'   => '</h4>'
        ]);

        register_sidebar([
            'name'          => __('Footer Column 2', 'vibrato'),
            'id'            => 'footer-column-2',
            'before_widget' => '<section class="widget %1$s %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h4>',
            'after_title'   => '</h4>'
        ]);

        register_sidebar([
            'name'          => __('Footer Column 3', 'vibrato'),
            'id'            => 'footer-column-3',
            'before_widget' => '<section class="widget %1$s %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h4>',
            'after_title'   => '</h4>'
        ]);

        register_sidebar([
            'name'          => __('Footer Copyright', 'vibrato'),
            'id'            => 'footer-copyright',
            'before_widget' => '<section class="widget %1$s %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h4>',
            'after_title'   => '</h4>'
        ]);
    }
}
