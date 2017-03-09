<?php
/**
* Template Name: Blog
*/
add_action('genesis_after_header','genesis_do_subnav');
remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );
remove_action( 'genesis_entry_content', 'genesis_do_post_image', 8 );
remove_action( 'genesis_entry_footer', 'genesis_post_meta' );

add_action( 'genesis_entry_header', 'genesis_do_post_image', 8 );
genesis();
