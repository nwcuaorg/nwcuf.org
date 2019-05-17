<?php
/**
 * The template for displaying Archive pages
 */

get_header(); 

?>
	<div class="wrap content-wide">
		<div class="articles-listing">
		<h1><?php single_cat_title(); ?></h1><br>
		<?php
		query_posts('ignore_sticky_posts=1');

		while ( have_posts() ) : the_post();
			?>
			<article <?php post_class() ?>>
				<div class="article-thumbnail">
					<?php the_post_thumbnail(); ?>			
				</div>
				<div class="article-content">
					<h5><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h5>
					<?php the_excerpt(); ?>
					<p class="quiet">Posted <?php print get_the_date(); ?> in <?php print get_the_category_list( ', ' ) ?></p>
				</div>
			</article>
			<?php
		endwhile;
		?>
		</div>
		<div class="pagination">
			<?php pagination() ?>
		</div>
	</div>

<?php

get_footer();

