<?php
/**
 * this template parts for displaying footer widget area
 * @sicne 1.0.0
 * */
if (!is_active_sidebar('footer-widget')){
	return;
}
?>
<div class="footer-top padding-top-100 padding-bottom-65">
	<div class="container">
		<div class="row">
			<?php dynamic_sidebar('footer-widget');?>
		</div>
	</div>
</div>