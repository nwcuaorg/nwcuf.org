<?php
/**
 * The Template for displaying all single posts
 */

get_header();

?>
	<?php 
	if ( have_posts() ) :
		while ( have_posts() ) : the_post(); 
			global $post;
			?>
	<div class="large-title text-lime">
		<div class="wrap">
			<table cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td valign="center" class="large-title-icon"><img src="/wp-content/uploads/2019/04/icon.png"></td>
					<td valign="center" class="large-title-text"><h1>Get Involved</h1></td>
				</tr>
			</table>
		</div>
	</div>
	<div id="content" class="site-content content-wide single-job" role="main">
		<div id="content" class="wrap group content-two-column" role="main">
			<h1><?php the_title(); ?></h1>
			<div class="two-third">
				<p><strong>Job Description:</strong></p>
				<?php the_content(); ?>
				<br>
					<?php
					
					if ( has_cmb_value( 'job_education' ) ) { 
						print "<p><strong>Education/Experience Required:</strong></p>";
						print apply_filters( 'the_content', get_cmb_value( 'job_education' ) ) . "<br>";
					}

					if ( has_cmb_value( 'job_comments' ) ) { 
						print "<p><strong>Additional Comments:</strong></p>";
						print apply_filters( 'the_content', get_cmb_value( 'job_comments' ) ) . "<br>";
					}

					?>
	
			</div>
			<div class="third job-info">
				<?php
				// display credit union name
				print ( has_cmb_value( 'job_company' ) ? "<p><strong>Credit Union:</strong><br> " . get_cmb_value( 'job_company' ) . "</p>" : '' );

				// display region
				print ( has_cmb_value( 'job_region' ) ? "<p><strong>Region:</strong> " . get_cmb_value( 'job_region' ) . "</p>" : '' ) ;

				// display job type
				print ( has_cmb_value( 'job_type' ) ? "<p><strong>Type:</strong> " . get_cmb_value( 'job_type' ) . "</p>" : '' );
				?>
				<?php if ( has_cmb_value( 'job_contact_name' ) ) { ?>
				<p>
				<?php print ( has_cmb_value( 'job_contact_name' ) ? "<strong>Contact:</strong> " . get_cmb_value( 'job_contact_name' ) . '<br>' : '' ); ?>
				<?php print ( has_cmb_value( 'job_contact_email' ) ? '<strong>Email:</strong> <a href="' . get_cmb_value( 'job_contact_email' ) . '">' . get_cmb_value( 'job_contact_email' ) . '</a><br>' : '' ); ?>
				<?php print ( has_cmb_value( 'job_contact_phone' ) ? '<strong>Phone:</strong> ' . get_cmb_value( 'job_contact_phone' ) . '<br>' : '' ); ?>
				<?php print ( has_cmb_value( 'job_contact_fax' ) ? "<strong>Fax:</strong> " . get_cmb_value( 'job_contact_fax' ) . "<br>" : '' ); ?>
				</p>
				<?php } ?>

				<?php
				// display job type
				print ( has_cmb_value( 'job_expires' ) ? "<p><strong>Closing:</strong> " . date( "n/j/Y", strtotime( get_cmb_value( 'job_expires' ) ) ) . "</p>" : '' );
				?>
			</div>
		</div><!-- #content -->
	</div>
		<?php
	endwhile;
endif;
?>
<?php 

get_footer();

?>