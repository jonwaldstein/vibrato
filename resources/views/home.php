<section class="py-6">
    <ul class="space-y-6">
    <?php
        Vibrato\Theme::wp_loop(function(){
            get_template_part('resources/views/components/PostListItem', null, [
                'title' => get_the_title(),
                'date'  => get_the_date()
            ]);
        });
    ?>
    </ul>
</section>
