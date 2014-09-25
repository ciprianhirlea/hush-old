			<!-- footer -->
			<footer class="footer" role="contentinfo">

				<div class="row">
					<div class="large-6 small-12 no-padding columns">

						<div class="footer-logo">
							<img src="<?php echo get_template_directory_uri(); ?>/img/small-logo.jpg" />
						</div>

						<div class="footer-links">
							<a class="main-site-link" href="http://hushaesthetics.com">hushaesthetics.com</a>

							<div class="grey-footer-links"><a href="<?php bloginfo('url')?>/privacy-policy">Privacy Policy</a> | <a href="<?php bloginfo('url')?>/cookie-policy">Cookie Policy</a> | <a href="<?php bloginfo('url')?>/terms-and-conditions">Terms and Conditions</a></div>
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
/*  $('.testimonialBox').cycle({ 
    fx:     'fade', 
    speed:   800, 
    pause: 10, 
    next:   '#next3', 
	timeout: 8000,
	slideResize: 0,
	containerResize: 0
})*/
  </script>

  <script src="<?php bloginfo('template_directory')?>/js/jquery.placeholder-1.0.1.js" type="text/javascript"></script>
    <script src="<?php bloginfo('template_directory')?>/js/gf.placeholders.js" type="text/javascript"></script>

    <script type="text/javascript">
/* <![CDATA[ */
$(function() {
	var input = document.createElement("input");
    if(('placeholder' in input)==false) { 
		$('[placeholder]').focus(function() {
			var i = $(this);
			if(i.val() == i.attr('placeholder')) {
				i.val('').removeClass('placeholder');
				if(i.hasClass('password')) {
					i.removeClass('password');
					this.type='password';
				}			
			}
		}).blur(function() {
			var i = $(this);	
			if(i.val() == '' || i.val() == i.attr('placeholder')) {
				if(this.type=='password') {
					i.addClass('password');
					this.type='text';
				}
				i.addClass('placeholder').val(i.attr('placeholder'));
			}
		}).blur().parents('form').submit(function() {
			$(this).find('[placeholder]').each(function() {
				var i = $(this);
				if(i.val() == i.attr('placeholder'))
					i.val('');
			})
		});
	}
});
/* ]]> */
</script>

		<!-- analytics -->
		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-55148061-1', 'auto');
		  ga('send', 'pageview');

		</script>	

	</body>
</html>
