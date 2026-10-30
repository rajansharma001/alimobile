<?php
/**
 * The template for displaying the front page / home page
 *
 * "Studio Counter" v3.5 — Bespoke creative architecture where every single
 * section features its own layout paradigm and interactive hardware/lab widget:
 *  01. Hero: Editorial Split + Live Bench Telemetry + 3D Tilt Polaroid Deck
 *  02. Departments: 5-Panel Expanding Accordion + Interactive Trade-In Calculator
 *  03. Repair Desk: 3-Step Picker + Live SVG Phone X-Ray Scanner + Thermal Receipt
 *  04. Brands: Interactive Authenticity Passport Dock + Dual-Direction Marquee
 *  05. Flagship Stage: Titanium Colorway & Storage Configurator + Radar Hotspots
 *  06. Showroom: Sticky Command Sidebar + Grid/Table Switcher + Live Compare Tray
 *  07. Apple Fix Lab: Interactive 10x/45x/Thermal Microscope Lens + Oscilloscope
 *  08. Repair Menu: Split Index Board + Interactive Part-Grade Switcher + Track
 *  09. Care Guides: Interactive Water-Damage Survival Meter + Battery Health Slider
 *  10. Reviews: 5-Star Histogram Scoreboard + Verified Job Dossier Quote Stage
 *  11. Visit Hub & Final: Live Nepal Clock Map Card + Copyable VIP Counter Voucher
 *
 * All copy remains editable from Theme Options via mp_opt().
 * Styles: assets/css/home.css | Interactions: assets/js/home.js (+ main.js hooks).
 *
 * @package Mobile_Pasal
 * @version 3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$img_dir     = MP_THEME_URI . '/assets/images/';
$phone_raw   = mp_opt( 'contact_phone', '9804530786' );
$phone_clean = mp_clean_phone( $phone_raw );
$maps_link   = mp_opt( 'google_maps_link', 'https://www.google.com/maps/search/?api=1&query=Ali+Mobile+Center+Gulariya+Bardiya' );

/* -------------------------------------------------------------------------
 * Hero slides (Theme Options: Hero Slider tab)
 * ---------------------------------------------------------------------- */
$hx_slides = array(
	array(
		'badge' => mp_opt( 'hero_slide1_badge', '100% Genuine Sealed Stock' ),
		'title' => mp_opt( 'hero_slide1_title', 'Next-gen flagships,' ),
		'hl'    => mp_opt( 'hero_slide1_title_highlight', 'sealed & VAT billed.' ),
		'desc'  => mp_opt( 'hero_slide1_desc', 'Discover the latest iPhone 16 Series, Samsung Galaxy S24 Ultra, and Google Pixel 9. Official NTA-approved stock, verified IMEI bill, free walk-in data migration, and instant WhatsApp counter quotes.' ),
		'btn1'  => mp_opt( 'hero_slide1_btn1_text', 'Explore Handsets' ),
		'url1'  => '#catalog',
		'btn2'  => mp_opt( 'hero_slide1_btn2_text', "Ask Today's Price" ),
		'url2'  => mp_get_whatsapp_link( 'Namaste Ali Mobile, aaja ko latest phone price list dinus' ),
		'img'   => mp_opt( 'hero_slide1_image', '' ) ?: $img_dir . 'hero-iphone-hand.jpg',
		'label' => __( 'Flagship phones', 'mobile-pasal' ),
		'meta'  => 'MDMS VERIFIED // SEALED BOX',
	),
	array(
		'badge' => mp_opt( 'hero_slide2_badge', 'Certified Apple Fix Cleanroom Lab' ),
		'title' => mp_opt( 'hero_slide2_title', 'Repaired in front of you,' ),
		'hl'    => mp_opt( 'hero_slide2_title_highlight', 'not couriered away.' ),
		'desc'  => mp_opt( 'hero_slide2_desc', 'Screen broken, battery drained, or phone dropped in water? We repair right in front of you at our on-site workstation. Original-grade parts, TrueTone display calibration, and honest diagnostics with zero hidden costs.' ),
		'btn1'  => mp_opt( 'hero_slide2_btn1_text', 'Start Repair Estimate' ),
		'url1'  => '#repair-builder',
		'btn2'  => mp_opt( 'hero_slide2_btn2_text', 'Call Technician' ),
		'url2'  => 'tel:+' . $phone_clean,
		'img'   => mp_opt( 'hero_slide2_image', '' ) ?: $img_dir . 'apple-fix-bench.jpg',
		'label' => __( 'Apple Fix lab', 'mobile-pasal' ),
		'meta'  => 'ESD BENCH // 45X MICROSCOPE',
	),
	array(
		'badge' => mp_opt( 'hero_slide3_badge', '100% Original Power & Protection' ),
		'title' => mp_opt( 'hero_slide3_title', 'Original audio, chargers' ),
		'hl'    => mp_opt( 'hero_slide3_title_highlight', '& everyday armor.' ),
		'desc'  => mp_opt( 'hero_slide3_desc', 'Power and protect your device with authentic Apple AirPods, Galaxy Buds, 20W/30W/65W PD Fast Chargers, 9H tempered glass, MagSafe protective armor, and instant eSewa merchant top-up services.' ),
		'btn1'  => mp_opt( 'hero_slide3_btn1_text', 'Browse Accessories' ),
		'url1'  => '#categories',
		'btn2'  => mp_opt( 'hero_slide3_btn2_text', 'Order on WhatsApp' ),
		'url2'  => mp_get_whatsapp_link( 'Namaste Ali Mobile, original accessories ko barema bujhna chahanchhu' ),
		'img'   => mp_opt( 'hero_slide3_image', '' ) ?: $img_dir . 'shop-accessories-shelf.jpg',
		'label' => __( 'Genuine gear', 'mobile-pasal' ),
		'meta'  => 'GAN PD POWER // 9H ARMOR',
	),
);

$hx_ticker = array(
	__( 'NTA-approved handsets', 'mobile-pasal' ),
	__( 'Official VAT bill', 'mobile-pasal' ),
	__( 'Free data transfer', 'mobile-pasal' ),
	__( 'Same-day screen repair', 'mobile-pasal' ),
	__( 'Genuine batteries', 'mobile-pasal' ),
	__( 'eSewa & Fonepay accepted', 'mobile-pasal' ),
	__( 'EMI available', 'mobile-pasal' ),
	__( 'Original chargers & audio', 'mobile-pasal' ),
);

/* -------------------------------------------------------------------------
 * Repair services (CPT: repair_service, fallback: sample data)
 * ---------------------------------------------------------------------- */
$hx_services    = array();
$services_query = new WP_Query( array(
	'post_type'      => 'repair_service',
	'posts_per_page' => 6,
	'post_status'    => 'publish',
) );
if ( $services_query->have_posts() ) {
	while ( $services_query->have_posts() ) {
		$services_query->the_post();
		$sid           = get_the_ID();
		$hx_services[] = array(
			'title'      => get_the_title(),
			'excerpt'    => wp_trim_words( get_the_excerpt(), 32 ),
			'turnaround' => get_post_meta( $sid, '_mp_service_turnaround', true ) ?: '30-45 Mins',
			'price'      => get_post_meta( $sid, '_mp_service_price', true ) ?: __( 'Quoted at counter', 'mobile-pasal' ),
			'warranty'   => get_post_meta( $sid, '_mp_service_warranty', true ) ?: __( '90 Days Testing Warranty', 'mobile-pasal' ),
			'badge'      => get_post_meta( $sid, '_mp_service_badge', true ) ?: __( 'Original-grade parts', 'mobile-pasal' ),
			'models'     => get_post_meta( $sid, '_mp_service_models', true ),
		);
	}
	wp_reset_postdata();
} else {
	foreach ( mp_get_default_repair_services_data() as $r ) {
		$hx_services[] = array(
			'title'      => $r['title'],
			'excerpt'    => $r['excerpt'],
			'turnaround' => $r['turnaround'],
			'price'      => $r['price'],
			'warranty'   => $r['warranty'],
			'badge'      => $r['badge'],
			'models'     => isset( $r['models'] ) ? $r['models'] : '',
		);
	}
}
$hx_services = array_slice( $hx_services, 0, 6 );

/* -------------------------------------------------------------------------
 * Handsets (CPT: handset, fallback: sample data)
 * ---------------------------------------------------------------------- */
$hx_products   = array();
$handset_query = new WP_Query( array(
	'post_type'      => 'handset',
	'posts_per_page' => 12,
	'post_status'    => 'publish',
) );
if ( $handset_query->have_posts() ) {
	while ( $handset_query->have_posts() ) {
		$handset_query->the_post();
		$pid         = get_the_ID();
		$brand_terms = get_the_terms( $pid, 'device_brand' );
		$specs       = get_post_meta( $pid, '_mp_spec_screen', true );
		$hx_products[] = array(
			'title'      => get_the_title(),
			'brand_slug' => ( ! empty( $brand_terms ) && ! is_wp_error( $brand_terms ) ) ? strtolower( $brand_terms[0]->slug ) : 'all',
			'brand_name' => ( ! empty( $brand_terms ) && ! is_wp_error( $brand_terms ) ) ? $brand_terms[0]->name : __( 'Handset', 'mobile-pasal' ),
			'badge'      => get_post_meta( $pid, '_mp_badge', true ) ?: __( 'NTA approved', 'mobile-pasal' ),
			'price'      => get_post_meta( $pid, '_mp_price', true ),
			'old_price'  => get_post_meta( $pid, '_mp_old_price', true ),
			'rating'     => get_post_meta( $pid, '_mp_rating', true ) ?: '4.9',
			'reviews'    => get_post_meta( $pid, '_mp_reviews_count', true ) ?: '42',
			'img'        => mp_get_handset_img_url( $pid ),
			'specs'      => $specs ? $specs : wp_trim_words( get_the_excerpt(), 14 ),
		);
	}
	wp_reset_postdata();
} else {
	foreach ( mp_get_default_handsets_data() as $h ) {
		$hx_products[] = array(
			'title'      => $h['title'],
			'brand_slug' => strtolower( $h['brand'] ),
			'brand_name' => $h['brand'],
			'badge'      => $h['badge'],
			'price'      => $h['price'],
			'old_price'  => $h['old_price'],
			'rating'     => $h['rating'],
			'reviews'    => $h['reviews'],
			'img'        => mp_asset_img( $h['image'] ),
			'specs'      => $h['screen'],
		);
	}
}

/* -------------------------------------------------------------------------
 * Reviews (CPT: mp_review, fallback: sample data)
 * ---------------------------------------------------------------------- */
$hx_reviews    = array();
$reviews_query = new WP_Query( array(
	'post_type'      => 'mp_review',
	'posts_per_page' => 6,
	'post_status'    => 'publish',
) );
if ( $reviews_query->have_posts() ) {
	while ( $reviews_query->have_posts() ) {
		$reviews_query->the_post();
		$rid          = get_the_ID();
		$hx_reviews[] = array(
			'name'     => get_the_title(),
			'location' => get_post_meta( $rid, '_mp_review_location', true ) ?: 'Gulariya, Bardiya',
			'product'  => get_post_meta( $rid, '_mp_review_product', true ) ?: 'Verified Counter Client',
			'content'  => wp_strip_all_tags( get_the_content() ),
		);
	}
	wp_reset_postdata();
} else {
	foreach ( mp_get_default_testimonials_data() as $t ) {
		$hx_reviews[] = array(
			'name'     => $t['name'],
			'location' => $t['location'],
			'product'  => $t['product'],
			'content'  => $t['content'],
		);
	}
}

$wa_icon    = '<svg viewBox="0 0 24 24" width="18" height="18" fill="currentColor" aria-hidden="true"><path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0 0 12.04 2m.01 1.67c2.2 0 4.26.86 5.82 2.42a8.225 8.225 0 0 1 2.41 5.83c0 4.54-3.7 8.23-8.24 8.23-1.48 0-2.93-.39-4.19-1.15l-.3-.17-3.12.82.83-3.04-.2-.32a8.188 8.188 0 0 1-1.26-4.38c.01-4.54 3.7-8.24 8.25-8.24M8.53 7.33c-.16 0-.43.06-.66.31-.22.25-.87.86-.87 2.07 0 1.22.89 2.39 1 2.56.14.17 1.76 2.67 4.25 3.73.59.27 1.05.42 1.41.53.59.19 1.13.16 1.56.1.48-.07 1.46-.6 1.67-1.18.21-.58.21-1.07.15-1.18-.07-.1-.23-.16-.48-.27-.25-.14-1.47-.74-1.69-.82-.23-.08-.37-.12-.56.12-.16.25-.64.81-.78.97-.15.17-.29.19-.53.07-.26-.13-1.06-.39-2-1.23-.74-.66-1.23-1.47-1.38-1.72-.12-.24-.01-.39.11-.5.11-.11.27-.29.37-.44.13-.14.17-.25.25-.41.08-.17.04-.31-.02-.43-.06-.11-.56-1.35-.77-1.84-.2-.48-.4-.42-.56-.43-.14 0-.3-.01-.47-.01z"/></svg>';
$arrow_icon = '<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6"/></svg>';
?>

