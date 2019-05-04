<?php


function shorten_article( $post_info, $num_words = 24 ) {
	if ( !empty( $post_info->post_excerpt ) ) {
		print apply_filters( 'the_content', $post_info->post_excerpt );
	} else {
		print apply_filters( 'the_content', wp_trim_words( $post_info->post_content, $num_words, '...' ) );
	}
}


