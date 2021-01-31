<?php

namespace Vibrato;

final class ThemeCarbonFields
{

    private $class_methods;


    public function register_fields()
    {

        $this->class_methods = get_class_methods($this);

        foreach ($this->class_methods as $method) {
            add_action('carbon_fields_register_fields', array($this, $method));
        }
    }

    public function theme_options()
    {

        get_template_part('app/callbacks/fields/ThemeOptions');
    }

    public function front_page()
    {

        get_template_part('app/callbacks/fields/FrontPage');
    }

    public function bannner()
    {

        get_template_part('app/callbacks/fields/Banner');
    }

    public function gutenberg()
    {
        get_template_part('app/callbacks/fields/Gutenberg');
    }
}