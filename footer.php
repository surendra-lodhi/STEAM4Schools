<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package iCode
 */
?>

<?php if (is_front_page() || is_page() || is_single()) : ?>
    </div><!-- #content / #front-page -->
<?php else : ?>
    </div><!-- .container -->
    </div><!-- #content / #front-page -->
<?php endif; ?>
<footer id="site-footer" role="contentinfo">
    <?php if (is_active_sidebar('footer-1') or is_active_sidebar('footer-2') or is_active_sidebar('footer-3') or is_active_sidebar('footer-4')) : ?>
        <div class="container-fluid footer-info">
            <div class="container">
                <div class="row">
                    <?php if (is_active_sidebar('footer-1')) : ?>
                        <div class="col-sm-6 col-md-4">
                            <?php dynamic_sidebar('footer-1'); ?>
                        </div>
                    <?php endif; ?>
                    <?php if (is_active_sidebar('footer-2')) : ?>
                        <div class="col-sm-6 col-md-4">
                            <?php dynamic_sidebar('footer-2'); ?>
                        </div>
                    <?php endif; ?>
                    <?php if (get_option('primary_email') or get_option('social_facebook') or get_option('social_twitter') or get_option('social_instagram') or get_option('social_linkedin') or get_option('social_pinterest') or get_option('social_youtube') or get_option('social_yelp') or get_option('social_houzz') or get_option('social_rss')) : ?>
                        <div class="col-sm-6 col-md-4">
                            <p><span class="widget-title">FOLLOW US</span></p>
                            <ul class="social-list">
                                <?php if (get_option('social_facebook')) : ?>
                                    <li><a href="<?php echo get_option('social_facebook'); ?>" target="_blank" class="facebook"><i class="fa fa-facebook"></i></a></li>
                                    <?php
                                endif;
                                if (get_option('social_twitter')) :
                                    ?>
                                    <li><a href="<?php echo get_option('social_twitter'); ?>" target="_blank" class="twitter"><i class="fa fa-twitter"></i></a></li>
                                    <?php
                                endif;
                                if (get_option('social_instagram')) :
                                    ?>
                                    <li><a href="<?php echo get_option('social_instagram'); ?>" target="_blank" class="instagram"><i class="fa fa-instagram"></i></a></li>
                                    <?php
                                endif;
                                if (get_option('social_linkedin')) :
                                    ?>
                                    <li><a href="<?php echo get_option('social_linkedin'); ?>" target="_blank" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
                                    <?php
                                endif;
                                if (get_option('social_pinterest')) :
                                    ?>
                                    <li><a href="<?php echo get_option('social_pinterest'); ?>" target="_blank" class="pinterest"><i class="fa fa-pinterest-p"></i></a></li>
                                    <?php
                                endif;
                                if (get_option('social_youtube')) :
                                    ?>
                                    <li><a href="<?php echo get_option('social_youtube'); ?>" target="_blank" class="youtube"><i class="fa fa-youtube"></i></a></li>
                                    <?php
                                endif;
                                if (get_option('social_yelp')) :
                                    ?>
                                    <li><a href="<?php echo get_option('social_yelp'); ?>" target="_blank" class="yelp"><i class="fa fa-yelp"></i></a></li>
                                    <?php
                                endif;
                                if (get_option('social_houzz')) :
                                    ?>
                                    <li><a href="<?php echo get_option('social_houzz'); ?>" target="_blank" class="houzz"><i class="fa fa-houzz"></i></a></li>
                                    <?php
                                endif;
                                if (get_option('social_rss')) :
                                    ?>
                                    <li><a href="<?php echo get_option('social_rss'); ?>" target="_blank" class="rss"><i class="fa fa-rss"></i></a></li>
                                <?php endif; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                    <?php if (is_active_sidebar('footer-3')) : ?>
                        <div class="col-sm-6 col-md-3">
                            <?php dynamic_sidebar('footer-3'); ?>
                        </div>
                    <?php endif; ?>
                </div>

            </div>
        </div><!-- .footer-info -->
    <?php endif; ?>

    <div class="container-fluid copybar">
        <div class="container">
            <p>
                &copy; <?php echo current_time('Y'); ?> <a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a><br class="mobile-only"><span class="sep"> | </span> All Rights Reserved. <br class="mobile-only"><?php printf(esc_html__('Website by %1$s', 'icode'), "<a href='" . esc_url('https://icodeschool.com/') . "' rel='designer'>" . __('iCode', 'icode') . "</a>"); ?>
            </p>
        </div>
    </div><!-- copybar -->

</footer><!-- #site-footer -->

<?php
wp_footer();
// Load in footer code snippets only if theme option is in use
if (get_option('snippets_footer')) :
    echo get_option('snippets_footer');
endif;
// Load in conversion tracking only if theme option is in use and only on the specified page
if (get_option('conversion_page') && get_option('conversion_code')) :
    if (is_page(get_option('conversion_page'))) :
        echo get_option('conversion_code');
    endif;
endif;
?>

</body>

</html>