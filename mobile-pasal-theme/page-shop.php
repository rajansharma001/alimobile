<?php
/**
 * Template Name: Shop / Handset Catalog
 * Description: High-conversion smartphone catalog with sticky left-sidebar filtration, 3-column products grid consistent with home page, price visibility toggles, dynamic live search, and verified assurance cards.
 *
 * @package Mobile_Pasal
 * @version 3.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$wa_number         = mp_opt( 'whatsapp_number', '9779804530786' );
$global_show_price = mp_opt( 'handset_show_price', '1' );
$hidden_price_text = mp_opt( 'handset_hidden_price_text', __( 'Contact for Counter Price', 'mobile-pasal' ) );

// Query distinct brand taxonomy terms
$brand_terms = get_terms( array(
	'taxonomy'   => 'device_brand',
	'hide_empty' => false,
) );
?>

<!-- 1. Page Hero Banner: Breadcrumbs, Title & Pure Graphics -->
<section class="page-hero-banner" aria-label="<?php esc_attr_e( 'Shop Catalog Header', 'mobile-pasal' ); ?>">
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
					<span class="crumb-active"><?php esc_html_e( 'Shop Handsets', 'mobile-pasal' ); ?></span>
				</nav>
				<h1 class="page-hero-title"><?php echo wp_kses_post( mp_opt( 'shop_hero_title', mp_opt( 'catalog_title', 'Latest Smartphones &amp; Top Models' ) ) ); ?></h1>
			</div>
			<?php mp_render_page_hero_graphic(); ?>
		</div>
	</div>
</section>

<!-- 2. Main Catalog Section: Left-Sidebar Filters + Products Grid Consistent with Home Page -->
<section class="section-wrap" id="catalog" style="padding: 36px 0 60px;">
	<div class="tech-bg-grid" aria-hidden="true"></div>
	<div class="tech-ring-accent tech-ring-right" aria-hidden="true"></div>
	
	<div class="container">

		<!-- Mobile Filter Bar Trigger (screens <= 991px) -->
		<div class="shop-mobile-filter-bar">
			<button type="button" id="mobile-filter-drawer-btn" class="btn btn-outline btn-block">
				<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><line x1="4" y1="21" x2="4" y2="14"></line><line x1="4" y1="10" x2="4" y2="3"></line><line x1="12" y1="21" x2="12" y2="12"></line><line x1="12" y1="8" x2="12" y2="3"></line><line x1="20" y1="21" x2="20" y2="16"></line><line x1="20" y1="12" x2="20" y2="3"></line><line x1="1" y1="14" x2="7" y2="14"></line><line x1="9" y1="8" x2="15" y2="8"></line><line x1="17" y1="16" x2="23" y2="16"></line></svg>
				<span><?php esc_html_e( 'Filter Handsets & Budget', 'mobile-pasal' ); ?></span>
				<span class="mobile-filter-count-badge" id="mobile-filter-count">0</span>
			</button>
		</div>

		<!-- Cohesive 2-Column Catalog Layout Grid -->
		<div class="catalog-layout">

			<!-- LEFT COLUMN: Sticky Filter Sidebar Consistent with Home Page -->
			<aside class="filter-sidebar" id="shop-sidebar-filters">
				
				<div class="filter-header" style="justify-content: space-between;">
					<div style="display:flex;align-items:center;gap:10px;">
						<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="4" y1="21" x2="4" y2="14"></line><line x1="4" y1="10" x2="4" y2="3"></line><line x1="12" y1="21" x2="12" y2="12"></line><line x1="12" y1="8" x2="12" y2="3"></line><line x1="20" y1="21" x2="20" y2="16"></line><line x1="20" y1="12" x2="20" y2="3"></line><line x1="1" y1="14" x2="7" y2="14"></line><line x1="9" y1="8" x2="15" y2="8"></line><line x1="17" y1="16" x2="23" y2="16"></line></svg>
						<span><?php esc_html_e( 'Filters', 'mobile-pasal' ); ?></span>
					</div>
					<button type="button" id="sidebar-reset-btn" class="btn-clear-all" style="background:none;border:none;color:var(--blue);font-weight:700;font-size:12.5px;cursor:pointer;padding:0;">
						<?php esc_html_e( 'Clear All', 'mobile-pasal' ); ?>
					</button>
				</div>

				<!-- Search Input Group -->
				<div class="filter-group">
					<div class="filter-label"><?php esc_html_e( 'SEARCH MODELS', 'mobile-pasal' ); ?></div>
					<div class="search-input-wrap">
						<span class="search-icon">
							<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
						</span>
						<input type="text" id="site-search" placeholder="<?php esc_attr_e( 'iPhone 16, S24, Vivo...', 'mobile-pasal' ); ?>" autocomplete="off" />
						<button id="search-clear-btn" type="button" style="display:none;position:absolute;right:10px;top:50%;transform:translateY(-50%);background:none;border:none;color:#94a3b8;font-size:16px;cursor:pointer;" aria-label="<?php esc_attr_e( 'Clear search', 'mobile-pasal' ); ?>">&times;</button>
					</div>
				</div>

				<!-- Brand & Ecosystem Filter -->
				<div class="filter-group">
					<div class="filter-label"><?php esc_html_e( 'BRAND & ECOSYSTEM', 'mobile-pasal' ); ?></div>
					<div class="filter-options" id="brandFilterOptions">
						<label class="filter-radio-label active filter-tab-btn" data-filter="all">
							<input type="radio" name="brandFilter" value="all" checked>
							<span><?php esc_html_e( 'All Handsets', 'mobile-pasal' ); ?></span>
						</label>
						<?php
						if ( ! empty( $brand_terms ) && ! is_wp_error( $brand_terms ) ) :
							foreach ( $brand_terms as $b_term ) :
								?>
								<label class="filter-radio-label filter-tab-btn" data-filter="<?php echo esc_attr( strtolower( $b_term->slug ) ); ?>">
									<input type="radio" name="brandFilter" value="<?php echo esc_attr( strtolower( $b_term->slug ) ); ?>">
									<span><?php echo esc_html( $b_term->name ); ?></span>
								</label>
								<?php
							endforeach;
						else :
							?>
							<label class="filter-radio-label filter-tab-btn" data-filter="apple"><input type="radio" name="brandFilter" value="apple"><span>Apple iPhone</span></label>
							<label class="filter-radio-label filter-tab-btn" data-filter="samsung"><input type="radio" name="brandFilter" value="samsung"><span>Samsung Galaxy</span></label>
							<label class="filter-radio-label filter-tab-btn" data-filter="xiaomi"><input type="radio" name="brandFilter" value="xiaomi"><span>Xiaomi / Redmi</span></label>
							<label class="filter-radio-label filter-tab-btn" data-filter="oneplus"><input type="radio" name="brandFilter" value="oneplus"><span>OnePlus</span></label>
							<label class="filter-radio-label filter-tab-btn" data-filter="realme"><input type="radio" name="brandFilter" value="realme"><span>Realme</span></label>
							<label class="filter-radio-label filter-tab-btn" data-filter="vivo"><input type="radio" name="brandFilter" value="vivo"><span>Vivo</span></label>
							<label class="filter-radio-label filter-tab-btn" data-filter="accessories"><input type="radio" name="brandFilter" value="accessories"><span>Accessories &amp; Gear</span></label>
						<?php endif; ?>
					</div>
				</div>

				<!-- Budget Range Filter -->
				<div class="filter-group" style="margin-bottom:0;">
					<div class="filter-label"><?php esc_html_e( 'BUDGET RANGE (NPR)', 'mobile-pasal' ); ?></div>
					<div class="filter-options" id="priceFilterOptions">
						<label class="filter-radio-label active price-filter-btn" data-price="all">
							<input type="radio" name="priceFilter" value="all" checked>
							<span><?php esc_html_e( 'All Price Ranges', 'mobile-pasal' ); ?></span>
						</label>
						<label class="filter-radio-label price-filter-btn" data-price="under-30k">
							<input type="radio" name="priceFilter" value="under-30k">
							<span><?php esc_html_e( 'Under Rs. 30,000', 'mobile-pasal' ); ?></span>
						</label>
						<label class="filter-radio-label price-filter-btn" data-price="30k-75k">
							<input type="radio" name="priceFilter" value="30k-75k">
							<span><?php esc_html_e( 'Rs. 30,000 – Rs. 75,000', 'mobile-pasal' ); ?></span>
						</label>
						<label class="filter-radio-label price-filter-btn" data-price="75k-150k">
							<input type="radio" name="priceFilter" value="75k-150k">
							<span><?php esc_html_e( 'Rs. 75,000 – Rs. 1,50,000', 'mobile-pasal' ); ?></span>
						</label>
						<label class="filter-radio-label price-filter-btn" data-price="above-150k">
							<input type="radio" name="priceFilter" value="above-150k">
							<span><?php esc_html_e( 'Above Rs. 1,50,000', 'mobile-pasal' ); ?></span>
						</label>
					</div>
				</div>

				<!-- Direct WhatsApp Sales Desk Card -->
				<div style="margin-top: 24px; padding: 16px; background: #f8faff; border: 1px dashed #cbd5e1; border-radius: 14px;">
					<div style="font-size: 13.5px; font-weight: 800; color: var(--navy); margin-bottom: 6px; display:flex; align-items:center; gap:6px;">
						<svg viewBox="0 0 24 24" width="16" height="16" fill="#059669"><path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0 0 12.04 2m.01 1.67c2.2 0 4.26.86 5.82 2.42a8.225 8.225 0 0 1 2.41 5.83c0 4.54-3.7 8.24-8.24 8.24-1.48 0-2.93-.4-4.2-1.15l-.3-.18-3.12.82.83-3.04-.2-.31a8.196 8.196 0 0 1-1.26-4.38c0-4.54 3.7-8.24 8.24-8.24m4.52 11.66c-.25-.13-1.47-.72-1.7-.81-.23-.08-.39-.13-.56.13-.17.25-.64.81-.79.97-.14.17-.29.19-.54.06-.25-.13-1.05-.39-2-1.23-.74-.66-1.24-1.47-1.39-1.72-.14-.25-.02-.39.11-.51.11-.11.25-.29.37-.43.13-.14.17-.25.25-.41.08-.17.04-.31-.02-.44-.06-.13-.56-1.34-.76-1.84-.2-.49-.4-.42-.56-.43h-.47c-.17 0-.44.06-.67.31-.23.25-.87.85-.87 2.08 0 1.23.9 2.41 1.02 2.58.13.17 1.76 2.69 4.27 3.77.6.26 1.07.41 1.43.53.6.19 1.15.16 1.58.1.48-.07 1.47-.6 1.68-1.18.21-.58.21-1.07.15-1.18-.06-.11-.23-.17-.48-.29z"/></svg>
						<span><?php esc_html_e( 'Direct Counter Rate?', 'mobile-pasal' ); ?></span>
					</div>
					<p style="font-size: 12px; color: var(--muted); margin: 0 0 12px 0; line-height: 1.5;">
						<?php esc_html_e( 'Inquire with our Gulariya sales desk for today\'s verified live cash rates and trade-in exchange quotes.', 'mobile-pasal' ); ?>
					</p>
					<a class="btn btn-whatsapp btn-sm btn-block" href="<?php echo esc_url( mp_get_whatsapp_link( 'Namaste Ali Mobile, ma Gulariya counter ko aaja ko rate ra handset inquiry garna chahanchhu.' ) ); ?>" target="_blank" rel="noopener">
						<span><?php esc_html_e( 'WhatsApp Sales Desk', 'mobile-pasal' ); ?></span>
					</a>
				</div>

			</aside>

			<!-- RIGHT COLUMN: Products Main Area -->
			<div class="catalog-main">

				<!-- Toolbar Header Bar -->
				<div class="catalog-topbar">
					<div class="catalog-count-pill">
						<span><?php esc_html_e( 'Verified Handset Catalog', 'mobile-pasal' ); ?></span>
						<span class="catalog-count-badge" id="catalog-count-num">0 Models Found</span>
					</div>
					<div class="catalog-sort-wrap">
						<label for="filter-sort-by"><?php esc_html_e( 'Sort by:', 'mobile-pasal' ); ?></label>
						<select id="filter-sort-by" class="catalog-sort-select">
							<option value="featured"><?php esc_html_e( 'Featured / Newest', 'mobile-pasal' ); ?></option>
							<option value="price-asc"><?php esc_html_e( 'Price: Low to High', 'mobile-pasal' ); ?></option>
							<option value="price-desc"><?php esc_html_e( 'Price: High to Low', 'mobile-pasal' ); ?></option>
							<option value="name-asc"><?php esc_html_e( 'Model: A to Z', 'mobile-pasal' ); ?></option>
						</select>
					</div>
				</div>

				<!-- Products Grid -->
				<div class="products-grid" id="shopProductsGrid">
					<?php
					$shop_query = new WP_Query( array(
						'post_type'           => 'handset',
						'posts_per_page'      => 60,
						'post_status'         => 'publish',
						'ignore_sticky_posts' => 1,
					) );

					$card_idx = 0;

					if ( $shop_query->have_posts() ) :
						while ( $shop_query->have_posts() ) :
							$shop_query->the_post();
							$p_id       = get_the_ID();
							$p_title    = get_the_title();
							$permalink  = get_permalink( $p_id );
							$badge      = get_post_meta( $p_id, '_mp_badge', true ) ?: __( 'Official VAT Bill', 'mobile-pasal' );
							$price      = get_post_meta( $p_id, '_mp_price', true );
							$old_price  = get_post_meta( $p_id, '_mp_old_price', true );
							$per_hide   = get_post_meta( $p_id, '_mp_hide_price', true );
							$img_url    = function_exists( 'mp_get_handset_img_url' ) ? mp_get_handset_img_url( $p_id ) : get_the_post_thumbnail_url( $p_id, 'medium' );

							// Price visibility logic
							$is_price_visible = function_exists( 'mp_is_handset_price_visible' )
								? mp_is_handset_price_visible( $p_id )
								: ( ( $global_show_price == '1' || $global_show_price === 1 || $global_show_price === true ) && empty( $per_hide ) && ! empty( $price ) );
							$price_fmt        = is_numeric( $price ) ? 'NPR ' . number_format( (float) $price ) : $price;
							$old_price_fmt    = ( is_numeric( $old_price ) && (float) $old_price > (float) $price ) ? 'NPR ' . number_format( (float) $old_price ) : ( ( ! empty( $old_price ) && $old_price !== $price ) ? $old_price : '' );
							$numeric_price    = (int) preg_replace( '/[^0-9]/', '', (string) $price );

							// Savings calculation
							$savings_text = '';
							if ( is_numeric( $price ) && is_numeric( $old_price ) && (float) $old_price > (float) $price ) {
								$diff         = (float) $old_price - (float) $price;
								$savings_text = sprintf( __( 'Save NPR %s', 'mobile-pasal' ), number_format( $diff ) );
							}

							// Hardware Specs
							$spec_screen   = get_post_meta( $p_id, '_mp_spec_screen', true ) ?: get_post_meta( $p_id, '_mp_display', true );
							$spec_chip     = get_post_meta( $p_id, '_mp_spec_chip', true ) ?: get_post_meta( $p_id, '_mp_processor', true );
							$ram_meta      = get_post_meta( $p_id, '_mp_ram', true );
							$storage_meta  = get_post_meta( $p_id, '_mp_storage', true );
							$spec_storage  = get_post_meta( $p_id, '_mp_spec_storage', true ) ?: ( ( $ram_meta || $storage_meta ) ? trim( "{$ram_meta} / {$storage_meta}", ' /' ) : '' );

							// Brand & Category
							$brand_terms = get_the_terms( $p_id, 'device_brand' );
							$brand_slug  = ! empty( $brand_terms ) && ! is_wp_error( $brand_terms ) ? strtolower( $brand_terms[0]->slug ) : 'all';
							$brand_name  = ! empty( $brand_terms ) && ! is_wp_error( $brand_terms ) ? $brand_terms[0]->name : ( get_post_meta( $p_id, '_mp_brand', true ) ?: 'Handset' );

							$cat_terms = get_the_terms( $p_id, 'device_category' );
							$cat_slug  = ! empty( $cat_terms ) && ! is_wp_error( $cat_terms ) ? strtolower( $cat_terms[0]->slug ) : 'smartphones';
							$cat_name  = ! empty( $cat_terms ) && ! is_wp_error( $cat_terms ) ? $cat_terms[0]->name : $brand_name;

							// WhatsApp URL
							if ( $is_price_visible ) {
								$wa_msg = sprintf(
									__( 'Namaste Ali Mobile, ma tapaiharuko website ma %1$s (%2$s) herera aako chhu. Gulariya counter ma availability ra rate confirm gardinus na.', 'mobile-pasal' ),
									$p_title,
									$price_fmt
								);
							} else {
								$wa_msg = sprintf(
									__( 'Namaste Ali Mobile, ma tapaiharuko website ma %s herera aako chhu. Yas ko aaja ko counter price ra availability quote pathaidinus na.', 'mobile-pasal' ),
									$p_title
								);
							}
							$wa_url = 'https://wa.me/' . esc_attr( $wa_number ) . '?text=' . rawurlencode( $wa_msg );
							?>
							<article class="product-card" data-index="<?php echo esc_attr( $card_idx++ ); ?>" data-brand="<?php echo esc_attr( $brand_slug ); ?>" data-category="<?php echo esc_attr( $cat_slug ); ?>" data-price-numeric="<?php echo esc_attr( $numeric_price ); ?>" data-title="<?php echo esc_attr( strtolower( $p_title ) ); ?>">
								
								<!-- Top Badges Row -->
								<div class="product-card-topbar">
									<span class="product-tag"><?php echo esc_html( $badge ); ?></span>
									<span class="product-cat-tag"><?php echo esc_html( $cat_name ); ?></span>
								</div>

								<!-- Device Showcase Image Pedestal -->
								<a class="product-img-box" href="<?php echo esc_url( $permalink ); ?>" aria-label="<?php echo esc_attr( $p_title ); ?>">
									<img src="<?php echo esc_url( $img_url ); ?>" alt="<?php echo esc_attr( $p_title ); ?>" loading="lazy" />
								</a>

								<!-- Brand & MDMS Row -->
								<div class="product-brand-row">
									<span><?php echo esc_html( $brand_name ); ?></span>
									<span class="product-mdms-tag">
										<svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="vertical-align:-1px;margin-right:3px;"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
										MDMS &amp; VAT
									</span>
								</div>

								<!-- Title -->
								<h3 class="product-name">
									<a href="<?php echo esc_url( $permalink ); ?>"><?php echo esc_html( $p_title ); ?></a>
								</h3>

								<!-- Pricing & Quotation Row Consistent with Home Page -->
								<div class="product-pricing-row">
									<?php if ( $is_price_visible ) : ?>
										<div class="price-wrap">
											<span class="current-price"><?php echo esc_html( $price_fmt ); ?></span>
											<?php if ( ! empty( $old_price_fmt ) ) : ?>
												<span class="old-price"><?php echo esc_html( $old_price_fmt ); ?></span>
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
									<?php if ( ! empty( $spec_screen ) ) : ?>
										<div class="spec-item"><span class="spec-item-bullet"></span><span><?php echo esc_html( $spec_screen ); ?></span></div>
									<?php endif; ?>
									<?php if ( ! empty( $spec_chip ) ) : ?>
										<div class="spec-item"><span class="spec-item-bullet"></span><span><?php echo esc_html( $spec_chip ); ?></span></div>
									<?php endif; ?>
									<?php if ( ! empty( $spec_storage ) ) : ?>
										<div class="spec-item"><span class="spec-item-bullet"></span><span><?php echo esc_html( $spec_storage ); ?></span></div>
									<?php endif; ?>
								</div>

								<!-- Action Buttons Dock Consistent with Home Page -->
								<div class="product-actions">
									<a class="card-wa-btn" href="<?php echo esc_url( $wa_url ); ?>" target="_blank" rel="noopener noreferrer">
										<svg viewBox="0 0 24 24" width="14" height="14" fill="currentColor" aria-hidden="true"><path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0 0 12.04 2m.01 1.67c2.2 0 4.26.86 5.82 2.42a8.225 8.225 0 0 1 2.41 5.83c0 4.54-3.7 8.24-8.24 8.24-1.48 0-2.93-.4-4.2-1.15l-.3-.18-3.12.82.83-3.04-.2-.31a8.196 8.196 0 0 1-1.26-4.38c0-4.54 3.7-8.24 8.24-8.24m4.52 11.66c-.25-.13-1.47-.72-1.7-.81-.23-.08-.39-.13-.56.13-.17.25-.64.81-.79.97-.14.17-.29.19-.54.06-.25-.13-1.05-.39-2-1.23-.74-.66-1.24-1.47-1.39-1.72-.14-.25-.02-.39.11-.51.11-.11.25-.29.37-.43.13-.14.17-.25.25-.41.08-.17.04-.31-.02-.44-.06-.13-.56-1.34-.76-1.84-.2-.49-.4-.42-.56-.43h-.47c-.17 0-.44.06-.67.31-.23.25-.87.85-.87 2.08 0 1.23.9 2.41 1.02 2.58.13.17 1.76 2.69 4.27 3.77.6.26 1.07.41 1.43.53.6.19 1.15.16 1.58.1.48-.07 1.47-.6 1.68-1.18.21-.58.21-1.07.15-1.18-.06-.11-.23-.17-.48-.29z"/></svg>
										<span><?php echo $is_price_visible ? esc_html__( 'WhatsApp Rate', 'mobile-pasal' ) : esc_html__( 'Inquire Rate', 'mobile-pasal' ); ?></span>
									</a>
									<a class="card-specs-btn" href="<?php echo esc_url( $permalink ); ?>#specs-matrix" title="<?php esc_attr_e( 'View Specifications', 'mobile-pasal' ); ?>">
										<span><?php esc_html_e( 'Specs ›', 'mobile-pasal' ); ?></span>
									</a>
								</div>
							</article>
						<?php endwhile;
						wp_reset_postdata();
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

				<!-- Pagination Container -->
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

<!-- 3. Handset Assurance Section (4-Pillar Bento Guarantee Grid) -->
<section class="section-wrap assurance-showcase-section" id="assurance">
	<div class="tech-bg-grid" aria-hidden="true"></div>
	<div class="tech-ring-accent" aria-hidden="true"></div>
	<div class="container">
		<div class="sec-head sec-head-center">
			<span class="sec-kicker">
				<svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path><polyline points="9 12 11 14 15 10"></polyline></svg>
				<?php echo esc_html( mp_opt( 'assurance_kicker', 'ZERO-RISK PURCHASE' ) ); ?>
			</span>
			<h2><?php echo esc_html( mp_opt( 'assurance_title', 'The Ali Mobile Handset Assurance' ) ); ?></h2>
			<p><?php echo esc_html( mp_opt( 'assurance_subtitle', 'Why hundreds of phone buyers across Bardiya trust our counter over unverified online imports.' ) ); ?></p>
		</div>

		<div class="assurance-pillars-grid">
			<!-- Pillar 1: NTA Approved -->
			<article class="assurance-pillar-card">
				<div class="assurance-card-top">
					<div class="assurance-icon-box">
						<?php echo mp_get_icon_svg( mp_opt( 'assurance1_icon', 'shield' ), 24, 24 ); ?>
					</div>
					<span class="assurance-pillar-tag">01 &bull; NTA MDMS</span>
				</div>
				<h3 class="assurance-card-title"><?php echo esc_html( mp_opt( 'assurance1_title', '100% NTA Approved' ) ); ?></h3>
				<p class="assurance-card-desc"><?php echo esc_html( mp_opt( 'assurance1_desc', 'Compliant with Nepal Telecommunications Authority IMEI registration for uninterrupted MDMS cellular service across Nepal.' ) ); ?></p>
				<div class="assurance-card-footer">
					<svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"></polyline></svg>
					<span><?php esc_html_e( 'Lifetime SIM Network Guarantee', 'mobile-pasal' ); ?></span>
				</div>
			</article>

			<!-- Pillar 2: Official VAT Bill -->
			<article class="assurance-pillar-card">
				<div class="assurance-card-top">
					<div class="assurance-icon-box">
						<?php echo mp_get_icon_svg( mp_opt( 'assurance2_icon', 'receipt' ), 24, 24 ); ?>
					</div>
					<span class="assurance-pillar-tag">02 &bull; VAT INVOICE</span>
				</div>
				<h3 class="assurance-card-title"><?php echo esc_html( mp_opt( 'assurance2_title', 'Official VAT Bill' ) ); ?></h3>
				<p class="assurance-card-desc"><?php echo esc_html( mp_opt( 'assurance2_desc', 'Every single handset comes with an authorized commercial VAT serial bill enabling legitimate distributor warranty claims.' ) ); ?></p>
				<div class="assurance-card-footer">
					<svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"></polyline></svg>
					<span><?php esc_html_e( '1-Year Official Brand Warranty', 'mobile-pasal' ); ?></span>
				</div>
			</article>

			<!-- Pillar 3: Free Data Transfer -->
			<article class="assurance-pillar-card">
				<div class="assurance-card-top">
					<div class="assurance-icon-box">
						<?php echo mp_get_icon_svg( mp_opt( 'assurance3_icon', 'arrows-rotate' ), 24, 24 ); ?>
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
						<?php echo mp_get_icon_svg( mp_opt( 'assurance4_icon', 'store' ), 24, 24 ); ?>
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
</section>

<?php
get_footer();
