<?php

use Vibrato\Classes\ThemeTemplateWrapper;
use Vibrato\Classes\Setup;

?>

<!doctype html>
<html <?php language_attributes(); ?>>
<?php get_template_part('templates/global/head'); ?>

<body <?php body_class(); ?>>
    <!--[if IE]>
      <div class="alert alert-warning">
        <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'sage'); ?>
      </div>
    <![endif]-->
    <?php
    do_action('get_header');
    get_template_part('templates/global/header');
    get_template_part('templates/global/banner');
    ?>
    <div class="wrap container mx-auto px-6 py-6 lg:py-6 lg:px-0">
        <main class="main">
            <?php include ThemeTemplateWrapper::template_path(); ?>
        </main><!-- /.main -->
        <?php if (Setup::display_sidebar()) : ?>
            <aside class="sidebar">
                <?php include ThemeTemplateWrapper::sidebar_path(); ?>
            </aside><!-- /.sidebar -->
        <?php endif; ?>
    </div><!-- /.wrap -->
    <?php
    do_action('get_footer');
    get_template_part('templates/global/footer');
    wp_footer();
    ?>
</body>

</html>
