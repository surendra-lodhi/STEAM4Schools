<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package iCode
 */

get_header(); ?>

<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<main id="main" role="main" class="text-center page-404">
				<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'icode' ); ?></h1>
				<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'icode' ); ?></p>
				<?php get_search_form(); ?>
			</main><!-- #main -->
		</div>
	</div>
</div>

<?php
get_footer();
