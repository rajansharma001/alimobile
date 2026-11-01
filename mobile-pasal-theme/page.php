<?php
/**
 * The template for displaying all single pages
 *
 * @package MobilePasal
 */

get_header();
?>

<div class="site-main">
  <?php while ( have_posts() ) : the_post(); ?>
    <!-- Page Hero Banner: Breadcrumbs, Title & Pure Graphics -->
    <section class="page-hero-banner" aria-label="<?php esc_attr_e( 'Page Header', 'mobile-pasal' ); ?>">
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
              <span class="crumb-active"><?php the_title(); ?></span>
            </nav>
            <h1 class="page-hero-title"><?php the_title(); ?></h1>
          </div>
          <?php mp_render_page_hero_graphic(); ?>
        </div>
      </div>
    </section>

    <!-- Page Content -->
    <section class="section-wrap single-page-content" style="padding: 40px 0 60px;">
      <div class="tech-bg-grid" aria-hidden="true"></div>
      <div class="tech-ring-accent tech-ring-right" aria-hidden="true"></div>
      <div class="wrap" style="max-width: 900px;">
        <article id="post-<?php the_ID(); ?>" <?php post_class( 'page-body-card' ); ?> style="background: var(--bg-card); border: 1px solid var(--border-color); border-radius: var(--radius-lg); padding: clamp(24px, 4vw, 48px); line-height: 1.8; color: var(--text-body);">
          <?php if ( has_post_thumbnail() ) : ?>
            <div style="border-radius: var(--radius-md); overflow: hidden; margin-bottom: 32px;">
              <?php the_post_thumbnail( 'full', [ 'style' => 'width: 100%; height: auto; display: block;' ] ); ?>
            </div>
          <?php endif; ?>

          <div class="entry-content">
            <?php
            the_content();

            wp_link_pages( [
              'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'mobile-pasal' ),
              'after'  => '</div>',
            ] );
            ?>
          </div>

          <?php if ( comments_open() || get_comments_number() ) : ?>
            <div style="margin-top: 48px; padding-top: 32px; border-top: 1px solid var(--border-color);">
              <?php comments_template(); ?>
            </div>
          <?php endif; ?>
        </article>
      </div>
    </section>
  <?php endwhile; ?>
</div>

<?php get_footer(); ?>
