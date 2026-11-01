<?php
/**
 * The header template for Mobile Pasal
 * Complete Store & Repair Lab Experience Design
 *
 * @package Mobile_Pasal
 * @version 3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$phone   = mp_opt( 'contact_phone', '+977 9804530786' );
$clean_p = mp_clean_phone( $phone );
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
	<meta name="theme-color" content="#ffffff">
	<meta name="color-scheme" content="light">
	<link rel="manifest" href="<?php echo esc_url( MP_THEME_URI . '/assets/manifest.json' ); ?>">
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="default">
	<meta name="apple-mobile-web-app-title" content="Ali Mobile">
	<?php
	$custom_favicon = mp_opt( 'site_favicon', '' );
	if ( empty( $custom_favicon ) ) {
		$custom_favicon = mp_opt( 'favicon_image', '' );
	}
	if ( empty( $custom_favicon ) && function_exists( 'get_site_icon_url' ) ) {
		$custom_favicon = get_site_icon_url( 32 );
	}
	if ( empty( $custom_favicon ) ) {
		$custom_favicon = MP_THEME_URI . '/assets/images/logo-icon.png';
	}
	?>
	<link rel="shortcut icon" href="<?php echo esc_url( $custom_favicon ); ?>">
	<link rel="icon" type="image/x-icon" href="<?php echo esc_url( $custom_favicon ); ?>">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo esc_url( $custom_favicon ); ?>">
	<link rel="icon" type="image/png" sizes="192x192" href="<?php echo esc_url( $custom_favicon ); ?>">
	<link rel="apple-touch-icon" href="<?php echo esc_url( $custom_favicon ); ?>">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php
$preloader_active = mp_opt( 'preloader_enabled', null );
if ( null === $preloader_active || '' === $preloader_active ) {
	$preloader_active = mp_opt( 'enable_preloader', '1' );
}
$preloader_dur   = mp_opt( 'preloader_duration', '1000' );
$preloader_color = mp_opt( 'color_primary', '#0066cc' );
?>
<?php if ( ! empty( $preloader_active ) && '0' !== (string) $preloader_active ) : ?>
<!-- Cleanroom Precision Preloader Inline Critical CSS -->
<style id="mp-preloader-critical-css">
#preloader{position:fixed;inset:0;width:100%;height:100%;background-color:#ffffff;z-index:999999;display:flex;align-items:center;justify-content:center;opacity:1;visibility:visible;transition:opacity .45s cubic-bezier(.16,1,.3,1),visibility .45s cubic-bezier(.16,1,.3,1);pointer-events:auto}
#preloader.loaded{opacity:0;visibility:hidden;pointer-events:none}
.preloader-content{display:flex;flex-direction:column;align-items:center;justify-content:center;gap:20px}
.preloader-logo-wrap{position:relative;width:80px;height:80px;display:flex;align-items:center;justify-content:center}
.preloader-pulse{position:absolute;inset:-6px;border-radius:20px;border:2px solid <?php echo esc_attr( $preloader_color ); ?>;opacity:0;animation:preloaderPulseRing 1.8s cubic-bezier(.24,0,.38,1) infinite}
.preloader-logo{width:56px;height:56px;object-fit:contain;position:relative;z-index:2;border-radius:14px;animation:preloaderLogoPulse 2s ease-in-out infinite alternate}
.preloader-bar{width:140px;height:3px;background-color:#e8eff9;border-radius:999px;overflow:hidden;position:relative}
.preloader-bar::after{content:'';position:absolute;top:0;left:-50%;width:50%;height:100%;background-color:<?php echo esc_attr( $preloader_color ); ?>;border-radius:999px;animation:preloaderProgressLine 1.3s cubic-bezier(.4,0,.2,1) infinite}
@keyframes preloaderPulseRing{0%{transform:scale(.85);opacity:.85}60%{transform:scale(1.22);opacity:0}100%{transform:scale(1.22);opacity:0}}
@keyframes preloaderLogoPulse{0%{transform:scale(.96)}100%{transform:scale(1.04)}}
@keyframes preloaderProgressLine{0%{left:-40%;width:35%}50%{left:30%;width:55%}100%{left:100%;width:35%}}
</style>
<!-- Cleanroom Precision Preloader -->
<div id="preloader" class="preloader-overlay" data-duration="<?php echo esc_attr( $preloader_dur ); ?>" aria-hidden="true">
	<div class="preloader-content">
		<div class="preloader-logo-wrap">
			<div class="preloader-pulse"></div>
			<?php
			$logo_icon = mp_opt( 'favicon_image', '' );
			if ( empty( $logo_icon ) ) {
				$logo_icon = mp_opt( 'site_favicon', '' );
			}
			if ( empty( $logo_icon ) ) {
				$logo_icon = mp_opt( 'logo_image', '' );
			}
			if ( empty( $logo_icon ) ) {
				$logo_icon = MP_THEME_URI . '/assets/images/logo-icon.png';
			}
			?>
			<img src="<?php echo esc_url( $logo_icon ); ?>" alt="<?php bloginfo( 'name' ); ?>" class="preloader-logo">
		</div>
		<div class="preloader-bar"></div>
	</div>
</div>
<?php endif; ?>

<!-- Modern Sticky Header Bar -->
<header class="header-bar" id="topHeader">
  <div class="container header">
    <a class="brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="<?php bloginfo( 'name' ); ?> Home">
      <?php
      $custom_logo_url = mp_opt( 'logo_image', '' );
      if ( ! empty( $custom_logo_url ) ) :
      ?>
        <img src="<?php echo esc_url( $custom_logo_url ); ?>" alt="<?php bloginfo( 'name' ); ?>" style="max-height: 48px; width: auto; object-fit: contain;">
      <?php else : ?>
        <span class="brand-mark">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 2L14.4 9.6L22 12L14.4 14.4L12 22L9.6 14.4L2 12L9.6 9.6L12 2Z"/></svg>
        </span>
        <span><?php echo esc_html( mp_opt( 'brand_name_line1', 'Ali Mobile' ) ); ?><br><?php echo esc_html( mp_opt( 'brand_name_line2', 'Center' ) ); ?></span>
      <?php endif; ?>
    </a>

    <button class="menu-toggle" id="menuToggle" aria-label="<?php esc_attr_e( 'Toggle navigation menu', 'mobile-pasal' ); ?>" aria-expanded="false" type="button">
      <svg class="hamburger-icon" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" aria-hidden="true"><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
      <svg class="close-icon" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" aria-hidden="true" style="display:none;"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
    </button>

    <nav class="nav" id="nav" aria-label="<?php esc_attr_e( 'Main Navigation', 'mobile-pasal' ); ?>">
      <?php
      if ( has_nav_menu( 'primary' ) ) {
        wp_nav_menu( array(
          'theme_location' => 'primary',
          'container'      => false,
          'menu_class'     => 'primary-menu-list',
          'fallback_cb'    => 'mp_nav_fallback',
          'walker'         => new MP_Nav_Walker(),
          'depth'          => 3,
        ) );
      } else {
        mp_nav_fallback();
      }
      ?>

      <!-- Mobile-only Deep Section Shortcuts inside Dropdown Drawer -->
      <div class="nav-drawer-extras">
        <div class="nav-drawer-divider"></div>
        <span class="nav-drawer-heading"><?php esc_html_e( 'Showroom Sections', 'mobile-pasal' ); ?></span>
        <a href="<?php echo is_front_page() ? '#categories' : esc_url( home_url( '/#categories' ) ); ?>"><?php esc_html_e( 'Device Categories', 'mobile-pasal' ); ?></a>
        <a href="<?php echo is_front_page() ? '#brands' : esc_url( home_url( '/#brands' ) ); ?>"><?php esc_html_e( 'Verified Brands', 'mobile-pasal' ); ?></a>
        <a href="<?php echo is_front_page() ? '#catalog' : esc_url( home_url( '/#catalog' ) ); ?>"><?php esc_html_e( 'Showroom Catalog', 'mobile-pasal' ); ?></a>
        <a href="<?php echo is_front_page() ? '#lab' : esc_url( home_url( '/#lab' ) ); ?>"><?php esc_html_e( 'Cleanroom Lab', 'mobile-pasal' ); ?></a>
        <a href="<?php echo is_front_page() ? '#repairs' : esc_url( home_url( '/#repairs' ) ); ?>"><?php esc_html_e( 'Repairs & Rates', 'mobile-pasal' ); ?></a>
        <a href="<?php echo is_front_page() ? '#workflow' : esc_url( home_url( '/#workflow' ) ); ?>"><?php esc_html_e( 'Service Workflow', 'mobile-pasal' ); ?></a>
        <a href="<?php echo is_front_page() ? '#reviews' : esc_url( home_url( '/#reviews' ) ); ?>"><?php esc_html_e( 'Customer Reviews', 'mobile-pasal' ); ?></a>
      </div>

      <a class="phone-link mobile-cta" href="tel:+<?php echo esc_attr( $clean_p ); ?>">
        <svg class="phone-icon-svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
        <span><?php printf( esc_html__( 'Call %s', 'mobile-pasal' ), esc_html( $phone ) ); ?></span>
      </a>
    </nav>

    <a class="phone-link" href="tel:+<?php echo esc_attr( $clean_p ); ?>">
      <svg class="phone-icon-svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
      <span><?php echo esc_html( $phone ); ?></span>
    </a>
  </div>
</header>

<main id="top">
