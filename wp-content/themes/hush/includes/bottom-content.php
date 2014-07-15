<?php get_header(); ?>
	

	

<div class="row">

	<div id="bottom-buttons" class="large-4 small-12 columns no-padding dermal">

		<a href="#">

			<div class="bottom-buttons-bg-color">

				<img src="<?php echo get_template_directory_uri(); ?>/img/dermal-home-button.jpg" />

				<div class="bottom-buttons-link-bg">

					<div class="pink-text-treatment-buttons">
						Dermal Fillers
					</div>

					<div class="treatment-grey-text">
						Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
					</div>


				</div>
			</div>
		</a>
				
	</div>

	<div id="bottom-buttons" class="large-4 small-12 columns no-padding wrinkle">

		<a href="#">

			<div class="bottom-buttons-bg-color">

				<img src="<?php echo get_template_directory_uri(); ?>/img/wrinkle-home-button.jpg" />

				<div class="bottom-buttons-link-bg">

					<div class="pink-text-treatment-buttons">
						Wrinkle Relaxing Injections
					</div>

					<div class="treatment-grey-text">
						Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
					</div>

				</div>

			</div>

		</a>
				
	</div>

	<div id="bottom-buttons" class="large-4 small-12 columns no-padding cosmeceuticals ">

		<a href="#">

			<div class="bottom-buttons-bg-color">

				<img src="<?php echo get_template_directory_uri(); ?>/img/cosmeceuticals-home-button.jpg" />

				<div class="bottom-buttons-link-bg">

					<div class="pink-text-treatment-buttons">
						Cosmeceuticals
					</div>

					<div class="treatment-grey-text">
						Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
					</div>
				</div>

			</div>

		</a>
				
	</div>

</div>

<!-- testimonial section -->


<div id="featured-testimonial-background">

	<div class="row">

		<div class="large-12 small-12 no-padding">
			<div class="featured-testimonial-text">
				<?php 
             					$loop = new WP_Query( array('post_type' => array('featured_testimonial')) ); ?>
					<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
				<div class="cycle-slideshow"   data-cycle-slides="> div">
				<div><?php the_content() ?></div>
				
				</div>
					<?php endwhile; ?>
			</div>
		</div>

	</div>

</div>

<!-- end -->

<!-- callback / pricing section -->

<div id="callback-pricing-section" class="row">

		<div class="large-6 small-12 no-padding columns">
			<img src="<?php echo get_template_directory_uri(); ?>/img/arrange-callback-button.png" />
		</div>

		<div id="pricing-button" class="large-6 small-12 no-padding columns">
			<img src="<?php echo get_template_directory_uri(); ?>/img/pricing-button.png" />
		</div>

	</div>


<!-- end -->




	
