<?php get_header(); ?>

	<!-- section -->
	<section role="main">
	
		<!-- article -->

		<div class="row">

			<div class="large-12 small-12 columns no-padding">
				<div id="slider" class="nivoSlider">
				    <img src="<?php echo get_template_directory_uri(); ?>/img/slides/slide-1.jpg" alt="" />
				</div>
			</div>

		</div>

		<div class="row">

			<div class="large-12 small-12 columns no-padding">	
				<article id="404" <?php post_class(); ?>>
		
					<h1>404 </h1>
					<h2>
					We are sorry but we cannot find what you are looking for
					</h2>
			
				</article>

			</div>

		</div>
		<!-- /article -->
		
		<?php include (TEMPLATEPATH . '/includes/bottom-content.php'); ?>
		
	</section>
	<!-- /section -->

<?php get_footer(); ?>