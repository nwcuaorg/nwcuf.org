<?php

function columns( $num=1 ) {
	$cols = get_cmb_value( 'columns_' . $num );
	if ( !empty( $cols ) || has_cmb_value( 'columns_' . $num . '_content' ) ) {
		?>
	<div class="work-title bg-<?php show_cmb_value( 'columns_' . $num . '_color' ) ?>">
		<div class="wrap">
			<h2><?php show_cmb_value( 'columns_' . $num . '_title', 'Our Work' ) ?></h2>
		</div>
	</div>

	<div class="our-work group">
		<div class="wrap">
			<?php if ( has_cmb_value( 'columns_' . $num . '_content' ) ) { ?>
			<div class="content-wide columns-content">
				<?php print apply_filters( 'the_content', get_cmb_value( 'columns_' . $num . '_content' ) ); ?>
			</div>
			<?php } ?>

		<?php
		if ( !empty( $cols ) ) {
			foreach ( $cols as $a_col ) {
				if ( !empty( $a_col['image'] ) ) { 
					?>
			<article class="third">
				<img src="<?php print $a_col['image'] ?>" />
				<?php if ( !empty( $a_col['title'] ) ) { ?><h4><?php print $a_col['title'] ?></h4><?php } ?>
				<?php if ( !empty( $a_col['content'] ) ) { ?><p class="content"><?php print apply_filters( 'the_content', $a_col['content'] ); ?></p><?php } ?>
				<p class="buttons">
					<?php if ( !empty( $a_col['orange_text'] ) && !empty( $a_col['orange_link'] ) ) { ?>
					<a href="<?php print $a_col['orange_link'] ?>" class="button orange"><?php print $a_col['orange_text'] ?></a><br>
					<?php } ?>
					<?php if ( !empty( $a_col['second_text'] ) && !empty( $a_col['second_link'] ) ) { ?>
					<a href="<?php print $a_col['second_link'] ?>" class="button bg-<?php show_cmb_value( 'columns_' . $num . '_color' ) ?>"><?php print $a_col['second_text'] ?></a><br>
					<?php } ?>
					<?php if ( !empty( $a_col['quiet'] ) ) { ?>
					<span class="quiet"><?php print $a_col['quiet'] ?></span>
					<?php } ?>
				</p>
			</article>
					<?php
				}
			}
		}
		?>
		</div>
	</div>
	<?php
	}
}

?>