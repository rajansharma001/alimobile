<?php
/**
 * The footer template for Mobile Pasal
 *
 * @package Mobile_Pasal
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$phone     = mp_opt( 'contact_phone', '+977 9804530786' );
$clean_p   = mp_clean_phone( $phone );
$address   = mp_opt( 'contact_address', 'Ji. Pra. Ka. Chowk, Gulariya-06, Bardiya' );
$copyright = mp_opt( 'footer_copyright', '© 2026 Ali Mobile Center & Apple Fix, Gulariya-06, Bardiya. All rights reserved.' );
$alert_h   = mp_opt( 'footer_alert_title', 'Fresh Stock Alerts on WhatsApp' );
$alert_p   = mp_opt( 'footer_alert_desc', 'New sealed handsets and limited accessory shipments land at our counter every week. Receive direct WhatsApp updates without any spam.' );
?>
	<!-- Footer -->
	<footer class="site-footer">
		<div class="wrap">
			<div class="footer-grid">
				<!-- Col 1: Brand Info -->
				<div class="footer-brand-col">
					<?php
					$custom_logo_url = mp_opt( 'logo_image', '' );
					if ( ! empty( $custom_logo_url ) ) :
						?>
						<img src="<?php echo esc_url( $custom_logo_url ); ?>" alt="<?php bloginfo( 'name' ); ?>" class="footer-logo-img">
					<?php else : ?>
						<img src="<?php echo esc_url( MP_THEME_URI . '/assets/images/logo-full.png' ); ?>" alt="<?php bloginfo( 'name' ); ?>" class="footer-logo-img">
					<?php endif; ?>

					<p><?php echo esc_html( mp_opt( 'footer_brand_desc', "Your premier showroom for the newest smartphones, 100% genuine accessories, and Gulariya's dedicated Apple Fix precision repair laboratory." ) ); ?></p>

					<div class="footer-social-links">
						<a class="social-circle-btn" href="<?php echo esc_url( mp_get_whatsapp_link() ); ?>" target="_blank" rel="noopener" title="<?php esc_attr_e( 'WhatsApp Counter', 'mobile-pasal' ); ?>">
							<svg viewBox="0 0 24 24" width="18" height="18" fill="currentColor"><path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0 0 12.04 2"/></svg>
						</a>
						<a class="social-circle-btn" href="tel:+<?php echo esc_attr( $clean_p ); ?>" title="<?php esc_attr_e( 'Call Store', 'mobile-pasal' ); ?>">
							<svg viewBox="0 0 24 24" width="18" height="18" fill="currentColor"><path d="M20.01 15.38c-1.23 0-2.42-.2-3.53-.56a.977.977 0 0 0-1.01.24l-1.57 1.97c-2.83-1.35-5.48-3.9-6.89-6.83l1.95-1.66c.27-.28.35-.67.24-1.02-.37-1.11-.56-2.3-.56-3.53 0-.54-.45-.99-.99-.99H4.19C3.65 3 3 3.24 3 3.99 3 13.28 10.73 21 20.01 21c.71 0 .99-.63.99-1.18v-3.45c0-.54-.45-.99-.99-.99z"/></svg>
						</a>
						<a class="social-circle-btn" href="<?php echo esc_url( mp_opt( 'google_maps_link', 'https://www.google.com/maps/search/?api=1&query=Ali+Mobile+Center+Gulariya+Bardiya' ) ); ?>" target="_blank" rel="noopener" title="<?php esc_attr_e( 'Google Maps', 'mobile-pasal' ); ?>">
							<svg viewBox="0 0 24 24" width="18" height="18" fill="currentColor"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5a2.5 2.5 0 0 1 0-5 2.5 2.5 0 0 1 0 5z"/></svg>
						</a>
					</div>
				</div>

				<!-- Col 2: Showroom Links -->
				<div>
					<h4 class="footer-heading"><?php echo esc_html( mp_opt( 'footer_col1_title', 'Showroom & Shop' ) ); ?></h4>
					<ul class="footer-links-list">
						<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'mobile-pasal' ); ?></a></li>
						<li><a href="<?php echo esc_url( home_url( '/shop/' ) ); ?>"><?php esc_html_e( 'Smartphones Catalog', 'mobile-pasal' ); ?></a></li>
						<li><a href="<?php echo esc_url( home_url( '/shop/#accessories' ) ); ?>"><?php esc_html_e( 'Genuine Accessories', 'mobile-pasal' ); ?></a></li>
						<li><a href="<?php echo esc_url( home_url( '/services/' ) ); ?>"><?php esc_html_e( 'Apple Fix & Lab Services', 'mobile-pasal' ); ?></a></li>
						<li><a href="<?php echo esc_url( home_url( '/about/' ) ); ?>"><?php esc_html_e( 'About Ali Mobile', 'mobile-pasal' ); ?></a></li>
						<li><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Store Location & Directions', 'mobile-pasal' ); ?></a></li>
					</ul>
				</div>

				<!-- Col 3: Support Links -->
				<div>
					<h4 class="footer-heading"><?php echo esc_html( mp_opt( 'footer_col2_title', 'Services & Support' ) ); ?></h4>
					<ul class="footer-links-list">
						<li><a href="tel:+<?php echo esc_attr( $clean_p ); ?>"><?php printf( esc_html__( 'Counter Helpline: %s', 'mobile-pasal' ), esc_html( $phone ) ); ?></a></li>
						<li><a href="<?php echo esc_url( home_url( '/services/#pricing' ) ); ?>"><?php esc_html_e( 'Turnaround & Pricing Matrix', 'mobile-pasal' ); ?></a></li>
						<li><a href="<?php echo esc_url( home_url( '/services/#faq' ) ); ?>"><?php esc_html_e( 'Repair FAQ & Warranty', 'mobile-pasal' ); ?></a></li>
						<li><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Book Lab Diagnostic', 'mobile-pasal' ); ?></a></li>
						<li><a href="<?php echo esc_url( mp_get_whatsapp_link( 'Namaste, eSewa merchant top-up barema bujhna chahanchhu.' ) ); ?>" target="_blank" rel="noopener"><?php esc_html_e( 'eSewa Merchant Top-Up', 'mobile-pasal' ); ?></a></li>
						<li><a href="<?php echo esc_url( mp_get_whatsapp_link( 'Namaste, mero repair status check garidinus.' ) ); ?>" target="_blank" rel="noopener"><?php esc_html_e( 'Track Repair Status', 'mobile-pasal' ); ?></a></li>
					</ul>
				</div>

				<!-- Col 4: Fresh Stock Card -->
				<div>
					<div class="footer-alert-card">
						<h4><?php echo esc_html( $alert_h ); ?></h4>
						<p><?php echo esc_html( $alert_p ); ?></p>
						<a class="btn btn-whatsapp btn-block" href="<?php echo esc_url( mp_get_whatsapp_link( 'Namaste Ali Mobile, malai naya stock ko alert dinus.' ) ); ?>" target="_blank" rel="noopener">
							<svg viewBox="0 0 24 24" width="16" height="16" fill="currentColor"><path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0 0 12.04 2"/></svg>
							<span><?php esc_html_e( 'Subscribe on WhatsApp', 'mobile-pasal' ); ?></span>
						</a>
					</div>
				</div>
			</div>

			<div class="footer-bottom-bar">
				<span><?php echo esc_html( $copyright ); ?></span>
				<span><?php echo esc_html( $address ); ?> &bull; <?php esc_html_e( 'Authentic Handsets & Precision Counter Repair', 'mobile-pasal' ); ?></span>
			</div>
		</div>
	</footer>

	<!-- Sticky Mobile Bottom Quick Navigation -->
	<?php if ( mp_opt( 'mobile_bar_enabled', 1 ) ) : ?>
	<nav class="mobile-bottom-bar" aria-label="<?php esc_attr_e( 'Mobile Quick Contacts', 'mobile-pasal' ); ?>">
		<a class="mb-item-btn" href="tel:+<?php echo esc_attr( $clean_p ); ?>">
			<svg viewBox="0 0 24 24" width="20" height="20" fill="currentColor"><path d="M20.01 15.38c-1.23 0-2.42-.2-3.53-.56a.977.977 0 0 0-1.01.24l-1.57 1.97c-2.83-1.35-5.48-3.9-6.89-6.83l1.95-1.66c.27-.28.35-.67.24-1.02-.37-1.11-.56-2.3-.56-3.53 0-.54-.45-.99-.99-.99H4.19C3.65 3 3 3.24 3 3.99 3 13.28 10.73 21 20.01 21c.71 0 .99-.63.99-1.18v-3.45c0-.54-.45-.99-.99-.99z"/></svg>
			<span><?php echo esc_html( mp_opt( 'mobile_btn1_label', 'Call' ) ); ?></span>
		</a>
		<a class="mb-item-btn btn-mb-wa" href="<?php echo esc_url( mp_get_whatsapp_link() ); ?>" target="_blank" rel="noopener">
			<svg viewBox="0 0 24 24" width="20" height="20" fill="currentColor"><path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0 0 12.04 2m.01 1.67c2.2 0 4.26.86 5.82 2.42a8.225 8.225 0 0 1 2.41 5.83c0 4.54-3.7 8.24-8.24 8.24-1.48 0-2.93-.4-4.2-1.15l-.3-.18-3.12.82.83-3.04-.2-.31a8.196 8.196 0 0 1-1.26-4.38c0-4.54 3.7-8.24 8.24-8.24m4.52 11.66c-.25-.13-1.47-.72-1.7-.81-.23-.08-.39-.13-.56.13-.17.25-.64.81-.79.97-.14.17-.29.19-.54.06-.25-.13-1.05-.39-2-1.23-.74-.66-1.24-1.47-1.39-1.72-.14-.25-.02-.39.11-.51.11-.11.25-.29.37-.43.13-.14.17-.25.25-.41.08-.17.04-.31-.02-.44-.06-.13-.56-1.34-.76-1.84-.2-.49-.4-.42-.56-.43h-.47c-.17 0-.44.06-.67.31-.23.25-.87.85-.87 2.08 0 1.23.9 2.41 1.02 2.58.13.17 1.76 2.69 4.27 3.77.6.26 1.07.41 1.43.53.6.19 1.15.16 1.58.1.48-.07 1.47-.6 1.68-1.18.21-.58.21-1.07.15-1.18-.06-.11-.23-.17-.48-.29z"/></svg>
			<span><?php echo esc_html( mp_opt( 'mobile_btn4_label', 'WhatsApp' ) ); ?></span>
		</a>
		<a class="mb-item-btn" href="<?php echo esc_url( home_url( '/services/' ) ); ?>">
			<svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"></path></svg>
			<span><?php echo esc_html( mp_opt( 'mobile_btn2_label', 'Services' ) ); ?></span>
		</a>
		<a class="mb-item-btn" href="<?php echo esc_url( home_url( '/shop/' ) ); ?>">
			<svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2"><rect x="5" y="2" width="14" height="20" rx="2" ry="2"></rect><line x1="12" y1="18" x2="12.01" y2="18"></line></svg>
			<span><?php echo esc_html( mp_opt( 'mobile_btn3_label', 'Shop' ) ); ?></span>
		</a>
		<a class="mb-item-btn" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">
			<svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2"><polygon points="3 11 22 2 13 21 11 13 3 11"></polygon></svg>
			<span><?php esc_html_e( 'Contact', 'mobile-pasal' ); ?></span>
		</a>
	</nav>
	<?php endif; ?>

	<!-- Back to Top Button -->
	<button id="back-to-top-btn" class="back-to-top-btn" aria-label="<?php esc_attr_e( 'Back to Top', 'mobile-pasal' ); ?>" title="<?php esc_attr_e( 'Back to top', 'mobile-pasal' ); ?>" type="button">
		<svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="18 15 12 9 6 15"></polyline></svg>
	</button>

	<!-- Floating Direct WhatsApp Chat Widget -->
	<?php if ( mp_opt( 'floating_wa_enabled', 1 ) ) : ?>
	<div class="floating-whatsapp-widget">
		<!-- WhatsApp Chat Popup Drawer -->
		<div id="whatsapp-chat-popup" class="whatsapp-chat-popup">
			<div class="chat-popup-header">
				<div class="chat-popup-profile">
					<img src="<?php echo esc_url( MP_THEME_URI . '/assets/images/logo-icon.png' ); ?>" alt="<?php bloginfo( 'name' ); ?>">
					<div>
						<strong><?php echo esc_html( mp_opt( 'whatsapp_widget_name', 'Ali Mobile Specialist' ) ); ?></strong>
						<small><?php echo esc_html( mp_opt( 'whatsapp_widget_status', 'Online • Ready to Help' ) ); ?></small>
					</div>
				</div>
				<button id="chat-popup-close-btn" class="chat-popup-close-btn" title="<?php esc_attr_e( 'Close Chat', 'mobile-pasal' ); ?>" aria-label="<?php esc_attr_e( 'Close Chat', 'mobile-pasal' ); ?>" type="button">
					<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
				</button>
			</div>
			<div class="chat-popup-body">
				<div class="chat-speech-bubble">
					<?php echo esc_html( mp_opt( 'whatsapp_widget_greeting', 'Namaste! Welcome to Ali Mobile Center & Apple Fix. How can we help you today with handsets or repairs?' ) ); ?>
				</div>
				<div class="chat-quick-actions">
					<button type="button" class="chat-quick-btn" data-msg="Namaste, malai phone ko aaja ko price ra stock jankari chahiyo.">
						<?php echo esc_html( mp_opt( 'whatsapp_chip1_text', "Today's iPhone 16 Price" ) ); ?>
					</button>
					<button type="button" class="chat-quick-btn" data-msg="Namaste, mero iPhone / mobile ma problem chha, repair barema sodhna chahanchhu.">
						<?php echo esc_html( mp_opt( 'whatsapp_chip2_text', 'Screen Repair Estimate' ) ); ?>
					</button>
					<button type="button" class="chat-quick-btn" data-msg="Namaste, AirPods / Charger / Accessories ko stock chha ki chhaina?">
						<?php echo esc_html( mp_opt( 'whatsapp_chip3_text', 'AirPods / MagSafe Stock' ) ); ?>
					</button>
					<button type="button" class="chat-quick-btn" data-msg="Namaste, tapaiharuko Gulariya shop ko exact location kahan chha?">
						<?php echo esc_html( mp_opt( 'whatsapp_chip4_text', 'Counter Location & Hours' ) ); ?>
					</button>
				</div>
			</div>
			<div class="chat-popup-footer">
				<input type="text" id="chat-custom-input" class="chat-popup-input" placeholder="<?php esc_attr_e( 'Type your question...', 'mobile-pasal' ); ?>" autocomplete="off">
				<button type="button" id="chat-custom-send-btn" class="chat-popup-send-btn" title="<?php esc_attr_e( 'Send WhatsApp', 'mobile-pasal' ); ?>" aria-label="<?php esc_attr_e( 'Send WhatsApp message', 'mobile-pasal' ); ?>">
					<svg viewBox="0 0 24 24" width="18" height="18" fill="currentColor"><polygon points="2 21 23 12 2 3 2 10 17 12 2 14 2 21"></polygon></svg>
				</button>
			</div>
		</div>

		<!-- Floating Trigger Button -->
		<button id="floating-whatsapp-btn" class="floating-whatsapp-btn" aria-label="<?php esc_attr_e( 'Open Direct WhatsApp Chat', 'mobile-pasal' ); ?>" title="<?php esc_attr_e( 'Chat on WhatsApp', 'mobile-pasal' ); ?>" type="button">
			<span class="wa-online-pulse"></span>
			<svg viewBox="0 0 24 24" width="28" height="28" fill="currentColor"><path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0 0 12.04 2m.01 1.67c2.2 0 4.26.86 5.82 2.42a8.225 8.225 0 0 1 2.41 5.83c0 4.54-3.7 8.24-8.24 8.24-1.48 0-2.93-.4-4.2-1.15l-.3-.18-3.12.82.83-3.04-.2-.31a8.196 8.196 0 0 1-1.26-4.38c0-4.54 3.7-8.24 8.24-8.24m4.52 11.66c-.25-.13-1.47-.72-1.7-.81-.23-.08-.39-.13-.56.13-.17.25-.64.81-.79.97-.14.17-.29.19-.54.06-.25-.13-1.05-.39-2-1.23-.74-.66-1.24-1.47-1.39-1.72-.14-.25-.02-.39.11-.51.11-.11.25-.29.37-.43.13-.14.17-.25.25-.41.08-.17.04-.31-.02-.44-.06-.13-.56-1.34-.76-1.84-.2-.49-.4-.42-.56-.43h-.47c-.17 0-.44.06-.67.31-.23.25-.87.85-.87 2.08 0 1.23.9 2.41 1.02 2.58.13.17 1.76 2.69 4.27 3.77.6.26 1.07.41 1.43.53.6.19 1.15.16 1.58.1.48-.07 1.47-.6 1.68-1.18.21-.58.21-1.07.15-1.18-.06-.11-.23-.17-.48-.29z"/></svg>
		</button>
	</div>
	<?php endif; ?>

	<?php wp_footer(); ?>
</body>
</html>
