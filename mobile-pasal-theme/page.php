<?php
/**
 * The template for displaying all single pages
 *
 * @package MobilePasal
 */

get_header();
?>

<main>
  <?php while ( have_posts() ) : the_post(); ?>
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
              <span class="crumb-active"><?php the_title(); ?></span>
            </nav>
            <h1 class="page-hero-title"><?php the_title(); ?></h1>
          </div>
        </div>
      </div>
    </section>

    <!-- Page Content -->
    <section class="single-page-content" style="padding: 60px 0;">
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
</main>

<?php get_footer(); ?>
