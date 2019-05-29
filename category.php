<?php
/**
 * The template for displaying Category pages
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */


// ignore sticky posts using the pre_get_posts hook instead of query_posts (buuuugs)
function category_query_adjust( $query ) {
    if ( $query->is_home() && $query->is_main_query() ) {
        $query->set( 'ignore_sticky_posts', true );
    }
}
add_action( 'pre_get_posts', 'category_query_adjust' );


get_header();

?>

	<div class="wrap content-wide">
		<div class="articles-listing">
		<h1><?php single_cat_title(); ?></h1><br>
		<?php
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

