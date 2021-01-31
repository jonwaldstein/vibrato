<?php

namespace Vibrato\CustomFields;

use Carbon_Fields\Container;
use Carbon_Fields\Field;

Container::make('theme_options', __('Website Settings', 'vibrato'))
    ->add_tab(__('Header'), array(
        Field::make('image', 'site_logo', 'Logo'),
        Field::make('image', 'mobile_logo', 'Mobile Logo')
    ))
    ->add_tab(__('Footer'), array(
        Field::make('textarea', 'footer_copy', 'Footer Copy'),
    ));
