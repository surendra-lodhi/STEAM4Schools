<?php
/**
 * iCode functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package iCode
 */

/*
   Theme Setup / Functionality
   ========================================================================== */

if ( ! function_exists( 'icode_setup' ) ) :

	function icode_setup() {

		load_theme_textdomain( 'icode', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		add_theme_support( 'title-tag' );

		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary', 'icode' ),
			'footer'  => __( 'Footer', 'icode' ),
		) );

		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );
	}

endif;
add_action( 'after_setup_theme', 'icode_setup' );

// Breadcrumbs
function get_breadcrumbs($post) {
	echo '<a href="'.home_url().'">Home</a>';
	if (is_category() || is_single()) {
		echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;";
		the_category(' &bull; ');
		if (is_single()) {
			echo " &nbsp;&nbsp;&#187;&nbsp;&nbsp; ";
			the_title();
		}
	} elseif (is_page()) {
		if ($post->post_parent) {
			$parent_title = get_the_title($post->post_parent);
			$parent_url = get_permalink($post->post_parent);
			echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;";
			echo '<a href="'.$parent_url.'">'.$parent_title.'</a>';
		}
		echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;";
		echo the_title();
	} elseif (is_search()) {
		echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;Search Results for... ";
		echo '"<em>';
		echo the_search_query();
		echo '</em>"';
	}
}


/*
   Remove Wordpress Bloat
   ========================================================================== */

	// Emoji support
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );
	// WP Generator
remove_action( 'wp_head', 'wp_generator' );
	// Windows Live Writer
remove_action( 'wp_head', 'wlwmanifest_link' );
	// Shortlink
remove_action( 'wp_head', 'wp_shortlink_wp_head' );
remove_action( 'template_redirect', 'wp_shortlink_header' );
	// XML-RPC - used by some plugins like Jetpack, but usually unneeded
remove_action( 'wp_head', 'rsd_link' );
	// WP API Access - used by some plugins, but usually unneeded
remove_action( 'wp_head', 'rest_output_link_wp_head');
	// Remove the REST API endpoint.
remove_action( 'rest_api_init', 'wp_oembed_register_route' );
	// Turn off oEmbed auto discovery.
add_filter( 'embed_oembed_discover', '__return_false' );
	// Don't filter oEmbed results.
remove_filter( 'oembed_dataparse', 'wp_filter_oembed_result', 10 );
	// Remove oEmbed discovery links.
remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
	// Remove oEmbed-specific JavaScript from the front-end and back-end.
remove_action( 'wp_head', 'wp_oembed_add_host_js' );


/*
   Remove Query Strings
   ========================================================================== */

function _remove_script_version( $src ){
	// don't remove from google fonts call
	if ( !strpos($src, "fonts.googleapis") ) :
		$parts = explode( '?', $src );
		return $parts[0];
	else :
		return $src;
	endif;
}
add_filter( 'script_loader_src', '_remove_script_version', 15, 1 );
add_filter( 'style_loader_src', '_remove_script_version', 15, 1 );


/*
   Register Widgets
   ========================================================================== */

function icode_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Primary Sidebar', 'icode' ),
		'id'            => 'sidebar-primary',
		'description'   => esc_html__( 'Add widgets here.', 'icode' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<span class="widget-title">',
		'after_title'   => '</span>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 1', 'icode' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Add widgets here.', 'icode' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<span class="widget-title">',
		'after_title'   => '</span>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 2', 'icode' ),
		'id'            => 'footer-2',
		'description'   => esc_html__( 'Add widgets here.', 'icode' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<span class="widget-title">',
		'after_title'   => '</span>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 3', 'icode' ),
		'id'            => 'footer-3',
		'description'   => esc_html__( 'Add widgets here.', 'icode' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<span class="widget-title">',
		'after_title'   => '</span>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 4', 'icode' ),
		'id'            => 'footer-4',
		'description'   => esc_html__( 'Add widgets here.', 'icode' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<span class="widget-title">',
		'after_title'   => '</span>',
	) );
}
add_action( 'widgets_init', 'icode_widgets_init' );


/*
   Enqueue Resources
   ========================================================================== */

// Admin Scripts
function icode_admin_scripts( $hook ) {
	// load this stylesheet for all admin pages
	wp_enqueue_style( 'icode-admin', get_template_directory_uri() . '/assets/css/icode.admin.css', '1.0.0' );
}
add_action( 'admin_enqueue_scripts', 'icode_admin_scripts');

// Front End Scripts
function icode_scripts() {

	// Base Theme CSS
	wp_enqueue_style( 'icode', get_stylesheet_uri() );
	wp_enqueue_style( 'icode-style', get_template_directory_uri() . '/assets/css/style.css', '1.0.0' );
	// Base Theme JS
	wp_enqueue_script( 'main', get_template_directory_uri() . '/assets/js/main.min.js', array("jquery"), "1.0.0", true );
	wp_enqueue_script( 'slick', get_template_directory_uri() . '/assets/js/slick.min.js', array("jquery"), "1.0.0", true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'icode_scripts' );


/*
   Require Other Theme Files
   ========================================================================== */

require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/extras.php';
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/theme-options.php';
require get_template_directory() . '/inc/hero-image.php';
// Require the Bootstrap Nav-Walker
require_once( get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php' );

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'STEAM 4 Schools Settings',
		'menu_title'	=> 'STEAM 4 Schools Settings',
		'menu_slug' 	=> 'stream-4-schools-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
}
