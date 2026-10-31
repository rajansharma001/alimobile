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
        <span class="brand-mark"><span>✦</span></span>
        <span><?php echo esc_html( mp_opt( 'brand_name_line1', 'Ali Mobile' ) ); ?><br><?php echo esc_html( mp_opt( 'brand_name_line2', 'Center' ) ); ?></span>
      <?php endif; ?>
    </a>

    <button class="menu-toggle" id="menuToggle" aria-label="<?php esc_attr_e( 'Open navigation', 'mobile-pasal' ); ?>" aria-expanded="false" type="button">☰</button>

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

      <a class="phone-link mobile-cta" href="tel:+<?php echo esc_attr( $clean_p ); ?>"><span class="phone-icon">☎</span> <?php printf( esc_html__( 'Call %s', 'mobile-pasal' ), esc_html( $phone ) ); ?></a>
    </nav>

    <a class="phone-link" href="tel:+<?php echo esc_attr( $clean_p ); ?>"><span class="phone-icon">☎</span> <?php echo esc_html( $phone ); ?></a>
  </div>
</header>

<main id="top">
