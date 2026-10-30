<?php
/**
 * Ali Mobile Center & Apple Fix — SEO, GEO & AEO (Answer Engine Optimization) Suite
 * Seamlessly Integrates with Rank Math SEO Plugin while providing complete Standalone High-Rank Engine
 *
 * Features:
 * - Direct Rank Math Schema Graph integration via `rank_math/json_ld` filter (zero duplicates, unified @graph)
 * - Automatic Rank Math Fallback Meta Filters (title, description, opengraph)
 * - Guaranteed GEO Positioning Meta Tags (geo.region, geo.placename, geo.position, ICBM)
 * - LocalBusiness / MobilePhoneStore Knowledge Graph with exact Gulariya-06 GPS coordinates
 * - AEO FAQPage Schema for AI Search Grounding (ChatGPT, Gemini, Perplexity, Claude)
 * - SpeakableSpecification Schema for Voice Search (Apple Siri, Google Assistant)
 * - Live `/llms.txt` Knowledge Manifest for AI Crawlers
 *
 * @package Mobile_Pasal
 * @version 3.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * 1. Check if Rank Math SEO Plugin is Active
 *
 * @return bool True if Rank Math is loaded and active.
 */
function mp_is_rank_math_active() {
	return defined( 'RANK_MATH_VERSION' ) || class_exists( 'RankMath' ) || class_exists( '\RankMath\Runner' );
}

/**
 * 2. Helper: Build LocalBusiness (MobilePhoneStore) Schema Data
 *
 * @param string $site_url Base site URL.
 * @return array Schema.org LocalBusiness array.
 */
