<?php
/**
 * iCode Theme Options.
 *
 * @package iCode
 */

/* ==========================================================================
   Add iCode administration page
   ========================================================================== */

function icode_admin_menus() {

	// Create iCode admin page
	add_menu_page(
		'iCode Theme Options',
		'iCode Theme',
		'manage_options',
		'icode_options',
		'icode_theme_create_page',
		get_template_directory_uri() . '/assets/img/theme-icon.png',
		59
	);

	// Create iCode admin subpages
	$gen_options_page = add_submenu_page( 'icode_options', 'iCode Theme Options', 'General Options', 'manage_options', 'icode_options', 'icode_theme_create_page' );
	$code_snippets_page = add_submenu_page( 'icode_options', 'iCode Code Snippets', 'Code Snippets', 'manage_options', 'icode_code_snippets', 'icode_theme_code_snippets' );
	$custom_css_page = add_submenu_page( 'icode_options', 'iCode Custom CSS', 'Custom CSS', 'manage_options', 'icode_custom_css', 'icode_theme_custom_css' );

	// Activate custom settings
	add_action('admin_init', 'icode_custom_settings');
	// Load per page resources
	add_action('load-' . $gen_options_page, 'icode_options_resources');
	add_action('load-' . $code_snippets_page, 'icode_options_resources');
	add_action('load-' . $custom_css_page, 'icode_options_resources');

}
add_action('admin_menu', 'icode_admin_menus');

/*
   Load Options Resources
   ========================================================================== */

function icode_options_resources() {
	wp_enqueue_media();
	wp_enqueue_style( 'icode-options-styles', get_template_directory_uri() . '/assets/css/icode.theme-options.css', '1.0.0' );
	wp_enqueue_script( 'icode-options-scripts', get_template_directory_uri(). '/assets/js/icode.theme-options.js', array('jquery'), true );
}

/*
   General Options Settings
   ========================================================================== */

