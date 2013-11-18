			</div> <!-- #main -->
        </div> <!-- #main-container -->
		
		<div class="footer-container">
			<footer class="wrapper">
				
				<hr class="seen-in">

				<div id="seen-in">
				
					<?php 
	
					$page = 23;
	
					if(get_field('press_feature', $page)) : ?>
						
						<ul >
	
						<?php while( has_sub_field('press_feature', $page) ) : ?>
	
							<?php if( get_sub_field('frontpage_feature') == 1 ) : ?>
	
								<li><?php echo wp_get_attachment_image(	get_sub_field('press_logo'), 'press_feature_frontpage' ); ?></li>
	
							<?php endif; ?>
	
						<?php endwhile; ?>
	
						</ul>
	
					<?php endif; ?>

				</div>

				<hr>

				<div id="footer-navigation">

					<div id="newsletter-short">

						<?php mailchimpSF_signup_form(); ?>

					</div>

					<?php wp_nav_menu( array('menu' => 'tertiary', 'container' => 'nav', 'container_class' => 'tertiary' ) ); ?>

					<div>

						<h2>FOLLOW US</h2>

						<a href="">Facebook</a>
						<a href="">Instagram</a>
						<a href="">Twitter</a>
						<a href="">Vimeo</a>
						<a href="">Youtube</a>

					</div>

				</div>

				

			</footer>
        </div>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.1.min.js"><\/script>')</script>
		<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
		
        <script src="<?php echo get_template_directory_uri(); ?>/js/plugins.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/js/main.js"></script>

        <script>
            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>

		<?php wp_footer(); ?>
    </body>
</html>