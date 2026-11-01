<?php
/**
 * Single Handset Template - Creative High-Tech Studio Presentation
 *
 * Fully responsive product details showcase with complete hardware matrix,
 * global & per-product price show/hide toggles, WhatsApp instant counter docket,
 * and verified NTA MDMS assurance. Zero customer reviews per design specifications.
 *
 * @package MobilePasal
 */

get_header();

$phone_number      = mp_opt( 'store_phone', '+977 9804530786' );
$phone_raw         = preg_replace( '/[^0-9]/', '', $phone_number );
$wa_number         = mp_opt( 'whatsapp_number', '9779804530786' );
$global_show_price = mp_opt( 'handset_show_price', '1' );
$hidden_price_text = mp_opt( 'handset_hidden_price_text', __( 'Contact for Counter Price', 'mobile-pasal' ) );
$hidden_price_note = mp_opt( 'handset_hidden_price_note', __( "Price varies depending on market stock, official warranty coverage, and current distributor offers. Contact our Gulariya showroom for today's verified live counter quote.", 'mobile-pasal' ) );

/**
 * Helper to determine swatch color indicator
 */
if ( ! function_exists( 'mp_get_color_dot_style' ) ) {
	function mp_get_color_dot_style( $color_name ) {
		$c = strtolower( trim( $color_name ) );
		if ( strpos( $c, 'black' ) !== false || strpos( $c, 'midnight' ) !== false || strpos( $c, 'graphite' ) !== false || strpos( $c, 'space' ) !== false || strpos( $c, 'onyx' ) !== false ) {
			return '#1e293b';
		}
		if ( strpos( $c, 'titanium' ) !== false || strpos( $c, 'natural' ) !== false || strpos( $c, 'gray' ) !== false || strpos( $c, 'grey' ) !== false ) {
			return '#94a3b8';
		}
		if ( strpos( $c, 'white' ) !== false || strpos( $c, 'silver' ) !== false || strpos( $c, 'starlight' ) !== false ) {
			return '#cbd5e1';
		}
		if ( strpos( $c, 'blue' ) !== false || strpos( $c, 'navy' ) !== false || strpos( $c, 'submarine' ) !== false || strpos( $c, 'cyan' ) !== false ) {
			return '#0284c7';
		}
		if ( strpos( $c, 'gold' ) !== false || strpos( $c, 'desert' ) !== false || strpos( $c, 'yellow' ) !== false || strpos( $c, 'amber' ) !== false || strpos( $c, 'beige' ) !== false ) {
			return '#d97706';
		}
		if ( strpos( $c, 'green' ) !== false || strpos( $c, 'emerald' ) !== false || strpos( $c, 'mint' ) !== false || strpos( $c, 'olive' ) !== false ) {
			return '#10b981';
		}
		if ( strpos( $c, 'purple' ) !== false || strpos( $c, 'violet' ) !== false || strpos( $c, 'lavender' ) !== false ) {
			return '#8b5cf6';
		}
		if ( strpos( $c, 'red' ) !== false || strpos( $c, 'pink' ) !== false || strpos( $c, 'rose' ) !== false || strpos( $c, 'coral' ) !== false ) {
			return '#f43f5e';
		}
		return '#0066cc';
	}
}

