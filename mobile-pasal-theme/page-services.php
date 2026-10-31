<?php
/**
 * Template Name: Services / Apple Fix Lab
 * Description: Services page featuring repair estimator, laboratory specializations, turnaround matrix, and repair FAQs.
 *
 * @package Mobile_Pasal
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$services_title = mp_opt( 'services_hero_title', 'Premier Precision Apple Fix & Mobile Lab.' );
$services_desc  = mp_opt( 'services_hero_desc', 'Specialized component-level micro-soldering, true-tone OLED swaps, battery health calibrations, and ultrasonic water damage recovery. Honest diagnostics, transparent turnaround, and certified testing warranties right at our Gulariya counter.' );
?>

<!-- Page Hero Banner -->
<section class="page-hero-banner">
	<div class="wrap">
		<nav class="breadcrumb-nav" aria-label="<?php esc_attr_e( 'Breadcrumb', 'mobile-pasal' ); ?>">
			<a class="crumb-link" href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path></svg>
				<span><?php esc_html_e( 'Home', 'mobile-pasal' ); ?></span>
			</a>
			<span class="crumb-divider">/</span>
			<span class="crumb-active"><?php esc_html_e( 'Services', 'mobile-pasal' ); ?></span>
		</nav>
	</div>
</section>

<!-- Interactive Repair Diagnostic Console -->
<section id="repair-builder" class="repair-builder-section">
	<div class="wrap">
		<div class="sec-head sec-head-center fade-up">
			<span class="sec-kicker">
				<svg viewBox="0 0 24 24" width="14" height="14" fill="currentColor"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/></svg>
				<?php esc_html_e( 'Apple Fix Counter Diagnostic Console', 'mobile-pasal' ); ?>
			</span>
			<h2><?php esc_html_e( 'Phone Problem? Get a Direct Counter Estimate', 'mobile-pasal' ); ?></h2>
			<p><?php esc_html_e( 'Select your device and fault below. Your live repair docket is prepared in real-time. Dispatch directly to our Gulariya technician on WhatsApp for instant counter quotes.', 'mobile-pasal' ); ?></p>
		</div>

		<div class="repair-station-layout fade-up">
			<!-- Diagnostic Configuration Terminal -->
			<div class="repair-station-form">
				<!-- Step 1 -->
				<div class="repair-step-block">
					<div class="step-header">
						<span class="step-num-badge"><?php esc_html_e( 'Step 1', 'mobile-pasal' ); ?></span>
						<span class="step-title"><?php esc_html_e( 'Select Your Device', 'mobile-pasal' ); ?></span>
					</div>
					<div class="device-pills-grid" data-group="device">
						<button type="button" class="dev-pill-btn active" data-device="Apple iPhone">
							<svg viewBox="0 0 24 24" width="16" height="16" fill="currentColor"><path d="M18.71 19.5c-.83 1.24-1.71 2.45-3.05 2.47-1.34.03-1.77-.79-3.29-.79-1.53 0-2 .77-3.27.82-1.31.05-2.3-1.32-3.14-2.53C4.25 17 2.94 12.45 4.7 9.39c.87-1.52 2.43-2.48 4.12-2.51 1.28-.02 2.5.87 3.29.87.78 0 2.26-1.07 3.81-.91.65.03 2.47.26 3.64 1.98-.09.06-2.17 1.28-2.15 3.81.03 3.02 2.65 4.03 2.68 4.04-.03.07-.42 1.44-1.38 2.83M15.97 6.84c.64-.78 1.08-1.87.96-2.96-.93.04-2.05.62-2.72 1.4-.59.68-1.1 1.77-.96 2.83 1.03.08 2.08-.49 2.72-1.27z"/></svg>
							<span><?php esc_html_e( 'Apple iPhone', 'mobile-pasal' ); ?></span>
						</button>
						<button type="button" class="dev-pill-btn" data-device="Samsung Galaxy">
							<span><?php esc_html_e( 'Samsung Galaxy', 'mobile-pasal' ); ?></span>
						</button>
						<button type="button" class="dev-pill-btn" data-device="Xiaomi / Redmi">
							<span><?php esc_html_e( 'Xiaomi / Redmi', 'mobile-pasal' ); ?></span>
						</button>
						<button type="button" class="dev-pill-btn" data-device="OnePlus">
							<span><?php esc_html_e( 'OnePlus', 'mobile-pasal' ); ?></span>
						</button>
						<button type="button" class="dev-pill-btn" data-device="Google Pixel">
							<span><?php esc_html_e( 'Google Pixel', 'mobile-pasal' ); ?></span>
						</button>
						<button type="button" class="dev-pill-btn" data-device="Other Android">
							<span><?php esc_html_e( 'Other Android', 'mobile-pasal' ); ?></span>
						</button>
					</div>
				</div>

				<!-- Step 2 -->
				<div class="repair-step-block">
					<div class="step-header">
						<span class="step-num-badge"><?php esc_html_e( 'Step 2', 'mobile-pasal' ); ?></span>
						<span class="step-title"><?php esc_html_e( 'What Needs Repair?', 'mobile-pasal' ); ?></span>
						<span class="step-hint"><?php esc_html_e( '(Pick symptom)', 'mobile-pasal' ); ?></span>
					</div>
					<div class="fault-cards-grid">
						<button type="button" class="fault-select-card active" data-issue="Screen &amp; Display (Cracked glass / black spots / touch dead)" data-time="30–45 Mins" data-warranty="90 Days Testing Warranty">
							<div class="fault-card-icon">
								<svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2"><rect x="5" y="2" width="14" height="20" rx="2" ry="2"></rect><line x1="8" y1="6" x2="16" y2="6"></line><line x1="8" y1="18" x2="16" y2="18"></line></svg>
							</div>
							<div class="fault-card-info">
								<div class="fault-card-title-row">
									<strong><?php esc_html_e( 'Screen & Display', 'mobile-pasal' ); ?></strong>
									<span class="fault-time-tag"><svg viewBox="0 0 24 24" width="10" height="10" fill="currentColor"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/></svg> 30–45m</span>
								</div>
								<small><?php esc_html_e( 'Cracked glass, black spots, touch dead', 'mobile-pasal' ); ?></small>
							</div>
						</button>

						<button type="button" class="fault-select-card" data-issue="Battery Replacement (Fast drain / sudden shutdown / swollen)" data-time="20–30 Mins" data-warranty="6 Months Battery Warranty">
							<div class="fault-card-icon">
								<svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="7" width="16" height="10" rx="2" ry="2"></rect><line x1="22" y1="11" x2="22" y2="13"></line><line x1="6" y1="11" x2="6" y2="13"></line><line x1="10" y1="11" x2="10" y2="13"></line></svg>
							</div>
							<div class="fault-card-info">
								<div class="fault-card-title-row">
									<strong><?php esc_html_e( 'Battery Replacement', 'mobile-pasal' ); ?></strong>
									<span class="fault-time-tag"><svg viewBox="0 0 24 24" width="10" height="10" fill="currentColor"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/></svg> 20–30m</span>
								</div>
								<small><?php esc_html_e( 'Fast drain, sudden shutdown, swollen', 'mobile-pasal' ); ?></small>
							</div>
						</button>

						<button type="button" class="fault-select-card" data-issue="Charging &amp; Port (Slow charging / loose port / cable angle)" data-time="30 Mins" data-warranty="30 Days Service Warranty">
							<div class="fault-card-icon">
								<svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"></path></svg>
							</div>
							<div class="fault-card-info">
								<div class="fault-card-title-row">
									<strong><?php esc_html_e( 'Charging & Port', 'mobile-pasal' ); ?></strong>
									<span class="fault-time-tag"><svg viewBox="0 0 24 24" width="10" height="10" fill="currentColor"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/></svg> 30m</span>
								</div>
								<small><?php esc_html_e( 'Slow charging, loose port, cable angle', 'mobile-pasal' ); ?></small>
							</div>
						</button>

						<button type="button" class="fault-select-card" data-issue="Water Damage (Dropped in water / ultrasonic clean / IC)" data-time="1–2 Hours" data-warranty="Component Warranty">
							<div class="fault-card-icon">
								<svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2.69l5.66 5.66a8 8 0 1 1-11.31 0z"></path></svg>
							</div>
							<div class="fault-card-info">
								<div class="fault-card-title-row">
									<strong><?php esc_html_e( 'Water Damage', 'mobile-pasal' ); ?></strong>
									<span class="fault-time-tag"><svg viewBox="0 0 24 24" width="10" height="10" fill="currentColor"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/></svg> 1–2h</span>
								</div>
								<small><?php esc_html_e( 'Dropped in water, ultrasonic clean, IC', 'mobile-pasal' ); ?></small>
							</div>
						</button>

						<button type="button" class="fault-select-card" data-issue="Camera &amp; Sound (Mic not working / speaker muffled / camera)" data-time="45 Mins" data-warranty="60 Days Testing Warranty">
							<div class="fault-card-icon">
								<svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg>
							</div>
							<div class="fault-card-info">
								<div class="fault-card-title-row">
									<strong><?php esc_html_e( 'Camera & Sound', 'mobile-pasal' ); ?></strong>
									<span class="fault-time-tag"><svg viewBox="0 0 24 24" width="10" height="10" fill="currentColor"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/></svg> 45m</span>
								</div>
								<small><?php esc_html_e( 'Mic not working, speaker muffled, camera', 'mobile-pasal' ); ?></small>
							</div>
						</button>

						<button type="button" class="fault-select-card" data-issue="Software &amp; OS (Apple logo stuck / bootloop / data transfer)" data-time="30–60 Mins" data-warranty="OS Stability Assured">
							<div class="fault-card-icon">
								<svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
							</div>
							<div class="fault-card-info">
								<div class="fault-card-title-row">
									<strong><?php esc_html_e( 'Software & OS', 'mobile-pasal' ); ?></strong>
									<span class="fault-time-tag"><svg viewBox="0 0 24 24" width="10" height="10" fill="currentColor"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/></svg> 30–60m</span>
								</div>
								<small><?php esc_html_e( 'Apple logo stuck, bootloop, data transfer', 'mobile-pasal' ); ?></small>
							</div>
						</button>
					</div>
				</div>

				<!-- Step 3 -->
				<div class="repair-step-block">
					<div class="step-header">
						<span class="step-num-badge"><?php esc_html_e( 'Step 3', 'mobile-pasal' ); ?></span>
						<span class="step-title"><?php esc_html_e( 'Specify Phone Model', 'mobile-pasal' ); ?></span>
						<span class="step-hint"><?php esc_html_e( '(e.g. iPhone 15 Pro, Galaxy A54, Redmi Note 13)', 'mobile-pasal' ); ?></span>
					</div>
					<div class="model-input-wrap">
						<input type="text" id="builder-model-input" class="model-text-field" placeholder="<?php esc_attr_e( 'Type your phone model name here...', 'mobile-pasal' ); ?>" autocomplete="off">
					</div>
					<div class="quick-model-chips">
						<span class="quick-chips-label"><?php esc_html_e( 'Quick select:', 'mobile-pasal' ); ?></span>
						<button type="button" class="quick-chip-btn" data-model="iPhone 15 Pro">iPhone 15 Pro</button>
						<button type="button" class="quick-chip-btn" data-model="iPhone 13">iPhone 13</button>
						<button type="button" class="quick-chip-btn" data-model="Galaxy S24">Galaxy S24</button>
						<button type="button" class="quick-chip-btn" data-model="Redmi Note 13">Redmi Note 13</button>
					</div>
				</div>
			</div>

			<!-- Live Ticket Docket -->
			<div class="repair-station-ticket">
				<div class="ticket-docket-card">
					<div class="docket-top-bar">
						<div class="docket-id-badge">
							<span class="docket-dot"></span>
							<span><?php esc_html_e( 'DOCKET #AF-2026', 'mobile-pasal' ); ?></span>
						</div>
						<span class="docket-station-tag"><?php esc_html_e( 'Gulariya Counter', 'mobile-pasal' ); ?></span>
					</div>

					<div class="ticket-header">
						<h3><?php esc_html_e( 'Gulariya Counter Estimate', 'mobile-pasal' ); ?></h3>
						<p class="ticket-subtext"><?php esc_html_e( 'Live enquiry docket ready for counter handover', 'mobile-pasal' ); ?></p>
					</div>

					<div class="ticket-body">
						<div class="ticket-row">
							<span class="t-label"><?php esc_html_e( 'Device Brand', 'mobile-pasal' ); ?></span>
							<strong id="ticket-device-val" class="t-val"><?php esc_html_e( 'Apple iPhone', 'mobile-pasal' ); ?></strong>
						</div>
						<div class="ticket-row">
							<span class="t-label"><?php esc_html_e( 'Model Name', 'mobile-pasal' ); ?></span>
							<strong id="ticket-model-val" class="t-val"><?php esc_html_e( 'Specified at Counter', 'mobile-pasal' ); ?></strong>
						</div>
						<div class="ticket-row">
							<span class="t-label"><?php esc_html_e( 'Selected Fault', 'mobile-pasal' ); ?></span>
							<strong id="ticket-fault-val" class="t-val"><?php esc_html_e( 'Screen & Display', 'mobile-pasal' ); ?></strong>
						</div>
						<div class="ticket-row">
							<span class="t-label"><?php esc_html_e( 'Est. Turnaround', 'mobile-pasal' ); ?></span>
							<span id="ticket-time-val" class="t-badge-highlight">30–45 Mins</span>
						</div>
						<div class="ticket-row">
							<span class="t-label"><?php esc_html_e( 'Parts Grade', 'mobile-pasal' ); ?></span>
							<span class="t-val-text"><?php esc_html_e( '100% Original-Grade / Certified', 'mobile-pasal' ); ?></span>
						</div>
						<div class="ticket-row">
							<span class="t-label"><?php esc_html_e( 'Counter Warranty', 'mobile-pasal' ); ?></span>
							<span id="ticket-warranty-val" class="t-val-text">90 Days Testing Warranty</span>
						</div>
						<div class="ticket-row">
							<span class="t-label"><?php esc_html_e( 'Counter Diagnosis', 'mobile-pasal' ); ?></span>
							<span class="t-badge-free"><?php esc_html_e( 'FREE Walk-In Check', 'mobile-pasal' ); ?></span>
						</div>
					</div>

					<div class="ticket-preview-box">
						<div class="tp-label">
							<svg viewBox="0 0 24 24" width="13" height="13" fill="currentColor"><path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0 0 12.04 2"/></svg>
							<span><?php esc_html_e( 'Prepared WhatsApp Dispatch Message:', 'mobile-pasal' ); ?></span>
						</div>
						<div id="builder-preview-text" class="tp-text">"Namaste Ali Mobile &amp; Apple Fix, mero iPhone ma problem chha: Screen Broken / Touch Fault. Gulariya counter ma check ra repair cost barema jankari dinus."</div>
					</div>

					<div class="ticket-actions">
						<a id="builder-send-whatsapp-btn" class="btn btn-whatsapp btn-block" href="<?php echo esc_url( mp_get_whatsapp_link() ); ?>" target="_blank" rel="noopener">
							<svg viewBox="0 0 24 24" width="18" height="18" fill="currentColor"><path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0 0 12.04 2m.01 1.67c2.2 0 4.26.86 5.82 2.42a8.225 8.225 0 0 1 2.41 5.83c0 4.54-3.7 8.24-8.24 8.24-1.48 0-2.93-.4-4.2-1.15l-.3-.18-3.12.82.83-3.04-.2-.31a8.196 8.196 0 0 1-1.26-4.38c0-4.54 3.7-8.24 8.24-8.24m4.52 11.66c-.25-.13-1.47-.72-1.7-.81-.23-.08-.39-.13-.56.13-.17.25-.64.81-.79.97-.14.17-.29.19-.54.06-.25-.13-1.05-.39-2-1.23-.74-.66-1.24-1.47-1.39-1.72-.14-.25-.02-.39.11-.51.11-.11.25-.29.37-.43.13-.14.17-.25.25-.41.08-.17.04-.31-.02-.44-.06-.13-.56-1.34-.76-1.84-.2-.49-.4-.42-.56-.43h-.47c-.17 0-.44.06-.67.31-.23.25-.87.85-.87 2.08 0 1.23.9 2.41 1.02 2.58.13.17 1.76 2.69 4.27 3.77.6.26 1.07.41 1.43.53.6.19 1.15.16 1.58.1.48-.07 1.47-.6 1.68-1.18.21-.58.21-1.07.15-1.18-.06-.11-.23-.17-.48-.29z"/></svg>
							<span><?php esc_html_e( 'Dispatch Enquiry to WhatsApp', 'mobile-pasal' ); ?></span>
						</a>
						<a class="btn btn-secondary btn-block" href="tel:+<?php echo esc_attr( mp_clean_phone( mp_opt( 'contact_phone', '9804530786' ) ) ); ?>">
							<svg viewBox="0 0 24 24" width="16" height="16" fill="currentColor"><path d="M20.01 15.38c-1.23 0-2.42-.2-3.53-.56a.977.977 0 0 0-1.01.24l-1.57 1.97c-2.83-1.35-5.48-3.9-6.89-6.83l1.95-1.66c.27-.28.35-.67.24-1.02-.37-1.11-.56-2.3-.56-3.53 0-.54-.45-.99-.99-.99H4.19C3.65 3 3 3.24 3 3.99 3 13.28 10.73 21 20.01 21c.71 0 .99-.63.99-1.18v-3.45c0-.54-.45-.99-.99-.99z"/></svg>
							<span><?php printf( esc_html__( 'Call Technician Directly (%s)', 'mobile-pasal' ), esc_html( mp_opt( 'contact_phone', '+977 9804530786' ) ) ); ?></span>
						</a>
					</div>

					<div class="ticket-footer-note">
						<svg viewBox="0 0 24 24" width="14" height="14" fill="currentColor"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5a2.5 2.5 0 0 1 0-5 2.5 2.5 0 0 1 0 5z"/></svg>
						<span><?php esc_html_e( 'Gulariya Counter • Walk in anytime 9 AM – 8 PM', 'mobile-pasal' ); ?></span>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- In-Depth Lab Capabilities Section -->
<section class="services-section">
	<div class="wrap">
		<div class="sec-head sec-head-center fade-up">
			<span class="sec-kicker"><?php esc_html_e( 'Lab Bench Specialties', 'mobile-pasal' ); ?></span>
			<h2><?php esc_html_e( 'Component-Level Engineering & Certified Repairs', 'mobile-pasal' ); ?></h2>
			<p><?php esc_html_e( 'We don\'t outsource to other cities. Every repair is performed on-site at our Gulariya workstation with specialized calibration tools.', 'mobile-pasal' ); ?></p>
		</div>

		<div class="services-grid fade-up">
			<div class="service-card">
				<div class="service-icon-wrap">
					<svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><rect x="5" y="2" width="14" height="20" rx="2" ry="2"></rect><line x1="12" y1="18" x2="12.01" y2="18"></line></svg>
				</div>
				<h3><?php esc_html_e( 'OLED & Display Restoration', 'mobile-pasal' ); ?></h3>
				<p><?php esc_html_e( 'Super Retina XDR & Dynamic AMOLED display replacements with original True Tone serial transfer and high-precision water-resistant sealant adhesive replacement.', 'mobile-pasal' ); ?></p>
				<span class="service-badge">30–45 Mins &bull; Original Grade</span>
			</div>

			<div class="service-card">
				<div class="service-icon-wrap">
					<svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><rect x="1" y="6" width="18" height="12" rx="2"></rect><line x1="23" y1="11" x2="23" y2="13"></line></svg>
				</div>
				<h3><?php esc_html_e( 'Battery Calibration & BMS Swap', 'mobile-pasal' ); ?></h3>
				<p><?php esc_html_e( 'Fresh 0-cycle OEM grade batteries with battery health monitoring, zero "Important Battery Message" error codes, and certified thermal tape installation.', 'mobile-pasal' ); ?></p>
				<span class="service-badge">20–30 Mins &bull; 6 Mo. Warranty</span>
			</div>

			<div class="service-card">
				<div class="service-icon-wrap">
					<svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
				</div>
				<h3><?php esc_html_e( 'Logic Board Micro-Soldering', 'mobile-pasal' ); ?></h3>
				<p><?php esc_html_e( 'Component-level diagnosis under stereo microscope. Repairing U2 Tristar charging ICs, shorted capacitors, backlight diode lines, and audio IC faults.', 'mobile-pasal' ); ?></p>
				<span class="service-badge">Same-Day / 24h &bull; IC Lab</span>
			</div>

			<div class="service-card">
				<div class="service-icon-wrap">
					<svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2.69l5.66 5.66a8 8 0 1 1-11.31 0z"></path></svg>
				</div>
				<h3><?php esc_html_e( 'Ultrasonic Water Damage Bath', 'mobile-pasal' ); ?></h3>
				<p><?php esc_html_e( 'Immediate digital chemical cleaning to dissolve moisture oxidation, rust, and salt corrosion. Restores dead circuit traces and saves vital photos & contacts.', 'mobile-pasal' ); ?></p>
				<span class="service-badge">2–4 Hours &bull; Ultrasonic</span>
			</div>

			<div class="service-card">
				<div class="service-icon-wrap">
					<svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>
				</div>
				<h3><?php esc_html_e( 'Port & Charging Module Rework', 'mobile-pasal' ); ?></h3>
				<p><?php esc_html_e( 'Fixing loose lightning or USB-C connectors, micro-soldering bent contacts, removing broken cable tips, and repairing fast-charging power delivery circuits.', 'mobile-pasal' ); ?></p>
				<span class="service-badge">25–35 Mins &bull; Tested Port</span>
			</div>

			<div class="service-card">
				<div class="service-icon-wrap">
					<svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
				</div>
				<h3><?php esc_html_e( 'OS Recovery & Safe Data Migration', 'mobile-pasal' ); ?></h3>
				<p><?php esc_html_e( 'Unbricking phones stuck on Apple logo bootloop, fixing error 4013/9, NAND flash health checks, and cross-platform Android to iPhone data transfers.', 'mobile-pasal' ); ?></p>
				<span class="service-badge">30–60 Mins &bull; 100% Private</span>
			</div>
		</div>
	</div>
</section>

<!-- Pricing & Turnaround Matrix -->
<section class="pricing-table-section" id="pricing">
	<div class="wrap">
		<div class="sec-head sec-head-center fade-up">
			<span class="sec-kicker"><?php esc_html_e( 'Transparent Counter Rates', 'mobile-pasal' ); ?></span>
			<h2><?php esc_html_e( 'Diagnostic & Repair Turnaround Matrix', 'mobile-pasal' ); ?></h2>
			<p><?php esc_html_e( 'No hidden diagnostic charges. Check turnaround times and indicative rates before handing over your handset.', 'mobile-pasal' ); ?></p>
		</div>

		<div class="table-scroll-hint">
			<svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
			<span><?php esc_html_e( 'Swipe horizontally to view full rate card & warranty', 'mobile-pasal' ); ?></span>
		</div>

		<div class="pricing-table-wrapper fade-up">
			<table class="pricing-table">
				<thead>
					<tr>
						<th><?php esc_html_e( 'Service Category', 'mobile-pasal' ); ?></th>
						<th><?php esc_html_e( 'Compatible Handsets', 'mobile-pasal' ); ?></th>
						<th><?php esc_html_e( 'Est. Turnaround', 'mobile-pasal' ); ?></th>
						<th><?php esc_html_e( 'Warranty Coverage', 'mobile-pasal' ); ?></th>
						<th><?php esc_html_e( 'Indicative Rate', 'mobile-pasal' ); ?></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>
							<div class="pricing-fault-cell">
								<div class="pricing-fault-icon">
									<svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2"><rect x="5" y="2" width="14" height="20" rx="2" ry="2"></rect><line x1="12" y1="18" x2="12.01" y2="18"></line></svg>
								</div>
								<span><?php esc_html_e( 'OLED / Display Replacement', 'mobile-pasal' ); ?></span>
							</div>
						</td>
						<td>iPhone 7 to 16 Pro Max, Samsung Galaxy A & S Series, Redmi, OnePlus</td>
						<td>30–45 Mins</td>
						<td><span class="badge-pill">90 Days Warranty</span></td>
						<td><strong>Rs. 1,800 – Flagship OLEDs</strong></td>
					</tr>
					<tr>
						<td>
							<div class="pricing-fault-cell">
								<div class="pricing-fault-icon">
									<svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2"><rect x="1" y="6" width="18" height="12" rx="2"></rect><line x1="23" y1="11" x2="23" y2="13"></line></svg>
								</div>
								<span><?php esc_html_e( 'Battery Replacement & Health', 'mobile-pasal' ); ?></span>
							</div>
						</td>
						<td>All Apple iPhones, Samsung, Xiaomi, Pixel, OnePlus devices</td>
						<td>20–30 Mins</td>
						<td><span class="badge-pill">6 Months Warranty</span></td>
						<td><strong>Rs. 1,400 – Rs. 6,500</strong></td>
					</tr>
					<tr>
						<td>
							<div class="pricing-fault-cell">
								<div class="pricing-fault-icon">
									<svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>
								</div>
								<span><?php esc_html_e( 'Charging Port & Dock Ribbon', 'mobile-pasal' ); ?></span>
							</div>
						</td>
						<td>Lightning Port, Type-C High-Speed, Micro-USB sub-boards</td>
						<td>25–35 Mins</td>
						<td><span class="badge-pill">90 Days Warranty</span></td>
						<td><strong>Rs. 800 – Rs. 3,200</strong></td>
					</tr>
					<tr>
						<td>
							<div class="pricing-fault-cell">
								<div class="pricing-fault-icon">
									<svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2.69l5.66 5.66a8 8 0 1 1-11.31 0z"></path></svg>
								</div>
								<span><?php esc_html_e( 'Ultrasonic Water Ingress Bath', 'mobile-pasal' ); ?></span>
							</div>
						</td>
						<td>All smartphones, feature phones, smartwatches & AirPods</td>
						<td>2–4 Hours</td>
						<td><span class="badge-pill">Tested on Bench</span></td>
						<td><strong>Rs. 950 + Parts if needed</strong></td>
					</tr>
					<tr>
						<td>
							<div class="pricing-fault-cell">
								<div class="pricing-fault-icon">
									<svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
								</div>
								<span><?php esc_html_e( 'Micro-Soldering & Logic IC', 'mobile-pasal' ); ?></span>
							</div>
						</td>
						<td>iPhone U2, Power IC, Audio IC, short-circuit diode lines</td>
						<td>Same-Day / 24h</td>
						<td><span class="badge-pill">90 Days Warranty</span></td>
						<td><strong>Rs. 2,500 – Rs. 8,000</strong></td>
					</tr>
					<tr>
						<td>
							<div class="pricing-fault-cell">
								<div class="pricing-fault-icon">
									<svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
								</div>
								<span><?php esc_html_e( 'Initial Bench Diagnostics', 'mobile-pasal' ); ?></span>
							</div>
						</td>
						<td>All mobile devices, regardless of brand or condition</td>
						<td>5–10 Mins</td>
						<td><span class="badge-pill">Zero Obligation</span></td>
						<td><strong class="text-success">100% FREE</strong></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</section>

<!-- 4-Step Counter Workflow -->
<section class="repair-steps-section">
	<div class="wrap">
		<div class="sec-head sec-head-center fade-up">
			<span class="sec-kicker"><?php esc_html_e( 'Simple & Transparent', 'mobile-pasal' ); ?></span>
			<h2><?php esc_html_e( 'How Our Gulariya Repair Counter Works', 'mobile-pasal' ); ?></h2>
			<p><?php esc_html_e( 'No long delays or unverified handovers. We explain every step transparently before taking apart your phone.', 'mobile-pasal' ); ?></p>
		</div>

		<div class="steps-flow-grid fade-up">
			<div class="flow-step-card">
				<div class="flow-step-num">01</div>
				<h3><?php esc_html_e( 'Free Counter Check', 'mobile-pasal' ); ?></h3>
				<p><?php esc_html_e( 'Walk in anytime. Our technician examines your phone on our diagnostic bench, testing charging draw, voltage, and display response in under 5 minutes.', 'mobile-pasal' ); ?></p>
			</div>

			<div class="flow-step-card">
				<div class="flow-step-num">02</div>
				<h3><?php esc_html_e( 'Upfront Cost & Time', 'mobile-pasal' ); ?></h3>
				<p><?php esc_html_e( 'We give you an exact price and completion estimate. Work only proceeds once you confirm the quotation—zero hidden charges or surprise extras.', 'mobile-pasal' ); ?></p>
			</div>

			<div class="flow-step-card">
				<div class="flow-step-num">03</div>
				<h3><?php esc_html_e( 'Cleanroom Bench Repair', 'mobile-pasal' ); ?></h3>
				<p><?php esc_html_e( 'Performed with ESD grounding mats, calibrated heating plates, and stereomicroscopes. Your internal data and photos remain 100% untouched and confidential.', 'mobile-pasal' ); ?></p>
			</div>

			<div class="flow-step-card">
				<div class="flow-step-num">04</div>
				<h3><?php esc_html_e( 'Tested Handover & Bill', 'mobile-pasal' ); ?></h3>
				<p><?php esc_html_e( 'We run a 30-point hardware checklist together at the counter before you pay. You receive an official warranty bill covering parts and workmanship.', 'mobile-pasal' ); ?></p>
			</div>
		</div>
	</div>
</section>

<!-- Repair FAQ Accordion -->
<section class="faq-section" id="faq">
	<div class="wrap">
		<div class="sec-head sec-head-center fade-up">
			<span class="sec-kicker"><?php esc_html_e( 'Frequently Asked Questions', 'mobile-pasal' ); ?></span>
			<h2><?php esc_html_e( 'Everything You Need to Know About Our Lab', 'mobile-pasal' ); ?></h2>
			<p><?php esc_html_e( 'Common questions regarding data privacy, warranty conditions, genuine parts, and turnaround times.', 'mobile-pasal' ); ?></p>
		</div>

		<div class="faq-grid fade-up">
			<div class="faq-item active">
				<button type="button" class="faq-question-btn" aria-expanded="true">
					<span><?php esc_html_e( 'Will my phone data (photos, contacts, apps) be erased during repair?', 'mobile-pasal' ); ?></span>
					<span class="faq-toggle-icon">
						<svg viewBox="0 0 24 24" width="16" height="16" fill="currentColor"><path d="M7.41 8.59L12 13.17l4.59-4.58L18 10l-6 6-6-6 1.41-1.41z"/></svg>
					</span>
				</button>
				<div class="faq-answer-panel">
					<p><?php esc_html_e( 'No. For standard hardware repairs like screen replacement, battery swap, charging port rework, and camera module replacements, your data remains completely intact and untouched. We never format your phone unless you specifically request an OS reset or firmware reinstall.', 'mobile-pasal' ); ?></p>
				</div>
			</div>

			<div class="faq-item">
				<button type="button" class="faq-question-btn" aria-expanded="false">
					<span><?php esc_html_e( 'How long does a screen or battery replacement take?', 'mobile-pasal' ); ?></span>
					<span class="faq-toggle-icon">
						<svg viewBox="0 0 24 24" width="16" height="16" fill="currentColor"><path d="M7.41 8.59L12 13.17l4.59-4.58L18 10l-6 6-6-6 1.41-1.41z"/></svg>
					</span>
				</button>
				<div class="faq-answer-panel">
					<p><?php esc_html_e( 'For most iPhone models and popular Samsung / Xiaomi phones, screen and battery swaps take only 20 to 45 minutes. You can relax at our counter while our technician completes the repair in front of you.', 'mobile-pasal' ); ?></p>
				</div>
			</div>

			<div class="faq-item">
				<button type="button" class="faq-question-btn" aria-expanded="false">
					<span><?php esc_html_e( 'Do you provide warranty on replaced parts?', 'mobile-pasal' ); ?></span>
					<span class="faq-toggle-icon">
						<svg viewBox="0 0 24 24" width="16" height="16" fill="currentColor"><path d="M7.41 8.59L12 13.17l4.59-4.58L18 10l-6 6-6-6 1.41-1.41z"/></svg>
					</span>
				</button>
				<div class="faq-answer-panel">
					<p><?php esc_html_e( 'Yes. We offer up to 90 days counter warranty on display assemblies and micro-soldering, and up to 6 months replacement warranty on OEM batteries. If any manufacturing defect occurs during the warranty period, we fix or replace it free of charge.', 'mobile-pasal' ); ?></p>
				</div>
			</div>

			<div class="faq-item">
				<button type="button" class="faq-question-btn" aria-expanded="false">
					<span><?php esc_html_e( 'What should I do if my phone falls in water?', 'mobile-pasal' ); ?></span>
					<span class="faq-toggle-icon">
						<svg viewBox="0 0 24 24" width="16" height="16" fill="currentColor"><path d="M7.41 8.59L12 13.17l4.59-4.58L18 10l-6 6-6-6 1.41-1.41z"/></svg>
					</span>
				</button>
				<div class="faq-answer-panel">
					<p><?php esc_html_e( 'Power it OFF immediately! Do NOT connect it to a charger, and do not put it in uncooked rice (rice dust clogs ports and accelerates internal short circuits). Bring it directly to our Gulariya counter for an immediate ultrasonic chemical bath to prevent motherboard trace oxidation.', 'mobile-pasal' ); ?></p>
				</div>
			</div>

			<div class="faq-item">
				<button type="button" class="faq-question-btn" aria-expanded="false">
					<span><?php esc_html_e( 'Do I need an appointment or can I walk in directly?', 'mobile-pasal' ); ?></span>
					<span class="faq-toggle-icon">
						<svg viewBox="0 0 24 24" width="16" height="16" fill="currentColor"><path d="M7.41 8.59L12 13.17l4.59-4.58L18 10l-6 6-6-6 1.41-1.41z"/></svg>
					</span>
				</button>
				<div class="faq-answer-panel">
					<p><?php esc_html_e( 'Walk-ins are always welcome anytime between 9:00 AM and 8:00 PM every day! If you prefer, you can also send us a message on WhatsApp beforehand so we can ensure the exact model parts are pre-allocated at the bench.', 'mobile-pasal' ); ?></p>
				</div>
			</div>
		</div>
	</div>
</section>

<?php
get_footer();
