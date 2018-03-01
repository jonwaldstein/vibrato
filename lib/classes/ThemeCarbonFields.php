<?php

namespace Roots\Sage\Classes;

use Carbon_Fields\Container;
use Carbon_Fields\Field;

final class ThemeCarbonFields
{

	private $class_methods;


	public function register_fields()
	{

		$this->class_methods = get_class_methods($this);

		foreach($this->class_methods as $method){
			add_action('carbon_fields_register_fields', array($this, $method));
		}

	}

	public function theme_options()
	{

		get_template_part('lib/callbacks/fields/ThemeOptions');

	}
	
	public function front_page()
	{

		get_template_part('lib/callbacks/fields/FrontPage');
		
	}

	public function bannner()
	{

		get_template_part('lib/callbacks/fields/Banner');
		
	}

}