function icode_custom_settings() {
	/*
	 * Register Settings
	 */
	// General
	register_setting( 'icode-settings-group', 'site_logo' );
	register_setting( 'icode-settings-group', 'favicon' );
	register_setting( 'icode-settings-group', 'header_info' );
	register_setting( 'icode-settings-group', 'primary_phone' );
	register_setting( 'icode-settings-group', 'primary_email' );
	register_setting( 'icode-settings-group', 'primary_address' );
	// Post
	register_setting( 'icode-settings-group', 'show_post_author');
	// Social
	register_setting( 'icode-settings-group', 'social_facebook', 'icode_sanitize_url_field' );
	register_setting( 'icode-settings-group', 'social_twitter', 'icode_sanitize_url_field' );
	register_setting( 'icode-settings-group', 'social_instagram', 'icode_sanitize_url_field' );
	register_setting( 'icode-settings-group', 'social_linkedin', 'icode_sanitize_url_field' );
	register_setting( 'icode-settings-group', 'social_pinterest', 'icode_sanitize_url_field' );
	register_setting( 'icode-settings-group', 'social_youtube', 'icode_sanitize_url_field' );
	register_setting( 'icode-settings-group', 'social_yelp', 'icode_sanitize_url_field' );
    register_setting( 'icode-settings-group', 'social_houzz', 'icode_sanitize_url_field' );
	register_setting( 'icode-settings-group', 'social_rss', 'icode_sanitize_url_field' );
	// Code Snippets
	register_setting( 'icode-snippets-group', 'snippets_header' );
	register_setting( 'icode-snippets-group', 'snippets_body' );
	register_setting( 'icode-snippets-group', 'snippets_footer' );
	register_setting( 'icode-snippets-group', 'conversion_page' );
	register_setting( 'icode-snippets-group', 'conversion_code' );
	// Custom CSS
	register_setting( 'icode-css-group', 'custom_css' );

	/*
	 * Sections
	 */
	add_settings_section( 'icode-general-options', 'General Options', 'icode_general_options', 'icode_general_options' );
	add_settings_section( 'icode-post-options', 'Post Options', 'icode_post_options', 'icode_post_options');
	add_settings_section( 'icode-social-options', 'Social Options', 'icode_social_options', 'icode_social_options' );

	add_settings_section( 'icode-header-snippets', 'Code Snippets Header', 'icode_snippets_header', 'icode_snippets_header' );
	add_settings_section( 'icode-body-snippets', 'Code Snippets Body', 'icode_snippets_body', 'icode_snippets_body' );
	add_settings_section( 'icode-footer-snippets', 'Code Snippets Footer', 'icode_snippets_footer', 'icode_snippets_footer' );
	add_settings_section( 'icode-conversion-tracking', 'Conversion Tracking', 'icode_snippets_conversion', 'icode_snippets_conversion' );

	add_settings_section( 'icode-custom-css', 'Custom CSS', 'icode_custom_styles', 'icode_custom_css' );

	/*
	 * Fields
	 */
	// General
	add_settings_field( 'site-logo', 'Site Logo', 'icode_site_logo', 'icode_general_options', 'icode-general-options' );
	add_settings_field( 'favicon', 'Favicon', 'icode_favicon', 'icode_general_options', 'icode-general-options' );
	add_settings_field( 'header-info', 'Header Info', 'icode_header_info', 'icode_general_options', 'icode-general-options' );
	add_settings_field( 'primary-phone', 'Primary Number', 'icode_primary_phone', 'icode_general_options', 'icode-general-options' );
	add_settings_field( 'primary-email', 'Primary Email', 'icode_primary_email', 'icode_general_options', 'icode-general-options' );
	add_settings_field( 'primary-address', 'Primary Address', 'icode_primary_address', 'icode_general_options', 'icode-general-options' );

	// Post
	add_settings_field( 'show-post-author', 'Show Post Author', 'icode_show_post_author', 'icode_post_options', 'icode-post-options' );
	// Social
	add_settings_field( 'social-facebook', 'Facebook URL', 'icode_social_facebook', 'icode_social_options', 'icode-social-options' );
	add_settings_field( 'social-twitter', 'Twitter URL', 'icode_social_twitter', 'icode_social_options', 'icode-social-options' );
	add_settings_field( 'social-instagram', 'Instagram URL', 'icode_social_instagram', 'icode_social_options', 'icode-social-options' );
	add_settings_field( 'social-linkedin', 'LinkedIn URL', 'icode_social_linkedin', 'icode_social_options', 'icode-social-options' );
	add_settings_field( 'social-pinterest', 'Pinterest URL', 'icode_social_pinterest', 'icode_social_options', 'icode-social-options' );
	add_settings_field( 'social-youtube', 'YouTube URL', 'icode_social_youtube', 'icode_social_options', 'icode-social-options' );
	add_settings_field( 'social-yelp', 'Yelp URL', 'icode_social_yelp', 'icode_social_options', 'icode-social-options' );
    add_settings_field( 'social-houzz', 'Houzz URL', 'icode_social_houzz', 'icode_social_options', 'icode-social-options' );
	add_settings_field( 'social-rss', 'RSS Feed URL', 'icode_social_rss', 'icode_social_options', 'icode-social-options' );
	// Code Snippets
	add_settings_field( 'header-snippets', 'Header Snippets', 'icode_header_snippets', 'icode_snippets_header', 'icode-header-snippets' );
	add_settings_field( 'body-snippets', 'Body Snippets', 'icode_body_snippets', 'icode_snippets_body', 'icode-body-snippets' );
	add_settings_field( 'footer-snippets', 'Footer Snippets', 'icode_footer_snippets', 'icode_snippets_footer', 'icode-footer-snippets' );
	add_settings_field( 'conversion-page', 'Conversion Page', 'icode_conversion_page', 'icode_snippets_conversion', 'icode-conversion-tracking' );
	add_settings_field( 'conversion-code', 'Tracking Code', 'icode_conversion_code', 'icode_snippets_conversion', 'icode-conversion-tracking' );
	// Custom CSS
	add_settings_field( 'custom-css', 'Custom CSS', 'icode_custom_css', 'icode_custom_css', 'icode-custom-css' );
}

/*
   Section Functions
   ========================================================================== */

