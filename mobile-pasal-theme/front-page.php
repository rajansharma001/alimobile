<?php
/**
 * The template for displaying the front page / home page
 *
 * @package Mobile_Pasal
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

// Hero Slide 1
$slide1_title = mp_opt( 'hero_slide1_title', 'Experience Next-Gen Flagships & Precision Care.' );
$slide1_desc  = mp_opt( 'hero_slide1_desc', 'Discover the latest iPhone 16 Series, Samsung Galaxy S24 Ultra, and Google Pixel 9. Official NTA-approved stock, verified IMEI bill, free data migration, and instant WhatsApp counter quotes.' );
$slide1_btn1  = mp_opt( 'hero_slide1_btn1_text', 'Explore Handsets' );
$slide1_btn2  = mp_opt( 'hero_slide1_btn2_text', "Ask Today's Price" );
$slide1_img   = mp_opt( 'hero_slide1_image', '' );
if ( empty( $slide1_img ) ) {
	$slide1_img = MP_THEME_URI . '/assets/images/hero-iphone-hand.jpg';
}

// Hero Slide 2
$slide2_title = mp_opt( 'hero_slide2_title', "Gulariya's Premier Apple Fix Laboratory." );
$slide2_desc  = mp_opt( 'hero_slide2_desc', 'Screen broken, battery drained, or phone dropped in water? We repair right in front of you at our on-site workstation. Original-grade parts, TrueTone display calibration, and honest diagnostics with zero hidden costs.' );
$slide2_btn1  = mp_opt( 'hero_slide2_btn1_text', 'Start Repair Estimate' );
$slide2_btn2  = mp_opt( 'hero_slide2_btn2_text', 'Call Technician' );
$slide2_img   = mp_opt( 'hero_slide2_image', '' );
if ( empty( $slide2_img ) ) {
	$slide2_img = MP_THEME_URI . '/assets/images/apple-fix-bench.jpg';
}

// Hero Slide 3
$slide3_title = mp_opt( 'hero_slide3_title', 'Original Audio, PD Chargers & Gear.' );
$slide3_desc  = mp_opt( 'hero_slide3_desc', 'Power and protect your device with authentic Apple AirPods, Galaxy Buds, 20W/30W/65W PD Fast Chargers, 9H tempered glass, MagSafe protective armor, and instant eSewa merchant top-up services.' );
$slide3_btn1  = mp_opt( 'hero_slide3_btn1_text', 'Browse Accessories' );
$slide3_btn2  = mp_opt( 'hero_slide3_btn2_text', 'Order on WhatsApp' );
$slide3_img   = mp_opt( 'hero_slide3_image', '' );
if ( empty( $slide3_img ) ) {
	$slide3_img = MP_THEME_URI . '/assets/images/shop-accessories-shelf.jpg';
}
?>

<main>

<!-- Hero Slider Section: Creative Business Mobile Shop Architecture -->
<section class="hero-slider-section" id="hero-slider">
	<!-- Top Retail Store Bar -->
	<div class="hero-biz-top-bar">
		<div class="wrap hero-biz-top-inner">
			<div class="hero-biz-location">
				<i class="fa-solid fa-location-dot" aria-hidden="true"></i>
				<span><?php echo esc_html( mp_opt( 'contact_address', 'Gulariya-06, Main Market, Bardiya' ) ); ?></span>
			</div>
			<div class="hero-biz-badge-group">
				<span class="hero-biz-pill"><i class="fa-solid fa-shield-halved" aria-hidden="true"></i> <?php esc_html_e( 'NTA MDMS Registered', 'mobile-pasal' ); ?></span>
				<span class="hero-biz-pill"><i class="fa-solid fa-file-invoice" aria-hidden="true"></i> <?php esc_html_e( 'Official Nepal VAT Invoice', 'mobile-pasal' ); ?></span>
				<span class="hero-biz-status-pill">
					<span class="hero-biz-status-dot"></span>
					<span><?php esc_html_e( 'Store Open: 9:00 AM – 8:00 PM', 'mobile-pasal' ); ?></span>
				</span>
			</div>
		</div>
	</div>

	<div class="hero-slider-container">

		<!-- Slide 1: Flagships -->
		<div class="hero-slide active" data-slide-index="0">
			<div class="wrap hero-biz-grid">
				<!-- Left Column: Department Offer & CTAs -->
				<div class="hero-biz-info fade-up in-view">
					<div class="hero-biz-dept-kicker">
						<span class="kicker-num">01</span>
						<span class="kicker-sep">/</span>
						<span class="kicker-label"><?php esc_html_e( 'Authorized Smartphones & Flagships', 'mobile-pasal' ); ?></span>
					</div>

					<h1 class="hero-biz-title"><?php echo esc_html( $slide1_title ); ?></h1>
					<p class="hero-biz-description"><?php echo esc_html( $slide1_desc ); ?></p>

					<!-- Retail Trust Perks -->
					<div class="hero-biz-perks">
						<span class="perk-item"><i class="fa-solid fa-check" aria-hidden="true"></i> <?php esc_html_e( '100% Sealed Box', 'mobile-pasal' ); ?></span>
						<span class="perk-item"><i class="fa-solid fa-check" aria-hidden="true"></i> <?php esc_html_e( 'VAT Bill & 1-Yr Warranty', 'mobile-pasal' ); ?></span>
						<span class="perk-item"><i class="fa-solid fa-check" aria-hidden="true"></i> <?php esc_html_e( 'Free Data Migration', 'mobile-pasal' ); ?></span>
					</div>

					<div class="hero-biz-cta-group">
						<a class="btn btn-primary btn-lg" href="#catalog">
							<span><?php echo esc_html( $slide1_btn1 ); ?></span>
							<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.4"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
						</a>
						<a class="btn btn-whatsapp btn-lg" href="<?php echo esc_url( mp_get_whatsapp_link( 'Namaste Ali Mobile, iPhone 16 ra Galaxy S24 ko aaja ko counter price dinus' ) ); ?>" target="_blank" rel="noopener">
							<svg viewBox="0 0 24 24" width="16" height="16" fill="currentColor"><path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0 0 12.04 2m.01 1.67c2.2 0 4.26.86 5.82 2.42a8.225 8.225 0 0 1 2.41 5.83c0 4.54-3.7 8.24-8.24 8.24-1.48 0-2.93-.4-4.2-1.15l-.3-.18-3.12.82.83-3.04-.2-.31a8.196 8.196 0 0 1-1.26-4.38c0-4.54 3.7-8.24 8.24-8.24m4.52 11.66c-.25-.13-1.47-.72-1.7-.81-.23-.08-.39-.13-.56.13-.17.25-.64.81-.79.97-.14.17-.29.19-.54.06-.25-.13-1.05-.39-2-1.23-.74-.66-1.24-1.47-1.39-1.72-.14-.25-.02-.39.11-.51.11-.11.25-.29.37-.43.13-.14.17-.25.25-.41.08-.17.04-.31-.02-.44-.06-.13-.56-1.34-.76-1.84-.2-.49-.4-.42-.56-.43h-.47c-.17 0-.44.06-.67.31-.23.25-.87.85-.87 2.08 0 1.23.9 2.41 1.02 2.58.13.17 1.76 2.69 4.27 3.77.6.26 1.07.41 1.43.53.6.19 1.15.16 1.58.1.48-.07 1.47-.6 1.68-1.18.21-.58.21-1.07.15-1.18-.06-.11-.23-.17-.48-.29z"/></svg>
							<span><?php echo esc_html( $slide1_btn2 ); ?></span>
						</a>
					</div>
				</div>

				<!-- Center Column: Showcase Media Stage -->
				<div class="hero-biz-stage">
					<div class="hero-biz-media-frame">
						<span class="biz-stock-tag"><i class="fa-solid fa-circle-check" aria-hidden="true"></i> <?php esc_html_e( 'In Stock in Gulariya', 'mobile-pasal' ); ?></span>
						<img src="<?php echo esc_url( $slide1_img ); ?>" alt="Apple iPhone Flagship at Ali Mobile Center" loading="eager">
						<div class="hero-biz-media-badge">
							<small><?php esc_html_e( 'Official Warranty', 'mobile-pasal' ); ?></small>
							<strong><?php esc_html_e( 'Authorized Nepal Stock', 'mobile-pasal' ); ?></strong>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Slide 2: Apple Fix Lab -->
		<div class="hero-slide" data-slide-index="1">
			<div class="wrap hero-biz-grid">
				<div class="hero-biz-info">
					<div class="hero-biz-dept-kicker">
						<span class="kicker-num">02</span>
						<span class="kicker-sep">/</span>
						<span class="kicker-label"><?php esc_html_e( 'On-Site Diagnostic & Repair Lab', 'mobile-pasal' ); ?></span>
					</div>

					<h2 class="hero-biz-title"><?php echo esc_html( $slide2_title ); ?></h2>
					<p class="hero-biz-description"><?php echo esc_html( $slide2_desc ); ?></p>

					<div class="hero-biz-perks">
						<span class="perk-item"><i class="fa-solid fa-check" aria-hidden="true"></i> <?php esc_html_e( '30–45 Min Screen Fix', 'mobile-pasal' ); ?></span>
						<span class="perk-item"><i class="fa-solid fa-check" aria-hidden="true"></i> <?php esc_html_e( 'Original Service-Pack Parts', 'mobile-pasal' ); ?></span>
						<span class="perk-item"><i class="fa-solid fa-check" aria-hidden="true"></i> <?php esc_html_e( 'Up to 90 Days Testing Warranty', 'mobile-pasal' ); ?></span>
					</div>

					<div class="hero-biz-cta-group">
						<a class="btn btn-primary btn-lg" href="#repair-builder">
							<span><?php echo esc_html( $slide2_btn1 ); ?></span>
							<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.4"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
						</a>
						<a class="btn btn-whatsapp btn-lg" href="tel:+<?php echo esc_attr( mp_clean_phone( mp_opt( 'contact_phone', '9804530786' ) ) ); ?>">
							<svg viewBox="0 0 24 24" width="16" height="16" fill="currentColor"><path d="M20.01 15.38c-1.23 0-2.42-.2-3.53-.56a.977.977 0 0 0-1.01.24l-1.57 1.97c-2.83-1.35-5.48-3.9-6.89-6.83l1.95-1.66c.27-.28.35-.67.24-1.02-.37-1.11-.56-2.3-.56-3.53 0-.54-.45-.99-.99-.99H4.19C3.65 3 3 3.24 3 3.99 3 13.28 10.73 21 20.01 21c.71 0 .99-.63.99-1.18v-3.45c0-.54-.45-.99-.99-.99z"/></svg>
							<span><?php echo esc_html( $slide2_btn2 ); ?></span>
						</a>
					</div>
				</div>

				<div class="hero-biz-stage">
					<div class="hero-biz-media-frame">
						<span class="biz-stock-tag"><i class="fa-solid fa-microscope" aria-hidden="true"></i> <?php esc_html_e( 'ESD Bench Active', 'mobile-pasal' ); ?></span>
						<img src="<?php echo esc_url( $slide2_img ); ?>" alt="Apple Fix precision repair lab at Ali Mobile" loading="lazy">
						<div class="hero-biz-media-badge">
							<small><?php esc_html_e( 'Diagnosis Time', 'mobile-pasal' ); ?></small>
							<strong><?php esc_html_e( 'Instant Front Counter Check', 'mobile-pasal' ); ?></strong>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Slide 3: Genuine Gear -->
		<div class="hero-slide" data-slide-index="2">
			<div class="wrap hero-biz-grid">
				<div class="hero-biz-info">
					<div class="hero-biz-dept-kicker">
						<span class="kicker-num">03</span>
						<span class="kicker-sep">/</span>
						<span class="kicker-label"><?php esc_html_e( 'Original Accessories & Power Systems', 'mobile-pasal' ); ?></span>
					</div>

					<h2 class="hero-biz-title"><?php echo esc_html( $slide3_title ); ?></h2>
					<p class="hero-biz-description"><?php echo esc_html( $slide3_desc ); ?></p>

					<div class="hero-biz-perks">
						<span class="perk-item"><i class="fa-solid fa-check" aria-hidden="true"></i> <?php esc_html_e( 'Apple 20W/30W & Samsung 45W GaN', 'mobile-pasal' ); ?></span>
						<span class="perk-item"><i class="fa-solid fa-check" aria-hidden="true"></i> <?php esc_html_e( 'Original AirPods & Galaxy Buds', 'mobile-pasal' ); ?></span>
						<span class="perk-item"><i class="fa-solid fa-check" aria-hidden="true"></i> <?php esc_html_e( 'Free Counter Glass Installation', 'mobile-pasal' ); ?></span>
					</div>

					<div class="hero-biz-cta-group">
						<a class="btn btn-primary btn-lg" href="#categories">
							<span><?php echo esc_html( $slide3_btn1 ); ?></span>
							<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.4"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
						</a>
						<a class="btn btn-whatsapp btn-lg" href="<?php echo esc_url( mp_get_whatsapp_link( 'Namaste Ali Mobile, accessories stock barema bujhna chahanchhu' ) ); ?>" target="_blank" rel="noopener">
							<svg viewBox="0 0 24 24" width="16" height="16" fill="currentColor"><path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0 0 12.04 2m.01 1.67c2.2 0 4.26.86 5.82 2.42a8.225 8.225 0 0 1 2.41 5.83c0 4.54-3.7 8.24-8.24 8.24-1.48 0-2.93-.4-4.2-1.15l-.3-.18-3.12.82.83-3.04-.2-.31a8.196 8.196 0 0 1-1.26-4.38c0-4.54 3.7-8.24 8.24-8.24m4.52 11.66c-.25-.13-1.47-.72-1.7-.81-.23-.08-.39-.13-.56.13-.17.25-.64.81-.79.97-.14.17-.29.19-.54.06-.25-.13-1.05-.39-2-1.23-.74-.66-1.24-1.47-1.39-1.72-.14-.25-.02-.39.11-.51.11-.11.25-.29.37-.43.13-.14.17-.25.25-.41.08-.17.04-.31-.02-.44-.06-.13-.56-1.34-.76-1.84-.2-.49-.4-.42-.56-.43h-.47c-.17 0-.44.06-.67.31-.23.25-.87.85-.87 2.08 0 1.23.9 2.41 1.02 2.58.13.17 1.76 2.69 4.27 3.77.6.26 1.07.41 1.43.53.6.19 1.15.16 1.58.1.48-.07 1.47-.6 1.68-1.18.21-.58.21-1.07.15-1.18-.06-.11-.23-.17-.48-.29z"/></svg>
							<span><?php echo esc_html( $slide3_btn2 ); ?></span>
						</a>
					</div>
				</div>

				<div class="hero-biz-stage">
					<div class="hero-biz-media-frame">
						<span class="biz-stock-tag"><i class="fa-solid fa-certificate" aria-hidden="true"></i> <?php esc_html_e( '100% Genuine Sealed', 'mobile-pasal' ); ?></span>
						<img src="<?php echo esc_url( $slide3_img ); ?>" alt="Showroom Accessories Shelves at Ali Mobile Center" loading="lazy">
						<div class="hero-biz-media-badge">
							<small><?php esc_html_e( 'Brand Warranty', 'mobile-pasal' ); ?></small>
							<strong><?php esc_html_e( 'Official PD Fast Charging', 'mobile-pasal' ); ?></strong>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>

	<!-- Creative Business Department Switcher & Slide Controls -->
	<div class="wrap hero-biz-dock-wrap">
		<div class="hero-biz-dock" role="tablist" aria-label="<?php esc_attr_e( 'Retail Departments', 'mobile-pasal' ); ?>">
			<button class="slider-dock-tab active" data-slide-to="0" role="tab" aria-selected="true" type="button">
				<div class="dock-tab-progress"><div class="dock-tab-progress-fill"></div></div>
				<span class="dock-tab-index">01</span>
				<div class="dock-tab-text">
					<strong><?php esc_html_e( 'Flagship Handsets', 'mobile-pasal' ); ?></strong>
					<small><?php esc_html_e( 'iPhone 16, S24 & Pixel 9', 'mobile-pasal' ); ?></small>
				</div>
			</button>
			<button class="slider-dock-tab" data-slide-to="1" role="tab" aria-selected="false" type="button">
				<div class="dock-tab-progress"><div class="dock-tab-progress-fill"></div></div>
				<span class="dock-tab-index">02</span>
				<div class="dock-tab-text">
					<strong><?php esc_html_e( 'Apple Fix Lab', 'mobile-pasal' ); ?></strong>
					<small><?php esc_html_e( '30-Min On-Site Repairs', 'mobile-pasal' ); ?></small>
				</div>
			</button>
			<button class="slider-dock-tab" data-slide-to="2" role="tab" aria-selected="false" type="button">
				<div class="dock-tab-progress"><div class="dock-tab-progress-fill"></div></div>
				<span class="dock-tab-index">03</span>
				<div class="dock-tab-text">
					<strong><?php esc_html_e( 'Original Gear', 'mobile-pasal' ); ?></strong>
					<small><?php esc_html_e( 'PD Chargers, Audio & Armor', 'mobile-pasal' ); ?></small>
				</div>
			</button>
		</div>

		<!-- Nav Arrows & Slide Counter -->
		<div class="hero-biz-nav-tools">
			<button id="slider-prev-btn" class="biz-nav-btn" aria-label="<?php esc_attr_e( 'Previous', 'mobile-pasal' ); ?>" type="button">
				<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="15 18 9 12 15 6"></polyline></svg>
			</button>
			<div class="slider-counter">
				<span class="current-slide">01</span>
				<span class="counter-divider">/</span>
				<span class="total-slides">03</span>
			</div>
			<button id="slider-next-btn" class="biz-nav-btn" aria-label="<?php esc_attr_e( 'Next', 'mobile-pasal' ); ?>" type="button">
				<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="9 18 15 12 9 6"></polyline></svg>
			</button>
		</div>
	</div>

	<!-- 4 Retail Store Assurances Strip -->
	<div class="hero-biz-assurances">
		<div class="wrap hero-assurances-grid">
			<div class="hero-assurance-item">
				<div class="assurance-icon"><i class="fa-solid fa-file-invoice" aria-hidden="true"></i></div>
				<div class="assurance-body">
					<strong><?php esc_html_e( 'Official Nepal VAT Invoice', 'mobile-pasal' ); ?></strong>
					<small><?php esc_html_e( 'Claim input tax & authorized warranty', 'mobile-pasal' ); ?></small>
				</div>
			</div>
			<div class="hero-assurance-item">
				<div class="assurance-icon"><i class="fa-solid fa-shield-halved" aria-hidden="true"></i></div>
				<div class="assurance-body">
					<strong><?php esc_html_e( 'NTA MDMS Registered', 'mobile-pasal' ); ?></strong>
					<small><?php esc_html_e( '100% legal tax-paid phone IMEI', 'mobile-pasal' ); ?></small>
				</div>
			</div>
			<div class="hero-assurance-item">
				<div class="assurance-icon"><i class="fa-solid fa-screwdriver-wrench" aria-hidden="true"></i></div>
				<div class="assurance-body">
					<strong><?php esc_html_e( 'On-Site Diagnostic Lab', 'mobile-pasal' ); ?></strong>
					<small><?php esc_html_e( 'Watch repair directly at ESD bench', 'mobile-pasal' ); ?></small>
				</div>
			</div>
			<div class="hero-assurance-item">
				<div class="assurance-icon"><i class="fa-solid fa-arrows-rotate" aria-hidden="true"></i></div>
				<div class="assurance-body">
					<strong><?php esc_html_e( 'Free Data Transfer & Setup', 'mobile-pasal' ); ?></strong>
					<small><?php esc_html_e( 'Full iCloud, WhatsApp & photos move', 'mobile-pasal' ); ?></small>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Interactive Repair Diagnostic Console -->
<section id="repair-builder" class="repair-builder-section">
	<div class="wrap">
		<div class="sec-head sec-head-center fade-up">
			<span class="sec-kicker">
				<svg viewBox="0 0 24 24" width="14" height="14" fill="currentColor"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/></svg>
				<?php esc_html_e( 'Apple Fix Counter Diagnostic Console', 'mobile-pasal' ); ?>
			</span>
			<h2><?php esc_html_e( 'Phone Problem? Get a Direct Counter Estimate', 'mobile-pasal' ); ?></h2>
			<p><?php esc_html_e( 'Select your device and fault below. Your live repair docket is prepared in real-time. Dispatch directly to our Gulariya technician on WhatsApp for instant counter quotes.', 'mobile-pasal' ); ?></p>
		</div>

		<div class="repair-station-layout fade-up">
			<!-- Diagnostic Configuration -->
			<div class="repair-station-form">
				<!-- Step 1 -->
				<div class="repair-step-block">
					<div class="step-header">
						<span class="step-num-badge"><?php esc_html_e( 'Step 1', 'mobile-pasal' ); ?></span>
						<span class="step-title"><?php esc_html_e( 'Select Your Device', 'mobile-pasal' ); ?></span>
					</div>
					<div class="device-pills-grid" data-group="device">
						<button type="button" class="dev-pill-btn active" data-device="Apple iPhone">
							<svg viewBox="0 0 24 24" width="16" height="16" fill="currentColor"><path d="M18.71 19.5c-.83 1.24-1.71 2.45-3.05 2.47-1.34.03-1.77-.79-3.29-.79-1.53 0-2 .77-3.27.82-1.31.05-2.3-1.32-3.14-2.53C4.25 17 2.94 12.45 4.7 9.39c.87-1.52 2.43-2.48 4.12-2.51 1.28-.02 2.5.87 3.29.87.78 0 2.26-1.07 3.81-.91.65.03 2.47.26 3.64 1.98-.09.06-2.17 1.28-2.15 3.81.03 3.02 2.65 4.03 2.68 4.04-.03.07-.42 1.44-1.38 2.83M15.97 6.84c.64-.78 1.08-1.87.96-2.96-.93.04-2.05.62-2.72 1.4-.59.68-1.1 1.77-.96 2.83 1.03.08 2.08-.49 2.72-1.27z"/></svg>
							<span><?php esc_html_e( 'Apple iPhone', 'mobile-pasal' ); ?></span>
						</button>
						<button type="button" class="dev-pill-btn" data-device="Samsung Galaxy">
							<span><?php esc_html_e( 'Samsung Galaxy', 'mobile-pasal' ); ?></span>
						</button>
						<button type="button" class="dev-pill-btn" data-device="Xiaomi / Redmi">
							<span><?php esc_html_e( 'Xiaomi / Redmi', 'mobile-pasal' ); ?></span>
						</button>
						<button type="button" class="dev-pill-btn" data-device="OnePlus">
							<span><?php esc_html_e( 'OnePlus', 'mobile-pasal' ); ?></span>
						</button>
						<button type="button" class="dev-pill-btn" data-device="Google Pixel">
							<span><?php esc_html_e( 'Google Pixel', 'mobile-pasal' ); ?></span>
						</button>
						<button type="button" class="dev-pill-btn" data-device="Other Android">
							<span><?php esc_html_e( 'Other Android', 'mobile-pasal' ); ?></span>
						</button>
					</div>
				</div>

				<!-- Step 2 -->
				<div class="repair-step-block">
					<div class="step-header">
						<span class="step-num-badge"><?php esc_html_e( 'Step 2', 'mobile-pasal' ); ?></span>
						<span class="step-title"><?php esc_html_e( 'What Needs Repair?', 'mobile-pasal' ); ?></span>
						<span class="step-hint"><?php esc_html_e( '(Pick symptom)', 'mobile-pasal' ); ?></span>
					</div>
					<div class="fault-cards-grid">
						<button type="button" class="fault-select-card active" data-issue="Screen &amp; Display (Cracked glass / black spots / touch dead)" data-time="30–45 Mins" data-warranty="90 Days Testing Warranty">
							<div class="fault-card-icon">
								<svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2"><rect x="5" y="2" width="14" height="20" rx="2" ry="2"></rect><line x1="8" y1="6" x2="16" y2="6"></line><line x1="8" y1="18" x2="16" y2="18"></line></svg>
							</div>
							<div class="fault-card-info">
								<div class="fault-card-title-row">
									<strong><?php esc_html_e( 'Screen & Display', 'mobile-pasal' ); ?></strong>
									<span class="fault-time-tag"><svg viewBox="0 0 24 24" width="10" height="10" fill="currentColor"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/></svg> 30–45m</span>
								</div>
								<small><?php esc_html_e( 'Cracked glass, black spots, touch dead', 'mobile-pasal' ); ?></small>
							</div>
						</button>

						<button type="button" class="fault-select-card" data-issue="Battery Replacement (Fast drain / sudden shutdown / swollen)" data-time="20–30 Mins" data-warranty="6 Months Battery Warranty">
							<div class="fault-card-icon">
								<svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="7" width="16" height="10" rx="2" ry="2"></rect><line x1="22" y1="11" x2="22" y2="13"></line><line x1="6" y1="11" x2="6" y2="13"></line><line x1="10" y1="11" x2="10" y2="13"></line></svg>
							</div>
							<div class="fault-card-info">
								<div class="fault-card-title-row">
									<strong><?php esc_html_e( 'Battery Replacement', 'mobile-pasal' ); ?></strong>
									<span class="fault-time-tag"><svg viewBox="0 0 24 24" width="10" height="10" fill="currentColor"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/></svg> 20–30m</span>
								</div>
								<small><?php esc_html_e( 'Fast drain, sudden shutdown, swollen', 'mobile-pasal' ); ?></small>
							</div>
						</button>

						<button type="button" class="fault-select-card" data-issue="Charging &amp; Port (Slow charging / loose port / cable angle)" data-time="30 Mins" data-warranty="30 Days Service Warranty">
							<div class="fault-card-icon">
								<svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"></path></svg>
							</div>
							<div class="fault-card-info">
								<div class="fault-card-title-row">
									<strong><?php esc_html_e( 'Charging & Port', 'mobile-pasal' ); ?></strong>
									<span class="fault-time-tag"><svg viewBox="0 0 24 24" width="10" height="10" fill="currentColor"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/></svg> 30m</span>
								</div>
								<small><?php esc_html_e( 'Slow charging, loose port, cable angle', 'mobile-pasal' ); ?></small>
							</div>
						</button>

						<button type="button" class="fault-select-card" data-issue="Water Damage (Dropped in water / ultrasonic clean / IC)" data-time="1–2 Hours" data-warranty="Component Warranty">
							<div class="fault-card-icon">
								<svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2.69l5.66 5.66a8 8 0 1 1-11.31 0z"></path></svg>
							</div>
							<div class="fault-card-info">
								<div class="fault-card-title-row">
									<strong><?php esc_html_e( 'Water Damage', 'mobile-pasal' ); ?></strong>
									<span class="fault-time-tag"><svg viewBox="0 0 24 24" width="10" height="10" fill="currentColor"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/></svg> 1–2h</span>
								</div>
								<small><?php esc_html_e( 'Dropped in water, ultrasonic clean, IC', 'mobile-pasal' ); ?></small>
							</div>
						</button>

						<button type="button" class="fault-select-card" data-issue="Camera &amp; Sound (Mic not working / speaker muffled / camera)" data-time="45 Mins" data-warranty="60 Days Testing Warranty">
							<div class="fault-card-icon">
								<svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg>
							</div>
							<div class="fault-card-info">
								<div class="fault-card-title-row">
									<strong><?php esc_html_e( 'Camera & Sound', 'mobile-pasal' ); ?></strong>
									<span class="fault-time-tag"><svg viewBox="0 0 24 24" width="10" height="10" fill="currentColor"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/></svg> 45m</span>
								</div>
								<small><?php esc_html_e( 'Mic not working, speaker muffled, camera', 'mobile-pasal' ); ?></small>
							</div>
						</button>

						<button type="button" class="fault-select-card" data-issue="Software &amp; OS (Apple logo stuck / bootloop / data transfer)" data-time="30–60 Mins" data-warranty="OS Stability Assured">
							<div class="fault-card-icon">
								<svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
							</div>
							<div class="fault-card-info">
								<div class="fault-card-title-row">
									<strong><?php esc_html_e( 'Software & OS', 'mobile-pasal' ); ?></strong>
									<span class="fault-time-tag"><svg viewBox="0 0 24 24" width="10" height="10" fill="currentColor"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/></svg> 30–60m</span>
								</div>
								<small><?php esc_html_e( 'Apple logo stuck, bootloop, data transfer', 'mobile-pasal' ); ?></small>
							</div>
						</button>
					</div>
				</div>

				<!-- Step 3 -->
				<div class="repair-step-block">
					<div class="step-header">
						<span class="step-num-badge"><?php esc_html_e( 'Step 3', 'mobile-pasal' ); ?></span>
						<span class="step-title"><?php esc_html_e( 'Specify Phone Model', 'mobile-pasal' ); ?></span>
						<span class="step-hint"><?php esc_html_e( '(e.g. iPhone 15 Pro, Galaxy A54, Redmi Note 13)', 'mobile-pasal' ); ?></span>
					</div>
					<div class="model-input-wrap">
						<input type="text" id="builder-model-input" class="model-text-field" placeholder="<?php esc_attr_e( 'Type your phone model name here...', 'mobile-pasal' ); ?>" autocomplete="off">
					</div>
					<div class="quick-model-chips">
						<span class="quick-chips-label"><?php esc_html_e( 'Quick select:', 'mobile-pasal' ); ?></span>
						<button type="button" class="quick-chip-btn" data-model="iPhone 15 Pro">iPhone 15 Pro</button>
						<button type="button" class="quick-chip-btn" data-model="iPhone 13">iPhone 13</button>
						<button type="button" class="quick-chip-btn" data-model="Galaxy S24">Galaxy S24</button>
						<button type="button" class="quick-chip-btn" data-model="Redmi Note 13">Redmi Note 13</button>
					</div>
				</div>
			</div>

			<!-- Live Ticket Docket -->
			<div class="repair-station-ticket">
				<div class="ticket-docket-card">
					<div class="docket-top-bar">
						<div class="docket-id-badge">
							<span class="docket-dot"></span>
							<span><?php esc_html_e( 'DOCKET #AF-2026', 'mobile-pasal' ); ?></span>
						</div>
						<span class="docket-station-tag"><?php esc_html_e( 'Gulariya Counter', 'mobile-pasal' ); ?></span>
					</div>

					<div class="ticket-header">
						<h3><?php esc_html_e( 'Gulariya Counter Estimate', 'mobile-pasal' ); ?></h3>
						<p class="ticket-subtext"><?php esc_html_e( 'Live enquiry docket ready for counter handover', 'mobile-pasal' ); ?></p>
					</div>

					<div class="ticket-body">
						<div class="ticket-row">
							<span class="t-label"><?php esc_html_e( 'Device Brand', 'mobile-pasal' ); ?></span>
							<strong id="ticket-device-val" class="t-val"><?php esc_html_e( 'Apple iPhone', 'mobile-pasal' ); ?></strong>
						</div>
						<div class="ticket-row">
							<span class="t-label"><?php esc_html_e( 'Model Name', 'mobile-pasal' ); ?></span>
							<strong id="ticket-model-val" class="t-val"><?php esc_html_e( 'Specified at Counter', 'mobile-pasal' ); ?></strong>
						</div>
						<div class="ticket-row">
							<span class="t-label"><?php esc_html_e( 'Selected Fault', 'mobile-pasal' ); ?></span>
							<strong id="ticket-fault-val" class="t-val"><?php esc_html_e( 'Screen & Display', 'mobile-pasal' ); ?></strong>
						</div>
						<div class="ticket-row">
							<span class="t-label"><?php esc_html_e( 'Est. Turnaround', 'mobile-pasal' ); ?></span>
							<span id="ticket-time-val" class="t-badge-highlight">30–45 Mins</span>
						</div>
						<div class="ticket-row">
							<span class="t-label"><?php esc_html_e( 'Parts Grade', 'mobile-pasal' ); ?></span>
							<span class="t-val-text"><?php esc_html_e( '100% Original-Grade / Certified', 'mobile-pasal' ); ?></span>
						</div>
						<div class="ticket-row">
							<span class="t-label"><?php esc_html_e( 'Counter Warranty', 'mobile-pasal' ); ?></span>
							<span id="ticket-warranty-val" class="t-val-text">90 Days Testing Warranty</span>
						</div>
						<div class="ticket-row">
							<span class="t-label"><?php esc_html_e( 'Counter Diagnosis', 'mobile-pasal' ); ?></span>
							<span class="t-badge-free"><?php esc_html_e( 'FREE Walk-In Check', 'mobile-pasal' ); ?></span>
						</div>
					</div>

					<div class="ticket-preview-box">
						<div class="tp-label">
							<svg viewBox="0 0 24 24" width="13" height="13" fill="currentColor"><path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0 0 12.04 2"/></svg>
							<span><?php esc_html_e( 'Prepared WhatsApp Dispatch Message:', 'mobile-pasal' ); ?></span>
						</div>
						<div id="builder-preview-text" class="tp-text">"Namaste Ali Mobile &amp; Apple Fix, mero iPhone ma problem chha: Screen Broken / Touch Fault. Gulariya counter ma check ra repair cost barema jankari dinus."</div>
					</div>

					<div class="ticket-actions">
						<a id="builder-send-whatsapp-btn" class="btn btn-whatsapp btn-block" href="<?php echo esc_url( mp_get_whatsapp_link() ); ?>" target="_blank" rel="noopener">
							<svg viewBox="0 0 24 24" width="18" height="18" fill="currentColor"><path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0 0 12.04 2m.01 1.67c2.2 0 4.26.86 5.82 2.42a8.225 8.225 0 0 1 2.41 5.83c0 4.54-3.7 8.24-8.24 8.24-1.48 0-2.93-.4-4.2-1.15l-.3-.18-3.12.82.83-3.04-.2-.31a8.196 8.196 0 0 1-1.26-4.38c0-4.54 3.7-8.24 8.24-8.24m4.52 11.66c-.25-.13-1.47-.72-1.7-.81-.23-.08-.39-.13-.56.13-.17.25-.64.81-.79.97-.14.17-.29.19-.54.06-.25-.13-1.05-.39-2-1.23-.74-.66-1.24-1.47-1.39-1.72-.14-.25-.02-.39.11-.51.11-.11.25-.29.37-.43.13-.14.17-.25.25-.41.08-.17.04-.31-.02-.44-.06-.13-.56-1.34-.76-1.84-.2-.49-.4-.42-.56-.43h-.47c-.17 0-.44.06-.67.31-.23.25-.87.85-.87 2.08 0 1.23.9 2.41 1.02 2.58.13.17 1.76 2.69 4.27 3.77.6.26 1.07.41 1.43.53.6.19 1.15.16 1.58.1.48-.07 1.47-.6 1.68-1.18.21-.58.21-1.07.15-1.18-.06-.11-.23-.17-.48-.29z"/></svg>
							<span><?php esc_html_e( 'Dispatch Enquiry to WhatsApp', 'mobile-pasal' ); ?></span>
						</a>
						<a class="btn btn-secondary btn-block" href="tel:+<?php echo esc_attr( mp_clean_phone( mp_opt( 'contact_phone', '9804530786' ) ) ); ?>">
							<svg viewBox="0 0 24 24" width="16" height="16" fill="currentColor"><path d="M20.01 15.38c-1.23 0-2.42-.2-3.53-.56a.977.977 0 0 0-1.01.24l-1.57 1.97c-2.83-1.35-5.48-3.9-6.89-6.83l1.95-1.66c.27-.28.35-.67.24-1.02-.37-1.11-.56-2.3-.56-3.53 0-.54-.45-.99-.99-.99H4.19C3.65 3 3 3.24 3 3.99 3 13.28 10.73 21 20.01 21c.71 0 .99-.63.99-1.18v-3.45c0-.54-.45-.99-.99-.99z"/></svg>
							<span><?php printf( esc_html__( 'Call Technician Directly (%s)', 'mobile-pasal' ), esc_html( mp_opt( 'contact_phone', '+977 9804530786' ) ) ); ?></span>
						</a>
					</div>

					<div class="ticket-footer-note">
						<svg viewBox="0 0 24 24" width="14" height="14" fill="currentColor"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5a2.5 2.5 0 0 1 0-5 2.5 2.5 0 0 1 0 5z"/></svg>
						<span><?php esc_html_e( 'Gulariya Counter • Walk in anytime 9 AM – 8 PM', 'mobile-pasal' ); ?></span>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Shop By Category Section -->
<section id="categories" class="categories-section">
	<div class="wrap">
		<div class="sec-head fade-up">
			<div>
				<span class="sec-kicker"><?php esc_html_e( 'Showroom Counters', 'mobile-pasal' ); ?></span>
				<h2><?php esc_html_e( 'Explore Store Counters', 'mobile-pasal' ); ?></h2>
				<p><?php esc_html_e( 'From brand-new sealed smartphones to Gulariya\'s dedicated Apple Fix lab and digital merchant services.', 'mobile-pasal' ); ?></p>
			</div>
			<a class="view-all-link" href="#catalog">
				<span><?php esc_html_e( 'View All Products', 'mobile-pasal' ); ?></span>
				<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.2"><polyline points="9 18 15 12 9 6"></polyline></svg>
			</a>
		</div>

		<div class="categories-grid fade-up">
			<a class="category-card" href="#catalog">
				<span class="cat-count-tag"><?php esc_html_e( '50+ Handsets', 'mobile-pasal' ); ?></span>
				<div class="cat-icon-wrap">
					<svg viewBox="0 0 24 24" width="26" height="26" fill="none" stroke="currentColor" stroke-width="2"><rect x="5" y="2" width="14" height="20" rx="2" ry="2"></rect><line x1="12" y1="18" x2="12.01" y2="18"></line></svg>
				</div>
				<strong><?php esc_html_e( 'Smartphones', 'mobile-pasal' ); ?></strong>
				<small><?php esc_html_e( 'iPhone, Samsung, Pixel & Redmi', 'mobile-pasal' ); ?></small>
			</a>

			<a class="category-card" href="#repair-builder">
				<span class="cat-count-tag"><?php esc_html_e( 'Screen • Battery', 'mobile-pasal' ); ?></span>
				<div class="cat-icon-wrap">
					<svg viewBox="0 0 24 24" width="26" height="26" fill="none" stroke="currentColor" stroke-width="2"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"></path></svg>
				</div>
				<strong><?php esc_html_e( 'Apple Fix Lab', 'mobile-pasal' ); ?></strong>
				<small><?php esc_html_e( 'iPhone Screen, Battery & IC', 'mobile-pasal' ); ?></small>
			</a>

			<a class="category-card" href="#catalog">
				<span class="cat-count-tag"><?php esc_html_e( 'Original Buds', 'mobile-pasal' ); ?></span>
				<div class="cat-icon-wrap">
					<svg viewBox="0 0 24 24" width="26" height="26" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 18v-6a9 9 0 0 1 18 0v6"></path><path d="M21 19a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3zM3 19a2 2 0 0 0 2 2h1a2 2 0 0 0 2-2v-3a2 2 0 0 0-2-2H3z"></path></svg>
				</div>
				<strong><?php esc_html_e( 'Audio & Buds', 'mobile-pasal' ); ?></strong>
				<small><?php esc_html_e( 'AirPods, Neckbands & ANC', 'mobile-pasal' ); ?></small>
			</a>

			<a class="category-card" href="#catalog">
				<span class="cat-count-tag"><?php esc_html_e( 'AMOLED Calling', 'mobile-pasal' ); ?></span>
				<div class="cat-icon-wrap">
					<svg viewBox="0 0 24 24" width="26" height="26" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="7"></circle><polyline points="12 9 12 12 13.5 13.5"></polyline><path d="M16.51 17.35l-.35 3.83a2 2 0 0 1-2 1.82H9.83a2 2 0 0 1-2-1.82l-.35-3.83m.01-10.7l.35-3.83A2 2 0 0 1 9.83 1h4.35a2 2 0 0 1 2 1.82l.35 3.83"></path></svg>
				</div>
				<strong><?php esc_html_e( 'Smartwatches', 'mobile-pasal' ); ?></strong>
				<small><?php esc_html_e( 'Calling, AMOLED & Fitness', 'mobile-pasal' ); ?></small>
			</a>

			<a class="category-card" href="#catalog">
				<span class="cat-count-tag"><?php esc_html_e( 'PD 20W–120W', 'mobile-pasal' ); ?></span>
				<div class="cat-icon-wrap">
					<svg viewBox="0 0 24 24" width="26" height="26" fill="none" stroke="currentColor" stroke-width="2"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"></path></svg>
				</div>
				<strong><?php esc_html_e( 'Chargers & Glass', 'mobile-pasal' ); ?></strong>
				<small><?php esc_html_e( '20W–120W Adapters & 9H Glass', 'mobile-pasal' ); ?></small>
			</a>

			<a class="category-card" href="<?php echo esc_url( mp_get_whatsapp_link( 'Namaste, eSewa recharge sewa barema bujhna chahanchhu' ) ); ?>" target="_blank" rel="noopener">
				<span class="cat-count-tag"><?php esc_html_e( 'Merchant Top-Up', 'mobile-pasal' ); ?></span>
				<div class="cat-icon-wrap">
					<svg viewBox="0 0 24 24" width="26" height="26" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="5" width="20" height="14" rx="2"></rect><line x1="2" y1="10" x2="22" y2="10"></line></svg>
				</div>
				<strong><?php esc_html_e( 'eSewa & Banking', 'mobile-pasal' ); ?></strong>
				<small><?php esc_html_e( 'Top-Up, Bills & Money Transfer', 'mobile-pasal' ); ?></small>
			</a>
		</div>
	</div>
</section>

<!-- Brand Tiles Section -->
<section id="brands" class="brands-section">
	<div class="wrap">
		<div class="sec-head fade-up">
			<div>
				<span class="sec-kicker"><?php esc_html_e( 'Authorized Brands', 'mobile-pasal' ); ?></span>
				<h2><?php esc_html_e( 'Top Smartphone Brands In Store', 'mobile-pasal' ); ?></h2>
				<p><?php esc_html_e( 'Select any brand tile below to instantly filter available models in our showroom catalog.', 'mobile-pasal' ); ?></p>
			</div>
			<a class="view-all-link" href="#catalog">
				<span><?php esc_html_e( 'Explore All Brands', 'mobile-pasal' ); ?></span>
				<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.2"><polyline points="9 18 15 12 9 6"></polyline></svg>
			</a>
		</div>

		<div class="brands-grid fade-up">
			<div class="brand-card-link" data-filter-brand="apple">
				<div class="brand-logo-svg">
					<svg viewBox="0 0 170 170" width="32" height="32" fill="#0f172a"><path d="M150.37 130.25c-2.45 5.66-5.35 10.87-8.71 15.66-4.58 6.53-8.33 11.05-11.22 13.56-4.48 4.12-9.28 6.23-14.42 6.35-3.69 0-8.14-1.05-13.32-3.18-5.19-2.12-9.97-3.17-14.34-3.17-4.58 0-9.49 1.05-14.75 3.17-5.26 2.13-9.5 3.24-12.74 3.35-4.35.13-9.16-1.9-14.42-6.08-3.7-3.04-7.58-7.71-11.65-14-4.89-7.5-8.88-16.14-11.96-25.91-3.08-9.77-4.63-19.34-4.63-28.71 0-14.33 3.63-26.23 10.89-35.69 7.26-9.46 16.51-14.28 27.75-14.47 5.26 0 11.01 1.34 17.26 4.02 6.24 2.68 10.15 4.09 11.72 4.22 1.93-.26 5.86-1.63 11.79-4.11 5.92-2.48 11.22-3.6 15.9-3.35 12.04.75 21.6 5.37 28.69 13.88-10.53 6.38-15.67 15.2-15.42 26.47.25 8.78 3.52 16.19 9.8 22.23 6.28 6.04 13.78 9.69 22.5 10.95-1.93 6.01-4.41 12.18-7.44 18.52zm-32.96-107.4c0-7.39 2.65-14.22 7.95-20.5 5.3-6.28 11.89-10.05 19.78-11.3 1.13 8.13-1.47 15.36-7.8 21.69-6.33 6.33-13.62 10.15-21.87 11.47-.28-.45-.42-.99-.42-1.62-.01-.42.23-.97.72-1.65-.01.62-.25 1.17-.36 1.91z"/></svg>
				</div>
				<span class="brand-name">Apple</span>
				<small><?php esc_html_e( 'iPhone & Apple Fix', 'mobile-pasal' ); ?></small>
			</div>

			<div class="brand-card-link" data-filter-brand="samsung">
				<div class="brand-logo-svg">
					<svg viewBox="0 0 100 24" height="20" fill="#0c4da2"><path d="M12.8 14.5c0-1.8-1.5-2.7-4.3-3.4C6 10.5 4.9 9.9 4.9 8.8c0-.9.9-1.5 2.5-1.5 1.8 0 3 .7 3.2 2h3.2c-.3-2.9-2.6-4.6-6.4-4.6C3.1 4.7.7 6.8.7 9.8c0 2.2 1.4 3.3 4.5 4.1 2.8.7 3.8 1.4 3.8 2.5 0 1.1-1.1 1.7-2.9 1.7-2.2 0-3.6-.9-3.8-2.5H0c.2 3.3 2.7 5.1 7.1 5.1 4.4 0 6.9-2.2 6.9-5.1zm11.2-9.6l-5.6 15.4h3.7l1.1-3.3h5.9l1.1 3.3h3.7L28.3 4.9h-4.3zm.5 9.3l1.7-5.3 1.7 5.3h-3.4zm16.5-9.3v9.8l-5.5-9.8h-3.2v15.4h3.4V10.5l5.5 9.8h3.2V4.9h-3.4zm17.9 9.6c0-1.8-1.5-2.7-4.3-3.4-2.5-.6-3.6-1.2-3.6-2.3 0-.9.9-1.5 2.5-1.5 1.8 0 3 .7 3.2 2h3.2c-.3-2.9-2.6-4.6-6.4-4.6-4.3 0-6.7 2.1-6.7 5.1 0 2.2 1.4 3.3 4.5 4.1 2.8.7 3.8 1.4 3.8 2.5 0 1.1-1.1 1.7-2.9 1.7-2.2 0-3.6-.9-3.8-2.5h-3.2c.2 3.3 2.7 5.1 7.1 5.1 4.4 0 6.9-2.2 6.9-5.1zm11.8-9.6v9.8c0 1.8 1.1 2.7 2.8 2.7 1.8 0 2.8-.9 2.8-2.7V4.9h3.6v9.7c0 3.8-2.5 5.8-6.4 5.8s-6.4-2-6.4-5.8V4.9h3.6zm19.5 0v9.8l-5.5-9.8h-3.2v15.4h3.4V10.5l5.5 9.8h3.2V4.9h-3.4z"/></svg>
				</div>
				<span class="brand-name">Samsung</span>
				<small><?php esc_html_e( 'Galaxy S & A Series', 'mobile-pasal' ); ?></small>
			</div>

			<div class="brand-card-link" data-filter-brand="google">
				<div class="brand-logo-svg">
					<svg viewBox="0 0 24 24" width="26" height="26"><path fill="#4285F4" d="M23.745 12.27c0-.7-.06-1.4-.19-2.07H12v4.51h6.6c-.29 1.52-1.14 2.8-2.4 3.65v3.03h3.88c2.27-2.09 3.66-5.17 3.66-9.12z"/><path fill="#34A853" d="M12 24c3.24 0 5.95-1.08 7.93-2.91l-3.88-3.03c-1.08.72-2.45 1.16-4.05 1.16-3.12 0-5.77-2.1-6.72-4.93H1.25v3.13C3.26 21.36 7.33 24 12 24z"/><path fill="#FBBC05" d="M5.28 14.29c-.25-.72-.38-1.49-.38-2.29s.13-1.57.38-2.29V6.57H1.25C.45 8.15 0 9.99 0 12s.45 3.85 1.25 5.43l4.03-3.14z"/><path fill="#EA4335" d="M12 4.75c1.77 0 3.35.61 4.6 1.8l3.42-3.42C17.95 1.19 15.24 0 12 0 7.33 0 3.26 2.64 1.25 6.57l4.03 3.14c.95-2.83 3.6-4.96 6.72-4.96z"/></svg>
				</div>
				<span class="brand-name">Google Pixel</span>
				<small><?php esc_html_e( 'Pixel 9 & Tensor AI', 'mobile-pasal' ); ?></small>
			</div>

			<div class="brand-card-link" data-filter-brand="oneplus">
				<div class="brand-logo-svg">
					<svg viewBox="0 0 40 40" width="28" height="28"><rect width="40" height="40" rx="8" fill="#eb0028"/><path fill="#fff" d="M14 11h-3v18h3v-7h4c3.86 0 7-3.14 7-7s-3.14-7-7-7h-4zm0 8v-5h4c2.21 0 4 1.79 4 4s-1.79 4-4 4h-4zm15-4h-2v2h2v2h2v-2h2v-2h-2v-2h-2v2z"/></svg>
				</div>
				<span class="brand-name">OnePlus</span>
				<small><?php esc_html_e( 'OnePlus 12 & Nord', 'mobile-pasal' ); ?></small>
			</div>

			<div class="brand-card-link" data-filter-brand="xiaomi">
				<div class="brand-logo-svg">
					<svg viewBox="0 0 40 40" width="28" height="28"><rect width="40" height="40" rx="8" fill="#ff6900"/><path fill="#fff" d="M11 13h5.5v8.5H22V13h5.5v14h-5.5v-4.5h-5.5V27H11V13zm8 7.5v-4h2.5v4H19z"/></svg>
				</div>
				<span class="brand-name">Xiaomi</span>
				<small><?php esc_html_e( 'Xiaomi 14 & Redmi 5G', 'mobile-pasal' ); ?></small>
			</div>

			<div class="brand-card-link" data-filter-brand="accessories">
				<div class="brand-logo-svg">
					<svg viewBox="0 0 24 24" width="28" height="28" fill="#059669"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 14H9v-2h2v2zm0-4H9V7h2v5zm4 4h-2v-2h2v2zm0-4h-2V7h2v5z"/></svg>
				</div>
				<span class="brand-name">Accessories</span>
				<small><?php esc_html_e( 'AirPods, Watch & Anker', 'mobile-pasal' ); ?></small>
			</div>
		</div>
	</div>
</section>

<!-- Flagship Spotlight Banner (iPhone 16 Pro) -->
<section class="flagship-banner-section">
	<div class="wrap">
		<div class="flagship-banner-card fade-up">
			<div class="flagship-banner-content">
				<div class="brand-tag-apple">
					<svg viewBox="0 0 170 170" width="16" height="16" fill="currentColor"><path d="M150.37 130.25c-2.45 5.66-5.35 10.87-8.71 15.66-4.58 6.53-8.33 11.05-11.22 13.56-4.48 4.12-9.28 6.23-14.42 6.35-3.69 0-8.14-1.05-13.32-3.18-5.19-2.12-9.97-3.17-14.34-3.17-4.58 0-9.49 1.05-14.75 3.17-5.26 2.13-9.5 3.24-12.74 3.35-4.35.13-9.16-1.9-14.42-6.08-3.7-3.04-7.58-7.71-11.65-14-4.89-7.5-8.88-16.14-11.96-25.91-3.08-9.77-4.63-19.34-4.63-28.71 0-14.33 3.63-26.23 10.89-35.69 7.26-9.46 16.51-14.28 27.75-14.47 5.26 0 11.01 1.34 17.26 4.02 6.24 2.68 10.15 4.09 11.72 4.22 1.93-.26 5.86-1.63 11.79-4.11 5.92-2.48 11.22-3.6 15.9-3.35 12.04.75 21.6 5.37 28.69 13.88-10.53 6.38-15.67 15.2-15.42 26.47.25 8.78 3.52 16.19 9.8 22.23 6.28 6.04 13.78 9.69 22.5 10.95-1.93 6.01-4.41 12.18-7.44 18.52zm-32.96-107.4c0-7.39 2.65-14.22 7.95-20.5 5.3-6.28 11.89-10.05 19.78-11.3 1.13 8.13-1.47 15.36-7.8 21.69-6.33 6.33-13.62 10.15-21.87 11.47-.28-.45-.42-.99-.42-1.62-.01-.42.23-.97.72-1.65-.01.62-.25 1.17-.36 1.91z"/></svg>
					<span><?php esc_html_e( 'Apple Official Handset', 'mobile-pasal' ); ?></span>
				</div>
				<h2><?php esc_html_e( 'iPhone 16 Pro & Pro Max', 'mobile-pasal' ); ?></h2>
				<p class="tagline"><?php esc_html_e( 'Built for Apple Intelligence • Grade 5 Titanium', 'mobile-pasal' ); ?></p>
				<p class="desc"><?php esc_html_e( 'Experience the supercharged A18 Pro chip, 48MP Fusion Camera system, dedicated tactile Camera Control, and best-ever battery endurance. Sealed stock ready for immediate handover at our Gulariya counter.', 'mobile-pasal' ); ?></p>

				<div class="spec-pills-row">
					<span class="spec-pill">A18 Pro Bionic</span>
					<span class="spec-pill">Camera Control Button</span>
					<span class="spec-pill">Grade 5 Titanium</span>
					<span class="spec-pill">NTA Approved • Warranty</span>
				</div>

				<div class="flagship-actions">
					<a class="btn btn-whatsapp" href="<?php echo esc_url( mp_get_whatsapp_link( 'Namaste, iPhone 16 Pro (128GB / 256GB) ko aaja ko counter price dinus' ) ); ?>" target="_blank" rel="noopener">
						<svg viewBox="0 0 24 24" width="16" height="16" fill="currentColor"><path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0 0 12.04 2"/></svg>
						<span><?php esc_html_e( 'Ask Price on WhatsApp', 'mobile-pasal' ); ?></span>
					</a>
					<a class="btn btn-secondary" href="tel:+<?php echo esc_attr( mp_clean_phone( mp_opt( 'contact_phone', '9804530786' ) ) ); ?>">
						<span><?php printf( esc_html__( 'Call Shop (%s)', 'mobile-pasal' ), esc_html( mp_opt( 'contact_phone', '9804530786' ) ) ); ?></span>
					</a>
				</div>
			</div>
			<div class="flagship-media">
				<img src="<?php echo esc_url( MP_THEME_URI . '/assets/images/iphone-16-pro.jpg' ); ?>" alt="Apple iPhone 16 Pro in Black Titanium">
			</div>
		</div>
	</div>
</section>

<!-- Showroom Handsets Catalog -->
<section id="catalog" class="catalog-section">
	<div class="wrap">
		<div class="sec-head fade-up">
			<div>
				<span class="sec-kicker"><?php esc_html_e( 'Showroom Catalog', 'mobile-pasal' ); ?></span>
				<h2><?php esc_html_e( 'Latest Smartphone Arrivals & Top Models', 'mobile-pasal' ); ?></h2>
				<p><?php esc_html_e( 'Every handset is checked, unboxed or sealed-pack with official VAT bill & warranty. Filter by brand or search your model.', 'mobile-pasal' ); ?></p>
			</div>
			<a class="view-all-link" href="<?php echo esc_url( mp_get_whatsapp_link( 'Namaste Ali Mobile, full stock list dinus' ) ); ?>" target="_blank" rel="noopener">
				<span><?php esc_html_e( 'Inquire Full Stock', 'mobile-pasal' ); ?></span>
				<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.2"><polyline points="9 18 15 12 9 6"></polyline></svg>
			</a>
		</div>

		<!-- Toolbar -->
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
					$badge      = get_post_meta( $p_id, '_mp_badge', true ) ?: 'Verified Stock';
					$price      = get_post_meta( $p_id, '_mp_price', true );
					$old_price  = get_post_meta( $p_id, '_mp_old_price', true );
					$rating     = get_post_meta( $p_id, '_mp_rating', true ) ?: '4.9';
					$reviews    = get_post_meta( $p_id, '_mp_reviews_count', true ) ?: '38';
					$img_url    = mp_get_handset_img_url( $p_id );

					// Specs
					$specs_text = get_post_meta( $p_id, '_mp_spec_screen', true );
					if ( empty( $specs_text ) ) {
						$specs_text = get_the_excerpt();
					}

					// Brand taxonomy
					$brand_terms = get_the_terms( $p_id, 'device_brand' );
					$brand_slug  = ! empty( $brand_terms ) ? strtolower( $brand_terms[0]->slug ) : 'all';
					$brand_name  = ! empty( $brand_terms ) ? $brand_terms[0]->name : 'Handset';
					?>
					<article class="product-card" data-brand="<?php echo esc_attr( $brand_slug ); ?>" data-category="smartphones">
						<div class="product-badge-wrap">
							<span class="badge-tag"><?php echo esc_html( $badge ); ?></span>
						</div>
						<div class="product-img-wrap">
							<img src="<?php echo esc_url( $img_url ); ?>" alt="<?php echo esc_attr( $p_title ); ?>" loading="lazy">
						</div>
						<div class="product-body">
							<span class="product-brand-tag"><?php echo esc_html( $brand_name ); ?></span>
							<h3 class="product-title"><?php echo esc_html( $p_title ); ?></h3>
							<p class="product-specs"><?php echo esc_html( $specs_text ); ?></p>
							<?php if ( ! empty( $price ) ) : ?>
								<div class="product-price-row" style="margin-bottom:8px;">
									<strong style="color:var(--accent); font-size:16px;"><?php echo esc_html( $price ); ?></strong>
									<?php if ( ! empty( $old_price ) ) : ?>
										<span style="text-decoration:line-through; color:#64748b; font-size:13px; margin-left:6px;"><?php echo esc_html( $old_price ); ?></span>
									<?php endif; ?>
								</div>
							<?php endif; ?>
							<div class="product-stock-status">
								<span class="stock-pulse-dot"></span>
								<span><?php esc_html_e( 'In Stock at Gulariya Counter', 'mobile-pasal' ); ?></span>
							</div>
							<div class="product-rating">
								<svg viewBox="0 0 24 24" width="14" height="14" fill="#f59e0b"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
								<svg viewBox="0 0 24 24" width="14" height="14" fill="#f59e0b"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
								<svg viewBox="0 0 24 24" width="14" height="14" fill="#f59e0b"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
								<svg viewBox="0 0 24 24" width="14" height="14" fill="#f59e0b"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
								<svg viewBox="0 0 24 24" width="14" height="14" fill="#f59e0b"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
								<span><?php echo esc_html( $rating ); ?> (<?php echo esc_html( $reviews ); ?> <?php esc_html_e( 'reviews', 'mobile-pasal' ); ?>)</span>
							</div>
							<a class="btn btn-whatsapp btn-sm btn-block" href="<?php echo esc_url( mp_get_whatsapp_link( 'Namaste Ali Mobile, ' . $p_title . ' ko aaja ko price ra stock dinus' ) ); ?>" target="_blank" rel="noopener">
								<svg viewBox="0 0 24 24" width="14" height="14" fill="currentColor"><path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0 0 12.04 2"/></svg>
								<span><?php esc_html_e( 'Ask Price on WhatsApp', 'mobile-pasal' ); ?></span>
							</a>
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
						<div class="product-badge-wrap">
							<span class="badge-tag"><?php echo esc_html( $h['badge'] ); ?></span>
						</div>
						<div class="product-img-wrap">
							<img src="<?php echo esc_url( mp_asset_img( $h['image'] ) ); ?>" alt="<?php echo esc_attr( $h['title'] ); ?>" loading="lazy">
						</div>
						<div class="product-body">
							<span class="product-brand-tag"><?php echo esc_html( $h['brand'] ); ?></span>
							<h3 class="product-title"><?php echo esc_html( $h['title'] ); ?></h3>
							<p class="product-specs"><?php echo esc_html( $h['screen'] ); ?></p>
							<div class="product-price-row" style="margin-bottom:8px;">
								<strong style="color:var(--accent); font-size:16px;"><?php echo esc_html( $h['price'] ); ?></strong>
								<?php if ( ! empty( $h['old_price'] ) ) : ?>
									<span style="text-decoration:line-through; color:#64748b; font-size:13px; margin-left:6px;"><?php echo esc_html( $h['old_price'] ); ?></span>
								<?php endif; ?>
							</div>
							<div class="product-stock-status">
								<span class="stock-pulse-dot"></span>
								<span><?php esc_html_e( 'In Stock at Gulariya Counter', 'mobile-pasal' ); ?></span>
							</div>
							<div class="product-rating">
								<svg viewBox="0 0 24 24" width="14" height="14" fill="#f59e0b"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
								<svg viewBox="0 0 24 24" width="14" height="14" fill="#f59e0b"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
								<svg viewBox="0 0 24 24" width="14" height="14" fill="#f59e0b"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
								<svg viewBox="0 0 24 24" width="14" height="14" fill="#f59e0b"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
								<svg viewBox="0 0 24 24" width="14" height="14" fill="#f59e0b"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
								<span><?php echo esc_html( $h['rating'] ); ?> (<?php echo esc_html( $h['reviews'] ); ?> <?php esc_html_e( 'reviews', 'mobile-pasal' ); ?>)</span>
							</div>
							<a class="btn btn-whatsapp btn-sm btn-block" href="<?php echo esc_url( mp_get_whatsapp_link( 'Namaste Ali Mobile, ' . $h['title'] . ' ko aaja ko price ra stock dinus' ) ); ?>" target="_blank" rel="noopener">
								<svg viewBox="0 0 24 24" width="14" height="14" fill="currentColor"><path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0 0 12.04 2"/></svg>
								<span><?php esc_html_e( 'Ask Price on WhatsApp', 'mobile-pasal' ); ?></span>
							</a>
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
			<p><?php esc_html_e( 'We order rare or flagship variants directly from authorized distributors. Send your model name on WhatsApp for counter availability.', 'mobile-pasal' ); ?></p>
			<a class="btn btn-whatsapp" href="<?php echo esc_url( mp_get_whatsapp_link() ); ?>" target="_blank" rel="noopener">
				<span><?php esc_html_e( 'Inquire Directly on WhatsApp', 'mobile-pasal' ); ?></span>
			</a>
		</div>
	</div>
</section>

<!-- Apple Fix Precision Lab Showcase Banner -->
<section class="apple-fix-showcase-section">
	<div class="wrap">
		<div class="apple-fix-banner-grid fade-up">
			<div class="af-media-col">
				<img src="<?php echo esc_url( MP_THEME_URI . '/assets/images/apple-fix-bench.jpg' ); ?>" alt="Apple Fix precision repair workstation in Gulariya">
			</div>
			<div class="af-text-col">
				<div class="af-badge">
					<svg viewBox="0 0 24 24" width="14" height="14" fill="currentColor"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/></svg>
					<span><?php esc_html_e( 'Apple Fix Specialist • Gulariya Counter', 'mobile-pasal' ); ?></span>
				</div>
				<h2><?php esc_html_e( 'Gulariya\'s Premier Precision Apple Fix Lab', 'mobile-pasal' ); ?></h2>
				<p><?php esc_html_e( 'We do not forward your phone to Nepalgunj or Kathmandu. Our on-site workstation handles display lamination, genuine battery replacement, ultrasonic board cleaning, and IC diagnostics right in front of you.', 'mobile-pasal' ); ?></p>

				<div class="af-features-list">
					<div class="af-feature-item">
						<div class="af-f-icon">
							<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
						</div>
						<div>
							<strong><?php esc_html_e( '30-Minute Screen Replacement', 'mobile-pasal' ); ?></strong>
							<p><?php esc_html_e( 'Fast OLED and glass restoration with TrueTone & 3D touch programming.', 'mobile-pasal' ); ?></p>
						</div>
					</div>

					<div class="af-feature-item">
						<div class="af-f-icon">
							<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.2"><rect x="2" y="7" width="16" height="10" rx="2" ry="2"></rect><line x1="22" y1="11" x2="22" y2="13"></line></svg>
						</div>
						<div>
							<strong><?php esc_html_e( 'Battery Health Calibration', 'mobile-pasal' ); ?></strong>
							<p><?php esc_html_e( 'Certified battery replacements that restore peak 100% capacity and battery health cycle.', 'mobile-pasal' ); ?></p>
						</div>
					</div>

					<div class="af-feature-item">
						<div class="af-f-icon">
							<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
						</div>
						<div>
							<strong><?php esc_html_e( 'In-Front-Of-You Transparency', 'mobile-pasal' ); ?></strong>
							<p><?php esc_html_e( 'Watch your repair live across our counter. Complete privacy protection for photos & accounts.', 'mobile-pasal' ); ?></p>
						</div>
					</div>
				</div>

				<div class="af-cta-row">
					<a class="btn btn-whatsapp" href="<?php echo esc_url( mp_get_whatsapp_link( 'Namaste Apple Fix, mero iPhone check garauna chahanchhu' ) ); ?>" target="_blank" rel="noopener">
						<svg viewBox="0 0 24 24" width="16" height="16" fill="currentColor"><path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0 0 12.04 2"/></svg>
						<span><?php esc_html_e( 'Consult Our Technician', 'mobile-pasal' ); ?></span>
					</a>
					<a class="btn btn-secondary" href="tel:+<?php echo esc_attr( mp_clean_phone( mp_opt( 'contact_phone', '9804530786' ) ) ); ?>">
						<span><?php printf( esc_html__( 'Call Counter (%s)', 'mobile-pasal' ), esc_html( mp_opt( 'contact_phone', '+977 9804530786' ) ) ); ?></span>
					</a>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Repair Services Grid & Workflow Timeline -->
<section id="services" class="repair-services-section">
	<div class="wrap">
		<div class="sec-head fade-up">
			<div>
				<span class="sec-kicker"><?php esc_html_e( 'Diagnostics & Solutions', 'mobile-pasal' ); ?></span>
				<h2><?php esc_html_e( 'Complete Counter Repair Services', 'mobile-pasal' ); ?></h2>
				<p><?php esc_html_e( 'From Apple iPhone to Samsung Galaxy and Xiaomi devices, all repairs are performed with original-grade parts and live customer inspection.', 'mobile-pasal' ); ?></p>
			</div>
			<a class="view-all-link" href="#repair-builder">
				<span><?php esc_html_e( 'Get Repair Quote', 'mobile-pasal' ); ?></span>
				<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.2"><polyline points="9 18 15 12 9 6"></polyline></svg>
			</a>
		</div>

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
					$price_s = get_post_meta( $s_id, '_mp_service_price', true ) ?: 'Original Grade';
					?>
					<div class="service-card">
						<div class="service-icon-wrap">
							<svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"></path></svg>
						</div>
						<h3><?php the_title(); ?></h3>
						<p><?php echo esc_html( wp_trim_words( get_the_excerpt(), 18 ) ); ?></p>
						<span class="service-badge"><?php echo esc_html( $turn ); ?> &bull; <?php echo esc_html( $price_s ); ?></span>
					</div>
				<?php endwhile;
				wp_reset_postdata();
			else :
				// Fallback default services
				$default_repairs = mp_get_default_repair_services_data();
				foreach ( $default_repairs as $r ) :
					?>
					<div class="service-card">
						<div class="service-icon-wrap">
							<svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"></path></svg>
						</div>
						<h3><?php echo esc_html( $r['title'] ); ?></h3>
						<p><?php echo esc_html( $r['excerpt'] ); ?></p>
						<span class="service-badge"><?php echo esc_html( $r['turnaround'] ); ?> &bull; <?php echo esc_html( $r['price'] ); ?></span>
					</div>
				<?php endforeach;
			endif;
			?>
		</div>

		<!-- 3-Step Counter Workflow Timeline -->
		<div class="sec-head sec-head-center fade-up" style="margin-top: 56px; margin-bottom: 28px;">
			<span class="sec-kicker"><?php esc_html_e( 'Transparent Workflow', 'mobile-pasal' ); ?></span>
			<h2><?php esc_html_e( '3-Step Counter Service in Gulariya', 'mobile-pasal' ); ?></h2>
			<p><?php esc_html_e( 'Simple, reliable, and completely open process from diagnosis to handover.', 'mobile-pasal' ); ?></p>
		</div>

		<div class="steps-flow-grid fade-up">
			<div class="flow-step-card">
				<div class="flow-num-badge">1</div>
				<h3><?php esc_html_e( 'Free Counter Diagnostic', 'mobile-pasal' ); ?></h3>
				<p><?php esc_html_e( 'Bring your phone to Ji. Pra. Ka. Chowk. Our technician inspects hardware symptoms in 5 minutes with exact repair estimate.', 'mobile-pasal' ); ?></p>
			</div>
			<div class="flow-step-card">
				<div class="flow-num-badge">2</div>
				<h3><?php esc_html_e( 'In-Front-Of-You Precision Fix', 'mobile-pasal' ); ?></h3>
				<p><?php esc_html_e( 'Watch your repair live across our counter. Genuine parts installed with precision tools, heat beds, and ESD mats.', 'mobile-pasal' ); ?></p>
			</div>
			<div class="flow-step-card">
				<div class="flow-num-badge">3</div>
				<h3><?php esc_html_e( 'Testing & Handover', 'mobile-pasal' ); ?></h3>
				<p><?php esc_html_e( 'Multi-point check for touch response, cameras, cellular signal, and battery. Handover with testing warranty.', 'mobile-pasal' ); ?></p>
			</div>
		</div>
	</div>
</section>

<!-- Phone First-Aid & Care Guides -->
<section class="guides-section">
	<div class="wrap">
		<div class="sec-head fade-up">
			<div>
				<span class="sec-kicker"><?php esc_html_e( 'Technician Advice', 'mobile-pasal' ); ?></span>
				<h2><?php esc_html_e( 'Phone First-Aid & Care Guides', 'mobile-pasal' ); ?></h2>
				<p><?php esc_html_e( 'Practical guidance from our certified technicians on protecting your smartphone before bringing it to our counter.', 'mobile-pasal' ); ?></p>
			</div>
			<a class="view-all-link" href="<?php echo esc_url( mp_get_whatsapp_link( 'Namaste, mero phone ma problem chha advice chahiyo' ) ); ?>" target="_blank" rel="noopener">
				<span><?php esc_html_e( 'Ask Technician Advice', 'mobile-pasal' ); ?></span>
				<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.2"><polyline points="9 18 15 12 9 6"></polyline></svg>
			</a>
		</div>

		<div class="guides-grid fade-up">
			<div class="guide-card">
				<div class="guide-thumb-wrap">
					<img src="<?php echo esc_url( MP_THEME_URI . '/assets/images/tip-cracked-screen.jpg' ); ?>" alt="First aid for broken phone screen">
					<span class="guide-tag"><?php esc_html_e( 'Display Emergency', 'mobile-pasal' ); ?></span>
				</div>
				<div class="guide-card-body">
					<h3><?php esc_html_e( 'Cracked Screen First-Aid', 'mobile-pasal' ); ?></h3>
					<p><?php esc_html_e( 'Do not apply hard pressure on glass cracks to avoid bleeding the underlying OLED panel. Tape over cracks with clear tape to prevent finger cuts, and back up your data.', 'mobile-pasal' ); ?></p>
					<a class="guide-action-link" href="#repair-builder">
						<span><?php esc_html_e( 'Book Screen Replacement', 'mobile-pasal' ); ?></span>
						<svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"></polyline></svg>
					</a>
				</div>
			</div>

			<div class="guide-card">
				<div class="guide-thumb-wrap">
					<img src="<?php echo esc_url( MP_THEME_URI . '/assets/images/tip-water-damage.jpg' ); ?>" alt="Water damage phone care protocol">
					<span class="guide-tag"><?php esc_html_e( 'Liquid Protocol', 'mobile-pasal' ); ?></span>
				</div>
				<div class="guide-card-body">
					<h3><?php esc_html_e( 'Phone Dropped in Water?', 'mobile-pasal' ); ?></h3>
					<p><?php esc_html_e( 'Turn off device immediately. Never plug in a charging cable, and avoid shaking or using a hair dryer. Bring it to our counter within 2 hours for ultrasonic de-oxidation.', 'mobile-pasal' ); ?></p>
					<a class="guide-action-link" href="<?php echo esc_url( mp_get_whatsapp_link( 'Emergency: Mero phone pani ma paryo, Gulariya counter ma audai chhu' ) ); ?>" target="_blank" rel="noopener">
						<span><?php esc_html_e( 'Contact Emergency Tech', 'mobile-pasal' ); ?></span>
						<svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"></polyline></svg>
					</a>
				</div>
			</div>

			<div class="guide-card">
				<div class="guide-thumb-wrap">
					<img src="<?php echo esc_url( MP_THEME_URI . '/assets/images/tip-battery-care.jpg' ); ?>" alt="Smartphone battery longevity tips">
					<span class="guide-tag"><?php esc_html_e( 'Battery Health', 'mobile-pasal' ); ?></span>
				</div>
				<div class="guide-card-body">
					<h3><?php esc_html_e( 'Maximizing Battery Longevity', 'mobile-pasal' ); ?></h3>
					<p><?php esc_html_e( 'Avoid letting your battery drop below 15% frequently. Avoid playing heavy games while fast charging, and use only certified 20W/30W adapters to protect internal battery chemistry.', 'mobile-pasal' ); ?></p>
					<a class="guide-action-link" href="#repair-builder">
						<span><?php esc_html_e( 'Check Battery Health', 'mobile-pasal' ); ?></span>
						<svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"></polyline></svg>
					</a>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Verified Local Customer Reviews -->
<section class="reviews-section">
	<div class="wrap">
		<div class="sec-head fade-up">
			<div>
				<span class="sec-kicker"><?php esc_html_e( 'Verified Local Customers', 'mobile-pasal' ); ?></span>
				<h2><?php esc_html_e( 'What Gulariya Residents Say', 'mobile-pasal' ); ?></h2>
				<p><?php esc_html_e( 'Real feedback from local smartphone buyers and repair customers across Bardiya.', 'mobile-pasal' ); ?></p>
			</div>
			<div class="overall-rating-badge">
				<svg viewBox="0 0 24 24" width="16" height="16" fill="#f59e0b"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
				<strong>4.9 / 5.0</strong>
				<span><?php esc_html_e( '(250+ Local Customer Reviews)', 'mobile-pasal' ); ?></span>
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
						<div class="review-stars">
							<svg viewBox="0 0 24 24" width="16" height="16" fill="#f59e0b"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
							<svg viewBox="0 0 24 24" width="16" height="16" fill="#f59e0b"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
							<svg viewBox="0 0 24 24" width="16" height="16" fill="#f59e0b"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
							<svg viewBox="0 0 24 24" width="16" height="16" fill="#f59e0b"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
							<svg viewBox="0 0 24 24" width="16" height="16" fill="#f59e0b"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
						</div>
						<p class="review-quote">"<?php echo esc_html( get_the_content() ); ?>"</p>
						<div class="reviewer-meta">
							<div class="reviewer-avatar"><?php echo esc_html( strtoupper( $initials ) ); ?></div>
							<div>
								<strong><?php the_title(); ?></strong>
								<small><?php echo esc_html( $location ); ?><?php if ( ! empty( $product ) ) echo ' &bull; ' . esc_html( $product ); ?></small>
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
						<div class="review-stars">
							<svg viewBox="0 0 24 24" width="16" height="16" fill="#f59e0b"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
							<svg viewBox="0 0 24 24" width="16" height="16" fill="#f59e0b"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
							<svg viewBox="0 0 24 24" width="16" height="16" fill="#f59e0b"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
							<svg viewBox="0 0 24 24" width="16" height="16" fill="#f59e0b"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
							<svg viewBox="0 0 24 24" width="16" height="16" fill="#f59e0b"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
						</div>
						<p class="review-quote">"<?php echo esc_html( $t['content'] ); ?>"</p>
						<div class="reviewer-meta">
							<div class="reviewer-avatar"><?php echo esc_html( strtoupper( $initials ) ); ?></div>
							<div>
								<strong><?php echo esc_html( $t['name'] ); ?></strong>
								<small><?php echo esc_html( $t['location'] ); ?> &bull; <?php echo esc_html( $t['product'] ); ?></small>
							</div>
						</div>
					</div>
				<?php endforeach;
			endif;
			?>
		</div>
	</div>
</section>

<!-- Store Visit, Directions & Map -->
<section id="visit" class="visit-section">
	<div class="wrap">
		<div class="visit-grid fade-up">
			<div class="visit-info-card">
				<span class="sec-kicker"><?php esc_html_e( 'Walk In Anytime', 'mobile-pasal' ); ?></span>
				<h2><?php esc_html_e( 'Visit Us in Gulariya', 'mobile-pasal' ); ?></h2>
				<p><?php esc_html_e( 'Centrally located at Ji. Pra. Ka. Chowk. Walk in for brand-new phone purchases, immediate repair diagnostic, screen protectors, or honest technical advice.', 'mobile-pasal' ); ?></p>

				<div class="visit-details-list">
					<div class="visit-detail-item">
						<div class="visit-detail-icon">
							<svg viewBox="0 0 24 24" width="18" height="18" fill="currentColor"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5a2.5 2.5 0 0 1 0-5 2.5 2.5 0 0 1 0 5z"/></svg>
						</div>
						<div>
							<strong><?php echo esc_html( mp_opt( 'store_name', 'Ali Mobile Center & Apple Fix' ) ); ?></strong>
							<p><?php echo esc_html( mp_opt( 'contact_address', 'Gulariya-06, Ji. Pra. Ka. Chowk, Bardiya, Lumbini Province, Nepal' ) ); ?></p>
						</div>
					</div>

					<div class="visit-detail-item">
						<div class="visit-detail-icon">
							<svg viewBox="0 0 24 24" width="18" height="18" fill="currentColor"><path d="M20.01 15.38c-1.23 0-2.42-.2-3.53-.56a.977.977 0 0 0-1.01.24l-1.57 1.97c-2.83-1.35-5.48-3.9-6.89-6.83l1.95-1.66c.27-.28.35-.67.24-1.02-.37-1.11-.56-2.3-.56-3.53 0-.54-.45-.99-.99-.99H4.19C3.65 3 3 3.24 3 3.99 3 13.28 10.73 21 20.01 21c.71 0 .99-.63.99-1.18v-3.45c0-.54-.45-.99-.99-.99z"/></svg>
						</div>
						<div>
							<strong><?php printf( esc_html__( 'Helpline & WhatsApp: %s', 'mobile-pasal' ), esc_html( mp_opt( 'contact_phone', '+977 9804530786' ) ) ); ?></strong>
							<p><?php esc_html_e( 'Direct counter support available 7 days a week', 'mobile-pasal' ); ?></p>
						</div>
					</div>

					<div class="visit-detail-item">
						<div class="visit-detail-icon">
							<svg viewBox="0 0 24 24" width="18" height="18" fill="currentColor"><path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67z"/></svg>
						</div>
						<div>
							<strong><?php esc_html_e( 'Counter Hours', 'mobile-pasal' ); ?></strong>
							<p><?php echo esc_html( mp_opt( 'contact_hours', 'Sunday – Friday: 9:00 AM – 8:00 PM | Saturday: Open' ) ); ?></p>
						</div>
					</div>
				</div>

				<div class="visit-actions-row">
					<a class="btn btn-primary" href="tel:+<?php echo esc_attr( mp_clean_phone( mp_opt( 'contact_phone', '9804530786' ) ) ); ?>">
						<svg viewBox="0 0 24 24" width="16" height="16" fill="currentColor"><path d="M20.01 15.38c-1.23 0-2.42-.2-3.53-.56a.977.977 0 0 0-1.01.24l-1.57 1.97c-2.83-1.35-5.48-3.9-6.89-6.83l1.95-1.66c.27-.28.35-.67.24-1.02-.37-1.11-.56-2.3-.56-3.53 0-.54-.45-.99-.99-.99H4.19C3.65 3 3 3.24 3 3.99 3 13.28 10.73 21 20.01 21c.71 0 .99-.63.99-1.18v-3.45c0-.54-.45-.99-.99-.99z"/></svg>
						<span><?php esc_html_e( 'Call Store Now', 'mobile-pasal' ); ?></span>
					</a>
					<a class="btn btn-whatsapp" href="<?php echo esc_url( mp_get_whatsapp_link( 'Namaste Ali Mobile, tapaiharuko shop ma auna chahanchhu' ) ); ?>" target="_blank" rel="noopener">
						<svg viewBox="0 0 24 24" width="16" height="16" fill="currentColor"><path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0 0 12.04 2"/></svg>
						<span><?php esc_html_e( 'WhatsApp Us', 'mobile-pasal' ); ?></span>
					</a>
					<a class="btn btn-secondary" href="<?php echo esc_url( mp_opt( 'google_maps_link', 'https://www.google.com/maps/search/?api=1&query=Ali+Mobile+Center+Gulariya+Bardiya' ) ); ?>" target="_blank" rel="noopener">
						<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><polygon points="3 11 22 2 13 21 11 13 3 11"></polygon></svg>
						<span><?php esc_html_e( 'Directions', 'mobile-pasal' ); ?></span>
					</a>
				</div>
			</div>

			<!-- Google Maps -->
			<div class="visit-map-container">
				<iframe
					src="https://maps.google.com/maps?q=Gulariya+06+Bardiya+Nepal&t=&z=15&ie=UTF8&iwloc=&output=embed"
					loading="lazy"
					referrerpolicy="no-referrer-when-downgrade"
					title="<?php esc_attr_e( 'Ali Mobile Center Location on Map', 'mobile-pasal' ); ?>">
				</iframe>
			</div>
		</div>
	</div>
</section>

</main>

<?php
get_footer();
