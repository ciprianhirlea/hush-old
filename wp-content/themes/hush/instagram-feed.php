<?php
/**
* Template Name: Instagram Feed 
* Description: This is reliant on https://en-gb.wordpress.org/plugins/instagram-feed/
**/ 
?>

<?php get_header(); ?>

	<div class="row">

		<div class="large-12 small-12">
			<?php echo do_shortcode( '[instagram-feed]' ); ?>
		</div>

	</div>

<?php get_footer(); ?>