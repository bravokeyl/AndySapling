<?php
add_action( 'load-post.php', 'bk_post_meta_boxes_setup' );
add_action( 'load-post-new.php', 'bk_post_meta_boxes_setup' );

function bk_post_meta_boxes_setup() {
	add_action( 'add_meta_boxes', 'bk_add_post_meta_boxes' );
  add_action( 'save_post', 'bk_save_post_meta', 10, 2 );
}

function bk_add_post_meta_boxes() {
	add_meta_box(
    'bk-testimonial-title',      // Unique ID
    esc_html__( 'Add gallery', 'hdsl' ),    // Title
    'bk_testimonial_meta_box',   // Callback function
    'testimonials',         // Admin page (or post type)
    'normal',         // Context
    'default'         // Priority
  );
}

function bk_testimonial_meta_box($object, $box) {
	?>

  <?php wp_nonce_field( basename( __FILE__ ), 'bk_testimonial_nonce' ); ?>

  <p>
  	<label for="bk-testimonial-title"><?php _e( "Add ID's of images to the gallery.", 'hdsl' ); ?></label>
    <br />
    <?php
    $field_value = get_post_meta( $object->ID, '_bk_testimonial_title', true );
    ?>
   <input type="text" id="_bk_testimonial_title" name="_bk_testimonial_title"
   value="<?php echo esc_attr($field_value);?>">
   </p>

<?php
}


/* Save the meta box's post metadata. */
function bk_save_post_meta( $post_id, $post ) {

  /* Verify the nonce before proceeding. */
  if ( !isset( $_POST['bk_testimonial_nonce'] ) || !wp_verify_nonce( $_POST['bk_testimonial_nonce'], basename( __FILE__ ) ) )
    return $post_id;

  /* Get the post type object. */
  $post_type = get_post_type_object( $post->post_type );

  /* Check if the current user has permission to edit the post. */
  if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
    return $post_id;

  $new_meta_value = ( isset( $_POST['_bk_testimonial_title'] ) ? $_POST['_bk_testimonial_title'] : '' );

  /* Get the meta key. */
  $meta_key = '_bk_testimonial_title';

  /* Get the meta value of the custom field key. */
  $meta_value = get_post_meta( $post_id, $meta_key, true );

  /* If a new meta value was added and there was no previous value, add it. */
  if ( $new_meta_value && '' == $meta_value )
    add_post_meta( $post_id, $meta_key, $new_meta_value, true );

  /* If the new meta value does not match the old value, update it. */
  elseif ( $new_meta_value && $new_meta_value != $meta_value )
    update_post_meta( $post_id, $meta_key, $new_meta_value );

  /* If there is no new meta value but an old value exists, delete it. */
  elseif ( '' == $new_meta_value && $meta_value )
    delete_post_meta( $post_id, $meta_key, $meta_value );

}
