<?php

namespace Vibrato;

use Vibrato\Core\BaseTheme;

class ThemeGutenberg extends BaseTheme
{
    protected function register(): void
    {
        add_action('init', array($this, 'register_scripts'));
        add_action('init', array($this, 'register_blocks'));
    }

    /**
     * Register gutenberg scripts
     */
    public function register_scripts()
    {
        $asset_file = include_once(get_template_directory() . '/public/js/blocks.asset.php');

        // gutenberg
        wp_register_script(
            'vibrato/blocks',
            Theme::asset_path('js/blocks.js'),
            $asset_file['dependencies'],
            $asset_file['version']
        );
    }

    /**
     * Register gutenberg blocks
     */
    public function register_blocks()
    {
        // blocks
        register_block_type('vibrato/blocks', array(
            'editor_script' => 'vibrato/blocks',
        ));
    }
}
