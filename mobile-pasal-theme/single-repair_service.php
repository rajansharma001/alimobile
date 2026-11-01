<?php
/**
 * Single Repair Service Template - Apple Fix Cleanroom Lab Showcase
 *
 * Full bento-architecture service detail page with unified meta keys,
 * 3-step micro-surgical workflow, instant online repair docket booking,
 * and embedded live repair & 90-day warranty tracker.
 *
 * @package MobilePasal
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$phone_number = mp_opt( 'contact_phone', mp_opt( 'store_phone', '+977 9804530786' ) );
$phone_raw    = preg_replace( '/[^0-9]/', '', $phone_number );
$wa_number    = mp_opt( 'whatsapp_number', '9779804530786' );
$address      = mp_opt( 'contact_address', 'Ji. Pra. Ka. Chowk, Gulariya-06, Bardiya' );

while ( have_posts() ) :
	the_post();
	$post_id    = get_the_ID();
	$icon_key   = get_post_meta( $post_id, '_mp_service_icon', true ) ?: 'screen';
	$turnaround = get_post_meta( $post_id, '_mp_service_turnaround', true ) ?: ( get_post_meta( $post_id, '_mp_turnaround', true ) ?: '45–60 Minutes' );
	$warranty   = get_post_meta( $post_id, '_mp_service_warranty', true ) ?: ( get_post_meta( $post_id, '_mp_warranty', true ) ?: '90-Day Lab Replacement Warranty' );
	$price_est  = get_post_meta( $post_id, '_mp_service_price', true ) ?: ( get_post_meta( $post_id, '_mp_price_est', true ) ?: 'Free Diagnostic Check' );
	$badge      = get_post_meta( $post_id, '_mp_service_badge', true ) ?: 'Apple Fix Cleanroom Lab';
	$symptoms   = get_post_meta( $post_id, '_mp_service_symptoms', true ) ?: get_post_meta( $post_id, '_mp_symptoms', true );
	$models     = get_post_meta( $post_id, '_mp_service_models', true ) ?: ( get_post_meta( $post_id, '_mp_models', true ) ?: 'iPhone 11 – 16 Pro Max, Samsung Galaxy S/A Series, Redmi, OnePlus, Vivo & Realme' );

	$wa_msg = sprintf(
		'Namaste Ali Mobile, ma tapaiharuko %s (%s) service barema bujhna chahanchhu. Mero phone ma yo problem chha, estimate ra time confirm gardinus na.',
		get_the_title(),
		$price_est
	);
	$wa_url = 'https://wa.me/' . esc_attr( $wa_number ) . '?text=' . rawurlencode( $wa_msg );

	$symptom_list = ! empty( $symptoms )
		? array_filter( array_map( 'trim', preg_split( '/[\r\n,]+/', (string) $symptoms ) ) )
		: array(
			__( 'Cracked outer glass, dead pixels, green/white OLED lines, or unresponsive touch digitizer', 'mobile-pasal' ),
			__( 'Sudden battery drops, overheating during charging, or swollen lithium-ion cell', 'mobile-pasal' ),
			__( 'Liquid ingress corrosion, short-circuit boot loops, or charging IC failure', 'mobile-pasal' ),
			__( 'TrueTone, FaceID, or biometric calibration required after component swap', 'mobile-pasal' ),
		);

	$model_pills = array_filter( array_map( 'trim', explode( ',', (string) $models ) ) );
	?>

<div id="primary" class="site-main">

	<!-- 1. Page Hero Banner: Breadcrumbs, Title & Pure Graphics -->
	<section class="page-hero-banner" aria-label="<?php esc_attr_e( 'Service Docket Header', 'mobile-pasal' ); ?>">
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
						<a class="crumb-link" href="<?php echo esc_url( home_url( '/services/' ) ); ?>"><?php esc_html_e( 'Repair Lab Services', 'mobile-pasal' ); ?></a>
						<span class="crumb-divider">/</span>
						<span class="crumb-active"><?php the_title(); ?></span>
					</nav>
					<h1 class="page-hero-title"><?php the_title(); ?></h1>
				</div>
				<?php mp_render_page_hero_graphic(); ?>
			</div>
		</div>
	</section>

	<!-- 2. Cleanroom Service Bento Showcase -->
	<section class="section-wrap" style="padding: 36px 0 60px;">
		<div class="tech-bg-grid" aria-hidden="true"></div>
		<div class="tech-ring-accent tech-ring-right" aria-hidden="true"></div>

		<div class="container">
			<div class="flagship-bento-hero">

				<!-- Top Status Bar -->
				<div class="flagship-header-bar">
					<div class="flagship-pill-left">
						<svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" aria-hidden="true"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"></path></svg>
						<span><?php echo esc_html( $badge ); ?> &bull; <?php esc_html_e( 'Stereo Microscope ESD Bench', 'mobile-pasal' ); ?></span>
					</div>
				</div>

				<div class="single-handset-bento-grid">

					<!-- Left Column: Service Overview, Symptoms & 3-Step Lab Procedure -->
					<div class="flagship-core-column">
						<h2 class="flagship-title-hero" style="font-size: clamp(26px, 3vw, 38px);"><?php the_title(); ?></h2>
						<div class="flagship-tagline-chip">
							<?php echo esc_html( $turnaround . ' • ' . $warranty ); ?>
						</div>

						<!-- Pricing & Turnaround Pod -->
						<div class="product-price-hub" style="margin-bottom: 24px;">
							<div class="product-price-row" style="align-items: baseline; gap: 14px; flex-wrap: wrap;">
								<span class="product-selling-price" style="font-size: clamp(26px, 3.2vw, 36px); color: var(--blue); font-weight: 900;"><?php echo esc_html( $price_est ); ?></span>
								<span class="product-savings-badge" style="background:#ecfdf5; color:#047857; border-color:#a7f3d0;">
									<svg viewBox="0 0 24 24" width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
									<?php echo esc_html( $warranty ); ?>
								</span>
							</div>
							<div class="product-price-meta">
								<svg viewBox="0 0 24 24" width="13" height="13" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
								<span><?php esc_html_e( 'Rs. 0 Counter Diagnostic Check • 100% Data Privacy Guaranteed', 'mobile-pasal' ); ?></span>
							</div>
						</div>

						<!-- Editorial Content / Description -->
						<div class="handset-description-card" style="padding: 20px 22px; margin-bottom: 22px;">
							<?php
							$raw_content = get_the_content();
							if ( ! empty( trim( $raw_content ) ) ) {
								the_content();
							} else {
								?>
								<p style="margin:0; font-size:14.5px; line-height:1.7; color:var(--muted);">
									<?php printf( esc_html__( 'Performed inside our anti-static cleanroom laboratory at Ji. Pra. Ka. Chowk, Gulariya. Every %s procedure uses genuine-grade replacement parts, precision thermal stations, and full post-repair calibration.', 'mobile-pasal' ), esc_html( get_the_title() ) ); ?>
								</p>
								<?php
							}
							?>
						</div>

						<!-- Common Symptoms Checklist -->
						<div class="spec-bento-card" style="margin-bottom: 22px;">
							<div class="spec-bento-card-header">
								<div class="spec-bento-card-icon">
									<svg viewBox="0 0 24 24" width="15" height="15" fill="none" stroke="currentColor" stroke-width="2.3"><polyline points="20 6 9 17 4 12"></polyline></svg>
								</div>
								<span class="spec-bento-card-title"><?php esc_html_e( 'Common Fault Symptoms Treated at Our Bench', 'mobile-pasal' ); ?></span>
							</div>
							<div class="spec-bento-card-body" style="padding: 16px 20px;">
								<ul style="list-style:none; margin:0; padding:0; display:grid; gap:10px;">
									<?php foreach ( $symptom_list as $sym_item ) : ?>
										<li style="display:flex; align-items:flex-start; gap:10px; font-size:13.8px; color:var(--navy); font-weight:600;">
											<span style="width:20px; height:20px; border-radius:50%; background:#eff6ff; color:var(--blue); display:inline-flex; align-items:center; justify-content:center; flex-shrink:0; font-size:11px; margin-top:1px;">✓</span>
											<span><?php echo esc_html( $sym_item ); ?></span>
										</li>
									<?php endforeach; ?>
								</ul>
							</div>
						</div>

						<!-- Supported Devices Pills -->
						<?php if ( ! empty( $model_pills ) ) : ?>
							<div class="product-inbox-dock" style="width: 100%; margin-bottom: 22px;">
								<div class="product-inbox-title">
									<svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.2"><rect x="5" y="2" width="14" height="20" rx="2"></rect><line x1="12" y1="18" x2="12.01" y2="18"></line></svg>
									<span><?php esc_html_e( 'Supported Smartphone Series & Models', 'mobile-pasal' ); ?></span>
								</div>
								<div class="product-inbox-tags">
									<?php foreach ( $model_pills as $mp_pill ) : ?>
										<span class="product-inbox-tag"><?php echo esc_html( $mp_pill ); ?></span>
									<?php endforeach; ?>
								</div>
							</div>
						<?php endif; ?>

						<!-- Direct WhatsApp & Call Actions -->
						<div class="flagship-action-row">
							<a class="btn-flagship-wa" href="<?php echo esc_url( $wa_url ); ?>" target="_blank" rel="noopener noreferrer">
								<svg viewBox="0 0 24 24" width="18" height="18" fill="currentColor" aria-hidden="true"><path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0 0 12.04 2z"/></svg>
								<span><?php esc_html_e( 'WhatsApp Lab Technician', 'mobile-pasal' ); ?></span>
								<span class="btn-arrow">&rarr;</span>
							</a>
							<a class="btn-flagship-call" href="tel:+<?php echo esc_attr( $phone_raw ); ?>">
								<svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
								<span><?php printf( esc_html__( 'Call Lab: %s', 'mobile-pasal' ), esc_html( $phone_number ) ); ?></span>
							</a>
						</div>
					</div>

					<!-- Right Column: Instant Repair Docket Booking Console -->
					<div class="flagship-stage-column">
						<div class="stage-pedestal-card" style="align-items: stretch; text-align: left; padding: 28px 26px;">
							<div style="display:flex; align-items:center; justify-content:space-between; gap:10px; margin-bottom:14px;">
								<span class="eyebrow" style="margin:0;"><?php esc_html_e( 'INSTANT REPAIR BOOKING', 'mobile-pasal' ); ?></span>
								<span style="font-size:11.5px; font-weight:800; color:#059669; background:#ecfdf5; border:1px solid #a7f3d0; padding:4px 10px; border-radius:999px;"><?php esc_html_e( 'Generates Docket ID', 'mobile-pasal' ); ?></span>
							</div>
							<h3 style="margin:0 0 6px; font-size:20px; font-weight:900; color:var(--navy);"><?php esc_html_e( 'Book Counter Diagnostic Docket', 'mobile-pasal' ); ?></h3>
							<p style="margin:0 0 18px; font-size:13px; color:var(--muted); line-height:1.55;"><?php esc_html_e( 'Reserve priority bench time before walking in. You will receive an instant #AF-2026 Docket ID to track your repair.', 'mobile-pasal' ); ?></p>

							<form id="mpSingleServiceBookForm" style="display:grid; gap:13px;">
								<div>
									<label for="ssCustName" style="display:block; font-size:12px; font-weight:800; color:var(--navy); margin-bottom:5px;"><?php esc_html_e( 'Your Full Name *', 'mobile-pasal' ); ?></label>
									<input type="text" id="ssCustName" required placeholder="e.g. Ramesh Thapa" style="width:100%; height:42px; padding:0 13px; border:1px solid #cbd5e1; border-radius:10px; font-size:13.5px;" />
								</div>
								<div>
									<label for="ssCustPhone" style="display:block; font-size:12px; font-weight:800; color:var(--navy); margin-bottom:5px;"><?php esc_html_e( 'Mobile / WhatsApp Number *', 'mobile-pasal' ); ?></label>
									<input type="tel" id="ssCustPhone" required placeholder="98XXXXXXXX" style="width:100%; height:42px; padding:0 13px; border:1px solid #cbd5e1; border-radius:10px; font-size:13.5px;" />
								</div>
								<div>
									<label for="ssDeviceModel" style="display:block; font-size:12px; font-weight:800; color:var(--navy); margin-bottom:5px;"><?php esc_html_e( 'Smartphone Brand & Model *', 'mobile-pasal' ); ?></label>
									<input type="text" id="ssDeviceModel" required placeholder="e.g. iPhone 14 Pro Max / Galaxy S23" style="width:100%; height:42px; padding:0 13px; border:1px solid #cbd5e1; border-radius:10px; font-size:13.5px;" />
								</div>
								<div>
									<label for="ssFaultNotes" style="display:block; font-size:12px; font-weight:800; color:var(--navy); margin-bottom:5px;"><?php esc_html_e( 'Fault Details (Optional)', 'mobile-pasal' ); ?></label>
									<textarea id="ssFaultNotes" rows="2" placeholder="<?php esc_attr_e( 'Describe what happened (e.g. dropped on road, touch working)...', 'mobile-pasal' ); ?>" style="width:100%; padding:9px 13px; border:1px solid #cbd5e1; border-radius:10px; font-size:13.5px;"></textarea>
								</div>
								<button type="submit" id="ssBookSubmitBtn" class="btn-flagship-wa" style="width:100%; justify-content:center; border:none; cursor:pointer; height:46px;">
									<span><?php esc_html_e( 'Generate Repair Docket & Book Now', 'mobile-pasal' ); ?></span>
									<span class="btn-arrow">&rarr;</span>
								</button>
							</form>

							<div id="ssBookResultBox" style="display:none; margin-top:14px; padding:14px; border-radius:12px; background:#ecfdf5; border:1px solid #a7f3d0; color:#065f46; font-size:13px;"></div>

							<!-- 3-Step Lab Guarantee Mini-Timeline -->
							<div style="margin-top:20px; padding-top:16px; border-top:1px dashed #dbe6f5; display:grid; gap:8px; font-size:12px; color:#475569;">
								<div><strong>01. Microscope Check:</strong> <?php esc_html_e( 'Free 10-min board & component test.', 'mobile-pasal' ); ?></div>
								<div><strong>02. Cleanroom Fix:</strong> <?php echo esc_html( $turnaround ); ?> <?php esc_html_e( 'turnaround across the counter.', 'mobile-pasal' ); ?></div>
								<div><strong>03. Warranty Seal:</strong> <?php echo esc_html( $warranty ); ?> <?php esc_html_e( 'with QR receipt.', 'mobile-pasal' ); ?></div>
							</div>
						</div>
					</div>

				</div>

			</div>
		</div>
	</section>

	<script>
	(function(){
		var form = document.getElementById('mpSingleServiceBookForm');
		if (!form) return;
		form.addEventListener('submit', function(e){
			e.preventDefault();
			var btn = document.getElementById('ssBookSubmitBtn');
			var resBox = document.getElementById('ssBookResultBox');
			var name = document.getElementById('ssCustName').value.trim();
			var phone = document.getElementById('ssCustPhone').value.trim();
			var model = document.getElementById('ssDeviceModel').value.trim();
			var notes = document.getElementById('ssFaultNotes').value.trim();
			var serviceName = <?php echo wp_json_encode( get_the_title() ); ?>;
			var estRate = <?php echo wp_json_encode( $price_est ); ?>;

			if (!name || !phone || !model) return;
			btn.disabled = true;
			btn.style.opacity = '0.7';

			var fd = new FormData();
			fd.append('action', 'mp_submit_inquiry');
			fd.append('nonce', (window.mpAjax && window.mpAjax.nonce) ? window.mpAjax.nonce : '');
			fd.append('inquiry_type', 'repair_docket');
			fd.append('customer_name', name);
			fd.append('customer_phone', phone);
			fd.append('device_brand', model);
			fd.append('device_model', model);
			fd.append('fault_type', serviceName);
			fd.append('estimated_cost', estRate);
			fd.append('message', notes || ('Booked via ' + serviceName + ' page'));

			var ajaxUrl = (window.mpAjax && window.mpAjax.ajaxurl) ? window.mpAjax.ajaxurl : '/wp-admin/admin-ajax.php';
			fetch(ajaxUrl, { method: 'POST', body: fd })
				.then(function(r){ return r.json(); })
				.then(function(res){
					btn.disabled = false;
					btn.style.opacity = '1';
					if (res && res.success && res.data) {
						var docket = res.data.docket_id || 'AF-2026';
						resBox.style.display = 'block';
						resBox.innerHTML = '<strong>✓ Docket #' + docket + ' Created!</strong><br>Save your Docket ID to track live repair status & 90-day warranty below.';
						form.reset();
						var trInput = document.getElementById('mpTrackerInput');
						if (trInput) {
							trInput.value = docket;
						}
					}
				})
				.catch(function(){
					btn.disabled = false;
					btn.style.opacity = '1';
				});
		});
	})();
	</script>

	<!-- 3. Live Repair Status & 90-Day Warranty Tracker -->
	<section id="repair-tracker" class="section-wrap" style="padding: 10px 0 60px;">
		<div class="container">
			<?php echo do_shortcode( '[mp_repair_tracker]' ); ?>
		</div>
	</section>

</div>

	<?php
endwhile;

get_footer();
