<?php
namespace Roots\Sage\Classes;


final class Theme
{
	public function add_filters()
	{
		if (class_exists('Roots\\Sage\\Classes\\ThemeFilters')){
			$Filters = new ThemeFilters();
			$Filters->init();
		}
	}

	public function add_actions()
	{
		if (class_exists('Roots\\Sage\\Classes\\ThemeActions')){
			$Actions = new ThemeActions();
			$Filters->init();
		}
		if (class_exists('Roots\\Sage\\Classes\\Setup')){
			$Setup = new Setup();
			$Setup->init();
		}
	}

	public function add_shortcodes()
	{
		//add_shortcode( 'custom_shortcode', array($this, 'custom_shortcode'));
	}

	public function register_custom_taxonomies()
	{
		add_action( 'init', function(){
			get_template_part('lib/callbacks/tax/tax-sectionpage');
		});
	}

	public function register_custom_post_types()
	{
		add_action( 'init', function(){
			get_template_part('lib/callbacks/cpt/cpt-sections');
		}, 0 );
	}

	public function register_widgets()
	{
		// $this->widget_recent_posts();

		// add_action( 'widgets_init', function(){
		// 	register_widget( 'widget_recent_posts' );
		// });

	}

	public static function asset_path($filename) {
	  $dist_path = get_template_directory_uri() . '/dist/';
	  $directory = dirname($filename) . '/';
	  $file = basename($filename);
	  return $dist_path . $directory . $file;
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
	* Page Builder
	*/
	public static function page_builder($current_post_id = '')
	{
		include(locate_template('templates/page-builder.php'));
	}
}