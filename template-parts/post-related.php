<?php
/**
 * Template part for displaying related posts on a singular post page.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package iCode
 */

?>

<div id="related-post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="related-post-img">
        <?php if ( get_the_post_thumbnail() ) :
            $thumbnail_id = get_post_thumbnail_id( $post->ID );
            $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
            echo "<img src='".get_the_post_thumbnail_url()."' class='img-fluid' alt='".$alt."' />";
        endif; ?>
    </div>
    <div class="related-post-title">
        <?php the_title( '<h5><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h5>' ); ?>
        <div class="related-post-meta">
            <a href="<?php esc_url(get_permalink()); ?>"><?php echo get_the_modified_date(); ?></a>
        </div>
    </div>
</div>