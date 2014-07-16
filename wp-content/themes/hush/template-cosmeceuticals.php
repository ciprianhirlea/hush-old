<?php /* Template Name: cosmeceuticals */ get_header(); ?>

<?php get_header(); ?>
	
	<!-- section -->
	<section role="main">

		<div class="row">

			<div class="large-12 small-12 columns no-padding internal-header">
				<?php 
					if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
  					the_post_thumbnail();
				} 
				?>
			</div>

		</div>

		<div class="row">

			<div class="large-6 small-6 columns" id="cosmeceuticals-left">

					<?php while (have_posts()) : the_post(); ?>

						<?php the_content() ?>	

			</div>

			<div class="large-6 small-6 columns" id="cosmeceuticals-right">

						<?php the_field('right_col') ?>

						

					<?php endwhile ?>

			</div>

			

		</div>

		
	<div class="carousel-bg">

		<div class="row">

			<div class="large-12 small-12 columns no-padding">

			<div class="carousel_wrapper_cosmeceuticals">

				<div id="carousel cosmo">
				<?php
 
						// check if the repeater field has rows of data
						if( have_rows('cosmeceuticals_slider') ):
					 
					 	// loop through the rows of data
					    	while ( have_rows('cosmeceuticals_slider') ) : the_row();
						?>
					

				<div class="cosmeceuticals-carousel">
					<div class="product-image"><img src="<?php the_sub_field('cosmeceuticals_image') ?>" ></div>
					<div class="product-description"><?php the_sub_field('cosmeceuticals_slider_text') ?></div>
					
				   </div>

				<?php endwhile; ?>
				<?php endif; ?>	
				
				</div>

			
					<a class="prev" id="prev" href="#"></a>
					<a class="next" id="next" href="#"></a>

				</div>

			</div>

		</div>

	</div>
	
	
		<?php include (TEMPLATEPATH . '/includes/bottom-content.php'); ?>

	</section>
	<!-- /section -->

<?php get_footer(); ?>