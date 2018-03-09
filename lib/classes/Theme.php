<?php
namespace Roots\Sage\Classes;


final class Theme
{
	public function add_filters()
	{
		add_filter('template_include', ['Roots\\Sage\\Classes\\Wrapper', 'wrap'], 109);
		add_filter('body_class', array($this,'body_class'));
		add_filter('excerpt_more', array($this, 'excerpt_more'));
	}

	public function add_actions()
	{
		add_action('after_setup_theme', function(){
			$Setup = new Setup();
			$Setup->init();
		});
		add_action('customize_register', array($this,'customize_register') );
		add_action('customize_preview_init', array($this,'customize_preview_js') );
	}

	public function add_shortcodes()
	{

	}

	public function register_custom_post_types()
	{

	}

	public function register_widgets()
	{

	}

	public static function asset_path($filename) {
	  $dist_path = get_template_directory_uri() . '/dist/';
	  $directory = dirname($filename) . '/';
	  $file = basename($filename);
	  static $manifest;

	  if (empty($manifest)) {
	    $manifest_path = get_template_directory() . '/dist/' . 'assets.json';
	    $manifest = new JsonManifest($manifest_path);
	  }

	  if (array_key_exists($file, $manifest->get())) {
	    return $dist_path . $directory . $manifest->get()[$file];
	  } else {
	    return $dist_path . $directory . $file;
	  }
	}

	/**
	 * Page titles
	 */
	public static function title() 
	{
	  if (is_home()) {
	    if (get_option('page_for_posts', true)) {
	      return get_the_title(get_option('page_for_posts', true));
	    } else {
	      return __('Latest Posts', 'sage');
	    }
	  } elseif (is_archive()) {
	    return get_the_archive_title();
	  } elseif (is_search()) {
	    return sprintf(__('Search Results for %s', 'sage'), get_search_query());
	  } elseif (is_404()) {
	    return __('Not Found', 'sage');
	  } else {
	    return get_the_title();
	  }
	}

	/**
	 * Add <body> classes
	 */
	public function body_class($classes)
	{
	  // Add page slug if it doesn't exist
	  if (is_single() || is_page() && !is_front_page()) {
	    if (!in_array(basename(get_permalink()), $classes)) {
	      $classes[] = basename(get_permalink());
	    }
	  }

	  // Add class if sidebar is active
	  if (Setup::display_sidebar()) {
	    $classes[] = 'sidebar-primary';
	  }

	  return $classes;
	}

	/**
	 * Clean up the_excerpt()
	 */
	public function excerpt_more()
	{
	  return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'sage') . '</a>';
	}

	/**
	 * Add postMessage support
	 */
	public function customize_register($wp_customize) {
	  $wp_customize->get_setting('blogname')->transport = 'postMessage';
	}


	/**
	 * Customizer JS
	 */
	public function customize_preview_js() {
	  wp_enqueue_script('sage/customizer', Theme::asset_path('scripts/customizer.js'), ['customize-preview'], null, true);
	}
}