<?php
/**
 * The template for displaying the front page / home page
 * Complete Store & Certified Repair Lab Experience Design
 * Fully Connected with WordPress Admin Theme Options
 *
 * @package Mobile_Pasal
 * @version 3.2.0
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
$slide1_f1_icon   = mp_opt( 'hero_slide1_f1_icon', '◷' );
$slide1_f1_text   = mp_opt( 'hero_slide1_f1_text', 'Fast<br>45-Min Fix' );
$slide1_f2_icon   = mp_opt( 'hero_slide1_f2_icon', '⬟' );
$slide1_f2_text   = mp_opt( 'hero_slide1_f2_text', 'Genuine<br>OLED Parts' );
$slide1_f3_icon   = mp_opt( 'hero_slide1_f3_icon', '✹' );
$slide1_f3_text   = mp_opt( 'hero_slide1_f3_text', 'Level 4<br>Technicians' );
$slide1_f4_icon   = mp_opt( 'hero_slide1_f4_icon', '♧' );
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
$slide2_f1_icon   = mp_opt( 'hero_slide2_f1_icon', '▣' );
$slide2_f1_text   = mp_opt( 'hero_slide2_f1_text', 'OLED Screen<br>Replacement' );
$slide2_f2_icon   = mp_opt( 'hero_slide2_f2_icon', 'ϟ' );
$slide2_f2_text   = mp_opt( 'hero_slide2_f2_text', 'Certified<br>Battery Swap' );
$slide2_f3_icon   = mp_opt( 'hero_slide2_f3_icon', '⌁' );
$slide2_f3_text   = mp_opt( 'hero_slide2_f3_text', 'Water Soak<br>Restoration' );
$slide2_f4_icon   = mp_opt( 'hero_slide2_f4_icon', '⚙' );
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
$slide3_f1_icon   = mp_opt( 'hero_slide3_f1_icon', '▣' );
$slide3_f1_text   = mp_opt( 'hero_slide3_f1_text', 'Top Tier<br>Brands' );
$slide3_f2_icon   = mp_opt( 'hero_slide3_f2_icon', '◇' );
$slide3_f2_text   = mp_opt( 'hero_slide3_f2_text', 'Anker &amp; PD<br>Accessories' );
$slide3_f3_icon   = mp_opt( 'hero_slide3_f3_icon', '♡' );
$slide3_f3_text   = mp_opt( 'hero_slide3_f3_text', 'Tech Setup<br>Assistance' );
$slide3_f4_icon   = mp_opt( 'hero_slide3_f4_icon', '✓' );
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
$spotlight_badge  = mp_opt( 'spotlight_badge', ' FEATURED FLAGSHIP IN GULARIYA' );
$spotlight_title  = mp_opt( 'spotlight_title', 'iPhone 16 Pro & Pro Max' );
$spotlight_tag    = mp_opt( 'spotlight_tagline', 'Built for Apple Intelligence • Grade 5 Titanium' );
$spotlight_desc   = mp_opt( 'spotlight_desc', 'Grade 5 Titanium design with thinner borders, A18 Pro silicon chip, 48MP Fusion camera with 4K 120fps Dolby Vision, and revolutionary Camera Control button.' );
$spotlight_status = mp_opt( 'spotlight_status_text', 'Sealed Stock Handover Ready at Gulariya Showroom Counter' );
$spotlight_img    = mp_opt( 'spotlight_image', '' );
if ( empty( $spotlight_img ) ) {
	$spotlight_img = 'https://images.unsplash.com/photo-1695048133142-1a20484d2569?auto=format&fit=crop&w=900&q=85';
}

// Lab Section
$lab_badge   = mp_opt( 'lab_badge', '🔧 CLEANROOM BENCH SETUP' );
$lab_title   = mp_opt( 'lab_title', 'Precision Microscope Level Repairs Right in Gulariya' );
$lab_desc    = mp_opt( 'lab_desc', 'We do not courier your valuable phone to Nepalgunj or Kathmandu. Repairs happen transparently inside our Gulariya counter laboratory with stereo zoom microscopes, anti-static thermal stations, and genuine parts.' );
$lab_f1_h    = mp_opt( 'lab_feat1_title', '30-Minute Screen Replacement' );
$lab_f1_d    = mp_opt( 'lab_feat1_desc', 'Fast OLED and glass restoration with TrueTone &amp; 3D touch programming.' );
$lab_f2_h    = mp_opt( 'lab_feat2_title', 'Battery Health Calibration' );
$lab_f2_d    = mp_opt( 'lab_feat2_desc', 'Certified battery replacements that restore peak 100% capacity and battery health cycle.' );
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
?>

<!-- ================= 1. HERO SLIDER SECTION ================= -->
<section class="hero-section" id="heroSlider" aria-label="<?php esc_attr_e( 'Mobile repair and store hero slider', 'mobile-pasal' ); ?>">
  <div class="hero">
    <button class="slider-arrow prev" aria-label="<?php esc_attr_e( 'Previous slide', 'mobile-pasal' ); ?>" type="button">‹</button>
    <button class="slider-arrow next" aria-label="<?php esc_attr_e( 'Next slide', 'mobile-pasal' ); ?>" type="button">›</button>

    <!-- Slide 1 -->
    <div class="slide active" data-slide="0">
      <div class="copy">
        <div class="trust"><span class="trust-icon">✓</span> <?php echo esc_html( $slide1_trust ); ?></div>
        <h1><?php echo wp_kses_post( $slide1_title ); ?></h1>
        <p class="intro"><?php echo esc_html( $slide1_intro ); ?></p>
        <div class="hero-features">
          <div class="hero-feature"><span class="hero-feature-icon"><?php echo esc_html( $slide1_f1_icon ); ?></span><?php echo wp_kses_post( $slide1_f1_text ); ?></div>
          <div class="hero-feature"><span class="hero-feature-icon"><?php echo esc_html( $slide1_f2_icon ); ?></span><?php echo wp_kses_post( $slide1_f2_text ); ?></div>
          <div class="hero-feature"><span class="hero-feature-icon"><?php echo esc_html( $slide1_f3_icon ); ?></span><?php echo wp_kses_post( $slide1_f3_text ); ?></div>
          <div class="hero-feature"><span class="hero-feature-icon"><?php echo esc_html( $slide1_f4_icon ); ?></span><?php echo wp_kses_post( $slide1_f4_text ); ?></div>
        </div>
        <div class="actions">
          <a class="primary" href="<?php echo esc_url( $slide1_btn1_url ); ?>"><?php echo esc_html( $slide1_btn1_text ); ?> <span>→</span></a>
          <a class="secondary" href="<?php echo esc_url( $slide1_btn2_url ); ?>"><span class="play">▶</span> <?php echo esc_html( $slide1_btn2_text ); ?></a>
        </div>
        <div class="dots" aria-label="<?php esc_attr_e( 'Choose slide', 'mobile-pasal' ); ?>">
          <button class="dot active" aria-label="Slide 1" type="button"></button>
          <button class="dot" aria-label="Slide 2" type="button"></button>
          <button class="dot" aria-label="Slide 3" type="button"></button>
        </div>
      </div>
      <div class="visual">
        <img class="product-image" src="<?php echo esc_url( $slide1_img ); ?>" onerror="this.onerror=null;this.src='https://images.unsplash.com/photo-1581092160607-ee22621dd758?auto=format&fit=crop&w=1000&q=85';" alt="<?php echo esc_attr( strip_tags( $slide1_title ) ); ?>" />
        <div class="tagline"><?php echo wp_kses_post( $slide1_tagline ); ?></div>
      </div>
    </div>

    <!-- Slide 2 -->
    <div class="slide" data-slide="1">
      <div class="copy">
        <div class="trust"><span class="trust-icon">✓</span> <?php echo esc_html( $slide2_trust ); ?></div>
        <h1><?php echo wp_kses_post( $slide2_title ); ?></h1>
        <p class="intro"><?php echo esc_html( $slide2_intro ); ?></p>
        <div class="hero-features">
          <div class="hero-feature"><span class="hero-feature-icon"><?php echo esc_html( $slide2_f1_icon ); ?></span><?php echo wp_kses_post( $slide2_f1_text ); ?></div>
          <div class="hero-feature"><span class="hero-feature-icon"><?php echo esc_html( $slide2_f2_icon ); ?></span><?php echo wp_kses_post( $slide2_f2_text ); ?></div>
          <div class="hero-feature"><span class="hero-feature-icon"><?php echo esc_html( $slide2_f3_icon ); ?></span><?php echo wp_kses_post( $slide2_f3_text ); ?></div>
          <div class="hero-feature"><span class="hero-feature-icon"><?php echo esc_html( $slide2_f4_icon ); ?></span><?php echo wp_kses_post( $slide2_f4_text ); ?></div>
        </div>
        <div class="actions">
          <button class="primary" onclick="openQuoteModal('Display &amp; Touch Screen Replacement')" type="button"><?php echo esc_html( $slide2_btn1_text ); ?> <span>→</span></button>
          <a class="secondary" href="<?php echo esc_url( $slide2_btn2_url ); ?>"><span class="play">▶</span> <?php echo esc_html( $slide2_btn2_text ); ?></a>
        </div>
        <div class="dots" aria-label="<?php esc_attr_e( 'Choose slide', 'mobile-pasal' ); ?>">
          <button class="dot" aria-label="Slide 1" type="button"></button>
          <button class="dot active" aria-label="Slide 2" type="button"></button>
          <button class="dot" aria-label="Slide 3" type="button"></button>
        </div>
      </div>
      <div class="visual">
        <img class="product-image" src="<?php echo esc_url( $slide2_img ); ?>" onerror="this.onerror=null;this.src='https://images.unsplash.com/photo-1597733336794-12d05021d510?auto=format&fit=crop&w=1000&q=85';" alt="<?php echo esc_attr( strip_tags( $slide2_title ) ); ?>" />
        <div class="tagline"><?php echo wp_kses_post( $slide2_tagline ); ?></div>
      </div>
    </div>

    <!-- Slide 3 -->
    <div class="slide" data-slide="2">
      <div class="copy">
        <div class="trust"><span class="trust-icon">✓</span> <?php echo esc_html( $slide3_trust ); ?></div>
        <h1><?php echo wp_kses_post( $slide3_title ); ?></h1>
        <p class="intro"><?php echo esc_html( $slide3_intro ); ?></p>
        <div class="hero-features">
          <div class="hero-feature"><span class="hero-feature-icon"><?php echo esc_html( $slide3_f1_icon ); ?></span><?php echo wp_kses_post( $slide3_f1_text ); ?></div>
          <div class="hero-feature"><span class="hero-feature-icon"><?php echo esc_html( $slide3_f2_icon ); ?></span><?php echo wp_kses_post( $slide3_f2_text ); ?></div>
          <div class="hero-feature"><span class="hero-feature-icon"><?php echo esc_html( $slide3_f3_icon ); ?></span><?php echo wp_kses_post( $slide3_f3_text ); ?></div>
          <div class="hero-feature"><span class="hero-feature-icon"><?php echo esc_html( $slide3_f4_icon ); ?></span><?php echo wp_kses_post( $slide3_f4_text ); ?></div>
        </div>
        <div class="actions">
          <a class="primary" href="<?php echo esc_url( $slide3_btn1_url ); ?>"><?php echo esc_html( $slide3_btn1_text ); ?> <span>→</span></a>
          <a class="secondary" href="<?php echo esc_url( $slide3_btn2_url ); ?>"><span class="play">▶</span> <?php echo esc_html( $slide3_btn2_text ); ?></a>
        </div>
        <div class="dots" aria-label="<?php esc_attr_e( 'Choose slide', 'mobile-pasal' ); ?>">
          <button class="dot" aria-label="Slide 1" type="button"></button>
          <button class="dot" aria-label="Slide 2" type="button"></button>
          <button class="dot active" aria-label="Slide 3" type="button"></button>
        </div>
      </div>
      <div class="visual">
        <img class="product-image" src="<?php echo esc_url( $slide3_img ); ?>" onerror="this.onerror=null;this.src='https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?auto=format&fit=crop&w=1000&q=85';" alt="<?php echo esc_attr( strip_tags( $slide3_title ) ); ?>" />
        <div class="tagline"><?php echo wp_kses_post( $slide3_tagline ); ?></div>
      </div>
    </div>

    <div class="blue-swoosh"></div>
  </div>
</section>

<!-- ================= 2. SHOP BY CATEGORY ================= -->
<section class="section-wrap" id="categories">
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
      <!-- 1. Flagship Smartphones -->
      <article class="cat-card" style="--card-tint: rgba(8, 98, 233, 0.08); --card-border-hover: #0862e9;" onclick="filterCatalogByBrand('Apple iPhone')">
        <span class="cat-badge" style="--badge-bg: #e8f0ff; --badge-color: #073d9c;">NTA Sealed</span>
        <div class="cat-visual" style="--icon-bg: #edf4ff; --icon-border: rgba(8, 98, 233, 0.18); --icon-color: #0862e9;">
          <svg viewBox="0 0 24 24"><rect x="5" y="2" width="14" height="20" rx="3" ry="3"></rect><line x1="12" y1="18" x2="12.01" y2="18"></line><line x1="9" y1="5" x2="15" y2="5"></line></svg>
        </div>
        <h3 class="cat-title"><?php echo esc_html( mp_opt( 'cat1_title', 'Flagship Smartphones' ) ); ?></h3>
        <p class="cat-desc"><?php echo esc_html( mp_opt( 'cat1_sub', 'iPhone 16 / 15 / 14, Samsung Galaxy S & Pixel' ) ); ?></p>
        <span class="cat-link"><?php echo esc_html( mp_opt( 'cat1_hint', 'Browse Showroom' ) ); ?> <span>→</span></span>
      </article>

      <!-- 2. Certified Apple Fix -->
      <article class="cat-card" style="--card-tint: rgba(2, 132, 199, 0.08); --card-border-hover: #0284c7;" onclick="openQuoteModal('Apple iPhone Precision Repair')">
        <span class="cat-badge" style="--badge-bg: #e0f2fe; --badge-color: #0369a1;">Level 4 Lab</span>
        <div class="cat-visual" style="--icon-bg: #f0f9ff; --icon-border: rgba(2, 132, 199, 0.2); --icon-color: #0284c7;">
          <svg viewBox="0 0 24 24"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"></path></svg>
        </div>
        <h3 class="cat-title"><?php echo esc_html( mp_opt( 'cat2_title', 'Certified Apple Fix' ) ); ?></h3>
        <p class="cat-desc"><?php echo esc_html( mp_opt( 'cat2_sub', 'iPhone Screen, Battery & IC Lab' ) ); ?></p>
        <span class="cat-link"><?php echo esc_html( mp_opt( 'cat2_hint', 'View Repair Board' ) ); ?> <span>→</span></span>
      </article>

      <!-- 3. Audio & Power Gear -->
      <article class="cat-card" style="--card-tint: rgba(99, 102, 241, 0.08); --card-border-hover: #6366f1;" onclick="filterCatalogByBrand('Accessories & Gear')">
        <span class="cat-badge" style="--badge-bg: #eef2ff; --badge-color: #4338ca;">Hi-Res Audio</span>
        <div class="cat-visual" style="--icon-bg: #f5f7ff; --icon-border: rgba(99, 102, 241, 0.2); --icon-color: #6366f1;">
          <svg viewBox="0 0 24 24"><path d="M3 18v-6a9 9 0 0 1 18 0v6"></path><path d="M21 19a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3zM3 19a2 2 0 0 0 2 2h1a2 2 0 0 0 2-2v-3a2 2 0 0 0-2-2H3z"></path></svg>
        </div>
        <h3 class="cat-title"><?php echo esc_html( mp_opt( 'cat3_title', 'Audio & Power Gear' ) ); ?></h3>
        <p class="cat-desc"><?php echo esc_html( mp_opt( 'cat3_sub', 'AirPods, Neckbands & ANC Studio Sound' ) ); ?></p>
        <span class="cat-link"><?php echo esc_html( mp_opt( 'cat3_hint', 'Explore Studio' ) ); ?> <span>→</span></span>
      </article>

      <!-- 4. iPads & Tablets -->
      <article class="cat-card" style="--card-tint: rgba(13, 148, 136, 0.08); --card-border-hover: #0d9488;" onclick="triggerToast('Viewing Tablets & Smartwatches')">
        <span class="cat-badge" style="--badge-bg: #ccfbf1; --badge-color: #0f766e;">Retina Display</span>
        <div class="cat-visual" style="--icon-bg: #f0fdfa; --icon-border: rgba(13, 148, 136, 0.2); --icon-color: #0d9488;">
          <svg viewBox="0 0 24 24"><rect x="4" y="2" width="16" height="20" rx="2"></rect><circle cx="12" cy="14" r="4"></circle><line x1="12" y1="2" x2="12" y2="6"></line><line x1="12" y1="18" x2="12" y2="22"></line></svg>
        </div>
        <h3 class="cat-title"><?php echo esc_html( mp_opt( 'cat4_title', 'iPads & Tablets' ) ); ?></h3>
        <p class="cat-desc"><?php echo esc_html( mp_opt( 'cat4_sub', 'Calling, AMOLED Tabs & Fitness Wearables' ) ); ?></p>
        <span class="cat-link"><?php echo esc_html( mp_opt( 'cat4_hint', 'Discover Watches' ) ); ?> <span>→</span></span>
      </article>

      <!-- 5. Chargers & Glass -->
      <article class="cat-card" style="--card-tint: rgba(245, 158, 11, 0.08); --card-border-hover: #f59e0b;" onclick="triggerToast('GaN Chargers & 9H Armor Glass')">
        <span class="cat-badge" style="--badge-bg: #fef3c7; --badge-color: #b45309;">GaN Fast Charge</span>
        <div class="cat-visual" style="--icon-bg: #fffbeb; --icon-border: rgba(245, 158, 11, 0.25); --icon-color: #d97706;">
          <svg viewBox="0 0 24 24"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>
        </div>
        <h3 class="cat-title"><?php echo esc_html( mp_opt( 'cat5_title', 'Chargers & Glass' ) ); ?></h3>
        <p class="cat-desc"><?php echo esc_html( mp_opt( 'cat5_sub', '20W–120W Adapters & 9H Armor Glass' ) ); ?></p>
        <span class="cat-link"><?php echo esc_html( mp_opt( 'cat5_hint', 'View Protection' ) ); ?> <span>→</span></span>
      </article>

      <!-- 6. eSewa & Banking -->
      <article class="cat-card" style="--card-tint: rgba(16, 185, 129, 0.08); --card-border-hover: #10b981;" onclick="triggerToast('Connecting to Gulariya Banking Counter')">
        <span class="cat-badge" style="--badge-bg: #d1fae5; --badge-color: #047857;">Verified Merchant</span>
        <div class="cat-visual" style="--icon-bg: #ecfdf5; --icon-border: rgba(16, 185, 129, 0.2); --icon-color: #10b981;">
          <svg viewBox="0 0 24 24"><rect x="2" y="5" width="20" height="14" rx="2"></rect><line x1="2" y1="10" x2="22" y2="10"></line><line x1="6" y1="15" x2="8" y2="15"></line></svg>
        </div>
        <h3 class="cat-title"><?php echo esc_html( mp_opt( 'cat6_title', 'eSewa & Banking' ) ); ?></h3>
        <p class="cat-desc"><?php echo esc_html( mp_opt( 'cat6_sub', 'Instant Top-Up, Utility Bills & Money Transfer' ) ); ?></p>
        <span class="cat-link"><?php echo esc_html( mp_opt( 'cat6_hint', 'Counter Agent' ) ); ?> <span>→</span></span>
      </article>
    </div>
  </div>
</section>

<!-- ================= 3. SHOP BY VERIFIED BRAND ================= -->
<section class="section-wrap" id="brands">
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

<!-- ================= 4. FEATURED FLAGSHIP SPOTLIGHT (DARK THEME) ================= -->
<section class="section-wrap dark-theme" id="flagship">
  <div class="container">
    <div class="flagship-card">
      <div class="flagship-topbar">
        <span class="flagship-badge"><?php echo esc_html( $spotlight_badge ); ?></span>
        <div class="live-counter-pill">
          <span class="pulse-dot"></span>
          <span>Gulariya Showroom Live Counter</span>
        </div>
      </div>

      <div class="flagship-grid">
        <!-- Left Info -->
        <div>
          <h2 class="flagship-title"><?php echo esc_html( $spotlight_title ); ?></h2>
          <div class="flagship-subline"><?php echo esc_html( $spotlight_tag ); ?></div>
          <p class="flagship-paragraph"><?php echo esc_html( $spotlight_desc ); ?></p>

          <!-- Finishes -->
          <div class="finish-selector-wrap">
            <div class="finish-selector-label">AVAILABLE FINISHES:</div>
            <div class="finish-buttons" id="finishSelector">
              <button class="finish-btn active" data-finish="Desert Titanium" data-color="#c5a992" onclick="setFinish('Desert Titanium', '#c5a992')" type="button">
                <span class="color-swatch" style="background: #c5a992;"></span> Desert Titanium
              </button>
              <button class="finish-btn" data-finish="Natural Titanium" data-color="#9a958e" onclick="setFinish('Natural Titanium', '#9a958e')" type="button">
                <span class="color-swatch" style="background: #9a958e;"></span> Natural Titanium
              </button>
              <button class="finish-btn" data-finish="White Titanium" data-color="#f2f2ee" onclick="setFinish('White Titanium', '#f2f2ee')" type="button">
                <span class="color-swatch" style="background: #f2f2ee;"></span> White Titanium
              </button>
              <button class="finish-btn" data-finish="Black Titanium" data-color="#3c3b3f" onclick="setFinish('Black Titanium', '#3c3b3f')" type="button">
                <span class="color-swatch" style="background: #3c3b3f;"></span> Black Titanium
              </button>
            </div>
          </div>

          <!-- Bento Pods -->
          <div class="flagship-features-grid">
            <div class="flagship-feature-pod">
              <div class="pod-icon">⚡</div>
              <div>
                <h4 class="pod-title">A18 Pro Bionic</h4>
                <p class="pod-desc">3nm Silicon &amp; 6–Core GPU</p>
              </div>
            </div>
            <div class="flagship-feature-pod">
              <div class="pod-icon">📷</div>
              <div>
                <h4 class="pod-title">Camera Control</h4>
                <p class="pod-desc">Tactile Haptic Slide &amp; Click</p>
              </div>
            </div>
            <div class="flagship-feature-pod">
              <div class="pod-icon">🛡️</div>
              <div>
                <h4 class="pod-title">Grade 5 Titanium</h4>
                <p class="pod-desc">Aerospace Micro-Blasted Frame</p>
              </div>
            </div>
            <div class="flagship-feature-pod">
              <div class="pod-icon">📄</div>
              <div>
                <h4 class="pod-title">NTA Approved • 100% Legal IMEI</h4>
                <p class="pod-desc">Official Nepal VAT Bill &amp; Warranty</p>
              </div>
            </div>
          </div>

          <div class="stock-ready-banner">
            <span class="green-dot"></span>
            <span><?php echo esc_html( $spotlight_status ); ?></span>
          </div>

          <div class="flagship-actions">
            <a class="whatsapp-action-btn" id="flagshipWaBtn" href="https://wa.me/<?php echo esc_attr( $clean_p ); ?>?text=Hello%20Ali%20Mobile%20Center,%20please%20quote%20today's%20best%20price%20for%20iPhone%2016%20Pro%20(Desert%20Titanium)%20with%20Nepal%20VAT%20Bill." target="_blank" rel="noopener noreferrer">
              <span>Ask Today's Price on WhatsApp</span>
            </a>
            <a class="direct-call-btn" href="tel:+<?php echo esc_attr( $clean_p ); ?>">
              <span>☎ Call Store Direct (<?php echo esc_html( $phone ); ?>)</span>
            </a>
          </div>
        </div>

        <!-- Right Preview Mockup -->
        <div class="flagship-preview-box">
          <div style="display:flex; justify-content:flex-end;">
            <span class="preview-chip-badge">● 48MP Fusion • 4K 120fps Dolby</span>
          </div>
          <div class="preview-mockup-frame">
            <img id="flagshipDisplayImg" src="<?php echo esc_url( $spotlight_img ); ?>" alt="iPhone 16 Pro Flagship in Desert Titanium" />
          </div>
          <div class="preview-footer-chips">
            <span class="preview-footer-chip"> Apple Intelligence Ready</span>
            <span class="preview-footer-chip" style="color: #4ade80;">✓ Official 1-Year Warranty</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= 5. SHOWROOM CATALOG WITH LEFT FILTERS ================= -->
<section class="section-wrap" id="catalog">
  <div class="container">
    <div class="section-header">
      <div class="section-header-copy">
        <span class="eyebrow"><?php echo esc_html( mp_opt( 'catalog_kicker', 'SHOWROOM CATALOG' ) ); ?></span>
        <h2 class="section-title"><?php echo esc_html( mp_opt( 'catalog_title', 'Latest Smartphone Arrivals &amp; Top Models' ) ); ?></h2>
        <p class="section-subtitle"><?php echo esc_html( mp_opt( 'catalog_subtitle', 'Every handset is checked, unboxed or sealed-pack with official VAT bill &amp; warranty. Filter by brand or search your model.' ) ); ?></p>
      </div>
      <button class="view-all-pill" onclick="resetCatalogFilters()" type="button">Reset Filters <span>↺</span></button>
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
            <span class="search-icon">🔍</span>
            <input type="text" id="catalogSearch" placeholder="Search iPhone, Galaxy, Charger..." oninput="filterCatalog()" />
          </div>
        </div>

        <div class="filter-group">
          <div class="filter-label">BRAND &amp; ECOSYSTEM</div>
          <div class="filter-options">
            <label class="filter-radio-label active"><input type="radio" name="brandFilter" value="all" checked onchange="filterCatalog()"> All Handsets</label>
            <label class="filter-radio-label"><input type="radio" name="brandFilter" value="Apple iPhone" onchange="filterCatalog()"> Apple iPhone</label>
            <label class="filter-radio-label"><input type="radio" name="brandFilter" value="Samsung Galaxy" onchange="filterCatalog()"> Samsung Galaxy</label>
            <label class="filter-radio-label"><input type="radio" name="brandFilter" value="Xiaomi / Redmi" onchange="filterCatalog()"> Xiaomi / Redmi</label>
            <label class="filter-radio-label"><input type="radio" name="brandFilter" value="OnePlus" onchange="filterCatalog()"> OnePlus</label>
            <label class="filter-radio-label"><input type="radio" name="brandFilter" value="Google Pixel" onchange="filterCatalog()"> Google Pixel</label>
            <label class="filter-radio-label"><input type="radio" name="brandFilter" value="Accessories & Gear" onchange="filterCatalog()"> Accessories &amp; Gear</label>
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
      </div>
    </div>
  </div>
</section>

<!-- ================= 6. CLEANROOM LAB BENCH SETUP (DARK THEME) ================= -->
<section class="section-wrap dark-theme" id="lab">
  <div class="container">
    <div class="cleanroom-card">
      <div class="cleanroom-grid">
        <!-- Left Bench Photo -->
        <div class="cleanroom-image-frame">
          <img src="<?php echo esc_url( $lab_img ); ?>" alt="Cleanroom microscope repair lab technicians" />
        </div>

        <!-- Right Lab Info -->
        <div>
          <span class="cleanroom-badge"><?php echo esc_html( $lab_badge ); ?></span>
          <h2 class="section-title" style="color:#ffffff;"><?php echo esc_html( $lab_title ); ?></h2>
          <p class="section-subtitle" style="color:#9cb3d8;"><?php echo esc_html( $lab_desc ); ?></p>

          <div class="cleanroom-points">
            <div class="cleanroom-point">
              <div class="point-icon-box">⏱️</div>
              <div>
                <h4 class="point-title"><?php echo esc_html( $lab_f1_h ); ?></h4>
                <p class="point-desc"><?php echo wp_kses_post( $lab_f1_d ); ?></p>
              </div>
            </div>

            <div class="cleanroom-point">
              <div class="point-icon-box">🔋</div>
              <div>
                <h4 class="point-title"><?php echo esc_html( $lab_f2_h ); ?></h4>
                <p class="point-desc"><?php echo wp_kses_post( $lab_f2_d ); ?></p>
              </div>
            </div>

            <div class="cleanroom-point">
              <div class="point-icon-box">👁️</div>
              <div>
                <h4 class="point-title"><?php echo esc_html( $lab_f3_h ); ?></h4>
                <p class="point-desc"><?php echo wp_kses_post( $lab_f3_d ); ?></p>
              </div>
            </div>
          </div>

          <!-- Stats row -->
          <div class="lab-stats-row">
            <div class="lab-stat-box">
              <div class="stat-number"><?php echo esc_html( $lab_s1_n ); ?></div>
              <div class="stat-label"><?php echo esc_html( $lab_s1_l ); ?></div>
            </div>
            <div class="lab-stat-box">
              <div class="stat-number"><?php echo esc_html( $lab_s2_n ); ?></div>
              <div class="stat-label"><?php echo esc_html( $lab_s2_l ); ?></div>
            </div>
            <div class="lab-stat-box">
              <div class="stat-number"><?php echo esc_html( $lab_s3_n ); ?></div>
              <div class="stat-label"><?php echo esc_html( $lab_s3_l ); ?></div>
            </div>
          </div>

          <div class="flagship-actions">
            <a class="whatsapp-action-btn" href="https://wa.me/<?php echo esc_attr( $clean_p ); ?>?text=Hello%20Ali%20Mobile%20Lab,%20I%20would%20like%20to%20consult%20with%20your%20technician%20about%20a%20hardware%20issue." target="_blank" rel="noopener noreferrer">
              <span>Consult Our Technician</span>
            </a>
            <a class="direct-call-btn" href="tel:+<?php echo esc_attr( $clean_p ); ?>">
              <span>Call Counter (<?php echo esc_html( $phone ); ?>)</span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= 7. COMPLETE COUNTER REPAIR SERVICES ================= -->
<section class="section-wrap" id="repairs">
  <div class="container">
    <div class="section-header">
      <div class="section-header-copy">
        <span class="eyebrow"><?php echo esc_html( mp_opt( 'repair_kicker', 'DIAGNOSTICS &amp; SOLUTIONS' ) ); ?></span>
        <h2 class="section-title"><?php echo esc_html( mp_opt( 'repair_title', 'Complete Counter Repair Services' ) ); ?></h2>
        <p class="section-subtitle"><?php echo esc_html( mp_opt( 'repair_subtitle', 'From Apple iPhone to Samsung Galaxy and Xiaomi devices, all repairs are performed with original-grade parts and live customer inspection.' ) ); ?></p>
      </div>
      <button class="view-all-pill" onclick="openQuoteModal('General Mobile Repair Service')" type="button">Ask Instant Quote <span>→</span></button>
    </div>

    <div class="diagnostics-grid">
      <!-- 1. Charging Port -->
      <article class="diag-card">
        <div class="diag-topbar">
          <div class="diag-icon">⚡</div>
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
          <div class="diag-icon">📸</div>
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
          <div class="diag-icon">🔬</div>
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
          <div class="diag-icon">💧</div>
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
          <div class="diag-icon">🔋</div>
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
          <div class="diag-icon">📱</div>
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
  <div class="container">
    <div class="section-header">
      <div class="section-header-copy">
        <span class="eyebrow"><?php echo esc_html( mp_opt( 'guides_kicker', 'TECHNICIAN ADVICE' ) ); ?></span>
        <h2 class="section-title"><?php echo esc_html( mp_opt( 'guides_title', 'Phone First–Aid &amp; Care Guides' ) ); ?></h2>
        <p class="section-subtitle"><?php echo esc_html( mp_opt( 'guides_subtitle', 'Practical guidance from our certified technicians on protecting your smartphone before bringing it to our counter.' ) ); ?></p>
      </div>
      <button class="view-all-pill" onclick="triggerToast('Opening Technician Emergency Advice')" type="button">Ask Technician Advice <span>→</span></button>
    </div>

    <div class="guides-grid">
      <!-- Guide 1 -->
      <article class="guide-card" onclick="triggerToast('Guide: Handling Shattered Screens')">
        <div class="guide-img-box">
          <span class="guide-badge">DISPLAY EMERGENCY</span>
          <img src="https://images.unsplash.com/photo-1563206767-5b18f218e8de?auto=format&fit=crop&w=800&q=80" alt="Cracked phone screen display protocol" loading="lazy" />
        </div>
        <div class="guide-body">
          <h3 class="guide-title"><?php echo esc_html( mp_opt( 'guide1_title', 'Cracked OLED? Prevent Digitizer Failure' ) ); ?></h3>
          <p class="guide-text"><?php echo esc_html( mp_opt( 'guide1_desc', 'Apply transparent packing tape immediately over spiderweb cracks to keep tiny glass shards from puncturing the fragile AMOLED matrix underneath.' ) ); ?></p>
        </div>
      </article>

      <!-- Guide 2 -->
      <article class="guide-card" onclick="triggerToast('Guide: Liquid Emergency Protocols')">
        <div class="guide-img-box">
          <span class="guide-badge">LIQUID PROTOCOL</span>
          <img src="https://images.unsplash.com/photo-1512499617640-c74ae3a79d37?auto=format&fit=crop&w=800&q=80" alt="Water damaged smartphone rescue guide" loading="lazy" />
        </div>
        <div class="guide-body">
          <h3 class="guide-title"><?php echo esc_html( mp_opt( 'guide2_title', 'Never Put Wet Phones in Rice' ) ); ?></h3>
          <p class="guide-text"><?php echo esc_html( mp_opt( 'guide2_desc', 'Rice starch gums up charging ports and accelerates internal solder oxidation. Power off instantly and rush your device for ultrasonic de-oxidation.' ) ); ?></p>
        </div>
      </article>

      <!-- Guide 3 -->
      <article class="guide-card" onclick="triggerToast('Guide: Battery Health Preservation')">
        <div class="guide-img-box">
          <span class="guide-badge">BATTERY HEALTH</span>
          <img src="https://images.unsplash.com/photo-1584438784894-089d6a62b8fa?auto=format&fit=crop&w=800&q=80" alt="Smartphone battery calibration habits" loading="lazy" />
        </div>
        <div class="guide-body">
          <h3 class="guide-title"><?php echo esc_html( mp_opt( 'guide3_title', 'The 20% to 80% Rule for Li-Ion Cells' ) ); ?></h3>
          <p class="guide-text"><?php echo esc_html( mp_opt( 'guide3_desc', 'Avoid discharging below 15% under Bardiya\'s summer heat. Using GaN trickle-charging blocks prevents terminal expansion and maintains capacity for 3+ years.' ) ); ?></p>
        </div>
      </article>
    </div>
  </div>
</section>

<!-- ================= 10. VERIFIED CUSTOMER REVIEWS ================= -->
<section class="section-wrap" id="reviews">
  <div class="container">
    <div class="section-header">
      <div class="section-header-copy">
        <span class="eyebrow"><?php echo esc_html( mp_opt( 'reviews_kicker', 'VERIFIED LOCAL CUSTOMERS' ) ); ?></span>
        <h2 class="section-title"><?php echo esc_html( mp_opt( 'reviews_title', 'What Gulariya Residents Say' ) ); ?></h2>
        <p class="section-subtitle"><?php echo esc_html( mp_opt( 'reviews_subtitle', 'Real feedback from local smartphone buyers and repair customers across Bardiya district.' ) ); ?></p>
      </div>
      <div class="rating-header-badge">
        <span>★ <?php echo esc_html( mp_opt( 'reviews_rating_score', '4.9 / 5.0' ) ); ?></span>
        <span style="color:#78350f; font-weight:600;">(<?php echo esc_html( mp_opt( 'reviews_rating_count_text', '250+ Local Customer Reviews' ) ); ?>)</span>
      </div>
    </div>

    <div class="reviews-grid">
      <!-- Review 1 -->
      <div class="review-card">
        <div>
          <div class="review-stars">★★★★★</div>
          <p class="review-text">"My battery health was down to 74% and causing phone slowdowns. They replaced it with original-grade cell and re-coded the BMS so there is no annoying battery error in settings. Lasts a full day and a half now!"</p>
        </div>
        <div class="reviewer-info">
          <div class="reviewer-avatar">AC</div>
          <div>
            <h4 class="reviewer-name">Anil Chaudhary</h4>
            <p class="reviewer-meta">Badhaiyatal, Bardiya • iPhone 13 Battery Replacement (Micro-welded)</p>
          </div>
        </div>
      </div>

      <!-- Review 2 -->
      <div class="review-card">
        <div>
          <div class="review-stars">★★★★★</div>
          <p class="review-text">"Honest pricing without hidden markup. They clearly explained the warranty difference between unverified grey imports and official NTA-registered models. Highly recommended for genuine phones in Western Nepal."</p>
        </div>
        <div class="reviewer-info">
          <div class="reviewer-avatar">DY</div>
          <div>
            <h4 class="reviewer-name">Dharmendra Yadav</h4>
            <p class="reviewer-meta">Rajapur, Bardiya • Samsung Galaxy A55 5G + Anker Fast Charger</p>
          </div>
        </div>
      </div>

      <!-- Review 3 -->
      <div class="review-card">
        <div>
          <div class="review-stars">★★★★★</div>
          <p class="review-text">"My S24 Ultra screen shattered during a bike ride. Two shops in Nepalgunj told me I had to leave the phone for 5 days. Ali Mobile fixed it in their cleanroom lab in under an hour while I had tea next door. Touch and color are 100% perfect."</p>
        </div>
        <div class="reviewer-info">
          <div class="reviewer-avatar">PS</div>
          <div>
            <h4 class="reviewer-name">Pooja Shrestha</h4>
            <p class="reviewer-meta">Bansgadhi, Bardiya • Samsung Galaxy S24 Ultra Display Replacement</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= 11. VISIT US IN GULARIYA / CONTACT ================= -->
<section class="section-wrap" id="contact">
  <div class="container">
    <div class="section-header">
      <div class="section-header-copy">
        <span class="eyebrow">WALK IN ANYTIME</span>
        <h2 class="section-title">Visit Us in Gulariya</h2>
        <p class="section-subtitle">Centrally located at Ji. Pra. Ka. Chowk. Walk in for brand-new phone purchases, immediate repair diagnostic, screen protectors, or honest technical advice.</p>
      </div>
      <a class="view-all-pill" href="<?php echo esc_url( $map_url ); ?>" target="_blank" rel="noopener noreferrer">Get Directions <span>→</span></a>
    </div>

    <div class="visit-grid">
      <!-- Left Address Card -->
      <div class="location-details-box">
        <div>
          <div class="loc-item">
            <div class="loc-icon">📍</div>
            <div>
              <h4 class="loc-title">Ali Mobile Center &amp; Apple Fix</h4>
              <p class="loc-desc"><?php echo esc_html( $address ); ?>, Lumbini Province, Nepal</p>
            </div>
          </div>

          <div class="loc-item">
            <div class="loc-icon">📞</div>
            <div>
              <h4 class="loc-title">Direct Showroom Hotline</h4>
              <p class="loc-desc"><?php echo esc_html( $phone ); ?></p>
            </div>
          </div>

          <div class="loc-item">
            <div class="loc-icon">⏰</div>
            <div>
              <h4 class="loc-title">Showroom &amp; Lab Hours</h4>
              <p class="loc-desc"><?php echo wp_kses_post( $hours ); ?></p>
            </div>
          </div>
        </div>

        <div class="actions" style="margin-top: 24px;">
          <a class="whatsapp-action-btn" href="https://wa.me/<?php echo esc_attr( $clean_p ); ?>?text=Hello%20Ali%20Mobile%20Center,%20I%20am%20visiting%20your%20counter%20today." target="_blank" rel="noopener noreferrer">
            <span>Message on WhatsApp</span>
          </a>
          <a class="direct-call-btn" style="color:var(--navy); border-color:var(--line); background:#f8faff;" href="tel:+<?php echo esc_attr( $clean_p ); ?>">
            <span>Call Counter</span>
          </a>
        </div>
      </div>

      <!-- Right Map Embed -->
      <div class="map-preview-card">
        <div class="map-overlay-badge">
          <div class="map-overlay-title">Ali Mobile Center</div>
          <div class="map-overlay-addr"><?php echo esc_html( $address ); ?></div>
          <a class="open-maps-link" href="<?php echo esc_url( $map_url ); ?>" target="_blank" rel="noopener noreferrer">
            <span>Open in Maps ↗</span>
          </a>
        </div>
        <div class="map-inner-frame">
          <iframe
            title="<?php echo esc_attr__( 'Ali Mobile Center Location in Gulariya', 'mobile-pasal' ); ?>"
            src="https://maps.google.com/maps?q=Gulariya%2C%20Bardiya%2C%20Nepal&t=&z=15&ie=UTF8&iwloc=&output=embed"
            loading="lazy">
          </iframe>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
get_footer();
