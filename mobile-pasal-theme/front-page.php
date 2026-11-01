<?php
/**
 * The template for displaying the front page / home page
 * Complete Store & Certified Repair Lab Experience Design
 * Fully Connected with WordPress Admin Theme Options
 *
 * @package Mobile_Pasal
 * @version 3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$phone   = mp_opt( 'contact_phone', '+977 9804530786' );
$clean_p = mp_clean_phone( $phone );
$address = mp_opt( 'contact_address', 'Gulariya-06, Ji. Pra. Ka. Chowk, Bardiya' );
$hours   = mp_opt( 'contact_hours', 'Sun–Fri: 9:00 AM – 8:00 PM | Sat: 10:00 AM – 6:00 PM' );
$map_url = mp_opt( 'google_maps_link', 'https://maps.google.com/?q=Gulariya,Bardiya,Nepal' );

// Hero Slide 1
$slide1_trust     = mp_opt( 'hero_slide1_trust', 'Trusted by 10,000+ Customers across Bardiya' );
$slide1_title     = mp_opt( 'hero_slide1_title', 'Expert <span class="accent">Mobile Repair</span> &amp; Service' );
$slide1_intro     = mp_opt( 'hero_slide1_intro', 'Your One-Stop Solution for Official Sealed Smartphones, Genuine Accessories, and Micro-Surgical Lab Repairs.' );
$slide1_f1_icon   = mp_opt( 'hero_slide1_f1_icon', 'clock' );
$slide1_f1_text   = mp_opt( 'hero_slide1_f1_text', 'Fast<br>45-Min Fix' );
$slide1_f2_icon   = mp_opt( 'hero_slide1_f2_icon', 'screen' );
$slide1_f2_text   = mp_opt( 'hero_slide1_f2_text', 'Genuine<br>OLED Parts' );
$slide1_f3_icon   = mp_opt( 'hero_slide1_f3_icon', 'wrench' );
$slide1_f3_text   = mp_opt( 'hero_slide1_f3_text', 'Level 4<br>Technicians' );
$slide1_f4_icon   = mp_opt( 'hero_slide1_f4_icon', 'tag' );
$slide1_f4_text   = mp_opt( 'hero_slide1_f4_text', 'Affordable<br>Pricing' );
$slide1_btn1_text = mp_opt( 'hero_slide1_btn1_text', 'Shop Handsets' );
$slide1_btn1_url  = mp_opt( 'hero_slide1_btn1_url', '#categories' );
$slide1_btn2_text = mp_opt( 'hero_slide1_btn2_text', 'View iPhone 16 Pro' );
$slide1_btn2_url  = mp_opt( 'hero_slide1_btn2_url', '#flagship' );
$slide1_tagline   = mp_opt( 'hero_slide1_tagline', 'Fix It.<br>Stay Connected!' );
$slide1_img       = mp_opt( 'hero_slide1_image', '' );
if ( empty( $slide1_img ) ) {
	$slide1_img = MP_THEME_URI . '/assets/images/hero-repair-lab.jpg';
}

// Hero Slide 2
$slide2_trust     = mp_opt( 'hero_slide2_trust', '100% Genuine Apple &amp; Android Displays' );
$slide2_title     = mp_opt( 'hero_slide2_title', 'Cracked Screen? <span class="accent">We\'ve Got You.</span>' );
$slide2_intro     = mp_opt( 'hero_slide2_intro', 'Precision IC board diagnostics, rapid original battery replacements, and certified glass lamination with 1-Year Warranty.' );
$slide2_f1_icon   = mp_opt( 'hero_slide2_f1_icon', 'screen' );
$slide2_f1_text   = mp_opt( 'hero_slide2_f1_text', 'OLED Screen<br>Replacement' );
$slide2_f2_icon   = mp_opt( 'hero_slide2_f2_icon', 'battery' );
$slide2_f2_text   = mp_opt( 'hero_slide2_f2_text', 'Certified<br>Battery Swap' );
$slide2_f3_icon   = mp_opt( 'hero_slide2_f3_icon', 'droplet' );
$slide2_f3_text   = mp_opt( 'hero_slide2_f3_text', 'Water Soak<br>Restoration' );
$slide2_f4_icon   = mp_opt( 'hero_slide2_f4_icon', 'cpu' );
$slide2_f4_text   = mp_opt( 'hero_slide2_f4_text', 'Motherboard<br>Micro-Soldering' );
$slide2_btn1_text = mp_opt( 'hero_slide2_btn1_text', 'Book Counter Fix' );
$slide2_btn2_text = mp_opt( 'hero_slide2_btn2_text', 'Explore Services' );
$slide2_btn2_url  = mp_opt( 'hero_slide2_btn2_url', '#repairs' );
$slide2_tagline   = mp_opt( 'hero_slide2_tagline', 'Repair Right.<br>Relax More.' );
$slide2_img       = mp_opt( 'hero_slide2_image', '' );
if ( empty( $slide2_img ) ) {
	$slide2_img = MP_THEME_URI . '/assets/images/iphone-repair-hands.jpg';
}

// Hero Slide 3
$slide3_trust     = mp_opt( 'hero_slide3_trust', 'Official Nepal Distro Guarantee' );
$slide3_title     = mp_opt( 'hero_slide3_title', 'Find Your <span class="accent">Next Phone.</span>' );
$slide3_intro     = mp_opt( 'hero_slide3_intro', 'Brand new sealed smartphones with MDMS / NTA registration, zero markup rates, and flexible exchange options.' );
$slide3_f1_icon   = mp_opt( 'hero_slide3_f1_icon', 'phone' );
$slide3_f1_text   = mp_opt( 'hero_slide3_f1_text', 'Top Tier<br>Brands' );
$slide3_f2_icon   = mp_opt( 'hero_slide3_f2_icon', 'plug' );
$slide3_f2_text   = mp_opt( 'hero_slide3_f2_text', 'Anker &amp; PD<br>Accessories' );
$slide3_f3_icon   = mp_opt( 'hero_slide3_f3_icon', 'heart' );
$slide3_f3_text   = mp_opt( 'hero_slide3_f3_text', 'Tech Setup<br>Assistance' );
$slide3_f4_icon   = mp_opt( 'hero_slide3_f4_icon', 'wallet' );
$slide3_f4_text   = mp_opt( 'hero_slide3_f4_text', 'eSewa &amp; Bank<br>Counters' );
$slide3_btn1_text = mp_opt( 'hero_slide3_btn1_text', 'Browse Nepal Stock' );
$slide3_btn1_url  = mp_opt( 'hero_slide3_btn1_url', '#catalog' );
$slide3_btn2_text = mp_opt( 'hero_slide3_btn2_text', 'View Brands' );
$slide3_btn2_url  = mp_opt( 'hero_slide3_btn2_url', '#brands' );
$slide3_tagline   = mp_opt( 'hero_slide3_tagline', 'Discover More.<br>Stay Connected!' );
$slide3_img       = mp_opt( 'hero_slide3_image', '' );
if ( empty( $slide3_img ) ) {
	$slide3_img = MP_THEME_URI . '/assets/images/hero-accessories.jpg';
}

// Flagship Spotlight
$spotlight_badge  = mp_opt( 'spotlight_badge', 'FEATURED FLAGSHIP IN GULARIYA' );
$spotlight_title  = mp_opt( 'spotlight_title', 'iPhone 16 Pro & Pro Max' );
$spotlight_tag    = mp_opt( 'spotlight_tagline', 'Built for Apple Intelligence • Grade 5 Titanium' );
$spotlight_desc   = mp_opt( 'spotlight_desc', 'Grade 5 Titanium design with thinner borders, A18 Pro silicon chip, 48MP Fusion camera with 4K 120fps Dolby Vision, and revolutionary Camera Control button.' );
$spotlight_status = mp_opt( 'spotlight_status_text', '' );
$spotlight_img    = mp_opt( 'spotlight_image', '' );
if ( empty( $spotlight_img ) ) {
	$spotlight_img = 'https://images.unsplash.com/photo-1695048133142-1a20484d2569?auto=format&fit=crop&w=900&q=85';
}

// Lab Section
$lab_badge   = mp_opt( 'lab_badge', 'CLEANROOM BENCH SETUP' );
$lab_title   = mp_opt( 'lab_title', 'Precision Microscope Level Repairs Right in Gulariya' );
$lab_desc    = mp_opt( 'lab_desc', 'We do not courier your valuable phone to Nepalgunj or Kathmandu. Repairs happen transparently inside our Gulariya counter laboratory with stereo zoom microscopes, anti-static thermal stations, and genuine parts.' );
$lab_feat1_icon = mp_opt( 'lab_feat1_icon', 'screen' );
$lab_f1_h    = mp_opt( 'lab_feat1_title', '30-Minute Screen Replacement' );
$lab_f1_d    = mp_opt( 'lab_feat1_desc', 'Fast OLED and glass restoration with TrueTone &amp; 3D touch programming.' );
$lab_feat2_icon = mp_opt( 'lab_feat2_icon', 'battery' );
$lab_f2_h    = mp_opt( 'lab_feat2_title', 'Battery Health Calibration' );
$lab_f2_d    = mp_opt( 'lab_feat2_desc', 'Certified battery replacements that restore peak 100% capacity and battery health cycle.' );
$lab_feat3_icon = mp_opt( 'lab_feat3_icon', 'shield' );
$lab_f3_h    = mp_opt( 'lab_feat3_title', 'In-Front-Of-You Transparency' );
$lab_f3_d    = mp_opt( 'lab_feat3_desc', 'Watch your repair live across our counter. Complete privacy protection for photos &amp; accounts.' );
$lab_s1_n    = mp_opt( 'lab_stat1_num', '10,000+' );
$lab_s1_l    = mp_opt( 'lab_stat1_label', 'Repairs Handled' );
$lab_s2_n    = mp_opt( 'lab_stat2_num', '98.5%' );
$lab_s2_l    = mp_opt( 'lab_stat2_label', 'Success Rate' );
$lab_s3_n    = mp_opt( 'lab_stat3_num', '45 Min' );
$lab_s3_l    = mp_opt( 'lab_stat3_label', 'Screen Turnaround' );
$lab_img     = mp_opt( 'lab_image', '' );
if ( empty( $lab_img ) ) {
	$lab_img = 'https://images.unsplash.com/photo-1581092335397-9583fe92d232?auto=format&fit=crop&w=1000&q=85';
}

// Hero Trust Bar
$trust_bar_enabled = mp_opt( 'trust_bar_enabled', 1 );
$trust_feat1_icon  = mp_opt( 'trust_feat1_icon', 'clock' );
$trust_feat1_title = mp_opt( 'trust_feat1_title', 'Fast 45-Min Fix' );
$trust_feat1_desc  = mp_opt( 'trust_feat1_desc', 'Instant on-counter screen & battery turnaround' );
$trust_feat2_icon  = mp_opt( 'trust_feat2_icon', 'screen' );
$trust_feat2_title = mp_opt( 'trust_feat2_title', 'Genuine OLED Parts' );
$trust_feat2_desc  = mp_opt( 'trust_feat2_desc', 'TrueTone & 3D Touch programming retained' );
$trust_feat3_icon  = mp_opt( 'trust_feat3_icon', 'wrench' );
$trust_feat3_title = mp_opt( 'trust_feat3_title', 'Level 4 Technicians' );
$trust_feat3_desc  = mp_opt( 'trust_feat3_desc', 'Micro-soldering & stereo microscope cleanroom lab' );
$trust_feat4_icon  = mp_opt( 'trust_feat4_icon', 'tag' );
$trust_feat4_title = mp_opt( 'trust_feat4_title', 'Affordable Pricing' );
$trust_feat4_desc  = mp_opt( 'trust_feat4_desc', 'Transparent rates with warranty & official VAT bill' );

// Cleanroom Lab Bench Enhancements
$lab_live_status   = mp_opt( 'lab_live_status', 'Live Gulariya Counter Cleanroom Lab' );
$lab_tagline       = mp_opt( 'lab_tagline', 'Stereo Zoom Microscope • Anti-Static ESD Station' );
$lab_feat1_chip    = mp_opt( 'lab_feat1_chip', 'TrueTone & 3D Touch Retained' );
$lab_feat2_chip    = mp_opt( 'lab_feat2_chip', 'Zero Error BMS Micro-Welded' );
$lab_feat3_chip    = mp_opt( 'lab_feat3_chip', '100% Privacy Protection' );
$lab_btn1_text     = mp_opt( 'lab_btn1_text', 'Consult Our Technician' );
$lab_btn2_prefix   = mp_opt( 'lab_btn2_prefix', 'Call Counter' );
?>

<!-- ================= 1. HERO SLIDER SECTION ================= -->
<section class="hero-section" id="heroSlider" aria-label="<?php esc_attr_e( 'Mobile repair and store hero slider', 'mobile-pasal' ); ?>">
  <div class="tech-bg-grid" aria-hidden="true"></div>
  <div class="tech-ring-accent" aria-hidden="true"></div>

  <div class="hero">

    <div class="hero-slider-stage" id="heroSliderStage">
      <!-- Slide 1 -->
    <div class="slide active" data-slide="0">
      <div class="copy">
        <div class="trust">
          <span class="trust-icon">
            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"></polyline></svg>
          </span>
          <?php echo esc_html( $slide1_trust ); ?>
        </div>
        <h1><?php echo wp_kses_post( $slide1_title ); ?></h1>
        <p class="intro"><?php echo esc_html( $slide1_intro ); ?></p>
        <div class="actions">
          <a class="primary" href="<?php echo esc_url( $slide1_btn1_url ); ?>"><?php echo esc_html( $slide1_btn1_text ); ?> <span>→</span></a>
          <a class="secondary" href="<?php echo esc_url( $slide1_btn2_url ); ?>">
            <span class="play">
              <svg width="10" height="10" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><polygon points="5 3 19 12 5 21 5 3"></polygon></svg>
            </span>
            <?php echo esc_html( $slide1_btn2_text ); ?>
          </a>
        </div>
                <div class="hero-slider-nav">
          <div class="dots" aria-label="<?php esc_attr_e( 'Choose slide', 'mobile-pasal' ); ?>">
            <button class="dot active" aria-label="Slide 1" type="button"></button>
            <button class="dot" aria-label="Slide 2" type="button"></button>
            <button class="dot" aria-label="Slide 3" type="button"></button>
          </div>
          <div class="hero-nav-divider" aria-hidden="true"></div>
          <div class="hero-nav-arrows">
            <button class="slider-arrow prev" aria-label="<?php esc_attr_e( 'Previous slide', 'mobile-pasal' ); ?>" type="button">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="15 18 9 12 15 6"></polyline></svg>
            </button>
            <button class="slider-arrow next" aria-label="<?php esc_attr_e( 'Next slide', 'mobile-pasal' ); ?>" type="button">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="9 18 15 12 9 6"></polyline></svg>
            </button>
          </div>
        </div>
      </div>
      <div class="visual">
        <img class="product-image" src="<?php echo esc_url( $slide1_img ); ?>" fetchpriority="high" decoding="async" onerror="this.onerror=null;this.src='https://images.unsplash.com/photo-1581092160607-ee22621dd758?auto=format&fit=crop&w=1000&q=85';" alt="<?php echo esc_attr( strip_tags( $slide1_title ) ); ?>" />
        <div class="tagline"><?php echo wp_kses_post( $slide1_tagline ); ?></div>
      </div>
    </div>

    <!-- Slide 2 -->
    <div class="slide" data-slide="1">
      <div class="copy">
        <div class="trust">
          <span class="trust-icon">
            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"></polyline></svg>
          </span>
          <?php echo esc_html( $slide2_trust ); ?>
        </div>
        <h1><?php echo wp_kses_post( $slide2_title ); ?></h1>
        <p class="intro"><?php echo esc_html( $slide2_intro ); ?></p>
        <div class="actions">
          <button class="primary" onclick="openQuoteModal('Display &amp; Touch Screen Replacement')" type="button"><?php echo esc_html( $slide2_btn1_text ); ?> <span>→</span></button>
          <a class="secondary" href="<?php echo esc_url( $slide2_btn2_url ); ?>">
            <span class="play">
              <svg width="10" height="10" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><polygon points="5 3 19 12 5 21 5 3"></polygon></svg>
            </span>
            <?php echo esc_html( $slide2_btn2_text ); ?>
          </a>
        </div>
                <div class="hero-slider-nav">
          <div class="dots" aria-label="<?php esc_attr_e( 'Choose slide', 'mobile-pasal' ); ?>">
            <button class="dot" aria-label="Slide 1" type="button"></button>
            <button class="dot active" aria-label="Slide 2" type="button"></button>
            <button class="dot" aria-label="Slide 3" type="button"></button>
          </div>
          <div class="hero-nav-divider" aria-hidden="true"></div>
          <div class="hero-nav-arrows">
            <button class="slider-arrow prev" aria-label="<?php esc_attr_e( 'Previous slide', 'mobile-pasal' ); ?>" type="button">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="15 18 9 12 15 6"></polyline></svg>
            </button>
            <button class="slider-arrow next" aria-label="<?php esc_attr_e( 'Next slide', 'mobile-pasal' ); ?>" type="button">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="9 18 15 12 9 6"></polyline></svg>
            </button>
          </div>
        </div>
      </div>
      <div class="visual">
        <img class="product-image" src="<?php echo esc_url( $slide2_img ); ?>" loading="lazy" decoding="async" onerror="this.onerror=null;this.src='https://images.unsplash.com/photo-1597733336794-12d05021d510?auto=format&fit=crop&w=1000&q=85';" alt="<?php echo esc_attr( strip_tags( $slide2_title ) ); ?>" />
        <div class="tagline"><?php echo wp_kses_post( $slide2_tagline ); ?></div>
      </div>
    </div>

    <!-- Slide 3 -->
    <div class="slide" data-slide="2">
      <div class="copy">
        <div class="trust">
          <span class="trust-icon">
            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"></polyline></svg>
          </span>
          <?php echo esc_html( $slide3_trust ); ?>
        </div>
        <h1><?php echo wp_kses_post( $slide3_title ); ?></h1>
        <p class="intro"><?php echo esc_html( $slide3_intro ); ?></p>
        <div class="actions">
          <a class="primary" href="<?php echo esc_url( $slide3_btn1_url ); ?>"><?php echo esc_html( $slide3_btn1_text ); ?> <span>→</span></a>
          <a class="secondary" href="<?php echo esc_url( $slide3_btn2_url ); ?>">
            <span class="play">
              <svg width="10" height="10" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><polygon points="5 3 19 12 5 21 5 3"></polygon></svg>
            </span>
            <?php echo esc_html( $slide3_btn2_text ); ?>
          </a>
        </div>
                <div class="hero-slider-nav">
          <div class="dots" aria-label="<?php esc_attr_e( 'Choose slide', 'mobile-pasal' ); ?>">
            <button class="dot" aria-label="Slide 1" type="button"></button>
            <button class="dot" aria-label="Slide 2" type="button"></button>
            <button class="dot active" aria-label="Slide 3" type="button"></button>
          </div>
          <div class="hero-nav-divider" aria-hidden="true"></div>
          <div class="hero-nav-arrows">
            <button class="slider-arrow prev" aria-label="<?php esc_attr_e( 'Previous slide', 'mobile-pasal' ); ?>" type="button">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="15 18 9 12 15 6"></polyline></svg>
            </button>
            <button class="slider-arrow next" aria-label="<?php esc_attr_e( 'Next slide', 'mobile-pasal' ); ?>" type="button">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="9 18 15 12 9 6"></polyline></svg>
            </button>
          </div>
        </div>
      </div>
      <div class="visual">
        <img class="product-image" src="<?php echo esc_url( $slide3_img ); ?>" loading="lazy" decoding="async" onerror="this.onerror=null;this.src='https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?auto=format&fit=crop&w=1000&q=85';" alt="<?php echo esc_attr( strip_tags( $slide3_title ) ); ?>" />
        <div class="tagline"><?php echo wp_kses_post( $slide3_tagline ); ?></div>
      </div>
    </div><!-- /#heroSliderStage -->

    <div class="blue-swoosh"></div>
    <div class="hero-progress-bar" aria-hidden="true">
      <div class="hero-progress-fill" id="heroProgress"></div>
    </div>
  </div>
</section>

<?php if ( ! empty( $trust_bar_enabled ) ) : ?>
<!-- ================= HERO TRUST BAR (COMMON 4 FEATURES) ================= -->
<section class="hero-trust-bar" id="heroTrustBar" aria-label="<?php esc_attr_e( 'Ali Mobile Guarantees and Services', 'mobile-pasal' ); ?>">
  <div class="container">
    <div class="hero-trust-grid">
      <!-- 1. Fast 45-Min Fix -->
      <div class="hero-trust-card">
        <div class="trust-card-icon" aria-hidden="true">
          <?php echo mp_get_icon_svg( $trust_feat1_icon, 22, 22 ); ?>
        </div>
        <div class="trust-card-content">
          <h3 class="trust-card-title"><?php echo esc_html( $trust_feat1_title ); ?></h3>
          <p class="trust-card-desc"><?php echo esc_html( $trust_feat1_desc ); ?></p>
        </div>
      </div>

      <!-- 2. Genuine OLED Parts -->
      <div class="hero-trust-card">
        <div class="trust-card-icon" aria-hidden="true">
          <?php echo mp_get_icon_svg( $trust_feat2_icon, 22, 22 ); ?>
        </div>
        <div class="trust-card-content">
          <h3 class="trust-card-title"><?php echo esc_html( $trust_feat2_title ); ?></h3>
          <p class="trust-card-desc"><?php echo esc_html( $trust_feat2_desc ); ?></p>
        </div>
      </div>

      <!-- 3. Level 4 Technicians -->
      <div class="hero-trust-card">
        <div class="trust-card-icon" aria-hidden="true">
          <?php echo mp_get_icon_svg( $trust_feat3_icon, 22, 22 ); ?>
        </div>
        <div class="trust-card-content">
          <h3 class="trust-card-title"><?php echo esc_html( $trust_feat3_title ); ?></h3>
          <p class="trust-card-desc"><?php echo esc_html( $trust_feat3_desc ); ?></p>
        </div>
      </div>

      <!-- 4. Affordable Pricing -->
      <div class="hero-trust-card">
        <div class="trust-card-icon" aria-hidden="true">
          <?php echo mp_get_icon_svg( $trust_feat4_icon, 22, 22 ); ?>
        </div>
        <div class="trust-card-content">
          <h3 class="trust-card-title"><?php echo esc_html( $trust_feat4_title ); ?></h3>
          <p class="trust-card-desc"><?php echo esc_html( $trust_feat4_desc ); ?></p>
        </div>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>

<!-- ================= 2. SHOP BY CATEGORY ================= -->
<section class="section-wrap" id="categories">
  <div class="tech-bg-grid" aria-hidden="true"></div>
  <div class="tech-ring-accent tech-ring-right" aria-hidden="true"></div>

  <div class="container">
    <div class="section-header">
      <div class="section-header-copy">
        <span class="eyebrow"><?php echo esc_html( mp_opt( 'categories_kicker', 'COMPLETE STORE DEPARTMENT' ) ); ?></span>
        <h2 class="section-title"><?php echo esc_html( mp_opt( 'categories_title', 'Shop by Device Category' ) ); ?></h2>
        <p class="section-subtitle"><?php echo esc_html( mp_opt( 'categories_subtitle', 'Every handset is factory-sealed, registered with NTA / MDMS Nepal, and backed by comprehensive manufacturer warranty.' ) ); ?></p>
      </div>
      <a href="<?php echo esc_url( mp_opt( 'categories_btn_url', '#catalog' ) ); ?>" class="view-all-pill">
        <?php echo esc_html( mp_opt( 'categories_btn_text', 'View All Products' ) ); ?> <span>→</span>
      </a>
    </div>

    <div class="category-grid">
      <?php
      $clean_cat_hint = function( $key, $fallback ) {
          $val = mp_opt( $key, $fallback );
          return trim( preg_replace( '/\s*(→|&rarr;|&#8594;|->)+$/u', '', (string) $val ) );
      };
      ?>
      <!-- 1. Flagship Smartphones -->
      <?php $cat1_url = mp_opt( 'cat1_url', '' ); ?>
      <article class="cat-card" style="--card-tint: rgba(8, 98, 233, 0.08); --card-border-hover: #0862e9;" onclick="<?php echo ( ! empty( $cat1_url ) && '#catalog' !== $cat1_url ) ? 'window.location.href=\'' . esc_js( $cat1_url ) . '\'' : 'filterCatalogByBrand(\'Apple iPhone\')'; ?>">
        <span class="cat-badge" style="--badge-bg: #e8f0ff; --badge-color: #073d9c;"><?php echo esc_html( mp_opt( 'cat1_count', 'NTA Sealed' ) ); ?></span>
        <div class="cat-visual" style="--icon-bg: #edf4ff; --icon-border: rgba(8, 98, 233, 0.18); --icon-color: #0862e9;">
          <svg viewBox="0 0 24 24"><rect x="5" y="2" width="14" height="20" rx="3" ry="3"></rect><line x1="12" y1="18" x2="12.01" y2="18"></line><line x1="9" y1="5" x2="15" y2="5"></line></svg>
        </div>
        <h3 class="cat-title"><?php echo esc_html( mp_opt( 'cat1_title', 'Flagship Smartphones' ) ); ?></h3>
        <p class="cat-desc"><?php echo esc_html( mp_opt( 'cat1_sub', 'iPhone 16 / 15 / 14, Samsung Galaxy S & Pixel' ) ); ?></p>
        <span class="cat-link"><?php echo esc_html( $clean_cat_hint( 'cat1_hint', 'Browse Showroom' ) ); ?> <span>&rarr;</span></span>
      </article>

      <!-- 2. Certified Apple Fix -->
      <?php $cat2_url = mp_opt( 'cat2_url', '' ); ?>
      <article class="cat-card" style="--card-tint: rgba(2, 132, 199, 0.08); --card-border-hover: #0284c7;" onclick="<?php echo ( ! empty( $cat2_url ) && '#services' !== $cat2_url ) ? 'window.location.href=\'' . esc_js( $cat2_url ) . '\'' : 'openQuoteModal(\'Apple iPhone Precision Repair\')'; ?>">
        <span class="cat-badge" style="--badge-bg: #e0f2fe; --badge-color: #0369a1;"><?php echo esc_html( mp_opt( 'cat2_count', 'Level 4 Lab' ) ); ?></span>
        <div class="cat-visual" style="--icon-bg: #f0f9ff; --icon-border: rgba(2, 132, 199, 0.2); --icon-color: #0284c7;">
          <svg viewBox="0 0 24 24"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"></path></svg>
        </div>
        <h3 class="cat-title"><?php echo esc_html( mp_opt( 'cat2_title', 'Certified Apple Fix' ) ); ?></h3>
        <p class="cat-desc"><?php echo esc_html( mp_opt( 'cat2_sub', 'iPhone Screen, Battery & IC Lab' ) ); ?></p>
        <span class="cat-link"><?php echo esc_html( $clean_cat_hint( 'cat2_hint', 'View Repair Board' ) ); ?> <span>&rarr;</span></span>
      </article>

      <!-- 3. Audio & Power Gear -->
      <?php $cat3_url = mp_opt( 'cat3_url', '' ); ?>
      <article class="cat-card" style="--card-tint: rgba(99, 102, 241, 0.08); --card-border-hover: #6366f1;" onclick="<?php echo ( ! empty( $cat3_url ) && '#catalog' !== $cat3_url ) ? 'window.location.href=\'' . esc_js( $cat3_url ) . '\'' : 'filterCatalogByBrand(\'Accessories & Gear\')'; ?>">
        <span class="cat-badge" style="--badge-bg: #eef2ff; --badge-color: #4338ca;"><?php echo esc_html( mp_opt( 'cat3_count', 'Hi-Res Audio' ) ); ?></span>
        <div class="cat-visual" style="--icon-bg: #f5f7ff; --icon-border: rgba(99, 102, 241, 0.2); --icon-color: #6366f1;">
          <svg viewBox="0 0 24 24"><path d="M3 18v-6a9 9 0 0 1 18 0v6"></path><path d="M21 19a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3zM3 19a2 2 0 0 0 2 2h1a2 2 0 0 0 2-2v-3a2 2 0 0 0-2-2H3z"></path></svg>
        </div>
        <h3 class="cat-title"><?php echo esc_html( mp_opt( 'cat3_title', 'Audio & Power Gear' ) ); ?></h3>
        <p class="cat-desc"><?php echo esc_html( mp_opt( 'cat3_sub', 'AirPods, Neckbands & ANC Studio Sound' ) ); ?></p>
        <span class="cat-link"><?php echo esc_html( $clean_cat_hint( 'cat3_hint', 'Explore Studio' ) ); ?> <span>&rarr;</span></span>
      </article>

      <!-- 4. iPads & Tablets -->
      <?php $cat4_url = mp_opt( 'cat4_url', '' ); ?>
      <article class="cat-card" style="--card-tint: rgba(13, 148, 136, 0.08); --card-border-hover: #0d9488;" onclick="<?php echo ( ! empty( $cat4_url ) && '#catalog' !== $cat4_url ) ? 'window.location.href=\'' . esc_js( $cat4_url ) . '\'' : 'triggerToast(\'Viewing Tablets & Smartwatches\')'; ?>">
        <span class="cat-badge" style="--badge-bg: #ccfbf1; --badge-color: #0f766e;"><?php echo esc_html( mp_opt( 'cat4_count', 'Retina Display' ) ); ?></span>
        <div class="cat-visual" style="--icon-bg: #f0fdfa; --icon-border: rgba(13, 148, 136, 0.2); --icon-color: #0d9488;">
          <svg viewBox="0 0 24 24"><rect x="4" y="2" width="16" height="20" rx="2"></rect><circle cx="12" cy="14" r="4"></circle><line x1="12" y1="2" x2="12" y2="6"></line><line x1="12" y1="18" x2="12" y2="22"></line></svg>
        </div>
        <h3 class="cat-title"><?php echo esc_html( mp_opt( 'cat4_title', 'iPads & Tablets' ) ); ?></h3>
        <p class="cat-desc"><?php echo esc_html( mp_opt( 'cat4_sub', 'Calling, AMOLED Tabs & Fitness Wearables' ) ); ?></p>
        <span class="cat-link"><?php echo esc_html( $clean_cat_hint( 'cat4_hint', 'Discover Watches' ) ); ?> <span>&rarr;</span></span>
      </article>

      <!-- 5. Chargers & Glass -->
      <?php $cat5_url = mp_opt( 'cat5_url', '' ); ?>
      <article class="cat-card" style="--card-tint: rgba(245, 158, 11, 0.08); --card-border-hover: #f59e0b;" onclick="<?php echo ( ! empty( $cat5_url ) && '#catalog' !== $cat5_url ) ? 'window.location.href=\'' . esc_js( $cat5_url ) . '\'' : 'triggerToast(\'GaN Chargers & 9H Armor Glass\')'; ?>">
        <span class="cat-badge" style="--badge-bg: #fef3c7; --badge-color: #b45309;"><?php echo esc_html( mp_opt( 'cat5_count', 'GaN Fast Charge' ) ); ?></span>
        <div class="cat-visual" style="--icon-bg: #fffbeb; --icon-border: rgba(245, 158, 11, 0.25); --icon-color: #d97706;">
          <svg viewBox="0 0 24 24"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>
        </div>
        <h3 class="cat-title"><?php echo esc_html( mp_opt( 'cat5_title', 'Chargers & Glass' ) ); ?></h3>
        <p class="cat-desc"><?php echo esc_html( mp_opt( 'cat5_sub', '20W–120W Adapters & 9H Armor Glass' ) ); ?></p>
        <span class="cat-link"><?php echo esc_html( $clean_cat_hint( 'cat5_hint', 'View Protection' ) ); ?> <span>&rarr;</span></span>
      </article>

      <!-- 6. eSewa & Banking -->
      <?php $cat6_url = mp_opt( 'cat6_url', '' ); ?>
      <article class="cat-card" style="--card-tint: rgba(16, 185, 129, 0.08); --card-border-hover: #10b981;" onclick="<?php echo ( ! empty( $cat6_url ) && '#contact' !== $cat6_url ) ? 'window.location.href=\'' . esc_js( $cat6_url ) . '\'' : 'triggerToast(\'Connecting to Gulariya Banking Counter\')'; ?>">
        <span class="cat-badge" style="--badge-bg: #d1fae5; --badge-color: #047857;"><?php echo esc_html( mp_opt( 'cat6_count', 'Verified Merchant' ) ); ?></span>
        <div class="cat-visual" style="--icon-bg: #ecfdf5; --icon-border: rgba(16, 185, 129, 0.2); --icon-color: #10b981;">
          <svg viewBox="0 0 24 24"><rect x="2" y="5" width="20" height="14" rx="2"></rect><line x1="2" y1="10" x2="22" y2="10"></line><line x1="6" y1="15" x2="8" y2="15"></line></svg>
        </div>
        <h3 class="cat-title"><?php echo esc_html( mp_opt( 'cat6_title', 'eSewa & Banking' ) ); ?></h3>
        <p class="cat-desc"><?php echo esc_html( mp_opt( 'cat6_sub', 'Instant Top-Up, Utility Bills & Money Transfer' ) ); ?></p>
        <span class="cat-link"><?php echo esc_html( $clean_cat_hint( 'cat6_hint', 'Counter Agent' ) ); ?> <span>&rarr;</span></span>
      </article>
    </div>
  </div>
</section>

<!-- ================= 3. SHOP BY VERIFIED BRAND ================= -->
<section class="section-wrap" id="brands">
  <div class="tech-bg-grid" aria-hidden="true"></div>
  <div class="tech-ring-accent" aria-hidden="true"></div>

  <div class="container">
    <div class="section-header">
      <div class="section-header-copy">
        <span class="eyebrow"><?php echo esc_html( mp_opt( 'brands_kicker', 'OFFICIAL SHOWROOM DISTRIBUTORS' ) ); ?></span>
        <h2 class="section-title"><?php echo esc_html( mp_opt( 'brands_title', 'Shop by Verified Brand' ) ); ?></h2>
        <p class="section-subtitle"><?php echo esc_html( mp_opt( 'brands_subtitle', 'Authentic distributor warranties across Nepal for Apple, Samsung, Google Pixel, OnePlus, and Xiaomi.' ) ); ?></p>
      </div>
      <a href="<?php echo esc_url( mp_opt( 'brands_btn_url', '#catalog' ) ); ?>" class="view-all-pill">
        <?php echo esc_html( mp_opt( 'brands_btn_text', 'Explore All Brands' ) ); ?> <span>→</span>
      </a>
    </div>

    <div class="brand-grid">
      <!-- 1. Apple -->
      <article class="brand-card" style="--brand-accent: #1d1d1f; --brand-badge-bg: #f5f5f7;" onclick="filterCatalogByBrand('Apple iPhone')">
        <div class="brand-logo-pod">
          <svg viewBox="0 0 170 170"><path fill="#1d1d1f" d="M150.37 130.25c-2.45 5.66-5.35 10.87-8.71 15.66-4.58 6.53-8.33 11.05-11.22 13.56-4.48 4.12-9.28 6.23-14.42 6.35-3.69 0-8.14-1.05-13.32-3.18-5.19-2.12-9.97-3.17-14.34-3.17-4.58 0-9.49 1.05-14.75 3.17-5.26 2.13-9.5 3.24-12.74 3.35-4.35.13-9.16-1.9-14.42-6.08-3.92-3.39-8.03-8.48-12.33-15.28-6.09-9.59-10.98-20.2-14.67-31.84-3.69-11.63-5.54-22.75-5.54-33.35 0-14.4 3.58-26.4 10.74-35.98 7.16-9.59 16.51-14.54 28.05-14.86 4.35 0 9.4 1.13 15.15 3.39 5.75 2.26 9.38 3.44 10.89 3.55 1.95-.22 5.91-1.52 11.89-3.9 5.98-2.38 10.94-3.35 14.88-2.92 14.07 1.17 24.96 6.31 32.68 15.42-12.33 7.49-18.39 17.65-18.17 30.49.22 10.07 4.13 18.52 11.73 25.35 7.6 6.84 16.56 10.66 26.89 11.48-2.18 6.94-4.8 13.91-7.86 20.91zM119.22 31.84c0-7.05 2.56-13.79 7.69-20.22 5.13-6.42 11.53-10.74 19.2-12.95.87 6.4-1.12 12.87-5.96 19.41-4.85 6.54-11.08 10.97-18.69 13.29-.44-.87-.84-2.1-1.2-3.69-.65-2.61-1.04-4.66-1.04-6.14z"/></svg>
        </div>
        <span class="brand-badge"><?php echo esc_html( mp_opt( 'brand1_chip', 'Authorized Sales' ) ); ?></span>
        <h3 class="brand-name"><?php echo esc_html( mp_opt( 'brand1_name', 'Apple' ) ); ?></h3>
        <p class="brand-models"><?php echo esc_html( mp_opt( 'brand1_sub', 'iPhone 16 / 15 / 14 Series' ) ); ?></p>
        <button class="brand-btn" type="button">Filter iPhone <span>→</span></button>
      </article>

      <!-- 2. Samsung -->
      <article class="brand-card" style="--brand-accent: #034EA2; --brand-badge-bg: #eaf1fa;" onclick="filterCatalogByBrand('Samsung Galaxy')">
        <div class="brand-logo-pod">
          <svg viewBox="0 0 120 40"><text x="50%" y="26" font-family="'DM Sans', Arial, sans-serif" font-weight="900" font-size="20" fill="#034EA2" text-anchor="middle" letter-spacing="1">SAMSUNG</text></svg>
        </div>
        <span class="brand-badge"><?php echo esc_html( mp_opt( 'brand2_chip', 'Nepal Warranty' ) ); ?></span>
        <h3 class="brand-name"><?php echo esc_html( mp_opt( 'brand2_name', 'Samsung' ) ); ?></h3>
        <p class="brand-models"><?php echo esc_html( mp_opt( 'brand2_sub', 'Galaxy S24 Ultra & A Series' ) ); ?></p>
        <button class="brand-btn" type="button">Filter Galaxy <span>→</span></button>
      </article>

      <!-- 3. Google Pixel -->
      <article class="brand-card" style="--brand-accent: #4285F4; --brand-badge-bg: #eff5ff;" onclick="filterCatalogByBrand('Google Pixel')">
        <div class="brand-logo-pod">
          <svg viewBox="0 0 48 48"><path fill="#EA4335" d="M24 9.5c3.54 0 6.71 1.22 9.21 3.6l6.85-6.85C35.9 2.38 30.47 0 24 0 14.62 0 6.51 5.38 2.56 13.22l7.98 6.19C12.43 13.72 17.74 9.5 24 9.5z"/><path fill="#4285F4" d="M46.98 24.55c0-1.57-.15-3.09-.38-4.55H24v9.02h12.94c-.58 2.96-2.26 5.48-4.78 7.18l7.73 6c4.51-4.18 7.09-10.36 7.09-17.65z"/><path fill="#FBBC05" d="M10.53 28.59c-.48-1.45-.76-2.99-.76-4.59s.27-3.14.76-4.59l-7.98-6.19C.92 16.46 0 20.12 0 24c0 3.88.92 7.54 2.56 10.78l7.97-6.19z"/><path fill="#34A853" d="M24 48c6.48 0 11.93-2.13 15.89-5.81l-7.73-6c-2.15 1.45-4.92 2.3-8.16 2.3-6.26 0-11.57-4.22-13.47-9.91l-7.98 6.19C6.51 42.62 14.62 48 24 48z"/></svg>
        </div>
        <span class="brand-badge"><?php echo esc_html( mp_opt( 'brand3_chip', 'Direct Import & NTA' ) ); ?></span>
        <h3 class="brand-name"><?php echo esc_html( mp_opt( 'brand3_name', 'Google Pixel' ) ); ?></h3>
        <p class="brand-models"><?php echo esc_html( mp_opt( 'brand3_sub', 'Pixel 9 / 8 & Tensor AI' ) ); ?></p>
        <button class="brand-btn" type="button">Filter Pixel <span>→</span></button>
      </article>

      <!-- 4. OnePlus -->
      <article class="brand-card featured" style="--brand-accent: #eb0028; --brand-badge-bg: #fee2e2;" onclick="filterCatalogByBrand('OnePlus')">
        <div class="brand-logo-pod">
          <svg viewBox="0 0 54 54"><rect x="7" y="7" width="40" height="40" rx="9" fill="#eb0028" /><path d="M22 17v20M20 20l2-3M31 23v8M27 27h8" stroke="#ffffff" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" /></svg>
        </div>
        <span class="brand-badge"><?php echo esc_html( mp_opt( 'brand4_chip', 'Hassle-Free Care' ) ); ?></span>
        <h3 class="brand-name"><?php echo esc_html( mp_opt( 'brand4_name', 'OnePlus' ) ); ?></h3>
        <p class="brand-models"><?php echo esc_html( mp_opt( 'brand4_sub', 'OnePlus 12 & Nord 4' ) ); ?></p>
        <button class="brand-btn" type="button">Filter OnePlus <span>→</span></button>
      </article>

      <!-- 5. Xiaomi -->
      <article class="brand-card" style="--brand-accent: #ff6900; --brand-badge-bg: #ffedd5;" onclick="filterCatalogByBrand('Xiaomi / Redmi')">
        <div class="brand-logo-pod">
          <svg viewBox="0 0 54 54"><rect x="7" y="7" width="40" height="40" rx="10" fill="#ff6900"/><text x="50%" y="34" font-family="'DM Sans', Arial, sans-serif" font-weight="900" font-size="18" fill="#ffffff" text-anchor="middle">mi</text></svg>
        </div>
        <span class="brand-badge"><?php echo esc_html( mp_opt( 'brand5_chip', 'Service Guaranteed' ) ); ?></span>
        <h3 class="brand-name"><?php echo esc_html( mp_opt( 'brand5_name', 'Xiaomi' ) ); ?></h3>
        <p class="brand-models"><?php echo esc_html( mp_opt( 'brand5_sub', 'Xiaomi 14 & Redmi Note 13' ) ); ?></p>
        <button class="brand-btn" type="button">Filter Redmi <span>→</span></button>
      </article>

      <!-- 6. Verified Accessories -->
      <article class="brand-card" style="--brand-accent: #059669; --brand-badge-bg: #d1fae5;" onclick="filterCatalogByBrand('Accessories & Gear')">
        <div class="brand-logo-pod">
          <svg viewBox="0 0 24 24" fill="none" stroke="#059669" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
        </div>
        <span class="brand-badge"><?php echo esc_html( mp_opt( 'brand6_chip', '100% Genuine' ) ); ?></span>
        <h3 class="brand-name"><?php echo esc_html( mp_opt( 'brand6_name', 'Accessories' ) ); ?></h3>
        <p class="brand-models"><?php echo esc_html( mp_opt( 'brand6_sub', 'AirPods, Watch & Anker Fast PD' ) ); ?></p>
        <button class="brand-btn" type="button">Filter Gear <span>→</span></button>
      </article>
    </div>
  </div>
</section>

<!-- ================= 4. REDESIGNED FEATURED FLAGSHIP SPOTLIGHT ================= -->
<section class="section-wrap flagship-section" id="flagship">
  <div class="tech-bg-grid" aria-hidden="true"></div>
  <div class="tech-ring-accent" aria-hidden="true"></div>

  <div class="container">
    <div class="flagship-bento-hero">
      <!-- Top Status Banner -->
      <div class="flagship-header-bar">
        <div class="flagship-pill-left">
          <span class="apple-logo-glow">
            <svg width="15" height="15" viewBox="0 0 170 170" fill="currentColor" aria-hidden="true"><path d="M150.37 130.25c-2.45 5.66-5.35 10.87-8.71 15.66-4.58 6.53-8.33 11.05-11.22 13.56-4.48 4.12-9.28 6.23-14.42 6.35-3.69 0-8.14-1.05-13.32-3.18-5.19-2.12-9.97-3.17-14.34-3.17-4.58 0-9.49 1.05-14.75 3.17-5.26 2.13-9.5 3.24-12.74 3.35-4.35.13-9.16-1.9-14.42-6.08-3.69-3.06-7.7-7.85-12.04-14.36-6.19-9.35-11.06-19.78-14.61-31.29-3.56-11.51-5.34-22.37-5.34-32.57 0-14.34 3.65-26.31 10.96-35.91 7.3-9.6 16.59-14.48 27.84-14.65 4.35 0 9.29 1.14 14.82 3.42 5.54 2.28 9.38 3.48 11.53 3.61 1.95-.13 5.86-1.33 11.73-3.61 5.87-2.28 10.74-3.32 14.61-3.12 12.39.63 22.38 5.48 29.98 14.54-10.86 6.53-16.19 15.54-16 27.03.22 9.13 3.65 16.89 10.28 23.28 6.63 6.39 14.38 10.05 23.25 10.98-2.17 6.52-4.67 13.04-7.5 19.56zm-29.47-113.6c0 6.74-2.52 13.04-7.56 17.9-5.04 4.86-11.18 7.68-18.42 8.46-.22-.87-.33-1.84-.33-2.93 0-6.74 2.65-13.3 7.95-18.17 5.3-4.87 11.55-7.54 18.76-8.02.11 1.09.16 2.01.16 2.76z"/></svg>
          </span>
          <span class="flagship-kicker-text"><?php echo esc_html( $spotlight_badge ); ?></span>
        </div>
        <?php if ( ! empty( $spotlight_status ) && 'Sealed Stock Handover Ready at Gulariya Showroom Counter' !== $spotlight_status ) : ?>
        <div class="flagship-live-beacon">
          <span><?php echo esc_html( $spotlight_status ); ?></span>
        </div>
        <?php endif; ?>
      </div>

      <!-- Main Bento Grid -->
      <div class="flagship-bento-grid">
        <!-- Column 1: Core Showcase & Finishes -->
        <div class="flagship-core-column">
          <h2 class="flagship-title-hero"><?php echo esc_html( $spotlight_title ); ?></h2>
          <div class="flagship-tagline-chip"><?php echo esc_html( $spotlight_tag ); ?></div>
          <p class="flagship-lead-p"><?php echo esc_html( $spotlight_desc ); ?></p>

          <!-- Interactive Finishes Console -->
          <div class="finish-interactive-console">
            <span class="finish-console-title"><?php esc_html_e( 'SELECT FINISH / COLOR:', 'mobile-pasal' ); ?></span>
            <div class="finish-chips-row" id="finishSelector">
              <button class="finish-chip active" data-finish="Desert Titanium" data-color="#c5a992" onclick="setFinish('Desert Titanium', '#c5a992')" type="button">
                <span class="finish-circle" style="background: #c5a992;"></span>
                <span class="finish-name">Desert Titanium</span>
              </button>
              <button class="finish-chip" data-finish="Natural Titanium" data-color="#9a958e" onclick="setFinish('Natural Titanium', '#9a958e')" type="button">
                <span class="finish-circle" style="background: #9a958e;"></span>
                <span class="finish-name">Natural Titanium</span>
              </button>
              <button class="finish-chip" data-finish="White Titanium" data-color="#f2f2ee" onclick="setFinish('White Titanium', '#f2f2ee')" type="button">
                <span class="finish-circle" style="background: #f2f2ee;"></span>
                <span class="finish-name">White Titanium</span>
              </button>
              <button class="finish-chip" data-finish="Black Titanium" data-color="#3c3b3f" onclick="setFinish('Black Titanium', '#3c3b3f')" type="button">
                <span class="finish-circle" style="background: #3c3b3f;"></span>
                <span class="finish-name">Black Titanium</span>
              </button>
            </div>
          </div>

          <!-- Bento Micro-Specs Grid -->
          <div class="flagship-bento-specs">
            <div class="spec-bento-pod">
              <div class="spec-pod-icon">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>
              </div>
              <div class="spec-pod-body">
                <strong>A18 Pro Bionic</strong>
                <small>3nm Silicon &amp; 6–Core GPU</small>
              </div>
            </div>
            <div class="spec-bento-pod">
              <div class="spec-pod-icon">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg>
              </div>
              <div class="spec-pod-body">
                <strong>Camera Control</strong>
                <small>Haptic Slide &amp; Click</small>
              </div>
            </div>
            <div class="spec-bento-pod">
              <div class="spec-pod-icon">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
              </div>
              <div class="spec-pod-body">
                <strong>Grade 5 Titanium</strong>
                <small>Micro-Blasted Frame</small>
              </div>
            </div>
            <div class="spec-bento-pod">
              <div class="spec-pod-icon">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line></svg>
              </div>
              <div class="spec-pod-body">
                <strong>NTA Approved IMEI</strong>
                <small>Official Nepal VAT Bill</small>
              </div>
            </div>
          </div>

          <!-- Action Buttons -->
          <div class="flagship-action-row">
            <a class="btn-flagship-wa" id="flagshipWaBtn" href="https://wa.me/<?php echo esc_attr( $clean_p ); ?>?text=Hello%20Ali%20Mobile%20Center,%20please%20quote%20today's%20best%20price%20for%20iPhone%2016%20Pro%20(Desert%20Titanium)%20with%20Nepal%20VAT%20Bill." target="_blank" rel="noopener noreferrer">
              <span>Ask Today's Price on WhatsApp</span>
              <span class="btn-arrow">→</span>
            </a>
            <a class="btn-flagship-call" href="tel:+<?php echo esc_attr( $clean_p ); ?>">
              <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
              <span>Call Store: <?php echo esc_html( $phone ); ?></span>
            </a>
          </div>
        </div>

        <!-- Column 2: 3D Stage Pedestal Showcase -->
        <div class="flagship-stage-column">
          <div class="stage-pedestal-card">
            <div class="stage-floating-chip">
              <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg>
              <span>48MP Fusion • 4K 120fps Dolby Vision</span>
            </div>
            <div class="stage-device-frame">
              <img id="flagshipDisplayImg" src="<?php echo esc_url( $spotlight_img ); ?>" alt="iPhone 16 Pro Flagship" />
            </div>
            <div class="stage-footer-assurances">
              <div class="stage-assurance-pill">
                <svg width="14" height="14" viewBox="0 0 170 170" fill="currentColor" aria-hidden="true" style="vertical-align: -2px; margin-right: 4px;"><path d="M150.37 130.25c-2.45 5.66-5.35 10.87-8.71 15.66-4.58 6.53-8.33 11.05-11.22 13.56-4.48 4.12-9.28 6.23-14.42 6.35-3.69 0-8.14-1.05-13.32-3.18-5.19-2.12-9.97-3.17-14.34-3.17-4.58 0-9.49 1.05-14.75 3.17-5.26 2.13-9.5 3.24-12.74 3.35-4.35.13-9.16-1.9-14.42-6.08-3.69-3.06-7.7-7.85-12.04-14.36-6.19-9.35-11.06-19.78-14.61-31.29-3.56-11.51-5.34-22.37-5.34-32.57 0-14.34 3.65-26.31 10.96-35.91 7.3-9.6 16.59-14.48 27.84-14.65 4.35 0 9.29 1.14 14.82 3.42 5.54 2.28 9.38 3.48 11.53 3.61 1.95-.13 5.86-1.33 11.73-3.61 5.87-2.28 10.74-3.32 14.61-3.12 12.39.63 22.38 5.48 29.98 14.54-10.86 6.53-16.19 15.54-16 27.03.22 9.13 3.65 16.89 10.28 23.28 6.63 6.39 14.38 10.05 23.25 10.98-2.17 6.52-4.67 13.04-7.5 19.56zm-29.47-113.6c0 6.74-2.52 13.04-7.56 17.9-5.04 4.86-11.18 7.68-18.42 8.46-.22-.87-.33-1.84-.33-2.93 0-6.74 2.65-13.3 7.95-18.17 5.3-4.87 11.55-7.54 18.76-8.02.11 1.09.16 2.01.16 2.76z"/></svg>
                <span>Apple Intelligence Ready</span>
              </div>
              <div class="stage-assurance-pill pill-verified">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="vertical-align: -2px; margin-right: 4px;"><polyline points="20 6 9 17 4 12"></polyline></svg>
                <span>1-Year Official Warranty</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= 5. SHOWROOM CATALOG WITH LEFT FILTERS ================= -->
<section class="section-wrap" id="catalog">
  <div class="tech-bg-grid" aria-hidden="true"></div>
  <div class="tech-ring-accent tech-ring-right" aria-hidden="true"></div>

  <div class="container">
    <div class="section-header">
      <div class="section-header-copy">
        <span class="eyebrow"><?php echo esc_html( mp_opt( 'catalog_kicker', 'SHOWROOM CATALOG' ) ); ?></span>
        <h2 class="section-title"><?php echo esc_html( mp_opt( 'catalog_title', 'Latest Smartphone Arrivals &amp; Top Models' ) ); ?></h2>
        <p class="section-subtitle"><?php echo esc_html( mp_opt( 'catalog_subtitle', 'Every handset is checked, unboxed or sealed-pack with official VAT bill &amp; warranty. Filter by brand or search your model.' ) ); ?></p>
      </div>
      <button class="view-all-pill" onclick="resetCatalogFilters()" type="button">
        <span>Reset Filters</span>
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="1 4 1 10 7 10"></polyline><path d="M3.51 15a9 9 0 1 0 2.13-9.36L1 10"></path></svg>
      </button>
    </div>

    <div class="catalog-layout">
      <!-- Left Sidebar Filters -->
      <aside class="filter-sidebar">
        <div class="filter-header">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="4" y1="21" x2="4" y2="14"></line><line x1="4" y1="10" x2="4" y2="3"></line><line x1="12" y1="21" x2="12" y2="12"></line><line x1="12" y1="8" x2="12" y2="3"></line><line x1="20" y1="21" x2="20" y2="16"></line><line x1="20" y1="12" x2="20" y2="3"></line><line x1="1" y1="14" x2="7" y2="14"></line><line x1="9" y1="8" x2="15" y2="8"></line><line x1="17" y1="16" x2="23" y2="16"></line></svg>
          <span>Filters</span>
        </div>

        <div class="filter-group">
          <div class="filter-label">SEARCH MODELS</div>
          <div class="search-input-wrap">
            <span class="search-icon">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
            </span>
            <input type="text" id="catalogSearch" placeholder="Search iPhone, Galaxy, Charger..." oninput="filterCatalog()" />
          </div>
        </div>

        <div class="filter-group">
          <div class="filter-label"><?php esc_html_e( 'BRAND & ECOSYSTEM', 'mobile-pasal' ); ?></div>
          <div class="filter-options">
            <label class="filter-radio-label active"><input type="radio" name="brandFilter" value="all" checked onchange="filterCatalog()"> <?php esc_html_e( 'All Handsets', 'mobile-pasal' ); ?></label>
            <?php
            $hp_brands = get_terms( array(
                'taxonomy'   => 'device_brand',
                'hide_empty' => true,
            ) );
            if ( ! empty( $hp_brands ) && ! is_wp_error( $hp_brands ) ) :
                foreach ( $hp_brands as $hb ) :
                ?>
                <label class="filter-radio-label"><input type="radio" name="brandFilter" value="<?php echo esc_attr( $hb->name ); ?>" onchange="filterCatalog()"> <?php echo esc_html( $hb->name ); ?></label>
                <?php
                endforeach;
            endif;
            ?>
          </div>
        </div>

        <div class="filter-group" style="margin-bottom:0;">
          <div class="filter-label">BUDGET RANGE (NPR)</div>
          <div class="filter-options">
            <label class="filter-radio-label active"><input type="radio" name="priceFilter" value="all" checked onchange="filterCatalog()"> All Price Ranges</label>
            <label class="filter-radio-label"><input type="radio" name="priceFilter" value="under-30k" onchange="filterCatalog()"> Under Rs. 30,000</label>
            <label class="filter-radio-label"><input type="radio" name="priceFilter" value="30k-75k" onchange="filterCatalog()"> Rs. 30,000 – Rs. 75,000</label>
            <label class="filter-radio-label"><input type="radio" name="priceFilter" value="75k-150k" onchange="filterCatalog()"> Rs. 75,000 – Rs. 1,50,000</label>
            <label class="filter-radio-label"><input type="radio" name="priceFilter" value="above-150k" onchange="filterCatalog()"> Above Rs. 1,50,000</label>
          </div>
        </div>
      </aside>

      <!-- Right Grid Area -->
      <div class="catalog-main">
        <div class="catalog-topbar">
          <div class="catalog-count-pill">
            <span>Verified Handset Catalog</span>
            <span class="catalog-count-badge" id="catalogCount">6 Models Found</span>
          </div>
          <div class="catalog-sort-wrap">
            <label for="catalogSort">Sort by:</label>
            <select id="catalogSort" class="catalog-sort-select" onchange="sortCatalog()">
              <option value="featured">Featured / Newest</option>
              <option value="low-high">Price: Low to High</option>
              <option value="high-low">Price: High to Low</option>
            </select>
          </div>
        </div>

        <div class="products-grid" id="productsGrid">
          <!-- Live catalog rendered via JavaScript with instant filtering -->
        </div>

        <!-- Homepage Handset Catalog Pagination System -->
        <div class="shop-pagination-wrapper" id="homePaginationWrapper" style="display: none; margin-top: 36px;">
          <div class="shop-pagination" id="homePaginationControls"></div>
          <div class="shop-pagination-info" id="homePaginationInfo"></div>
        </div>

        <?php
        $hp_global_show_price = mp_opt( 'handset_show_price', '1' );
        $hp_hidden_price_text = mp_opt( 'handset_hidden_price_text', __( 'Contact for Counter Price', 'mobile-pasal' ) );
        $hp_wa_number         = mp_opt( 'whatsapp_number', '9779804530786' );
        $hp_clean_p           = preg_replace( '/[^0-9]/', '', $hp_wa_number );

        $hp_handsets_query = new WP_Query( array(
            'post_type'           => 'handset',
            'posts_per_page'      => 48,
            'post_status'         => 'publish',
            'ignore_sticky_posts' => 1,
        ) );

        $hp_catalog_items = array();
        if ( $hp_handsets_query->have_posts() ) {
            while ( $hp_handsets_query->have_posts() ) {
                $hp_handsets_query->the_post();
                $h_id       = get_the_ID();
                $h_title    = get_the_title();
                $permalink  = get_permalink( $h_id );
                $badge      = get_post_meta( $h_id, '_mp_badge', true ) ?: __( 'Official VAT Bill', 'mobile-pasal' );
                $price      = get_post_meta( $h_id, '_mp_price', true );
                $old_price  = get_post_meta( $h_id, '_mp_old_price', true );
                $img_url    = function_exists( 'mp_get_handset_img_url' ) ? mp_get_handset_img_url( $h_id ) : get_the_post_thumbnail_url( $h_id, 'medium' );

                $is_price_visible = function_exists( 'mp_is_handset_price_visible' ) ? mp_is_handset_price_visible( $h_id ) : ! empty( $price );
                $price_fmt        = is_numeric( $price ) ? 'Rs. ' . number_format( (float) $price ) : $price;
                $old_price_fmt    = ( is_numeric( $old_price ) && (float) $old_price > (float) $price ) ? 'Rs. ' . number_format( (float) $old_price ) : ( ( ! empty( $old_price ) && $old_price !== $price ) ? $old_price : '' );
                $numeric_price    = (int) preg_replace( '/[^0-9]/', '', (string) $price );

                $spec_screen   = get_post_meta( $h_id, '_mp_spec_screen', true ) ?: get_post_meta( $h_id, '_mp_display', true );
                $spec_chip     = get_post_meta( $h_id, '_mp_spec_chip', true ) ?: get_post_meta( $h_id, '_mp_processor', true );
                $spec_camera   = get_post_meta( $h_id, '_mp_spec_camera', true ) ?: get_post_meta( $h_id, '_mp_camera', true );
                $spec_battery  = get_post_meta( $h_id, '_mp_spec_battery', true ) ?: get_post_meta( $h_id, '_mp_battery', true );
                $storage_meta  = get_post_meta( $h_id, '_mp_spec_storage', true );
                $spec_warranty = get_post_meta( $h_id, '_mp_spec_warranty', true ) ?: __( '1 Year Official Warranty', 'mobile-pasal' );
                $specs_arr     = array_values( array_filter( array( $spec_screen, $spec_chip, $storage_meta ) ) );

                $brand_terms = get_the_terms( $h_id, 'device_brand' );
                $brand_name  = ! empty( $brand_terms ) && ! is_wp_error( $brand_terms ) ? $brand_terms[0]->name : ( get_post_meta( $h_id, '_mp_brand', true ) ?: 'Handset' );
                $brand_slug  = ! empty( $brand_terms ) && ! is_wp_error( $brand_terms ) ? $brand_terms[0]->slug : 'all';

                $cat_terms   = get_the_terms( $h_id, 'device_category' );
                $cat_name    = ! empty( $cat_terms ) && ! is_wp_error( $cat_terms ) ? $cat_terms[0]->name : $brand_name;

                $wa_msg = sprintf(
                    __( 'Namaste Ali Mobile, ma tapaiharuko website ma %s herera aako chhu. Gulariya counter ma availability ra rate confirm gardinus na.', 'mobile-pasal' ),
                    $h_title
                );
                $wa_url = 'https://wa.me/' . esc_attr( $hp_clean_p ) . '?text=' . rawurlencode( $wa_msg );

                $hp_catalog_items[] = array(
                    'id'              => $h_id,
                    'name'            => $h_title,
                    'url'             => $permalink,
                    'img'             => $img_url,
                    'brand'           => $brand_name,
                    'brandSlug'       => $brand_slug,
                    'categoryTag'     => $cat_name,
                    'tag'             => $badge,
                    'specs'           => $specs_arr,
                    'screen'          => $spec_screen ?: '—',
                    'chip'            => $spec_chip ?: '—',
                    'camera'          => $spec_camera ?: '—',
                    'battery'         => $spec_battery ?: '—',
                    'storage'         => $storage_meta ?: '—',
                    'warranty'        => $spec_warranty,
                    'price'           => $numeric_price,
                    'priceFmt'        => $price_fmt,
                    'oldPriceFmt'     => $old_price_fmt,
                    'isPriceVisible'  => $is_price_visible,
                    'hiddenPriceText' => $hp_hidden_price_text,
                    'waUrl'           => $wa_url,
                );
            }
            wp_reset_postdata();
        }
        ?>
        <script>
        window.mpCatalogData = <?php echo json_encode( $hp_catalog_items ); ?>;
        </script>
      </div>
    </div>
  </div>
</section>

<!-- ================= 6. REDESIGNED CLEANROOM LAB BENCH SETUP ================= -->
<section class="section-wrap lab-section" id="lab">
  <div class="tech-bg-grid" aria-hidden="true"></div>
  <div class="tech-ring-accent tech-ring-right" aria-hidden="true"></div>

  <div class="container">
    <div class="cleanroom-showcase-card">
      <!-- Top Live Status Header -->
      <div class="cleanroom-top-bar">
        <div class="cleanroom-badge-pill">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"></path></svg>
          <span><?php echo esc_html( $lab_badge ); ?></span>
        </div>
        <div class="cleanroom-live-pill">
          <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
          <span><?php echo esc_html( $lab_live_status ); ?></span>
        </div>
      </div>

      <!-- Main Split Grid -->
      <div class="cleanroom-split-grid">
        <!-- Left Column: Visual Laboratory Desk & Live Telemetry -->
        <div class="cleanroom-visual-column">
          <div class="cleanroom-photo-frame">
            <img src="<?php echo esc_url( $lab_img ); ?>" alt="<?php esc_attr_e( 'Cleanroom microscope repair lab technicians', 'mobile-pasal' ); ?>" loading="lazy" />
            <div class="cleanroom-photo-overlay-tag">
              <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#38bdf8" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
              <span><?php echo esc_html( $lab_tagline ); ?></span>
            </div>
          </div>

          <!-- Integrated 3-Stat Telemetry Pods -->
          <div class="cleanroom-stats-grid">
            <div class="cleanroom-stat-card">
              <span class="stat-number-val"><?php echo esc_html( $lab_s1_n ); ?></span>
              <span class="stat-label-text"><?php echo esc_html( $lab_s1_l ); ?></span>
            </div>
            <div class="cleanroom-stat-card">
              <span class="stat-number-val"><?php echo esc_html( $lab_s2_n ); ?></span>
              <span class="stat-label-text"><?php echo esc_html( $lab_s2_l ); ?></span>
            </div>
            <div class="cleanroom-stat-card">
              <span class="stat-number-val"><?php echo esc_html( $lab_s3_n ); ?></span>
              <span class="stat-label-text"><?php echo esc_html( $lab_s3_l ); ?></span>
            </div>
          </div>
        </div>

        <!-- Right Column: Precision Technical Experience & Features -->
        <div class="cleanroom-content-column">
          <h2 class="cleanroom-heading"><?php echo esc_html( $lab_title ); ?></h2>
          <p class="cleanroom-lead-text"><?php echo esc_html( $lab_desc ); ?></p>

          <div class="cleanroom-features-list">
            <!-- Feature 1: Screen Replacement -->
            <div class="cleanroom-feature-row">
              <div class="feature-icon-pod">
                <?php echo mp_get_icon_svg( $lab_feat1_icon, 22, 22 ); ?>
              </div>
              <div class="feature-text-wrap">
                <div class="feature-header-line">
                  <h3 class="feature-title-item"><?php echo esc_html( $lab_f1_h ); ?></h3>
                  <span class="feature-status-chip chip-green"><?php echo esc_html( $lab_feat1_chip ); ?></span>
                </div>
                <p class="feature-desc-item"><?php echo wp_kses_post( $lab_f1_d ); ?></p>
              </div>
            </div>

            <!-- Feature 2: Battery Health Calibration -->
            <div class="cleanroom-feature-row">
              <div class="feature-icon-pod">
                <?php echo mp_get_icon_svg( $lab_feat2_icon, 22, 22 ); ?>
              </div>
              <div class="feature-text-wrap">
                <div class="feature-header-line">
                  <h3 class="feature-title-item"><?php echo esc_html( $lab_f2_h ); ?></h3>
                  <span class="feature-status-chip chip-blue"><?php echo esc_html( $lab_feat2_chip ); ?></span>
                </div>
                <p class="feature-desc-item"><?php echo wp_kses_post( $lab_f2_d ); ?></p>
              </div>
            </div>

            <!-- Feature 3: In-Front-Of-You Transparency -->
            <div class="cleanroom-feature-row">
              <div class="feature-icon-pod">
                <?php echo mp_get_icon_svg( $lab_feat3_icon, 22, 22 ); ?>
              </div>
              <div class="feature-text-wrap">
                <div class="feature-header-line">
                  <h3 class="feature-title-item"><?php echo esc_html( $lab_f3_h ); ?></h3>
                  <span class="feature-status-chip chip-purple"><?php echo esc_html( $lab_feat3_chip ); ?></span>
                </div>
                <p class="feature-desc-item"><?php echo wp_kses_post( $lab_f3_d ); ?></p>
              </div>
            </div>
          </div>

          <!-- Action Buttons -->
          <div class="cleanroom-actions-bar">
            <a class="btn-cleanroom-wa" href="https://wa.me/<?php echo esc_attr( $clean_p ); ?>?text=Hello%20Ali%20Mobile%20Lab,%20I%20would%20like%20to%20consult%20with%20your%20technician%20about%20a%20hardware%20issue." target="_blank" rel="noopener noreferrer">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0 0 12.04 2m.01 1.67c2.2 0 4.26.86 5.82 2.42a8.225 8.225 0 0 1 2.41 5.83c0 4.54-3.7 8.24-8.24 8.24-1.48 0-2.93-.4-4.2-1.15l-.3-.18-3.12.82.83-3.04-.2-.31a8.196 8.196 0 0 1-1.26-4.38c0-4.54 3.7-8.24 8.24-8.24m4.52 11.66c-.25-.13-1.47-.72-1.7-.81-.23-.08-.39-.13-.56.13-.17.25-.64.81-.79.97-.14.17-.29.19-.54.06-.25-.13-1.05-.39-2-1.23-.74-.66-1.24-1.47-1.39-1.72-.14-.25-.02-.39.11-.51.11-.11.25-.29.37-.43.13-.14.17-.25.25-.41.08-.17.04-.31-.02-.44-.06-.13-.56-1.34-.76-1.84-.2-.49-.4-.42-.56-.43h-.47c-.17 0-.44.06-.67.31-.23.25-.87.85-.87 2.08 0 1.23.9 2.41 1.02 2.58.13.17 1.76 2.69 4.27 3.77.6.26 1.07.41 1.43.53.6.19 1.15.16 1.58.1.48-.07 1.47-.6 1.68-1.18.21-.58.21-1.07.15-1.18-.06-.11-.23-.17-.48-.29z"/></svg>
              <span><?php echo esc_html( $lab_btn1_text ); ?></span>
              <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
            </a>
            <a class="btn-cleanroom-call" href="tel:+<?php echo esc_attr( $clean_p ); ?>">
              <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
              <span><?php printf( esc_html__( '%s (%s)', 'mobile-pasal' ), esc_html( $lab_btn2_prefix ), esc_html( $phone ) ); ?></span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= 7. COMPLETE COUNTER REPAIR SERVICES ================= -->
<section class="section-wrap" id="repairs">
  <div class="tech-bg-grid" aria-hidden="true"></div>
  <div class="tech-ring-accent" aria-hidden="true"></div>

  <div class="container">
    <div class="section-header">
      <div class="section-header-copy">
        <span class="eyebrow"><?php echo esc_html( mp_opt( 'services_kicker', 'DIAGNOSTICS & SOLUTIONS' ) ); ?></span>
        <h2 class="section-title"><?php echo esc_html( mp_opt( 'services_title', 'Complete Counter Repair Services' ) ); ?></h2>
        <p class="section-subtitle"><?php echo esc_html( mp_opt( 'services_subtitle', 'From Apple iPhone to Samsung Galaxy and Xiaomi devices, all repairs are performed with original-grade parts and live customer inspection.' ) ); ?></p>
      </div>
      <button class="view-all-pill" onclick="openQuoteModal('General Mobile Repair Service')" type="button"><?php echo esc_html( mp_opt( 'services_header_btn_text', 'Ask Instant Quote' ) ); ?> <span>→</span></button>
    </div>

    <div class="diagnostics-grid">
      <!-- 1. Charging Port -->
      <article class="diag-card">
        <div class="diag-topbar">
          <div class="diag-icon">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>
          </div>
          <span class="diag-time-pill">30–45 Minutes</span>
        </div>
        <h3 class="diag-title">Charging Port &amp; Lightning/Type-C Replacement</h3>
        <p class="diag-desc">Precision debris extraction, ultrasonic contact cleaning, or full flex ribbon assembly replacement to restore maximum wattage fast charging.</p>
        <div class="diag-bottom">
          <span class="diag-price">From Rs. 1,500</span>
          <span class="diag-link" onclick="openQuoteModal('Charging Port Replacement')">Inquire Quote →</span>
        </div>
      </article>

      <!-- 2. Camera Module -->
      <article class="diag-card">
        <div class="diag-topbar">
          <div class="diag-icon">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg>
          </div>
          <span class="diag-time-pill">60–90 Minutes</span>
        </div>
        <h3 class="diag-title">Camera Module &amp; OIS Sensor Repair</h3>
        <p class="diag-desc">Replacing cracked external sapphire lens caps and restoring optical image stabilization modules damaged by motorcycle handlebar vibration.</p>
        <div class="diag-bottom">
          <span class="diag-price">From Rs. 2,800</span>
          <span class="diag-link" onclick="openQuoteModal('Camera Module Repair')">Inquire Quote →</span>
        </div>
      </article>

      <!-- 3. Logic Board -->
      <article class="diag-card">
        <div class="diag-topbar">
          <div class="diag-icon">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="4" y="4" width="16" height="16" rx="2" ry="2"></rect><rect x="9" y="9" width="6" height="6"></rect><line x1="9" y1="1" x2="9" y2="4"></line><line x1="15" y1="1" x2="15" y2="4"></line><line x1="9" y1="20" x2="9" y2="23"></line><line x1="15" y1="20" x2="15" y2="23"></line><line x1="20" y1="9" x2="23" y2="9"></line><line x1="20" y1="14" x2="23" y2="14"></line><line x1="1" y1="9" x2="4" y2="9"></line><line x1="1" y1="14" x2="4" y2="14"></line></svg>
          </div>
          <span class="diag-time-pill">2–3 Business Days</span>
        </div>
        <h3 class="diag-title">Logic Board &amp; Micro-Soldering (IC Overhaul)</h3>
        <p class="diag-desc">Component-level board surgery under 45x stereo zoom microscope. We replace power management PMUs, baseband chips, and reball soldered chips.</p>
        <div class="diag-bottom">
          <span class="diag-price">From Rs. 4,500</span>
          <span class="diag-link" onclick="openQuoteModal('Logic Board Micro-Soldering')">Inquire Quote →</span>
        </div>
      </article>

      <!-- 4. Water Damage -->
      <article class="diag-card">
        <div class="diag-topbar">
          <div class="diag-icon">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 2.69l5.66 5.66a8 8 0 1 1-11.31 0z"></path></svg>
          </div>
          <span class="diag-time-pill">24–48 Hours</span>
        </div>
        <h3 class="diag-title">Ultrasonic Water &amp; Liquid Damage De-Oxidation</h3>
        <p class="diag-desc">Full motherboard teardown, ultrasonic solvent bath, microscopic corrosion brush, and power rail diagnostics to rescue your critical data.</p>
        <div class="diag-bottom">
          <span class="diag-price">From Rs. 3,500</span>
          <span class="diag-link" onclick="openQuoteModal('Liquid Damage Treatment')">Inquire Quote →</span>
        </div>
      </article>

      <!-- 5. Battery Replacement -->
      <article class="diag-card">
        <div class="diag-topbar">
          <div class="diag-icon">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="1" y="6" width="18" height="12" rx="2" ry="2"></rect><line x1="23" y1="13" x2="23" y2="11"></line></svg>
          </div>
          <span class="diag-time-pill">30–45 Minutes</span>
        </div>
        <h3 class="diag-title">OEM High-Capacity Battery Replacement</h3>
        <p class="diag-desc">New grade-A zero-cycle cobalt lithium cells with BMS micro-welding to preserve genuine battery health percentage without error popups.</p>
        <div class="diag-bottom">
          <span class="diag-price">From Rs. 1,800</span>
          <span class="diag-link" onclick="openQuoteModal('Battery Replacement')">Inquire Quote →</span>
        </div>
      </article>

      <!-- 6. Display Replacement -->
      <article class="diag-card">
        <div class="diag-topbar">
          <div class="diag-icon">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="5" y="2" width="14" height="20" rx="2" ry="2"></rect><line x1="12" y1="18" x2="12.01" y2="18"></line></svg>
          </div>
          <span class="diag-time-pill">45–60 Minutes Express</span>
        </div>
        <h3 class="diag-title">Retina &amp; OLED Display Replacement</h3>
        <p class="diag-desc">Precision cold-press frame laminated OLEDs with 100% True Tone transfer, ambient light sensor calibration, and factory oleophobic coating.</p>
        <div class="diag-bottom">
          <span class="diag-price">From Rs. 2,500</span>
          <span class="diag-link" onclick="openQuoteModal('OLED Screen Replacement')">Inquire Quote →</span>
        </div>
      </article>
    </div>
  </div>
</section>

<!-- ================= 8. TRANSPARENT WORKFLOW ================= -->
<section class="section-wrap" id="workflow">
  <div class="tech-bg-grid" aria-hidden="true"></div>
  <div class="tech-ring-accent tech-ring-right" aria-hidden="true"></div>

  <div class="container">
    <div class="section-header" style="justify-content:center; text-align:center;">
      <div class="section-header-copy" style="max-width:800px;">
        <span class="eyebrow"><?php echo esc_html( mp_opt( 'workflow_kicker', 'TRANSPARENT WORKFLOW' ) ); ?></span>
        <h2 class="section-title"><?php echo esc_html( mp_opt( 'workflow_title', '3–Step Counter Service in Gulariya' ) ); ?></h2>
        <p class="section-subtitle"><?php echo esc_html( mp_opt( 'workflow_subtitle', 'Simple, reliable, and completely open process from diagnosis to handover.' ) ); ?></p>
      </div>
    </div>

    <div class="workflow-grid">
      <div class="step-card">
        <div class="step-number">1</div>
        <h3 class="step-title"><?php echo esc_html( mp_opt( 'workflow_step1_title', 'Free Counter Diagnostic' ) ); ?></h3>
        <p class="step-desc"><?php echo esc_html( mp_opt( 'workflow_step1_desc', 'Bring your phone to Ji. Pra. Ka. Chowk. Our technician inspects hardware symptoms in 5 minutes with exact repair estimate.' ) ); ?></p>
      </div>

      <div class="step-card">
        <div class="step-number">2</div>
        <h3 class="step-title"><?php echo esc_html( mp_opt( 'workflow_step2_title', 'In-Front-Of-You Precision Fix' ) ); ?></h3>
        <p class="step-desc"><?php echo esc_html( mp_opt( 'workflow_step2_desc', 'Watch your repair live across our counter. Genuine parts installed with precision tools, heat beds, and ESD mats.' ) ); ?></p>
      </div>

      <div class="step-card">
        <div class="step-number">3</div>
        <h3 class="step-title"><?php echo esc_html( mp_opt( 'workflow_step3_title', 'Testing & Handover' ) ); ?></h3>
        <p class="step-desc"><?php echo esc_html( mp_opt( 'workflow_step3_desc', 'Multi-point check for touch response, cameras, cellular signal, and battery. Handover with testing warranty.' ) ); ?></p>
      </div>
    </div>
  </div>
</section>

<!-- ================= 9. CARE GUIDES ================= -->
<section class="section-wrap" id="guides">
  <div class="tech-bg-grid" aria-hidden="true"></div>
  <div class="tech-ring-accent" aria-hidden="true"></div>

  <div class="container">
    <div class="section-header">
      <div class="section-header-copy">
        <span class="eyebrow"><?php echo esc_html( mp_opt( 'guides_kicker', 'TECHNICIAN ADVICE' ) ); ?></span>
        <h2 class="section-title"><?php echo esc_html( mp_opt( 'guides_title', 'Phone First–Aid &amp; Care Guides' ) ); ?></h2>
        <p class="section-subtitle"><?php echo esc_html( mp_opt( 'guides_subtitle', 'Practical guidance from our certified technicians on protecting your smartphone before bringing it to our counter.' ) ); ?></p>
      </div>
      <button class="view-all-pill" onclick="triggerToast('Opening Technician Emergency Advice')" type="button"><?php echo esc_html( mp_opt( 'guides_header_btn_text', 'Ask Technician Advice' ) ); ?> <span>→</span></button>
    </div>

    <div class="guides-grid">
      <!-- Guide 1 -->
      <article class="guide-card" onclick="triggerToast('Guide: Handling Shattered Screens')">
        <div class="guide-img-box">
          <span class="guide-badge"><?php echo esc_html( mp_opt( 'guide1_tag', 'DISPLAY EMERGENCY' ) ); ?></span>
          <img src="<?php echo esc_url( mp_opt( 'guide1_img', 'https://images.unsplash.com/photo-1563206767-5b18f218e8de?auto=format&fit=crop&w=800&q=80' ) ); ?>" alt="Cracked phone screen display protocol" loading="lazy" />
        </div>
        <div class="guide-body">
          <h3 class="guide-title"><?php echo esc_html( mp_opt( 'guide1_title', 'Cracked OLED? Prevent Digitizer Failure' ) ); ?></h3>
          <p class="guide-text"><?php echo esc_html( mp_opt( 'guide1_desc', 'Apply transparent packing tape immediately over spiderweb cracks to keep tiny glass shards from puncturing the fragile AMOLED matrix underneath.' ) ); ?></p>
        </div>
      </article>

      <!-- Guide 2 -->
      <article class="guide-card" onclick="triggerToast('Guide: Liquid Emergency Protocols')">
        <div class="guide-img-box">
          <span class="guide-badge"><?php echo esc_html( mp_opt( 'guide2_tag', 'LIQUID PROTOCOL' ) ); ?></span>
          <img src="<?php echo esc_url( mp_opt( 'guide2_img', 'https://images.unsplash.com/photo-1512499617640-c74ae3a79d37?auto=format&fit=crop&w=800&q=80' ) ); ?>" alt="Water damaged smartphone rescue guide" loading="lazy" />
        </div>
        <div class="guide-body">
          <h3 class="guide-title"><?php echo esc_html( mp_opt( 'guide2_title', 'Never Put Wet Phones in Rice' ) ); ?></h3>
          <p class="guide-text"><?php echo esc_html( mp_opt( 'guide2_desc', 'Rice starch gums up charging ports and accelerates internal solder oxidation. Power off instantly and rush your device for ultrasonic de-oxidation.' ) ); ?></p>
        </div>
      </article>

      <!-- Guide 3 -->
      <article class="guide-card" onclick="triggerToast('Guide: Battery Health Preservation')">
        <div class="guide-img-box">
          <span class="guide-badge"><?php echo esc_html( mp_opt( 'guide3_tag', 'BATTERY HEALTH' ) ); ?></span>
          <img src="<?php echo esc_url( mp_opt( 'guide3_img', 'https://images.unsplash.com/photo-1584438784894-089d6a62b8fa?auto=format&fit=crop&w=800&q=80' ) ); ?>" alt="Smartphone battery calibration habits" loading="lazy" />
        </div>
        <div class="guide-body">
          <h3 class="guide-title"><?php echo esc_html( mp_opt( 'guide3_title', 'The 20% to 80% Rule for Li-Ion Cells' ) ); ?></h3>
          <p class="guide-text"><?php echo esc_html( mp_opt( 'guide3_desc', 'Avoid discharging below 15% under Bardiya\'s summer heat. Using GaN trickle-charging blocks prevents terminal expansion and maintains capacity for 3+ years.' ) ); ?></p>
        </div>
      </article>
    </div>
  </div>
</section>

<!-- ================= 10. VERIFIED CUSTOMER REVIEWS (INTERACTIVE CAROUSEL) ================= -->
<section class="section-wrap" id="reviews">
  <div class="tech-bg-grid" aria-hidden="true"></div>
  <div class="tech-ring-accent tech-ring-right" aria-hidden="true"></div>

  <div class="container">
    <div class="section-header">
      <div class="section-header-copy">
        <span class="eyebrow"><?php echo esc_html( mp_opt( 'reviews_kicker', 'VERIFIED LOCAL CUSTOMERS' ) ); ?></span>
        <h2 class="section-title"><?php echo esc_html( mp_opt( 'reviews_title', 'What Gulariya Residents Say' ) ); ?></h2>
        <p class="section-subtitle"><?php echo esc_html( mp_opt( 'reviews_subtitle', 'Real feedback from local smartphone buyers and repair customers across Bardiya district.' ) ); ?></p>
      </div>
      <div class="reviews-header-actions">
        <button type="button" class="mp-write-review-btn" onclick="openReviewModal()">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg>
          <span data-i18n-np="समीक्षा लेख्नुहोस्"><?php esc_html_e( 'Write a Review', 'mobile-pasal' ); ?></span>
        </button>
        <div class="rating-header-badge">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="#f59e0b" aria-hidden="true"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
          <strong><?php echo esc_html( mp_opt( 'reviews_rating_score', '4.9 / 5.0' ) ); ?></strong>
          <span style="color:#78350f; font-weight:600;">(<?php echo esc_html( mp_opt( 'reviews_rating_count_text', '250+ Local Customer Reviews' ) ); ?>)</span>
        </div>
        <div class="reviews-nav-controls">
          <button class="carousel-arrow carousel-prev" id="reviewsPrev" aria-label="<?php esc_attr_e( 'Previous customer reviews', 'mobile-pasal' ); ?>" type="button">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="15 18 9 12 15 6"></polyline></svg>
          </button>
          <button class="carousel-arrow carousel-next" id="reviewsNext" aria-label="<?php esc_attr_e( 'Next customer reviews', 'mobile-pasal' ); ?>" type="button">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="9 18 15 12 9 6"></polyline></svg>
          </button>
        </div>
      </div>
    </div>

    <!-- Smooth Slider Carousel Viewport -->
    <div class="reviews-carousel-viewport" id="reviewsViewport">
      <div class="reviews-carousel-track" id="reviewsTrack">
        <?php
        $review_posts = get_posts( array(
            'post_type'      => 'mp_review',
            'posts_per_page' => 12,
            'post_status'    => 'publish',
        ) );

        $reviews_data = array();

        if ( ! empty( $review_posts ) ) {
            foreach ( $review_posts as $rv ) {
                $author   = $rv->post_title;
                $content_text = strip_tags( $rv->post_content );
                $loc      = get_post_meta( $rv->ID, '_mp_review_location', true ) ?: 'Gulariya, Bardiya';
                $prod     = get_post_meta( $rv->ID, '_mp_review_product', true );
                $rating   = intval( get_post_meta( $rv->ID, '_mp_review_rating', true ) ?: 5 );
                $meta_str = $loc . ( $prod ? ' • ' . $prod : '' );
                
                $parts = explode( ' ', trim( $author ) );
                $initials = '';
                if ( ! empty( $parts[0] ) ) {
                    $initials .= mb_substr( $parts[0], 0, 1 );
                }
                if ( count( $parts ) > 1 && ! empty( $parts[ count( $parts ) - 1 ] ) ) {
                    $initials .= mb_substr( $parts[ count( $parts ) - 1 ], 0, 1 );
                }
                if ( empty( $initials ) ) {
                    $initials = 'AM';
                }

                $reviews_data[] = array(
                    'text'     => '"' . $content_text . '"',
                    'name'     => $author,
                    'meta'     => $meta_str,
                    'initials' => strtoupper( $initials ),
                    'rating'   => $rating,
                );
            }
        } else {
            $reviews_data = array(
                array(
                    'text'     => '"My battery health was down to 74% and causing phone slowdowns. They replaced it with original-grade cell and re-coded the BMS so there is no annoying battery error in settings. Lasts a full day and a half now!"',
                    'name'     => 'Anil Chaudhary',
                    'meta'     => 'Badhaiyatal, Bardiya • iPhone 13 Battery Replacement',
                    'initials' => 'AC',
                    'rating'   => 5,
                ),
                array(
                    'text'     => '"Honest pricing without hidden markup. They clearly explained the warranty difference between unverified grey imports and official NTA-registered models. Highly recommended for genuine phones in Western Nepal."',
                    'name'     => 'Dharmendra Yadav',
                    'meta'     => 'Rajapur, Bardiya • Samsung Galaxy A55 5G + Anker PD',
                    'initials' => 'DY',
                    'rating'   => 5,
                ),
                array(
                    'text'     => '"My S24 Ultra screen shattered during a bike ride. Two shops in Nepalgunj told me I had to leave the phone for 5 days. Ali Mobile fixed it in their cleanroom lab in under an hour while I had tea next door. Touch and color are 100% perfect."',
                    'name'     => 'Pooja Shrestha',
                    'meta'     => 'Bansgadhi, Bardiya • Galaxy S24 Ultra OLED Screen',
                    'initials' => 'PS',
                    'rating'   => 5,
                ),
                array(
                    'text'     => '"Bought Redmi Note 13 Pro 5G with official Nepal VAT bill. The technician at the counter helped register my MDMS on the spot with NTA SMS verification. Genuine sealed box with official warranty."',
                    'name'     => 'Ramesh Thapa',
                    'meta'     => 'Gulariya-04, Bardiya • Redmi Note 13 Pro (Official MDMS)',
                    'initials' => 'RT',
                    'rating'   => 5,
                ),
                array(
                    'text'     => '"My phone fell into an irrigation canal during field work. They dismantled the motherboard, cleaned every IC in their ultrasonic bath, and revived the phone completely without any data loss. Lifesavers!"',
                    'name'     => 'Sunita BK',
                    'meta'     => 'Madhuwan, Bardiya • Ultrasonic Liquid Damage De-Oxidation',
                    'initials' => 'SB',
                    'rating'   => 5,
                ),
                array(
                    'text'     => '"Loose Type-C port on OnePlus 12 was refusing 100W SuperVOOC charge. Replacement took exactly 35 minutes across the counter. Works at peak 100W flash charging speed again with zero heating issues."',
                    'name'     => 'Bikash Sharma',
                    'meta'     => 'Nepalgunj Road, Bardiya • OnePlus 12 Fast Charging Port Fix',
                    'initials' => 'BS',
                    'rating'   => 5,
                ),
            );
        }

        foreach ( $reviews_data as $rv_item ) :
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
    <div class="reviews-carousel-dots" id="reviewsDots"></div>
  </div>
</section>

<!-- ================= 11. VISIT US IN GULARIYA / CONTACT ================= -->
<section class="section-wrap" id="contact">
  <div class="tech-bg-grid" aria-hidden="true"></div>
  <div class="tech-ring-accent" aria-hidden="true"></div>

  <div class="container">
    <div class="section-header">
      <div class="section-header-copy">
        <span class="eyebrow"><?php echo esc_html( mp_opt( 'visit_kicker', 'WALK IN ANYTIME' ) ); ?></span>
        <h2 class="section-title"><?php echo esc_html( mp_opt( 'visit_title', 'Visit Us in Gulariya' ) ); ?></h2>
        <p class="section-subtitle"><?php echo esc_html( mp_opt( 'visit_desc', 'Centrally located at Ji. Pra. Ka. Chowk. Walk in for brand-new phone purchases, immediate repair diagnostic, screen protectors, or honest technical advice.' ) ); ?></p>
      </div>
      <a class="view-all-pill" href="<?php echo esc_url( $map_url ); ?>" target="_blank" rel="noopener noreferrer">
        <span><?php echo esc_html( mp_opt( 'visit_btn3_text', 'Get Directions' ) ); ?></span>
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
      </a>
    </div>

    <div class="visit-grid">
      <!-- Left Address Card -->
      <div class="location-details-box">
        <div>
          <div class="loc-item">
            <div class="loc-icon">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
            </div>
            <div>
              <h4 class="loc-title"><?php echo esc_html( mp_opt( 'site_brand_name', 'Ali Mobile Center & Apple Fix' ) ); ?></h4>
              <p class="loc-desc"><?php echo esc_html( $address ); ?>, Lumbini Province, Nepal</p>
            </div>
          </div>

          <div class="loc-item">
            <div class="loc-icon">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
            </div>
            <div>
              <h4 class="loc-title"><?php echo esc_html( mp_opt( 'visit_phone_sub', 'Direct Showroom Hotline' ) ); ?></h4>
              <p class="loc-desc"><?php echo esc_html( $phone ); ?></p>
            </div>
          </div>

          <div class="loc-item">
            <div class="loc-icon">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
            </div>
            <div>
              <h4 class="loc-title"><?php echo esc_html( mp_opt( 'visit_hours_title', 'Showroom & Lab Hours' ) ); ?></h4>
              <p class="loc-desc"><?php echo wp_kses_post( $hours ); ?></p>
            </div>
          </div>
        </div>

        <!-- Social Media Direct Connect Strip -->
        <div class="contact-social-connect">
          <span class="contact-social-lbl"><?php esc_html_e( 'Official Social Channels:', 'mobile-pasal' ); ?></span>
          <div class="social-icons-row">
            <a class="social-icon-btn social-fb" href="<?php echo esc_url( mp_opt( 'social_facebook', 'https://facebook.com/alimobilecenter' ) ); ?>" target="_blank" rel="noopener noreferrer" aria-label="Facebook">
              <svg width="15" height="15" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
            </a>
            <a class="social-icon-btn social-ig" href="<?php echo esc_url( mp_opt( 'social_instagram', 'https://instagram.com/alimobilecenter' ) ); ?>" target="_blank" rel="noopener noreferrer" aria-label="Instagram">
              <svg width="15" height="15" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
            </a>
            <a class="social-icon-btn social-wa" href="https://wa.me/<?php echo esc_attr( $clean_p ); ?>" target="_blank" rel="noopener noreferrer" aria-label="WhatsApp">
              <svg width="15" height="15" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0 0 12.04 2zm5.79 14.12c-.24.68-1.39 1.3-1.92 1.38-.49.08-1.12.11-3.23-.76-2.69-1.11-4.43-3.83-4.57-4.01-.13-.19-1.11-1.48-1.11-2.82 0-1.34.7-2 .95-2.27.24-.27.54-.34.72-.34.18 0 .36.01.52.02.17.01.4-.06.62.48.24.58.8 1.95.87 2.1.07.14.12.31.02.5-.09.19-.14.3-.28.46-.14.16-.3.35-.43.47-.14.14-.29.3-.12.59.17.29.75 1.24 1.62 2.01 1.11.99 2.05 1.3 2.34 1.44.29.14.46.12.63-.07.17-.19.73-.85.92-1.15.2-.29.39-.24.66-.14.27.1 1.72.81 2.02.96.29.15.49.22.56.34.07.13.07.74-.17 1.42z"/></svg>
            </a>
            <a class="social-icon-btn social-tt" href="<?php echo esc_url( mp_opt( 'social_tiktok', 'https://tiktok.com/@alimobilecenter' ) ); ?>" target="_blank" rel="noopener noreferrer" aria-label="TikTok">
              <svg width="15" height="15" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.97v7.54c-.01 2.21-.81 4.41-2.31 6.03-1.6 1.74-3.9 2.74-6.27 2.75-2.5 0-4.9-1.07-6.52-2.91-1.68-1.89-2.45-4.47-2.12-6.99.34-2.58 1.87-4.88 4.09-6.15 1.65-.95 3.58-1.33 5.48-1.09v4.11c-.99-.24-2.07-.12-2.98.34-.9.45-1.57 1.27-1.85 2.23-.29.98-.12 2.07.45 2.91.56.84 1.51 1.36 2.53 1.39 1.19.04 2.35-.55 2.99-1.55.43-.67.62-1.47.62-2.27V.02z"/></svg>
            </a>
            <a class="social-icon-btn social-gm" href="<?php echo esc_url( $map_url ); ?>" target="_blank" rel="noopener noreferrer" aria-label="Google Maps">
              <svg width="15" height="15" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 0C7.58 0 4 3.58 4 8c0 5.25 7 13 8 16 1-3 8-10.75 8-16 0-4.42-3.58-8-8-8zm0 11c-1.66 0-3-1.34-3-3s1.34-3 3-3 3 1.34 3 3-1.34 3-3 3z"/></svg>
            </a>
          </div>
        </div>

        <div class="actions" style="margin-top: 24px;">
          <a class="whatsapp-action-btn" href="https://wa.me/<?php echo esc_attr( $clean_p ); ?>?text=Hello%20Ali%20Mobile%20Center,%20I%20am%20visiting%20your%20counter%20today." target="_blank" rel="noopener noreferrer">
            <span><?php echo esc_html( mp_opt( 'visit_btn2_text', 'Message on WhatsApp' ) ); ?></span>
          </a>
          <a class="direct-call-btn" style="color:var(--navy); border-color:var(--line); background:#f8faff;" href="tel:+<?php echo esc_attr( $clean_p ); ?>">
            <span><?php echo esc_html( mp_opt( 'visit_btn1_text', 'Call Counter' ) ); ?></span>
          </a>
        </div>
      </div>

      <!-- Right Map Embed -->
      <div class="map-preview-card">
        <div class="map-overlay-badge">
          <div class="map-overlay-title"><?php echo esc_html( mp_opt( 'site_brand_name', 'Ali Mobile Center' ) ); ?></div>
          <div class="map-overlay-addr"><?php echo esc_html( $address ); ?></div>
          <a class="open-maps-link" href="<?php echo esc_url( $map_url ); ?>" target="_blank" rel="noopener noreferrer">
            <span>Open in Maps ↗</span>
          </a>
        </div>
        <div class="map-inner-frame">
          <iframe
            title="<?php echo esc_attr__( 'Ali Mobile Center Location in Gulariya', 'mobile-pasal' ); ?>"
            src="<?php echo esc_url( mp_extract_map_iframe_src( mp_opt( 'visit_map_url', mp_opt( 'counter_map_embed', '' ) ) ) ); ?>"
            loading="lazy">
          </iframe>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
get_footer();
