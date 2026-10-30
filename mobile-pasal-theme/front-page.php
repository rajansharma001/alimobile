<?php
/**
 * The template for displaying the front page / home page
 *
 * Modern Luxury Apple & Sapphire Cleanroom Style
 * Bento-grid categories, interactive diagnostic estimator, floating spec HUD cards,
 * and high-precision typography.
 *
 * @package Mobile_Pasal
 * @version 2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

// Hero Slide 1: Flagships
$slide1_badge     = mp_opt( 'hero_slide1_badge', '100% Genuine Sealed Stock' );
$slide1_title     = mp_opt( 'hero_slide1_title', 'Experience Next-Gen Flagships & Precision Care.' );
$slide1_highlight = mp_opt( 'hero_slide1_title_highlight', 'Authorized NTA Smartphones & Gear.' );
$slide1_desc      = mp_opt( 'hero_slide1_desc', 'Discover the latest iPhone 16 Series, Samsung Galaxy S24 Ultra, and Google Pixel 9. Official NTA-approved stock, verified IMEI bill, free walk-in data migration, and instant WhatsApp counter quotes.' );
$slide1_btn1      = mp_opt( 'hero_slide1_btn1_text', 'Explore Handsets' );
$slide1_btn2      = mp_opt( 'hero_slide1_btn2_text', "Ask Today's Price" );
$slide1_img       = mp_opt( 'hero_slide1_image', '' );
if ( empty( $slide1_img ) ) {
	$slide1_img = MP_THEME_URI . '/assets/images/hero-iphone-hand.jpg';
}

// Hero Slide 2: Apple Fix Cleanroom Lab
$slide2_badge     = mp_opt( 'hero_slide2_badge', 'Certified Apple Fix Cleanroom Lab' );
$slide2_title     = mp_opt( 'hero_slide2_title', "Gulariya's Premier Apple Fix Laboratory." );
$slide2_highlight = mp_opt( 'hero_slide2_title_highlight', 'Microscope Precision Repairs.' );
$slide2_desc      = mp_opt( 'hero_slide2_desc', 'Screen broken, battery drained, or phone dropped in water? We repair right in front of you at our on-site workstation. Original-grade parts, TrueTone display calibration, and honest diagnostics with zero hidden costs.' );
$slide2_btn1      = mp_opt( 'hero_slide2_btn1_text', 'Start Repair Estimate' );
$slide2_btn2      = mp_opt( 'hero_slide2_btn2_text', 'Call Technician' );
$slide2_img       = mp_opt( 'hero_slide2_image', '' );
if ( empty( $slide2_img ) ) {
	$slide2_img = MP_THEME_URI . '/assets/images/apple-fix-bench.jpg';
}

// Hero Slide 3: Genuine Gear & Accessories
$slide3_badge     = mp_opt( 'hero_slide3_badge', '100% Original Power & Protection' );
$slide3_title     = mp_opt( 'hero_slide3_title', 'Original Audio, PD Chargers & Gear.' );
$slide3_highlight = mp_opt( 'hero_slide3_title_highlight', 'Guaranteed Authentic Gear.' );
$slide3_desc      = mp_opt( 'hero_slide3_desc', 'Power and protect your device with authentic Apple AirPods, Galaxy Buds, 20W/30W/65W PD Fast Chargers, 9H tempered glass, MagSafe protective armor, and instant eSewa merchant top-up services.' );
$slide3_btn1      = mp_opt( 'hero_slide3_btn1_text', 'Browse Accessories' );
$slide3_btn2      = mp_opt( 'hero_slide3_btn2_text', 'Order on WhatsApp' );
$slide3_img       = mp_opt( 'hero_slide3_image', '' );
if ( empty( $slide3_img ) ) {
	$slide3_img = MP_THEME_URI . '/assets/images/shop-accessories-shelf.jpg';
}

$phone_raw   = mp_opt( 'contact_phone', '9804530786' );
$phone_clean = mp_clean_phone( $phone_raw );
?>

<main class="front-page-main">

<!-- =========================================================================
     1. HERO SLIDER SECTION (Cleanroom Glass & Floating Telemetry HUD)
     ========================================================================= -->
<section class="hero-slider-section" aria-label="<?php esc_attr_e( 'Hero Showcase Slider', 'mobile-pasal' ); ?>">
	<div class="hero-slider-container">

		<!-- Slide 1: Flagships -->
		<div class="hero-slide active" data-slide-index="0">
			<div class="wrap hero-grid">
				<div class="hero-content-col fade-up in-view">
					<div class="hero-eyebrow">
						<span class="eyebrow-ping"></span>
						<span class="eyebrow-text"><?php echo esc_html( $slide1_badge ); ?></span>
					</div>
					<h1 class="hero-title">
						<?php echo esc_html( $slide1_title ); ?>
						<span class="hero-title-highlight"><?php echo esc_html( $slide1_highlight ); ?></span>
					</h1>
					<p class="hero-description"><?php echo esc_html( $slide1_desc ); ?></p>

					<div class="hero-cta-group">
						<a class="btn btn-primary btn-lg" href="#catalog">
							<span><?php echo esc_html( $slide1_btn1 ); ?></span>
							<svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.4"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
						</a>
						<a class="btn btn-whatsapp btn-lg" href="<?php echo esc_url( mp_get_whatsapp_link( 'Namaste Ali Mobile, iPhone 16 ra Galaxy S24 ko aaja ko price dinus' ) ); ?>" target="_blank" rel="noopener">
							<svg viewBox="0 0 24 24" width="18" height="18" fill="currentColor"><path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0 0 12.04 2m.01 1.67c2.2 0 4.26.86 5.82 2.42a8.225 8.225 0 0 1 2.41 5.83c0 4.54-3.7 8.24-8.24 8.24-1.48 0-2.93-.4-4.2-1.15l-.3-.18-3.12.82.83-3.04-.2-.31a8.196 8.196 0 0 1-1.26-4.38c0-4.54 3.7-8.24 8.24-8.24m4.52 11.66c-.25-.13-1.47-.72-1.7-.81-.23-.08-.39-.13-.56.13-.17.25-.64.81-.79.97-.14.17-.29.19-.54.06-.25-.13-1.05-.39-2-1.23-.74-.66-1.24-1.47-1.39-1.72-.14-.25-.02-.39.11-.51.11-.11.25-.29.37-.43.13-.14.17-.25.25-.41.08-.17.04-.31-.02-.44-.06-.13-.56-1.34-.76-1.84-.2-.49-.4-.42-.56-.43h-.47c-.17 0-.44.06-.67.31-.23.25-.87.85-.87 2.08 0 1.23.9 2.41 1.02 2.58.13.17 1.76 2.69 4.27 3.77.6.26 1.07.41 1.43.53.6.19 1.15.16 1.58.1.48-.07 1.47-.6 1.68-1.18.21-.58.21-1.07.15-1.18-.06-.11-.23-.17-.48-.29z"/></svg>
							<span><?php echo esc_html( $slide1_btn2 ); ?></span>
						</a>
					</div>

					<!-- Luxury Trust Strip -->
					<div class="hero-trust-dock">
						<div class="trust-dock-card">
							<div class="trust-dock-icon">
								<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
							</div>
							<div class="trust-dock-content">
								<strong><?php esc_html_e( '100% Genuine Handsets', 'mobile-pasal' ); ?></strong>
								<span><?php esc_html_e( 'NTA Approved Stock', 'mobile-pasal' ); ?></span>
							</div>
						</div>
						<div class="trust-dock-card">
							<div class="trust-dock-icon">
								<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.2"><polyline points="20 6 9 17 4 12"></polyline></svg>
							</div>
							<div class="trust-dock-content">
								<strong><?php esc_html_e( 'Official Warranty', 'mobile-pasal' ); ?></strong>
								<span><?php esc_html_e( 'Verified Bill & IMEI', 'mobile-pasal' ); ?></span>
							</div>
						</div>
						<div class="trust-dock-card">
							<div class="trust-dock-icon">
								<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path></svg>
							</div>
							<div class="trust-dock-content">
								<strong><?php esc_html_e( 'Free Migration', 'mobile-pasal' ); ?></strong>
								<span><?php esc_html_e( 'Contacts & Media Setup', 'mobile-pasal' ); ?></span>
							</div>
						</div>
					</div>
				</div>

				<div class="hero-media-col">
					<div class="hero-media-viewport">
						<div class="viewport-backdrop-glow"></div>
						<img src="<?php echo esc_url( $slide1_img ); ?>" alt="<?php echo esc_attr( $slide1_title ); ?>" class="viewport-main-img">
						
						<!-- Floating Spec HUD 1 -->
						<div class="viewport-floating-badge top-right">
							<span class="hud-pill-dot green-pulse"></span>
							<span><?php esc_html_e( 'Sealed Stock • Ready for Pickup', 'mobile-pasal' ); ?></span>
						</div>

						<!-- Floating Telemetry HUD 2 -->
						<div class="viewport-telemetry-dock">
							<div class="telemetry-item">
								<span class="telemetry-label"><?php esc_html_e( 'Showroom Model', 'mobile-pasal' ); ?></span>
								<strong class="telemetry-value"><?php esc_html_e( 'iPhone 16 Pro Series', 'mobile-pasal' ); ?></strong>
							</div>
							<div class="telemetry-divider"></div>
							<div class="telemetry-item">
								<span class="telemetry-label"><?php esc_html_e( 'Status in Gulariya', 'mobile-pasal' ); ?></span>
								<strong class="telemetry-value highlight"><?php esc_html_e( 'In Stock Today', 'mobile-pasal' ); ?></strong>
							</div>
							<div class="telemetry-divider"></div>
							<div class="telemetry-item">
								<span class="telemetry-label"><?php esc_html_e( 'Compliance', 'mobile-pasal' ); ?></span>
								<strong class="telemetry-value"><?php esc_html_e( 'NTA MDMS Registered', 'mobile-pasal' ); ?></strong>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Slide 2: Apple Fix Cleanroom Lab -->
		<div class="hero-slide" data-slide-index="1">
			<div class="wrap hero-grid">
				<div class="hero-content-col">
					<div class="hero-eyebrow">
						<span class="eyebrow-ping sapphire"></span>
						<span class="eyebrow-text"><?php echo esc_html( $slide2_badge ); ?></span>
					</div>
					<h2 class="hero-title">
						<?php echo esc_html( $slide2_title ); ?>
						<span class="hero-title-highlight"><?php echo esc_html( $slide2_highlight ); ?></span>
					</h2>
					<p class="hero-description"><?php echo esc_html( $slide2_desc ); ?></p>

					<div class="hero-cta-group">
						<a class="btn btn-primary btn-lg" href="#repair-builder">
							<span><?php echo esc_html( $slide2_btn1 ); ?></span>
							<svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.4"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
						</a>
						<a class="btn btn-whatsapp btn-lg" href="tel:+<?php echo esc_attr( $phone_clean ); ?>">
							<svg viewBox="0 0 24 24" width="18" height="18" fill="currentColor"><path d="M20.01 15.38c-1.23 0-2.42-.2-3.53-.56a.977.977 0 0 0-1.01.24l-1.57 1.97c-2.83-1.35-5.48-3.9-6.89-6.83l1.95-1.66c.27-.28.35-.67.24-1.02-.37-1.11-.56-2.3-.56-3.53 0-.54-.45-.99-.99-.99H4.19C3.65 3 3 3.24 3 3.99 3 13.28 10.73 21 20.01 21c.71 0 .99-.63.99-1.18v-3.45c0-.54-.45-.99-.99-.99z"/></svg>
							<span><?php echo esc_html( $slide2_btn2 ); ?></span>
						</a>
					</div>

					<div class="hero-trust-dock">
						<div class="trust-dock-card">
							<div class="trust-dock-icon">
								<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
							</div>
							<div class="trust-dock-content">
								<strong><?php esc_html_e( '30–45 Min Screen Fix', 'mobile-pasal' ); ?></strong>
								<span><?php esc_html_e( 'Fast Counter Turnaround', 'mobile-pasal' ); ?></span>
							</div>
						</div>
						<div class="trust-dock-card">
							<div class="trust-dock-icon">
								<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
							</div>
							<div class="trust-dock-content">
								<strong><?php esc_html_e( 'Live Front Testing', 'mobile-pasal' ); ?></strong>
								<span><?php esc_html_e( 'Zero Privacy Risk', 'mobile-pasal' ); ?></span>
							</div>
						</div>
						<div class="trust-dock-card">
							<div class="trust-dock-icon">
								<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
							</div>
							<div class="trust-dock-content">
								<strong><?php esc_html_e( '90-Day Warranty', 'mobile-pasal' ); ?></strong>
								<span><?php esc_html_e( 'Official Cleanroom Stamp', 'mobile-pasal' ); ?></span>
							</div>
						</div>
					</div>
				</div>

				<div class="hero-media-col">
					<div class="hero-media-viewport">
						<div class="viewport-backdrop-glow"></div>
						<img src="<?php echo esc_url( $slide2_img ); ?>" alt="<?php echo esc_attr( $slide2_title ); ?>" class="viewport-main-img">
						<div class="viewport-floating-badge top-right">
							<span class="hud-pill-dot blue-pulse"></span>
							<span><?php esc_html_e( 'Class-100 Cleanroom Bench', 'mobile-pasal' ); ?></span>
						</div>
						<div class="viewport-telemetry-dock">
							<div class="telemetry-item">
								<span class="telemetry-label"><?php esc_html_e( 'Service Turnaround', 'mobile-pasal' ); ?></span>
								<strong class="telemetry-value highlight"><?php esc_html_e( '30–45 Mins Average', 'mobile-pasal' ); ?></strong>
							</div>
							<div class="telemetry-divider"></div>
							<div class="telemetry-item">
								<span class="telemetry-label"><?php esc_html_e( 'Technician Station', 'mobile-pasal' ); ?></span>
								<strong class="telemetry-value"><?php esc_html_e( 'Microscope Workstation', 'mobile-pasal' ); ?></strong>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Slide 3: Genuine Gear & Accessories -->
		<div class="hero-slide" data-slide-index="2">
			<div class="wrap hero-grid">
				<div class="hero-content-col">
					<div class="hero-eyebrow">
						<span class="eyebrow-ping gold"></span>
						<span class="eyebrow-text"><?php echo esc_html( $slide3_badge ); ?></span>
					</div>
					<h2 class="hero-title">
						<?php echo esc_html( $slide3_title ); ?>
						<span class="hero-title-highlight"><?php echo esc_html( $slide3_highlight ); ?></span>
					</h2>
					<p class="hero-description"><?php echo esc_html( $slide3_desc ); ?></p>

					<div class="hero-cta-group">
						<a class="btn btn-primary btn-lg" href="#categories">
							<span><?php echo esc_html( $slide3_btn1 ); ?></span>
							<svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.4"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
						</a>
						<a class="btn btn-whatsapp btn-lg" href="<?php echo esc_url( mp_get_whatsapp_link( 'Namaste Ali Mobile, AirPods ra 20W PD charger ko rate dinus' ) ); ?>" target="_blank" rel="noopener">
							<svg viewBox="0 0 24 24" width="18" height="18" fill="currentColor"><path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0 0 12.04 2"/></svg>
							<span><?php echo esc_html( $slide3_btn2 ); ?></span>
						</a>
					</div>

					<div class="hero-trust-dock">
						<div class="trust-dock-card">
							<div class="trust-dock-icon">
								<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"></path></svg>
							</div>
							<div class="trust-dock-content">
								<strong><?php esc_html_e( '20W–65W GaN Fast Charging', 'mobile-pasal' ); ?></strong>
								<span><?php esc_html_e( 'Apple, Samsung & Anker', 'mobile-pasal' ); ?></span>
							</div>
						</div>
						<div class="trust-dock-card">
							<div class="trust-dock-icon">
								<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
							</div>
							<div class="trust-dock-content">
								<strong><?php esc_html_e( 'Military-Grade Cases', 'mobile-pasal' ); ?></strong>
								<span><?php esc_html_e( 'MagSafe & Lens Armor', 'mobile-pasal' ); ?></span>
							</div>
						</div>
						<div class="trust-dock-card">
							<div class="trust-dock-icon">
								<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M3 18v-6a9 9 0 0 1 18 0v6"></path><path d="M21 19a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3zM3 19a2 2 0 0 0 2 2h1a2 2 0 0 0 2-2v-3a2 2 0 0 0-2-2H3z"></path></svg>
							</div>
							<div class="trust-dock-content">
								<strong><?php esc_html_e( 'Original ANC Audio', 'mobile-pasal' ); ?></strong>
								<span><?php esc_html_e( 'AirPods & Galaxy Buds', 'mobile-pasal' ); ?></span>
							</div>
						</div>
					</div>
				</div>

				<div class="hero-media-col">
					<div class="hero-media-viewport">
						<div class="viewport-backdrop-glow"></div>
						<img src="<?php echo esc_url( $slide3_img ); ?>" alt="<?php echo esc_attr( $slide3_title ); ?>" class="viewport-main-img">
						<div class="viewport-floating-badge top-right">
							<span class="hud-pill-dot gold-pulse"></span>
							<span><?php esc_html_e( 'Original Certified Accessories', 'mobile-pasal' ); ?></span>
						</div>
						<div class="viewport-telemetry-dock">
							<div class="telemetry-item">
								<span class="telemetry-label"><?php esc_html_e( 'Brands Supported', 'mobile-pasal' ); ?></span>
								<strong class="telemetry-value highlight"><?php esc_html_e( 'Apple • Samsung • Anker', 'mobile-pasal' ); ?></strong>
							</div>
							<div class="telemetry-divider"></div>
							<div class="telemetry-item">
								<span class="telemetry-label"><?php esc_html_e( 'Payment Convenience', 'mobile-pasal' ); ?></span>
								<strong class="telemetry-value"><?php esc_html_e( 'eSewa • Cash • Fonepay', 'mobile-pasal' ); ?></strong>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>

	<!-- Minimalist Luxury Slide Progress Trackers -->
	<div class="wrap hero-progress-dock">
		<div class="slider-progress-track" role="tablist" aria-label="<?php esc_attr_e( 'Slider navigation', 'mobile-pasal' ); ?>">
			<button type="button" class="slider-progress-pill active" data-slide-to="0" role="tab" aria-selected="true">
				<span class="pill-number">01</span>
				<span class="pill-label"><?php esc_html_e( 'Flagship Handsets', 'mobile-pasal' ); ?></span>
				<span class="pill-bar"><span class="pill-bar-fill"></span></span>
			</button>
			<button type="button" class="slider-progress-pill" data-slide-to="1" role="tab" aria-selected="false">
				<span class="pill-number">02</span>
				<span class="pill-label"><?php esc_html_e( 'Apple Fix Lab', 'mobile-pasal' ); ?></span>
				<span class="pill-bar"><span class="pill-bar-fill"></span></span>
			</button>
			<button type="button" class="slider-progress-pill" data-slide-to="2" role="tab" aria-selected="false">
				<span class="pill-number">03</span>
				<span class="pill-label"><?php esc_html_e( 'Genuine Gear', 'mobile-pasal' ); ?></span>
				<span class="pill-bar"><span class="pill-bar-fill"></span></span>
			</button>
		</div>
		<div class="slider-arrow-controls">
			<button type="button" id="slider-prev-btn" class="slider-arrow-btn" aria-label="<?php esc_attr_e( 'Previous slide', 'mobile-pasal' ); ?>">
				<svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.2"><polyline points="15 18 9 12 15 6"></polyline></svg>
			</button>
			<button type="button" id="slider-next-btn" class="slider-arrow-btn" aria-label="<?php esc_attr_e( 'Next slide', 'mobile-pasal' ); ?>">
				<svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.2"><polyline points="9 18 15 12 9 6"></polyline></svg>
			</button>
		</div>
	</div>
</section>

<!-- =========================================================================
     2. INTERACTIVE REPAIR DIAGNOSTIC & ESTIMATOR CONSOLE (#repair-builder)
     ========================================================================= -->
<section id="repair-builder" class="repair-builder-section">
	<div class="wrap">
		<div class="sec-head sec-head-center fade-up">
			<span class="sec-kicker">
				<svg viewBox="0 0 24 24" width="14" height="14" fill="currentColor"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/></svg>
				<?php echo esc_html( mp_opt( 'repair_kicker', 'Live Diagnostic Workbench' ) ); ?>
			</span>
			<h2><?php echo esc_html( mp_opt( 'repair_title', 'Phone Problem? Get a Direct Counter Estimate' ) ); ?></h2>
			<p><?php echo esc_html( mp_opt( 'repair_subtitle', 'Select your device and fault below. Your live repair docket is prepared in real-time. Dispatch directly to our Gulariya technician on WhatsApp for instant counter quotes.' ) ); ?></p>
		</div>

		<div class="repair-station-layout fade-up">
			<!-- Diagnostic Configuration -->
			<div class="repair-station-form">

				<!-- Step 1: Device Brand -->
				<div class="repair-step-block">
					<div class="step-header">
						<span class="step-num-badge">01</span>
						<div>
							<h3 class="step-title"><?php esc_html_e( 'Select Your Device Brand', 'mobile-pasal' ); ?></h3>
							<span class="step-subtext"><?php esc_html_e( 'Supported on-site at our Ji. Pra. Ka. Chowk workstation', 'mobile-pasal' ); ?></span>
						</div>
					</div>
					<div class="device-pills-grid" data-group="device">
						<button type="button" class="dev-pill-btn active" data-device="Apple iPhone">
							<div class="dev-pill-icon"><svg viewBox="0 0 170 170" width="20" height="20" fill="currentColor"><path d="M150.37 130.25c-2.45 5.66-5.35 10.87-8.71 15.66-4.58 6.53-8.33 11.05-11.22 13.56-4.48 4.12-9.28 6.23-14.42 6.35-3.69 0-8.14-1.05-13.32-3.18-5.19-2.12-9.97-3.17-14.34-3.17-4.58 0-9.49 1.05-14.75 3.17-5.26 2.13-9.5 3.24-12.74 3.35-4.35.13-9.16-1.9-14.42-6.08-3.7-3.04-7.58-7.71-11.65-14-4.89-7.5-8.88-16.14-11.96-25.91-3.08-9.77-4.63-19.34-4.63-28.71 0-14.33 3.63-26.23 10.89-35.69 7.26-9.46 16.51-14.28 27.75-14.47 5.26 0 11.01 1.34 17.26 4.02 6.24 2.68 10.15 4.09 11.72 4.22 1.93-.26 5.86-1.63 11.79-4.11 5.92-2.48 11.22-3.6 15.9-3.35 12.04.75 21.6 5.37 28.69 13.88-10.53 6.38-15.67 15.2-15.42 26.47.25 8.78 3.52 16.19 9.8 22.23 6.28 6.04 13.78 9.69 22.5 10.95-1.93 6.01-4.41 12.18-7.44 18.52zm-32.96-107.4c0-7.39 2.65-14.22 7.95-20.5 5.3-6.28 11.89-10.05 19.78-11.3 1.13 8.13-1.47 15.36-7.8 21.69-6.33 6.33-13.62 10.15-21.87 11.47-.28-.45-.42-.99-.42-1.62-.01-.42.23-.97.72-1.65-.01.62-.25 1.17-.36 1.91z"/></svg></div>
							<span class="dev-name"><?php esc_html_e( 'Apple iPhone', 'mobile-pasal' ); ?></span>
							<span class="dev-tag"><?php esc_html_e( 'Apple Fix Lab', 'mobile-pasal' ); ?></span>
						</button>
						<button type="button" class="dev-pill-btn" data-device="Samsung Galaxy">
							<div class="dev-pill-icon"><svg viewBox="0 0 24 24" width="20" height="20" fill="currentColor"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 14H9v-2h2v2zm0-4H9V7h2v5zm4 4h-2v-2h2v2zm0-4h-2V7h2v5z"/></svg></div>
							<span class="dev-name"><?php esc_html_e( 'Samsung Galaxy', 'mobile-pasal' ); ?></span>
							<span class="dev-tag"><?php esc_html_e( 'AMOLED Screen', 'mobile-pasal' ); ?></span>
						</button>
						<button type="button" class="dev-pill-btn" data-device="Google Pixel">
							<div class="dev-pill-icon"><svg viewBox="0 0 24 24" width="20" height="20"><path fill="#4285F4" d="M23.745 12.27c0-.7-.06-1.4-.19-2.07H12v4.51h6.6c-.29 1.52-1.14 2.8-2.4 3.65v3.03h3.88c2.27-2.09 3.66-5.17 3.66-9.12z"/><path fill="#34A853" d="M12 24c3.24 0 5.95-1.08 7.93-2.91l-3.88-3.03c-1.08.72-2.45 1.16-4.05 1.16-3.12 0-5.77-2.1-6.72-4.93H1.25v3.13C3.26 21.36 7.33 24 12 24z"/><path fill="#FBBC05" d="M5.28 14.29c-.25-.72-.38-1.49-.38-2.29s.13-1.57.38-2.29V6.57H1.25C.45 8.15 0 9.99 0 12s.45 3.85 1.25 5.43l4.03-3.14z"/><path fill="#EA4335" d="M12 4.75c1.77 0 3.35.61 4.6 1.8l3.42-3.42C17.95 1.19 15.24 0 12 0 7.33 0 3.26 2.64 1.25 6.57l4.03 3.14c.95-2.83 3.6-4.96 6.72-4.96z"/></svg></div>
							<span class="dev-name"><?php esc_html_e( 'Google Pixel', 'mobile-pasal' ); ?></span>
							<span class="dev-tag"><?php esc_html_e( 'Camera / Board', 'mobile-pasal' ); ?></span>
						</button>
						<button type="button" class="dev-pill-btn" data-device="OnePlus">
							<div class="dev-pill-icon"><svg viewBox="0 0 24 24" width="20" height="20" fill="currentColor"><rect width="24" height="24" rx="4" fill="#eb0028"/><path fill="#fff" d="M8 6h-2v12h2v-4.5h3c2.5 0 4.5-2 4.5-4.5S11.5 6 9 6H8zm0 5.5v-3.5h1c1.4 0 2.5 1.1 2.5 2.5s-1.1 2.5-2.5 2.5H8zm10-2.5h-1.5v1.5H15v1.5h1.5V12H18v-1.5h1.5v-1.5H18V9z"/></svg></div>
							<span class="dev-name"><?php esc_html_e( 'OnePlus', 'mobile-pasal' ); ?></span>
							<span class="dev-tag"><?php esc_html_e( 'Warp Charging', 'mobile-pasal' ); ?></span>
						</button>
						<button type="button" class="dev-pill-btn" data-device="Xiaomi / Redmi">
							<div class="dev-pill-icon"><svg viewBox="0 0 24 24" width="20" height="20"><rect width="24" height="24" rx="4" fill="#ff6900"/><path fill="#fff" d="M7 8h3v5H13V8h3v8h-3v-3h-3v3H7V8z"/></svg></div>
							<span class="dev-name"><?php esc_html_e( 'Xiaomi / Redmi', 'mobile-pasal' ); ?></span>
							<span class="dev-tag"><?php esc_html_e( 'Battery / Glass', 'mobile-pasal' ); ?></span>
						</button>
						<button type="button" class="dev-pill-btn" data-device="Other Android">
							<div class="dev-pill-icon"><svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2"><rect x="5" y="2" width="14" height="20" rx="2" ry="2"></rect><line x1="12" y1="18" x2="12.01" y2="18"></line></svg></div>
							<span class="dev-name"><?php esc_html_e( 'Other Android', 'mobile-pasal' ); ?></span>
							<span class="dev-tag"><?php esc_html_e( 'Universal Care', 'mobile-pasal' ); ?></span>
						</button>
					</div>
				</div>

				<!-- Step 2: Hardware Fault -->
				<div class="repair-step-block">
					<div class="step-header">
						<span class="step-num-badge">02</span>
						<div>
							<h3 class="step-title"><?php esc_html_e( 'Identify Hardware Symptom', 'mobile-pasal' ); ?></h3>
							<span class="step-subtext"><?php esc_html_e( 'Pick the issue needing diagnostic or parts replacement', 'mobile-pasal' ); ?></span>
						</div>
					</div>
					<div class="fault-cards-grid">
						<button type="button" class="fault-select-card active" data-issue="Screen &amp; Display (Cracked glass / black spots / touch dead)" data-time="30–45 Mins" data-warranty="90 Days Testing Warranty">
							<div class="fault-card-icon">
								<svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2"><rect x="5" y="2" width="14" height="20" rx="2" ry="2"></rect><line x1="8" y1="6" x2="16" y2="6"></line><line x1="8" y1="18" x2="16" y2="18"></line></svg>
							</div>
							<div class="fault-card-info">
								<div class="fault-card-title-row">
									<strong><?php esc_html_e( 'Screen & Display', 'mobile-pasal' ); ?></strong>
									<span class="fault-time-tag"><svg viewBox="0 0 24 24" width="10" height="10" fill="currentColor"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/></svg> 30–45m</span>
								</div>
								<small><?php esc_html_e( 'Cracked glass, black spots, touch dead, TrueTone restore', 'mobile-pasal' ); ?></small>
							</div>
						</button>

						<button type="button" class="fault-select-card" data-issue="Battery Replacement (Fast drain / sudden shutdown / swollen)" data-time="20–30 Mins" data-warranty="6 Months Battery Warranty">
							<div class="fault-card-icon">
								<svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="7" width="16" height="10" rx="2" ry="2"></rect><line x1="22" y1="11" x2="22" y2="13"></line><line x1="6" y1="11" x2="6" y2="13"></line><line x1="10" y1="11" x2="10" y2="13"></line></svg>
							</div>
							<div class="fault-card-info">
								<div class="fault-card-title-row">
									<strong><?php esc_html_e( 'Battery & BMS', 'mobile-pasal' ); ?></strong>
									<span class="fault-time-tag"><svg viewBox="0 0 24 24" width="10" height="10" fill="currentColor"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/></svg> 20–30m</span>
								</div>
								<small><?php esc_html_e( 'Fast drain, swollen battery, 100% health tag-on', 'mobile-pasal' ); ?></small>
							</div>
						</button>

						<button type="button" class="fault-select-card" data-issue="Charging &amp; Port (Slow charging / loose port / cable angle)" data-time="30 Mins" data-warranty="30 Days Service Warranty">
							<div class="fault-card-icon">
								<svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"></path></svg>
							</div>
							<div class="fault-card-info">
								<div class="fault-card-title-row">
									<strong><?php esc_html_e( 'Charging & Port', 'mobile-pasal' ); ?></strong>
									<span class="fault-time-tag"><svg viewBox="0 0 24 24" width="10" height="10" fill="currentColor"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/></svg> 30m</span>
								</div>
								<small><?php esc_html_e( 'Slow charging, loose Type-C/Lightning flex, debris clear', 'mobile-pasal' ); ?></small>
							</div>
						</button>

						<button type="button" class="fault-select-card" data-issue="Water Damage (Dropped in water / ultrasonic clean / IC)" data-time="1–2 Hours" data-warranty="Component Warranty">
							<div class="fault-card-icon">
								<svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2.69l5.66 5.66a8 8 0 1 1-11.31 0z"></path></svg>
							</div>
							<div class="fault-card-info">
								<div class="fault-card-title-row">
									<strong><?php esc_html_e( 'Water Damage Lab', 'mobile-pasal' ); ?></strong>
									<span class="fault-time-tag"><svg viewBox="0 0 24 24" width="10" height="10" fill="currentColor"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/></svg> 1–2h</span>
								</div>
								<small><?php esc_html_e( 'Dropped in water, ultrasonic oxidation bath, short IC repair', 'mobile-pasal' ); ?></small>
							</div>
						</button>

						<button type="button" class="fault-select-card" data-issue="Camera &amp; Sound (Mic not working / speaker muffled / camera)" data-time="45 Mins" data-warranty="60 Days Testing Warranty">
							<div class="fault-card-icon">
								<svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg>
							</div>
							<div class="fault-card-info">
								<div class="fault-card-title-row">
									<strong><?php esc_html_e( 'Camera, FaceID & Audio', 'mobile-pasal' ); ?></strong>
									<span class="fault-time-tag"><svg viewBox="0 0 24 24" width="10" height="10" fill="currentColor"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/></svg> 45m</span>
								</div>
								<small><?php esc_html_e( 'Muffled ear speaker, lens crack, FaceID dot projector', 'mobile-pasal' ); ?></small>
							</div>
						</button>

						<button type="button" class="fault-select-card" data-issue="Motherboard Micro-Soldering (Dead phone / IC reballing / reboot loop)" data-time="2–4 Hours" data-warranty="Precision Board Warranty">
							<div class="fault-card-icon">
								<svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
							</div>
							<div class="fault-card-info">
								<div class="fault-card-title-row">
									<strong><?php esc_html_e( 'Motherboard Micro-Soldering', 'mobile-pasal' ); ?></strong>
									<span class="fault-time-tag"><svg viewBox="0 0 24 24" width="10" height="10" fill="currentColor"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/></svg> 2–4h</span>
								</div>
								<small><?php esc_html_e( 'Power IC, audio codec, bootloop, thermal camera fault find', 'mobile-pasal' ); ?></small>
							</div>
						</button>
					</div>
				</div>

				<!-- Step 3: Specific Model Name -->
				<div class="repair-step-block">
					<div class="step-header">
						<span class="step-num-badge">03</span>
						<div>
							<h3 class="step-title"><?php esc_html_e( 'Specify Exact Model Name', 'mobile-pasal' ); ?></h3>
							<span class="step-subtext"><?php esc_html_e( 'Type your phone model or click a quick suggestion below', 'mobile-pasal' ); ?></span>
						</div>
					</div>
					<div class="model-input-wrap">
						<input type="text" id="builder-model-input" class="model-text-field" placeholder="<?php esc_attr_e( 'e.g. iPhone 15 Pro, Galaxy S24, Pixel 9, Redmi Note 13...', 'mobile-pasal' ); ?>" autocomplete="off">
					</div>
					<div class="quick-model-chips">
						<span class="quick-chips-label"><?php esc_html_e( 'Popular:', 'mobile-pasal' ); ?></span>
						<button type="button" class="quick-chip-btn" data-model="iPhone 16 Pro">iPhone 16 Pro</button>
						<button type="button" class="quick-chip-btn" data-model="iPhone 15 Pro">iPhone 15 Pro</button>
						<button type="button" class="quick-chip-btn" data-model="iPhone 13">iPhone 13</button>
						<button type="button" class="quick-chip-btn" data-model="Galaxy S24 Ultra">Galaxy S24 Ultra</button>
						<button type="button" class="quick-chip-btn" data-model="Redmi Note 13">Redmi Note 13</button>
						<button type="button" class="quick-chip-btn" data-model="Pixel 9">Pixel 9</button>
					</div>
				</div>
			</div>

			<!-- Live Ticket Docket (Apple Cleanroom Style) -->
			<div class="repair-station-ticket">
				<div class="ticket-docket-card">
					<div class="docket-top-bar">
						<div class="docket-id-badge">
							<span class="docket-dot"></span>
							<span><?php esc_html_e( 'CLEANROOM DOCKET #AF-2026', 'mobile-pasal' ); ?></span>
						</div>
						<span class="docket-station-tag"><?php esc_html_e( 'Ji. Pra. Ka. Chowk Desk', 'mobile-pasal' ); ?></span>
					</div>

					<div class="ticket-header">
						<h3><?php esc_html_e( 'Gulariya Live Repair Estimate', 'mobile-pasal' ); ?></h3>
						<p class="ticket-subtext"><?php esc_html_e( 'Ready for direct counter booking or WhatsApp confirmation', 'mobile-pasal' ); ?></p>
					</div>

					<div class="ticket-body">
						<div class="ticket-row">
							<span class="t-label"><?php esc_html_e( 'Device Ecosystem', 'mobile-pasal' ); ?></span>
							<strong id="ticket-device-val" class="t-val"><?php esc_html_e( 'Apple iPhone', 'mobile-pasal' ); ?></strong>
						</div>
						<div class="ticket-row">
							<span class="t-label"><?php esc_html_e( 'Model Specified', 'mobile-pasal' ); ?></span>
							<strong id="ticket-model-val" class="t-val"><?php esc_html_e( 'Specified at Counter', 'mobile-pasal' ); ?></strong>
						</div>
						<div class="ticket-row">
							<span class="t-label"><?php esc_html_e( 'Identified Fault', 'mobile-pasal' ); ?></span>
							<strong id="ticket-fault-val" class="t-val"><?php esc_html_e( 'Screen & Display', 'mobile-pasal' ); ?></strong>
						</div>
						<div class="ticket-row">
							<span class="t-label"><?php esc_html_e( 'Est. Turnaround', 'mobile-pasal' ); ?></span>
							<span id="ticket-time-val" class="t-badge-highlight">30–45 Mins</span>
						</div>
						<div class="ticket-row">
							<span class="t-label"><?php esc_html_e( 'Parts Specification', 'mobile-pasal' ); ?></span>
							<span class="t-val-text"><?php esc_html_e( '100% Original-Grade / OEM Tag', 'mobile-pasal' ); ?></span>
						</div>
						<div class="ticket-row">
							<span class="t-label"><?php esc_html_e( 'Laboratory Warranty', 'mobile-pasal' ); ?></span>
							<span id="ticket-warranty-val" class="t-val-text">90 Days Testing Warranty</span>
						</div>
						<div class="ticket-row">
							<span class="t-label"><?php esc_html_e( 'Physical Inspection', 'mobile-pasal' ); ?></span>
							<span class="t-badge-free"><?php esc_html_e( 'FREE Walk-In Diagnosis', 'mobile-pasal' ); ?></span>
						</div>
					</div>

					<div class="ticket-preview-box">
						<div class="tp-label">
							<svg viewBox="0 0 24 24" width="13" height="13" fill="currentColor"><path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0 0 12.04 2"/></svg>
							<span><?php esc_html_e( 'Direct WhatsApp Pre-Filled Query:', 'mobile-pasal' ); ?></span>
						</div>
						<div id="builder-preview-text" class="tp-text">"Namaste Ali Mobile &amp; Apple Fix, mero iPhone ma problem chha: Screen Broken / Touch Fault. Gulariya counter ma check ra repair cost barema jankari dinus."</div>
					</div>

					<div class="ticket-actions">
						<a id="builder-send-whatsapp-btn" class="btn btn-whatsapp btn-block" href="<?php echo esc_url( mp_get_whatsapp_link() ); ?>" target="_blank" rel="noopener">
							<svg viewBox="0 0 24 24" width="18" height="18" fill="currentColor"><path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0 0 12.04 2m.01 1.67c2.2 0 4.26.86 5.82 2.42a8.225 8.225 0 0 1 2.41 5.83c0 4.54-3.7 8.24-8.24 8.24-1.48 0-2.93-.4-4.2-1.15l-.3-.18-3.12.82.83-3.04-.2-.31a8.196 8.196 0 0 1-1.26-4.38c0-4.54 3.7-8.24 8.24-8.24m4.52 11.66c-.25-.13-1.47-.72-1.7-.81-.23-.08-.39-.13-.56.13-.17.25-.64.81-.79.97-.14.17-.29.19-.54.06-.25-.13-1.05-.39-2-1.23-.74-.66-1.24-1.47-1.39-1.72-.14-.25-.02-.39.11-.51.11-.11.25-.29.37-.43.13-.14.17-.25.25-.41.08-.17.04-.31-.02-.44-.06-.13-.56-1.34-.76-1.84-.2-.49-.4-.42-.56-.43h-.47c-.17 0-.44.06-.67.31-.23.25-.87.85-.87 2.08 0 1.23.9 2.41 1.02 2.58.13.17 1.76 2.69 4.27 3.77.6.26 1.07.41 1.43.53.6.19 1.15.16 1.58.1.48-.07 1.47-.6 1.68-1.18.21-.58.21-1.07.15-1.18-.06-.11-.23-.17-.48-.29z"/></svg>
							<span><?php esc_html_e( 'Dispatch Docket to WhatsApp', 'mobile-pasal' ); ?></span>
						</a>
						<a class="btn btn-secondary btn-block" href="tel:+<?php echo esc_attr( $phone_clean ); ?>">
							<svg viewBox="0 0 24 24" width="16" height="16" fill="currentColor"><path d="M20.01 15.38c-1.23 0-2.42-.2-3.53-.56a.977.977 0 0 0-1.01.24l-1.57 1.97c-2.83-1.35-5.48-3.9-6.89-6.83l1.95-1.66c.27-.28.35-.67.24-1.02-.37-1.11-.56-2.3-.56-3.53 0-.54-.45-.99-.99-.99H4.19C3.65 3 3 3.24 3 3.99 3 13.28 10.73 21 20.01 21c.71 0 .99-.63.99-1.18v-3.45c0-.54-.45-.99-.99-.99z"/></svg>
							<span><?php printf( esc_html__( 'Call Technician Directly (%s)', 'mobile-pasal' ), esc_html( $phone_raw ) ); ?></span>
						</a>
					</div>

					<div class="ticket-footer-note">
						<svg viewBox="0 0 24 24" width="14" height="14" fill="currentColor"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5a2.5 2.5 0 0 1 0-5 2.5 2.5 0 0 1 0 5z"/></svg>
						<span><?php esc_html_e( 'Ji. Pra. Ka. Chowk, Gulariya • Walk-in 9 AM – 8 PM', 'mobile-pasal' ); ?></span>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- =========================================================================
     3. BENTO-GRID STORE DEPARTMENTS (#categories)
     ========================================================================= -->
<section id="categories" class="categories-section">
	<div class="wrap">
		<div class="sec-head fade-up">
			<div>
				<span class="sec-kicker"><?php echo esc_html( mp_opt( 'categories_kicker', 'Store Departments' ) ); ?></span>
				<h2><?php echo esc_html( mp_opt( 'categories_title', 'Curated Showroom & Service Counters' ) ); ?></h2>
				<p><?php echo esc_html( mp_opt( 'categories_subtitle', 'From brand-new sealed flagships with official VAT billing to Gulariya’s premier Apple Fix cleanroom lab.' ) ); ?></p>
			</div>
			<a class="view-all-link" href="#catalog">
				<span><?php esc_html_e( 'Explore All Products', 'mobile-pasal' ); ?></span>
				<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.2"><polyline points="9 18 15 12 9 6"></polyline></svg>
			</a>
		</div>

		<!-- Bento Grid Layout -->
		<div class="bento-grid-container fade-up">
			
			<!-- Bento 1: Flagship Smartphones (Featured 2-Col Span) -->
			<div class="bento-card bento-card-large bento-card-smartphones">
				<div class="bento-card-content">
					<div class="bento-badge-row">
						<span class="bento-pill"><?php echo esc_html( mp_opt( 'cat1_count', '50+ In-Stock Handsets' ) ); ?></span>
						<span class="bento-pill-ghost"><?php esc_html_e( '100% NTA MDMS Approved', 'mobile-pasal' ); ?></span>
					</div>
					<h3 class="bento-title"><?php echo esc_html( mp_opt( 'cat1_title', 'Flagship Smartphones & iPhones' ) ); ?></h3>
					<p class="bento-desc"><?php esc_html_e( 'Brand new sealed units for iPhone 16 Pro, Galaxy S24 Ultra, Pixel 9 & OnePlus. Genuine VAT invoice & manufacturer warranty.', 'mobile-pasal' ); ?></p>
					
					<div class="bento-model-tags">
						<span>Apple iPhone</span>
						<span>Samsung Galaxy</span>
						<span>Google Pixel</span>
						<span>OnePlus</span>
						<span>Xiaomi</span>
					</div>

					<a href="#catalog" class="bento-action-btn">
						<span><?php esc_html_e( 'View Handset Showroom', 'mobile-pasal' ); ?></span>
						<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.2"><polyline points="9 18 15 12 9 6"></polyline></svg>
					</a>
				</div>
				<div class="bento-card-media">
					<img src="<?php echo esc_url( MP_THEME_URI . '/assets/images/iphone-16-colors.jpg' ); ?>" alt="Flagship Smartphones at Ali Mobile" loading="lazy">
				</div>
			</div>

			<!-- Bento 2: Apple Fix Precision Lab -->
			<div class="bento-card bento-card-tall bento-card-lab">
				<div class="bento-card-content">
					<div class="bento-badge-row">
						<span class="bento-pill sapphire"><?php echo esc_html( mp_opt( 'cat2_count', 'Microscope Repair Bench' ) ); ?></span>
					</div>
					<h3 class="bento-title"><?php echo esc_html( mp_opt( 'cat2_title', 'Apple Fix Precision Cleanroom Lab' ) ); ?></h3>
					<p class="bento-desc"><?php esc_html_e( 'On-site screen lamination, TrueTone EEPROM transfer, battery BMS transplants, and component micro-soldering.', 'mobile-pasal' ); ?></p>
					
					<div class="bento-spec-strip">
						<div class="bento-spec-item">
							<strong>30–45m</strong>
							<small>Display Fix</small>
						</div>
						<div class="bento-spec-divider"></div>
						<div class="bento-spec-item">
							<strong>90 Days</strong>
							<small>Warranty</small>
						</div>
						<div class="bento-spec-divider"></div>
						<div class="bento-spec-item">
							<strong>100%</strong>
							<small>Originals</small>
						</div>
					</div>

					<a href="#repair-builder" class="bento-action-btn">
						<span><?php esc_html_e( 'Calculate Repair Price', 'mobile-pasal' ); ?></span>
						<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.2"><polyline points="9 18 15 12 9 6"></polyline></svg>
					</a>
				</div>
				<div class="bento-card-media">
					<img src="<?php echo esc_url( MP_THEME_URI . '/assets/images/apple-fix-bench.jpg' ); ?>" alt="Apple Fix Workstation" loading="lazy">
				</div>
			</div>

			<!-- Bento 3: PD Fast Chargers & GaN Power -->
			<div class="bento-card bento-card-medium bento-card-power">
				<div class="bento-card-content">
					<span class="bento-pill"><?php echo esc_html( mp_opt( 'cat3_count', '20W–120W GaN Charging' ) ); ?></span>
					<h3 class="bento-title"><?php echo esc_html( mp_opt( 'cat3_title', 'Original Power & MagSafe' ) ); ?></h3>
					<p class="bento-desc"><?php esc_html_e( 'Authentic 20W/30W/65W PD adapters, braided cables, and wireless MagSafe docks.', 'mobile-pasal' ); ?></p>
					<a href="#catalog" class="bento-link">
						<span><?php esc_html_e( 'Browse Adapters', 'mobile-pasal' ); ?> &rarr;</span>
					</a>
				</div>
				<div class="bento-mini-thumb">
					<img src="<?php echo esc_url( MP_THEME_URI . '/assets/images/acc-charger.jpg' ); ?>" alt="Fast Chargers" loading="lazy">
				</div>
			</div>

			<!-- Bento 4: Genuine AirPods & Audio -->
			<div class="bento-card bento-card-medium bento-card-audio">
				<div class="bento-card-content">
					<span class="bento-pill"><?php esc_html_e( 'ANC Wireless Audio', 'mobile-pasal' ); ?></span>
					<h3 class="bento-title"><?php esc_html_e( 'AirPods & Galaxy Buds', 'mobile-pasal' ); ?></h3>
					<p class="bento-desc"><?php esc_html_e( 'Apple AirPods Pro 2, Galaxy Buds 3 Pro, neckbands & premium noise-canceling gear.', 'mobile-pasal' ); ?></p>
					<a href="#catalog" class="bento-link">
						<span><?php esc_html_e( 'Explore Audio', 'mobile-pasal' ); ?> &rarr;</span>
					</a>
				</div>
				<div class="bento-mini-thumb">
					<img src="<?php echo esc_url( MP_THEME_URI . '/assets/images/acc-airpods.jpg' ); ?>" alt="AirPods" loading="lazy">
				</div>
			</div>

			<!-- Bento 5: Protective Armor & 9H Glass -->
			<div class="bento-card bento-card-medium bento-card-armor">
				<div class="bento-card-content">
					<span class="bento-pill"><?php esc_html_e( 'Drop Defense', 'mobile-pasal' ); ?></span>
					<h3 class="bento-title"><?php esc_html_e( 'MagSafe Cases & 9H Glass', 'mobile-pasal' ); ?></h3>
					<p class="bento-desc"><?php esc_html_e( 'Military drop protection, sapphire camera lens covers, and matte privacy films.', 'mobile-pasal' ); ?></p>
					<a href="#catalog" class="bento-link">
						<span><?php esc_html_e( 'View Protection', 'mobile-pasal' ); ?> &rarr;</span>
					</a>
				</div>
				<div class="bento-mini-thumb">
					<img src="<?php echo esc_url( MP_THEME_URI . '/assets/images/acc-cases.jpg' ); ?>" alt="Protective Cases" loading="lazy">
				</div>
			</div>

			<!-- Bento 6: Trade-In & Merchant Services Banner Bar -->
			<div class="bento-card bento-card-banner bento-card-tradein">
				<div class="bento-banner-content">
					<div class="bento-banner-left">
						<div class="bento-banner-icon">
							<svg viewBox="0 0 24 24" width="28" height="28" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
						</div>
						<div>
							<h3 class="bento-banner-title"><?php esc_html_e( 'Device Trade-In Desk & eSewa Merchant Hub', 'mobile-pasal' ); ?></h3>
							<p class="bento-banner-desc"><?php esc_html_e( 'Bring your current smartphone to Ji. Pra. Ka. Chowk. Instant cosmetic & board appraisal deducted directly from your brand new flagship invoice. Digital merchant top-ups and bill payments available.', 'mobile-pasal' ); ?></p>
						</div>
					</div>
					<div class="bento-banner-actions">
						<a class="btn btn-whatsapp" href="<?php echo esc_url( mp_get_whatsapp_link( 'Namaste Ali Mobile, mero purano phone exchange / trade-in barema bujhna chahanchhu' ) ); ?>" target="_blank" rel="noopener">
							<span><?php esc_html_e( 'Get Trade-In Valuation', 'mobile-pasal' ); ?></span>
						</a>
					</div>
				</div>
			</div>

		</div>
	</div>
</section>

<!-- =========================================================================
     4. AUTHORIZED BRANDS ECOSYSTEM (#brands)
     ========================================================================= -->
<section id="brands" class="brands-section">
	<div class="wrap">
		<div class="sec-head fade-up">
			<div>
				<span class="sec-kicker"><?php echo esc_html( mp_opt( 'brands_kicker', 'Authorized Ecosystem' ) ); ?></span>
				<h2><?php echo esc_html( mp_opt( 'brands_title', 'Top Smartphone Brands In Store' ) ); ?></h2>
				<p><?php echo esc_html( mp_opt( 'brands_subtitle', 'Click any brand tile to instantly filter live models and counter pricing.' ) ); ?></p>
			</div>
			<a class="view-all-link" href="#catalog">
				<span><?php esc_html_e( 'Explore All Brands', 'mobile-pasal' ); ?></span>
				<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.2"><polyline points="9 18 15 12 9 6"></polyline></svg>
			</a>
		</div>

		<div class="brands-grid fade-up">
			<div class="brand-card-link" data-filter-brand="apple">
				<div class="brand-logo-svg">
					<svg viewBox="0 0 170 170" width="34" height="34" fill="currentColor"><path d="M150.37 130.25c-2.45 5.66-5.35 10.87-8.71 15.66-4.58 6.53-8.33 11.05-11.22 13.56-4.48 4.12-9.28 6.23-14.42 6.35-3.69 0-8.14-1.05-13.32-3.18-5.19-2.12-9.97-3.17-14.34-3.17-4.58 0-9.49 1.05-14.75 3.17-5.26 2.13-9.5 3.24-12.74 3.35-4.35.13-9.16-1.9-14.42-6.08-3.7-3.04-7.58-7.71-11.65-14-4.89-7.5-8.88-16.14-11.96-25.91-3.08-9.77-4.63-19.34-4.63-28.71 0-14.33 3.63-26.23 10.89-35.69 7.26-9.46 16.51-14.28 27.75-14.47 5.26 0 11.01 1.34 17.26 4.02 6.24 2.68 10.15 4.09 11.72 4.22 1.93-.26 5.86-1.63 11.79-4.11 5.92-2.48 11.22-3.6 15.9-3.35 12.04.75 21.6 5.37 28.69 13.88-10.53 6.38-15.67 15.2-15.42 26.47.25 8.78 3.52 16.19 9.8 22.23 6.28 6.04 13.78 9.69 22.5 10.95-1.93 6.01-4.41 12.18-7.44 18.52zm-32.96-107.4c0-7.39 2.65-14.22 7.95-20.5 5.3-6.28 11.89-10.05 19.78-11.3 1.13 8.13-1.47 15.36-7.8 21.69-6.33 6.33-13.62 10.15-21.87 11.47-.28-.45-.42-.99-.42-1.62-.01-.42.23-.97.72-1.65-.01.62-.25 1.17-.36 1.91z"/></svg>
				</div>
				<span class="brand-name">Apple</span>
				<small><?php esc_html_e( 'iPhone 16 & Apple Fix', 'mobile-pasal' ); ?></small>
				<span class="brand-pill-tag">Authorized</span>
			</div>

			<div class="brand-card-link" data-filter-brand="samsung">
				<div class="brand-logo-svg">
					<svg viewBox="0 0 100 24" height="22" fill="#0c4da2"><path d="M12.8 14.5c0-1.8-1.5-2.7-4.3-3.4C6 10.5 4.9 9.9 4.9 8.8c0-.9.9-1.5 2.5-1.5 1.8 0 3 .7 3.2 2h3.2c-.3-2.9-2.6-4.6-6.4-4.6C3.1 4.7.7 6.8.7 9.8c0 2.2 1.4 3.3 4.5 4.1 2.8.7 3.8 1.4 3.8 2.5 0 1.1-1.1 1.7-2.9 1.7-2.2 0-3.6-.9-3.8-2.5H0c.2 3.3 2.7 5.1 7.1 5.1 4.4 0 6.9-2.2 6.9-5.1zm11.2-9.6l-5.6 15.4h3.7l1.1-3.3h5.9l1.1 3.3h3.7L28.3 4.9h-4.3zm.5 9.3l1.7-5.3 1.7 5.3h-3.4zm16.5-9.3v9.8l-5.5-9.8h-3.2v15.4h3.4V10.5l5.5 9.8h3.2V4.9h-3.4zm17.9 9.6c0-1.8-1.5-2.7-4.3-3.4-2.5-.6-3.6-1.2-3.6-2.3 0-.9.9-1.5 2.5-1.5 1.8 0 3 .7 3.2 2h3.2c-.3-2.9-2.6-4.6-6.4-4.6-4.3 0-6.7 2.1-6.7 5.1 0 2.2 1.4 3.3 4.5 4.1 2.8.7 3.8 1.4 3.8 2.5 0 1.1-1.1 1.7-2.9 1.7-2.2 0-3.6-.9-3.8-2.5h-3.2c.2 3.3 2.7 5.1 7.1 5.1 4.4 0 6.9-2.2 6.9-5.1zm11.8-9.6v9.8c0 1.8 1.1 2.7 2.8 2.7 1.8 0 2.8-.9 2.8-2.7V4.9h3.6v9.7c0 3.8-2.5 5.8-6.4 5.8s-6.4-2-6.4-5.8V4.9h3.6zm19.5 0v9.8l-5.5-9.8h-3.2v15.4h3.4V10.5l5.5 9.8h3.2V4.9h-3.4z"/></svg>
				</div>
				<span class="brand-name">Samsung</span>
				<small><?php esc_html_e( 'Galaxy S24 & Z Fold', 'mobile-pasal' ); ?></small>
				<span class="brand-pill-tag">Official Stock</span>
			</div>

			<div class="brand-card-link" data-filter-brand="google">
				<div class="brand-logo-svg">
					<svg viewBox="0 0 24 24" width="28" height="28"><path fill="#4285F4" d="M23.745 12.27c0-.7-.06-1.4-.19-2.07H12v4.51h6.6c-.29 1.52-1.14 2.8-2.4 3.65v3.03h3.88c2.27-2.09 3.66-5.17 3.66-9.12z"/><path fill="#34A853" d="M12 24c3.24 0 5.95-1.08 7.93-2.91l-3.88-3.03c-1.08.72-2.45 1.16-4.05 1.16-3.12 0-5.77-2.1-6.72-4.93H1.25v3.13C3.26 21.36 7.33 24 12 24z"/><path fill="#FBBC05" d="M5.28 14.29c-.25-.72-.38-1.49-.38-2.29s.13-1.57.38-2.29V6.57H1.25C.45 8.15 0 9.99 0 12s.45 3.85 1.25 5.43l4.03-3.14z"/><path fill="#EA4335" d="M12 4.75c1.77 0 3.35.61 4.6 1.8l3.42-3.42C17.95 1.19 15.24 0 12 0 7.33 0 3.26 2.64 1.25 6.57l4.03 3.14c.95-2.83 3.6-4.96 6.72-4.96z"/></svg>
				</div>
				<span class="brand-name">Google Pixel</span>
				<small><?php esc_html_e( 'Pixel 9 & Tensor G4', 'mobile-pasal' ); ?></small>
				<span class="brand-pill-tag">Direct Import</span>
			</div>

			<div class="brand-card-link" data-filter-brand="oneplus">
				<div class="brand-logo-svg">
					<svg viewBox="0 0 40 40" width="30" height="30"><rect width="40" height="40" rx="8" fill="#eb0028"/><path fill="#fff" d="M14 11h-3v18h3v-7h4c3.86 0 7-3.14 7-7s-3.14-7-7-7h-4zm0 8v-5h4c2.21 0 4 1.79 4 4s-1.79 4-4 4h-4zm15-4h-2v2h2v2h2v-2h2v-2h-2v-2h-2v2z"/></svg>
				</div>
				<span class="brand-name">OnePlus</span>
				<small><?php esc_html_e( 'OnePlus 12 & Nord 4', 'mobile-pasal' ); ?></small>
				<span class="brand-pill-tag">Fast Charging</span>
			</div>

			<div class="brand-card-link" data-filter-brand="xiaomi">
				<div class="brand-logo-svg">
					<svg viewBox="0 0 40 40" width="30" height="30"><rect width="40" height="40" rx="8" fill="#ff6900"/><path fill="#fff" d="M11 13h5.5v8.5H22V13h5.5v14h-5.5v-4.5h-5.5V27H11V13zm8 7.5v-4h2.5v4H19z"/></svg>
				</div>
				<span class="brand-name">Xiaomi</span>
				<small><?php esc_html_e( 'Xiaomi 14 & Redmi Note', 'mobile-pasal' ); ?></small>
				<span class="brand-pill-tag">Value 5G</span>
			</div>

			<div class="brand-card-link" data-filter-brand="accessories">
				<div class="brand-logo-svg">
					<svg viewBox="0 0 24 24" width="30" height="30" fill="#059669"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 14H9v-2h2v2zm0-4H9V7h2v5zm4 4h-2v-2h2v2zm0-4h-2V7h2v5z"/></svg>
				</div>
				<span class="brand-name">Accessories</span>
				<small><?php esc_html_e( 'AirPods, Watch & Anker', 'mobile-pasal' ); ?></small>
				<span class="brand-pill-tag">100% Genuine</span>
			</div>
		</div>
	</div>
</section>

<!-- =========================================================================
     5. FLAGSHIP SPOTLIGHT BANNER (iPhone 16 Pro Titanium Showcase)
     ========================================================================= -->
<section class="flagship-banner-section">
	<div class="wrap">
		<div class="flagship-banner-card fade-up">
			<div class="flagship-banner-content">
				<div class="brand-tag-apple">
					<svg viewBox="0 0 170 170" width="16" height="16" fill="currentColor"><path d="M150.37 130.25c-2.45 5.66-5.35 10.87-8.71 15.66-4.58 6.53-8.33 11.05-11.22 13.56-4.48 4.12-9.28 6.23-14.42 6.35-3.69 0-8.14-1.05-13.32-3.18-5.19-2.12-9.97-3.17-14.34-3.17-4.58 0-9.49 1.05-14.75 3.17-5.26 2.13-9.5 3.24-12.74 3.35-4.35.13-9.16-1.9-14.42-6.08-3.7-3.04-7.58-7.71-11.65-14-4.89-7.5-8.88-16.14-11.96-25.91-3.08-9.77-4.63-19.34-4.63-28.71 0-14.33 3.63-26.23 10.89-35.69 7.26-9.46 16.51-14.28 27.75-14.47 5.26 0 11.01 1.34 17.26 4.02 6.24 2.68 10.15 4.09 11.72 4.22 1.93-.26 5.86-1.63 11.79-4.11 5.92-2.48 11.22-3.6 15.9-3.35 12.04.75 21.6 5.37 28.69 13.88-10.53 6.38-15.67 15.2-15.42 26.47.25 8.78 3.52 16.19 9.8 22.23 6.28 6.04 13.78 9.69 22.5 10.95-1.93 6.01-4.41 12.18-7.44 18.52zm-32.96-107.4c0-7.39 2.65-14.22 7.95-20.5 5.3-6.28 11.89-10.05 19.78-11.3 1.13 8.13-1.47 15.36-7.8 21.69-6.33 6.33-13.62 10.15-21.87 11.47-.28-.45-.42-.99-.42-1.62-.01-.42.23-.97.72-1.65-.01.62-.25 1.17-.36 1.91z"/></svg>
					<span><?php echo esc_html( mp_opt( 'spotlight_badge', 'Featured Flagship in Gulariya' ) ); ?></span>
				</div>
				<h2><?php echo esc_html( mp_opt( 'spotlight_title', 'iPhone 16 Pro & Pro Max' ) ); ?></h2>
				<p class="tagline"><?php esc_html_e( 'Built for Apple Intelligence • Grade 5 Titanium', 'mobile-pasal' ); ?></p>
				<p class="desc"><?php echo esc_html( mp_opt( 'spotlight_subtitle', 'Experience the supercharged A18 Pro silicon chip, 48MP Fusion Camera system, dedicated tactile Camera Control button, and best-ever battery endurance. Sealed stock ready for immediate handover at our Gulariya counter.' ) ); ?></p>

				<div class="spec-pills-row">
					<span class="spec-pill"><i class="fa-solid fa-microchip"></i> <?php echo esc_html( mp_opt( 'spotlight_chip', 'A18 Pro Silicon' ) ); ?></span>
					<span class="spec-pill"><i class="fa-solid fa-camera"></i> <?php echo esc_html( mp_opt( 'spotlight_camera', '48MP Fusion + 5x Telephoto' ) ); ?></span>
					<span class="spec-pill"><i class="fa-solid fa-shield-halved"></i> <?php echo esc_html( mp_opt( 'spotlight_finish', 'Grade 5 Titanium Finish' ) ); ?></span>
					<span class="spec-pill"><i class="fa-solid fa-file-invoice-dollar"></i> <?php esc_html_e( 'NTA MDMS Registered • VAT Bill', 'mobile-pasal' ); ?></span>
				</div>

				<div class="flagship-actions">
					<a class="btn btn-whatsapp btn-lg" href="<?php echo esc_url( mp_get_whatsapp_link( 'Namaste, iPhone 16 Pro (128GB / 256GB) ko aaja ko counter price dinus' ) ); ?>" target="_blank" rel="noopener">
						<svg viewBox="0 0 24 24" width="18" height="18" fill="currentColor"><path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0 0 12.04 2"/></svg>
						<span><?php esc_html_e( 'Ask Counter Price on WhatsApp', 'mobile-pasal' ); ?></span>
					</a>
					<a class="btn btn-secondary btn-lg" href="tel:+<?php echo esc_attr( $phone_clean ); ?>">
						<svg viewBox="0 0 24 24" width="16" height="16" fill="currentColor"><path d="M20.01 15.38c-1.23 0-2.42-.2-3.53-.56a.977.977 0 0 0-1.01.24l-1.57 1.97c-2.83-1.35-5.48-3.9-6.89-6.83l1.95-1.66c.27-.28.35-.67.24-1.02-.37-1.11-.56-2.3-.56-3.53 0-.54-.45-.99-.99-.99H4.19C3.65 3 3 3.24 3 3.99 3 13.28 10.73 21 20.01 21c.71 0 .99-.63.99-1.18v-3.45c0-.54-.45-.99-.99-.99z"/></svg>
						<span><?php printf( esc_html__( 'Call Store (%s)', 'mobile-pasal' ), esc_html( $phone_raw ) ); ?></span>
					</a>
				</div>
			</div>
			
			<div class="flagship-media">
				<div class="flagship-ambient-orb"></div>
				<?php 
				$spotlight_img = mp_opt( 'spotlight_image', '' );
				if ( empty( $spotlight_img ) ) {
					$spotlight_img = MP_THEME_URI . '/assets/images/iphone-16-pro.jpg';
				}
				?>
				<img src="<?php echo esc_url( $spotlight_img ); ?>" alt="Apple iPhone 16 Pro in Black Titanium" class="flagship-img">
			</div>
		</div>
	</div>
</section>

<!-- =========================================================================
     6. SHOWROOM HANDSETS CATALOG (#catalog)
     ========================================================================= -->
<section id="catalog" class="catalog-section">
	<div class="wrap">
		<div class="sec-head fade-up">
			<div>
				<span class="sec-kicker"><?php esc_html_e( 'Showroom Catalog', 'mobile-pasal' ); ?></span>
				<h2><?php esc_html_e( 'Latest Smartphone Arrivals & In-Stock Models', 'mobile-pasal' ); ?></h2>
				<p><?php esc_html_e( 'Every handset is brand-new, sealed-pack, NTA-approved, and backed by genuine distributor warranty with official VAT bill.', 'mobile-pasal' ); ?></p>
			</div>
			<a class="view-all-link" href="<?php echo esc_url( mp_get_whatsapp_link( 'Namaste Ali Mobile, showroom ko current handset stock list dinus' ) ); ?>" target="_blank" rel="noopener">
				<span><?php esc_html_e( 'Inquire Full Inventory', 'mobile-pasal' ); ?></span>
				<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.2"><polyline points="9 18 15 12 9 6"></polyline></svg>
			</a>
		</div>

		<!-- Interactive Catalog Toolbar -->
		<div class="catalog-toolbar-panel fade-up">
			<div class="filter-tabs-wrapper" role="tablist">
				<button type="button" class="filter-tab-btn active" data-filter="all"><?php esc_html_e( 'All Devices', 'mobile-pasal' ); ?></button>
				<button type="button" class="filter-tab-btn" data-filter="apple">Apple iPhone</button>
				<button type="button" class="filter-tab-btn" data-filter="samsung">Samsung Galaxy</button>
				<button type="button" class="filter-tab-btn" data-filter="google">Google Pixel</button>
				<button type="button" class="filter-tab-btn" data-filter="oneplus">OnePlus</button>
				<button type="button" class="filter-tab-btn" data-filter="xiaomi">Xiaomi / Redmi</button>
				<button type="button" class="filter-tab-btn" data-filter="accessories"><?php esc_html_e( 'Accessories & Buds', 'mobile-pasal' ); ?></button>
			</div>

			<div class="catalog-live-search" role="search">
				<span class="cat-search-icon" aria-hidden="true">
					<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
				</span>
				<input id="site-search" type="search" placeholder="<?php esc_attr_e( 'Search iPhone, Galaxy, Pixel, Redmi, Buds...', 'mobile-pasal' ); ?>" aria-label="<?php esc_attr_e( 'Search showroom catalog', 'mobile-pasal' ); ?>" autocomplete="off">
				<button id="search-clear-btn" class="cat-search-clear" title="<?php esc_attr_e( 'Clear search', 'mobile-pasal' ); ?>" aria-label="<?php esc_attr_e( 'Clear search', 'mobile-pasal' ); ?>" type="button">
					<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
				</button>
			</div>
		</div>

		<!-- Products Grid -->
		<div class="products-grid fade-up">
			<?php
			$handset_query = new WP_Query( array(
				'post_type'      => 'handset',
				'posts_per_page' => 12,
				'post_status'    => 'publish',
			) );

			if ( $handset_query->have_posts() ) :
				while ( $handset_query->have_posts() ) :
					$handset_query->the_post();
					$p_id       = get_the_ID();
					$p_title    = get_the_title();
					$badge      = get_post_meta( $p_id, '_mp_badge', true ) ?: 'NTA Approved Stock';
					$price      = get_post_meta( $p_id, '_mp_price', true );
					$old_price  = get_post_meta( $p_id, '_mp_old_price', true );
					$rating     = get_post_meta( $p_id, '_mp_rating', true ) ?: '4.9';
					$reviews    = get_post_meta( $p_id, '_mp_reviews_count', true ) ?: '42';
					$img_url    = mp_get_handset_img_url( $p_id );

					$specs_text = get_post_meta( $p_id, '_mp_spec_screen', true );
					if ( empty( $specs_text ) ) {
						$specs_text = get_the_excerpt();
					}

					$brand_terms = get_the_terms( $p_id, 'device_brand' );
					$brand_slug  = ! empty( $brand_terms ) ? strtolower( $brand_terms[0]->slug ) : 'all';
					$brand_name  = ! empty( $brand_terms ) ? $brand_terms[0]->name : 'Flagship Handset';
					?>
					<article class="product-card" data-brand="<?php echo esc_attr( $brand_slug ); ?>" data-category="smartphones">
						<div class="product-card-inner">
							<div class="product-badge-wrap">
								<span class="badge-tag"><?php echo esc_html( $badge ); ?></span>
								<span class="badge-vat"><i class="fa-solid fa-receipt"></i> VAT Bill</span>
							</div>
							
							<div class="product-img-wrap">
								<img src="<?php echo esc_url( $img_url ); ?>" alt="<?php echo esc_attr( $p_title ); ?>" loading="lazy">
							</div>

							<div class="product-body">
								<div class="product-meta-header">
									<span class="product-brand-tag"><?php echo esc_html( $brand_name ); ?></span>
									<span class="product-stock-pill"><span class="stock-pulse-dot"></span> In Store</span>
								</div>

								<h3 class="product-title"><?php echo esc_html( $p_title ); ?></h3>
								<p class="product-specs"><?php echo esc_html( $specs_text ); ?></p>

								<?php if ( ! empty( $price ) ) : ?>
									<div class="product-price-row">
										<div class="product-price-main">
											<strong class="price-val"><?php echo esc_html( $price ); ?></strong>
											<?php if ( ! empty( $old_price ) ) : ?>
												<span class="price-old"><?php echo esc_html( $old_price ); ?></span>
											<?php endif; ?>
										</div>
										<span class="emi-tag"><?php esc_html_e( 'EMI Available', 'mobile-pasal' ); ?></span>
									</div>
								<?php endif; ?>

								<div class="product-rating">
									<div class="stars-row">
										<svg viewBox="0 0 24 24" width="13" height="13" fill="#f59e0b"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
										<svg viewBox="0 0 24 24" width="13" height="13" fill="#f59e0b"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
										<svg viewBox="0 0 24 24" width="13" height="13" fill="#f59e0b"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
										<svg viewBox="0 0 24 24" width="13" height="13" fill="#f59e0b"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
										<svg viewBox="0 0 24 24" width="13" height="13" fill="#f59e0b"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
									</div>
									<span class="rating-num"><?php echo esc_html( $rating ); ?> (<?php echo esc_html( $reviews ); ?>)</span>
								</div>

								<div class="product-actions-dock">
									<a class="btn btn-whatsapp btn-sm btn-block" href="<?php echo esc_url( mp_get_whatsapp_link( 'Namaste Ali Mobile, ' . $p_title . ' ko aaja ko price ra stock dinus' ) ); ?>" target="_blank" rel="noopener">
										<svg viewBox="0 0 24 24" width="15" height="15" fill="currentColor"><path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0 0 12.04 2"/></svg>
										<span><?php esc_html_e( 'Ask Price on WhatsApp', 'mobile-pasal' ); ?></span>
									</a>
								</div>
							</div>
						</div>
					</article>
				<?php endwhile;
				wp_reset_postdata();
			else :
				// Fallback default handsets
				$default_handsets = mp_get_default_handsets_data();
				foreach ( $default_handsets as $h ) :
					$brand_slug = strtolower( $h['brand'] );
					?>
					<article class="product-card" data-brand="<?php echo esc_attr( $brand_slug ); ?>" data-category="smartphones">
						<div class="product-card-inner">
							<div class="product-badge-wrap">
								<span class="badge-tag"><?php echo esc_html( $h['badge'] ); ?></span>
								<span class="badge-vat"><i class="fa-solid fa-receipt"></i> VAT Bill</span>
							</div>

							<div class="product-img-wrap">
								<img src="<?php echo esc_url( mp_asset_img( $h['image'] ) ); ?>" alt="<?php echo esc_attr( $h['title'] ); ?>" loading="lazy">
							</div>

							<div class="product-body">
								<div class="product-meta-header">
									<span class="product-brand-tag"><?php echo esc_html( $h['brand'] ); ?></span>
									<span class="product-stock-pill"><span class="stock-pulse-dot"></span> In Store</span>
								</div>

								<h3 class="product-title"><?php echo esc_html( $h['title'] ); ?></h3>
								<p class="product-specs"><?php echo esc_html( $h['screen'] ); ?></p>

								<div class="product-price-row">
									<div class="product-price-main">
										<strong class="price-val"><?php echo esc_html( $h['price'] ); ?></strong>
										<?php if ( ! empty( $h['old_price'] ) ) : ?>
											<span class="price-old"><?php echo esc_html( $h['old_price'] ); ?></span>
										<?php endif; ?>
									</div>
									<span class="emi-tag"><?php esc_html_e( 'EMI Available', 'mobile-pasal' ); ?></span>
								</div>

								<div class="product-rating">
									<div class="stars-row">
										<svg viewBox="0 0 24 24" width="13" height="13" fill="#f59e0b"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
										<svg viewBox="0 0 24 24" width="13" height="13" fill="#f59e0b"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
										<svg viewBox="0 0 24 24" width="13" height="13" fill="#f59e0b"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
										<svg viewBox="0 0 24 24" width="13" height="13" fill="#f59e0b"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
										<svg viewBox="0 0 24 24" width="13" height="13" fill="#f59e0b"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
									</div>
									<span class="rating-num"><?php echo esc_html( $h['rating'] ); ?> (<?php echo esc_html( $h['reviews'] ); ?>)</span>
								</div>

								<div class="product-actions-dock">
									<a class="btn btn-whatsapp btn-sm btn-block" href="<?php echo esc_url( mp_get_whatsapp_link( 'Namaste Ali Mobile, ' . $h['title'] . ' ko aaja ko price ra stock dinus' ) ); ?>" target="_blank" rel="noopener">
										<svg viewBox="0 0 24 24" width="15" height="15" fill="currentColor"><path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0 0 12.04 2"/></svg>
										<span><?php esc_html_e( 'Ask Price on WhatsApp', 'mobile-pasal' ); ?></span>
									</a>
								</div>
							</div>
						</div>
					</article>
				<?php endforeach;
			endif;
			?>
		</div>

		<!-- No Results Notice -->
		<div id="catalog-empty-notice" class="catalog-empty-notice" aria-live="polite">
			<svg viewBox="0 0 24 24" width="44" height="44" fill="none" stroke="currentColor" stroke-width="1.8"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
			<h3><?php esc_html_e( 'No matching models found in this tab', 'mobile-pasal' ); ?></h3>
			<p><?php esc_html_e( 'We source rare models or custom storage variants directly from authorized national distributors in 24 hours. Message your model name directly.', 'mobile-pasal' ); ?></p>
			<a class="btn btn-whatsapp" href="<?php echo esc_url( mp_get_whatsapp_link() ); ?>" target="_blank" rel="noopener">
				<span><?php esc_html_e( 'Ask Model Availability on WhatsApp', 'mobile-pasal' ); ?></span>
			</a>
		</div>
	</div>
</section>

<!-- =========================================================================
     7. APPLE FIX CLEANROOM & MICRO-SOLDERING SHOWCASE (.apple-fix-showcase-section)
     ========================================================================= -->
<section class="apple-fix-showcase-section">
	<div class="wrap">
		<div class="apple-fix-banner-grid fade-up">
			
			<div class="af-media-col">
				<div class="af-media-frame">
					<?php 
					$lab_img = mp_opt( 'lab_image', '' );
					if ( empty( $lab_img ) ) {
						$lab_img = MP_THEME_URI . '/assets/images/apple-fix-bench.jpg';
					}
					?>
					<img src="<?php echo esc_url( $lab_img ); ?>" alt="Apple Fix precision repair workstation in Gulariya">
					
					<!-- Floating Cleanroom HUD -->
					<div class="af-floating-hud">
						<div class="af-hud-icon"><i class="fa-solid fa-microscope"></i></div>
						<div>
							<strong><?php esc_html_e( 'Active Cleanroom Station', 'mobile-pasal' ); ?></strong>
							<span><?php esc_html_e( 'ESD Anti-Static Bench • Stereomicroscope 45X', 'mobile-pasal' ); ?></span>
						</div>
					</div>

					<div class="af-floating-stamp">
						<span class="stamp-dot"></span>
						<span><?php esc_html_e( 'No Courier Delays to Nepalgunj', 'mobile-pasal' ); ?></span>
					</div>
				</div>
			</div>

			<div class="af-text-col">
				<div class="af-badge">
					<svg viewBox="0 0 24 24" width="14" height="14" fill="currentColor"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/></svg>
					<span><?php echo esc_html( mp_opt( 'lab_kicker', 'Cleanroom Bench Setup' ) ); ?></span>
				</div>
				<h2><?php echo esc_html( mp_opt( 'lab_title', 'Precision Microscope Level Repairs Right in Gulariya' ) ); ?></h2>
				<p class="af-sub-desc"><?php echo esc_html( mp_opt( 'lab_subtitle', 'We do not courier your valuable phone to Nepalgunj or Kathmandu. Our on-site workstation handles display lamination, genuine battery replacement, ultrasonic board cleaning, and IC diagnostics right across the counter.' ) ); ?></p>

				<div class="af-metrics-strip">
					<div class="af-metric-box">
						<strong class="af-metric-num"><?php echo esc_html( mp_opt( 'lab_stat1_num', '10,000+' ) ); ?></strong>
						<span class="af-metric-label"><?php echo esc_html( mp_opt( 'lab_stat1_label', 'Repairs Completed' ) ); ?></span>
					</div>
					<div class="af-metric-divider"></div>
					<div class="af-metric-box">
						<strong class="af-metric-num"><?php echo esc_html( mp_opt( 'lab_stat2_num', '98.5%' ) ); ?></strong>
						<span class="af-metric-label"><?php echo esc_html( mp_opt( 'lab_stat2_label', 'Success Rate' ) ); ?></span>
					</div>
					<div class="af-metric-divider"></div>
					<div class="af-metric-box">
						<strong class="af-metric-num highlight"><?php echo esc_html( mp_opt( 'lab_stat3_num', '45 Min' ) ); ?></strong>
						<span class="af-metric-label"><?php echo esc_html( mp_opt( 'lab_stat3_label', 'Screen Turnaround' ) ); ?></span>
					</div>
				</div>

				<div class="af-features-list">
					<div class="af-feature-item">
						<div class="af-f-icon">
							<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
						</div>
						<div>
							<strong><?php esc_html_e( 'TrueTone & FaceID Calibration', 'mobile-pasal' ); ?></strong>
							<p><?php esc_html_e( 'We transfer display EEPROM memory chips so your natural brightness and TrueTone work flawlessly.', 'mobile-pasal' ); ?></p>
						</div>
					</div>

					<div class="af-feature-item">
						<div class="af-f-icon">
							<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.2"><rect x="2" y="7" width="16" height="10" rx="2" ry="2"></rect><line x1="22" y1="11" x2="22" y2="13"></line></svg>
						</div>
						<div>
							<strong><?php esc_html_e( 'Battery BMS Tag-On Transplant', 'mobile-pasal' ); ?></strong>
							<p><?php esc_html_e( 'Restores 100% maximum capacity health without triggering unknown component warning banners.', 'mobile-pasal' ); ?></p>
						</div>
					</div>

					<div class="af-feature-item">
						<div class="af-f-icon">
							<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
						</div>
						<div>
							<strong><?php esc_html_e( 'In-Front-Of-You Cleanroom Transparency', 'mobile-pasal' ); ?></strong>
							<p><?php esc_html_e( 'Watch every disassembly step across our counter with complete privacy protection for your photos and messages.', 'mobile-pasal' ); ?></p>
						</div>
					</div>
				</div>

				<div class="af-cta-row">
					<a class="btn btn-whatsapp btn-lg" href="<?php echo esc_url( mp_get_whatsapp_link( 'Namaste Apple Fix, mero iPhone check garauna chahanchhu' ) ); ?>" target="_blank" rel="noopener">
						<svg viewBox="0 0 24 24" width="18" height="18" fill="currentColor"><path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0 0 12.04 2"/></svg>
						<span><?php esc_html_e( 'Consult Technician on WhatsApp', 'mobile-pasal' ); ?></span>
					</a>
					<a class="btn btn-secondary btn-lg" href="tel:+<?php echo esc_attr( $phone_clean ); ?>">
						<span><?php printf( esc_html__( 'Call Counter (%s)', 'mobile-pasal' ), esc_html( $phone_raw ) ); ?></span>
					</a>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- =========================================================================
     8. CORE REPAIR CAPABILITIES & WORKFLOW TIMELINE (#services)
     ========================================================================= -->
<section id="services" class="repair-services-section">
	<div class="wrap">
		<div class="sec-head fade-up">
			<div>
				<span class="sec-kicker"><?php esc_html_e( 'Counter Diagnostic Menu', 'mobile-pasal' ); ?></span>
				<h2><?php esc_html_e( 'Core Cleanroom Repair Workstations', 'mobile-pasal' ); ?></h2>
				<p><?php esc_html_e( 'From Apple iPhone OLED restoration to Samsung Galaxy charging circuits and water oxidation baths.', 'mobile-pasal' ); ?></p>
			</div>
			<a class="view-all-link" href="#repair-builder">
				<span><?php esc_html_e( 'Get Instant Quote', 'mobile-pasal' ); ?></span>
				<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.2"><polyline points="9 18 15 12 9 6"></polyline></svg>
			</a>
		</div>

		<!-- Services Cards Grid -->
		<div class="services-grid fade-up">
			<?php
			$services_query = new WP_Query( array(
				'post_type'      => 'repair_service',
				'posts_per_page' => 6,
				'post_status'    => 'publish',
			) );

			if ( $services_query->have_posts() ) :
				while ( $services_query->have_posts() ) :
					$services_query->the_post();
					$s_id    = get_the_ID();
					$turn    = get_post_meta( $s_id, '_mp_service_turnaround', true ) ?: '30–45 Mins';
					$price_s = get_post_meta( $s_id, '_mp_service_price', true ) ?: 'Original Grade Parts';
					?>
					<div class="service-card">
						<div class="service-card-top">
							<div class="service-icon-wrap">
								<svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"></path></svg>
							</div>
							<span class="service-time-pill"><i class="fa-solid fa-clock"></i> <?php echo esc_html( $turn ); ?></span>
						</div>
						<h3 class="service-title"><?php the_title(); ?></h3>
						<p class="service-desc"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 18 ) ); ?></p>
						
						<div class="service-card-footer">
							<span class="service-price-tag"><?php echo esc_html( $price_s ); ?></span>
							<a href="#repair-builder" class="service-action-link" title="<?php esc_attr_e( 'Select in Estimator', 'mobile-pasal' ); ?>">
								<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.2"><polyline points="9 18 15 12 9 6"></polyline></svg>
							</a>
						</div>
					</div>
				<?php endwhile;
				wp_reset_postdata();
			else :
				// Fallback default services
				$default_repairs = mp_get_default_repair_services_data();
				foreach ( $default_repairs as $r ) :
					?>
					<div class="service-card">
						<div class="service-card-top">
							<div class="service-icon-wrap">
								<svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"></path></svg>
							</div>
							<span class="service-time-pill"><i class="fa-solid fa-clock"></i> <?php echo esc_html( $r['turnaround'] ); ?></span>
						</div>
						<h3 class="service-title"><?php echo esc_html( $r['title'] ); ?></h3>
						<p class="service-desc"><?php echo esc_html( $r['excerpt'] ); ?></p>
						
						<div class="service-card-footer">
							<span class="service-price-tag"><?php echo esc_html( $r['price'] ); ?></span>
							<a href="#repair-builder" class="service-action-link">
								<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.2"><polyline points="9 18 15 12 9 6"></polyline></svg>
							</a>
						</div>
					</div>
				<?php endforeach;
			endif;
			?>
		</div>

		<!-- 3-Step Counter Service Stepper -->
		<div class="sec-head sec-head-center fade-up" style="margin-top: 60px; margin-bottom: 30px;">
			<span class="sec-kicker"><?php esc_html_e( 'Transparent Counter Workflow', 'mobile-pasal' ); ?></span>
			<h2><?php esc_html_e( 'How Your Device is Repaired at Our Counter', 'mobile-pasal' ); ?></h2>
			<p><?php esc_html_e( 'No hidden fees, no courier waiting, and zero private data risk.', 'mobile-pasal' ); ?></p>
		</div>

		<div class="steps-flow-grid fade-up">
			<div class="flow-step-card">
				<div class="flow-step-header">
					<span class="flow-num-badge">01</span>
					<span class="flow-phase-tag"><?php esc_html_e( '5 Minutes', 'mobile-pasal' ); ?></span>
				</div>
				<h3><?php esc_html_e( 'Free Counter Diagnostic', 'mobile-pasal' ); ?></h3>
				<p><?php esc_html_e( 'Bring your handset to Ji. Pra. Ka. Chowk. Our technician inspects hardware symptoms and quotes exact parts cost with zero obligation.', 'mobile-pasal' ); ?></p>
			</div>

			<div class="flow-step-card highlight">
				<div class="flow-step-header">
					<span class="flow-num-badge">02</span>
					<span class="flow-phase-tag"><?php esc_html_e( '30–45 Mins', 'mobile-pasal' ); ?></span>
				</div>
				<h3><?php esc_html_e( 'In-Front-Of-You Precision Fix', 'mobile-pasal' ); ?></h3>
				<p><?php esc_html_e( 'Watch your screen, battery, or circuit repaired across our transparent counter workbench using ESD tools, stereomicroscope, and heat plates.', 'mobile-pasal' ); ?></p>
			</div>

			<div class="flow-step-card">
				<div class="flow-step-header">
					<span class="flow-num-badge">03</span>
					<span class="flow-phase-tag"><?php esc_html_e( 'Multi-Point QC', 'mobile-pasal' ); ?></span>
				</div>
				<h3><?php esc_html_e( 'Live Testing & Warranty Handover', 'mobile-pasal' ); ?></h3>
				<p><?php esc_html_e( 'Multi-point verification for touch, TrueTone, front/rear camera, and charging current. Handover with written 90-day testing warranty.', 'mobile-pasal' ); ?></p>
			</div>
		</div>
	</div>
</section>

<!-- =========================================================================
     9. TECHNICIAN FIRST-AID & CARE GUIDES (.guides-section)
     ========================================================================= -->
<section class="guides-section">
	<div class="wrap">
		<div class="sec-head fade-up">
			<div>
				<span class="sec-kicker"><?php esc_html_e( 'Practical Advice', 'mobile-pasal' ); ?></span>
				<h2><?php esc_html_e( 'Phone First-Aid & Maintenance Protocols', 'mobile-pasal' ); ?></h2>
				<p><?php esc_html_e( 'Actionable advice from our certified technicians on protecting your smartphone before bringing it to our counter.', 'mobile-pasal' ); ?></p>
			</div>
			<a class="view-all-link" href="<?php echo esc_url( mp_get_whatsapp_link( 'Namaste, mero phone ma problem chha technical advice chahiyo' ) ); ?>" target="_blank" rel="noopener">
				<span><?php esc_html_e( 'Ask Technician Directly', 'mobile-pasal' ); ?></span>
				<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.2"><polyline points="9 18 15 12 9 6"></polyline></svg>
			</a>
		</div>

		<div class="guides-grid fade-up">
			<!-- Guide 1: Cracked Screen -->
			<div class="guide-card">
				<div class="guide-thumb-wrap">
					<img src="<?php echo esc_url( MP_THEME_URI . '/assets/images/tip-cracked-screen.jpg' ); ?>" alt="Cracked screen first aid">
					<span class="guide-tag"><?php esc_html_e( 'Display Protocol', 'mobile-pasal' ); ?></span>
				</div>
				<div class="guide-card-body">
					<h3><?php esc_html_e( 'Cracked Screen First-Aid', 'mobile-pasal' ); ?></h3>
					<p><?php esc_html_e( 'Avoid pressing heavily on shattered glass cracks to prevent ink bleeding into the OLED substrate. Apply clear tape over the front face to protect fingers and back up data.', 'mobile-pasal' ); ?></p>
					<a class="guide-action-link" href="#repair-builder">
						<span><?php esc_html_e( 'Book Screen Replacement', 'mobile-pasal' ); ?></span>
						<svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"></polyline></svg>
					</a>
				</div>
			</div>

			<!-- Guide 2: Water Damage -->
			<div class="guide-card">
				<div class="guide-thumb-wrap">
					<img src="<?php echo esc_url( MP_THEME_URI . '/assets/images/tip-water-damage.jpg' ); ?>" alt="Water damage protocol">
					<span class="guide-tag liquid"><?php esc_html_e( 'Liquid Emergency', 'mobile-pasal' ); ?></span>
				</div>
				<div class="guide-card-body">
					<h3><?php esc_html_e( 'Phone Dropped in Water?', 'mobile-pasal' ); ?></h3>
					<p><?php esc_html_e( 'Turn off device immediately. Never plug in a charger or place in raw rice. Bring it to our counter within 2 hours for an ultrasonic de-oxidation bath before IC pins corrode.', 'mobile-pasal' ); ?></p>
					<a class="guide-action-link" href="<?php echo esc_url( mp_get_whatsapp_link( 'Emergency: Mero phone pani ma paryo, Gulariya counter ma audai chhu' ) ); ?>" target="_blank" rel="noopener">
						<span><?php esc_html_e( 'WhatsApp Emergency Desk', 'mobile-pasal' ); ?></span>
						<svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"></polyline></svg>
					</a>
				</div>
			</div>

			<!-- Guide 3: Battery Longevity -->
			<div class="guide-card">
				<div class="guide-thumb-wrap">
					<img src="<?php echo esc_url( MP_THEME_URI . '/assets/images/tip-battery-care.jpg' ); ?>" alt="Battery longevity tips">
					<span class="guide-tag"><?php esc_html_e( 'Battery Chemistry', 'mobile-pasal' ); ?></span>
				</div>
				<div class="guide-card-body">
					<h3><?php esc_html_e( 'Battery Longevity in Terai Heat', 'mobile-pasal' ); ?></h3>
					<p><?php esc_html_e( 'Avoid charging your smartphone under direct sunlight or inside hot car dashboards. Use certified 20W/30W GaN adapters with voltage protection to protect internal electrolyte health.', 'mobile-pasal' ); ?></p>
					<a class="guide-action-link" href="#repair-builder">
						<span><?php esc_html_e( 'Check Battery Health', 'mobile-pasal' ); ?></span>
						<svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"></polyline></svg>
					</a>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- =========================================================================
     10. VERIFIED CUSTOMER SOCIAL PROOF (.reviews-section)
     ========================================================================= -->
<section class="reviews-section">
	<div class="wrap">
		<div class="sec-head fade-up">
			<div>
				<span class="sec-kicker"><?php echo esc_html( mp_opt( 'reviews_kicker', 'Verified Customer Feedback' ) ); ?></span>
				<h2><?php echo esc_html( mp_opt( 'reviews_title', 'What Bardiya Locals Say About Us' ) ); ?></h2>
				<p><?php echo esc_html( mp_opt( 'reviews_subtitle', 'Authentic reviews from smartphone buyers and repair clients who chose our counter at Ji. Pra. Ka. Chowk.' ) ); ?></p>
			</div>
			
			<div class="overall-rating-badge">
				<div class="rating-badge-top">
					<svg viewBox="0 0 24 24" width="18" height="18" fill="#f59e0b"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
					<strong>4.9 / 5.0</strong>
				</div>
				<span><?php esc_html_e( 'Verified Google & Counter Feedback', 'mobile-pasal' ); ?></span>
			</div>
		</div>

		<div class="reviews-grid fade-up">
			<?php
			$reviews_query = new WP_Query( array(
				'post_type'      => 'mp_review',
				'posts_per_page' => 3,
				'post_status'    => 'publish',
			) );

			if ( $reviews_query->have_posts() ) :
				while ( $reviews_query->have_posts() ) :
					$reviews_query->the_post();
					$r_id      = get_the_ID();
					$location  = get_post_meta( $r_id, '_mp_review_location', true ) ?: 'Gulariya, Bardiya';
					$product   = get_post_meta( $r_id, '_mp_review_product', true );
					$initials  = mb_substr( get_the_title(), 0, 2 );
					?>
					<div class="review-card">
						<div class="review-card-top">
							<div class="review-stars">
								<svg viewBox="0 0 24 24" width="15" height="15" fill="#f59e0b"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
								<svg viewBox="0 0 24 24" width="15" height="15" fill="#f59e0b"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
								<svg viewBox="0 0 24 24" width="15" height="15" fill="#f59e0b"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
								<svg viewBox="0 0 24 24" width="15" height="15" fill="#f59e0b"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
								<svg viewBox="0 0 24 24" width="15" height="15" fill="#f59e0b"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
							</div>
							<span class="verified-pill"><i class="fa-solid fa-circle-check"></i> <?php esc_html_e( 'Verified Client', 'mobile-pasal' ); ?></span>
						</div>

						<p class="review-quote">"<?php echo esc_html( get_the_content() ); ?>"</p>

						<div class="reviewer-meta">
							<div class="reviewer-avatar"><?php echo esc_html( strtoupper( $initials ) ); ?></div>
							<div>
								<strong class="reviewer-name"><?php the_title(); ?></strong>
								<small class="reviewer-location"><?php echo esc_html( $location ); ?><?php if ( ! empty( $product ) ) echo ' &bull; ' . esc_html( $product ); ?></small>
							</div>
						</div>
					</div>
				<?php endwhile;
				wp_reset_postdata();
			else :
				// Fallback default testimonials
				$default_testimonials = mp_get_default_testimonials_data();
				foreach ( $default_testimonials as $t ) :
					$initials = mb_substr( $t['name'], 0, 2 );
					?>
					<div class="review-card">
						<div class="review-card-top">
							<div class="review-stars">
								<svg viewBox="0 0 24 24" width="15" height="15" fill="#f59e0b"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
								<svg viewBox="0 0 24 24" width="15" height="15" fill="#f59e0b"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
								<svg viewBox="0 0 24 24" width="15" height="15" fill="#f59e0b"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
								<svg viewBox="0 0 24 24" width="15" height="15" fill="#f59e0b"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
								<svg viewBox="0 0 24 24" width="15" height="15" fill="#f59e0b"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
							</div>
							<span class="verified-pill"><i class="fa-solid fa-circle-check"></i> <?php esc_html_e( 'Verified Client', 'mobile-pasal' ); ?></span>
						</div>

						<p class="review-quote">"<?php echo esc_html( $t['content'] ); ?>"</p>

						<div class="reviewer-meta">
							<div class="reviewer-avatar"><?php echo esc_html( strtoupper( $initials ) ); ?></div>
							<div>
								<strong class="reviewer-name"><?php echo esc_html( $t['name'] ); ?></strong>
								<small class="reviewer-location"><?php echo esc_html( $t['location'] ); ?> &bull; <?php echo esc_html( $t['product'] ); ?></small>
							</div>
						</div>
					</div>
				<?php endforeach;
			endif;
			?>
		</div>
	</div>
</section>

<!-- =========================================================================
     11. SHOWROOM VISIT, LIVE STATUS & GOOGLE MAPS HUB (#visit)
     ========================================================================= -->
<section id="visit" class="visit-section">
	<div class="wrap">
		<div class="visit-grid fade-up">
			
			<div class="visit-info-card">
				<div class="visit-header-row">
					<span class="sec-kicker"><?php esc_html_e( 'Showroom & Workstation', 'mobile-pasal' ); ?></span>
					<div class="live-counter-indicator open">
						<span class="indicator-ping"></span>
						<span class="indicator-text"><?php esc_html_e( 'Counter Open Today', 'mobile-pasal' ); ?></span>
					</div>
				</div>

				<h2><?php esc_html_e( 'Visit Our Counter in Gulariya', 'mobile-pasal' ); ?></h2>
				<p class="visit-lead-text"><?php esc_html_e( 'Centrally located at Ji. Pra. Ka. Chowk. Walk in for sealed phone unboxings, on-site iPhone screen & battery repairs, or genuine MagSafe accessories.', 'mobile-pasal' ); ?></p>

				<div class="visit-details-list">
					<div class="visit-detail-item">
						<div class="visit-detail-icon">
							<svg viewBox="0 0 24 24" width="20" height="20" fill="currentColor"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5a2.5 2.5 0 0 1 0-5 2.5 2.5 0 0 1 0 5z"/></svg>
						</div>
						<div>
							<strong><?php echo esc_html( mp_opt( 'store_name', 'Ali Mobile Center & Apple Fix' ) ); ?></strong>
							<p><?php echo esc_html( mp_opt( 'contact_address', 'Gulariya-06, Ji. Pra. Ka. Chowk, Bardiya, Lumbini Province, Nepal' ) ); ?></p>
						</div>
					</div>

					<div class="visit-detail-item">
						<div class="visit-detail-icon">
							<svg viewBox="0 0 24 24" width="20" height="20" fill="currentColor"><path d="M20.01 15.38c-1.23 0-2.42-.2-3.53-.56a.977.977 0 0 0-1.01.24l-1.57 1.97c-2.83-1.35-5.48-3.9-6.89-6.83l1.95-1.66c.27-.28.35-.67.24-1.02-.37-1.11-.56-2.3-.56-3.53 0-.54-.45-.99-.99-.99H4.19C3.65 3 3 3.24 3 3.99 3 13.28 10.73 21 20.01 21c.71 0 .99-.63.99-1.18v-3.45c0-.54-.45-.99-.99-.99z"/></svg>
						</div>
						<div>
							<strong><?php printf( esc_html__( 'Direct Helpline & WhatsApp: %s', 'mobile-pasal' ), esc_html( $phone_raw ) ); ?></strong>
							<p><?php esc_html_e( 'Direct technician line for instant fault diagnosis and handset price quotes', 'mobile-pasal' ); ?></p>
						</div>
					</div>

					<div class="visit-detail-item">
						<div class="visit-detail-icon">
							<svg viewBox="0 0 24 24" width="20" height="20" fill="currentColor"><path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67z"/></svg>
						</div>
						<div>
							<strong><?php esc_html_e( 'Counter Opening Hours', 'mobile-pasal' ); ?></strong>
							<p><?php echo esc_html( mp_opt( 'contact_hours', 'Sunday – Friday: 9:00 AM – 8:00 PM | Saturday: Open' ) ); ?></p>
						</div>
					</div>
				</div>

				<div class="visit-actions-row">
					<a class="btn btn-primary btn-lg" href="tel:+<?php echo esc_attr( $phone_clean ); ?>">
						<svg viewBox="0 0 24 24" width="16" height="16" fill="currentColor"><path d="M20.01 15.38c-1.23 0-2.42-.2-3.53-.56a.977.977 0 0 0-1.01.24l-1.57 1.97c-2.83-1.35-5.48-3.9-6.89-6.83l1.95-1.66c.27-.28.35-.67.24-1.02-.37-1.11-.56-2.3-.56-3.53 0-.54-.45-.99-.99-.99H4.19C3.65 3 3 3.24 3 3.99 3 13.28 10.73 21 20.01 21c.71 0 .99-.63.99-1.18v-3.45c0-.54-.45-.99-.99-.99z"/></svg>
						<span><?php esc_html_e( 'Call Counter Now', 'mobile-pasal' ); ?></span>
					</a>
					<a class="btn btn-whatsapp btn-lg" href="<?php echo esc_url( mp_get_whatsapp_link( 'Namaste Ali Mobile, tapaiharuko shop ma auna chahanchhu location dinus' ) ); ?>" target="_blank" rel="noopener">
						<svg viewBox="0 0 24 24" width="16" height="16" fill="currentColor"><path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0 0 12.04 2"/></svg>
						<span><?php esc_html_e( 'WhatsApp Us', 'mobile-pasal' ); ?></span>
					</a>
					<a class="btn btn-secondary btn-lg" href="<?php echo esc_url( mp_opt( 'google_maps_link', 'https://www.google.com/maps/search/?api=1&query=Ali+Mobile+Center+Gulariya+Bardiya' ) ); ?>" target="_blank" rel="noopener">
						<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><polygon points="3 11 22 2 13 21 11 13 3 11"></polygon></svg>
						<span><?php esc_html_e( 'Get Directions', 'mobile-pasal' ); ?></span>
					</a>
				</div>
			</div>

			<!-- Google Maps Frame with Landmark Tag -->
			<div class="visit-map-container">
				<div class="map-landmark-pill">
					<i class="fa-solid fa-location-crosshairs"></i>
					<span><?php esc_html_e( 'Opposite District Administration Office (Ji. Pra. Ka.)', 'mobile-pasal' ); ?></span>
				</div>
				<iframe
					src="https://maps.google.com/maps?q=Gulariya+06+Bardiya+Nepal&t=&z=15&ie=UTF8&iwloc=&output=embed"
					loading="lazy"
					referrerpolicy="no-referrer-when-downgrade"
					title="<?php esc_attr_e( 'Ali Mobile Center & Apple Fix Location on Google Maps', 'mobile-pasal' ); ?>">
				</iframe>
			</div>

		</div>
	</div>
</section>

</main>

<?php
get_footer();
