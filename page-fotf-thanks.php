<?php

/*
Template Name: FOTF Thanks
*/

get_header();


// retrieve entry ID from url
$entry_id = $_REQUEST['entry'];

?>

	<?php the_large_title(); ?>

	<?php the_showcase(); ?>
	
	<?php if ( has_cmb_value( 'left_content' ) ) { ?>
	<div id="content" class="wrap group content-two-column" role="main">
		<div class="three-quarter">
	<?php } else { ?>
	<div id="content" class="wrap group content-wide" role="main">
	<?php } ?>
		<?php 
		if ( have_posts() ) :
			while ( have_posts() ) : the_post(); 
				the_content();
				$entry = GFAPI::get_entry( $entry_id );
				if ( isset( $entry['18'] ) ) print "<p>Your confirmation code is: " . $entry['18'] . "</p>";
			endwhile;
		endif;
		?>
		<?php if ( has_cmb_value( 'left_content' ) ) { ?>
		</div>
		<div class="quarter">
			<?php show_cmb_wysiwyg_value( 'left_content' ) ?>
		</div>
<?php } ?>
	</div><!-- #content -->

<?php

get_footer();

?>