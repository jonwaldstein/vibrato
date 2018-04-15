<?php
use Roots\Sage\Classes\BootstrapNavwalker;
$site_logo = function_exists('carbon_get_theme_option') ? carbon_get_theme_option('site_logo') : null;
?>
<header>

 <div class="header navbar navbar-expand-md">
    <div class="container">
       <a class="navbar-brand" href="<?= get_home_url('/'); ?>">
        <?= $site_logo ? wp_get_attachment_image($site_logo, 'logo') : get_bloginfo( 'name' );?>
        </a>
      <?php
      wp_nav_menu([
        'menu'            => 'primary_navigation',
        'theme_location'  => 'primary_navigation',
        'container'       => 'nav',
        'container_id'    => 'primary-navigation',
        'container_class' => 'collapse navbar-collapse',
        'menu_id'         => false,
        'menu_class'      => 'navbar-nav ml-auto',
        'depth'           => 2,
        'fallback_cb'     => 'BootstrapNavwalker::fallback',
        'walker'          => new BootstrapNavwalker()
      ]);
      ?>
      <button class="hamburger hamburger--squeeze navbar-toggler" type="button" data-toggle="collapse" data-target="#primary-navigation" aria-label="Toggle navigation" aria-expanded="false">
        <span class="hamburger-box">
          <span class="hamburger-inner"></span>
        </span>
      </button>
    </div>
  </div>

</header>
