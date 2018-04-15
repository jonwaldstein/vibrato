<?php
$layouts = carbon_get_the_post_meta('page_builder');
if (!empty($layouts)):
	foreach($layouts as $layout): 
	?>
	<?php if ( $layout['_type'] === 'dynamic_section' ): ?>
		<?php
		$section_full_width_section = $layout['full_width_section'] ? 'container-fluid' : 'container';
		$section_content_contained = $layout['content_contained'] ? 'content-contained' : null;
		$section_mobile_center_text = $layout['mobile_center_text'] ? 'text-sm-center' : null;
		$section_class = $layout['section_class'] ? $layout['section_class'] : null;

		$row_vertical_align = $layout['vertical_align'] ? 'd-flex align-items-center' : null;
		$row_mobile_reverse_columns = $layout['mobile_reverse_columns'] ? 'd-flex flex-sm-column-reverse' : null;

		$content_align = $layout['content_align'] ? $layout['content_align'] : null;
		?>
		<section class="section <?= sprintf('%s %s %s %s',$section_full_width_section,$section_content_contained,$section_mobile_center_text,$section_class); ?> ">

				<?php if ( $layout['section_heading'] ): ?>
					<div class="row row-heading">
						<div class="col-sm-12 <?= sprintf('%s',$content_align); ?>">
							<?= sprintf('<%s>%s</%s>',
								!empty($layout['section_heading_tag']) ? $layout['section_heading_tag'] : null,
								!empty($layout['section_heading']) ? $layout['section_heading'] : null,
								!empty($layout['section_heading_tag']) ? $layout['section_heading_tag'] : null
							)?>
						</div>
					</div>
				<?php endif; ?>

			<div class="row flexible-content <?= sprintf('%s %s',$row_vertical_align,$row_mobile_reverse_columns); ?>">

				<?php $columns = $layout['columns']; ?>

				<?php if (!empty($columns)): ?>

					<?php foreach($columns as $column ):

							$column_class_override = array_key_exists('column_class_override', $column) ? $column['column_class_override'] : null;
							$column_col_number = $column_class_override != 'yes' ? 'col-md' : null;
							$column_col_class = $column['column_class'] ? $column['column_class'] : null;
							?>

						<div class="<?= sprintf('%s %s',$column_col_number,$column_col_class); ?>">

							<?php $content = $column['column_content']; ?>

							<?php if (!empty($content)): ?>

								<?php foreach($content as $content_block ): ?>

									<?php if ($content_block['content_type'] === 'text'): ?>
										<?= !empty(($content_block['content_text'])) ? wpautop( do_shortcode( $content_block['content_text'] ) ) : null ?>
									<?php endif; ?>

									<?php if ($content_block['content_type'] === 'textarea'): ?>
										<?= sprintf('<p>%s</p>',
										!empty($content_block['content_textarea_text']) ? $content_block['content_textarea_text'] : null
										);?>
									<?php endif; ?>

									<?php if ($content_block['content_type'] === 'shortcode'): ?>
										<?= !empty(($content_block['content_shortcode'])) ? do_shortcode( $content_block['content_shortcode'] ) : null ?>
									<?php endif; ?>

									<?php if ($content_block['content_type'] === 'heading'): ?>
										<?= sprintf('<%s class="%s %s">%s</%s>',
										!empty($content_block['content_heading_tag']) ? $content_block['content_heading_tag'] : null,
										!empty($content_block['content_heading_color']) ? $content_block['content_heading_color'] : null,
										!empty($content_block['content_heading_font']) ? $content_block['content_heading_font'] : null,
										!empty($content_block['content_heading_text']) ? $content_block['content_heading_text'] : null,
										!empty($content_block['content_heading_tag']) ? $content_block['content_heading_tag'] : null
										);?>
									<?php endif; ?>

									<?php if ($content_block['content_type'] === 'image'): ?>
										<?php $content_image_size = $content_block['content_image_size'] ? $content_block['content_image_size'] : 'full'; ?>
										<?= wp_get_attachment_image( $content_block['content_image'], $content_image_size, "", array( "class" => "img-fluid" ) ); ?>
									<?php endif; ?>

									<?php if ($content_block['content_type'] === 'button'): ?>
									<?= sprintf('<a class="btn %s %s %s" href="%s" style="%s">%s</a>',
										!empty($content_block['content_button_class']) ? $content_block['content_button_size'] : '',
										!empty($content_block['content_button_size']) ? $content_block['content_button_size'] : 'btn-lg',
										!empty($content_block['content_button_color']) ? $content_block['content_button_color'] : 'btn-primary',
										!empty($content_block['content_button_link']) ? $content_block['content_button_link'] : null,
										!empty($content_block['crb_btn_background']) ? 'background-clor:'.$content_block['crb_btn_background'].';' : null,
										!empty($content_block['content_button_text']) ? $content_block['content_button_text'] : 'button'
									);?>
									<?php endif; ?>

									<?php if ($content_block['content_type'] === 'space'): ?>
										<div style="height:<?= $content_block['content_space'] ? $content_block['content_space'] : null; ?>"></div>
									<?php endif; ?>

								<?php endforeach; ?>

							<?php endif; ?>

						</div>

					<?php endforeach; ?>

				<?php endif; ?>

			</div>

		</section>

	<?php endif;

	if ( $layout['_type'] === 'media_gallery' ): ?>
	<section class="section container">
		<div class="row">
			<?php if (!empty($layout['media_gallery'])): ?>
				<?php foreach($layout['media_gallery'] as $image): ?>
					<div class="col-sm-12 col-md-4 mb-4">
						<a href="<?= wp_get_attachment_image_url($image, 'full', false)?>" data-fancybox="group">
							<?= wp_get_attachment_image($image, 'full', false, array('class'=>'rounded img-fluid')); ?>
						</a>
					</div>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
	</section>
	<?php endif;
	endforeach; 
endif;