<main class="front-page-main hx">

<!-- =========================================================================
     01. HERO: Editorial Split + Live Bench Telemetry + 3D Tilt Polaroid Deck
     ========================================================================= -->
<section class="hx-hero" data-hx-hero aria-label="<?php esc_attr_e( 'Featured', 'mobile-pasal' ); ?>">
	<div class="hx-hero-bg" aria-hidden="true">
		<span class="hx-orb hx-orb-a"></span>
		<span class="hx-orb hx-orb-b"></span>
		<span class="hx-hero-grid"></span>
	</div>

	<div class="wrap hx-hero-inner">
		<div class="hx-hero-copy">
			<div class="hx-hero-top-pills">
				<div class="hx-status" data-hx-open-status data-open="9" data-close="20">
					<span class="hx-status-dot"></span>
					<span class="hx-status-text"><?php esc_html_e( 'Gulariya counter', 'mobile-pasal' ); ?></span>
					<span class="hx-status-sep" aria-hidden="true">/</span>
					<span><?php esc_html_e( 'Ji. Pra. Ka. Chowk', 'mobile-pasal' ); ?></span>
				</div>
				<div class="hx-telemetry" aria-label="<?php esc_attr_e( 'Live counter status', 'mobile-pasal' ); ?>">
					<span class="hx-eq" aria-hidden="true"><i></i><i></i><i></i><i></i></span>
					<span><?php esc_html_e( 'ESD Bench: Ready', 'mobile-pasal' ); ?></span>
				</div>
			</div>

			<div class="hx-copy-stack">
				<?php foreach ( $hx_slides as $i => $s ) : $tag = ( 0 === $i ) ? 'h1' : 'h2'; ?>
					<div class="hx-copy<?php echo 0 === $i ? ' is-active' : ''; ?>" data-hx-copy="<?php echo esc_attr( $i ); ?>"<?php echo 0 === $i ? '' : ' aria-hidden="true"'; ?>>
						<span class="hx-eyebrow"><?php echo esc_html( $s['badge'] ); ?></span>
						<<?php echo $tag; ?> class="hx-display">
							<?php echo esc_html( $s['title'] ); ?>
							<em><?php echo esc_html( $s['hl'] ); ?></em>
						</<?php echo $tag; ?>>
						<p class="hx-lead"><?php echo esc_html( $s['desc'] ); ?></p>
						<div class="hx-cta-row">
							<a class="hx-btn hx-btn-ink" href="<?php echo esc_url( $s['url1'] ); ?>">
								<span><?php echo esc_html( $s['btn1'] ); ?></span><?php echo $arrow_icon; // phpcs:ignore ?>
							</a>
							<a class="hx-btn hx-btn-line" href="<?php echo esc_url( $s['url2'] ); ?>"<?php echo 0 === strpos( $s['url2'], 'tel:' ) ? '' : ' target="_blank" rel="noopener"'; ?>>
								<span><?php echo esc_html( $s['btn2'] ); ?></span>
							</a>
						</div>
					</div>
				<?php endforeach; ?>
			</div>

			<div class="hx-hero-tabs" role="tablist" aria-label="<?php esc_attr_e( 'Featured topics', 'mobile-pasal' ); ?>">
				<?php foreach ( $hx_slides as $i => $s ) : ?>
					<button type="button" class="hx-hero-tab<?php echo 0 === $i ? ' is-active' : ''; ?>" data-hx-go="<?php echo esc_attr( $i ); ?>" role="tab" aria-selected="<?php echo 0 === $i ? 'true' : 'false'; ?>">
						<span class="hx-tab-index"><?php echo esc_html( sprintf( '%02d', $i + 1 ) ); ?></span>
						<span class="hx-tab-label"><?php echo esc_html( $s['label'] ); ?></span>
						<span class="hx-tab-bar"><span></span></span>
					</button>
				<?php endforeach; ?>
			</div>

			<div class="hx-hero-trust">
				<div><strong>10K+</strong><span><?php esc_html_e( 'Devices Restored', 'mobile-pasal' ); ?></span></div>
				<div><strong>100%</strong><span><?php esc_html_e( 'MDMS & VAT Billed', 'mobile-pasal' ); ?></span></div>
				<div><strong>0 NPR</strong><span><?php esc_html_e( 'Counter Diagnosis', 'mobile-pasal' ); ?></span></div>
			</div>
		</div>

		<div class="hx-hero-stage" data-hx-tilt>
			<div class="hx-stage-aura" aria-hidden="true"></div>
			<div class="hx-stage-orbit" aria-hidden="true"></div>
			<div class="hx-hero-seal" aria-hidden="true">
				<svg viewBox="0 0 120 120" width="92" height="92">
					<defs><path id="hxHeroSeal" d="M 60,60 m -44,0 a 44,44 0 1,1 88,0 a 44,44 0 1,1 -88,0"/></defs>
					<text font-size="9.2" font-weight="800" fill="currentColor" letter-spacing="2.4">
						<textPath href="#hxHeroSeal">ALI MOBILE • APPLE FIX LAB • GULARIYA •</textPath>
					</text>
					<circle cx="60" cy="60" r="20" fill="var(--hx-ink)"/>
					<path d="M52 60l5 5 11-11" stroke="var(--hx-lime)" stroke-width="3" fill="none" stroke-linecap="round" stroke-linejoin="round"/>
				</svg>
			</div>
			<div class="hx-deck" data-hx-deck>
				<?php foreach ( $hx_slides as $i => $s ) : ?>
					<figure class="hx-deck-card" data-hx-card="<?php echo esc_attr( $i ); ?>" data-pos="<?php echo esc_attr( $i ); ?>">
						<span class="hx-deck-stamp"><?php echo esc_html( $s['meta'] ); ?></span>
						<img src="<?php echo esc_url( $s['img'] ); ?>" alt="<?php echo esc_attr( $s['label'] ); ?>"<?php echo 0 === $i ? ' fetchpriority="high"' : ' loading="lazy"'; ?>>
						<figcaption>
							<span><?php echo esc_html( sprintf( '%02d', $i + 1 ) ); ?></span>
							<strong><?php echo esc_html( $s['label'] ); ?></strong>
							<em><?php esc_html_e( 'Next view', 'mobile-pasal' ); ?> &rarr;</em>
						</figcaption>
					</figure>
				<?php endforeach; ?>
			</div>

			<button type="button" class="hx-deck-shuffle" data-hx-shuffle aria-label="<?php esc_attr_e( 'Shuffle photo deck', 'mobile-pasal' ); ?>">
				<i class="fa-solid fa-layer-group" aria-hidden="true"></i>
				<span data-hx-deck-count>01 / 03</span>
			</button>

			<div class="hx-float hx-float-a">
				<span class="hx-float-stars" aria-hidden="true">&#9733;&#9733;&#9733;&#9733;&#9733;</span>
				<strong>4.9</strong>
				<small><?php esc_html_e( 'Google & counter rating', 'mobile-pasal' ); ?></small>
			</div>
			<div class="hx-float hx-float-b">
				<span class="hx-float-icon"><i class="fa-solid fa-stopwatch" aria-hidden="true"></i></span>
				<div>
					<strong><?php echo esc_html( mp_opt( 'lab_stat3_num', '45 Min' ) ); ?></strong>
					<small><?php echo esc_html( mp_opt( 'lab_stat3_label', 'Screen Turnaround' ) ); ?></small>
				</div>
			</div>
		</div>
	</div>

	<div class="hx-ticker" aria-hidden="true">
		<div class="hx-ticker-track">
			<?php for ( $loop = 0; $loop < 2; $loop++ ) : foreach ( $hx_ticker as $t ) : ?>
				<span class="hx-ticker-item"><i></i><?php echo esc_html( $t ); ?></span>
			<?php endforeach; endfor; ?>
		</div>
	</div>
</section>

<!-- =========================================================================
     02. DEPARTMENTS: Expanding image panels + Interactive Trade-In Calculator
     ========================================================================= -->
