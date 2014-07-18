<?php /* Template Name: peels */ get_header(); ?>

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

			<div class="large-6 small-12 columns" id="cosmeceuticals-left">

					<?php while (have_posts()) : the_post(); ?>

						<?php the_content() ?>	

			</div>

			<div class="large-6 small-12 columns" id="cosmeceuticals-right">

						<?php the_field('right_col') ?>

						

					<?php endwhile ?>

			</div>

			

		</div>

		
	
	
		<?php include (TEMPLATEPATH . '/includes/bottom-content.php'); ?>

	</section>
	<!-- /section -->

<?php get_footer(); ?>