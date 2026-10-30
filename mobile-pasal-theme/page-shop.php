<?php
/**
 * Template Name: Shop / Handset Catalog
 * Description: Catalog page displaying all showroom handsets, search toolbar, and zero-risk assurance cards.
 *
 * @package Mobile_Pasal
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$shop_title = mp_opt( 'shop_hero_title', 'Official NTA Smartphones & Genuine Gear.' );
$shop_desc  = mp_opt( 'shop_hero_desc', 'Discover Gulariya\'s largest verified inventory of flagship handsets: Apple iPhone 16 Series, Samsung Galaxy S24 Ultra, Google Pixel 9, OnePlus 12, and Xiaomi 14. 100% genuine IMEI bill, warranty support, and free data setup.' );
?>

<!-- Page Hero Banner -->
<section class="page-hero-banner">
	<div class="wrap">
		<div class="page-hero-grid fade-up in-view">
			<!-- Left: Hero Content -->
			<div class="page-hero-content">
				<nav class="breadcrumb-nav" aria-label="<?php esc_attr_e( 'Breadcrumb', 'mobile-pasal' ); ?>">
					<a class="crumb-link" href="<?php echo esc_url( home_url( '/' ) ); ?>">
						<svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path></svg>
						<span><?php esc_html_e( 'Home', 'mobile-pasal' ); ?></span>
					</a>
					<span class="crumb-divider">/</span>
					<span class="crumb-active"><?php esc_html_e( 'Shop', 'mobile-pasal' ); ?></span>
				</nav>

				<h1 class="page-hero-title"><?php echo esc_html( $shop_title ); ?></h1>
				<p class="page-hero-desc"><?php echo esc_html( $shop_desc ); ?></p>

				<div class="page-hero-actions">
					<a class="btn btn-primary btn-lg" href="#catalog">
						<span><?php esc_html_e( 'Filter Handsets Below', 'mobile-pasal' ); ?></span>
						<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.4"><line x1="12" y1="5" x2="12" y2="19"></line><polyline points="19 12 12 19 5 12"></polyline></svg>
					</a>
					<a class="btn btn-whatsapp btn-lg" href="<?php echo esc_url( mp_get_whatsapp_link( 'Namaste Ali Mobile, iPhone 16 ra S24 Ultra ko aaja ko counter rate dinus' ) ); ?>" target="_blank" rel="noopener">
						<svg viewBox="0 0 24 24" width="16" height="16" fill="currentColor"><path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0 0 12.04 2m.01 1.67c2.2 0 4.26.86 5.82 2.42a8.225 8.225 0 0 1 2.41 5.83c0 4.54-3.7 8.24-8.24 8.24-1.48 0-2.93-.4-4.2-1.15l-.3-.18-3.12.82.83-3.04-.2-.31a8.196 8.196 0 0 1-1.26-4.38c0-4.54 3.7-8.24 8.24-8.24m4.52 11.66c-.25-.13-1.47-.72-1.7-.81-.23-.08-.39-.13-.56.13-.17.25-.64.81-.79.97-.14.17-.29.19-.54.06-.25-.13-1.05-.39-2-1.23-.74-.66-1.24-1.47-1.39-1.72-.14-.25-.02-.39.11-.51.11-.11.25-.29.37-.43.13-.14.17-.25.25-.41.08-.17.04-.31-.02-.44-.06-.13-.56-1.34-.76-1.84-.2-.49-.4-.42-.56-.43h-.47c-.17 0-.44.06-.67.31-.23.25-.87.85-.87 2.08 0 1.23.9 2.41 1.02 2.58.13.17 1.76 2.69 4.27 3.77.6.26 1.07.41 1.43.53.6.19 1.15.16 1.58.1.48-.07 1.47-.6 1.68-1.18.21-.58.21-1.07.15-1.18-.06-.11-.23-.17-.48-.29z"/></svg>
						<span><?php esc_html_e( 'Ask Today\'s Counter Price', 'mobile-pasal' ); ?></span>
					</a>
				</div>
			</div>

			<!-- Right: Spotlight Card -->
			<div class="page-hero-spotlight">
				<div class="hero-spotlight-card">
					<div class="spotlight-top-bar">
						<div class="spotlight-title-row">
							<span class="spotlight-badge"><?php echo esc_html( mp_opt( 'shop_spotlight_badge', 'Showroom Live Inventory' ) ); ?></span>
						</div>
						<small style="color: var(--text-muted); font-weight: 700;"><?php echo esc_html( mp_opt( 'shop_spotlight_subtitle', 'Gulariya Counter' ) ); ?></small>
					</div>

					<div class="spotlight-metric-list">
						<div class="spotlight-metric-item">
							<span>
								<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
								<?php echo esc_html( mp_opt( 'shop_spotlight_m1_label', 'NTA Registration' ) ); ?>
							</span>
							<strong><?php echo esc_html( mp_opt( 'shop_spotlight_m1_val', '100% Verified Bill' ) ); ?></strong>
						</div>
						<div class="spotlight-metric-item">
							<span>
								<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path></svg>
								<?php echo esc_html( mp_opt( 'shop_spotlight_m2_label', 'Data Migration' ) ); ?>
							</span>
							<strong><?php echo esc_html( mp_opt( 'shop_spotlight_m2_val', 'FREE Walk-In Setup' ) ); ?></strong>
						</div>
						<div class="spotlight-metric-item">
							<span>
								<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
								<?php echo esc_html( mp_opt( 'shop_spotlight_m3_label', 'Old Device Trade-In' ) ); ?>
							</span>
							<strong><?php echo esc_html( mp_opt( 'shop_spotlight_m3_val', 'Instant Valuation' ) ); ?></strong>
						</div>
						<div class="spotlight-metric-item">
							<span>
								<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><rect x="5" y="2" width="14" height="20" rx="2" ry="2"></rect><line x1="12" y1="18" x2="12.01" y2="18"></line></svg>
								<?php echo esc_html( mp_opt( 'shop_spotlight_m4_label', 'Top Flagships' ) ); ?>
							</span>
							<strong><?php echo esc_html( mp_opt( 'shop_spotlight_m4_val', 'In Stock Today' ) ); ?></strong>
						</div>
					</div>

					<div class="spotlight-tags-row">
						<?php
						$shop_tags_str = mp_opt( 'shop_spotlight_tags', 'Apple iPhone, Samsung Galaxy, Google Pixel, OnePlus, Xiaomi' );
						$shop_tags     = array_map( 'trim', explode( ',', $shop_tags_str ) );
						foreach ( $shop_tags as $s_tag ) :
							if ( ! empty( $s_tag ) ) : ?>
								<span class="spotlight-tag-pill"><?php echo esc_html( $s_tag ); ?></span>
							<?php endif;
						endforeach;
						?>
					</div>

					<a class="btn btn-whatsapp btn-sm btn-block" href="<?php echo esc_url( mp_get_whatsapp_link( 'Namaste Ali Mobile, handset stock ra rate barema bujhna chahanchhu' ) ); ?>" target="_blank" rel="noopener">
						<svg viewBox="0 0 24 24" width="14" height="14" fill="currentColor"><path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0 0 12.04 2m.01 1.67c2.2 0 4.26.86 5.82 2.42a8.225 8.225 0 0 1 2.41 5.83c0 4.54-3.7 8.24-8.24 8.24-1.48 0-2.93-.4-4.2-1.15l-.3-.18-3.12.82.83-3.04-.2-.31a8.196 8.196 0 0 1-1.26-4.38c0-4.54 3.7-8.24 8.24-8.24m4.52 11.66c-.25-.13-1.47-.72-1.7-.81-.23-.08-.39-.13-.56.13-.17.25-.64.81-.79.97-.14.17-.29.19-.54.06-.25-.13-1.05-.39-2-1.23-.74-.66-1.24-1.47-1.39-1.72-.14-.25-.02-.39.11-.51.11-.11.25-.29.37-.43.13-.14.17-.25.25-.41.08-.17.04-.31-.02-.44-.06-.13-.56-1.34-.76-1.84-.2-.49-.4-.42-.56-.43h-.47c-.17 0-.44.06-.67.31-.23.25-.87.85-.87 2.08 0 1.23.9 2.41 1.02 2.58.13.17 1.76 2.69 4.27 3.77.6.26 1.07.41 1.43.53.6.19 1.15.16 1.58.1.48-.07 1.47-.6 1.68-1.18.21-.58.21-1.07.15-1.18-.06-.11-.23-.17-.48-.29z"/></svg>
						<span><?php esc_html_e( 'Chat with Showroom Sales Desk', 'mobile-pasal' ); ?></span>
					</a>
				</div>
			</div>
		</div>

		<!-- Micro-Ribbon -->
		<div class="page-hero-ribbon fade-up">
			<div class="hero-ribbon-item">
				<svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
				<span><?php esc_html_e( '100% Official VAT Bill', 'mobile-pasal' ); ?></span>
			</div>
			<div class="hero-ribbon-item">
				<svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path></svg>
				<span><?php esc_html_e( 'Free Safe Data Migration', 'mobile-pasal' ); ?></span>
			</div>
			<div class="hero-ribbon-item">
				<svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.2"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path></svg>
				<span><?php esc_html_e( 'Original Accessories Assured', 'mobile-pasal' ); ?></span>
			</div>
			<div class="hero-ribbon-item">
				<svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
				<span><?php esc_html_e( 'Instant Counter Quotes', 'mobile-pasal' ); ?></span>
			</div>
		</div>
	</div>
</section>

<!-- Catalog Section -->
<section class="catalog-section" id="catalog">
	<div class="wrap">
		<div class="sec-head sec-head-center fade-up">
			<span class="sec-kicker"><?php esc_html_e( 'Showroom Catalog', 'mobile-pasal' ); ?></span>
			<h2><?php esc_html_e( 'Explore Genuine Handsets & Premium Gear', 'mobile-pasal' ); ?></h2>
			<p><?php esc_html_e( 'Real-time counter stock. Select a brand tab or search directly to check specs and WhatsApp our sales desk.', 'mobile-pasal' ); ?></p>
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
		<div class="products-grid fade-up" id="products-grid">
			<?php
			$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
			$shop_query = new WP_Query( array(
				'post_type'      => 'handset',
				'posts_per_page' => 24,
				'paged'          => $paged,
				'post_status'    => 'publish',
			) );

			if ( $shop_query->have_posts() ) :
				while ( $shop_query->have_posts() ) :
					$shop_query->the_post();
					$p_id       = get_the_ID();
					$p_title    = get_the_title();
					$badge      = get_post_meta( $p_id, '_mp_badge', true ) ?: 'Showroom Deal';
					$price      = get_post_meta( $p_id, '_mp_price', true );
					$old_price  = get_post_meta( $p_id, '_mp_old_price', true );
					$rating     = get_post_meta( $p_id, '_mp_rating', true ) ?: '4.9';
					$reviews    = get_post_meta( $p_id, '_mp_reviews_count', true ) ?: '40';
					$img_url    = mp_get_handset_img_url( $p_id );

					$specs_text = get_post_meta( $p_id, '_mp_spec_screen', true );
					if ( empty( $specs_text ) ) {
						$specs_text = get_the_excerpt();
					}

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
							<a class="btn btn-whatsapp btn-sm btn-block" href="<?php echo esc_url( mp_get_whatsapp_link( 'Namaste Ali Mobile, ' . $p_title . ' ko stock ra price dinus' ) ); ?>" target="_blank" rel="noopener">
								<svg viewBox="0 0 24 24" width="14" height="14" fill="currentColor"><path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0 0 12.04 2m.01 1.67c2.2 0 4.26.86 5.82 2.42a8.225 8.225 0 0 1 2.41 5.83c0 4.54-3.7 8.24-8.24 8.24-1.48 0-2.93-.4-4.2-1.15l-.3-.18-3.12.82.83-3.04-.2-.31a8.196 8.196 0 0 1-1.26-4.38c0-4.54 3.7-8.24 8.24-8.24m4.52 11.66c-.25-.13-1.47-.72-1.7-.81-.23-.08-.39-.13-.56.13-.17.25-.64.81-.79.97-.14.17-.29.19-.54.06-.25-.13-1.05-.39-2-1.23-.74-.66-1.24-1.47-1.39-1.72-.14-.25-.02-.39.11-.51.11-.11.25-.29.37-.43.13-.14.17-.25.25-.41.08-.17.04-.31-.02-.44-.06-.13-.56-1.34-.76-1.84-.2-.49-.4-.42-.56-.43h-.47c-.17 0-.44.06-.67.31-.23.25-.87.85-.87 2.08 0 1.23.9 2.41 1.02 2.58.13.17 1.76 2.69 4.27 3.77.6.26 1.07.41 1.43.53.6.19 1.15.16 1.58.1.48-.07 1.47-.6 1.68-1.18.21-.58.21-1.07.15-1.18-.06-.11-.23-.17-.48-.29z"/></svg>
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
							<a class="btn btn-whatsapp btn-sm btn-block" href="<?php echo esc_url( mp_get_whatsapp_link( 'Namaste Ali Mobile, ' . $h['title'] . ' ko stock ra price dinus' ) ); ?>" target="_blank" rel="noopener">
								<svg viewBox="0 0 24 24" width="14" height="14" fill="currentColor"><path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0 0 12.04 2m.01 1.67c2.2 0 4.26.86 5.82 2.42a8.225 8.225 0 0 1 2.41 5.83c0 4.54-3.7 8.24-8.24 8.24-1.48 0-2.93-.4-4.2-1.15l-.3-.18-3.12.82.83-3.04-.2-.31a8.196 8.196 0 0 1-1.26-4.38c0-4.54 3.7-8.24 8.24-8.24m4.52 11.66c-.25-.13-1.47-.72-1.7-.81-.23-.08-.39-.13-.56.13-.17.25-.64.81-.79.97-.14.17-.29.19-.54.06-.25-.13-1.05-.39-2-1.23-.74-.66-1.24-1.47-1.39-1.72-.14-.25-.02-.39.11-.51.11-.11.25-.29.37-.43.13-.14.17-.25.25-.41.08-.17.04-.31-.02-.44-.06-.13-.56-1.34-.76-1.84-.2-.49-.4-.42-.56-.43h-.47c-.17 0-.44.06-.67.31-.23.25-.87.85-.87 2.08 0 1.23.9 2.41 1.02 2.58.13.17 1.76 2.69 4.27 3.77.6.26 1.07.41 1.43.53.6.19 1.15.16 1.58.1.48-.07 1.47-.6 1.68-1.18.21-.58.21-1.07.15-1.18-.06-.11-.23-.17-.48-.29z"/></svg>
								<span><?php esc_html_e( 'Ask Price on WhatsApp', 'mobile-pasal' ); ?></span>
							</a>
						</div>
					</article>
				<?php endforeach;
			endif;
			?>
		</div>
	</div>
</section>

<!-- Handset Assurance Section ("Zero-Risk Purchase") -->
<section class="assurance-section">
	<div class="wrap">
		<div class="sec-head sec-head-center fade-up">
			<span class="sec-kicker"><?php echo esc_html( mp_opt( 'assurance_kicker', 'Zero-Risk Purchase' ) ); ?></span>
			<h2><?php echo esc_html( mp_opt( 'assurance_title', 'The Ali Mobile Handset Assurance' ) ); ?></h2>
			<p><?php echo esc_html( mp_opt( 'assurance_subtitle', 'Why hundreds of phone buyers across Bardiya trust our counter over unverified online imports.' ) ); ?></p>
		</div>

		<div class="assurance-grid fade-up">
			<!-- Card 1: NTA Approved -->
			<div class="assurance-card">
				<div class="assurance-icon-box">
					<svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
				</div>
				<h3 class="assurance-card-title"><?php echo esc_html( mp_opt( 'assurance1_title', '100% NTA Approved' ) ); ?></h3>
				<p class="assurance-card-desc"><?php echo esc_html( mp_opt( 'assurance1_desc', 'Compliant with Nepal Telecommunications Authority IMEI registration for uninterrupted SIM network connectivity nationwide.' ) ); ?></p>
				<div class="assurance-card-footer">
					<span class="assurance-pill">
						<svg viewBox="0 0 24 24" width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.4"><polyline points="20 6 9 17 4 12"></polyline></svg>
						<span><?php echo esc_html( mp_opt( 'assurance1_tag', 'MDMS Verified' ) ); ?></span>
					</span>
				</div>
			</div>

			<!-- Card 2: Official VAT Bill -->
			<div class="assurance-card">
				<div class="assurance-icon-box">
					<svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line></svg>
				</div>
				<h3 class="assurance-card-title"><?php echo esc_html( mp_opt( 'assurance2_title', 'Official VAT Bill' ) ); ?></h3>
				<p class="assurance-card-desc"><?php echo esc_html( mp_opt( 'assurance2_desc', 'Every purchase comes with a legitimate serial-numbered VAT invoice valid for official 1-year brand warranty claims.' ) ); ?></p>
				<div class="assurance-card-footer">
					<span class="assurance-pill">
						<svg viewBox="0 0 24 24" width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.4"><polyline points="20 6 9 17 4 12"></polyline></svg>
						<span><?php echo esc_html( mp_opt( 'assurance2_tag', 'Genuine Bill' ) ); ?></span>
					</span>
				</div>
			</div>

			<!-- Card 3: Free Data Transfer -->
			<div class="assurance-card">
				<div class="assurance-icon-box">
					<svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2.2"><polyline points="17 1 21 5 17 9"></polyline><path d="M3 11V9a4 4 0 0 1 4-4h14"></path><polyline points="7 23 3 19 7 15"></polyline><path d="M21 13v2a4 4 0 0 1-4 4H3"></path></svg>
				</div>
				<h3 class="assurance-card-title"><?php echo esc_html( mp_opt( 'assurance3_title', 'Free Data Transfer' ) ); ?></h3>
				<p class="assurance-card-desc"><?php echo esc_html( mp_opt( 'assurance3_desc', 'We safely migrate your WhatsApp chats, photos, contacts, and mobile apps directly to your new phone before you leave.' ) ); ?></p>
				<div class="assurance-card-footer">
					<span class="assurance-pill">
						<svg viewBox="0 0 24 24" width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.4"><polyline points="20 6 9 17 4 12"></polyline></svg>
						<span><?php echo esc_html( mp_opt( 'assurance3_tag', 'Walk-In Setup' ) ); ?></span>
					</span>
				</div>
			</div>

			<!-- Card 4: Trade-In Counter -->
			<div class="assurance-card">
				<div class="assurance-icon-box">
					<svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M21.5 2v6h-6M21.34 15.57a10 10 0 1 1-.57-8.38l5.67-5.67"/></svg>
				</div>
				<h3 class="assurance-card-title"><?php echo esc_html( mp_opt( 'assurance4_title', 'Trade-In Counter' ) ); ?></h3>
				<p class="assurance-card-desc"><?php echo esc_html( mp_opt( 'assurance4_desc', 'Bring your old handset for fair, transparent counter evaluation toward the purchase of any new smartphone.' ) ); ?></p>
				<div class="assurance-card-footer">
					<span class="assurance-pill">
						<svg viewBox="0 0 24 24" width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.4"><polyline points="20 6 9 17 4 12"></polyline></svg>
						<span><?php echo esc_html( mp_opt( 'assurance4_tag', 'Instant Valuation' ) ); ?></span>
					</span>
				</div>
			</div>
		</div>
	</div>
</section>

<?php
get_footer();
