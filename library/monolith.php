<?php

function columns( $num=1 ) {
	$page_id = get_the_ID();
	$cols = get_cmb_value( 'columns_' . $num );
	if ( !empty( $cols ) || has_cmb_value( 'columns_' . $num . '_content' ) ) {
		?>
	<div class="work-title bg-<?php show_cmb_value( 'columns_' . $num . '_color' ) ?>">
		<div class="wrap">
			<h2><?php show_cmb_value( 'columns_' . $num . '_title', 'Our Work' ) ?></h2>
		</div>
	</div>

	<?php if ( has_cmb_value( 'columns_' . $num . '_content' ) ) { ?>
	<div class="wrap">
		<div class="content-wide columns-content">
			<?php print apply_filters( 'the_content', get_cmb_value( 'columns_' . $num . '_content' ) ); ?>
		</div>
	</div>
	<?php } ?>
	<div class="our-work group">
		<div class="wrap">

		<?php
		if ( !empty( $cols ) ) {
			foreach ( $cols as $a_col ) { 
				?>
			<article class="column">
				<div class="col-content">
					<?php if ( $page_id == 3296 && $num == 2 ) { ?><a href="<?php print $a_col['orange_link']; ?>"><?php } ?>
					<?php if ( !empty( $a_col['image'] ) ) { ?><img src="<?php print $a_col['image'] ?>" alt="<?php print ( !empty( $a_col['title'] ) ? $a_col['title'] : 'Icon' ); ?>" /><?php } ?>
					<?php if ( $page_id == 3296 && $num == 2 ) { ?></a><?php } ?>
					<?php if ( !empty( $a_col['title'] ) ) { ?><h4><?php print $a_col['title'] ?></h4><?php } ?>
					<?php if ( !empty( $a_col['content'] ) ) { ?><p class="content"><?php print apply_filters( 'the_content', $a_col['content'] ); ?></p><?php } ?>
				</div>
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
		?>
		</div>
	</div>
	<?php
	}
}

?>