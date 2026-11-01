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

$about_title = mp_opt( 'about_hero_title', 'About Ali Mobile &amp; Apple Fix' );
$stat1_val   = mp_opt( 'about_stat1_num', '10+' );
$stat1_lbl   = mp_opt( 'about_stat1_label', 'Years Serving Gulariya & Bardiya' );
$stat2_val   = mp_opt( 'about_stat2_num', '15,000+' );
$stat2_lbl   = mp_opt( 'about_stat2_label', 'Successful Handset Restorations' );
$stat3_val   = mp_opt( 'about_stat3_num', '100%' );
$stat3_lbl   = mp_opt( 'about_stat3_label', 'NTA & Original Component Standard' );
$stat4_val   = mp_opt( 'about_stat4_num', '90 Days' );
$stat4_lbl   = mp_opt( 'about_stat4_label', 'Standard Testing Warranty on Repairs' );
?>

<!-- Page Hero Banner: Breadcrumbs, Title & Pure Graphics -->
<section class="page-hero-banner" aria-label="<?php esc_attr_e( 'About Us Header', 'mobile-pasal' ); ?>">
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
					<span class="crumb-active"><?php esc_html_e( 'About', 'mobile-pasal' ); ?></span>
				</nav>
				<h1 class="page-hero-title"><?php echo wp_kses_post( $about_title ); ?></h1>
			</div>
			<?php mp_render_page_hero_graphic(); ?>
		</div>
	</div>
</section>

<!-- Our Story & Stats Dock -->
<section class="section-wrap about-story-section">
	<div class="tech-bg-grid" aria-hidden="true"></div>
	<div class="tech-ring-accent tech-ring-right" aria-hidden="true"></div>
	<div class="wrap">
		<div class="about-story-grid fade-up">
			<!-- Story Content -->
			<div class="about-story-content">
				<span class="sec-kicker"><?php echo esc_html( mp_opt( 'about_story_kicker', 'Our Heritage' ) ); ?></span>
				<h2><?php echo esc_html( mp_opt( 'about_story_head', 'Built on Genuine Handsets & Microscope Precision' ) ); ?></h2>
				<p style="color: var(--text-body); font-size: 1.02rem; line-height: 1.7; margin-bottom: 16px;">
					<?php echo nl2br( esc_html( mp_opt( 'about_story_p1', 'Ali Mobile Center was founded with a singular conviction: residents of Gulariya and wider Bardiya should not have to compromise on smartphone authenticity or travel 40km to Nepalgunj for skilled iPhone repairs. From day one, every handset on our shelves is 100% NTA approved with an official VAT bill.' ) ) ); ?>
				</p>
				<p style="color: var(--text-muted); font-size: 0.95rem; line-height: 1.65; margin-bottom: 24px;">
					<?php echo nl2br( esc_html( mp_opt( 'about_story_p2', 'Over eight years of service, we invested in German stereomicroscopes, programmable thermal rework stations, and ultrasonic liquid cleaning baths. Today, whether you need a sealed iPhone 16 Pro Max or precision BGA micro-soldering, our counter provides five-star reliability.' ) ) ); ?>
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
				<?php 
				$story_img = mp_opt( 'about_story_image' );
				if ( empty( $story_img ) ) {
					$story_img = MP_THEME_URI . '/assets/images/apple-fix-bench.jpg';
				}
				?>
				<img src="<?php echo esc_url( $story_img ); ?>" alt="<?php esc_attr_e( 'Ali Mobile Apple Fix Workbench in Gulariya', 'mobile-pasal' ); ?>">
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
<section class="section-wrap lab-standards-section">
	<div class="tech-bg-grid" aria-hidden="true"></div>
	<div class="tech-ring-accent" aria-hidden="true"></div>
	<div class="wrap">
		<div class="sec-head sec-head-center fade-up">
			<span class="sec-kicker"><?php echo esc_html( mp_opt( 'about_tooling_kicker', 'Cleanroom Tooling' ) ); ?></span>
			<h2><?php echo esc_html( mp_opt( 'about_tooling_head', 'Professional Hardware Equipment on Our Bench' ) ); ?></h2>
			<p><?php echo esc_html( mp_opt( 'about_tooling_desc', 'We invest in industrial-grade diagnostic equipment so your premium smartphone is treated with laboratory care.' ) ); ?></p>
		</div>

		<div class="services-grid fade-up">
			<div class="service-card">
				<div class="service-icon-wrap">
					<svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
				</div>
				<h3><?php echo esc_html( mp_opt( 'about_tool1_title', 'Stereo Optical Microscope' ) ); ?></h3>
				<p><?php echo esc_html( mp_opt( 'about_tool1_desc', '45x continuous zoom trinocular microscope for precision inspection of 0201 SMD resistors, broken circuit jumper wires, and logic board BGA pads.' ) ); ?></p>
			</div>

			<div class="service-card">
				<div class="service-icon-wrap">
					<svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2.69l5.66 5.66a8 8 0 1 1-11.31 0z"></path></svg>
				</div>
				<h3><?php echo esc_html( mp_opt( 'about_tool2_title', 'Digital Ultrasonic Sonicator' ) ); ?></h3>
				<p><?php echo esc_html( mp_opt( 'about_tool2_desc', 'Multi-frequency heated ultrasonic chemical bath specifically designed to dislodge liquid oxidation and electrolytic crystals from water-damaged logic boards.' ) ); ?></p>
			</div>

			<div class="service-card">
				<div class="service-icon-wrap">
					<svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>
				</div>
				<h3><?php echo esc_html( mp_opt( 'about_tool3_title', 'Programmable Rework & Micro-Pencil' ) ); ?></h3>
				<p><?php echo esc_html( mp_opt( 'about_tool3_desc', 'Micro-soldering station with rapid temperature recovery, anti-static ESD earthing, and custom nozzles to protect adjacent motherboard IC components.' ) ); ?></p>
			</div>
		</div>
	</div>
