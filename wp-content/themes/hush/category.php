<?php get_header(); ?>
	
	<!-- section -->
	<section role="main">

		<div class="row">

			<div class="large-8 small-12 columns no-padding">
				
				<div id="internal-content">
	
				<?php get_template_part('loop'); ?>
				
				<?php get_template_part('pagination'); ?>

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