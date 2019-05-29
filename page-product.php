<?php

/*
Template Name: Product
*/

get_header();

?>

	<?php the_showcase( get_cmb_value( 'large-title-color' ) ); ?>

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
	
	<?php if ( has_cmb_value( 'stat_number' ) && has_cmb_value( 'stat_label' ) && has_cmb_value( 'stat_content' ) ) { ?>
	<div class="work-title bg-<?php show_cmb_value( 'large-title-color' ) ?>">
		<div class="wrap">
			<h2>Impact</h2>
		</div>
	</div>

	<div class="impact-stat">
		<div class="wrap group">
			<div class="half">
				<div class="stat-number text-<?php show_cmb_value( 'large-title-color' ) ?>"><?php show_cmb_value( 'stat_number' ) ?></div>
				<div class="stat-label text-<?php show_cmb_value( 'large-title-color' ) ?>"><?php show_cmb_value( 'stat_label' ) ?></div>
			</div>
			<div class="half stat-content">
				<?php print wpautop( get_cmb_value( 'stat_content' ) ); ?>
			</div>
		</div>
	</div>
	<?php } ?>
	
	<?php 
	$work = get_cmb_value( 'work' );
	if ( !empty( $work ) ) {
		?>
	<div class="work-title bg-<?php show_cmb_value( 'large-title-color' ) ?>">
		<div class="wrap">
			<h2><?php show_cmb_value( 'work_title', 'Our Work' ) ?></h2>
		</div>
	</div>

	<div class="our-work group">
		<div class="wrap">
		<?php
		foreach ( $work as $a_work ) {
			if ( !empty( $a_work['image'] ) ) { 
				?>
		<article class="third">
			<div class="col-content">
				<img src="<?php print $a_work['image'] ?>" />
				<?php if ( !empty( $a_work['title'] ) ) { ?><h4><?php print $a_work['title'] ?></h4><?php } ?>
				<?php if ( !empty( $a_work['content'] ) ) { ?>
				<p class="content"><?php print $a_work['content'] ?></p>
			</div>
			<?php } ?>
			<p class="buttons">
				<?php if ( !empty( $a_work['orange_text'] ) && !empty( $a_work['orange_link'] ) ) { ?>
				<a href="<?php print $a_work['orange_link'] ?>" class="button orange"><?php print $a_work['orange_text'] ?></a><br>
				<?php } ?>
				<?php if ( !empty( $a_work['second_text'] ) && !empty( $a_work['second_link'] ) ) { ?>
				<a href="<?php print $a_work['second_link'] ?>" class="button bg-<?php show_cmb_value( 'large-title-color' ) ?>"><?php print $a_work['second_text'] ?></a><br>
				<?php } ?>
				<?php if ( !empty( $a_work['quiet'] ) ) { ?>
				<span class="quiet"><?php print $a_work['quiet'] ?></span>
				<?php } ?>
			</p>
		</article>
				<?php
			}
		}
		?>
		</div>
	</div>
	<?php
	}
	?>
	
	<?php
	$cats = get_the_category();
	if ( !empty( $cats ) ) {
		$article_cat = $cats[0]->term_id;
		$args = array(
			'posts_per_page' => 1,
			'cat' => $article_cat
		);
		$posts_array = get_posts( $args );
		if ( !empty( $posts_array ) ) {
		?>
	<div class="work-title bg-<?php show_cmb_value( 'large-title-color' ) ?>">
		<div class="wrap">
			<h2>Our Stories</h2>
		</div>
	</div>

	<div class="product-articles">
		<div class="wrap group">
		<?php 
		if ( !empty( $posts_array ) ) {
			foreach ( $posts_array as $a_post ) {
				?>
			<article class="<?php show_cmb_value( 'large-title-color' ) ?>">
				<div class="article-thumbnail">
					<img src="<?php print get_the_post_thumbnail_url( $a_post->ID, 'post-thumbnail' ); ?>" />
				</div>
				<div class="article-content">
					<h5><a href="<?php print get_permalink( $a_post->ID ); ?>"><?php print $a_post->post_title ?></a></h5>
					<?php shorten_article( $a_post, 100 ); ?> <a href="<?php print get_permalink( $a_post->ID ); ?>">Read more &raquo;</a>
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
	?>

<?php 

get_footer();

?>