<?php
/*
Home/catch-all template
*/

get_header(); ?>

	<div class="wrap content-wide">
		<div class="articles-listing">
		<?php
		if ( is_search() ) {
			?><h1>Search Results for <span>'<?php print $_REQUEST["s"]; ?>'</span></h1><br><?php
		} else {
			?><h1>News</h1><br><?php
		}

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

<?php get_footer(); ?>