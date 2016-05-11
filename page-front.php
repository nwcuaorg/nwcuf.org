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
				<a href="/scholarships-and-grants"><img src="<?php bloginfo('template_url') ?>/img/home-scholarships.png"></a>
			</section>

			<section>
				<a href="/programs"><img src="<?php bloginfo('template_url') ?>/img/home-programs.png"></a>
			</section>

			<section>
				<a href="/give-to-nwcuf"><img src="<?php bloginfo('template_url') ?>/img/home-donate.png"></a>
			</section>

			<section>
				<a href="/partnerships-and-resources"><img src="<?php bloginfo('template_url') ?>/img/home-friends.png"></a>
			</section>

		</div>

	</div>
	
	<div class="bg-teal bg-stripes">
		<div class="wrap content-wide home">
			<?php 
			if ( have_posts() ) :
				while ( have_posts() ) : the_post(); 
					the_content();
				endwhile;
			endif;
			?>
		</div>
	</div>


<?php 

get_footer();

?>