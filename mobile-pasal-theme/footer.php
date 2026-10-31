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
?>
</main><!-- /#top -->

<!-- Trust Guarantee Strip -->
<section class="trust-strip">
  <div class="container">
    <div class="trust-strip-grid">
      <div class="trust-box">
        <div class="trust-box-icon">🛡️</div>
        <div>
          <h4 class="trust-box-title"><?php echo esc_html( mp_opt( 'trust_box1_title', 'NTA Registered Devices' ) ); ?></h4>
          <p class="trust-box-desc"><?php echo esc_html( mp_opt( 'trust_box1_desc', '100% compliant with Nepal MDMS laws.' ) ); ?></p>
        </div>
      </div>
      <div class="trust-box">
        <div class="trust-box-icon">⚡</div>
        <div>
          <h4 class="trust-box-title"><?php echo esc_html( mp_opt( 'trust_box2_title', 'Express 45-Min Lab' ) ); ?></h4>
          <p class="trust-box-desc"><?php echo esc_html( mp_opt( 'trust_box2_desc', 'Quick turnaround with genuine spare parts.' ) ); ?></p>
        </div>
      </div>
      <div class="trust-box">
        <div class="trust-box-icon">🏷️</div>
        <div>
          <h4 class="trust-box-title"><?php echo esc_html( mp_opt( 'trust_box3_title', 'Zero Hidden Charges' ) ); ?></h4>
          <p class="trust-box-desc"><?php echo esc_html( mp_opt( 'trust_box3_desc', 'Transparent billing and authentic warranties.' ) ); ?></p>
        </div>
      </div>
      <div class="trust-box">
        <div class="trust-box-icon">📍</div>
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
          <span class="brand-mark"><span>✦</span></span>
          <span><?php echo esc_html( mp_opt( 'brand_name_line1', 'Ali Mobile' ) ); ?><br><?php echo esc_html( mp_opt( 'brand_name_line2', 'Center' ) ); ?></span>
        </div>
        <p style="color:#8fa7cb; line-height:1.6; margin:0 0 16px 0;">
          <?php echo esc_html( mp_opt( 'footer_brand_desc', 'Leading smartphone store & microscope-equipped certified repair center in Gulariya, Bardiya. Dedicated to genuine parts, NTA compliance, and honest service.' ) ); ?>
        </p>
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
    <button class="modal-close-btn" onclick="closeQuoteModal()" aria-label="<?php esc_attr_e( 'Close', 'mobile-pasal' ); ?>" type="button">✕</button>
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
        <?php esc_html_e( 'Send Inquiry on WhatsApp', 'mobile-pasal' ); ?> <span>→</span>
      </button>
    </form>
  </div>
</div>

<!-- Interactive Toast Notice -->
<div class="toast-notice" id="toastNotice">
  <span>✓</span>
  <span id="toastMsg"><?php esc_html_e( 'Action selected', 'mobile-pasal' ); ?></span>
</div>

<?php wp_footer(); ?>
</body>
</html>
