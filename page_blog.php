<?php
/**
* Template Name: Blog
*/

//* Add landing body class to the head
remove_action( 'genesis_after_endwhile', 'genesis_posts_nav' );

//* Add wrap for custom header
add_action( 'genesis_before_header', 'bk_sapling_blog_header_wrap' );
add_action( 'genesis_after_header', 'bk_sapling_blog_header_wrap_close' );

remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );
remove_action( 'genesis_entry_content', 'genesis_do_post_image', 8 );
remove_action( 'genesis_entry_footer', 'genesis_post_meta' );

add_action( 'genesis_entry_header', 'genesis_do_post_image', 8 );

add_action( 'genesis_after_endwhile', 'genesis_posts_nav' );

function bk_sapling_blog_header_wrap (){ ?>
    <div class="dark-bg header-wrap" style="background-image: url(); ">
<?php
}

function bk_sapling_blog_header_wrap_close (){ ?>
        <div class="intro-section wrap">
            <h1 class="entry-title">
                <?php //the_field( 'product-intro-title' ); ?>
            </h1>
            <?php //the_field( 'product-intro-desc' ); ?>
        </div>
    </div><!-- end of .header-wrap -->
<?php
    genesis_do_subnav();
}

function be_archive_post_class( $classes ) {
	// Don't run on single posts or pages
	if( is_singular() )
		return $classes;
	$classes[] = 'one-third';
	global $wp_query;
	if( 0 == $wp_query->current_post || 0 == $wp_query->current_post % 3 )
		$classes[] = 'first';
	return $classes;
}

add_filter( 'post_class', 'be_archive_post_class' );

genesis();
