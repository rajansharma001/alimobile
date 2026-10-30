<?php
/**
 * The template for displaying archive pages
 *
 * @package MobilePasal
 */

get_header();

$is_handset_archive = is_tax( [ 'device_brand', 'device_category' ] ) || is_post_type_archive( 'handset' );
$wa_number          = mp_opt( 'whatsapp_number', '9779804530786' );
?>

<main>
  <!-- Page Hero Banner -->
  <section class="page-hero-banner">
    <div class="wrap">
      <div class="page-hero-grid fade-up in-view">
        <div class="page-hero-content">
          <nav class="breadcrumb-nav" aria-label="Breadcrumb">
            <a class="crumb-link" href="<?php echo esc_url( home_url( '/' ) ); ?>">
              <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path></svg>
              <span>Home</span>
            </a>
            <span class="crumb-divider">/</span>
            <?php if ( $is_handset_archive ) : ?>
              <a class="crumb-link" href="<?php echo esc_url( home_url( '/shop/' ) ); ?>">Shop</a>
              <span class="crumb-divider">/</span>
            <?php endif; ?>
            <span class="crumb-active"><?php the_archive_title(); ?></span>
          </nav>

          <h1 class="page-hero-title"><?php the_archive_title(); ?></h1>
          <?php the_archive_description( '<p class="page-hero-desc">', '</p>' ); ?>
        </div>
      </div>
    </div>
  </section>

  <!-- Archive Content Section -->
  <section class="archive-section" style="padding: 60px 0;">
    <div class="wrap">
      <?php if ( have_posts() ) : ?>

        <?php if ( $is_handset_archive ) : ?>
          <!-- Handsets Grid -->
          <div class="handsets-grid">
            <?php
            while ( have_posts() ) : the_post();
              $post_id   = get_the_ID();
              $brand     = get_post_meta( $post_id, '_mp_brand', true );
              $price     = get_post_meta( $post_id, '_mp_price', true );
              $old_price = get_post_meta( $post_id, '_mp_old_price', true );
              $badge     = get_post_meta( $post_id, '_mp_badge', true );
              $storage   = get_post_meta( $post_id, '_mp_storage', true );
              $ram       = get_post_meta( $post_id, '_mp_ram', true );
              $display   = get_post_meta( $post_id, '_mp_display', true );
              $camera    = get_post_meta( $post_id, '_mp_camera', true );
              $battery   = get_post_meta( $post_id, '_mp_battery', true );

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
                    <?php if ( $camera ) : ?>
                      <span class="spec-pill"><?php echo esc_html( $camera ); ?></span>
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
            <?php endwhile; ?>
          </div>

        <?php else : ?>
          <!-- Standard Blog Posts Grid -->
          <div class="guides-grid">
            <?php
            while ( have_posts() ) : the_post();
            ?>
              <article id="post-<?php the_ID(); ?>" <?php post_class( 'guide-card' ); ?>>
                <?php if ( has_post_thumbnail() ) : ?>
                  <div style="border-radius: var(--radius-md); overflow: hidden; margin-bottom: 16px; aspect-ratio: 16/9;">
                    <a href="<?php the_permalink(); ?>">
                      <?php the_post_thumbnail( 'large', [ 'style' => 'width: 100%; height: 100%; object-fit: cover;' ] ); ?>
                    </a>
                  </div>
                <?php endif; ?>

                <div class="guide-date-badge" style="margin-bottom: 8px;">
                  <svg viewBox="0 0 24 24" width="13" height="13" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                  <span><?php echo esc_html( get_the_date( 'M d, Y' ) ); ?></span>
                </div>

                <h2 style="font-size: 1.25rem; font-weight: 800; line-height: 1.35; margin-bottom: 10px;">
                  <a href="<?php the_permalink(); ?>" style="color: var(--text-heading); text-decoration: none;">
                    <?php the_title(); ?>
                  </a>
                </h2>

                <div style="color: var(--text-muted); font-size: 0.94rem; line-height: 1.6; margin-bottom: 16px;">
                  <?php the_excerpt(); ?>
                </div>

                <a href="<?php the_permalink(); ?>" class="btn-read-guide" style="text-decoration: none;">
                  <span>Read Article &rarr;</span>
                </a>
              </article>
            <?php endwhile; ?>
          </div>
        <?php endif; ?>

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
          <h2 style="font-size: 1.5rem; margin-bottom: 12px;"><?php esc_html_e( 'No Items in this Category', 'mobile-pasal' ); ?></h2>
          <p style="color: var(--text-muted); margin-bottom: 24px;"><?php esc_html_e( 'We do not have any listings under this section right now.', 'mobile-pasal' ); ?></p>
          <a href="<?php echo esc_url( home_url( '/shop/' ) ); ?>" class="btn btn-primary"><?php esc_html_e( 'Explore All Handsets', 'mobile-pasal' ); ?></a>
        </div>
      <?php endif; ?>
    </div>
  </section>
</main>

<?php get_footer(); ?>
