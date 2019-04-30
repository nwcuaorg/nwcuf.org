<?php
/**
 * The Template for displaying all single posts
 */

get_header();

?>
	<div id="primary" class="site-content">

		<div id="content" class="site-content content-narrow single-article" role="main">
		<?php 
		if ( have_posts() ) :
			while ( have_posts() ) : the_post(); 
				$article_cat = get_categories();
				?>
			<article <?php post_class() ?>>
				<h2><?php the_title(); ?></h2>
				<div class="article-thumbnail">
					<?php the_post_thumbnail(); ?>
				</div>
				<?php the_content(); ?>
				<?php
			endwhile;
		endif;
		?>
		</div><!-- #content -->

	</div><!-- #primary -->
	<?php
	$cats = get_the_category();
	if ( !empty( $cats ) ) {
		$article_cat = $cats[0]->term_id;
		if ( $article_cat == 7 ) {
			$color = "lime";
		} else if ( $article_cat == 8 ) {
			$color = "teal";
		} else if ( $article_cat == 5 ) {
			$color = "navy";
		} else {
			$color = "grey";
		}
		$args = array(
			'posts_per_page' => 3,
			'cat' => $article_cat
		);
		$posts_array = get_posts( $args );
		if ( !empty( $posts_array ) ) {
		?>
	<div class="work-title bg-<?php print $color; ?>">
		<div class="wrap">
			<h2>Other Stories</h2>
		</div>
	</div>

	<div class="footer-articles">
		<div class="wrap group">
		<?php 
		if ( !empty( $posts_array ) ) {
			foreach ( $posts_array as $a_post ) {
				?>
			<article class="post-<?php print $article_cat; ?> <?php print $color; ?>">
				<div class="article-thumbnail">
					<img src="<?php print get_the_post_thumbnail_url( $a_post->ID, 'post-thumbnail' ); ?>" />
				</div>
				<div class="article-content">
					<h5><a href="<?php print $a_post->guid ?>"><?php print $a_post->post_title ?></a></h5>
					<p><?php print wp_trim_words( wpautop( $a_post->post_content ), 24, '...' ); ?> <a href="<?php print get_permalink( $a_post->ID ); ?>">Read more &raquo;</a></p>
				</div>
			</article>
				<?php 
			}
		}
		?>
		</div>
	</div>
		<?php 
		}
	}
	


get_footer();

?>