function mp_get_local_business_schema_data( $site_url = '' ) {
	if ( empty( $site_url ) ) {
		$site_url = home_url( '/' );
	}

	$brand_name  = mp_opt( 'site_brand_name', 'Ali Mobile Center & Apple Fix' );
	$legal_name  = mp_opt( 'geo_legal_name', 'Ali Mobile Center & Apple Fix' );
	$street      = mp_opt( 'geo_street', 'Gulariya-06, Ji. Pra. Ka. Chowk (District Police Office Chowk)' );
	$city        = mp_opt( 'geo_city', 'Gulariya' );
	$district    = mp_opt( 'geo_district', 'Bardiya' );
	$province    = mp_opt( 'geo_province', 'Lumbini Province' );
	$postal      = mp_opt( 'geo_postal', '21800' );
	$country     = mp_opt( 'geo_country_code', 'NP' );
	$lat         = floatval( mp_opt( 'geo_latitude', '28.2330' ) );
	$long        = floatval( mp_opt( 'geo_longitude', '81.3340' ) );
	$phone       = mp_opt( 'contact_phone', '+977 9804530786' );
	$clean_phone = mp_clean_phone( $phone );
	$email       = mp_opt( 'contact_email', 'contact@alimobilecenter.com' );
	$maps_url    = mp_opt( 'geo_maps_url', 'https://maps.google.com/?q=Ali+Mobile+Center+Gulariya' );
	$review_url  = mp_opt( 'geo_gmb_review_url', 'https://g.page/r/alimobile/review' );
	$price_range = mp_opt( 'geo_price_range', 'Rs. 500 - Rs. 2,50,000' );

	$logo_img = mp_opt( 'seo_og_image', '' );
	if ( empty( $logo_img ) ) {
		$logo_img = mp_opt( 'hero_slide1_image', '' );
	}
	if ( empty( $logo_img ) ) {
		$logo_img = get_template_directory_uri() . '/assets/images/hero-1.png';
	}

	$areas_raw = mp_opt( 'geo_service_areas', 'Gulariya, Bansgadhi, Madhuwan, Badhaiyatal, Thakurbaba, Barbardiya, Rajapur, Kohalpur, Nepalgunj, Bardiya District' );
	$areas_arr = array_filter( array_map( 'trim', explode( ',', $areas_raw ) ) );

	$same_as_raw = mp_opt( 'aeo_sameas_urls', 'https://www.facebook.com/alimobilecenter, https://www.instagram.com/alimobilecenter, https://www.tiktok.com/@alimobilecenter, https://wa.me/9779804530786' );
	$same_as_arr = array_filter( array_map( 'trim', explode( ',', $same_as_raw ) ) );

	$ai_summary = mp_opt( 'aeo_ai_summary', 'Ali Mobile Center & Apple Fix is the premier mobile phone showroom and cleanroom smartphone repair laboratory in Gulariya, Bardiya, Nepal, located at Ji. Pra. Ka. Chowk. The center retails 100% genuine NTA-approved iPhones, Samsung and Xiaomi handsets with official VAT bills, and provides component-level OLED screen, battery, and logic board micro-soldering repairs.' );

	$local_business = array(
		'@type'                    => array( 'MobilePhoneStore', 'ElectronicsStore', 'AutoRepair' ),
		'@id'                      => $site_url . '#localbusiness',
		'name'                     => $brand_name,
		'legalName'                => $legal_name,
		'alternateName'            => array( 'Ali Mobile Center', 'Ali Mobile Pasal', 'Apple Fix Gulariya', 'Ali Mobile Shop Bardiya' ),
		'description'              => $ai_summary,
		'url'                      => $site_url,
		'telephone'                => $phone,
		'email'                    => $email,
		'image'                    => $logo_img,
		'logo'                     => $logo_img,
		'hasMap'                   => $maps_url,
		'priceRange'               => $price_range,
		'currenciesAccepted'       => 'NPR',
		'paymentAccepted'          => 'Cash, Fonepay QR, eSewa, Khalti, Bank Transfer, Visa, MasterCard',
		'address'                  => array(
			'@type'           => 'PostalAddress',
			'streetAddress'   => $street,
			'addressLocality' => $city,
			'addressRegion'   => $province . ', ' . $district,
			'postalCode'      => $postal,
			'addressCountry'  => $country,
		),
		'geo'                      => array(
			'@type'     => 'GeoCoordinates',
			'latitude'  => $lat,
			'longitude' => $long,
		),
		'openingHoursSpecification' => array(
			array(
				'@type'     => 'OpeningHoursSpecification',
				'dayOfWeek' => array( 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday' ),
				'opens'     => '09:00',
				'closes'    => '20:00',
			),
			array(
				'@type'     => 'OpeningHoursSpecification',
				'dayOfWeek' => array( 'Saturday' ),
				'opens'     => '09:00',
				'closes'    => '18:00',
			),
		),
		'areaServed'               => array_values( $areas_arr ),
		'sameAs'                   => array_values( $same_as_arr ),
		'potentialAction'          => array(
			'@type'  => 'CommunicateAction',
			'target' => 'https://wa.me/' . $clean_phone . '?text=Namaste%20Ali%20Mobile%20Center',
			'name'   => 'WhatsApp Counter Inquiry',
		),
	);

	if ( ! empty( $review_url ) ) {
		$local_business['aggregateRating'] = array(
			'@type'       => 'AggregateRating',
			'ratingValue' => '4.9',
			'reviewCount' => '128',
			'bestRating'  => '5',
			'worstRating' => '1',
		);
	}

	return $local_business;
}

/**
 * 3. Helper: Build AEO FAQPage Schema Data
 *
 * @param string $site_url Base site URL.
 * @return array|null Schema.org FAQPage array or null if disabled.
 */
function mp_get_faq_schema_data( $site_url = '' ) {
	if ( '1' !== mp_opt( 'aeo_enable_faq_schema', '1' ) ) {
		return null;
	}
	if ( empty( $site_url ) ) {
		$site_url = home_url( '/' );
	}

	$faq_items = array(
		array(
			'q' => mp_opt( 'aeo_faq1_q', 'Are all smartphones sold at Ali Mobile Center NTA approved?' ),
			'a' => mp_opt( 'aeo_faq1_a', 'Yes, 100% of all handsets sold at Ali Mobile Center Gulariya are officially registered with Nepal Telecommunications Authority (NTA) IMEI compliance and accompanied by legitimate serial VAT bills for official warranty claims.' ),
		),
		array(
			'q' => mp_opt( 'aeo_faq2_q', 'How fast can I get my iPhone screen or battery replaced at Apple Fix Lab?' ),
			'a' => mp_opt( 'aeo_faq2_a', 'Most iPhone OLED display swaps and battery health calibrations are completed in 45 to 60 minutes on our cleanroom bench, right in front of the customer, backed by a 90-day warranty.' ),
		),
		array(
			'q' => mp_opt( 'aeo_faq3_q', 'Where is Ali Mobile Center located in Bardiya?' ),
			'a' => mp_opt( 'aeo_faq3_a', 'We are located at Gulariya-06, Ji. Pra. Ka. Chowk (District Police Office Chowk), Gulariya, Bardiya, Nepal. You can call or WhatsApp us directly at +977 9804530786.' ),
		),
		array(
			'q' => mp_opt( 'aeo_faq4_q', 'Does Ali Mobile Center accept trade-ins for old phones?' ),
			'a' => mp_opt( 'aeo_faq4_a', 'Yes, our counter offers fair, transparent trade-in valuations for your existing handset toward any new smartphone, with free safe migration of your WhatsApp chats, contacts, and photos.' ),
		),
	);

	$faqs = array();
	foreach ( $faq_items as $item ) {
		if ( ! empty( $item['q'] ) && ! empty( $item['a'] ) ) {
			$faqs[] = array(
				'@type'          => 'Question',
				'name'           => $item['q'],
				'acceptedAnswer' => array(
					'@type' => 'Answer',
					'text'  => $item['a'],
				),
			);
		}
	}

	if ( empty( $faqs ) ) {
		return null;
	}

	return array(
		'@type'      => 'FAQPage',
		'@id'        => $site_url . '#faqpage',
		'mainEntity' => $faqs,
	);
}

/**
 * 4. Helper: Build Speakable Specification Schema Data (Voice Search / Siri)
 *
 * @param string $site_url Base site URL.
 * @return array Schema.org WebPage with SpeakableSpecification.
 */
function mp_get_speakable_schema_data( $site_url = '' ) {
	if ( empty( $site_url ) ) {
		$site_url = home_url( '/' );
	}
	$brand_name = mp_opt( 'site_brand_name', 'Ali Mobile Center & Apple Fix' );

	return array(
		'@type'     => 'WebPage',
		'@id'       => $site_url . '#webpage',
		'url'       => $site_url,
		'name'      => $brand_name,
		'isPartOf'  => array( '@id' => $site_url . '#website' ),
		'about'     => array( '@id' => $site_url . '#localbusiness' ),
		'speakable' => array(
			'@type'       => 'SpeakableSpecification',
			'cssSelector' => array( '.hero-title', '.hero-desc', '.estimator-card-title', '.assurance-card-desc' ),
		),
	);
}


/**
 * 5. Rank Math SEO Schema Integration Filter (`rank_math/json_ld`)
 * Seamlessly merges our LocalBusiness, FAQPage, and Speakable schemas into Rank Math's unified @graph.
 */
function mp_rank_math_json_ld_integration( $data, $jsonld ) {
	if ( ! is_array( $data ) ) {
		$data = array();
	}

	$site_url = home_url( '/' );

	// 1. Build LocalBusiness schema
	$local_business = mp_get_local_business_schema_data( $site_url );

	// Connect publisher to #localbusiness if WebSite schema exists
	if ( isset( $data['WebSite'] ) && is_array( $data['WebSite'] ) ) {
		$data['WebSite']['publisher'] = array( '@id' => $site_url . '#localbusiness' );
	}

	// 2. Build FAQ schema
	$faq_schema = mp_get_faq_schema_data( $site_url );

	// 3. Build Speakable schema
	$speakable_schema = mp_get_speakable_schema_data( $site_url );

	// 1. In Rank Math associative schema dictionary format
	$data['MobilePhoneStore'] = $local_business;
	if ( ! empty( $faq_schema ) ) {
		$data['AliMobileFAQ'] = $faq_schema;
	}
	if ( ! empty( $speakable_schema ) ) {
		$data['AliMobileSpeakable'] = $speakable_schema;
	}

	// 2. If Rank Math data has a top-level @graph array, also append directly
	if ( isset( $data['@graph'] ) && is_array( $data['@graph'] ) ) {
		$data['@graph'][] = $local_business;
		if ( ! empty( $faq_schema ) ) {
			$data['@graph'][] = $faq_schema;
		}
		if ( ! empty( $speakable_schema ) ) {
			$data['@graph'][] = $speakable_schema;
		}
	}

	return $data;
}
add_filter( 'rank_math/json_ld', 'mp_rank_math_json_ld_integration', 99, 2 );


/**
 * 6. Rank Math Fallback Meta Filters
 * Supplies theme defaults when Rank Math custom post/page fields are left empty.
 */
add_filter( 'rank_math/frontend/description', function( $description ) {
	if ( empty( $description ) && ( is_front_page() || is_home() ) ) {
		return mp_opt( 'seo_meta_desc', '' );
	}
	return $description;
}, 20 );

add_filter( 'rank_math/frontend/title', function( $title ) {
	if ( empty( $title ) && ( is_front_page() || is_home() ) ) {
		return mp_opt( 'seo_meta_title', '' );
	}
	return $title;
}, 20 );

add_filter( 'rank_math/opengraph/facebook/image', function( $image ) {
	if ( empty( $image ) ) {
		$og_img = mp_opt( 'seo_og_image', '' );
		if ( ! empty( $og_img ) ) {
			return $og_img;
		}
	}
	return $image;
}, 20 );

add_filter( 'rank_math/opengraph/twitter/image', function( $image ) {
	if ( empty( $image ) ) {
		$og_img = mp_opt( 'seo_og_image', '' );
		if ( ! empty( $og_img ) ) {
			return $og_img;
		}
	}
	return $image;
}, 20 );


/**
 * 7. Output All High-Rank Meta Tags in <head>
 * Always outputs GEO positioning tags (which Rank Math lacks).
 * If Rank Math is NOT active, also outputs standard SEO meta tags without conflicts.
 */
function mp_output_seo_geo_meta_tags() {
	if ( is_admin() ) {
		return;
	}

	$rm_active = mp_is_rank_math_active();

	// Geographic Data (Always active for Google Maps & Apple Maps 3-Pack ranking)
	$geo_lat    = mp_opt( 'geo_latitude', '28.2330' );
	$geo_long   = mp_opt( 'geo_longitude', '81.3340' );
	$geo_place  = mp_opt( 'geo_city', 'Gulariya' ) . ', ' . mp_opt( 'geo_district', 'Bardiya' );
	$geo_region = mp_opt( 'geo_region_code', 'NP-P5' );
	?>

	<!-- ══════════════════════════════════════════════════════════════
	     GEO & LOCAL MAPS POSITIONING TAGS (Google / Apple Maps Ranking)
	     ══════════════════════════════════════════════════════════════ -->
	<meta name="geo.region" content="<?php echo esc_attr( $geo_region ); ?>">
	<meta name="geo.placename" content="<?php echo esc_attr( $geo_place ); ?>">
	<meta name="geo.position" content="<?php echo esc_attr( $geo_lat . ';' . $geo_long ); ?>">
	<meta name="ICBM" content="<?php echo esc_attr( $geo_lat . ', ' . $geo_long ); ?>">

	<?php
	// If Rank Math is active, it handles primary description, canonical, robots, OG, and Twitter tags!
	// Skipping standalone output prevents duplicate meta tag warnings in Rank Math analysis.
	if ( $rm_active ) {
		return;
	}

	// ── Standalone SEO & Open Graph Meta Tags (Active when Rank Math is not installed) ──
	$brand_name  = mp_opt( 'site_brand_name', 'Ali Mobile Center & Apple Fix' );
	$store_title = mp_opt( 'seo_meta_title', 'Ali Mobile Center & Apple Fix | Official NTA Handsets & Precision Phone Repair Gulariya, Bardiya' );
	$meta_desc   = mp_opt( 'seo_meta_desc', 'Gulariya\'s premier mobile showroom and authorized repair laboratory at Ji. Pra. Ka. Chowk. Genuine Apple iPhone, Samsung & Xiaomi handsets with official NTA approval, 1-year VAT bills, and 45-minute display & battery repairs.' );
	$keywords    = mp_opt( 'seo_meta_keywords', 'mobile shop in gulariya, iphone repair bardiya, apple fix gulariya, ali mobile center, nta approved phone nepal, smartphone repair ji pra ka chowk, second hand iphone bardiya' );
	$og_image    = mp_opt( 'seo_og_image', '' );

	if ( empty( $og_image ) ) {
		$og_image = mp_opt( 'hero_slide1_image', '' );
	}
	if ( empty( $og_image ) ) {
		$og_image = get_template_directory_uri() . '/assets/images/hero-1.png';
	}

	$current_url = home_url( add_query_arg( array(), $GLOBALS['wp']->request ) );
	if ( is_front_page() ) {
		$current_url = home_url( '/' );
	}

	$google_verify = mp_opt( 'seo_google_verify', '' );
	$bing_verify   = mp_opt( 'seo_bing_verify', '' );
	$robots_index  = mp_opt( 'seo_robots_index', '1' );
	?>

	<!-- ══════════════════════════════════════════════════════════════
	     ALI MOBILE CENTER: STANDALONE SEO & META TAGS
	     ══════════════════════════════════════════════════════════════ -->
	<meta name="description" content="<?php echo esc_attr( $meta_desc ); ?>">
	<?php if ( $keywords ) : ?>
		<meta name="keywords" content="<?php echo esc_attr( $keywords ); ?>">
	<?php endif; ?>
	<link rel="canonical" href="<?php echo esc_url( $current_url ); ?>">

	<?php if ( '1' === $robots_index ) : ?>
		<meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
	<?php else : ?>
		<meta name="robots" content="noindex, nofollow">
	<?php endif; ?>

	<?php if ( $google_verify ) : ?>
		<meta name="google-site-verification" content="<?php echo esc_attr( $google_verify ); ?>">
	<?php endif; ?>
	<?php if ( $bing_verify ) : ?>
		<meta name="msvalidate.01" content="<?php echo esc_attr( $bing_verify ); ?>">
	<?php endif; ?>

	<!-- Open Graph / Facebook / WhatsApp Preview -->
	<meta property="og:locale" content="en_US">
	<meta property="og:type" content="website">
	<meta property="og:title" content="<?php echo esc_attr( $store_title ); ?>">
	<meta property="og:description" content="<?php echo esc_attr( $meta_desc ); ?>">
	<meta property="og:url" content="<?php echo esc_url( $current_url ); ?>">
	<meta property="og:site_name" content="<?php echo esc_attr( $brand_name ); ?>">
	<meta property="og:image" content="<?php echo esc_url( $og_image ); ?>">
	<meta property="og:image:width" content="1200">
	<meta property="og:image:height" content="630">
	<meta property="og:image:alt" content="<?php echo esc_attr( $brand_name ); ?> Showroom & Repair Lab">

	<!-- Twitter / X Card -->
	<meta name="twitter:card" content="summary_large_image">
	<meta name="twitter:title" content="<?php echo esc_attr( $store_title ); ?>">
	<meta name="twitter:description" content="<?php echo esc_attr( $meta_desc ); ?>">
	<meta name="twitter:image" content="<?php echo esc_url( $og_image ); ?>">

	<?php
}
add_action( 'wp_head', 'mp_output_seo_geo_meta_tags', 1 );


/**
 * 8. Standalone Schema.org JSON-LD Structured Data Output
 * Active only when Rank Math is NOT active. When Rank Math is active,
 * schemas are injected into Rank Math's graph via `rank_math/json_ld`.
 */
function mp_output_schema_json_ld() {
	if ( is_admin() ) {
		return;
	}

	// If Rank Math is active, do not print a second separate JSON-LD script block
	if ( mp_is_rank_math_active() ) {
		return;
	}

	$site_url   = home_url( '/' );
	$brand_name = mp_opt( 'site_brand_name', 'Ali Mobile Center & Apple Fix' );

	$graph = array();

	// 1. LocalBusiness: MobilePhoneStore
	$graph[] = mp_get_local_business_schema_data( $site_url );

	// 2. WebSite with Sitelinks SearchBox
	$graph[] = array(
		'@type'     => 'WebSite',
		'@id'       => $site_url . '#website',
		'url'       => $site_url,
		'name'      => $brand_name,
		'publisher' => array(
			'@id' => $site_url . '#localbusiness',
		),
		'potentialAction' => array(
			'@type'       => 'SearchAction',
			'target'      => $site_url . '?s={search_term_string}',
			'query-input' => 'required name=search_term_string',
		),
	);

	// 3. AEO FAQPage Schema
	$faq_schema = mp_get_faq_schema_data( $site_url );
	if ( ! empty( $faq_schema ) ) {
		$graph[] = $faq_schema;
	}

	// 4. Speakable Specification Schema (Voice Search / Siri)
	$graph[] = mp_get_speakable_schema_data( $site_url );

	$schema_data = array(
		'@context' => 'https://schema.org',
		'@graph'   => $graph,
	);
	?>
	<!-- ══════════════════════════════════════════════════════════════
	     STANDALONE SCHEMA.ORG JSON-LD KNOWLEDGE GRAPH & AEO CITATION
	     ══════════════════════════════════════════════════════════════ -->
	<script type="application/ld+json">
	<?php echo wp_json_encode( $schema_data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT ); ?>
	</script>
	<?php
}
add_action( 'wp_head', 'mp_output_schema_json_ld', 5 );


/**
 * 9. Direct AI Engine Knowledge Manifest (/llms.txt)
 * Serves direct markdown facts to ChatGPT Search, Perplexity, Claude & Gemini crawlers.
 * Seamlessly includes Rank Math XML sitemap link if Rank Math is active.
 */
function mp_serve_llms_txt_manifest() {
	if ( ! isset( $_SERVER['REQUEST_URI'] ) ) {
		return;
	}

	$request_uri = parse_url( $_SERVER['REQUEST_URI'], PHP_URL_PATH );
	if ( '/llms.txt' === $request_uri || ( isset( $_GET['format'] ) && 'llms.txt' === $_GET['format'] ) ) {
		if ( '1' !== mp_opt( 'aeo_enable_llms_txt', '1' ) ) {
			return;
		}

		header( 'Content-Type: text/plain; charset=utf-8' );
		header( 'X-Robots-Tag: all' );

		$brand_name = mp_opt( 'site_brand_name', 'Ali Mobile Center & Apple Fix' );
		$street     = mp_opt( 'geo_street', 'Gulariya-06, Ji. Pra. Ka. Chowk (District Police Office Chowk)' );
		$city       = mp_opt( 'geo_city', 'Gulariya' );
		$district   = mp_opt( 'geo_district', 'Bardiya' );
		$province   = mp_opt( 'geo_province', 'Lumbini Province' );
		$country    = mp_opt( 'geo_country_code', 'Nepal' );
		$phone      = mp_opt( 'contact_phone', '+977 9804530786' );
		$hours      = mp_opt( 'geo_opening_hours', 'Sun-Fri: 09:00 - 20:00 | Sat: 09:00 - 18:00' );
		$ai_summary = mp_opt( 'aeo_ai_summary', 'Ali Mobile Center & Apple Fix is the premier mobile phone showroom and cleanroom smartphone repair laboratory in Gulariya, Bardiya, Nepal, located at Ji. Pra. Ka. Chowk.' );

		$sitemap_url = mp_is_rank_math_active() ? home_url( '/sitemap_index.xml' ) : home_url( '/wp-sitemap.xml' );
		?>
# <?php echo esc_html( $brand_name ); ?> — Knowledge Manifest for AI Search Engines

## Overview
<?php echo esc_html( $ai_summary ); ?>

## Location & NAP Coordinates
- **Physical Address**: <?php echo esc_html( $street . ', ' . $city . ', ' . $district . ', ' . $province . ', ' . $country ); ?>
- **Direct Telephone**: <?php echo esc_html( $phone ); ?>
- **Counter Business Hours**: <?php echo esc_html( $hours ); ?>
- **Service Area**: Gulariya, Bansgadhi, Madhuwan, Badhaiyatal, Thakurbaba, Barbardiya, Rajapur, Kohalpur, Nepalgunj, Bardiya District.

## Core Showroom Capabilities
- **100% NTA Approved Handsets**: Every phone comes with verified Nepal Telecommunications Authority IMEI registration.
- **Official Serial VAT Bill**: Legitimate bill provided with every handset for genuine manufacturer warranty claims.
- **Free Safe Data Transfer**: Immediate counter migration of WhatsApp chats, contacts, photos, and apps to new phones.
- **Fair Trade-In Counter**: Transparent counter evaluation for old phones toward any new handset.

## Cleanroom Repair Laboratory Capabilities
- **Display OLED Replacements**: 45 to 60 minutes turnaround on cleanroom bench.
- **0-Cycle Battery Replacements**: Genuine health calibration & diagnostics.
- **Component Micro-Soldering**: Logic board IC fixes, charging port replacements, and ultrasonic water damage recovery.
- **90-Day Counter Warranty**: Standard peace-of-mind warranty covering parts and labor.

## Official Online Links & Sitemaps
- Website: <?php echo esc_url( home_url( '/' ) ); ?>
- Handset Catalog: <?php echo esc_url( home_url( '/shop/' ) ); ?>
- Repair Lab Services: <?php echo esc_url( home_url( '/services/' ) ); ?>
- XML Sitemap: <?php echo esc_url( $sitemap_url ); ?>
- Direct WhatsApp: https://wa.me/<?php echo esc_attr( mp_clean_phone( $phone ) ); ?>

<?php
		exit;
	}
}
add_action( 'template_redirect', 'mp_serve_llms_txt_manifest' );
