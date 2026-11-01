<?php
/**
 * Ali Mobile Center & Apple Fix — Luxury Custom Theme Options Panel
 * Full-Width Architectural UI/UX, Dynamic Content Engine & Live Customizer
 *
 * @package Mobile_Pasal
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Master Theme Options Defaults Dictionary (Per-Request Static Cached)
 */
function mobile_pasal_options_defaults() {
	static $cached_defaults = null;
	if ( null !== $cached_defaults ) {
		return $cached_defaults;
	}

	$uri = get_template_directory_uri();

	$cached_defaults = array(
		// ── 1. Global Brand & Palette ──
		'site_brand_name'              => 'Ali Mobile Center & Apple Fix',
		'store_name'                   => 'Ali Mobile Center & Apple Fix',
		'site_domain_badge'            => 'Gulariya-06, Ji. Pra. Ka. Chowk',
		'site_tagline'                 => 'Official NTA Smartphones, Genuine Gear & Apple Fix Precision Lab',
		'footer_brand_desc'            => 'Official NTA Smartphones, Genuine Gear & Apple Fix Precision Lab',
		'brand_name_line1'             => 'Ali Mobile',
		'brand_name_line2'             => 'Center',
		'site_logo'                    => '',
		'footer_logo'                  => '',
		'logo_image'                   => '',
		'site_favicon'                 => '',
		'favicon_image'                => '',
		'color_primary'                => '#0066cc',
		'color_primary_dark'           => '#004c99',
		'color_primary_light'          => '#eff6ff',
		'color_green'                  => '#16a34a',
		'color_amber'                  => '#f59e0b',
		'preloader_enabled'            => 1,
		'enable_preloader'             => 1,
		'preloader_duration'           => '1000',
		'currency_symbol'              => 'NPR',
		'handset_show_price'           => 1,
		'handset_hidden_price_text'    => 'Inquire for Today\'s Best Counter Rate',
		'handset_hidden_price_note'    => 'Official NTA stock. Contact our counter directly for today\'s cash/card offer.',

		// ── 2. Header & Counter Desk Coordinates ──
		'counter_phone'                => '+977 9804530786',
		'store_phone'                  => '+977 9804530786',
		'contact_phone'                => '+977 9804530786',
		'whatsapp_number'              => '9779804530786',
		'contact_whatsapp_number'      => '9779804530786',
		'whatsapp_default_message'     => 'Namaste Ali Mobile, I have an inquiry about smartphones / repairs.',
		'counter_address'              => 'Gulariya-06, Ji. Pra. Ka. Chowk, Bardiya, Nepal',
		'store_address'                => 'Gulariya-06, Ji. Pra. Ka. Chowk, Bardiya, Nepal',
		'contact_address'              => 'Gulariya-06, Ji. Pra. Ka. Chowk, Bardiya, Nepal',
		'topbar_address'               => 'Gulariya-06, Ji. Pra. Ka. Chowk',
		'counter_hours'                => 'Sun–Fri: 9:00 AM – 8:00 PM | Sat: Open',
		'store_hours'                  => 'Sun–Fri: 9:00 AM – 8:00 PM | Sat: Open',
		'contact_hours'                => 'Sun–Fri: 9:00 AM – 8:00 PM | Sat: Open',
		'topbar_hours'                 => 'Sun–Fri 9AM–8PM | Sat Open',
		'counter_email'                => 'alimobilecenter@gmail.com',
		'counter_map_url'              => 'https://www.google.com/maps/search/?api=1&query=Ali+Mobile+Center+Gulariya+Bardiya',
		'google_maps_link'             => 'https://www.google.com/maps/search/?api=1&query=Ali+Mobile+Center+Gulariya+Bardiya',
		'counter_map_embed'            => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14092.355027581788!2d81.3340578672535!3d28.23253308803451!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3998816c1cebe293%3A0x6b8db7eb4ef9bbd3!2sGulariya%2006%2C%20Bardiya!5e0!3m2!1sen!2snp!4v1700000000000!5m2!1sen!2snp" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
		'store_map_embed'              => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14092.355027581788!2d81.3340578672535!3d28.23253308803451!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3998816c1cebe293%3A0x6b8db7eb4ef9bbd3!2sGulariya%2006%2C%20Bardiya!5e0!3m2!1sen!2snp!4v1700000000000!5m2!1sen!2snp" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
		'topbar_enabled'               => 1,
		'header_sticky'                => 1,
		'header_wa_btn_text'           => 'Chat on WhatsApp',
		'header_search_enabled'        => 1,

		// ── 3. Home Hero Slider: Slide 1 ──
		'hero_slide1_trust'            => 'Trusted by 10,000+ Customers',
		'hero_slide1_title'            => 'Expert <span class="accent">Mobile Repair</span> & Service',
		'hero_slide1_intro'            => 'Your One-Stop Solution for Mobile Repair, Accessories and More.',
		'hero_slide1_f1_icon'          => 'clock',
		'hero_slide1_f1_text'          => 'Fast<br>Service',
		'hero_slide1_f2_icon'          => 'screen',
		'hero_slide1_f2_text'          => 'Genuine<br>Parts',
		'hero_slide1_f3_icon'          => 'wrench',
		'hero_slide1_f3_text'          => 'Skilled<br>Technicians',
		'hero_slide1_f4_icon'          => 'tag',
		'hero_slide1_f4_text'          => 'Affordable<br>Price',
		'hero_slide1_btn1_text'        => 'Book a Repair',
		'hero_slide1_btn1_url'         => '#contact',
		'hero_slide1_btn2_text'        => 'Watch Video',
		'hero_slide1_btn2_url'         => '#services',
		'hero_slide1_tagline'          => 'Fix It.<br>Stay Connected!',
		'hero_slide1_image'            => $uri . '/assets/images/hero-repair-lab.jpg',

		// ── 3. Home Hero Slider: Slide 2 ──
		'hero_slide2_trust'            => 'Careful Repairs. Quality Parts.',
		'hero_slide2_title'            => 'Cracked Screen? <span class="accent">We\'ve Got You.</span>',
		'hero_slide2_intro'            => 'From screen replacement to battery problems, get your phone back in shape with reliable service.',
		'hero_slide2_f1_icon'          => 'screen',
		'hero_slide2_f1_text'          => 'Screen<br>Replacement',
		'hero_slide2_f2_icon'          => 'battery',
		'hero_slide2_f2_text'          => 'Battery<br>Change',
		'hero_slide2_f3_icon'          => 'water',
		'hero_slide2_f3_text'          => 'Water Damage<br>Check',
		'hero_slide2_f4_icon'          => 'microchip',
		'hero_slide2_f4_text'          => 'Software<br>Support',
		'hero_slide2_btn1_text'        => 'Get Your Phone Fixed',
		'hero_slide2_btn1_url'         => '#contact',
		'hero_slide2_btn2_text'        => 'Explore Services',
		'hero_slide2_btn2_url'         => '#services',
		'hero_slide2_tagline'          => 'Repair Right.<br>Relax More.',
		'hero_slide2_image'            => $uri . '/assets/images/iphone-repair-hands.jpg',

		// ── 3. Home Hero Slider: Slide 3 ──
		'hero_slide3_trust'            => 'Your Local Mobile Store',
		'hero_slide3_title'            => 'Find Your <span class="accent">Next Phone.</span>',
		'hero_slide3_intro'            => 'Explore popular smartphones, useful accessories and friendly advice — all in one place.',
		'hero_slide3_f1_icon'          => 'star',
		'hero_slide3_f1_text'          => 'Popular<br>Brands',
		'hero_slide3_f2_icon'          => 'cable',
		'hero_slide3_f2_text'          => 'Accessories',
		'hero_slide3_f3_icon'          => 'heart',
		'hero_slide3_f3_text'          => 'Helpful<br>Advice',
		'hero_slide3_f4_icon'          => 'coins',
		'hero_slide3_f4_text'          => 'Trusted<br>Service',
		'hero_slide3_btn1_text'        => 'Visit Our Store',
		'hero_slide3_btn1_url'         => '#contact',
		'hero_slide3_btn2_text'        => 'View Gallery',
		'hero_slide3_btn2_url'         => '#gallery',
		'hero_slide3_tagline'          => 'Discover More.<br>Stay Connected!',
		'hero_slide3_image'            => $uri . '/assets/images/hero-accessories.jpg',

		// ── Post-Hero Guarantees (Common 4 Features Bar) ──
		'trust_bar_enabled'            => 1,
		'trust_feat1_icon'             => 'clock',
		'trust_feat1_title'            => 'Fast 45-Min Fix',
		'trust_feat1_desc'             => 'Instant on-counter screen & battery turnaround',
		'trust_feat2_icon'             => 'screen',
		'trust_feat2_title'            => 'Genuine OLED Parts',
		'trust_feat2_desc'             => 'TrueTone & 3D Touch programming retained',
		'trust_feat3_icon'             => 'wrench',
		'trust_feat3_title'            => 'Level 4 Technicians',
		'trust_feat3_desc'             => 'Micro-soldering & stereo microscope cleanroom lab',
		'trust_feat4_icon'             => 'shield',
		'trust_feat4_title'            => 'Affordable Pricing',
		'trust_feat4_desc'             => 'Transparent rates with warranty & official VAT bill',


		// ── 4. Diagnostic Estimator (Preserved) ──
		'estimator_enabled'            => 1,
		'repair_kicker'                => 'Live Diagnostic Console',
		'repair_title'                 => 'Interactive Repair Estimator',
		'repair_subtitle'              => 'Select your device and fault below. Your live repair docket is prepared in real-time. Dispatch directly to our Gulariya technician on WhatsApp for instant counter quotes.',

		// ── 5. Categories & Authorized Brands ──
		'categories_kicker'            => 'Showroom Counters',
		'categories_title'             => 'Explore Store Counters & Departments',
		'categories_subtitle'          => 'From brand-new sealed smartphones to Gulariya\'s dedicated Apple Fix lab, genuine accessories, and digital merchant services.',
		'categories_btn_text'          => 'View All Products',
		'categories_btn_url'           => '#catalog',
		'cat1_count'                   => '50+ Handsets',
		'cat1_title'                   => 'Smartphones',
		'cat1_sub'                     => 'iPhone, Samsung, Pixel & Redmi',
		'cat1_hint'                    => 'Browse Showroom',
		'cat1_url'                     => '#catalog',
		'cat2_count'                   => 'Screen • Battery',
		'cat2_title'                   => 'Apple Fix Lab',
		'cat2_sub'                     => 'iPhone Screen, Battery & IC Lab',
		'cat2_hint'                    => 'View Repair Board',
		'cat2_url'                     => '#services',
		'cat3_count'                   => 'Original Buds',
		'cat3_title'                   => 'Audio & Buds',
		'cat3_sub'                     => 'AirPods, Neckbands & ANC Sound',
		'cat3_hint'                    => 'Explore Studio',
		'cat3_url'                     => '#catalog',
		'cat4_count'                   => 'AMOLED Calling',
		'cat4_title'                   => 'Smartwatches',
		'cat4_sub'                     => 'Calling, AMOLED & Fitness Wear',
		'cat4_hint'                    => 'Discover Watches',
		'cat4_url'                     => '#catalog',
		'cat5_count'                   => 'PD 20W–120W',
		'cat5_title'                   => 'Chargers & Glass',
		'cat5_sub'                     => '20W–120W Adapters & 9H Glass',
		'cat5_hint'                    => 'View Protection',
		'cat5_url'                     => '#catalog',
		'cat6_count'                   => 'Merchant Top-Up',
		'cat6_title'                   => 'eSewa & Banking',
		'cat6_sub'                     => 'Top-Up, Bills & Money Transfer',
		'cat6_hint'                    => 'Counter Agent',
		'cat6_url'                     => 'https://wa.me/9779804530786?text=Namaste%2C%20eSewa%20recharge%20sewa%20barema%20bujhna%20chahanchhu',

		'brands_kicker'                => 'Authorized Brands',
		'brands_title'                 => 'Top Smartphone Brands In Store',
		'brands_subtitle'              => 'Select any brand tile below to instantly filter available models in our showroom catalog.',
		'brands_btn_text'              => 'Explore All Brands',
		'brands_btn_url'               => '#catalog',
		'brand1_name'                  => 'Apple',
		'brand1_sub'                   => 'iPhone 16 / 15 / 14 Series',
		'brand1_chip'                  => 'Filter iPhone →',
		'brand2_name'                  => 'Samsung',
		'brand2_sub'                   => 'Galaxy S24 Ultra & A Series',
		'brand2_chip'                  => 'Filter Galaxy →',
		'brand3_name'                  => 'Google Pixel',
		'brand3_sub'                   => 'Pixel 9 / 8 & Tensor AI',
		'brand3_chip'                  => 'Filter Pixel →',
		'brand4_name'                  => 'OnePlus',
		'brand4_sub'                   => 'OnePlus 12 & Nord 4',
		'brand4_chip'                  => 'Filter OnePlus →',
		'brand5_name'                  => 'Xiaomi',
		'brand5_sub'                   => 'Xiaomi 14 & Redmi Note 13',
		'brand5_chip'                  => 'Filter Redmi →',
		'brand6_name'                  => 'Accessories',
		'brand6_sub'                   => 'AirPods, Watch & Anker Fast PD',
		'brand6_chip'                  => 'Filter Gear →',

		// ── Showroom Handsets Catalog (Homepage Section) ──
		'catalog_kicker'               => 'Showroom Catalog',
		'catalog_title'                => 'Latest Smartphone Arrivals & Top Models',
		'catalog_subtitle'             => 'Every handset is checked, unboxed or sealed-pack with official VAT bill & warranty. Filter by brand or search your model.',
		'catalog_header_btn_text'      => 'Inquire Full Stock',
		'catalog_search_placeholder'   => 'Search iPhone, Galaxy, Pixel, Redmi, Buds...',
		'catalog_empty_title'          => 'No matching models found in this tab',
		'catalog_empty_desc'           => 'We order rare or flagship variants directly from authorized distributors. Send your model name on WhatsApp for counter availability.',
		'catalog_empty_btn_text'       => 'Inquire Directly on WhatsApp',

		// ── 6. iPhone 16 Pro Spotlight & Apple Fix Bench ──
		'spotlight_badge'              => 'Official Authorized Flagship Handset',
		'spotlight_title'              => 'iPhone 16 Pro & Pro Max',
		'spotlight_tagline'            => 'Built for Apple Intelligence • Grade 5 Titanium',
		'spotlight_desc'               => 'Experience the supercharged A18 Pro chip, 48MP Fusion Camera system, tactile Camera Control button, and unmatched battery endurance. Sealed-pack stock ready for immediate counter handover at Ali Mobile Gulariya.',
		'spotlight_status_text'        => '',
		'spotlight_image'              => $uri . '/assets/images/iphone-16-pro.jpg',

		// Apple Fix Precision Lab Showcase
		'lab_badge'                    => 'Apple Fix Specialist • Gulariya Counter',
		'lab_title'                    => 'Gulariya\'s Premier Precision Apple Fix Lab',
		'lab_desc'                     => 'We do not forward your phone to Nepalgunj or Kathmandu. Our on-site workstation handles display lamination, genuine battery replacement, ultrasonic board cleaning, and IC diagnostics right in front of you.',
		'lab_feat1_title'              => '30-Minute Screen Replacement',
		'lab_feat1_desc'               => 'Fast OLED and glass restoration with TrueTone & 3D touch programming.',
		'lab_feat2_title'              => 'Battery Health Calibration',
		'lab_feat2_desc'               => 'Certified battery replacements that restore peak 100% capacity and battery health cycle.',
		'lab_feat3_title'              => 'In-Front-Of-You Transparency',
		'lab_feat3_desc'               => 'Watch your repair live across our counter. Complete privacy protection for photos & accounts.',
		'lab_stat1_num'                => '30m',
		'lab_stat1_label'              => 'Display Turnaround',
		'lab_stat2_num'                => '100%',
		'lab_stat2_label'              => 'Battery Health',
		'lab_stat3_num'                => '90d',
		'lab_stat3_label'              => 'Service Warranty',
		'lab_btn1_text'                => 'Consult Our Technician',
		'lab_btn2_prefix'              => 'Call Counter',
		'lab_image'                    => $uri . '/assets/images/apple-fix-bench.jpg',
		'lab_live_status'              => 'Live Gulariya Counter Cleanroom Lab',
		'lab_tagline'                  => 'Stereo Zoom Microscope • Anti-Static ESD Station',
		'lab_feat1_icon'               => 'clock',
		'lab_feat1_chip'               => 'TrueTone & 3D Touch Retained',
		'lab_feat2_icon'               => 'battery',
		'lab_feat2_chip'               => 'Zero Error BMS Micro-Welded',
		'lab_feat3_icon'               => 'shield',
		'lab_feat3_chip'               => '100% Privacy Protection',

		// ── Homepage Repair Services & Workflow ──
		'services_kicker'              => 'Diagnostics & Solutions',
		'services_title'               => 'Complete Counter Repair Services',
		'services_subtitle'            => 'From Apple iPhone to Samsung Galaxy and Xiaomi devices, all repairs are performed with original-grade parts and live customer inspection.',
		'services_header_btn_text'     => 'Ask Instant Quote',
		'service_card_btn_text'        => 'Inquire Quote',
		'workflow_kicker'              => 'Transparent Workflow',
		'workflow_title'               => '3-Step Counter Service in Gulariya',
		'workflow_subtitle'            => 'Simple, reliable, and completely open process from diagnosis to handover.',
		'workflow_step1_title'         => 'Free Counter Diagnostic',
		'workflow_step1_desc'          => 'Bring your phone to Ji. Pra. Ka. Chowk. Our technician inspects hardware symptoms in 5 minutes with exact repair estimate.',
		'workflow_step2_title'         => 'In-Front-Of-You Precision Fix',
		'workflow_step2_desc'          => 'Watch your repair live across our counter. Genuine parts installed with precision tools, heat beds, and ESD mats.',
		'workflow_step3_title'         => 'Testing & Handover',
		'workflow_step3_desc'          => 'Multi-point check for touch response, cameras, cellular signal, and battery. Handover with testing warranty.',

		// ── Phone First-Aid & Care Guides ──
		'guides_kicker'                => 'Technician Advice',
		'guides_title'                 => 'Phone First-Aid & Care Guides',
		'guides_subtitle'              => 'Practical guidance from our certified technicians on protecting your smartphone before bringing it to our counter.',
		'guides_header_btn_text'       => 'Ask Technician Advice',
		'guide1_img'                   => $uri . '/assets/images/tip-cracked-screen.jpg',
		'guide1_tag'                   => 'Display Emergency',
		'guide1_title'                 => 'Cracked Screen First-Aid',
		'guide1_desc'                  => 'Do not apply hard pressure on glass cracks to avoid bleeding the underlying OLED panel. Tape over cracks with clear tape to prevent finger cuts, and back up your data.',
		'guide1_btn_text'              => 'Book Screen Replacement',
		'guide1_btn_url'               => '#services',
		'guide2_img'                   => $uri . '/assets/images/tip-water-damage.jpg',
		'guide2_tag'                   => 'Liquid Protocol',
		'guide2_title'                 => 'Phone Dropped in Water?',
		'guide2_desc'                  => 'Turn off device immediately. Never plug in a charging cable, and avoid shaking or using a hair dryer. Bring it to our counter within 2 hours for ultrasonic de-oxidation.',
		'guide2_btn_text'              => 'Contact Emergency Tech',
		'guide2_btn_url'               => 'https://wa.me/9779804530786?text=Emergency%3A%20Mero%20phone%20pani%20ma%20paryo%2C%20Gulariya%20counter%20ma%20audai%20chhu',
		'guide3_img'                   => $uri . '/assets/images/tip-battery-care.jpg',
		'guide3_tag'                   => 'Battery Health',
		'guide3_title'                 => 'Maximizing Battery Longevity',
		'guide3_desc'                  => 'Avoid letting your battery drop below 15% frequently. Avoid playing heavy games while fast charging, and use only certified 20W/30W adapters to protect internal battery chemistry.',
		'guide3_btn_text'              => 'Check Battery Health',
		'guide3_btn_url'               => '#services',

		// ── Reviews & Counter Visit ──
		'reviews_kicker'               => 'Verified Local Customers',
		'reviews_title'                => 'What Gulariya Residents Say',
		'reviews_subtitle'             => 'Real feedback from local smartphone buyers and repair customers across Bardiya.',
		'reviews_rating_score'         => '4.9 / 5.0',
		'reviews_rating_count_text'    => '(250+ Local Customer Reviews)',

		'visit_kicker'                 => 'Walk In Anytime',
		'visit_title'                  => 'Visit Us in Gulariya',
		'visit_desc'                   => 'Centrally located at Ji. Pra. Ka. Chowk. Walk in for brand-new phone purchases, immediate repair diagnostic, screen protectors, or honest technical advice.',
		'visit_phone_sub'              => 'Direct counter support available 7 days a week',
		'visit_hours_title'            => 'Counter Hours',
		'visit_btn1_text'              => 'Call Store Now',
		'visit_btn2_text'              => 'WhatsApp Us',
		'visit_btn3_text'              => 'Directions',
		'visit_map_url'                => 'https://maps.google.com/maps?q=Gulariya+06+Bardiya+Nepal&t=&z=15&ie=UTF8&iwloc=&output=embed',

		// ── 7. Shop & 4 Zero-Risk Assurance Cards ──
		'shop_hero_badge'              => 'Gulariya Verified Showroom',
		'shop_hero_title'              => 'Official NTA Smartphones & Genuine Gear.',
		'shop_hero_desc'               => 'Discover Gulariya\'s largest verified inventory of flagship handsets: Apple iPhone 16 Series, Samsung Galaxy S24 Ultra, Google Pixel 9, OnePlus 12, and Xiaomi 14. 100% genuine IMEI bill, warranty support, and free data setup.',
		'assurance_kicker'             => 'Zero-Risk Purchase',
		'assurance_title'              => 'The Ali Mobile Handset Assurance',
		'assurance_subtitle'           => 'Why hundreds of phone buyers across Bardiya trust our counter over unverified online imports.',
		'assurance1_icon'              => 'shield',
		'assurance1_title'             => '100% NTA Approved',
		'assurance1_desc'              => 'Compliant with Nepal Telecommunications Authority IMEI registration for uninterrupted MDMS cellular service across Nepal.',
		'assurance2_icon'              => 'receipt',
		'assurance2_title'             => 'Official VAT Bill',
		'assurance2_desc'              => 'Every single handset comes with an authorized commercial VAT serial bill enabling legitimate distributor warranty claims.',
		'assurance3_icon'              => 'arrows-rotate',
		'assurance3_title'             => 'Free Data Transfer',
		'assurance3_desc'              => 'We safely migrate your WhatsApp chats, photos, contacts, and mobile apps directly to your new phone before you leave.',
		'assurance4_icon'              => 'store',
		'assurance4_title'             => 'Trade-In Counter',
		'assurance4_desc'              => 'Bring your old handset for fair, transparent counter evaluation toward the purchase of any new smartphone.',

		// ── 8. Apple Fix Lab & Precision Services ──
		'services_hero_badge'          => 'Gulariya\'s Premier Mobile Clinic',
		'services_hero_title'          => 'Apple Fix Lab & Precision Repairs',
		'services_hero_desc'           => 'Component-level micro-soldering, true-tone OLED display calibrations, 0-cycle battery replacements, and ultrasonic liquid recovery performed live in Gulariya.',
		'services_cta_title'           => 'Need an Urgent Screen, Battery, or Board Fix?',
		'services_cta_desc'            => 'Bring your phone to our counter at Ji. Pra. Ka. Chowk or send your device fault on WhatsApp for instant evaluation.',
		// 5 FAQs
		'faq1_q'                       => 'How long does an iPhone screen replacement take?',
		'faq1_a'                       => 'Most standard screen replacements for iPhone 11 through iPhone 15 Pro are completed within 35 to 45 minutes right in our Gulariya counter lab. We calibrate True-Tone display data so brightness behaves naturally.',
		'faq2_q'                       => 'Are your new handsets registered with NTA MDMS?',
		'faq2_a'                       => 'Yes, 100%. Every smartphone sold at Ali Mobile Center is officially imported via authorized national distributors, fully compliant with Nepal Telecommunications Authority (NTA) MDMS IMEI registration, and accompanied by a genuine VAT bill.',
		'faq3_q'                       => 'Do you replace iPhone batteries without the unknown part warning?',
		'faq3_a'                       => 'Yes! For supported models, we perform battery BMS board tag-on transplants and spot welding so your device reads 100% maximum capacity without triggering unwanted warning banners.',
		'faq4_q'                       => 'What is covered under the 90-day repair warranty?',
		'faq4_a'                       => 'Our 90-day warranty covers touch sensitivity, display flicker, charging flex failure, and battery performance defects. It excludes subsequent physical accidental drops, liquid spills, or third-party unauthorized tampering.',
		'faq5_q'                       => 'Can I trade in my old phone for an iPhone 16 Pro?',
		'faq5_a'                       => 'Absolutely. Bring your current handset to our counter. Our technician will evaluate display condition, battery health, and body cosmetics to deduct fair cash value directly from your new phone invoice.',

		// ── 9. Heritage & About Us ──
		'about_hero_badge'             => 'Serving Bardiya Since 2018',
		'about_hero_title'             => 'The Story Behind Ali Mobile Center & Apple Fix',
		'about_hero_desc'              => 'From a modest handset desk to Gulariya\'s premier smartphone showroom and precision electronics laboratory, built on trust, genuine billing, and skilled engineering.',
		'about_story_kicker'           => 'Our Heritage',
		'about_story_head'             => 'Built on Genuine Handsets & Microscope Precision',
		'about_story_p1'               => 'Ali Mobile Center was founded with a singular conviction: residents of Gulariya and wider Bardiya should not have to compromise on smartphone authenticity or travel 40km to Nepalgunj for skilled iPhone repairs. From day one, every handset on our shelves is 100% NTA approved with an official VAT bill.',
		'about_story_p2'               => 'Over eight years of service, we invested in German stereomicroscopes, programmable thermal rework stations, and ultrasonic liquid cleaning baths. Today, whether you need a sealed iPhone 16 Pro Max or precision BGA micro-soldering, our counter provides five-star reliability.',
		'about_founder_quote'          => 'A smartphone connects you to family, livelihood, and emergency aid. When you buy from us or bring a damaged phone to our bench, we treat it with the utmost responsibility and skill.',
		'about_stat1_num'              => '8+ Years',
		'about_stat1_label'            => 'Serving Gulariya & Bardiya',
		'about_stat2_num'              => '12,000+',
		'about_stat2_label'            => 'Satisfied Customers',
		'about_stat3_num'              => '100%',
		'about_stat3_label'            => 'NTA Verified IMEI Handsets',
		'about_stat4_num'              => '90 Days',
		'about_stat4_label'            => 'Repair Warranty Support',
		'about_story_image'            => $uri . '/assets/images/hero-repair-lab.jpg',
		'about_tooling_kicker'         => 'Cleanroom Tooling',
		'about_tooling_head'           => 'Professional Hardware Equipment on Our Bench',
		'about_tooling_desc'           => 'We invest in industrial-grade diagnostic equipment so your premium smartphone is treated with laboratory care.',
		'about_tool1_title'            => 'Stereo Optical Microscope',
		'about_tool1_desc'             => '45x continuous zoom trinocular microscope for precision inspection of 0201 SMD resistors, broken circuit jumper wires, and logic board BGA pads.',
		'about_tool2_title'            => 'Digital Ultrasonic Sonicator',
		'about_tool2_desc'             => 'Multi-frequency heated ultrasonic chemical bath specifically designed to dislodge liquid oxidation and electrolytic crystals from water-damaged logic boards.',
		'about_tool3_title'            => 'Programmable Rework & Micro-Pencil',
		'about_tool3_desc'             => 'Micro-soldering station with rapid temperature recovery, anti-static ESD earthing, and custom nozzles to protect adjacent motherboard IC components.',
		'about_commitments_kicker'     => 'Integrity First',
		'about_commitments_head'       => 'Our 4 Core Counter Commitments',
		'about_commitments_desc'       => 'How we do business every day at Ji. Pra. Ka. Chowk.',
		'about_commit1_title'          => '100% Data Privacy',
		'about_commit1_desc'           => 'We respect customer privacy. Technicians do not browse personal photos, chat apps, or notes. We test hardware using dedicated hardware diagnostics.',
		'about_commit2_title'          => 'Zero Hidden Extra Fees',
		'about_commit2_desc'           => 'Every quote is provided upfront. If unexpected secondary faults are found during repair, we call and obtain your permission before proceeding.',
		'about_commit3_title'          => 'No Counterfeits Sold as OEM',
		'about_commit3_desc'           => 'We clearly distinguish between original-grade parts and value options. We never sell low-grade copy screens claiming they are genuine displays.',
		'about_commit4_title'          => 'Safe Battery Recycling',
		'about_commit4_desc'           => 'Swollen and depleted lithium-ion batteries are isolated and disposed of responsibly to prevent toxic chemical leaching and fire hazards.',

		// ── 10. Contact Page & Direct Helplines ──
		'contact_hero_badge'           => 'Gulariya Counter & Lab',
		'contact_hero_title'           => 'Visit Our Counter or Send a Direct Inquiry.',
		'contact_hero_desc'            => 'Whether you are looking to purchase a new flagship handset, need an urgent screen replacement, or want trade-in pricing, visit our counter at Ji. Pra. Ka. Chowk.',
		'contact_form_title'           => 'Direct Consultation & Repair Inquiry',
		'contact_form_subtitle'        => 'Fill out your device and symptom details below. Your request will automatically compile and dispatch directly to our technician on WhatsApp.',
		'contact_desk_title'           => 'Showroom & Lab Counter',
		'contact_desk_desc'            => 'Walk-in customer counter with on-site technician workbench. Free diagnostic checks in 5 minutes.',
		'contact_map_kicker'           => 'Navigation & Map',
		'contact_map_title'            => 'Locate Us at Ji. Pra. Ka. Chowk',
		'contact_map_desc'             => 'Easily accessible from all major junctions in Gulariya and surrounding Bardiya municipal areas.',
		'contact_landmarks_kicker'     => 'Arrival & Transit',
		'contact_landmarks_title'      => 'Finding Our Store Counter',
		'contact_landmarks_desc'       => 'Key landmarks and convenient parking tips for your visit to Ji. Pra. Ka. Chowk.',
		'contact_lm1_title'            => 'Prominent Landmark',
		'contact_lm1_desc'             => 'Situated directly at Ji. Pra. Ka. Chowk (District Administration Office junction), opposite the main arterial road in Gulariya Bazar.',
		'contact_lm2_title'            => 'Easy Front Parking',
		'contact_lm2_desc'             => 'Ample dedicated front space for motorcycle and scooter parking, as well as easy pull-up access for cars while dropping off devices.',
		'contact_lm3_title'            => '2 Mins from Bus Stand',
		'contact_lm3_desc'             => 'Only a 2-minute walk from Gulariya Main Bus Stand & Birendra Chowk. Direct local autos available from Badhaiyatal, Madhuwan, and Rajapur.',

		// ── 11. Mobile Bottom Bar & Floating WhatsApp ──
		'floating_wa_enabled'          => 1,

		// ── 12. Footer & Legal ──
		'footer_col1_title'            => 'Handset Showroom',
		'footer_col2_title'            => 'Apple Fix Lab',
		'footer_col3_title'            => 'Store Information',
		'footer_copyright'             => '© 2026 Ali Mobile Center & Apple Fix. Gulariya-06, Bardiya, Nepal. All Rights Reserved.',
		'footer_credit_name'           => 'Rajan Sharma',
		'footer_credit_url'            => '',
		'trust_box1_icon'              => 'shield',
		'trust_box1_title'             => 'NTA Registered Devices',
		'trust_box1_desc'              => '100% compliant with Nepal MDMS laws.',
		'trust_box2_icon'              => 'bolt',
		'trust_box2_title'             => 'Express 45-Min Lab',
		'trust_box2_desc'              => 'Quick turnaround with genuine spare parts.',
		'trust_box3_icon'              => 'tag',
		'trust_box3_title'             => 'Zero Hidden Charges',
		'trust_box3_desc'              => 'Transparent billing and authentic warranties.',
		'trust_box4_icon'              => 'location',
		'trust_box4_title'             => 'Counter Agent Ready',
		'trust_box4_desc'              => 'eSewa top-up, bill payments & cash points.',

		'social_facebook'              => 'https://facebook.com/alimobilecenter',
		'social_instagram'             => 'https://instagram.com/alimobilecenter',
		'social_whatsapp'              => 'https://wa.me/9779804530786',
		'social_tiktok'                => 'https://tiktok.com/@alimobilecenter',
		'social_google_maps'           => 'https://maps.google.com/?q=Ali+Mobile+Center+Gulariya',
		'social_youtube'               => 'https://youtube.com/@alimobilecenter',

		// ── 13. Search Engine Optimization (SEO) ──
		'seo_meta_title'               => 'Ali Mobile Center & Apple Fix | Official NTA Handsets & Precision Phone Repair Gulariya, Bardiya',
		'seo_meta_desc'                => 'Gulariya\'s premier mobile showroom and authorized repair laboratory at Ji. Pra. Ka. Chowk. Genuine Apple iPhone, Samsung & Xiaomi handsets with official NTA approval, 1-year VAT bills, and 45-minute display & battery repairs.',
		'seo_meta_keywords'            => 'mobile shop in gulariya, iphone repair bardiya, apple fix gulariya, ali mobile center, nta approved phone nepal, smartphone repair ji pra ka chowk, second hand iphone bardiya',
		'seo_og_image'                 => '',
		'seo_robots_index'             => '1',
		'seo_google_verify'            => '',
		'seo_bing_verify'              => '',



		// ── 16. 404 Error & Search Results Pages ──
		'error404_code'                => '404',
		'error404_title'               => 'Device Page Not Found',
		'error404_desc'                => 'The handset, repair service, or store page you are looking for may have moved, been renamed, or is temporarily out of stock.',
		'error404_btn1_text'           => 'Back to Home',
		'error404_btn2_text'           => 'Browse Handsets',
		'error404_btn3_text'           => 'Ask Counter Help',
		'search_results_title'         => 'Search: %s',
		'search_empty_title'           => 'No Matches Found',
		'search_empty_desc'            => 'We couldn\'t find anything matching your search term. Feel free to browse our full showroom catalog or reach out on WhatsApp.',
		'search_btn_catalog'           => 'Showroom Catalog',
		'search_btn_whatsapp'          => 'Ask on WhatsApp',

		// ── 17. Custom Code ──
		'custom_css'                   => '',
		'custom_header_scripts'        => '',
		'custom_footer_scripts'        => '',
	);

	return $cached_defaults;
}

