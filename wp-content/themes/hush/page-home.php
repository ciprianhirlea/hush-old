<?php get_header(); ?>
	
	<!-- section -->
	<section role="main">

		<div class="row">

			<div class="large-12 small-12 columns no-padding">
				<div id="slider" class="nivoSlider">
				    <img src="<?php echo get_template_directory_uri(); ?>/img/slides/slide-1.jpg" alt="" />
				</div>
			</div>

		</div>	
	
		<?php include (TEMPLATEPATH . '/includes/bottom-content.php'); ?>

	</section>
	<!-- /section -->

<?php get_footer(); ?>