<?php

use Vibrato\Classes\Theme;

$background_image = carbon_get_the_post_meta('banner_background_image');
$banner_heading = carbon_get_the_post_meta('banner_heading');
$banner_sub_heading = carbon_get_the_post_meta('banner_sub_heading');
$banner_button_text = carbon_get_the_post_meta('banner_button_text');
$banner_button_link = carbon_get_the_post_meta('banner_button_link');
?>
<div class="bg-cover-center py-5" style="background-image: url(<?= $background_image ? $background_image : get_the_post_thumbnail_url(); ?>);background-color: #333; background-repeat: no-repeat; background-size: cover; background-position: top center;">
    <div class="container text-center mx-auto">
        <h1 class="text-white text-xl">
            <?= !empty($banner_heading) ? $banner_heading : Theme::title(); ?>
        </h1>
        <?php if (!empty($banner_sub_heading)) : ?>
            <h3 class="text-white"><?= $banner_sub_heading; ?></h3>
        <?php endif; ?>
        <?php if (!empty($banner_button_text)) : ?>
            <a href="<?= !empty($banner_button_link) ? $banner_button_link : '#'; ?>" class="btn btn-light mt-4 btn-lg">
                <?= $banner_button_text; ?>
            </a>
        <?php endif; ?>
    </div>
</div>
