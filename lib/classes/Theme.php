<?php
namespace Roots\Sage\Classes;


final class Theme
{
	public function add_filters()
	{
		add_filter('template_include', ['Roots\\Sage\\Classes\\Wrapper', 'wrap'], 109);
		add_filter('body_class', array($this,'body_class'));
		add_filter('excerpt_more', array($this, 'excerpt_more'));
		add_filter( 'mce_buttons_2', array($this,'custom_tinymce_buttons'));
		add_filter( 'tiny_mce_before_init', array($this,'custom_tinymce_text_sizes'));
	}

	public function add_actions()
	{
		if (class_exists('Roots\\Sage\\Classes\\Setup')){
			$Setup = new Setup();
			$Setup->init();
		}
		add_action('customize_register', array($this,'customize_register') );
		add_action('customize_preview_init', array($this,'customize_preview_js') );
	}

	public function add_shortcodes()
	{
		//add_shortcode( 'custom_shortcode', array($this, 'custom_shortcode'));
	}

	public function register_custom_taxonomies()
	{
		add_action( 'init', function(){
			get_template_part('lib/callbacks/ct/ct-sectionpage');
		});
	}

	public function register_custom_post_types()
	{
		add_action( 'init', function(){
			//get_template_part('lib/callbacks/cpt/cpt-post');
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

	/**
	* Page Builder
	*/
	public static function page_builder($current_post_id = '')
	{
		include(locate_template('templates/page-builder.php'));
	}

	/**
	* Enable font size & font family selects in the editor
	*/
	public function custom_tinymce_buttons( $buttons ) {
		array_unshift( $buttons, 'fontselect' ); // Add Font Select
		array_unshift( $buttons, 'fontsizeselect' ); // Add Font Size Select
		return $buttons;
	}

/**
	* Enable font size & font family selects in the editor
	*/
	public function custom_tinymce_text_sizes($initArray){
		$initArray['fontsize_formats'] = "12px 14px 16px 18px 24px 28px 32px 36px";
		$initArray['font_formats'] = 'Roboto=Roboto;';
		$initArray['theme_advanced_disable'] = 'underline,spellchecker,wp_help';
		//$initArray['textcolor_map'] = 'ffffff,02253b,a58343,c29b50,a0b0b5,5f828b,393b44,474a53,6a6c7e,83848d';
		return $initArray;
	}
}