/**
 * Flush in-memory cached theme options when updated
 */
function mobile_pasal_flush_options_cache() {
	$GLOBALS['mp_cached_options_array'] = null;
}
add_action( 'update_option_mobile_pasal_options', 'mobile_pasal_flush_options_cache' );
add_action( 'add_option_mobile_pasal_options', 'mobile_pasal_flush_options_cache' );

/**
 * Canonical Alias Dictionary (Admin Canonical Key => Array of Legacy/Template Alias Keys)
 */
function mobile_pasal_get_canonical_alias_groups() {
	return array(
		'site_logo'           => array( 'logo_image' ),
		'site_favicon'        => array( 'favicon_image' ),
		'site_brand_name'     => array( 'store_name' ),
		'site_tagline'        => array( 'footer_brand_desc' ),
		'counter_phone'       => array( 'store_phone', 'contact_phone' ),
		'whatsapp_number'     => array( 'contact_whatsapp_number' ),
		'counter_address'     => array( 'store_address', 'contact_address' ),
		'counter_hours'       => array( 'store_hours', 'contact_hours' ),
		'counter_map_embed'   => array( 'store_map_embed' ),
		'counter_map_url'     => array( 'google_maps_link' ),
		'topbar_enabled'      => array( 'topbar_show' ),
		'preloader_enabled'   => array( 'enable_preloader' ),
		'spotlight_subtitle'  => array( 'spotlight_desc' ),
		'lab_subtitle'        => array( 'lab_desc' ),
		'lab_kicker'          => array( 'lab_badge' ),
		'contact_map_desc'    => array( 'visit_desc' ),
	);
}

/**
 * Retrieve Theme Option with Per-Request Cache, Safe Fallback, and Canonical Aliasing
 */
function mobile_pasal_get_option( $key, $default = null ) {
	if ( ! isset( $GLOBALS['mp_cached_options_array'] ) || null === $GLOBALS['mp_cached_options_array'] ) {
		$loaded = get_option( 'mobile_pasal_options', array() );
		$GLOBALS['mp_cached_options_array'] = is_array( $loaded ) ? $loaded : array();
	}
	$options  = $GLOBALS['mp_cached_options_array'];
	$defaults = mobile_pasal_options_defaults();

	// Alias dictionary for cross-compatibility (maps any alias to its canonical admin field key)
	static $aliases = array(
		'logo_image'              => 'site_logo',
		'site_logo'               => 'logo_image',
		'favicon_image'           => 'site_favicon',
		'site_favicon'            => 'favicon_image',
		'store_name'              => 'site_brand_name',
		'site_brand_name'         => 'store_name',
		'store_phone'             => 'counter_phone',
		'contact_phone'           => 'counter_phone',
		'counter_phone'           => 'store_phone',
		'store_address'           => 'counter_address',
		'contact_address'         => 'counter_address',
		'counter_address'         => 'store_address',
		'store_hours'             => 'counter_hours',
		'contact_hours'           => 'counter_hours',
		'counter_hours'           => 'store_hours',
		'store_map_embed'         => 'counter_map_embed',
		'counter_map_embed'       => 'store_map_embed',
		'google_maps_link'        => 'counter_map_url',
		'counter_map_url'         => 'google_maps_link',
		'topbar_show'             => 'topbar_enabled',
		'topbar_enabled'          => 'topbar_show',
		'enable_preloader'        => 'preloader_enabled',
		'preloader_enabled'       => 'enable_preloader',
		'hero_slide1_desc'        => 'hero_slide1_subtitle',
		'hero_slide1_subtitle'    => 'hero_slide1_desc',
		'hero_slide2_desc'        => 'hero_slide2_subtitle',
		'hero_slide2_subtitle'    => 'hero_slide2_desc',
		'hero_slide3_desc'        => 'hero_slide3_subtitle',
		'hero_slide3_subtitle'    => 'hero_slide3_desc',
		'footer_brand_desc'       => 'site_tagline',
		'site_tagline'            => 'footer_brand_desc',
		'contact_whatsapp_number' => 'whatsapp_number',
		'spotlight_desc'          => 'spotlight_subtitle',
		'spotlight_subtitle'      => 'spotlight_desc',
		'lab_desc'                => 'lab_subtitle',
		'lab_subtitle'            => 'lab_desc',
		'lab_badge'               => 'lab_kicker',
		'lab_kicker'              => 'lab_badge',
		'visit_desc'              => 'contact_map_desc',
	);

	// 0. If requesting a legacy alias whose canonical admin key has a saved non-empty value, prefer the canonical admin key
	$canonical_lookup = array(
		'logo_image'              => 'site_logo',
		'favicon_image'           => 'site_favicon',
		'store_name'              => 'site_brand_name',
		'footer_brand_desc'       => 'site_tagline',
		'store_phone'             => 'counter_phone',
		'contact_phone'           => 'counter_phone',
		'contact_whatsapp_number' => 'whatsapp_number',
		'store_address'           => 'counter_address',
		'contact_address'         => 'counter_address',
		'store_hours'             => 'counter_hours',
		'contact_hours'           => 'counter_hours',
		'store_map_embed'         => 'counter_map_embed',
		'google_maps_link'        => 'counter_map_url',
		'topbar_show'             => 'topbar_enabled',
		'enable_preloader'        => 'preloader_enabled',
		'spotlight_desc'          => 'spotlight_subtitle',
		'lab_desc'                => 'lab_subtitle',
		'lab_badge'               => 'lab_kicker',
		'visit_desc'              => 'contact_map_desc',
	);
	if ( isset( $canonical_lookup[ $key ] ) ) {
		$canon_key = $canonical_lookup[ $key ];
		if ( array_key_exists( $canon_key, $options ) && '' !== $options[ $canon_key ] && null !== $options[ $canon_key ] ) {
			return $options[ $canon_key ];
		}
	}

	// 1. Direct saved option
	if ( array_key_exists( $key, $options ) && '' !== $options[ $key ] && null !== $options[ $key ] ) {
		return $options[ $key ];
	}

	// 2. Check alias in saved options
	if ( isset( $aliases[ $key ] ) && array_key_exists( $aliases[ $key ], $options ) && '' !== $options[ $aliases[ $key ] ] && null !== $options[ $aliases[ $key ] ] ) {
		return $options[ $aliases[ $key ] ];
	}

	// 3. Explicit default parameter passed
	if ( null !== $default ) {
		return $default;
	}

	// 4. Default from dictionary
	if ( array_key_exists( $key, $defaults ) ) {
		return $defaults[ $key ];
	}

	// 5. Default from alias in dictionary
	if ( isset( $aliases[ $key ] ) && array_key_exists( $aliases[ $key ], $defaults ) ) {
		return $defaults[ $aliases[ $key ] ];
	}

	return '';
}

/**
 * Short alias function
 */
function mp_opt( $key, $default = null ) {
	return mobile_pasal_get_option( $key, $default );
}

/**
 * Record a Rolling 5-Snapshot Backup before modifying Theme Options
 */
function mobile_pasal_record_options_backup( $snapshot_data, $reason = 'Manual Save' ) {
	if ( empty( $snapshot_data ) || ! is_array( $snapshot_data ) ) {
		return;
	}
	$backups = get_option( 'mobile_pasal_options_backups', array() );
	if ( ! is_array( $backups ) ) {
		$backups = array();
	}
	$user = wp_get_current_user();
	array_unshift(
		$backups,
		array(
			'id'        => uniqid( 'mp_bak_' ),
			'timestamp' => current_time( 'mysql' ),
			'user'      => ( $user && $user->exists() ) ? $user->user_login : 'admin',
			'reason'    => sanitize_text_field( $reason ),
			'count'     => count( $snapshot_data ),
			'data'      => $snapshot_data,
		)
	);
	$backups = array_slice( $backups, 0, 5 );
	update_option( 'mobile_pasal_options_backups', $backups, false );
}

/**
 * Shared Core Save Processor for Theme Options (Used by both admin-post and AJAX save)
 */
function mobile_pasal_process_options_save( $raw_mp_opt, $active_tab = 'colors' ) {
	$existing = get_option( 'mobile_pasal_options', array() );
	if ( ! is_array( $existing ) || empty( $existing ) ) {
		$existing = mobile_pasal_options_defaults();
	}

	// Record automatic backup snapshot before applying changes
	mobile_pasal_record_options_backup( $existing, sprintf( 'Saved tab: %s', $active_tab ) );

	$toggle_keys = array(
		'handset_show_price',
		'seo_robots_index',
		'estimator_enabled',
		'floating_wa_enabled',
		'header_search_enabled',
		'header_sticky',
		'preloader_enabled',
		'enable_preloader',
		'topbar_enabled',
		'topbar_show',
		'trust_bar_enabled',
	);

	$color_keys = array(
		'color_primary',
		'color_primary_dark',
		'color_primary_light',
		'color_green',
		'color_amber',
	);

	$raw_code_keys = array(
		'counter_map_embed',
		'store_map_embed',
		'custom_css',
		'custom_header_scripts',
		'custom_footer_scripts',
	);

	if ( is_array( $raw_mp_opt ) ) {
		foreach ( $raw_mp_opt as $key => $val ) {
			$key = sanitize_key( $key );
			if ( is_array( $val ) ) {
				$existing[ $key ] = array_map( 'sanitize_text_field', wp_unslash( $val ) );
			} elseif ( in_array( $key, $toggle_keys, true ) ) {
				$existing[ $key ] = ( '1' === (string) $val || 1 === $val ) ? 1 : 0;
			} elseif ( in_array( $key, $color_keys, true ) ) {
				$clean_hex        = sanitize_hex_color( wp_unslash( $val ) );
				$existing[ $key ] = $clean_hex ? $clean_hex : wp_unslash( $val );
			} elseif ( in_array( $key, $raw_code_keys, true ) ) {
				$unslashed = wp_unslash( $val );
				if ( current_user_can( 'unfiltered_html' ) ) {
					$existing[ $key ] = $unslashed;
				} else {
					$existing[ $key ] = wp_kses_post( $unslashed );
				}
			} else {
				$existing[ $key ] = str_replace( '&amp;', '&', wp_kses_post( wp_unslash( $val ) ) );
			}
		}
	}

	// Sync all canonical admin keys to their legacy template alias keys so they never diverge
	$canonical_groups = mobile_pasal_get_canonical_alias_groups();
	foreach ( $canonical_groups as $canon_key => $alias_list ) {
		if ( array_key_exists( $canon_key, $existing ) ) {
			foreach ( $alias_list as $alias_key ) {
				$existing[ $alias_key ] = $existing[ $canon_key ];
			}
		}
	}

	update_option( 'mobile_pasal_options', $existing );
	mobile_pasal_flush_options_cache();

	return $existing;
}

/**
 * Handle Theme Options Save Action (admin-post.php fallback)
 */
function mobile_pasal_options_save() {
	if ( ! isset( $_POST['mp_options_nonce'] ) || ! wp_verify_nonce( $_POST['mp_options_nonce'], 'mobile_pasal_save_theme_options' ) ) {
		wp_die( esc_html__( 'Security check failed. Please refresh the page and try again.', 'mobile-pasal' ) );
	}
	if ( ! current_user_can( 'edit_theme_options' ) ) {
		wp_die( esc_html__( 'You do not have sufficient permissions to access this page.', 'mobile-pasal' ) );
	}

	$active_tab = isset( $_POST['current_tab'] ) ? sanitize_text_field( $_POST['current_tab'] ) : 'colors';
	$raw_mp_opt = isset( $_POST['mp_opt'] ) && is_array( $_POST['mp_opt'] ) ? $_POST['mp_opt'] : array();

	mobile_pasal_process_options_save( $raw_mp_opt, $active_tab );

	$redirect_url = add_query_arg(
		array(
			'page'  => 'mobile-pasal-options',
			'tab'   => $active_tab,
			'saved' => '1',
		),
		admin_url( 'admin.php' )
	);
	wp_safe_redirect( $redirect_url );
	exit;
}
add_action( 'admin_post_mobile_pasal_save_options', 'mobile_pasal_options_save' );

/**
 * Handle Instant AJAX Save of Theme Options (No Page Reload)
 */
function mobile_pasal_ajax_save_options() {
	check_ajax_referer( 'mobile_pasal_save_theme_options', 'mp_options_nonce' );
	if ( ! current_user_can( 'edit_theme_options' ) ) {
		wp_send_json_error( array( 'message' => __( 'Permission denied.', 'mobile-pasal' ) ), 403 );
	}

	$active_tab = isset( $_POST['current_tab'] ) ? sanitize_text_field( $_POST['current_tab'] ) : 'colors';
	$raw_mp_opt = isset( $_POST['mp_opt'] ) && is_array( $_POST['mp_opt'] ) ? $_POST['mp_opt'] : array();

	mobile_pasal_process_options_save( $raw_mp_opt, $active_tab );

	$backups = get_option( 'mobile_pasal_options_backups', array() );
	$backup_summaries = array();
	if ( is_array( $backups ) ) {
		foreach ( $backups as $b ) {
			$backup_summaries[] = array(
				'id'        => $b['id'],
				'timestamp' => $b['timestamp'],
				'user'      => $b['user'],
				'reason'    => $b['reason'],
			);
		}
	}

	wp_send_json_success(
		array(
			'message'   => __( 'All changes saved & synced to live site!', 'mobile-pasal' ),
			'timestamp' => current_time( 'H:i:s' ),
			'backups'   => $backup_summaries,
		)
	);
}
add_action( 'wp_ajax_mobile_pasal_ajax_save_options', 'mobile_pasal_ajax_save_options' );

/**
 * Handle AJAX Reset (Current Tab or All Options to Factory Defaults)
 */
function mobile_pasal_ajax_reset_options() {
	check_ajax_referer( 'mobile_pasal_save_theme_options', 'nonce' );
	if ( ! current_user_can( 'edit_theme_options' ) ) {
		wp_send_json_error( array( 'message' => __( 'Permission denied.', 'mobile-pasal' ) ), 403 );
	}

	$scope      = isset( $_POST['reset_scope'] ) ? sanitize_text_field( $_POST['reset_scope'] ) : 'tab';
	$field_keys = isset( $_POST['field_keys'] ) && is_array( $_POST['field_keys'] ) ? array_map( 'sanitize_key', $_POST['field_keys'] ) : array();
	$defaults   = mobile_pasal_options_defaults();
	$existing   = get_option( 'mobile_pasal_options', array() );
	if ( ! is_array( $existing ) ) {
		$existing = $defaults;
	}

	if ( 'all' === $scope ) {
		mobile_pasal_record_options_backup( $existing, 'Pre-Factory Reset Backup' );
		update_option( 'mobile_pasal_options', $defaults );
		mobile_pasal_flush_options_cache();
		wp_send_json_success( array( 'message' => __( 'All Theme Options have been restored to factory defaults.', 'mobile-pasal' ) ) );
	} else {
		mobile_pasal_record_options_backup( $existing, 'Pre-Tab Reset Backup' );
		foreach ( $field_keys as $k ) {
			if ( array_key_exists( $k, $defaults ) ) {
				$existing[ $k ] = $defaults[ $k ];
			}
		}
		// Sync canonical aliases
		foreach ( mobile_pasal_get_canonical_alias_groups() as $canon_key => $alias_list ) {
			if ( array_key_exists( $canon_key, $existing ) ) {
				foreach ( $alias_list as $alias_key ) {
					$existing[ $alias_key ] = $existing[ $canon_key ];
				}
			}
		}
		update_option( 'mobile_pasal_options', $existing );
		mobile_pasal_flush_options_cache();
		wp_send_json_success( array( 'message' => __( 'Active tab settings restored to factory defaults.', 'mobile-pasal' ) ) );
	}
}
add_action( 'wp_ajax_mobile_pasal_reset_options', 'mobile_pasal_ajax_reset_options' );

/**
 * Handle AJAX Restore from Snapshot Backup or JSON Import
 */
function mobile_pasal_ajax_restore_backup() {
	check_ajax_referer( 'mobile_pasal_save_theme_options', 'nonce' );
	if ( ! current_user_can( 'edit_theme_options' ) ) {
		wp_send_json_error( array( 'message' => __( 'Permission denied.', 'mobile-pasal' ) ), 403 );
	}

	$existing = get_option( 'mobile_pasal_options', array() );
	$mode     = isset( $_POST['restore_mode'] ) ? sanitize_text_field( $_POST['restore_mode'] ) : 'snapshot';

	if ( 'json' === $mode ) {
		$raw_json = isset( $_POST['import_json'] ) ? wp_unslash( $_POST['import_json'] ) : '';
		$decoded  = json_decode( $raw_json, true );
		if ( ! is_array( $decoded ) || empty( $decoded ) ) {
			wp_send_json_error( array( 'message' => __( 'Invalid JSON payload. Please check the file or JSON string.', 'mobile-pasal' ) ) );
		}
		$options_payload = isset( $decoded['options'] ) && is_array( $decoded['options'] ) ? $decoded['options'] : $decoded;
		mobile_pasal_record_options_backup( $existing, 'Pre-JSON Import Backup' );
		update_option( 'mobile_pasal_options', $options_payload );
		mobile_pasal_flush_options_cache();
		wp_send_json_success( array( 'message' => __( 'Theme Options successfully imported from JSON!', 'mobile-pasal' ) ) );
	} else {
		$backup_id = isset( $_POST['backup_id'] ) ? sanitize_text_field( $_POST['backup_id'] ) : '';
		$backups   = get_option( 'mobile_pasal_options_backups', array() );
		if ( is_array( $backups ) ) {
			foreach ( $backups as $b ) {
				if ( isset( $b['id'] ) && $b['id'] === $backup_id && ! empty( $b['data'] ) && is_array( $b['data'] ) ) {
					mobile_pasal_record_options_backup( $existing, 'Pre-Rollback Backup' );
					update_option( 'mobile_pasal_options', $b['data'] );
					mobile_pasal_flush_options_cache();
					wp_send_json_success( array( 'message' => sprintf( __( 'Restored snapshot from %s!', 'mobile-pasal' ), $b['timestamp'] ) ) );
				}
			}
		}
		wp_send_json_error( array( 'message' => __( 'Snapshot not found.', 'mobile-pasal' ) ) );
	}
}
add_action( 'wp_ajax_mobile_pasal_restore_backup', 'mobile_pasal_ajax_restore_backup' );

/**
 * Handle 1-Click JSON Export Download (admin-post.php)
 */
function mobile_pasal_export_options_json() {
	if ( ! isset( $_GET['_wpnonce'] ) || ! wp_verify_nonce( $_GET['_wpnonce'], 'mobile_pasal_export_options' ) ) {
		wp_die( esc_html__( 'Security check failed.', 'mobile-pasal' ) );
	}
	if ( ! current_user_can( 'edit_theme_options' ) ) {
		wp_die( esc_html__( 'Permission denied.', 'mobile-pasal' ) );
	}

	$options = get_option( 'mobile_pasal_options', mobile_pasal_options_defaults() );
	$export  = array(
		'site'        => home_url(),
		'theme'       => 'mobile-pasal',
		'version'     => '3.1.0',
		'exported_at' => current_time( 'mysql' ),
		'options'     => $options,
	);

	$filename = 'ali-mobile-theme-options-' . gmdate( 'Y-m-d-His' ) . '.json';
	nocache_headers();
	header( 'Content-Type: application/json; charset=utf-8' );
	header( 'Content-Disposition: attachment; filename=' . $filename );
	echo wp_json_encode( $export, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE );
	exit;
}
add_action( 'admin_post_mobile_pasal_export_options', 'mobile_pasal_export_options_json' );

/**
 * Frontend & Admin WP Admin Bar Context-Aware Quick-Customize Menu
 */
function mobile_pasal_admin_bar_customize_menu( $wp_admin_bar ) {
	if ( ! current_user_can( 'edit_theme_options' ) || ! is_admin_bar_showing() ) {
		return;
	}

	$base_url = admin_url( 'admin.php?page=mobile-pasal-options' );

	$wp_admin_bar->add_node(
		array(
			'id'    => 'mp-quick-customize',
			'title' => '<span class="ab-icon dashicons dashicons-smartphone" style="margin-top:2px;"></span><span class="ab-label">Ali Mobile Controls</span>',
			'href'  => $base_url,
			'meta'  => array( 'title' => __( 'Quick-Customize Ali Mobile Center Theme Options', 'mobile-pasal' ) ),
		)
	);

	// Context-aware top link when viewing frontend pages
	if ( ! is_admin() ) {
		$ctx_tab   = 'colors';
		$ctx_label = '⚡ Edit Current Page Settings';
		if ( is_front_page() || is_home() ) {
			$ctx_tab   = 'hero';
			$ctx_label = '⚡ Edit Homepage Showcase & Hero';
		} elseif ( is_singular( 'handset' ) || is_page( 'shop' ) || is_post_type_archive( 'handset' ) ) {
			$ctx_tab   = 'shop_hero_tab';
			$ctx_label = '⚡ Edit Showroom & Handset Catalog';
		} elseif ( is_page( 'services' ) ) {
			$ctx_tab   = 'services_hero_tab';
			$ctx_label = '⚡ Edit Apple Fix Lab & Services Page';
		} elseif ( is_page( 'about' ) ) {
			$ctx_tab   = 'about_story_tab';
			$ctx_label = '⚡ Edit Heritage & About Us Page';
		} elseif ( is_page( 'contact' ) ) {
			$ctx_tab   = 'contact_coords_tab';
			$ctx_label = '⚡ Edit Contact & Location Desk';
		} elseif ( is_404() ) {
			$ctx_tab   = 'error_404_tab';
			$ctx_label = '⚡ Edit 404 Page Settings';
		} elseif ( is_search() ) {
			$ctx_tab   = 'search_page_tab';
			$ctx_label = '⚡ Edit Search Results Settings';
		}

		$wp_admin_bar->add_node(
			array(
				'id'     => 'mp-qc-context',
				'parent' => 'mp-quick-customize',
				'title'  => $ctx_label,
				'href'   => add_query_arg( 'tab', $ctx_tab, $base_url ),
			)
		);
	}

	$quick_links = array(
		'mp-qc-bulk-prices' => array( '💰 Bulk Handset Price & Stock Editor', admin_url( 'admin.php?page=mp-bulk-price-editor' ) ),
		'mp-qc-inquiries'   => array( '📥 Customer Repair & Order Inquiries', admin_url( 'admin.php?page=mp-inquiries' ) ),
		'mp-qc-identity'    => array( '🎨 Brand Identity, Logo & Price Visibility', add_query_arg( 'tab', 'identity', $base_url ) ),
		'mp-qc-header'      => array( '📞 Header, Hotline & WhatsApp Setup', add_query_arg( 'tab', 'header_nav', $base_url ) ),
		'mp-qc-home-cats'   => array( '📱 Homepage Categories & Handsets', add_query_arg( 'tab', 'categories_brands_sec', $base_url ) ),
		'mp-qc-seo'         => array( '🚀 SEO, Local Maps & AI Ranking (AEO)', add_query_arg( 'tab', 'seo_meta_tab', $base_url ) ),
		'mp-qc-backup'      => array( '🛡️ Backup, Export & Health Check', add_query_arg( 'tab', 'backup_health_tab', $base_url ) ),
	);

	foreach ( $quick_links as $node_id => $info ) {
		$wp_admin_bar->add_node(
			array(
				'id'     => $node_id,
				'parent' => 'mp-quick-customize',
				'title'  => $info[0],
				'href'   => $info[1],
			)
		);
	}
}
add_action( 'admin_bar_menu', 'mobile_pasal_admin_bar_customize_menu', 95 );

/**
 * Register Admin Menu Pages
 */
function mobile_pasal_options_admin_menu() {
	add_menu_page(
		__( 'Theme Options', 'mobile-pasal' ),
		__( 'Theme Options', 'mobile-pasal' ),
		'edit_theme_options',
		'mobile-pasal-options',
		'mobile_pasal_options_render_dashboard',
		'dashicons-smartphone',
		2
	);
}
add_action( 'admin_menu', 'mobile_pasal_options_admin_menu' );

/**
 * Enqueue Admin Scripts & Styles for Theme Options
 */
function mobile_pasal_options_admin_enqueue( $hook ) {
	$current_page  = isset( $_GET['page'] ) ? sanitize_text_field( wp_unslash( $_GET['page'] ) ) : '';
	$allowed_pages = array( 'mobile-pasal-options', 'mp-inquiries', 'mp-general-inquiries', 'mp-repair-reports', 'mp-bulk-price-editor' );

	if ( ! in_array( $current_page, $allowed_pages, true ) && strpos( $hook, 'mobile-pasal-options' ) === false && strpos( $hook, 'mp-inquiries' ) === false && strpos( $hook, 'mp-general-inquiries' ) === false && strpos( $hook, 'mp-repair-reports' ) === false && strpos( $hook, 'mp-bulk-price-editor' ) === false ) {
		return;
	}

	wp_enqueue_media();
	wp_enqueue_style( 'wp-color-picker' );
	wp_enqueue_script( 'wp-color-picker' );

	// Google Fonts matching website frontend design pattern
	wp_enqueue_style(
		'mobile-pasal-google-fonts',
		'https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,400..800;1,9..40,400..800&family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&display=swap',
		array(),
		null
	);

	// Font Awesome 6 Icons for modern luxury dashboard
	wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css', array(), '6.5.1' );

	$css_path = get_template_directory() . '/assets/css/admin-options.css';
	$js_path  = get_template_directory() . '/assets/js/admin-options.js';
	$css_ver  = file_exists( $css_path ) ? filemtime( $css_path ) : '3.1.0';
	$js_ver   = file_exists( $js_path ) ? filemtime( $js_path ) : '3.1.0';

	wp_enqueue_style( 'mobile-pasal-admin-options', get_template_directory_uri() . '/assets/css/admin-options.css', array(), $css_ver );
	wp_enqueue_script( 'mobile-pasal-admin-options', get_template_directory_uri() . '/assets/js/admin-options.js', array( 'jquery', 'wp-color-picker' ), $js_ver, true );

	wp_localize_script( 'mobile-pasal-admin-options', 'mobilePasalOptions', array(
		'ajax_url'     => admin_url( 'admin-ajax.php' ),
		'nonce'        => wp_create_nonce( 'mobile_pasal_save_theme_options' ),
		'choose_image' => __( 'Select or Upload Store Image', 'mobile-pasal' ),
		'use_image'    => __( 'Use This Media Asset', 'mobile-pasal' ),
		'icons'        => mp_get_all_icons_svg_map(),
	) );
}
add_action( 'admin_enqueue_scripts', 'mobile_pasal_options_admin_enqueue' );

/**
 * Early Admin Head Reset: Enforce Full-Width Bleed, Zero Side-Padding & No Footer Gap
 */
function mobile_pasal_admin_fullwidth_breakout_head() {
	$current_page  = isset( $_GET['page'] ) ? sanitize_text_field( wp_unslash( $_GET['page'] ) ) : '';
	$allowed_pages = array( 'mobile-pasal-options', 'mp-inquiries', 'mp-general-inquiries', 'mp-repair-reports', 'mp-bulk-price-editor' );

	if ( in_array( $current_page, $allowed_pages, true ) ) {
		echo '<style id="mp-admin-fullwidth-reset">
			html.wp-toolbar { padding-top: 32px !important; }
			@media screen and (max-width: 782px), screen and (max-width: 600px) {
				html.wp-toolbar { padding-top: 46px !important; }
				#wpbody,
				body #wpbody,
				div#wpbody,
				body.toplevel_page_mobile-pasal-options #wpbody,
				body.toplevel_page_mp-inquiries #wpbody {
					padding-top: 0 !important;
					margin-top: 0 !important;
				}
				#wpcontent,
				body #wpcontent,
				#wpbody-content,
				body #wpbody-content {
					padding-top: 0 !important;
					margin-top: 0 !important;
				}
			}
			body #wpcontent { padding-left: 0 !important; padding-right: 0 !important; padding-top: 0 !important; }
			#wpbody,
			body #wpbody { padding-top: 0 !important; margin-top: 0 !important; }
			body #wpbody-content { padding-bottom: 0 !important; padding-top: 0 !important; }
			body #wpfooter { display: none !important; }
		</style>';
	}
}
add_action( 'admin_head', 'mobile_pasal_admin_fullwidth_breakout_head', 1 );

/**
 * Form Field Renderers
 */
/**
 * --------------------------------------------------------------------------
 * Core High-Tech Icon System (Clean Vector SVGs - Zero Emojis)
 * --------------------------------------------------------------------------
 */

/**
 * Curated Available Icon Catalog
 */
function mp_get_available_icons() {
	return array(
		// Repair & Lab Hardware
		'clock'         => array( 'label' => __( 'Clock / Fast Turnaround', 'mobile-pasal' ), 'category' => __( 'Repair & Speed', 'mobile-pasal' ) ),
		'screen'        => array( 'label' => __( 'OLED Screen / Display Glass', 'mobile-pasal' ), 'category' => __( 'Hardware & Lab', 'mobile-pasal' ) ),
		'wrench'        => array( 'label' => __( 'Precision Tool / Cleanroom Wrench', 'mobile-pasal' ), 'category' => __( 'Hardware & Lab', 'mobile-pasal' ) ),
		'screwdriver'   => array( 'label' => __( 'Micro-Tools / Screwdriver', 'mobile-pasal' ), 'category' => __( 'Hardware & Lab', 'mobile-pasal' ) ),
		'microscope'    => array( 'label' => __( 'Stereo Zoom Microscope', 'mobile-pasal' ), 'category' => __( 'Hardware & Lab', 'mobile-pasal' ) ),
		'microchip'     => array( 'label' => __( 'IC Motherboard Micro-Soldering', 'mobile-pasal' ), 'category' => __( 'Hardware & Lab', 'mobile-pasal' ) ),
		'battery'       => array( 'label' => __( 'Battery / 100% Health BMS', 'mobile-pasal' ), 'category' => __( 'Hardware & Lab', 'mobile-pasal' ) ),
		'water'         => array( 'label' => __( 'Water Soak / Ultrasonic Cleaning', 'mobile-pasal' ), 'category' => __( 'Hardware & Lab', 'mobile-pasal' ) ),
		'camera'        => array( 'label' => __( 'Camera Lens & 48MP OIS Sensor', 'mobile-pasal' ), 'category' => __( 'Hardware & Lab', 'mobile-pasal' ) ),

		// Trust & Guarantees
		'shield'        => array( 'label' => __( 'Shield / NTA MDMS Compliant', 'mobile-pasal' ), 'category' => __( 'Trust & Security', 'mobile-pasal' ) ),
		'shield-check'  => array( 'label' => __( 'Shield Verified / Authentic Parts', 'mobile-pasal' ), 'category' => __( 'Trust & Security', 'mobile-pasal' ) ),
		'certificate'   => array( 'label' => __( 'Certified / Level 4 Technicians', 'mobile-pasal' ), 'category' => __( 'Trust & Security', 'mobile-pasal' ) ),
		'user-shield'   => array( 'label' => __( 'Privacy / Photos & Accounts Safe', 'mobile-pasal' ), 'category' => __( 'Trust & Security', 'mobile-pasal' ) ),
		'check'         => array( 'label' => __( 'Checkmark / Tested & Approved', 'mobile-pasal' ), 'category' => __( 'Trust & Security', 'mobile-pasal' ) ),

		// Performance & Speed
		'bolt'          => array( 'label' => __( 'Lightning / Express 45-Min Fix', 'mobile-pasal' ), 'category' => __( 'Repair & Speed', 'mobile-pasal' ) ),
		'sparkles'      => array( 'label' => __( 'Sparkles / Apple Intelligence', 'mobile-pasal' ), 'category' => __( 'Repair & Speed', 'mobile-pasal' ) ),
		'star'          => array( 'label' => __( 'Star / Top Tier Smartphone Brands', 'mobile-pasal' ), 'category' => __( 'Quality & Retail', 'mobile-pasal' ) ),
		'gem'           => array( 'label' => __( 'Diamond / Titanium Premium', 'mobile-pasal' ), 'category' => __( 'Quality & Retail', 'mobile-pasal' ) ),

		// Finance & Billing
		'tag'           => array( 'label' => __( 'Price Tag / Zero Hidden Charges', 'mobile-pasal' ), 'category' => __( 'Finance & Billing', 'mobile-pasal' ) ),
		'receipt'       => array( 'label' => __( 'Nepal Official VAT Serial Bill', 'mobile-pasal' ), 'category' => __( 'Finance & Billing', 'mobile-pasal' ) ),
		'coins'         => array( 'label' => __( 'Cash / eSewa Banking Counter', 'mobile-pasal' ), 'category' => __( 'Finance & Billing', 'mobile-pasal' ) ),

		// Accessories & Connectivity
		'headphones'    => array( 'label' => __( 'Headphones / Audio & Earbuds', 'mobile-pasal' ), 'category' => __( 'Accessories', 'mobile-pasal' ) ),
		'cable'         => array( 'label' => __( 'Type-C Cable / Anker PD Charger', 'mobile-pasal' ), 'category' => __( 'Accessories', 'mobile-pasal' ) ),
		'heart'         => array( 'label' => __( 'Heart / Tech Setup Care', 'mobile-pasal' ), 'category' => __( 'Quality & Retail', 'mobile-pasal' ) ),
		'arrows-rotate' => array( 'label' => __( 'Trade-In / Free Data Transfer', 'mobile-pasal' ), 'category' => __( 'Quality & Retail', 'mobile-pasal' ) ),

		// Location & Contact
		'location'      => array( 'label' => __( 'Location Pin / Gulariya Counter', 'mobile-pasal' ), 'category' => __( 'Contact & Store', 'mobile-pasal' ) ),
		'store'         => array( 'label' => __( 'Showroom Counter / Ji. Pra. Ka.', 'mobile-pasal' ), 'category' => __( 'Contact & Store', 'mobile-pasal' ) ),
		'phone'         => array( 'label' => __( 'Phone Hotline / Immediate Call', 'mobile-pasal' ), 'category' => __( 'Contact & Store', 'mobile-pasal' ) ),
		'whatsapp'      => array( 'label' => __( 'WhatsApp Direct Chat', 'mobile-pasal' ), 'category' => __( 'Contact & Store', 'mobile-pasal' ) ),
		'truck'         => array( 'label' => __( 'Courier / Local Dispatch', 'mobile-pasal' ), 'category' => __( 'Contact & Store', 'mobile-pasal' ) ),
	);
}

