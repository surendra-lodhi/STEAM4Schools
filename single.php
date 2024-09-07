<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package iCode
 */

get_header(); ?>

<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<main id="main" role="main">
				<?php while ( have_posts() ) : the_post();
					echo "<div class=\"breadcrumbs\">";
					get_breadcrumbs($post);
					echo "</div>";
					get_template_part( 'template-parts/content', get_post_format() );
				endwhile; ?>
                <div class="clearfix"></div>
                <section id="single-related-posts">
                    <h4>Related Articles</h4>
                    <?php
                        // create new query
                        $related = new WP_Query(
                            array(
                                'category__in'   => wp_get_post_categories($post->ID),
                                'posts_per_page' => 3,
                                'post__not_in'   => array($post->ID),
                                'post_status'    => 'publish',
                                'order'          => 'DESC',
                                'orderby'        => 'date',
                            )
                        );

                        // loop through related posts if they exist and render template
                        if( $related->have_posts() ) {
                            while( $related->have_posts() ) {
                                $related->the_post();
                                echo '<div class="related-post-wrapper">';
                                get_template_part( 'template-parts/post', 'related');
                                echo '</div>';
                            }
                            wp_reset_postdata();
                        } else {
                            echo '<p>There are no related articles.</p>';
                        }
                    ?>
                </section>
			</main><!-- #main -->
		</div>
	</div>
</div>

<?php
get_footer();
