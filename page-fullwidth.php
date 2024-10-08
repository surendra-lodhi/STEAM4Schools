<?php
/**
 * Template Name: Full Width
 *
 * The template for displaying full width pages.
 *
 * @package iCode
 */

get_header(); ?>

<div class="container">
	<main id="main" role="main">
		<?php while ( have_posts() ) : the_post();
			echo "<div class=\"breadcrumbs\">";
			get_breadcrumbs($post);
			echo "</div>";
			get_template_part( 'template-parts/content', 'page' );
		endwhile; ?>
	</main><!-- #main -->
</div>

<?php
get_footer();
