<?php

namespace Vibrato\CustomFields;

use Vibrato\Core\Provider;

/**
 * class ThemeCarbonFields
 *
 * @since 1.0.0
 */
final class ThemeCarbonFields extends Provider
{
    private $class_methods;

    public function register(): void
    {
        $this->class_methods = get_class_methods($this);

        foreach ($this->class_methods as $method) {
            add_action('carbon_fields_register_fields', array($this, $method));
        }
    }

    public function theme_options()
    {
        get_template_part('app/CustomFields/ThemeOptions');
    }
}
