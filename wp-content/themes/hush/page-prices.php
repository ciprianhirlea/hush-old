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

			<div class="large-8 small-12 columns no-padding">
				
				<div id="internal-content">

					<?php while (have_posts()) : the_post(); ?>

						<?php the_content() ?>

						

					<?php endwhile ?>

					<div class="price-list-left">

						<?php the_field('wrinkle_relaxation') ?>

					</div>

					<div class="price-list-right">
					
						<?php the_field('dermal_fillers') ?>

						<?php the_field('glycolic_peel') ?>
					
					</div>

				</div>

			</div>

			<div class="large-4 small-12 columns no-padding">
				
				

					<?php get_sidebar('twitter'); ?>

				

			</div>

		</div>	
	
		<?php include (TEMPLATEPATH . '/includes/bottom-content.php'); ?>

	</section>
	<!-- /section -->

<?php get_footer(); ?>