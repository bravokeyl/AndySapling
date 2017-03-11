<?php
/*
Template Name: Product
*/

//* Force full-width-content layout
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );

add_action( 'genesis_after_header', 'bk_product_page_widgets' );
//* Remove the default Genesis loop
remove_action( 'genesis_loop', 'genesis_do_loop' );
//* Add full-width body class to the head
add_filter( 'body_class', 'showcase_add_body_class' );
function showcase_add_body_class( $classes ) {

	$classes[] = 'full-width product-page';
	return $classes;

}

function bk_product_page_widgets(){
  echo '<h2 class="screen-reader-text">' . __( 'Main Content', 'showcase' ) . '</h2>';

  genesis_widget_area( 'product-page', array(
    'before' => '<div id="product-page" class="product-page flexible-widget-area"><div class="wrap"><div class="flexible-widgets widget-area' . showcase_halves_widget_area_class( 'product-page' ) . '">',
    'after'  => '</div></div></div>',
  ) );
}
//* Run the Genesis loop
genesis();
