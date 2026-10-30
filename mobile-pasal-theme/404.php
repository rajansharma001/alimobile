<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package MobilePasal
 */

get_header();

$wa_number = mp_opt( 'whatsapp_number', '9779804530786' );
?>

<main>
  <section class="not-found-section" style="padding: clamp(60px, 10vw, 120px) 0; text-align: center;">
    <div class="wrap" style="max-width: 640px;">
      
      <div style="font-size: clamp(4.5rem, 12vw, 8rem); font-weight: 900; line-height: 1; color: var(--primary); letter-spacing: -2px; margin-bottom: 16px;">
        404
      </div>

      <h1 style="font-size: clamp(1.6rem, 3.5vw, 2.2rem); font-weight: 900; color: var(--text-heading); margin-bottom: 14px;">
        <?php esc_html_e( 'Device Page Not Found', 'mobile-pasal' ); ?>
      </h1>

      <p style="color: var(--text-muted); font-size: 1.05rem; line-height: 1.65; margin-bottom: 32px;">
        <?php esc_html_e( 'The handset, repair service, or store page you are looking for may have moved, been renamed, or is temporarily out of stock.', 'mobile-pasal' ); ?>
      </p>

      <div style="display: flex; gap: 14px; justify-content: center; flex-wrap: wrap;">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-primary btn-lg">
          <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path></svg>
          <span><?php esc_html_e( 'Back to Home', 'mobile-pasal' ); ?></span>
        </a>
        <a href="<?php echo esc_url( home_url( '/shop/' ) ); ?>" class="btn btn-secondary btn-lg">
          <span><?php esc_html_e( 'Browse Handsets', 'mobile-pasal' ); ?></span>
        </a>
        <a href="https://wa.me/<?php echo esc_attr( $wa_number ); ?>?text=<?php echo rawurlencode( 'Namaste Ali Mobile, page bhetiyena sahayog chahiyo' ); ?>" target="_blank" rel="noopener" class="btn btn-whatsapp btn-lg">
          <svg viewBox="0 0 24 24" width="16" height="16" fill="currentColor"><path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0 0 12.04 2m.01 1.67c2.2 0 4.26.86 5.82 2.42a8.225 8.225 0 0 1 2.41 5.83c0 4.54-3.7 8.24-8.24 8.24-1.48 0-2.93-.4-4.2-1.15l-.3-.18-3.12.82.83-3.04-.2-.31a8.196 8.196 0 0 1-1.26-4.38c0-4.54 3.7-8.24 8.24-8.24m4.52 11.66c-.25-.13-1.47-.72-1.7-.81-.23-.08-.39-.13-.56.13-.17.25-.64.81-.79.97-.14.17-.29.19-.54.06-.25-.13-1.05-.39-2-1.23-.74-.66-1.24-1.47-1.39-1.72-.14-.25-.02-.39.11-.51.11-.11.25-.29.37-.43.13-.14.17-.25.25-.41.08-.17.04-.31-.02-.44-.06-.13-.56-1.34-.76-1.84-.2-.49-.4-.42-.56-.43h-.47c-.17 0-.44.06-.67.31-.23.25-.87.85-.87 2.08 0 1.23.9 2.41 1.02 2.58.13.17 1.76 2.69 4.27 3.77.6.26 1.07.41 1.43.53.6.19 1.15.16 1.58.1.48-.07 1.47-.6 1.68-1.18.21-.58.21-1.07.15-1.18-.06-.11-.23-.17-.48-.29z"/></svg>
          <span><?php esc_html_e( 'Ask Counter Help', 'mobile-pasal' ); ?></span>
        </a>
      </div>

    </div>
  </section>
</main>

<?php get_footer(); ?>