while ( have_posts() ) :
	the_post();
	$post_id          = get_the_ID();
	$brand_terms      = get_the_terms( $post_id, 'device_brand' );
	$brand_name       = ! empty( $brand_terms ) ? $brand_terms[0]->name : get_post_meta( $post_id, '_mp_brand', true );
	$model_name       = get_post_meta( $post_id, '_mp_model', true ) ?: get_the_title();
	$badge            = get_post_meta( $post_id, '_mp_badge', true ) ?: __( 'Official NTA Approved', 'mobile-pasal' );
	$price            = get_post_meta( $post_id, '_mp_price', true );
	$old_price        = get_post_meta( $post_id, '_mp_old_price', true );
	$per_product_hide = get_post_meta( $post_id, '_mp_hide_price', true );
	$stock_status     = get_post_meta( $post_id, '_mp_stock_status', true ) ?: 'in_stock';

	// Hardware Spec Keys (with backward compatibility)
	$spec_screen   = get_post_meta( $post_id, '_mp_spec_screen', true ) ?: get_post_meta( $post_id, '_mp_display', true );
	$spec_chip     = get_post_meta( $post_id, '_mp_spec_chip', true ) ?: get_post_meta( $post_id, '_mp_processor', true );
	$spec_camera   = get_post_meta( $post_id, '_mp_spec_camera', true ) ?: get_post_meta( $post_id, '_mp_camera', true );
	$spec_battery  = get_post_meta( $post_id, '_mp_spec_battery', true ) ?: get_post_meta( $post_id, '_mp_battery', true );
	$ram_meta      = get_post_meta( $post_id, '_mp_ram', true );
	$storage_meta  = get_post_meta( $post_id, '_mp_storage', true );
	$spec_storage  = get_post_meta( $post_id, '_mp_spec_storage', true ) ?: ( ( $ram_meta || $storage_meta ) ? trim( "{$ram_meta} / {$storage_meta}", ' /' ) : '' );
	$spec_warranty = get_post_meta( $post_id, '_mp_spec_warranty', true ) ?: ( get_post_meta( $post_id, '_mp_warranty', true ) ?: __( '1 Year Official Brand Warranty', 'mobile-pasal' ) );

	// Color tags
	$colors_raw = get_post_meta( $post_id, '_mp_color_tag', true ) ?: get_post_meta( $post_id, '_mp_colors', true );
	$color_list = ! empty( $colors_raw ) ? array_filter( array_map( 'trim', explode( ',', (string) $colors_raw ) ) ) : array();

	// Handset Showcase Image
	$img_url = function_exists( 'mp_get_handset_img_url' ) ? mp_get_handset_img_url( $post_id ) : get_the_post_thumbnail_url( $post_id, 'large' );

	// Price Visibility Calculation
	$is_price_visible = ( $global_show_price == '1' || $global_show_price === 1 || $global_show_price === true ) && empty( $per_product_hide ) && ! empty( $price );

	// Format Price Strings
	$price_formatted     = is_numeric( $price ) ? 'NPR ' . number_format( (float) $price ) : $price;
	$old_price_formatted = ( is_numeric( $old_price ) && (float) $old_price > (float) $price ) ? 'NPR ' . number_format( (float) $old_price ) : ( ( ! empty( $old_price ) && $old_price !== $price ) ? $old_price : '' );

	// Calculate savings if numbers are available
	$savings_text = '';
	if ( is_numeric( $price ) && is_numeric( $old_price ) && (float) $old_price > (float) $price ) {
		$diff         = (float) $old_price - (float) $price;
		$savings_text = sprintf( __( 'Save NPR %s', 'mobile-pasal' ), number_format( $diff ) );
	}

	// Stock Status Mapping
	$status_labels = array(
		'in_stock'     => __( 'In Stock at Gulariya Showroom • Ready for Pickup', 'mobile-pasal' ),
		'low_stock'    => __( 'Limited Showroom Units Available (Low Stock)', 'mobile-pasal' ),
		'pre_order'    => __( 'Available for Pre-Order Booking', 'mobile-pasal' ),
		'out_of_stock' => __( 'Temporarily Out of Stock • Inquire for Shipment', 'mobile-pasal' ),
	);
	$stock_label   = isset( $status_labels[ $stock_status ] ) ? $status_labels[ $stock_status ] : $status_labels['in_stock'];

	// WhatsApp Inquiry URL
	$custom_wa_msg = get_post_meta( $post_id, '_mp_whatsapp_msg', true );
	if ( ! empty( $custom_wa_msg ) ) {
		$wa_message = $custom_wa_msg;
	} elseif ( $is_price_visible ) {
		$wa_message = sprintf(
			__( 'Namaste Ali Mobile, ma tapaiharuko website ma %1$s (%2$s) herera aako chhu. Gulariya counter ma availability ra rate confirm gardinus na.', 'mobile-pasal' ),
			get_the_title(),
			$price_formatted
		);
	} else {
		$wa_message = sprintf(
			__( 'Namaste Ali Mobile, ma tapaiharuko website ma %s herera aako chhu. Yas ko aaja ko live counter price ra availability confirm gardinus na.', 'mobile-pasal' ),
			get_the_title()
		);
	}
	$wa_url = 'https://wa.me/' . esc_attr( $wa_number ) . '?text=' . rawurlencode( $wa_message );
	?>

