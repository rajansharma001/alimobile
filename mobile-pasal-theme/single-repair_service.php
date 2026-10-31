<?php
/**
 * Single Repair Service Template
 *
 * @package MobilePasal
 */

get_header();

$phone_number   = mp_opt( 'store_phone', '+977 9804530786' );
$phone_raw      = preg_replace( '/[^0-9]/', '', $phone_number );
$wa_number      = mp_opt( 'whatsapp_number', '9779804530786' );

while ( have_posts() ) : the_post();
  $post_id    = get_the_ID();
  $turnaround = get_post_meta( $post_id, '_mp_turnaround', true ) ?: '30–60 mins';
  $warranty   = get_post_meta( $post_id, '_mp_warranty', true ) ?: '90-Day Lab Warranty';
  $symptoms   = get_post_meta( $post_id, '_mp_symptoms', true );
  $models     = get_post_meta( $post_id, '_mp_models', true ) ?: 'All Major Brands & Models';
  $price_est  = get_post_meta( $post_id, '_mp_price_est', true ) ?: 'Free Diagnostic Check';

  $wa_msg = sprintf(
    'Namaste Ali Mobile, ma tapaiharuko %s service barema bujhna chahanchhu. Mero phone ma yo problem chha, estimate ra time kasto hunchha?',
    get_the_title()
  );
  $wa_url = 'https://wa.me/' . esc_attr( $wa_number ) . '?text=' . rawurlencode( $wa_msg );
?>

