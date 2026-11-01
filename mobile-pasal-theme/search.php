<?php
/**
 * The template for displaying search results pages
 *
 * @package MobilePasal
 */

get_header();

$search_query = get_search_query();
$wa_number    = mp_opt( 'whatsapp_number', '9779804530786' );
?>

<main>
  <!-- Redesigned Page Hero Banner -->
  <section class="page-hero-banner" aria-label="<?php esc_attr_e( 'Search Results Header', 'mobile-pasal' ); ?>">
    <div class="page-hero-container">
      <div class="page-hero-content">
        <div class="page-breadcrumb-wrap">
          <nav class="page-breadcrumb-nav" aria-label="<?php esc_attr_e( 'Breadcrumb', 'mobile-pasal' ); ?>">
            <a class="crumb-link" href="<?php echo esc_url( home_url( '/' ) ); ?>">
              <svg viewBox="0 0 24 24" width="13" height="13" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path></svg>
              <span><?php esc_html_e( 'Home', 'mobile-pasal' ); ?></span>
            </a>
            <span class="crumb-divider">/</span>
            <span class="crumb-active"><?php esc_html_e( 'Search', 'mobile-pasal' ); ?></span>
          </nav>
        </div>
        <div class="page-hero-kicker">
          <span class="page-hero-kicker-dot"></span>
          <span><?php esc_html_e( 'Store & Lab Search', 'mobile-pasal' ); ?></span>
        </div>
        <h1 class="page-hero-title">
          <?php
          $search_title_fmt = mp_opt( 'search_results_title', 'Search: %s' );
          printf( esc_html( $search_title_fmt ), '<span class="accent">&ldquo;' . esc_html( $search_query ) . '&rdquo;</span>' );
          ?>
        </h1>
        <p class="page-hero-desc">
          <?php
          global $wp_query;
          printf( esc_html__( 'Found %d result(s) across our smartphone catalog and repair solutions docket.', 'mobile-pasal' ), (int) $wp_query->found_posts );
          ?>
        </p>
        <div class="page-hero-chips">
          <div class="page-hero-chip">
            <?php echo mp_get_icon_svg( 'store', 14, 14 ); ?>
            <span><?php esc_html_e( 'Handset Inventory', 'mobile-pasal' ); ?></span>
          </div>
          <div class="page-hero-chip">
            <?php echo mp_get_icon_svg( 'wrench', 14, 14 ); ?>
            <span><?php esc_html_e( 'Apple Fix Lab Services', 'mobile-pasal' ); ?></span>
          </div>
          <div class="page-hero-chip">
            <?php echo mp_get_icon_svg( 'phone', 14, 14 ); ?>
            <span><?php esc_html_e( 'Live WhatsApp Counter Help', 'mobile-pasal' ); ?></span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Search Results Section -->
  <section class="search-results-section" style="padding: 36px 0 60px;">
    <div class="wrap">

      <?php if ( have_posts() ) : ?>
        <div class="handsets-grid">
          <?php
          while ( have_posts() ) : the_post();
            $post_type = get_post_type();

            if ( 'handset' === $post_type ) :
              $post_id   = get_the_ID();
              $brand     = get_post_meta( $post_id, '_mp_brand', true );
              $price     = get_post_meta( $post_id, '_mp_price', true );
              $old_price = get_post_meta( $post_id, '_mp_old_price', true );
              $badge     = get_post_meta( $post_id, '_mp_badge', true );
              $storage   = get_post_meta( $post_id, '_mp_storage', true );
              $ram       = get_post_meta( $post_id, '_mp_ram', true );
              $display   = get_post_meta( $post_id, '_mp_display', true );
              $camera    = get_post_meta( $post_id, '_mp_camera', true );

              $img_url   = function_exists( 'mp_get_handset_img_url' ) ? mp_get_handset_img_url( $post_id ) : get_the_post_thumbnail_url( $post_id, 'medium' );
              $price_fmt = is_numeric( $price ) ? 'NPR ' . number_format( (float) $price ) : ( $price ?: 'Contact' );
              $old_fmt   = is_numeric( $old_price ) && (float) $old_price > (float) $price ? 'NPR ' . number_format( (float) $old_price ) : '';

              $wa_buy_msg = sprintf( 'Namaste Ali Mobile, %s (%s) barema inquiry chha.', get_the_title(), $price_fmt );
              $wa_buy_url = 'https://wa.me/' . esc_attr( $wa_number ) . '?text=' . rawurlencode( $wa_buy_msg );
            ?>
              <div class="handset-card">
                <?php if ( $badge ) : ?>
                  <span class="handset-badge"><?php echo esc_html( $badge ); ?></span>
                <?php endif; ?>

                <div class="handset-img-wrap">
                  <a href="<?php the_permalink(); ?>">
                    <img src="<?php echo esc_url( $img_url ); ?>" alt="<?php the_title_attribute(); ?>" loading="lazy">
                  </a>
                </div>

                <div class="handset-meta">
                  <span class="handset-brand"><?php echo esc_html( $brand ?: 'GENUINE' ); ?></span>
                  <h3 class="handset-name">
                    <a href="<?php the_permalink(); ?>" style="color: inherit; text-decoration: none;">
                      <?php the_title(); ?>
                    </a>
                  </h3>

                  <div class="handset-specs-pills">
                    <?php if ( $storage || $ram ) : ?>
                      <span class="spec-pill"><?php echo esc_html( trim( "$ram $storage" ) ); ?></span>
                    <?php endif; ?>
                    <?php if ( $display ) : ?>
                      <span class="spec-pill"><?php echo esc_html( $display ); ?></span>
                    <?php endif; ?>
                  </div>

                  <div class="handset-price-row">
                    <div>
                      <span class="price-current"><?php echo esc_html( $price_fmt ); ?></span>
                      <?php if ( $old_fmt ) : ?>
                        <span class="price-original"><?php echo esc_html( $old_fmt ); ?></span>
                      <?php endif; ?>
                    </div>
                  </div>

                  <div class="handset-actions">
                    <a class="btn-handset-wa" href="<?php echo esc_url( $wa_buy_url ); ?>" target="_blank" rel="noopener">
                      <svg viewBox="0 0 24 24" width="14" height="14" fill="currentColor"><path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0 0 12.04 2"/></svg>
                      <span>Inquire / Buy</span>
                    </a>
                    <a class="btn-handset-detail" href="<?php the_permalink(); ?>">
                      <span>Details &rarr;</span>
                    </a>
                  </div>
                </div>
              </div>
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
</main>

<?php get_footer(); ?>
