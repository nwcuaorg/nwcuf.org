<?php


function the_large_title() {

	// get the slides
	if ( has_cmb_value( 'large-title' ) ) {
		?>
		<div class="large-title text-<?php show_cmb_value( 'large-title-color' ) ?>">
			<div class="wrap">
				<table cellpadding="0" cellspacing="0" width="100%">
					<tr>
					<?php if ( has_cmb_value( 'large-title-icon' ) ) { ?>
						<td valign="center" class="large-title-icon"><img src="<?php show_cmb_value( 'large-title-icon' ) ?>"></td>
					<?php } ?>
						<td valign="center" class="large-title-text"><h1><?php show_cmb_value( 'large-title' ) ?></h1></td>
					</tr>
				</table>
			</div>
		</div>
		<?php
	}
	
}


?>