<main>
  <!-- Breadcrumb Bar -->
  <section class="page-hero-banner">
    <div class="wrap">
      <nav class="breadcrumb-nav" aria-label="Breadcrumb">
        <a class="crumb-link" href="<?php echo esc_url( home_url( '/' ) ); ?>">
          <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path></svg>
          <span>Home</span>
        </a>
        <span class="crumb-divider">/</span>
        <a class="crumb-link" href="<?php echo esc_url( home_url( '/services/' ) ); ?>">Services</a>
        <span class="crumb-divider">/</span>
        <span class="crumb-active"><?php the_title(); ?></span>
      </nav>
    </div>
  </section>

  <!-- Service Details & Booking Grid -->
  <section class="service-details-section" style="padding: 60px 0;">
    <div class="wrap">
      <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 40px; align-items: start;">
        
        <!-- Left: Service Detailed Info -->
        <div style="display: flex; flex-direction: column; gap: 28px;">
          <div style="background: var(--bg-card); border: 1px solid var(--border-color); border-radius: var(--radius-lg); padding: clamp(24px, 4vw, 40px); line-height: 1.8; color: var(--text-body);">
            <h1 style="font-size: clamp(1.6rem, 3.5vw, 2.2rem); font-weight: 800; color: var(--text-heading); margin-top: 0; margin-bottom: 14px;"><?php the_title(); ?></h1>
            <div style="display: flex; flex-wrap: wrap; gap: 12px; margin-bottom: 24px;">
              <div style="display: inline-flex; align-items: center; gap: 8px; background: rgba(37,99,235,0.08); color: var(--primary); padding: 6px 14px; border-radius: 999px; font-weight: 700; font-size: 0.88rem;">
                <svg viewBox="0 0 24 24" width="15" height="15" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                <span>Turnaround: <?php echo esc_html( $turnaround ); ?></span>
              </div>
              <div style="display: inline-flex; align-items: center; gap: 8px; background: rgba(34,197,94,0.1); color: #16a34a; padding: 6px 14px; border-radius: 999px; font-weight: 700; font-size: 0.88rem;">
                <svg viewBox="0 0 24 24" width="15" height="15" fill="currentColor"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg>
                <span><?php echo esc_html( $warranty ); ?></span>
              </div>
            </div>
            <h2 style="font-size: 1.25rem; font-weight: 800; color: var(--text-heading); margin-bottom: 16px; border-top: 1px solid var(--border-color); padding-top: 20px;">Service Overview &amp; Laboratory Procedure</h2>
            <?php the_content(); ?>

            <?php if ( ! empty( $symptoms ) ) : ?>
              <div style="margin-top: 32px; padding-top: 24px; border-top: 1px solid var(--border-color);">
                <h3 style="font-size: 1.15rem; font-weight: 800; color: var(--text-heading); margin-bottom: 14px;">Common Symptoms Treated</h3>
                <ul style="list-style: none; padding: 0; margin: 0; display: grid; gap: 10px;">
                  <?php
                  $symptom_list = is_array( $symptoms ) ? $symptoms : explode( "\n", $symptoms );
                  foreach ( $symptom_list as $sym ) :
                    $sym = trim( $sym );
                    if ( empty( $sym ) ) continue;
                  ?>
                    <li style="display: flex; align-items: center; gap: 10px; font-size: 0.95rem;">
                      <span style="color: var(--primary); font-weight: 800;">&bull;</span>
                      <span><?php echo esc_html( $sym ); ?></span>
                    </li>
                  <?php endforeach; ?>
                </ul>
              </div>
            <?php endif; ?>

            <?php if ( ! empty( $models ) ) : ?>
              <div style="margin-top: 28px; padding-top: 24px; border-top: 1px solid var(--border-color);">
                <h3 style="font-size: 1.15rem; font-weight: 800; color: var(--text-heading); margin-bottom: 10px;">Supported Devices</h3>
                <p style="color: var(--text-muted); font-size: 0.94rem;"><?php echo esc_html( $models ); ?></p>
              </div>
            <?php endif; ?>
          </div>
        </div>

        <!-- Right: Estimate & Fast WhatsApp Booking -->
        <div style="display: flex; flex-direction: column; gap: 24px;">
          <div style="background: var(--bg-card); border: 1px solid var(--border-color); border-radius: var(--radius-lg); padding: clamp(24px, 4vw, 36px);">
            <div style="margin-bottom: 20px;">
              <small style="color: var(--text-muted); text-transform: uppercase; font-weight: 700; font-size: 0.78rem; letter-spacing: 0.5px;">Estimated Cost</small>
              <h3 style="font-size: 1.6rem; font-weight: 900; color: var(--primary); margin-top: 4px;"><?php echo esc_html( $price_est ); ?></h3>
              <p style="color: var(--text-muted); font-size: 0.88rem; margin-top: 4px;">Transparent pricing. Free bench diagnostics prior to any repair.</p>
            </div>

            <div style="display: flex; flex-direction: column; gap: 12px;">
              <a class="btn btn-whatsapp btn-lg btn-block" href="<?php echo esc_url( $wa_url ); ?>" target="_blank" rel="noopener">
                <svg viewBox="0 0 24 24" width="18" height="18" fill="currentColor"><path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0 0 12.04 2m.01 1.67c2.2 0 4.26.86 5.82 2.42a8.225 8.225 0 0 1 2.41 5.83c0 4.54-3.7 8.24-8.24 8.24-1.48 0-2.93-.4-4.2-1.15l-.3-.18-3.12.82.83-3.04-.2-.31a8.196 8.196 0 0 1-1.26-4.38c0-4.54 3.7-8.24 8.24-8.24m4.52 11.66c-.25-.13-1.47-.72-1.7-.81-.23-.08-.39-.13-.56.13-.17.25-.64.81-.79.97-.14.17-.29.19-.54.06-.25-.13-1.05-.39-2-1.23-.74-.66-1.24-1.47-1.39-1.72-.14-.25-.02-.39.11-.51.11-.11.25-.29.37-.43.13-.14.17-.25.25-.41.08-.17.04-.31-.02-.44-.06-.13-.56-1.34-.76-1.84-.2-.49-.4-.42-.56-.43h-.47c-.17 0-.44.06-.67.31-.23.25-.87.85-.87 2.08 0 1.23.9 2.41 1.02 2.58.13.17 1.76 2.69 4.27 3.77.6.26 1.07.41 1.43.53.6.19 1.15.16 1.58.1.48-.07 1.47-.6 1.68-1.18.21-.58.21-1.07.15-1.18-.06-.11-.23-.17-.48-.29z"/></svg>
                <span>Book Repair on WhatsApp</span>
              </a>
              <a class="btn btn-secondary btn-lg btn-block" href="tel:+<?php echo esc_attr( $phone_raw ); ?>">
                <svg viewBox="0 0 24 24" width="16" height="16" fill="currentColor"><path d="M20.01 15.38c-1.23 0-2.42-.2-3.53-.56a.977.977 0 0 0-1.01.24l-1.57 1.97c-2.83-1.35-5.48-3.9-6.89-6.83l1.95-1.66c.27-.28.35-.67.24-1.02-.37-1.11-.56-2.3-.56-3.53 0-.54-.45-.99-.99-.99H4.19C3.65 3 3 3.24 3 3.99 3 13.28 10.73 21 20.01 21c.71 0 .99-.63.99-1.18v-3.45c0-.54-.45-.99-.99-.99z"/></svg>
                <span>Call Lab Desk: <?php echo esc_html( $phone_number ); ?></span>
              </a>
            </div>

            <div style="margin-top: 24px; padding-top: 20px; border-top: 1px solid var(--border-color); font-size: 0.88rem; color: var(--text-muted); display: grid; gap: 10px;">
              <div style="display: flex; align-items: center; gap: 8px;">
                <svg viewBox="0 0 24 24" width="14" height="14" fill="currentColor" style="color: var(--primary);"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5a2.5 2.5 0 0 1 0-5 2.5 2.5 0 0 1 0 5z"/></svg>
                <span>Counter: Ji. Pra. Ka. Chowk, Gulariya</span>
              </div>
              <div style="display: flex; align-items: center; gap: 8px;">
                <svg viewBox="0 0 24 24" width="14" height="14" fill="currentColor" style="color: var(--primary);"><path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67z"/></svg>
                <span>Sun–Fri: 9 AM – 8 PM (Saturday Open)</span>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

</main>

<?php
endwhile;

get_footer();
