<?php

/*
Template Name: Monolith
*/

get_header();

?>

	<?php the_showcase(); ?>

	<?php the_large_title(); ?>
	
	<div class="content-work">
		<div class="wrap content-wide">
			<?php 
			if ( have_posts() ) :
				while ( have_posts() ) : the_post(); 
					the_content();
				endwhile;
			endif;
			?>
		</div>
	</div>
	
	<?php columns( 1 ); ?>
	
	<?php columns( 2 ); ?>
	
	<?php columns( 3 ); ?>

<?php 

get_footer();

?>