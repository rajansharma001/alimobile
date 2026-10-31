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
	<link rel="apple-touch-icon" href="<?php echo esc_url( MP_THEME_URI . '/assets/images/logo-icon.png' ); ?>">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php if ( mp_opt( 'enable_preloader', '1' ) ) : ?>
<!-- Preloader -->
<div id="preloader" aria-hidden="true">
	<div class="preloader-content">
		<div class="preloader-logo-wrap">
			<div class="preloader-pulse"></div>
			<?php
			$logo_icon = mp_opt( 'favicon_image', '' );
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

    <nav class="nav" id="nav">
      <!-- Primary Core Nav Links (Concise, fit any desktop screen without overflow) -->
      <a class="<?php echo is_front_page() ? 'active' : ''; ?>" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'mobile-pasal' ); ?></a>
      <a href="<?php echo esc_url( home_url( '/shop/' ) ); ?>" class="<?php echo is_page( 'shop' ) ? 'active' : ''; ?>"><?php esc_html_e( 'Shop Handsets', 'mobile-pasal' ); ?></a>
      <a href="<?php echo esc_url( home_url( '/services/' ) ); ?>" class="<?php echo is_page( 'services' ) ? 'active' : ''; ?>"><?php esc_html_e( 'Services & Lab', 'mobile-pasal' ); ?></a>
      <a href="<?php echo is_front_page() ? '#flagship' : esc_url( home_url( '/#flagship' ) ); ?>"><?php esc_html_e( 'iPhone 16 Pro', 'mobile-pasal' ); ?></a>
      <a href="<?php echo esc_url( home_url( '/about/' ) ); ?>" class="<?php echo is_page( 'about' ) ? 'active' : ''; ?>"><?php esc_html_e( 'About', 'mobile-pasal' ); ?></a>
      <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="<?php echo is_page( 'contact' ) ? 'active' : ''; ?>"><?php esc_html_e( 'Contact', 'mobile-pasal' ); ?></a>

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
