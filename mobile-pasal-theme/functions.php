<?php
/**
 * Mobile Pasal functions and definitions
 *
 * @package Mobile_Pasal
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! defined( 'MP_VERSION' ) ) {
	define( 'MP_VERSION', '1.0.0' );
}

define( 'MP_THEME_DIR', get_template_directory() );
define( 'MP_THEME_URI', get_template_directory_uri() );

/**
 * 1. Require Core Modules
 */
require_once MP_THEME_DIR . '/inc/theme-options.php';
require_once MP_THEME_DIR . '/inc/custom-post-types.php';
require_once MP_THEME_DIR . '/inc/inquiries-manager.php';
require_once MP_THEME_DIR . '/inc/sample-data.php';

/**
 * 2. Theme Setup
 */
function mp_theme_setup() {
	load_theme_textdomain( 'mobile-pasal', MP_THEME_DIR . '/languages' );

	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );

	set_post_thumbnail_size( 800, 800, false );
	add_image_size( 'mp-handset-card', 600, 600, false );
	add_image_size( 'mp-hero-banner', 1200, 800, true );

	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Header Navigation', 'mobile-pasal' ),
		'footer'  => esc_html__( 'Footer Links Navigation', 'mobile-pasal' ),
	) );

	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
		'style',
		'script',
	) );

	add_theme_support( 'custom-logo', array(
		'height'      => 60,
		'width'       => 240,
		'flex-height' => true,
		'flex-width'  => true,
	) );
}
add_action( 'after_setup_theme', 'mp_theme_setup' );

/**
 * 3. Enqueue Frontend Styles and Scripts
 */
function mp_enqueue_scripts() {
	// Google Fonts
	wp_enqueue_style(
		'mp-google-fonts',
		'https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&display=swap',
		array(),
		null
	);

	// Font Awesome 6 Icons
	wp_enqueue_style(
		'font-awesome-6',
		'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css',
		array(),
		'6.5.1'
	);

	$css_file = MP_THEME_DIR . '/assets/css/main.css';
	$js_file  = MP_THEME_DIR . '/assets/js/main.js';
	$css_ver  = file_exists( $css_file ) ? (string) filemtime( $css_file ) : MP_VERSION;
	$js_ver   = file_exists( $js_file ) ? (string) filemtime( $js_file ) : MP_VERSION;

	// Root stylesheet (theme header metadata)
	wp_enqueue_style( 'mp-theme-root', get_stylesheet_uri(), array(), $css_ver );

	// Master Main stylesheet
	wp_enqueue_style( 'mp-main-style', MP_THEME_URI . '/assets/css/main.css', array( 'mp-google-fonts', 'mp-theme-root' ), $css_ver );

	// Dynamic Inline CSS from Theme Options (Restrained, matching light studio palette)
	$primary       = mp_opt( 'color_primary', '#0066cc' );
	$primary_dark  = mp_opt( 'color_primary_dark', '#004c99' );
	$primary_light = mp_opt( 'color_primary_light', '#eff6ff' );
	$wa_green      = mp_opt( 'color_green', '#25d366' );
	$star_gold     = mp_opt( 'color_amber', '#f59e0b' );
	$custom_css    = mp_opt( 'custom_css', '' );

	$inline_styles = "
	:root {
		--primary: {$primary};
		--primary-hover: {$primary_dark};
		--primary-light: {$primary_light};
		--border-focus: {$primary};
		--wa-green: {$wa_green};
		--star-gold: {$star_gold};
	}
	" . $custom_css;

	wp_add_inline_style( 'mp-main-style', $inline_styles );

	// Frontend JavaScript
	wp_enqueue_script( 'mp-main-script', MP_THEME_URI . '/assets/js/main.js', array( 'jquery' ), $js_ver, true );

	// Localize AJAX parameters for forms
	wp_localize_script( 'mp-main-script', 'mpAjax', array(
		'ajaxurl'   => admin_url( 'admin-ajax.php' ),
		'nonce'     => wp_create_nonce( 'mp_public_nonce' ),
		'wa_number' => mp_opt( 'whatsapp_number', '9779804530786' ),
	) );
	wp_localize_script( 'mp-main-script', 'mp_ajax', array(
		'ajax_url' => admin_url( 'admin-ajax.php' ),
		'nonce'    => wp_create_nonce( 'mp_theme_nonce' ),
	) );
}
add_action( 'wp_enqueue_scripts', 'mp_enqueue_scripts' );

