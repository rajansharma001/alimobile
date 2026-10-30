<?php
/**
 * The template for displaying the front page / home page
 *
 * Professional Mobile & Tech Retail Business Shop template:
 *  01. Store Hero: Retail flagship showcase, store status pill, VAT & MDMS assurances
 *  02. Store Value Strip: 4 business guarantees (VAT invoice, MDMS registration, free data setup, on-site lab)
 *  03. Shop Departments: 6 retail shopping category cards + Trade-in exchange bar
 *  04. Retail Showroom & Catalog: Live search, brand filter tabs, stock status, specs, WhatsApp order/reserve
 *  05. Featured Flagship Spotlight: Titanium flagship with finish & storage selector, counter bundle offer
 *  06. Authorized Brand Corners: Apple, Samsung, Google Pixel, OnePlus, Xiaomi, Original Gear
 *  07. On-Site Diagnostic & Repair Desk: Interactive 3-step repair builder + live digital job slip
 *  08. Service Pricing & SLA Menu: Turnaround times, warranty breakdown, 3-step counter process
 *  09. Business Trust & Customer Guarantees: NTA compliance, genuine parts, cashless payment & EMI
 *  10. Verified Customer Reviews: Real client testimonials and ratings from Gulariya & Bardiya locals
 *  11. Store Location & Visit Hub: Live Nepal time open/close status, interactive map, walk-in VIP pass
 *
 * All copy remains editable from Theme Options via mp_opt().
 * Fully compatible with assets/js/main.js & assets/js/home.js.
 *
 * @package Mobile_Pasal
 * @version 5.0.0
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
		'badge'  => mp_opt( 'hero_slide1_badge', 'Official Sealed Stock • NTA MDMS Approved' ),
		'title'  => mp_opt( 'hero_slide1_title', 'Next-Gen Smartphones,' ),
		'hl'     => mp_opt( 'hero_slide1_title_highlight', 'Sealed with Official VAT Bill.' ),
		'desc'   => mp_opt( 'hero_slide1_desc', 'Explore the latest iPhone 16 Pro, Samsung Galaxy S24 Ultra, and Google Pixel 9. 100% genuine sealed handsets with official Nepal warranty, free in-store data migration, and instant WhatsApp counter quotes.' ),
		'btn1'   => mp_opt( 'hero_slide1_btn1_text', 'Shop In-Stock Handsets' ),
		'url1'   => '#catalog',
		'btn2'   => mp_opt( 'hero_slide1_btn2_text', "Ask Today's Best Price" ),
		'url2'   => mp_get_whatsapp_link( 'Namaste Ali Mobile, aaja ko latest smartphone price list dinus' ),
		'img'    => mp_opt( 'hero_slide1_image', '' ) ?: $img_dir . 'hero-iphone-hand.jpg',
		'tag'    => __( 'Flagship Phones', 'mobile-pasal' ),
		'meta'   => 'MDMS VERIFIED • OFFICIAL WARRANTY',
	),
	array(
		'badge'  => mp_opt( 'hero_slide2_badge', 'Certified In-Store Apple Fix Cleanroom Lab' ),
		'title'  => mp_opt( 'hero_slide2_title', 'Phone Problems Fixed' ),
		'hl'     => mp_opt( 'hero_slide2_title_highlight', 'Right in Front of You.' ),
		'desc'   => mp_opt( 'hero_slide2_desc', 'Cracked display, degraded battery, or water damage? Watch our certified technicians repair your device on our ESD workstation. Original-grade parts, TrueTone EEPROM transfer, and written testing warranties.' ),
		'btn1'   => mp_opt( 'hero_slide2_btn1_text', 'Instant Repair Estimate' ),
		'url1'   => '#repair-builder',
		'btn2'   => mp_opt( 'hero_slide2_btn2_text', 'Call Technician' ),
		'url2'   => 'tel:+' . $phone_clean,
		'img'    => mp_opt( 'hero_slide2_image', '' ) ?: $img_dir . 'apple-fix-bench.jpg',
		'tag'    => __( 'Apple Fix Lab', 'mobile-pasal' ),
		'meta'   => '30-45 MIN REPAIR • ESD BENCH',
	),
	array(
		'badge'  => mp_opt( 'hero_slide3_badge', '100% Genuine Power, Audio & Armor' ),
		'title'  => mp_opt( 'hero_slide3_title', 'Original Audio, Chargers' ),
		'hl'     => mp_opt( 'hero_slide3_title_highlight', '& Everyday Protection.' ),
		'desc'   => mp_opt( 'hero_slide3_desc', 'Original Apple 20W/30W PD Fast Chargers, authentic AirPods Pro, Samsung Galaxy Buds, durable MagSafe armor cases, and bubble-free 9H tempered glass installed at the counter in minutes.' ),
		'btn1'   => mp_opt( 'hero_slide3_btn1_text', 'Browse Accessories' ),
		'url1'   => '#categories',
		'btn2'   => mp_opt( 'hero_slide3_btn2_text', 'Order on WhatsApp' ),
		'url2'   => mp_get_whatsapp_link( 'Namaste Ali Mobile, original accessories ko barema bujhna chahanchhu' ),
		'img'    => mp_opt( 'hero_slide3_image', '' ) ?: $img_dir . 'shop-accessories-shelf.jpg',
		'tag'    => __( 'Genuine Accessories', 'mobile-pasal' ),
		'meta'   => 'ORIGINAL CHARGERS • AIRPODS',
	),
);

$ticker_items = array(
	__( 'Official VAT Invoice on All Handsets', 'mobile-pasal' ),
	__( '100% NTA MDMS Registered Stock', 'mobile-pasal' ),
	__( 'Free Walk-in Data Transfer & Setup', 'mobile-pasal' ),
	__( 'Same-Day Screen & Battery Replacement', 'mobile-pasal' ),
	__( 'Smartphone Trade-in & Exchange Available', 'mobile-pasal' ),
	__( 'eSewa, Fonepay & Cashless Accepted', 'mobile-pasal' ),
	__( 'Authentic Apple & Samsung 20W/45W PD Chargers', 'mobile-pasal' ),
	__( 'Opposite District Administration Office, Gulariya-06', 'mobile-pasal' ),
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
			'excerpt'    => wp_trim_words( get_the_excerpt(), 28 ),
			'turnaround' => get_post_meta( $sid, '_mp_service_turnaround', true ) ?: '30-45 Mins',
			'price'      => get_post_meta( $sid, '_mp_service_price', true ) ?: __( 'Quoted at Counter', 'mobile-pasal' ),
			'warranty'   => get_post_meta( $sid, '_mp_service_warranty', true ) ?: __( '90 Days Testing Warranty', 'mobile-pasal' ),
			'badge'      => get_post_meta( $sid, '_mp_service_badge', true ) ?: __( 'Original-Grade Parts', 'mobile-pasal' ),
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
			'brand_name' => ( ! empty( $brand_terms ) && ! is_wp_error( $brand_terms ) ) ? $brand_terms[0]->name : __( 'Smartphone', 'mobile-pasal' ),
			'badge'      => get_post_meta( $pid, '_mp_badge', true ) ?: __( 'Sealed Box', 'mobile-pasal' ),
			'price'      => get_post_meta( $pid, '_mp_price', true ),
			'old_price'  => get_post_meta( $pid, '_mp_old_price', true ),
			'rating'     => get_post_meta( $pid, '_mp_rating', true ) ?: '4.9',
			'reviews'    => get_post_meta( $pid, '_mp_reviews_count', true ) ?: '38',
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
			'product'  => get_post_meta( $rid, '_mp_review_product', true ) ?: 'Verified Store Customer',
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

<main class="front-page-main hx biz-shop">

<!-- =========================================================================
     01. HERO SECTION: Modern Retail Business Showcase
     ========================================================================= -->
<section class="hx-hero biz-hero" data-hx-hero aria-label="<?php esc_attr_e( 'Welcome to Ali Mobile Center', 'mobile-pasal' ); ?>">
	<div class="wrap hx-hero-inner biz-hero-grid">
		<div class="hx-hero-copy biz-hero-content">
			<div class="biz-pill-badge-row">
				<div class="hx-status biz-store-status" data-hx-open-status data-open="9" data-close="20">
					<span class="hx-status-dot"></span>
					<span class="hx-status-text"><?php esc_html_e( 'Gulariya Store: Open Now', 'mobile-pasal' ); ?></span>
					<span class="hx-status-sep" aria-hidden="true">•</span>
					<span><?php esc_html_e( 'Opp. DAO Office', 'mobile-pasal' ); ?></span>
				</div>
				<span class="biz-badge-trust"><i class="fa-solid fa-shield-halved" aria-hidden="true"></i> <?php esc_html_e( 'Authorized MDMS & VAT Billing', 'mobile-pasal' ); ?></span>
			</div>

			<div class="hx-copy-stack biz-copy-stack">
				<?php foreach ( $hx_slides as $i => $s ) : $tag = ( 0 === $i ) ? 'h1' : 'h2'; ?>
					<div class="hx-copy<?php echo 0 === $i ? ' is-active' : ''; ?>" data-hx-copy="<?php echo esc_attr( $i ); ?>"<?php echo 0 === $i ? '' : ' aria-hidden="true"'; ?>>
						<span class="biz-eyebrow"><?php echo esc_html( $s['badge'] ); ?></span>
						<<?php echo $tag; ?> class="biz-hero-title">
							<?php echo esc_html( $s['title'] ); ?>
							<span class="biz-title-gradient"><?php echo esc_html( $s['hl'] ); ?></span>
						</<?php echo $tag; ?>>
						<p class="biz-hero-desc"><?php echo esc_html( $s['desc'] ); ?></p>
						<div class="biz-cta-group">
							<a class="biz-btn biz-btn-primary" href="<?php echo esc_url( $s['url1'] ); ?>">
								<i class="fa-solid fa-bag-shopping" aria-hidden="true"></i>
								<span><?php echo esc_html( $s['btn1'] ); ?></span><?php echo $arrow_icon; // phpcs:ignore ?>
							</a>
							<a class="biz-btn biz-btn-secondary" href="<?php echo esc_url( $s['url2'] ); ?>"<?php echo 0 === strpos( $s['url2'], 'tel:' ) ? '' : ' target="_blank" rel="noopener"'; ?>>
								<?php echo 0 === strpos( $s['url2'], 'tel:' ) ? '<i class="fa-solid fa-phone" aria-hidden="true"></i>' : $wa_icon; // phpcs:ignore ?>
								<span><?php echo esc_html( $s['btn2'] ); ?></span>
							</a>
						</div>
					</div>
				<?php endforeach; ?>
			</div>

			<!-- Quick Slide Department Navigation -->
			<div class="biz-hero-nav" role="tablist" aria-label="<?php esc_attr_e( 'Featured Store Departments', 'mobile-pasal' ); ?>">
				<?php foreach ( $hx_slides as $i => $s ) : ?>
					<button type="button" class="biz-nav-tab<?php echo 0 === $i ? ' is-active' : ''; ?>" data-hx-go="<?php echo esc_attr( $i ); ?>" role="tab" aria-selected="<?php echo 0 === $i ? 'true' : 'false'; ?>">
						<span class="biz-tab-icon"><i class="fa-solid <?php echo 0 === $i ? 'fa-mobile-screen-button' : ( 1 === $i ? 'fa-screwdriver-wrench' : 'fa-headphones' ); ?>" aria-hidden="true"></i></span>
						<div class="biz-tab-text">
							<span class="biz-tab-title"><?php echo esc_html( $s['tag'] ); ?></span>
							<small><?php echo esc_html( $s['meta'] ); ?></small>
						</div>
					</button>
				<?php endforeach; ?>
			</div>
		</div>

		<!-- Right Side: Retail Product Display Stage -->
		<div class="biz-hero-stage-col" data-hx-tilt>
			<div class="biz-stage-card">
				<div class="biz-stage-top-tag">
					<span><i class="fa-solid fa-check-circle" aria-hidden="true"></i> <?php esc_html_e( 'In-Store Ready Stock', 'mobile-pasal' ); ?></span>
					<strong><?php esc_html_e( 'Gulariya-06 Branch', 'mobile-pasal' ); ?></strong>
				</div>
				<div class="hx-deck biz-deck" data-hx-deck>
					<?php foreach ( $hx_slides as $i => $s ) : ?>
						<figure class="hx-deck-card biz-product-card-hero" data-hx-card="<?php echo esc_attr( $i ); ?>" data-pos="<?php echo esc_attr( $i ); ?>">
							<span class="biz-card-badge"><?php echo esc_html( $s['badge'] ); ?></span>
							<div class="biz-deck-img-wrap">
								<img src="<?php echo esc_url( $s['img'] ); ?>" alt="<?php echo esc_attr( $s['tag'] ); ?>"<?php echo 0 === $i ? ' fetchpriority="high"' : ' loading="lazy"'; ?>>
							</div>
							<figcaption class="biz-deck-caption">
								<div>
									<strong><?php echo esc_html( $s['tag'] ); ?></strong>
									<span><?php esc_html_e( 'Authorized Nepal Warranty', 'mobile-pasal' ); ?></span>
								</div>
								<span class="biz-deck-arrow"><?php echo $arrow_icon; // phpcs:ignore ?></span>
							</figcaption>
						</figure>
					<?php endforeach; ?>
				</div>

				<div class="biz-stage-floating-pills">
					<div class="biz-float-pill biz-pill-rating">
						<span class="biz-stars" aria-hidden="true">&#9733;&#9733;&#9733;&#9733;&#9733;</span>
						<strong>4.9 / 5</strong>
						<small><?php esc_html_e( 'Google Customer Score', 'mobile-pasal' ); ?></small>
					</div>
					<div class="biz-float-pill biz-pill-express">
						<div class="biz-pill-icon"><i class="fa-solid fa-bolt" aria-hidden="true"></i></div>
						<div>
							<strong><?php echo esc_html( mp_opt( 'lab_stat3_num', '30-45 Mins' ) ); ?></strong>
							<small><?php esc_html_e( 'Walk-In Repair & Setup', 'mobile-pasal' ); ?></small>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Continuous Retail Store Ticker -->
	<div class="hx-ticker biz-ticker" aria-hidden="true">
		<div class="hx-ticker-track">
			<?php for ( $loop = 0; $loop < 2; $loop++ ) : foreach ( $ticker_items as $t ) : ?>
				<span class="hx-ticker-item"><i></i><?php echo esc_html( $t ); ?></span>
			<?php endforeach; endfor; ?>
		</div>
	</div>
</section>

<!-- =========================================================================
     02. STORE VALUES BAR: 4 Pillars of a Premier Tech Business
     ========================================================================= -->
<section class="biz-trust-strip">
	<div class="wrap biz-trust-grid">
		<div class="biz-trust-item">
			<div class="biz-trust-icon"><i class="fa-solid fa-file-invoice-dollar" aria-hidden="true"></i></div>
			<div>
				<strong><?php esc_html_e( 'Official VAT Invoice', 'mobile-pasal' ); ?></strong>
				<span><?php esc_html_e( '100% tax-paid, genuine stock with authorized warranty', 'mobile-pasal' ); ?></span>
			</div>
		</div>
		<div class="biz-trust-item">
			<div class="biz-trust-icon"><i class="fa-solid fa-mobile-screen" aria-hidden="true"></i></div>
			<div>
				<strong><?php esc_html_e( 'NTA MDMS Registered', 'mobile-pasal' ); ?></strong>
				<span><?php esc_html_e( 'Fully compliant devices; zero risk of network disconnection', 'mobile-pasal' ); ?></span>
			</div>
		</div>
		<div class="biz-trust-item">
			<div class="biz-trust-icon"><i class="fa-solid fa-arrows-spin" aria-hidden="true"></i></div>
			<div>
				<strong><?php esc_html_e( 'Free Data Transfer', 'mobile-pasal' ); ?></strong>
				<span><?php esc_html_e( 'Walk out with contacts, photos & apps ready on your new phone', 'mobile-pasal' ); ?></span>
			</div>
		</div>
		<div class="biz-trust-item">
			<div class="biz-trust-icon"><i class="fa-solid fa-shield-virus" aria-hidden="true"></i></div>
			<div>
				<strong><?php esc_html_e( 'On-Site Apple Fix Lab', 'mobile-pasal' ); ?></strong>
				<span><?php esc_html_e( 'Precision microscope repairs across the counter in Gulariya', 'mobile-pasal' ); ?></span>
			</div>
		</div>
	</div>
</section>

<!-- =========================================================================
     03. SHOP BY DEPARTMENT: Retail Category Cards & Trade-In Bar (#categories)
     ========================================================================= -->
<section id="categories" class="biz-categories-section">
	<div class="wrap">
		<header class="biz-section-head">
			<div>
				<span class="hx-kicker"><?php echo esc_html( mp_opt( 'categories_kicker', 'Store Departments' ) ); ?></span>
				<h2 class="biz-section-title"><?php echo esc_html( mp_opt( 'categories_title', 'Shop by Department' ) ); ?></h2>
			</div>
			<p class="biz-section-sub"><?php echo esc_html( mp_opt( 'categories_subtitle', 'Find authorized flagship smartphones, certified on-site repairs, and original Apple & Samsung gear under one roof in Gulariya.' ) ); ?></p>
		</header>

		<?php
		$biz_departments = array(
			array(
				'title' => __( 'Flagship Handsets & iPhones', 'mobile-pasal' ),
				'desc'  => __( 'Sealed iPhone 16 Series, Galaxy S24 Ultra & Google Pixel with official Nepal VAT billing.', 'mobile-pasal' ),
				'tag'   => __( '50+ In Stock', 'mobile-pasal' ),
				'link'  => '#catalog',
				'img'   => $img_dir . 'iphone-16-colors.jpg',
				'icon'  => 'fa-mobile-screen-button',
			),
			array(
				'title' => __( 'Budget & Mid-Range Phones', 'mobile-pasal' ),
				'desc'  => __( 'Top value Redmi Note, OnePlus Nord & Samsung Galaxy A-series with warranty.', 'mobile-pasal' ),
				'tag'   => __( 'Popular', 'mobile-pasal' ),
				'link'  => '#catalog',
				'img'   => $img_dir . 'hero-iphone-hand.jpg',
				'icon'  => 'fa-tag',
			),
			array(
				'title' => __( 'Apple Fix & Repair Lab', 'mobile-pasal' ),
				'desc'  => __( 'On-site screen replacement, BMS battery health restore & board-level microscope fixes.', 'mobile-pasal' ),
				'tag'   => __( '30-45 Min Fix', 'mobile-pasal' ),
				'link'  => '#repair-builder',
				'img'   => $img_dir . 'apple-fix-bench.jpg',
				'icon'  => 'fa-screwdriver-wrench',
			),
			array(
				'title' => __( 'Original Fast Chargers & Power', 'mobile-pasal' ),
				'desc'  => __( 'Authentic Apple 20W/30W, Samsung 45W GaN adapters, and certified Type-C cables.', 'mobile-pasal' ),
				'tag'   => __( 'Genuine PD', 'mobile-pasal' ),
				'link'  => mp_get_whatsapp_link( 'Namaste Ali Mobile, original charger ko price dinus' ),
				'img'   => $img_dir . 'acc-charger.jpg',
				'icon'  => 'fa-bolt',
			),
			array(
				'title' => __( 'AirPods & Original Audio', 'mobile-pasal' ),
				'desc'  => __( 'Apple AirPods Pro 2, Galaxy Buds3, Bluetooth neckbands and smart audio gear.', 'mobile-pasal' ),
				'tag'   => __( 'ANC Verified', 'mobile-pasal' ),
				'link'  => mp_get_whatsapp_link( 'Namaste Ali Mobile, original earbuds ko price dinus' ),
				'img'   => $img_dir . 'acc-airpods.jpg',
				'icon'  => 'fa-headphones',
			),
			array(
				'title' => __( 'Tough Armor & 9H Glass', 'mobile-pasal' ),
				'desc'  => __( 'MagSafe shockproof cases and edge-to-edge tempered glass fitted bubble-free.', 'mobile-pasal' ),
				'tag'   => __( 'Free Install', 'mobile-pasal' ),
				'link'  => mp_get_whatsapp_link( 'Namaste Ali Mobile, mero phone ko case ra tempered glass chahiyo' ),
				'img'   => $img_dir . 'acc-cases.jpg',
				'icon'  => 'fa-shield-halved',
			),
		);
		?>
		<div class="biz-dept-grid">
			<?php foreach ( $biz_departments as $dept ) :
				$is_ext = 0 === strpos( $dept['link'], 'http' );
				?>
				<a href="<?php echo esc_url( $dept['link'] ); ?>" class="biz-dept-card"<?php echo $is_ext ? ' target="_blank" rel="noopener"' : ''; ?>>
					<div class="biz-dept-thumb">
						<img src="<?php echo esc_url( $dept['img'] ); ?>" alt="<?php echo esc_attr( $dept['title'] ); ?>" loading="lazy">
						<span class="biz-dept-tag"><?php echo esc_html( $dept['tag'] ); ?></span>
					</div>
					<div class="biz-dept-body">
						<div class="biz-dept-header">
							<span class="biz-dept-icon"><i class="fa-solid <?php echo esc_attr( $dept['icon'] ); ?>" aria-hidden="true"></i></span>
							<h3 class="biz-dept-title"><?php echo esc_html( $dept['title'] ); ?></h3>
						</div>
						<p class="biz-dept-desc"><?php echo esc_html( $dept['desc'] ); ?></p>
						<span class="biz-dept-link-text">
							<span><?php esc_html_e( 'Explore Department', 'mobile-pasal' ); ?></span>
							<?php echo $arrow_icon; // phpcs:ignore ?>
						</span>
					</div>
				</a>
			<?php endforeach; ?>
		</div>

		<!-- Interactive Trade-In / Exchange Counter Banner -->
		<div class="biz-tradein-bar" data-hx-tradein>
			<div class="biz-tradein-info">
				<div class="biz-tradein-badge"><i class="fa-solid fa-arrows-rotate" aria-hidden="true"></i> <?php esc_html_e( 'Smartphone Trade-In Program', 'mobile-pasal' ); ?></div>
				<h3 class="biz-tradein-title"><?php esc_html_e( 'Upgrade to a New Phone & Get Instant Counter Credit', 'mobile-pasal' ); ?></h3>
				<p class="biz-tradein-desc"><?php esc_html_e( 'Bring your old phone in any working condition. We evaluate it on the spot and deduct the trade-in amount directly from your new handset invoice.', 'mobile-pasal' ); ?></p>
				<div class="biz-tradein-selectors">
					<div class="biz-select-group" data-trade-tier>
						<span class="biz-select-label"><?php esc_html_e( 'Your Device:', 'mobile-pasal' ); ?></span>
						<div class="biz-pills">
							<button type="button" class="is-active" data-tier="iPhone 13 / 14 / 15 Series" data-min="52000" data-max="95000">iPhone 13–15</button>
							<button type="button" data-tier="iPhone 11 / 12 Series" data-min="26000" data-max="46000">iPhone 11–12</button>
							<button type="button" data-tier="Samsung Galaxy S / Z Series" data-min="38000" data-max="82000">Samsung S / Fold</button>
							<button type="button" data-tier="Mid-Range Android" data-min="12000" data-max="32000">Android Mid-Range</button>
						</div>
					</div>
					<div class="biz-select-group" data-trade-cond>
						<span class="biz-select-label"><?php esc_html_e( 'Condition:', 'mobile-pasal' ); ?></span>
						<div class="biz-pills">
							<button type="button" class="is-active" data-cond="Mint / Clean" data-mult="1">Mint / Flawless</button>
							<button type="button" data-cond="Good / Normal Wear" data-mult="0.82">Normal Wear</button>
							<button type="button" data-cond="Cracked Screen / Low Battery" data-mult="0.58">Cracked / Low Battery</button>
						</div>
					</div>
				</div>
			</div>
			<div class="biz-tradein-valuation-box">
				<span class="biz-val-label"><?php esc_html_e( 'Estimated Counter Value', 'mobile-pasal' ); ?></span>
				<div class="biz-val-amount" data-trade-output>NPR 52,000 – 95,000</div>
				<small data-trade-summary><?php esc_html_e( 'iPhone 13–15 • Mint / Flawless • Deducted from invoice', 'mobile-pasal' ); ?></small>
				<a class="biz-btn biz-btn-primary biz-btn-block" data-trade-wa href="<?php echo esc_url( mp_get_whatsapp_link( 'Namaste Ali Mobile, ma purano phone exchange garna chahanchhu, valuation estimate NPR 52,000 - 95,000 dekhiyo.' ) ); ?>" target="_blank" rel="noopener">
					<?php echo $wa_icon; // phpcs:ignore ?>
					<span><?php esc_html_e( 'Claim Trade-In Value on WhatsApp', 'mobile-pasal' ); ?></span>
				</a>
			</div>
		</div>
	</div>
</section>

<!-- =========================================================================
     04. RETAIL SHOWROOM & PRODUCT CATALOG (#catalog)
     Preserves exact selectors for assets/js/main.js & assets/js/home.js:
     #site-search, #search-clear-btn, .filter-tab-btn, .products-grid, .product-card
     ========================================================================= -->
<section id="catalog" class="biz-catalog-section" data-hx-catalog>
	<div class="wrap">
		<header class="biz-section-head biz-catalog-head">
			<div>
				<span class="hx-kicker"><?php esc_html_e( 'In-Store Inventory', 'mobile-pasal' ); ?></span>
				<h2 class="biz-section-title"><?php esc_html_e( 'Browse Smartphones In Stock', 'mobile-pasal' ); ?></h2>
				<p class="biz-section-sub"><?php esc_html_e( 'All devices are brand-new, sealed in box with official NTA approval and VAT invoice. In-store pickup or local delivery available.', 'mobile-pasal' ); ?></p>
			</div>
			<div class="biz-catalog-tools">
				<div class="biz-view-toggle" role="group" aria-label="<?php esc_attr_e( 'View Mode', 'mobile-pasal' ); ?>">
					<button type="button" class="is-active" data-hx-view="grid" title="<?php esc_attr_e( 'Grid View', 'mobile-pasal' ); ?>"><i class="fa-solid fa-grip" aria-hidden="true"></i></button>
					<button type="button" data-hx-view="table" title="<?php esc_attr_e( 'Spec Sheet Table View', 'mobile-pasal' ); ?>"><i class="fa-solid fa-list-ul" aria-hidden="true"></i></button>
				</div>
				<div class="biz-sort-select-wrap">
					<select data-hx-sort class="biz-sort-select" aria-label="<?php esc_attr_e( 'Sort inventory', 'mobile-pasal' ); ?>">
						<option value="default"><?php esc_html_e( 'Featured Handsets', 'mobile-pasal' ); ?></option>
						<option value="price-asc"><?php esc_html_e( 'Price: Low to High', 'mobile-pasal' ); ?></option>
						<option value="price-desc"><?php esc_html_e( 'Price: High to Low', 'mobile-pasal' ); ?></option>
						<option value="rating"><?php esc_html_e( 'Top Rated (4.9★)', 'mobile-pasal' ); ?></option>
					</select>
				</div>
			</div>
		</header>

		<div class="biz-catalog-layout">
			<!-- Left Sidebar Filter Console -->
			<aside class="biz-catalog-sidebar">
				<div class="biz-search-box" role="search">
					<i class="fa-solid fa-magnifying-glass" aria-hidden="true"></i>
					<input id="site-search" type="search" autocomplete="off" placeholder="<?php esc_attr_e( 'Search model or brand...', 'mobile-pasal' ); ?>" aria-label="<?php esc_attr_e( 'Search phones', 'mobile-pasal' ); ?>">
					<button id="search-clear-btn" class="cat-search-clear" type="button" aria-label="<?php esc_attr_e( 'Clear search', 'mobile-pasal' ); ?>"><i class="fa-solid fa-xmark" aria-hidden="true"></i></button>
				</div>

				<div class="biz-filter-group">
					<span class="biz-filter-title"><?php esc_html_e( 'Filter by Brand', 'mobile-pasal' ); ?></span>
					<div class="biz-filter-tabs" role="tablist" aria-label="<?php esc_attr_e( 'Brand filter', 'mobile-pasal' ); ?>">
						<?php
						$brand_filters = array(
							'all'         => array( __( 'All Handsets', 'mobile-pasal' ), 'fa-layer-group' ),
							'apple'       => array( 'Apple iPhone', 'fa-apple' ),
							'samsung'     => array( 'Samsung Galaxy', 'fa-mobile-screen' ),
							'google'      => array( 'Google Pixel', 'fa-google' ),
							'oneplus'     => array( 'OnePlus', 'fa-plus' ),
							'xiaomi'      => array( 'Xiaomi / Redmi', 'fa-android' ),
							'accessories' => array( __( 'Accessories', 'mobile-pasal' ), 'fa-headphones' ),
						);
						foreach ( $brand_filters as $key => $bf ) :
							$count = 'all' === $key ? count( $hx_products ) : count( array_filter( $hx_products, function ( $p ) use ( $key ) { return $p['brand_slug'] === $key; } ) );
							$icon_cls = 0 === strpos( $bf[1], 'fa-apple' ) || 0 === strpos( $bf[1], 'fa-google' ) || 0 === strpos( $bf[1], 'fa-android' ) ? 'fa-brands ' . $bf[1] : 'fa-solid ' . $bf[1];
							?>
							<button type="button" class="filter-tab-btn biz-filter-btn<?php echo 'all' === $key ? ' active' : ''; ?>" data-filter="<?php echo esc_attr( $key ); ?>">
								<span class="biz-filter-icon"><i class="<?php echo esc_attr( $icon_cls ); ?>" aria-hidden="true"></i></span>
								<span class="biz-filter-name"><?php echo esc_html( $bf[0] ); ?></span>
								<span class="biz-filter-count"><?php echo esc_html( $count ); ?></span>
							</button>
						<?php endforeach; ?>
					</div>
				</div>

				<!-- Fast Stock Inquiry Widget -->
				<div class="biz-side-cta-card">
					<div class="biz-cta-card-icon"><i class="fa-solid fa-headset" aria-hidden="true"></i></div>
					<h4><?php esc_html_e( 'Looking for a Specific Model?', 'mobile-pasal' ); ?></h4>
					<p><?php esc_html_e( 'We receive new official stock weekly and can arrange custom models within 24 hours.', 'mobile-pasal' ); ?></p>
					<a href="<?php echo esc_url( mp_get_whatsapp_link( 'Namaste Ali Mobile, ma specific phone model ko availability bujhna chahanchhu' ) ); ?>" class="biz-btn biz-btn-wa biz-btn-sm" target="_blank" rel="noopener">
						<?php echo $wa_icon; // phpcs:ignore ?>
						<span><?php esc_html_e( 'Inquire on WhatsApp', 'mobile-pasal' ); ?></span>
					</a>
				</div>
			</aside>

			<!-- Product Showcase Grid -->
			<div class="biz-catalog-main">
				<div class="products-grid biz-products-grid" data-hx-products-grid>
					<?php foreach ( $hx_products as $idx => $p ) :
						$numeric_price = (int) preg_replace( '/[^0-9]/', '', (string) $p['price'] );
						?>
						<article class="product-card biz-product-card" data-brand="<?php echo esc_attr( $p['brand_slug'] ); ?>" data-category="smartphones" data-order="<?php echo esc_attr( $idx ); ?>" data-price-num="<?php echo esc_attr( $numeric_price ?: 999999 ); ?>" data-rating-num="<?php echo esc_attr( $p['rating'] ); ?>" data-title="<?php echo esc_attr( $p['title'] ); ?>" data-price-str="<?php echo esc_attr( $p['price'] ?: __( 'Ask Counter', 'mobile-pasal' ) ); ?>">
							<div class="biz-card-thumb-wrap">
								<span class="biz-stock-tag"><i class="fa-solid fa-circle-check" aria-hidden="true"></i> <?php echo esc_html( $p['badge'] ); ?></span>
								<button type="button" class="hx-compare-btn biz-compare-toggle" data-compare-toggle="<?php echo esc_attr( $p['title'] ); ?>" title="<?php esc_attr_e( 'Add to comparison', 'mobile-pasal' ); ?>">
									<i class="fa-solid fa-scale-balanced" aria-hidden="true"></i>
									<span><?php esc_html_e( 'Compare', 'mobile-pasal' ); ?></span>
								</button>
								<img src="<?php echo esc_url( $p['img'] ); ?>" alt="<?php echo esc_attr( $p['title'] ); ?>" loading="lazy">
							</div>
							<div class="biz-card-content">
								<div class="biz-card-brand-meta">
									<span class="biz-brand-name"><?php echo esc_html( $p['brand_name'] ); ?></span>
									<span class="biz-rating"><i class="fa-solid fa-star" aria-hidden="true"></i> <?php echo esc_html( $p['rating'] ); ?> <em>(<?php echo esc_html( $p['reviews'] ); ?>)</em></span>
								</div>
								<h3 class="product-title biz-card-title"><?php echo esc_html( $p['title'] ); ?></h3>
								<p class="product-specs biz-card-specs"><?php echo esc_html( $p['specs'] ); ?></p>
								<div class="biz-card-perks">
									<span><i class="fa-solid fa-file-invoice" aria-hidden="true"></i> <?php esc_html_e( 'VAT Bill Included', 'mobile-pasal' ); ?></span>
									<span><i class="fa-solid fa-rotate" aria-hidden="true"></i> <?php esc_html_e( 'Exchange OK', 'mobile-pasal' ); ?></span>
								</div>
								<div class="biz-card-footer">
									<div class="biz-price-block">
										<?php if ( ! empty( $p['price'] ) ) : ?>
											<span class="biz-price-current"><?php echo esc_html( $p['price'] ); ?></span>
											<?php if ( ! empty( $p['old_price'] ) ) : ?><s class="biz-price-old"><?php echo esc_html( $p['old_price'] ); ?></s><?php endif; ?>
										<?php else : ?>
											<span class="biz-price-current"><?php esc_html_e( 'Best Price at Counter', 'mobile-pasal' ); ?></span>
										<?php endif; ?>
									</div>
									<a class="biz-btn biz-btn-wa-compact" href="<?php echo esc_url( mp_get_whatsapp_link( 'Namaste Ali Mobile, ' . $p['title'] . ' ko best price ra in-stock availability dinus' ) ); ?>" target="_blank" rel="noopener" aria-label="<?php echo esc_attr( sprintf( __( 'Ask price for %s on WhatsApp', 'mobile-pasal' ), $p['title'] ) ); ?>">
										<?php echo $wa_icon; // phpcs:ignore ?>
										<span><?php esc_html_e( 'Ask / Order', 'mobile-pasal' ); ?></span>
									</a>
								</div>
							</div>
						</article>
					<?php endforeach; ?>
				</div>

				<!-- Live Comparison Tray -->
				<div class="hx-compare-tray biz-compare-tray" data-hx-compare-tray hidden>
					<div class="biz-compare-info">
						<strong><i class="fa-solid fa-scale-balanced" aria-hidden="true"></i> <?php esc_html_e( 'Phone Comparison Tray', 'mobile-pasal' ); ?> (<span data-compare-count>0</span>/3)</strong>
						<button type="button" class="biz-compare-clear" data-compare-clear><?php esc_html_e( 'Clear All', 'mobile-pasal' ); ?></button>
					</div>
					<div class="biz-compare-slots" data-compare-slots></div>
					<a class="biz-btn biz-btn-primary biz-btn-sm" data-compare-wa href="<?php echo esc_url( mp_get_whatsapp_link() ); ?>" target="_blank" rel="noopener">
						<?php echo $wa_icon; // phpcs:ignore ?>
						<span><?php esc_html_e( 'Get Compare Recommendation on WhatsApp', 'mobile-pasal' ); ?></span>
					</a>
				</div>

				<!-- Empty State Notice -->
				<div id="catalog-empty-notice" class="catalog-empty-notice biz-empty-state" aria-live="polite">
					<div class="biz-empty-icon"><i class="fa-solid fa-box-open" aria-hidden="true"></i></div>
					<h3><?php esc_html_e( 'No Matching Phones Found', 'mobile-pasal' ); ?></h3>
					<p><?php esc_html_e( 'We may have this model in our offline backroom inventory. Chat with our technician directly on WhatsApp.', 'mobile-pasal' ); ?></p>
					<a class="biz-btn biz-btn-wa" href="<?php echo esc_url( mp_get_whatsapp_link() ); ?>" target="_blank" rel="noopener">
						<?php echo $wa_icon; // phpcs:ignore ?>
						<span><?php esc_html_e( 'Ask Store Concierge on WhatsApp', 'mobile-pasal' ); ?></span>
					</a>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- =========================================================================
     05. FEATURED DEAL OF THE MONTH: Flagship Stage & Configurator (#deal)
     ========================================================================= -->
<?php
$spotlight_img = mp_opt( 'spotlight_image', '' ) ?: $img_dir . 'iphone-16-pro-max.jpg';
$spot_title    = mp_opt( 'spotlight_title', 'iPhone 16 Pro & Pro Max' );
?>
<section id="deal" class="biz-deal-section" data-hx-spot data-finish="desert">
	<div class="wrap">
		<div class="biz-deal-container">
			<div class="biz-deal-copy">
				<div class="biz-deal-badge">
					<i class="fa-brands fa-apple" aria-hidden="true"></i>
					<span><?php echo esc_html( mp_opt( 'spotlight_badge', 'Official Flagship of the Month' ) ); ?></span>
				</div>
				<h2 class="biz-deal-title"><?php echo esc_html( $spot_title ); ?></h2>
				<p class="biz-deal-sub"><?php echo esc_html( mp_opt( 'spotlight_subtitle', 'Grade 5 Titanium design, A18 Pro silicon, 48MP Fusion camera system, and all-day battery life. Official sealed stock available with VAT bill & authorized Nepal warranty.' ) ); ?></p>

				<!-- Specifications Checklist -->
				<div class="biz-deal-spec-grid">
					<div class="biz-spec-pill">
						<i class="fa-solid fa-microchip" aria-hidden="true"></i>
						<div>
							<small><?php esc_html_e( 'Processor', 'mobile-pasal' ); ?></small>
							<strong><?php echo esc_html( mp_opt( 'spotlight_chip', 'A18 Pro Silicon' ) ); ?></strong>
						</div>
					</div>
					<div class="biz-spec-pill">
						<i class="fa-solid fa-camera" aria-hidden="true"></i>
						<div>
							<small><?php esc_html_e( 'Optics', 'mobile-pasal' ); ?></small>
							<strong><?php echo esc_html( mp_opt( 'spotlight_camera', '48MP Fusion + 5x Telephoto' ) ); ?></strong>
						</div>
					</div>
					<div class="biz-spec-pill">
						<i class="fa-solid fa-shield-halved" aria-hidden="true"></i>
						<div>
							<small><?php esc_html_e( 'Material', 'mobile-pasal' ); ?></small>
							<strong data-spot-finish-text><?php echo esc_html( mp_opt( 'spotlight_finish', 'Desert Titanium' ) ); ?></strong>
						</div>
					</div>
					<div class="biz-spec-pill">
						<i class="fa-solid fa-receipt" aria-hidden="true"></i>
						<div>
							<small><?php esc_html_e( 'Assurance', 'mobile-pasal' ); ?></small>
							<strong><?php esc_html_e( 'VAT Bill + 1-Yr AppleCare', 'mobile-pasal' ); ?></strong>
						</div>
					</div>
				</div>

				<!-- Color & Storage Selector -->
				<div class="biz-deal-configurator">
					<div class="biz-config-group">
						<span class="biz-config-label"><?php esc_html_e( 'Choose Finish:', 'mobile-pasal' ); ?></span>
						<div class="hx-swatches biz-swatches" role="radiogroup" aria-label="<?php esc_attr_e( 'Choose finish', 'mobile-pasal' ); ?>">
							<button type="button" class="hx-swatch is-active" data-finish-key="desert" data-finish-name="Desert Titanium" style="--sw:#c5a888" title="Desert Titanium"><span></span><em>Desert</em></button>
							<button type="button" class="hx-swatch" data-finish-key="natural" data-finish-name="Natural Titanium" style="--sw:#a8a49d" title="Natural Titanium"><span></span><em>Natural</em></button>
							<button type="button" class="hx-swatch" data-finish-key="white" data-finish-name="White Titanium" style="--sw:#f1f0ec" title="White Titanium"><span></span><em>White</em></button>
							<button type="button" class="hx-swatch" data-finish-key="black" data-finish-name="Black Titanium" style="--sw:#383b40" title="Black Titanium"><span></span><em>Black</em></button>
						</div>
					</div>
					<div class="biz-config-group">
						<span class="biz-config-label"><?php esc_html_e( 'Capacity:', 'mobile-pasal' ); ?></span>
						<div class="hx-storages biz-storages" role="radiogroup" aria-label="<?php esc_attr_e( 'Choose capacity', 'mobile-pasal' ); ?>">
							<button type="button" class="hx-storage" data-storage="128GB">128GB</button>
							<button type="button" class="hx-storage is-active" data-storage="256GB">256GB</button>
							<button type="button" class="hx-storage" data-storage="512GB">512GB</button>
							<button type="button" class="hx-storage" data-storage="1TB">1TB</button>
						</div>
					</div>
				</div>

				<div class="biz-deal-cta-row">
					<a class="biz-btn biz-btn-primary biz-btn-lg" data-spot-wa href="<?php echo esc_url( mp_get_whatsapp_link( 'Namaste Ali Mobile, iPhone 16 Pro (Desert Titanium, 256GB) ko aaja ko price ra availability dinus' ) ); ?>" target="_blank" rel="noopener">
						<?php echo $wa_icon; // phpcs:ignore ?>
						<span data-spot-cta-label><?php esc_html_e( 'Reserve Desert Titanium (256GB) on WhatsApp', 'mobile-pasal' ); ?></span>
					</a>
					<a class="biz-btn biz-btn-secondary biz-btn-lg" href="#catalog" data-hx-filter-jump="apple">
						<span><?php esc_html_e( 'See All Apple Handsets', 'mobile-pasal' ); ?></span>
						<?php echo $arrow_icon; // phpcs:ignore ?>
					</a>
				</div>
			</div>

			<!-- Product Showcase Image -->
			<div class="biz-deal-media">
				<div class="biz-deal-visual-card">
					<img src="<?php echo esc_url( $spotlight_img ); ?>" alt="<?php echo esc_attr( $spot_title ); ?>" loading="lazy">
					<div class="biz-deal-floating-badge">
						<span class="hx-status-dot"></span>
						<span data-spot-summary><?php esc_html_e( 'Desert Titanium • 256GB • Sealed Box', 'mobile-pasal' ); ?></span>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- =========================================================================
     06. AUTHORIZED BRAND CORNERS (#brands)
     ========================================================================= -->
<?php
$biz_brands = array(
	array( 'apple', 'Apple', __( 'iPhone, iPad & Apple Fix', 'mobile-pasal' ), 'fa-brands fa-apple' ),
	array( 'samsung', 'Samsung', __( 'Galaxy S24, Z Fold & A-Series', 'mobile-pasal' ), 'fa-solid fa-mobile-screen-button' ),
	array( 'google', 'Google Pixel', __( 'Pixel 9 & Tensor Silicon', 'mobile-pasal' ), 'fa-brands fa-google' ),
	array( 'oneplus', 'OnePlus', __( 'OnePlus 12 & Nord Series', 'mobile-pasal' ), 'fa-solid fa-bolt' ),
	array( 'xiaomi', 'Xiaomi', __( 'Xiaomi 14 & Redmi Note', 'mobile-pasal' ), 'fa-solid fa-microchip' ),
	array( 'accessories', __( 'Original Gear', 'mobile-pasal' ), __( 'Anker, Apple, PD Chargers', 'mobile-pasal' ), 'fa-solid fa-headphones' ),
);
?>
<section id="brands" class="biz-brands-section" data-hx-brands>
	<div class="wrap">
		<header class="biz-section-head biz-brands-head">
			<div>
				<span class="hx-kicker"><?php echo esc_html( mp_opt( 'brands_kicker', 'Authorized Ecosystem' ) ); ?></span>
				<h2 class="biz-section-title"><?php echo esc_html( mp_opt( 'brands_title', 'Top Smartphone Brands In Store' ) ); ?></h2>
			</div>
			<p class="biz-section-sub"><?php echo esc_html( mp_opt( 'brands_subtitle', 'Tap any brand below to filter the showroom inventory directly.' ) ); ?></p>
		</header>

		<div class="brands-grid biz-brands-grid">
			<?php foreach ( $biz_brands as $b ) : ?>
				<button type="button" class="brand-card-link biz-brand-card" data-filter-brand="<?php echo esc_attr( $b[0] ); ?>">
					<div class="biz-brand-icon"><i class="<?php echo esc_attr( $b[3] ); ?>" aria-hidden="true"></i></div>
					<strong class="biz-brand-title"><?php echo esc_html( $b[1] ); ?></strong>
					<span class="biz-brand-sub"><?php echo esc_html( $b[2] ); ?></span>
					<span class="biz-brand-filter-pill"><?php esc_html_e( 'View Handsets →', 'mobile-pasal' ); ?></span>
				</button>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<!-- =========================================================================
     07. IN-STORE DIAGNOSTIC & REPAIR DESK (#repair-builder)
     Preserves exact selectors for assets/js/main.js & assets/js/home.js:
     #repair-builder, .device-pills-grid, .dev-pill-btn, .fault-cards-grid,
     .fault-select-card, #builder-model-input, .quick-chip-btn, #ticket-device-val,
     #ticket-model-val, #ticket-fault-val, #ticket-time-val, #ticket-warranty-val,
     #builder-preview-text, #builder-send-whatsapp-btn
     ========================================================================= -->
<section id="repair-builder" class="biz-repair-section" data-hx-workbench>
	<div class="wrap">
		<header class="biz-section-head hx-on-dark">
			<div>
				<span class="hx-kicker"><?php echo esc_html( mp_opt( 'repair_kicker', 'In-Store Repair Department' ) ); ?></span>
				<h2 class="biz-section-title"><?php echo esc_html( mp_opt( 'repair_title', 'Phone Problem? Get a Direct Counter Estimate' ) ); ?></h2>
			</div>
			<p class="biz-section-sub"><?php echo esc_html( mp_opt( 'repair_subtitle', 'Select your device and fault below. Your service estimate prints automatically on the digital job docket on the right. Send it to our technician for priority bench queueing.' ) ); ?></p>
		</header>

		<div class="biz-repair-grid">
			<!-- Step Picker -->
			<div class="biz-repair-steps">
				<!-- Step 1: Device -->
				<div class="biz-step-card">
					<div class="biz-step-header">
						<span class="biz-step-num">1</span>
						<div>
							<h3 class="biz-step-title"><?php esc_html_e( 'Which Phone Brand?', 'mobile-pasal' ); ?></h3>
							<small><?php esc_html_e( 'Select your device brand for specialized diagnostics', 'mobile-pasal' ); ?></small>
						</div>
					</div>
					<div class="device-pills-grid biz-device-grid" data-group="device">
						<?php
						$devices = array(
							array( 'Apple iPhone', 'fa-brands fa-apple' ),
							array( 'Samsung Galaxy', 'fa-solid fa-mobile-screen' ),
							array( 'Google Pixel', 'fa-brands fa-google' ),
							array( 'OnePlus', 'fa-solid fa-plus' ),
							array( 'Xiaomi / Redmi', 'fa-brands fa-android' ),
							array( 'Other Android', 'fa-solid fa-mobile-retro' ),
						);
						foreach ( $devices as $i => $dv ) :
							?>
							<button type="button" class="dev-pill-btn biz-dev-pill<?php echo 0 === $i ? ' active' : ''; ?>" data-device="<?php echo esc_attr( $dv[0] ); ?>">
								<i class="<?php echo esc_attr( $dv[1] ); ?>" aria-hidden="true"></i>
								<span><?php echo esc_html( $dv[0] ); ?></span>
							</button>
						<?php endforeach; ?>
					</div>
				</div>

				<!-- Step 2: Fault Selection -->
				<div class="biz-step-card">
					<div class="biz-step-header">
						<span class="biz-step-num">2</span>
						<div>
							<h3 class="biz-step-title"><?php esc_html_e( 'What is the Problem?', 'mobile-pasal' ); ?></h3>
							<small><?php esc_html_e( 'Select the primary issue for parts quotation & bench turnaround', 'mobile-pasal' ); ?></small>
						</div>
					</div>
					<div class="fault-cards-grid biz-fault-grid">
						<?php
						$faults = array(
							array( 'Screen & Display', 'Cracked glass, lines, touch dead', 'Screen & Display (Cracked glass / black spots / touch dead)', '30-45 Mins', '90 Days Testing Warranty', 'fa-mobile-screen-button', 'screen', 'OLED Panel & Digitizer Ribbon' ),
							array( 'Battery & BMS', 'Fast drain, shutdowns, swollen cell', 'Battery Replacement (Fast drain / sudden shutdown / swollen)', '20-30 Mins', '6 Months Battery Warranty', 'fa-battery-quarter', 'battery', 'Lithium Cell & BMS Health Tag-On' ),
							array( 'Charging & Port', 'Slow, loose or zero charge input', 'Charging & Port (Slow charging / loose port / cable angle)', '30 Mins', '30 Days Service Warranty', 'fa-plug-circle-bolt', 'port', 'USB-C / Lightning Flex Assembly' ),
							array( 'Water Damage', 'Dropped in liquid, no power on', 'Water Damage (Dropped in water / ultrasonic clean / IC)', '1-2 Hours', 'Component Warranty', 'fa-droplet', 'water', 'Full Board Ultrasonic De-Oxidation' ),
							array( 'Camera & Audio', 'Blurry lens, mic or speaker muffled', 'Camera & Sound (Mic not working / speaker muffled / camera)', '45 Mins', '60 Days Testing Warranty', 'fa-camera', 'camera', 'Camera Sensor Module & Speaker' ),
							array( 'Motherboard IC', 'No boot, no network, IC micro-solder', 'Motherboard Micro-Soldering (No power / no network / IC fault)', '1-2 Days', 'Component Warranty', 'fa-microchip', 'board', 'Power Management PMIC / Baseband' ),
						);
						foreach ( $faults as $i => $f ) :
							?>
							<button type="button" class="fault-select-card biz-fault-card<?php echo 0 === $i ? ' active' : ''; ?>" data-issue="<?php echo esc_attr( $f[2] ); ?>" data-time="<?php echo esc_attr( $f[3] ); ?>" data-warranty="<?php echo esc_attr( $f[4] ); ?>" data-hx-zone="<?php echo esc_attr( $f[6] ); ?>" data-hx-zone-label="<?php echo esc_attr( $f[7] ); ?>">
								<span class="biz-fault-icon"><i class="fa-solid <?php echo esc_attr( $f[5] ); ?>" aria-hidden="true"></i></span>
								<div class="biz-fault-details">
									<strong><?php echo esc_html( $f[0] ); ?></strong>
									<small><?php echo esc_html( $f[1] ); ?></small>
								</div>
								<span class="biz-fault-time-tag"><?php echo esc_html( $f[3] ); ?></span>
							</button>
						<?php endforeach; ?>
					</div>
				</div>

				<!-- Step 3: Exact Model Input -->
				<div class="biz-step-card">
					<div class="biz-step-header">
						<span class="biz-step-num">3</span>
						<div>
							<h3 class="biz-step-title"><?php esc_html_e( 'Exact Model (Optional)', 'mobile-pasal' ); ?></h3>
							<small><?php esc_html_e( 'Type or tap your model to check instant parts stock', 'mobile-pasal' ); ?></small>
						</div>
					</div>
					<label class="screen-reader-text" for="builder-model-input"><?php esc_html_e( 'Phone model', 'mobile-pasal' ); ?></label>
					<input id="builder-model-input" class="biz-text-input" type="text" autocomplete="off" placeholder="<?php esc_attr_e( 'e.g. iPhone 13 Pro, Galaxy S23, Redmi Note 13', 'mobile-pasal' ); ?>">
					<div class="biz-chip-suggestions">
						<span class="biz-chip-label"><?php esc_html_e( 'Quick picks:', 'mobile-pasal' ); ?></span>
						<?php foreach ( array( 'iPhone 15 Pro Max', 'iPhone 13', 'Galaxy S23 Ultra', 'Redmi Note 13 Pro' ) as $m ) : ?>
							<button type="button" class="quick-chip-btn biz-chip" data-model="<?php echo esc_attr( $m ); ?>"><?php echo esc_html( $m ); ?></button>
						<?php endforeach; ?>
					</div>
				</div>
			</div>

			<!-- Right Side: Digital Service Docket -->
			<aside class="biz-receipt-aside" aria-label="<?php esc_attr_e( 'Digital Service Slip', 'mobile-pasal' ); ?>">
				<div class="biz-docket-card" data-hx-receipt>
					<div class="biz-docket-header">
						<div class="biz-docket-brand">
							<strong><?php echo esc_html( mp_opt( 'store_name', 'Ali Mobile Center & Apple Fix' ) ); ?></strong>
							<span><?php esc_html_e( 'Gulariya-06, Bardiya • Ph: 9804530786', 'mobile-pasal' ); ?></span>
						</div>
						<span class="biz-docket-id"><?php echo esc_html( 'DOCKET #' . wp_date( 'md' ) . '-' . wp_date( 'Hi' ) ); ?></span>
					</div>

					<div class="biz-docket-hardware-notice">
						<i class="fa-solid fa-circle-check" aria-hidden="true"></i>
						<span><?php esc_html_e( 'Certified Cleanroom ESD Workstation Diagnostics', 'mobile-pasal' ); ?></span>
					</div>

					<dl class="biz-docket-specs">
						<div class="biz-docket-row">
							<dt><?php esc_html_e( 'Selected Brand', 'mobile-pasal' ); ?></dt>
							<dd id="ticket-device-val">Apple iPhone</dd>
						</div>
						<div class="biz-docket-row">
							<dt><?php esc_html_e( 'Device Model', 'mobile-pasal' ); ?></dt>
							<dd id="ticket-model-val"><?php esc_html_e( 'Specified at Counter', 'mobile-pasal' ); ?></dd>
						</div>
						<div class="biz-docket-row">
							<dt><?php esc_html_e( 'Primary Issue', 'mobile-pasal' ); ?></dt>
							<dd id="ticket-fault-val">Screen &amp; Display</dd>
						</div>
						<div class="biz-docket-row">
							<dt><?php esc_html_e( 'Estimated Bench Time', 'mobile-pasal' ); ?></dt>
							<dd id="ticket-time-val">30-45 Mins</dd>
						</div>
						<div class="biz-docket-row">
							<dt><?php esc_html_e( 'Written Warranty', 'mobile-pasal' ); ?></dt>
							<dd id="ticket-warranty-val">90 Days Testing Warranty</dd>
						</div>
						<div class="biz-docket-row biz-docket-total">
							<dt><?php esc_html_e( 'Counter Inspection', 'mobile-pasal' ); ?></dt>
							<dd class="biz-free-tag"><?php esc_html_e( 'FREE (0 NPR)', 'mobile-pasal' ); ?></dd>
						</div>
					</dl>

					<div class="biz-docket-preview">
						<span><?php esc_html_e( 'Technician Message Preview:', 'mobile-pasal' ); ?></span>
						<p id="builder-preview-text"></p>
					</div>

					<div class="biz-docket-barcode" aria-hidden="true"></div>

					<div class="biz-docket-actions">
						<a id="builder-send-whatsapp-btn" class="biz-btn biz-btn-primary biz-btn-block" href="<?php echo esc_url( mp_get_whatsapp_link() ); ?>" target="_blank" rel="noopener">
							<?php echo $wa_icon; // phpcs:ignore ?>
							<span><?php esc_html_e( 'Send Slip & Reserve Bench on WhatsApp', 'mobile-pasal' ); ?></span>
						</a>
						<a class="biz-btn biz-btn-secondary biz-btn-block" href="tel:+<?php echo esc_attr( $phone_clean ); ?>">
							<i class="fa-solid fa-phone" aria-hidden="true"></i>
							<span><?php esc_html_e( 'Call Technician Directly', 'mobile-pasal' ); ?></span>
						</a>
					</div>
				</div>
			</aside>
		</div>
	</div>
</section>

<!-- =========================================================================
     08. SERVICE PRICING & SLA MENU (#services)
     ========================================================================= -->
<section id="services" class="biz-services-section">
	<div class="wrap">
		<header class="biz-section-head">
			<div>
				<span class="hx-kicker"><?php esc_html_e( 'Transparent Pricing & SLA', 'mobile-pasal' ); ?></span>
				<h2 class="biz-section-title"><?php esc_html_e( 'In-Shop Repair Menu & Turnaround', 'mobile-pasal' ); ?></h2>
			</div>
			<p class="biz-section-sub"><?php esc_html_e( 'Every repair is timed and quoted upfront. All screen and battery replacements include dust and water gasket seals.', 'mobile-pasal' ); ?></p>
		</header>

		<div class="biz-services-grid" data-hx-tabs>
			<div class="biz-service-list" role="tablist" aria-label="<?php esc_attr_e( 'Repair services', 'mobile-pasal' ); ?>">
				<?php foreach ( $hx_services as $i => $s ) : ?>
					<button type="button" class="biz-service-tab<?php echo 0 === $i ? ' is-active' : ''; ?>" role="tab" id="hx-svc-tab-<?php echo esc_attr( $i ); ?>" aria-controls="hx-svc-panel-<?php echo esc_attr( $i ); ?>" aria-selected="<?php echo 0 === $i ? 'true' : 'false'; ?>" data-hx-tab="<?php echo esc_attr( $i ); ?>">
						<span class="biz-service-num"><?php echo esc_html( sprintf( '%02d', $i + 1 ) ); ?></span>
						<div class="biz-service-tab-body">
							<strong class="biz-service-tab-title"><?php echo esc_html( $s['title'] ); ?></strong>
							<small><?php echo esc_html( $s['turnaround'] ); ?> &bull; <?php echo esc_html( $s['warranty'] ); ?></small>
						</div>
						<span class="biz-service-tab-arrow"><?php echo $arrow_icon; // phpcs:ignore ?></span>
					</button>
				<?php endforeach; ?>
			</div>

			<div class="biz-service-detail-view">
				<?php foreach ( $hx_services as $i => $s ) : ?>
					<div class="biz-service-panel<?php echo 0 === $i ? ' is-active' : ''; ?>" role="tabpanel" id="hx-svc-panel-<?php echo esc_attr( $i ); ?>" aria-labelledby="hx-svc-tab-<?php echo esc_attr( $i ); ?>" data-hx-panel="<?php echo esc_attr( $i ); ?>"<?php echo 0 === $i ? '' : ' hidden'; ?>>
						<div class="biz-panel-badge-row">
							<span class="biz-panel-badge" data-grade-badge><?php echo esc_html( $s['badge'] ); ?></span>
							<div class="hx-grade-switch biz-grade-toggle" data-hx-grade>
								<button type="button" class="is-active" data-grade-tier="orig" data-warranty="<?php echo esc_attr( $s['warranty'] ); ?>" data-badge="<?php echo esc_attr( $s['badge'] ); ?>">Original Service-Pack</button>
								<button type="button" data-grade-tier="aaa" data-warranty="<?php esc_attr_e( '30 Days Testing Warranty', 'mobile-pasal' ); ?>" data-badge="<?php esc_attr_e( 'Budget Tested AAA Grade', 'mobile-pasal' ); ?>">Tested AAA Grade</button>
							</div>
						</div>
						<h3 class="biz-panel-title"><?php echo esc_html( $s['title'] ); ?></h3>
						<p class="biz-panel-excerpt"><?php echo esc_html( $s['excerpt'] ); ?></p>

						<div class="biz-panel-metrics">
							<div class="biz-metric-item">
								<small><?php esc_html_e( 'Turnaround Time', 'mobile-pasal' ); ?></small>
								<strong><?php echo esc_html( $s['turnaround'] ); ?></strong>
							</div>
							<div class="biz-metric-item">
								<small><?php esc_html_e( 'Written Warranty', 'mobile-pasal' ); ?></small>
								<strong data-grade-warranty><?php echo esc_html( $s['warranty'] ); ?></strong>
							</div>
							<div class="biz-metric-item">
								<small><?php esc_html_e( 'Starting Quote', 'mobile-pasal' ); ?></small>
								<strong><?php echo esc_html( $s['price'] ); ?></strong>
							</div>
						</div>

						<ul class="biz-panel-checklist">
							<li><i class="fa-solid fa-check" aria-hidden="true"></i> <?php esc_html_e( 'TrueTone & biometric sensor data transferred', 'mobile-pasal' ); ?></li>
							<li><i class="fa-solid fa-check" aria-hidden="true"></i> <?php esc_html_e( 'New waterproof dust gasket seal installed', 'mobile-pasal' ); ?></li>
							<li><i class="fa-solid fa-check" aria-hidden="true"></i> <?php esc_html_e( '24-point quality testing before device handover', 'mobile-pasal' ); ?></li>
						</ul>

						<div class="biz-panel-cta-group">
							<a class="biz-btn biz-btn-primary" href="#repair-builder">
								<span><?php esc_html_e( 'Get Direct Repair Quote', 'mobile-pasal' ); ?></span>
								<?php echo $arrow_icon; // phpcs:ignore ?>
							</a>
							<a class="biz-btn biz-btn-secondary" href="<?php echo esc_url( mp_get_whatsapp_link( 'Namaste Ali Mobile, ' . $s['title'] . ' ko barema quotation dinus' ) ); ?>" target="_blank" rel="noopener">
								<?php echo $wa_icon; // phpcs:ignore ?>
								<span><?php esc_html_e( 'Inquire on WhatsApp', 'mobile-pasal' ); ?></span>
							</a>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>

		<!-- 3-Step Walk-In Workflow -->
		<div class="biz-workflow-box">
			<h4 class="biz-workflow-heading"><?php esc_html_e( 'How Walk-In Repairs Work at Our Counter', 'mobile-pasal' ); ?></h4>
			<div class="biz-workflow-steps">
				<div class="biz-wf-step">
					<div class="biz-wf-num">1</div>
					<strong><?php esc_html_e( 'Free Inspection (5 Mins)', 'mobile-pasal' ); ?></strong>
					<p><?php esc_html_e( 'We inspect your device at the counter and give an exact cost quote. Zero diagnostic fee.', 'mobile-pasal' ); ?></p>
				</div>
				<div class="biz-wf-step">
					<div class="biz-wf-num">2</div>
					<strong><?php esc_html_e( 'Fixed In Front of You', 'mobile-pasal' ); ?></strong>
					<p><?php esc_html_e( 'Your device never leaves the room. Watch it repaired on our ESD workstation in 30-45 mins.', 'mobile-pasal' ); ?></p>
				</div>
				<div class="biz-wf-step">
					<div class="biz-wf-num">3</div>
					<strong><?php esc_html_e( 'Tested with Warranty', 'mobile-pasal' ); ?></strong>
					<p><?php esc_html_e( 'Display touch, cameras, charging and audio tested thoroughly before handover with written warranty.', 'mobile-pasal' ); ?></p>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- =========================================================================
     09. VERIFIED REVIEWS & STORE RATINGS (#reviews)
     ========================================================================= -->
<section class="biz-reviews-section">
	<div class="wrap biz-reviews-layout">
		<div class="biz-reputation-card">
			<span class="hx-kicker"><?php echo esc_html( mp_opt( 'reviews_kicker', 'Customer Trust & Reputation' ) ); ?></span>
			<h2 class="biz-section-title"><?php echo esc_html( mp_opt( 'reviews_title', 'What Bardiya Locals Say' ) ); ?></h2>
			<div class="biz-score-display">
				<span class="biz-big-num">4.9</span>
				<div>
					<div class="biz-stars" aria-label="<?php esc_attr_e( 'Rated 4.9 out of 5', 'mobile-pasal' ); ?>">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
					<small><?php esc_html_e( 'Based on 250+ Verified Store Customers', 'mobile-pasal' ); ?></small>
				</div>
			</div>
			<p class="biz-reputation-text"><?php echo esc_html( mp_opt( 'reviews_subtitle', 'Authentic reviews from smartphone buyers and repair clients who chose our counter opposite the District Administration Office.' ) ); ?></p>
			<a class="biz-btn biz-btn-secondary" href="<?php echo esc_url( $maps_link ); ?>" target="_blank" rel="noopener">
				<i class="fa-brands fa-google" aria-hidden="true"></i>
				<span><?php esc_html_e( 'Read More on Google Maps', 'mobile-pasal' ); ?></span>
			</a>
		</div>

		<!-- Review Quote Carousel/Stage -->
		<div class="biz-testimonials-stage" data-hx-quotes>
			<div class="biz-quotes-wrapper">
				<?php foreach ( $hx_reviews as $i => $r ) : ?>
					<div class="biz-quote-card<?php echo 0 === $i ? ' is-active' : ''; ?>" data-hx-quote="<?php echo esc_attr( $i ); ?>"<?php echo 0 === $i ? '' : ' aria-hidden="true"'; ?>>
						<div class="biz-quote-top">
							<div class="biz-verified-badge"><i class="fa-solid fa-circle-check" aria-hidden="true"></i> <?php esc_html_e( 'Verified Counter Client', 'mobile-pasal' ); ?></div>
							<div class="biz-quote-stars">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
						</div>
						<blockquote class="biz-quote-body">&ldquo;<?php echo esc_html( $r['content'] ); ?>&rdquo;</blockquote>
						<div class="biz-quote-author">
							<div class="biz-author-avatar"><?php echo esc_html( strtoupper( mb_substr( $r['name'], 0, 1 ) ) ); ?></div>
							<div>
								<strong><?php echo esc_html( $r['name'] ); ?></strong>
								<span><i class="fa-solid fa-location-dot" aria-hidden="true"></i> <?php echo esc_html( $r['location'] ); ?><?php echo ! empty( $r['product'] ) ? ' &bull; ' . esc_html( $r['product'] ) : ''; ?></span>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>

			<div class="biz-quote-controls">
				<div class="biz-quote-avatars">
					<?php foreach ( $hx_reviews as $i => $r ) : ?>
						<button type="button" class="biz-avatar-btn<?php echo 0 === $i ? ' is-active' : ''; ?>" data-hx-quote-go="<?php echo esc_attr( $i ); ?>" aria-label="<?php echo esc_attr( sprintf( __( 'Review by %s', 'mobile-pasal' ), $r['name'] ) ); ?>">
							<?php echo esc_html( strtoupper( mb_substr( $r['name'], 0, 1 ) ) ); ?>
						</button>
					<?php endforeach; ?>
				</div>
				<div class="biz-quote-arrows">
					<button type="button" class="biz-arrow-btn" data-hx-quote-step="-1" aria-label="<?php esc_attr_e( 'Previous', 'mobile-pasal' ); ?>"><i class="fa-solid fa-arrow-left" aria-hidden="true"></i></button>
					<button type="button" class="biz-arrow-btn" data-hx-quote-step="1" aria-label="<?php esc_attr_e( 'Next', 'mobile-pasal' ); ?>"><i class="fa-solid fa-arrow-right" aria-hidden="true"></i></button>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- =========================================================================
     10. STORE LOCATION & VISIT HUB (#visit)
     ========================================================================= -->
<section id="visit" class="biz-visit-section">
	<div class="wrap biz-visit-grid">
		<!-- Store Details Card -->
		<div class="biz-store-details-card">
			<div class="biz-store-hours-top">
				<div class="hx-status" data-hx-open-status data-open="9" data-close="20">
					<span class="hx-status-dot"></span>
					<span class="hx-status-text"><?php esc_html_e( 'Open Today: 9:00 AM – 8:00 PM', 'mobile-pasal' ); ?></span>
				</div>
				<span class="biz-time-badge" data-hx-clock>NPT --:--</span>
			</div>

			<h2 class="biz-visit-title"><?php esc_html_e( 'Visit Our Store in Gulariya', 'mobile-pasal' ); ?></h2>
			<p class="biz-visit-desc"><?php esc_html_e( 'Walk in for sealed flagship unboxings, on-the-spot screen & battery replacement, or genuine accessories. Located right at Ji. Pra. Ka. Chowk.', 'mobile-pasal' ); ?></p>

			<div class="biz-contact-list">
				<div class="biz-contact-item">
					<div class="biz-ci-icon"><i class="fa-solid fa-location-dot" aria-hidden="true"></i></div>
					<div>
						<strong><?php echo esc_html( mp_opt( 'store_name', 'Ali Mobile Center & Apple Fix' ) ); ?></strong>
						<span><?php echo esc_html( mp_opt( 'contact_address', 'Gulariya-06, Ji. Pra. Ka. Chowk (Opp. DAO Office), Bardiya, Nepal' ) ); ?></span>
					</div>
				</div>
				<div class="biz-contact-item">
					<div class="biz-ci-icon"><i class="fa-solid fa-phone" aria-hidden="true"></i></div>
					<div>
						<strong><a href="tel:+<?php echo esc_attr( $phone_clean ); ?>"><?php echo esc_html( $phone_raw ); ?></a></strong>
						<span><?php esc_html_e( 'Direct Calls & WhatsApp Support with Shop Technician', 'mobile-pasal' ); ?></span>
					</div>
				</div>
				<div class="biz-contact-item">
					<div class="biz-ci-icon"><i class="fa-regular fa-clock" aria-hidden="true"></i></div>
					<div>
						<strong><?php esc_html_e( 'Operating Hours', 'mobile-pasal' ); ?></strong>
						<span><?php echo esc_html( mp_opt( 'contact_hours', 'Sunday – Friday: 9:00 AM – 8:00 PM | Saturday: Open' ) ); ?></span>
					</div>
				</div>
			</div>

			<div class="biz-visit-actions">
				<a class="biz-btn biz-btn-primary" href="<?php echo esc_url( $maps_link ); ?>" target="_blank" rel="noopener">
					<i class="fa-solid fa-diamond-turn-right" aria-hidden="true"></i>
					<span><?php esc_html_e( 'Get Directions on Google Maps', 'mobile-pasal' ); ?></span>
				</a>
				<a class="biz-btn biz-btn-secondary" href="tel:+<?php echo esc_attr( $phone_clean ); ?>">
					<i class="fa-solid fa-phone" aria-hidden="true"></i>
					<span><?php esc_html_e( 'Call Counter', 'mobile-pasal' ); ?></span>
				</a>
			</div>
		</div>

		<!-- Interactive Map Embed -->
		<div class="biz-map-frame-wrap">
			<iframe
				src="https://maps.google.com/maps?q=Gulariya+06+Bardiya+Nepal&t=&z=15&ie=UTF8&iwloc=&output=embed"
				loading="lazy"
				referrerpolicy="no-referrer-when-downgrade"
				title="<?php esc_attr_e( 'Ali Mobile Center Store Location on Google Maps', 'mobile-pasal' ); ?>"></iframe>
		</div>
	</div>
</section>

<!-- =========================================================================
     11. FINAL CLOSING BANNER & VIP VOUCHER
     ========================================================================= -->
<section class="biz-closing-section">
	<div class="wrap biz-closing-inner">
		<div class="biz-closing-copy">
			<span class="biz-closing-kicker"><?php esc_html_e( 'Fast Counter Assistance in Gulariya', 'mobile-pasal' ); ?></span>
			<h2 class="biz-closing-title"><?php esc_html_e( 'Ready to Upgrade or Need an Instant Repair?', 'mobile-pasal' ); ?></h2>
			<p class="biz-closing-desc"><?php esc_html_e( 'Send us a photo of your device problem or ask for today\'s sealed smartphone price list. We reply within minutes.', 'mobile-pasal' ); ?></p>
			<div class="biz-closing-ctas">
				<a class="biz-btn biz-btn-wa biz-btn-lg" href="<?php echo esc_url( mp_get_whatsapp_link( 'Namaste Ali Mobile, ma phone purchase / repair barema bujhna chahanchhu' ) ); ?>" target="_blank" rel="noopener">
					<?php echo $wa_icon; // phpcs:ignore ?>
					<span><?php esc_html_e( 'Chat Directly on WhatsApp', 'mobile-pasal' ); ?></span>
				</a>
				<a class="biz-btn biz-btn-secondary biz-btn-lg" href="tel:+<?php echo esc_attr( $phone_clean ); ?>">
					<i class="fa-solid fa-phone" aria-hidden="true"></i>
					<span><?php echo esc_html( $phone_raw ); ?></span>
				</a>
			</div>
		</div>

		<!-- Perforated Walk-In Pass -->
		<div class="biz-vip-pass" data-hx-voucher="GULARIYA-VIP">
			<div class="biz-pass-stub">
				<span class="biz-pass-badge"><?php esc_html_e( 'VIP STORE PASS', 'mobile-pasal' ); ?></span>
				<strong><?php esc_html_e( 'Free 24-Point Check & Screen Clean', 'mobile-pasal' ); ?></strong>
				<small><?php esc_html_e( 'Show code at the counter for priority walk-in queueing', 'mobile-pasal' ); ?></small>
			</div>
			<button type="button" class="biz-pass-code-btn" data-voucher-copy>
				<span class="biz-pass-code">GULARIYA-VIP</span>
				<span class="biz-pass-hint" data-voucher-status><i class="fa-regular fa-copy" aria-hidden="true"></i> <?php esc_html_e( 'Tap to copy', 'mobile-pasal' ); ?></span>
			</button>
		</div>
	</div>
</section>

<!-- Floating Quick-Navigation Store Bar -->
<nav class="biz-floating-nav" data-hx-dock aria-label="<?php esc_attr_e( 'Quick Shop Navigation', 'mobile-pasal' ); ?>">
	<a href="#categories" class="biz-dock-link"><i class="fa-solid fa-layer-group" aria-hidden="true"></i><span><?php esc_html_e( 'Depts', 'mobile-pasal' ); ?></span></a>
	<a href="#catalog" class="biz-dock-link"><i class="fa-solid fa-mobile-screen-button" aria-hidden="true"></i><span><?php esc_html_e( 'Phones', 'mobile-pasal' ); ?></span></a>
	<a href="#deal" class="biz-dock-link"><i class="fa-solid fa-star" aria-hidden="true"></i><span><?php esc_html_e( 'Deals', 'mobile-pasal' ); ?></span></a>
	<a href="#repair-builder" class="biz-dock-link"><i class="fa-solid fa-screwdriver-wrench" aria-hidden="true"></i><span><?php esc_html_e( 'Repairs', 'mobile-pasal' ); ?></span></a>
	<a href="#services" class="biz-dock-link"><i class="fa-solid fa-clipboard-list" aria-hidden="true"></i><span><?php esc_html_e( 'Prices', 'mobile-pasal' ); ?></span></a>
	<a href="#visit" class="biz-dock-link"><i class="fa-solid fa-location-dot" aria-hidden="true"></i><span><?php esc_html_e( 'Store', 'mobile-pasal' ); ?></span></a>
</nav>

</main>

<?php
get_footer();