</section>

<!-- 4 Core Commitments -->
<section class="section-wrap commitments-section">
	<div class="tech-bg-grid" aria-hidden="true"></div>
	<div class="tech-ring-accent tech-ring-right" aria-hidden="true"></div>
	<div class="wrap">
		<div class="sec-head sec-head-center fade-up">
			<span class="sec-kicker"><?php echo esc_html( mp_opt( 'about_commitments_kicker', 'Integrity First' ) ); ?></span>
			<h2><?php echo esc_html( mp_opt( 'about_commitments_head', 'Our 4 Core Counter Commitments' ) ); ?></h2>
			<p><?php echo esc_html( mp_opt( 'about_commitments_desc', 'How we do business every day at Ji. Pra. Ka. Chowk.' ) ); ?></p>
		</div>

		<div class="steps-flow-grid fade-up">
			<div class="flow-step-card">
				<div class="flow-step-num">01</div>
				<h3><?php echo esc_html( mp_opt( 'about_commit1_title', '100% Data Privacy' ) ); ?></h3>
				<p><?php echo esc_html( mp_opt( 'about_commit1_desc', 'We respect customer privacy. Technicians do not browse personal photos, chat apps, or notes. We test hardware using dedicated hardware diagnostics.' ) ); ?></p>
			</div>

			<div class="flow-step-card">
				<div class="flow-step-num">02</div>
				<h3><?php echo esc_html( mp_opt( 'about_commit2_title', 'Zero Hidden Extra Fees' ) ); ?></h3>
				<p><?php echo esc_html( mp_opt( 'about_commit2_desc', 'Every quote is provided upfront. If unexpected secondary faults are found during repair, we call and obtain your permission before proceeding.' ) ); ?></p>
			</div>

			<div class="flow-step-card">
				<div class="flow-step-num">03</div>
				<h3><?php echo esc_html( mp_opt( 'about_commit3_title', 'No Counterfeits Sold as OEM' ) ); ?></h3>
				<p><?php echo esc_html( mp_opt( 'about_commit3_desc', 'We clearly distinguish between original-grade parts and value options. We never sell low-grade copy screens claiming they are genuine displays.' ) ); ?></p>
			</div>

			<div class="flow-step-card">
				<div class="flow-step-num">04</div>
				<h3><?php echo esc_html( mp_opt( 'about_commit4_title', 'Safe Battery Recycling' ) ); ?></h3>
				<p><?php echo esc_html( mp_opt( 'about_commit4_desc', 'Swollen and depleted lithium-ion batteries are isolated and disposed of responsibly to prevent toxic chemical leaching and fire hazards.' ) ); ?></p>
			</div>
		</div>
	</div>
</section>

