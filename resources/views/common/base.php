<?php

use Vibrato\ThemeTemplateWrapper;
use Vibrato\ThemeSetup;
?>

<!doctype html>
<html <?php language_attributes(); ?>>
<?php get_template_part('resources/views/global/head'); ?>

<body <?php body_class(); ?>>
    <?php
    do_action('get_header');
    get_template_part('resources/views/global/header');
    get_template_part('resources/views/global/banner');
    ?>
    <div class="wrap container mx-auto px-6 py-6 lg:py-6 lg:px-0">
        <main class="main">
            <?php include ThemeTemplateWrapper::template_path(); ?>
        </main><!-- /.main -->
        <?php if (ThemeSetup::display_sidebar()) : ?>
            <aside class="sidebar">
                <?php include ThemeTemplateWrapper::sidebar_path(); ?>
            </aside><!-- /.sidebar -->
        <?php endif; ?>
    </div><!-- /.wrap -->
    <?php
    do_action('get_footer');
    get_template_part('resources/views/global/footer');
    wp_footer();
    ?>
</body>

</html>
