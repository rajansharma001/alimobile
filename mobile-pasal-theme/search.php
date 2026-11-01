<?php
/**
 * The template for displaying search results pages
 *
 * @package MobilePasal
 */

get_header();

$search_query      = get_search_query();
$wa_number         = mp_opt( 'whatsapp_number', '9779804530786' );
$hidden_price_text = mp_opt( 'handset_hidden_price_text', 'Contact for Counter Price' );
?>

<div class="site-main">
  <!-- Page Hero Banner: Breadcrumbs, Title & Pure Graphics -->
  <section class="page-hero-banner" aria-label="<?php esc_attr_e( 'Search Results Header', 'mobile-pasal' ); ?>">
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
            <span class="crumb-active"><?php esc_html_e( 'Search', 'mobile-pasal' ); ?></span>
          </nav>
          <h1 class="page-hero-title">
            <?php
            $search_title_fmt = mp_opt( 'search_results_title', 'Search: %s' );
            printf( esc_html( $search_title_fmt ), '<span class="accent">&ldquo;' . esc_html( $search_query ) . '&rdquo;</span>' );
            ?>
          </h1>
        </div>
        <?php mp_render_page_hero_graphic(); ?>
      </div>
    </div>
  </section>

  <!-- Search Results Section -->
  <section class="section-wrap search-results-section" style="padding: 36px 0 60px;">
    <div class="tech-bg-grid" aria-hidden="true"></div>
    <div class="tech-ring-accent tech-ring-right" aria-hidden="true"></div>
    <div class="container wrap">

      <form role="search" method="get" class="mp-page-search-bar" action="<?php echo esc_url( home_url( '/' ) ); ?>">
        <input type="search" name="s" class="mp-page-search-input" placeholder="<?php esc_attr_e( 'Search iPhone, Samsung, Redmi, or repair service...', 'mobile-pasal' ); ?>" value="<?php echo esc_attr( $search_query ); ?>" aria-label="<?php esc_attr_e( 'Search phones and services', 'mobile-pasal' ); ?>" />
        <button type="submit" class="mp-page-search-btn"><?php esc_html_e( 'Search', 'mobile-pasal' ); ?></button>
      </form>

      <?php if ( have_posts() ) : ?>
        <div class="products-grid">
          <?php
          while ( have_posts() ) : the_post();
            $post_type = get_post_type();

            if ( 'handset' === $post_type ) :
              $post_id          = get_the_ID();
              $permalink        = get_permalink( $post_id );
              $brand_terms      = get_the_terms( $post_id, 'device_brand' );
              $brand_name       = ! empty( $brand_terms ) && ! is_wp_error( $brand_terms ) ? $brand_terms[0]->name : ( get_post_meta( $post_id, '_mp_brand', true ) ?: 'Handset' );
              $cat_terms        = get_the_terms( $post_id, 'device_category' );
              $cat_name         = ! empty( $cat_terms ) && ! is_wp_error( $cat_terms ) ? $cat_terms[0]->name : $brand_name;
              $price            = get_post_meta( $post_id, '_mp_price', true );
              $old_price        = get_post_meta( $post_id, '_mp_old_price', true );
              $badge            = get_post_meta( $post_id, '_mp_badge', true ) ?: __( 'Official VAT Bill', 'mobile-pasal' );
              $spec_screen      = get_post_meta( $post_id, '_mp_spec_screen', true ) ?: get_post_meta( $post_id, '_mp_display', true );
              $spec_chip        = get_post_meta( $post_id, '_mp_spec_chip', true ) ?: get_post_meta( $post_id, '_mp_processor', true );
              $ram_meta         = get_post_meta( $post_id, '_mp_ram', true );
              $storage_meta     = get_post_meta( $post_id, '_mp_storage', true );
              $spec_storage     = get_post_meta( $post_id, '_mp_spec_storage', true ) ?: ( ( $ram_meta || $storage_meta ) ? trim( "{$ram_meta} / {$storage_meta}", ' /' ) : '' );

              $img_url          = function_exists( 'mp_get_handset_img_url' ) ? mp_get_handset_img_url( $post_id ) : get_the_post_thumbnail_url( $post_id, 'medium' );
              $is_price_visible = function_exists( 'mp_is_handset_price_visible' ) ? mp_is_handset_price_visible( $post_id ) : ! empty( $price );
              $price_fmt        = is_numeric( $price ) ? 'NPR ' . number_format( (float) $price ) : $price;
              $old_fmt          = is_numeric( $old_price ) && (float) $old_price > (float) $price ? 'NPR ' . number_format( (float) $old_price ) : '';

              $wa_buy_msg = $is_price_visible
                ? sprintf( 'Namaste Ali Mobile, ma tapaiharuko website ma %s (%s) herera aako chhu. Gulariya counter ma availability ra rate confirm gardinus na.', get_the_title(), $price_fmt )
                : sprintf( 'Namaste Ali Mobile, ma tapaiharuko website ma %s herera aako chhu. Yas ko aaja ko counter price ra availability quote pathaidinus na.', get_the_title() );
              $wa_buy_url = 'https://wa.me/' . esc_attr( $wa_number ) . '?text=' . rawurlencode( $wa_buy_msg );
            ?>
              <article class="product-card">
                <div class="product-card-topbar">
                  <span class="product-tag"><?php echo esc_html( $badge ); ?></span>
                  <span class="product-cat-tag"><?php echo esc_html( $cat_name ); ?></span>
                </div>

                <a class="product-img-box" href="<?php echo esc_url( $permalink ); ?>" aria-label="<?php the_title_attribute(); ?>">
                  <img src="<?php echo esc_url( $img_url ); ?>" alt="<?php the_title_attribute(); ?>" loading="lazy" />
                </a>

                <div class="product-brand-row">
                  <span><?php echo esc_html( $brand_name ); ?></span>
                  <span class="product-mdms-tag">
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="vertical-align:-1px;margin-right:3px;"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
                    MDMS &amp; VAT
                  </span>
                </div>

                <h3 class="product-name">
                  <a href="<?php echo esc_url( $permalink ); ?>"><?php the_title(); ?></a>
                </h3>

                <div class="product-pricing-row">
                  <?php if ( $is_price_visible ) : ?>
                    <div class="price-wrap">
                      <span class="current-price"><?php echo esc_html( $price_fmt ); ?></span>
                      <?php if ( ! empty( $old_fmt ) ) : ?>
                        <span class="old-price"><?php echo esc_html( $old_fmt ); ?></span>
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

                <div class="product-actions">
                  <a class="card-wa-btn" href="<?php echo esc_url( $wa_buy_url ); ?>" target="_blank" rel="noopener noreferrer">
                    <svg viewBox="0 0 24 24" width="14" height="14" fill="currentColor" aria-hidden="true"><path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0 0 12.04 2m.01 1.67c2.2 0 4.26.86 5.82 2.42a8.225 8.225 0 0 1 2.41 5.83c0 4.54-3.7 8.24-8.24 8.24-1.48 0-2.93-.4-4.2-1.15l-.3-.18-3.12.82.83-3.04-.2-.31a8.196 8.196 0 0 1-1.26-4.38c0-4.54 3.7-8.24 8.24-8.24m4.52 11.66c-.25-.13-1.47-.72-1.7-.81-.23-.08-.39-.13-.56.13-.17.25-.64.81-.79.97-.14.17-.29.19-.54.06-.25-.13-1.05-.39-2-1.23-.74-.66-1.24-1.47-1.39-1.72-.14-.25-.02-.39.11-.51.11-.11.25-.29.37-.43.13-.14.17-.25.25-.41.08-.17.04-.31-.02-.44-.06-.13-.56-1.34-.76-1.84-.2-.49-.4-.42-.56-.43h-.47c-.17 0-.44.06-.67.31-.23.25-.87.85-.87 2.08 0 1.23.9 2.41 1.02 2.58.13.17 1.76 2.69 4.27 3.77.6.26 1.07.41 1.43.53.6.19 1.15.16 1.58.1.48-.07 1.47-.6 1.68-1.18.21-.58.21-1.07.15-1.18-.06-.11-.23-.17-.48-.29z"/></svg>
                    <span><?php echo $is_price_visible ? esc_html__( 'WhatsApp Rate', 'mobile-pasal' ) : esc_html__( 'Inquire Rate', 'mobile-pasal' ); ?></span>
                  </a>
                  <a class="card-specs-btn" href="<?php echo esc_url( $permalink ); ?>#specs-matrix" title="<?php esc_attr_e( 'View Specifications', 'mobile-pasal' ); ?>">
                    <span><?php esc_html_e( 'Specs ›', 'mobile-pasal' ); ?></span>
                  </a>
                </div>
              </article>
            <?php else : ?>
              <!-- Non-handset general result -->
              <div class="guide-card">
                <span class="device-pill" style="align-self: flex-start; text-transform: uppercase;"><?php echo esc_html( $post_type ); ?></span>
                <h3 style="font-size: 1.2rem; margin: 12px 0 8px;">
                  <a href="<?php the_permalink(); ?>" style="color: var(--text-heading); text-decoration: none;">
                    <?php the_title(); ?>
                  </a>
                </h3>
                <p style="color: var(--text-muted); font-size: 0.92rem; line-height: 1.6;"><?php the_excerpt(); ?></p>
                <a href="<?php the_permalink(); ?>" class="btn-read-guide" style="margin-top: auto; text-decoration: none;">View Result &rarr;</a>
              </div>
            <?php endif; ?>

          <?php endwhile; ?>
        </div>

        <div style="margin-top: 48px; text-align: center;">
          <?php
          the_posts_pagination( [
            'mid_size'  => 2,
            'prev_text' => '&larr; Previous',
            'next_text' => 'Next &rarr;',
          ] );
          ?>
        </div>

      <?php else : ?>
        <div class="empty-results-box" style="text-align: center; padding: 60px 20px;">
          <h2 style="font-size: 1.5rem; margin-bottom: 12px;"><?php echo esc_html( mp_opt( 'search_empty_title', 'No Matches Found' ) ); ?></h2>
          <p style="color: var(--text-muted); margin-bottom: 24px;">
            <?php echo nl2br( esc_html( mp_opt( 'search_empty_desc', 'We couldn\'t find anything matching your search term. Feel free to browse our full showroom catalog or reach out on WhatsApp.' ) ) ); ?>
          </p>
          <div class="error-action-btns">
            <a href="<?php echo esc_url( home_url( '/shop/' ) ); ?>" class="btn btn-primary"><?php echo esc_html( mp_opt( 'search_btn_catalog', 'Showroom Catalog' ) ); ?></a>
            <a href="https://wa.me/<?php echo esc_attr( $wa_number ); ?>" target="_blank" rel="noopener" class="btn btn-whatsapp"><?php echo esc_html( mp_opt( 'search_btn_whatsapp', 'Ask on WhatsApp' ) ); ?></a>
          </div>
        </div>
      <?php endif; ?>
    </div>
  </section>
</div>

<?php get_footer(); ?>
