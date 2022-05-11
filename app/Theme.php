<?php

namespace Vibrato;

use Vibrato\Core\Provider;
use Vibrato\CustomFields\ThemeCarbonFields;
use Vibrato\Helpers\ThemeHelpers;

/**
 * class Theme
 *
 * @since 1.0.0
 */
final class Theme extends Provider
{
    use ThemeHelpers;

    /**
     * @since 1.0.0
     */
    public function register(): void
    {
        $this->enqueueScripts();
        $this->addFilters();
        $this->addActions();
        $this->addThemeSupport();
        $this->registerWidgets();
        $this->registerNavMenus();
        $this->registerCustomTaxonomies();
        $this->registerCustomPostTypes();
        $this->registerCustomFields();
        $this->registerGutenbergScripts();
    }
    /**
     * @since 1.0.0
     */
    private function enqueueScripts(): void
    {
        ThemeEnqueue::boot();
    }

    /**
     * @since 1.0.0
     */
    private function addFilters(): void
    {
        ThemeFilters::boot();
    }

    /**
     * @since 1.0.0
     */
    private function addActions(): void
    {
        ThemeActions::boot();
    }

    /**
     * @since 1.0.0
     */
    private function addThemeSupport(): void
    {
        ThemeSupport::boot();
    }

    /**
     * @since 1.0.0
     */
    private function registerWidgets(): void
    {
        ThemeWidgets::boot();
    }

    /**
     * @since 1.0.0
     */
    private function registerNavMenus(): void
    {
        ThemeMenus::boot();
    }

    /**
     * @since 1.0.0
     */
    private function registerCustomTaxonomies(): void
    {
        add_action('init', static function () {
            //register_taxonomy('', []);
        });
    }

    /**
     * @since 1.0.0
     */
    private function registerCustomPostTypes(): void
    {
        add_action('init', static function () {
            //register_post_type('', []);
        }, 0);
    }

    /**
     * @since 1.0.0
     */
    private function registerCustomFields(): void
    {
        /**
         * Initialize all the Carbon Fields
         */
        add_action('after_setup_theme', function () {
            \Carbon_Fields\Carbon_Fields::boot();
        });

        ThemeCarbonFields::boot();
    }

    /**
     * @since 1.0.0
     */
    private function registerGutenbergScripts(): void
    {
        ThemeGutenberg::boot();
    }
}
