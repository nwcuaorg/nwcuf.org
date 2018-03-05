<?php
/*
Home/catch-all template
*/

get_header(); ?>


	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

			<div class="content-narrow">
			<?php
			if ( is_search() ) {
				?><h1>Search Results for <span>'<?php print $_REQUEST["s"]; ?>'</span></h1><?php
			} else {
				?><h1>NWCUF Blog</h1><?php
			}

			while ( have_posts() ) : the_post();
				?>
				<hr>
				<?php the_post_thumbnail(); ?>
				<h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
				<?php the_excerpt(); ?>
				<?php
			endwhile;
			?>
				<div class="group"></div>
			</div>

		</div><!-- #content -->
	</div><!-- #primary -->


<?php get_footer(); ?>