<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php
    wp_body_open();
    do_action('get_header');
    get_template_part('resources/views/common/header');
    !is_front_page() && get_template_part('resources/views/common/banner');
    ?>

    <main>
        <div class="max-w-screen-lg mx-auto h-screen p-4">
            <?php Vibrato\Theme::get_default_template(); ?>
        </div>
    </main>

    <?php
    do_action('get_footer');
    get_template_part('resources/views/common/footer');
    wp_footer();
    ?>
</body>

</html>
