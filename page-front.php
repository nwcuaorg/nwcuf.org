<?php

/*
Template Name: Page - Home
*/

get_header();

?>

	<?php the_showcase(); ?>

	<div class="wrap group">	

		<div class="home-sections">
			
			<section>
				<a href="#"><img src="<?php bloginfo('template_url') ?>/img/home-scholarships.png"></a>
			</section>

			<section>
				<a href="#"><img src="<?php bloginfo('template_url') ?>/img/home-programs.png"></a>
			</section>

			<section>
				<a href="#"><img src="<?php bloginfo('template_url') ?>/img/home-donate.png"></a>
			</section>

			<section>
				<a href="#"><img src="<?php bloginfo('template_url') ?>/img/home-friends.png"></a>
			</section>

		</div>

	</div>

<?php 

get_footer();

?>