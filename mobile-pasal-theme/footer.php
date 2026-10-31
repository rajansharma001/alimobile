<?php
/**
 * The footer template for Mobile Pasal
 * Complete Store & Repair Lab Experience Design
 *
 * @package Mobile_Pasal
 * @version 3.2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$phone     = mp_opt( 'contact_phone', '+977 9804530786' );
$clean_p   = mp_clean_phone( $phone );
$address   = mp_opt( 'contact_address', 'Ji. Pra. Ka. Chowk, Gulariya-06, Bardiya' );
$copyright = mp_opt( 'footer_copyright', '© 2026 Ali Mobile Center & Apple Fix, Gulariya-06, Bardiya. All rights reserved.' );

// Social Media Links
$soc_fb = mp_opt( 'social_facebook', 'https://facebook.com/alimobilecenter' );
$soc_ig = mp_opt( 'social_instagram', 'https://instagram.com/alimobilecenter' );
$soc_wa = mp_opt( 'social_whatsapp', 'https://wa.me/' . $clean_p );
$soc_tt = mp_opt( 'social_tiktok', 'https://tiktok.com/@alimobilecenter' );
$soc_gm = mp_opt( 'social_google_maps', 'https://maps.google.com/?q=Ali+Mobile+Center+Gulariya' );
$soc_yt = mp_opt( 'social_youtube', 'https://youtube.com/@alimobilecenter' );
?>
</main><!-- /#top -->

<!-- Trust Guarantee Strip -->
<section class="trust-strip">
  <div class="container">
    <div class="trust-strip-grid">
      <div class="trust-box">
        <div class="trust-box-icon">
          <?php echo mp_get_icon_svg( mp_opt( 'trust_box1_icon', 'shield' ), 22, 22 ); ?>
        </div>
        <div>
          <h4 class="trust-box-title"><?php echo esc_html( mp_opt( 'trust_box1_title', 'NTA Registered Devices' ) ); ?></h4>
          <p class="trust-box-desc"><?php echo esc_html( mp_opt( 'trust_box1_desc', '100% compliant with Nepal MDMS laws.' ) ); ?></p>
        </div>
      </div>
      <div class="trust-box">
        <div class="trust-box-icon">
          <?php echo mp_get_icon_svg( mp_opt( 'trust_box2_icon', 'bolt' ), 22, 22 ); ?>
        </div>
        <div>
          <h4 class="trust-box-title"><?php echo esc_html( mp_opt( 'trust_box2_title', 'Express 45-Min Lab' ) ); ?></h4>
          <p class="trust-box-desc"><?php echo esc_html( mp_opt( 'trust_box2_desc', 'Quick turnaround with genuine spare parts.' ) ); ?></p>
        </div>
      </div>
      <div class="trust-box">
        <div class="trust-box-icon">
          <?php echo mp_get_icon_svg( mp_opt( 'trust_box3_icon', 'tag' ), 22, 22 ); ?>
        </div>
        <div>
          <h4 class="trust-box-title"><?php echo esc_html( mp_opt( 'trust_box3_title', 'Zero Hidden Charges' ) ); ?></h4>
          <p class="trust-box-desc"><?php echo esc_html( mp_opt( 'trust_box3_desc', 'Transparent billing and authentic warranties.' ) ); ?></p>
        </div>
      </div>
      <div class="trust-box">
        <div class="trust-box-icon">
          <?php echo mp_get_icon_svg( mp_opt( 'trust_box4_icon', 'location' ), 22, 22 ); ?>
        </div>
        <div>
          <h4 class="trust-box-title"><?php echo esc_html( mp_opt( 'trust_box4_title', 'Counter Agent Ready' ) ); ?></h4>
          <p class="trust-box-desc"><?php echo esc_html( mp_opt( 'trust_box4_desc', 'eSewa top-up, bill payments & cash points.' ) ); ?></p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Main Footer -->
<footer class="site-footer">
  <div class="container">
    <div class="footer-grid">
      <div>
        <div class="brand" style="color:#ffffff; margin-bottom:14px;">
          <span class="brand-mark">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 2L14.4 9.6L22 12L14.4 14.4L12 22L9.6 14.4L2 12L9.6 9.6L12 2Z"/></svg>
          </span>
          <span><?php echo esc_html( mp_opt( 'brand_name_line1', 'Ali Mobile' ) ); ?><br><?php echo esc_html( mp_opt( 'brand_name_line2', 'Center' ) ); ?></span>
        </div>
        <p style="color:#8fa7cb; line-height:1.6; margin:0 0 16px 0;">
          <?php echo esc_html( mp_opt( 'footer_brand_desc', 'Leading smartphone store & microscope-equipped certified repair center in Gulariya, Bardiya. Dedicated to genuine parts, NTA compliance, and honest service.' ) ); ?>
        </p>

        <!-- Social Media Icons Bar -->
        <div class="footer-social-bar">
          <span class="social-bar-label"><?php esc_html_e( 'Connect With Us:', 'mobile-pasal' ); ?></span>
          <div class="social-icons-row">
            <?php if ( ! empty( $soc_fb ) ) : ?>
            <a class="social-icon-btn social-fb" href="<?php echo esc_url( $soc_fb ); ?>" target="_blank" rel="noopener noreferrer" aria-label="Facebook">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
            </a>
            <?php endif; ?>
            <?php if ( ! empty( $soc_ig ) ) : ?>
            <a class="social-icon-btn social-ig" href="<?php echo esc_url( $soc_ig ); ?>" target="_blank" rel="noopener noreferrer" aria-label="Instagram">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
            </a>
            <?php endif; ?>
            <?php if ( ! empty( $soc_wa ) ) : ?>
            <a class="social-icon-btn social-wa" href="<?php echo esc_url( $soc_wa ); ?>" target="_blank" rel="noopener noreferrer" aria-label="WhatsApp">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0 0 12.04 2zm5.79 14.12c-.24.68-1.39 1.3-1.92 1.38-.49.08-1.12.11-3.23-.76-2.69-1.11-4.43-3.83-4.57-4.01-.13-.19-1.11-1.48-1.11-2.82 0-1.34.7-2 .95-2.27.24-.27.54-.34.72-.34.18 0 .36.01.52.02.17.01.4-.06.62.48.24.58.8 1.95.87 2.1.07.14.12.31.02.5-.09.19-.14.3-.28.46-.14.16-.3.35-.43.47-.14.14-.29.3-.12.59.17.29.75 1.24 1.62 2.01 1.11.99 2.05 1.3 2.34 1.44.29.14.46.12.63-.07.17-.19.73-.85.92-1.15.2-.29.39-.24.66-.14.27.1 1.72.81 2.02.96.29.15.49.22.56.34.07.13.07.74-.17 1.42z"/></svg>
            </a>
            <?php endif; ?>
            <?php if ( ! empty( $soc_tt ) ) : ?>
            <a class="social-icon-btn social-tt" href="<?php echo esc_url( $soc_tt ); ?>" target="_blank" rel="noopener noreferrer" aria-label="TikTok">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.97v7.54c-.01 2.21-.81 4.41-2.31 6.03-1.6 1.74-3.9 2.74-6.27 2.75-2.5 0-4.9-1.07-6.52-2.91-1.68-1.89-2.45-4.47-2.12-6.99.34-2.58 1.87-4.88 4.09-6.15 1.65-.95 3.58-1.33 5.48-1.09v4.11c-.99-.24-2.07-.12-2.98.34-.9.45-1.57 1.27-1.85 2.23-.29.98-.12 2.07.45 2.91.56.84 1.51 1.36 2.53 1.39 1.19.04 2.35-.55 2.99-1.55.43-.67.62-1.47.62-2.27V.02z"/></svg>
            </a>
            <?php endif; ?>
            <?php if ( ! empty( $soc_gm ) ) : ?>
            <a class="social-icon-btn social-gm" href="<?php echo esc_url( $soc_gm ); ?>" target="_blank" rel="noopener noreferrer" aria-label="Google Maps">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 0C7.58 0 4 3.58 4 8c0 5.25 7 13 8 16 1-3 8-10.75 8-16 0-4.42-3.58-8-8-8zm0 11c-1.66 0-3-1.34-3-3s1.34-3 3-3 3 1.34 3 3-1.34 3-3 3z"/></svg>
            </a>
            <?php endif; ?>
            <?php if ( ! empty( $soc_yt ) ) : ?>
            <a class="social-icon-btn social-yt" href="<?php echo esc_url( $soc_yt ); ?>" target="_blank" rel="noopener noreferrer" aria-label="YouTube">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
            </a>
            <?php endif; ?>
          </div>
        </div>
      </div>

      <div>
        <h4 class="footer-col-title"><?php echo esc_html( mp_opt( 'footer_col1_title', 'Showroom Departments' ) ); ?></h4>
        <ul class="footer-links">
          <li><a href="<?php echo is_front_page() ? '#categories' : esc_url( home_url( '/#categories' ) ); ?>">Flagship Smartphones</a></li>
          <li><a href="<?php echo is_front_page() ? '#flagship' : esc_url( home_url( '/#flagship' ) ); ?>">iPhone 16 Pro Showcase</a></li>
          <li><a href="<?php echo is_front_page() ? '#catalog' : esc_url( home_url( '/#catalog' ) ); ?>">Smartwatches &amp; Audio</a></li>
          <li><a href="<?php echo is_front_page() ? '#catalog' : esc_url( home_url( '/#catalog' ) ); ?>">GaN Fast Chargers</a></li>
          <li><a href="<?php echo esc_url( home_url( '/shop/' ) ); ?>">Full Shop Catalog</a></li>
          <li><a href="<?php echo is_front_page() ? '#categories' : esc_url( home_url( '/#categories' ) ); ?>">eSewa Banking Counter</a></li>
        </ul>
      </div>

      <div>
        <h4 class="footer-col-title"><?php echo esc_html( mp_opt( 'footer_col2_title', 'Repair Lab Services' ) ); ?></h4>
        <ul class="footer-links">
          <li><a href="<?php echo is_front_page() ? '#lab' : esc_url( home_url( '/#lab' ) ); ?>">Microscope IC Overhaul</a></li>
          <li><a href="<?php echo is_front_page() ? '#repairs' : esc_url( home_url( '/#repairs' ) ); ?>">OLED Screen Replacement</a></li>
          <li><a href="<?php echo is_front_page() ? '#repairs' : esc_url( home_url( '/#repairs' ) ); ?>">Battery BMS Micro-Welding</a></li>
          <li><a href="<?php echo is_front_page() ? '#repairs' : esc_url( home_url( '/#repairs' ) ); ?>">Ultrasonic Water Treatment</a></li>
          <li><a href="<?php echo esc_url( home_url( '/services/' ) ); ?>">Complete Services &amp; Rates</a></li>
          <li><a href="<?php echo is_front_page() ? '#workflow' : esc_url( home_url( '/#workflow' ) ); ?>">3-Step Counter Process</a></li>
        </ul>
      </div>

      <div>
        <h4 class="footer-col-title"><?php esc_html_e( 'Showroom Contact', 'mobile-pasal' ); ?></h4>
        <p style="margin:0 0 10px 0; color:#cbd9ed;"><strong>Location:</strong> <?php echo esc_html( $address ); ?></p>
        <p style="margin:0 0 10px 0; color:#cbd9ed;"><strong>Hotline:</strong> <a href="tel:+<?php echo esc_attr( $clean_p ); ?>" style="color:#ffffff;"><?php echo esc_html( $phone ); ?></a></p>
        <p style="margin:0; color:#cbd9ed;"><strong>MDMS Support:</strong> 100% Legal IMEI Registration Assistance</p>
      </div>
    </div>

    <div class="footer-bottom">
      <div><?php echo esc_html( $copyright ); ?></div>
      <div style="color: #6d84a7;">Gulariya, Bardiya, Nepal • Authorized Brand Warranty Partner</div>
    </div>
  </div>
</footer>

<!-- Floating Action Buttons -->
<div class="floating-actions" aria-label="<?php esc_attr_e( 'Quick actions', 'mobile-pasal' ); ?>">
  <button class="scroll-top-btn" id="scrollTopBtn" aria-label="<?php esc_attr_e( 'Scroll to top of page', 'mobile-pasal' ); ?>" type="button">
    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="18 15 12 9 6 15"></polyline></svg>
  </button>

  <a class="whatsapp-btn" href="<?php echo esc_url( mp_get_whatsapp_link() ); ?>" target="_blank" rel="noopener noreferrer" aria-label="<?php esc_attr_e( 'Chat with Ali Mobile Center on WhatsApp', 'mobile-pasal' ); ?>">
    <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0 0 12.04 2zm5.79 14.12c-.24.68-1.39 1.3-1.92 1.38-.49.08-1.12.11-3.23-.76-2.69-1.11-4.43-3.83-4.57-4.01-.13-.19-1.11-1.48-1.11-2.82 0-1.34.7-2 .95-2.27.24-.27.54-.34.72-.34.18 0 .36.01.52.02.17.01.4-.06.62.48.24.58.8 1.95.87 2.1.07.14.12.31.02.5-.09.19-.14.3-.28.46-.14.16-.3.35-.43.47-.14.14-.29.3-.12.59.17.29.75 1.24 1.62 2.01 1.11.99 2.05 1.3 2.34 1.44.29.14.46.12.63-.07.17-.19.73-.85.92-1.15.2-.29.39-.24.66-.14.27.1 1.72.81 2.02.96.29.15.49.22.56.34.07.13.07.74-.17 1.42z"/></svg>
  </a>
</div>

<!-- Interactive Counter Service Quote Modal -->
<div class="modal-backdrop" id="quoteModal">
  <div class="modal-box">
    <button class="modal-close-btn" onclick="closeQuoteModal()" aria-label="<?php esc_attr_e( 'Close', 'mobile-pasal' ); ?>" type="button">
      <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" aria-hidden="true"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
    </button>
    <h3 class="modal-title"><?php esc_html_e( 'Request Counter Service', 'mobile-pasal' ); ?></h3>
    <p class="modal-desc"><?php esc_html_e( 'Get an exact repair estimate or check stock status before walking into our Gulariya shop.', 'mobile-pasal' ); ?></p>
    <form class="modal-form" id="quoteForm" onsubmit="handleQuoteSubmit(event)">
      <div class="form-group">
        <label for="modalDevice"><?php esc_html_e( 'Device Model', 'mobile-pasal' ); ?></label>
        <input type="text" id="modalDevice" placeholder="<?php esc_attr_e( 'e.g., iPhone 13, Galaxy S23, Redmi Note 12', 'mobile-pasal' ); ?>" required />
      </div>
      <div class="form-group">
        <label for="modalIssue"><?php esc_html_e( 'Service or Problem', 'mobile-pasal' ); ?></label>
        <select id="modalIssue">
          <option value="Cracked Screen / OLED Replacement"><?php esc_html_e( 'Cracked Screen / OLED Replacement', 'mobile-pasal' ); ?></option>
          <option value="Battery Health & Rapid Drain"><?php esc_html_e( 'Battery Health & Rapid Drain', 'mobile-pasal' ); ?></option>
          <option value="Charging Port / Not Charging"><?php esc_html_e( 'Charging Port / Not Charging', 'mobile-pasal' ); ?></option>
          <option value="Camera Lens & Sensor Problem"><?php esc_html_e( 'Camera Lens & Sensor Problem', 'mobile-pasal' ); ?></option>
          <option value="Liquid / Water Damage Rescue"><?php esc_html_e( 'Liquid / Water Damage Rescue', 'mobile-pasal' ); ?></option>
          <option value="Motherboard Micro-Soldering"><?php esc_html_e( 'Motherboard Micro-Soldering', 'mobile-pasal' ); ?></option>
          <option value="New Sealed Phone Price Inquiry"><?php esc_html_e( 'New Sealed Phone Price Inquiry', 'mobile-pasal' ); ?></option>
        </select>
      </div>
      <div class="form-group">
        <label for="modalPhone"><?php esc_html_e( 'Your Contact Number (Nepal)', 'mobile-pasal' ); ?></label>
        <input type="tel" id="modalPhone" placeholder="98XXXXXXXX" required />
      </div>
      <button type="submit" class="whatsapp-action-btn" style="width:100%; justify-content:center; margin-top:8px;">
        <span><?php esc_html_e( 'Send Inquiry on WhatsApp', 'mobile-pasal' ); ?></span>
        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
      </button>
    </form>
  </div>
</div>

<!-- Interactive Toast Notice -->
<div class="toast-notice" id="toastNotice">
  <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"></polyline></svg>
  <span id="toastMsg"><?php esc_html_e( 'Action selected', 'mobile-pasal' ); ?></span>
</div>

<?php wp_footer(); ?>
</body>
</html>
