<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
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
    if (have_rows('flexible_content')):
        while (have_rows('flexible_content')) : the_row();
            include locate_template('flexible-content/' . str_replace('_', '-', get_row_layout()) . '.php');
        endwhile;
    endif;
?>

<?php
get_footer();
