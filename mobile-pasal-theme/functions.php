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
require_once MP_THEME_DIR . '/inc/bulk-price-editor.php';
require_once MP_THEME_DIR . '/inc/inquiries-manager.php';
require_once MP_THEME_DIR . '/inc/sample-data.php';
require_once MP_THEME_DIR . '/inc/seo-geo-aeo.php';
require_once MP_THEME_DIR . '/inc/nav-walker.php';

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
		'https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,400..900;1,9..40,400..900&family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&display=swap',
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

	$css_file     = MP_THEME_DIR . '/assets/css/main.css';
	$css_min_file = MP_THEME_DIR . '/assets/css/main.min.css';
	$js_file      = MP_THEME_DIR . '/assets/js/main.js';
	$js_min_file  = MP_THEME_DIR . '/assets/js/main.min.js';

	$use_css_min = file_exists( $css_min_file ) && ( ! file_exists( $css_file ) || filemtime( $css_min_file ) >= filemtime( $css_file ) );
	$use_js_min  = file_exists( $js_min_file ) && ( ! file_exists( $js_file ) || filemtime( $js_min_file ) >= filemtime( $js_file ) );

	$css_uri = $use_css_min ? MP_THEME_URI . '/assets/css/main.min.css' : MP_THEME_URI . '/assets/css/main.css';
	$js_uri  = $use_js_min ? MP_THEME_URI . '/assets/js/main.min.js' : MP_THEME_URI . '/assets/js/main.js';
	$css_ver = file_exists( $css_file ) ? (string) filemtime( $css_file ) : MP_VERSION;
	$js_ver  = file_exists( $js_file ) ? (string) filemtime( $js_file ) : MP_VERSION;

	// Root stylesheet (theme header metadata)
	wp_enqueue_style( 'mp-theme-root', get_stylesheet_uri(), array(), $css_ver );

	// Master Main stylesheet
	wp_enqueue_style( 'mp-main-style', $css_uri, array( 'mp-google-fonts', 'mp-theme-root' ), $css_ver );

	// Dynamic Inline CSS from Theme Options (Complete Frontend Brand Color Engine)
	$primary       = esc_attr( mp_opt( 'color_primary', '#0862e9' ) );
	$primary_dark  = esc_attr( mp_opt( 'color_primary_dark', '#074ec0' ) );
	$primary_light = esc_attr( mp_opt( 'color_primary_light', '#edf4ff' ) );
	$wa_green      = esc_attr( mp_opt( 'color_green', '#25d366' ) );
	$star_gold     = esc_attr( mp_opt( 'color_amber', '#f59e0b' ) );
	$custom_css    = wp_strip_all_tags( (string) mp_opt( 'custom_css', '' ) );

	// Calculate RGB for transparent tints and glow rings
	$hex = ltrim( $primary, '#' );
	if ( strlen( $hex ) === 3 ) {
		$r = hexdec( substr( $hex, 0, 1 ) . substr( $hex, 0, 1 ) );
		$g = hexdec( substr( $hex, 1, 1 ) . substr( $hex, 1, 1 ) );
		$b = hexdec( substr( $hex, 2, 1 ) . substr( $hex, 2, 1 ) );
	} elseif ( strlen( $hex ) === 6 ) {
		$r = hexdec( substr( $hex, 0, 2 ) );
		$g = hexdec( substr( $hex, 2, 2 ) );
		$b = hexdec( substr( $hex, 4, 2 ) );
	} else {
		$r = 8; $g = 98; $b = 233;
	}
	$blue_glow = "rgba({$r}, {$g}, {$b}, 0.22)";
	$blue_tint = "rgba({$r}, {$g}, {$b}, 0.08)";
	$blue_bdr  = "rgba({$r}, {$g}, {$b}, 0.18)";

	$inline_styles = "
	:root {
		--primary: {$primary} !important;
		--primary-hover: {$primary_dark} !important;
		--primary-light: {$primary_light} !important;
		--border-focus: {$primary} !important;
		--blue: {$primary} !important;
		--blue2: {$primary_dark} !important;
		--blue-glow: {$blue_glow} !important;
		--pale: {$primary_light} !important;
		--pale-hover: {$primary_light} !important;
		--wa-green: {$wa_green} !important;
		--green: {$wa_green} !important;
		--star-gold: {$star_gold} !important;
		--gold: {$star_gold} !important;
	}
	/* Direct Component Color Overrides for 100% Theme Options Sync */
	.primary,
	.btn-primary,
	.button-primary,
	.hero-cta-btn,
	.cta-btn-primary,
	.service-booking-btn,
	.p-nav-pill.active,
	.filter-btn.active,
	.brand-pill.active,
	.filter-pill.is-active,
	.mp-search-btn {
		background: {$primary} !important;
		background-color: {$primary} !important;
		border-color: {$primary} !important;
		color: #ffffff !important;
	}
	.primary:hover,
	.btn-primary:hover,
	.hero-cta-btn:hover,
	.service-booking-btn:hover {
		background: {$primary_dark} !important;
		background-color: {$primary_dark} !important;
		border-color: {$primary_dark} !important;
		color: #ffffff !important;
	}
	.view-all-pill:hover,
	.view-all-btn:hover {
		background: {$primary} !important;
		border-color: {$primary} !important;
		color: #ffffff !important;
	}
	.section-badge,
	.eyebrow {
		color: {$primary} !important;
		background: {$blue_tint} !important;
		border-color: {$blue_bdr} !important;
	}
	.hero-feature:hover {
		border-color: {$primary} !important;
		box-shadow: 0 14px 28px {$blue_glow} !important;
	}
	.hero-feature-icon,
	.flagship-stat-icon,
	.card-rating-star,
	.price-current,
	.service-card-price,
	.nav-link.active,
	.brand-accent {
		color: {$primary} !important;
	}
	" . $custom_css;

	wp_add_inline_style( 'mp-main-style', $inline_styles );

	// Frontend JavaScript
	wp_enqueue_script( 'mp-main-script', $js_uri, array( 'jquery' ), $js_ver, true );

	// Localize AJAX parameters for forms
	wp_localize_script( 'mp-main-script', 'mpAjax', array(
		'ajaxurl'      => admin_url( 'admin-ajax.php' ),
		'nonce'        => wp_create_nonce( 'mp_public_nonce' ),
		'wa_number'    => mp_opt( 'whatsapp_number', '9779804530786' ),
		'services_url' => home_url( '/services/' ),
		'shop_url'     => home_url( '/shop/' ),
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
 * 5b. Helper: Unified Handset Price Visibility Check
 * Respects per-product `_mp_show_price` ('show' / 'hide' / 'inherit'),
 * legacy `_mp_hide_price` ('1'), and global `handset_show_price` master toggle.
 *
 * @param int $post_id Handset post ID.
 * @return bool True if price should be displayed publicly, false if hidden.
 */
function mp_is_handset_price_visible( $post_id ) {
	$price = get_post_meta( $post_id, '_mp_price', true );
	if ( '' === trim( (string) $price ) ) {
		return false;
	}

	$per_show = get_post_meta( $post_id, '_mp_show_price', true );
	if ( 'hide' === $per_show ) {
		return false;
	}
	if ( 'show' === $per_show ) {
		return true;
	}

	$per_hide = get_post_meta( $post_id, '_mp_hide_price', true );
	if ( '1' === (string) $per_hide || true === $per_hide ) {
		return false;
	}

	$global_show = mp_opt( 'handset_show_price', '1' );
	return ( '1' === (string) $global_show || 1 === $global_show || true === $global_show );
}

/**
 * 5c. Helper: Safely Extract Google Maps Iframe SRC URL
 * Handles both full `<iframe src="..."></iframe>` embed tags and raw map URLs.
 *
 * @param string $raw_embed_or_url Map embed HTML or URL string.
 * @return string Valid URL for iframe `src`.
 */
function mp_extract_map_iframe_src( $raw_embed_or_url ) {
	$default_map = 'https://maps.google.com/maps?q=Gulariya%2C%20Bardiya%2C%20Nepal&t=&z=15&ie=UTF8&iwloc=&output=embed';
	$raw         = trim( (string) $raw_embed_or_url );
	if ( empty( $raw ) ) {
		return $default_map;
	}

	if ( false !== stripos( $raw, '<iframe' ) ) {
		if ( preg_match( '/src=["\']([^"\']+)["\']/i', $raw, $matches ) && ! empty( $matches[1] ) ) {
			return html_entity_decode( $matches[1], ENT_QUOTES, 'UTF-8' );
		}
		return $default_map;
	}

	if ( 0 === strpos( $raw, 'http://' ) || 0 === strpos( $raw, 'https://' ) || 0 === strpos( $raw, '//' ) ) {
		return $raw;
	}

	return $default_map;
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

/**
 * 10. Custom Favicon Filter for WordPress Site Icon & Admin/Login
 */
function mp_filter_custom_site_icon_url( $url, $size, $blog_id ) {
	$custom = mp_opt( 'site_favicon', '' );
	if ( empty( $custom ) ) {
		$custom = mp_opt( 'favicon_image', '' );
	}
	if ( ! empty( $custom ) ) {
		return $custom;
	}
	return $url;
}
add_filter( 'get_site_icon_url', 'mp_filter_custom_site_icon_url', 99, 3 );

function mp_inject_admin_and_login_favicon() {
	$custom = mp_opt( 'site_favicon', '' );
	if ( empty( $custom ) ) {
		$custom = mp_opt( 'favicon_image', '' );
	}
	if ( ! empty( $custom ) ) {
		echo '<link rel="shortcut icon" href="' . esc_url( $custom ) . '" />' . "\n";
		echo '<link rel="icon" type="image/png" sizes="32x32" href="' . esc_url( $custom ) . '" />' . "\n";
	}
}
add_action( 'login_head', 'mp_inject_admin_and_login_favicon' );
add_action( 'admin_head', 'mp_inject_admin_and_login_favicon' );

/**
 * 11. Render High-Tech Graphic for Page Headers (Zero Text, Pure Vector Geometry)
 */
function mp_render_page_hero_graphic() {
	?>
	<div class="page-hero-graphic" aria-hidden="true">
		<svg class="page-hero-svg" viewBox="0 0 260 140" fill="none" xmlns="http://www.w3.org/2000/svg">
			<defs>
				<linearGradient id="pghGlow" x1="0%" y1="0%" x2="100%" y2="100%">
					<stop offset="0%" stop-color="#0066cc" stop-opacity="0.16" />
					<stop offset="100%" stop-color="#0066cc" stop-opacity="0.02" />
				</linearGradient>
			</defs>
			<circle cx="180" cy="70" r="62" stroke="#e2eaf5" stroke-width="1.5" stroke-dasharray="4 4" />
			<circle cx="180" cy="70" r="46" stroke="#d0e1f7" stroke-width="1.5" />
			<circle cx="180" cy="70" r="28" fill="url(#pghGlow)" stroke="#0066cc" stroke-width="1.8" />
			<line x1="180" y1="36" x2="180" y2="44" stroke="#0066cc" stroke-width="2" stroke-linecap="round" />
			<line x1="180" y1="96" x2="180" y2="104" stroke="#0066cc" stroke-width="2" stroke-linecap="round" />
			<line x1="146" y1="70" x2="154" y2="70" stroke="#0066cc" stroke-width="2" stroke-linecap="round" />
			<line x1="206" y1="70" x2="214" y2="70" stroke="#0066cc" stroke-width="2" stroke-linecap="round" />
			<circle cx="180" cy="70" r="4" fill="#0066cc" />
			<rect x="52" y="16" width="56" height="108" rx="10" stroke="#0066cc" stroke-width="2" fill="#ffffff" />
			<rect x="58" y="24" width="44" height="88" rx="6" stroke="#e2eaf5" stroke-width="1" fill="#f8faff" />
			<line x1="72" y1="20" x2="88" y2="20" stroke="#cbd5e1" stroke-width="2" stroke-linecap="round" />
			<line x1="73" y1="106" x2="87" y2="106" stroke="#0066cc" stroke-width="2.5" stroke-linecap="round" />
			<path d="M108 50 H136 L152 70" stroke="#0066cc" stroke-width="1.8" stroke-linecap="round" stroke-dasharray="3 3" />
			<circle cx="108" cy="50" r="3" fill="#0066cc" />
			<circle cx="136" cy="50" r="2.5" fill="#38bdf8" />
			<rect x="22" y="44" width="12" height="12" rx="3" stroke="#d0e1f7" stroke-width="1.5" />
			<circle cx="28" cy="50" r="2" fill="#0066cc" />
			<line x1="34" y1="50" x2="52" y2="50" stroke="#d0e1f7" stroke-width="1.5" stroke-dasharray="2 2" />
			<path d="M228 26 V34 M224 30 H232" stroke="#0066cc" stroke-width="1.5" stroke-linecap="round" opacity="0.6" />
			<path d="M30 102 V110 M26 106 H34" stroke="#0066cc" stroke-width="1.5" stroke-linecap="round" opacity="0.6" />
		</svg>
	</div>
	<?php
}

/**
 * 12. Live AJAX Search Autocomplete Endpoint (Handsets, Repair Services & Docket Shortcut)
 */
function mp_ajax_live_search() {
	$query = isset( $_REQUEST['q'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['q'] ) ) : '';
	$query = trim( $query );

	if ( strlen( $query ) < 2 ) {
		wp_send_json_success( array(
			'handsets' => array(),
			'repairs'  => array(),
			'docket'   => null,
		) );
	}

	$docket_shortcut = null;
	if ( preg_match( '/^#?(AF-\d{4}-[A-Z0-9]+|AF\d+)/i', $query, $m ) ) {
		$clean_docket    = strtoupper( ltrim( $m[0], '#' ) );
		$docket_shortcut = array(
			'docket' => $clean_docket,
			'url'    => home_url( '/services/?docket=' . rawurlencode( $clean_docket ) . '#repair-tracker' ),
			'label'  => sprintf( __( 'Track Live Repair Status for Docket #%s', 'mobile-pasal' ), $clean_docket ),
		);
	}

	$hidden_price_text = mp_opt( 'handset_hidden_price_text', __( 'Contact for Counter Price', 'mobile-pasal' ) );

	// 1. Search Handsets (title match + meta / taxonomy fallback)
	$handset_ids = get_posts( array(
		'post_type'      => 'handset',
		'post_status'    => 'publish',
		'posts_per_page' => 6,
		's'              => $query,
		'fields'         => 'ids',
	) );

	if ( count( $handset_ids ) < 6 ) {
		$meta_ids = get_posts( array(
			'post_type'      => 'handset',
			'post_status'    => 'publish',
			'posts_per_page' => 6 - count( $handset_ids ),
			'post__not_in'   => $handset_ids,
			'fields'         => 'ids',
			'meta_query'     => array(
				'relation' => 'OR',
				array(
					'key'     => '_mp_spec_chip',
					'value'   => $query,
					'compare' => 'LIKE',
				),
				array(
					'key'     => '_mp_spec_screen',
					'value'   => $query,
					'compare' => 'LIKE',
				),
				array(
					'key'     => '_mp_brand',
					'value'   => $query,
					'compare' => 'LIKE',
				),
			),
		) );
		$handset_ids = array_values( array_unique( array_merge( $handset_ids, $meta_ids ) ) );
	}

	$handsets = array();
	foreach ( $handset_ids as $hid ) {
		$price       = get_post_meta( $hid, '_mp_price', true );
		$is_visible  = mp_is_handset_price_visible( $hid );
		$price_fmt   = $is_visible ? ( is_numeric( $price ) ? 'NPR ' . number_format( (float) $price ) : $price ) : $hidden_price_text;
		$brand_terms = wp_get_post_terms( $hid, 'device_brand', array( 'fields' => 'names' ) );
		$brand_name  = ! empty( $brand_terms ) && ! is_wp_error( $brand_terms ) ? $brand_terms[0] : ( get_post_meta( $hid, '_mp_brand', true ) ?: 'Handset' );
		$chip        = get_post_meta( $hid, '_mp_spec_chip', true ) ?: get_post_meta( $hid, '_mp_processor', true );
		$storage     = get_post_meta( $hid, '_mp_spec_storage', true );
		$img         = function_exists( 'mp_get_handset_img_url' ) ? mp_get_handset_img_url( $hid ) : get_the_post_thumbnail_url( $hid, 'thumbnail' );

		$handsets[] = array(
			'id'       => (int) $hid,
			'title'    => get_the_title( $hid ),
			'brand'    => $brand_name,
			'priceFmt' => $price_fmt,
			'specs'    => implode( ' • ', array_filter( array( $chip, $storage ) ) ),
			'img'      => $img,
			'url'      => get_permalink( $hid ),
		);
	}

	// 2. Search Repair Services
	$repair_posts = get_posts( array(
		'post_type'      => 'repair_service',
		'post_status'    => 'publish',
		'posts_per_page' => 4,
		's'              => $query,
	) );

	$repairs = array();
	foreach ( $repair_posts as $rp ) {
		$rid        = $rp->ID;
		$rate       = get_post_meta( $rid, '_mp_service_price', true ) ?: ( get_post_meta( $rid, '_mp_repair_price', true ) ?: ( get_post_meta( $rid, '_mp_price_est', true ) ?: __( 'Free Diagnostic', 'mobile-pasal' ) ) );
		$turnaround = get_post_meta( $rid, '_mp_service_turnaround', true ) ?: ( get_post_meta( $rid, '_mp_repair_time', true ) ?: ( get_post_meta( $rid, '_mp_turnaround', true ) ?: '45 Mins' ) );
		$repairs[]  = array(
			'id'         => (int) $rid,
			'title'      => get_the_title( $rid ),
			'rate'       => $rate,
			'turnaround' => $turnaround,
			'url'        => get_permalink( $rid ) ?: home_url( '/services/#repairs' ),
		);
	}

	wp_send_json_success( array(
		'handsets' => $handsets,
		'repairs'  => $repairs,
		'docket'   => $docket_shortcut,
	) );
}
add_action( 'wp_ajax_mp_live_search', 'mp_ajax_live_search' );
add_action( 'wp_ajax_nopriv_mp_live_search', 'mp_ajax_live_search' );

/**
 * 13. Public Customer Review Submission AJAX Endpoint (Creates Pending mp_review Post)
 */
function mp_ajax_submit_customer_review() {
	$nonce   = isset( $_POST['nonce'] ) ? sanitize_text_field( wp_unslash( $_POST['nonce'] ) ) : '';
	$is_ok   = wp_verify_nonce( $nonce, 'mp_public_nonce' ) || wp_verify_nonce( $nonce, 'mp_theme_nonce' );
	if ( ! $is_ok ) {
		wp_send_json_error( array( 'message' => __( 'Security check failed. Please refresh and try again.', 'mobile-pasal' ) ), 403 );
	}

	$name     = isset( $_POST['name'] ) ? sanitize_text_field( wp_unslash( $_POST['name'] ) ) : '';
	$location = isset( $_POST['location'] ) ? sanitize_text_field( wp_unslash( $_POST['location'] ) ) : 'Gulariya, Bardiya';
	$product  = isset( $_POST['product'] ) ? sanitize_text_field( wp_unslash( $_POST['product'] ) ) : '';
	$content  = isset( $_POST['content'] ) ? sanitize_textarea_field( wp_unslash( $_POST['content'] ) ) : '';
	$rating   = isset( $_POST['rating'] ) ? max( 1, min( 5, absint( $_POST['rating'] ) ) ) : 5;

	if ( empty( $name ) || empty( $content ) ) {
		wp_send_json_error( array( 'message' => __( 'Please enter your name and review feedback.', 'mobile-pasal' ) ), 400 );
	}

	$post_id = wp_insert_post( array(
		'post_type'    => 'mp_review',
		'post_title'   => $name,
		'post_content' => $content,
		'post_status'  => 'pending',
	) );

	if ( is_wp_error( $post_id ) || ! $post_id ) {
		wp_send_json_error( array( 'message' => __( 'Unable to save review right now.', 'mobile-pasal' ) ), 500 );
	}

	update_post_meta( $post_id, '_mp_review_location', $location ?: 'Gulariya, Bardiya' );
	update_post_meta( $post_id, '_mp_review_product', $product );
	update_post_meta( $post_id, '_mp_review_rating', $rating );
	update_post_meta( $post_id, '_mp_review_verified', '1' );

	wp_send_json_success( array(
		'message' => __( 'Dhanyabad! Your review has been submitted and will appear after showroom verification.', 'mobile-pasal' ),
	) );
}
add_action( 'wp_ajax_mp_submit_customer_review', 'mp_ajax_submit_customer_review' );
add_action( 'wp_ajax_nopriv_mp_submit_customer_review', 'mp_ajax_submit_customer_review' );

/**
 * 14. Show Pending Reviews Count Bubble in WP Admin Menu
 */
function mp_pending_reviews_menu_bubble() {
	global $menu;
	$counts = wp_count_posts( 'mp_review' );
	if ( empty( $counts->pending ) ) {
		return;
	}
	$pending = (int) $counts->pending;
	foreach ( $menu as $key => $item ) {
		if ( isset( $item[2] ) && 'edit.php?post_type=mp_review' === $item[2] ) {
			$menu[ $key ][0] .= sprintf( ' <span class="awaiting-mod count-%1$d"><span class="pending-count">%1$d</span></span>', $pending );
			break;
		}
	}
}
add_action( 'admin_menu', 'mp_pending_reviews_menu_bubble', 99 );

/**
 * 15. Ensure Standard Search Includes Handsets & Repair Services
 */
function mp_include_cpt_in_search( $query ) {
	if ( ! is_admin() && $query->is_main_query() && $query->is_search() ) {
		$query->set( 'post_type', array( 'handset', 'repair_service', 'post', 'page' ) );
	}
}
add_action( 'pre_get_posts', 'mp_include_cpt_in_search' );

/**
 * 16. Top WP Admin Bar Quick-Access Menu for Easy Store Management & Customization
 */
function mp_admin_bar_quick_menu( $wp_admin_bar ) {
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}

	$wp_admin_bar->add_node( array(
		'id'    => 'mp-store-hub',
		'title' => '📱 Ali Mobile Admin',
		'href'  => admin_url( 'admin.php?page=mobile-pasal-options' ),
	) );

	$links = array(
		'mp-hub-repairs'  => array( '🔧 Repair Lab Dockets', admin_url( 'admin.php?page=mp-inquiries&tab=repairs' ) ),
		'mp-hub-general'  => array( '💬 General Inquiries', admin_url( 'admin.php?page=mp-inquiries&tab=general' ) ),
		'mp-hub-prices'   => array( '🏷️ Bulk Handset Price Editor', admin_url( 'admin.php?page=mp-bulk-price-editor' ) ),
		'mp-hub-logo'     => array( '🖼️ Change Logo & Brand Name', admin_url( 'admin.php?page=mobile-pasal-options&tab=identity' ) ),
		'mp-hub-contact'  => array( '📞 Change Phone, Email & Address', admin_url( 'admin.php?page=mobile-pasal-options&tab=contact_coords_tab' ) ),
		'mp-hub-colors'   => array( '🎨 Theme Colors & Presets', admin_url( 'admin.php?page=mobile-pasal-options&tab=colors' ) ),
		'mp-hub-newphone' => array( '➕ Add New Smartphone', admin_url( 'post-new.php?post_type=handset' ) ),
		'mp-hub-newrep'   => array( '🛠️ Add New Repair Service', admin_url( 'post-new.php?post_type=repair_service' ) ),
	);

	foreach ( $links as $id => $item ) {
		$wp_admin_bar->add_node( array(
			'id'     => $id,
			'parent' => 'mp-store-hub',
			'title'  => $item[0],
			'href'   => $item[1],
		) );
	}
}
add_action( 'admin_bar_menu', 'mp_admin_bar_quick_menu', 85 );


