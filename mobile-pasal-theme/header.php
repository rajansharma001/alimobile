<?php
/**
 * The header template for Mobile Pasal
 *
 * @package Mobile_Pasal
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
	<meta name="theme-color" content="#080c16">
	<meta name="color-scheme" content="light">
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

<!-- Top Utility Bar -->
<?php if ( mp_opt( 'topbar_show', '1' ) ) :
	$address = mp_opt( 'topbar_address', 'Gulariya-06, Ji. Pra. Ka. Chowk, Bardiya' );
	$hours   = mp_opt( 'topbar_hours', 'Sun–Fri: 9:00 AM – 8:00 PM | Sat: Open' );
	$phone   = mp_opt( 'contact_phone', '+977 9804530786' );
	$clean_p = mp_clean_phone( $phone );
?>
<div class="top-bar">
	<div class="wrap top-bar-inner">
		<div class="top-bar-left">
			<div class="top-bar-item">
				<svg viewBox="0 0 24 24" width="14" height="14" fill="currentColor"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5a2.5 2.5 0 0 1 0-5 2.5 2.5 0 0 1 0 5z"/></svg>
				<span><?php echo esc_html( $address ); ?></span>
			</div>
			<div class="top-bar-item">
				<svg viewBox="0 0 24 24" width="14" height="14" fill="currentColor"><path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67z"/></svg>
				<span><?php echo esc_html( $hours ); ?></span>
			</div>
		</div>
		<div class="top-bar-right">
			<span><?php esc_html_e( 'Direct Counter Helpline:', 'mobile-pasal' ); ?></span>
			<a class="top-hotline" href="tel:+<?php echo esc_attr( $clean_p ); ?>">
				<svg viewBox="0 0 24 24" width="14" height="14" fill="currentColor"><path d="M20.01 15.38c-1.23 0-2.42-.2-3.53-.56a.977.977 0 0 0-1.01.24l-1.57 1.97c-2.83-1.35-5.48-3.9-6.89-6.83l1.95-1.66c.27-.28.35-.67.24-1.02-.37-1.11-.56-2.3-.56-3.53 0-.54-.45-.99-.99-.99H4.19C3.65 3 3 3.24 3 3.99 3 13.28 10.73 21 20.01 21c.71 0 .99-.63.99-1.18v-3.45c0-.54-.45-.99-.99-.99z"/></svg>
				<strong><?php echo esc_html( $phone ); ?></strong>
			</a>
		</div>
	</div>
</div>
<?php endif; ?>

<!-- Main Sticky Header -->
<header class="site-header">
	<div class="wrap nav-container">
		<a class="brand-wrap" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo( 'name' ); ?>">
			<?php
			$custom_logo_url = mp_opt( 'logo_image', '' );
			if ( ! empty( $custom_logo_url ) ) :
				?>
				<img src="<?php echo esc_url( $custom_logo_url ); ?>" alt="<?php bloginfo( 'name' ); ?>" class="brand-logo-img">
			<?php elseif ( has_custom_logo() ) :
				the_custom_logo();
			else : ?>
				<img src="<?php echo esc_url( MP_THEME_URI . '/assets/images/logo-full.png' ); ?>" alt="<?php bloginfo( 'name' ); ?>" class="brand-logo-img">
			<?php endif; ?>
		</a>

		<!-- Desktop Navigation Menu -->
		<nav class="nav-links" aria-label="<?php esc_attr_e( 'Main Navigation', 'mobile-pasal' ); ?>">
			<?php
			if ( has_nav_menu( 'primary' ) ) {
				wp_nav_menu( array(
					'theme_location' => 'primary',
					'container'      => false,
					'items_wrap'     => '%3$s',
					'fallback_cb'    => 'mp_header_nav_fallback',
				) );
			} else {
				mp_header_nav_fallback();
			}
			?>
		</nav>

		<!-- Header Actions -->
		<div class="header-actions">
			<a class="btn-header-wa" href="<?php echo esc_url( mp_get_whatsapp_link() ); ?>" target="_blank" rel="noopener" title="<?php echo esc_attr( mp_opt( 'header_wa_btn_text', 'Chat on WhatsApp' ) ); ?>">
				<svg viewBox="0 0 24 24" width="16" height="16" fill="currentColor"><path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0 0 12.04 2m.01 1.67c2.2 0 4.26.86 5.82 2.42a8.225 8.225 0 0 1 2.41 5.83c0 4.54-3.7 8.24-8.24 8.24-1.48 0-2.93-.4-4.2-1.15l-.3-.18-3.12.82.83-3.04-.2-.31a8.196 8.196 0 0 1-1.26-4.38c0-4.54 3.7-8.24 8.24-8.24m4.52 11.66c-.25-.13-1.47-.72-1.7-.81-.23-.08-.39-.13-.56.13-.17.25-.64.81-.79.97-.14.17-.29.19-.54.06-.25-.13-1.05-.39-2-1.23-.74-.66-1.24-1.47-1.39-1.72-.14-.25-.02-.39.11-.51.11-.11.25-.29.37-.43.13-.14.17-.25.25-.41.08-.17.04-.31-.02-.44-.06-.13-.56-1.34-.76-1.84-.2-.49-.4-.42-.56-.43h-.47c-.17 0-.44.06-.67.31-.23.25-.87.85-.87 2.08 0 1.23.9 2.41 1.02 2.58.13.17 1.76 2.69 4.27 3.77.6.26 1.07.41 1.43.53.6.19 1.15.16 1.58.1.48-.07 1.47-.6 1.68-1.18.21-.58.21-1.07.15-1.18-.06-.11-.23-.17-.48-.29z"/></svg>
				<span class="btn-wa-text-full"><?php echo esc_html( mp_opt( 'header_wa_btn_text', 'Chat on WhatsApp' ) ); ?></span>
				<span class="btn-wa-text-mobile"><?php esc_html_e( 'WhatsApp', 'mobile-pasal' ); ?></span>
			</a>
			<button id="btn-mobile-toggle" class="btn-mobile-toggle" aria-label="<?php esc_attr_e( 'Open Mobile Menu', 'mobile-pasal' ); ?>" type="button">
				<svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
			</button>
		</div>
	</div>
</header>

<!-- Mobile Navigation Drawer -->
<div id="mobile-drawer" class="mobile-drawer" aria-hidden="true">
	<div id="mobile-drawer-overlay" class="mobile-drawer-overlay"></div>
	<div class="mobile-drawer-pane">
		<div class="mobile-drawer-header">
			<?php if ( ! empty( $custom_logo_url ) ) : ?>
				<img src="<?php echo esc_url( $custom_logo_url ); ?>" alt="<?php bloginfo( 'name' ); ?>">
			<?php else : ?>
				<img src="<?php echo esc_url( MP_THEME_URI . '/assets/images/logo-full.png' ); ?>" alt="<?php bloginfo( 'name' ); ?>">
			<?php endif; ?>
			<button id="btn-drawer-close" class="btn-drawer-close" aria-label="<?php esc_attr_e( 'Close Navigation', 'mobile-pasal' ); ?>" type="button">
				<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
			</button>
		</div>
		<nav class="mobile-nav-list">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="<?php echo is_front_page() ? 'active' : ''; ?>">
				<svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path></svg>
				<?php esc_html_e( 'Home', 'mobile-pasal' ); ?>
			</a>
			<a href="<?php echo esc_url( home_url( '/services/' ) ); ?>" class="<?php echo is_page( 'services' ) ? 'active' : ''; ?>">
				<svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"></path></svg>
				<?php esc_html_e( 'Services', 'mobile-pasal' ); ?>
			</a>
			<a href="<?php echo esc_url( home_url( '/shop/' ) ); ?>" class="<?php echo is_page( 'shop' ) ? 'active' : ''; ?>">
				<svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2"><rect x="5" y="2" width="14" height="20" rx="2" ry="2"></rect><line x1="12" y1="18" x2="12.01" y2="18"></line></svg>
				<?php esc_html_e( 'Shop', 'mobile-pasal' ); ?>
			</a>
			<a href="<?php echo esc_url( home_url( '/about/' ) ); ?>" class="<?php echo is_page( 'about' ) ? 'active' : ''; ?>">
				<svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>
				<?php esc_html_e( 'About', 'mobile-pasal' ); ?>
			</a>
			<a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="<?php echo is_page( 'contact' ) ? 'active' : ''; ?>">
				<svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
				<?php esc_html_e( 'Contact', 'mobile-pasal' ); ?>
			</a>
		</nav>
		<div class="mobile-drawer-footer">
			<a class="btn btn-whatsapp btn-block" href="<?php echo esc_url( mp_get_whatsapp_link() ); ?>" target="_blank" rel="noopener">
				<svg viewBox="0 0 24 24" width="18" height="18" fill="currentColor"><path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0 0 12.04 2m.01 1.67c2.2 0 4.26.86 5.82 2.42a8.225 8.225 0 0 1 2.41 5.83c0 4.54-3.7 8.24-8.24 8.24-1.48 0-2.93-.4-4.2-1.15l-.3-.18-3.12.82.83-3.04-.2-.31a8.196 8.196 0 0 1-1.26-4.38c0-4.54 3.7-8.24 8.24-8.24m4.52 11.66c-.25-.13-1.47-.72-1.7-.81-.23-.08-.39-.13-.56.13-.17.25-.64.81-.79.97-.14.17-.29.19-.54.06-.25-.13-1.05-.39-2-1.23-.74-.66-1.24-1.47-1.39-1.72-.14-.25-.02-.39.11-.51.11-.11.25-.29.37-.43.13-.14.17-.25.25-.41.08-.17.04-.31-.02-.44-.06-.13-.56-1.34-.76-1.84-.2-.49-.4-.42-.56-.43h-.47c-.17 0-.44.06-.67.31-.23.25-.87.85-.87 2.08 0 1.23.9 2.41 1.02 2.58.13.17 1.76 2.69 4.27 3.77.6.26 1.07.41 1.43.53.6.19 1.15.16 1.58.1.48-.07 1.47-.6 1.68-1.18.21-.58.21-1.07.15-1.18-.06-.11-.23-.17-.48-.29z"/></svg>
				<span><?php esc_html_e( 'Chat on WhatsApp', 'mobile-pasal' ); ?></span>
			</a>
			<?php
			$raw_phone = mp_opt( 'contact_phone', '+977 9804530786' );
			?>
			<a class="btn btn-secondary btn-block" href="tel:+<?php echo esc_attr( mp_clean_phone( $raw_phone ) ); ?>">
				<svg viewBox="0 0 24 24" width="18" height="18" fill="currentColor"><path d="M20.01 15.38c-1.23 0-2.42-.2-3.53-.56a.977.977 0 0 0-1.01.24l-1.57 1.97c-2.83-1.35-5.48-3.9-6.89-6.83l1.95-1.66c.27-.28.35-.67.24-1.02-.37-1.11-.56-2.3-.56-3.53 0-.54-.45-.99-.99-.99H4.19C3.65 3 3 3.24 3 3.99 3 13.28 10.73 21 20.01 21c.71 0 .99-.63.99-1.18v-3.45c0-.54-.45-.99-.99-.99z"/></svg>
				<span><?php printf( esc_html__( 'Call %s', 'mobile-pasal' ), esc_html( $raw_phone ) ); ?></span>
			</a>
		</div>
	</div>
</div>

<main id="top">
