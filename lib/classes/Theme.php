<?php
namespace ZGM\Vibrato\Classes;


final class Theme
{
	public function add_filters()
	{
		if (class_exists('ZGM\\Vibrato\\Classes\\ThemeFilters')){
			$Filters = new ThemeFilters();
			$Filters->init();
		}
	}

	public function add_actions()
	{
		if (class_exists('ZGM\\Vibrato\\Classes\\ThemeActions')){
			$Actions = new ThemeActions();
			$Actions->init();
		}
		if (class_exists('ZGM\\Vibrato\\Classes\\Setup')){
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
			//get_template_part('lib/callbacks/tax/tax-sectionpage');
		});
	}

	public function register_custom_post_types()
	{
		add_action( 'init', function(){
			//get_template_part('lib/callbacks/cpt/cpt-sections');
		}, 0 );
	}

	public function register_widgets()
	{
		// $this->widget_recent_posts();

		// add_action( 'widgets_init', function(){
		// 	register_widget( 'widget_recent_posts' );
		// });

	}

	public function acf()
	{

			$this->acf_add_options_page();

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

	private function acf_add_options_page()
	{
		if( function_exists('acf_add_options_page') ) {
			
			acf_add_options_page(array(
				'page_title' 	=> 'Theme General Settings',
				'menu_title'	=> 'Theme Settings',
				'menu_slug' 	=> 'theme-general-settings',
				'capability'	=> 'edit_posts',
				'redirect'		=> false
			));
			
			// acf_add_options_sub_page(array(
			// 	'page_title' 	=> 'Theme Header Settings',
			// 	'menu_title'	=> 'Header',
			// 	'parent_slug'	=> 'theme-general-settings',
			// ));
			
			// acf_add_options_sub_page(array(
			// 	'page_title' 	=> 'Theme Footer Settings',
			// 	'menu_title'	=> 'Footer',
			// 	'parent_slug'	=> 'theme-general-settings',
			// ));
			
		}
	}
}