<section id="categories" class="hx-depts">
	<div class="wrap">
		<header class="hx-head hx-head-split fade-up">
			<div>
				<span class="hx-kicker"><?php echo esc_html( mp_opt( 'categories_kicker', 'Store Departments' ) ); ?></span>
				<h2 class="hx-h2"><?php echo esc_html( mp_opt( 'categories_title', 'One counter. Everything your phone needs.' ) ); ?></h2>
			</div>
			<p class="hx-head-note"><?php echo esc_html( mp_opt( 'categories_subtitle', 'Hover or tap any vertical slice below to expand our five specialized counter departments.' ) ); ?></p>
		</header>

		<?php
		$hx_depts = array(
			array(
				'tag'   => mp_opt( 'cat1_count', '50+ In-Stock Handsets' ),
				'title' => mp_opt( 'cat1_title', 'Flagship Smartphones & iPhones' ),
				'desc'  => __( 'Sealed iPhone, Galaxy, Pixel, OnePlus and Xiaomi units with official VAT bill and manufacturer warranty.', 'mobile-pasal' ),
				'cta'   => __( 'Browse the showroom', 'mobile-pasal' ),
				'url'   => '#catalog',
				'img'   => $img_dir . 'iphone-16-colors.jpg',
				'short' => __( 'Phones', 'mobile-pasal' ),
				'chips' => array( 'iPhone 16 Pro', 'Galaxy S24 Ultra', 'Official VAT Bill', 'MDMS Registered' ),
			),
			array(
				'tag'   => mp_opt( 'cat2_count', 'Microscope Repair Bench' ),
				'title' => mp_opt( 'cat2_title', 'Apple Fix Precision Cleanroom Lab' ),
				'desc'  => __( 'Screens, batteries, charging ports, water damage and board-level repairs done on-site while you watch.', 'mobile-pasal' ),
				'cta'   => __( 'Estimate a repair', 'mobile-pasal' ),
				'url'   => '#repair-builder',
				'img'   => $img_dir . 'iphone-repair-hands.jpg',
				'short' => __( 'Repair lab', 'mobile-pasal' ),
				'chips' => array( 'TrueTone EEPROM', 'BMS Tag-On', 'Ultrasonic Clean', '45m Screen Fix' ),
			),
			array(
				'tag'   => mp_opt( 'cat3_count', '20W-120W GaN Charging' ),
				'title' => mp_opt( 'cat3_title', 'Original Power & MagSafe' ),
				'desc'  => __( 'Genuine PD fast chargers, braided cables, MagSafe pucks and power banks that will not cook your battery.', 'mobile-pasal' ),
				'cta'   => __( 'Ask for chargers', 'mobile-pasal' ),
				'url'   => mp_get_whatsapp_link( 'Namaste Ali Mobile, original charger ko price dinus' ),
				'img'   => $img_dir . 'acc-charger.jpg',
				'short' => __( 'Power', 'mobile-pasal' ),
				'chips' => array( 'Apple 20W USB-C', 'Samsung 45W PD', 'MagSafe Dock', 'Braided Type-C' ),
			),
			array(
				'tag'   => __( 'AirPods, Buds & Watch', 'mobile-pasal' ),
				'title' => __( 'Original Audio & Wearables', 'mobile-pasal' ),
				'desc'  => __( 'AirPods, Galaxy Buds, smartwatches and fitness bands with brand warranty and counter pairing help.', 'mobile-pasal' ),
				'cta'   => __( 'Ask for audio', 'mobile-pasal' ),
				'url'   => mp_get_whatsapp_link( 'Namaste Ali Mobile, original earbuds / smartwatch ko price dinus' ),
				'img'   => $img_dir . 'acc-airpods.jpg',
				'short' => __( 'Audio', 'mobile-pasal' ),
				'chips' => array( 'AirPods Pro 2', 'Galaxy Buds3', 'Watch Series', 'ANC Verified' ),
			),
			array(
				'tag'   => __( '9H Glass & MagSafe Cases', 'mobile-pasal' ),
				'title' => __( 'Cases, Glass & Armor', 'mobile-pasal' ),
				'desc'  => __( 'Precision-fit cases and tempered glass installed bubble-free at the counter in under five minutes.', 'mobile-pasal' ),
				'cta'   => __( 'Ask for cases', 'mobile-pasal' ),
				'url'   => mp_get_whatsapp_link( 'Namaste Ali Mobile, mero phone ko lagi case ra tempered glass chahiyo' ),
				'img'   => $img_dir . 'acc-cases.jpg',
				'short' => __( 'Armor', 'mobile-pasal' ),
				'chips' => array( '9H Sapphire Glass', 'Privacy Screen', 'MagSafe Armor', 'Camera Lens Ring' ),
			),
		);
		?>
		<div class="hx-panels fade-up" data-hx-panels>
			<?php foreach ( $hx_depts as $i => $d ) : $is_ext = 0 === strpos( $d['url'], 'http' ); ?>
				<article class="hx-panel<?php echo 0 === $i ? ' is-open' : ''; ?>" tabindex="0">
					<img class="hx-panel-img" src="<?php echo esc_url( $d['img'] ); ?>" alt="" loading="lazy">
					<span class="hx-panel-shade" aria-hidden="true"></span>
					<span class="hx-panel-num" aria-hidden="true"><?php echo esc_html( sprintf( '%02d', $i + 1 ) ); ?></span>
					<span class="hx-panel-spine" aria-hidden="true"><?php echo esc_html( $d['short'] ); ?></span>
					<div class="hx-panel-body">
						<span class="hx-panel-tag"><?php echo esc_html( $d['tag'] ); ?></span>
						<h3><?php echo esc_html( $d['title'] ); ?></h3>
						<p><?php echo esc_html( $d['desc'] ); ?></p>
						<div class="hx-panel-chips">
							<?php foreach ( $d['chips'] as $chip ) : ?>
								<span><?php echo esc_html( $chip ); ?></span>
							<?php endforeach; ?>
						</div>
						<a class="hx-panel-link" href="<?php echo esc_url( $d['url'] ); ?>"<?php echo $is_ext ? ' target="_blank" rel="noopener"' : ''; ?>>
							<span><?php echo esc_html( $d['cta'] ); ?></span><?php echo $arrow_icon; // phpcs:ignore ?>
						</a>
					</div>
				</article>
			<?php endforeach; ?>
		</div>

		<!-- Interactive Instant Trade-In / Exchange Estimator -->
		<div class="hx-tradein fade-up" data-hx-tradein>
			<div class="hx-tradein-left">
				<div class="hx-tradein-head">
					<span class="hx-tradein-icon"><i class="fa-solid fa-arrows-rotate" aria-hidden="true"></i></span>
					<div>
						<span class="hx-tradein-kicker"><?php esc_html_e( 'Interactive Counter Exchange Simulator', 'mobile-pasal' ); ?></span>
						<h3><?php esc_html_e( 'Instant Trade-In Value Calculator', 'mobile-pasal' ); ?></h3>
					</div>
				</div>
				<div class="hx-tradein-controls">
					<div class="hx-tradein-group">
						<span class="hx-tradein-label"><?php esc_html_e( '1. Your current device:', 'mobile-pasal' ); ?></span>
						<div class="hx-tradein-pills" data-trade-tier>
							<button type="button" class="is-active" data-tier="iPhone 13 / 14 / 15 Series" data-min="52000" data-max="95000"><?php esc_html_e( 'iPhone 13–15', 'mobile-pasal' ); ?></button>
							<button type="button" data-tier="iPhone 11 / 12 Series" data-min="26000" data-max="46000"><?php esc_html_e( 'iPhone 11–12', 'mobile-pasal' ); ?></button>
							<button type="button" data-tier="Samsung Galaxy S / Z Series" data-min="38000" data-max="82000"><?php esc_html_e( 'Samsung S / Fold', 'mobile-pasal' ); ?></button>
							<button type="button" data-tier="Android Mid-Range (Redmi/OnePlus/A-Series)" data-min="12000" data-max="32000"><?php esc_html_e( 'Mid-Range Android', 'mobile-pasal' ); ?></button>
						</div>
					</div>
					<div class="hx-tradein-group">
						<span class="hx-tradein-label"><?php esc_html_e( '2. Condition:', 'mobile-pasal' ); ?></span>
						<div class="hx-tradein-pills" data-trade-cond>
							<button type="button" class="is-active" data-cond="Mint / Clean (100% Working)" data-mult="1"><?php esc_html_e( 'Mint / Clean', 'mobile-pasal' ); ?></button>
							<button type="button" data-cond="Good (Minor Scratches / 80%+ Battery)" data-mult="0.82"><?php esc_html_e( 'Normal Wear', 'mobile-pasal' ); ?></button>
							<button type="button" data-cond="Damaged (Cracked Glass / Needs Battery)" data-mult="0.58"><?php esc_html_e( 'Cracked / Faulty', 'mobile-pasal' ); ?></button>
						</div>
					</div>
				</div>
			</div>
			<div class="hx-tradein-right">
				<span class="hx-tradein-est-label"><?php esc_html_e( 'Estimated Counter Credit', 'mobile-pasal' ); ?></span>
				<strong class="hx-tradein-est-val" data-trade-output>NPR 52,000 &ndash; 95,000</strong>
				<small data-trade-summary><?php esc_html_e( 'iPhone 13–15 • Mint / Clean • Deducted instantly from your new phone bill', 'mobile-pasal' ); ?></small>
				<a class="hx-btn hx-btn-lime hx-btn-block" data-trade-wa href="<?php echo esc_url( mp_get_whatsapp_link( 'Namaste Ali Mobile, ma sanga iPhone 13-15 (Mint condition) chha, exchange value kati aauchha?' ) ); ?>" target="_blank" rel="noopener">
					<?php echo $wa_icon; // phpcs:ignore ?><span><?php esc_html_e( 'Claim this trade-in credit', 'mobile-pasal' ); ?></span>
				</a>
			</div>
		</div>
	</div>
</section>

<!-- =========================================================================
     03. REPAIR DESK: Step picker + Live Phone X-Ray Scanner + Thermal Receipt
     IDs/classes below are bound in assets/js/main.js (section 5).
     ========================================================================= -->
