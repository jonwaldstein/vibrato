<?php
/**
 * Sage includes
 *
 * The $sage_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/roots/sage/pull/1042
 */
use Roots\Sage\Classes\ThemeCarbonFields;
use Roots\Sage\Classes\Theme;


$sage_includes = [
  'lib/assets.php',    // Scripts and stylesheets
  'lib/extras.php',    // Custom functions
  'lib/setup.php',     // Theme setup
  'lib/titles.php',    // Page titles
  'lib/wrapper.php',   // Theme wrapper class
  'lib/customizer.php', // Theme customizer
  'lib/classes/BootstrapNavwalker.php', // NavWalker Class
  'lib/classes/Theme.php', // Theme Class
  'lib/classes/ThemeCarbonFields.php', //Theme Carbon Fields Class
];

foreach ($sage_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);


/**
 * Initialize all Theme Functions
 */
if ( class_exists( 'Roots\\Sage\\Classes\\Theme' ) ) {
  $Theme = new Theme();
  $Theme->add_filters();
  $Theme->add_actions();
  $Theme->register_custom_post_types();
  $Theme->add_shortcodes();
  $Theme->register_widgets();
}


/**
 * Initialize all the Carbon Fields
 */
if ( class_exists( 'Roots\\Sage\\Classes\\ThemeCarbonFields' ) ) {

  add_action( 'after_setup_theme', function(){
    // Require once the Composer Autoload
    if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
      require_once dirname( __FILE__ ) . '/vendor/autoload.php';
      \Carbon_Fields\Carbon_Fields::boot();
    }
  });

  $ThemeCarbonFields = new ThemeCarbonFields();
  $ThemeCarbonFields->register_fields();
}