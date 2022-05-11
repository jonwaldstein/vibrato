<?php

namespace Vibrato;

use Vibrato\Core\Provider;
use Vibrato\ValueObjects\Enqueue;

class ThemeEnqueue extends Provider
{
    public function register(): void
    {
        add_action('wp_enqueue_scripts', array($this, 'enqueueScripts'), 100);
    }

    /**
     * Enqueue theme resources
     */
    public function enqueueScripts(): void
    {
        // css
        wp_enqueue_style(Enqueue::themeStyles()->value, Theme::asset_path('css/app.css'), false, null);

        // fonts
        wp_enqueue_style('vibrato/googlefonts', '//fonts.googleapis.com/css?family=Open+Sans:400,500,700', false, null);

        // js
        wp_enqueue_script(Enqueue::themeScripts()->value, Theme::asset_path('js/app.js'), [], null, true);

        // api
        wp_localize_script(Enqueue::themeScripts()->value, 'WPREST', array(
            'root' => esc_url_raw(rest_url()),
            'nonce' => wp_create_nonce('wp_rest'),
            'current_ID' => get_the_ID()
        ));
    }
}
