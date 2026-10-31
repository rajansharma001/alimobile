<?php
/**
 * Template Name: Shop / Handset Catalog
 * Description: Catalog page with sticky left-sidebar filtration, 3-column products grid, pagination, category cards, and zero-risk assurance cards.
 *
 * @package Mobile_Pasal
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<!-- Page Hero Banner -->
<section class="page-hero-banner">
	<div class="wrap">
		<nav class="breadcrumb-nav" aria-label="<?php esc_attr_e( 'Breadcrumb', 'mobile-pasal' ); ?>">
			<a class="crumb-link" href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path></svg>
				<span><?php esc_html_e( 'Home', 'mobile-pasal' ); ?></span>
			</a>
			<span class="crumb-divider">/</span>
			<span class="crumb-active"><?php esc_html_e( 'Shop', 'mobile-pasal' ); ?></span>
		</nav>
	</div>
</section>

<!-- Showroom Ecosystem Category Cards -->
<section class="shop-category-section">
	<div class="wrap">
		<div class="sec-head sec-head-center fade-up" style="margin-bottom: 24px;">
			<span class="sec-kicker"><?php esc_html_e( 'Official Flagship Lines', 'mobile-pasal' ); ?></span>
			<h2 style="font-size: clamp(1.4rem, 2.5vw, 1.85rem); margin-bottom: 6px;"><?php esc_html_e( 'Browse by Brand & Device Ecosystem', 'mobile-pasal' ); ?></h2>
			<p style="max-width: 680px; margin: 0 auto;"><?php esc_html_e( 'Select an ecosystem to filter our live Gulariya showroom stock with verified IMEI and Nepal VAT invoice.', 'mobile-pasal' ); ?></p>
		</div>

		<div class="shop-category-cards-grid fade-up">
			<!-- Apple -->
			<a href="#catalog" class="shop-cat-card" data-category-target="apple">
				<div class="cat-card-icon-wrap" style="background: rgba(15, 23, 42, 0.05); color: #0f172a;">
					<svg viewBox="0 0 24 24" width="24" height="24" fill="currentColor"><path d="M18.71 19.5c-.83 1.24-1.71 2.45-3.05 2.47-1.34.03-1.77-.79-3.29-.79-1.53 0-2 .77-3.27.82-1.31.05-2.3-1.32-3.14-2.53C4.25 17 2.94 12.45 4.7 9.39c.87-1.52 2.43-2.48 4.12-2.51 1.28-.02 2.5.87 3.29.87.78 0 2.26-1.07 3.81-.91.65.03 2.47.26 3.64 1.98-.09.06-2.17 1.28-2.15 3.81.03 3.02 2.65 4.03 2.68 4.04-.03.07-.42 1.44-1.38 2.83M15.97 6.84c.64-.78 1.08-1.87.96-2.96-.93.04-2.05.62-2.72 1.4-.59.68-1.1 1.77-.96 2.83 1.03.08 2.08-.49 2.72-1.27z"/></svg>
				</div>
				<div class="cat-card-content">
					<span class="cat-brand-tag">Apple Flagships</span>
					<h3 class="cat-card-title">iPhone 16 &amp; 15</h3>
					<span class="cat-status-pill">NTA MDMS Registered</span>
				</div>
			</a>

			<!-- Samsung -->
			<a href="#catalog" class="shop-cat-card" data-category-target="samsung">
				<div class="cat-card-icon-wrap" style="background: rgba(37, 99, 235, 0.08); color: #2563eb;">
					<svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><rect x="5" y="2" width="14" height="20" rx="2"></rect><line x1="12" y1="18" x2="12.01" y2="18"></line></svg>
				</div>
				<div class="cat-card-content">
					<span class="cat-brand-tag">Samsung Galaxy</span>
					<h3 class="cat-card-title">S24 Ultra &amp; A-Series</h3>
					<span class="cat-status-pill">Official Nepal Warranty</span>
				</div>
			</a>

			<!-- Xiaomi -->
			<a href="#catalog" class="shop-cat-card" data-category-target="xiaomi">
				<div class="cat-card-icon-wrap" style="background: rgba(249, 115, 22, 0.08); color: #ea580c;">
					<svg viewBox="0 0 24 24" width="24" height="24" fill="currentColor"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>
				</div>
				<div class="cat-card-content">
					<span class="cat-brand-tag">Xiaomi / Redmi</span>
					<h3 class="cat-card-title">Note 13 &amp; HyperOS</h3>
					<span class="cat-status-pill">Best Value Tech</span>
				</div>
			</a>

			<!-- OnePlus -->
			<a href="#catalog" class="shop-cat-card" data-category-target="oneplus">
				<div class="cat-card-icon-wrap" style="background: rgba(239, 68, 68, 0.08); color: #dc2626;">
					<svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2.2"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>
				</div>
				<div class="cat-card-content">
					<span class="cat-brand-tag">OnePlus Flagship</span>
					<h3 class="cat-card-title">OnePlus 12 &amp; Nord</h3>
					<span class="cat-status-pill">OxygenOS 100W Speed</span>
				</div>
			</a>

			<!-- Google Pixel -->
			<a href="#catalog" class="shop-cat-card" data-category-target="google">
				<div class="cat-card-icon-wrap" style="background: rgba(16, 185, 129, 0.08); color: #059669;">
					<svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg>
				</div>
				<div class="cat-card-content">
					<span class="cat-brand-tag">Google Pixel</span>
					<h3 class="cat-card-title">Pixel 9 &amp; Tensor AI</h3>
					<span class="cat-status-pill">Pro Computational Cam</span>
				</div>
			</a>

			<!-- Accessories -->
			<a href="#catalog" class="shop-cat-card" data-category-target="accessories">
				<div class="cat-card-icon-wrap" style="background: rgba(99, 102, 241, 0.08); color: #4f46e5;">
					<svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 18v-6a9 9 0 0 1 18 0v6"></path><path d="M21 19a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3zM3 19a2 2 0 0 0 2 2h1a2 2 0 0 0 2-2v-3a2 2 0 0 0-2-2H3z"></path></svg>
				</div>
				<div class="cat-card-content">
					<span class="cat-brand-tag">Audio &amp; Gear</span>
					<h3 class="cat-card-title">AirPods, Buds &amp; GaN</h3>
					<span class="cat-status-pill">100% Genuine Brands</span>
				</div>
			</a>
		</div>
	</div>
</section>

<!-- Main Catalog Section: Left-Sidebar Filters + Right-Products -->
<section class="catalog-section" id="catalog">
	<div class="wrap">
		<div class="sec-head sec-head-center fade-up" style="margin-bottom: 28px;">
			<span class="sec-kicker"><?php esc_html_e( 'Gulariya Counter Stock', 'mobile-pasal' ); ?></span>
			<h2><?php esc_html_e( 'Official NTA Smartphones & Genuine Gear', 'mobile-pasal' ); ?></h2>
			<p><?php esc_html_e( 'Browse verified smartphones with 100% MDMS IMEI registration, official VAT invoices, and free walk-in data migration.', 'mobile-pasal' ); ?></p>
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
						<input id="site-search" type="search" placeholder="<?php esc_attr_e( 'iPhone 16, S24 Ultra, Pixel...', 'mobile-pasal' ); ?>" autocomplete="off">
						<button id="search-clear-btn" type="button" class="sidebar-search-clear" style="display:none;" aria-label="<?php esc_attr_e( 'Clear search', 'mobile-pasal' ); ?>">&times;</button>
					</div>
				</div>

				<!-- Brand / Ecosystem Filter -->
				<div class="sidebar-filter-group">
					<label class="filter-group-label"><?php esc_html_e( 'Brand & Ecosystem', 'mobile-pasal' ); ?></label>
					<div class="sidebar-filter-list" role="tablist">
						<button type="button" class="sidebar-filter-item filter-tab-btn active" data-filter="all">
							<span class="filter-check-radio"></span>
							<span class="filter-name"><?php esc_html_e( 'All Handsets', 'mobile-pasal' ); ?></span>
						</button>
						<button type="button" class="sidebar-filter-item filter-tab-btn" data-filter="apple">
							<span class="filter-check-radio"></span>
							<span class="filter-name">Apple iPhone</span>
						</button>
						<button type="button" class="sidebar-filter-item filter-tab-btn" data-filter="samsung">
							<span class="filter-check-radio"></span>
							<span class="filter-name">Samsung Galaxy</span>
						</button>
						<button type="button" class="sidebar-filter-item filter-tab-btn" data-filter="xiaomi">
							<span class="filter-check-radio"></span>
							<span class="filter-name">Xiaomi / Redmi</span>
						</button>
						<button type="button" class="sidebar-filter-item filter-tab-btn" data-filter="oneplus">
							<span class="filter-check-radio"></span>
							<span class="filter-name">OnePlus</span>
						</button>
						<button type="button" class="sidebar-filter-item filter-tab-btn" data-filter="google">
							<span class="filter-check-radio"></span>
							<span class="filter-name">Google Pixel</span>
						</button>
						<button type="button" class="sidebar-filter-item filter-tab-btn" data-filter="accessories">
							<span class="filter-check-radio"></span>
							<span class="filter-name"><?php esc_html_e( 'Accessories & Gear', 'mobile-pasal' ); ?></span>
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
					$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
					$shop_query = new WP_Query( array(
						'post_type'      => 'handset',
						'posts_per_page' => 48,
						'paged'          => $paged,
						'post_status'    => 'publish',
					) );

					$card_idx = 0;

					if ( $shop_query->have_posts() ) :
						while ( $shop_query->have_posts() ) :
							$shop_query->the_post();
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
