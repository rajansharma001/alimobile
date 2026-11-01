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

	// Handset Showcase Image & Multi-Angle Gallery
	$img_url      = function_exists( 'mp_get_handset_img_url' ) ? mp_get_handset_img_url( $post_id ) : get_the_post_thumbnail_url( $post_id, 'large' );
	$gallery_raw  = get_post_meta( $post_id, '_mp_gallery_urls', true );
	$gallery_urls = array( $img_url );
	if ( ! empty( $gallery_raw ) ) {
		$extra_imgs = preg_split( '/[\r\n,]+/', (string) $gallery_raw );
		foreach ( $extra_imgs as $ex_url ) {
			$ex_url = trim( $ex_url );
			if ( ! empty( $ex_url ) && ! in_array( $ex_url, $gallery_urls, true ) ) {
				$gallery_urls[] = $ex_url;
			}
		}
	}

	// Price Visibility Calculation (unified helper respects Bulk Price Editor _mp_show_price, _mp_hide_price, and global toggle)
	$is_price_visible = function_exists( 'mp_is_handset_price_visible' )
		? mp_is_handset_price_visible( $post_id )
		: ( ( $global_show_price == '1' || $global_show_price === 1 || $global_show_price === true ) && empty( $per_product_hide ) && ! empty( $price ) );

	$numeric_price = (float) preg_replace( '/[^0-9.]/', '', (string) $price );

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

