<?php
/**
 * The main template file
 *
 * @package MobilePasal
 */

get_header();
?>

<main>
  <!-- Page Hero Banner: Breadcrumbs, Title & Pure Graphics -->
  <section class="page-hero-banner" aria-label="<?php esc_attr_e( 'Blog Updates Header', 'mobile-pasal' ); ?>">
    <div class="page-hero-container">
      <div class="page-hero-row">
        <div class="page-hero-main">
          <nav class="page-breadcrumb-nav" aria-label="<?php esc_attr_e( 'Breadcrumb', 'mobile-pasal' ); ?>">
            <a class="crumb-link" href="<?php echo esc_url( home_url( '/' ) ); ?>">
              <svg viewBox="0 0 24 24" width="13" height="13" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path></svg>
              <span><?php esc_html_e( 'Home', 'mobile-pasal' ); ?></span>
            </a>
            <span class="crumb-divider">/</span>
            <span class="crumb-active"><?php single_post_title( '', true ); ?></span>
          </nav>
          <h1 class="page-hero-title"><?php single_post_title( '', true ); ?></h1>
        </div>
        <?php mp_render_page_hero_graphic(); ?>
      </div>
    </div>
  </section>

  <!-- News / Blog Section -->
  <section class="guides-section" style="padding: 40px 0 60px;">
    <div class="wrap">

      <?php if ( have_posts() ) : ?>
        <div class="guides-grid">
          <?php while ( have_posts() ) : the_post(); ?>
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
                <span>Read Full Article &rarr;</span>
              </a>
            </article>
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
          <h2 style="font-size: 1.5rem; margin-bottom: 12px;"><?php esc_html_e( 'No Posts Found', 'mobile-pasal' ); ?></h2>
          <p style="color: var(--text-muted); margin-bottom: 24px;"><?php esc_html_e( 'There are currently no blog articles published. Check back soon!', 'mobile-pasal' ); ?></p>
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-primary"><?php esc_html_e( 'Return to Home', 'mobile-pasal' ); ?></a>
        </div>
      <?php endif; ?>
    </div>
  </section>
</main>

<?php get_footer(); ?>