<section id="repair-builder" class="hx-repair" data-hx-workbench>
	<div class="hx-repair-glow" aria-hidden="true"></div>
	<div class="wrap">
		<div class="hx-bench-bar fade-up" aria-hidden="true">
			<div class="hx-bench-dots"><span></span><span></span><span></span></div>
			<span class="hx-bench-title">APPLE_FIX_DIAGNOSTIC_OS v4.0 // GULARIYA_BENCH_01</span>
			<span class="hx-bench-badge"><i class="fa-solid fa-bolt"></i> LIVE THERMAL PRINTER LINKED</span>
		</div>
		<header class="hx-head hx-head-split hx-on-dark fade-up">
			<div>
				<span class="hx-kicker"><?php echo esc_html( mp_opt( 'repair_kicker', 'Live Diagnostic Workbench' ) ); ?></span>
				<h2 class="hx-h2"><?php echo esc_html( mp_opt( 'repair_title', 'Phone Problem? Get a Direct Counter Estimate' ) ); ?></h2>
			</div>
			<p class="hx-head-note"><?php echo esc_html( mp_opt( 'repair_subtitle', 'Pick your phone and fault. Watch our blueprint X-Ray lock onto the affected hardware zone while your thermal job slip prints live.' ) ); ?></p>
		</header>

		<div class="hx-repair-grid">
			<div class="hx-steps fade-up">

				<div class="hx-step">
					<div class="hx-step-rail"><span class="hx-step-num">1</span></div>
					<div class="hx-step-main">
						<h3 class="hx-step-title"><?php esc_html_e( 'Which phone?', 'mobile-pasal' ); ?></h3>
						<div class="device-pills-grid hx-device-grid" data-group="device">
							<?php
							$hx_devices = array(
								array( 'Apple iPhone', 'fa-brands fa-apple' ),
								array( 'Samsung Galaxy', 'fa-solid fa-mobile-screen' ),
								array( 'Google Pixel', 'fa-brands fa-google' ),
								array( 'OnePlus', 'fa-solid fa-plus' ),
								array( 'Xiaomi / Redmi', 'fa-brands fa-android' ),
								array( 'Other Android', 'fa-solid fa-mobile-retro' ),
							);
							foreach ( $hx_devices as $i => $dv ) :
								?>
								<button type="button" class="dev-pill-btn hx-device<?php echo 0 === $i ? ' active' : ''; ?>" data-device="<?php echo esc_attr( $dv[0] ); ?>">
									<i class="<?php echo esc_attr( $dv[1] ); ?>" aria-hidden="true"></i>
									<span><?php echo esc_html( $dv[0] ); ?></span>
								</button>
							<?php endforeach; ?>
						</div>
					</div>
				</div>

				<div class="hx-step">
					<div class="hx-step-rail"><span class="hx-step-num">2</span></div>
					<div class="hx-step-main">
						<h3 class="hx-step-title"><?php esc_html_e( 'What went wrong?', 'mobile-pasal' ); ?></h3>
						<div class="fault-cards-grid hx-fault-grid">
							<?php
							$hx_faults = array(
								array( 'Screen & Display', 'Cracked glass, lines, touch dead', 'Screen & Display (Cracked glass / black spots / touch dead)', '30-45 Mins', '90 Days Testing Warranty', 'fa-mobile-screen-button', 'screen', 'ZONE 01 // OLED PANEL & DIGITIZER RIBBON' ),
								array( 'Battery & BMS', 'Fast drain, shutdowns, swelling', 'Battery Replacement (Fast drain / sudden shutdown / swollen)', '20-30 Mins', '6 Months Battery Warranty', 'fa-battery-quarter', 'battery', 'ZONE 02 // LITHIUM CELL & BMS TAG-ON FLEX' ),
								array( 'Charging & Port', 'Slow, loose or no charging', 'Charging & Port (Slow charging / loose port / cable angle)', '30 Mins', '30 Days Service Warranty', 'fa-plug-circle-bolt', 'port', 'ZONE 03 // USB-C / LIGHTNING DOCK & TRISTAR IC' ),
								array( 'Water Damage', 'Dropped in water, no power', 'Water Damage (Dropped in water / ultrasonic clean / IC)', '1-2 Hours', 'Component Warranty', 'fa-droplet', 'water', 'ZONE 04 // FULL LOGIC BOARD ULTRASONIC DE-OXIDATION' ),
								array( 'Camera, Face ID & Audio', 'Blurry camera, mic, speaker', 'Camera & Sound (Mic not working / speaker muffled / camera)', '45 Mins', '60 Days Testing Warranty', 'fa-camera', 'camera', 'ZONE 05 // OPTIC SENSOR ARRAY & DOT PROJECTOR' ),
								array( 'Motherboard', 'No boot, no signal, IC faults', 'Motherboard Micro-Soldering (No power / no network / IC fault)', '1-3 Days', 'Component Warranty', 'fa-microchip', 'board', 'ZONE 06 // MULTI-LAYER PCB, PMIC & BASEBAND CPU' ),
							);
							foreach ( $hx_faults as $i => $f ) :
								?>
								<button type="button" class="fault-select-card hx-fault<?php echo 0 === $i ? ' active' : ''; ?>" data-issue="<?php echo esc_attr( $f[2] ); ?>" data-time="<?php echo esc_attr( $f[3] ); ?>" data-warranty="<?php echo esc_attr( $f[4] ); ?>" data-hx-zone="<?php echo esc_attr( $f[6] ); ?>" data-hx-zone-label="<?php echo esc_attr( $f[7] ); ?>">
									<span class="hx-fault-icon"><i class="fa-solid <?php echo esc_attr( $f[5] ); ?>" aria-hidden="true"></i></span>
									<span class="hx-fault-text">
										<strong><?php echo esc_html( $f[0] ); ?></strong>
										<small><?php echo esc_html( $f[1] ); ?></small>
									</span>
									<span class="hx-fault-time"><?php echo esc_html( $f[3] ); ?></span>
								</button>
							<?php endforeach; ?>
						</div>
					</div>
				</div>

				<div class="hx-step">
					<div class="hx-step-rail"><span class="hx-step-num">3</span></div>
					<div class="hx-step-main">
						<h3 class="hx-step-title"><?php esc_html_e( 'Exact model', 'mobile-pasal' ); ?> <span class="hx-optional"><?php esc_html_e( 'optional', 'mobile-pasal' ); ?></span></h3>
						<label class="screen-reader-text" for="builder-model-input"><?php esc_html_e( 'Phone model', 'mobile-pasal' ); ?></label>
						<input id="builder-model-input" class="hx-input" type="text" autocomplete="off" placeholder="<?php esc_attr_e( 'e.g. iPhone 13 Pro, Galaxy A54, Redmi Note 13', 'mobile-pasal' ); ?>">
						<div class="hx-chip-row">
							<?php foreach ( array( 'iPhone 15 Pro Max', 'iPhone 13', 'Galaxy S23 Ultra', 'Redmi Note 13' ) as $m ) : ?>
								<button type="button" class="quick-chip-btn hx-chip" data-model="<?php echo esc_attr( $m ); ?>"><?php echo esc_html( $m ); ?></button>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
			</div>

			<aside class="hx-receipt-col fade-up" aria-label="<?php esc_attr_e( 'Your repair slip', 'mobile-pasal' ); ?>">
				<!-- Interactive Hardware X-Ray Blueprint Scanner -->
				<div class="hx-xray" data-hx-xray data-active-zone="screen">
					<div class="hx-xray-screen">
						<span class="hx-xray-laser" aria-hidden="true"></span>
						<svg class="hx-xray-svg" viewBox="0 0 120 210" fill="none" aria-hidden="true">
							<!-- Outer Chassis -->
							<rect x="10" y="6" width="100" height="198" rx="18" stroke="rgba(148,163,184,0.45)" stroke-width="2"/>
							<rect x="15" y="12" width="90" height="186" rx="14" stroke="rgba(148,163,184,0.2)" stroke-width="1" stroke-dasharray="3 3"/>
							<!-- Zone: Camera & Face ID (Top) -->
							<g class="hx-xray-part" data-zone-part="camera">
								<rect x="22" y="18" width="38" height="36" rx="8" stroke="currentColor" stroke-width="1.6"/>
								<circle cx="32" cy="28" r="6" stroke="currentColor" stroke-width="1.5"/>
								<circle cx="32" cy="44" r="6" stroke="currentColor" stroke-width="1.5"/>
								<circle cx="48" cy="36" r="5" stroke="currentColor" stroke-width="1.5"/>
								<rect x="66" y="20" width="28" height="8" rx="4" stroke="currentColor" stroke-width="1.5"/>
							</g>
							<!-- Zone: Motherboard / Logic IC (Right Spine) -->
							<g class="hx-xray-part" data-zone-part="board">
								<path d="M64 34 H96 V132 H74 V95 H64 Z" stroke="currentColor" stroke-width="1.6"/>
								<rect x="70" y="44" width="20" height="20" rx="2" stroke="currentColor" stroke-width="1.4"/>
								<rect x="76" y="72" width="16" height="24" rx="2" stroke="currentColor" stroke-width="1.4"/>
							</g>
							<!-- Zone: Battery & BMS (Left-Center) -->
							<g class="hx-xray-part" data-zone-part="battery">
								<rect x="22" y="60" width="46" height="104" rx="6" stroke="currentColor" stroke-width="1.8"/>
								<path d="M42 98 L36 112 H45 L39 126" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
							</g>
							<!-- Zone: Screen / OLED Panel (Full Diagonal Grid) -->
							<g class="hx-xray-part" data-zone-part="screen">
								<rect x="18" y="15" width="84" height="180" rx="11" stroke="currentColor" stroke-width="1.8"/>
								<line x1="26" y1="150" x2="94" y2="55" stroke="currentColor" stroke-width="1.2" stroke-dasharray="4 4"/>
							</g>
							<!-- Zone: Water / Full Submersion Wave -->
							<g class="hx-xray-part" data-zone-part="water">
								<path d="M16 115 Q38 105 60 115 T104 115 V190 H16 Z" stroke="currentColor" stroke-width="1.6"/>
								<circle cx="42" cy="145" r="5" stroke="currentColor" stroke-width="1.4"/>
								<circle cx="78" cy="158" r="7" stroke="currentColor" stroke-width="1.4"/>
							</g>
							<!-- Zone: Charging Port & Dock (Bottom) -->
							<g class="hx-xray-part" data-zone-part="port">
								<rect x="34" y="172" width="52" height="20" rx="4" stroke="currentColor" stroke-width="1.8"/>
								<rect x="48" y="192" width="24" height="8" rx="3" stroke="currentColor" stroke-width="1.8"/>
							</g>
						</svg>
					</div>
					<div class="hx-xray-info">
						<span class="hx-xray-tag"><i class="fa-solid fa-crosshairs" aria-hidden="true"></i> <?php esc_html_e( 'ACTIVE DIAGNOSTIC LOCK', 'mobile-pasal' ); ?></span>
						<strong data-hx-xray-title>ZONE 01 // OLED PANEL &amp; DIGITIZER RIBBON</strong>
						<small><?php esc_html_e( 'ESD microscope check + TrueTone EEPROM backup included', 'mobile-pasal' ); ?></small>
					</div>
				</div>

				<div class="hx-printer" aria-hidden="true"><span></span></div>
				<div class="hx-receipt" data-hx-receipt>
					<span class="hx-receipt-stamp" aria-hidden="true"><?php esc_html_e( 'FREE CHECK • NO FIX NO FEE', 'mobile-pasal' ); ?></span>
					<div class="hx-receipt-head">
						<strong><?php echo esc_html( mp_opt( 'store_name', 'Ali Mobile Center & Apple Fix' ) ); ?></strong>
						<span><?php esc_html_e( 'Gulariya-06, Bardiya', 'mobile-pasal' ); ?> &middot; <?php echo esc_html( $phone_raw ); ?></span>
						<span class="hx-receipt-id"><?php echo esc_html( 'SLIP #AM-' . wp_date( 'md' ) . '-' . wp_date( 'Hi' ) ); ?></span>
					</div>
					<dl class="hx-receipt-rows">
						<div><dt><?php esc_html_e( 'Device', 'mobile-pasal' ); ?></dt><dd id="ticket-device-val">Apple iPhone</dd></div>
						<div><dt><?php esc_html_e( 'Model', 'mobile-pasal' ); ?></dt><dd id="ticket-model-val"><?php esc_html_e( 'Specified at Counter', 'mobile-pasal' ); ?></dd></div>
						<div><dt><?php esc_html_e( 'Fault', 'mobile-pasal' ); ?></dt><dd id="ticket-fault-val">Screen &amp; Display</dd></div>
						<div><dt><?php esc_html_e( 'Bench time', 'mobile-pasal' ); ?></dt><dd id="ticket-time-val">30-45 Mins</dd></div>
						<div><dt><?php esc_html_e( 'Warranty', 'mobile-pasal' ); ?></dt><dd id="ticket-warranty-val">90 Days Testing Warranty</dd></div>
						<div class="hx-receipt-total"><dt><?php esc_html_e( 'Diagnosis', 'mobile-pasal' ); ?></dt><dd><?php esc_html_e( 'FREE', 'mobile-pasal' ); ?></dd></div>
					</dl>
					<div class="hx-receipt-msg">
						<span><?php esc_html_e( 'Message to technician', 'mobile-pasal' ); ?></span>
						<p id="builder-preview-text"></p>
					</div>
					<div class="hx-barcode" aria-hidden="true"></div>
					<p class="hx-receipt-foot"><?php esc_html_e( 'No fix, no fee. Thank you!', 'mobile-pasal' ); ?></p>
				</div>
				<div class="hx-receipt-actions">
					<a id="builder-send-whatsapp-btn" class="hx-btn hx-btn-wa hx-btn-block" href="<?php echo esc_url( mp_get_whatsapp_link() ); ?>" target="_blank" rel="noopener">
						<?php echo $wa_icon; // phpcs:ignore ?><span><?php esc_html_e( 'Send slip on WhatsApp', 'mobile-pasal' ); ?></span>
					</a>
					<a class="hx-btn hx-btn-ghost-light hx-btn-block" href="tel:+<?php echo esc_attr( $phone_clean ); ?>">
						<i class="fa-solid fa-phone" aria-hidden="true"></i><span><?php esc_html_e( 'Or call the counter', 'mobile-pasal' ); ?></span>
					</a>
				</div>
			</aside>
		</div>
	</div>
</section>

