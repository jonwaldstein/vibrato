<?php

namespace Vibrato;

use Vibrato\Core\Provider;
use Vibrato\ValueObjects\Enqueue;

class ThemeGutenberg extends Provider
{
    public function register(): void
    {
        add_action('init', array($this, 'register_scripts'));
        add_action('init', array($this, 'registerStyles'));
        add_action('init', array($this, 'registerBlocks'));
    }

    /**
     * Register gutenberg scripts
     */
    public function register_scripts(): void
    {
        $asset_file = include(get_template_directory() . '/public/js/blocks.asset.php');

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
    public function registerStyles(): void
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
    public function registerBlocks(): void
    {
        register_block_type(Enqueue::blockScripts()->value, array(
            'editor_script' => Enqueue::blockScripts()->value,
            'style' => Enqueue::blockStyles()->value,
        ));
    }
}
