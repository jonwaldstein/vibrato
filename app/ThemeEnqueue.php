<?php

namespace Vibrato;

use Vibrato\Core\BaseTheme;

class ThemeEnqueue extends BaseTheme
{
    protected function register(): void
    {
        add_action('wp_enqueue_scripts', array($this, 'enqueue_scripts'), 100);
    }

    /**
     * Enqueue theme resources
     */
    function enqueue_scripts()
    {
        // css
        wp_enqueue_style('vibrato/css', Theme::asset_path('css/app.css'), false, null);

        // fonts
        wp_enqueue_style('vibrato/googlefonts', '//fonts.googleapis.com/css?family=Open+Sans:400,500,700', false, null);

        // js
        wp_enqueue_script('vibrato/js', Theme::asset_path('js/app.js'), [], null, true);

        // gutenberg
        wp_register_script(
            'vibrato/js-blocks',
            Theme::asset_path('js/app.js'),
            //$asset_file['dependencies'],
            //$asset_file['version']
        );

        // gutenberg
        register_block_type('vibrato/block', array(
            'api_version' => 2,
            'editor_script' => 'gutenberg-examples-01-esnext',
        ));

        // api
        wp_localize_script('vibrato/js', 'WPREST', array(
            'root' => esc_url_raw(rest_url()),
            'nonce' => wp_create_nonce('wp_rest'),
            'current_ID' => get_the_ID()
        ));
    }
}
