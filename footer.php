<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

$theme_options = get_option( 'pure_options' );

?>	
		</div>

	</section>
	
	<footer class="footer">
		<div class="wrap group">
			<div class="third">
				<a href="/"><img src="<?php bloginfo( 'template_url' ) ?>/img/logo.png"></a>
				<nav role="navigation">
					<?php wp_nav_menu( array( 
						'theme_location' => 'main-menu', 
						'menu_class' => 'nav-menu' ) 
					); ?>
				</nav>
				<div class="social">
					<a href="<?php print $theme_options['social-twitter'] ?>" target="_blank"><img src="<?php bloginfo('template_url'); ?>/img/social-twitter.png" alt="Visit our Twitter Page" /></a>
					<a href="<?php print $theme_options['social-facebook'] ?>" target="_blank"><img src="<?php bloginfo('template_url'); ?>/img/social-facebook.png" alt="Visit our Facebook Page" /></a>
					<a href="<?php print $theme_options['social-linkedin'] ?>" target="_blank"><img src="<?php bloginfo('template_url'); ?>/img/social-linkedin.png" alt="Visit our LinkedIn page." /></a>
				</div>
			</div>
			<div class="two-third">

				<h3>Connect With Us</h3>
				<div class="column">
					<p>800.995.9064 Phone<br>
						877.928.6397 Fax<br>
						<a href="mailto:foundation@nwcua.org">foundation@nwcua.org</a></p>

					<p><strong>Idaho Office</strong><br>
						2710 W Sunrise Rim Road, Suite 100<br>
						Boise, ID 83705</p>
				</div>
				<div class="column">
					<p><strong>Oregon Office</strong><br>
						13221 SW 68th Pkwy, Suite 400<br>
						Tigard, OR 97223</p>

					<p><strong>Washington Office</strong><br>
						18000 International Blvd, Suite 350<br>
						Seattle, WA 98188</p>
				</div>

			</div>
		</div>
	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>