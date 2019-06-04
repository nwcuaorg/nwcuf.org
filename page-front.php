<?php

/*
Template Name: Homepage
*/

get_header();

?>

	<?php the_showcase(); ?>

	<div class="group home-sections">	
		<div class="wrap">

			<section class="first <?php show_cmb_value( 'home_third_1_color', 'navy' ) ?>">
				<?php if ( has_cmb_value( 'home_third_1_url' ) ) { ?><a href="<?php show_cmb_value( 'home_third_1_url', '#' ) ?>"><?php } ?>
				<div class="solid">
					<img src="<?php show_cmb_value( 'home_third_1_icon', get_bloginfo( 'template_url' ) . '/img/icon-temp.png' ) ?>" alt="<?php show_cmb_value( 'home_third_1_title', 'Left<br> Title' ) ?>" />
					<h3><?php show_cmb_value( 'home_third_1_title', 'Left<br> Title' ) ?></h3>
					<p><?php show_cmb_value( 'home_third_1_subtitle', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.' ); ?></p>
				</div>
				<div class="light">
					<h2><?php show_cmb_value( 'home_third_1_stat_number', '99%' ); ?></h2>
					<p><?php show_cmb_value( 'home_third_1_stat_label', 'of statistics are fake.' ); ?></p>
				</div>
				<?php if ( has_cmb_value( 'home_third_1_url' ) ) { ?></a><?php } ?>
			</section>

			<section class="second <?php show_cmb_value( 'home_third_2_color', 'lime' ) ?>">
				<?php if ( has_cmb_value( 'home_third_2_url' ) ) { ?><a href="<?php show_cmb_value( 'home_third_2_url', '#' ) ?>"><?php } ?>
				<div class="solid">
					<img src="<?php show_cmb_value( 'home_third_2_icon', get_bloginfo( 'template_url' ) . '/img/icon-temp.png' ) ?>" alt="<?php print str_replace( '*', '<br>', get_cmb_value( 'home_third_2_title', 'Center<br> Title' ) ) ?>" />
					<h3><?php print str_replace( '*', '<br>', get_cmb_value( 'home_third_2_title', 'Center<br> Title' ) ) ?></h3>
					<p><?php show_cmb_value( 'home_third_2_subtitle', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.' ); ?></p>
				</div>
				<div class="light">
					<h2><?php show_cmb_value( 'home_third_2_stat_number', '99%' ); ?></h2>
					<p><?php show_cmb_value( 'home_third_2_stat_label', 'of statistics are fake.' ); ?></p>
				</div>
				<?php if ( has_cmb_value( 'home_third_2_url' ) ) { ?></a><?php } ?>
			</section>

			<section class="last <?php show_cmb_value( 'home_third_3_color', 'teal' ) ?>">
				<?php if ( has_cmb_value( 'home_third_3_url' ) ) { ?><a href="<?php show_cmb_value( 'home_third_3_url', '#' ) ?>"><?php } ?>
				<div class="solid">
					<img src="<?php show_cmb_value( 'home_third_3_icon', get_bloginfo( 'template_url' ) . '/img/icon-temp.png' ) ?>" alt="<?php show_cmb_value( 'home_third_3_title', 'Right<br> Title' ) ?>" />
					<h3><?php show_cmb_value( 'home_third_3_title', 'Right<br> Title' ) ?></h3>
					<p><?php show_cmb_value( 'home_third_3_subtitle', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.' ); ?></p>
				</div>
				<div class="light">
					<h2><?php show_cmb_value( 'home_third_3_stat_number', '99%' ); ?></h2>
					<p><?php show_cmb_value( 'home_third_3_stat_label', 'of statistics are fake.' ); ?></p>
				</div>
				<?php if ( has_cmb_value( 'home_third_3_url' ) ) { ?></a><?php } ?>
			</section>
		</div>
	</div>
	
	<div class="wrap content-wide home">
		<?php 
		if ( have_posts() ) :
			while ( have_posts() ) : the_post(); 
				the_content();
			endwhile;
		endif;
		?>
	</div>

	<div class="footer-articles">
		<div class="wrap group">
		<?php 
		$sticky = get_option( 'sticky_posts' );
		$args = array(
			'posts_per_page' => 3,
			'post__in' => $sticky
		);
		$posts_array = get_posts( $args );
		if ( !empty( $posts_array ) ) {
			foreach ( $posts_array as $a_post ) {
				$color = 'navy';
				if ( in_category( 7, $a_post->ID ) ) {
					$color = 'lime';
				} else if ( in_category( 8, $a_post->ID ) ) {
					$color = 'teal';
				}
				?>
			<article class="<?php print $color ?>">
				<div class="article-thumbnail">
					<img src="<?php print get_the_post_thumbnail_url( $a_post->ID, 'post-thumbnail' ); ?>" />
				</div>
				<div class="article-content">
					<h5><a href="<?php print $a_post->guid ?>"><?php print $a_post->post_title ?></a></h5>
					<?php shorten_article( $a_post ); ?> <a href="<?php print get_permalink( $a_post->ID ); ?>">Read more &raquo;</a>
				</div>
			</article>
				<?php 
			}
		}
		?>
		</div>
	</div>

<?php 

get_footer();

?>