/**
 * Normalize legacy symbol or unicode characters to clean slug
 */
function mp_normalize_icon_key( $key ) {
	$key = trim( (string) $key );
	$map = array(
		'◷'  => 'clock',
		'⬟'  => 'screen',
		'✹'  => 'wrench',
		'♧'  => 'tag',
		'▣'  => 'screen',
		'ϟ'  => 'battery',
		'⌁'  => 'water',
		'⚙'  => 'microchip',
		'◇'  => 'cable',
		'♡'  => 'heart',
		'✓'  => 'check',
		'✔'  => 'check',
		'★'  => 'star',
	);
	return isset( $map[ $key ] ) ? $map[ $key ] : $key;
}

/**
 * Return crisp vector SVG markup for given icon slug
 */
function mp_get_icon_svg( $icon_key, $width = 22, $height = 22, $extra_class = '' ) {
	$icon_key = mp_normalize_icon_key( $icon_key );
	$w = intval( $width ) ?: 22;
	$h = intval( $height ) ?: 22;
	$cls = $extra_class ? ' ' . esc_attr( $extra_class ) : '';

	$paths = array(
		'clock'         => '<circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline>',
		'screen'        => '<rect x="5" y="2" width="14" height="20" rx="2"></rect><line x1="12" y1="18" x2="12.01" y2="18"></line>',
		'wrench'        => '<path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"></path>',
		'screwdriver'   => '<path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"></path>',
		'microscope'    => '<path d="M6 18h8"></path><path d="M3 22h18"></path><path d="M14 22a7 7 0 1 0 0-14h-1"></path><path d="M9 14h2"></path><path d="M9 12a2 2 0 0 1-2-2V6h6v4a2 2 0 0 1-2 2Z"></path><path d="M12 6V3a1 1 0 0 0-1-1H9a1 1 0 0 0-1 1v3"></path>',
		'microchip'     => '<rect x="4" y="4" width="16" height="16" rx="2"></rect><rect x="9" y="9" width="6" height="6"></rect><line x1="9" y1="1" x2="9" y2="4"></line><line x1="15" y1="1" x2="15" y2="4"></line><line x1="9" y1="20" x2="9" y2="23"></line><line x1="15" y1="20" x2="15" y2="23"></line><line x1="20" y1="9" x2="23" y2="9"></line><line x1="20" y1="15" x2="23" y2="15"></line><line x1="1" y1="9" x2="4" y2="9"></line><line x1="1" y1="15" x2="4" y2="15"></line>',
		'battery'       => '<rect x="1" y="6" width="18" height="12" rx="2" ry="2"></rect><line x1="23" y1="13" x2="23" y2="11"></line><line x1="6" y1="10" x2="6" y2="14"></line><line x1="10" y1="10" x2="10" y2="14"></line>',
		'water'         => '<path d="M12 2.69l5.66 5.66a8 8 0 1 1-11.31 0z"></path>',
		'camera'        => '<path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle>',
		'shield'        => '<path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>',
		'shield-check'  => '<path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path><polyline points="9 12 11 14 15 10"></polyline>',
		'certificate'   => '<circle cx="12" cy="8" r="6"></circle><path d="M15.477 12.89L17 22l-5-3-5 3 1.523-9.11"></path>',
		'user-shield'   => '<path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle>',
		'check'         => '<polyline points="20 6 9 17 4 12"></polyline>',
		'bolt'          => '<polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon>',
		'sparkles'      => '<path d="M12 3l1.912 5.813a2 2 0 0 0 1.275 1.275L21 12l-5.813 1.912a2 2 0 0 0-1.275 1.275L12 21l-1.912-5.813a2 2 0 0 0-1.275-1.275L3 12l5.813-1.912a2 2 0 0 0 1.275-1.275L12 3z"></path>',
		'star'          => '<polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>',
		'gem'           => '<polygon points="6 3 18 3 22 9 12 22 2 9"></polygon><line x1="12" y1="22" x2="6" y2="9"></line><line x1="12" y1="22" x2="18" y2="9"></line><line x1="2" y1="9" x2="22" y2="9"></line>',
		'tag'           => '<path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path><circle cx="7" cy="7" r="1.5" fill="currentColor"></circle>',
		'receipt'       => '<path d="M4 2v20l2-1 2 1 2-1 2 1 2-1 2 1 2-1 2 1V2l-2 1-2-1-2 1-2-1-2 1-2-1-2 1Z"></path><line x1="8" y1="8" x2="16" y2="8"></line><line x1="8" y1="12" x2="16" y2="12"></line><line x1="8" y1="16" x2="12" y2="16"></line>',
		'coins'         => '<circle cx="8" cy="8" r="6"></circle><path d="M18.09 10.37A6 6 0 1 1 10.34 18"></path><path d="M7 6h1v4"></path><path d="M16.7 13.3l.6.7"></path>',
		'headphones'    => '<path d="M3 18v-6a9 9 0 0 1 18 0v6"></path><path d="M21 19a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3zM3 19a2 2 0 0 0 2 2h1a2 2 0 0 0 2-2v-3a2 2 0 0 0-2-2H3z"></path>',
		'cable'         => '<path d="M12 22v-5"></path><path d="M9 8V2"></path><path d="M15 8V2"></path><path d="M18 8v5a4 4 0 0 1-4 4h-4a4 4 0 0 1-4-4V8Z"></path>',
		'heart'         => '<path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>',
		'arrows-rotate' => '<path d="M21.5 2v6h-6M21.34 15.57a10 10 0 1 1-.57-8.38l5.67-5.67"></path>',
		'location'      => '<path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle>',
		'store'         => '<path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline>',
		'phone'         => '<path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>',
		'whatsapp'      => '<path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0 0 12.04 2z" fill="currentColor"></path>',
		'truck'         => '<rect x="1" y="3" width="15" height="13"></rect><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon><circle cx="5.5" cy="18.5" r="2.5"></circle><circle cx="18.5" cy="18.5" r="2.5"></circle>',
	);

	$inner = isset( $paths[ $icon_key ] ) ? $paths[ $icon_key ] : $paths['clock'];
	return sprintf(
		'<svg class="mp-icon-svg%s" width="%d" height="%d" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">%s</svg>',
		$cls,
		$w,
		$h,
		$inner
	);
}

/**
 * Return JSON/array map of all SVG strings for client-side live preview
 */
function mp_get_all_icons_svg_map() {
	$icons = mp_get_available_icons();
	$map = array();
	foreach ( array_keys( $icons ) as $slug ) {
		$map[ $slug ] = mp_get_icon_svg( $slug, 24, 24 );
	}
	return $map;
}

/**
 * Render Selectable Icon Picker Field with Live Preview & Quick-Pick Chips
 */
function mp_render_field_icon( $key, $label, $desc = '', $default = 'clock' ) {
	$raw_val = mobile_pasal_get_option( $key, $default );
	$val = mp_normalize_icon_key( $raw_val );
	if ( empty( $val ) ) {
		$val = $default;
	}
	$all_icons = mp_get_available_icons();
	$preview_svg = mp_get_icon_svg( $val, 24, 24 );
	$field_id = 'opt_' . esc_attr( $key );
	$preview_id = 'icon_preview_' . esc_attr( $key );
	?>
	<div class="bopt-field bopt-field-icon" data-field-key="<?php echo esc_attr( $key ); ?>">
		<div class="bopt-field-info">
			<label class="bopt-label" for="<?php echo $field_id; ?>"><?php echo esc_html( $label ); ?></label>
			<?php if ( $desc ) : ?>
				<p class="bopt-desc"><?php echo esc_html( $desc ); ?></p>
			<?php endif; ?>
		</div>
		<div class="bopt-input-wrap bopt-icon-picker-wrap">
			<div class="bopt-icon-picker-row">
				<div class="bopt-icon-preview-box" id="<?php echo $preview_id; ?>" title="<?php esc_attr_e( 'Selected Icon Live Preview', 'mobile-pasal' ); ?>">
					<?php echo $preview_svg; ?>
				</div>
				<div class="bopt-icon-select-wrap">
					<select id="<?php echo $field_id; ?>"
							name="mp_opt[<?php echo esc_attr( $key ); ?>]"
							class="bopt-icon-select"
							data-preview-target="#<?php echo $preview_id; ?>"
							onchange="if(typeof mpUpdateIconPreview==='function'){mpUpdateIconPreview(this);}">
						<?php
						$current_cat = '';
						foreach ( $all_icons as $slug => $info ) {
							if ( $info['category'] !== $current_cat ) {
								if ( '' !== $current_cat ) {
									echo '</optgroup>';
								}
								$current_cat = $info['category'];
								echo '<optgroup label="' . esc_attr( $current_cat ) . '">';
							}
							$selected = ( $val === $slug ) ? 'selected="selected"' : '';
							echo '<option value="' . esc_attr( $slug ) . '" ' . $selected . '>' . esc_html( $info['label'] ) . '</option>';
						}
						if ( '' !== $current_cat ) {
							echo '</optgroup>';
						}
						?>
					</select>
				</div>
			</div>
			<div class="bopt-icon-quick-chips">
				<span class="bopt-quick-chips-label"><?php esc_html_e( 'Quick Pick:', 'mobile-pasal' ); ?></span>
				<?php
				$quick_picks = array( 'clock', 'screen', 'wrench', 'shield', 'battery', 'bolt', 'tag', 'receipt', 'location', 'water', 'star' );
				foreach ( $quick_picks as $qp ) :
					$qp_active = ( $val === $qp ) ? ' is-active' : '';
				?>
					<button type="button"
							class="bopt-icon-chip<?php echo $qp_active; ?>"
							data-icon-slug="<?php echo esc_attr( $qp ); ?>"
							data-target-select="#<?php echo $field_id; ?>"
							title="<?php echo esc_attr( $all_icons[ $qp ]['label'] ); ?>"
							onclick="if(typeof mpPickIconChip==='function'){mpPickIconChip(this);}">
						<?php echo mp_get_icon_svg( $qp, 14, 14 ); ?>
						<span><?php echo esc_html( ucfirst( $qp ) ); ?></span>
					</button>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
	<?php
}

function mp_render_field_text( $key, $label, $desc = '', $placeholder = '' ) {
	$val = mobile_pasal_get_option( $key );
	?>
	<div class="bopt-field" data-field-key="<?php echo esc_attr( $key ); ?>">
		<div class="bopt-field-info">
			<label class="bopt-label" for="opt_<?php echo esc_attr( $key ); ?>"><?php echo esc_html( $label ); ?></label>
			<?php if ( $desc ) : ?>
				<p class="bopt-desc"><?php echo esc_html( $desc ); ?></p>
			<?php endif; ?>
		</div>
		<div class="bopt-input-wrap">
			<input type="text"
				   id="opt_<?php echo esc_attr( $key ); ?>"
				   name="mp_opt[<?php echo esc_attr( $key ); ?>]"
				   value="<?php echo esc_attr( $val ); ?>"
				   placeholder="<?php echo esc_attr( $placeholder ); ?>"
				   class="bopt-text-input" />
		</div>
	</div>
	<?php
}

function mp_render_field_textarea( $key, $label, $desc = '', $rows = 3, $placeholder = '' ) {
	$val = mobile_pasal_get_option( $key );
	?>
	<div class="bopt-field bopt-field-textarea" data-field-key="<?php echo esc_attr( $key ); ?>">
		<div class="bopt-field-info">
			<label class="bopt-label" for="opt_<?php echo esc_attr( $key ); ?>"><?php echo esc_html( $label ); ?></label>
			<?php if ( $desc ) : ?>
				<p class="bopt-desc"><?php echo esc_html( $desc ); ?></p>
			<?php endif; ?>
		</div>
		<div class="bopt-input-wrap">
			<textarea id="opt_<?php echo esc_attr( $key ); ?>"
					  name="mp_opt[<?php echo esc_attr( $key ); ?>]"
					  rows="<?php echo esc_attr( $rows ); ?>"
					  placeholder="<?php echo esc_attr( $placeholder ); ?>"
					  class="bopt-textarea"><?php echo esc_textarea( $val ); ?></textarea>
		</div>
	</div>
	<?php
}

function mp_render_field_toggle( $key, $label, $desc = '' ) {
	$val = mobile_pasal_get_option( $key );
	$checked = ! empty( $val ) ? 'checked="checked"' : '';
	?>
	<div class="bopt-field bopt-field-toggle" data-field-key="<?php echo esc_attr( $key ); ?>">
		<div class="bopt-field-info">
			<label class="bopt-label" for="opt_<?php echo esc_attr( $key ); ?>"><?php echo esc_html( $label ); ?></label>
			<?php if ( $desc ) : ?>
				<p class="bopt-desc"><?php echo esc_html( $desc ); ?></p>
			<?php endif; ?>
		</div>
		<div class="bopt-input-wrap bopt-toggle-wrap">
			<label class="bopt-switch">
				<input type="hidden" name="mp_opt[<?php echo esc_attr( $key ); ?>]" value="0" />
				<input type="checkbox"
					   id="opt_<?php echo esc_attr( $key ); ?>"
					   name="mp_opt[<?php echo esc_attr( $key ); ?>]"
					   value="1"
					   <?php echo $checked; ?> />
				<span class="bopt-slider"></span>
			</label>
			<span class="bopt-toggle-state"><?php echo ! empty( $val ) ? esc_html__( 'Active', 'mobile-pasal' ) : esc_html__( 'Disabled', 'mobile-pasal' ); ?></span>
		</div>
	</div>
	<?php
}

function mp_render_field_color( $key, $label, $desc = '' ) {
	$val = mobile_pasal_get_option( $key );
	?>
	<div class="bopt-field bopt-field-color" data-field-key="<?php echo esc_attr( $key ); ?>">
		<div class="bopt-field-info">
			<label class="bopt-label" for="opt_<?php echo esc_attr( $key ); ?>"><?php echo esc_html( $label ); ?></label>
			<?php if ( $desc ) : ?>
				<p class="bopt-desc"><?php echo esc_html( $desc ); ?></p>
			<?php endif; ?>
		</div>
		<div class="bopt-input-wrap bopt-color-wrap">
			<input type="text"
				   id="opt_<?php echo esc_attr( $key ); ?>"
				   name="mp_opt[<?php echo esc_attr( $key ); ?>]"
				   value="<?php echo esc_attr( $val ); ?>"
				   class="bopt-color-input" />
			<span class="bopt-color-hex-tag"><?php echo esc_html( $val ); ?></span>
		</div>
	</div>
	<?php
}

function mp_render_field_image( $key, $label, $desc = '' ) {
	$val = mobile_pasal_get_option( $key );
	?>
	<div class="bopt-field bopt-field-image" data-field-key="<?php echo esc_attr( $key ); ?>">
		<div class="bopt-field-info">
			<label class="bopt-label"><?php echo esc_html( $label ); ?></label>
			<?php if ( $desc ) : ?>
				<p class="bopt-desc"><?php echo esc_html( $desc ); ?></p>
			<?php endif; ?>
		</div>
		<div class="bopt-input-wrap">
			<div class="bopt-image">
				<div class="bopt-image-preview" style="<?php echo ! empty( $val ) ? 'background-image:url(' . esc_url( $val ) . ');' : ''; ?>">
					<?php if ( empty( $val ) ) : ?>
						<span class="bopt-image-placeholder"><i class="fa-regular fa-image"></i></span>
					<?php endif; ?>
				</div>
				<div class="bopt-image-controls">
					<input type="text"
						   id="opt_<?php echo esc_attr( $key ); ?>"
						   name="mp_opt[<?php echo esc_attr( $key ); ?>]"
						   value="<?php echo esc_attr( $val ); ?>"
						   placeholder="https://..."
						   class="bopt-text-input bopt-image-input" />
					<div class="bopt-image-buttons">
						<button type="button" class="button bopt-btn-gold bopt-image-pick">
							<i class="fa-solid fa-cloud-arrow-up"></i> <?php esc_html_e( 'Choose / Upload', 'mobile-pasal' ); ?>
						</button>
						<button type="button" class="button bopt-image-clear" style="<?php echo empty( $val ) ? 'display:none;' : ''; ?>">
							<i class="fa-solid fa-trash-can"></i> <?php esc_html_e( 'Remove', 'mobile-pasal' ); ?>
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
}

function mp_render_field_url( $key, $label, $desc = '', $placeholder = 'https://' ) {
	mp_render_field_text( $key, $label, $desc, $placeholder );
}

// Aliases for backwards compatibility with any existing calls
function mp_render_text( $key, $label, $desc = '', $placeholder = '' ) {
	mp_render_field_text( $key, $label, $desc, $placeholder );
}
function mp_render_textarea( $key, $label, $desc = '', $rows = 3, $placeholder = '' ) {
	mp_render_field_textarea( $key, $label, $desc, $rows, $placeholder );
}
function mp_render_toggle( $key, $label, $desc = '' ) {
	mp_render_field_toggle( $key, $label, $desc );
}
function mp_render_color( $key, $label, $desc = '' ) {
	mp_render_field_color( $key, $label, $desc );
}
function mp_render_image( $key, $label, $desc = '' ) {
	mp_render_field_image( $key, $label, $desc );
}

/**
 * Master Full-Width Theme Options Dashboard Renderer
 */
