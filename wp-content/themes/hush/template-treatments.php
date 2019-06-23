<?php /* Template Name: treatments */ get_header(); ?>

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
				
				<div id="treatment-content">

					<?php while (have_posts()) : the_post(); ?>

						<?php the_content() ?>

						

					<?php endwhile ?>

				</div>

			</div>

			<div class="large-4 small-12 columns no-padding">
				
				<div id="side-content">

					

						<?php
 
						// check if the repeater field has rows of data
						if( have_rows('faq_dropdowns') ):
					 
					 	// loop through the rows of data
					    	while ( have_rows('faq_dropdowns') ) : the_row();
						?>
          						<div class="faqcontent">
            	 					<div class="show_hide"><div class="faq-question"><?php the_sub_field('faq_title');?></div>

	                 					<div class="arrow-up"><img src="<?php bloginfo('template_url'); ?>/img/minus.jpg" alt="" /></div>
	    						<div class="arrow-down"><img src="<?php bloginfo('template_url'); ?>/img/plus.jpg" alt="" /></div>
	                 
               					</div>
                 					</div>
					              <div class="slidingDiv">
					              <p><?php the_sub_field('faq_content');?></p>
					              </div>

					          <?php endwhile ?>
					      <?php endif ?>
               
           					

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