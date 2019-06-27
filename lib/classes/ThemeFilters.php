<?php
namespace ZGM\Vibrato\Classes;

class ThemeFilters
{
	public function init()
  {
  		add_filter('template_include', ['ZGM\\Vibrato\\Classes\\Wrapper', 'wrap'], 109);
			add_filter('body_class', array($this,'body_class'));
			add_filter('excerpt_more', array($this, 'excerpt_more'));
			add_filter( 'mce_buttons_2', array($this,'custom_tinymce_buttons'));
			add_filter( 'tiny_mce_before_init', array($this,'custom_tinymce_text_sizes'));
			add_filter( 'nav_menu_css_class', array($this,'nav_menu_css_class'), 10, 4 ); 
			add_filter( 'nav_menu_submenu_css_class', array($this,'nav_menu_submenu_css_class'), 10, 4 ); 
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

	public function nav_menu_css_class($classes, $item, $args, $depth){
		//Parent Item Classes
		if ($depth === 0){
			$classes[] = 'relative block lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4 transition-all transition-100';
		//Children Item Classes
		} else {
			$classes[] = 'relative block py-4 px-1 lg:inline-block text-black hover:text-grey transition-all transition-100';
		}
		return $classes;
	}

	public function nav_menu_submenu_css_class($classes, $args, $depth){

		$classes[] = 'relative hidden lg:absolute block bg-white';

		return $classes;
	}
}