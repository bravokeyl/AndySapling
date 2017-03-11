<?php
/*
Template Name: Product
*/

add_action( 'wp_enqueue_scripts', 'bk_enqueue_digital_script' );
function bk_enqueue_digital_script() {

  wp_enqueue_style( 'bk-front-styles', get_stylesheet_directory_uri() . '/style-front.css', array(), CHILD_THEME_VERSION );

}
//* Force full-width-content layout
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );

add_action( 'genesis_after_header', 'bk_product_page_widgets' );
//* Remove the default Genesis loop
remove_action( 'genesis_loop', 'genesis_do_loop' );
//* Remove .site-inner
add_filter( 'genesis_markup_site-inner', '__return_null' );
add_filter( 'genesis_markup_content-sidebar-wrap_output', '__return_false' );
add_filter( 'genesis_markup_content', '__return_null' );
add_theme_support( 'genesis-structural-wraps', array( 'header', 'footer-widgets', 'footer' ) );

//* Add full-width body class to the head
add_filter( 'body_class', 'showcase_add_body_class' );
function showcase_add_body_class( $classes ) {

	$classes[] = 'full-width product-page';
	return $classes;

}

function bk_product_page_widgets(){
  echo '<h2 class="screen-reader-text">' . __( 'Main Content', 'showcase' ) . '</h2>';

  genesis_widget_area( 'product-page-1', array(
    'before' => '<div id="product-page-1" class="product-page-1 front-page-2 flexible-widget-area"><div class="wrap"><div class="flexible-widgets widget-area' . showcase_halves_widget_area_class( 'product-page' ) . '">',
    'after'  => '</div></div></div>',
  ) );
  genesis_widget_area( 'product-page-2', array(
    'before' => '<div id="product-page-2" class="product-page-2 front-page-2 flexible-widget-area"><div class="wrap"><div class="flexible-widgets widget-area' . showcase_halves_widget_area_class( 'product-page' ) . '">',
    'after'  => '</div></div></div>',
  ) );
  genesis_widget_area( 'product-page-3', array(
    'before' => '<div id="product-page-3" class="product-page-3 front-page-2 flexible-widget-area"><div class="wrap"><div class="flexible-widgets widget-area' . showcase_halves_widget_area_class( 'product-page' ) . '">',
    'after'  => '</div></div></div>',
  ) );
  genesis_widget_area( 'product-page-4', array(
    'before' => '<div id="product-page-4" class="product-page-4 front-page-2 flexible-widget-area"><div class="wrap"><div class="flexible-widgets widget-area' . showcase_halves_widget_area_class( 'product-page' ) . '">',
    'after'  => '</div></div></div>',
  ) );
}
//* Run the Genesis loop
genesis();
