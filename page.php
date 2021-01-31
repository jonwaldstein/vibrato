<?php

use Vibrato\Classes\Theme;
?>
<?php while (have_posts()) : the_post(); ?>

  <?php get_template_part('templates/global/content', 'page'); ?>

<?php endwhile; ?>
