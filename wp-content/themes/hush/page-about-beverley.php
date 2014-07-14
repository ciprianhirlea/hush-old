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

				</div>

			</div>

			<div class="large-4 small-12 columns no-padding">
				
				<div id="side-content">

					<?php while (have_posts()) : the_post(); ?>

						<?php the_field('qualifications') ?>

						

					<?php endwhile ?>

				</div>

			</div>

		</div>	
	
		<?php include (TEMPLATEPATH . '/includes/bottom-content.php'); ?>

	</section>
	<!-- /section -->

<?php get_footer(); ?>