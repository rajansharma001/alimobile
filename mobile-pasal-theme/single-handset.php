<?php
/**
 * Single Handset Template
 *
 * @package MobilePasal
 */

get_header();

$phone_number   = mp_opt( 'store_phone', '+977 9804530786' );
$phone_raw      = preg_replace( '/[^0-9]/', '', $phone_number );
$wa_number      = mp_opt( 'whatsapp_number', '9779804530786' );

while ( have_posts() ) : the_post();
  $post_id      = get_the_ID();
  $brand        = get_post_meta( $post_id, '_mp_brand', true );
  $model        = get_post_meta( $post_id, '_mp_model', true );
  $price        = get_post_meta( $post_id, '_mp_price', true );
  $old_price    = get_post_meta( $post_id, '_mp_old_price', true );
  $badge        = get_post_meta( $post_id, '_mp_badge', true );
  $storage      = get_post_meta( $post_id, '_mp_storage', true );
  $ram          = get_post_meta( $post_id, '_mp_ram', true );
  $display      = get_post_meta( $post_id, '_mp_display', true );
  $camera       = get_post_meta( $post_id, '_mp_camera', true );
  $battery      = get_post_meta( $post_id, '_mp_battery', true );
  $processor    = get_post_meta( $post_id, '_mp_processor', true );
  $warranty     = get_post_meta( $post_id, '_mp_warranty', true );
  $stock_status = get_post_meta( $post_id, '_mp_stock_status', true ) ?: 'instock';
  $colors       = get_post_meta( $post_id, '_mp_colors', true );

  $img_url      = function_exists( 'mp_get_handset_img_url' ) ? mp_get_handset_img_url( $post_id ) : get_the_post_thumbnail_url( $post_id, 'large' );

  // Pricing formatting
  $price_formatted     = is_numeric( $price ) ? 'NPR ' . number_format( (float) $price ) : ( $price ?: 'Contact for Price' );
  $old_price_formatted = is_numeric( $old_price ) && (float) $old_price > (float) $price ? 'NPR ' . number_format( (float) $old_price ) : '';

  // WhatsApp Message
  $wa_message = sprintf(
    'Namaste Ali Mobile, ma tapaiharuko website ma %s (%s) herera aako chhu. Gulariya counter ma availability ra price confirm gardinus na.',
    get_the_title(),
    $price_formatted
  );
  $wa_url = 'https://wa.me/' . esc_attr( $wa_number ) . '?text=' . rawurlencode( $wa_message );
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
        <a class="crumb-link" href="<?php echo esc_url( home_url( '/shop/' ) ); ?>">Shop</a>
        <?php if ( $brand ) : ?>
          <span class="crumb-divider">/</span>
          <span class="crumb-link"><?php echo esc_html( $brand ); ?></span>
        <?php endif; ?>
        <span class="crumb-divider">/</span>
        <span class="crumb-active"><?php the_title(); ?></span>
      </nav>
    </div>
  </section>

  <!-- Product Showcase Section -->
  <section class="single-product-section" style="padding: 20px 0 60px;">
    <div class="wrap">
      <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 40px; align-items: start;">
        
        <!-- Left: Device Image Card -->
        <div class="product-gallery-card" style="background: var(--bg-card); border: 1px solid var(--border-color); border-radius: var(--radius-lg); padding: clamp(24px, 4vw, 40px); text-align: center; position: relative;">
          <?php if ( $badge ) : ?>
            <div style="position: absolute; top: 20px; left: 20px; background: var(--primary); color: #fff; font-size: 0.75rem; font-weight: 800; padding: 4px 12px; border-radius: 999px; text-transform: uppercase; letter-spacing: 0.5px;">
              <?php echo esc_html( $badge ); ?>
            </div>
          <?php endif; ?>

          <div style="margin: 20px auto 30px; max-width: 380px; aspect-ratio: 4/5; display: flex; align-items: center; justify-content: center;">
            <img src="<?php echo esc_url( $img_url ); ?>" alt="<?php the_title_attribute(); ?>" style="max-height: 100%; max-width: 100%; object-fit: contain; filter: drop-shadow(0 16px 24px rgba(0,0,0,0.12));">
          </div>

          <div style="display: inline-flex; align-items: center; gap: 8px; background: rgba(37,99,235,0.06); color: var(--primary); border: 1px solid rgba(37,99,235,0.15); border-radius: 999px; padding: 6px 14px; font-size: 0.84rem; font-weight: 700;">
            <svg viewBox="0 0 24 24" width="14" height="14" fill="currentColor"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg>
            <span>100% NTA Approved &bull; Official VAT Bill</span>
          </div>
        </div>

        <!-- Right: Device Info & Actions -->
        <div class="product-info-column" style="display: flex; flex-direction: column; gap: 24px;">
          <div>
            <?php if ( $brand ) : ?>
              <span style="display: inline-block; font-size: 0.85rem; font-weight: 800; color: var(--primary); text-transform: uppercase; letter-spacing: 1px; margin-bottom: 6px;">
                <?php echo esc_html( $brand ); ?> Official
              </span>
            <?php endif; ?>
            <h1 style="font-size: clamp(1.8rem, 3.5vw, 2.5rem); font-weight: 900; line-height: 1.2; color: var(--text-heading); margin-bottom: 12px;">
              <?php the_title(); ?>
            </h1>

            <!-- Pricing Box -->
            <div style="display: flex; align-items: baseline; gap: 14px; margin-bottom: 16px;">
              <span style="font-size: clamp(1.6rem, 2.8vw, 2.2rem); font-weight: 900; color: var(--primary);">
                <?php echo esc_html( $price_formatted ); ?>
              </span>
              <?php if ( $old_price_formatted ) : ?>
                <span style="font-size: 1.15rem; color: var(--text-muted); text-decoration: line-through; font-weight: 600;">
                  <?php echo esc_html( $old_price_formatted ); ?>
                </span>
              <?php endif; ?>
            </div>

            <!-- Stock status pill -->
            <div style="display: inline-flex; align-items: center; gap: 8px; font-size: 0.88rem; font-weight: 700; color: var(--text-heading);">
              <span style="width: 10px; height: 10px; border-radius: 50%; background: #22c55e; display: inline-block;"></span>
              <span>Available at Gulariya Counter &bull; In Stock</span>
            </div>
          </div>

          <!-- Description Excerpt -->
          <div style="color: var(--text-body); line-height: 1.7; font-size: 0.98rem;">
            <?php the_content(); ?>
          </div>

          <!-- Quick Hardware Spec Cards -->
          <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(130px, 1fr)); gap: 12px;">
            <?php if ( $processor ) : ?>
              <div style="background: var(--bg-card); border: 1px solid var(--border-color); border-radius: var(--radius-md); padding: 12px 14px;">
                <small style="color: var(--text-muted); font-size: 0.75rem; text-transform: uppercase; font-weight: 700; display: block; margin-bottom: 4px;">Processor</small>
                <strong style="color: var(--text-heading); font-size: 0.88rem;"><?php echo esc_html( $processor ); ?></strong>
              </div>
            <?php endif; ?>

            <?php if ( $display ) : ?>
              <div style="background: var(--bg-card); border: 1px solid var(--border-color); border-radius: var(--radius-md); padding: 12px 14px;">
                <small style="color: var(--text-muted); font-size: 0.75rem; text-transform: uppercase; font-weight: 700; display: block; margin-bottom: 4px;">Display</small>
                <strong style="color: var(--text-heading); font-size: 0.88rem;"><?php echo esc_html( $display ); ?></strong>
              </div>
            <?php endif; ?>

            <?php if ( $storage || $ram ) : ?>
              <div style="background: var(--bg-card); border: 1px solid var(--border-color); border-radius: var(--radius-md); padding: 12px 14px;">
                <small style="color: var(--text-muted); font-size: 0.75rem; text-transform: uppercase; font-weight: 700; display: block; margin-bottom: 4px;">Memory</small>
                <strong style="color: var(--text-heading); font-size: 0.88rem;"><?php echo esc_html( trim( "$ram / $storage", ' /' ) ); ?></strong>
              </div>
            <?php endif; ?>

            <?php if ( $camera ) : ?>
              <div style="background: var(--bg-card); border: 1px solid var(--border-color); border-radius: var(--radius-md); padding: 12px 14px;">
                <small style="color: var(--text-muted); font-size: 0.75rem; text-transform: uppercase; font-weight: 700; display: block; margin-bottom: 4px;">Camera</small>
                <strong style="color: var(--text-heading); font-size: 0.88rem;"><?php echo esc_html( $camera ); ?></strong>
              </div>
            <?php endif; ?>

            <?php if ( $battery ) : ?>
              <div style="background: var(--bg-card); border: 1px solid var(--border-color); border-radius: var(--radius-md); padding: 12px 14px;">
                <small style="color: var(--text-muted); font-size: 0.75rem; text-transform: uppercase; font-weight: 700; display: block; margin-bottom: 4px;">Battery</small>
                <strong style="color: var(--text-heading); font-size: 0.88rem;"><?php echo esc_html( $battery ); ?></strong>
              </div>
            <?php endif; ?>

            <?php if ( $warranty ) : ?>
              <div style="background: var(--bg-card); border: 1px solid var(--border-color); border-radius: var(--radius-md); padding: 12px 14px;">
                <small style="color: var(--text-muted); font-size: 0.75rem; text-transform: uppercase; font-weight: 700; display: block; margin-bottom: 4px;">Warranty</small>
                <strong style="color: var(--text-heading); font-size: 0.88rem;"><?php echo esc_html( $warranty ); ?></strong>
              </div>
            <?php endif; ?>
          </div>

          <!-- Color options if present -->
          <?php if ( $colors ) : ?>
            <div>
              <strong style="font-size: 0.88rem; color: var(--text-heading); display: block; margin-bottom: 6px;">Available Colors:</strong>
              <span style="font-size: 0.94rem; color: var(--text-muted);"><?php echo esc_html( $colors ); ?></span>
            </div>
          <?php endif; ?>

          <!-- Call to Action Buttons -->
          <div style="display: flex; flex-direction: column; gap: 12px; margin-top: 8px;">
            <a class="btn btn-whatsapp btn-lg btn-block" href="<?php echo esc_url( $wa_url ); ?>" target="_blank" rel="noopener">
              <svg viewBox="0 0 24 24" width="18" height="18" fill="currentColor"><path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0 0 12.04 2m.01 1.67c2.2 0 4.26.86 5.82 2.42a8.225 8.225 0 0 1 2.41 5.83c0 4.54-3.7 8.24-8.24 8.24-1.48 0-2.93-.4-4.2-1.15l-.3-.18-3.12.82.83-3.04-.2-.31a8.196 8.196 0 0 1-1.26-4.38c0-4.54 3.7-8.24 8.24-8.24m4.52 11.66c-.25-.13-1.47-.72-1.7-.81-.23-.08-.39-.13-.56.13-.17.25-.64.81-.79.97-.14.17-.29.19-.54.06-.25-.13-1.05-.39-2-1.23-.74-.66-1.24-1.47-1.39-1.72-.14-.25-.02-.39.11-.51.11-.11.25-.29.37-.43.13-.14.17-.25.25-.41.08-.17.04-.31-.02-.44-.06-.13-.56-1.34-.76-1.84-.2-.49-.4-.42-.56-.43h-.47c-.17 0-.44.06-.67.31-.23.25-.87.85-.87 2.08 0 1.23.9 2.41 1.02 2.58.13.17 1.76 2.69 4.27 3.77.6.26 1.07.41 1.43.53.6.19 1.15.16 1.58.1.48-.07 1.47-.6 1.68-1.18.21-.58.21-1.07.15-1.18-.06-.11-.23-.17-.48-.29z"/></svg>
              <span>Order / Inquire on WhatsApp</span>
            </a>
            <a class="btn btn-secondary btn-lg btn-block" href="tel:+<?php echo esc_attr( $phone_raw ); ?>">
              <svg viewBox="0 0 24 24" width="16" height="16" fill="currentColor"><path d="M20.01 15.38c-1.23 0-2.42-.2-3.53-.56a.977.977 0 0 0-1.01.24l-1.57 1.97c-2.83-1.35-5.48-3.9-6.89-6.83l1.95-1.66c.27-.28.35-.67.24-1.02-.37-1.11-.56-2.3-.56-3.53 0-.54-.45-.99-.99-.99H4.19C3.65 3 3 3.24 3 3.99 3 13.28 10.73 21 20.01 21c.71 0 .99-.63.99-1.18v-3.45c0-.54-.45-.99-.99-.99z"/></svg>
              <span>Call Counter Hotline (<?php echo esc_html( $phone_number ); ?>)</span>
            </a>
          </div>

        </div>
      </div>
    </div>
  </section>

  <!-- Assurance Ribbon Section -->
  <section class="trust-features-section" style="padding: 40px 0 60px;">
    <div class="wrap">
      <div class="sec-head sec-head-center" style="margin-bottom: 32px;">
        <span class="sec-kicker">Guaranteed Genuine</span>
        <h2>The Ali Mobile Assurance</h2>
        <p>Every smartphone sold at our counter comes backed with legitimate consumer protections.</p>
      </div>

      <div class="steps-flow-grid" style="grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));">
        <div class="flow-step-card">
          <div class="flow-step-num">
            <svg viewBox="0 0 24 24" width="22" height="22" fill="currentColor"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg>
          </div>
          <h3>100% NTA Approved</h3>
          <p>Fully compliant with Nepal Telecommunications Authority IMEI registration. No SIM lock or network blacklisting issues.</p>
        </div>

        <div class="flow-step-card">
          <div class="flow-step-num">
            <svg viewBox="0 0 24 24" width="22" height="22" fill="currentColor"><path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-5 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z"/></svg>
          </div>
          <h3>Official VAT Bill</h3>
          <p>Every purchase comes with a legitimate serial invoice for official brand warranty claims across Nepal.</p>
        </div>

        <div class="flow-step-card">
          <div class="flow-step-num">
            <svg viewBox="0 0 24 24" width="22" height="22" fill="currentColor"><path d="M16 17.01V10h-2v7.01h-3L15 21l4-3.99h-3zM9 3L5 6.99h3V14h2V6.99h3L9 3z"/></svg>
          </div>
          <h3>Free Data Transfer</h3>
          <p>Our technicians migrate your WhatsApp, contacts, and photos safely to your new phone right at the counter.</p>
        </div>

        <div class="flow-step-card">
          <div class="flow-step-num">
            <svg viewBox="0 0 24 24" width="22" height="22" fill="currentColor"><path d="M12 4V1L8 5l4 4V6c3.31 0 6 2.69 6 6 0 1.01-.25 1.97-.7 2.8l1.46 1.46C19.54 15.03 20 13.57 20 12c0-4.42-3.58-8-8-8zm0 14c-3.31 0-6-2.69-6-6 0-1.01.25-1.97.7-2.8L5.24 7.74C4.46 8.97 4 10.43 4 12c0 4.42 3.58 8 8 8v3l4-4-4-4v3z"/></svg>
          </div>
          <h3>Trade-In Counter</h3>
          <p>Bring your old handset for fair trade-in evaluation toward any new smartphone upgrade.</p>
        </div>
      </div>
    </div>
  </section>

</main>
<?php
endwhile;

get_footer();
