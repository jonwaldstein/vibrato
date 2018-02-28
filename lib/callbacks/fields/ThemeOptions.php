<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

Container::make( 'theme_options', __( 'Theme Options', 'sage' ) )
    ->add_tab( __('Header'), array(
        Field::make( 'image', 'site_logo', 'Logo' )
            ->set_value_type( 'url' ),
        Field::make( 'image', 'mobile_logo', 'Mobile Logo' )
            ->set_value_type( 'url' )
    ))
    ->add_tab( __('Footer'), array(
        Field::make( 'textarea', 'footer_copy', 'Footer Copy' ),
    ));