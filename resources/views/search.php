<?php if (!have_posts()) : ?>

    <div class="alert alert-warning">
        <?php _e('Sorry, no results were found.', 'vibrato'); ?>
    </div>

    <?php get_search_form(); ?>

<?php endif; ?>

<?php while (have_posts()) : the_post(); ?>

    Search Template

<?php endwhile; ?>
