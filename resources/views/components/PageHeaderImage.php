<?php if (get_header_image()) : ?>
    <img class="w-full object-cover h-64" src="<?php header_image(); ?>" alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>">
<?php endif; ?>
