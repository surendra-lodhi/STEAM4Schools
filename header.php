<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package iCode
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php
        if (function_exists('get_field')) {
            $favicon_url = get_field('stream_options_favicon','option');
            if ($favicon_url) {
                echo '<link rel="icon" href="' . esc_url($favicon_url['url']) . '" type="image/x-icon">';
            }
        }
        wp_head();
        // Load in header code snippets only if theme option is in use
        if (get_option('snippets_header')) :
            echo get_option('snippets_header');
        endif;
        // Load in custom styles only if theme option is in use
        if (get_option('custom_css')) :
            echo "<style type='text/css' media='all'>" . get_option('custom_css') . "</style>";
        endif;
        ?>

    </head>

    <body <?php body_class(); ?>>

        <?php
        if (get_option('snippets_body')) : echo get_option('snippets_body');
        endif;
        ?>

        <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'icode'); ?></a>

        <header id="masthead" role="banner">
          <div class="header-top">
            <?php 
                $stream_options_c_phone = get_field('stream_options_c_phone','option');
                $stream_options_c_email = get_field('stream_options_c_email','option');
                $stream_options_s_fb_link = get_field('stream_options_s_fb_link','option');
                $stream_options_s_in_link = get_field('stream_options_s_in_link','option');
                $stream_options_s_li_link = get_field('stream_options_s_li_link','option');
                $stream_options_s_rss_link = get_field('stream_options_s_rss_link','option');
            ?>
               <div class="container">
                   <div class="row">
                       <div class="col-sm-8">
                           <ul class="header-contact">
                            <?php if(!empty($stream_options_c_phone)) { ?>
                               <li><img src="./images/phone-icon.svg" alt=""><a href="tel:<?php echo ($stream_options_c_phone); ?>"><?php echo ($stream_options_c_phone); ?></a></li>
                               <?php } ?>
                               <?php if(!empty($stream_options_c_email)) { ?>
                               <li><img src="./images/email-icon.svg" alt=""><a href="mailto:<?php echo ($stream_options_c_email); ?>"><?php echo ($stream_options_c_email); ?></a></li>
                               <?php }?>
                           </ul>    
                       </div>
                       <div class="col-sm-4">
                           <ul class="social">
                               <?php if(!empty($stream_options_s_fb_link)) { ?>
                                    <li><a href="<?php echo ($stream_options_s_fb_link); ?>"><i class="fa fa-facebook"></i></a></li>
                               <?php }?>
                               <?php if(!empty($stream_options_s_in_link)) { ?>
                                    <li><a href="<?php echo ($stream_options_s_in_link); ?>"><i class="fa fa-instagram"></i></a></li>
                               <?php }?>
                               <?php if(!empty($stream_options_s_li_link)) { ?>
                                    <li><a href="<?php echo ($stream_options_s_li_link); ?>"><i class="fa fa-linkedin"></i></a></li>
                                <?php }?>
                               <?php if(!empty($stream_options_s_rss_link)) { ?>
                                    <li><a href="<?php echo ($stream_options_s_rss_link); ?>"><i class="fa fa-rss"></i></a></li>
                                <?php }?>
                           </ul>
                       </div>
                   </div>
               </div>
           </div>
            <div class="container">
                <div class="row align-items-center header-nav">
                    <div class="col-sm-3">
                        <?php $site_logo = get_field('stream_options_site_logo','option');
                         if ($site_logo) : ?>
                            <div class="header-logo">
                                <p class="site-title">
                                    <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                                        <img src="<?php echo esc_url($site_logo); ?>" alt="<?php bloginfo('name'); ?>" class="img-fluid">
                                    </a>
                                </p>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="col-sm-9 text-center">
                        <div class="header-nav">
                            <nav class="navbar navbar-expand-lg navbar-header" role="navigation">
                                <button class="navbar-toggler" type="button" aria-controls="navbarNav" aria-expanded="false"
                                        aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="mobile-menu-close"><i class="fa fa-times-circle-o" aria-hidden="true"></i></div>
                                <?php
                                wp_nav_menu(array(
                                    'theme_location' => 'primary',
                                    'depth' => 6, // 1 = no dropdowns, 2 = with dropdowns.
                                    'container' => 'div',
                                    'container_class' => 'navbar-collapse',
                                    'container_id' => 'navbarNav',
                                    'menu_class' => 'navbar-nav ml-auto',
                                    'fallback_cb' => false,
                                    'walker' => new WP_Bootstrap_Navwalker(),
                                ));
                                ?>
                                <a href="#" id="search"><i class="fa fa-search"></i></a>
                                <form class="search" id="searchform" method="get" action="<?php echo esc_url(home_url('/')); ?>">
                                    <input type="text" class="search-field" name="s" placeholder="What are you looking for?"
                                           value="<?php echo get_search_query(); ?>">
                                    <button class="search-btn" type="submit">SEARCH</button>
                                </form>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <?php $meta = get_post_meta($post->ID, 'hero', true); ?>
        <?php if (is_front_page()) { ?>
           
            <?php } elseif (is_404()) { ?>
                <div id="content">
                <?php } elseif (is_archive()) { ?>
                    <header class="banner-header"
                            style="background-image: linear-gradient(to right,rgba(0, 0, 0, 0.5) 0%,rgba(0, 0, 0, 0.5) 100%), url('<?php
                            if (is_array($meta) && isset($meta["image"])) {
                                echo $meta["image"];
                            }
                            ?>')">
                            <?php the_archive_title('<h1 class="banner-title">', '</h1>'); ?>
                    </header><!-- .page-header -->
                <?php } elseif (is_search()) { ?>
                    <header class="banner-header" style="background-image: linear-gradient(to right,rgba(0, 0, 0, 0.5) 0%,rgba(0, 0, 0, 0.5) 100%), url('')">
                        <h1 class="banner-title">
                            <?php printf(esc_html__('Search Results for: %s', 'icode'), '<span>' . get_search_query() . '</span>'); ?>
                        </h1>
                    </header>
                <?php } else { ?>
                    <div id="content">
                        <?php if (is_home()) { ?>
                            <header class="banner-header"
                                    style="background-image: linear-gradient(to right,rgba(0, 0, 0, 0.5) 0%,rgba(0, 0, 0, 0.5) 100%), url('')">
                                <div class="container">
                                    <?php (is_home() ? single_post_title('<h1 class="banner-title">', '</h1>') : the_title('<h1 class="banner-title">', '</h1>')); ?>
                                    <?php if ('post' === get_post_type() && is_single()) : ?>
                                        <div class="entry-meta">
                                            <?php icode_posted_on(); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </header>
                        <?php } else { ?>
                            <header class="banner-header"
                                    style="background-image: linear-gradient(to right,rgba(0, 0, 0, 0.5) 0%,rgba(0, 0, 0, 0.5) 100%), url('<?php
                                    if (is_array($meta) && isset($meta["image"])) {
                                        echo $meta["image"];
                                    }
                                    ?>')">
                                <div class="container">
                                    <?php (is_home() ? single_post_title('<h1 class="banner-title">', '</h1>') : the_title('<h1 class="banner-title">', '</h1>')); ?>
                                    <?php if ('post' === get_post_type() && is_single()) : ?>
                                        <div class="entry-meta">
                                            <?php icode_posted_on(); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </header>
                            <?php
                        }
                    }
                    ?>