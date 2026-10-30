<?php
/**
 * The template for displaying the front page / home page
 *
 * "Studio Counter" homepage: editorial hero with a flip-through photo deck,
 * expanding department panels, a printed repair-receipt estimator, brand
 * marquee, flagship product stage, sidebar showroom, microscope-lens lab,
 * repair menu board, magazine care guides, review scoreboard and a
 * map-first visit hub.
 *
 * All copy remains editable from Theme Options via mp_opt().
 * Styles: assets/css/home.css | Interactions: assets/js/home.js (+ main.js hooks).
 *
 * @package Mobile_Pasal
 * @version 3.0.0
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
			'warranty'   => get_post_meta( $sid, '_mp_service_warranty', true ) ?: __( 'Testing warranty', 'mobile-pasal' ),
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
			'product'  => get_post_meta( $rid, '_mp_review_product', true ),
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

$wa_icon = '<svg viewBox="0 0 24 24" width="18" height="18" fill="currentColor" aria-hidden="true"><path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0 0 12.04 2m.01 1.67c2.2 0 4.26.86 5.82 2.42a8.225 8.225 0 0 1 2.41 5.83c0 4.54-3.7 8.23-8.24 8.23-1.48 0-2.93-.39-4.19-1.15l-.3-.17-3.12.82.83-3.04-.2-.32a8.188 8.188 0 0 1-1.26-4.38c.01-4.54 3.7-8.24 8.25-8.24M8.53 7.33c-.16 0-.43.06-.66.31-.22.25-.87.86-.87 2.07 0 1.22.89 2.39 1 2.56.14.17 1.76 2.67 4.25 3.73.59.27 1.05.42 1.41.53.59.19 1.13.16 1.56.1.48-.07 1.46-.6 1.67-1.18.21-.58.21-1.07.15-1.18-.07-.1-.23-.16-.48-.27-.25-.14-1.47-.74-1.69-.82-.23-.08-.37-.12-.56.12-.16.25-.64.81-.78.97-.15.17-.29.19-.53.07-.26-.13-1.06-.39-2-1.23-.74-.66-1.23-1.47-1.38-1.72-.12-.24-.01-.39.11-.5.11-.11.27-.29.37-.44.13-.14.17-.25.25-.41.08-.17.04-.31-.02-.43-.06-.11-.56-1.35-.77-1.84-.2-.48-.4-.42-.56-.43-.14 0-.3-.01-.47-.01z"/></svg>';
$arrow_icon = '<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6"/></svg>';
?>

<main class="front-page-main hx">

<!-- =========================================================================
     01. HERO: Editorial headline + flip-through photo deck + ticker
     ========================================================================= -->
<section class="hx-hero" data-hx-hero aria-label="<?php esc_attr_e( 'Featured', 'mobile-pasal' ); ?>">
	<div class="hx-hero-bg" aria-hidden="true">
		<span class="hx-orb hx-orb-a"></span>
		<span class="hx-orb hx-orb-b"></span>
		<span class="hx-hero-grid"></span>
	</div>

	<div class="wrap hx-hero-inner">
		<div class="hx-hero-copy">
			<div class="hx-status" data-hx-open-status data-open="9" data-close="20">
				<span class="hx-status-dot"></span>
				<span class="hx-status-text"><?php esc_html_e( 'Gulariya counter', 'mobile-pasal' ); ?></span>
				<span class="hx-status-sep" aria-hidden="true">/</span>
				<span><?php esc_html_e( 'Ji. Pra. Ka. Chowk', 'mobile-pasal' ); ?></span>
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
		</div>

		<div class="hx-hero-stage">
			<div class="hx-deck" data-hx-deck>
				<?php foreach ( $hx_slides as $i => $s ) : ?>
					<figure class="hx-deck-card" data-hx-card="<?php echo esc_attr( $i ); ?>" data-pos="<?php echo esc_attr( $i ); ?>">
						<img src="<?php echo esc_url( $s['img'] ); ?>" alt="<?php echo esc_attr( $s['label'] ); ?>"<?php echo 0 === $i ? ' fetchpriority="high"' : ' loading="lazy"'; ?>>
						<figcaption><span><?php echo esc_html( sprintf( '%02d', $i + 1 ) ); ?></span><?php echo esc_html( $s['label'] ); ?></figcaption>
					</figure>
				<?php endforeach; ?>
			</div>

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
     02. DEPARTMENTS: Expanding image panels (#categories)
     ========================================================================= -->
<section id="categories" class="hx-depts">
	<div class="wrap">
		<header class="hx-head hx-head-split fade-up">
			<div>
				<span class="hx-kicker"><?php echo esc_html( mp_opt( 'categories_kicker', 'Store Departments' ) ); ?></span>
				<h2 class="hx-h2"><?php echo esc_html( mp_opt( 'categories_title', 'One counter. Everything your phone needs.' ) ); ?></h2>
			</div>
			<p class="hx-head-note"><?php echo esc_html( mp_opt( 'categories_subtitle', 'From brand-new sealed flagships with official VAT billing to Gulariya\'s own Apple Fix repair lab.' ) ); ?></p>
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
			),
			array(
				'tag'   => mp_opt( 'cat2_count', 'Microscope Repair Bench' ),
				'title' => mp_opt( 'cat2_title', 'Apple Fix Precision Cleanroom Lab' ),
				'desc'  => __( 'Screens, batteries, charging ports, water damage and board-level repairs done on-site while you watch.', 'mobile-pasal' ),
				'cta'   => __( 'Estimate a repair', 'mobile-pasal' ),
				'url'   => '#repair-builder',
				'img'   => $img_dir . 'iphone-repair-hands.jpg',
				'short' => __( 'Repair lab', 'mobile-pasal' ),
			),
			array(
				'tag'   => mp_opt( 'cat3_count', '20W-120W GaN Charging' ),
				'title' => mp_opt( 'cat3_title', 'Original Power & MagSafe' ),
				'desc'  => __( 'Genuine PD fast chargers, braided cables, MagSafe pucks and power banks that will not cook your battery.', 'mobile-pasal' ),
				'cta'   => __( 'Ask for chargers', 'mobile-pasal' ),
				'url'   => mp_get_whatsapp_link( 'Namaste Ali Mobile, original charger ko price dinus' ),
				'img'   => $img_dir . 'acc-charger.jpg',
				'short' => __( 'Power', 'mobile-pasal' ),
			),
			array(
				'tag'   => __( 'AirPods, Buds & Watch', 'mobile-pasal' ),
				'title' => __( 'Original Audio & Wearables', 'mobile-pasal' ),
				'desc'  => __( 'AirPods, Galaxy Buds, smartwatches and fitness bands with brand warranty and counter pairing help.', 'mobile-pasal' ),
				'cta'   => __( 'Ask for audio', 'mobile-pasal' ),
				'url'   => mp_get_whatsapp_link( 'Namaste Ali Mobile, original earbuds / smartwatch ko price dinus' ),
				'img'   => $img_dir . 'acc-airpods.jpg',
				'short' => __( 'Audio', 'mobile-pasal' ),
			),
			array(
				'tag'   => __( '9H Glass & MagSafe Cases', 'mobile-pasal' ),
				'title' => __( 'Cases, Glass & Armor', 'mobile-pasal' ),
				'desc'  => __( 'Precision-fit cases and tempered glass installed bubble-free at the counter in under five minutes.', 'mobile-pasal' ),
				'cta'   => __( 'Ask for cases', 'mobile-pasal' ),
				'url'   => mp_get_whatsapp_link( 'Namaste Ali Mobile, mero phone ko lagi case ra tempered glass chahiyo' ),
				'img'   => $img_dir . 'acc-cases.jpg',
				'short' => __( 'Armor', 'mobile-pasal' ),
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
						<a class="hx-panel-link" href="<?php echo esc_url( $d['url'] ); ?>"<?php echo $is_ext ? ' target="_blank" rel="noopener"' : ''; ?>>
							<span><?php echo esc_html( $d['cta'] ); ?></span><?php echo $arrow_icon; // phpcs:ignore ?>
						</a>
					</div>
				</article>
			<?php endforeach; ?>
		</div>

		<div class="hx-tradein fade-up">
			<span class="hx-tradein-icon"><i class="fa-solid fa-arrows-rotate" aria-hidden="true"></i></span>
			<p><strong><?php esc_html_e( 'Upgrading?', 'mobile-pasal' ); ?></strong> <?php esc_html_e( 'Bring your old phone. We value it at the counter and take it off your new handset price.', 'mobile-pasal' ); ?></p>
			<a class="hx-text-link" href="<?php echo esc_url( mp_get_whatsapp_link( 'Namaste Ali Mobile, mero purano phone exchange / trade-in barema bujhna chahanchhu' ) ); ?>" target="_blank" rel="noopener">
				<span><?php esc_html_e( 'Get a trade-in value', 'mobile-pasal' ); ?></span><?php echo $arrow_icon; // phpcs:ignore ?>
			</a>
		</div>
	</div>
</section>

<!-- =========================================================================
     03. REPAIR DESK: Step picker + printed receipt (#repair-builder)
     IDs/classes below are bound in assets/js/main.js (section 5).
     ========================================================================= -->
<section id="repair-builder" class="hx-repair">
	<div class="hx-repair-glow" aria-hidden="true"></div>
	<div class="wrap">
		<header class="hx-head hx-head-split hx-on-dark fade-up">
			<div>
				<span class="hx-kicker"><?php echo esc_html( mp_opt( 'repair_kicker', 'Live Diagnostic Workbench' ) ); ?></span>
				<h2 class="hx-h2"><?php echo esc_html( mp_opt( 'repair_title', 'Phone Problem? Get a Direct Counter Estimate' ) ); ?></h2>
			</div>
			<p class="hx-head-note"><?php echo esc_html( mp_opt( 'repair_subtitle', 'Pick your phone and the problem. Your repair slip prints on the right. Send it to our technician on WhatsApp for an instant quote.' ) ); ?></p>
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
								array( 'Screen & Display', 'Cracked glass, lines, touch dead', 'Screen & Display (Cracked glass / black spots / touch dead)', '30-45 Mins', '90 Days Testing Warranty', 'fa-mobile-screen-button' ),
								array( 'Battery & BMS', 'Fast drain, shutdowns, swelling', 'Battery Replacement (Fast drain / sudden shutdown / swollen)', '20-30 Mins', '6 Months Battery Warranty', 'fa-battery-quarter' ),
								array( 'Charging & Port', 'Slow, loose or no charging', 'Charging & Port (Slow charging / loose port / cable angle)', '30 Mins', '30 Days Service Warranty', 'fa-plug-circle-bolt' ),
								array( 'Water Damage', 'Dropped in water, no power', 'Water Damage (Dropped in water / ultrasonic clean / IC)', '1-2 Hours', 'Component Warranty', 'fa-droplet' ),
								array( 'Camera, Face ID & Audio', 'Blurry camera, mic, speaker', 'Camera & Sound (Mic not working / speaker muffled / camera)', '45 Mins', '60 Days Testing Warranty', 'fa-camera' ),
								array( 'Motherboard', 'No boot, no signal, IC faults', 'Motherboard Micro-Soldering (No power / no network / IC fault)', '1-3 Days', 'Component Warranty', 'fa-microchip' ),
							);
							foreach ( $hx_faults as $i => $f ) :
								?>
								<button type="button" class="fault-select-card hx-fault<?php echo 0 === $i ? ' active' : ''; ?>" data-issue="<?php echo esc_attr( $f[2] ); ?>" data-time="<?php echo esc_attr( $f[3] ); ?>" data-warranty="<?php echo esc_attr( $f[4] ); ?>">
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
				<div class="hx-printer" aria-hidden="true"><span></span></div>
				<div class="hx-receipt" data-hx-receipt>
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
     04. BRANDS: Dual-direction marquee band (#brands)
     Tiles use .brands-grid .brand-card-link[data-filter-brand] (main.js s.7).
     ========================================================================= -->
<?php
$hx_brands = array(
	array( 'apple', 'Apple', __( 'iPhone 16 & Apple Fix', 'mobile-pasal' ), 'fa-brands fa-apple' ),
	array( 'samsung', 'Samsung', __( 'Galaxy S24 & Z Fold', 'mobile-pasal' ), '' ),
	array( 'google', 'Google Pixel', __( 'Pixel 9 & Tensor G4', 'mobile-pasal' ), 'fa-brands fa-google' ),
	array( 'oneplus', 'OnePlus', __( 'OnePlus 12 & Nord 4', 'mobile-pasal' ), '' ),
	array( 'xiaomi', 'Xiaomi', __( 'Xiaomi 14 & Redmi Note', 'mobile-pasal' ), '' ),
	array( 'accessories', __( 'Accessories', 'mobile-pasal' ), __( 'AirPods, Watch & Anker', 'mobile-pasal' ), 'fa-solid fa-headphones' ),
);
$hx_brand_rows = array( $hx_brands, array_reverse( $hx_brands ) );
?>
<section id="brands" class="hx-brands">
	<div class="wrap hx-brands-head fade-up">
		<span class="hx-kicker"><?php echo esc_html( mp_opt( 'brands_kicker', 'Authorized Ecosystem' ) ); ?></span>
		<h2 class="hx-h2"><?php echo esc_html( mp_opt( 'brands_title', 'Top Smartphone Brands In Store' ) ); ?></h2>
		<p><?php echo esc_html( mp_opt( 'brands_subtitle', 'Tap a brand to jump straight to its models in the showroom.' ) ); ?></p>
	</div>
	<div class="brands-grid hx-marquee">
		<?php foreach ( $hx_brand_rows as $row_i => $row ) : ?>
			<div class="hx-marquee-row<?php echo 1 === $row_i ? ' is-reverse' : ''; ?>">
				<div class="hx-marquee-track">
					<?php for ( $copy = 0; $copy < 2; $copy++ ) : foreach ( $row as $b ) : ?>
						<button type="button" class="brand-card-link hx-brand" data-filter-brand="<?php echo esc_attr( $b[0] ); ?>"<?php echo $copy ? ' aria-hidden="true" tabindex="-1"' : ''; ?>>
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
     05. FLAGSHIP STAGE: Product with spec callouts
     ========================================================================= -->
<?php
$spotlight_img = mp_opt( 'spotlight_image', '' );
if ( empty( $spotlight_img ) ) {
	$spotlight_img = $img_dir . 'iphone-16-pro-max.jpg';
}
?>
<section class="hx-spot" aria-labelledby="hx-spot-title">
	<div class="wrap">
		<div class="hx-spot-top fade-up">
			<span class="hx-kicker"><i class="fa-brands fa-apple" aria-hidden="true"></i> <?php echo esc_html( mp_opt( 'spotlight_badge', 'Featured Flagship in Gulariya' ) ); ?></span>
			<h2 id="hx-spot-title" class="hx-spot-title"><?php echo esc_html( mp_opt( 'spotlight_title', 'iPhone 16 Pro & Pro Max' ) ); ?></h2>
			<p class="hx-spot-sub"><?php echo esc_html( mp_opt( 'spotlight_subtitle', 'A18 Pro silicon, a 48MP Fusion camera, the new Camera Control button and the best battery life ever on iPhone. Sealed stock, ready for handover at our counter.' ) ); ?></p>
		</div>

		<div class="hx-spot-stage fade-up">
			<span class="hx-spot-ghost" aria-hidden="true">PRO</span>
			<div class="hx-spot-visual">
				<span class="hx-spot-halo" aria-hidden="true"></span>
				<img src="<?php echo esc_url( $spotlight_img ); ?>" alt="<?php echo esc_attr( mp_opt( 'spotlight_title', 'iPhone 16 Pro & Pro Max' ) ); ?>" loading="lazy">
			</div>
			<ul class="hx-callouts">
				<li class="hx-callout hx-callout-1"><span class="hx-callout-line" aria-hidden="true"></span><i class="fa-solid fa-microchip" aria-hidden="true"></i><div><small><?php esc_html_e( 'Chip', 'mobile-pasal' ); ?></small><strong><?php echo esc_html( mp_opt( 'spotlight_chip', 'A18 Pro Silicon' ) ); ?></strong></div></li>
				<li class="hx-callout hx-callout-2"><span class="hx-callout-line" aria-hidden="true"></span><i class="fa-solid fa-camera" aria-hidden="true"></i><div><small><?php esc_html_e( 'Camera', 'mobile-pasal' ); ?></small><strong><?php echo esc_html( mp_opt( 'spotlight_camera', '48MP Fusion + 5x Telephoto' ) ); ?></strong></div></li>
				<li class="hx-callout hx-callout-3"><span class="hx-callout-line" aria-hidden="true"></span><i class="fa-solid fa-gem" aria-hidden="true"></i><div><small><?php esc_html_e( 'Finish', 'mobile-pasal' ); ?></small><strong><?php echo esc_html( mp_opt( 'spotlight_finish', 'Grade 5 Titanium Finish' ) ); ?></strong></div></li>
				<li class="hx-callout hx-callout-4"><span class="hx-callout-line" aria-hidden="true"></span><i class="fa-solid fa-file-invoice" aria-hidden="true"></i><div><small><?php esc_html_e( 'Purchase', 'mobile-pasal' ); ?></small><strong><?php esc_html_e( 'VAT bill + official warranty', 'mobile-pasal' ); ?></strong></div></li>
			</ul>
		</div>

		<div class="hx-spot-actions fade-up">
			<a class="hx-btn hx-btn-wa" href="<?php echo esc_url( mp_get_whatsapp_link( 'Namaste Ali Mobile, iPhone 16 Pro / Pro Max ko price ra color availability dinus' ) ); ?>" target="_blank" rel="noopener">
				<?php echo $wa_icon; // phpcs:ignore ?><span><?php esc_html_e( 'Ask price & colours', 'mobile-pasal' ); ?></span>
			</a>
			<a class="hx-btn hx-btn-ghost-light" href="#catalog" data-hx-filter-jump="apple"><span><?php esc_html_e( 'See all iPhones', 'mobile-pasal' ); ?></span><?php echo $arrow_icon; // phpcs:ignore ?></a>
		</div>
	</div>
</section>

<!-- =========================================================================
     06. SHOWROOM: Sidebar filters + product grid (#catalog)
     Filter/search hooks are bound in assets/js/main.js (section 6).
     ========================================================================= -->
<section id="catalog" class="hx-catalog">
	<div class="wrap">
		<header class="hx-head hx-head-split fade-up">
			<div>
				<span class="hx-kicker"><?php esc_html_e( 'Showroom', 'mobile-pasal' ); ?></span>
				<h2 class="hx-h2"><?php esc_html_e( 'In stock this week', 'mobile-pasal' ); ?></h2>
			</div>
			<p class="hx-head-note"><?php esc_html_e( 'Every handset is brand-new, sealed, NTA-approved and sold with an official VAT bill. Prices change often, so ask us for today\'s rate.', 'mobile-pasal' ); ?></p>
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
				<div class="products-grid hx-products">
					<?php foreach ( $hx_products as $p ) : ?>
						<article class="product-card hx-product fade-up" data-brand="<?php echo esc_attr( $p['brand_slug'] ); ?>" data-category="smartphones">
							<div class="hx-product-media">
								<span class="hx-product-badge"><?php echo esc_html( $p['badge'] ); ?></span>
								<img src="<?php echo esc_url( $p['img'] ); ?>" alt="<?php echo esc_attr( $p['title'] ); ?>" loading="lazy">
							</div>
							<div class="hx-product-body">
								<div class="hx-product-meta">
									<span class="hx-product-brand"><?php echo esc_html( $p['brand_name'] ); ?></span>
									<span class="hx-product-rating"><i class="fa-solid fa-star" aria-hidden="true"></i> <?php echo esc_html( $p['rating'] ); ?> <em>(<?php echo esc_html( $p['reviews'] ); ?>)</em></span>
								</div>
								<h3 class="product-title"><?php echo esc_html( $p['title'] ); ?></h3>
								<p class="product-specs"><?php echo esc_html( $p['specs'] ); ?></p>
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
     07. APPLE FIX LAB: Microscope lens with feature orbit + count-up stats
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
<section id="apple-fix" class="hx-lab">
	<div class="wrap">
		<div class="hx-lab-top fade-up">
			<span class="hx-kicker"><?php echo esc_html( mp_opt( 'lab_kicker', 'Cleanroom Bench Setup' ) ); ?></span>
			<h2 class="hx-h2"><?php echo esc_html( mp_opt( 'lab_title', 'Precision Microscope Level Repairs Right in Gulariya' ) ); ?></h2>
			<p><?php echo esc_html( mp_opt( 'lab_subtitle', 'We do not courier your valuable phone to Nepalgunj or Kathmandu. Our on-site workstation handles display lamination, genuine battery replacement, ultrasonic board cleaning, and IC diagnostics right across the counter.' ) ); ?></p>
		</div>

		<div class="hx-lab-grid">
			<ul class="hx-lab-list hx-lab-list-left">
				<?php foreach ( array_slice( $hx_lab_features, 0, 2 ) as $f ) : ?>
					<li class="fade-up"><span class="hx-lab-icon"><i class="fa-solid <?php echo esc_attr( $f[0] ); ?>" aria-hidden="true"></i></span><strong><?php echo esc_html( $f[1] ); ?></strong><p><?php echo esc_html( $f[2] ); ?></p></li>
				<?php endforeach; ?>
			</ul>

			<div class="hx-lens fade-up">
				<span class="hx-lens-ring hx-lens-ring-1" aria-hidden="true"></span>
				<span class="hx-lens-ring hx-lens-ring-2" aria-hidden="true"></span>
				<div class="hx-lens-glass">
					<img src="<?php echo esc_url( $lab_img ); ?>" alt="<?php esc_attr_e( 'Apple Fix repair workstation in Gulariya', 'mobile-pasal' ); ?>" loading="lazy">
					<span class="hx-lens-cross" aria-hidden="true"></span>
				</div>
				<span class="hx-lens-tag"><span class="hx-status-dot"></span><?php esc_html_e( 'ESD bench &middot; 45X microscope', 'mobile-pasal' ); ?></span>
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
     08. REPAIR MENU: Index list + detail panel, then the counter process
     ========================================================================= -->
<section id="services" class="hx-services">
	<div class="wrap">
		<header class="hx-head hx-head-split fade-up">
			<div>
				<span class="hx-kicker"><?php esc_html_e( 'Repair menu', 'mobile-pasal' ); ?></span>
				<h2 class="hx-h2"><?php esc_html_e( 'Every fix timed and priced upfront.', 'mobile-pasal' ); ?></h2>
			</div>
			<p class="hx-head-note"><?php esc_html_e( 'Pick a repair to see turnaround, warranty and starting price. Final quotes are confirmed after a free counter check.', 'mobile-pasal' ); ?></p>
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
						<span class="hx-pill"><?php echo esc_html( $s['badge'] ); ?></span>
						<h3><?php echo esc_html( $s['title'] ); ?></h3>
						<p><?php echo esc_html( $s['excerpt'] ); ?></p>
						<dl class="hx-facts">
							<div><dt><?php esc_html_e( 'Turnaround', 'mobile-pasal' ); ?></dt><dd><?php echo esc_html( $s['turnaround'] ); ?></dd></div>
							<div><dt><?php esc_html_e( 'Warranty', 'mobile-pasal' ); ?></dt><dd><?php echo esc_html( $s['warranty'] ); ?></dd></div>
							<div><dt><?php esc_html_e( 'Price', 'mobile-pasal' ); ?></dt><dd><?php echo esc_html( $s['price'] ); ?></dd></div>
						</dl>
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
     09. CARE GUIDES: Magazine layout (feature + two side stories)
     ========================================================================= -->
<section class="hx-guides">
	<div class="wrap">
		<header class="hx-head hx-head-split fade-up">
			<div>
				<span class="hx-kicker"><?php esc_html_e( 'Phone first-aid', 'mobile-pasal' ); ?></span>
				<h2 class="hx-h2"><?php esc_html_e( 'What to do before you reach us.', 'mobile-pasal' ); ?></h2>
			</div>
			<a class="hx-text-link" href="<?php echo esc_url( mp_get_whatsapp_link( 'Namaste, mero phone ma problem chha technical advice chahiyo' ) ); ?>" target="_blank" rel="noopener"><span><?php esc_html_e( 'Ask a technician directly', 'mobile-pasal' ); ?></span><?php echo $arrow_icon; // phpcs:ignore ?></a>
		</header>

		<div class="hx-mag">
			<article class="hx-mag-feature fade-up">
				<img src="<?php echo esc_url( $img_dir . 'tip-water-damage.jpg' ); ?>" alt="" loading="lazy">
				<div class="hx-mag-feature-body">
					<span class="hx-pill hx-pill-alert"><i class="fa-solid fa-triangle-exclamation" aria-hidden="true"></i> <?php esc_html_e( 'Liquid emergency', 'mobile-pasal' ); ?></span>
					<h3><?php esc_html_e( 'Phone fell in water? The first two hours matter most.', 'mobile-pasal' ); ?></h3>
					<ol class="hx-mag-steps">
						<li><?php esc_html_e( 'Power it off right away. Do not test buttons.', 'mobile-pasal' ); ?></li>
						<li><?php esc_html_e( 'Never plug in a charger while it is wet.', 'mobile-pasal' ); ?></li>
						<li><?php esc_html_e( 'Skip the rice. It traps moisture and adds dust.', 'mobile-pasal' ); ?></li>
						<li><?php esc_html_e( 'Bring it to us for an ultrasonic clean.', 'mobile-pasal' ); ?></li>
					</ol>
					<a class="hx-btn hx-btn-wa" href="<?php echo esc_url( mp_get_whatsapp_link( 'Emergency: Mero phone pani ma paryo, Gulariya counter ma audai chhu' ) ); ?>" target="_blank" rel="noopener"><?php echo $wa_icon; // phpcs:ignore ?><span><?php esc_html_e( 'WhatsApp emergency desk', 'mobile-pasal' ); ?></span></a>
				</div>
			</article>

			<div class="hx-mag-side">
				<article class="hx-mag-card fade-up">
					<div class="hx-mag-thumb"><img src="<?php echo esc_url( $img_dir . 'tip-cracked-screen.jpg' ); ?>" alt="" loading="lazy"></div>
					<div class="hx-mag-card-body">
						<span class="hx-mag-tag"><?php esc_html_e( 'Display', 'mobile-pasal' ); ?></span>
						<h3><?php esc_html_e( 'Cracked screen first-aid', 'mobile-pasal' ); ?></h3>
						<p><?php esc_html_e( 'Avoid pressing on cracks so ink does not bleed into the OLED. Tape the glass and back up your data.', 'mobile-pasal' ); ?></p>
						<a class="hx-text-link" href="#repair-builder"><span><?php esc_html_e( 'Estimate a screen repair', 'mobile-pasal' ); ?></span><?php echo $arrow_icon; // phpcs:ignore ?></a>
					</div>
				</article>
				<article class="hx-mag-card fade-up">
					<div class="hx-mag-thumb"><img src="<?php echo esc_url( $img_dir . 'tip-battery-care.jpg' ); ?>" alt="" loading="lazy"></div>
					<div class="hx-mag-card-body">
						<span class="hx-mag-tag"><?php esc_html_e( 'Battery', 'mobile-pasal' ); ?></span>
						<h3><?php esc_html_e( 'Make your battery last longer', 'mobile-pasal' ); ?></h3>
						<p><?php esc_html_e( 'Keep charge between 20% and 80%, avoid heat while charging, and use certified PD chargers only.', 'mobile-pasal' ); ?></p>
						<a class="hx-text-link" href="<?php echo esc_url( mp_get_whatsapp_link( 'Namaste, mero phone ko battery health check garna chahanchhu' ) ); ?>" target="_blank" rel="noopener"><span><?php esc_html_e( 'Free battery health check', 'mobile-pasal' ); ?></span><?php echo $arrow_icon; // phpcs:ignore ?></a>
					</div>
				</article>
			</div>
		</div>
	</div>
</section>

<!-- =========================================================================
     10. REVIEWS: Scoreboard + big-quote switcher
     ========================================================================= -->
<section class="hx-reviews">
	<div class="wrap hx-reviews-grid">
		<div class="hx-score fade-up">
			<span class="hx-kicker"><?php echo esc_html( mp_opt( 'reviews_kicker', 'Verified Customer Feedback' ) ); ?></span>
			<h2 class="hx-h2"><?php echo esc_html( mp_opt( 'reviews_title', 'What Bardiya Locals Say About Us' ) ); ?></h2>
			<div class="hx-score-num">4.9<span>/5</span></div>
			<div class="hx-score-stars" aria-label="<?php esc_attr_e( 'Rated 4.9 out of 5', 'mobile-pasal' ); ?>">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
			<p><?php echo esc_html( mp_opt( 'reviews_subtitle', 'Authentic reviews from smartphone buyers and repair clients who chose our counter at Ji. Pra. Ka. Chowk.' ) ); ?></p>
			<a class="hx-btn hx-btn-light" href="<?php echo esc_url( $maps_link ); ?>" target="_blank" rel="noopener"><i class="fa-brands fa-google" aria-hidden="true"></i><span><?php esc_html_e( 'See us on Google', 'mobile-pasal' ); ?></span></a>
		</div>

		<div class="hx-quotes fade-up" data-hx-quotes>
			<div class="hx-quote-stage">
				<?php foreach ( $hx_reviews as $i => $r ) : ?>
					<figure class="hx-quote<?php echo 0 === $i ? ' is-active' : ''; ?>" data-hx-quote="<?php echo esc_attr( $i ); ?>"<?php echo 0 === $i ? '' : ' aria-hidden="true"'; ?>>
						<svg class="hx-quote-mark" viewBox="0 0 48 36" aria-hidden="true"><path d="M0 36V22C0 9.6 6.4 2.3 19.2 0l2 4.6C14 6.6 10.6 10.8 10.4 17H20v19H0zm27 0V22C27 9.6 33.4 2.3 46.2 0l1.8 4.6C41 6.6 37.6 10.8 37.4 17H47v19H27z" fill="currentColor"/></svg>
						<blockquote><?php echo esc_html( $r['content'] ); ?></blockquote>
						<figcaption>
							<strong><?php echo esc_html( $r['name'] ); ?></strong>
							<span><?php echo esc_html( $r['location'] ); ?><?php echo ! empty( $r['product'] ) ? ' &middot; ' . esc_html( $r['product'] ) : ''; ?></span>
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
     11. VISIT: Map-first hub with live open status (#visit) + closing CTA
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
			<div class="hx-status hx-status-card" data-hx-open-status data-open="9" data-close="20">
				<span class="hx-status-dot"></span>
				<span class="hx-status-text"><?php esc_html_e( 'Counter hours', 'mobile-pasal' ); ?></span>
			</div>
			<h2 class="hx-h2"><?php esc_html_e( 'Come say hi in Gulariya.', 'mobile-pasal' ); ?></h2>
			<p class="hx-visit-lead"><?php esc_html_e( 'Walk in for sealed phone unboxings, on-the-spot screen and battery repairs, or genuine accessories. Opposite the District Administration Office.', 'mobile-pasal' ); ?></p>
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
		<h2 class="hx-final-title"><?php esc_html_e( 'Cracked, dead or just slow?', 'mobile-pasal' ); ?> <em><?php esc_html_e( 'Send us a photo.', 'mobile-pasal' ); ?></em></h2>
		<div class="hx-cta-row">
			<a class="hx-btn hx-btn-lime hx-btn-lg" href="<?php echo esc_url( mp_get_whatsapp_link( 'Namaste Ali Mobile, mero phone ko photo pathaudai chhu, check garidinus' ) ); ?>" target="_blank" rel="noopener"><?php echo $wa_icon; // phpcs:ignore ?><span><?php esc_html_e( 'Chat on WhatsApp', 'mobile-pasal' ); ?></span></a>
			<a class="hx-btn hx-btn-ghost-light hx-btn-lg" href="tel:+<?php echo esc_attr( $phone_clean ); ?>"><span><?php echo esc_html( $phone_raw ); ?></span></a>
		</div>
	</div>
</section>

</main>

<?php
get_footer();
