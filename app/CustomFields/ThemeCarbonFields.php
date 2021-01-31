<?php

namespace Vibrato\CustomFields;

use Vibrato\Core\BaseTheme;

/**
 * class ThemeCarbonFields
 *
 * @since 1.0.0
 */
final class ThemeCarbonFields extends BaseTheme
{
    private $class_methods;

    public function register()
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

    public function front_page()
    {

        get_template_part('app/CustomFields/FrontPage');
    }

    public function bannner()
    {

        get_template_part('app/CustomFields/Banner');
    }

    public function gutenberg()
    {
        get_template_part('app/CustomFields/Gutenberg');
    }
}
