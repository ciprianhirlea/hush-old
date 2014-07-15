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

					  <?php 
				
					  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
						$args = array(
									'orderby'  => 'date',
									'order'    => 'DESC',
									'paged'	   => $paged
								);

						query_posts($args);
						while ( have_posts() ) : the_post(); ?>

						<div id="blog-post">

							 <div class="date-wrapper"> 
								<div class="date-value"><?php the_time('d') ?></div>
                                       						 <div class="month-value"><?php the_time('M') ?></div>
                                        					<div class="year-value"><?php the_time('Y') ?></div>
                                   					 </div>

							<div class="blog-title">
								<h2><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h2>
								
								<div class="entry-user">
									Posted by: <?php echo the_author_meta('nickname', get_the_author_meta( 'ID' ) ); ?>&nbsp;&nbsp;/&nbsp;&nbsp;
                                            						Category: <?php the_category(' / '); ?> &nbsp;&nbsp;
                                          					</div>
							</div>

							 <?php if( has_post_thumbnail() ){ ?>
                                    						<div class="postimg"><?php the_post_thumbnail(); ?></div>
                                    					<?php } ?>

                                    					<div class="entry-content">
                                       						<p>
									<?php $content = get_the_content(); ?>
									<?php
									// get the first 80 words from the content and added to the $abstract variable
									 preg_match('/^([^.!?\s]*[\.!?\s]+){0,40}/', strip_tags($content), $abstract);
									  // pregmatch will return an array and the first 80 chars will be in the first element 
									  echo $abstract[0] . '...';
									    ?>  
								</p>
								<a href="<?php echo get_permalink(); ?>" class="more">Read more</a>
                                    					</div>
						</div>

						<hr/>

					<?php endwhile ?>

					<?php site_pagination(); ?>

				</div>

			</div>

			<div class="large-4 small-12 columns no-padding">
				
				<div id="side-content-blog">

					<?php get_sidebar(); ?>

				</div>

			</div>

		</div>	
	
		<?php include (TEMPLATEPATH . '/includes/bottom-content.php'); ?>

	</section>
	<!-- /section -->

<?php get_footer(); ?>