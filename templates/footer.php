<?php
	$footer_copy = function_exists('carbon_get_theme_option') ? carbon_get_theme_option('footer_copy') : null;
	$date = date('Y ');
?>
<footer class="footer text-light">
	<div class="footer__top bg-dark">
		<div class="container">
		  	<div class="row pt-5 pb-5">
		  		<div class="col-md-4 d-flex justify-content-md-center">
		  			<?php dynamic_sidebar('footer-column-1'); ?>
		  		</div>
		  		<div class="col-md-4 d-flex justify-content-md-center">
		  			<?php dynamic_sidebar('footer-column-2'); ?>
		  		</div>
		  		<div class="col-md-4 d-flex justify-content-md-center">
		  			<?php dynamic_sidebar('footer-column-3'); ?>
		  		</div>
		  	</div>
		  </div>
	</div>
	<div class="footer__bottom bg-black">
		 <div class="container text-light">
			<div class="row pt-1 pb-1">
				<div class="col d-flex justify-content-md-center">
					<?php if (!empty($footer_copy)): ?>
						<?= "<small>{$date} {$footer_copy}</small>"; ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</footer>
