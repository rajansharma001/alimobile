<?php
/**
 * Template Name: About / Counter Heritage
 * Description: About page showcasing store history, verified statistics, cleanroom tooling standards, and commitments.
 *
 * @package Mobile_Pasal
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$about_title = mp_opt( 'about_hero_title', 'A Decade of Honest Tech Care in Gulariya.' );
$about_desc  = mp_opt( 'about_hero_desc', 'Built from the ground up to solve a simple problem: mobile users in Bardiya deserved honest diagnostic transparency, authentic replacement parts, and direct component-level repair without sending phones to distant cities.' );
$stat1_val   = mp_opt( 'about_stat1_num', '10+' );
$stat1_lbl   = mp_opt( 'about_stat1_label', 'Years Serving Gulariya & Bardiya' );
$stat2_val   = mp_opt( 'about_stat2_num', '15,000+' );
$stat2_lbl   = mp_opt( 'about_stat2_label', 'Successful Handset Restorations' );
$stat3_val   = mp_opt( 'about_stat3_num', '100%' );
$stat3_lbl   = mp_opt( 'about_stat3_label', 'NTA & Original Component Standard' );
$stat4_val   = mp_opt( 'about_stat4_num', '90 Days' );
$stat4_lbl   = mp_opt( 'about_stat4_label', 'Standard Testing Warranty on Repairs' );
?>

<!-- Page Hero Banner -->
<section class="page-hero-banner">
	<div class="wrap">
		<div class="page-hero-grid fade-up in-view">
			<!-- Left: Hero Text Column -->
			<div class="page-hero-content">
				<nav class="breadcrumb-nav" aria-label="<?php esc_attr_e( 'Breadcrumb', 'mobile-pasal' ); ?>">
					<a class="crumb-link" href="<?php echo esc_url( home_url( '/' ) ); ?>">
						<svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path></svg>
						<span><?php esc_html_e( 'Home', 'mobile-pasal' ); ?></span>
					</a>
					<span class="crumb-divider">/</span>
					<span class="crumb-active"><?php esc_html_e( 'About', 'mobile-pasal' ); ?></span>
				</nav>

				<h1 class="page-hero-title"><?php echo esc_html( $about_title ); ?></h1>
				<p class="page-hero-desc"><?php echo esc_html( $about_desc ); ?></p>

				<div class="page-hero-actions">
					<a class="btn btn-primary btn-lg" href="<?php echo esc_url( home_url( '/services/' ) ); ?>">
						<span><?php esc_html_e( 'View Lab Bench Services', 'mobile-pasal' ); ?></span>
						<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.4"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
					</a>
					<a class="btn btn-whatsapp btn-lg" href="<?php echo esc_url( mp_get_whatsapp_link() ); ?>" target="_blank" rel="noopener">
						<svg viewBox="0 0 24 24" width="16" height="16" fill="currentColor"><path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0 0 12.04 2m.01 1.67c2.2 0 4.26.86 5.82 2.42a8.225 8.225 0 0 1 2.41 5.83c0 4.54-3.7 8.24-8.24 8.24-1.48 0-2.93-.4-4.2-1.15l-.3-.18-3.12.82.83-3.04-.2-.31a8.196 8.196 0 0 1-1.26-4.38c0-4.54 3.7-8.24 8.24-8.24m4.52 11.66c-.25-.13-1.47-.72-1.7-.81-.23-.08-.39-.13-.56.13-.17.25-.64.81-.79.97-.14.17-.29.19-.54.06-.25-.13-1.05-.39-2-1.23-.74-.66-1.24-1.47-1.39-1.72-.14-.25-.02-.39.11-.51.11-.11.25-.29.37-.43.13-.14.17-.25.25-.41.08-.17.04-.31-.02-.44-.06-.13-.56-1.34-.76-1.84-.2-.49-.4-.42-.56-.43h-.47c-.17 0-.44.06-.67.31-.23.25-.87.85-.87 2.08 0 1.23.9 2.41 1.02 2.58.13.17 1.76 2.69 4.27 3.77.6.26 1.07.41 1.43.53.6.19 1.15.16 1.58.1.48-.07 1.47-.6 1.68-1.18.21-.58.21-1.07.15-1.18-.06-.11-.23-.17-.48-.29z"/></svg>
						<span><?php esc_html_e( 'Connect on WhatsApp', 'mobile-pasal' ); ?></span>
					</a>
				</div>
			</div>

			<!-- Right: Spotlight Card -->
			<div class="page-hero-spotlight">
				<div class="hero-spotlight-card">
					<div class="spotlight-top-bar">
						<div class="spotlight-title-row">
							<span class="spotlight-badge"><?php esc_html_e( 'Heritage & Trust', 'mobile-pasal' ); ?></span>
						</div>
						<small style="color: var(--text-muted); font-weight: 700;"><?php esc_html_e( 'Since 2014', 'mobile-pasal' ); ?></small>
					</div>

					<div class="spotlight-metric-list">
						<div class="spotlight-metric-item">
							<span>
								<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
								<?php esc_html_e( 'Operational Heritage', 'mobile-pasal' ); ?>
							</span>
							<strong><?php esc_html_e( '10+ Years in Bardiya', 'mobile-pasal' ); ?></strong>
						</div>
						<div class="spotlight-metric-item">
							<span>
								<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg>
								<?php esc_html_e( 'Restored Handsets', 'mobile-pasal' ); ?>
							</span>
							<strong><?php esc_html_e( '15,000+ Devices', 'mobile-pasal' ); ?></strong>
						</div>
						<div class="spotlight-metric-item">
							<span>
								<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
								<?php esc_html_e( 'Data Privacy Policy', 'mobile-pasal' ); ?>
							</span>
							<strong><?php esc_html_e( '100% Confidential', 'mobile-pasal' ); ?></strong>
						</div>
						<div class="spotlight-metric-item">
							<span>
								<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
								<?php esc_html_e( 'Central Location', 'mobile-pasal' ); ?>
							</span>
							<strong><?php esc_html_e( 'Ji. Pra. Ka. Chowk', 'mobile-pasal' ); ?></strong>
						</div>
					</div>

					<a class="btn btn-outline btn-sm btn-block" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">
						<span><?php esc_html_e( 'View Exact Chowk Counter Map • Gulariya-06', 'mobile-pasal' ); ?></span>
					</a>
				</div>
			</div>
		</div>

		<!-- Micro-Ribbon -->
		<div class="page-hero-ribbon fade-up">
			<div class="hero-ribbon-item">
				<svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
				<span><?php esc_html_e( 'Cleanroom Bench Tooling', 'mobile-pasal' ); ?></span>
			</div>
			<div class="hero-ribbon-item">
				<svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
				<span><?php esc_html_e( 'On-the-Spot Diagnostics', 'mobile-pasal' ); ?></span>
			</div>
			<div class="hero-ribbon-item">
				<svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.2"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path></svg>
				<span><?php esc_html_e( 'Certified OEM-Grade Parts', 'mobile-pasal' ); ?></span>
			</div>
			<div class="hero-ribbon-item">
				<svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"></path></svg>
				<span><?php esc_html_e( '90-Day Testing Warranty', 'mobile-pasal' ); ?></span>
			</div>
		</div>
	</div>
</section>

<!-- Our Story & Stats Dock -->
<section class="about-story-section">
	<div class="wrap">
		<div class="about-story-grid fade-up">
			<!-- Story Content -->
			<div class="about-story-content">
				<span class="sec-kicker"><?php esc_html_e( 'Our Heritage', 'mobile-pasal' ); ?></span>
				<h2><?php esc_html_e( 'Built on Precision, Honesty & Local Trust', 'mobile-pasal' ); ?></h2>
				<p style="color: var(--text-body); font-size: 1.02rem; line-height: 1.7; margin-bottom: 16px;">
					<?php printf( esc_html__( 'Located centrally at %1$s, Ali Mobile Center & Apple Fix started as a focused electronics repair bench over a decade ago. As smartphones transformed into modern pocket computers holding people’s livelihoods, banking, and precious memories, we invested heavily into specialized micro-soldering equipment, cleanroom work surfaces, and genuine manufacturer supply channels.', 'mobile-pasal' ), '<strong>Ji. Pra. Ka. Chowk, Gulariya</strong>' ); ?>
				</p>
				<p style="color: var(--text-muted); font-size: 0.95rem; line-height: 1.65; margin-bottom: 24px;">
					<?php esc_html_e( 'Today, we operate Bardiya\'s premier dedicated Apple Fix laboratory alongside our official smartphone showroom. We take pride in diagnosing problems right in front of you, quoting fair prices before taking apart a device, and safeguarding customer privacy above all else.', 'mobile-pasal' ); ?>
				</p>

				<!-- Stats Dock -->
				<div class="about-stats-dock">
					<div class="stat-dock-item">
						<strong><?php echo esc_html( $stat1_val ); ?></strong>
						<span><?php echo esc_html( $stat1_lbl ); ?></span>
					</div>
					<div class="stat-dock-item">
						<strong><?php echo esc_html( $stat2_val ); ?></strong>
						<span><?php echo esc_html( $stat2_lbl ); ?></span>
					</div>
					<div class="stat-dock-item">
						<strong><?php echo esc_html( $stat3_val ); ?></strong>
						<span><?php echo esc_html( $stat3_lbl ); ?></span>
					</div>
					<div class="stat-dock-item">
						<strong><?php echo esc_html( $stat4_val ); ?></strong>
						<span><?php echo esc_html( $stat4_lbl ); ?></span>
					</div>
				</div>
			</div>

			<!-- Framed Workbench Media -->
			<div class="about-media-frame">
				<img src="<?php echo esc_url( MP_THEME_URI . '/assets/images/apple-fix-bench.jpg' ); ?>" alt="<?php esc_attr_e( 'Ali Mobile Apple Fix Workbench in Gulariya', 'mobile-pasal' ); ?>">
				<div class="about-image-overlay-card">
					<div class="ai-badge-icon">
						<svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"></path></svg>
					</div>
					<div>
						<strong><?php esc_html_e( 'Precision Apple Fix Bench', 'mobile-pasal' ); ?></strong>
						<small><?php esc_html_e( 'Gulariya-06, Ji. Pra. Ka. Chowk • Walk-In Lab', 'mobile-pasal' ); ?></small>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Inside Our Workbench (Cleanroom Tooling) -->
<section class="lab-standards-section">
	<div class="wrap">
		<div class="sec-head sec-head-center fade-up">
			<span class="sec-kicker"><?php esc_html_e( 'Cleanroom Tooling', 'mobile-pasal' ); ?></span>
			<h2><?php esc_html_e( 'Professional Hardware Equipment on Our Bench', 'mobile-pasal' ); ?></h2>
			<p><?php esc_html_e( 'We invest in industrial-grade diagnostic equipment so your premium smartphone is treated with laboratory care.', 'mobile-pasal' ); ?></p>
		</div>

		<div class="services-grid fade-up">
			<div class="service-card">
				<div class="service-icon-wrap">
					<svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
				</div>
				<h3><?php esc_html_e( 'Stereo Optical Microscope', 'mobile-pasal' ); ?></h3>
				<p><?php esc_html_e( '45x continuous zoom trinocular microscope for precision inspection of 0201 SMD resistors, broken circuit jumper wires, and logic board BGA pads.', 'mobile-pasal' ); ?></p>
			</div>

			<div class="service-card">
				<div class="service-icon-wrap">
					<svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2.69l5.66 5.66a8 8 0 1 1-11.31 0z"></path></svg>
				</div>
				<h3><?php esc_html_e( 'Digital Ultrasonic Sonicator', 'mobile-pasal' ); ?></h3>
				<p><?php esc_html_e( 'Multi-frequency heated ultrasonic chemical bath specifically designed to dislodge liquid oxidation and electrolytic crystals from water-damaged logic boards.', 'mobile-pasal' ); ?></p>
			</div>

			<div class="service-card">
				<div class="service-icon-wrap">
					<svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>
				</div>
				<h3><?php esc_html_e( 'Programmable Rework & Micro-Pencil', 'mobile-pasal' ); ?></h3>
				<p><?php esc_html_e( 'Micro-soldering station with rapid temperature recovery, anti-static ESD earthing, and custom nozzles to protect adjacent motherboard IC components.', 'mobile-pasal' ); ?></p>
			</div>
		</div>
	</div>
</section>

<!-- 4 Core Commitments -->
<section class="commitments-section">
	<div class="wrap">
		<div class="sec-head sec-head-center fade-up">
			<span class="sec-kicker"><?php esc_html_e( 'Integrity First', 'mobile-pasal' ); ?></span>
			<h2><?php esc_html_e( 'Our 4 Core Counter Commitments', 'mobile-pasal' ); ?></h2>
			<p><?php esc_html_e( 'How we do business every day at Ji. Pra. Ka. Chowk.', 'mobile-pasal' ); ?></p>
		</div>

		<div class="steps-flow-grid fade-up">
			<div class="flow-step-card">
				<div class="flow-step-num">01</div>
				<h3><?php esc_html_e( '100% Data Privacy', 'mobile-pasal' ); ?></h3>
				<p><?php esc_html_e( 'We respect customer privacy. Technicians do not browse personal photos, chat apps, or notes. We test hardware using dedicated hardware diagnostics.', 'mobile-pasal' ); ?></p>
			</div>

			<div class="flow-step-card">
				<div class="flow-step-num">02</div>
				<h3><?php esc_html_e( 'Zero Hidden Extra Fees', 'mobile-pasal' ); ?></h3>
				<p><?php esc_html_e( 'Every quote is provided upfront. If unexpected secondary faults are found during repair, we call and obtain your permission before proceeding.', 'mobile-pasal' ); ?></p>
			</div>

			<div class="flow-step-card">
				<div class="flow-step-num">03</div>
				<h3><?php esc_html_e( 'No Counterfeits Sold as OEM', 'mobile-pasal' ); ?></h3>
				<p><?php esc_html_e( 'We clearly distinguish between original-grade parts and value options. We never sell low-grade copy screens claiming they are genuine displays.', 'mobile-pasal' ); ?></p>
			</div>

			<div class="flow-step-card">
				<div class="flow-step-num">04</div>
				<h3><?php esc_html_e( 'Safe Battery Recycling', 'mobile-pasal' ); ?></h3>
				<p><?php esc_html_e( 'Swollen and depleted lithium-ion batteries are isolated and disposed of responsibly to prevent toxic chemical leaching and fire hazards.', 'mobile-pasal' ); ?></p>
			</div>
		</div>
	</div>
</section>

<!-- Community Reviews Section -->
<section class="reviews-section">
	<div class="wrap">
		<div class="sec-head sec-head-center fade-up">
			<span class="sec-kicker"><?php esc_html_e( 'Community Feedback', 'mobile-pasal' ); ?></span>
			<h2><?php esc_html_e( 'What Gulariya Phone Owners Say', 'mobile-pasal' ); ?></h2>
			<p><?php esc_html_e( 'Real feedback from local residents, students, and professionals across Bardiya.', 'mobile-pasal' ); ?></p>
		</div>

		<div class="reviews-grid fade-up">
			<?php
			$about_reviews = new WP_Query( array(
				'post_type'      => 'mp_review',
				'posts_per_page' => 3,
				'post_status'    => 'publish',
			) );

			if ( $about_reviews->have_posts() ) :
				while ( $about_reviews->have_posts() ) :
					$about_reviews->the_post();
					$r_id      = get_the_ID();
					$location  = get_post_meta( $r_id, '_mp_review_location', true ) ?: 'Gulariya, Bardiya';
					$initials  = mb_substr( get_the_title(), 0, 2 );
					?>
					<div class="review-card">
						<div class="review-stars">
							<svg viewBox="0 0 24 24" width="16" height="16" fill="#f59e0b"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
							<svg viewBox="0 0 24 24" width="16" height="16" fill="#f59e0b"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
							<svg viewBox="0 0 24 24" width="16" height="16" fill="#f59e0b"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
							<svg viewBox="0 0 24 24" width="16" height="16" fill="#f59e0b"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
							<svg viewBox="0 0 24 24" width="16" height="16" fill="#f59e0b"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
						</div>
						<p class="review-quote">"<?php echo esc_html( get_the_content() ); ?>"</p>
						<div class="reviewer-meta">
							<div class="reviewer-avatar"><?php echo esc_html( strtoupper( $initials ) ); ?></div>
							<div>
								<strong><?php the_title(); ?></strong>
								<small><?php echo esc_html( $location ); ?></small>
							</div>
						</div>
					</div>
				<?php endwhile;
				wp_reset_postdata();
			else :
				$default_testimonials = mp_get_default_testimonials_data();
				foreach ( $default_testimonials as $t ) :
					$initials = mb_substr( $t['name'], 0, 2 );
					?>
					<div class="review-card">
						<div class="review-stars">
							<svg viewBox="0 0 24 24" width="16" height="16" fill="#f59e0b"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
							<svg viewBox="0 0 24 24" width="16" height="16" fill="#f59e0b"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
							<svg viewBox="0 0 24 24" width="16" height="16" fill="#f59e0b"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
							<svg viewBox="0 0 24 24" width="16" height="16" fill="#f59e0b"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
							<svg viewBox="0 0 24 24" width="16" height="16" fill="#f59e0b"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
						</div>
						<p class="review-quote">"<?php echo esc_html( $t['content'] ); ?>"</p>
						<div class="reviewer-meta">
							<div class="reviewer-avatar"><?php echo esc_html( strtoupper( $initials ) ); ?></div>
							<div>
								<strong><?php echo esc_html( $t['name'] ); ?></strong>
								<small><?php echo esc_html( $t['location'] ); ?></small>
							</div>
						</div>
					</div>
				<?php endforeach;
			endif;
			?>
		</div>
	</div>
</section>

<?php
get_footer();
