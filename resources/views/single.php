<?php while (have_posts()) : the_post(); ?>

    <?php get_template_part('resources/views/partials/post/content'); ?>

<?php endwhile; ?>
