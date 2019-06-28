<?php
use ZGM\Vibrato\Classes\WalkerNav;
$site_logo = function_exists('carbon_get_theme_option') ? carbon_get_theme_option('site_logo') : null;
?>
<header class="w-full bg-teal-500">
<nav class="flex items-center justify-between flex-wrap px-6 py-6 lg:py-6 lg:px-0 container mx-auto">
  <a href="/" class="flex items-center flex-shrink-0 text-white mr-6">
    <span class="font-semibold text-xl tracking-tight">
      <?php if ( has_custom_logo() ) : ?>
        <div class="site-logo"><?php the_custom_logo(); ?></div>
      <?php else: ?>
        <?= $site_logo ? wp_get_attachment_image($site_logo, 'logo') : get_bloginfo( 'name' );?>
      <?php endif; ?>
    </span>
  </a>
  <div class="block lg:hidden">
    <button class="hamburger js-hamburger js-trigger-navigation hamburger--squeeze" type="button" aria-label="Toggle navigation">
      <span class="hamburger-box">
        <span class="hamburger-inner"></span>
      </span>
    </button>
  </div>
  <nav id="site-navigation" class="js-navigation w-full block hidden lg:flex lg:items-center lg:w-auto" role="navigation">
  <?php
    if ( has_nav_menu( 'primary_navigation' ) ) :
      wp_nav_menu([
      'theme_location'  => 'primary_navigation',
      'container'       => 'ul',
      'container_class' => 'text-sm lg:flex-grow',
      'menu_id'         => 'primary-navigation-menu',
      'menu_class'      => 'text-sm lg:flex-grow'
    ]);
    endif;
    ?>
  </nav>
</nav>
</header>
<button class="text-blue-600 hover:text-red-600 hover:transition-all hover:transition-600">
  Button
</button>