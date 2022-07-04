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
	
	<?php gowest_foundation_lightbox(); ?>

	<footer class="footer">
		<div class="wrap group">
			<div class="third">
				<a href="/"><img src="<?php bloginfo( 'template_url' ) ?>/img/logo-lockup.png" alt="NWCUF Logo"></a>
				<nav role="navigation">
					<?php wp_nav_menu( array( 'theme_location' => 'footer' )  ); ?>
				</nav>
				<div class="social">
					<a href="<?php print $theme_options['social-twitter'] ?>" target="_blank"><img src="<?php bloginfo('template_url'); ?>/img/social-twitter.png" alt="Visit our Twitter Page" /></a>
					<a href="<?php print $theme_options['social-facebook'] ?>" target="_blank"><img src="<?php bloginfo('template_url'); ?>/img/social-facebook.png" alt="Visit our Facebook Page" /></a>
					<a href="<?php print $theme_options['social-linkedin'] ?>" target="_blank"><img src="<?php bloginfo('template_url'); ?>/img/social-linkedin.png" alt="Visit our LinkedIn page." /></a>
					<a href="<?php print $theme_options['social-youtube'] ?>" target="_blank"><img src="<?php bloginfo('template_url'); ?>/img/social-youtube.png" alt="Visit our Youtube page." /></a>
				</div>
			</div>
			<div class="two-third">

				<h3>Connect With Us</h3>
				<div class="column">
					<?php print do_shortcode( '[snippet slug="footer-address-one" /]' ); ?>
					<!--<p><a href="https://nwcua.org"><img src="<?php bloginfo( 'template_url' ); ?>/img/logo-nwcua-white.png?v=1" class="nwcua-logo" /></a></p>-->
				</div>
				<div class="column">
					<?php print do_shortcode( '[snippet slug="footer-address-two" /]' ); ?>
				</div>

			</div>
		</div>
	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

<script type="text/javascript">
(function(e,t,o,n,p,r,i){e.visitorGlobalObjectAlias=n;e[e.visitorGlobalObjectAlias]=e[e.visitorGlobalObjectAlias]||function(){(e[e.visitorGlobalObjectAlias].q=e[e.visitorGlobalObjectAlias].q||[]).push(arguments)};e[e.visitorGlobalObjectAlias].l=(new Date).getTime();r=t.createElement("script");r.src=o;r.async=true;i=t.getElementsByTagName("script")[0];i.parentNode.insertBefore(r,i)})(window,document,"https://diffuser-cdn.app-us1.com/diffuser/diffuser.js","vgo");
vgo('setAccount', '252687469');
vgo('setTrackByDefault', true);
vgo('process');
</script>

</body>
</html>