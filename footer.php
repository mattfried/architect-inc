		</main>

		<footer class="site-footer section-inner">

			<div class="social-icons">
				<a href="https://www.linkedin.com/" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/linkedin-logo.svg" /></a>
				<a href="https://www.facebook.com/" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/facebook-logo.svg" /></a>
				<a href="https://www.instagram.com/" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/instagram-logo.svg" /></a>
			</div>

			<p>&copy; <?php echo date( 'Y' ); ?> <a href="<?php echo esc_url( home_url() ); ?>" class="site-name"><?php bloginfo( 'name' ); ?></a></p>
			<!-- <p class="theme-by"><?php _e( 'Theme by', 'hamilton' ); ?> <a href="https://www.andersnoren.se">Anders Nor&eacute;n</a></p> -->
			<p class="theme-by">Web Dev by <a href="https://mattfried.ca/" target="_blank">Matt Fried</a></p>

		</footer> <!-- footer -->

	    <?php wp_footer(); ?>

	</body>
</html>
