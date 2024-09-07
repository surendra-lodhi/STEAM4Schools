<?php
function add_hero_meta_box() {
	add_meta_box(
		'hero_meta_box', // $id
		'Hero Image', // $title
		'show_hero_meta_box', // $callback
		array('post','page'), // $screen
		'normal', // $context
		'high' // $priority
	);
}
////add_action( 'add_meta_boxes', 'add_hero_meta_box' );

function show_hero_meta_box() {
    global $post;  
    
		$meta = get_post_meta( $post->ID, 'hero', true ); ?>

  <input type="hidden" name="hero_meta_box_nonce" value="<?php echo wp_create_nonce( basename(__FILE__) ); ?>">
  <p>
    <label for="hero[image]">Image Upload</label><br>
    <input type="text" name="hero[image]" id="hero[image]" class="meta-image regular-text" value="<?php if (is_array($meta) && isset($meta['image'])){ echo $meta['image']; }?>">
    <input type="button" class="button image-upload" value="Browse">
  </p>
  <div class="image-preview"><img src="<?php if (is_array($meta) && isset($meta['image'])){ echo $meta['image']; }?>" style="max-width: 250px;"></div>


  <script>
   jQuery(document).ready(function ($) {
      // Instantiates the variable that holds the media library frame.
      var meta_image_frame;
      // Runs when the image button is clicked.
      $('.image-upload').click(function (e) {
        // Get preview pane
        var meta_image_preview = $(this).parent().parent().children('.image-preview');
        // Prevents the default action from occuring.
        e.preventDefault();
        var meta_image = $('.meta-image');
        // If the frame already exists, re-open it.
        if (meta_image_frame) {
          meta_image_frame.open();
          return;
        }
        // Sets up the media library frame
        meta_image_frame =  wp.media({
          title: 'Select a Hero Image',
          button: {
            text: 'Use This Image'
          }
        });
        // Runs when an image is selected.
        meta_image_frame.on('select', function () {
          // Grabs the attachment selection and creates a JSON representation of the model.
          var media_attachment = meta_image_frame.state().get('selection').first().toJSON();
          // Sends the attachment URL to our custom image input field.
          meta_image.val(media_attachment.url);
          meta_image_preview.children('img').attr('src', media_attachment.url);
        });
        // Opens the media library frame.
        meta_image_frame.open();
      });
    });
  </script>

  <?php }
function save_hero_meta( $post_id ) {   
	// verify nonce
	if ( isset($_POST['hero_meta_box_nonce']) 
			&& !wp_verify_nonce( $_POST['hero_meta_box_nonce'], basename(__FILE__) ) ) {
			return $post_id; 
		}
	// check autosave
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return $post_id;
	}
	// check permissions
	if (isset($_POST['post_type'])) { //Fix 2
        if ( 'page' === $_POST['post_type'] ) {
            if ( !current_user_can( 'edit_page', $post_id ) ) {
                return $post_id;
            } elseif ( !current_user_can( 'edit_post', $post_id ) ) {
                return $post_id;
            }  
        }
    }
	
	$old = get_post_meta( $post_id, 'hero', true );
		if (isset($_POST['hero'])) { //Fix 3
			$new = $_POST['hero'];
			if ( $new && $new !== $old ) {
				update_post_meta( $post_id, 'hero', $new );
			} elseif ( '' === $new && $old ) {
				delete_post_meta( $post_id, 'hero', $old );
			}
		}
}

//add_action( 'save_post', 'save_hero_meta' );

?>