<?php get_header(); ?>
	
	<!-- section -->
	<section role="main">

		<div class="row">

			<div class="large-8 small-12 columns no-padding">
				
				<div id="internal-content">
	
				<?php while (have_posts()) : the_post(); ?>
	
				<!-- article -->
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
				<!-- post thumbnail -->
				<?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
						<?php the_post_thumbnail(); // Fullsize image for the single post ?>
					</a>
				<?php endif; ?>
				<!-- /post thumbnail -->
			
				<!-- post title -->
				<h1>
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
				</h1>
				<!-- /post title -->

				<!-- post details -->
				<span class="date"><?php the_time('F j, Y'); ?> <?php the_time('g:i a'); ?></span>
				<span class="author"><?php _e( 'Published by', 'html5blank' ); ?> <?php the_author_posts_link(); ?></span>
				<!-- /post details -->
			
				<?php the_content(); // Dynamic Content ?>

						</article>
		<!-- /article -->
		
	<?php endwhile; ?>

				</div>
			</div>

			<div class="large-4 small-12 columns no-padding">
				
				<div id="side-content-blog">

					<?php get_sidebar(); ?>

				</div>

			</div>
		</div>
			
	
	</section>
	<!-- /section -->

	<?php include (TEMPLATEPATH . '/includes/bottom-content.php'); ?>

<?php get_footer(); ?>