<!-- =========================================================================
     04. BRANDS: Authenticity Passport Dock + Dual-Direction Marquee (#brands)
     Tiles use .brands-grid .brand-card-link[data-filter-brand] (main.js s.7).
     ========================================================================= -->
<?php
$hx_brands = array(
	array( 'apple', 'Apple', __( 'iPhone 16 & Apple Fix', 'mobile-pasal' ), 'fa-brands fa-apple', __( 'Official NTA MDMS Registered • 1-Year AppleCare & On-Site TrueTone / BMS Micro-Soldering Lab', 'mobile-pasal' ) ),
	array( 'samsung', 'Samsung', __( 'Galaxy S24 & Z Fold', 'mobile-pasal' ), 'fa-solid fa-mobile-screen-button', __( 'Authorized Nepal Stock • Service-Pack Dynamic AMOLED 2X Panels & 45W Super Fast Chargers', 'mobile-pasal' ) ),
	array( 'google', 'Google Pixel', __( 'Pixel 9 & Tensor G4', 'mobile-pasal' ), 'fa-brands fa-google', __( 'Factory Unlocked Global Units • Genuine OLED Assemblies & Pixel Camera Calibration', 'mobile-pasal' ) ),
	array( 'oneplus', 'OnePlus', __( 'OnePlus 12 & Nord 4', 'mobile-pasal' ), 'fa-solid fa-bolt', __( 'Official OxygenOS Handsets • 80W/100W SUPERVOOC Bricks & Dual-Cell Batteries', 'mobile-pasal' ) ),
	array( 'xiaomi', 'Xiaomi', __( 'Xiaomi 14 & Redmi Note', 'mobile-pasal' ), 'fa-solid fa-microchip', __( 'Authorized Xiaomi Nepal Warranty • HyperCharge Adapters & Same-Day Screen Replacement', 'mobile-pasal' ) ),
	array( 'accessories', __( 'Accessories', 'mobile-pasal' ), __( 'AirPods, Watch & Anker', 'mobile-pasal' ), 'fa-solid fa-headphones', __( 'Serial-Verified Audio, GaN Fast Chargers, Braided Cables & 9H Sapphire Armor', 'mobile-pasal' ) ),
);
$hx_brand_rows = array( $hx_brands, array_reverse( $hx_brands ) );
?>
<section id="brands" class="hx-brands" data-hx-brands>
	<div class="wrap hx-brands-head fade-up">
		<span class="hx-kicker"><?php echo esc_html( mp_opt( 'brands_kicker', 'Authorized Ecosystem' ) ); ?></span>
		<h2 class="hx-h2"><?php echo esc_html( mp_opt( 'brands_title', 'Top Smartphone Brands In Store' ) ); ?></h2>
		<p><?php echo esc_html( mp_opt( 'brands_subtitle', 'Hover any brand to inspect our counter authenticity passport, or click to filter the showroom.' ) ); ?></p>

		<!-- Interactive Brand Authenticity Passport Bar -->
		<div class="hx-passport" data-hx-passport>
			<div class="hx-passport-seal" aria-hidden="true">
				<svg viewBox="0 0 100 100" width="56" height="56">
					<defs>
						<path id="hxSealPath" d="M 50,50 m -36,0 a 36,36 0 1,1 72,0 a 36,36 0 1,1 -72,0"/>
					</defs>
					<text font-size="8.2" font-weight="800" fill="currentColor" letter-spacing="2.1">
						<textPath href="#hxSealPath">NTA MDMS VERIFIED • VAT INVOICE •</textPath>
					</text>
					<circle cx="50" cy="50" r="18" fill="var(--hx-lime)" />
					<path d="M43 50l5 5 10-10" stroke="#0b0f19" stroke-width="3" fill="none" stroke-linecap="round" stroke-linejoin="round"/>
				</svg>
			</div>
			<div class="hx-passport-body">
				<span class="hx-passport-kicker" data-passport-name>APPLE AUTHORIZED PASSPORT</span>
				<strong data-passport-desc><?php esc_html_e( 'Official NTA MDMS Registered • 1-Year AppleCare & On-Site TrueTone / BMS Micro-Soldering Lab', 'mobile-pasal' ); ?></strong>
			</div>
			<a href="#catalog" class="hx-passport-cta" data-passport-jump="apple">
				<span><?php esc_html_e( 'Filter Showroom', 'mobile-pasal' ); ?></span><?php echo $arrow_icon; // phpcs:ignore ?>
			</a>
		</div>
	</div>

	<div class="brands-grid hx-marquee">
		<?php foreach ( $hx_brand_rows as $row_i => $row ) : ?>
			<div class="hx-marquee-row<?php echo 1 === $row_i ? ' is-reverse' : ''; ?>">
				<div class="hx-marquee-track">
					<?php for ( $copy = 0; $copy < 2; $copy++ ) : foreach ( $row as $b ) : ?>
						<button type="button" class="brand-card-link hx-brand" data-filter-brand="<?php echo esc_attr( $b[0] ); ?>" data-brand-title="<?php echo esc_attr( strtoupper( $b[1] ) . ' AUTHORIZED PASSPORT' ); ?>" data-brand-passport="<?php echo esc_attr( $b[4] ); ?>"<?php echo $copy ? ' aria-hidden="true" tabindex="-1"' : ''; ?>>
							<?php if ( $b[3] ) : ?><i class="<?php echo esc_attr( $b[3] ); ?>" aria-hidden="true"></i><?php endif; ?>
							<span class="hx-brand-name"><?php echo esc_html( $b[1] ); ?></span>
							<span class="hx-brand-sub"><?php echo esc_html( $b[2] ); ?></span>
						</button>
						<span class="hx-marquee-star" aria-hidden="true">&#10022;</span>
					<?php endforeach; endfor; ?>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
</section>

<!-- =========================================================================
     05. FLAGSHIP STAGE: Titanium Colorway & Storage Configurator + Hotspots
     ========================================================================= -->
<?php
$spotlight_img = mp_opt( 'spotlight_image', '' );
if ( empty( $spotlight_img ) ) {
	$spotlight_img = $img_dir . 'iphone-16-pro-max.jpg';
}
$spot_title = mp_opt( 'spotlight_title', 'iPhone 16 Pro & Pro Max' );
?>
<section class="hx-spot" aria-labelledby="hx-spot-title" data-hx-spot data-finish="desert">
	<div class="wrap">
		<div class="hx-spot-top fade-up">
			<span class="hx-kicker"><i class="fa-brands fa-apple" aria-hidden="true"></i> <?php echo esc_html( mp_opt( 'spotlight_badge', 'Featured Flagship in Gulariya' ) ); ?></span>
			<h2 id="hx-spot-title" class="hx-spot-title"><?php echo esc_html( $spot_title ); ?></h2>
			<p class="hx-spot-sub"><?php echo esc_html( mp_opt( 'spotlight_subtitle', 'A18 Pro silicon, a 48MP Fusion camera, the new Camera Control button and the best battery life ever on iPhone. Sealed stock, ready for handover at our counter.' ) ); ?></p>
		</div>

		<div class="hx-spot-stage fade-up">
			<span class="hx-spot-ghost" aria-hidden="true" data-spot-ghost>PRO</span>
			<div class="hx-spot-visual">
				<span class="hx-spot-halo" aria-hidden="true"></span>
				<img src="<?php echo esc_url( $spotlight_img ); ?>" alt="<?php echo esc_attr( $spot_title ); ?>" loading="lazy">
				<span class="hx-spot-pin hx-pin-1" data-pin="1" aria-hidden="true">01</span>
				<span class="hx-spot-pin hx-pin-2" data-pin="2" aria-hidden="true">02</span>
				<span class="hx-spot-pin hx-pin-3" data-pin="3" aria-hidden="true">03</span>
				<span class="hx-spot-pin hx-pin-4" data-pin="4" aria-hidden="true">04</span>
				<div class="hx-spot-live-pill">
					<span class="hx-status-dot"></span>
					<span data-spot-summary>Desert Titanium &middot; 256GB &middot; Sealed Box</span>
				</div>
			</div>
			<ul class="hx-callouts">
				<li class="hx-callout hx-callout-1" data-callout="1"><span class="hx-callout-num">01</span><i class="fa-solid fa-microchip" aria-hidden="true"></i><div><small><?php esc_html_e( 'Chip', 'mobile-pasal' ); ?></small><strong><?php echo esc_html( mp_opt( 'spotlight_chip', 'A18 Pro Silicon' ) ); ?></strong></div></li>
				<li class="hx-callout hx-callout-2" data-callout="2"><span class="hx-callout-num">02</span><i class="fa-solid fa-camera" aria-hidden="true"></i><div><small><?php esc_html_e( 'Camera', 'mobile-pasal' ); ?></small><strong><?php echo esc_html( mp_opt( 'spotlight_camera', '48MP Fusion + 5x Telephoto' ) ); ?></strong></div></li>
				<li class="hx-callout hx-callout-3" data-callout="3"><span class="hx-callout-num">03</span><i class="fa-solid fa-gem" aria-hidden="true"></i><div><small><?php esc_html_e( 'Finish', 'mobile-pasal' ); ?></small><strong data-spot-finish-text><?php echo esc_html( mp_opt( 'spotlight_finish', 'Desert Titanium Finish' ) ); ?></strong></div></li>
				<li class="hx-callout hx-callout-4" data-callout="4"><span class="hx-callout-num">04</span><i class="fa-solid fa-file-invoice" aria-hidden="true"></i><div><small><?php esc_html_e( 'Purchase', 'mobile-pasal' ); ?></small><strong><?php esc_html_e( 'VAT bill + official warranty', 'mobile-pasal' ); ?></strong></div></li>
			</ul>
		</div>

		<!-- Interactive Finish & Storage Configurator Dock -->
		<div class="hx-spot-config fade-up">
			<div class="hx-config-group">
				<span class="hx-config-label"><?php esc_html_e( 'Finish:', 'mobile-pasal' ); ?></span>
				<div class="hx-swatches" role="radiogroup" aria-label="<?php esc_attr_e( 'Choose Titanium Finish', 'mobile-pasal' ); ?>">
					<button type="button" class="hx-swatch is-active" data-finish-key="desert" data-finish-name="Desert Titanium" style="--sw:#c5a888" title="Desert Titanium"><span></span><em>Desert</em></button>
					<button type="button" class="hx-swatch" data-finish-key="natural" data-finish-name="Natural Titanium" style="--sw:#a8a49d" title="Natural Titanium"><span></span><em>Natural</em></button>
					<button type="button" class="hx-swatch" data-finish-key="white" data-finish-name="White Titanium" style="--sw:#f1f0ec" title="White Titanium"><span></span><em>White</em></button>
					<button type="button" class="hx-swatch" data-finish-key="black" data-finish-name="Black Titanium" style="--sw:#383b40" title="Black Titanium"><span></span><em>Black</em></button>
				</div>
			</div>
			<div class="hx-config-group">
				<span class="hx-config-label"><?php esc_html_e( 'Capacity:', 'mobile-pasal' ); ?></span>
				<div class="hx-storages" role="radiogroup" aria-label="<?php esc_attr_e( 'Choose Storage', 'mobile-pasal' ); ?>">
					<button type="button" class="hx-storage" data-storage="128GB">128GB</button>
					<button type="button" class="hx-storage is-active" data-storage="256GB">256GB</button>
					<button type="button" class="hx-storage" data-storage="512GB">512GB</button>
					<button type="button" class="hx-storage" data-storage="1TB">1TB</button>
				</div>
			</div>
		</div>

		<div class="hx-spot-actions fade-up">
			<a class="hx-btn hx-btn-wa" data-spot-wa href="<?php echo esc_url( mp_get_whatsapp_link( 'Namaste Ali Mobile, iPhone 16 Pro (Desert Titanium, 256GB) ko aaja ko price ra availability dinus' ) ); ?>" target="_blank" rel="noopener">
				<?php echo $wa_icon; // phpcs:ignore ?><span data-spot-cta-label><?php esc_html_e( 'Ask price for Desert Titanium (256GB)', 'mobile-pasal' ); ?></span>
			</a>
			<a class="hx-btn hx-btn-ghost-light" href="#catalog" data-hx-filter-jump="apple"><span><?php esc_html_e( 'See all iPhones', 'mobile-pasal' ); ?></span><?php echo $arrow_icon; // phpcs:ignore ?></a>
		</div>
	</div>
</section>

<!-- =========================================================================
     06. SHOWROOM: Sticky Sidebar + Grid/Table Switcher + Live Compare Tray
     Filter/search hooks are bound in assets/js/main.js (section 6).
     ========================================================================= -->
<section id="catalog" class="hx-catalog" data-hx-catalog>
	<div class="wrap">
		<header class="hx-head hx-head-split fade-up">
			<div>
				<span class="hx-kicker"><?php esc_html_e( 'Showroom', 'mobile-pasal' ); ?></span>
				<h2 class="hx-h2"><?php esc_html_e( 'In stock this week', 'mobile-pasal' ); ?></h2>
			</div>
			<div class="hx-catalog-controls">
				<div class="hx-view-toggle" role="group" aria-label="<?php esc_attr_e( 'Showroom layout', 'mobile-pasal' ); ?>">
					<button type="button" class="is-active" data-hx-view="grid"><i class="fa-solid fa-grip" aria-hidden="true"></i> <span><?php esc_html_e( 'Gallery', 'mobile-pasal' ); ?></span></button>
					<button type="button" data-hx-view="table"><i class="fa-solid fa-table-list" aria-hidden="true"></i> <span><?php esc_html_e( 'Spec Sheet', 'mobile-pasal' ); ?></span></button>
				</div>
				<label class="hx-sort-wrap">
					<span class="screen-reader-text"><?php esc_html_e( 'Sort devices', 'mobile-pasal' ); ?></span>
					<select data-hx-sort aria-label="<?php esc_attr_e( 'Sort devices', 'mobile-pasal' ); ?>">
						<option value="default"><?php esc_html_e( 'Sort: Featured Counter Picks', 'mobile-pasal' ); ?></option>
						<option value="price-asc"><?php esc_html_e( 'Price: Low to High', 'mobile-pasal' ); ?></option>
						<option value="price-desc"><?php esc_html_e( 'Price: High to Low', 'mobile-pasal' ); ?></option>
						<option value="rating"><?php esc_html_e( 'Highest Rated (4.9★)', 'mobile-pasal' ); ?></option>
					</select>
				</label>
			</div>
		</header>

		<div class="hx-shop">
			<aside class="hx-shop-side fade-up">
				<div class="hx-search" role="search">
					<i class="fa-solid fa-magnifying-glass" aria-hidden="true"></i>
					<input id="site-search" type="search" autocomplete="off" placeholder="<?php esc_attr_e( 'Search model or brand', 'mobile-pasal' ); ?>" aria-label="<?php esc_attr_e( 'Search showroom catalog', 'mobile-pasal' ); ?>">
					<button id="search-clear-btn" class="cat-search-clear hx-search-clear" type="button" aria-label="<?php esc_attr_e( 'Clear search', 'mobile-pasal' ); ?>"><i class="fa-solid fa-xmark" aria-hidden="true"></i></button>
				</div>
				<div class="hx-filter-list" role="tablist" aria-label="<?php esc_attr_e( 'Filter by brand', 'mobile-pasal' ); ?>">
					<?php
					$hx_filters = array(
						'all'         => __( 'All devices', 'mobile-pasal' ),
						'apple'       => 'Apple iPhone',
						'samsung'     => 'Samsung Galaxy',
						'google'      => 'Google Pixel',
						'oneplus'     => 'OnePlus',
						'xiaomi'      => 'Xiaomi / Redmi',
						'accessories' => __( 'Accessories', 'mobile-pasal' ),
					);
					foreach ( $hx_filters as $key => $label ) :
						$count = 'all' === $key ? count( $hx_products ) : count( array_filter( $hx_products, function ( $p ) use ( $key ) { return $p['brand_slug'] === $key; } ) );
						?>
						<button type="button" class="filter-tab-btn hx-filter<?php echo 'all' === $key ? ' active' : ''; ?>" data-filter="<?php echo esc_attr( $key ); ?>">
							<span><?php echo esc_html( $label ); ?></span>
							<em><?php echo esc_html( $count ); ?></em>
						</button>
					<?php endforeach; ?>
				</div>
				<div class="hx-side-card">
					<i class="fa-solid fa-truck-fast" aria-hidden="true"></i>
					<strong><?php esc_html_e( 'Not on the list?', 'mobile-pasal' ); ?></strong>
					<p><?php esc_html_e( 'We source rare models and storage variants from national distributors, usually within 24 hours.', 'mobile-pasal' ); ?></p>
					<a class="hx-text-link" href="<?php echo esc_url( mp_get_whatsapp_link( 'Namaste Ali Mobile, showroom ko current handset stock list dinus' ) ); ?>" target="_blank" rel="noopener"><span><?php esc_html_e( 'Request a model', 'mobile-pasal' ); ?></span><?php echo $arrow_icon; // phpcs:ignore ?></a>
				</div>
			</aside>

			<div class="hx-shop-main">
				<div class="products-grid hx-products" data-hx-products-grid>
					<?php foreach ( $hx_products as $idx => $p ) :
						$numeric_price = (int) preg_replace( '/[^0-9]/', '', (string) $p['price'] );
						?>
						<article class="product-card hx-product fade-up" data-brand="<?php echo esc_attr( $p['brand_slug'] ); ?>" data-category="smartphones" data-order="<?php echo esc_attr( $idx ); ?>" data-price-num="<?php echo esc_attr( $numeric_price ?: 999999 ); ?>" data-rating-num="<?php echo esc_attr( $p['rating'] ); ?>" data-title="<?php echo esc_attr( $p['title'] ); ?>" data-price-str="<?php echo esc_attr( $p['price'] ?: __( 'Ask Counter', 'mobile-pasal' ) ); ?>">
							<div class="hx-product-media">
								<span class="hx-product-badge"><?php echo esc_html( $p['badge'] ); ?></span>
								<button type="button" class="hx-compare-btn" data-compare-toggle="<?php echo esc_attr( $p['title'] ); ?>" title="<?php esc_attr_e( 'Add to comparison tray', 'mobile-pasal' ); ?>">
									<i class="fa-solid fa-scale-balanced" aria-hidden="true"></i>
									<span><?php esc_html_e( 'Compare', 'mobile-pasal' ); ?></span>
								</button>
								<img src="<?php echo esc_url( $p['img'] ); ?>" alt="<?php echo esc_attr( $p['title'] ); ?>" loading="lazy">
							</div>
							<div class="hx-product-body">
								<div class="hx-product-meta">
									<span class="hx-product-brand"><?php echo esc_html( $p['brand_name'] ); ?></span>
									<span class="hx-product-rating"><i class="fa-solid fa-star" aria-hidden="true"></i> <?php echo esc_html( $p['rating'] ); ?> <em>(<?php echo esc_html( $p['reviews'] ); ?>)</em></span>
								</div>
								<h3 class="product-title"><?php echo esc_html( $p['title'] ); ?></h3>
								<p class="product-specs"><?php echo esc_html( $p['specs'] ); ?></p>
								<div class="hx-product-perks">
									<span><i class="fa-solid fa-circle-check" aria-hidden="true"></i> <?php esc_html_e( 'VAT Bill', 'mobile-pasal' ); ?></span>
									<span><i class="fa-solid fa-arrows-rotate" aria-hidden="true"></i> <?php esc_html_e( 'Exchange OK', 'mobile-pasal' ); ?></span>
								</div>
								<div class="hx-product-foot">
									<div class="hx-price">
										<?php if ( ! empty( $p['price'] ) ) : ?>
											<strong><?php echo esc_html( $p['price'] ); ?></strong>
											<?php if ( ! empty( $p['old_price'] ) ) : ?><s><?php echo esc_html( $p['old_price'] ); ?></s><?php endif; ?>
										<?php else : ?>
											<strong><?php esc_html_e( 'Ask for price', 'mobile-pasal' ); ?></strong>
										<?php endif; ?>
									</div>
									<a class="hx-product-cta" href="<?php echo esc_url( mp_get_whatsapp_link( 'Namaste Ali Mobile, ' . $p['title'] . ' ko aaja ko price ra stock dinus' ) ); ?>" target="_blank" rel="noopener" aria-label="<?php echo esc_attr( sprintf( __( 'Ask price for %s on WhatsApp', 'mobile-pasal' ), $p['title'] ) ); ?>">
										<?php echo $wa_icon; // phpcs:ignore ?><span><?php esc_html_e( 'Ask', 'mobile-pasal' ); ?></span>
									</a>
								</div>
							</div>
						</article>
					<?php endforeach; ?>
				</div>

				<!-- Interactive Comparison Tray (Reveals when 1-3 devices are selected) -->
				<div class="hx-compare-tray" data-hx-compare-tray hidden>
					<div class="hx-compare-head">
						<strong><i class="fa-solid fa-scale-balanced" aria-hidden="true"></i> <?php esc_html_e( 'Showroom Compare Tray', 'mobile-pasal' ); ?> (<span data-compare-count>0</span>/3)</strong>
						<button type="button" class="hx-compare-clear" data-compare-clear><?php esc_html_e( 'Clear all', 'mobile-pasal' ); ?></button>
					</div>
					<div class="hx-compare-slots" data-compare-slots></div>
					<a class="hx-btn hx-btn-wa hx-btn-sm" data-compare-wa href="<?php echo esc_url( mp_get_whatsapp_link() ); ?>" target="_blank" rel="noopener">
						<?php echo $wa_icon; // phpcs:ignore ?><span><?php esc_html_e( 'Compare prices & stock on WhatsApp', 'mobile-pasal' ); ?></span>
					</a>
				</div>

				<div id="catalog-empty-notice" class="catalog-empty-notice hx-empty" aria-live="polite">
					<i class="fa-solid fa-box-open" aria-hidden="true"></i>
					<h3><?php esc_html_e( 'Nothing listed here yet', 'mobile-pasal' ); ?></h3>
					<p><?php esc_html_e( 'Stock moves fast. Message us the model you want and we will check availability for you.', 'mobile-pasal' ); ?></p>
					<a class="hx-btn hx-btn-wa" href="<?php echo esc_url( mp_get_whatsapp_link() ); ?>" target="_blank" rel="noopener"><?php echo $wa_icon; // phpcs:ignore ?><span><?php esc_html_e( 'Ask on WhatsApp', 'mobile-pasal' ); ?></span></a>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- =========================================================================
     07. APPLE FIX LAB: Interactive Zoom/Thermal Microscope + Oscilloscope
     ========================================================================= -->
<?php
$lab_img = mp_opt( 'lab_image', '' );
if ( empty( $lab_img ) ) {
	$lab_img = $img_dir . 'apple-fix-bench.jpg';
}
$hx_lab_features = array(
	array( 'fa-sun', __( 'TrueTone & Face ID kept', 'mobile-pasal' ), __( 'Display EEPROM data is transferred, so brightness and TrueTone keep working.', 'mobile-pasal' ) ),
	array( 'fa-battery-full', __( 'Battery health restored', 'mobile-pasal' ), __( 'BMS tag-on transplant means 100% health with no unknown-part warning.', 'mobile-pasal' ) ),
	array( 'fa-water', __( 'Ultrasonic water rescue', 'mobile-pasal' ), __( 'Board cleaning and de-oxidation before corrosion reaches the ICs.', 'mobile-pasal' ) ),
	array( 'fa-eye', __( 'Watch every step', 'mobile-pasal' ), __( 'Repairs happen across the counter, and your photos and chats stay private.', 'mobile-pasal' ) ),
);
?>
<section id="apple-fix" class="hx-lab" data-hx-lab>
	<div class="wrap">
		<div class="hx-lab-top fade-up">
			<span class="hx-kicker"><?php echo esc_html( mp_opt( 'lab_kicker', 'Cleanroom Bench Setup' ) ); ?></span>
			<h2 class="hx-h2"><?php echo esc_html( mp_opt( 'lab_title', 'Precision Microscope Level Repairs Right in Gulariya' ) ); ?></h2>
			<p><?php echo esc_html( mp_opt( 'lab_subtitle', 'We do not courier your valuable phone to Nepalgunj or Kathmandu. Switch the microscope optics below to inspect how our ESD workstation operates.' ) ); ?></p>
		</div>

		<div class="hx-lab-grid">
			<ul class="hx-lab-list hx-lab-list-left">
				<?php foreach ( array_slice( $hx_lab_features, 0, 2 ) as $f ) : ?>
					<li class="fade-up"><span class="hx-lab-icon"><i class="fa-solid <?php echo esc_attr( $f[0] ); ?>" aria-hidden="true"></i></span><strong><?php echo esc_html( $f[1] ); ?></strong><p><?php echo esc_html( $f[2] ); ?></p></li>
				<?php endforeach; ?>
			</ul>

			<div class="hx-lens-stage fade-up">
				<div class="hx-lens" data-hx-lens data-scope-mode="10x">
					<span class="hx-lens-ring hx-lens-ring-1" aria-hidden="true"></span>
					<span class="hx-lens-ring hx-lens-ring-2" aria-hidden="true"></span>
					<div class="hx-lens-glass">
						<img src="<?php echo esc_url( $lab_img ); ?>" alt="<?php esc_attr_e( 'Apple Fix repair workstation in Gulariya', 'mobile-pasal' ); ?>" loading="lazy">
						<span class="hx-lens-cross" aria-hidden="true"></span>
						<span class="hx-lens-hud-tl" data-scope-hud>OPTIC: 10X STEREO // ESD SAFE</span>
						<span class="hx-lens-hud-br">PITCH: 0.35MM // 340&deg;C</span>
					</div>
				</div>

				<!-- Interactive Microscope Optics Switcher -->
				<div class="hx-scope-controls" role="group" aria-label="<?php esc_attr_e( 'Microscope magnification mode', 'mobile-pasal' ); ?>">
					<button type="button" class="is-active" data-scope-btn="10x" data-hud="OPTIC: 10X STEREO // ESD SAFE">10x Macro</button>
					<button type="button" data-scope-btn="45x" data-hud="BGA: 45X IC REBALL // 0.02MM">45x Micro-IC</button>
					<button type="button" data-scope-btn="thermal" data-hud="FLIR IR: 38.4°C // SHORT CLEARED">Thermal IR</button>
				</div>

				<!-- Live Oscilloscope Power Rail Trace -->
				<div class="hx-oscilloscope" aria-hidden="true">
					<svg viewBox="0 0 260 32" preserveAspectRatio="none">
						<path class="hx-wave-line" d="M0 16 L30 16 L38 4 L46 28 L54 10 L62 22 L70 16 L120 16 L128 3 L136 29 L144 8 L152 20 L160 16 L210 16 L218 5 L226 27 L234 16 L260 16" fill="none" stroke="currentColor" stroke-width="2"/>
					</svg>
					<span>VDD_MAIN: 4.20V &bull; 0.00A LEAKAGE</span>
				</div>
			</div>

			<ul class="hx-lab-list hx-lab-list-right">
				<?php foreach ( array_slice( $hx_lab_features, 2, 2 ) as $f ) : ?>
					<li class="fade-up"><span class="hx-lab-icon"><i class="fa-solid <?php echo esc_attr( $f[0] ); ?>" aria-hidden="true"></i></span><strong><?php echo esc_html( $f[1] ); ?></strong><p><?php echo esc_html( $f[2] ); ?></p></li>
				<?php endforeach; ?>
			</ul>
		</div>

		<div class="hx-lab-stats fade-up">
			<?php for ( $n = 1; $n <= 3; $n++ ) :
				$defaults = array( 1 => array( '10,000+', 'Repairs Completed' ), 2 => array( '98.5%', 'Success Rate' ), 3 => array( '45 Min', 'Screen Turnaround' ) );
				$num      = mp_opt( 'lab_stat' . $n . '_num', $defaults[ $n ][0] );
				?>
				<div class="hx-stat">
					<strong data-hx-count="<?php echo esc_attr( $num ); ?>"><?php echo esc_html( $num ); ?></strong>
					<span><?php echo esc_html( mp_opt( 'lab_stat' . $n . '_label', $defaults[ $n ][1] ) ); ?></span>
				</div>
			<?php endfor; ?>
			<a class="hx-btn hx-btn-wa" href="<?php echo esc_url( mp_get_whatsapp_link( 'Namaste Apple Fix, mero iPhone check garauna chahanchhu' ) ); ?>" target="_blank" rel="noopener">
				<?php echo $wa_icon; // phpcs:ignore ?><span><?php esc_html_e( 'Talk to a technician', 'mobile-pasal' ); ?></span>
			</a>
		</div>
	</div>
</section>

<!-- =========================================================================
     08. REPAIR MENU: Index list + Interactive Part-Grade Switcher + Track
     ========================================================================= -->
<section id="services" class="hx-services">
	<div class="wrap">
		<header class="hx-head hx-head-split fade-up">
			<div>
				<span class="hx-kicker"><?php esc_html_e( 'Repair menu', 'mobile-pasal' ); ?></span>
				<h2 class="hx-h2"><?php esc_html_e( 'Every fix timed and priced upfront.', 'mobile-pasal' ); ?></h2>
			</div>
			<p class="hx-head-note"><?php esc_html_e( 'Pick a repair on the left and switch between Original Service Pack and Tested OEM grades on the right.', 'mobile-pasal' ); ?></p>
		</header>

		<div class="hx-menu fade-up" data-hx-tabs>
			<div class="hx-menu-list" role="tablist" aria-label="<?php esc_attr_e( 'Repair services', 'mobile-pasal' ); ?>">
				<?php foreach ( $hx_services as $i => $s ) : ?>
					<button type="button" class="hx-menu-item<?php echo 0 === $i ? ' is-active' : ''; ?>" role="tab" id="hx-svc-tab-<?php echo esc_attr( $i ); ?>" aria-controls="hx-svc-panel-<?php echo esc_attr( $i ); ?>" aria-selected="<?php echo 0 === $i ? 'true' : 'false'; ?>" data-hx-tab="<?php echo esc_attr( $i ); ?>">
						<span class="hx-menu-num"><?php echo esc_html( sprintf( '%02d', $i + 1 ) ); ?></span>
						<span class="hx-menu-name"><?php echo esc_html( $s['title'] ); ?></span>
						<span class="hx-menu-time"><?php echo esc_html( $s['turnaround'] ); ?></span>
						<span class="hx-menu-arrow" aria-hidden="true"><?php echo $arrow_icon; // phpcs:ignore ?></span>
					</button>
				<?php endforeach; ?>
			</div>

			<div class="hx-menu-panels">
				<?php foreach ( $hx_services as $i => $s ) : ?>
					<div class="hx-menu-panel<?php echo 0 === $i ? ' is-active' : ''; ?>" role="tabpanel" id="hx-svc-panel-<?php echo esc_attr( $i ); ?>" aria-labelledby="hx-svc-tab-<?php echo esc_attr( $i ); ?>" data-hx-panel="<?php echo esc_attr( $i ); ?>"<?php echo 0 === $i ? '' : ' hidden'; ?>>
						<span class="hx-menu-ghost" aria-hidden="true"><?php echo esc_html( sprintf( '%02d', $i + 1 ) ); ?></span>
						<div class="hx-panel-top-bar">
							<span class="hx-pill" data-grade-badge><?php echo esc_html( $s['badge'] ); ?></span>
							<div class="hx-grade-switch" data-hx-grade>
								<button type="button" class="is-active" data-grade-tier="orig" data-warranty="<?php echo esc_attr( $s['warranty'] ); ?>" data-badge="<?php echo esc_attr( $s['badge'] ); ?>"><?php esc_html_e( 'Original / Service Pack', 'mobile-pasal' ); ?></button>
								<button type="button" data-grade-tier="aaa" data-warranty="<?php esc_attr_e( '30 Days Counter Warranty', 'mobile-pasal' ); ?>" data-badge="<?php esc_attr_e( 'Budget AAA Tested Grade', 'mobile-pasal' ); ?>"><?php esc_html_e( 'Standard AAA Grade', 'mobile-pasal' ); ?></button>
							</div>
						</div>
						<h3><?php echo esc_html( $s['title'] ); ?></h3>
						<p><?php echo esc_html( $s['excerpt'] ); ?></p>
						<dl class="hx-facts">
							<div><dt><?php esc_html_e( 'Turnaround', 'mobile-pasal' ); ?></dt><dd><?php echo esc_html( $s['turnaround'] ); ?></dd></div>
							<div><dt><?php esc_html_e( 'Warranty', 'mobile-pasal' ); ?></dt><dd data-grade-warranty><?php echo esc_html( $s['warranty'] ); ?></dd></div>
							<div><dt><?php esc_html_e( 'Price', 'mobile-pasal' ); ?></dt><dd><?php echo esc_html( $s['price'] ); ?></dd></div>
						</dl>
						<ul class="hx-bench-checks">
							<li><i class="fa-solid fa-check" aria-hidden="true"></i> <?php esc_html_e( 'TrueTone / sensor calibration', 'mobile-pasal' ); ?></li>
							<li><i class="fa-solid fa-check" aria-hidden="true"></i> <?php esc_html_e( 'New dust & water gasket seal', 'mobile-pasal' ); ?></li>
							<li><i class="fa-solid fa-check" aria-hidden="true"></i> <?php esc_html_e( '24-point post-repair check', 'mobile-pasal' ); ?></li>
						</ul>
						<?php if ( ! empty( $s['models'] ) ) : ?>
							<p class="hx-menu-models"><i class="fa-solid fa-mobile-screen" aria-hidden="true"></i> <?php echo esc_html( $s['models'] ); ?></p>
						<?php endif; ?>
						<div class="hx-cta-row">
							<a class="hx-btn hx-btn-ink" href="#repair-builder"><span><?php esc_html_e( 'Build an estimate', 'mobile-pasal' ); ?></span><?php echo $arrow_icon; // phpcs:ignore ?></a>
							<a class="hx-btn hx-btn-line" href="<?php echo esc_url( mp_get_whatsapp_link( 'Namaste Ali Mobile, ' . $s['title'] . ' ko barema jankari dinus' ) ); ?>" target="_blank" rel="noopener"><span><?php esc_html_e( 'Ask on WhatsApp', 'mobile-pasal' ); ?></span></a>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>

		<div class="hx-process fade-up">
			<h3 class="hx-process-title"><?php esc_html_e( 'How a repair works at our counter', 'mobile-pasal' ); ?></h3>
			<ol class="hx-process-track">
				<li>
					<span class="hx-process-node">1</span>
					<span class="hx-process-time"><?php esc_html_e( '5 minutes', 'mobile-pasal' ); ?></span>
					<strong><?php esc_html_e( 'Free check', 'mobile-pasal' ); ?></strong>
					<p><?php esc_html_e( 'We inspect the fault and quote the exact parts cost. No obligation.', 'mobile-pasal' ); ?></p>
				</li>
				<li>
					<span class="hx-process-node">2</span>
					<span class="hx-process-time"><?php esc_html_e( '30-45 minutes', 'mobile-pasal' ); ?></span>
					<strong><?php esc_html_e( 'Fixed in front of you', 'mobile-pasal' ); ?></strong>
					<p><?php esc_html_e( 'Your phone never leaves the counter. Watch it being repaired on our ESD bench.', 'mobile-pasal' ); ?></p>
				</li>
				<li>
					<span class="hx-process-node">3</span>
					<span class="hx-process-time"><?php esc_html_e( 'Before handover', 'mobile-pasal' ); ?></span>
					<strong><?php esc_html_e( 'Tested & warrantied', 'mobile-pasal' ); ?></strong>
					<p><?php esc_html_e( 'Touch, TrueTone, cameras and charging are tested, then you get a written warranty.', 'mobile-pasal' ); ?></p>
				</li>
			</ol>
		</div>
	</div>
</section>

<!-- =========================================================================
     09. CARE GUIDES: Interactive Water Survival Meter + Battery Health Slider
     ========================================================================= -->
<section class="hx-guides">
	<div class="wrap">
		<header class="hx-head hx-head-split fade-up">
			<div>
				<span class="hx-kicker"><?php esc_html_e( 'Interactive Phone First-Aid', 'mobile-pasal' ); ?></span>
				<h2 class="hx-h2"><?php esc_html_e( 'What to do before you reach us.', 'mobile-pasal' ); ?></h2>
			</div>
			<a class="hx-text-link" href="<?php echo esc_url( mp_get_whatsapp_link( 'Namaste, mero phone ma problem chha technical advice chahiyo' ) ); ?>" target="_blank" rel="noopener"><span><?php esc_html_e( 'Ask a technician directly', 'mobile-pasal' ); ?></span><?php echo $arrow_icon; // phpcs:ignore ?></a>
		</header>

		<div class="hx-mag">
			<!-- Interactive Water Damage Triage Card -->
			<article class="hx-mag-feature fade-up" data-hx-triage>
				<img src="<?php echo esc_url( $img_dir . 'tip-water-damage.jpg' ); ?>" alt="" loading="lazy">
				<div class="hx-mag-feature-body">
					<div class="hx-triage-top">
						<span class="hx-pill hx-pill-alert"><i class="fa-solid fa-triangle-exclamation" aria-hidden="true"></i> <?php esc_html_e( 'Liquid emergency triage', 'mobile-pasal' ); ?></span>
						<div class="hx-survival-meter">
							<span><?php esc_html_e( 'Recovery chance:', 'mobile-pasal' ); ?> <strong data-triage-score>45%</strong></span>
							<div class="hx-survival-bar"><i data-triage-bar style="width:45%"></i></div>
						</div>
					</div>
					<h3><?php esc_html_e( 'Phone fell in water? Check each step as you do it:', 'mobile-pasal' ); ?></h3>
					<div class="hx-triage-list">
						<label class="hx-triage-item"><input type="checkbox" checked data-triage-check><span><?php esc_html_e( 'Power it off right away. Do not test buttons.', 'mobile-pasal' ); ?></span></label>
						<label class="hx-triage-item"><input type="checkbox" data-triage-check><span><?php esc_html_e( 'Never plug in a charger while it is wet.', 'mobile-pasal' ); ?></span></label>
						<label class="hx-triage-item"><input type="checkbox" data-triage-check><span><?php esc_html_e( 'Skip the rice — pop out the SIM tray to vent.', 'mobile-pasal' ); ?></span></label>
						<label class="hx-triage-item"><input type="checkbox" data-triage-check><span><?php esc_html_e( 'Bring to our ultrasonic bath within 24 hours.', 'mobile-pasal' ); ?></span></label>
					</div>
					<a class="hx-btn hx-btn-wa" href="<?php echo esc_url( mp_get_whatsapp_link( 'Emergency: Mero phone pani ma paryo, Gulariya counter ma audai chhu' ) ); ?>" target="_blank" rel="noopener"><?php echo $wa_icon; // phpcs:ignore ?><span><?php esc_html_e( 'WhatsApp emergency desk', 'mobile-pasal' ); ?></span></a>
				</div>
			</article>

			<div class="hx-mag-side">
				<article class="hx-mag-card fade-up">
					<div class="hx-mag-thumb"><img src="<?php echo esc_url( $img_dir . 'tip-cracked-screen.jpg' ); ?>" alt="" loading="lazy"></div>
					<div class="hx-mag-card-body">
						<span class="hx-mag-tag"><?php esc_html_e( 'Display', 'mobile-pasal' ); ?></span>
						<h3><?php esc_html_e( 'Cracked screen first-aid', 'mobile-pasal' ); ?></h3>
						<p><?php esc_html_e( 'Avoid pressing on cracks so ink does not bleed into the OLED. Place clear tape over loose glass and back up your data.', 'mobile-pasal' ); ?></p>
						<a class="hx-text-link" href="#repair-builder"><span><?php esc_html_e( 'Estimate a screen repair', 'mobile-pasal' ); ?></span><?php echo $arrow_icon; // phpcs:ignore ?></a>
					</div>
				</article>
				<!-- Interactive Battery Health Diagnostic Slider Card -->
				<article class="hx-mag-card fade-up" data-hx-battery>
					<div class="hx-mag-thumb"><img src="<?php echo esc_url( $img_dir . 'tip-battery-care.jpg' ); ?>" alt="" loading="lazy"></div>
					<div class="hx-mag-card-body">
						<span class="hx-mag-tag"><?php esc_html_e( 'Interactive Battery Check', 'mobile-pasal' ); ?></span>
						<h3><?php esc_html_e( 'Check your Battery Health %', 'mobile-pasal' ); ?></h3>
						<div class="hx-bat-widget">
							<div class="hx-bat-row">
								<span><?php esc_html_e( 'Max Capacity:', 'mobile-pasal' ); ?> <strong data-bat-val>78%</strong></span>
								<span class="hx-bat-status is-warn" data-bat-badge><?php esc_html_e( 'Replace Soon', 'mobile-pasal' ); ?></span>
							</div>
							<input type="range" min="65" max="100" value="78" class="hx-bat-slider" data-bat-slider aria-label="<?php esc_attr_e( 'Slide to your battery health percentage', 'mobile-pasal' ); ?>">
							<small data-bat-note><?php esc_html_e( 'Below 80%: Peak performance drops. 25-min BMS cell swap recommended.', 'mobile-pasal' ); ?></small>
						</div>
						<a class="hx-text-link" href="<?php echo esc_url( mp_get_whatsapp_link( 'Namaste, mero phone ko battery health check / replace garna chahanchhu' ) ); ?>" target="_blank" rel="noopener"><span><?php esc_html_e( 'Book 25-min battery swap', 'mobile-pasal' ); ?></span><?php echo $arrow_icon; // phpcs:ignore ?></a>
					</div>
				</article>
			</div>
		</div>
	</div>
</section>

<!-- =========================================================================
     10. REVIEWS: Scoreboard with 5-Star Histogram + Verified Job Dossier
     ========================================================================= -->
<section class="hx-reviews">
	<div class="wrap hx-reviews-grid">
		<div class="hx-score fade-up">
			<span class="hx-kicker"><?php echo esc_html( mp_opt( 'reviews_kicker', 'Verified Customer Feedback' ) ); ?></span>
			<h2 class="hx-h2"><?php echo esc_html( mp_opt( 'reviews_title', 'What Bardiya Locals Say About Us' ) ); ?></h2>
			<div class="hx-score-row">
				<div>
					<div class="hx-score-num">4.9<span>/5</span></div>
					<div class="hx-score-stars" aria-label="<?php esc_attr_e( 'Rated 4.9 out of 5', 'mobile-pasal' ); ?>">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
				</div>
				<div class="hx-histogram" aria-hidden="true">
					<div><span>5&#9733;</span><i style="--w:94%"></i><em>94%</em></div>
					<div><span>4&#9733;</span><i style="--w:5%"></i><em>5%</em></div>
					<div><span>3&#9733;</span><i style="--w:1%"></i><em>1%</em></div>
				</div>
			</div>
			<p><?php echo esc_html( mp_opt( 'reviews_subtitle', 'Authentic reviews from smartphone buyers and repair clients who chose our counter at Ji. Pra. Ka. Chowk.' ) ); ?></p>
			<a class="hx-btn hx-btn-light" href="<?php echo esc_url( $maps_link ); ?>" target="_blank" rel="noopener"><i class="fa-brands fa-google" aria-hidden="true"></i><span><?php esc_html_e( 'See us on Google', 'mobile-pasal' ); ?></span></a>
		</div>

		<div class="hx-quotes fade-up" data-hx-quotes>
			<div class="hx-quote-stage">
				<?php foreach ( $hx_reviews as $i => $r ) : ?>
					<figure class="hx-quote<?php echo 0 === $i ? ' is-active' : ''; ?>" data-hx-quote="<?php echo esc_attr( $i ); ?>"<?php echo 0 === $i ? '' : ' aria-hidden="true"'; ?>>
						<div class="hx-quote-dossier">
							<span><i class="fa-solid fa-certificate" aria-hidden="true"></i> <?php esc_html_e( 'VERIFIED COUNTER DOSSIER', 'mobile-pasal' ); ?> #0<?php echo esc_html( $i + 1 ); ?></span>
							<?php if ( ! empty( $r['product'] ) ) : ?><em><?php echo esc_html( $r['product'] ); ?></em><?php endif; ?>
						</div>
						<svg class="hx-quote-mark" viewBox="0 0 48 36" aria-hidden="true"><path d="M0 36V22C0 9.6 6.4 2.3 19.2 0l2 4.6C14 6.6 10.6 10.8 10.4 17H20v19H0zm27 0V22C27 9.6 33.4 2.3 46.2 0l1.8 4.6C41 6.6 37.6 10.8 37.4 17H47v19H27z" fill="currentColor"/></svg>
						<blockquote><?php echo esc_html( $r['content'] ); ?></blockquote>
						<figcaption>
							<strong><?php echo esc_html( $r['name'] ); ?></strong>
							<span><i class="fa-solid fa-location-dot" aria-hidden="true"></i> <?php echo esc_html( $r['location'] ); ?></span>
						</figcaption>
					</figure>
				<?php endforeach; ?>
			</div>
			<div class="hx-quote-nav">
				<div class="hx-avatars">
					<?php foreach ( $hx_reviews as $i => $r ) : ?>
						<button type="button" class="hx-avatar<?php echo 0 === $i ? ' is-active' : ''; ?>" data-hx-quote-go="<?php echo esc_attr( $i ); ?>" aria-label="<?php echo esc_attr( sprintf( __( 'Read review by %s', 'mobile-pasal' ), $r['name'] ) ); ?>"><?php echo esc_html( strtoupper( mb_substr( $r['name'], 0, 1 ) ) ); ?></button>
					<?php endforeach; ?>
				</div>
				<div class="hx-arrows">
					<button type="button" class="hx-arrow" data-hx-quote-step="-1" aria-label="<?php esc_attr_e( 'Previous review', 'mobile-pasal' ); ?>"><i class="fa-solid fa-arrow-left" aria-hidden="true"></i></button>
					<button type="button" class="hx-arrow" data-hx-quote-step="1" aria-label="<?php esc_attr_e( 'Next review', 'mobile-pasal' ); ?>"><i class="fa-solid fa-arrow-right" aria-hidden="true"></i></button>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- =========================================================================
     11. VISIT: Map-first hub with Live Nepal Clock (#visit) + VIP Pass Final
     ========================================================================= -->
<section id="visit" class="hx-visit">
	<div class="hx-visit-map">
		<iframe
			src="https://maps.google.com/maps?q=Gulariya+06+Bardiya+Nepal&t=&z=15&ie=UTF8&iwloc=&output=embed"
			loading="lazy"
			referrerpolicy="no-referrer-when-downgrade"
			title="<?php esc_attr_e( 'Ali Mobile Center & Apple Fix location on Google Maps', 'mobile-pasal' ); ?>"></iframe>
	</div>
	<div class="wrap hx-visit-inner">
		<div class="hx-visit-card fade-up">
			<div class="hx-visit-top-bar">
				<div class="hx-status hx-status-card" data-hx-open-status data-open="9" data-close="20">
					<span class="hx-status-dot"></span>
					<span class="hx-status-text"><?php esc_html_e( 'Counter hours', 'mobile-pasal' ); ?></span>
				</div>
				<span class="hx-live-clock" data-hx-clock>NPT --:--</span>
			</div>
			<h2 class="hx-h2"><?php esc_html_e( 'Come say hi in Gulariya.', 'mobile-pasal' ); ?></h2>
			<p class="hx-visit-lead"><?php esc_html_e( 'Walk in for sealed phone unboxings, on-the-spot screen and battery repairs, or genuine accessories. Opposite the District Administration Office.', 'mobile-pasal' ); ?></p>
			<div class="hx-landmarks">
				<span><i class="fa-solid fa-building-columns" aria-hidden="true"></i> <?php esc_html_e( 'Opp. DAO Office', 'mobile-pasal' ); ?></span>
				<span><i class="fa-solid fa-road" aria-hidden="true"></i> <?php esc_html_e( 'Ji. Pra. Ka. Chowk', 'mobile-pasal' ); ?></span>
				<span><i class="fa-solid fa-motorcycle" aria-hidden="true"></i> <?php esc_html_e( 'Free Bike Parking', 'mobile-pasal' ); ?></span>
			</div>
			<ul class="hx-visit-list">
				<li><i class="fa-solid fa-location-dot" aria-hidden="true"></i><div><strong><?php echo esc_html( mp_opt( 'store_name', 'Ali Mobile Center & Apple Fix' ) ); ?></strong><span><?php echo esc_html( mp_opt( 'contact_address', 'Gulariya-06, Ji. Pra. Ka. Chowk, Bardiya, Lumbini Province, Nepal' ) ); ?></span></div></li>
				<li><i class="fa-solid fa-phone" aria-hidden="true"></i><div><strong><a href="tel:+<?php echo esc_attr( $phone_clean ); ?>"><?php echo esc_html( $phone_raw ); ?></a></strong><span><?php esc_html_e( 'Calls & WhatsApp, direct to the technician', 'mobile-pasal' ); ?></span></div></li>
				<li><i class="fa-regular fa-clock" aria-hidden="true"></i><div><strong><?php esc_html_e( 'Opening hours', 'mobile-pasal' ); ?></strong><span><?php echo esc_html( mp_opt( 'contact_hours', 'Sunday - Friday: 9:00 AM - 8:00 PM | Saturday: Open' ) ); ?></span></div></li>
			</ul>
			<div class="hx-cta-row">
				<a class="hx-btn hx-btn-ink" href="<?php echo esc_url( $maps_link ); ?>" target="_blank" rel="noopener"><i class="fa-solid fa-diamond-turn-right" aria-hidden="true"></i><span><?php esc_html_e( 'Get directions', 'mobile-pasal' ); ?></span></a>
				<a class="hx-btn hx-btn-line" href="tel:+<?php echo esc_attr( $phone_clean ); ?>"><i class="fa-solid fa-phone" aria-hidden="true"></i><span><?php esc_html_e( 'Call now', 'mobile-pasal' ); ?></span></a>
			</div>
		</div>
	</div>
</section>

<section class="hx-final">
	<div class="wrap hx-final-inner fade-up">
		<div class="hx-final-copy">
			<span class="hx-final-kicker"><?php esc_html_e( 'Instant Photo Diagnosis & Walk-In Perks', 'mobile-pasal' ); ?></span>
			<h2 class="hx-final-title"><?php esc_html_e( 'Cracked, dead or just slow?', 'mobile-pasal' ); ?> <em><?php esc_html_e( 'Send us a photo.', 'mobile-pasal' ); ?></em></h2>
			<div class="hx-cta-row">
				<a class="hx-btn hx-btn-ink hx-btn-lg" href="<?php echo esc_url( mp_get_whatsapp_link( 'Namaste Ali Mobile, mero phone ko photo pathaudai chhu, check garidinus (Pass: GULARIYA-VIP)' ) ); ?>" target="_blank" rel="noopener"><?php echo $wa_icon; // phpcs:ignore ?><span><?php esc_html_e( 'Chat on WhatsApp', 'mobile-pasal' ); ?></span></a>
				<a class="hx-btn hx-btn-line hx-btn-lg" href="tel:+<?php echo esc_attr( $phone_clean ); ?>"><i class="fa-solid fa-phone" aria-hidden="true"></i><span><?php echo esc_html( $phone_raw ); ?></span></a>
			</div>
		</div>

		<!-- Interactive Perforated Counter Pass Voucher -->
		<div class="hx-voucher" data-hx-voucher="GULARIYA-VIP">
			<div class="hx-voucher-stub">
				<span><?php esc_html_e( 'WALK-IN COUNTER PASS', 'mobile-pasal' ); ?></span>
				<strong><?php esc_html_e( 'FREE 24-POINT CHECK + LENS CLEAN', 'mobile-pasal' ); ?></strong>
				<small><?php esc_html_e( 'Mention or tap to copy code for priority counter service in Gulariya-06', 'mobile-pasal' ); ?></small>
			</div>
			<button type="button" class="hx-voucher-code" data-voucher-copy>
				<span class="hx-code-val">GULARIYA-VIP</span>
				<span class="hx-code-action" data-voucher-status><i class="fa-regular fa-copy" aria-hidden="true"></i> <?php esc_html_e( 'Tap to copy', 'mobile-pasal' ); ?></span>
			</button>
		</div>
	</div>
</section>

<!-- Floating Quick-Jump Studio Dock -->
<nav class="hx-quick-dock" data-hx-dock aria-label="<?php esc_attr_e( 'Quick section navigation', 'mobile-pasal' ); ?>">
	<a href="#categories" class="hx-dock-link"><i class="fa-solid fa-layer-group" aria-hidden="true"></i><span><?php esc_html_e( 'Depts', 'mobile-pasal' ); ?></span></a>
	<a href="#repair-builder" class="hx-dock-link"><i class="fa-solid fa-screwdriver-wrench" aria-hidden="true"></i><span><?php esc_html_e( 'Estimate', 'mobile-pasal' ); ?></span></a>
	<a href="#catalog" class="hx-dock-link"><i class="fa-solid fa-mobile-screen-button" aria-hidden="true"></i><span><?php esc_html_e( 'Phones', 'mobile-pasal' ); ?></span></a>
	<a href="#apple-fix" class="hx-dock-link"><i class="fa-solid fa-microscope" aria-hidden="true"></i><span><?php esc_html_e( '3D Lab', 'mobile-pasal' ); ?></span></a>
	<a href="#services" class="hx-dock-link"><i class="fa-solid fa-clipboard-list" aria-hidden="true"></i><span><?php esc_html_e( 'Menu', 'mobile-pasal' ); ?></span></a>
	<a href="#visit" class="hx-dock-link"><i class="fa-solid fa-location-dot" aria-hidden="true"></i><span><?php esc_html_e( 'Map', 'mobile-pasal' ); ?></span></a>
</nav>

</main>

<?php
get_footer();