function icode_general_options() {
	echo 'Use this section to customize your general site settings and contact information.';
}
function icode_post_options() {
	echo 'Use this section to update options related to posts and pages.';
}
function icode_social_options() {
	echo 'Use this section to update your social pages and choose which to display.';
}
function icode_snippets_header() {
	echo 'Use this section to input custom code snippets within the <strong>head</strong> of the document.';
}
function icode_snippets_body() {
	echo 'Use this section to input custom code snippets after the opening <strong>body</strong> tag of the document.';
}
function icode_snippets_footer() {
	echo 'Use this section to input custom code snippets before the closing <strong>body</strong> tag of the document.';
}
function icode_snippets_conversion() {
	echo 'Use this section to input a conversion tracking code that will only show on a specified page.';
}
function icode_custom_styles() {
	echo 'Use this section to write custom styles.';
}

/*
   Field Functions
   ========================================================================== */

// General Options Page
function icode_site_logo() {
	$site_logo = esc_attr( get_option('site_logo') );
	if (empty($site_logo)) {
		echo "<div id='logo-preview' style='background-image: url($site_logo);'></div>";
		echo
			'<input type="button" class="button button-secondary" value="Upload Logo" id="upload-button" />
			<p class="description">Recommended ratio is 3:1</p>
			<input type="hidden" id="site-logo-url" name="site_logo" value="" />';
	} else {
		echo "<div id='logo-preview' style='background-image: url($site_logo);'></div>";
		echo
			'<input type="button" class="button button-secondary" value="Update Logo" id="upload-button" />
			<input type="button" class="button button-secondary" value="Remove" id="remove-button" />
			<p class="description">Recommended ratio is 3:1</p>
			<input type="hidden" id="site-logo-url" name="site_logo" value="'.$site_logo.'" />';
	}
}
function icode_favicon() {
	$favicon = esc_attr( get_option('favicon') );
	if (empty($favicon)) {
		echo "<div id='favicon-preview' style='background-image: url($favicon);'></div>";
		echo
		'<input type="button" class="button button-secondary" value="Upload Favicon" id="favicon-upload-button" />
			<p class="description">Recommended size is 16x16 pixels</p>
			<input type="hidden" id="favicon-url" name="favicon" value="" />';
	} else {
		echo "<div id='favicon-preview' style='background-image: url($favicon);'></div>";
		echo
			'<input type="button" class="button button-secondary" value="Update Favicon" id="favicon-upload-button" />
			<input type="button" class="button button-secondary" value="Remove" id="favicon-remove-button" />
			<p class="description">Recommended size is 16x16 pixels</p>
			<input type="hidden" id="favicon-url" name="favicon" value="'.$favicon.'" />';
	}
}
function icode_header_info() {
	$header_info = esc_attr( get_option('header_info') );
	echo '<input type="text" name="header_info" value="'.$header_info.'" placeholder="Enter anything to be displayed in the header above the navigation." />';
}
function icode_primary_phone() {
	$primary_phone = esc_attr( get_option('primary_phone') );
	echo '<input type="phone" name="primary_phone" value="'.$primary_phone.'" placeholder="(123) 456-7890" />';
}
function icode_primary_email() {
	$primary_email = esc_attr( get_option('primary_email') );
	echo '<input type="email" name="primary_email" value="'.$primary_email.'" placeholder="example@email.com" />';
}
function icode_primary_address() {
	$primary_address = esc_attr( get_option('primary_address') );
	echo '<input type="address" name="primary_address" value="'.$primary_address.'" placeholder="123 Street Anytown, USA" />';
}

// Post Options
function icode_show_post_author() {
	$show_post_author = esc_attr( get_option('show_post_author') );
	$checked = checked(1, $show_post_author, false);
	echo '<input type="checkbox" name="show_post_author" value="1" '.$checked.'/>';
}

