<?php 
get_header();
if (have_rows('flexible_content')):
    while (have_rows('flexible_content')) : the_row();
        include locate_template('flexible-content/' . str_replace('_', '-', get_row_layout()) . '.php');
    endwhile;
endif;
get_footer(); ?>

