<?php

use Vibrato\Core\TemplateWrapper;
use Vibrato\ThemeSetup;
?>

<!doctype html>
<html <?php language_attributes(); ?>>
<?php get_template_part('resources/views/common/head'); ?>

<body <?php body_class(); ?>>
    <?php
    do_action('get_header');
    get_template_part('resources/views/common/header');
    !is_front_page() && get_template_part('resources/views/common/banner');
    ?>
    <div class="wrap">
        <main>
            <div class="max-w-screen-lg mx-auto h-screen p-4">
                <?php include TemplateWrapper::template_path(); ?>
                <!-- /End replace -->
            </div>
        </main><!-- /.main -->
    </div><!-- /.wrap -->
    <?php
    do_action('get_footer');
    get_template_part('resources/views/common/footer');
    wp_footer();
    ?>
</body>

</html>
