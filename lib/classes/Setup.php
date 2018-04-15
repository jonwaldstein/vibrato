<?php
namespace Roots\Sage\Classes;

class Setup
{

  public function init()
  {
    add_action('after_setup_theme', array($this,'setup') );
    add_action('widgets_init', array($this,'widgets_init') );
    add_action('wp_enqueue_scripts', array($this,'assets'), 100);
  }
  /**
   * Theme setup
   */
  public function setup()
  {
    // Enable features from Soil when plugin is activated
    // https://roots.io/plugins/soil/
    add_theme_support('soil-clean-up');
    add_theme_support('soil-nav-walker');
    add_theme_support('soil-nice-search');
    add_theme_support('soil-jquery-cdn');
    add_theme_support('soil-relative-urls');

    // Make theme available for translation
    // Community translations can be found at https://github.com/roots/sage-translations
    load_theme_textdomain('sage', get_template_directory() . '/lang');

    // Enable plugins to manage the document title
    // http://codex.wordpress.org/Function_Reference/add_theme_support#Title_Tag
    add_theme_support('title-tag');

    // Register wp_nav_menu() menus
    // http://codex.wordpress.org/Function_Reference/register_nav_menus
    register_nav_menus([
      'primary_navigation' => __('Primary Navigation', 'sage')
    ]);

    // Enable post thumbnails
    // http://codex.wordpress.org/Post_Thumbnails
    // http://codex.wordpress.org/Function_Reference/set_post_thumbnail_size
    // http://codex.wordpress.org/Function_Reference/add_image_size
    add_theme_support('post-thumbnails');

    // Enable post formats
    // http://codex.wordpress.org/Post_Formats
    add_theme_support('post-formats', ['aside', 'gallery', 'link', 'image', 'quote', 'video', 'audio']);

    // Enable HTML5 markup support
    // http://codex.wordpress.org/Function_Reference/add_theme_support#HTML5
    add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);

    // Use main stylesheet for visual editor
    // To add custom styles edit /assets/styles/layouts/_tinymce.scss
    add_editor_style(Theme::asset_path('styles/main.css'));
  }

  /**
   * Register sidebars
   */
  public function widgets_init() 
  {
    register_sidebar([
      'name'          => __('Primary', 'sage'),
      'id'            => 'sidebar-primary',
      'before_widget' => '<section class="widget %1$s %2$s">',
      'after_widget'  => '</section>',
      'before_title'  => '<h3>',
      'after_title'   => '</h3>'
    ]);

    register_sidebar([
      'name'          => __('Footer', 'sage'),
      'id'            => 'sidebar-footer',
      'before_widget' => '<section class="widget %1$s %2$s">',
      'after_widget'  => '</section>',
      'before_title'  => '<h4>',
      'after_title'   => '</h4>'
    ]);

    register_sidebar([
      'name'          => __('Footer Column 1', 'sage'),
      'id'            => 'footer-column-1',
      'before_widget' => '<section class="widget %1$s %2$s">',
      'after_widget'  => '</section>',
      'before_title'  => '<h4>',
      'after_title'   => '</h4>'
    ]);

    register_sidebar([
      'name'          => __('Footer Column 2', 'sage'),
      'id'            => 'footer-column-2',
      'before_widget' => '<section class="widget %1$s %2$s">',
      'after_widget'  => '</section>',
      'before_title'  => '<h4>',
      'after_title'   => '</h4>'
    ]);

    register_sidebar([
      'name'          => __('Footer Column 3', 'sage'),
      'id'            => 'footer-column-3',
      'before_widget' => '<section class="widget %1$s %2$s">',
      'after_widget'  => '</section>',
      'before_title'  => '<h4>',
      'after_title'   => '</h4>'
    ]);

    register_sidebar([
      'name'          => __('Footer Copyright', 'sage'),
      'id'            => 'footer-copyright',
      'before_widget' => '<section class="widget %1$s %2$s">',
      'after_widget'  => '</section>',
      'before_title'  => '<h4>',
      'after_title'   => '</h4>'
    ]);
  }


  /**
   * Determine which pages should NOT display the sidebar
   */
  public static function display_sidebar() 
  {
    static $display;

    isset($display) || $display = in_array(true, [
      // The sidebar will NOT be displayed if ANY of the following return true.
      // @link https://codex.wordpress.org/Conditional_Tags
    ]);

    return apply_filters('sage/display_sidebar', $display);
  }

  /**
   * Theme assets
   */
  function assets() 
  {
    wp_enqueue_style('sage/css', Theme::asset_path('styles/main.css'), false, null);
    wp_enqueue_style('sage/googlefonts', '//fonts.googleapis.com/css?family=Alegreya+Sans+SC:400,500,700|Alegreya+Sans:400,500,700|Alegreya:400,500,700', false, null);

    if (is_single() && comments_open() && get_option('thread_comments')) {
      wp_enqueue_script('comment-reply');
    }

    wp_enqueue_script('sage/js', Theme::asset_path('scripts/main.js'), ['jquery'], null, true);

    wp_localize_script('sage/js', 'WPREST', array(
      'root' => esc_url_raw( rest_url() ),
      'nonce' => wp_create_nonce('wp_rest'),
      'current_ID' => get_the_ID()
    ));
    
  }
}

