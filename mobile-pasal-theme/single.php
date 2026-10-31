<?php
/**
 * The template for displaying all single posts
 *
 * @package MobilePasal
 */

get_header();
?>

<main>
  <?php while ( have_posts() ) : the_post(); ?>
    <!-- Post Hero Banner -->
    <section class="page-hero-banner">
      <div class="wrap">
        <nav class="breadcrumb-nav" aria-label="Breadcrumb">
          <a class="crumb-link" href="<?php echo esc_url( home_url( '/' ) ); ?>">
            <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path></svg>
            <span>Home</span>
          </a>
          <span class="crumb-divider">/</span>
          <?php
          $categories = get_the_category();
          if ( ! empty( $categories ) ) :
          ?>
            <a class="crumb-link" href="<?php echo esc_url( get_category_link( $categories[0]->term_id ) ); ?>"><?php echo esc_html( $categories[0]->name ); ?></a>
            <span class="crumb-divider">/</span>
          <?php endif; ?>
          <span class="crumb-active"><?php the_title(); ?></span>
        </nav>
      </div>
    </section>

    <!-- Post Article Content -->
    <section class="single-post-section" style="padding: 60px 0;">
      <div class="wrap" style="max-width: 860px;">
        <article id="post-<?php the_ID(); ?>" <?php post_class( 'post-entry-card' ); ?> style="background: var(--bg-card); border: 1px solid var(--border-color); border-radius: var(--radius-lg); padding: clamp(24px, 4vw, 48px); line-height: 1.85; color: var(--text-body);">
          <header class="entry-header" style="margin-bottom: 24px;">
            <h1 class="entry-title" style="margin-top: 0; margin-bottom: 14px; color: var(--text-heading); font-size: clamp(1.6rem, 3.5vw, 2.4rem); font-weight: 800; line-height: 1.25;"><?php the_title(); ?></h1>
            <div style="display: flex; align-items: center; gap: 16px; color: var(--text-muted); font-size: 0.9rem;">
              <span>
                <svg viewBox="0 0 24 24" width="14" height="14" fill="currentColor" style="vertical-align: -2px;"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                <?php the_author(); ?>
              </span>
              <span>&bull;</span>
              <span>
                <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" style="vertical-align: -2px;"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                <?php echo esc_html( get_the_date() ); ?>
              </span>
            </div>
          </header>
          <?php if ( has_post_thumbnail() ) : ?>
            <div style="border-radius: var(--radius-md); overflow: hidden; margin-bottom: 32px;">
              <?php the_post_thumbnail( 'large', [ 'style' => 'width: 100%; height: auto; display: block;' ] ); ?>
            </div>
          <?php endif; ?>

          <div class="entry-content" style="font-size: 1.05rem;">
            <?php the_content(); ?>
          </div>

          <?php
          $tags = get_the_tags();
          if ( $tags ) :
          ?>
            <div style="margin-top: 36px; padding-top: 24px; border-top: 1px solid var(--border-color); display: flex; flex-wrap: wrap; gap: 8px;">
              <strong style="margin-right: 8px;"><?php esc_html_e( 'Tags:', 'mobile-pasal' ); ?></strong>
              <?php foreach ( $tags as $tag ) : ?>
                <a href="<?php echo esc_url( get_tag_link( $tag->term_id ) ); ?>" class="device-pill" style="text-decoration: none;">#<?php echo esc_html( $tag->name ); ?></a>
              <?php endforeach; ?>
            </div>
          <?php endif; ?>

          <div style="margin-top: 36px; display: flex; justify-content: space-between; gap: 16px; padding-top: 24px; border-top: 1px solid var(--border-color);">
            <div>
              <?php previous_post_link( '%link', '&larr; %title' ); ?>
            </div>
            <div>
              <?php next_post_link( '%link', '%title &rarr;' ); ?>
            </div>
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
