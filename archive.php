<?php
add_filter( 'genesis_site_layout', '__genesis_return_content_sidebar' );
add_action('genesis_after_header','genesis_do_subnav');
remove_action( 'genesis_entry_header', 'genesis_post_info', 8 );
remove_action( 'genesis_entry_content', 'genesis_do_post_image', 8 );
remove_action( 'genesis_entry_footer', 'genesis_post_meta' );

function bk_archive_post_class( $classes ) {
	if( is_singular() )
		return $classes;
	$classes[] = 'one-third';
	global $wp_query;
	if( 0 == $wp_query->current_post || 0 == $wp_query->current_post % 3 )
		$classes[] = 'first';
	return $classes;
}

add_filter( 'post_class', 'bk_archive_post_class' );

add_action( 'genesis_entry_header', 'genesis_do_post_image', 8 );
genesis();