// Social Options
function icode_social_facebook() {
	$social_facebook = esc_attr( get_option('social_facebook') );
	echo '<input type="text" name="social_facebook" value="'.$social_facebook.'" placeholder="https://www.facebook.com/your-page-handler" />';
}
function icode_social_twitter() {
	$social_twitter = esc_attr( get_option('social_twitter') );
	echo '<input type="text" name="social_twitter" value="'.$social_twitter.'" placeholder="https://twitter.com/your-page-handler" />';
}
function icode_social_instagram() {
	$social_instagram = esc_attr( get_option('social_instagram') );
	echo '<input type="text" name="social_instagram" value="'.$social_instagram.'" placeholder="https://www.instagram.com/your-page-handler" />';
}
function icode_social_linkedin() {
	$social_linkedin = esc_attr( get_option('social_linkedin') );
	echo '<input type="text" name="social_linkedin" value="'.$social_linkedin.'" placeholder="https://www.linkedin.com/your-page-handler" />';
}
function icode_social_pinterest() {
	$social_pinterest = esc_attr( get_option('social_pinterest') );
	echo '<input type="text" name="social_pinterest" value="'.$social_pinterest.'" placeholder="https://www.pinterest.com/your-page-handler" />';
}
function icode_social_youtube() {
	$social_youtube = esc_attr( get_option('social_youtube') );
	echo '<input type="text" name="social_youtube" value="'.$social_youtube.'" placeholder="https://www.youtube.com/your-page-handler" />';
}
function icode_social_yelp() {
	$social_yelp = esc_attr( get_option('social_yelp') );
	echo '<input type="text" name="social_yelp" value="'.$social_yelp.'" placeholder="https://www.yelp.com/your-page-handler" />';
}
function icode_social_houzz() {
    $social_houzz = esc_attr( get_option('social_houzz') );
    echo '<input type="text" name="social_houzz" value="'.$social_houzz.'" placeholder="https://www.houzz.com/your-page-handler" />';
}
function icode_social_rss() {
	$social_rss = esc_attr( get_option('social_rss') );
	echo '<input type="text" name="social_rss" value="'.$social_rss.'" placeholder="https://www.yourfeed.com/your-rss-feed" />';
}

// Code Snippets Page
function icode_header_snippets() {
	$header_snippets = esc_attr( get_option('snippets_header') );
	echo '<pre class="pre-block"><textarea rows="10" cols="140" name="snippets_header" placeholder="Enter code snippets here" />'.$header_snippets.'</textarea></pre>';
}
function icode_body_snippets() {
	$body_snippets = esc_attr( get_option('snippets_body') );
	echo '<pre class="pre-block"><textarea rows="10" cols="140" name="snippets_body" placeholder="Enter code snippets here" />'.$body_snippets.'</textarea></pre>';
}
function icode_footer_snippets() {
	$footer_snippets = esc_attr( get_option('snippets_footer') );
	echo '<pre class="pre-block"><textarea rows="10" cols="140" name="snippets_footer" placeholder="Enter code snippets here" />'.$footer_snippets.'</textarea></pre>';
}
function icode_conversion_page() {
	$conversion_page = esc_attr( get_option('conversion_page') );
	wp_dropdown_pages(
		array(
			'name' => 'conversion_page',
			'echo' => 1,
			'show_option_none' => __( '&mdash; Select &mdash;' ),
			'option_none_value' => '0',
			'selected' => $conversion_page
		)
	);
}
function icode_conversion_code() {
	$conversion_code = esc_attr( get_option('conversion_code') );
	echo '<pre class="pre-block"><textarea rows="10" cols="140" name="conversion_code" placeholder="Enter tracking code here" />'.$conversion_code.'</textarea></pre>';
}

// Custom CSS Page
function icode_custom_css() {
	$custom_css = esc_attr( get_option('custom_css') );
	echo '<pre class="pre-block"><textarea rows="10" cols="140" name="custom_css" placeholder="Enter custom CSS here" />'.$custom_css.'</textarea></pre>';
}

// Sanitization settings example
function icode_sanitize_url_field( $input ) {
	$output = sanitize_text_field( $input );
	// strip '@'
	$output = str_replace('@', 'replace', $output);
	return $output;
}

/*
   Generate the iCode theme pages
   ========================================================================== */

// Generate iCode admin page
function icode_theme_create_page () {

	if ( !current_user_can('manage_options')) {
		wp_die( __( 'You do not have sufficient permissions to access this page.', 'icode' ) );
	}

	require_once( get_template_directory() . '/inc/icode-options.php' );
}

// Generate iCode code snippets subpage
function icode_theme_code_snippets() {

	if ( !current_user_can('manage_options')) {
		wp_die( __( 'You do not have sufficient permissions to access this page.', 'icode' ) );
	}

	require_once( get_template_directory() . '/inc/icode-code-snippets.php' );
}

// Generate iCode custom CSS subpage
function icode_theme_custom_css() {

	if ( !current_user_can('manage_options')) {
		wp_die( __( 'You do not have sufficient permissions to access this page.', 'icode' ) );
	}

	require_once( get_template_directory() . '/inc/icode-custom-css.php' );
}

/* ========================================================================== */