<div id="primary" class="site-main">

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
						<a class="crumb-link" href="<?php echo esc_url( home_url( '/shop/' ) ); ?>"><?php esc_html_e( 'Shop Handsets', 'mobile-pasal' ); ?></a>
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

	<!-- 2. Creative Bento Studio Showcase Section Consistent with Home Page -->
	<section class="section-wrap" style="padding: 36px 0 50px;">
		<div class="tech-bg-grid" aria-hidden="true"></div>
		<div class="tech-ring-accent tech-ring-right" aria-hidden="true"></div>
		
		<div class="container">
			<div class="flagship-bento-hero">
				
				<!-- Top Header Status Bar Consistent with Home Page -->
				<div class="flagship-header-bar">
					<div class="flagship-pill-left">
						<svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path></svg>
						<span><?php echo esc_html( $brand_name ?: __( 'Official Handset', 'mobile-pasal' ) ); ?> <?php esc_html_e( 'Showroom Unit', 'mobile-pasal' ); ?></span>
					</div>
				</div>

				<!-- Main Bento Split Grid -->
				<div class="single-handset-bento-grid">
					
					<!-- Column 1: Stage Pedestal Showcase (Left) -->
					<div class="flagship-stage-column">
						<div class="stage-pedestal-card">
							
							<!-- Floating Top Badge -->
							<div class="stage-floating-chip">
								<svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
								<span><?php echo esc_html( $badge ); ?> • 100% NTA MDMS</span>
							</div>

							<!-- Device Image Frame with Subtle Drop Shadow, Gallery Switcher & Lightbox Zoom -->
							<div class="stage-device-frame" id="mpMainStageFrame" role="button" tabindex="0" aria-label="<?php esc_attr_e( 'Click to zoom handset image', 'mobile-pasal' ); ?>" style="cursor: zoom-in; position: relative;">
								<img id="mpMainStageImg" src="<?php echo esc_url( $img_url ); ?>" alt="<?php the_title_attribute(); ?>" loading="eager" style="transition: transform 0.35s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.2s ease;" />
								<button type="button" class="stage-zoom-trigger" id="mpLightboxOpenBtn" aria-label="<?php esc_attr_e( 'Open Fullscreen Zoom', 'mobile-pasal' ); ?>">
									<svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line><line x1="11" y1="8" x2="11" y2="14"></line><line x1="8" y1="11" x2="14" y2="11"></line></svg>
									<span><?php esc_html_e( 'Click to Zoom', 'mobile-pasal' ); ?></span>
								</button>
							</div>

							<!-- Interactive Multi-Angle / Studio Gallery Strip -->
							<div class="stage-gallery-strip" role="region" aria-label="<?php esc_attr_e( 'Product Gallery Views', 'mobile-pasal' ); ?>">
								<?php if ( count( $gallery_urls ) > 1 ) : ?>
									<?php foreach ( $gallery_urls as $g_idx => $g_url ) : ?>
										<button type="button" class="stage-gallery-thumb <?php echo 0 === $g_idx ? 'active' : ''; ?>" data-img="<?php echo esc_url( $g_url ); ?>" data-scale="1" data-origin="center center" aria-label="<?php echo esc_attr( sprintf( __( 'Gallery photo %d', 'mobile-pasal' ), $g_idx + 1 ) ); ?>">
											<img src="<?php echo esc_url( $g_url ); ?>" alt="" loading="lazy" />
										</button>
									<?php endforeach; ?>
								<?php else : ?>
									<button type="button" class="stage-gallery-thumb active" data-img="<?php echo esc_url( $img_url ); ?>" data-scale="1" data-origin="center center">
										<img src="<?php echo esc_url( $img_url ); ?>" alt="" loading="lazy" />
										<span><?php esc_html_e( 'Full View', 'mobile-pasal' ); ?></span>
									</button>
									<button type="button" class="stage-gallery-thumb" data-img="<?php echo esc_url( $img_url ); ?>" data-scale="1.32" data-origin="center 28%">
										<img src="<?php echo esc_url( $img_url ); ?>" alt="" loading="lazy" style="transform:scale(1.35); transform-origin:center 28%;" />
										<span><?php esc_html_e( 'Optics Close-Up', 'mobile-pasal' ); ?></span>
									</button>
									<button type="button" class="stage-gallery-thumb" data-img="<?php echo esc_url( $img_url ); ?>" data-scale="1.25" data-origin="center 72%">
										<img src="<?php echo esc_url( $img_url ); ?>" alt="" loading="lazy" style="transform:scale(1.28); transform-origin:center 72%;" />
										<span><?php esc_html_e( 'Chassis & Frame', 'mobile-pasal' ); ?></span>
									</button>
								<?php endif; ?>
							</div>

							<!-- Official Color Finishes Swatches -->
							<?php if ( ! empty( $color_list ) ) : ?>
								<div class="finish-interactive-console" style="width: 100%; margin-top: 20px; margin-bottom: 0;">
									<span class="finish-console-title"><?php esc_html_e( 'OFFICIAL COLOR FINISHES:', 'mobile-pasal' ); ?></span>
									<div class="finish-chips-row">
										<?php foreach ( $color_list as $c_name ) : ?>
											<div class="finish-chip">
												<span class="finish-circle" style="background: <?php echo esc_attr( mp_get_color_dot_style( $c_name ) ); ?>;"></span>
												<span class="finish-name"><?php echo esc_html( $c_name ); ?></span>
											</div>
										<?php endforeach; ?>
									</div>
								</div>
							<?php endif; ?>

							<!-- In-Box Retail Items Preview -->
							<div class="product-inbox-dock" style="width: 100%; margin-top: 16px;">
								<div class="product-inbox-title">
									<svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
									<span><?php esc_html_e( 'Included in Retail Box', 'mobile-pasal' ); ?></span>
								</div>
								<div class="product-inbox-tags">
									<span class="product-inbox-tag"><svg viewBox="0 0 24 24" width="12" height="12" fill="none" stroke="currentColor" stroke-width="2"><rect x="5" y="2" width="14" height="20" rx="2"></rect></svg> <?php echo esc_html( wp_trim_words( get_the_title(), 3, '' ) ); ?></span>
									<span class="product-inbox-tag"><svg viewBox="0 0 24 24" width="12" height="12" fill="none" stroke="currentColor" stroke-width="2"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"></path></svg> Type-C Cable</span>
									<span class="product-inbox-tag"><svg viewBox="0 0 24 24" width="12" height="12" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg> SIM Pin</span>
									<span class="product-inbox-tag"><svg viewBox="0 0 24 24" width="12" height="12" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line></svg> VAT Warranty Bill</span>
								</div>
							</div>

							<!-- Stage Footer Assurances -->
							<div class="stage-footer-assurances" style="width: 100%; margin-top: 16px;">
								<div class="stage-assurance-pill pill-verified">
									<svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="vertical-align: -2px; margin-right: 4px;"><polyline points="20 6 9 17 4 12"></polyline></svg>
									<span>100% Tax Compliant</span>
								</div>
								<div class="stage-assurance-pill">
									<svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="vertical-align: -2px; margin-right: 4px;"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
									<span>Official 1-Year Warranty</span>
								</div>
							</div>

						</div>
					</div>

					<!-- Column 2: Core Details, Pricing & Action Hub (Right) -->
					<div class="flagship-core-column">
						<h1 class="flagship-title-hero" style="font-size: clamp(28px, 3.2vw, 42px);"><?php the_title(); ?></h1>
						<div class="flagship-tagline-chip">
							<?php echo esc_html( $spec_chip ?: ( $brand_name . ' ' . __( 'Verified Nepal Handset', 'mobile-pasal' ) ) ); ?>
						</div>

						<!-- Pricing Terminal Box -->
						<div class="product-price-hub" style="margin-bottom: 24px;">
							<?php if ( $is_price_visible ) : ?>
								<div class="product-price-row" style="align-items: baseline; gap: 14px;">
									<span class="product-selling-price" style="font-size: clamp(30px, 3.8vw, 42px); color: var(--blue); font-weight: 900;"><?php echo esc_html( $price_formatted ); ?></span>
									<?php if ( ! empty( $old_price_formatted ) ) : ?>
										<span class="product-regular-price" style="font-size: 17px;"><?php echo esc_html( $old_price_formatted ); ?></span>
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
						</div>

						<!-- 6 Quick Bento Hardware Spec Pods Matching Home Page -->
						<div class="flagship-bento-specs">
							<?php if ( ! empty( $spec_chip ) ) : ?>
								<div class="spec-bento-pod">
									<div class="spec-pod-icon">
										<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="4" y="4" width="16" height="16" rx="2"></rect><rect x="9" y="9" width="6" height="6"></rect><line x1="9" y1="1" x2="9" y2="4"></line><line x1="15" y1="1" x2="15" y2="4"></line><line x1="9" y1="20" x2="9" y2="23"></line><line x1="15" y1="20" x2="15" y2="23"></line><line x1="20" y1="9" x2="23" y2="9"></line><line x1="20" y1="14" x2="23" y2="14"></line><line x1="1" y1="9" x2="4" y2="9"></line><line x1="1" y1="14" x2="4" y2="14"></line></svg>
									</div>
									<div class="spec-pod-body">
										<strong><?php echo esc_html( wp_trim_words( $spec_chip, 3, '' ) ); ?></strong>
										<small><?php esc_html_e( 'Processor & Chipset', 'mobile-pasal' ); ?></small>
									</div>
								</div>
							<?php endif; ?>

							<?php if ( ! empty( $spec_screen ) ) : ?>
								<div class="spec-bento-pod">
									<div class="spec-pod-icon">
										<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="5" y="2" width="14" height="20" rx="2"></rect><line x1="12" y1="18" x2="12.01" y2="18"></line></svg>
									</div>
									<div class="spec-pod-body">
										<strong><?php echo esc_html( wp_trim_words( $spec_screen, 3, '' ) ); ?></strong>
										<small><?php esc_html_e( 'Display Architecture', 'mobile-pasal' ); ?></small>
									</div>
								</div>
							<?php endif; ?>

							<?php if ( ! empty( $spec_camera ) ) : ?>
								<div class="spec-bento-pod">
									<div class="spec-pod-icon">
										<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg>
									</div>
									<div class="spec-pod-body">
										<strong><?php echo esc_html( wp_trim_words( $spec_camera, 3, '' ) ); ?></strong>
										<small><?php esc_html_e( 'Optics & Camera', 'mobile-pasal' ); ?></small>
									</div>
								</div>
							<?php endif; ?>

							<?php if ( ! empty( $spec_battery ) ) : ?>
								<div class="spec-bento-pod">
									<div class="spec-pod-icon">
										<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="1" y="6" width="18" height="12" rx="2"></rect><line x1="23" y1="11" x2="23" y2="13"></line><line x1="6" y1="10" x2="6" y2="14"></line><line x1="10" y1="10" x2="10" y2="14"></line><line x1="14" y1="10" x2="14" y2="14"></line></svg>
									</div>
									<div class="spec-pod-body">
										<strong><?php echo esc_html( wp_trim_words( $spec_battery, 3, '' ) ); ?></strong>
										<small><?php esc_html_e( 'Battery Endurance', 'mobile-pasal' ); ?></small>
									</div>
								</div>
							<?php endif; ?>

							<?php if ( ! empty( $spec_storage ) ) : ?>
								<div class="spec-bento-pod">
									<div class="spec-pod-icon">
										<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="22" y1="12" x2="2" y2="12"></line><path d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"></path><line x1="6" y1="16" x2="6.01" y2="16"></line><line x1="10" y1="16" x2="10.01" y2="16"></line></svg>
									</div>
									<div class="spec-pod-body">
										<strong><?php echo esc_html( wp_trim_words( $spec_storage, 3, '' ) ); ?></strong>
										<small><?php esc_html_e( 'Memory & RAM', 'mobile-pasal' ); ?></small>
									</div>
								</div>
							<?php endif; ?>

							<?php if ( ! empty( $spec_warranty ) ) : ?>
								<div class="spec-bento-pod">
									<div class="spec-pod-icon">
										<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
									</div>
									<div class="spec-pod-body">
										<strong><?php echo esc_html( wp_trim_words( $spec_warranty, 3, '' ) ); ?></strong>
										<small><?php esc_html_e( 'Warranty Coverage', 'mobile-pasal' ); ?></small>
									</div>
								</div>
							<?php endif; ?>
						</div>

						<!-- Action Buttons Row Consistent with Home Page -->
						<?php
						$main_compare_payload = wp_json_encode( array(
							'id'       => (int) $post_id,
							'title'    => get_the_title(),
							'brand'    => $brand_name ?: 'Handset',
							'img'      => $img_url,
							'url'      => get_permalink( $post_id ),
							'priceFmt' => $is_price_visible ? $price_formatted : $hidden_price_text,
							'screen'   => $spec_screen ?: '—',
							'chip'     => $spec_chip ?: '—',
							'camera'   => $spec_camera ?: '—',
							'battery'  => $spec_battery ?: '—',
							'storage'  => $spec_storage ?: '—',
							'warranty' => $spec_warranty ?: '1 Year Official Warranty',
						) );
						?>
						<div class="flagship-action-row" style="margin-bottom: 24px;">
							<a class="btn-flagship-wa" href="<?php echo esc_url( $wa_url ); ?>" target="_blank" rel="noopener noreferrer">
								<svg viewBox="0 0 24 24" width="18" height="18" fill="currentColor" aria-hidden="true"><path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0 0 12.04 2m.01 1.67c2.2 0 4.26.86 5.82 2.42a8.225 8.225 0 0 1 2.41 5.83c0 4.54-3.7 8.24-8.24 8.24-1.48 0-2.93-.4-4.2-1.15l-.3-.18-3.12.82.83-3.04-.2-.31a8.196 8.196 0 0 1-1.26-4.38c0-4.54 3.7-8.24 8.24-8.24m4.52 11.66c-.25-.13-1.47-.72-1.7-.81-.23-.08-.39-.13-.56.13-.17.25-.64.81-.79.97-.14.17-.29.19-.54.06-.25-.13-1.05-.39-2-1.23-.74-.66-1.24-1.47-1.39-1.72-.14-.25-.02-.39.11-.51.11-.11.25-.29.37-.43.13-.14.17-.25.25-.41.08-.17.04-.31-.02-.44-.06-.13-.56-1.34-.76-1.84-.2-.49-.4-.42-.56-.43h-.47c-.17 0-.44.06-.67.31-.23.25-.87.85-.87 2.08 0 1.23.9 2.41 1.02 2.58.13.17 1.76 2.69 4.27 3.77.6.26 1.07.41 1.43.53.6.19 1.15.16 1.58.1.48-.07 1.47-.6 1.68-1.18.21-.58.21-1.07.15-1.18-.06-.11-.23-.17-.48-.29z"/></svg>
								<span><?php echo $is_price_visible ? esc_html__( 'Direct WhatsApp Order', 'mobile-pasal' ) : esc_html__( 'Inquire Rate on WhatsApp', 'mobile-pasal' ); ?></span>
								<span class="btn-arrow">→</span>
							</a>
							<a class="btn-flagship-call" href="tel:+<?php echo esc_attr( $phone_raw ); ?>">
								<svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
								<span class="call-text-desktop"><?php printf( esc_html__( 'Call Store: %s', 'mobile-pasal' ), esc_html( $phone_number ) ); ?></span>
								<span class="call-text-mobile"><?php esc_html_e( 'Call Store', 'mobile-pasal' ); ?></span>
							</a>
							<button type="button" class="btn-flagship-compare card-compare-btn" data-id="<?php echo esc_attr( $post_id ); ?>" data-compare="<?php echo esc_attr( $main_compare_payload ); ?>">
								<svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="18" y1="20" x2="18" y2="10"></line><line x1="12" y1="20" x2="12" y2="4"></line><line x1="6" y1="20" x2="6" y2="14"></line></svg>
								<span class="compare-btn-label">
									<span class="comp-text-desktop"><?php esc_html_e( '+ Compare Specs', 'mobile-pasal' ); ?></span>
									<span class="comp-text-mobile"><?php esc_html_e( '+ Compare', 'mobile-pasal' ); ?></span>
								</span>
							</button>
						</div>

						<?php if ( $is_price_visible && $numeric_price >= 15000 ) : ?>
							<!-- Interactive EMI / Monthly Installment Estimator Card -->
							<div class="handset-emi-card" id="mpEmiCalculator" data-price="<?php echo esc_attr( $numeric_price ); ?>" data-title="<?php the_title_attribute(); ?>" data-wa="<?php echo esc_attr( $wa_number ); ?>">
								<div class="handset-emi-header">
									<div class="handset-emi-title-wrap">
										<span class="handset-emi-icon">
											<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.2"><rect x="2" y="5" width="20" height="14" rx="2"></rect><line x1="2" y1="10" x2="22" y2="10"></line></svg>
										</span>
										<div>
											<h3 class="handset-emi-title"><?php esc_html_e( 'Flexible EMI & Downpayment Estimator', 'mobile-pasal' ); ?></h3>
											<p class="handset-emi-subtitle"><?php esc_html_e( 'Instant counter financing estimation for credit card & partner bank EMI plans', 'mobile-pasal' ); ?></p>
										</div>
									</div>
									<div class="handset-emi-monthly-box">
										<span class="emi-monthly-label"><?php esc_html_e( 'Estimated Monthly', 'mobile-pasal' ); ?></span>
										<strong class="emi-monthly-value" id="mpEmiMonthlyVal">NPR <?php echo esc_html( number_format( round( ( $numeric_price * 0.60 ) / 12 ) ) ); ?><span>/mo</span></strong>
									</div>
								</div>

								<div class="handset-emi-controls">
									<div class="emi-control-col">
										<div class="emi-label-row">
											<label for="mpEmiDownSlider"><?php esc_html_e( 'Downpayment Percentage', 'mobile-pasal' ); ?></label>
											<strong id="mpEmiDownPctLabel">40% (NPR <?php echo esc_html( number_format( round( $numeric_price * 0.40 ) ) ); ?>)</strong>
										</div>
										<input type="range" id="mpEmiDownSlider" min="20" max="70" step="5" value="40" class="emi-range-slider" />
										<div class="emi-range-Notches">
											<span>20% Min</span>
											<span>40% Standard</span>
											<span>70% Max</span>
										</div>
									</div>

									<div class="emi-control-col">
										<div class="emi-label-row">
											<span><?php esc_html_e( 'Installment Tenure', 'mobile-pasal' ); ?></span>
											<strong id="mpEmiFinancedLabel"><?php esc_html_e( 'Loan:', 'mobile-pasal' ); ?> NPR <?php echo esc_html( number_format( round( $numeric_price * 0.60 ) ) ); ?></strong>
										</div>
										<div class="emi-tenure-pills" role="group" aria-label="<?php esc_attr_e( 'Select EMI Months', 'mobile-pasal' ); ?>">
											<button type="button" class="emi-tenure-btn" data-months="6">6 <?php esc_html_e( 'Months', 'mobile-pasal' ); ?></button>
											<button type="button" class="emi-tenure-btn active" data-months="12">12 <?php esc_html_e( 'Months', 'mobile-pasal' ); ?></button>
											<button type="button" class="emi-tenure-btn" data-months="18">18 <?php esc_html_e( 'Months', 'mobile-pasal' ); ?></button>
										</div>
									</div>
								</div>

								<div class="handset-emi-footer">
									<span class="emi-note"><?php esc_html_e( '*0% to low-interest partner bank & showroom EMI subject to citizenship / card verification at Gulariya counter.', 'mobile-pasal' ); ?></span>
									<a href="<?php echo esc_url( $wa_url ); ?>" id="mpEmiWaBtn" target="_blank" rel="noopener noreferrer" class="emi-wa-apply-btn">
										<svg viewBox="0 0 24 24" width="14" height="14" fill="currentColor"><path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0 0 12.04 2z"/></svg>
										<span><?php esc_html_e( 'Inquire EMI Plan on WhatsApp', 'mobile-pasal' ); ?></span>
									</a>
								</div>
							</div>
						<?php endif; ?>

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

	<!-- 3. Unified Handset Intelligence & Assurance Hub (Zero Scrolling Tabbed Bento Architecture) -->
	<section id="handset-hub" class="section-wrap handset-hub-section">
		<div class="tech-bg-grid" aria-hidden="true"></div>
		<div class="container">

			<!-- Section Header -->
			<div class="section-header center" style="margin-bottom: 32px; display: flex; flex-direction: column; align-items: center; justify-content: center; text-align: center;">
				<span class="eyebrow" style="margin: 0 auto 12px;"><?php esc_html_e( 'DEVICE INTELLIGENCE & SHOWROOM ASSURANCE', 'mobile-pasal' ); ?></span>
				<h2 class="section-title" style="text-align: center; margin: 0 auto 10px; max-width: 820px;"><?php esc_html_e( 'Technical Specifications & Counter Assurance', 'mobile-pasal' ); ?></h2>
				<p class="section-subtitle" style="text-align: center; margin: 0 auto; max-width: 680px;"><?php printf( esc_html__( 'Verified hardware architecture, showroom highlights, and our 4-pillar buyer protection for %s.', 'mobile-pasal' ), get_the_title() ); ?></p>
			</div>

			<!-- Interactive Segmented Tab Controls -->
			<div class="handset-hub-tabs-bar" role="tablist" aria-label="<?php esc_attr_e( 'Handset Intelligence Navigation', 'mobile-pasal' ); ?>">
				<button type="button" class="handset-hub-tab active" role="tab" id="tab-specs" aria-selected="true" aria-controls="pane-specs" data-target="pane-specs">
					<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.2"><rect x="4" y="4" width="16" height="16" rx="2"></rect><rect x="9" y="9" width="6" height="6"></rect><line x1="9" y1="1" x2="9" y2="4"></line><line x1="15" y1="1" x2="15" y2="4"></line></svg>
					<span><?php esc_html_e( 'Full Specifications', 'mobile-pasal' ); ?></span>
					<span class="tab-badge"><?php esc_html_e( '6 Categories', 'mobile-pasal' ); ?></span>
				</button>
				<button type="button" class="handset-hub-tab" role="tab" id="tab-overview" aria-selected="false" aria-controls="pane-overview" data-target="pane-overview">
					<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line></svg>
					<span><?php esc_html_e( 'Overview & Highlights', 'mobile-pasal' ); ?></span>
				</button>
				<button type="button" class="handset-hub-tab" role="tab" id="tab-assurance" aria-selected="false" aria-controls="pane-assurance" data-target="pane-assurance">
					<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
					<span><?php esc_html_e( 'Ali Mobile Assurance', 'mobile-pasal' ); ?></span>
					<span class="tab-badge tab-badge-success"><?php esc_html_e( '4 Guarantees', 'mobile-pasal' ); ?></span>
				</button>
			</div>

			<!-- Tab Panes Container -->
			<div class="handset-hub-panes">

				<!-- PANE 1: Technical Specifications Bento Grid -->
				<div id="pane-specs" class="handset-hub-pane active" role="tabpanel" aria-labelledby="tab-specs">
					<div id="specs-matrix" class="specs-bento-grid">

						<!-- Card 1: General & Nepal MDMS Compliance -->
						<div class="spec-bento-card">
							<div class="spec-bento-card-header">
								<div class="spec-bento-card-icon">
									<svg viewBox="0 0 24 24" width="15" height="15" fill="none" stroke="currentColor" stroke-width="2.3"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
								</div>
								<span class="spec-bento-card-title"><?php esc_html_e( 'General & Nepal MDMS Compliance', 'mobile-pasal' ); ?></span>
							</div>
							<div class="spec-bento-card-body">
								<div class="spec-bento-row">
									<span class="spec-bento-label"><?php esc_html_e( 'Brand & Manufacturer', 'mobile-pasal' ); ?></span>
									<span class="spec-bento-val"><?php echo esc_html( $brand_name ?: get_the_title() ); ?></span>
								</div>
								<div class="spec-bento-row">
									<span class="spec-bento-label"><?php esc_html_e( 'Model Designation', 'mobile-pasal' ); ?></span>
									<span class="spec-bento-val"><?php echo esc_html( $model_name ); ?></span>
								</div>
								<div class="spec-bento-row">
									<span class="spec-bento-label"><?php esc_html_e( 'NTA MDMS Status', 'mobile-pasal' ); ?></span>
									<span class="spec-bento-val" style="color: #16a34a; display: inline-flex; align-items: center; gap: 4px;">
										<svg viewBox="0 0 24 24" width="13" height="13" fill="currentColor"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg>
										<?php esc_html_e( '100% Registered (Tax Paid)', 'mobile-pasal' ); ?>
									</span>
								</div>
								<div class="spec-bento-row">
									<span class="spec-bento-label"><?php esc_html_e( 'Showroom Invoice', 'mobile-pasal' ); ?></span>
									<span class="spec-bento-val"><?php esc_html_e( 'Official Serial VAT Bill', 'mobile-pasal' ); ?></span>
								</div>
							</div>
						</div>

						<!-- Card 2: Display & Touch Visuals -->
						<div class="spec-bento-card">
							<div class="spec-bento-card-header">
								<div class="spec-bento-card-icon">
									<svg viewBox="0 0 24 24" width="15" height="15" fill="none" stroke="currentColor" stroke-width="2.3"><rect x="5" y="2" width="14" height="20" rx="2"></rect><line x1="12" y1="18" x2="12.01" y2="18"></line></svg>
								</div>
								<span class="spec-bento-card-title"><?php esc_html_e( 'Display & Touch Visuals', 'mobile-pasal' ); ?></span>
							</div>
							<div class="spec-bento-card-body">
								<div class="spec-bento-row">
									<span class="spec-bento-label"><?php esc_html_e( 'Screen Configuration', 'mobile-pasal' ); ?></span>
									<span class="spec-bento-val"><?php echo esc_html( ! empty( $spec_screen ) ? $spec_screen : __( 'Ultra-Vivid High Refresh Rate Panel', 'mobile-pasal' ) ); ?></span>
								</div>
								<div class="spec-bento-row">
									<span class="spec-bento-label"><?php esc_html_e( 'Protection & Glass', 'mobile-pasal' ); ?></span>
									<span class="spec-bento-val"><?php esc_html_e( 'Tempered Scratch-Resistant Oleophobic Nano-Coating', 'mobile-pasal' ); ?></span>
								</div>
							</div>
						</div>

						<!-- Card 3: Processor & Memory Matrix -->
						<div class="spec-bento-card">
							<div class="spec-bento-card-header">
								<div class="spec-bento-card-icon">
									<svg viewBox="0 0 24 24" width="15" height="15" fill="none" stroke="currentColor" stroke-width="2.3"><rect x="4" y="4" width="16" height="16" rx="2"></rect><rect x="9" y="9" width="6" height="6"></rect><line x1="9" y1="1" x2="9" y2="4"></line><line x1="15" y1="1" x2="15" y2="4"></line></svg>
								</div>
								<span class="spec-bento-card-title"><?php esc_html_e( 'Processor & Performance Matrix', 'mobile-pasal' ); ?></span>
							</div>
							<div class="spec-bento-card-body">
								<div class="spec-bento-row">
									<span class="spec-bento-label"><?php esc_html_e( 'Processor / Chipset', 'mobile-pasal' ); ?></span>
									<span class="spec-bento-val"><?php echo esc_html( ! empty( $spec_chip ) ? $spec_chip : __( 'High-Efficiency Multi-Core Mobile Engine', 'mobile-pasal' ) ); ?></span>
								</div>
								<div class="spec-bento-row">
									<span class="spec-bento-label"><?php esc_html_e( 'RAM & Storage', 'mobile-pasal' ); ?></span>
									<span class="spec-bento-val"><?php echo esc_html( ! empty( $spec_storage ) ? $spec_storage : __( 'High-Speed UFS / NVMe Storage Configuration', 'mobile-pasal' ) ); ?></span>
								</div>
							</div>
						</div>

						<!-- Card 4: Camera & Optics Setup -->
						<div class="spec-bento-card">
							<div class="spec-bento-card-header">
								<div class="spec-bento-card-icon">
									<svg viewBox="0 0 24 24" width="15" height="15" fill="none" stroke="currentColor" stroke-width="2.3"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg>
								</div>
								<span class="spec-bento-card-title"><?php esc_html_e( 'Optics & Imaging System', 'mobile-pasal' ); ?></span>
							</div>
							<div class="spec-bento-card-body">
								<div class="spec-bento-row">
									<span class="spec-bento-label"><?php esc_html_e( 'Camera Setup', 'mobile-pasal' ); ?></span>
									<span class="spec-bento-val"><?php echo esc_html( ! empty( $spec_camera ) ? $spec_camera : __( 'High-Resolution Multi-Sensor Array with Night Mode', 'mobile-pasal' ) ); ?></span>
								</div>
								<div class="spec-bento-row">
									<span class="spec-bento-label"><?php esc_html_e( 'Video Capabilities', 'mobile-pasal' ); ?></span>
									<span class="spec-bento-val"><?php esc_html_e( 'Ultra HD 4K / High Frame Rate Stabilization', 'mobile-pasal' ); ?></span>
								</div>
							</div>
						</div>

						<!-- Card 5: Battery & Power Architecture -->
						<div class="spec-bento-card">
							<div class="spec-bento-card-header">
								<div class="spec-bento-card-icon">
									<svg viewBox="0 0 24 24" width="15" height="15" fill="none" stroke="currentColor" stroke-width="2.3"><rect x="1" y="6" width="18" height="12" rx="2"></rect><line x1="23" y1="11" x2="23" y2="13"></line></svg>
								</div>
								<span class="spec-bento-card-title"><?php esc_html_e( 'Power & Battery Architecture', 'mobile-pasal' ); ?></span>
							</div>
							<div class="spec-bento-card-body">
								<div class="spec-bento-row">
									<span class="spec-bento-label"><?php esc_html_e( 'Battery Capacity', 'mobile-pasal' ); ?></span>
									<span class="spec-bento-val"><?php echo esc_html( ! empty( $spec_battery ) ? $spec_battery : __( 'All-Day High Endurance Battery Cell', 'mobile-pasal' ) ); ?></span>
								</div>
								<div class="spec-bento-row">
									<span class="spec-bento-label"><?php esc_html_e( 'Fast Charging Standard', 'mobile-pasal' ); ?></span>
									<span class="spec-bento-val"><?php esc_html_e( 'Official Rapid Charging with Intelligent Thermal Guard', 'mobile-pasal' ); ?></span>
								</div>
							</div>
						</div>

						<!-- Card 6: Official Warranty & Showroom After-Sales -->
						<div class="spec-bento-card">
							<div class="spec-bento-card-header">
								<div class="spec-bento-card-icon">
									<svg viewBox="0 0 24 24" width="15" height="15" fill="none" stroke="currentColor" stroke-width="2.3"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
								</div>
								<span class="spec-bento-card-title"><?php esc_html_e( 'Official Warranty & After-Sales', 'mobile-pasal' ); ?></span>
							</div>
							<div class="spec-bento-card-body">
								<div class="spec-bento-row">
									<span class="spec-bento-label"><?php esc_html_e( 'Warranty Coverage', 'mobile-pasal' ); ?></span>
									<span class="spec-bento-val"><?php echo esc_html( $spec_warranty ?: __( '1 Year Official Brand Warranty', 'mobile-pasal' ) ); ?></span>
								</div>
								<div class="spec-bento-row">
									<span class="spec-bento-label"><?php esc_html_e( 'Data Migration', 'mobile-pasal' ); ?></span>
									<span class="spec-bento-val"><?php esc_html_e( 'Free WhatsApp, Photos & Contacts Migration', 'mobile-pasal' ); ?></span>
								</div>
								<div class="spec-bento-row">
									<span class="spec-bento-label"><?php esc_html_e( 'Trade-In / Exchange', 'mobile-pasal' ); ?></span>
									<span class="spec-bento-val"><?php esc_html_e( 'Instant On-Spot Valuation Available', 'mobile-pasal' ); ?></span>
								</div>
							</div>
						</div>

					</div>
				</div>

				<!-- PANE 2: Device Overview & Editorial Highlights -->
				<div id="pane-overview" class="handset-hub-pane" role="tabpanel" aria-labelledby="tab-overview">
					<div id="editorial-overview" class="handset-description-card">
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

				<!-- PANE 3: Ali Mobile 4-Pillar Handset Assurance -->
				<div id="pane-assurance" class="handset-hub-pane" role="tabpanel" aria-labelledby="tab-assurance">
					<div id="counter-assurance" class="assurance-pillars-grid">
						<!-- Pillar 1: 100% NTA Approved -->
						<article class="assurance-pillar-card">
							<div class="assurance-card-top">
								<div class="assurance-icon-box">
									<?php echo mp_get_icon_svg( 'shield', 24, 24 ); ?>
								</div>
								<span class="assurance-pillar-tag">01 &bull; NTA MDMS</span>
							</div>
							<h3 class="assurance-card-title"><?php echo esc_html( mp_opt( 'assurance1_title', '100% NTA Approved' ) ); ?></h3>
							<p class="assurance-card-desc"><?php echo esc_html( mp_opt( 'assurance1_desc', 'Compliant with Nepal Telecommunications Authority IMEI registration for uninterrupted SIM network connectivity nationwide.' ) ); ?></p>
							<div class="assurance-card-footer">
								<svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"></polyline></svg>
								<span><?php esc_html_e( 'Lifetime SIM Network Guarantee', 'mobile-pasal' ); ?></span>
							</div>
						</article>

						<!-- Pillar 2: Official VAT Bill -->
						<article class="assurance-pillar-card">
							<div class="assurance-card-top">
								<div class="assurance-icon-box">
									<?php echo mp_get_icon_svg( 'receipt', 24, 24 ); ?>
								</div>
								<span class="assurance-pillar-tag">02 &bull; VAT INVOICE</span>
							</div>
							<h3 class="assurance-card-title"><?php echo esc_html( mp_opt( 'assurance2_title', 'Official VAT Bill' ) ); ?></h3>
							<p class="assurance-card-desc"><?php echo esc_html( mp_opt( 'assurance2_desc', 'Every purchase comes with a legitimate serial-numbered VAT invoice valid for official 1-year brand warranty claims.' ) ); ?></p>
							<div class="assurance-card-footer">
								<svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"></polyline></svg>
								<span><?php esc_html_e( '1-Year Official Brand Warranty', 'mobile-pasal' ); ?></span>
							</div>
						</article>

						<!-- Pillar 3: Free Data Transfer -->
						<article class="assurance-pillar-card">
							<div class="assurance-card-top">
								<div class="assurance-icon-box">
									<?php echo mp_get_icon_svg( 'arrows-rotate', 24, 24 ); ?>
								</div>
								<span class="assurance-pillar-tag">03 &bull; SMART SETUP</span>
							</div>
							<h3 class="assurance-card-title"><?php echo esc_html( mp_opt( 'assurance3_title', 'Free Data Transfer' ) ); ?></h3>
							<p class="assurance-card-desc"><?php echo esc_html( mp_opt( 'assurance3_desc', 'We safely migrate your WhatsApp chats, photos, contacts, and mobile apps directly to your new phone before you leave.' ) ); ?></p>
							<div class="assurance-card-footer">
								<svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"></polyline></svg>
								<span><?php esc_html_e( '100% Zero Data Loss Migration', 'mobile-pasal' ); ?></span>
							</div>
						</article>

						<!-- Pillar 4: Trade-In Counter -->
						<article class="assurance-pillar-card">
							<div class="assurance-card-top">
								<div class="assurance-icon-box">
									<?php echo mp_get_icon_svg( 'store', 24, 24 ); ?>
								</div>
								<span class="assurance-pillar-tag">04 &bull; TRADE-IN DESK</span>
							</div>
							<h3 class="assurance-card-title"><?php echo esc_html( mp_opt( 'assurance4_title', 'Trade-In Counter' ) ); ?></h3>
							<p class="assurance-card-desc"><?php echo esc_html( mp_opt( 'assurance4_desc', 'Bring your old handset for fair, transparent counter evaluation toward the purchase of any new smartphone.' ) ); ?></p>
							<div class="assurance-card-footer">
								<svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"></polyline></svg>
								<span><?php esc_html_e( 'Instant Counter Exchange Credit', 'mobile-pasal' ); ?></span>
							</div>
						</article>
					</div>
				</div>

			</div>

		</div>
	</section>

	<!-- Fullscreen Lightbox Zoom Modal -->
	<div id="mpLightboxModal" class="mp-lightbox-modal" aria-hidden="true" role="dialog" aria-label="<?php esc_attr_e( 'Handset Fullscreen Zoom', 'mobile-pasal' ); ?>">
		<div class="mp-lightbox-backdrop" id="mpLightboxBackdrop"></div>
		<div class="mp-lightbox-content">
			<button type="button" class="mp-lightbox-close" id="mpLightboxClose" aria-label="<?php esc_attr_e( 'Close Zoom', 'mobile-pasal' ); ?>">&times;</button>
			<div class="mp-lightbox-stage">
				<img id="mpLightboxImg" src="<?php echo esc_url( $img_url ); ?>" alt="<?php the_title_attribute(); ?>" />
			</div>
			<div class="mp-lightbox-caption">
				<strong><?php the_title(); ?></strong>
				<span><?php echo esc_html( $badge ); ?> &bull; Ali Mobile Gulariya</span>
			</div>
		</div>
	</div>

	<script>
	(function() {
		function initHandsetHub() {
			var tabs = document.querySelectorAll('.handset-hub-tab');
			var panes = document.querySelectorAll('.handset-hub-pane');
			if (tabs.length && panes.length) {
				function activateTab(targetId) {
					tabs.forEach(function(t) {
						var match = t.getAttribute('data-target') === targetId;
						t.classList.toggle('active', match);
						t.setAttribute('aria-selected', match ? 'true' : 'false');
					});
					panes.forEach(function(p) {
						p.classList.toggle('active', p.id === targetId);
					});
				}

				tabs.forEach(function(btn) {
					btn.addEventListener('click', function(e) {
						e.preventDefault();
						var targetId = this.getAttribute('data-target');
						activateTab(targetId);
						if (history.replaceState) {
							var hashName = targetId === 'pane-specs' ? 'specs-matrix' : (targetId === 'pane-overview' ? 'editorial-overview' : 'counter-assurance');
							history.replaceState(null, '', '#' + hashName);
						}
					});
				});

				// Handle deep links from URL hash
				var hash = window.location.hash;
				if (hash === '#specs-matrix' || hash === '#specs') {
					activateTab('pane-specs');
				} else if (hash === '#editorial-overview' || hash === '#overview') {
					activateTab('pane-overview');
				} else if (hash === '#counter-assurance' || hash === '#assurance') {
					activateTab('pane-assurance');
				}
			}

			// Gallery Thumbnail Switcher & Lightbox Zoom
			var mainImg = document.getElementById('mpMainStageImg');
			var mainFrame = document.getElementById('mpMainStageFrame');
			var thumbs = document.querySelectorAll('.stage-gallery-thumb');
			var lbModal = document.getElementById('mpLightboxModal');
			var lbImg = document.getElementById('mpLightboxImg');
			var lbClose = document.getElementById('mpLightboxClose');
			var lbBackdrop = document.getElementById('mpLightboxBackdrop');

			if (mainImg && thumbs.length) {
				thumbs.forEach(function(thumb) {
					thumb.addEventListener('click', function() {
						thumbs.forEach(function(t) { t.classList.remove('active'); });
						this.classList.add('active');
						var newSrc = this.getAttribute('data-img');
						var scale = this.getAttribute('data-scale') || '1';
						var origin = this.getAttribute('data-origin') || 'center center';
						if (newSrc && mainImg.getAttribute('src') !== newSrc) {
							mainImg.style.opacity = '0.35';
							setTimeout(function() {
								mainImg.setAttribute('src', newSrc);
								if (lbImg) lbImg.setAttribute('src', newSrc);
								mainImg.style.opacity = '1';
							}, 120);
						}
						mainImg.style.transformOrigin = origin;
						mainImg.style.transform = 'scale(' + scale + ')';
					});
				});
			}

			function openLightbox() {
				if (!lbModal) return;
				if (lbImg && mainImg) {
					lbImg.setAttribute('src', mainImg.getAttribute('src'));
				}
				lbModal.classList.add('active');
				lbModal.setAttribute('aria-hidden', 'false');
				document.body.style.overflow = 'hidden';
			}

			function closeLightbox() {
				if (!lbModal) return;
				lbModal.classList.remove('active');
				lbModal.setAttribute('aria-hidden', 'true');
				document.body.style.overflow = '';
			}

			if (mainFrame) {
				mainFrame.addEventListener('click', openLightbox);
				mainFrame.addEventListener('keydown', function(e) {
					if (e.key === 'Enter' || e.key === ' ') {
						e.preventDefault();
						openLightbox();
					}
				});
			}
			if (lbClose) lbClose.addEventListener('click', closeLightbox);
			if (lbBackdrop) lbBackdrop.addEventListener('click', closeLightbox);
			document.addEventListener('keydown', function(e) {
				if (e.key === 'Escape' && lbModal && lbModal.classList.contains('active')) {
					closeLightbox();
				}
			});

			// Interactive EMI / Downpayment Calculator
			var emiCard = document.getElementById('mpEmiCalculator');
			if (emiCard) {
				var basePrice = parseFloat(emiCard.getAttribute('data-price') || '0');
				var phoneTitle = emiCard.getAttribute('data-title') || 'Handset';
				var waNum = emiCard.getAttribute('data-wa') || '9779804530786';
				var slider = document.getElementById('mpEmiDownSlider');
				var tenureBtns = emiCard.querySelectorAll('.emi-tenure-btn');
				var downLabel = document.getElementById('mpEmiDownPctLabel');
				var financedLabel = document.getElementById('mpEmiFinancedLabel');
				var monthlyVal = document.getElementById('mpEmiMonthlyVal');
				var waBtn = document.getElementById('mpEmiWaBtn');
				var selectedMonths = 12;

				function formatNpr(n) {
					return 'NPR ' + Math.round(n).toLocaleString('en-US');
				}

				function updateEmi() {
					if (!basePrice || !slider) return;
					var pct = parseInt(slider.value, 10) || 40;
					var downAmt = Math.round(basePrice * (pct / 100));
					var loanAmt = Math.max(0, basePrice - downAmt);
					var monthly = Math.round(loanAmt / selectedMonths);

					if (downLabel) {
						downLabel.textContent = pct + '% (' + formatNpr(downAmt) + ')';
					}
					if (financedLabel) {
						financedLabel.textContent = 'Loan: ' + formatNpr(loanAmt);
					}
					if (monthlyVal) {
						monthlyVal.innerHTML = formatNpr(monthly) + '<span>/mo</span>';
					}
					if (waBtn) {
						var msg = 'Namaste Ali Mobile, ma ' + phoneTitle + ' (' + formatNpr(basePrice) + ') EMI plan ma lina chahanchhu. Downpayment ' + pct + '% (' + formatNpr(downAmt) + ') ra ' + selectedMonths + ' months (' + formatNpr(monthly) + '/mo) ko EMI process bare jankari dinus na.';
						waBtn.setAttribute('href', 'https://wa.me/' + waNum + '?text=' + encodeURIComponent(msg));
					}
				}

				if (slider) {
					slider.addEventListener('input', updateEmi);
				}
				tenureBtns.forEach(function(btn) {
					btn.addEventListener('click', function() {
						tenureBtns.forEach(function(b) { b.classList.remove('active'); });
						this.classList.add('active');
						selectedMonths = parseInt(this.getAttribute('data-months'), 10) || 12;
						updateEmi();
					});
				});
				updateEmi();
			}
		}
		if (document.readyState === 'loading') {
			document.addEventListener('DOMContentLoaded', initHandsetHub);
		} else {
			initHandsetHub();
		}
	})();
	</script>

	<!-- 7. Similar / Related Handsets Carousel -->
	<?php
	$primary_ids = array();
	$exclude_ids = array( $post_id );

	if ( ! empty( $brand_terms ) && ! is_wp_error( $brand_terms ) ) {
		$brand_query = new WP_Query( array(
			'post_type'           => 'handset',
			'posts_per_page'      => 8,
			'fields'              => 'ids',
			'post__not_in'        => $exclude_ids,
			'ignore_sticky_posts' => 1,
			'tax_query'           => array(
				array(
					'taxonomy' => 'device_brand',
					'field'    => 'term_id',
					'terms'    => $brand_terms[0]->term_id,
				),
			),
		) );
		if ( ! empty( $brand_query->posts ) ) {
			$primary_ids = $brand_query->posts;
			$exclude_ids = array_merge( $exclude_ids, $primary_ids );
		}
	}

	$needed = 8 - count( $primary_ids );
	if ( $needed > 0 ) {
		$supplement_query = new WP_Query( array(
			'post_type'           => 'handset',
			'posts_per_page'      => $needed,
			'fields'              => 'ids',
			'post__not_in'        => $exclude_ids,
			'ignore_sticky_posts' => 1,
		) );
		if ( ! empty( $supplement_query->posts ) ) {
			$primary_ids = array_merge( $primary_ids, $supplement_query->posts );
		}
	}

	if ( ! empty( $primary_ids ) ) {
		$related_query = new WP_Query( array(
			'post_type'      => 'handset',
			'post__in'       => $primary_ids,
			'orderby'        => 'post__in',
			'posts_per_page' => count( $primary_ids ),
		) );
	} else {
		$related_query = new WP_Query( array( 'post__in' => array( 0 ) ) );
	}

	if ( $related_query->have_posts() ) :
		?>
		<section id="related-handsets" class="section-wrap" style="padding: 30px 0 60px; background: #fafcff; border-top: 1px solid #eef3fb;">
			<div class="container">
				<div class="section-header" style="display: flex; align-items: flex-end; justify-content: space-between; flex-wrap: wrap; gap: 16px; margin-bottom: 28px;">
					<div class="section-header-copy">
						<span class="section-badge"><?php esc_html_e( 'EXPLORE MORE OPTIONS', 'mobile-pasal' ); ?></span>
						<h2 class="section-title"><?php esc_html_e( 'Similar Smartphone Models', 'mobile-pasal' ); ?></h2>
						<p class="section-desc"><?php esc_html_e( 'Compare related handsets available at our Gulariya counter showroom.', 'mobile-pasal' ); ?></p>
					</div>
					<div class="carousel-nav-controls" style="display: flex; align-items: center; gap: 8px;">
						<button class="carousel-arrow carousel-prev" id="relatedPrev" aria-label="<?php esc_attr_e( 'Previous models', 'mobile-pasal' ); ?>" type="button">
							<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="15 18 9 12 15 6"></polyline></svg>
						</button>
						<button class="carousel-arrow carousel-next" id="relatedNext" aria-label="<?php esc_attr_e( 'Next models', 'mobile-pasal' ); ?>" type="button">
							<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="9 18 15 12 9 6"></polyline></svg>
						</button>
					</div>
				</div>

				<div class="related-carousel-viewport" id="relatedViewport">
					<div class="related-carousel-track" id="relatedTrack">
					<?php
					while ( $related_query->have_posts() ) :
						$related_query->the_post();
						$rel_id         = get_the_ID();
						$rel_brand      = wp_get_post_terms( $rel_id, 'device_brand', array( 'fields' => 'names' ) );
						$rel_brand_str  = ! empty( $rel_brand ) ? $rel_brand[0] : get_post_meta( $rel_id, '_mp_brand', true );
						$rel_badge      = get_post_meta( $rel_id, '_mp_badge', true ) ?: __( 'Official VAT Bill', 'mobile-pasal' );
						$rel_price      = get_post_meta( $rel_id, '_mp_price', true );
						$rel_old_price  = get_post_meta( $rel_id, '_mp_old_price', true );
						$rel_hide_price = get_post_meta( $rel_id, '_mp_hide_price', true );
						$rel_img        = function_exists( 'mp_get_handset_img_url' ) ? mp_get_handset_img_url( $rel_id ) : get_the_post_thumbnail_url( $rel_id, 'medium' );
						$rel_permalink  = get_permalink( $rel_id );

						// Show/Hide check for related card
						$rel_show_price = function_exists( 'mp_is_handset_price_visible' )
							? mp_is_handset_price_visible( $rel_id )
							: ( ( $global_show_price == '1' || $global_show_price === 1 || $global_show_price === true ) && empty( $rel_hide_price ) && ! empty( $rel_price ) );
						$rel_price_fmt  = is_numeric( $rel_price ) ? 'NPR ' . number_format( (float) $rel_price ) : $rel_price;
						$rel_old_fmt    = ( is_numeric( $rel_old_price ) && (float) $rel_old_price > (float) $rel_price ) ? 'NPR ' . number_format( (float) $rel_old_price ) : ( ( ! empty( $rel_old_price ) && $rel_old_price !== $rel_price ) ? $rel_old_price : '' );

						$rel_screen   = get_post_meta( $rel_id, '_mp_spec_screen', true ) ?: get_post_meta( $rel_id, '_mp_display', true );
						$rel_chip     = get_post_meta( $rel_id, '_mp_spec_chip', true ) ?: get_post_meta( $rel_id, '_mp_processor', true );
						$rel_camera   = get_post_meta( $rel_id, '_mp_spec_camera', true ) ?: get_post_meta( $rel_id, '_mp_camera', true );
						$rel_battery  = get_post_meta( $rel_id, '_mp_spec_battery', true ) ?: get_post_meta( $rel_id, '_mp_battery', true );
						$rel_storage  = get_post_meta( $rel_id, '_mp_spec_storage', true );
						$rel_warranty = get_post_meta( $rel_id, '_mp_spec_warranty', true ) ?: __( '1 Year Official Warranty', 'mobile-pasal' );
						$rel_compare  = wp_json_encode( array(
							'id'       => (int) $rel_id,
							'title'    => get_the_title( $rel_id ),
							'brand'    => $rel_brand_str ?: 'Handset',
							'img'      => $rel_img,
							'url'      => $rel_permalink,
							'priceFmt' => $rel_show_price ? $rel_price_fmt : $hidden_price_text,
							'screen'   => $rel_screen ?: '—',
							'chip'     => $rel_chip ?: '—',
							'camera'   => $rel_camera ?: '—',
							'battery'  => $rel_battery ?: '—',
							'storage'  => $rel_storage ?: '—',
							'warranty' => $rel_warranty,
						) );
						?>
						<article class="product-card">
							
							<!-- Top Badges Row -->
							<div class="product-card-topbar">
								<span class="product-tag"><?php echo esc_html( $rel_badge ); ?></span>
								<span class="product-cat-tag"><?php echo esc_html( $rel_brand_str ?: 'Handset' ); ?></span>
							</div>

							<!-- Device Showcase Image Pedestal -->
							<a class="product-img-box" href="<?php echo esc_url( $rel_permalink ); ?>" aria-label="<?php the_title_attribute(); ?>">
								<img src="<?php echo esc_url( $rel_img ); ?>" alt="<?php the_title_attribute(); ?>" loading="lazy" />
							</a>

							<!-- Brand & MDMS Row -->
							<div class="product-brand-row">
								<span><?php echo esc_html( $rel_brand_str ?: 'Handset' ); ?></span>
								<span class="product-mdms-tag">
									<svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="vertical-align:-1px;margin-right:3px;"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
									MDMS &amp; VAT
								</span>
							</div>

							<!-- Title -->
							<h3 class="product-name">
								<a href="<?php echo esc_url( $rel_permalink ); ?>"><?php the_title(); ?></a>
							</h3>

							<!-- Pricing & Quotation Row Consistent with Home Page -->
							<div class="product-pricing-row">
								<?php if ( $rel_show_price ) : ?>
									<div class="price-wrap">
										<span class="current-price" style="color:var(--blue);"><?php echo esc_html( $rel_price_fmt ); ?></span>
										<?php if ( ! empty( $rel_old_fmt ) ) : ?>
											<span class="old-price"><?php echo esc_html( $rel_old_fmt ); ?></span>
										<?php endif; ?>
									</div>
									<span class="vat-tag"><?php esc_html_e( 'VAT Included', 'mobile-pasal' ); ?></span>
								<?php else : ?>
									<span class="product-card-quote-pill" style="display:inline-flex;align-items:center;gap:5px;font-size:11.5px;font-weight:750;color:#1d4ed8;background:#eff6ff;padding:4px 9px;border-radius:6px;border:1px solid #bfdbfe;">
										<svg viewBox="0 0 24 24" width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
										<?php echo esc_html( $hidden_price_text ); ?>
									</span>
								<?php endif; ?>
							</div>

							<!-- Hardware Spec Micro-List -->
							<div class="product-specs-list">
								<?php if ( ! empty( $rel_screen ) ) : ?>
									<div class="spec-item"><span class="spec-item-bullet"></span><span><?php echo esc_html( $rel_screen ); ?></span></div>
								<?php endif; ?>
								<?php if ( ! empty( $rel_chip ) ) : ?>
									<div class="spec-item"><span class="spec-item-bullet"></span><span><?php echo esc_html( $rel_chip ); ?></span></div>
								<?php endif; ?>
								<?php if ( ! empty( $rel_storage ) ) : ?>
									<div class="spec-item"><span class="spec-item-bullet"></span><span><?php echo esc_html( $rel_storage ); ?></span></div>
								<?php endif; ?>
							</div>

							<!-- Action Buttons Dock Consistent with Home Page -->
							<div class="product-actions">
								<a class="card-wa-btn" href="https://wa.me/<?php echo esc_attr( $wa_number ); ?>?text=<?php echo rawurlencode( 'Namaste Ali Mobile, ma tapaiharuko website ma ' . get_the_title() . ' herera aako chhu. Gulariya counter ma availability ra rate confirm gardinus na.' ); ?>" target="_blank" rel="noopener noreferrer">
									<svg viewBox="0 0 24 24" width="14" height="14" fill="currentColor" aria-hidden="true"><path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0 0 12.04 2m.01 1.67c2.2 0 4.26.86 5.82 2.42a8.225 8.225 0 0 1 2.41 5.83c0 4.54-3.7 8.24-8.24 8.24-1.48 0-2.93-.4-4.2-1.15l-.3-.18-3.12.82.83-3.04-.2-.31a8.196 8.196 0 0 1-1.26-4.38c0-4.54 3.7-8.24 8.24-8.24m4.52 11.66c-.25-.13-1.47-.72-1.7-.81-.23-.08-.39-.13-.56.13-.17.25-.64.81-.79.97-.14.17-.29.19-.54.06-.25-.13-1.05-.39-2-1.23-.74-.66-1.24-1.47-1.39-1.72-.14-.25-.02-.39.11-.51.11-.11.25-.29.37-.43.13-.14.17-.25.25-.41.08-.17.04-.31-.02-.44-.06-.13-.56-1.34-.76-1.84-.2-.49-.4-.42-.56-.43h-.47c-.17 0-.44.06-.67.31-.23.25-.87.85-.87 2.08 0 1.23.9 2.41 1.02 2.58.13.17 1.76 2.69 4.27 3.77.6.26 1.07.41 1.43.53.6.19 1.15.16 1.58.1.48-.07 1.47-.6 1.68-1.18.21-.58.21-1.07.15-1.18-.06-.11-.23-.17-.48-.29z"/></svg>
									<span><?php echo $rel_show_price ? esc_html__( 'WhatsApp Rate', 'mobile-pasal' ) : esc_html__( 'Inquire Rate', 'mobile-pasal' ); ?></span>
								</a>
								<button type="button" class="card-compare-btn" data-id="<?php echo esc_attr( $rel_id ); ?>" data-compare="<?php echo esc_attr( $rel_compare ); ?>" title="<?php esc_attr_e( 'Compare Handset Specs', 'mobile-pasal' ); ?>">
									<span><?php esc_html_e( '+ Compare', 'mobile-pasal' ); ?></span>
								</button>
								<a class="card-specs-btn" href="<?php echo esc_url( $rel_permalink ); ?>#specs-matrix" title="<?php esc_attr_e( 'View Specifications', 'mobile-pasal' ); ?>">
									<span><?php esc_html_e( 'Specs ›', 'mobile-pasal' ); ?></span>
								</a>
							</div>
						</article>
						<?php
					endwhile;
					wp_reset_postdata();
					?>
					</div>
				</div>
				<div class="reviews-carousel-dots" id="relatedDots" style="margin-top: 24px;"></div>
			</div>
		</section>
		<?php
	endif;
	?>

</div>

	<?php
endwhile;

get_footer();
