<?php

namespace Vibrato;

use Vibrato\Core\BaseTheme;
use Vibrato\ValueObjects\Enqueue;

class ThemeGutenberg extends BaseTheme
{
    protected function register(): void
    {
        add_action('init', array($this, 'register_scripts'));
        add_action('init', array($this, 'register_styles'));
        add_action('init', array($this, 'register_blocks'));
    }

    /**
     * Register gutenberg scripts
     */
    public function register_scripts()
    {
        $asset_file = include_once(get_template_directory() . '/public/js/blocks.asset.php');

        wp_register_script(
            Enqueue::blockScripts()->value,
            Theme::asset_path('js/blocks.js'),
            $asset_file['dependencies'],
            $asset_file['version']
        );
    }

    /**
     * Register gutenberg styles
     */
    public function register_styles()
    {
        wp_register_style(
            Enqueue::blockStyles()->value,
            Theme::asset_path('css/blocks.css'),
            array(),
            filemtime(get_template_directory() . '/public/css/blocks.css')
        );
    }

    /**
     * Register gutenberg blocks
     */
    public function register_blocks()
    {
        register_block_type(Enqueue::blockScripts()->value, array(
            'editor_script' => Enqueue::blockScripts()->value,
            'style' => Enqueue::blockStyles()->value,
        ));
    }
}
