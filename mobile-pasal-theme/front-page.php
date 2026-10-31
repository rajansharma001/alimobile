<?php
/**
 * The template for displaying the front page / home page
 * Fully Connected with WordPress Admin Theme Options
 *
 * @package Mobile_Pasal
 * @version 3.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

// Hero Slide 1
$slide1_kicker      = mp_opt( 'hero_slide1_kicker', 'Authorized Smartphones & Flagships' );
$slide1_title       = mp_opt( 'hero_slide1_title', 'Experience Next-Gen Flagships & Precision Care.' );
$slide1_desc        = mp_opt( 'hero_slide1_desc', 'Discover the latest iPhone 16 Series, Samsung Galaxy S24 Ultra, and Google Pixel 9. Official NTA-approved stock, verified IMEI bill, free data migration, and instant WhatsApp counter quotes.' );
$slide1_perk1       = mp_opt( 'hero_slide1_perk1', '100% Sealed Box' );
$slide1_perk2       = mp_opt( 'hero_slide1_perk2', 'VAT Bill & 1-Yr Warranty' );
$slide1_perk3       = mp_opt( 'hero_slide1_perk3', 'Free Data Migration' );
$slide1_btn1        = mp_opt( 'hero_slide1_btn1_text', 'Explore Handsets' );
$slide1_btn1_url    = mp_opt( 'hero_slide1_btn1_url', '#catalog' );
$slide1_btn2        = mp_opt( 'hero_slide1_btn2_text', "Ask Today's Price" );
$slide1_btn2_url    = mp_opt( 'hero_slide1_btn2_url', mp_get_whatsapp_link( 'Namaste Ali Mobile, iPhone 16 ra Galaxy S24 ko aaja ko counter price dinus' ) );
$slide1_stock_tag   = mp_opt( 'hero_slide1_stock_tag', 'In Stock in Gulariya' );
$slide1_badge_sub   = mp_opt( 'hero_slide1_badge_sub', 'Official Warranty' );
$slide1_badge_title = mp_opt( 'hero_slide1_badge_title', 'Authorized Nepal Stock' );
$slide1_img         = mp_opt( 'hero_slide1_image', '' );
if ( empty( $slide1_img ) ) {
	$slide1_img = MP_THEME_URI . '/assets/images/hero-iphone-hand.jpg';
}

// Hero Slide 2
$slide2_kicker      = mp_opt( 'hero_slide2_kicker', 'On-Site Diagnostic & Repair Lab' );
$slide2_title       = mp_opt( 'hero_slide2_title', "Gulariya's Premier Apple Fix Laboratory." );
$slide2_desc        = mp_opt( 'hero_slide2_desc', 'Screen broken, battery drained, or phone dropped in water? We repair right in front of you at our on-site workstation. Original-grade parts, TrueTone display calibration, and honest diagnostics with zero hidden costs.' );
$slide2_perk1       = mp_opt( 'hero_slide2_perk1', '30–45 Min Screen Fix' );
$slide2_perk2       = mp_opt( 'hero_slide2_perk2', 'Original Service-Pack Parts' );
$slide2_perk3       = mp_opt( 'hero_slide2_perk3', 'Up to 90 Days Testing Warranty' );
$slide2_btn1        = mp_opt( 'hero_slide2_btn1_text', 'View Repair Services' );
$slide2_btn1_url    = mp_opt( 'hero_slide2_btn1_url', '#services' );
$slide2_btn2        = mp_opt( 'hero_slide2_btn2_text', 'Call Technician' );
$slide2_stock_tag   = mp_opt( 'hero_slide2_stock_tag', 'ESD Bench Active' );
$slide2_badge_sub   = mp_opt( 'hero_slide2_badge_sub', 'Diagnosis Time' );
$slide2_badge_title = mp_opt( 'hero_slide2_badge_title', 'Instant Front Counter Check' );
$slide2_img         = mp_opt( 'hero_slide2_image', '' );
if ( empty( $slide2_img ) ) {
	$slide2_img = MP_THEME_URI . '/assets/images/apple-fix-bench.jpg';
}

// Hero Slide 3
$slide3_kicker      = mp_opt( 'hero_slide3_kicker', 'Original Accessories & Power Systems' );
$slide3_title       = mp_opt( 'hero_slide3_title', 'Original Audio, PD Chargers & Gear.' );
$slide3_desc        = mp_opt( 'hero_slide3_desc', 'Power and protect your device with authentic Apple AirPods, Galaxy Buds, 20W/30W/65W PD Fast Chargers, 9H tempered glass, MagSafe protective armor, and instant eSewa merchant top-up services.' );
$slide3_perk1       = mp_opt( 'hero_slide3_perk1', 'Apple 20W/30W & Samsung 45W GaN' );
$slide3_perk2       = mp_opt( 'hero_slide3_perk2', 'Original AirPods & Galaxy Buds' );
$slide3_perk3       = mp_opt( 'hero_slide3_perk3', 'Free Counter Glass Installation' );
$slide3_btn1        = mp_opt( 'hero_slide3_btn1_text', 'Browse Accessories' );
$slide3_btn1_url    = mp_opt( 'hero_slide3_btn1_url', '#categories' );
$slide3_btn2        = mp_opt( 'hero_slide3_btn2_text', 'Order on WhatsApp' );
$slide3_btn2_url    = mp_opt( 'hero_slide3_btn2_url', mp_get_whatsapp_link( 'Namaste Ali Mobile, accessories stock barema bujhna chahanchhu' ) );
$slide3_stock_tag   = mp_opt( 'hero_slide3_stock_tag', '100% Genuine Sealed' );
$slide3_badge_sub   = mp_opt( 'hero_slide3_badge_sub', 'Brand Warranty' );
$slide3_badge_title = mp_opt( 'hero_slide3_badge_title', 'Official PD Fast Charging' );
$slide3_img         = mp_opt( 'hero_slide3_image', '' );
if ( empty( $slide3_img ) ) {
	$slide3_img = MP_THEME_URI . '/assets/images/shop-accessories-shelf.jpg';
}

// Flagship Spotlight Image
$spotlight_img = mp_opt( 'spotlight_image', '' );
if ( empty( $spotlight_img ) ) {
	$spotlight_img = MP_THEME_URI . '/assets/images/iphone-16-pro.jpg';
}

// Apple Fix Lab Image
$lab_img = mp_opt( 'lab_image', '' );
if ( empty( $lab_img ) ) {
	$lab_img = MP_THEME_URI . '/assets/images/apple-fix-bench.jpg';
}

// First-Aid Guides Images
$guide1_img = mp_opt( 'guide1_img', '' );
if ( empty( $guide1_img ) ) {
	$guide1_img = MP_THEME_URI . '/assets/images/tip-cracked-screen.jpg';
}
$guide2_img = mp_opt( 'guide2_img', '' );
if ( empty( $guide2_img ) ) {
	$guide2_img = MP_THEME_URI . '/assets/images/tip-water-damage.jpg';
}
$guide3_img = mp_opt( 'guide3_img', '' );
if ( empty( $guide3_img ) ) {
	$guide3_img = MP_THEME_URI . '/assets/images/tip-battery-care.jpg';
}
?>

<main>

<!-- Hero Slider Section: Creative Business Mobile Shop Architecture -->
<section class="hero-slider-section" id="hero-slider">
	<div class="hero-slider-container">

		<!-- Slide 1: Flagships -->
		<div class="hero-slide active" data-slide-index="0">
			<div class="wrap hero-biz-grid">
				<!-- Left Column: Department Offer & CTAs -->
				<div class="hero-biz-info fade-up in-view">
					<div class="hero-biz-dept-kicker">
						<span class="kicker-num">01</span>
						<span class="kicker-sep">/</span>
						<span class="kicker-label"><?php echo esc_html( $slide1_kicker ); ?></span>
					</div>

					<h1 class="hero-biz-title"><?php echo esc_html( $slide1_title ); ?></h1>
					<p class="hero-biz-description"><?php echo esc_html( $slide1_desc ); ?></p>

					<!-- Retail Trust Perks -->
					<div class="hero-biz-perks">
						<span class="perk-item"><i class="fa-solid fa-check" aria-hidden="true"></i> <?php echo esc_html( $slide1_perk1 ); ?></span>
						<span class="perk-item"><i class="fa-solid fa-check" aria-hidden="true"></i> <?php echo esc_html( $slide1_perk2 ); ?></span>
						<span class="perk-item"><i class="fa-solid fa-check" aria-hidden="true"></i> <?php echo esc_html( $slide1_perk3 ); ?></span>
					</div>

					<div class="hero-biz-cta-group">
						<a class="btn btn-primary btn-lg" href="<?php echo esc_url( $slide1_btn1_url ); ?>">
							<span><?php echo esc_html( $slide1_btn1 ); ?></span>
							<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.4"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
						</a>
						<a class="btn btn-whatsapp btn-lg" href="<?php echo esc_url( $slide1_btn2_url ); ?>" target="_blank" rel="noopener">
							<svg viewBox="0 0 24 24" width="16" height="16" fill="currentColor"><path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0 0 12.04 2m.01 1.67c2.2 0 4.26.86 5.82 2.42a8.225 8.225 0 0 1 2.41 5.83c0 4.54-3.7 8.24-8.24 8.24-1.48 0-2.93-.4-4.2-1.15l-.3-.18-3.12.82.83-3.04-.2-.31a8.196 8.196 0 0 1-1.26-4.38c0-4.54 3.7-8.24 8.24-8.24m4.52 11.66c-.25-.13-1.47-.72-1.7-.81-.23-.08-.39-.13-.56.13-.17.25-.64.81-.79.97-.14.17-.29.19-.54.06-.25-.13-1.05-.39-2-1.23-.74-.66-1.24-1.47-1.39-1.72-.14-.25-.02-.39.11-.51.11-.11.25-.29.37-.43.13-.14.17-.25.25-.41.08-.17.04-.31-.02-.44-.06-.13-.56-1.34-.76-1.84-.2-.49-.4-.42-.56-.43h-.47c-.17 0-.44.06-.67.31-.23.25-.87.85-.87 2.08 0 1.23.9 2.41 1.02 2.58.13.17 1.76 2.69 4.27 3.77.6.26 1.07.41 1.43.53.6.19 1.15.16 1.58.1.48-.07 1.47-.6 1.68-1.18.21-.58.21-1.07.15-1.18-.06-.11-.23-.17-.48-.29z"/></svg>
							<span><?php echo esc_html( $slide1_btn2 ); ?></span>
						</a>
					</div>
				</div>

				<!-- Center Column: Showcase Media Stage -->
				<div class="hero-biz-stage">
					<div class="hero-biz-media-frame">
						<span class="biz-stock-tag"><i class="fa-solid fa-circle-check" aria-hidden="true"></i> <?php echo esc_html( $slide1_stock_tag ); ?></span>
						<img src="<?php echo esc_url( $slide1_img ); ?>" alt="<?php echo esc_attr( $slide1_title ); ?>" loading="eager">
						<div class="hero-biz-media-badge">
							<small><?php echo esc_html( $slide1_badge_sub ); ?></small>
							<strong><?php echo esc_html( $slide1_badge_title ); ?></strong>
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
						<span class="kicker-label"><?php echo esc_html( $slide2_kicker ); ?></span>
					</div>

					<h2 class="hero-biz-title"><?php echo esc_html( $slide2_title ); ?></h2>
					<p class="hero-biz-description"><?php echo esc_html( $slide2_desc ); ?></p>

					<div class="hero-biz-perks">
						<span class="perk-item"><i class="fa-solid fa-check" aria-hidden="true"></i> <?php echo esc_html( $slide2_perk1 ); ?></span>
						<span class="perk-item"><i class="fa-solid fa-check" aria-hidden="true"></i> <?php echo esc_html( $slide2_perk2 ); ?></span>
						<span class="perk-item"><i class="fa-solid fa-check" aria-hidden="true"></i> <?php echo esc_html( $slide2_perk3 ); ?></span>
					</div>

					<div class="hero-biz-cta-group">
						<a class="btn btn-primary btn-lg" href="<?php echo esc_url( $slide2_btn1_url ); ?>">
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
						<span class="biz-stock-tag"><i class="fa-solid fa-microscope" aria-hidden="true"></i> <?php echo esc_html( $slide2_stock_tag ); ?></span>
						<img src="<?php echo esc_url( $slide2_img ); ?>" alt="<?php echo esc_attr( $slide2_title ); ?>" loading="lazy">
						<div class="hero-biz-media-badge">
							<small><?php echo esc_html( $slide2_badge_sub ); ?></small>
							<strong><?php echo esc_html( $slide2_badge_title ); ?></strong>
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
						<span class="kicker-label"><?php echo esc_html( $slide3_kicker ); ?></span>
					</div>

					<h2 class="hero-biz-title"><?php echo esc_html( $slide3_title ); ?></h2>
					<p class="hero-biz-description"><?php echo esc_html( $slide3_desc ); ?></p>

					<div class="hero-biz-perks">
						<span class="perk-item"><i class="fa-solid fa-check" aria-hidden="true"></i> <?php echo esc_html( $slide3_perk1 ); ?></span>
						<span class="perk-item"><i class="fa-solid fa-check" aria-hidden="true"></i> <?php echo esc_html( $slide3_perk2 ); ?></span>
						<span class="perk-item"><i class="fa-solid fa-check" aria-hidden="true"></i> <?php echo esc_html( $slide3_perk3 ); ?></span>
					</div>

					<div class="hero-biz-cta-group">
						<a class="btn btn-primary btn-lg" href="<?php echo esc_url( $slide3_btn1_url ); ?>">
							<span><?php echo esc_html( $slide3_btn1 ); ?></span>
							<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.4"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
						</a>
						<a class="btn btn-whatsapp btn-lg" href="<?php echo esc_url( $slide3_btn2_url ); ?>" target="_blank" rel="noopener">
							<svg viewBox="0 0 24 24" width="16" height="16" fill="currentColor"><path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0 0 12.04 2m.01 1.67c2.2 0 4.26.86 5.82 2.42a8.225 8.225 0 0 1 2.41 5.83c0 4.54-3.7 8.24-8.24 8.24-1.48 0-2.93-.4-4.2-1.15l-.3-.18-3.12.82.83-3.04-.2-.31a8.196 8.196 0 0 1-1.26-4.38c0-4.54 3.7-8.24 8.24-8.24m4.52 11.66c-.25-.13-1.47-.72-1.7-.81-.23-.08-.39-.13-.56.13-.17.25-.64.81-.79.97-.14.17-.29.19-.54.06-.25-.13-1.05-.39-2-1.23-.74-.66-1.24-1.47-1.39-1.72-.14-.25-.02-.39.11-.51.11-.11.25-.29.37-.43.13-.14.17-.25.25-.41.08-.17.04-.31-.02-.44-.06-.13-.56-1.34-.76-1.84-.2-.49-.4-.42-.56-.43h-.47c-.17 0-.44.06-.67.31-.23.25-.87.85-.87 2.08 0 1.23.9 2.41 1.02 2.58.13.17 1.76 2.69 4.27 3.77.6.26 1.07.41 1.43.53.6.19 1.15.16 1.58.1.48-.07 1.47-.6 1.68-1.18.21-.58.21-1.07.15-1.18-.06-.11-.23-.17-.48-.29z"/></svg>
							<span><?php echo esc_html( $slide3_btn2 ); ?></span>
						</a>
					</div>
				</div>

				<div class="hero-biz-stage">
					<div class="hero-biz-media-frame">
						<span class="biz-stock-tag"><i class="fa-solid fa-certificate" aria-hidden="true"></i> <?php echo esc_html( $slide3_stock_tag ); ?></span>
						<img src="<?php echo esc_url( $slide3_img ); ?>" alt="<?php echo esc_attr( $slide3_title ); ?>" loading="lazy">
						<div class="hero-biz-media-badge">
							<small><?php echo esc_html( $slide3_badge_sub ); ?></small>
							<strong><?php echo esc_html( $slide3_badge_title ); ?></strong>
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
					<strong><?php echo esc_html( mp_opt( 'hero_dock_tab1_title', 'Flagship Handsets' ) ); ?></strong>
					<small><?php echo esc_html( mp_opt( 'hero_dock_tab1_sub', 'iPhone 16, S24 & Pixel 9' ) ); ?></small>
				</div>
			</button>
			<button class="slider-dock-tab" data-slide-to="1" role="tab" aria-selected="false" type="button">
				<div class="dock-tab-progress"><div class="dock-tab-progress-fill"></div></div>
				<span class="dock-tab-index">02</span>
				<div class="dock-tab-text">
					<strong><?php echo esc_html( mp_opt( 'hero_dock_tab2_title', 'Apple Fix Lab' ) ); ?></strong>
					<small><?php echo esc_html( mp_opt( 'hero_dock_tab2_sub', '30-Min On-Site Repairs' ) ); ?></small>
				</div>
			</button>
			<button class="slider-dock-tab" data-slide-to="2" role="tab" aria-selected="false" type="button">
				<div class="dock-tab-progress"><div class="dock-tab-progress-fill"></div></div>
				<span class="dock-tab-index">03</span>
				<div class="dock-tab-text">
					<strong><?php echo esc_html( mp_opt( 'hero_dock_tab3_title', 'Original Gear' ) ); ?></strong>
					<small><?php echo esc_html( mp_opt( 'hero_dock_tab3_sub', 'PD Chargers, Audio & Armor' ) ); ?></small>
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
</section>

<!-- Shop By Category Section: Visual Showroom Counters -->
<section id="categories" class="categories-section">
	<div class="wrap">
		<div class="sec-head fade-up">
			<div>
				<span class="sec-kicker"><?php echo esc_html( mp_opt( 'categories_kicker', 'Showroom Counters' ) ); ?></span>
				<h2><?php echo esc_html( mp_opt( 'categories_title', 'Explore Store Counters & Departments' ) ); ?></h2>
				<p><?php echo esc_html( mp_opt( 'categories_subtitle', 'From brand-new sealed smartphones to Gulariya\'s dedicated Apple Fix lab, genuine accessories, and digital merchant services.' ) ); ?></p>
			</div>
			<a class="view-all-link" href="<?php echo esc_url( mp_opt( 'categories_btn_url', '#catalog' ) ); ?>">
				<span><?php echo esc_html( mp_opt( 'categories_btn_text', 'View All Products' ) ); ?></span>
				<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.2"><polyline points="9 18 15 12 9 6"></polyline></svg>
			</a>
		</div>

		<div class="categories-grid fade-up">
			<a class="category-card" href="<?php echo esc_url( mp_opt( 'cat1_url', '#catalog' ) ); ?>">
				<div class="cat-icon-wrap">
					<svg viewBox="0 0 24 24" width="26" height="26" fill="none" stroke="currentColor" stroke-width="2"><rect x="5" y="2" width="14" height="20" rx="2" ry="2"></rect><line x1="12" y1="18" x2="12.01" y2="18"></line></svg>
				</div>
				<strong><?php echo esc_html( mp_opt( 'cat1_title', 'Smartphones' ) ); ?></strong>
				<small><?php echo esc_html( mp_opt( 'cat1_sub', 'iPhone, Samsung, Pixel & Redmi' ) ); ?></small>
				<span class="cat-explore-hint"><?php echo esc_html( mp_opt( 'cat1_hint', 'Browse Showroom →' ) ); ?></span>
			</a>

			<a class="category-card cat-card-highlight" href="<?php echo esc_url( mp_opt( 'cat2_url', '#services' ) ); ?>">
				<div class="cat-icon-wrap">
					<svg viewBox="0 0 24 24" width="26" height="26" fill="none" stroke="currentColor" stroke-width="2"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"></path></svg>
				</div>
				<strong><?php echo esc_html( mp_opt( 'cat2_title', 'Apple Fix Lab' ) ); ?></strong>
				<small><?php echo esc_html( mp_opt( 'cat2_sub', 'iPhone Screen, Battery & IC Lab' ) ); ?></small>
				<span class="cat-explore-hint"><?php echo esc_html( mp_opt( 'cat2_hint', 'View Repair Board →' ) ); ?></span>
			</a>

			<a class="category-card" href="<?php echo esc_url( mp_opt( 'cat3_url', '#catalog' ) ); ?>">
				<div class="cat-icon-wrap">
					<svg viewBox="0 0 24 24" width="26" height="26" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 18v-6a9 9 0 0 1 18 0v6"></path><path d="M21 19a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3zM3 19a2 2 0 0 0 2 2h1a2 2 0 0 0 2-2v-3a2 2 0 0 0-2-2H3z"></path></svg>
				</div>
				<strong><?php echo esc_html( mp_opt( 'cat3_title', 'Audio & Buds' ) ); ?></strong>
				<small><?php echo esc_html( mp_opt( 'cat3_sub', 'AirPods, Neckbands & ANC Sound' ) ); ?></small>
				<span class="cat-explore-hint"><?php echo esc_html( mp_opt( 'cat3_hint', 'Explore Studio →' ) ); ?></span>
			</a>

			<a class="category-card" href="<?php echo esc_url( mp_opt( 'cat4_url', '#catalog' ) ); ?>">
				<div class="cat-icon-wrap">
					<svg viewBox="0 0 24 24" width="26" height="26" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="7"></circle><polyline points="12 9 12 12 13.5 13.5"></polyline><path d="M16.51 17.35l-.35 3.83a2 2 0 0 1-2 1.82H9.83a2 2 0 0 1-2-1.82l-.35-3.83m.01-10.7l.35-3.83A2 2 0 0 1 9.83 1h4.35a2 2 0 0 1 2 1.82l.35 3.83"></path></svg>
				</div>
				<strong><?php echo esc_html( mp_opt( 'cat4_title', 'Smartwatches' ) ); ?></strong>
				<small><?php echo esc_html( mp_opt( 'cat4_sub', 'Calling, AMOLED & Fitness Wear' ) ); ?></small>
				<span class="cat-explore-hint"><?php echo esc_html( mp_opt( 'cat4_hint', 'Discover Watches →' ) ); ?></span>
			</a>

			<a class="category-card" href="<?php echo esc_url( mp_opt( 'cat5_url', '#catalog' ) ); ?>">
				<div class="cat-icon-wrap">
					<svg viewBox="0 0 24 24" width="26" height="26" fill="none" stroke="currentColor" stroke-width="2"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"></path></svg>
				</div>
				<strong><?php echo esc_html( mp_opt( 'cat5_title', 'Chargers & Glass' ) ); ?></strong>
				<small><?php echo esc_html( mp_opt( 'cat5_sub', '20W–120W Adapters & 9H Glass' ) ); ?></small>
				<span class="cat-explore-hint"><?php echo esc_html( mp_opt( 'cat5_hint', 'View Protection →' ) ); ?></span>
			</a>

			<a class="category-card" href="<?php echo esc_url( mp_opt( 'cat6_url', mp_get_whatsapp_link( 'Namaste, eSewa recharge sewa barema bujhna chahanchhu' ) ) ); ?>" target="_blank" rel="noopener">
				<div class="cat-icon-wrap">
					<svg viewBox="0 0 24 24" width="26" height="26" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="5" width="20" height="14" rx="2"></rect><line x1="2" y1="10" x2="22" y2="10"></line></svg>
				</div>
				<strong><?php echo esc_html( mp_opt( 'cat6_title', 'eSewa & Banking' ) ); ?></strong>
				<small><?php echo esc_html( mp_opt( 'cat6_sub', 'Top-Up, Bills & Money Transfer' ) ); ?></small>
				<span class="cat-explore-hint"><?php echo esc_html( mp_opt( 'cat6_hint', 'Counter Agent →' ) ); ?></span>
			</a>
		</div>
	</div>
</section>

<!-- Brand Tiles Section -->
<section id="brands" class="brands-section">
	<div class="wrap">
		<div class="sec-head fade-up">
			<div>
				<span class="sec-kicker"><?php echo esc_html( mp_opt( 'brands_kicker', 'Authorized Brands' ) ); ?></span>
				<h2><?php echo esc_html( mp_opt( 'brands_title', 'Top Smartphone Brands In Store' ) ); ?></h2>
				<p><?php echo esc_html( mp_opt( 'brands_subtitle', 'Select any brand tile below to instantly filter available models in our showroom catalog.' ) ); ?></p>
			</div>
			<a class="view-all-link" href="<?php echo esc_url( mp_opt( 'brands_btn_url', '#catalog' ) ); ?>">
				<span><?php echo esc_html( mp_opt( 'brands_btn_text', 'Explore All Brands' ) ); ?></span>
				<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.2"><polyline points="9 18 15 12 9 6"></polyline></svg>
			</a>
		</div>

		<div class="brands-grid fade-up">
			<div class="brand-card-link" data-filter-brand="apple" role="button" tabindex="0" title="<?php esc_attr_e( 'Filter Apple iPhones in catalog', 'mobile-pasal' ); ?>">
				<div class="brand-logo-svg">
					<svg viewBox="0 0 170 170" width="32" height="32" fill="#0f172a"><path d="M150.37 130.25c-2.45 5.66-5.35 10.87-8.71 15.66-4.58 6.53-8.33 11.05-11.22 13.56-4.48 4.12-9.28 6.23-14.42 6.35-3.69 0-8.14-1.05-13.32-3.18-5.19-2.12-9.97-3.17-14.34-3.17-4.58 0-9.49 1.05-14.75 3.17-5.26 2.13-9.5 3.24-12.74 3.35-4.35.13-9.16-1.9-14.42-6.08-3.7-3.04-7.58-7.71-11.65-14-4.89-7.5-8.88-16.14-11.96-25.91-3.08-9.77-4.63-19.34-4.63-28.71 0-14.33 3.63-26.23 10.89-35.69 7.26-9.46 16.51-14.28 27.75-14.47 5.26 0 11.01 1.34 17.26 4.02 6.24 2.68 10.15 4.09 11.72 4.22 1.93-.26 5.86-1.63 11.79-4.11 5.92-2.48 11.22-3.6 15.9-3.35 12.04.75 21.6 5.37 28.69 13.88-10.53 6.38-15.67 15.2-15.42 26.47.25 8.78 3.52 16.19 9.8 22.23 6.28 6.04 13.78 9.69 22.5 10.95-1.93 6.01-4.41 12.18-7.44 18.52zm-32.96-107.4c0-7.39 2.65-14.22 7.95-20.5 5.3-6.28 11.89-10.05 19.78-11.3 1.13 8.13-1.47 15.36-7.8 21.69-6.33 6.33-13.62 10.15-21.87 11.47-.28-.45-.42-.99-.42-1.62-.01-.42.23-.97.72-1.65-.01.62-.25 1.17-.36 1.91z"/></svg>
				</div>
				<span class="brand-name"><?php echo esc_html( mp_opt( 'brand1_name', 'Apple' ) ); ?></span>
				<small><?php echo esc_html( mp_opt( 'brand1_sub', 'iPhone 16 / 15 / 14 Series' ) ); ?></small>
				<span class="brand-chip-pill"><?php echo esc_html( mp_opt( 'brand1_chip', 'Filter iPhone →' ) ); ?></span>
			</div>

			<div class="brand-card-link" data-filter-brand="samsung" role="button" tabindex="0" title="<?php esc_attr_e( 'Filter Samsung Galaxy in catalog', 'mobile-pasal' ); ?>">
				<div class="brand-logo-svg">
					<svg viewBox="0 0 100 24" height="20" fill="#0c4da2"><path d="M12.8 14.5c0-1.8-1.5-2.7-4.3-3.4C6 10.5 4.9 9.9 4.9 8.8c0-.9.9-1.5 2.5-1.5 1.8 0 3 .7 3.2 2h3.2c-.3-2.9-2.6-4.6-6.4-4.6C3.1 4.7.7 6.8.7 9.8c0 2.2 1.4 3.3 4.5 4.1 2.8.7 3.8 1.4 3.8 2.5 0 1.1-1.1 1.7-2.9 1.7-2.2 0-3.6-.9-3.8-2.5H0c.2 3.3 2.7 5.1 7.1 5.1 4.4 0 6.9-2.2 6.9-5.1zm11.2-9.6l-5.6 15.4h3.7l1.1-3.3h5.9l1.1 3.3h3.7L28.3 4.9h-4.3zm.5 9.3l1.7-5.3 1.7 5.3h-3.4zm16.5-9.3v9.8l-5.5-9.8h-3.2v15.4h3.4V10.5l5.5 9.8h3.2V4.9h-3.4zm17.9 9.6c0-1.8-1.5-2.7-4.3-3.4-2.5-.6-3.6-1.2-3.6-2.3 0-.9.9-1.5 2.5-1.5 1.8 0 3 .7 3.2 2h3.2c-.3-2.9-2.6-4.6-6.4-4.6-4.3 0-6.7 2.1-6.7 5.1 0 2.2 1.4 3.3 4.5 4.1 2.8.7 3.8 1.4 3.8 2.5 0 1.1-1.1 1.7-2.9 1.7-2.2 0-3.6-.9-3.8-2.5h-3.2c.2 3.3 2.7 5.1 7.1 5.1 4.4 0 6.9-2.2 6.9-5.1zm11.8-9.6v9.8c0 1.8 1.1 2.7 2.8 2.7 1.8 0 2.8-.9 2.8-2.7V4.9h3.6v9.7c0 3.8-2.5 5.8-6.4 5.8s-6.4-2-6.4-5.8V4.9h3.6zm19.5 0v9.8l-5.5-9.8h-3.2v15.4h3.4V10.5l5.5 9.8h3.2V4.9h-3.4z"/></svg>
				</div>
				<span class="brand-name"><?php echo esc_html( mp_opt( 'brand2_name', 'Samsung' ) ); ?></span>
				<small><?php echo esc_html( mp_opt( 'brand2_sub', 'Galaxy S24 Ultra & A Series' ) ); ?></small>
				<span class="brand-chip-pill"><?php echo esc_html( mp_opt( 'brand2_chip', 'Filter Galaxy →' ) ); ?></span>
			</div>

			<div class="brand-card-link" data-filter-brand="google" role="button" tabindex="0" title="<?php esc_attr_e( 'Filter Google Pixel in catalog', 'mobile-pasal' ); ?>">
				<div class="brand-logo-svg">
					<svg viewBox="0 0 24 24" width="26" height="26"><path fill="#4285F4" d="M23.745 12.27c0-.7-.06-1.4-.19-2.07H12v4.51h6.6c-.29 1.52-1.14 2.8-2.4 3.65v3.03h3.88c2.27-2.09 3.66-5.17 3.66-9.12z"/><path fill="#34A853" d="M12 24c3.24 0 5.95-1.08 7.93-2.91l-3.88-3.03c-1.08.72-2.45 1.16-4.05 1.16-3.12 0-5.77-2.1-6.72-4.93H1.25v3.13C3.26 21.36 7.33 24 12 24z"/><path fill="#FBBC05" d="M5.28 14.29c-.25-.72-.38-1.49-.38-2.29s.13-1.57.38-2.29V6.57H1.25C.45 8.15 0 9.99 0 12s.45 3.85 1.25 5.43l4.03-3.14z"/><path fill="#EA4335" d="M12 4.75c1.77 0 3.35.61 4.6 1.8l3.42-3.42C17.95 1.19 15.24 0 12 0 7.33 0 3.26 2.64 1.25 6.57l4.03 3.14c.95-2.83 3.6-4.96 6.72-4.96z"/></svg>
				</div>
				<span class="brand-name"><?php echo esc_html( mp_opt( 'brand3_name', 'Google Pixel' ) ); ?></span>
				<small><?php echo esc_html( mp_opt( 'brand3_sub', 'Pixel 9 / 8 & Tensor AI' ) ); ?></small>
				<span class="brand-chip-pill"><?php echo esc_html( mp_opt( 'brand3_chip', 'Filter Pixel →' ) ); ?></span>
			</div>

			<div class="brand-card-link" data-filter-brand="oneplus" role="button" tabindex="0" title="<?php esc_attr_e( 'Filter OnePlus in catalog', 'mobile-pasal' ); ?>">
				<div class="brand-logo-svg">
					<svg viewBox="0 0 40 40" width="28" height="28"><rect width="40" height="40" rx="8" fill="#eb0028"/><path fill="#fff" d="M14 11h-3v18h3v-7h4c3.86 0 7-3.14 7-7s-3.14-7-7-7h-4zm0 8v-5h4c2.21 0 4 1.79 4 4s-1.79 4-4 4h-4zm15-4h-2v2h2v2h2v-2h2v-2h-2v-2h-2v2z"/></svg>
				</div>
				<span class="brand-name"><?php echo esc_html( mp_opt( 'brand4_name', 'OnePlus' ) ); ?></span>
				<small><?php echo esc_html( mp_opt( 'brand4_sub', 'OnePlus 12 & Nord 4' ) ); ?></small>
				<span class="brand-chip-pill"><?php echo esc_html( mp_opt( 'brand4_chip', 'Filter OnePlus →' ) ); ?></span>
			</div>

			<div class="brand-card-link" data-filter-brand="xiaomi" role="button" tabindex="0" title="<?php esc_attr_e( 'Filter Xiaomi in catalog', 'mobile-pasal' ); ?>">
				<div class="brand-logo-svg">
					<svg viewBox="0 0 40 40" width="28" height="28"><rect width="40" height="40" rx="8" fill="#ff6900"/><path fill="#fff" d="M11 13h5.5v8.5H22V13h5.5v14h-5.5v-4.5h-5.5V27H11V13zm8 7.5v-4h2.5v4H19z"/></svg>
				</div>
				<span class="brand-name"><?php echo esc_html( mp_opt( 'brand5_name', 'Xiaomi' ) ); ?></span>
				<small><?php echo esc_html( mp_opt( 'brand5_sub', 'Xiaomi 14 & Redmi Note 13' ) ); ?></small>
				<span class="brand-chip-pill"><?php echo esc_html( mp_opt( 'brand5_chip', 'Filter Redmi →' ) ); ?></span>
			</div>

			<div class="brand-card-link" data-filter-brand="accessories" role="button" tabindex="0" title="<?php esc_attr_e( 'Filter Accessories in catalog', 'mobile-pasal' ); ?>">
				<div class="brand-logo-svg">
					<svg viewBox="0 0 24 24" width="28" height="28" fill="#059669"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 14H9v-2h2v2zm0-4H9V7h2v5zm4 4h-2v-2h2v2zm0-4h-2V7h2v5z"/></svg>
				</div>
				<span class="brand-name"><?php echo esc_html( mp_opt( 'brand6_name', 'Accessories' ) ); ?></span>
				<small><?php echo esc_html( mp_opt( 'brand6_sub', 'AirPods, Watch & Anker Fast PD' ) ); ?></small>
				<span class="brand-chip-pill"><?php echo esc_html( mp_opt( 'brand6_chip', 'Filter Gear →' ) ); ?></span>
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
					<span><?php echo esc_html( mp_opt( 'spotlight_badge', 'Official Authorized Flagship Handset' ) ); ?></span>
				</div>
				<h2><?php echo esc_html( mp_opt( 'spotlight_title', 'iPhone 16 Pro & Pro Max' ) ); ?></h2>
				<p class="tagline"><?php echo esc_html( mp_opt( 'spotlight_tagline', 'Built for Apple Intelligence • Grade 5 Titanium' ) ); ?></p>
				<p class="desc"><?php echo esc_html( mp_opt( 'spotlight_desc', 'Experience the supercharged A18 Pro chip, 48MP Fusion Camera system, tactile Camera Control button, and unmatched battery endurance. Sealed-pack stock ready for immediate counter handover at Ali Mobile Gulariya.' ) ); ?></p>

				<!-- Titanium Swatches -->
				<div class="flagship-finish-swatches">
					<span class="swatch-label"><?php echo esc_html( mp_opt( 'spotlight_swatch_label', 'Available Finishes:' ) ); ?></span>
					<span class="swatch-dot swatch-desert" title="Desert Titanium"></span>
					<span class="swatch-dot swatch-natural" title="Natural Titanium"></span>
					<span class="swatch-dot swatch-white" title="White Titanium"></span>
					<span class="swatch-dot swatch-black active" title="Black Titanium"></span>
				</div>

				<div class="spec-pills-row">
					<span class="spec-pill"><i class="fa-solid fa-microchip" aria-hidden="true"></i> <?php echo esc_html( mp_opt( 'spotlight_spec1', 'A18 Pro Bionic' ) ); ?></span>
					<span class="spec-pill"><i class="fa-solid fa-camera" aria-hidden="true"></i> <?php echo esc_html( mp_opt( 'spotlight_spec2', 'Camera Control' ) ); ?></span>
					<span class="spec-pill"><i class="fa-solid fa-shield-halved" aria-hidden="true"></i> <?php echo esc_html( mp_opt( 'spotlight_spec3', 'Grade 5 Titanium' ) ); ?></span>
					<span class="spec-pill"><i class="fa-solid fa-file-invoice" aria-hidden="true"></i> <?php echo esc_html( mp_opt( 'spotlight_spec4', 'NTA Approved • 100% Legal IMEI' ) ); ?></span>
				</div>

				<div class="flagship-status-badge">
					<span class="status-pulse-dot"></span>
					<span><?php echo esc_html( mp_opt( 'spotlight_status_text', 'Sealed Stock Handover Ready at Gulariya Showroom Counter' ) ); ?></span>
				</div>

				<div class="flagship-actions">
					<a class="btn btn-whatsapp" href="<?php echo esc_url( mp_get_whatsapp_link( 'Namaste, iPhone 16 Pro (128GB / 256GB) ko aaja ko counter price dinus' ) ); ?>" target="_blank" rel="noopener">
						<svg viewBox="0 0 24 24" width="16" height="16" fill="currentColor"><path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0 0 12.04 2"/></svg>
						<span><?php echo esc_html( mp_opt( 'spotlight_btn1_text', 'Ask Today\'s Price on WhatsApp' ) ); ?></span>
					</a>
					<a class="btn btn-secondary" href="tel:+<?php echo esc_attr( mp_clean_phone( mp_opt( 'contact_phone', '9804530786' ) ) ); ?>">
						<svg viewBox="0 0 24 24" width="16" height="16" fill="currentColor"><path d="M20.01 15.38c-1.23 0-2.42-.2-3.53-.56a.977.977 0 0 0-1.01.24l-1.57 1.97c-2.83-1.35-5.48-3.9-6.89-6.83l1.95-1.66c.27-.28.35-.67.24-1.02-.37-1.11-.56-2.3-.56-3.53 0-.54-.45-.99-.99-.99H4.19C3.65 3 3 3.24 3 3.99 3 13.28 10.73 21 20.01 21c.71 0 .99-.63.99-1.18v-3.45c0-.54-.45-.99-.99-.99z"/></svg>
						<span><?php printf( esc_html__( '%s (%s)', 'mobile-pasal' ), esc_html( mp_opt( 'spotlight_btn2_prefix', 'Call Store Direct' ) ), esc_html( mp_opt( 'contact_phone', '9804530786' ) ) ); ?></span>
					</a>
				</div>
			</div>
			<div class="flagship-media">
				<img src="<?php echo esc_url( $spotlight_img ); ?>" alt="<?php echo esc_attr( mp_opt( 'spotlight_title', 'iPhone 16 Pro & Pro Max' ) ); ?>">
			</div>
		</div>
	</div>
</section>

<!-- Showroom Handsets Catalog with Sticky Sidebar Filtration & Pagination -->
<section id="catalog" class="catalog-section">
	<div class="wrap">
		<div class="sec-head fade-up" style="margin-bottom: 28px;">
			<div>
				<span class="sec-kicker"><?php echo esc_html( mp_opt( 'catalog_kicker', 'Showroom Catalog' ) ); ?></span>
				<h2><?php echo esc_html( mp_opt( 'catalog_title', 'Latest Smartphone Arrivals & Top Models' ) ); ?></h2>
				<p><?php echo esc_html( mp_opt( 'catalog_subtitle', 'Every handset is checked, unboxed or sealed-pack with official VAT bill & warranty. Filter by brand or search your model.' ) ); ?></p>
			</div>
			<a class="view-all-link" href="<?php echo esc_url( home_url( '/shop/' ) ); ?>">
				<span><?php echo esc_html( mp_opt( 'catalog_header_btn_text', 'View Full Shop' ) ); ?></span>
				<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.2"><polyline points="9 18 15 12 9 6"></polyline></svg>
			</a>
		</div>

		<!-- Mobile Filter Drawer Trigger Button -->
		<div class="shop-mobile-filter-bar">
			<button type="button" id="mobile-filter-drawer-btn" class="btn btn-outline btn-block">
				<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><line x1="4" y1="21" x2="4" y2="14"></line><line x1="4" y1="10" x2="4" y2="3"></line><line x1="12" y1="21" x2="12" y2="12"></line><line x1="12" y1="8" x2="12" y2="3"></line><line x1="20" y1="21" x2="20" y2="16"></line><line x1="20" y1="12" x2="20" y2="3"></line><line x1="1" y1="14" x2="7" y2="14"></line><line x1="9" y1="8" x2="15" y2="8"></line><line x1="17" y1="16" x2="23" y2="16"></line></svg>
				<span><?php esc_html_e( 'Filter Handsets & Budget', 'mobile-pasal' ); ?></span>
				<span class="mobile-filter-count-badge" id="mobile-filter-count">0</span>
			</button>
		</div>

		<!-- Two-Column Layout Grid -->
		<div class="shop-layout-grid fade-up">

			<!-- LEFT COLUMN: Sticky Filter Sidebar -->
			<aside class="shop-sidebar-filters" id="shop-sidebar-filters">
				<div class="sidebar-filter-header">
					<div class="sf-title-row">
						<svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.2"><line x1="4" y1="21" x2="4" y2="14"></line><line x1="4" y1="10" x2="4" y2="3"></line><line x1="12" y1="21" x2="12" y2="12"></line><line x1="12" y1="8" x2="12" y2="3"></line><line x1="20" y1="21" x2="20" y2="16"></line><line x1="20" y1="12" x2="20" y2="3"></line><line x1="1" y1="14" x2="7" y2="14"></line><line x1="9" y1="8" x2="15" y2="8"></line><line x1="17" y1="16" x2="23" y2="16"></line></svg>
						<h3><?php esc_html_e( 'Filters', 'mobile-pasal' ); ?></h3>
					</div>
					<button type="button" id="sidebar-reset-btn" class="btn-clear-all" title="<?php esc_attr_e( 'Reset all filters', 'mobile-pasal' ); ?>">
						<?php esc_html_e( 'Clear All', 'mobile-pasal' ); ?>
					</button>
				</div>

				<!-- Search Input -->
				<div class="sidebar-filter-group">
					<label class="filter-group-label" for="site-search"><?php esc_html_e( 'Search Models', 'mobile-pasal' ); ?></label>
					<div class="sidebar-search-wrap">
						<svg viewBox="0 0 24 24" width="15" height="15" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
						<input id="site-search" type="search" placeholder="<?php echo esc_attr( mp_opt( 'catalog_search_placeholder', 'Search iPhone, Galaxy, Pixel, Redmi...' ) ); ?>" autocomplete="off">
						<button id="search-clear-btn" type="button" class="sidebar-search-clear" style="display:none;" aria-label="<?php esc_attr_e( 'Clear search', 'mobile-pasal' ); ?>">&times;</button>
					</div>
				</div>

				<!-- Brand / Ecosystem Filter -->
				<div class="sidebar-filter-group">
					<label class="filter-group-label"><?php esc_html_e( 'Brand & Ecosystem', 'mobile-pasal' ); ?></label>
					<div class="sidebar-filter-list" role="tablist">
						<button type="button" class="sidebar-filter-item filter-tab-btn active" data-filter="all">
							<span class="filter-check-radio"></span>
							<span class="filter-name"><?php echo esc_html( mp_opt( 'catalog_tab1_label', 'All Handsets' ) ); ?></span>
						</button>
						<button type="button" class="sidebar-filter-item filter-tab-btn" data-filter="apple">
							<span class="filter-check-radio"></span>
							<span class="filter-name"><?php echo esc_html( mp_opt( 'catalog_tab2_label', 'Apple iPhone' ) ); ?></span>
						</button>
						<button type="button" class="sidebar-filter-item filter-tab-btn" data-filter="samsung">
							<span class="filter-check-radio"></span>
							<span class="filter-name"><?php echo esc_html( mp_opt( 'catalog_tab3_label', 'Samsung Galaxy' ) ); ?></span>
						</button>
						<button type="button" class="sidebar-filter-item filter-tab-btn" data-filter="xiaomi">
							<span class="filter-check-radio"></span>
							<span class="filter-name"><?php echo esc_html( mp_opt( 'catalog_tab6_label', 'Xiaomi / Redmi' ) ); ?></span>
						</button>
						<button type="button" class="sidebar-filter-item filter-tab-btn" data-filter="oneplus">
							<span class="filter-check-radio"></span>
							<span class="filter-name"><?php echo esc_html( mp_opt( 'catalog_tab5_label', 'OnePlus' ) ); ?></span>
						</button>
						<button type="button" class="sidebar-filter-item filter-tab-btn" data-filter="google">
							<span class="filter-check-radio"></span>
							<span class="filter-name"><?php echo esc_html( mp_opt( 'catalog_tab4_label', 'Google Pixel' ) ); ?></span>
						</button>
						<button type="button" class="sidebar-filter-item filter-tab-btn" data-filter="accessories">
							<span class="filter-check-radio"></span>
							<span class="filter-name"><?php echo esc_html( mp_opt( 'catalog_tab7_label', 'Accessories & Gear' ) ); ?></span>
						</button>
					</div>
				</div>

				<!-- Budget Range Filter -->
				<div class="sidebar-filter-group">
					<label class="filter-group-label"><?php esc_html_e( 'Budget Range (NPR)', 'mobile-pasal' ); ?></label>
					<div class="sidebar-filter-list" id="sidebar-price-filters">
						<button type="button" class="sidebar-filter-item price-filter-btn active" data-price="all">
							<span class="filter-check-radio"></span>
							<span class="filter-name"><?php esc_html_e( 'All Price Ranges', 'mobile-pasal' ); ?></span>
						</button>
						<button type="button" class="sidebar-filter-item price-filter-btn" data-price="under-30k">
							<span class="filter-check-radio"></span>
							<span class="filter-name"><?php esc_html_e( 'Under Rs. 30,000', 'mobile-pasal' ); ?></span>
						</button>
						<button type="button" class="sidebar-filter-item price-filter-btn" data-price="30k-75k">
							<span class="filter-check-radio"></span>
							<span class="filter-name"><?php esc_html_e( 'Rs. 30,000 – Rs. 75,000', 'mobile-pasal' ); ?></span>
						</button>
						<button type="button" class="sidebar-filter-item price-filter-btn" data-price="75k-150k">
							<span class="filter-check-radio"></span>
							<span class="filter-name"><?php esc_html_e( 'Rs. 75,000 – Rs. 1,50,000', 'mobile-pasal' ); ?></span>
						</button>
						<button type="button" class="sidebar-filter-item price-filter-btn" data-price="above-150k">
							<span class="filter-check-radio"></span>
							<span class="filter-name"><?php esc_html_e( 'Above Rs. 1,50,000', 'mobile-pasal' ); ?></span>
						</button>
					</div>
				</div>

				<!-- Sidebar Counter Help Card -->
				<div class="sidebar-help-card">
					<div class="shc-icon">
						<svg viewBox="0 0 24 24" width="20" height="20" fill="currentColor"><path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0 0 12.04 2m.01 1.67c2.2 0 4.26.86 5.82 2.42a8.225 8.225 0 0 1 2.41 5.83c0 4.54-3.7 8.24-8.24 8.24-1.48 0-2.93-.4-4.2-1.15l-.3-.18-3.12.82.83-3.04-.2-.31a8.196 8.196 0 0 1-1.26-4.38c0-4.54 3.7-8.24 8.24-8.24m4.52 11.66c-.25-.13-1.47-.72-1.7-.81-.23-.08-.39-.13-.56.13-.17.25-.64.81-.79.97-.14.17-.29.19-.54.06-.25-.13-1.05-.39-2-1.23-.74-.66-1.24-1.47-1.39-1.72-.14-.25-.02-.39.11-.51.11-.11.25-.29.37-.43.13-.14.17-.25.25-.41.08-.17.04-.31-.02-.44-.06-.13-.56-1.34-.76-1.84-.2-.49-.4-.42-.56-.43h-.47c-.17 0-.44.06-.67.31-.23.25-.87.85-.87 2.08 0 1.23.9 2.41 1.02 2.58.13.17 1.76 2.69 4.27 3.77.6.26 1.07.41 1.43.53.6.19 1.15.16 1.58.1.48-.07 1.47-.6 1.68-1.18.21-.58.21-1.07.15-1.18-.06-.11-.23-.17-.48-.29z"/></svg>
					</div>
					<h4><?php esc_html_e( 'Direct Counter Price?', 'mobile-pasal' ); ?></h4>
					<p><?php esc_html_e( 'Ask our Gulariya showroom sales desk on WhatsApp for today\'s cash offer and trade-in quote.', 'mobile-pasal' ); ?></p>
					<a class="btn btn-whatsapp btn-sm btn-block" href="<?php echo esc_url( mp_get_whatsapp_link() ); ?>" target="_blank" rel="noopener">
						<?php esc_html_e( 'Chat with Sales Desk', 'mobile-pasal' ); ?>
					</a>
				</div>
			</aside>

			<!-- RIGHT COLUMN: Products Main Area -->
			<div class="shop-products-main">

				<!-- Toolbar Header Bar -->
				<div class="shop-products-header-bar">
					<div class="sph-left">
						<h3 class="sph-heading"><?php esc_html_e( 'Verified Handset Catalog', 'mobile-pasal' ); ?></h3>
						<div class="sph-count-badge">
							<span id="catalog-count-num">0</span> <?php esc_html_e( 'Models Found', 'mobile-pasal' ); ?>
						</div>
					</div>
					<div class="sph-right">
						<label for="filter-sort-by" class="sph-sort-label"><?php esc_html_e( 'Sort by:', 'mobile-pasal' ); ?></label>
						<select id="filter-sort-by" class="filter-select">
							<option value="featured"><?php esc_html_e( 'Featured / Newest', 'mobile-pasal' ); ?></option>
							<option value="price-asc"><?php esc_html_e( 'Price: Low to High', 'mobile-pasal' ); ?></option>
							<option value="price-desc"><?php esc_html_e( 'Price: High to Low', 'mobile-pasal' ); ?></option>
							<option value="name-asc"><?php esc_html_e( 'Model: A to Z', 'mobile-pasal' ); ?></option>
						</select>
					</div>
				</div>

				<!-- Products Grid -->
				<div class="products-grid" id="products-grid">
					<?php
					$handset_query = new WP_Query( array(
						'post_type'      => 'handset',
						'posts_per_page' => 48,
						'post_status'    => 'publish',
					) );

					$card_idx = 0;

					if ( $handset_query->have_posts() ) :
						while ( $handset_query->have_posts() ) :
							$handset_query->the_post();
							$p_id       = get_the_ID();
							$p_title    = get_the_title();
							$permalink  = get_permalink( $p_id );
							$badge      = get_post_meta( $p_id, '_mp_badge', true ) ?: 'Official VAT Bill';
							$price      = get_post_meta( $p_id, '_mp_price', true );
							$old_price  = get_post_meta( $p_id, '_mp_old_price', true );
							$img_url    = mp_get_handset_img_url( $p_id );

							// Specs
							$spec_screen  = get_post_meta( $p_id, '_mp_spec_screen', true );
							$spec_chip    = get_post_meta( $p_id, '_mp_spec_chip', true );
							$spec_storage = get_post_meta( $p_id, '_mp_spec_storage', true );

							$brand_terms = get_the_terms( $p_id, 'device_brand' );
							$brand_slug  = ! empty( $brand_terms ) ? strtolower( $brand_terms[0]->slug ) : 'all';
							$brand_name  = ! empty( $brand_terms ) ? $brand_terms[0]->name : 'Handset';

							$cat_terms   = get_the_terms( $p_id, 'device_category' );
							$cat_slug    = ! empty( $cat_terms ) ? strtolower( $cat_terms[0]->slug ) : 'smartphones';
							$cat_name    = ! empty( $cat_terms ) ? $cat_terms[0]->name : $brand_name;

							$numeric_price = (int) preg_replace( '/[^0-9]/', '', $price );
							?>
							<article class="product-card" data-index="<?php echo esc_attr( $card_idx++ ); ?>" data-brand="<?php echo esc_attr( $brand_slug ); ?>" data-category="<?php echo esc_attr( $cat_slug ); ?>" data-price-numeric="<?php echo esc_attr( $numeric_price ); ?>" data-title="<?php echo esc_attr( strtolower( $p_title ) ); ?>">
								<!-- Top Badges Row -->
								<div class="product-card-topbar">
									<span class="product-badge-pill"><?php echo esc_html( $badge ); ?></span>
									<span class="product-category-chip"><?php echo esc_html( $cat_name ); ?></span>
								</div>

								<!-- Device Showcase Image Pedestal -->
								<a class="product-img-anchor" href="<?php echo esc_url( $permalink ); ?>" aria-label="<?php echo esc_attr( $p_title ); ?>">
									<div class="product-img-wrap">
										<img src="<?php echo esc_url( $img_url ); ?>" alt="<?php echo esc_attr( $p_title ); ?>" loading="lazy">
									</div>
								</a>

								<!-- Card Body -->
								<div class="product-body">
									<div class="product-meta-row">
										<span class="product-brand-kicker"><?php echo esc_html( $brand_name ); ?></span>
										<span class="product-nta-tag">
											<svg viewBox="0 0 24 24" width="11" height="11" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
											<span>MDMS &amp; VAT</span>
										</span>
									</div>

									<h4 class="product-title">
										<a href="<?php echo esc_url( $permalink ); ?>">
											<?php echo esc_html( $p_title ); ?>
										</a>
									</h4>

									<!-- Hardware Spec Micro-Pills -->
									<div class="product-spec-chips">
										<?php if ( ! empty( $spec_screen ) ) : ?>
											<span class="spec-chip" title="<?php echo esc_attr( $spec_screen ); ?>">
												<svg viewBox="0 0 24 24" width="11" height="11" fill="none" stroke="currentColor" stroke-width="2"><rect x="5" y="2" width="14" height="20" rx="2"></rect></svg>
												<span><?php echo esc_html( wp_trim_words( $spec_screen, 4, '' ) ); ?></span>
											</span>
										<?php endif; ?>
										<?php if ( ! empty( $spec_chip ) ) : ?>
											<span class="spec-chip" title="<?php echo esc_attr( $spec_chip ); ?>">
												<svg viewBox="0 0 24 24" width="11" height="11" fill="none" stroke="currentColor" stroke-width="2"><rect x="4" y="4" width="16" height="16" rx="2"></rect><rect x="9" y="9" width="6" height="6"></rect></svg>
												<span><?php echo esc_html( wp_trim_words( $spec_chip, 3, '' ) ); ?></span>
											</span>
										<?php endif; ?>
										<?php if ( ! empty( $spec_storage ) ) : ?>
											<span class="spec-chip" title="<?php echo esc_attr( $spec_storage ); ?>">
												<svg viewBox="0 0 24 24" width="11" height="11" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path></svg>
												<span><?php echo esc_html( $spec_storage ); ?></span>
											</span>
										<?php endif; ?>
									</div>

									<!-- Pricing Dock -->
									<div class="product-pricing-dock">
										<div class="price-val-wrap">
											<?php if ( ! empty( $price ) ) : ?>
												<span class="price-current"><?php echo esc_html( $price ); ?></span>
											<?php else : ?>
												<span class="price-current"><?php esc_html_e( 'Call for Rate', 'mobile-pasal' ); ?></span>
											<?php endif; ?>
											<?php if ( ! empty( $old_price ) ) : ?>
												<span class="price-original"><?php echo esc_html( $old_price ); ?></span>
											<?php endif; ?>
										</div>
										<span class="price-tax-paid"><?php esc_html_e( 'Nepal VAT Bill', 'mobile-pasal' ); ?></span>
									</div>

									<!-- Action Buttons -->
									<div class="product-action-dock">
										<a class="btn btn-whatsapp btn-sm btn-product-action" href="<?php echo esc_url( mp_get_whatsapp_link( 'Namaste Ali Mobile, ma tapaiharuko website ma ' . $p_title . ' herera aako chhu. Gulariya counter ma availability ra rate confirm gardinus na.' ) ); ?>" target="_blank" rel="noopener">
											<svg viewBox="0 0 24 24" width="14" height="14" fill="currentColor"><path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0 0 12.04 2m.01 1.67c2.2 0 4.26.86 5.82 2.42a8.225 8.225 0 0 1 2.41 5.83c0 4.54-3.7 8.24-8.24 8.24-1.48 0-2.93-.4-4.2-1.15l-.3-.18-3.12.82.83-3.04-.2-.31a8.196 8.196 0 0 1-1.26-4.38c0-4.54 3.7-8.24 8.24-8.24m4.52 11.66c-.25-.13-1.47-.72-1.7-.81-.23-.08-.39-.13-.56.13-.17.25-.64.81-.79.97-.14.17-.29.19-.54.06-.25-.13-1.05-.39-2-1.23-.74-.66-1.24-1.47-1.39-1.72-.14-.25-.02-.39.11-.51.11-.11.25-.29.37-.43.13-.14.17-.25.25-.41.08-.17.04-.31-.02-.44-.06-.13-.56-1.34-.76-1.84-.2-.49-.4-.42-.56-.43h-.47c-.17 0-.44.06-.67.31-.23.25-.87.85-.87 2.08 0 1.23.9 2.41 1.02 2.58.13.17 1.76 2.69 4.27 3.77.6.26 1.07.41 1.43.53.6.19 1.15.16 1.58.1.48-.07 1.47-.6 1.68-1.18.21-.58.21-1.07.15-1.18-.06-.11-.23-.17-.48-.29z"/></svg>
											<span><?php esc_html_e( 'WhatsApp Rate', 'mobile-pasal' ); ?></span>
										</a>
										<a class="btn btn-outline btn-sm btn-product-details" href="<?php echo esc_url( $permalink ); ?>" title="<?php esc_attr_e( 'View Details & Specs', 'mobile-pasal' ); ?>">
											<span><?php esc_html_e( 'Specs', 'mobile-pasal' ); ?></span>
											<svg viewBox="0 0 24 24" width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="9 18 15 12 9 6"></polyline></svg>
										</a>
									</div>
								</div>
							</article>
						<?php endwhile;
						wp_reset_postdata();
					else :
						// Fallback default handsets
						$default_handsets = mp_get_default_handsets_data();
						foreach ( $default_handsets as $h ) :
							$brand_slug    = strtolower( $h['brand'] );
							$cat_slug      = ! empty( $h['category'] ) ? strtolower( $h['category'] ) : 'smartphones';
							$numeric_price = (int) preg_replace( '/[^0-9]/', '', $h['price'] );
							?>
							<article class="product-card" data-index="<?php echo esc_attr( $card_idx++ ); ?>" data-brand="<?php echo esc_attr( $brand_slug ); ?>" data-category="<?php echo esc_attr( $cat_slug ); ?>" data-price-numeric="<?php echo esc_attr( $numeric_price ); ?>" data-title="<?php echo esc_attr( strtolower( $h['title'] ) ); ?>">
								<div class="product-card-topbar">
									<span class="product-badge-pill"><?php echo esc_html( $h['badge'] ); ?></span>
									<span class="product-category-chip"><?php echo esc_html( $h['brand'] ); ?></span>
								</div>
								<div class="product-img-wrap">
									<img src="<?php echo esc_url( mp_asset_img( $h['image'] ) ); ?>" alt="<?php echo esc_attr( $h['title'] ); ?>" loading="lazy">
								</div>
								<div class="product-body">
									<div class="product-meta-row">
										<span class="product-brand-kicker"><?php echo esc_html( $h['brand'] ); ?></span>
										<span class="product-nta-tag">
											<svg viewBox="0 0 24 24" width="11" height="11" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
											<span>MDMS &amp; VAT</span>
										</span>
									</div>
									<h4 class="product-title"><?php echo esc_html( $h['title'] ); ?></h4>
									<div class="product-spec-chips">
										<?php if ( ! empty( $h['screen'] ) ) : ?>
											<span class="spec-chip">
												<svg viewBox="0 0 24 24" width="11" height="11" fill="none" stroke="currentColor" stroke-width="2"><rect x="5" y="2" width="14" height="20" rx="2"></rect></svg>
												<span><?php echo esc_html( wp_trim_words( $h['screen'], 4, '' ) ); ?></span>
											</span>
										<?php endif; ?>
										<?php if ( ! empty( $h['chip'] ) ) : ?>
											<span class="spec-chip">
												<svg viewBox="0 0 24 24" width="11" height="11" fill="none" stroke="currentColor" stroke-width="2"><rect x="4" y="4" width="16" height="16" rx="2"></rect><rect x="9" y="9" width="6" height="6"></rect></svg>
												<span><?php echo esc_html( wp_trim_words( $h['chip'], 3, '' ) ); ?></span>
											</span>
										<?php endif; ?>
										<?php if ( ! empty( $h['storage'] ) ) : ?>
											<span class="spec-chip">
												<svg viewBox="0 0 24 24" width="11" height="11" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path></svg>
												<span><?php echo esc_html( $h['storage'] ); ?></span>
											</span>
										<?php endif; ?>
									</div>
									<div class="product-pricing-dock">
										<div class="price-val-wrap">
											<span class="price-current"><?php echo esc_html( $h['price'] ); ?></span>
											<?php if ( ! empty( $h['old_price'] ) ) : ?>
												<span class="price-original"><?php echo esc_html( $h['old_price'] ); ?></span>
											<?php endif; ?>
										</div>
										<span class="price-tax-paid"><?php esc_html_e( 'Nepal VAT Bill', 'mobile-pasal' ); ?></span>
									</div>
									<div class="product-action-dock" style="grid-template-columns: 1fr;">
										<a class="btn btn-whatsapp btn-sm btn-product-action" href="<?php echo esc_url( mp_get_whatsapp_link( 'Namaste Ali Mobile, ma ' . $h['title'] . ' ko aaja ko rate ra counter stock bujhna chahanchhu' ) ); ?>" target="_blank" rel="noopener">
											<svg viewBox="0 0 24 24" width="14" height="14" fill="currentColor"><path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0 0 12.04 2m.01 1.67c2.2 0 4.26.86 5.82 2.42a8.225 8.225 0 0 1 2.41 5.83c0 4.54-3.7 8.24-8.24 8.24-1.48 0-2.93-.4-4.2-1.15l-.3-.18-3.12.82.83-3.04-.2-.31a8.196 8.196 0 0 1-1.26-4.38c0-4.54 3.7-8.24 8.24-8.24m4.52 11.66c-.25-.13-1.47-.72-1.7-.81-.23-.08-.39-.13-.56.13-.17.25-.64.81-.79.97-.14.17-.29.19-.54.06-.25-.13-1.05-.39-2-1.23-.74-.66-1.24-1.47-1.39-1.72-.14-.25-.02-.39.11-.51.11-.11.25-.29.37-.43.13-.14.17-.25.25-.41.08-.17.04-.31-.02-.44-.06-.13-.56-1.34-.76-1.84-.2-.49-.4-.42-.56-.43h-.47c-.17 0-.44.06-.67.31-.23.25-.87.85-.87 2.08 0 1.23.9 2.41 1.02 2.58.13.17 1.76 2.69 4.27 3.77.6.26 1.07.41 1.43.53.6.19 1.15.16 1.58.1.48-.07 1.47-.6 1.68-1.18.21-.58.21-1.07.15-1.18-.06-.11-.23-.17-.48-.29z"/></svg>
											<span><?php esc_html_e( 'WhatsApp Rate', 'mobile-pasal' ); ?></span>
										</a>
									</div>
								</div>
							</article>
						<?php endforeach;
					endif;
					?>
				</div>

				<!-- Empty Results Notice -->
				<div id="catalog-empty-notice" class="catalog-empty-notice" aria-live="polite">
					<svg viewBox="0 0 24 24" width="44" height="44" fill="none" stroke="currentColor" stroke-width="1.8"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
					<h3><?php echo esc_html( mp_opt( 'catalog_empty_title', 'No matching handsets found in this filter' ) ); ?></h3>
					<p><?php echo esc_html( mp_opt( 'catalog_empty_desc', 'We order rare or flagship variants directly from authorized Nepal distributors. Send your model name on WhatsApp for quick counter availability.' ) ); ?></p>
					<a class="btn btn-whatsapp" href="<?php echo esc_url( mp_get_whatsapp_link() ); ?>" target="_blank" rel="noopener">
						<span><?php echo esc_html( mp_opt( 'catalog_empty_btn_text', 'Inquire Directly on WhatsApp' ) ); ?></span>
					</a>
				</div>

				<!-- Client & Server Pagination Container -->
				<div class="shop-pagination-wrapper">
					<div class="shop-pagination" id="shop-pagination-controls">
						<!-- Dynamically populated page buttons -->
					</div>
					<div class="shop-pagination-info" id="shop-pagination-info">
						<!-- Showing page 1 of X -->
					</div>
				</div>

			</div>
		</div>

	</div>
</section>

<!-- Apple Fix Precision Lab Showcase Banner -->
<section class="apple-fix-showcase-section">
	<div class="wrap">
		<div class="apple-fix-banner-grid fade-up">
			<div class="af-media-col">
				<img src="<?php echo esc_url( $lab_img ); ?>" alt="<?php echo esc_attr( mp_opt( 'lab_title', 'Gulariya\'s Premier Precision Apple Fix Lab' ) ); ?>">
			</div>
			<div class="af-text-col">
				<div class="af-badge">
					<svg viewBox="0 0 24 24" width="14" height="14" fill="currentColor"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/></svg>
					<span><?php echo esc_html( mp_opt( 'lab_badge', 'Apple Fix Specialist • Gulariya Counter' ) ); ?></span>
				</div>
				<h2><?php echo esc_html( mp_opt( 'lab_title', 'Gulariya\'s Premier Precision Apple Fix Lab' ) ); ?></h2>
				<p><?php echo esc_html( mp_opt( 'lab_desc', 'We do not forward your phone to Nepalgunj or Kathmandu. Our on-site workstation handles display lamination, genuine battery replacement, ultrasonic board cleaning, and IC diagnostics right in front of you.' ) ); ?></p>

				<div class="af-features-list">
					<div class="af-feature-item">
						<div class="af-f-icon">
							<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
						</div>
						<div>
							<strong><?php echo esc_html( mp_opt( 'lab_feat1_title', '30-Minute Screen Replacement' ) ); ?></strong>
							<p><?php echo esc_html( mp_opt( 'lab_feat1_desc', 'Fast OLED and glass restoration with TrueTone & 3D touch programming.' ) ); ?></p>
						</div>
					</div>

					<div class="af-feature-item">
						<div class="af-f-icon">
							<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.2"><rect x="2" y="7" width="16" height="10" rx="2" ry="2"></rect><line x1="22" y1="11" x2="22" y2="13"></line></svg>
						</div>
						<div>
							<strong><?php echo esc_html( mp_opt( 'lab_feat2_title', 'Battery Health Calibration' ) ); ?></strong>
							<p><?php echo esc_html( mp_opt( 'lab_feat2_desc', 'Certified battery replacements that restore peak 100% capacity and battery health cycle.' ) ); ?></p>
						</div>
					</div>

					<div class="af-feature-item">
						<div class="af-f-icon">
							<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
						</div>
						<div>
							<strong><?php echo esc_html( mp_opt( 'lab_feat3_title', 'In-Front-Of-You Transparency' ) ); ?></strong>
							<p><?php echo esc_html( mp_opt( 'lab_feat3_desc', 'Watch your repair live across our counter. Complete privacy protection for photos & accounts.' ) ); ?></p>
						</div>
					</div>
				</div>

				<div class="af-metrics-strip">
					<div class="af-metric-box">
						<span class="af-m-num"><?php echo esc_html( mp_opt( 'lab_stat1_num', '30m' ) ); ?></span>
						<span class="af-m-label"><?php echo esc_html( mp_opt( 'lab_stat1_label', 'Display Turnaround' ) ); ?></span>
					</div>
					<div class="af-metric-box">
						<span class="af-m-num"><?php echo esc_html( mp_opt( 'lab_stat2_num', '100%' ) ); ?></span>
						<span class="af-m-label"><?php echo esc_html( mp_opt( 'lab_stat2_label', 'Battery Health' ) ); ?></span>
					</div>
					<div class="af-metric-box">
						<span class="af-m-num"><?php echo esc_html( mp_opt( 'lab_stat3_num', '90d' ) ); ?></span>
						<span class="af-m-label"><?php echo esc_html( mp_opt( 'lab_stat3_label', 'Service Warranty' ) ); ?></span>
					</div>
				</div>

				<div class="af-cta-row">
					<a class="btn btn-whatsapp" href="<?php echo esc_url( mp_get_whatsapp_link( 'Namaste Apple Fix, mero iPhone check garauna chahanchhu' ) ); ?>" target="_blank" rel="noopener">
						<svg viewBox="0 0 24 24" width="16" height="16" fill="currentColor"><path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0 0 12.04 2"/></svg>
						<span><?php echo esc_html( mp_opt( 'lab_btn1_text', 'Consult Our Technician' ) ); ?></span>
					</a>
					<a class="btn btn-secondary" href="tel:+<?php echo esc_attr( mp_clean_phone( mp_opt( 'contact_phone', '9804530786' ) ) ); ?>">
						<span><?php printf( esc_html__( '%s (%s)', 'mobile-pasal' ), esc_html( mp_opt( 'lab_btn2_prefix', 'Call Counter' ) ), esc_html( mp_opt( 'contact_phone', '+977 9804530786' ) ) ); ?></span>
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
				<span class="sec-kicker"><?php echo esc_html( mp_opt( 'services_kicker', 'Diagnostics & Solutions' ) ); ?></span>
				<h2><?php echo esc_html( mp_opt( 'services_title', 'Complete Counter Repair Services' ) ); ?></h2>
				<p><?php echo esc_html( mp_opt( 'services_subtitle', 'From Apple iPhone to Samsung Galaxy and Xiaomi devices, all repairs are performed with original-grade parts and live customer inspection.' ) ); ?></p>
			</div>
			<a class="view-all-link" href="<?php echo esc_url( mp_get_whatsapp_link( 'Namaste Ali Mobile & Apple Fix, repair estimate chahiyo' ) ); ?>" target="_blank" rel="noopener">
				<span><?php echo esc_html( mp_opt( 'services_header_btn_text', 'Ask Instant Quote' ) ); ?></span>
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
						<div class="service-card-top">
							<div class="service-icon-wrap">
								<svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"></path></svg>
							</div>
							<span class="service-badge"><?php echo esc_html( $turn ); ?></span>
						</div>
						<h3><?php the_title(); ?></h3>
						<p><?php echo esc_html( wp_trim_words( get_the_excerpt(), 18 ) ); ?></p>
						<div class="service-card-footer">
							<span class="service-price-tag"><?php echo esc_html( $price_s ); ?></span>
							<a class="service-quote-btn" href="<?php echo esc_url( mp_get_whatsapp_link( 'Namaste Ali Mobile, ' . get_the_title() . ' service quote chahiyo' ) ); ?>" target="_blank" rel="noopener">
								<span><?php echo esc_html( mp_opt( 'service_card_btn_text', 'Inquire Quote' ) ); ?></span>
								<svg viewBox="0 0 24 24" width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.4"><polyline points="9 18 15 12 9 6"></polyline></svg>
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
								<svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"></path></svg>
							</div>
							<span class="service-badge"><?php echo esc_html( $r['turnaround'] ); ?></span>
						</div>
						<h3><?php echo esc_html( $r['title'] ); ?></h3>
						<p><?php echo esc_html( $r['excerpt'] ); ?></p>
						<div class="service-card-footer">
							<span class="service-price-tag"><?php echo esc_html( $r['price'] ); ?></span>
							<a class="service-quote-btn" href="<?php echo esc_url( mp_get_whatsapp_link( 'Namaste Ali Mobile, ' . $r['title'] . ' service quote chahiyo' ) ); ?>" target="_blank" rel="noopener">
								<span><?php echo esc_html( mp_opt( 'service_card_btn_text', 'Inquire Quote' ) ); ?></span>
								<svg viewBox="0 0 24 24" width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.4"><polyline points="9 18 15 12 9 6"></polyline></svg>
							</a>
						</div>
					</div>
				<?php endforeach;
			endif;
			?>
		</div>

		<!-- 3-Step Counter Workflow Timeline -->
		<div class="sec-head sec-head-center fade-up" style="margin-top: 56px; margin-bottom: 28px;">
			<span class="sec-kicker"><?php echo esc_html( mp_opt( 'workflow_kicker', 'Transparent Workflow' ) ); ?></span>
			<h2><?php echo esc_html( mp_opt( 'workflow_title', '3-Step Counter Service in Gulariya' ) ); ?></h2>
			<p><?php echo esc_html( mp_opt( 'workflow_subtitle', 'Simple, reliable, and completely open process from diagnosis to handover.' ) ); ?></p>
		</div>

		<div class="steps-flow-grid fade-up">
			<div class="flow-step-card">
				<div class="flow-num-badge">1</div>
				<h3><?php echo esc_html( mp_opt( 'workflow_step1_title', 'Free Counter Diagnostic' ) ); ?></h3>
				<p><?php echo esc_html( mp_opt( 'workflow_step1_desc', 'Bring your phone to Ji. Pra. Ka. Chowk. Our technician inspects hardware symptoms in 5 minutes with exact repair estimate.' ) ); ?></p>
			</div>
			<div class="flow-step-card">
				<div class="flow-num-badge">2</div>
				<h3><?php echo esc_html( mp_opt( 'workflow_step2_title', 'In-Front-Of-You Precision Fix' ) ); ?></h3>
				<p><?php echo esc_html( mp_opt( 'workflow_step2_desc', 'Watch your repair live across our counter. Genuine parts installed with precision tools, heat beds, and ESD mats.' ) ); ?></p>
			</div>
			<div class="flow-step-card">
				<div class="flow-num-badge">3</div>
				<h3><?php echo esc_html( mp_opt( 'workflow_step3_title', 'Testing & Handover' ) ); ?></h3>
				<p><?php echo esc_html( mp_opt( 'workflow_step3_desc', 'Multi-point check for touch response, cameras, cellular signal, and battery. Handover with testing warranty.' ) ); ?></p>
			</div>
		</div>
	</div>
</section>

<!-- Phone First-Aid & Care Guides -->
<section class="guides-section">
	<div class="wrap">
		<div class="sec-head fade-up">
			<div>
				<span class="sec-kicker"><?php echo esc_html( mp_opt( 'guides_kicker', 'Technician Advice' ) ); ?></span>
				<h2><?php echo esc_html( mp_opt( 'guides_title', 'Phone First-Aid & Care Guides' ) ); ?></h2>
				<p><?php echo esc_html( mp_opt( 'guides_subtitle', 'Practical guidance from our certified technicians on protecting your smartphone before bringing it to our counter.' ) ); ?></p>
			</div>
			<a class="view-all-link" href="<?php echo esc_url( mp_get_whatsapp_link( 'Namaste, mero phone ma problem chha advice chahiyo' ) ); ?>" target="_blank" rel="noopener">
				<span><?php echo esc_html( mp_opt( 'guides_header_btn_text', 'Ask Technician Advice' ) ); ?></span>
				<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.2"><polyline points="9 18 15 12 9 6"></polyline></svg>
			</a>
		</div>

		<div class="guides-grid fade-up">
			<div class="guide-card">
				<div class="guide-thumb-wrap">
					<img src="<?php echo esc_url( $guide1_img ); ?>" alt="<?php echo esc_attr( mp_opt( 'guide1_title', 'Cracked Screen First-Aid' ) ); ?>">
					<span class="guide-tag"><?php echo esc_html( mp_opt( 'guide1_tag', 'Display Emergency' ) ); ?></span>
				</div>
				<div class="guide-card-body">
					<h3><?php echo esc_html( mp_opt( 'guide1_title', 'Cracked Screen First-Aid' ) ); ?></h3>
					<p><?php echo esc_html( mp_opt( 'guide1_desc', 'Do not apply hard pressure on glass cracks to avoid bleeding the underlying OLED panel. Tape over cracks with clear tape to prevent finger cuts, and back up your data.' ) ); ?></p>
					<a class="guide-action-link" href="<?php echo esc_url( mp_opt( 'guide1_btn_url', '#services' ) ); ?>">
						<span><?php echo esc_html( mp_opt( 'guide1_btn_text', 'Book Screen Replacement' ) ); ?></span>
						<svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"></polyline></svg>
					</a>
				</div>
			</div>

			<div class="guide-card">
				<div class="guide-thumb-wrap">
					<img src="<?php echo esc_url( $guide2_img ); ?>" alt="<?php echo esc_attr( mp_opt( 'guide2_title', 'Phone Dropped in Water?' ) ); ?>">
					<span class="guide-tag"><?php echo esc_html( mp_opt( 'guide2_tag', 'Liquid Protocol' ) ); ?></span>
				</div>
				<div class="guide-card-body">
					<h3><?php echo esc_html( mp_opt( 'guide2_title', 'Phone Dropped in Water?' ) ); ?></h3>
					<p><?php echo esc_html( mp_opt( 'guide2_desc', 'Turn off device immediately. Never plug in a charging cable, and avoid shaking or using a hair dryer. Bring it to our counter within 2 hours for ultrasonic de-oxidation.' ) ); ?></p>
					<a class="guide-action-link" href="<?php echo esc_url( mp_opt( 'guide2_btn_url', mp_get_whatsapp_link( 'Emergency: Mero phone pani ma paryo, Gulariya counter ma audai chhu' ) ) ); ?>" target="_blank" rel="noopener">
						<span><?php echo esc_html( mp_opt( 'guide2_btn_text', 'Contact Emergency Tech' ) ); ?></span>
						<svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"></polyline></svg>
					</a>
				</div>
			</div>

			<div class="guide-card">
				<div class="guide-thumb-wrap">
					<img src="<?php echo esc_url( $guide3_img ); ?>" alt="<?php echo esc_attr( mp_opt( 'guide3_title', 'Maximizing Battery Longevity' ) ); ?>">
					<span class="guide-tag"><?php echo esc_html( mp_opt( 'guide3_tag', 'Battery Health' ) ); ?></span>
				</div>
				<div class="guide-card-body">
					<h3><?php echo esc_html( mp_opt( 'guide3_title', 'Maximizing Battery Longevity' ) ); ?></h3>
					<p><?php echo esc_html( mp_opt( 'guide3_desc', 'Avoid letting your battery drop below 15% frequently. Avoid playing heavy games while fast charging, and use only certified 20W/30W adapters to protect internal battery chemistry.' ) ); ?></p>
					<a class="guide-action-link" href="<?php echo esc_url( mp_opt( 'guide3_btn_url', '#services' ) ); ?>">
						<span><?php echo esc_html( mp_opt( 'guide3_btn_text', 'Check Battery Health' ) ); ?></span>
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
				<span class="sec-kicker"><?php echo esc_html( mp_opt( 'reviews_kicker', 'Verified Local Customers' ) ); ?></span>
				<h2><?php echo esc_html( mp_opt( 'reviews_title', 'What Gulariya Residents Say' ) ); ?></h2>
				<p><?php echo esc_html( mp_opt( 'reviews_subtitle', 'Real feedback from local smartphone buyers and repair customers across Bardiya.' ) ); ?></p>
			</div>
			<div class="overall-rating-badge">
				<svg viewBox="0 0 24 24" width="16" height="16" fill="#f59e0b"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
				<strong><?php echo esc_html( mp_opt( 'reviews_rating_score', '4.9 / 5.0' ) ); ?></strong>
				<span><?php echo esc_html( mp_opt( 'reviews_rating_count_text', '(250+ Local Customer Reviews)' ) ); ?></span>
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
				<span class="sec-kicker"><?php echo esc_html( mp_opt( 'visit_kicker', 'Walk In Anytime' ) ); ?></span>
				<h2><?php echo esc_html( mp_opt( 'visit_title', 'Visit Us in Gulariya' ) ); ?></h2>
				<p><?php echo esc_html( mp_opt( 'visit_desc', 'Centrally located at Ji. Pra. Ka. Chowk. Walk in for brand-new phone purchases, immediate repair diagnostic, screen protectors, or honest technical advice.' ) ); ?></p>

				<div class="visit-details-list">
					<div class="visit-detail-item">
						<div class="visit-detail-icon">
							<svg viewBox="0 0 24 24" width="18" height="18" fill="currentColor"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5a2.5 2.5 0 0 1 0-5 2.5 2.5 0 0 1 0 5z"/></svg>
						</div>
						<div>
							<strong><?php echo esc_html( mp_opt( 'store_name', 'Ali Mobile Center & Apple Fix' ) ); ?></strong>
							<p><?php echo esc_html( mp_opt( 'contact_address', 'Gulariya-06, Ji. Pra. Ka. Chowk, Bardiya, Nepal' ) ); ?></p>
						</div>
					</div>

					<div class="visit-detail-item">
						<div class="visit-detail-icon">
							<svg viewBox="0 0 24 24" width="18" height="18" fill="currentColor"><path d="M20.01 15.38c-1.23 0-2.42-.2-3.53-.56a.977.977 0 0 0-1.01.24l-1.57 1.97c-2.83-1.35-5.48-3.9-6.89-6.83l1.95-1.66c.27-.28.35-.67.24-1.02-.37-1.11-.56-2.3-.56-3.53 0-.54-.45-.99-.99-.99H4.19C3.65 3 3 3.24 3 3.99 3 13.28 10.73 21 20.01 21c.71 0 .99-.63.99-1.18v-3.45c0-.54-.45-.99-.99-.99z"/></svg>
						</div>
						<div>
							<strong><?php printf( esc_html__( 'Helpline & WhatsApp: %s', 'mobile-pasal' ), esc_html( mp_opt( 'contact_phone', '+977 9804530786' ) ) ); ?></strong>
							<p><?php echo esc_html( mp_opt( 'visit_phone_sub', 'Direct counter support available 7 days a week' ) ); ?></p>
						</div>
					</div>

					<div class="visit-detail-item">
						<div class="visit-detail-icon">
							<svg viewBox="0 0 24 24" width="18" height="18" fill="currentColor"><path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67z"/></svg>
						</div>
						<div>
							<strong><?php echo esc_html( mp_opt( 'visit_hours_title', 'Counter Hours' ) ); ?></strong>
							<p><?php echo esc_html( mp_opt( 'contact_hours', 'Sun–Fri: 9:00 AM – 8:00 PM | Sat: Open' ) ); ?></p>
						</div>
					</div>
				</div>

				<div class="visit-actions-row">
					<a class="btn btn-primary" href="tel:+<?php echo esc_attr( mp_clean_phone( mp_opt( 'contact_phone', '9804530786' ) ) ); ?>">
						<svg viewBox="0 0 24 24" width="16" height="16" fill="currentColor"><path d="M20.01 15.38c-1.23 0-2.42-.2-3.53-.56a.977.977 0 0 0-1.01.24l-1.57 1.97c-2.83-1.35-5.48-3.9-6.89-6.83l1.95-1.66c.27-.28.35-.67.24-1.02-.37-1.11-.56-2.3-.56-3.53 0-.54-.45-.99-.99-.99H4.19C3.65 3 3 3.24 3 3.99 3 13.28 10.73 21 20.01 21c.71 0 .99-.63.99-1.18v-3.45c0-.54-.45-.99-.99-.99z"/></svg>
						<span><?php echo esc_html( mp_opt( 'visit_btn1_text', 'Call Store Now' ) ); ?></span>
					</a>
					<a class="btn btn-whatsapp" href="<?php echo esc_url( mp_get_whatsapp_link( 'Namaste Ali Mobile, tapaiharuko shop ma auna chahanchhu' ) ); ?>" target="_blank" rel="noopener">
						<svg viewBox="0 0 24 24" width="16" height="16" fill="currentColor"><path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0 0 12.04 2"/></svg>
						<span><?php echo esc_html( mp_opt( 'visit_btn2_text', 'WhatsApp Us' ) ); ?></span>
					</a>
					<a class="btn btn-secondary" href="<?php echo esc_url( mp_opt( 'google_maps_link', 'https://www.google.com/maps/search/?api=1&query=Ali+Mobile+Center+Gulariya+Bardiya' ) ); ?>" target="_blank" rel="noopener">
						<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><polygon points="3 11 22 2 13 21 11 13 3 11"></polygon></svg>
						<span><?php echo esc_html( mp_opt( 'visit_btn3_text', 'Directions' ) ); ?></span>
					</a>
				</div>
			</div>

			<!-- Google Maps -->
			<div class="visit-map-container">
				<iframe
					src="<?php echo esc_url( mp_opt( 'visit_map_url', 'https://maps.google.com/maps?q=Gulariya+06+Bardiya+Nepal&t=&z=15&ie=UTF8&iwloc=&output=embed' ) ); ?>"
					loading="lazy"
					referrerpolicy="no-referrer-when-downgrade"
					title="<?php echo esc_attr( mp_opt( 'store_name', 'Ali Mobile Center & Apple Fix' ) . ' Location on Map' ); ?>">
				</iframe>
			</div>
		</div>
	</div>
</section>

</main>

<?php
get_footer();