<!-- Community Reviews Section (Interactive Dynamic Carousel) -->
<section class="section-wrap reviews-section" id="community-reviews">
	<div class="tech-bg-grid" aria-hidden="true"></div>
	<div class="tech-ring-accent" aria-hidden="true"></div>
	<div class="container">
		<div class="section-header" style="display: flex; align-items: flex-end; justify-content: space-between; flex-wrap: wrap; gap: 16px; margin-bottom: 32px;">
			<div class="section-header-copy">
				<span class="section-badge"><?php echo esc_html( mp_opt( 'reviews_kicker', 'COMMUNITY FEEDBACK' ) ); ?></span>
				<h2 class="section-title"><?php echo esc_html( mp_opt( 'reviews_title', 'What Gulariya Phone Owners Say' ) ); ?></h2>
				<p class="section-desc"><?php echo esc_html( mp_opt( 'reviews_subtitle', 'Real verified feedback from local residents, students, and professionals across Bardiya.' ) ); ?></p>
			</div>
			<div class="reviews-header-actions" style="display: flex; align-items: center; gap: 14px;">
				<div class="rating-header-badge">
					<svg width="16" height="16" viewBox="0 0 24 24" fill="#f59e0b" aria-hidden="true"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
					<strong><?php echo esc_html( mp_opt( 'reviews_rating_score', '4.9 / 5.0' ) ); ?></strong>
					<span style="color:#78350f; font-weight:600;"><?php echo esc_html( mp_opt( 'reviews_rating_count_text', '(250+ Verified Reviews)' ) ); ?></span>
				</div>
				<div class="reviews-nav-controls">
					<button class="carousel-arrow carousel-prev" id="aboutReviewsPrev" aria-label="<?php esc_attr_e( 'Previous reviews', 'mobile-pasal' ); ?>" type="button">
						<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="15 18 9 12 15 6"></polyline></svg>
					</button>
					<button class="carousel-arrow carousel-next" id="aboutReviewsNext" aria-label="<?php esc_attr_e( 'Next reviews', 'mobile-pasal' ); ?>" type="button">
						<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="9 18 15 12 9 6"></polyline></svg>
					</button>
				</div>
			</div>
		</div>

		<!-- Smooth Slider Carousel Viewport -->
		<div class="reviews-carousel-viewport" id="aboutReviewsViewport">
			<div class="reviews-carousel-track" id="aboutReviewsTrack">
				<?php
				$about_reviews = get_posts( array(
					'post_type'      => 'mp_review',
					'posts_per_page' => 12,
					'post_status'    => 'publish',
				) );

				$about_reviews_data = array();
				if ( ! empty( $about_reviews ) ) {
					foreach ( $about_reviews as $arv ) {
						$author   = $arv->post_title;
						$content  = strip_tags( $arv->post_content );
						$loc      = get_post_meta( $arv->ID, '_mp_review_location', true ) ?: 'Gulariya, Bardiya';
						$prod     = get_post_meta( $arv->ID, '_mp_review_product', true );
						$rating   = intval( get_post_meta( $arv->ID, '_mp_review_rating', true ) ?: 5 );
						$meta_str = $loc . ( $prod ? ' • ' . $prod : '' );
						$initials = mb_substr( $author, 0, 2 );

						$about_reviews_data[] = array(
							'text'     => '"' . $content . '"',
							'name'     => $author,
							'meta'     => $meta_str,
							'initials' => strtoupper( $initials ),
							'rating'   => $rating,
						);
					}
				} else {
					$default_testimonials = mp_get_default_testimonials_data();
					foreach ( $default_testimonials as $t ) {
						$about_reviews_data[] = array(
							'text'     => '"' . $t['content'] . '"',
							'name'     => $t['name'],
							'meta'     => $t['location'],
							'initials' => strtoupper( mb_substr( $t['name'], 0, 2 ) ),
							'rating'   => 5,
						);
					}
				}

				foreach ( $about_reviews_data as $rv_item ) :
				?>
				<div class="review-card">
					<div>
						<div class="review-stars" aria-label="<?php echo esc_attr( $rv_item['rating'] ); ?> out of 5 stars">
							<?php for ( $s = 0; $s < 5; $s++ ) : ?>
								<svg width="15" height="15" viewBox="0 0 24 24" fill="<?php echo $s < $rv_item['rating'] ? '#f59e0b' : '#cbd5e1'; ?>" aria-hidden="true"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
							<?php endfor; ?>
						</div>
						<p class="review-text"><?php echo esc_html( $rv_item['text'] ); ?></p>
					</div>
					<div class="reviewer-info">
						<div class="reviewer-avatar"><?php echo esc_html( $rv_item['initials'] ); ?></div>
						<div>
							<h4 class="reviewer-name"><?php echo esc_html( $rv_item['name'] ); ?></h4>
							<p class="reviewer-meta"><?php echo esc_html( $rv_item['meta'] ); ?></p>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
		</div>

		<!-- Carousel Indicator Dots -->
		<div class="reviews-carousel-dots" id="aboutReviewsDots"></div>
	</div>
</section>

<?php
get_footer();
