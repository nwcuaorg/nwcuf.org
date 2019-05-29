<?php
/*
Home/catch-all template
*/

get_header(); ?>

		<div class="large-title text-lime">
			<div class="wrap">
				<table cellpadding="0" cellspacing="0" width="100%">
					<tbody><tr>
						<td valign="center" class="large-title-icon"><img src="/wp-content/uploads/2019/04/peopleicons.png"></td>
						<td valign="center" class="large-title-text">
							<?php
							if ( is_search() ) {
								?><h1>Search Results for <span>'<?php print $_REQUEST["s"]; ?>'</span></h1><?php
							} else {
								?><h1>News</h1><?php
							}
							?>
						</td>
					</tr>
				</tbody></table>
			</div>
		</div>
	<div class="wrap content-wide">
		<p>Read the latest updates from the Northwest Credit Union Foundation.</p><br>

		<div class="articles-listing">
		<?php

		query_posts('ignore_sticky_posts=1');

		while ( have_posts() ) : the_post();
			?>
			<article <?php post_class() ?>>
				<div class="article-thumbnail">
					<a href="<?php the_permalink() ?>"><?php the_post_thumbnail(); ?></a>
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