/**
 * 4. Helper: Sanitize Phone for WhatsApp
 */
function mp_clean_phone( $phone ) {
	$clean = preg_replace( '/[^0-9]/', '', $phone );
	if ( 10 === strlen( $clean ) ) {
		$clean = '977' . $clean;
	}
	return $clean;
}

/**
 * 5. Helper: Generate Direct WhatsApp URL
 */
function mp_get_whatsapp_link( $custom_message = '' ) {
	$phone = mp_opt( 'contact_whatsapp_number', '9779848000000' );
	$clean = mp_clean_phone( $phone );
	if ( empty( $custom_message ) ) {
		$custom_message = mp_opt( 'whatsapp_default_message', 'Hello Ali Mobile! I have an inquiry about smartphones / repairs.' );
	}
	return 'https://wa.me/' . $clean . '?text=' . rawurlencode( $custom_message );
}

/**
 * 6. Fallback Navigation for Header
 */
function mp_header_nav_fallback() {
	?>
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="<?php echo is_front_page() ? 'active' : ''; ?>"><?php esc_html_e( 'Home', 'mobile-pasal' ); ?></a>
	<a href="<?php echo esc_url( home_url( '/services/' ) ); ?>" class="<?php echo is_page( 'services' ) ? 'active' : ''; ?>"><?php esc_html_e( 'Services', 'mobile-pasal' ); ?></a>
	<a href="<?php echo esc_url( home_url( '/shop/' ) ); ?>" class="<?php echo is_page( 'shop' ) ? 'active' : ''; ?>"><?php esc_html_e( 'Shop', 'mobile-pasal' ); ?></a>
	<a href="<?php echo esc_url( home_url( '/about/' ) ); ?>" class="<?php echo is_page( 'about' ) ? 'active' : ''; ?>"><?php esc_html_e( 'About', 'mobile-pasal' ); ?></a>
	<a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="<?php echo is_page( 'contact' ) ? 'active' : ''; ?>"><?php esc_html_e( 'Contact', 'mobile-pasal' ); ?></a>
	<?php
}

/**
 * 7. Fallback Navigation for Footer
 */
function mp_footer_nav_fallback() {
	?>
	<ul class="footer-links">
		<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'mobile-pasal' ); ?></a></li>
		<li><a href="<?php echo esc_url( home_url( '/shop/' ) ); ?>"><?php esc_html_e( 'Handset Showroom', 'mobile-pasal' ); ?></a></li>
		<li><a href="<?php echo esc_url( home_url( '/services/' ) ); ?>"><?php esc_html_e( 'Apple Fix Services', 'mobile-pasal' ); ?></a></li>
		<li><a href="<?php echo esc_url( home_url( '/about/' ) ); ?>"><?php esc_html_e( 'Verified Assurance', 'mobile-pasal' ); ?></a></li>
		<li><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Counter Location', 'mobile-pasal' ); ?></a></li>
	</ul>
	<?php
}

/**
 * 8. Inject Custom Header Scripts
 */
function mp_inject_header_scripts() {
	$header_scripts = mp_opt( 'custom_header_scripts', '' );
	if ( ! empty( $header_scripts ) ) {
		echo $header_scripts . "\n";
	}
}
add_action( 'wp_head', 'mp_inject_header_scripts', 99 );

/**
 * 9. Inject Custom Footer Scripts
 */
function mp_inject_footer_scripts() {
	$footer_scripts = mp_opt( 'custom_footer_scripts', '' );
	if ( ! empty( $footer_scripts ) ) {
		echo $footer_scripts . "\n";
	}
}
add_action( 'wp_footer', 'mp_inject_footer_scripts', 99 );

