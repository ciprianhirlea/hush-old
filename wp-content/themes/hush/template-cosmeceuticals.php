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

			<div class="large-6 small-6 columns">
				
				<div id="cosmeceuticals-left">

					<?php while (have_posts()) : the_post(); ?>

						<?php the_content() ?>	

				</div>

			</div>

			<div class="large-6 small-6 columns">

				<div id="cosmeceuticals-right">

					

						<?php the_field('right_col') ?>

						

					<?php endwhile ?>

				</div>

			</div>

			

		</div>

		

		<div class="row">

			<div class="large-12 small-12 columns no-padding">

				<div class="gallery-title">
					Before and after gallery
				</div>

			<div class="carousel_wrapper">

				<div id="carousel">
				<?php if(get_field('before_and_after')): ?>
				<?php while(has_sub_field('before_and_after')): ?>
					<?php $image = wp_get_attachment_image_src(get_sub_field('before_and_after_image'), 'full'); ?>
					<?php $thumb = wp_get_attachment_image_src(get_sub_field('before_and_after_image'), 'large'); ?>

				<div class="before-after-carousel">
					<a href="<?php echo $image[0]; ?>" class="fancybox" rel="fancybox"><img class="beforeAfterimg" src="<?php echo $thumb[0]; ?>" /></a>
				   </div>

				<?php endwhile; ?>
				<?php endif; ?>	
				
				</div>

			
					<a class="prev" id="prev" href="#"></a>
					<a class="next" id="next" href="#"></a>

				</div>

			</div>

		</div>
	
	
		<?php include (TEMPLATEPATH . '/includes/bottom-content.php'); ?>

	</section>
	<!-- /section -->

<?php get_footer(); ?>