<main id="primary" class="site-main">

	<!-- 1. Page Hero Banner: Breadcrumbs, Title & Pure Graphics -->
	<section class="page-hero-banner" aria-label="<?php esc_attr_e( 'Handset Header', 'mobile-pasal' ); ?>">
		<div class="tech-bg-grid" aria-hidden="true"></div>
		<div class="tech-ring-accent" aria-hidden="true"></div>
		<div class="page-hero-container">
			<div class="page-hero-row">
				<div class="page-hero-main">
					<nav class="page-breadcrumb-nav" aria-label="<?php esc_attr_e( 'Breadcrumb', 'mobile-pasal' ); ?>">
						<a class="crumb-link" href="<?php echo esc_url( home_url( '/' ) ); ?>">
							<svg viewBox="0 0 24 24" width="13" height="13" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path></svg>
							<span><?php esc_html_e( 'Home', 'mobile-pasal' ); ?></span>
						</a>
						<span class="crumb-divider">/</span>
						<a class="crumb-link" href="<?php echo esc_url( home_url( '/shop/' ) ); ?>"><?php esc_html_e( 'Smartphones', 'mobile-pasal' ); ?></a>
						<?php if ( ! empty( $brand_name ) ) : ?>
							<span class="crumb-divider">/</span>
							<span class="crumb-link"><?php echo esc_html( $brand_name ); ?></span>
						<?php endif; ?>
						<span class="crumb-divider">/</span>
						<span class="crumb-active"><?php the_title(); ?></span>
					</nav>
					<h1 class="page-hero-title"><?php the_title(); ?></h1>
				</div>
				<?php mp_render_page_hero_graphic(); ?>
			</div>
		</div>
	</section>

	<!-- 2. Creative Studio Product Showcase Section -->
	<section class="section-wrap single-product-section" style="padding: 36px 0 60px;">
		<div class="tech-bg-grid" aria-hidden="true"></div>
		<div class="tech-ring-accent tech-ring-right" aria-hidden="true"></div>
		<div class="wrap">

			<div class="single-product-grid">

				<!-- Left Column: Studio Visual Card -->
				<div class="product-studio-card">
					<?php if ( ! empty( $badge ) ) : ?>
						<span class="product-badge-pill"><?php echo esc_html( $badge ); ?></span>
					<?php endif; ?>

					<div class="product-verified-badge" title="<?php esc_attr_e( 'Verified with Nepal Telecommunications Authority MDMS System', 'mobile-pasal' ); ?>">
						<svg viewBox="0 0 24 24" width="13" height="13" fill="currentColor"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg>
						<span><?php esc_html_e( '100% NTA MDMS', 'mobile-pasal' ); ?></span>
					</div>

					<!-- Visual Stage Pedestal -->
					<div class="product-studio-stage">
						<img class="product-studio-img" src="<?php echo esc_url( $img_url ); ?>" alt="<?php the_title_attribute(); ?>" loading="eager">
					</div>

					<!-- Color Swatches Dock -->
					<?php if ( ! empty( $color_list ) ) : ?>
						<div class="product-swatches-dock">
							<span class="product-swatch-label"><?php esc_html_e( 'Official Color Finishes', 'mobile-pasal' ); ?></span>
							<div class="product-swatch-list">
								<?php foreach ( $color_list as $c_name ) : ?>
									<div class="product-swatch-chip">
										<span class="product-swatch-dot" style="background-color: <?php echo esc_attr( mp_get_color_dot_style( $c_name ) ); ?>;"></span>
										<span><?php echo esc_html( $c_name ); ?></span>
									</div>
								<?php endforeach; ?>
							</div>
						</div>
					<?php endif; ?>

					<!-- In-Box Items Retail Preview -->
					<div class="product-inbox-dock">
						<div class="product-inbox-title">
							<svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
							<span><?php esc_html_e( "What's Included in the Retail Box", 'mobile-pasal' ); ?></span>
						</div>
						<div class="product-inbox-tags">
							<span class="product-inbox-tag">
								<svg viewBox="0 0 24 24" width="12" height="12" fill="none" stroke="currentColor" stroke-width="2"><rect x="5" y="2" width="14" height="20" rx="2"></rect></svg>
								<?php the_title(); ?> Handset
							</span>
							<span class="product-inbox-tag">
								<svg viewBox="0 0 24 24" width="12" height="12" fill="none" stroke="currentColor" stroke-width="2"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"></path></svg>
								Type-C Cable
							</span>
							<span class="product-inbox-tag">
								<svg viewBox="0 0 24 24" width="12" height="12" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
								SIM Ejector Pin
							</span>
							<span class="product-inbox-tag">
								<svg viewBox="0 0 24 24" width="12" height="12" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
								Official VAT Warranty Card
							</span>
						</div>
					</div>
				</div>

				<!-- Right Column: Device Telemetry & Commercial Hub -->
				<div class="product-telemetry-panel">
					
					<div class="product-header-block">
						<?php if ( ! empty( $brand_name ) ) : ?>
							<span class="product-brand-kicker">
								<svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path></svg>
								<?php echo esc_html( $brand_name ); ?> <?php esc_html_e( 'Official Showroom Unit', 'mobile-pasal' ); ?>
							</span>
						<?php endif; ?>
						<h1 class="product-main-title"><?php the_title(); ?></h1>
					</div>

					<!-- Pricing & Quotation Hub -->
					<div class="product-price-hub">
						<?php if ( $is_price_visible ) : ?>
							<div class="product-price-row">
								<span class="product-selling-price"><?php echo esc_html( $price_formatted ); ?></span>
								<?php if ( ! empty( $old_price_formatted ) ) : ?>
									<span class="product-regular-price"><?php echo esc_html( $old_price_formatted ); ?></span>
								<?php endif; ?>
								<?php if ( ! empty( $savings_text ) ) : ?>
									<span class="product-savings-badge">
										<svg viewBox="0 0 24 24" width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path><line x1="7" y1="7" x2="7.01" y2="7"></line></svg>
										<?php echo esc_html( $savings_text ); ?>
									</span>
								<?php endif; ?>
							</div>
							<div class="product-price-meta">
								<svg viewBox="0 0 24 24" width="13" height="13" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
								<span><?php esc_html_e( 'Includes 13% Official VAT Bill • 100% Tax Compliant', 'mobile-pasal' ); ?></span>
							</div>
						<?php else : ?>
							<!-- Creative Hidden Price Quotation Card -->
							<div class="product-quote-card">
								<div class="product-quote-pill">
									<svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
									<span><?php echo esc_html( $hidden_price_text ); ?></span>
								</div>
								<p class="product-quote-note"><?php echo esc_html( $hidden_price_note ); ?></p>
							</div>
						<?php endif; ?>

						<!-- Live Showroom Counter Stock Status -->
						<div class="product-stock-banner">
							<div class="product-stock-status">
								<span class="product-pulse-dot <?php echo esc_attr( $stock_status ); ?>" aria-hidden="true"></span>
								<span><?php echo esc_html( $stock_label ); ?></span>
							</div>
							<span class="product-counter-loc">
								<svg viewBox="0 0 24 24" width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
								Main Road, Gulariya
							</span>
						</div>
					</div>

					<!-- 6 Quick Hardware Spec Cards -->
					<div class="product-specs-grid">
						
						<!-- Processor -->
						<?php if ( ! empty( $spec_chip ) ) : ?>
							<div class="product-spec-card">
								<div class="product-spec-card-head">
									<svg viewBox="0 0 24 24" width="13" height="13" fill="none" stroke="currentColor" stroke-width="2.2"><rect x="4" y="4" width="16" height="16" rx="2"></rect><rect x="9" y="9" width="6" height="6"></rect><line x1="9" y1="1" x2="9" y2="4"></line><line x1="15" y1="1" x2="15" y2="4"></line><line x1="9" y1="20" x2="9" y2="23"></line><line x1="15" y1="20" x2="15" y2="23"></line><line x1="20" y1="9" x2="23" y2="9"></line><line x1="20" y1="14" x2="23" y2="14"></line><line x1="1" y1="9" x2="4" y2="9"></line><line x1="1" y1="14" x2="4" y2="14"></line></svg>
									<span><?php esc_html_e( 'Processor', 'mobile-pasal' ); ?></span>
								</div>
								<div class="product-spec-card-val"><?php echo esc_html( $spec_chip ); ?></div>
							</div>
						<?php endif; ?>

						<!-- Display -->
						<?php if ( ! empty( $spec_screen ) ) : ?>
							<div class="product-spec-card">
								<div class="product-spec-card-head">
									<svg viewBox="0 0 24 24" width="13" height="13" fill="none" stroke="currentColor" stroke-width="2.2"><rect x="5" y="2" width="14" height="20" rx="2"></rect><line x1="12" y1="18" x2="12.01" y2="18"></line></svg>
									<span><?php esc_html_e( 'Display', 'mobile-pasal' ); ?></span>
								</div>
								<div class="product-spec-card-val"><?php echo esc_html( $spec_screen ); ?></div>
							</div>
						<?php endif; ?>

						<!-- Camera -->
						<?php if ( ! empty( $spec_camera ) ) : ?>
							<div class="product-spec-card">
								<div class="product-spec-card-head">
									<svg viewBox="0 0 24 24" width="13" height="13" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg>
									<span><?php esc_html_e( 'Camera Optics', 'mobile-pasal' ); ?></span>
								</div>
								<div class="product-spec-card-val"><?php echo esc_html( $spec_camera ); ?></div>
							</div>
						<?php endif; ?>

						<!-- Battery -->
						<?php if ( ! empty( $spec_battery ) ) : ?>
							<div class="product-spec-card">
								<div class="product-spec-card-head">
									<svg viewBox="0 0 24 24" width="13" height="13" fill="none" stroke="currentColor" stroke-width="2.2"><rect x="1" y="6" width="18" height="12" rx="2"></rect><line x1="23" y1="11" x2="23" y2="13"></line><line x1="6" y1="10" x2="6" y2="14"></line><line x1="10" y1="10" x2="10" y2="14"></line><line x1="14" y1="10" x2="14" y2="14"></line></svg>
									<span><?php esc_html_e( 'Battery', 'mobile-pasal' ); ?></span>
								</div>
								<div class="product-spec-card-val"><?php echo esc_html( $spec_battery ); ?></div>
							</div>
						<?php endif; ?>

						<!-- Storage / RAM -->
						<?php if ( ! empty( $spec_storage ) ) : ?>
							<div class="product-spec-card">
								<div class="product-spec-card-head">
									<svg viewBox="0 0 24 24" width="13" height="13" fill="none" stroke="currentColor" stroke-width="2.2"><line x1="22" y1="12" x2="2" y2="12"></line><path d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"></path><line x1="6" y1="16" x2="6.01" y2="16"></line><line x1="10" y1="16" x2="10.01" y2="16"></line></svg>
									<span><?php esc_html_e( 'Memory', 'mobile-pasal' ); ?></span>
								</div>
								<div class="product-spec-card-val"><?php echo esc_html( $spec_storage ); ?></div>
							</div>
						<?php endif; ?>

						<!-- Warranty -->
						<?php if ( ! empty( $spec_warranty ) ) : ?>
							<div class="product-spec-card">
								<div class="product-spec-card-head">
									<svg viewBox="0 0 24 24" width="13" height="13" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
									<span><?php esc_html_e( 'Warranty', 'mobile-pasal' ); ?></span>
								</div>
								<div class="product-spec-card-val"><?php echo esc_html( $spec_warranty ); ?></div>
							</div>
						<?php endif; ?>

					</div>

					<!-- Action Hub: WhatsApp & Hotline -->
					<div class="product-actions-hub">
						<div class="product-actions-row">
							<a class="btn btn-whatsapp btn-lg" href="<?php echo esc_url( $wa_url ); ?>" target="_blank" rel="noopener">
								<svg viewBox="0 0 24 24" width="20" height="20" fill="currentColor"><path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0 0 12.04 2m.01 1.67c2.2 0 4.26.86 5.82 2.42a8.225 8.225 0 0 1 2.41 5.83c0 4.54-3.7 8.24-8.24 8.24-1.48 0-2.93-.4-4.2-1.15l-.3-.18-3.12.82.83-3.04-.2-.31a8.196 8.196 0 0 1-1.26-4.38c0-4.54 3.7-8.24 8.24-8.24m4.52 11.66c-.25-.13-1.47-.72-1.7-.81-.23-.08-.39-.13-.56.13-.17.25-.64.81-.79.97-.14.17-.29.19-.54.06-.25-.13-1.05-.39-2-1.23-.74-.66-1.24-1.47-1.39-1.72-.14-.25-.02-.39.11-.51.11-.11.25-.29.37-.43.13-.14.17-.25.25-.41.08-.17.04-.31-.02-.44-.06-.13-.56-1.34-.76-1.84-.2-.49-.4-.42-.56-.43h-.47c-.17 0-.44.06-.67.31-.23.25-.87.85-.87 2.08 0 1.23.9 2.41 1.02 2.58.13.17 1.76 2.69 4.27 3.77.6.26 1.07.41 1.43.53.6.19 1.15.16 1.58.1.48-.07 1.47-.6 1.68-1.18.21-.58.21-1.07.15-1.18-.06-.11-.23-.17-.48-.29z"/></svg>
								<span><?php echo $is_price_visible ? esc_html__( 'Direct WhatsApp Order', 'mobile-pasal' ) : esc_html__( 'Inquire Counter Rate on WhatsApp', 'mobile-pasal' ); ?></span>
							</a>
							<a class="btn btn-secondary btn-lg" href="tel:+<?php echo esc_attr( $phone_raw ); ?>" title="<?php esc_attr_e( 'Call Ali Mobile Showroom', 'mobile-pasal' ); ?>">
								<svg viewBox="0 0 24 24" width="18" height="18" fill="currentColor"><path d="M20.01 15.38c-1.23 0-2.42-.2-3.53-.56a.977.977 0 0 0-1.01.24l-1.57 1.97c-2.83-1.35-5.48-3.9-6.89-6.83l1.95-1.66c.27-.28.35-.67.24-1.02-.37-1.11-.56-2.3-.56-3.53 0-.54-.45-.99-.99-.99H4.19C3.65 3 3 3.24 3 3.99 3 13.28 10.73 21 20.01 21c.71 0 .99-.63.99-1.18v-3.45c0-.54-.45-.99-.99-.99z"/></svg>
								<span><?php esc_html_e( 'Call Hotline', 'mobile-pasal' ); ?></span>
							</a>
						</div>

						<!-- Counter Perks Strip -->
						<div class="product-perks-strip">
							<div class="product-perk-item">
								<svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
								<span>100% NTA MDMS Compliant</span>
							</div>
							<div class="product-perk-item">
								<svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
								<span>Official Serial VAT Bill</span>
							</div>
							<div class="product-perk-item">
								<svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
								<span>Free Counter Data Migration</span>
							</div>
							<div class="product-perk-item">
								<svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
								<span>Trade-In Old Phone Facility</span>
							</div>
						</div>
					</div>

				</div>

			</div>

		</div>
	</section>

	<!-- 3. Technical Anchor Navigation Strip -->
	<section class="section-wrap" style="padding: 0 0 20px;">
		<div class="wrap">
			<nav class="handset-section-anchor-nav" aria-label="<?php esc_attr_e( 'Handset Sections Navigation', 'mobile-pasal' ); ?>">
				<a class="handset-anchor-link active" href="#specs-matrix">
					<svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2"><rect x="4" y="4" width="16" height="16" rx="2"></rect><rect x="9" y="9" width="6" height="6"></rect></svg>
					<span><?php esc_html_e( 'Full Specifications', 'mobile-pasal' ); ?></span>
				</a>
				<a class="handset-anchor-link" href="#editorial-overview">
					<svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line></svg>
					<span><?php esc_html_e( 'Overview & Insights', 'mobile-pasal' ); ?></span>
				</a>
				<a class="handset-anchor-link" href="#counter-assurance">
					<svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
					<span><?php esc_html_e( 'Ali Mobile Assurance', 'mobile-pasal' ); ?></span>
				</a>
				<a class="handset-anchor-link" href="#related-handsets">
					<svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2"><rect x="5" y="2" width="14" height="20" rx="2"></rect><line x1="12" y1="18" x2="12.01" y2="18"></line></svg>
					<span><?php esc_html_e( 'Similar Handsets', 'mobile-pasal' ); ?></span>
				</a>
			</nav>
		</div>
	</section>

	<!-- 4. Deep Full Specifications Matrix Section -->
	<section id="specs-matrix" class="section-wrap" style="padding: 20px 0 50px;">
		<div class="tech-bg-grid" aria-hidden="true"></div>
		<div class="wrap">
			<div class="sec-head" style="margin-bottom: 24px;">
				<span class="sec-kicker"><?php esc_html_e( 'Detailed Hardware Telemetry', 'mobile-pasal' ); ?></span>
				<h2><?php esc_html_e( 'Full Technical Specifications Matrix', 'mobile-pasal' ); ?></h2>
				<p><?php esc_html_e( 'Verified technical architecture and compliance data direct from official brand specifications.', 'mobile-pasal' ); ?></p>
			</div>

			<div class="handset-specs-table-card">
				
				<!-- Group 1: General & MDMS Compliance -->
				<div class="specs-table-group-header">
					<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
					<span><?php esc_html_e( 'General & Nepal MDMS Compliance', 'mobile-pasal' ); ?></span>
				</div>
				<div class="specs-table-row">
					<div class="specs-label"><?php esc_html_e( 'Brand & Manufacturer', 'mobile-pasal' ); ?></div>
					<div class="specs-value"><?php echo esc_html( $brand_name ?: get_the_title() ); ?></div>
				</div>
				<div class="specs-table-row">
					<div class="specs-label"><?php esc_html_e( 'Model Designation', 'mobile-pasal' ); ?></div>
					<div class="specs-value"><?php echo esc_html( $model_name ); ?></div>
				</div>
				<div class="specs-table-row">
					<div class="specs-label"><?php esc_html_e( 'Nepal Telecommunications Authority (NTA)', 'mobile-pasal' ); ?></div>
					<div class="specs-value">
						<span style="display:inline-flex;align-items:center;gap:6px;color:#16a34a;font-weight:750;">
							<svg viewBox="0 0 24 24" width="14" height="14" fill="currentColor"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg>
							<?php esc_html_e( '100% Genuine MDMS Registered with Tax Paid Invoice', 'mobile-pasal' ); ?>
						</span>
					</div>
				</div>
				<div class="specs-table-row">
					<div class="specs-label"><?php esc_html_e( 'Official Showroom Invoice', 'mobile-pasal' ); ?></div>
					<div class="specs-value"><?php esc_html_e( 'Official Serial Numbered VAT Invoice Issued at Counter', 'mobile-pasal' ); ?></div>
				</div>

				<!-- Group 2: Display & Screen Architecture -->
				<div class="specs-table-group-header">
					<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.2"><rect x="5" y="2" width="14" height="20" rx="2"></rect></svg>
					<span><?php esc_html_e( 'Display & Touch Visuals', 'mobile-pasal' ); ?></span>
				</div>
				<div class="specs-table-row">
					<div class="specs-label"><?php esc_html_e( 'Screen Configuration', 'mobile-pasal' ); ?></div>
					<div class="specs-value"><?php echo esc_html( ! empty( $spec_screen ) ? $spec_screen : __( 'Ultra-Vivid High Refresh Rate Panel', 'mobile-pasal' ) ); ?></div>
				</div>
				<div class="specs-table-row">
					<div class="specs-label"><?php esc_html_e( 'Protection & Glass', 'mobile-pasal' ); ?></div>
					<div class="specs-value"><?php esc_html_e( 'Tempered Scratch-Resistant Oleophobic Nano-Coating', 'mobile-pasal' ); ?></div>
				</div>

				<!-- Group 3: Processor & Memory Matrix -->
				<div class="specs-table-group-header">
					<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.2"><rect x="4" y="4" width="16" height="16" rx="2"></rect><rect x="9" y="9" width="6" height="6"></rect></svg>
					<span><?php esc_html_e( 'Processor & Performance Matrix', 'mobile-pasal' ); ?></span>
				</div>
				<div class="specs-table-row">
					<div class="specs-label"><?php esc_html_e( 'Processor / Chipset', 'mobile-pasal' ); ?></div>
					<div class="specs-value"><?php echo esc_html( ! empty( $spec_chip ) ? $spec_chip : __( 'High-Efficiency Multi-Core Mobile Engine', 'mobile-pasal' ) ); ?></div>
				</div>
				<div class="specs-table-row">
					<div class="specs-label"><?php esc_html_e( 'RAM & Internal Storage', 'mobile-pasal' ); ?></div>
					<div class="specs-value"><?php echo esc_html( ! empty( $spec_storage ) ? $spec_storage : __( 'High-Speed UFS / NVMe Storage Configuration', 'mobile-pasal' ) ); ?></div>
				</div>

				<!-- Group 4: Camera & Optics Setup -->
				<div class="specs-table-group-header">
					<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg>
					<span><?php esc_html_e( 'Optics & Imaging System', 'mobile-pasal' ); ?></span>
				</div>
				<div class="specs-table-row">
					<div class="specs-label"><?php esc_html_e( 'Camera Setup', 'mobile-pasal' ); ?></div>
					<div class="specs-value"><?php echo esc_html( ! empty( $spec_camera ) ? $spec_camera : __( 'High-Resolution Multi-Sensor Array with Night Mode', 'mobile-pasal' ) ); ?></div>
				</div>
				<div class="specs-table-row">
					<div class="specs-label"><?php esc_html_e( 'Video Capabilities', 'mobile-pasal' ); ?></div>
					<div class="specs-value"><?php esc_html_e( 'Ultra HD 4K / High Frame Rate Stabilization Supported', 'mobile-pasal' ); ?></div>
				</div>

				<!-- Group 5: Battery & Power Management -->
				<div class="specs-table-group-header">
					<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.2"><rect x="1" y="6" width="18" height="12" rx="2"></rect><line x1="23" y1="11" x2="23" y2="13"></line></svg>
					<span><?php esc_html_e( 'Power & Battery Architecture', 'mobile-pasal' ); ?></span>
				</div>
				<div class="specs-table-row">
					<div class="specs-label"><?php esc_html_e( 'Battery Capacity', 'mobile-pasal' ); ?></div>
					<div class="specs-value"><?php echo esc_html( ! empty( $spec_battery ) ? $spec_battery : __( 'All-Day High Endurance Battery Cell', 'mobile-pasal' ) ); ?></div>
				</div>
				<div class="specs-table-row">
					<div class="specs-label"><?php esc_html_e( 'Fast Charging Standard', 'mobile-pasal' ); ?></div>
					<div class="specs-value"><?php esc_html_e( 'Official Rapid Charging Protocol with Intelligent Thermal Guard', 'mobile-pasal' ); ?></div>
				</div>

				<!-- Group 6: Official Warranty & Showroom After-Sales -->
				<div class="specs-table-group-header">
					<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
					<span><?php esc_html_e( 'Official Warranty & Counter After-Sales', 'mobile-pasal' ); ?></span>
				</div>
				<div class="specs-table-row">
					<div class="specs-label"><?php esc_html_e( 'Warranty Coverage', 'mobile-pasal' ); ?></div>
					<div class="specs-value"><?php echo esc_html( $spec_warranty ); ?></div>
				</div>
				<div class="specs-table-row">
					<div class="specs-label"><?php esc_html_e( 'Data Migration Support', 'mobile-pasal' ); ?></div>
					<div class="specs-value"><?php esc_html_e( 'Complimentary WhatsApp, Photos & Contacts Migration at Gulariya Counter', 'mobile-pasal' ); ?></div>
				</div>
				<div class="specs-table-row">
					<div class="specs-label"><?php esc_html_e( 'Trade-In / Exchange', 'mobile-pasal' ); ?></div>
					<div class="specs-value"><?php esc_html_e( 'Instant On-Spot Valuation Available for Old Working Handsets', 'mobile-pasal' ); ?></div>
				</div>

			</div>
		</div>
	</section>

	<!-- 5. Editorial Overview & Counter Insights -->
	<section id="editorial-overview" class="section-wrap" style="padding: 20px 0 50px;">
		<div class="wrap">
			<div class="sec-head" style="margin-bottom: 24px;">
				<span class="sec-kicker"><?php esc_html_e( 'Expert Evaluation', 'mobile-pasal' ); ?></span>
				<h2><?php esc_html_e( 'Device Overview & Highlights', 'mobile-pasal' ); ?></h2>
			</div>

			<div class="handset-description-card">
				<?php
				$content = get_the_content();
				if ( ! empty( trim( $content ) ) ) {
					the_content();
				} else {
					?>
					<h3><?php printf( esc_html__( 'Experience Next-Level Mobility with %s', 'mobile-pasal' ), get_the_title() ); ?></h3>
					<p><?php printf( esc_html__( 'Engineered for exceptional performance and daily durability, the %s represents the pinnacle of modern mobile engineering. Available now directly at Ali Mobile Gulariya, each unit is 100%% genuine, sourced through authorized national distributor channels, and backed by genuine manufacturer warranty.', 'mobile-pasal' ), get_the_title() ); ?></p>
					
					<h3><?php esc_html_e( 'Why Purchase from Ali Mobile Gulariya?', 'mobile-pasal' ); ?></h3>
					<p><?php esc_html_e( 'When you purchase your smartphone from our physical showroom in Bardiya, you eliminate the risks of gray-market imports, locked SIMs, or unverified MDMS registrations. We issue a legitimate serial-numbered VAT bill and offer on-the-spot data migration, so you can walk out with your new phone completely ready to use.', 'mobile-pasal' ); ?></p>
					<?php
				}
				?>
			</div>
		</div>
	</section>

	<!-- 6. Assurance Ribbon: The Ali Mobile 4-Pillar Handset Guarantee -->
	<section id="counter-assurance" class="section-wrap trust-features-section" style="padding: 40px 0 60px;">
		<div class="tech-bg-grid" aria-hidden="true"></div>
		<div class="tech-ring-accent" aria-hidden="true"></div>
		<div class="wrap">
			<div class="sec-head sec-head-center" style="margin-bottom: 32px;">
				<span class="sec-kicker"><?php esc_html_e( 'Guaranteed Genuine', 'mobile-pasal' ); ?></span>
				<h2><?php esc_html_e( 'The Ali Mobile Assurance', 'mobile-pasal' ); ?></h2>
				<p><?php esc_html_e( 'Every smartphone sold at our counter comes backed with legitimate consumer protections and technical support.', 'mobile-pasal' ); ?></p>
			</div>

			<div class="steps-flow-grid" style="grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));">
				<div class="flow-step-card">
					<div class="flow-step-num">
						<svg viewBox="0 0 24 24" width="22" height="22" fill="currentColor"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg>
					</div>
					<h3><?php esc_html_e( '100% NTA Approved', 'mobile-pasal' ); ?></h3>
					<p><?php esc_html_e( 'Fully compliant with Nepal Telecommunications Authority IMEI registration. No SIM lock or network blacklisting issues.', 'mobile-pasal' ); ?></p>
				</div>

				<div class="flow-step-card">
					<div class="flow-step-num">
						<svg viewBox="0 0 24 24" width="22" height="22" fill="currentColor"><path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-5 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z"/></svg>
					</div>
					<h3><?php esc_html_e( 'Official VAT Bill', 'mobile-pasal' ); ?></h3>
					<p><?php esc_html_e( 'Every purchase comes with a legitimate serial invoice for official brand warranty claims across Nepal.', 'mobile-pasal' ); ?></p>
				</div>

				<div class="flow-step-card">
					<div class="flow-step-num">
						<svg viewBox="0 0 24 24" width="22" height="22" fill="currentColor"><path d="M16 17.01V10h-2v7.01h-3L15 21l4-3.99h-3zM9 3L5 6.99h3V14h2V6.99h3L9 3z"/></svg>
					</div>
					<h3><?php esc_html_e( 'Free Data Transfer', 'mobile-pasal' ); ?></h3>
					<p><?php esc_html_e( 'Our technicians migrate your WhatsApp, contacts, and photos safely to your new phone right at the counter.', 'mobile-pasal' ); ?></p>
				</div>

				<div class="flow-step-card">
					<div class="flow-step-num">
						<svg viewBox="0 0 24 24" width="22" height="22" fill="currentColor"><path d="M12 4V1L8 5l4 4V6c3.31 0 6 2.69 6 6 0 1.01-.25 1.97-.7 2.8l1.46 1.46C19.54 15.03 20 13.57 20 12c0-4.42-3.58-8-8-8zm0 14c-3.31 0-6-2.69-6-6 0-1.01.25-1.97.7-2.8L5.24 7.74C4.46 8.97 4 10.43 4 12c0 4.42 3.58 8 8 8v3l4-4-4-4v3z"/></svg>
					</div>
					<h3><?php esc_html_e( 'Trade-In Counter', 'mobile-pasal' ); ?></h3>
					<p><?php esc_html_e( 'Bring your old handset for fair trade-in evaluation toward any new smartphone upgrade.', 'mobile-pasal' ); ?></p>
				</div>
			</div>
		</div>
	</section>

	<!-- 7. Similar / Related Handsets Section -->
	<?php
	$related_args = array(
		'post_type'           => 'handset',
		'posts_per_page'      => 4,
		'post__not_in'        => array( $post_id ),
		'ignore_sticky_posts' => 1,
	);
	if ( ! empty( $brand_terms ) && ! is_wp_error( $brand_terms ) ) {
		$related_args['tax_query'] = array(
			array(
				'taxonomy' => 'device_brand',
				'field'    => 'term_id',
				'terms'    => $brand_terms[0]->term_id,
			),
		);
	}
	$related_query = new WP_Query( $related_args );
	if ( ! $related_query->have_posts() && isset( $related_args['tax_query'] ) ) {
		// Fallback to recent handsets if no same-brand items
		unset( $related_args['tax_query'] );
		$related_query = new WP_Query( $related_args );
	}

	if ( $related_query->have_posts() ) :
		?>
		<section id="related-handsets" class="section-wrap" style="padding: 20px 0 60px;">
			<div class="wrap">
				<div class="sec-head" style="margin-bottom: 28px;">
					<span class="sec-kicker"><?php esc_html_e( 'Explore More Options', 'mobile-pasal' ); ?></span>
					<h2><?php esc_html_e( 'Similar Smartphone Models', 'mobile-pasal' ); ?></h2>
					<p><?php esc_html_e( 'Compare related handsets available at our Gulariya counter showroom.', 'mobile-pasal' ); ?></p>
				</div>

				<div class="related-handsets-grid">
					<?php
					while ( $related_query->have_posts() ) :
						$related_query->the_post();
						$rel_id         = get_the_ID();
						$rel_brand      = wp_get_post_terms( $rel_id, 'device_brand', array( 'fields' => 'names' ) );
						$rel_brand_str  = ! empty( $rel_brand ) ? $rel_brand[0] : get_post_meta( $rel_id, '_mp_brand', true );
						$rel_badge      = get_post_meta( $rel_id, '_mp_badge', true ) ?: __( 'Official', 'mobile-pasal' );
						$rel_price      = get_post_meta( $rel_id, '_mp_price', true );
						$rel_old_price  = get_post_meta( $rel_id, '_mp_old_price', true );
						$rel_hide_price = get_post_meta( $rel_id, '_mp_hide_price', true );
						$rel_img        = function_exists( 'mp_get_handset_img_url' ) ? mp_get_handset_img_url( $rel_id ) : get_the_post_thumbnail_url( $rel_id, 'medium' );
						$rel_permalink  = get_permalink( $rel_id );

						// Show/Hide check for related card
						$rel_show_price = ( $global_show_price == '1' || $global_show_price === 1 || $global_show_price === true ) && empty( $rel_hide_price ) && ! empty( $rel_price );
						$rel_price_fmt  = is_numeric( $rel_price ) ? 'NPR ' . number_format( (float) $rel_price ) : $rel_price;

						$rel_screen  = get_post_meta( $rel_id, '_mp_spec_screen', true ) ?: get_post_meta( $rel_id, '_mp_display', true );
						$rel_chip    = get_post_meta( $rel_id, '_mp_spec_chip', true ) ?: get_post_meta( $rel_id, '_mp_processor', true );
						$rel_storage = get_post_meta( $rel_id, '_mp_spec_storage', true );
						?>
						<article class="product-card">
							<div class="product-card-topbar">
								<span class="product-badge-pill"><?php echo esc_html( $rel_badge ); ?></span>
								<span class="product-nta-tag" style="font-size:11px;font-weight:750;color:#16a34a;display:inline-flex;align-items:center;gap:4px;">
									<svg viewBox="0 0 24 24" width="11" height="11" fill="currentColor"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg>
									NTA
								</span>
							</div>

							<a class="product-img-anchor" href="<?php echo esc_url( $rel_permalink ); ?>" aria-label="<?php the_title_attribute(); ?>">
								<div class="product-img-wrap" style="aspect-ratio:1/1;display:flex;align-items:center;justify-content:center;padding:16px;">
									<img src="<?php echo esc_url( $rel_img ); ?>" alt="<?php the_title_attribute(); ?>" loading="lazy" style="max-height:160px;max-width:100%;object-fit:contain;">
								</div>
							</a>

							<div class="product-body">
								<?php if ( ! empty( $rel_brand_str ) ) : ?>
									<span class="product-brand-kicker" style="font-size:11px;margin-bottom:4px;"><?php echo esc_html( $rel_brand_str ); ?></span>
								<?php endif; ?>
								
								<h4 class="product-title" style="font-size:15px;font-weight:800;line-height:1.3;margin:0 0 10px;">
									<a href="<?php echo esc_url( $rel_permalink ); ?>"><?php the_title(); ?></a>
								</h4>

								<!-- Pricing or Inquire badge -->
								<div style="margin-bottom:12px;">
									<?php if ( $rel_show_price ) : ?>
										<div style="display:flex;align-items:baseline;gap:8px;">
											<strong style="color:var(--primary, #0066cc);font-size:16px;font-weight:850;"><?php echo esc_html( $rel_price_fmt ); ?></strong>
										</div>
									<?php else : ?>
										<span style="display:inline-block;background:#eff6ff;color:#1d4ed8;border:1px solid #bfdbfe;border-radius:6px;font-size:11.5px;font-weight:750;padding:3px 8px;">
											<?php echo esc_html( $hidden_price_text ); ?>
										</span>
									<?php endif; ?>
								</div>

								<!-- Hardware Chips -->
								<div class="product-spec-chips" style="display:flex;flex-wrap:wrap;gap:5px;margin-bottom:14px;">
									<?php if ( ! empty( $rel_chip ) ) : ?>
										<span class="spec-chip" style="font-size:11px;background:#f8fafc;border:1px solid #e2eaf5;padding:3px 8px;border-radius:6px;color:#475569;">
											<?php echo esc_html( wp_trim_words( $rel_chip, 2, '' ) ); ?>
										</span>
									<?php endif; ?>
									<?php if ( ! empty( $rel_screen ) ) : ?>
										<span class="spec-chip" style="font-size:11px;background:#f8fafc;border:1px solid #e2eaf5;padding:3px 8px;border-radius:6px;color:#475569;">
											<?php echo esc_html( wp_trim_words( $rel_screen, 2, '' ) ); ?>
										</span>
									<?php endif; ?>
								</div>

								<div class="product-action-dock" style="margin-top:auto;display:flex;gap:8px;">
									<a class="btn btn-outline btn-sm btn-block" href="<?php echo esc_url( $rel_permalink ); ?>" style="flex:1;justify-content:center;text-align:center;">
										<span><?php esc_html_e( 'View Details', 'mobile-pasal' ); ?></span>
									</a>
								</div>
							</div>
						</article>
						<?php
					endwhile;
					wp_reset_postdata();
					?>
				</div>
			</div>
		</section>
		<?php
	endif;
	?>

</main>

	<?php
endwhile;

get_footer();
