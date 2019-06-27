<?php
	$footer_copy = function_exists('carbon_get_theme_option') ? carbon_get_theme_option('footer_copy') : null;
	$date = date('Y ');
?>
<footer>
	<div class="flex flex-wrap">
	  <div class="h-12 w-full lg:w-1/3 mb-4 bg-gray-500">
	  	<?php dynamic_sidebar('footer-column-1'); ?>
	  </div>
	  <div class="h-12 w-full lg:w-1/3 mb-4 bg-gray-400">
	  	<?php dynamic_sidebar('footer-column-2'); ?>
	  </div>
	  <div class="h-12 w-full lg:w-1/3 mb-4 bg-gray-500">
	  	<?php dynamic_sidebar('footer-column-3'); ?>
	  </div>
	</div>
	<div class="w-full bg-black">
	  	<?php if (!empty($footer_copy)): ?>
				<?= "<small class='text-white'>{$date} {$footer_copy}</small>"; ?>
			<?php else: ?>
				<div class="container mx-auto py-2 px-6 lg:px-0">
					<small class="text-white">&copy; <?= $date; ?></small>
				</div>
			<?php endif; ?>
	</div>
</footer>