function mobile_pasal_options_render_dashboard() {
	if ( ! current_user_can( 'edit_theme_options' ) ) {
		return;
	}

	$active_tab = isset( $_GET['tab'] ) ? sanitize_text_field( $_GET['tab'] ) : 'colors';
	$saved      = isset( $_GET['saved'] ) && '1' === $_GET['saved'];

	// Navigation groups and tab items
	$nav_sections = array(
		'brand_group' => array(
			'group_title' => __( 'Brand & Global Styles', 'mobile-pasal' ),
			'icon'        => 'fa-palette',
			'items'       => array(
				'colors'     => array( 'label' => __( 'Color Palette & System', 'mobile-pasal' ), 'icon' => 'fa-palette' ),
				'identity'   => array( 'label' => __( 'Brand Identity & Logo', 'mobile-pasal' ), 'icon' => 'fa-mobile-screen' ),
				'header_nav' => array( 'label' => __( 'Header & Sticky Top Bar', 'mobile-pasal' ), 'icon' => 'fa-bars' ),
				'footer_tab' => array( 'label' => __( 'Footer & Global Bio', 'mobile-pasal' ), 'icon' => 'fa-shoe-prints' ),
			),
		),
		'home_group' => array(
			'group_title' => __( 'Homepage Showcase', 'mobile-pasal' ),
			'icon'        => 'fa-house',
			'items'       => array(
				'hero'                  => array( 'label' => __( 'Hero Showcase & Perks', 'mobile-pasal' ), 'icon' => 'fa-images' ),
				'categories_brands_sec' => array( 'label' => __( 'Bento Categories & Brands', 'mobile-pasal' ), 'icon' => 'fa-layer-group' ),
				'catalog_sec'           => array( 'label' => __( 'Showroom Handsets Catalog', 'mobile-pasal' ), 'icon' => 'fa-mobile-screen' ),
				'spotlight_lab_sec'     => array( 'label' => __( 'iPhone Spotlight & Lab', 'mobile-pasal' ), 'icon' => 'fa-star' ),
				'home_services_sec'     => array( 'label' => __( 'Services, Workflow & Guides', 'mobile-pasal' ), 'icon' => 'fa-screwdriver-wrench' ),
				'reviews_map_sec'       => array( 'label' => __( 'Reviews & Counter Visit', 'mobile-pasal' ), 'icon' => 'fa-comments' ),
				'estimator_sec'         => array( 'label' => __( 'Diagnostic Estimator', 'mobile-pasal' ), 'icon' => 'fa-calculator' ),
			),
		),
		'shop_group' => array(
			'group_title' => __( 'Showroom & Handset Catalog', 'mobile-pasal' ),
			'icon'        => 'fa-store',
			'items'       => array(
				'shop_hero_tab'      => array( 'label' => __( 'Shop Catalog Page Hero', 'mobile-pasal' ), 'icon' => 'fa-store' ),
				'shop_assurance_tab' => array( 'label' => __( '4 Zero-Risk Assurance Cards', 'mobile-pasal' ), 'icon' => 'fa-shield-halved' ),
			),
		),
		'services_group' => array(
			'group_title' => __( 'Apple Fix Lab & Services', 'mobile-pasal' ),
			'icon'        => 'fa-screwdriver-wrench',
			'items'       => array(
				'services_hero_tab'   => array( 'label' => __( 'Repair Services Hero', 'mobile-pasal' ), 'icon' => 'fa-screwdriver-wrench' ),
				'services_faqs_tab'   => array( 'label' => __( '5 Customer Repair FAQs', 'mobile-pasal' ), 'icon' => 'fa-circle-question' ),
			),
		),
		'about_group' => array(
			'group_title' => __( 'Heritage & About Us', 'mobile-pasal' ),
			'icon'        => 'fa-book-open',
			'items'       => array(
				'about_story_tab'       => array( 'label' => __( 'About Us Hero & Story', 'mobile-pasal' ), 'icon' => 'fa-book-open' ),
				'about_stats_tab'       => array( 'label' => __( '4 Milestone Stat Counters', 'mobile-pasal' ), 'icon' => 'fa-chart-line' ),
				'about_cleanroom_tab'   => array( 'label' => __( 'Cleanroom Tooling & Standards', 'mobile-pasal' ), 'icon' => 'fa-wrench' ),
				'about_commitments_tab' => array( 'label' => __( '4 Core Commitments', 'mobile-pasal' ), 'icon' => 'fa-handshake-angle' ),
			),
		),
		'contact_group' => array(
			'group_title' => __( 'Contact & Location Desk', 'mobile-pasal' ),
			'icon'        => 'fa-location-dot',
			'items'       => array(
				'contact_coords_tab'    => array( 'label' => __( 'Contact Coordinates & Hours', 'mobile-pasal' ), 'icon' => 'fa-location-dot' ),
				'contact_map_tab'       => array( 'label' => __( 'Direct Helplines & Map Embed', 'mobile-pasal' ), 'icon' => 'fa-map-location-dot' ),
				'contact_landmarks_tab' => array( 'label' => __( 'Arrival & Transit Guidance', 'mobile-pasal' ), 'icon' => 'fa-signs-post' ),
			),
		),
		'pages_group' => array(
			'group_title' => __( '404 & Search Results', 'mobile-pasal' ),
			'icon'        => 'fa-file-circle-question',
			'items'       => array(
				'error_404_tab'   => array( 'label' => __( '404 Device Not Found Page', 'mobile-pasal' ), 'icon' => 'fa-circle-exclamation' ),
				'search_page_tab' => array( 'label' => __( 'Search Results & Fallbacks', 'mobile-pasal' ), 'icon' => 'fa-magnifying-glass' ),
			),
		),
		'rank_group' => array(
			'group_title' => __( 'SEO & Social Meta', 'mobile-pasal' ),
			'icon'        => 'fa-magnifying-glass-chart',
			'items'       => array(
				'seo_meta_tab'  => array( 'label' => __( 'SEO & Social Meta', 'mobile-pasal' ), 'icon' => 'fa-magnifying-glass-chart' ),
			),
		),
		'mobile_group' => array(
			'group_title' => __( 'System & Advanced', 'mobile-pasal' ),
			'icon'        => 'fa-sliders',
			'items'       => array(
				'custom_code_tab'       => array( 'label' => __( 'Custom CSS & Header Scripts', 'mobile-pasal' ), 'icon' => 'fa-code' ),
				'backup_health_tab'     => array( 'label' => __( 'Backup, Export & Health', 'mobile-pasal' ), 'icon' => 'fa-shield-heart' ),
			),
		),
	);
	?>

	<div class="bopt-app-wrap">
		
		<!-- Sticky Top Bar -->
		<header class="bopt-topbar">
			<div class="bopt-topbar-left">
				<button type="button" class="bopt-sidebar-toggle" id="boptSidebarToggle" aria-label="<?php esc_attr_e( 'Toggle navigation menu', 'mobile-pasal' ); ?>">
					<i class="fa-solid fa-bars-staggered"></i>
				</button>
				<div class="bopt-brand">
					<div class="bopt-brand-icon"><i class="fa-solid fa-mobile-screen"></i></div>
					<div class="bopt-brand-info">
						<span class="bopt-brand-title"><?php echo esc_html( mp_opt( 'site_brand_name', 'Ali Mobile Center & Apple Fix' ) ); ?></span>
						<span class="bopt-brand-badge"><?php esc_html_e( 'Theme Options Suite 3.1', 'mobile-pasal' ); ?></span>
					</div>
				</div>
			</div>

			<div class="bopt-topbar-right">
				<div class="bopt-unsaved-pill" id="boptUnsavedPill" style="display:none;">
					<span class="bopt-unsaved-dot"></span>
					<span><?php esc_html_e( 'Unsaved changes', 'mobile-pasal' ); ?></span>
				</div>

				<?php if ( $saved ) : ?>
					<div class="bopt-save-alert" id="boptSaveAlert">
						<i class="fa-solid fa-circle-check"></i>
						<span><?php esc_html_e( 'Changes saved successfully!', 'mobile-pasal' ); ?></span>
					</div>
				<?php endif; ?>



				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" target="_blank" class="bopt-preview-btn" title="<?php esc_attr_e( 'View Live Site', 'mobile-pasal' ); ?>">
					<i class="fa-solid fa-arrow-up-right-from-square"></i>
					<span class="bopt-btn-text"><?php esc_html_e( 'View Live Site', 'mobile-pasal' ); ?></span>
				</a>

				<button type="submit" form="bopt-main-form" class="bopt-save-btn" id="boptTopbarSaveBtn" title="<?php esc_attr_e( 'Save Changes (Ctrl+S)', 'mobile-pasal' ); ?>">
					<i class="fa-solid fa-floppy-disk"></i>
					<span class="bopt-btn-text-full"><?php esc_html_e( 'Save Changes', 'mobile-pasal' ); ?></span>
					<span class="bopt-btn-text-short"><?php esc_html_e( 'Save', 'mobile-pasal' ); ?></span>
					<span class="bopt-key-hint">Ctrl+S</span>
				</button>
			</div>
		</header>

		<!-- Main Split Workspace -->
		<div class="bopt-workspace">
			
			<!-- Left Navigation Sidebar -->
			<aside class="bopt-sidebar" id="boptSidebar">
				
				<button type="button" class="bopt-drawer-close" id="boptDrawerClose" aria-label="<?php esc_attr_e( 'Close navigation', 'mobile-pasal' ); ?>">
					<i class="fa-solid fa-xmark"></i>
				</button>

				<div class="bopt-search-box">
					<i class="fa-solid fa-magnifying-glass"></i>
					<input type="text" id="boptSearchInput" placeholder="<?php esc_attr_e( 'Search all settings (Ctrl+K)...', 'mobile-pasal' ); ?>" autocomplete="off" />
					<button type="button" id="boptSearchClear" class="bopt-search-clear" style="display:none;" title="<?php esc_attr_e( 'Clear filter', 'mobile-pasal' ); ?>">
						<i class="fa-solid fa-xmark"></i>
					</button>
					<div class="bopt-global-search-results" id="boptGlobalSearchResults" style="display:none;"></div>
				</div>

				<nav class="bopt-nav">
					<?php foreach ( $nav_sections as $group_key => $group_data ) : ?>
						<div class="bopt-nav-group is-expanded" data-group="<?php echo esc_attr( $group_key ); ?>">
							<div class="bopt-nav-group-title">
								<div class="bopt-group-title-left">
									<i class="fa-solid <?php echo esc_attr( $group_data['icon'] ); ?>"></i>
									<span><?php echo esc_html( $group_data['group_title'] ); ?></span>
								</div>
								<div class="bopt-group-title-right">
									<span class="bopt-group-count"><?php echo count( $group_data['items'] ); ?></span>
									<i class="fa-solid fa-chevron-down bopt-group-chevron"></i>
								</div>
							</div>
							<ul class="bopt-nav-list">
								<?php foreach ( $group_data['items'] as $tab_key => $tab_data ) : ?>
									<li class="bopt-nav-item <?php echo $active_tab === $tab_key ? 'is-active' : ''; ?>" data-tab-target="<?php echo esc_attr( $tab_key ); ?>">
										<a href="<?php echo esc_url( add_query_arg( 'tab', $tab_key, admin_url( 'admin.php?page=mobile-pasal-options' ) ) ); ?>#tab-<?php echo esc_attr( $tab_key ); ?>" class="bopt-nav-link" data-tab="<?php echo esc_attr( $tab_key ); ?>" onclick="if(window.boptSwitchTab){window.boptSwitchTab('<?php echo esc_js( $tab_key ); ?>', event);return false;}">
											<i class="fa-solid <?php echo esc_attr( $tab_data['icon'] ); ?>"></i>
											<span class="bopt-nav-label"><?php echo esc_html( $tab_data['label'] ); ?></span>
										</a>
									</li>
								<?php endforeach; ?>
							</ul>
						</div>
					<?php endforeach; ?>
				</nav>



			</aside>

			<div class="bopt-drawer-overlay" id="boptDrawerOverlay"></div>

			<!-- Main Settings Canvas -->
			<main class="bopt-content">

				<!-- Mobile-First Horizontal Module Navigation Bar (< 1024px) -->
				<div class="bopt-mobile-module-nav" id="boptMobileModuleNav">
					<div class="bopt-mobile-module-scroll">
						<?php
						$mobile_nav_chips = array(
							'colors'            => array( 'icon' => 'fa-palette', 'label' => __( 'Colors', 'mobile-pasal' ) ),
							'identity'          => array( 'icon' => 'fa-image', 'label' => __( 'Brand & Logo', 'mobile-pasal' ) ),
							'header_nav'        => array( 'icon' => 'fa-bars', 'label' => __( 'Header', 'mobile-pasal' ) ),
							'catalog_sec'       => array( 'icon' => 'fa-tags', 'label' => __( 'Handsets', 'mobile-pasal' ) ),
							'hero'              => array( 'icon' => 'fa-house', 'label' => __( 'Hero Banner', 'mobile-pasal' ) ),
							'services_hero_tab' => array( 'icon' => 'fa-screwdriver-wrench', 'label' => __( 'Services', 'mobile-pasal' ) ),
							'about_story_tab'   => array( 'icon' => 'fa-book-open', 'label' => __( 'About Us', 'mobile-pasal' ) ),
							'contact_coords_tab'=> array( 'icon' => 'fa-location-dot', 'label' => __( 'Contact', 'mobile-pasal' ) ),
							'footer_tab'        => array( 'icon' => 'fa-shoe-prints', 'label' => __( 'Footer', 'mobile-pasal' ) ),
							'seo_meta_tab'      => array( 'icon' => 'fa-magnifying-glass-chart', 'label' => __( 'SEO Meta', 'mobile-pasal' ) ),
							'backup_health_tab' => array( 'icon' => 'fa-shield-heart', 'label' => __( 'Backup', 'mobile-pasal' ) ),
						);
						foreach ( $mobile_nav_chips as $m_tab => $m_data ) :
							$is_active_m = ( $active_tab === $m_tab );
							?>
							<button type="button" class="bopt-mobile-mod-chip <?php echo $is_active_m ? 'is-active' : ''; ?>" data-tab="<?php echo esc_attr( $m_tab ); ?>" onclick="if(window.boptSwitchTab){window.boptSwitchTab('<?php echo esc_js( $m_tab ); ?>', event);}">
								<i class="fa-solid <?php echo esc_attr( $m_data['icon'] ); ?>"></i>
								<span><?php echo esc_html( $m_data['label'] ); ?></span>
							</button>
						<?php endforeach; ?>
						<button type="button" class="bopt-mobile-mod-chip bopt-mobile-mod-more" id="boptMobileNavMoreBtn">
							<i class="fa-solid fa-bars-staggered"></i>
							<span><?php esc_html_e( 'All Modules...', 'mobile-pasal' ); ?></span>
						</button>
					</div>
				</div>

				<!-- Easy 1-Click Admin Customization Shortcut Bar -->
				<div class="bopt-easy-quickbar" style="background:#ffffff; border:1.5px solid #bfdbfe; border-radius:14px; padding:14px 18px; margin-bottom:18px; box-shadow:0 6px 18px rgba(0,102,204,0.06);">
					<div style="display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:8px; margin-bottom:10px;">
						<span style="font-size:12px; font-weight:800; text-transform:uppercase; letter-spacing:0.05em; color:#0066cc;">
							<i class="fa-solid fa-bolt"></i> <?php esc_html_e( 'Quick Customization Shortcuts — Jump to Most Used Settings:', 'mobile-pasal' ); ?>
						</span>
						<span style="font-size:11.5px; color:#64748b;"><?php esc_html_e( 'Click any button below to customize immediately', 'mobile-pasal' ); ?></span>
					</div>
					<div style="display:flex; flex-wrap:wrap; gap:8px;">
						<button type="button" class="bopt-messages-btn" onclick="if(window.boptSwitchTab)window.boptSwitchTab('identity');" style="font-size:12px; padding:6px 12px;">
							<i class="fa-solid fa-image" style="color:#0066cc;"></i> <?php esc_html_e( 'Logo, Brand Name & Favicon', 'mobile-pasal' ); ?>
						</button>
						<button type="button" class="bopt-messages-btn" onclick="if(window.boptSwitchTab)window.boptSwitchTab('contact_coords_tab');" style="font-size:12px; padding:6px 12px;">
							<i class="fa-solid fa-phone" style="color:#16a34a;"></i> <?php esc_html_e( 'Phone, WhatsApp, Email & Address', 'mobile-pasal' ); ?>
						</button>
						<button type="button" class="bopt-messages-btn" onclick="if(window.boptSwitchTab)window.boptSwitchTab('colors');" style="font-size:12px; padding:6px 12px;">
							<i class="fa-solid fa-palette" style="color:#8b5cf6;"></i> <?php esc_html_e( 'Colors & 1-Click Themes', 'mobile-pasal' ); ?>
						</button>
						<button type="button" class="bopt-messages-btn" onclick="if(window.boptSwitchTab)window.boptSwitchTab('catalog_sec');" style="font-size:12px; padding:6px 12px;">
							<i class="fa-solid fa-tags" style="color:#d97706;"></i> <?php esc_html_e( 'Show / Hide Phone Prices', 'mobile-pasal' ); ?>
						</button>
						<button type="button" class="bopt-messages-btn" onclick="if(window.boptSwitchTab)window.boptSwitchTab('hero');" style="font-size:12px; padding:6px 12px;">
							<i class="fa-solid fa-house" style="color:#0284c7;"></i> <?php esc_html_e( 'Homepage Hero Banner', 'mobile-pasal' ); ?>
						</button>
						<button type="button" class="bopt-messages-btn" onclick="if(window.boptSwitchTab)window.boptSwitchTab('contact_map_tab');" style="font-size:12px; padding:6px 12px;">
							<i class="fa-solid fa-map-location-dot" style="color:#dc2626;"></i> <?php esc_html_e( 'Google Maps Location', 'mobile-pasal' ); ?>
						</button>
						<a href="<?php echo esc_url( admin_url( 'admin.php?page=mp-inquiries&tab=repairs' ) ); ?>" class="bopt-messages-btn" style="font-size:12px; padding:6px 12px; text-decoration:none; background:#eff6ff; border-color:#93c5fd; color:#0066cc;">
							<i class="fa-solid fa-screwdriver-wrench"></i> <?php esc_html_e( 'Repair Lab Dockets', 'mobile-pasal' ); ?>
						</a>
						<a href="<?php echo esc_url( admin_url( 'admin.php?page=mp-inquiries&tab=general' ) ); ?>" class="bopt-messages-btn" style="font-size:12px; padding:6px 12px; text-decoration:none; background:#f5f3ff; border-color:#ddd6fe; color:#6d28d9;">
							<i class="fa-solid fa-envelope-open-text"></i> <?php esc_html_e( 'General Inquiries', 'mobile-pasal' ); ?>
						</a>
					</div>
				</div>

				<div class="bopt-breadcrumbs">
					<span><?php esc_html_e( 'Theme Options', 'mobile-pasal' ); ?></span>
					<span class="bopt-breadcrumb-sep">/</span>
					<span id="boptBreadcrumbModule"><?php esc_html_e( 'Brand & Global Styles', 'mobile-pasal' ); ?></span>
					<span class="bopt-breadcrumb-sep">/</span>
					<span class="bopt-breadcrumb-active" id="boptBreadcrumbTab"><?php esc_html_e( 'Color Palette & System', 'mobile-pasal' ); ?></span>
				</div>

				<form id="bopt-main-form" method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
					<input type="hidden" name="action" value="mobile_pasal_save_options" />
					<input type="hidden" name="current_tab" id="boptCurrentTabInput" value="<?php echo esc_attr( $active_tab ); ?>" />
					<?php wp_nonce_field( 'mobile_pasal_save_theme_options', 'mp_options_nonce' ); ?>

					<!-- ===================================================================
					     GROUP 1: BRAND & GLOBAL STYLES
					     =================================================================== -->

					<!-- 1.1 Colors Tab -->
					<div class="bopt-tab-pane <?php echo $active_tab === 'colors' ? 'is-active' : ''; ?>" id="tab-pane-colors">
						<div class="bopt-pane-header">
							<h2><?php esc_html_e( 'Color Palette & System Accent Engine', 'mobile-pasal' ); ?></h2>
							<p><?php esc_html_e( 'Customize your official brand palette across buttons, badges, links, preloader, and ratings.', 'mobile-pasal' ); ?></p>
						</div>

						<!-- 1-Click Preset Color Schemes -->
						<div class="bopt-presets-box">
							<div class="bopt-presets-title">
								<i class="fa-solid fa-wand-magic-sparkles"></i>
								<span><?php esc_html_e( '1-Click Curated Color Schemes', 'mobile-pasal' ); ?></span>
							</div>
							<div class="bopt-preset-swatches">
								<button type="button" class="bopt-preset-swatch" data-primary="#0066cc" data-dark="#004c99" data-light="#eff6ff" title="<?php esc_attr_e( 'Apply Sapphire Pro Theme', 'mobile-pasal' ); ?>">
									<span class="bopt-swatch-circle" style="background:#0066cc;"></span>
									<span><?php esc_html_e( 'Sapphire Pro (Default)', 'mobile-pasal' ); ?></span>
								</button>
								<button type="button" class="bopt-preset-swatch" data-primary="#0284c7" data-dark="#0369a1" data-light="#f0f9ff" title="<?php esc_attr_e( 'Apply Midnight Titanium Theme', 'mobile-pasal' ); ?>">
									<span class="bopt-swatch-circle" style="background:#0284c7;"></span>
									<span><?php esc_html_e( 'Midnight Titanium', 'mobile-pasal' ); ?></span>
								</button>
								<button type="button" class="bopt-preset-swatch" data-primary="#2563eb" data-dark="#1d4ed8" data-light="#eff6ff" title="<?php esc_attr_e( 'Apply Royal Cyber Blue Theme', 'mobile-pasal' ); ?>">
									<span class="bopt-swatch-circle" style="background:#2563eb;"></span>
									<span><?php esc_html_e( 'Royal Cyber Blue', 'mobile-pasal' ); ?></span>
								</button>
								<button type="button" class="bopt-preset-swatch" data-primary="#059669" data-dark="#047857" data-light="#ecfdf5" title="<?php esc_attr_e( 'Apply Emerald Lab Tech Theme', 'mobile-pasal' ); ?>">
									<span class="bopt-swatch-circle" style="background:#059669;"></span>
									<span><?php esc_html_e( 'Emerald Lab Tech', 'mobile-pasal' ); ?></span>
								</button>
								<button type="button" class="bopt-preset-swatch" data-primary="#d97706" data-dark="#b45309" data-light="#fffbeb" title="<?php esc_attr_e( 'Apply Luxury Amber Gold Theme', 'mobile-pasal' ); ?>">
									<span class="bopt-swatch-circle" style="background:#d97706;"></span>
									<span><?php esc_html_e( 'Luxury Amber Gold', 'mobile-pasal' ); ?></span>
								</button>
							</div>
						</div>

						<div class="bopt-card">
							<div class="bopt-card-header">
								<div class="bopt-card-header-icon"><i class="fa-solid fa-droplet"></i></div>
								<div>
									<h3 class="bopt-card-title"><?php esc_html_e( 'Primary Brand & Accent Colors', 'mobile-pasal' ); ?></h3>
									<p class="bopt-card-desc"><?php esc_html_e( 'Changes dynamically reflect across all buttons, header highlights, and card accents.', 'mobile-pasal' ); ?></p>
								</div>
							</div>
							<div class="bopt-card-body">
								<div class="bopt-field-grid">
									<?php
									mp_render_field_color( 'color_primary', __( 'Primary Sapphire Blue', 'mobile-pasal' ), __( 'Default: #0066cc. Used for primary CTA buttons, links, active navigation pills, and headers.' ) );
									mp_render_field_color( 'color_primary_dark', __( 'Primary Hover Dark', 'mobile-pasal' ), __( 'Default: #004c99. Used for button hover states and focused outlines.' ) );
									mp_render_field_color( 'color_primary_light', __( 'Primary Light Tint Surface', 'mobile-pasal' ), __( 'Default: #eff6ff. Soft background tint for icons, pills, and notification boxes.' ) );
									mp_render_field_color( 'color_green', __( 'WhatsApp Brand Green', 'mobile-pasal' ), __( 'Default: #16a34a. Dedicated WhatsApp action buttons and chat trigger icons.' ) );
									mp_render_field_color( 'color_amber', __( 'Rating Star Gold', 'mobile-pasal' ), __( 'Default: #f59e0b. Customer satisfaction stars and verified warranty badges.' ) );
									?>
								</div>
							</div>
						</div>

						<div class="bopt-card">
							<div class="bopt-card-header">
								<div class="bopt-card-header-icon"><i class="fa-solid fa-spinner"></i></div>
								<div>
									<h3 class="bopt-card-title"><?php esc_html_e( 'Cleanroom Preloader & Currency Settings', 'mobile-pasal' ); ?></h3>
									<p class="bopt-card-desc"><?php esc_html_e( 'Configure the smooth 1-second pulse preloader and store currency prefix.', 'mobile-pasal' ); ?></p>
								</div>
							</div>
							<div class="bopt-card-body">
								<div class="bopt-field-grid">
									<?php
									mp_render_field_toggle( 'preloader_enabled', __( 'Enable Cleanroom Preloader', 'mobile-pasal' ), __( 'Displays a sleek pulse logo loading mask while core assets initialize.' ) );
									mp_render_field_text( 'preloader_duration', __( 'Preloader Timeout (ms)', 'mobile-pasal' ), __( 'Default: 1000ms (1 second). Keeps page load responsive and fast.' ), '1000' );
									mp_render_field_text( 'currency_symbol', __( 'Currency Code / Symbol', 'mobile-pasal' ), __( 'Default: NPR or Rs. Used on product cards and repair tables.' ), 'NPR' );
									?>
								</div>
							</div>
						</div>
					</div>

					<!-- 1.2 Identity Tab -->
					<div class="bopt-tab-pane <?php echo $active_tab === 'identity' ? 'is-active' : ''; ?>" id="tab-pane-identity">
						<div class="bopt-pane-header">
							<h2><?php esc_html_e( 'Brand Identity, Official Logos & Favicon', 'mobile-pasal' ); ?></h2>
							<p><?php esc_html_e( 'Manage your showroom name, official logo media, and browser tab favicon.', 'mobile-pasal' ); ?></p>
						</div>

						<div class="bopt-card">
							<div class="bopt-card-header">
								<div class="bopt-card-header-icon"><i class="fa-solid fa-building"></i></div>
								<div>
									<h3 class="bopt-card-title"><?php esc_html_e( 'Store Brand Name & Tagline', 'mobile-pasal' ); ?></h3>
									<p class="bopt-card-desc"><?php esc_html_e( 'Core branding used across navigation, browser titles, and invoice headers.', 'mobile-pasal' ); ?></p>
								</div>
							</div>
							<div class="bopt-card-body">
								<div class="bopt-field-grid">
									<?php
									mp_render_field_text( 'site_brand_name', __( 'Shop / Business Name', 'mobile-pasal' ), __( 'Primary business title (e.g. Ali Mobile Center & Apple Fix).' ), 'Ali Mobile Center & Apple Fix' );
									mp_render_field_text( 'brand_name_line1', __( 'Header Brand Name (Line 1)', 'mobile-pasal' ), __( 'First line of stylized header logo text.' ), 'Ali Mobile' );
									mp_render_field_text( 'brand_name_line2', __( 'Header Brand Name (Line 2)', 'mobile-pasal' ), __( 'Second line of stylized header logo text.' ), 'Center' );
									mp_render_field_text( 'site_domain_badge', __( 'Location / Chowk Badge', 'mobile-pasal' ), __( 'Short badge displayed beside logo (e.g. Gulariya-06, Ji. Pra. Ka. Chowk).' ), 'Gulariya-06, Ji. Pra. Ka. Chowk' );
									mp_render_field_textarea( 'site_tagline', __( 'Store Tagline / Biography', 'mobile-pasal' ), __( 'Official description used in footer bio and search metadata.' ), 3, 'Official NTA Smartphones, Genuine Gear & Apple Fix Precision Lab' );
									?>
								</div>
							</div>
						</div>

						<div class="bopt-card">
							<div class="bopt-card-header">
								<div class="bopt-card-header-icon"><i class="fa-solid fa-image"></i></div>
								<div>
									<h3 class="bopt-card-title"><?php esc_html_e( 'Logos & Browser Icons', 'mobile-pasal' ); ?></h3>
									<p class="bopt-card-desc"><?php esc_html_e( 'Upload high-resolution transparent PNG or SVG media assets.', 'mobile-pasal' ); ?></p>
								</div>
							</div>
							<div class="bopt-card-body">
								<div class="bopt-field-grid">
									<?php
									mp_render_field_image( 'site_logo', __( 'Global Brand Logo (Header & Footer)', 'mobile-pasal' ), __( 'Recommended size: 240x60px transparent PNG or SVG. Automatically used in both the header and footer.' ) );
									mp_render_field_image( 'footer_logo', __( 'Custom Footer Logo (Optional Override)', 'mobile-pasal' ), __( 'Optional light/white logo specifically for the dark footer. Leave empty to use the Global Brand Logo above.' ) );
									mp_render_field_image( 'site_favicon', __( 'Browser Favicon', 'mobile-pasal' ), __( 'Square 32x32px or 64x64px icon displayed in browser tabs.' ) );
									?>
								</div>
							</div>
						</div>
					</div>

					<!-- 1.3 Header & Sticky Navigation -->
					<div class="bopt-tab-pane <?php echo $active_tab === 'header_nav' ? 'is-active' : ''; ?>" id="tab-pane-header_nav">
						<div class="bopt-pane-header">
							<h2><?php esc_html_e( 'Header & Sticky Top Utility Bar', 'mobile-pasal' ); ?></h2>
							<p><?php esc_html_e( 'Control the top helpline bar, sticky header behavior, search modal, and live WhatsApp CTA.', 'mobile-pasal' ); ?></p>
						</div>

						<div class="bopt-card">
							<div class="bopt-card-header">
								<div class="bopt-card-header-icon"><i class="fa-solid fa-phone"></i></div>
								<div>
									<h3 class="bopt-card-title"><?php esc_html_e( 'Top Utility Bar Details', 'mobile-pasal' ); ?></h3>
									<p class="bopt-card-desc"><?php esc_html_e( 'Coordinates displayed at the very top of desktop screens.', 'mobile-pasal' ); ?></p>
								</div>
							</div>
							<div class="bopt-card-body">
								<div class="bopt-field-grid">
									<?php
									mp_render_field_toggle( 'topbar_enabled', __( 'Enable Top Utility Bar', 'mobile-pasal' ), __( 'Show phone, hours, and location above the main navigation bar.' ) );
									mp_render_field_text( 'topbar_address', __( 'Top Bar Address Text', 'mobile-pasal' ), __( 'Brief address display (e.g. Gulariya-06, Ji. Pra. Ka. Chowk).' ) );
									mp_render_field_text( 'topbar_hours', __( 'Top Bar Operating Hours', 'mobile-pasal' ), __( 'Brief operating schedule (e.g. Sun–Fri 9AM–8PM | Sat Open).' ) );
									?>
								</div>
							</div>
						</div>

						<div class="bopt-card">
							<div class="bopt-card-header">
								<div class="bopt-card-header-icon"><i class="fa-solid fa-bars"></i></div>
								<div>
									<h3 class="bopt-card-title"><?php esc_html_e( 'Header Controls & WhatsApp CTA', 'mobile-pasal' ); ?></h3>
									<p class="bopt-card-desc"><?php esc_html_e( 'Customize sticky scrolling, search button, and direct WhatsApp button.', 'mobile-pasal' ); ?></p>
								</div>
							</div>
							<div class="bopt-card-body">
								<div class="bopt-field-grid">
									<?php
									mp_render_field_toggle( 'header_sticky', __( 'Sticky Header on Scroll', 'mobile-pasal' ), __( 'Pin the header smoothly to top of screen as the customer scrolls down.' ) );
									mp_render_field_toggle( 'header_search_enabled', __( 'Enable Search Option', 'mobile-pasal' ), __( 'Displays the simple search box in the header bar.' ) );
									mp_render_field_text( 'header_wa_btn_text', __( 'Header WhatsApp Button Text', 'mobile-pasal' ), __( 'Default: Chat on WhatsApp. Launches instant chat with store technician.' ) );
									?>
								</div>
							</div>
						</div>
					</div>

					<!-- 1.4 Footer Tab -->
					<div class="bopt-tab-pane <?php echo $active_tab === 'footer_tab' ? 'is-active' : ''; ?>" id="tab-pane-footer_tab">
						<div class="bopt-pane-header">
							<h2><?php esc_html_e( 'Footer, Counter Alert Banner & Copyright', 'mobile-pasal' ); ?></h2>
							<p><?php esc_html_e( 'Manage the store biography, open counter alert banner, footer columns, and copyright notice.', 'mobile-pasal' ); ?></p>
						</div>

						<div class="bopt-card">
							<div class="bopt-card-header">
								<div class="bopt-card-header-icon"><i class="fa-brands fa-whatsapp"></i></div>
								<div>
									<h3 class="bopt-card-title"><?php esc_html_e( 'Floating WhatsApp Button', 'mobile-pasal' ); ?></h3>
									<p class="bopt-card-desc"><?php esc_html_e( 'Control the floating WhatsApp action button that appears in the bottom corner of the site.', 'mobile-pasal' ); ?></p>
								</div>
							</div>
							<div class="bopt-card-body">
								<div class="bopt-field-grid">
									<?php
									mp_render_field_toggle( 'floating_wa_enabled', __( 'Enable Floating WhatsApp Button', 'mobile-pasal' ), __( 'Displays floating WhatsApp click-to-chat button on all screens.' ) );
									?>
								</div>
							</div>
						</div>

						<div class="bopt-card">
							<div class="bopt-card-header">
								<div class="bopt-card-header-icon"><i class="fa-solid fa-table-columns"></i></div>
								<div>
									<h3 class="bopt-card-title"><?php esc_html_e( 'Footer Column Titles & Copyright', 'mobile-pasal' ); ?></h3>
									<p class="bopt-card-desc"><?php esc_html_e( 'Headings for the footer links and legal copyright statement.', 'mobile-pasal' ); ?></p>
								</div>
							</div>
							<div class="bopt-card-body">
								<div class="bopt-field-grid">
									<?php
									mp_render_field_text( 'footer_col1_title', __( 'Column 1 Title (Catalog)', 'mobile-pasal' ), __( 'Default: Handset Showroom.' ) );
									mp_render_field_text( 'footer_col2_title', __( 'Column 2 Title (Services)', 'mobile-pasal' ), __( 'Default: Apple Fix Lab.' ) );
									mp_render_field_text( 'footer_col3_title', __( 'Column 3 Title (Location)', 'mobile-pasal' ), __( 'Default: Store Information.' ) );
									mp_render_field_textarea( 'footer_copyright', __( 'Copyright Notice', 'mobile-pasal' ), __( 'Default: © 2026 Ali Mobile Center & Apple Fix. All Rights Reserved.' ), 2 );
									mp_render_field_text( 'footer_credit_name', __( 'Developer Credit Name', 'mobile-pasal' ), __( 'Displayed in the footer bottom bar (Default: Rajan Sharma).' ), 'Rajan Sharma' );
									mp_render_field_url( 'footer_credit_url', __( 'Developer Credit URL (Optional)', 'mobile-pasal' ), __( 'Optional portfolio or profile link for the developer credit.' ), 'https://' );
									?>
								</div>
							</div>
						</div>

						<!-- Footer Trust Guarantees Strip -->
						<div class="bopt-card">
							<div class="bopt-card-header">
								<div class="bopt-card-header-icon"><i class="fa-solid fa-shield-check"></i></div>
								<div>
									<h3 class="bopt-card-title"><?php esc_html_e( 'Footer 4 Trust Guarantees Box Strip', 'mobile-pasal' ); ?></h3>
									<p class="bopt-card-desc"><?php esc_html_e( 'Manage the 4 trust badges appearing just above the footer across the website.', 'mobile-pasal' ); ?></p>
								</div>
							</div>
							<div class="bopt-card-body">
								<div class="bopt-field-grid">
									<div class="bopt-field-col-2">
										<?php
										mp_render_field_icon( 'trust_box1_icon', __( 'Trust Box 1 Icon', 'mobile-pasal' ), __( 'Choose icon for trust guarantee 1.' ), 'shield' );
										mp_render_field_text( 'trust_box1_title', __( 'Trust Box 1 Title', 'mobile-pasal' ), __( 'Default: NTA Registered Devices' ) );
										mp_render_field_text( 'trust_box1_desc', __( 'Trust Box 1 Subtitle', 'mobile-pasal' ), __( 'Default: 100% compliant with Nepal MDMS laws.' ) );
										?>
									</div>
									<div class="bopt-field-col-2">
										<?php
										mp_render_field_icon( 'trust_box2_icon', __( 'Trust Box 2 Icon', 'mobile-pasal' ), __( 'Choose icon for trust guarantee 2.' ), 'bolt' );
										mp_render_field_text( 'trust_box2_title', __( 'Trust Box 2 Title', 'mobile-pasal' ), __( 'Default: Express 45-Min Lab' ) );
										mp_render_field_text( 'trust_box2_desc', __( 'Trust Box 2 Subtitle', 'mobile-pasal' ), __( 'Default: Quick turnaround with genuine spare parts.' ) );
										?>
									</div>
									<div class="bopt-field-col-2">
										<?php
										mp_render_field_icon( 'trust_box3_icon', __( 'Trust Box 3 Icon', 'mobile-pasal' ), __( 'Choose icon for trust guarantee 3.' ), 'tag' );
										mp_render_field_text( 'trust_box3_title', __( 'Trust Box 3 Title', 'mobile-pasal' ), __( 'Default: Zero Hidden Charges' ) );
										mp_render_field_text( 'trust_box3_desc', __( 'Trust Box 3 Subtitle', 'mobile-pasal' ), __( 'Default: Transparent billing and authentic warranties.' ) );
										?>
									</div>
									<div class="bopt-field-col-2">
										<?php
										mp_render_field_icon( 'trust_box4_icon', __( 'Trust Box 4 Icon', 'mobile-pasal' ), __( 'Choose icon for trust guarantee 4.' ), 'location' );
										mp_render_field_text( 'trust_box4_title', __( 'Trust Box 4 Title', 'mobile-pasal' ), __( 'Default: Counter Agent Ready' ) );
										mp_render_field_text( 'trust_box4_desc', __( 'Trust Box 4 Subtitle', 'mobile-pasal' ), __( 'Default: eSewa top-up, bill payments & cash points.' ) );
										?>
									</div>
								</div>
							</div>
						</div>

						<!-- Social Media Profiles -->
						<div class="bopt-card">
							<div class="bopt-card-header">
								<div class="bopt-card-header-icon"><i class="fa-solid fa-share-nodes"></i></div>
								<div>
									<h3 class="bopt-card-title"><?php esc_html_e( 'Official Social Media Profiles & Channels', 'mobile-pasal' ); ?></h3>
									<p class="bopt-card-desc"><?php esc_html_e( 'Links for the footer social icons. Leave empty to hide any channel.', 'mobile-pasal' ); ?></p>
								</div>
							</div>
							<div class="bopt-card-body">
								<div class="bopt-field-grid">
									<?php
									mp_render_field_text( 'social_facebook', __( 'Facebook Page URL', 'mobile-pasal' ), __( 'e.g. https://facebook.com/alimobilecenter' ) );
									mp_render_field_text( 'social_instagram', __( 'Instagram Profile URL', 'mobile-pasal' ), __( 'e.g. https://instagram.com/alimobilecenter' ) );
									mp_render_field_text( 'social_whatsapp', __( 'WhatsApp Chat URL', 'mobile-pasal' ), __( 'e.g. https://wa.me/9779804530786' ) );
									mp_render_field_text( 'social_tiktok', __( 'TikTok Profile URL', 'mobile-pasal' ), __( 'e.g. https://tiktok.com/@alimobilecenter' ) );
									mp_render_field_text( 'social_google_maps', __( 'Google Maps Location URL', 'mobile-pasal' ), __( 'Direct location link' ) );
									mp_render_field_text( 'social_youtube', __( 'YouTube Channel URL', 'mobile-pasal' ), __( 'e.g. https://youtube.com/@alimobilecenter' ) );
									?>
								</div>
							</div>
						</div>
					</div>

					<!-- ===================================================================
					     GROUP 2: HOMEPAGE SHOWCASE
					     =================================================================== -->

					<!-- 2.1 Hero Slider -->
					<div class="bopt-tab-pane <?php echo $active_tab === 'hero' ? 'is-active' : ''; ?>" id="tab-pane-hero">
						<div class="bopt-pane-header">
							<h2><?php esc_html_e( 'Homepage Hero Showcase (3 Complete Slides & Department Switcher)', 'mobile-pasal' ); ?></h2>
							<p><?php esc_html_e( 'Customize titles, descriptions, perks, media badges, and department dock tabs across the 3 rotating hero slides.', 'mobile-pasal' ); ?></p>
						</div>

						<!-- Subnav Segmented Pills for Fast Zero-Scroll Editing -->
						<div class="bopt-subnav-pills">
							<button type="button" class="bopt-subnav-pill is-active" data-subtab="subtab-hero-1">
								<i class="fa-solid fa-mobile-screen"></i>
								<span><?php esc_html_e( 'Slide 1: Flagships', 'mobile-pasal' ); ?></span>
							</button>
							<button type="button" class="bopt-subnav-pill" data-subtab="subtab-hero-2">
								<i class="fa-solid fa-screwdriver-wrench"></i>
								<span><?php esc_html_e( 'Slide 2: Apple Fix Lab', 'mobile-pasal' ); ?></span>
							</button>
							<button type="button" class="bopt-subnav-pill" data-subtab="subtab-hero-3">
								<i class="fa-solid fa-headphones"></i>
								<span><?php esc_html_e( 'Slide 3: Genuine Gear', 'mobile-pasal' ); ?></span>
							</button>

							<button type="button" class="bopt-subnav-pill" data-subtab="subtab-hero-trust">
								<i class="fa-solid fa-shield-halved"></i>
								<span><?php esc_html_e( 'Post-Hero Guarantees (4 Features)', 'mobile-pasal' ); ?></span>
							</button>
						</div>

						<!-- Slide 1 Content -->
						<div class="bopt-subnav-content active" id="subtab-hero-1">
							<div class="bopt-card">
								<div class="bopt-card-header">
									<div class="bopt-card-header-left">
										<div class="bopt-card-header-icon"><i class="fa-solid fa-mobile-screen"></i></div>
										<div>
											<h3 class="bopt-card-title"><?php esc_html_e( 'Hero Slide 1: Expert Mobile Repair & Service', 'mobile-pasal' ); ?></h3>
											<p class="bopt-card-desc"><?php esc_html_e( 'Headline, trust badge, 4 feature cards, action links, image & tagline.', 'mobile-pasal' ); ?></p>
										</div>
									</div>
									<button type="button" class="bopt-card-toggle-btn" aria-label="Toggle section"><i class="fa-solid fa-chevron-up"></i></button>
								</div>
								<div class="bopt-card-body">
									<div class="bopt-field-grid">
										<?php
										mp_render_field_text( 'hero_slide1_trust', __( 'Slide 1 Trust Tag', 'mobile-pasal' ), __( 'Default: Trusted by 10,000+ Customers' ) );
										mp_render_field_text( 'hero_slide1_title', __( 'Slide 1 Main Headline (HTML allowed)', 'mobile-pasal' ), __( 'Default: Expert <span class="accent">Mobile Repair</span> & Service' ) );
										mp_render_field_textarea( 'hero_slide1_intro', __( 'Slide 1 Intro Subtitle', 'mobile-pasal' ), __( 'Default: Your One-Stop Solution for Mobile Repair, Accessories and More.' ), 2 );
										mp_render_field_icon( 'hero_slide1_f1_icon', __( 'Feature 1 Icon', 'mobile-pasal' ), __( 'Choose icon for feature 1.' ), 'clock' );
										mp_render_field_text( 'hero_slide1_f1_text', __( 'Feature 1 Title', 'mobile-pasal' ), __( 'Default: Fast<br>Service' ) );
										mp_render_field_icon( 'hero_slide1_f2_icon', __( 'Feature 2 Icon', 'mobile-pasal' ), __( 'Choose icon for feature 2.' ), 'screen' );
										mp_render_field_text( 'hero_slide1_f2_text', __( 'Feature 2 Title', 'mobile-pasal' ), __( 'Default: Genuine<br>Parts' ) );
										mp_render_field_icon( 'hero_slide1_f3_icon', __( 'Feature 3 Icon', 'mobile-pasal' ), __( 'Choose icon for feature 3.' ), 'wrench' );
										mp_render_field_text( 'hero_slide1_f3_text', __( 'Feature 3 Title', 'mobile-pasal' ), __( 'Default: Skilled<br>Technicians' ) );
										mp_render_field_icon( 'hero_slide1_f4_icon', __( 'Feature 4 Icon', 'mobile-pasal' ), __( 'Choose icon for feature 4.' ), 'tag' );
										mp_render_field_text( 'hero_slide1_f4_text', __( 'Feature 4 Title', 'mobile-pasal' ), __( 'Default: Affordable<br>Price' ) );
										mp_render_field_text( 'hero_slide1_btn1_text', __( 'Primary Button Text', 'mobile-pasal' ), __( 'Default: Book a Repair' ) );
										mp_render_field_text( 'hero_slide1_btn1_url', __( 'Primary Button URL', 'mobile-pasal' ), __( 'Default: #contact' ) );
										mp_render_field_text( 'hero_slide1_btn2_text', __( 'Secondary Button Text', 'mobile-pasal' ), __( 'Default: Watch Video' ) );
										mp_render_field_text( 'hero_slide1_btn2_url', __( 'Secondary Button URL', 'mobile-pasal' ), __( 'Default: #services' ) );
										mp_render_field_text( 'hero_slide1_tagline', __( 'Visual Floating Tagline', 'mobile-pasal' ), __( 'Default: Fix It.<br>Stay Connected!' ) );
										mp_render_field_image( 'hero_slide1_image', __( 'Slide 1 Showcase Photo', 'mobile-pasal' ), __( 'High-resolution smartphone or lab image.' ) );
										?>
									</div>
								</div>
							</div>
						</div>

						<!-- Slide 2 Content -->
						<div class="bopt-subnav-content" id="subtab-hero-2">
							<div class="bopt-card">
								<div class="bopt-card-header">
									<div class="bopt-card-header-left">
										<div class="bopt-card-header-icon"><i class="fa-solid fa-screwdriver-wrench"></i></div>
										<div>
											<h3 class="bopt-card-title"><?php esc_html_e( 'Hero Slide 2: Screen & Battery Care', 'mobile-pasal' ); ?></h3>
											<p class="bopt-card-desc"><?php esc_html_e( 'Cracked screen, battery swaps, water damage, diagnostic services.', 'mobile-pasal' ); ?></p>
										</div>
									</div>
									<button type="button" class="bopt-card-toggle-btn" aria-label="Toggle section"><i class="fa-solid fa-chevron-up"></i></button>
								</div>
								<div class="bopt-card-body">
									<div class="bopt-field-grid">
										<?php
										mp_render_field_text( 'hero_slide2_trust', __( 'Slide 2 Trust Tag', 'mobile-pasal' ), __( 'Default: Careful Repairs. Quality Parts.' ) );
										mp_render_field_text( 'hero_slide2_title', __( 'Slide 2 Main Headline (HTML allowed)', 'mobile-pasal' ), __( 'Default: Cracked Screen? <span class="accent">We\'ve Got You.</span>' ) );
										mp_render_field_textarea( 'hero_slide2_intro', __( 'Slide 2 Intro Subtitle', 'mobile-pasal' ), __( 'Default: From screen replacement to battery problems, get your phone back in shape with reliable service.' ), 2 );
										mp_render_field_icon( 'hero_slide2_f1_icon', __( 'Feature 1 Icon', 'mobile-pasal' ), __( 'Choose icon for feature 1.' ), 'screen' );
										mp_render_field_text( 'hero_slide2_f1_text', __( 'Feature 1 Title', 'mobile-pasal' ), __( 'Default: Screen<br>Replacement' ) );
										mp_render_field_icon( 'hero_slide2_f2_icon', __( 'Feature 2 Icon', 'mobile-pasal' ), __( 'Choose icon for feature 2.' ), 'battery' );
										mp_render_field_text( 'hero_slide2_f2_text', __( 'Feature 2 Title', 'mobile-pasal' ), __( 'Default: Battery<br>Change' ) );
										mp_render_field_icon( 'hero_slide2_f3_icon', __( 'Feature 3 Icon', 'mobile-pasal' ), __( 'Choose icon for feature 3.' ), 'droplet' );
										mp_render_field_text( 'hero_slide2_f3_text', __( 'Feature 3 Title', 'mobile-pasal' ), __( 'Default: Water Damage<br>Check' ) );
										mp_render_field_icon( 'hero_slide2_f4_icon', __( 'Feature 4 Icon', 'mobile-pasal' ), __( 'Choose icon for feature 4.' ), 'cpu' );
										mp_render_field_text( 'hero_slide2_f4_text', __( 'Feature 4 Title', 'mobile-pasal' ), __( 'Default: Software<br>Support' ) );
										mp_render_field_text( 'hero_slide2_btn1_text', __( 'Primary Button Text', 'mobile-pasal' ), __( 'Default: Get Your Phone Fixed' ) );
										mp_render_field_text( 'hero_slide2_btn1_url', __( 'Primary Button URL', 'mobile-pasal' ), __( 'Default: #contact' ) );
										mp_render_field_text( 'hero_slide2_btn2_text', __( 'Secondary Button Text', 'mobile-pasal' ), __( 'Default: Explore Services' ) );
										mp_render_field_text( 'hero_slide2_btn2_url', __( 'Secondary Button URL', 'mobile-pasal' ), __( 'Default: #services' ) );
										mp_render_field_text( 'hero_slide2_tagline', __( 'Visual Floating Tagline', 'mobile-pasal' ), __( 'Default: Repair Right.<br>Relax More.' ) );
										mp_render_field_image( 'hero_slide2_image', __( 'Slide 2 Showcase Photo', 'mobile-pasal' ), __( 'Photo of phone repair in progress.' ) );
										?>
									</div>
								</div>
							</div>
						</div>

						<!-- Slide 3 Content -->
						<div class="bopt-subnav-content" id="subtab-hero-3">
							<div class="bopt-card">
								<div class="bopt-card-header">
									<div class="bopt-card-header-left">
										<div class="bopt-card-header-icon"><i class="fa-solid fa-shop"></i></div>
										<div>
											<h3 class="bopt-card-title"><?php esc_html_e( 'Hero Slide 3: Handset Sales & Store Showcase', 'mobile-pasal' ); ?></h3>
											<p class="bopt-card-desc"><?php esc_html_e( 'Smartphone retail, genuine accessories, friendly counter advice.', 'mobile-pasal' ); ?></p>
										</div>
									</div>
									<button type="button" class="bopt-card-toggle-btn" aria-label="Toggle section"><i class="fa-solid fa-chevron-up"></i></button>
								</div>
								<div class="bopt-card-body">
									<div class="bopt-field-grid">
										<?php
										mp_render_field_text( 'hero_slide3_trust', __( 'Slide 3 Trust Tag', 'mobile-pasal' ), __( 'Default: Your Local Mobile Store' ) );
										mp_render_field_text( 'hero_slide3_title', __( 'Slide 3 Main Headline (HTML allowed)', 'mobile-pasal' ), __( 'Default: Find Your <span class="accent">Next Phone.</span>' ) );
										mp_render_field_textarea( 'hero_slide3_intro', __( 'Slide 3 Intro Subtitle', 'mobile-pasal' ), __( 'Default: Explore popular smartphones, useful accessories and friendly advice — all in one place.' ), 2 );
										mp_render_field_icon( 'hero_slide3_f1_icon', __( 'Feature 1 Icon', 'mobile-pasal' ), __( 'Choose icon for feature 1.' ), 'phone' );
										mp_render_field_text( 'hero_slide3_f1_text', __( 'Feature 1 Title', 'mobile-pasal' ), __( 'Default: Popular<br>Brands' ) );
										mp_render_field_icon( 'hero_slide3_f2_icon', __( 'Feature 2 Icon', 'mobile-pasal' ), __( 'Choose icon for feature 2.' ), 'plug' );
										mp_render_field_text( 'hero_slide3_f2_text', __( 'Feature 2 Title', 'mobile-pasal' ), __( 'Default: Accessories' ) );
										mp_render_field_icon( 'hero_slide3_f3_icon', __( 'Feature 3 Icon', 'mobile-pasal' ), __( 'Choose icon for feature 3.' ), 'heart' );
										mp_render_field_text( 'hero_slide3_f3_text', __( 'Feature 3 Title', 'mobile-pasal' ), __( 'Default: Helpful<br>Advice' ) );
										mp_render_field_icon( 'hero_slide3_f4_icon', __( 'Feature 4 Icon', 'mobile-pasal' ), __( 'Choose icon for feature 4.' ), 'wallet' );
										mp_render_field_text( 'hero_slide3_f4_text', __( 'Feature 4 Title', 'mobile-pasal' ), __( 'Default: Trusted<br>Service' ) );
										mp_render_field_text( 'hero_slide3_btn1_text', __( 'Primary Button Text', 'mobile-pasal' ), __( 'Default: Visit Our Store' ) );
										mp_render_field_text( 'hero_slide3_btn1_url', __( 'Primary Button URL', 'mobile-pasal' ), __( 'Default: #contact' ) );
										mp_render_field_text( 'hero_slide3_btn2_text', __( 'Secondary Button Text', 'mobile-pasal' ), __( 'Default: View Gallery' ) );
										mp_render_field_text( 'hero_slide3_btn2_url', __( 'Secondary Button URL', 'mobile-pasal' ), __( 'Default: #gallery' ) );
										mp_render_field_text( 'hero_slide3_tagline', __( 'Visual Floating Tagline', 'mobile-pasal' ), __( 'Default: Discover More.<br>Stay Connected!' ) );
										mp_render_field_image( 'hero_slide3_image', __( 'Slide 3 Showcase Photo', 'mobile-pasal' ), __( 'Photo of new phones or accessories.' ) );
										?>
									</div>
								</div>
							</div>
						</div>



						<!-- Slide 5: Post-Hero Trust Bar (Common 4 Features) -->
						<div class="bopt-subnav-content" id="subtab-hero-trust">
							<div class="bopt-card">
								<div class="bopt-card-header">
									<div class="bopt-card-header-left">
										<div class="bopt-card-header-icon"><i class="fa-solid fa-shield-halved"></i></div>
										<div>
											<h3 class="bopt-card-title"><?php esc_html_e( 'Post-Hero 4-Feature Trust Strip Bar', 'mobile-pasal' ); ?></h3>
											<p class="bopt-card-desc"><?php esc_html_e( 'Configure the common guarantees strip placed directly below the hero slider.', 'mobile-pasal' ); ?></p>
										</div>
									</div>
									<button type="button" class="bopt-card-toggle-btn" aria-label="Toggle section"><i class="fa-solid fa-chevron-up"></i></button>
								</div>
								<div class="bopt-card-body">
									<div class="bopt-field-grid">
										<?php
										mp_render_field_toggle( 'trust_bar_enabled', __( 'Enable Post-Hero Trust Bar', 'mobile-pasal' ), __( 'Show or hide the dedicated 4-card trust strip below the hero slider.' ) );
										?>
										<div class="bopt-field-col-2">
											<?php
											mp_render_field_icon( 'trust_feat1_icon', __( 'Feature 1 Icon', 'mobile-pasal' ), __( 'Choose icon for trust feature 1.' ), 'clock' );
											mp_render_field_text( 'trust_feat1_title', __( 'Feature 1 Title', 'mobile-pasal' ), __( 'Default: Fast 45-Min Fix' ) );
											mp_render_field_text( 'trust_feat1_desc', __( 'Feature 1 Description', 'mobile-pasal' ), __( 'Default: Instant on-counter screen & battery turnaround' ) );
											?>
										</div>
										<div class="bopt-field-col-2">
											<?php
											mp_render_field_icon( 'trust_feat2_icon', __( 'Feature 2 Icon', 'mobile-pasal' ), __( 'Choose icon for trust feature 2.' ), 'screen' );
											mp_render_field_text( 'trust_feat2_title', __( 'Feature 2 Title', 'mobile-pasal' ), __( 'Default: Genuine OLED Parts' ) );
											mp_render_field_text( 'trust_feat2_desc', __( 'Feature 2 Description', 'mobile-pasal' ), __( 'Default: TrueTone & 3D Touch programming retained' ) );
											?>
										</div>
										<div class="bopt-field-col-2">
											<?php
											mp_render_field_icon( 'trust_feat3_icon', __( 'Feature 3 Icon', 'mobile-pasal' ), __( 'Choose icon for trust feature 3.' ), 'wrench' );
											mp_render_field_text( 'trust_feat3_title', __( 'Feature 3 Title', 'mobile-pasal' ), __( 'Default: Level 4 Technicians' ) );
											mp_render_field_text( 'trust_feat3_desc', __( 'Feature 3 Description', 'mobile-pasal' ), __( 'Default: Micro-soldering & stereo microscope cleanroom lab' ) );
											?>
										</div>
										<div class="bopt-field-col-2">
											<?php
											mp_render_field_icon( 'trust_feat4_icon', __( 'Feature 4 Icon', 'mobile-pasal' ), __( 'Choose icon for trust feature 4.' ), 'shield' );
											mp_render_field_text( 'trust_feat4_title', __( 'Feature 4 Title', 'mobile-pasal' ), __( 'Default: Affordable Pricing' ) );
											mp_render_field_text( 'trust_feat4_desc', __( 'Feature 4 Description', 'mobile-pasal' ), __( 'Default: Transparent rates with warranty & official VAT bill' ) );
											?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- 2.2 Bento Categories & Brands -->
					<div class="bopt-tab-pane <?php echo $active_tab === 'categories_brands_sec' ? 'is-active' : ''; ?>" id="tab-pane-categories_brands_sec">
						<div class="bopt-pane-header">
							<h2><?php esc_html_e( 'Bento Categories & Authorized Brands Showcase', 'mobile-pasal' ); ?></h2>
							<p><?php esc_html_e( 'Manage the 6 interactive Bento department cards and authorized brand distributor strip.', 'mobile-pasal' ); ?></p>
						</div>

						<div class="bopt-card">
							<div class="bopt-card-header">
								<div class="bopt-card-header-icon"><i class="fa-solid fa-layer-group"></i></div>
								<div>
									<h3 class="bopt-card-title"><?php esc_html_e( 'Categories Section Header', 'mobile-pasal' ); ?></h3>
									<p class="bopt-card-desc"><?php esc_html_e( 'Header title, subtitle, and catalog view-all link.', 'mobile-pasal' ); ?></p>
								</div>
							</div>
							<div class="bopt-card-body">
								<div class="bopt-field-grid">
									<?php
									mp_render_field_text( 'categories_kicker', __( 'Categories Kicker', 'mobile-pasal' ), __( 'Default: Showroom Counters' ) );
									mp_render_field_text( 'categories_title', __( 'Categories Title', 'mobile-pasal' ), __( 'Default: Explore Store Counters & Departments' ) );
									mp_render_field_textarea( 'categories_subtitle', __( 'Categories Subtitle', 'mobile-pasal' ), __( 'Default: From brand-new sealed smartphones to Gulariya\'s dedicated Apple Fix lab, genuine accessories, and digital merchant services.' ), 2 );
									mp_render_field_text( 'categories_btn_text', __( 'Header Action Button Text', 'mobile-pasal' ), __( 'Default: View All Products' ) );
									mp_render_field_text( 'categories_btn_url', __( 'Header Action Button URL', 'mobile-pasal' ), __( 'Default: #catalog' ) );
									?>
								</div>
							</div>
						</div>

						<div class="bopt-card">
							<div class="bopt-card-header">
								<div class="bopt-card-header-icon"><i class="fa-solid fa-boxes-stacked"></i></div>
								<div>
									<h3 class="bopt-card-title"><?php esc_html_e( '6 Bento Department Cards', 'mobile-pasal' ); ?></h3>
									<p class="bopt-card-desc"><?php esc_html_e( 'Configure titles, subtitles, count tags, explore cues, and destination links.', 'mobile-pasal' ); ?></p>
								</div>
							</div>
							<div class="bopt-card-body">
								<div class="bopt-field-grid">
									<div class="bopt-divider"><span><?php esc_html_e( 'Card 1: Smartphones', 'mobile-pasal' ); ?></span></div>
									<?php
									mp_render_field_text( 'cat1_title', __( 'Card 1 Title', 'mobile-pasal' ), __( 'Default: Smartphones' ) );
									mp_render_field_text( 'cat1_sub', __( 'Card 1 Subtitle', 'mobile-pasal' ), __( 'Default: iPhone, Samsung, Pixel & Redmi' ) );
									mp_render_field_text( 'cat1_count', __( 'Card 1 Count Tag', 'mobile-pasal' ), __( 'Default: 50+ Handsets' ) );
									mp_render_field_text( 'cat1_hint', __( 'Card 1 Explore Hint', 'mobile-pasal' ), __( 'Default: Browse Showroom' ) );
									mp_render_field_text( 'cat1_url', __( 'Card 1 Link URL', 'mobile-pasal' ), __( 'Default: #catalog' ) );
									?>

									<div class="bopt-divider"><span><?php esc_html_e( 'Card 2: Apple Fix Lab', 'mobile-pasal' ); ?></span></div>
									<?php
									mp_render_field_text( 'cat2_title', __( 'Card 2 Title', 'mobile-pasal' ), __( 'Default: Apple Fix Lab' ) );
									mp_render_field_text( 'cat2_sub', __( 'Card 2 Subtitle', 'mobile-pasal' ), __( 'Default: iPhone Screen, Battery & IC Lab' ) );
									mp_render_field_text( 'cat2_count', __( 'Card 2 Count Tag', 'mobile-pasal' ), __( 'Default: Screen • Battery' ) );
									mp_render_field_text( 'cat2_hint', __( 'Card 2 Explore Hint', 'mobile-pasal' ), __( 'Default: View Repair Board' ) );
									mp_render_field_text( 'cat2_url', __( 'Card 2 Link URL', 'mobile-pasal' ), __( 'Default: #services' ) );
									?>

									<div class="bopt-divider"><span><?php esc_html_e( 'Card 3: Audio & Buds', 'mobile-pasal' ); ?></span></div>
									<?php
									mp_render_field_text( 'cat3_title', __( 'Card 3 Title', 'mobile-pasal' ), __( 'Default: Audio & Buds' ) );
									mp_render_field_text( 'cat3_sub', __( 'Card 3 Subtitle', 'mobile-pasal' ), __( 'Default: AirPods, Neckbands & ANC Sound' ) );
									mp_render_field_text( 'cat3_count', __( 'Card 3 Count Tag', 'mobile-pasal' ), __( 'Default: Original Buds' ) );
									mp_render_field_text( 'cat3_hint', __( 'Card 3 Explore Hint', 'mobile-pasal' ), __( 'Default: Explore Studio' ) );
									mp_render_field_text( 'cat3_url', __( 'Card 3 Link URL', 'mobile-pasal' ), __( 'Default: #catalog' ) );
									?>

									<div class="bopt-divider"><span><?php esc_html_e( 'Card 4: Smartwatches', 'mobile-pasal' ); ?></span></div>
									<?php
									mp_render_field_text( 'cat4_title', __( 'Card 4 Title', 'mobile-pasal' ), __( 'Default: Smartwatches' ) );
									mp_render_field_text( 'cat4_sub', __( 'Card 4 Subtitle', 'mobile-pasal' ), __( 'Default: Calling, AMOLED & Fitness Wear' ) );
									mp_render_field_text( 'cat4_count', __( 'Card 4 Count Tag', 'mobile-pasal' ), __( 'Default: AMOLED Calling' ) );
									mp_render_field_text( 'cat4_hint', __( 'Card 4 Explore Hint', 'mobile-pasal' ), __( 'Default: Discover Watches' ) );
									mp_render_field_text( 'cat4_url', __( 'Card 4 Link URL', 'mobile-pasal' ), __( 'Default: #catalog' ) );
									?>

									<div class="bopt-divider"><span><?php esc_html_e( 'Card 5: Chargers & Glass', 'mobile-pasal' ); ?></span></div>
									<?php
									mp_render_field_text( 'cat5_title', __( 'Card 5 Title', 'mobile-pasal' ), __( 'Default: Chargers & Glass' ) );
									mp_render_field_text( 'cat5_sub', __( 'Card 5 Subtitle', 'mobile-pasal' ), __( 'Default: 20W–120W Adapters & 9H Glass' ) );
									mp_render_field_text( 'cat5_count', __( 'Card 5 Count Tag', 'mobile-pasal' ), __( 'Default: PD 20W–120W' ) );
									mp_render_field_text( 'cat5_hint', __( 'Card 5 Explore Hint', 'mobile-pasal' ), __( 'Default: View Protection' ) );
									mp_render_field_text( 'cat5_url', __( 'Card 5 Link URL', 'mobile-pasal' ), __( 'Default: #catalog' ) );
									?>

									<div class="bopt-divider"><span><?php esc_html_e( 'Card 6: eSewa & Banking', 'mobile-pasal' ); ?></span></div>
									<?php
									mp_render_field_text( 'cat6_title', __( 'Card 6 Title', 'mobile-pasal' ), __( 'Default: eSewa & Banking' ) );
									mp_render_field_text( 'cat6_sub', __( 'Card 6 Subtitle', 'mobile-pasal' ), __( 'Default: Top-Up, Bills & Money Transfer' ) );
									mp_render_field_text( 'cat6_count', __( 'Card 6 Count Tag', 'mobile-pasal' ), __( 'Default: Merchant Top-Up' ) );
									mp_render_field_text( 'cat6_hint', __( 'Card 6 Explore Hint', 'mobile-pasal' ), __( 'Default: Counter Agent' ) );
									mp_render_field_text( 'cat6_url', __( 'Card 6 Link URL', 'mobile-pasal' ), __( 'WhatsApp or service URL' ) );
									?>
								</div>
							</div>
						</div>

						<div class="bopt-card">
							<div class="bopt-card-header">
								<div class="bopt-card-header-icon"><i class="fa-solid fa-award"></i></div>
								<div>
									<h3 class="bopt-card-title"><?php esc_html_e( 'Authorized Showroom Brands Section', 'mobile-pasal' ); ?></h3>
									<p class="bopt-card-desc"><?php esc_html_e( 'Headers and brand pills for Apple, Samsung, Google Pixel, OnePlus, Xiaomi, and Accessories.', 'mobile-pasal' ); ?></p>
								</div>
							</div>
							<div class="bopt-card-body">
								<div class="bopt-field-grid">
									<?php
									mp_render_field_text( 'brands_kicker', __( 'Brands Section Kicker', 'mobile-pasal' ), __( 'Default: Authorized Brands' ) );
									mp_render_field_text( 'brands_title', __( 'Brands Section Title', 'mobile-pasal' ), __( 'Default: Top Smartphone Brands In Store' ) );
									mp_render_field_textarea( 'brands_subtitle', __( 'Brands Section Subtitle', 'mobile-pasal' ), __( 'Default: Select any brand tile below to instantly filter available models in our showroom catalog.' ), 2 );
									mp_render_field_text( 'brands_btn_text', __( 'Header Action Button Text', 'mobile-pasal' ), __( 'Default: Explore All Brands' ) );
									mp_render_field_text( 'brands_btn_url', __( 'Header Action Button URL', 'mobile-pasal' ), __( 'Default: #catalog' ) );
									?>

									<div class="bopt-divider"><span><?php esc_html_e( 'Brand 1: Apple', 'mobile-pasal' ); ?></span></div>
									<?php
									mp_render_field_text( 'brand1_name', __( 'Brand 1 Name', 'mobile-pasal' ), __( 'Default: Apple' ) );
									mp_render_field_text( 'brand1_sub', __( 'Brand 1 Subtitle', 'mobile-pasal' ), __( 'Default: iPhone 16 / 15 / 14 Series' ) );
									mp_render_field_text( 'brand1_chip', __( 'Brand 1 Filter Chip', 'mobile-pasal' ), __( 'Default: Filter iPhone →' ) );
									?>

									<div class="bopt-divider"><span><?php esc_html_e( 'Brand 2: Samsung', 'mobile-pasal' ); ?></span></div>
									<?php
									mp_render_field_text( 'brand2_name', __( 'Brand 2 Name', 'mobile-pasal' ), __( 'Default: Samsung' ) );
									mp_render_field_text( 'brand2_sub', __( 'Brand 2 Subtitle', 'mobile-pasal' ), __( 'Default: Galaxy S24 Ultra & A Series' ) );
									mp_render_field_text( 'brand2_chip', __( 'Brand 2 Filter Chip', 'mobile-pasal' ), __( 'Default: Filter Galaxy →' ) );
									?>

									<div class="bopt-divider"><span><?php esc_html_e( 'Brand 3: Google Pixel', 'mobile-pasal' ); ?></span></div>
									<?php
									mp_render_field_text( 'brand3_name', __( 'Brand 3 Name', 'mobile-pasal' ), __( 'Default: Google Pixel' ) );
									mp_render_field_text( 'brand3_sub', __( 'Brand 3 Subtitle', 'mobile-pasal' ), __( 'Default: Pixel 9 / 8 & Tensor AI' ) );
									mp_render_field_text( 'brand3_chip', __( 'Brand 3 Filter Chip', 'mobile-pasal' ), __( 'Default: Filter Pixel →' ) );
									?>

									<div class="bopt-divider"><span><?php esc_html_e( 'Brand 4: OnePlus', 'mobile-pasal' ); ?></span></div>
									<?php
									mp_render_field_text( 'brand4_name', __( 'Brand 4 Name', 'mobile-pasal' ), __( 'Default: OnePlus' ) );
									mp_render_field_text( 'brand4_sub', __( 'Brand 4 Subtitle', 'mobile-pasal' ), __( 'Default: OnePlus 12 & Nord 4' ) );
									mp_render_field_text( 'brand4_chip', __( 'Brand 4 Filter Chip', 'mobile-pasal' ), __( 'Default: Filter OnePlus →' ) );
									?>

									<div class="bopt-divider"><span><?php esc_html_e( 'Brand 5: Xiaomi', 'mobile-pasal' ); ?></span></div>
									<?php
									mp_render_field_text( 'brand5_name', __( 'Brand 5 Name', 'mobile-pasal' ), __( 'Default: Xiaomi' ) );
									mp_render_field_text( 'brand5_sub', __( 'Brand 5 Subtitle', 'mobile-pasal' ), __( 'Default: Xiaomi 14 & Redmi Note 13' ) );
									mp_render_field_text( 'brand5_chip', __( 'Brand 5 Filter Chip', 'mobile-pasal' ), __( 'Default: Filter Redmi →' ) );
									?>

									<div class="bopt-divider"><span><?php esc_html_e( 'Brand 6: Accessories', 'mobile-pasal' ); ?></span></div>
									<?php
									mp_render_field_text( 'brand6_name', __( 'Brand 6 Name', 'mobile-pasal' ), __( 'Default: Accessories' ) );
									mp_render_field_text( 'brand6_sub', __( 'Brand 6 Subtitle', 'mobile-pasal' ), __( 'Default: AirPods, Watch & Anker Fast PD' ) );
									mp_render_field_text( 'brand6_chip', __( 'Brand 6 Filter Chip', 'mobile-pasal' ), __( 'Default: Filter Gear →' ) );
									?>
								</div>
							</div>
						</div>
					</div>

					<!-- 2.3 Showroom Handsets Catalog -->
					<div class="bopt-tab-pane <?php echo $active_tab === 'catalog_sec' ? 'is-active' : ''; ?>" id="tab-pane-catalog_sec">
						<div class="bopt-pane-header">
							<h2><?php esc_html_e( 'Showroom Handsets Catalog Section', 'mobile-pasal' ); ?></h2>
							<p><?php esc_html_e( 'Manage catalog headlines, live search placeholder, brand filter tabs, and WhatsApp inquiry buttons.', 'mobile-pasal' ); ?></p>
						</div>

						<div class="bopt-card">
							<div class="bopt-card-header">
								<div class="bopt-card-header-icon"><i class="fa-solid fa-mobile-screen"></i></div>
								<div>
									<h3 class="bopt-card-title"><?php esc_html_e( 'Catalog Header & Top Action', 'mobile-pasal' ); ?></h3>
									<p class="bopt-card-desc"><?php esc_html_e( 'Main section kicker, title, description, and WhatsApp full stock action button.', 'mobile-pasal' ); ?></p>
								</div>
							</div>
							<div class="bopt-card-body">
								<div class="bopt-field-grid">
									<?php
									mp_render_field_text( 'catalog_kicker', __( 'Catalog Kicker', 'mobile-pasal' ), __( 'Default: Showroom Catalog' ) );
									mp_render_field_text( 'catalog_title', __( 'Catalog Title', 'mobile-pasal' ), __( 'Default: Latest Smartphone Arrivals & Top Models' ) );
									mp_render_field_textarea( 'catalog_subtitle', __( 'Catalog Subtitle', 'mobile-pasal' ), __( 'Default: Every handset is checked, unboxed or sealed-pack with official VAT bill & warranty. Filter by brand or search your model.' ), 2 );
									mp_render_field_text( 'catalog_header_btn_text', __( 'Header Action Button Text', 'mobile-pasal' ), __( 'Default: Inquire Full Stock' ) );
									mp_render_field_text( 'catalog_search_placeholder', __( 'Live Search Input Placeholder', 'mobile-pasal' ), __( 'Default: Search iPhone, Galaxy, Pixel, Redmi, Buds...' ) );
									?>
								</div>
							</div>
						</div>

						<!-- Handset Pricing Visibility Settings -->
						<div class="bopt-card">
							<div class="bopt-card-header">
								<div class="bopt-card-header-icon"><i class="fa-solid fa-tag"></i></div>
								<div>
									<h3 class="bopt-card-title"><?php esc_html_e( 'Handset Pricing Visibility Settings', 'mobile-pasal' ); ?></h3>
									<p class="bopt-card-desc"><?php esc_html_e( 'Control whether handset retail prices are shown or hidden across showroom and product pages.', 'mobile-pasal' ); ?></p>
								</div>
							</div>
							<div class="bopt-card-body">
								<div class="bopt-field-grid">
									<?php
									mp_render_field_toggle( 'handset_show_price', __( 'Display Handset Prices Globally', 'mobile-pasal' ), __( 'Turn ON to display numerical retail prices (e.g. NPR 1,94,999). Turn OFF to hide prices and show direct counter quotation instead.' ) );
									mp_render_field_text( 'handset_hidden_price_text', __( 'Hidden Price Badge / Label', 'mobile-pasal' ), __( 'Default: Inquire for Today\'s Best Counter Rate' ) );
									mp_render_field_text( 'handset_hidden_price_note', __( 'Hidden Price Explanation Note', 'mobile-pasal' ), __( 'Default: Official NTA stock. Contact our counter directly for today\'s cash/card offer.' ) );
									?>
								</div>
							</div>
						</div>

						<div class="bopt-card">
							<div class="bopt-card-header">
								<div class="bopt-card-header-icon"><i class="fa-solid fa-cart-shopping"></i></div>
								<div>
									<h3 class="bopt-card-title"><?php esc_html_e( 'Catalog Empty State Notice', 'mobile-pasal' ); ?></h3>
									<p class="bopt-card-desc"><?php esc_html_e( 'Messages displayed across zero-result filter searches.', 'mobile-pasal' ); ?></p>
								</div>
							</div>
							<div class="bopt-card-body">
								<div class="bopt-field-grid">
									<?php
									mp_render_field_text( 'catalog_empty_title', __( 'Empty State Title', 'mobile-pasal' ), __( 'Default: No matching models found in this tab' ) );
									mp_render_field_textarea( 'catalog_empty_desc', __( 'Empty State Description', 'mobile-pasal' ), __( 'Explains ordering rare models directly from authorized distributors.' ), 2 );
									mp_render_field_text( 'catalog_empty_btn_text', __( 'Empty State WhatsApp Button', 'mobile-pasal' ), __( 'Default: Inquire Directly on WhatsApp' ) );
									?>
								</div>
							</div>
						</div>
					</div>

					<!-- 2.4 Spotlight & Apple Fix Showcase -->
					<div class="bopt-tab-pane <?php echo $active_tab === 'spotlight_lab_sec' ? 'is-active' : ''; ?>" id="tab-pane-spotlight_lab_sec">
						<div class="bopt-pane-header">
							<h2><?php esc_html_e( 'iPhone 16 Pro Spotlight & Cleanroom Lab Showcase', 'mobile-pasal' ); ?></h2>
							<p><?php esc_html_e( 'Configure the flagship product feature card and technician precision lab showcase.', 'mobile-pasal' ); ?></p>
						</div>

						<div class="bopt-card">
							<div class="bopt-card-header">
								<div class="bopt-card-header-icon"><i class="fa-solid fa-gem"></i></div>
								<div>
									<h3 class="bopt-card-title"><?php esc_html_e( 'iPhone 16 Pro Flagship Spotlight Card', 'mobile-pasal' ); ?></h3>
									<p class="bopt-card-desc"><?php esc_html_e( 'Showcase the latest titanium flagship handset with hardware specs and finish swatches.', 'mobile-pasal' ); ?></p>
								</div>
							</div>
							<div class="bopt-card-body">
								<div class="bopt-field-grid">
									<?php
									mp_render_field_text( 'spotlight_badge', __( 'Spotlight Pill Badge', 'mobile-pasal' ), __( 'Default: Official Authorized Flagship Handset' ) );
									mp_render_field_text( 'spotlight_title', __( 'Spotlight Title', 'mobile-pasal' ), __( 'Default: iPhone 16 Pro & Pro Max' ) );
									mp_render_field_text( 'spotlight_tagline', __( 'Spotlight Tagline', 'mobile-pasal' ), __( 'Default: Built for Apple Intelligence • Grade 5 Titanium' ) );
									mp_render_field_textarea( 'spotlight_desc', __( 'Spotlight Description', 'mobile-pasal' ), __( 'Default: Experience the supercharged A18 Pro chip, 48MP Fusion Camera system, tactile Camera Control button...' ), 3 );
									mp_render_field_text( 'spotlight_status_text', __( 'Stock Handover Status Text', 'mobile-pasal' ), __( 'Optional live beacon text. Leave empty to hide.' ) );
									mp_render_field_image( 'spotlight_image', __( 'Spotlight Handset Image', 'mobile-pasal' ), __( 'Photo of iPhone 16 Pro / Pro Max' ) );
									?>
								</div>
							</div>
						</div>

						<div class="bopt-card">
							<div class="bopt-card-header">
								<div class="bopt-card-header-icon"><i class="fa-solid fa-microscope"></i></div>
								<div>
									<h3 class="bopt-card-title"><?php esc_html_e( 'Apple Fix Precision Cleanroom Showcase', 'mobile-pasal' ); ?></h3>
									<p class="bopt-card-desc"><?php esc_html_e( 'Highlight local repair capabilities: no courier delays to Nepalgunj, stereo microscopes, and SLA metrics.', 'mobile-pasal' ); ?></p>
								</div>
							</div>
							<div class="bopt-card-body">
								<div class="bopt-field-grid">
									<?php
									mp_render_field_text( 'lab_badge', __( 'Lab Section Badge', 'mobile-pasal' ), __( 'Default: Apple Fix Specialist • Gulariya Counter' ) );
									mp_render_field_text( 'lab_live_status', __( 'Top Right Status Pill', 'mobile-pasal' ), __( 'Default: Live Gulariya Counter Cleanroom Lab' ) );
									mp_render_field_text( 'lab_tagline', __( 'Photo Overlay Tagline', 'mobile-pasal' ), __( 'Default: Stereo Zoom Microscope • Anti-Static ESD Station' ) );
									mp_render_field_text( 'lab_title', __( 'Lab Section Title', 'mobile-pasal' ), __( 'Default: Gulariya\'s Premier Precision Apple Fix Lab' ) );
									mp_render_field_textarea( 'lab_desc', __( 'Lab Section Subtitle', 'mobile-pasal' ), __( 'Default: We do not forward your phone to Nepalgunj or Kathmandu...' ), 3 );

									mp_render_field_icon( 'lab_feat1_icon', __( 'Feature 1 Icon', 'mobile-pasal' ), __( 'Choose icon for screen replacement.' ), 'clock' );
									mp_render_field_text( 'lab_feat1_title', __( 'Feature 1 Title', 'mobile-pasal' ), __( 'Default: 30-Minute Screen Replacement' ) );
									mp_render_field_text( 'lab_feat1_chip', __( 'Feature 1 Status Chip', 'mobile-pasal' ), __( 'Default: TrueTone & 3D Touch Retained' ) );
									mp_render_field_text( 'lab_feat1_desc', __( 'Feature 1 Description', 'mobile-pasal' ), __( 'Default: Fast OLED and glass restoration with TrueTone & 3D touch programming.' ) );
									mp_render_field_icon( 'lab_feat2_icon', __( 'Feature 2 Icon', 'mobile-pasal' ), __( 'Choose icon for battery calibration.' ), 'battery' );
									mp_render_field_text( 'lab_feat2_title', __( 'Feature 2 Title', 'mobile-pasal' ), __( 'Default: Battery Health Calibration' ) );
									mp_render_field_text( 'lab_feat2_chip', __( 'Feature 2 Status Chip', 'mobile-pasal' ), __( 'Default: Zero Error BMS Micro-Welded' ) );
									mp_render_field_text( 'lab_feat2_desc', __( 'Feature 2 Description', 'mobile-pasal' ), __( 'Default: Certified battery replacements that restore peak 100% capacity...' ) );
									mp_render_field_icon( 'lab_feat3_icon', __( 'Feature 3 Icon', 'mobile-pasal' ), __( 'Choose icon for counter transparency.' ), 'shield' );
									mp_render_field_text( 'lab_feat3_title', __( 'Feature 3 Title', 'mobile-pasal' ), __( 'Default: In-Front-Of-You Transparency' ) );
									mp_render_field_text( 'lab_feat3_chip', __( 'Feature 3 Status Chip', 'mobile-pasal' ), __( 'Default: 100% Privacy Protection' ) );
									mp_render_field_text( 'lab_feat3_desc', __( 'Feature 3 Description', 'mobile-pasal' ), __( 'Default: Watch your repair live across our counter...' ) );

									mp_render_field_text( 'lab_stat1_num', __( 'Lab Metric 1 Number', 'mobile-pasal' ), __( 'Default: 30m' ) );
									mp_render_field_text( 'lab_stat1_label', __( 'Lab Metric 1 Label', 'mobile-pasal' ), __( 'Default: Display Turnaround' ) );
									mp_render_field_text( 'lab_stat2_num', __( 'Lab Metric 2 Number', 'mobile-pasal' ), __( 'Default: 100%' ) );
									mp_render_field_text( 'lab_stat2_label', __( 'Lab Metric 2 Label', 'mobile-pasal' ), __( 'Default: Battery Health' ) );
									mp_render_field_text( 'lab_stat3_num', __( 'Lab Metric 3 Number', 'mobile-pasal' ), __( 'Default: 90d' ) );
									mp_render_field_text( 'lab_stat3_label', __( 'Lab Metric 3 Label', 'mobile-pasal' ), __( 'Default: Service Warranty' ) );

									mp_render_field_text( 'lab_btn1_text', __( 'Button 1 Text', 'mobile-pasal' ), __( 'Default: Consult Our Technician' ) );
									mp_render_field_text( 'lab_btn2_prefix', __( 'Button 2 Call Prefix', 'mobile-pasal' ), __( 'Default: Call Counter' ) );
									mp_render_field_image( 'lab_image', __( 'Lab Showcase Image', 'mobile-pasal' ), __( 'Photo of technician repair hands or stereomicroscope' ) );
									?>
								</div>
							</div>
						</div>
					</div>

					<!-- 2.5 Repair Services, Workflow & Care Guides -->
					<div class="bopt-tab-pane <?php echo $active_tab === 'home_services_sec' ? 'is-active' : ''; ?>" id="tab-pane-home_services_sec">
						<div class="bopt-pane-header">
							<h2><?php esc_html_e( 'Repair Services, 3-Step Workflow & Phone First-Aid Guides', 'mobile-pasal' ); ?></h2>
							<p><?php esc_html_e( 'Manage the homepage service grid header, the 3-step transparent service process, and technician care guides.', 'mobile-pasal' ); ?></p>
						</div>

						<div class="bopt-card">
							<div class="bopt-card-header">
								<div class="bopt-card-header-icon"><i class="fa-solid fa-screwdriver-wrench"></i></div>
								<div>
									<h3 class="bopt-card-title"><?php esc_html_e( 'Repair Services Grid Header', 'mobile-pasal' ); ?></h3>
									<p class="bopt-card-desc"><?php esc_html_e( 'Header title, subtitle, and instant quote action link.', 'mobile-pasal' ); ?></p>
								</div>
							</div>
							<div class="bopt-card-body">
								<div class="bopt-field-grid">
									<?php
									mp_render_field_text( 'services_kicker', __( 'Services Section Kicker', 'mobile-pasal' ), __( 'Default: Diagnostics & Solutions' ) );
									mp_render_field_text( 'services_title', __( 'Services Section Title', 'mobile-pasal' ), __( 'Default: Complete Counter Repair Services' ) );
									mp_render_field_textarea( 'services_subtitle', __( 'Services Section Subtitle', 'mobile-pasal' ), __( 'Default: From Apple iPhone to Samsung Galaxy and Xiaomi devices, all repairs are performed with original-grade parts and live customer inspection.' ), 2 );
									mp_render_field_text( 'services_header_btn_text', __( 'Header Action Button Text', 'mobile-pasal' ), __( 'Default: Ask Instant Quote' ) );
									mp_render_field_text( 'service_card_btn_text', __( 'Card Quote Button Label', 'mobile-pasal' ), __( 'Default: Inquire Quote' ) );
									?>
								</div>
							</div>
						</div>

						<div class="bopt-card">
							<div class="bopt-card-header">
								<div class="bopt-card-header-icon"><i class="fa-solid fa-list-check"></i></div>
								<div>
									<h3 class="bopt-card-title"><?php esc_html_e( '3-Step Counter Service Workflow', 'mobile-pasal' ); ?></h3>
									<p class="bopt-card-desc"><?php esc_html_e( 'Titles and descriptions for the 3 steps of customer phone intake, fix, and handover.', 'mobile-pasal' ); ?></p>
								</div>
							</div>
							<div class="bopt-card-body">
								<div class="bopt-field-grid">
									<?php
									mp_render_field_text( 'workflow_kicker', __( 'Workflow Kicker', 'mobile-pasal' ), __( 'Default: Transparent Workflow' ) );
									mp_render_field_text( 'workflow_title', __( 'Workflow Title', 'mobile-pasal' ), __( 'Default: 3-Step Counter Service in Gulariya' ) );
									mp_render_field_textarea( 'workflow_subtitle', __( 'Workflow Subtitle', 'mobile-pasal' ), __( 'Default: Simple, reliable, and completely open process from diagnosis to handover.' ), 2 );

									mp_render_field_text( 'workflow_step1_title', __( 'Step 1 Title', 'mobile-pasal' ), __( 'Default: Free Counter Diagnostic' ) );
									mp_render_field_textarea( 'workflow_step1_desc', __( 'Step 1 Description', 'mobile-pasal' ), __( 'Default: Bring your phone to Ji. Pra. Ka. Chowk. Our technician inspects hardware symptoms in 5 minutes with exact repair estimate.' ), 2 );

									mp_render_field_text( 'workflow_step2_title', __( 'Step 2 Title', 'mobile-pasal' ), __( 'Default: In-Front-Of-You Precision Fix' ) );
									mp_render_field_textarea( 'workflow_step2_desc', __( 'Step 2 Description', 'mobile-pasal' ), __( 'Default: Watch your repair live across our counter. Genuine parts installed with precision tools, heat beds, and ESD mats.' ), 2 );

									mp_render_field_text( 'workflow_step3_title', __( 'Step 3 Title', 'mobile-pasal' ), __( 'Default: Testing & Handover' ) );
									mp_render_field_textarea( 'workflow_step3_desc', __( 'Step 3 Description', 'mobile-pasal' ), __( 'Default: Multi-point check for touch response, cameras, cellular signal, and battery. Handover with testing warranty.' ), 2 );
									?>
								</div>
							</div>
						</div>

						<div class="bopt-card">
							<div class="bopt-card-header">
								<div class="bopt-card-header-icon"><i class="fa-solid fa-notes-medical"></i></div>
								<div>
									<h3 class="bopt-card-title"><?php esc_html_e( 'Phone First-Aid & Care Guides', 'mobile-pasal' ); ?></h3>
									<p class="bopt-card-desc"><?php esc_html_e( '3 educational emergency advice cards (cracked screen, water damage, battery longevity).', 'mobile-pasal' ); ?></p>
								</div>
							</div>
							<div class="bopt-card-body">
								<div class="bopt-field-grid">
									<?php
									mp_render_field_text( 'guides_kicker', __( 'Guides Section Kicker', 'mobile-pasal' ), __( 'Default: Technician Advice' ) );
									mp_render_field_text( 'guides_title', __( 'Guides Section Title', 'mobile-pasal' ), __( 'Default: Phone First-Aid & Care Guides' ) );
									mp_render_field_textarea( 'guides_subtitle', __( 'Guides Section Subtitle', 'mobile-pasal' ), __( 'Default: Practical guidance from our certified technicians on protecting your smartphone before bringing it to our counter.' ), 2 );
									mp_render_field_text( 'guides_header_btn_text', __( 'Header Action Button Text', 'mobile-pasal' ), __( 'Default: Ask Technician Advice' ) );
									?>

									<div class="bopt-divider"><span><?php esc_html_e( 'Guide 1: Display Emergency', 'mobile-pasal' ); ?></span></div>
									<?php
									mp_render_field_text( 'guide1_tag', __( 'Guide 1 Tag Pill', 'mobile-pasal' ), __( 'Default: Display Emergency' ) );
									mp_render_field_text( 'guide1_title', __( 'Guide 1 Title', 'mobile-pasal' ), __( 'Default: Cracked Screen First-Aid' ) );
									mp_render_field_textarea( 'guide1_desc', __( 'Guide 1 Description', 'mobile-pasal' ), __( 'Default: Do not apply hard pressure on glass cracks to avoid bleeding the underlying OLED panel...' ), 3 );
									mp_render_field_text( 'guide1_btn_text', __( 'Guide 1 Action Button Text', 'mobile-pasal' ), __( 'Default: Book Screen Replacement' ) );
									mp_render_field_text( 'guide1_btn_url', __( 'Guide 1 Action Button URL', 'mobile-pasal' ), __( 'Default: #services' ) );
									mp_render_field_image( 'guide1_img', __( 'Guide 1 Image', 'mobile-pasal' ), __( 'Photo illustrating cracked phone screen care.' ) );
									?>

									<div class="bopt-divider"><span><?php esc_html_e( 'Guide 2: Liquid Protocol', 'mobile-pasal' ); ?></span></div>
									<?php
									mp_render_field_text( 'guide2_tag', __( 'Guide 2 Tag Pill', 'mobile-pasal' ), __( 'Default: Liquid Protocol' ) );
									mp_render_field_text( 'guide2_title', __( 'Guide 2 Title', 'mobile-pasal' ), __( 'Default: Phone Dropped in Water?' ) );
									mp_render_field_textarea( 'guide2_desc', __( 'Guide 2 Description', 'mobile-pasal' ), __( 'Default: Turn off device immediately. Never plug in a charging cable...' ), 3 );
									mp_render_field_text( 'guide2_btn_text', __( 'Guide 2 Action Button Text', 'mobile-pasal' ), __( 'Default: Contact Emergency Tech' ) );
									mp_render_field_text( 'guide2_btn_url', __( 'Guide 2 Action Button URL', 'mobile-pasal' ), __( 'WhatsApp emergency URL' ) );
									mp_render_field_image( 'guide2_img', __( 'Guide 2 Image', 'mobile-pasal' ), __( 'Photo illustrating water damage protocol.' ) );
									?>

									<div class="bopt-divider"><span><?php esc_html_e( 'Guide 3: Battery Health', 'mobile-pasal' ); ?></span></div>
									<?php
									mp_render_field_text( 'guide3_tag', __( 'Guide 3 Tag Pill', 'mobile-pasal' ), __( 'Default: Battery Health' ) );
									mp_render_field_text( 'guide3_title', __( 'Guide 3 Title', 'mobile-pasal' ), __( 'Default: Maximizing Battery Longevity' ) );
									mp_render_field_textarea( 'guide3_desc', __( 'Guide 3 Description', 'mobile-pasal' ), __( 'Default: Avoid letting your battery drop below 15% frequently...' ), 3 );
									mp_render_field_text( 'guide3_btn_text', __( 'Guide 3 Action Button Text', 'mobile-pasal' ), __( 'Default: Check Battery Health' ) );
									mp_render_field_text( 'guide3_btn_url', __( 'Guide 3 Action Button URL', 'mobile-pasal' ), __( 'Default: #services' ) );
									mp_render_field_image( 'guide3_img', __( 'Guide 3 Image', 'mobile-pasal' ), __( 'Photo illustrating battery health care.' ) );
									?>
								</div>
							</div>
						</div>
					</div>

					<!-- 2.6 Customer Reviews & Store Visit -->
					<div class="bopt-tab-pane <?php echo $active_tab === 'reviews_map_sec' ? 'is-active' : ''; ?>" id="tab-pane-reviews_map_sec">
						<div class="bopt-pane-header">
							<h2><?php esc_html_e( 'Customer Reviews & Counter Location Section', 'mobile-pasal' ); ?></h2>
							<p><?php esc_html_e( 'Manage the five-star customer feedback headers, Google Maps embed, and store coordinates.', 'mobile-pasal' ); ?></p>
						</div>

						<div class="bopt-card">
							<div class="bopt-card-header">
								<div class="bopt-card-header-icon"><i class="fa-solid fa-comments"></i></div>
								<div>
									<h3 class="bopt-card-title"><?php esc_html_e( 'Customer Reviews Header & Ratings Score', 'mobile-pasal' ); ?></h3>
									<p class="bopt-card-desc"><?php esc_html_e( 'Manage verified customer review titles and ratings overview.', 'mobile-pasal' ); ?></p>
								</div>
							</div>
							<div class="bopt-card-body">
								<div class="bopt-field-grid">
									<?php
									mp_render_field_text( 'reviews_kicker', __( 'Reviews Section Kicker', 'mobile-pasal' ), __( 'Default: Verified Local Customers' ) );
									mp_render_field_text( 'reviews_title', __( 'Reviews Section Title', 'mobile-pasal' ), __( 'Default: What Gulariya Residents Say' ) );
									mp_render_field_textarea( 'reviews_subtitle', __( 'Reviews Section Subtitle', 'mobile-pasal' ), __( 'Default: Real feedback from local smartphone buyers and repair customers across Bardiya.' ), 2 );
									mp_render_field_text( 'reviews_rating_score', __( 'Overall Rating Score', 'mobile-pasal' ), __( 'Default: 4.9 / 5.0' ) );
									mp_render_field_text( 'reviews_rating_count_text', __( 'Rating Count Label', 'mobile-pasal' ), __( 'Default: (250+ Local Customer Reviews)' ) );
									?>
								</div>
							</div>
						</div>

						<div class="bopt-card">
							<div class="bopt-card-header">
								<div class="bopt-card-header-icon"><i class="fa-solid fa-map-location-dot"></i></div>
								<div>
									<h3 class="bopt-card-title"><?php esc_html_e( 'Visit Us & Counter Location Section', 'mobile-pasal' ); ?></h3>
									<p class="bopt-card-desc"><?php esc_html_e( 'Manage address, phone helpline, operating hours, action buttons, and map URL.', 'mobile-pasal' ); ?></p>
								</div>
							</div>
							<div class="bopt-card-body">
								<div class="bopt-field-grid">
									<?php
									mp_render_field_text( 'visit_kicker', __( 'Visit Section Kicker', 'mobile-pasal' ), __( 'Default: Walk In Anytime' ) );
									mp_render_field_text( 'visit_title', __( 'Visit Section Title', 'mobile-pasal' ), __( 'Default: Visit Us in Gulariya' ) );
									mp_render_field_textarea( 'visit_desc', __( 'Visit Section Description', 'mobile-pasal' ), __( 'Default: Centrally located at Ji. Pra. Ka. Chowk. Walk in for brand-new phone purchases...' ), 2 );
									mp_render_field_text( 'store_name', __( 'Store Brand Name', 'mobile-pasal' ), __( 'Default: Ali Mobile Center & Apple Fix' ) );
									mp_render_field_text( 'contact_address', __( 'Exact Counter Address', 'mobile-pasal' ), __( 'Default: Gulariya-06, Ji. Pra. Ka. Chowk, Bardiya, Nepal' ) );
									mp_render_field_text( 'contact_phone', __( 'Helpline & WhatsApp Number', 'mobile-pasal' ), __( 'Default: +977 9804530786' ) );
									mp_render_field_text( 'visit_phone_sub', __( 'Phone Helpline Subtitle', 'mobile-pasal' ), __( 'Default: Direct counter support available 7 days a week' ) );
									mp_render_field_text( 'visit_hours_title', __( 'Operating Hours Title', 'mobile-pasal' ), __( 'Default: Counter Hours' ) );
									mp_render_field_text( 'contact_hours', __( 'Operating Hours Text', 'mobile-pasal' ), __( 'Default: Sun–Fri: 9:00 AM – 8:00 PM | Sat: Open' ) );
									mp_render_field_text( 'visit_btn1_text', __( 'Button 1 Text (Call)', 'mobile-pasal' ), __( 'Default: Call Store Now' ) );
									mp_render_field_text( 'visit_btn2_text', __( 'Button 2 Text (WhatsApp)', 'mobile-pasal' ), __( 'Default: WhatsApp Us' ) );
									mp_render_field_text( 'visit_btn3_text', __( 'Button 3 Text (Directions)', 'mobile-pasal' ), __( 'Default: Directions' ) );
									mp_render_field_text( 'google_maps_link', __( 'Directions Link URL', 'mobile-pasal' ), __( 'Google Maps search or pin URL' ) );
									mp_render_field_text( 'visit_map_url', __( 'Google Maps Embed Iframe URL', 'mobile-pasal' ), __( 'Embed URL for iframe src' ) );
									?>
								</div>
							</div>
						</div>

						<!-- Verified Reviews CPT Manager -->
						<div class="bopt-cpt-action-box" style="margin-top:20px;">
							<div class="bopt-cpt-action-info">
								<div class="bopt-cpt-action-icon"><i class="fa-solid fa-star"></i></div>
								<div>
									<strong><?php esc_html_e( 'Verified Customer Testimonials & Reviews', 'mobile-pasal' ); ?></strong>
									<p><?php esc_html_e( 'Add or edit verified Google and counter feedback, star scores, and customer purchase stories.', 'mobile-pasal' ); ?></p>
								</div>
							</div>
							<div class="bopt-cpt-action-links">
								<a href="<?php echo esc_url( admin_url( 'post-new.php?post_type=mp_review' ) ); ?>" class="bopt-btn-gold-action">
									<i class="fa-solid fa-plus"></i> <?php esc_html_e( 'Add Customer Review', 'mobile-pasal' ); ?>
								</a>
								<a href="<?php echo esc_url( admin_url( 'edit.php?post_type=mp_review' ) ); ?>" class="bopt-btn-gold-action" style="background:#1e293b;border:1px solid #334155;">
									<i class="fa-solid fa-list"></i> <?php esc_html_e( 'View All Reviews', 'mobile-pasal' ); ?>
								</a>
							</div>
						</div>

						<?php
						$review_query = get_posts( array(
							'post_type'      => 'mp_review',
							'posts_per_page' => 12,
							'post_status'    => 'publish',
							'orderby'        => 'date',
							'order'          => 'DESC',
						) );
						?>
						<div class="bopt-cpt-grid">
							<?php if ( ! empty( $review_query ) ) : ?>
								<?php foreach ( $review_query as $rv_post ) :
									$location = get_post_meta( $rv_post->ID, '_mp_review_location', true ) ?: 'Gulariya, Bardiya';
									$product  = get_post_meta( $rv_post->ID, '_mp_review_product', true );
									$rating   = intval( get_post_meta( $rv_post->ID, '_mp_review_rating', true ) ?: 5 );
									$verified = get_post_meta( $rv_post->ID, '_mp_review_verified', true ) !== '0';
								?>
									<div class="bopt-cpt-card">
										<div>
											<div class="bopt-cpt-card-top">
												<div class="bopt-cpt-card-thumb" style="color:#f59e0b; font-size:20px; background:#fffbeb; border-color:#fef3c7;">
													<i class="fa-solid fa-quote-left"></i>
												</div>
												<div style="flex:1; min-width:0;">
													<h4 class="bopt-cpt-card-title"><?php echo esc_html( $rv_post->post_title ); ?></h4>
													<div class="bopt-cpt-card-meta"><i class="fa-solid fa-location-dot"></i> <?php echo esc_html( $location ); ?></div>
												</div>
											</div>
											<div style="display:flex; align-items:center; gap:4px; color:#f59e0b; font-size:13px; margin: 8px 0;">
												<?php for ( $i = 1; $i <= 5; $i++ ) : ?>
													<i class="fa-<?php echo $i <= $rating ? 'solid' : 'regular'; ?> fa-star"></i>
												<?php endfor; ?>
												<?php if ( $product ) : ?>
													<span style="font-size:11px; color:#64748b; margin-left:6px;">(<?php echo esc_html( $product ); ?>)</span>
												<?php endif; ?>
											</div>
											<?php if ( $rv_post->post_content ) : ?>
												<p style="font-size:12px; color:#475569; line-height:1.4; margin:0 0 8px 0; font-style:italic;">
													"<?php echo esc_html( wp_trim_words( $rv_post->post_content, 16 ) ); ?>"
												</p>
											<?php endif; ?>
											<?php if ( $verified ) : ?>
												<span class="bopt-cpt-card-badge in_stock"><i class="fa-solid fa-circle-check"></i> <?php esc_html_e( 'Verified Client', 'mobile-pasal' ); ?></span>
											<?php endif; ?>
										</div>
										<div class="bopt-cpt-card-actions">
											<a href="<?php echo esc_url( get_edit_post_link( $rv_post->ID ) ); ?>" class="bopt-btn-action-small bopt-btn-edit">
												<i class="fa-solid fa-pen-to-square"></i> <?php esc_html_e( 'Edit Review', 'mobile-pasal' ); ?>
											</a>
										</div>
									</div>
								<?php endforeach; ?>
							<?php else : ?>
								<div class="bopt-empty-cpt-box">
									<i class="fa-solid fa-comments"></i>
									<p><?php esc_html_e( 'No customer reviews published yet. Tap "Add Customer Review" above to showcase 5-star customer experiences!', 'mobile-pasal' ); ?></p>
								</div>
							<?php endif; ?>
						</div>
					</div>

					<!-- 2.7 Estimator Console (Preserved) -->
					<div class="bopt-tab-pane <?php echo $active_tab === 'estimator_sec' ? 'is-active' : ''; ?>" id="tab-pane-estimator_sec">
						<div class="bopt-pane-header">
							<h2><?php esc_html_e( 'Diagnostic Estimator Console', 'mobile-pasal' ); ?></h2>
							<p><?php esc_html_e( 'Manage the interactive repair builder where clients select model and problem to generate an instant WhatsApp repair docket.', 'mobile-pasal' ); ?></p>
						</div>

						<div class="bopt-card">
							<div class="bopt-card-header">
								<div class="bopt-card-header-icon"><i class="fa-solid fa-calculator"></i></div>
								<div>
									<h3 class="bopt-card-title"><?php esc_html_e( 'Estimator Console Header & Headings', 'mobile-pasal' ); ?></h3>
									<p class="bopt-card-desc"><?php esc_html_e( 'Customize section title, subtitle, and instant dispatch template.', 'mobile-pasal' ); ?></p>
								</div>
							</div>
							<div class="bopt-card-body">
								<div class="bopt-field-grid">
									<?php
									mp_render_field_toggle( 'estimator_enabled', __( 'Enable Interactive Estimator Section', 'mobile-pasal' ), __( 'Displays the interactive diagnostic console on the homepage and repair page.' ) );
									mp_render_field_text( 'repair_kicker', __( 'Estimator Badge / Kicker', 'mobile-pasal' ), __( 'Default: Live Diagnostic Console' ) );
									mp_render_field_text( 'repair_title', __( 'Estimator Section Title', 'mobile-pasal' ), __( 'Default: Interactive Repair Estimator' ) );
									mp_render_field_textarea( 'repair_subtitle', __( 'Estimator Subtitle', 'mobile-pasal' ), __( 'Default: Select your device and fault below. Your live repair docket is prepared in real-time...' ), 3 );
									?>
								</div>
							</div>
						</div>
					</div>


					<!-- ===================================================================
					     GROUP 3: SHOWROOM & HANDSET CATALOG
					     =================================================================== -->

					<!-- 3.1 Shop Hero -->
					<div class="bopt-tab-pane <?php echo $active_tab === 'shop_hero_tab' ? 'is-active' : ''; ?>" id="tab-pane-shop_hero_tab">
						<div class="bopt-pane-header">
							<h2><?php esc_html_e( 'Shop Page Hero & Catalog Banner', 'mobile-pasal' ); ?></h2>
							<p><?php esc_html_e( 'Manage the shop/catalog page hero banner, headings, and distributor stock badge.', 'mobile-pasal' ); ?></p>
						</div>

						<div class="bopt-card">
							<div class="bopt-card-header">
								<div class="bopt-card-header-icon"><i class="fa-solid fa-store"></i></div>
								<div>
									<h3 class="bopt-card-title"><?php esc_html_e( 'Shop Page Hero Banner Settings', 'mobile-pasal' ); ?></h3>
									<p class="bopt-card-desc"><?php esc_html_e( 'Displays at the top of the /shop page with search filters.', 'mobile-pasal' ); ?></p>
								</div>
							</div>
							<div class="bopt-card-body">
								<div class="bopt-field-grid">
									<?php
									mp_render_field_text( 'shop_hero_badge', __( 'Shop Hero Badge', 'mobile-pasal' ), __( 'Default: Gulariya Verified Showroom' ) );
									mp_render_field_text( 'shop_hero_title', __( 'Shop Hero Title', 'mobile-pasal' ), __( 'Default: Official NTA Smartphones & Genuine Gear.' ) );
									mp_render_field_textarea( 'shop_hero_desc', __( 'Shop Hero Subtitle / Description', 'mobile-pasal' ), __( 'Default: Discover Gulariya\'s largest verified inventory of flagship handsets: Apple iPhone 16 Series, Samsung Galaxy S24 Ultra...' ), 3 );
									?>
								</div>
							</div>
						</div>


					</div>

					<!-- 3.2 4 Zero-Risk Assurance Cards -->
					<div class="bopt-tab-pane <?php echo $active_tab === 'shop_assurance_tab' ? 'is-active' : ''; ?>" id="tab-pane-shop_assurance_tab">
						<div class="bopt-pane-header">
							<h2><?php esc_html_e( 'The Ali Mobile Handset Assurance (4 Zero-Risk Cards)', 'mobile-pasal' ); ?></h2>
							<p><?php esc_html_e( 'Complete fine-grained control over the 4 handset assurance cards (100% NTA Approved, Official VAT Bill, Free Data Transfer, Trade-In Counter).', 'mobile-pasal' ); ?></p>
						</div>

						<div class="bopt-card">
							<div class="bopt-card-header">
								<div class="bopt-card-header-left">
									<div class="bopt-card-header-icon"><i class="fa-solid fa-shield-halved"></i></div>
									<div>
										<h3 class="bopt-card-title"><?php esc_html_e( 'Assurance Section Headings', 'mobile-pasal' ); ?></h3>
										<p class="bopt-card-desc"><?php esc_html_e( 'Header text displayed above the 4 assurance cards.', 'mobile-pasal' ); ?></p>
									</div>
								</div>
								<button type="button" class="bopt-card-toggle-btn" aria-label="Toggle section"><i class="fa-solid fa-chevron-up"></i></button>
							</div>
							<div class="bopt-card-body">
								<div class="bopt-field-grid">
									<?php
									mp_render_field_text( 'assurance_kicker', __( 'Assurance Kicker', 'mobile-pasal' ), __( 'Default: Zero-Risk Purchase' ) );
									mp_render_field_text( 'assurance_title', __( 'Assurance Section Title', 'mobile-pasal' ), __( 'Default: The Ali Mobile Handset Assurance' ) );
									mp_render_field_textarea( 'assurance_subtitle', __( 'Assurance Subtitle', 'mobile-pasal' ), __( 'Default: Why hundreds of phone buyers across Bardiya trust our counter over unverified online imports.' ), 2 );
									?>
								</div>
							</div>
						</div>

						<!-- Subnav Segmented Pills for 4 Assurance Cards -->
						<div class="bopt-subnav-pills">
							<button type="button" class="bopt-subnav-pill is-active" data-subtab="subtab-assure-1">
								<i class="fa-solid fa-certificate"></i>
								<span><?php esc_html_e( 'Card 1: 100% NTA', 'mobile-pasal' ); ?></span>
							</button>
							<button type="button" class="bopt-subnav-pill" data-subtab="subtab-assure-2">
								<i class="fa-solid fa-receipt"></i>
								<span><?php esc_html_e( 'Card 2: Official VAT Bill', 'mobile-pasal' ); ?></span>
							</button>
							<button type="button" class="bopt-subnav-pill" data-subtab="subtab-assure-3">
								<i class="fa-solid fa-arrow-right-arrow-left"></i>
								<span><?php esc_html_e( 'Card 3: Data Transfer', 'mobile-pasal' ); ?></span>
							</button>
							<button type="button" class="bopt-subnav-pill" data-subtab="subtab-assure-4">
								<i class="fa-solid fa-arrows-rotate"></i>
								<span><?php esc_html_e( 'Card 4: Trade-In Counter', 'mobile-pasal' ); ?></span>
							</button>
						</div>

						<!-- Card 1 Content -->
						<div class="bopt-subnav-content is-active" id="subtab-assure-1">
							<div class="bopt-card">
								<div class="bopt-card-header">
									<div class="bopt-card-header-left">
										<div class="bopt-card-header-icon"><i class="fa-solid fa-certificate"></i></div>
										<div>
											<h3 class="bopt-card-title"><?php esc_html_e( 'Card 1: 100% NTA Approved', 'mobile-pasal' ); ?></h3>
											<p class="bopt-card-desc"><?php esc_html_e( 'Compliant with Nepal Telecommunications Authority IMEI registration.', 'mobile-pasal' ); ?></p>
										</div>
									</div>
									<button type="button" class="bopt-card-toggle-btn" aria-label="Toggle section"><i class="fa-solid fa-chevron-up"></i></button>
								</div>
								<div class="bopt-card-body">
									<div class="bopt-field-grid">
										<?php
										mp_render_field_icon( 'assurance1_icon', __( 'Card 1 Icon', 'mobile-pasal' ), __( 'Choose icon for card 1.' ), 'shield' );
										mp_render_field_text( 'assurance1_title', __( 'Card 1 Title', 'mobile-pasal' ), __( 'Default: 100% NTA Approved' ) );
										mp_render_field_textarea( 'assurance1_desc', __( 'Card 1 Description', 'mobile-pasal' ), __( 'Default: Compliant with Nepal Telecommunications Authority IMEI registration for uninterrupted MDMS cellular service across Nepal.' ), 2 );
										?>
									</div>
								</div>
							</div>
						</div>

						<!-- Card 2 Content -->
						<div class="bopt-subnav-content" id="subtab-assure-2">
							<div class="bopt-card">
								<div class="bopt-card-header">
									<div class="bopt-card-header-left">
										<div class="bopt-card-header-icon"><i class="fa-solid fa-receipt"></i></div>
										<div>
											<h3 class="bopt-card-title"><?php esc_html_e( 'Card 2: Official VAT Bill', 'mobile-pasal' ); ?></h3>
											<p class="bopt-card-desc"><?php esc_html_e( 'Authorized commercial VAT serial bill enabling legitimate distributor warranty claims.', 'mobile-pasal' ); ?></p>
										</div>
									</div>
									<button type="button" class="bopt-card-toggle-btn" aria-label="Toggle section"><i class="fa-solid fa-chevron-up"></i></button>
								</div>
								<div class="bopt-card-body">
									<div class="bopt-field-grid">
										<?php
										mp_render_field_icon( 'assurance2_icon', __( 'Card 2 Icon', 'mobile-pasal' ), __( 'Choose icon for card 2.' ), 'receipt' );
										mp_render_field_text( 'assurance2_title', __( 'Card 2 Title', 'mobile-pasal' ), __( 'Default: Official VAT Bill' ) );
										mp_render_field_textarea( 'assurance2_desc', __( 'Card 2 Description', 'mobile-pasal' ), __( 'Default: Every single handset comes with an authorized commercial VAT serial bill enabling legitimate distributor warranty claims.' ), 2 );
										?>
									</div>
								</div>
							</div>
						</div>

						<!-- Card 3 Content -->
						<div class="bopt-subnav-content" id="subtab-assure-3">
							<div class="bopt-card">
								<div class="bopt-card-header">
									<div class="bopt-card-header-left">
										<div class="bopt-card-header-icon"><i class="fa-solid fa-arrow-right-arrow-left"></i></div>
										<div>
											<h3 class="bopt-card-title"><?php esc_html_e( 'Card 3: Free Data Transfer', 'mobile-pasal' ); ?></h3>
											<p class="bopt-card-desc"><?php esc_html_e( 'Safe migration of WhatsApp chats, photos, contacts, and mobile apps.', 'mobile-pasal' ); ?></p>
										</div>
									</div>
									<button type="button" class="bopt-card-toggle-btn" aria-label="Toggle section"><i class="fa-solid fa-chevron-up"></i></button>
								</div>
								<div class="bopt-card-body">
									<div class="bopt-field-grid">
										<?php
										mp_render_field_icon( 'assurance3_icon', __( 'Card 3 Icon', 'mobile-pasal' ), __( 'Choose icon for card 3.' ), 'arrows-rotate' );
										mp_render_field_text( 'assurance3_title', __( 'Card 3 Title', 'mobile-pasal' ), __( 'Default: Free Data Transfer' ) );
										mp_render_field_textarea( 'assurance3_desc', __( 'Card 3 Description', 'mobile-pasal' ), __( 'Default: We safely migrate your WhatsApp chats, photos, contacts, and mobile apps directly to your new phone before you leave.' ), 2 );
										?>
									</div>
								</div>
							</div>
						</div>

						<!-- Card 4 Content -->
						<div class="bopt-subnav-content" id="subtab-assure-4">
							<div class="bopt-card">
								<div class="bopt-card-header">
									<div class="bopt-card-header-left">
										<div class="bopt-card-header-icon"><i class="fa-solid fa-arrows-rotate"></i></div>
										<div>
											<h3 class="bopt-card-title"><?php esc_html_e( 'Card 4: Trade-In Counter', 'mobile-pasal' ); ?></h3>
											<p class="bopt-card-desc"><?php esc_html_e( 'Fair, transparent counter evaluation toward any new smartphone.', 'mobile-pasal' ); ?></p>
										</div>
									</div>
									<button type="button" class="bopt-card-toggle-btn" aria-label="Toggle section"><i class="fa-solid fa-chevron-up"></i></button>
								</div>
								<div class="bopt-card-body">
									<div class="bopt-field-grid">
										<?php
										mp_render_field_icon( 'assurance4_icon', __( 'Card 4 Icon', 'mobile-pasal' ), __( 'Choose icon for card 4.' ), 'store' );
										mp_render_field_text( 'assurance4_title', __( 'Card 4 Title', 'mobile-pasal' ), __( 'Default: Trade-In Counter' ) );
										mp_render_field_textarea( 'assurance4_desc', __( 'Card 4 Description', 'mobile-pasal' ), __( 'Default: Bring your old handset for fair, transparent counter evaluation toward the purchase of any new smartphone.' ), 2 );
										?>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- 4.1 Services Hero -->
					<div class="bopt-tab-pane <?php echo $active_tab === 'services_hero_tab' ? 'is-active' : ''; ?>" id="tab-pane-services_hero_tab">
						<div class="bopt-pane-header">
							<h2><?php esc_html_e( 'Apple Fix Lab & Services Page Hero Banner', 'mobile-pasal' ); ?></h2>
							<p><?php esc_html_e( 'Customize the services hero title, description, and direct repair CTA banner.', 'mobile-pasal' ); ?></p>
						</div>

						<div class="bopt-card">
							<div class="bopt-card-header">
								<div class="bopt-card-header-icon"><i class="fa-solid fa-screwdriver-wrench"></i></div>
								<div>
									<h3 class="bopt-card-title"><?php esc_html_e( 'Services Page Hero Details', 'mobile-pasal' ); ?></h3>
									<p class="bopt-card-desc"><?php esc_html_e( 'Displays at the top of /services page.', 'mobile-pasal' ); ?></p>
								</div>
							</div>
							<div class="bopt-card-body">
								<div class="bopt-field-grid">
									<?php
									mp_render_field_text( 'services_hero_badge', __( 'Services Hero Badge', 'mobile-pasal' ), __( 'Default: Gulariya\'s Premier Mobile Clinic' ) );
									mp_render_field_text( 'services_hero_title', __( 'Services Hero Title', 'mobile-pasal' ), __( 'Default: Apple Fix Lab & Precision Repairs' ) );
									mp_render_field_textarea( 'services_hero_desc', __( 'Services Hero Description', 'mobile-pasal' ), __( 'Default: Component-level micro-soldering, true-tone OLED display calibrations, 0-cycle battery replacements...' ), 3 );
									mp_render_field_text( 'services_cta_title', __( 'Repair Callout Banner Title', 'mobile-pasal' ), __( 'Default: Need an Urgent Screen, Battery, or Board Fix?' ) );
									mp_render_field_textarea( 'services_cta_desc', __( 'Repair Callout Banner Description', 'mobile-pasal' ), __( 'Default: Bring your phone to our counter at Ji. Pra. Ka. Chowk or send your device fault on WhatsApp...' ), 2 );
									?>
								</div>
							</div>
						</div>


					</div>

					<!-- 4.4 5 Customer Repair FAQs -->
					<div class="bopt-tab-pane <?php echo $active_tab === 'services_faqs_tab' ? 'is-active' : ''; ?>" id="tab-pane-services_faqs_tab">
						<div class="bopt-pane-header">
							<h2><?php esc_html_e( '5 Customer Repair FAQ Accordions', 'mobile-pasal' ); ?></h2>
							<p><?php esc_html_e( 'Manage the 5 most common customer questions regarding screen turnaround, NTA registration, and battery health.', 'mobile-pasal' ); ?></p>
						</div>

						<!-- Subnav Segmented Pills for 5 FAQs -->
						<div class="bopt-subnav-pills">
							<button type="button" class="bopt-subnav-pill is-active" data-subtab="subtab-faq-1">
								<i class="fa-solid fa-clock"></i>
								<span><?php esc_html_e( 'FAQ 1: Screen Turnaround', 'mobile-pasal' ); ?></span>
							</button>
							<button type="button" class="bopt-subnav-pill" data-subtab="subtab-faq-2">
								<i class="fa-solid fa-shield-check"></i>
								<span><?php esc_html_e( 'FAQ 2: NTA MDMS', 'mobile-pasal' ); ?></span>
							</button>
							<button type="button" class="bopt-subnav-pill" data-subtab="subtab-faq-3">
								<i class="fa-solid fa-battery-full"></i>
								<span><?php esc_html_e( 'FAQ 3: iPhone Battery', 'mobile-pasal' ); ?></span>
							</button>
							<button type="button" class="bopt-subnav-pill" data-subtab="subtab-faq-4">
								<i class="fa-solid fa-certificate"></i>
								<span><?php esc_html_e( 'FAQ 4: 90-Day Warranty', 'mobile-pasal' ); ?></span>
							</button>
							<button type="button" class="bopt-subnav-pill" data-subtab="subtab-faq-5">
								<i class="fa-solid fa-arrows-rotate"></i>
								<span><?php esc_html_e( 'FAQ 5: Trade-In Counter', 'mobile-pasal' ); ?></span>
							</button>
						</div>

						<!-- FAQ 1 -->
						<div class="bopt-subnav-content is-active" id="subtab-faq-1">
							<div class="bopt-card">
								<div class="bopt-card-header">
									<div class="bopt-card-header-left">
										<div class="bopt-card-header-icon"><i class="fa-solid fa-circle-question"></i></div>
										<div>
											<h3 class="bopt-card-title"><?php esc_html_e( 'FAQ 1: Screen Replacement Turnaround Time', 'mobile-pasal' ); ?></h3>
											<p class="bopt-card-desc"><?php esc_html_e( 'Explains 35–45 minute screen replacement process and True-Tone data transfer.', 'mobile-pasal' ); ?></p>
										</div>
									</div>
									<button type="button" class="bopt-card-toggle-btn" aria-label="Toggle card"><i class="fa-solid fa-chevron-up"></i></button>
								</div>
								<div class="bopt-card-body">
									<div class="bopt-field-grid">
										<?php
										mp_render_field_text( 'faq1_q', __( 'FAQ 1 Question', 'mobile-pasal' ), __( 'Default: How long does an iPhone screen replacement take?' ) );
										mp_render_field_textarea( 'faq1_a', __( 'FAQ 1 Answer', 'mobile-pasal' ), __( 'Detailed answer...' ), 3 );
										?>
									</div>
								</div>
							</div>
						</div>

						<!-- FAQ 2 -->
						<div class="bopt-subnav-content" id="subtab-faq-2">
							<div class="bopt-card">
								<div class="bopt-card-header">
									<div class="bopt-card-header-left">
										<div class="bopt-card-header-icon"><i class="fa-solid fa-circle-question"></i></div>
										<div>
											<h3 class="bopt-card-title"><?php esc_html_e( 'FAQ 2: NTA MDMS Registration Guarantee', 'mobile-pasal' ); ?></h3>
											<p class="bopt-card-desc"><?php esc_html_e( 'Explains 100% legal IMEI registration and genuine VAT bills.', 'mobile-pasal' ); ?></p>
										</div>
									</div>
									<button type="button" class="bopt-card-toggle-btn" aria-label="Toggle card"><i class="fa-solid fa-chevron-up"></i></button>
								</div>
								<div class="bopt-card-body">
									<div class="bopt-field-grid">
										<?php
										mp_render_field_text( 'faq2_q', __( 'FAQ 2 Question', 'mobile-pasal' ), __( 'Default: Are your new handsets registered with NTA MDMS?' ) );
										mp_render_field_textarea( 'faq2_a', __( 'FAQ 2 Answer', 'mobile-pasal' ), __( 'Detailed answer...' ), 3 );
										?>
									</div>
								</div>
							</div>
						</div>

						<!-- FAQ 3 -->
						<div class="bopt-subnav-content" id="subtab-faq-3">
							<div class="bopt-card">
								<div class="bopt-card-header">
									<div class="bopt-card-header-left">
										<div class="bopt-card-header-icon"><i class="fa-solid fa-circle-question"></i></div>
										<div>
											<h3 class="bopt-card-title"><?php esc_html_e( 'FAQ 3: iPhone Battery Health & BMS Transplants', 'mobile-pasal' ); ?></h3>
											<p class="bopt-card-desc"><?php esc_html_e( 'Explains 100% maximum capacity calibration without unknown part warnings.', 'mobile-pasal' ); ?></p>
										</div>
									</div>
									<button type="button" class="bopt-card-toggle-btn" aria-label="Toggle card"><i class="fa-solid fa-chevron-up"></i></button>
								</div>
								<div class="bopt-card-body">
									<div class="bopt-field-grid">
										<?php
										mp_render_field_text( 'faq3_q', __( 'FAQ 3 Question', 'mobile-pasal' ), __( 'Default: Do you replace iPhone batteries without the unknown part warning?' ) );
										mp_render_field_textarea( 'faq3_a', __( 'FAQ 3 Answer', 'mobile-pasal' ), __( 'Detailed answer...' ), 3 );
										?>
									</div>
								</div>
							</div>
						</div>

						<!-- FAQ 4 -->
						<div class="bopt-subnav-content" id="subtab-faq-4">
							<div class="bopt-card">
								<div class="bopt-card-header">
									<div class="bopt-card-header-left">
										<div class="bopt-card-header-icon"><i class="fa-solid fa-circle-question"></i></div>
										<div>
											<h3 class="bopt-card-title"><?php esc_html_e( 'FAQ 4: 90-Day Repair Warranty Terms', 'mobile-pasal' ); ?></h3>
											<p class="bopt-card-desc"><?php esc_html_e( 'Explains coverage for touch sensitivity, display flicker, and battery defects.', 'mobile-pasal' ); ?></p>
										</div>
									</div>
									<button type="button" class="bopt-card-toggle-btn" aria-label="Toggle card"><i class="fa-solid fa-chevron-up"></i></button>
								</div>
								<div class="bopt-card-body">
									<div class="bopt-field-grid">
										<?php
										mp_render_field_text( 'faq4_q', __( 'FAQ 4 Question', 'mobile-pasal' ), __( 'Default: What is covered under the 90-day repair warranty?' ) );
										mp_render_field_textarea( 'faq4_a', __( 'FAQ 4 Answer', 'mobile-pasal' ), __( 'Detailed answer...' ), 3 );
										?>
									</div>
								</div>
							</div>
						</div>

						<!-- FAQ 5 -->
						<div class="bopt-subnav-content" id="subtab-faq-5">
							<div class="bopt-card">
								<div class="bopt-card-header">
									<div class="bopt-card-header-left">
										<div class="bopt-card-header-icon"><i class="fa-solid fa-circle-question"></i></div>
										<div>
											<h3 class="bopt-card-title"><?php esc_html_e( 'FAQ 5: Handset Trade-In Counter Process', 'mobile-pasal' ); ?></h3>
											<p class="bopt-card-desc"><?php esc_html_e( 'Explains fair counter valuation toward an iPhone 16 Pro or Samsung Galaxy.', 'mobile-pasal' ); ?></p>
										</div>
									</div>
									<button type="button" class="bopt-card-toggle-btn" aria-label="Toggle card"><i class="fa-solid fa-chevron-up"></i></button>
								</div>
								<div class="bopt-card-body">
									<div class="bopt-field-grid">
										<?php
										mp_render_field_text( 'faq5_q', __( 'FAQ 5 Question', 'mobile-pasal' ), __( 'Default: Can I trade in my old phone for an iPhone 16 Pro?' ) );
										mp_render_field_textarea( 'faq5_a', __( 'FAQ 5 Answer', 'mobile-pasal' ), __( 'Detailed answer...' ), 3 );
										?>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- ===================================================================
					     GROUP 5: HERITAGE & ABOUT US
					     =================================================================== -->

					<!-- 5.1 About Story -->
					<div class="bopt-tab-pane <?php echo $active_tab === 'about_story_tab' ? 'is-active' : ''; ?>" id="tab-pane-about_story_tab">
						<div class="bopt-pane-header">
							<h2><?php esc_html_e( 'About Us Hero & Heritage Story', 'mobile-pasal' ); ?></h2>
							<p><?php esc_html_e( 'Manage the story of Ali Mobile Center from 2018 to Gulariya\'s largest showroom.', 'mobile-pasal' ); ?></p>
						</div>

						<div class="bopt-card">
							<div class="bopt-card-header">
								<div class="bopt-card-header-icon"><i class="fa-solid fa-book-open"></i></div>
								<div>
									<h3 class="bopt-card-title"><?php esc_html_e( 'About Page Hero & Story Paragraphs', 'mobile-pasal' ); ?></h3>
									<p class="bopt-card-desc"><?php esc_html_e( 'Narrative content displayed on /about.', 'mobile-pasal' ); ?></p>
								</div>
							</div>
							<div class="bopt-card-body">
								<div class="bopt-field-grid">
									<?php
									mp_render_field_text( 'about_hero_badge', __( 'About Hero Badge', 'mobile-pasal' ), __( 'Default: Serving Bardiya Since 2018' ) );
									mp_render_field_text( 'about_hero_title', __( 'About Hero Title', 'mobile-pasal' ), __( 'Default: The Story Behind Ali Mobile Center & Apple Fix' ) );
									mp_render_field_textarea( 'about_hero_desc', __( 'About Hero Subtitle', 'mobile-pasal' ), __( 'Default: From a modest handset desk to Gulariya\'s premier smartphone showroom...' ), 3 );
									mp_render_field_text( 'about_story_kicker', __( 'Story Section Kicker', 'mobile-pasal' ), __( 'Default: Our Heritage' ) );
									mp_render_field_text( 'about_story_head', __( 'Story Main Heading', 'mobile-pasal' ), __( 'Default: Built on Genuine Handsets & Microscope Precision' ) );
									mp_render_field_textarea( 'about_story_p1', __( 'Story Paragraph 1', 'mobile-pasal' ), __( 'Foundational history in Gulariya...' ), 4 );
									mp_render_field_textarea( 'about_story_p2', __( 'Story Paragraph 2', 'mobile-pasal' ), __( 'Investment in stereomicroscopes and cleanroom tools...' ), 4 );
									mp_render_field_textarea( 'about_founder_quote', __( 'Founder Philosophy Quote', 'mobile-pasal' ), __( 'Personal statement from founder...' ), 3 );
									mp_render_field_image( 'about_story_image', __( 'Story Lab Photo', 'mobile-pasal' ), __( 'Photo of technician workbench or showroom' ) );
									?>
								</div>
							</div>
						</div>


					</div>

					<!-- 5.2 4 Milestone Stats -->
					<div class="bopt-tab-pane <?php echo $active_tab === 'about_stats_tab' ? 'is-active' : ''; ?>" id="tab-pane-about_stats_tab">
						<div class="bopt-pane-header">
							<h2><?php esc_html_e( '4 Milestone Stat Counters', 'mobile-pasal' ); ?></h2>
							<p><?php esc_html_e( 'Customize the 4 impressive business metrics displayed across the About and Home pages.', 'mobile-pasal' ); ?></p>
						</div>

						<div class="bopt-card">
							<div class="bopt-card-header">
								<div class="bopt-card-header-left">
									<div class="bopt-card-header-icon"><i class="fa-solid fa-chart-line"></i></div>
									<div>
										<h3 class="bopt-card-title"><?php esc_html_e( 'Milestone Numbers & Trust Labels', 'mobile-pasal' ); ?></h3>
										<p class="bopt-card-desc"><?php esc_html_e( 'Live counter cards on /about and /home.', 'mobile-pasal' ); ?></p>
									</div>
								</div>
								<button type="button" class="bopt-card-toggle-btn" aria-label="Toggle card"><i class="fa-solid fa-chevron-up"></i></button>
							</div>
							<div class="bopt-card-body">
								<div class="bopt-field-grid">
									<div class="bopt-field-col-2">
										<?php
										mp_render_field_text( 'about_stat1_num', __( 'Stat 1 Value', 'mobile-pasal' ), __( 'Default: 8+ Years' ) );
										mp_render_field_text( 'about_stat1_label', __( 'Stat 1 Label', 'mobile-pasal' ), __( 'Default: Serving Gulariya & Bardiya' ) );
										?>
									</div>
									<div class="bopt-field-col-2">
										<?php
										mp_render_field_text( 'about_stat2_num', __( 'Stat 2 Value', 'mobile-pasal' ), __( 'Default: 12,000+' ) );
										mp_render_field_text( 'about_stat2_label', __( 'Stat 2 Label', 'mobile-pasal' ), __( 'Default: Satisfied Customers' ) );
										?>
									</div>
									<div class="bopt-field-col-2">
										<?php
										mp_render_field_text( 'about_stat3_num', __( 'Stat 3 Value', 'mobile-pasal' ), __( 'Default: 100%' ) );
										mp_render_field_text( 'about_stat3_label', __( 'Stat 3 Label', 'mobile-pasal' ), __( 'Default: NTA Verified IMEI Handsets' ) );
										?>
									</div>
									<div class="bopt-field-col-2">
										<?php
										mp_render_field_text( 'about_stat4_num', __( 'Stat 4 Value', 'mobile-pasal' ), __( 'Default: 90 Days' ) );
										mp_render_field_text( 'about_stat4_label', __( 'Stat 4 Label', 'mobile-pasal' ), __( 'Default: Repair Warranty Support' ) );
										?>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- 5.3 Cleanroom Standards -->
					<div class="bopt-tab-pane <?php echo $active_tab === 'about_cleanroom_tab' ? 'is-active' : ''; ?>" id="tab-pane-about_cleanroom_tab">
						<div class="bopt-pane-header">
							<h2><?php esc_html_e( 'Cleanroom Tooling & Technician Standards', 'mobile-pasal' ); ?></h2>
							<p><?php esc_html_e( 'Highlight specialized hardware: stereomicroscopes, programmable hot air rework, and ultrasonic tanks.', 'mobile-pasal' ); ?></p>
						</div>

						<div class="bopt-card">
							<div class="bopt-card-header">
								<div class="bopt-card-header-icon"><i class="fa-solid fa-wrench"></i></div>
								<div>
									<h3 class="bopt-card-title"><?php esc_html_e( 'Precision Hardware Details', 'mobile-pasal' ); ?></h3>
									<p class="bopt-card-desc"><?php esc_html_e( 'Assures customers of top-tier laboratory grade repairs.', 'mobile-pasal' ); ?></p>
								</div>
							</div>
							<div class="bopt-card-body">
								<div class="bopt-field-grid">
									<?php
									mp_render_field_text( 'about_tooling_kicker', __( 'Section Kicker', 'mobile-pasal' ), __( 'Default: Cleanroom Tooling' ) );
									mp_render_field_text( 'about_tooling_head', __( 'Cleanroom Tooling Heading', 'mobile-pasal' ), __( 'Default: Professional Hardware Equipment on Our Bench' ) );
									mp_render_field_textarea( 'about_tooling_desc', __( 'Cleanroom Tooling Description', 'mobile-pasal' ), __( 'Details regarding stereo zoom microscope, anti-static thermal stations, and genuine original components.' ), 3 );
									?>
								</div>
							</div>
						</div>

						<div class="bopt-card">
							<div class="bopt-card-header">
								<div class="bopt-card-header-icon"><i class="fa-solid fa-microscope"></i></div>
								<div>
									<h3 class="bopt-card-title"><?php esc_html_e( '3 Cleanroom Diagnostic & Repair Tools', 'mobile-pasal' ); ?></h3>
									<p class="bopt-card-desc"><?php esc_html_e( 'Cards displayed on /about detailing workbench hardware.', 'mobile-pasal' ); ?></p>
								</div>
							</div>
							<div class="bopt-card-body">
								<div class="bopt-field-grid">
									<div class="bopt-field-col-2">
										<?php
										mp_render_field_text( 'about_tool1_title', __( 'Tool 1 Title', 'mobile-pasal' ), __( 'Default: Stereo Optical Microscope' ) );
										mp_render_field_textarea( 'about_tool1_desc', __( 'Tool 1 Description', 'mobile-pasal' ), __( 'Microscope zoom and board inspection capabilities' ), 2 );
										?>
									</div>
									<div class="bopt-field-col-2">
										<?php
										mp_render_field_text( 'about_tool2_title', __( 'Tool 2 Title', 'mobile-pasal' ), __( 'Default: Digital Ultrasonic Sonicator' ) );
										mp_render_field_textarea( 'about_tool2_desc', __( 'Tool 2 Description', 'mobile-pasal' ), __( 'Ultrasonic bath for liquid damage cleaning' ), 2 );
										?>
									</div>
									<div class="bopt-field-col-2">
										<?php
										mp_render_field_text( 'about_tool3_title', __( 'Tool 3 Title', 'mobile-pasal' ), __( 'Default: Programmable Rework & Micro-Pencil' ) );
										mp_render_field_textarea( 'about_tool3_desc', __( 'Tool 3 Description', 'mobile-pasal' ), __( 'Soldering station and heat recovery' ), 2 );
										?>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- 5.4 4 Core Commitments -->
					<div class="bopt-tab-pane <?php echo $active_tab === 'about_commitments_tab' ? 'is-active' : ''; ?>" id="tab-pane-about_commitments_tab">
						<div class="bopt-pane-header">
							<h2><?php esc_html_e( '4 Core Counter Commitments & Customer Guarantees', 'mobile-pasal' ); ?></h2>
							<p><?php esc_html_e( 'Manage the 4 trust guarantees displayed on the About page (Privacy, Zero Hidden Fees, Genuine OEM, Battery Recycling).', 'mobile-pasal' ); ?></p>
						</div>

						<div class="bopt-card">
							<div class="bopt-card-header">
								<div class="bopt-card-header-icon"><i class="fa-solid fa-handshake-angle"></i></div>
								<div>
									<h3 class="bopt-card-title"><?php esc_html_e( 'Commitments Section Header', 'mobile-pasal' ); ?></h3>
									<p class="bopt-card-desc"><?php esc_html_e( 'Headers for the 4 core guarantees section.', 'mobile-pasal' ); ?></p>
								</div>
							</div>
							<div class="bopt-card-body">
								<div class="bopt-field-grid">
									<?php
									mp_render_field_text( 'about_commitments_kicker', __( 'Section Kicker', 'mobile-pasal' ), __( 'Default: Integrity First' ) );
									mp_render_field_text( 'about_commitments_head', __( 'Main Heading', 'mobile-pasal' ), __( 'Default: Our 4 Core Counter Commitments' ) );
									mp_render_field_textarea( 'about_commitments_desc', __( 'Subtitle / Description', 'mobile-pasal' ), __( 'Default: How we do business every day at Ji. Pra. Ka. Chowk.' ), 2 );
									?>
								</div>
							</div>
						</div>

						<div class="bopt-card">
							<div class="bopt-card-header">
								<div class="bopt-card-header-icon"><i class="fa-solid fa-shield-heart"></i></div>
								<div>
									<h3 class="bopt-card-title"><?php esc_html_e( 'The 4 Commitment Cards', 'mobile-pasal' ); ?></h3>
									<p class="bopt-card-desc"><?php esc_html_e( 'Detailed guarantees that build trust with customers.', 'mobile-pasal' ); ?></p>
								</div>
							</div>
							<div class="bopt-card-body">
								<div class="bopt-field-grid">
									<div class="bopt-field-col-2">
										<?php
										mp_render_field_text( 'about_commit1_title', __( 'Commitment 1 Title', 'mobile-pasal' ), __( 'Default: 100% Data Privacy' ) );
										mp_render_field_textarea( 'about_commit1_desc', __( 'Commitment 1 Description', 'mobile-pasal' ), __( 'Customer data and private photo protection policy' ), 3 );
										?>
									</div>
									<div class="bopt-field-col-2">
										<?php
										mp_render_field_text( 'about_commit2_title', __( 'Commitment 2 Title', 'mobile-pasal' ), __( 'Default: Zero Hidden Extra Fees' ) );
										mp_render_field_textarea( 'about_commit2_desc', __( 'Commitment 2 Description', 'mobile-pasal' ), __( 'Transparent pricing and phone call permission policy' ), 3 );
										?>
									</div>
									<div class="bopt-field-col-2">
										<?php
										mp_render_field_text( 'about_commit3_title', __( 'Commitment 3 Title', 'mobile-pasal' ), __( 'Default: No Counterfeits Sold as OEM' ) );
										mp_render_field_textarea( 'about_commit3_desc', __( 'Commitment 3 Description', 'mobile-pasal' ), __( 'Clear distinction between OEM and copy parts' ), 3 );
										?>
									</div>
									<div class="bopt-field-col-2">
										<?php
										mp_render_field_text( 'about_commit4_title', __( 'Commitment 4 Title', 'mobile-pasal' ), __( 'Default: Safe Battery Recycling' ) );
										mp_render_field_textarea( 'about_commit4_desc', __( 'Commitment 4 Description', 'mobile-pasal' ), __( 'Ecological and fire safety disposal of swollen lithium batteries' ), 3 );
										?>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- ===================================================================
					     GROUP 6: CONTACT & LOCATION DESK
					     =================================================================== -->

					<!-- 6.1 Contact Coordinates -->
					<div class="bopt-tab-pane <?php echo $active_tab === 'contact_coords_tab' ? 'is-active' : ''; ?>" id="tab-pane-contact_coords_tab">
						<div class="bopt-pane-header">
							<h2><?php esc_html_e( 'Contact Coordinates, Phone & Operating Hours', 'mobile-pasal' ); ?></h2>
							<p><?php esc_html_e( 'Configure primary store phone numbers, WhatsApp, physical counter location, and schedule.', 'mobile-pasal' ); ?></p>
						</div>

						<div class="bopt-card">
							<div class="bopt-card-header">
								<div class="bopt-card-header-icon"><i class="fa-solid fa-location-dot"></i></div>
								<div>
									<h3 class="bopt-card-title"><?php esc_html_e( 'Physical Counter Location & Schedule', 'mobile-pasal' ); ?></h3>
									<p class="bopt-card-desc"><?php esc_html_e( 'Primary contact coordinates across all pages.', 'mobile-pasal' ); ?></p>
								</div>
							</div>
							<div class="bopt-card-body">
								<div class="bopt-field-grid">
									<?php
									mp_render_field_text( 'contact_hero_badge', __( 'Contact Hero Badge', 'mobile-pasal' ), __( 'Default: Gulariya Counter & Lab' ) );
									mp_render_field_text( 'contact_hero_title', __( 'Contact Hero Title', 'mobile-pasal' ), __( 'Default: Visit Our Counter or Send a Direct Inquiry.' ) );
									mp_render_field_textarea( 'contact_hero_desc', __( 'Contact Hero Description', 'mobile-pasal' ), __( 'Default: Whether you are looking to purchase a new flagship handset, need an urgent screen replacement...' ), 3 );
									mp_render_field_text( 'counter_phone', __( 'Counter Voice Phone', 'mobile-pasal' ), __( 'Formatted: +977 9804530786' ) );
									mp_render_field_text( 'whatsapp_number', __( 'WhatsApp Number (Digits Only)', 'mobile-pasal' ), __( 'International format without plus: 9779804530786' ) );
									mp_render_field_text( 'counter_email', __( 'Support Email Address', 'mobile-pasal' ), __( 'e.g. alimobilecenter@gmail.com' ) );
									mp_render_field_textarea( 'counter_address', __( 'Full Counter Physical Address', 'mobile-pasal' ), __( 'Default: Gulariya-06, Ji. Pra. Ka. Chowk, Bardiya, Nepal' ), 2 );
									mp_render_field_text( 'counter_hours', __( 'Official Counter Hours', 'mobile-pasal' ), __( 'Default: Sun–Fri: 9:00 AM – 8:00 PM | Sat: Open' ) );
									?>
								</div>
							</div>
						</div>



						<div class="bopt-card">
							<div class="bopt-card-header">
								<div class="bopt-card-header-icon"><i class="fa-solid fa-file-signature"></i></div>
								<div>
									<h3 class="bopt-card-title"><?php esc_html_e( 'Consultation Form & Counter Desk Card Headings', 'mobile-pasal' ); ?></h3>
									<p class="bopt-card-desc"><?php esc_html_e( 'Titles and descriptions for the inquiry docket form and contact card on /contact.', 'mobile-pasal' ); ?></p>
								</div>
							</div>
							<div class="bopt-card-body">
								<div class="bopt-field-grid">
									<?php
									mp_render_field_text( 'contact_form_title', __( 'Form Card Title', 'mobile-pasal' ), __( 'Default: Direct Consultation & Repair Inquiry' ) );
									mp_render_field_textarea( 'contact_form_subtitle', __( 'Form Card Description', 'mobile-pasal' ), __( 'Fill out your device and symptom details below...' ), 2 );
									mp_render_field_text( 'contact_desk_title', __( 'Showroom Info Card Title', 'mobile-pasal' ), __( 'Default: Showroom & Lab Counter' ) );
									mp_render_field_textarea( 'contact_desk_desc', __( 'Showroom Info Card Description', 'mobile-pasal' ), __( 'Walk-in customer counter with on-site technician workbench...' ), 2 );
									?>
								</div>
							</div>
						</div>
					</div>

					<!-- 6.2 Helplines & Map -->
					<div class="bopt-tab-pane <?php echo $active_tab === 'contact_map_tab' ? 'is-active' : ''; ?>" id="tab-pane-contact_map_tab">
						<div class="bopt-pane-header">
							<h2><?php esc_html_e( 'Direct Helplines & Google Maps Embed', 'mobile-pasal' ); ?></h2>
							<p><?php esc_html_e( 'Configure the 4 helpline quick cards and the interactive Google Maps iframe.', 'mobile-pasal' ); ?></p>
						</div>

						<div class="bopt-card">
							<div class="bopt-card-header">
								<div class="bopt-card-header-icon"><i class="fa-solid fa-map-location-dot"></i></div>
								<div>
									<h3 class="bopt-card-title"><?php esc_html_e( 'Google Maps Integration', 'mobile-pasal' ); ?></h3>
									<p class="bopt-card-desc"><?php esc_html_e( 'Embed interactive map and direct navigation link.', 'mobile-pasal' ); ?></p>
								</div>
							</div>
							<div class="bopt-card-body">
								<div class="bopt-field-grid">
									<?php
									mp_render_field_text( 'counter_map_url', __( 'Google Maps Direct Link URL', 'mobile-pasal' ), __( 'Opens Google Maps navigation directly on phone.' ) );
									mp_render_field_textarea( 'counter_map_embed', __( 'Google Maps Iframe Embed Code', 'mobile-pasal' ), __( 'Paste the <iframe> embed code from Google Maps.' ), 4 );
									?>
								</div>
							</div>
						</div>


					</div>

										<!-- 6.3 Arrival & Transit Guidance -->
					<div class="bopt-tab-pane <?php echo $active_tab === 'contact_landmarks_tab' ? 'is-active' : ''; ?>" id="tab-pane-contact_landmarks_tab">
						<div class="bopt-pane-header">
							<h2><?php esc_html_e( 'Arrival, Transit & Parking Guidance', 'mobile-pasal' ); ?></h2>
							<p><?php esc_html_e( 'Manage the 3 landmark cards and transit directions for visiting the store counter at Ji. Pra. Ka. Chowk.', 'mobile-pasal' ); ?></p>
						</div>

						<div class="bopt-card">
							<div class="bopt-card-header">
								<div class="bopt-card-header-icon"><i class="fa-solid fa-signs-post"></i></div>
								<div>
									<h3 class="bopt-card-title"><?php esc_html_e( 'Arrival Section Header', 'mobile-pasal' ); ?></h3>
									<p class="bopt-card-desc"><?php esc_html_e( 'Header text above the 3 landmark cards on /contact.', 'mobile-pasal' ); ?></p>
								</div>
							</div>
							<div class="bopt-card-body">
								<div class="bopt-field-grid">
									<?php
									mp_render_field_text( 'contact_landmarks_kicker', __( 'Section Kicker', 'mobile-pasal' ), __( 'Default: Arrival & Transit' ) );
									mp_render_field_text( 'contact_landmarks_title', __( 'Main Heading', 'mobile-pasal' ), __( 'Default: Finding Our Store Counter' ) );
									mp_render_field_textarea( 'contact_landmarks_desc', __( 'Subtitle / Description', 'mobile-pasal' ), __( 'Default: Key landmarks and convenient parking tips for your visit to Ji. Pra. Ka. Chowk.' ), 2 );
									?>
								</div>
							</div>
						</div>

						<div class="bopt-card">
							<div class="bopt-card-header">
								<div class="bopt-card-header-icon"><i class="fa-solid fa-map-pin"></i></div>
								<div>
									<h3 class="bopt-card-title"><?php esc_html_e( '3 Arrival & Landmark Cards', 'mobile-pasal' ); ?></h3>
									<p class="bopt-card-desc"><?php esc_html_e( 'Clear instructions for walk-in customers and drivers.', 'mobile-pasal' ); ?></p>
								</div>
							</div>
							<div class="bopt-card-body">
								<div class="bopt-field-grid">
									<div class="bopt-field-col-2">
										<?php
										mp_render_field_text( 'contact_lm1_title', __( 'Landmark 1 Title', 'mobile-pasal' ), __( 'Default: Prominent Landmark' ) );
										mp_render_field_textarea( 'contact_lm1_desc', __( 'Landmark 1 Description', 'mobile-pasal' ), __( 'District Admin Office junction details' ), 3 );
										?>
									</div>
									<div class="bopt-field-col-2">
										<?php
										mp_render_field_text( 'contact_lm2_title', __( 'Landmark 2 Title', 'mobile-pasal' ), __( 'Default: Easy Front Parking' ) );
										mp_render_field_textarea( 'contact_lm2_desc', __( 'Landmark 2 Description', 'mobile-pasal' ), __( 'Front bike/scooter and car parking information' ), 3 );
										?>
									</div>
									<div class="bopt-field-col-2">
										<?php
										mp_render_field_text( 'contact_lm3_title', __( 'Landmark 3 Title', 'mobile-pasal' ), __( 'Default: 2 Mins from Bus Stand' ) );
										mp_render_field_textarea( 'contact_lm3_desc', __( 'Landmark 3 Description', 'mobile-pasal' ), __( 'Distance from Gulariya bus stand and auto routes' ), 3 );
										?>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- 404 Error Page Tab -->
					<div class="bopt-tab-pane <?php echo $active_tab === 'error_404_tab' ? 'is-active' : ''; ?>" id="tab-pane-error_404_tab">
						<div class="bopt-pane-header">
							<h2><?php esc_html_e( '404 Device Not Found Page Customizer', 'mobile-pasal' ); ?></h2>
							<p><?php esc_html_e( 'Manage the headline, helpful guidance, and action buttons shown when a visitor lands on an invalid or expired URL.', 'mobile-pasal' ); ?></p>
						</div>

						<div class="bopt-card">
							<div class="bopt-card-header">
								<div class="bopt-card-header-icon"><i class="fa-solid fa-triangle-exclamation"></i></div>
								<div>
									<h3 class="bopt-card-title"><?php esc_html_e( '404 Error Messages & Number', 'mobile-pasal' ); ?></h3>
									<p class="bopt-card-desc"><?php esc_html_e( 'Custom branding for page not found errors.', 'mobile-pasal' ); ?></p>
								</div>
							</div>
							<div class="bopt-card-body">
								<div class="bopt-field-grid">
									<?php
									mp_render_field_text( 'error404_code', __( 'Error Big Number / Code', 'mobile-pasal' ), __( 'Default: 404' ) );
									mp_render_field_text( 'error404_title', __( 'Main Error Headline', 'mobile-pasal' ), __( 'Default: Device Page Not Found' ) );
									mp_render_field_textarea( 'error404_desc', __( 'Helpful Visitor Guidance', 'mobile-pasal' ), __( 'Default: The handset, repair service, or store page you are looking for may have moved, been renamed, or is temporarily out of stock.' ), 3 );
									?>
								</div>
							</div>
						</div>

						<div class="bopt-card">
							<div class="bopt-card-header">
								<div class="bopt-card-header-icon"><i class="fa-solid fa-arrow-pointer"></i></div>
								<div>
									<h3 class="bopt-card-title"><?php esc_html_e( '404 Recovery Action Buttons', 'mobile-pasal' ); ?></h3>
									<p class="bopt-card-desc"><?php esc_html_e( 'Button text labels that direct lost customers back into buying or chatting.', 'mobile-pasal' ); ?></p>
								</div>
							</div>
							<div class="bopt-card-body">
								<div class="bopt-field-grid">
									<?php
									mp_render_field_text( 'error404_btn1_text', __( 'Primary Button (Home)', 'mobile-pasal' ), __( 'Default: Back to Home' ) );
									mp_render_field_text( 'error404_btn2_text', __( 'Secondary Button (Catalog)', 'mobile-pasal' ), __( 'Default: Browse Handsets' ) );
									mp_render_field_text( 'error404_btn3_text', __( 'WhatsApp Help Button', 'mobile-pasal' ), __( 'Default: Ask Counter Help' ) );
									?>
								</div>
							</div>
						</div>
					</div>

					<!-- Search Page Tab -->
					<div class="bopt-tab-pane <?php echo $active_tab === 'search_page_tab' ? 'is-active' : ''; ?>" id="tab-pane-search_page_tab">
						<div class="bopt-pane-header">
							<h2><?php esc_html_e( 'Search Results & Zero-Results Fallbacks', 'mobile-pasal' ); ?></h2>
							<p><?php esc_html_e( 'Manage search banner titles and the empty-results recovery message when a search query finds no models.', 'mobile-pasal' ); ?></p>
						</div>

						<div class="bopt-card">
							<div class="bopt-card-header">
								<div class="bopt-card-header-icon"><i class="fa-solid fa-magnifying-glass"></i></div>
								<div>
									<h3 class="bopt-card-title"><?php esc_html_e( 'Search Results Banner & Headings', 'mobile-pasal' ); ?></h3>
									<p class="bopt-card-desc"><?php esc_html_e( 'Format of the headline on search results.', 'mobile-pasal' ); ?></p>
								</div>
							</div>
							<div class="bopt-card-body">
								<div class="bopt-field-grid">
									<?php
									mp_render_field_text( 'search_results_title', __( 'Search Results Heading Format', 'mobile-pasal' ), __( 'Use %s for the query. Default: Search: %s' ) );
									?>
								</div>
							</div>
						</div>

						<div class="bopt-card">
							<div class="bopt-card-header">
								<div class="bopt-card-header-icon"><i class="fa-solid fa-box-open"></i></div>
								<div>
									<h3 class="bopt-card-title"><?php esc_html_e( 'Empty / Zero Matches Recovery Box', 'mobile-pasal' ); ?></h3>
									<p class="bopt-card-desc"><?php esc_html_e( 'Displayed when an inquiry returns 0 results to guide visitors to WhatsApp.', 'mobile-pasal' ); ?></p>
								</div>
							</div>
							<div class="bopt-card-body">
								<div class="bopt-field-grid">
									<?php
									mp_render_field_text( 'search_empty_title', __( 'No Matches Title', 'mobile-pasal' ), __( 'Default: No Matches Found' ) );
									mp_render_field_textarea( 'search_empty_desc', __( 'No Matches Description', 'mobile-pasal' ), __( 'Default: We couldn\'t find anything matching your search term. Feel free to browse our full showroom catalog or reach out on WhatsApp.' ), 3 );
									mp_render_field_text( 'search_btn_catalog', __( 'Showroom Catalog Button Label', 'mobile-pasal' ), __( 'Default: Showroom Catalog' ) );
									mp_render_field_text( 'search_btn_whatsapp', __( 'WhatsApp Inquiry Button Label', 'mobile-pasal' ), __( 'Default: Ask on WhatsApp' ) );
									?>
								</div>
							</div>
						</div>
					</div>

					<!-- ===================================================================
					     GROUP: SEO, GEO & AI SEARCH (AEO) ENGINE
					     =================================================================== -->

					<!-- SEO & Meta Ranking Tab -->
					<div class="bopt-tab-pane <?php echo $active_tab === 'seo_meta_tab' ? 'is-active' : ''; ?>" id="tab-pane-seo_meta_tab">
						<div class="bopt-pane-header">
							<h2><?php esc_html_e( 'SEO & Meta Ranking Engine', 'mobile-pasal' ); ?></h2>
							<p><?php esc_html_e( 'Configure high-performance title tags, meta descriptions, Open Graph preview cards for Facebook & WhatsApp, and Google search verification tokens.', 'mobile-pasal' ); ?></p>
						</div>



						<!-- Meta Title & Descriptions Card -->
						<div class="bopt-card">
							<div class="bopt-card-header">
								<div class="bopt-card-header-left">
									<div class="bopt-card-header-icon"><i class="fa-solid fa-magnifying-glass"></i></div>
									<div>
										<h3 class="bopt-card-title"><?php esc_html_e( 'Google Search Snippet Preview & Meta', 'mobile-pasal' ); ?></h3>
										<p class="bopt-card-desc"><?php esc_html_e( 'Sets the exact title and snippet displayed on Google search results.', 'mobile-pasal' ); ?></p>
									</div>
								</div>
								<button type="button" class="bopt-card-toggle-btn" aria-label="Toggle card"><i class="fa-solid fa-chevron-up"></i></button>
							</div>
							<div class="bopt-card-body">
								<div class="bopt-field-grid">
									<?php
									mp_render_field_text( 'seo_meta_title', __( 'SEO Meta Title (Browser & Google Tab)', 'mobile-pasal' ), __( 'Recommended: 50–60 characters. Default: Ali Mobile Center & Apple Fix | Official NTA Handsets & Precision Phone Repair Gulariya, Bardiya' ) );
									mp_render_field_textarea( 'seo_meta_desc', __( 'SEO Meta Description', 'mobile-pasal' ), __( 'Recommended: 140–160 characters. Displays under your site link in search results.' ), 3 );
									mp_render_field_textarea( 'seo_meta_keywords', __( 'SEO Meta Keywords', 'mobile-pasal' ), __( 'Comma-separated target search keywords for Gulariya, Bardiya, and mobile services.' ), 2 );
									?>
									<div class="bopt-field-col-2">
										<?php
										mp_render_field_toggle( 'seo_robots_index', __( 'Index in Google (Robots: index, follow)', 'mobile-pasal' ), __( 'Turn ON to allow Google & Bing to index this site.' ) );
										?>
									</div>
								</div>
							</div>
						</div>

						<!-- Social Open Graph & Share Cards -->
						<div class="bopt-card">
							<div class="bopt-card-header">
								<div class="bopt-card-header-left">
									<div class="bopt-card-header-icon"><i class="fa-solid fa-share-nodes"></i></div>
									<div>
										<h3 class="bopt-card-title"><?php esc_html_e( 'Social Share Preview (Open Graph & WhatsApp)', 'mobile-pasal' ); ?></h3>
										<p class="bopt-card-desc"><?php esc_html_e( 'Rich preview banner image (1200x630px) when sharing website links on WhatsApp, Facebook, or Twitter.', 'mobile-pasal' ); ?></p>
									</div>
								</div>
								<button type="button" class="bopt-card-toggle-btn" aria-label="Toggle card"><i class="fa-solid fa-chevron-up"></i></button>
							</div>
							<div class="bopt-card-body">
								<div class="bopt-field-grid">
									<?php
									mp_render_field_image( 'seo_og_image', __( 'Open Graph Share Banner (1200x630)', 'mobile-pasal' ), __( 'Select an image representing your showroom counter. Falls back to hero slide image if empty.' ) );
									?>
								</div>
							</div>
						</div>

						<!-- Webmaster Verification Tokens -->
						<div class="bopt-card">
							<div class="bopt-card-header">
								<div class="bopt-card-header-left">
									<div class="bopt-card-header-icon"><i class="fa-solid fa-shield-halved"></i></div>
									<div>
										<h3 class="bopt-card-title"><?php esc_html_e( 'Search Engine Webmaster Verification Tokens', 'mobile-pasal' ); ?></h3>
										<p class="bopt-card-desc"><?php esc_html_e( 'Paste verification codes from Google Search Console and Bing Webmaster Tools.', 'mobile-pasal' ); ?></p>
									</div>
								</div>
								<button type="button" class="bopt-card-toggle-btn" aria-label="Toggle card"><i class="fa-solid fa-chevron-up"></i></button>
							</div>
							<div class="bopt-card-body">
								<div class="bopt-field-grid">
									<div class="bopt-field-col-2">
										<?php
										mp_render_field_text( 'seo_google_verify', __( 'Google Site Verification Token', 'mobile-pasal' ), __( 'Example: google-site-verification content code' ) );
										mp_render_field_text( 'seo_bing_verify', __( 'Bing Webmaster Verification Code', 'mobile-pasal' ), __( 'Example: msvalidate.01 content code' ) );
										?>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- 7.3 Custom Code -->
					<div class="bopt-tab-pane <?php echo $active_tab === 'custom_code_tab' ? 'is-active' : ''; ?>" id="tab-pane-custom_code_tab">
						<div class="bopt-pane-header">
							<h2><?php esc_html_e( 'Custom CSS Stylesheet & Tracking Scripts', 'mobile-pasal' ); ?></h2>
							<p><?php esc_html_e( 'Inject custom CSS overrides and analytics tracking codes safely without modifying theme files.', 'mobile-pasal' ); ?></p>
						</div>

						<div class="bopt-card">
							<div class="bopt-card-header">
								<div class="bopt-card-header-icon"><i class="fa-solid fa-code"></i></div>
								<div>
									<h3 class="bopt-card-title"><?php esc_html_e( 'Custom CSS Overrides', 'mobile-pasal' ); ?></h3>
									<p class="bopt-card-desc"><?php esc_html_e( 'Pure CSS rules injected directly into the frontend <head>.', 'mobile-pasal' ); ?></p>
								</div>
							</div>
							<div class="bopt-card-body">
								<div class="bopt-field-grid">
									<?php
									mp_render_field_textarea( 'custom_css', __( 'Custom CSS Stylesheet', 'mobile-pasal' ), __( 'Enter custom CSS (without <style> tags).' ), 8, "/* Custom CSS */\n.header-cta-btn {\n    font-weight: 700;\n}" );
									?>
								</div>
							</div>
						</div>

						<div class="bopt-card">
							<div class="bopt-card-header">
								<div class="bopt-card-header-icon"><i class="fa-solid fa-chart-pie"></i></div>
								<div>
									<h3 class="bopt-card-title"><?php esc_html_e( 'Header & Footer Script Tags', 'mobile-pasal' ); ?></h3>
									<p class="bopt-card-desc"><?php esc_html_e( 'Google Analytics, Facebook Pixel, or custom JavaScript snippets.', 'mobile-pasal' ); ?></p>
								</div>
							</div>
							<div class="bopt-card-body">
								<div class="bopt-field-grid">
									<?php
									mp_render_field_textarea( 'custom_header_scripts', __( 'Header Tracking Scripts (inside <head>)', 'mobile-pasal' ), __( 'Enter complete <script> tags for analytics.' ), 5 );
									mp_render_field_textarea( 'custom_footer_scripts', __( 'Footer Tracking Scripts (before </body>)', 'mobile-pasal' ), __( 'Enter complete <script> tags for live chat or footers.' ), 5 );
									?>
								</div>
							</div>
						</div>
					</div>

					<!-- 7.4 Backup, Export & Health Check -->
					<?php
					$health_logo     = mp_opt( 'site_logo' );
					$health_favicon  = mp_opt( 'site_favicon' );
					$health_wa       = mp_opt( 'whatsapp_number' );
					$health_phone    = mp_opt( 'counter_phone' );
					$health_map      = mp_opt( 'counter_map_embed' );
					$health_price_on = mp_opt( 'handset_show_price', 1 );
					$health_seo_on   = mp_opt( 'seo_robots_index', 1 );
					$handset_counts  = wp_count_posts( 'handset' );
					$total_handsets  = isset( $handset_counts->publish ) ? (int) $handset_counts->publish : 0;
					$saved_backups   = get_option( 'mobile_pasal_options_backups', array() );
					if ( ! is_array( $saved_backups ) ) {
						$saved_backups = array();
					}
					$export_url = wp_nonce_url( admin_url( 'admin-post.php?action=mobile_pasal_export_options' ), 'mobile_pasal_export_options' );
					?>
					<div class="bopt-tab-pane <?php echo $active_tab === 'backup_health_tab' ? 'is-active' : ''; ?>" id="tab-pane-backup_health_tab">
						<div class="bopt-pane-header">
							<h2><?php esc_html_e( 'System Backup, JSON Export/Import & Store Health Check', 'mobile-pasal' ); ?></h2>
							<p><?php esc_html_e( 'Audit store configuration readiness, export or import complete JSON settings backups, or roll back to any of the last 5 automatic snapshots.', 'mobile-pasal' ); ?></p>
						</div>

						<!-- Store Configuration Health Check -->
						<div class="bopt-card">
							<div class="bopt-card-header">
								<div class="bopt-card-header-icon"><i class="fa-solid fa-shield-heart"></i></div>
								<div>
									<h3 class="bopt-card-title"><?php esc_html_e( 'Live Store Configuration Health Check', 'mobile-pasal' ); ?></h3>
									<p class="bopt-card-desc"><?php esc_html_e( 'Real-time diagnostic audit of critical store coordinates, branding, and catalog state.', 'mobile-pasal' ); ?></p>
								</div>
							</div>
							<div class="bopt-card-body">
								<div class="bopt-health-grid">
									<div class="bopt-health-item <?php echo ! empty( $health_wa ) && ! empty( $health_phone ) ? 'is-ok' : 'is-warn'; ?>">
										<div class="bopt-health-icon"><i class="fa-brands fa-whatsapp"></i></div>
										<div class="bopt-health-meta">
											<strong><?php esc_html_e( 'WhatsApp & Counter Hotline', 'mobile-pasal' ); ?></strong>
											<span><?php echo ! empty( $health_wa ) ? esc_html( 'WA: +' . $health_wa . ' • Tel: ' . $health_phone ) : esc_html__( 'Missing WhatsApp number', 'mobile-pasal' ); ?></span>
										</div>
										<span class="bopt-health-badge"><?php echo ! empty( $health_wa ) ? esc_html__( 'Verified', 'mobile-pasal' ) : esc_html__( 'Action Needed', 'mobile-pasal' ); ?></span>
									</div>

									<div class="bopt-health-item <?php echo $total_handsets > 0 ? 'is-ok' : 'is-warn'; ?>">
										<div class="bopt-health-icon"><i class="fa-solid fa-mobile-screen-button"></i></div>
										<div class="bopt-health-meta">
											<strong><?php esc_html_e( 'Showroom Handset Catalog', 'mobile-pasal' ); ?></strong>
											<span><?php echo esc_html( sprintf( '%d Published Handsets • Global Prices: %s', $total_handsets, ! empty( $health_price_on ) ? 'Visible' : 'Hidden (Inquiry Mode)' ) ); ?></span>
										</div>
										<a href="<?php echo esc_url( admin_url( 'admin.php?page=mp-bulk-price-editor' ) ); ?>" class="bopt-health-link"><?php esc_html_e( 'Bulk Price Editor →', 'mobile-pasal' ); ?></a>
									</div>

									<div class="bopt-health-item <?php echo ! empty( $health_map ) && strpos( $health_map, '<iframe' ) !== false ? 'is-ok' : 'is-warn'; ?>">
										<div class="bopt-health-icon"><i class="fa-solid fa-map-location-dot"></i></div>
										<div class="bopt-health-meta">
											<strong><?php esc_html_e( 'Google Maps Showroom Embed', 'mobile-pasal' ); ?></strong>
											<span><?php echo ! empty( $health_map ) && strpos( $health_map, '<iframe' ) !== false ? esc_html__( 'Interactive map iframe configured', 'mobile-pasal' ) : esc_html__( 'Missing valid <iframe> embed', 'mobile-pasal' ); ?></span>
										</div>
										<span class="bopt-health-badge"><?php echo ! empty( $health_map ) ? esc_html__( 'Active', 'mobile-pasal' ) : esc_html__( 'Check Map', 'mobile-pasal' ); ?></span>
									</div>

									<div class="bopt-health-item <?php echo ! empty( $health_seo_on ) ? 'is-ok' : 'is-warn'; ?>">
										<div class="bopt-health-icon"><i class="fa-solid fa-magnifying-glass-chart"></i></div>
										<div class="bopt-health-meta">
											<strong><?php esc_html_e( 'Google Search & AI Indexing (SEO/AEO)', 'mobile-pasal' ); ?></strong>
											<span><?php echo ! empty( $health_seo_on ) ? esc_html__( 'Indexing enabled (index, follow) + Schema active', 'mobile-pasal' ) : esc_html__( 'Search indexing is currently disabled (noindex)', 'mobile-pasal' ); ?></span>
										</div>
										<span class="bopt-health-badge"><?php echo ! empty( $health_seo_on ) ? esc_html__( 'Indexing On', 'mobile-pasal' ) : esc_html__( 'Noindex', 'mobile-pasal' ); ?></span>
									</div>

									<div class="bopt-health-item <?php echo ! empty( $health_logo ) ? 'is-ok' : 'is-info'; ?>">
										<div class="bopt-health-icon"><i class="fa-solid fa-image"></i></div>
										<div class="bopt-health-meta">
											<strong><?php esc_html_e( 'Brand Logo & Favicon Asset', 'mobile-pasal' ); ?></strong>
											<span><?php echo ! empty( $health_logo ) ? esc_html__( 'Custom image logo uploaded', 'mobile-pasal' ) : esc_html__( 'Using crisp typography brand emblem (Upload optional)', 'mobile-pasal' ); ?></span>
										</div>
										<span class="bopt-health-badge"><?php echo ! empty( $health_logo ) ? esc_html__( 'Custom Logo', 'mobile-pasal' ) : esc_html__( 'Text Emblem', 'mobile-pasal' ); ?></span>
									</div>
								</div>
							</div>
						</div>

						<!-- 1-Click Export & Import JSON -->
						<div class="bopt-card">
							<div class="bopt-card-header">
								<div class="bopt-card-header-icon"><i class="fa-solid fa-file-export"></i></div>
								<div>
									<h3 class="bopt-card-title"><?php esc_html_e( '1-Click JSON Backup Export & Import', 'mobile-pasal' ); ?></h3>
									<p class="bopt-card-desc"><?php esc_html_e( 'Download a complete portable JSON file of all 639+ theme settings, or restore from a saved JSON file.', 'mobile-pasal' ); ?></p>
								</div>
							</div>
							<div class="bopt-card-body">
								<div class="bopt-backup-actions-row">
									<div class="bopt-backup-col">
										<h4><?php esc_html_e( 'Export Current Settings', 'mobile-pasal' ); ?></h4>
										<p class="bopt-desc"><?php esc_html_e( 'Downloads a timestamped .json file containing all your custom text, colors, slides, and SEO settings.', 'mobile-pasal' ); ?></p>
										<a href="<?php echo esc_url( $export_url ); ?>" class="button bopt-btn-gold" style="margin-top:10px;display:inline-flex;align-items:center;gap:8px;">
											<i class="fa-solid fa-download"></i> <?php esc_html_e( 'Download JSON Backup File', 'mobile-pasal' ); ?>
										</a>
									</div>
									<div class="bopt-backup-col">
										<h4><?php esc_html_e( 'Import Settings from JSON', 'mobile-pasal' ); ?></h4>
										<p class="bopt-desc"><?php esc_html_e( 'Select a previously exported .json file or paste its contents below to restore.', 'mobile-pasal' ); ?></p>
										<div style="margin-top:8px;display:flex;gap:8px;align-items:center;flex-wrap:wrap;">
											<input type="file" id="boptImportFileInput" accept=".json,application/json" style="font-size:12px;" />
										</div>
										<textarea id="boptImportJsonTextarea" class="bopt-textarea" rows="3" placeholder='{"options": { ... }}' style="margin-top:8px;"></textarea>
										<button type="button" class="button bopt-btn-gold" id="boptImportJsonBtn" style="margin-top:8px;">
											<i class="fa-solid fa-file-import"></i> <?php esc_html_e( 'Import & Restore JSON', 'mobile-pasal' ); ?>
										</button>
									</div>
								</div>
							</div>
						</div>

						<!-- Automatic 5-Snapshot Time Machine -->
						<div class="bopt-card">
							<div class="bopt-card-header">
								<div class="bopt-card-header-icon"><i class="fa-solid fa-clock-rotate-left"></i></div>
								<div>
									<h3 class="bopt-card-title"><?php esc_html_e( 'Automatic 5-Snapshot Time Machine', 'mobile-pasal' ); ?></h3>
									<p class="bopt-card-desc"><?php esc_html_e( 'Every time you save or reset settings, the previous configuration is automatically preserved here.', 'mobile-pasal' ); ?></p>
								</div>
							</div>
							<div class="bopt-card-body">
								<div id="boptSnapshotsTableWrap">
									<?php if ( empty( $saved_backups ) ) : ?>
										<p class="bopt-desc"><?php esc_html_e( 'No automatic snapshots recorded yet. Snapshots are created automatically whenever you click Save Changes.', 'mobile-pasal' ); ?></p>
									<?php else : ?>
										<table class="bopt-snapshots-table">
											<thead>
												<tr>
													<th><?php esc_html_e( 'Snapshot Timestamp', 'mobile-pasal' ); ?></th>
													<th><?php esc_html_e( 'Action / Tab', 'mobile-pasal' ); ?></th>
													<th><?php esc_html_e( 'Admin User', 'mobile-pasal' ); ?></th>
													<th style="text-align:right;"><?php esc_html_e( 'Rollback', 'mobile-pasal' ); ?></th>
												</tr>
											</thead>
											<tbody id="boptSnapshotsTbody">
												<?php foreach ( $saved_backups as $bak ) : ?>
													<tr>
														<td><strong><?php echo esc_html( $bak['timestamp'] ); ?></strong></td>
														<td><?php echo esc_html( $bak['reason'] ); ?></td>
														<td><code><?php echo esc_html( $bak['user'] ); ?></code></td>
														<td style="text-align:right;">
															<button type="button" class="button bopt-restore-snapshot-btn" data-backup-id="<?php echo esc_attr( $bak['id'] ); ?>">
																<i class="fa-solid fa-rotate-left"></i> <?php esc_html_e( 'Restore This Snapshot', 'mobile-pasal' ); ?>
															</button>
														</td>
													</tr>
												<?php endforeach; ?>
											</tbody>
										</table>
									<?php endif; ?>
								</div>
							</div>
						</div>

						<!-- Factory Reset Controls -->
						<div class="bopt-card">
							<div class="bopt-card-header">
								<div class="bopt-card-header-icon"><i class="fa-solid fa-triangle-exclamation" style="color:#dc2626;"></i></div>
								<div>
									<h3 class="bopt-card-title"><?php esc_html_e( 'Factory Reset Controls', 'mobile-pasal' ); ?></h3>
									<p class="bopt-card-desc"><?php esc_html_e( 'Restore all settings to the theme\'s original out-of-the-box defaults. An automatic snapshot is taken before resetting.', 'mobile-pasal' ); ?></p>
								</div>
							</div>
							<div class="bopt-card-body">
								<button type="button" class="button bopt-reset-all-btn" id="boptFactoryResetAllBtn" style="border-color:#dc2626;color:#dc2626;">
									<i class="fa-solid fa-rotate"></i> <?php esc_html_e( 'Factory Reset All Theme Options to Defaults', 'mobile-pasal' ); ?>
								</button>
							</div>
						</div>
					</div>

					<!-- Sticky Bottom Floating Action Dock -->
					<div class="bopt-floating-save-bar">
						<div class="bopt-floating-left">
							<span class="bopt-floating-status"><strong><?php esc_html_e( 'Editing:', 'mobile-pasal' ); ?></strong> <span id="boptActiveModuleLabel"><?php esc_html_e( 'Brand & Global Styles', 'mobile-pasal' ); ?></span></span>
							<span class="bopt-floating-sep">•</span>
							<span class="bopt-floating-tab" id="boptActiveTabLabel"><?php esc_html_e( 'Color Palette & System', 'mobile-pasal' ); ?></span>
						</div>
						<div class="bopt-floating-right">
							<button type="button" class="bopt-reset-tab-btn" id="boptResetCurrentTabBtn" title="<?php esc_attr_e( 'Reset only the fields in this tab back to default values', 'mobile-pasal' ); ?>">
								<i class="fa-solid fa-rotate-left"></i> <?php esc_html_e( 'Reset Tab', 'mobile-pasal' ); ?>
							</button>
							<a href="<?php echo esc_url( admin_url( 'admin.php?page=mp-bulk-price-editor' ) ); ?>" class="bopt-inbox-btn" title="<?php esc_attr_e( 'Open Bulk Handset Price & Stock Editor', 'mobile-pasal' ); ?>">
								<i class="fa-solid fa-tags"></i> <?php esc_html_e( 'Bulk Prices', 'mobile-pasal' ); ?>
							</a>
							<a href="<?php echo esc_url( admin_url( 'admin.php?page=mp-inquiries' ) ); ?>" class="bopt-inbox-btn">
								<i class="fa-solid fa-inbox"></i> <?php esc_html_e( 'Inquiries', 'mobile-pasal' ); ?>
								<?php if ( $unread_inquiries > 0 ) : ?>
									<span class="bopt-badge-pill"><?php echo esc_html( $unread_inquiries ); ?></span>
								<?php endif; ?>
							</a>
							<button type="submit" class="bopt-save-btn" title="<?php esc_attr_e( 'Save All Settings (Ctrl+S)', 'mobile-pasal' ); ?>">
								<i class="fa-solid fa-floppy-disk"></i>
								<span class="bopt-btn-text-full"><?php esc_html_e( 'Save All Settings', 'mobile-pasal' ); ?></span>
								<span class="bopt-btn-text-short"><?php esc_html_e( 'Save', 'mobile-pasal' ); ?></span>
								<span class="bopt-key-hint">Ctrl+S</span>
							</button>
						</div>
					</div>

					<!-- Mobile Sticky Bottom Save Dock (Zero Scroll UX) -->
					<div class="bopt-mobile-save-dock">
						<button type="button" class="bopt-btn-mobile-menu" id="boptMobileMenuBtn" aria-label="<?php esc_attr_e( 'Open Navigation Menu', 'mobile-pasal' ); ?>">
							<i class="fa-solid fa-bars"></i>
							<span><?php esc_html_e( 'Modules', 'mobile-pasal' ); ?></span>
						</button>
						<button type="button" class="bopt-btn-mobile-save bopt-mobile-save-action" id="boptMobileSaveBtn">
							<i class="fa-solid fa-floppy-disk"></i>
							<span><?php esc_html_e( 'Save All Settings', 'mobile-pasal' ); ?></span>
						</button>
						<button type="button" class="bopt-btn-mobile-top bopt-mobile-top-btn" id="boptMobileTopBtn" aria-label="<?php esc_attr_e( 'Back to top', 'mobile-pasal' ); ?>">
							<i class="fa-solid fa-arrow-up"></i>
						</button>
					</div>

				</form>

				<!-- Instant Save Toast Notification -->
				<div class="bopt-toast" id="boptToast" style="display:none;" role="status" aria-live="polite">
					<i class="fa-solid fa-circle-check bopt-toast-icon"></i>
					<span class="bopt-toast-msg" id="boptToastMsg"><?php esc_html_e( 'Settings saved!', 'mobile-pasal' ); ?></span>
				</div>

			</main>

		</div>

	</div>
	<?php
}
