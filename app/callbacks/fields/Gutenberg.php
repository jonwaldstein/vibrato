<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;
use Carbon_Fields\Block;

Block::make( __( 'Alert' ) )
->add_fields( array(
    Field::make( 'text', 'alert_heading' ),
    Field::make( 'rich_text', 'alert_text' ),
))
->set_category( 'Custom' )
->set_render_callback( function ( $block ) {
    ?>
		<?php if (!empty($block['alert_text'] || $block['alert_heading'])): ?>
		<div class="alert alert-warning" role="alert">
			<?php if (!empty($block['alert_heading'])): ?>
		  	<h4 class="alert-heading"><?= $block['alert_heading']; ?></h4>
		  	<hr>
			<?php endif; ?>
		  <?= $block['alert_text']; ?>
		</div>
		<?php endif; ?>
    <?php
} );

Block::make( __( 'Alerts' ) )
->add_fields( array(
    Field::make( 'html', 'crb_html', __( 'Alerts' ) )
    ->set_html('This will display all your alerts' )
))
->set_category( 'Custom' )
->set_render_callback( function ( $block ) {
    ?>
    <?php 
    $alerts_query = new WP_Query([
			'post_type' => 'cpt_alerts',
			'posts_per_page' => '99',
			'orderby'	=> 'meta_value',
			'order' => 'asc',
	    'meta_query'=>array(
	        'date' => array(
	            'key' => 'alert_start_date',
	            'compare' => '>',
	        ),
	    ),
		]);
		?>
		<section class="container-fluid">
			<div class="row">
				<?php while ($alerts_query->have_posts()) : $alerts_query->the_post(); ?>
					<?php
					$alert_id = get_the_ID();
					$alert_heading = carbon_get_post_meta($alert_id, 'alert_heading');
					$alert_description = carbon_get_post_meta($alert_id, 'alert_description');
					$date_now = new DateTime('now', new DateTimeZone('America/New_York'));
					$date_now = $date_now->format('Y-m-d');
					$date_expired = carbon_get_post_meta($alert_id, 'alert_end_date');
					?>
					<?php if ($date_now < $date_expired): ?>
						<div class="alert alert-warning col-sm-10" role="alert">
						<?php if (!empty($alert_heading)): ?>
					  	<h4 class="alert-heading"><?= $alert_heading; ?></h4>
					  	<hr>
						<?php endif; ?>
					  <?= $alert_description; ?>
					</div>
					<?php endif; ?>
				<?php endwhile; ?>
			</div>
		</section>
    <?php
} );