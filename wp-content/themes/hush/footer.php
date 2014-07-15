			<!-- footer -->
			<footer class="footer" role="contentinfo">

				<div class="row">
					<div class="large-6 small-12 no-padding columns">

						<div class="footer-logo">
							<img src="<?php echo get_template_directory_uri(); ?>/img/small-logo.jpg" />
						</div>

						<div class="footer-links">
							<a class="main-site-link" href="http://hushaesthetics.com">hushaesthetics.com</a>

							<div class="grey-footer-links">Privacy Policy | Cookie Policy | Terms and Conditions</div>
						</div>

					</div>

					<div class="large-6 small-12 no-padding columns">

						<div class="site-designed">Site designed by <a href="http://www.blowmedia.co.uk" target="_blank">blowmedia</a> in Harrogate</div>

					</div>
				</div>
				
			</footer>
			<!-- /footer -->


		<?php wp_footer(); ?>


	<script>
            	$('.fancybox').fancybox();
        	</script>

            <?php
 
                    // check if the repeater field has rows of data
                    if( have_rows('before_and_after') ):
                     
                        // loop through the rows of data
                        while ( have_rows('before_and_after') ) : the_row();
                    ?>

            <div id="inline1" style="width:300px;display: none;">
        
            <img src="<?php the_sub_field('before_and_after_image'); ?>" alt="" />
        
            </div>

  <?php endwhile; else : endif; ?>

<script>
  $('.featured-testimonial-text').cycle({ 
    fx:     'fade', 
    speed:   800, 
    pause: 10, 
    next:   '#next3', 
    timeout: 8000,
    slideResize: 0,
    containerResize: 0
})

  </script>

		<!-- analytics -->
		<script>
			var _gaq=[['_setAccount','UA-XXXXXXXX-XX'],['_trackPageview']];
			(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
			g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
			s.parentNode.insertBefore(g,s)})(document,'script');
			console.log('GOOGLE ANALYTICS CODE NOT SET');
		</script>	

	</body>
</html>
