<?php

use Vibrato\Theme;
?>
<?php while (have_posts()) : the_post(); ?>

  <?php get_template_part('resources/views/global/content', 'page'); ?>

<?php endwhile; ?>
