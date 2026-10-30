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
 * Master Theme Options Defaults Dictionary
 */
function mobile_pasal_options_defaults() {
	$uri = get_template_directory_uri();

	return array(
		// ── 1. Global Brand & Palette ──
		'site_brand_name'              => 'Ali Mobile Center & Apple Fix',
		'store_name'                   => 'Ali Mobile Center & Apple Fix',
		'site_domain_badge'            => 'Gulariya-06, Ji. Pra. Ka. Chowk',
		'site_tagline'                 => 'Official NTA Smartphones, Genuine Gear & Apple Fix Precision Lab',
		'footer_brand_desc'            => 'Official NTA Smartphones, Genuine Gear & Apple Fix Precision Lab',
		'site_logo'                    => '',
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

		// ── 2. Header & Counter Desk Coordinates ──
		'counter_phone'                => '+977 9804530786',
		'store_phone'                  => '+977 9804530786',
		'contact_phone'                => '+977 9804530786',
		'counter_phone_raw'            => '9804530786',
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
		'topbar_show'                  => 1,
		'header_sticky'                => 1,
		'header_wa_btn_text'           => 'Chat on WhatsApp',
		'header_search_enabled'        => 1,

		// ── 3. Home Hero Slider: Slide 1 ──
		'hero_slide1_badge'            => '100% Genuine Sealed Stock',
		'hero_slide1_title'            => 'Official NTA Smartphones &',
		'hero_slide1_title_highlight'  => 'Genuine Gear.',
		'hero_slide1_subtitle'         => 'Discover Gulariya\'s largest verified inventory of flagship handsets: Apple iPhone 16 Series, Samsung Galaxy S24 Ultra, Google Pixel 9, OnePlus 12, and Xiaomi 14. 100% genuine IMEI bill, warranty support, and free data setup.',
		'hero_slide1_desc'             => 'Discover Gulariya\'s largest verified inventory of flagship handsets: Apple iPhone 16 Series, Samsung Galaxy S24 Ultra, Google Pixel 9, OnePlus 12, and Xiaomi 14. 100% genuine IMEI bill, warranty support, and free data setup.',
		'hero_slide1_btn1_text'        => 'Filter Handsets Below',
		'hero_slide1_btn1_url'         => '#catalog',
		'hero_slide1_btn2_text'        => 'Ask Today\'s Counter Price',
		'hero_slide1_btn2_url'         => 'https://wa.me/9779804530786?text=Namaste%20Ali%20Mobile%2C%20iPhone%2016%20ra%20S24%20Ultra%20ko%20aaja%20ko%20counter%20rate%20dinus',
		'hero_slide1_telemetry_model'  => 'iPhone 16 Series',
		'hero_slide1_telemetry_status' => 'In Stock Now',
		'hero_slide1_image'            => $uri . '/assets/images/hero-iphone-hand.jpg',

		// ── 3. Home Hero Slider: Slide 2 ──
		'hero_slide2_badge'            => 'Certified Apple Fix Lab',
		'hero_slide2_title'            => 'Gulariya\'s Premier',
		'hero_slide2_title_highlight'  => 'Apple Fix & Lab.',
		'hero_slide2_subtitle'         => 'Specialized precision lab for iPhone, iPad, Samsung, and Android devices. Cleanroom microscope micro-soldering, true-tone OLED swaps, battery health calibrations, and ultrasonic water damage restoration right on our Gulariya counter.',
		'hero_slide2_desc'             => 'Specialized precision lab for iPhone, iPad, Samsung, and Android devices. Cleanroom microscope micro-soldering, true-tone OLED swaps, battery health calibrations, and ultrasonic water damage restoration right on our Gulariya counter.',
		'hero_slide2_btn1_text'        => 'Interactive Repair Estimator',
		'hero_slide2_btn1_url'         => '#repair-builder',
		'hero_slide2_btn2_text'        => 'Direct WhatsApp Help',
		'hero_slide2_btn2_url'         => 'https://wa.me/9779804530786?text=Namaste%20Ali%20Mobile%2C%20malai%20iPhone%20repair%20barema%20bujhna%20chahanchhu',
		'hero_slide2_telemetry_time'   => '30–45 Mins Average',
		'hero_slide2_telemetry_station'=> 'Counter Diagnostic',
		'hero_slide2_image'            => $uri . '/assets/images/apple-fix-bench.jpg',

		// ── 3. Home Hero Slider: Slide 3 ──
		'hero_slide3_badge'            => '100% Genuine Accessories',
		'hero_slide3_title'            => '100% Original Audio,',
		'hero_slide3_title_highlight'  => 'Power & Protection.',
		'hero_slide3_subtitle'         => 'Shield your investment with genuine Apple MagSafe chargers, 65W GaN dual-port adapters, AirPods Pro 2, military-grade drop cases, and UV tempered glass curved screen armor installed with zero bubbles.',
		'hero_slide3_desc'             => 'Shield your investment with genuine Apple MagSafe chargers, 65W GaN dual-port adapters, AirPods Pro 2, military-grade drop cases, and UV tempered glass curved screen armor installed with zero bubbles.',
		'hero_slide3_btn1_text'        => 'Browse Accessories',
		'hero_slide3_btn1_url'         => '#categories',
		'hero_slide3_btn2_text'        => 'Check Counter Stock',
		'hero_slide3_btn2_url'         => 'https://wa.me/9779804530786?text=Namaste%20Ali%20Mobile%2C%20original%20AirPods%20ra%2020W%20adapter%20available%20chha%3F',
		'hero_slide3_telemetry_brands' => 'Apple • Samsung • Anker',
		'hero_slide3_telemetry_pay'    => 'Cash & Digital Pay',
		'hero_slide3_image'            => $uri . '/assets/images/shop-accessories-shelf.jpg',

		// ── 4. Diagnostic Station / Estimator ──
		'estimator_enabled'            => 1,
		'repair_kicker'                => 'Live Diagnostic Console',
		'repair_title'                 => 'Interactive Repair Estimator',
		'repair_subtitle'              => 'Select your device and fault below. Your live repair docket is prepared in real-time. Dispatch directly to our Gulariya technician on WhatsApp for instant counter quotes.',

		// ── 5. Categories & Authorized Brands ──
		'categories_kicker'            => 'Complete Store Department',
		'categories_title'             => 'Shop by Device Category',
		'categories_subtitle'          => 'Every handset is sealed, verified with NTA, and backed by manufacturer warranty.',
		'cat1_title'                   => 'Flagship Smartphones',
		'cat1_count'                   => '18+ Handset Models',
		'cat1_image'                   => $uri . '/assets/images/hero-iphone-hand.jpg',
		'cat2_title'                   => 'Certified Apple Fix',
		'cat2_count'                   => 'Microscope Lab Services',
		'cat2_image'                   => $uri . '/assets/images/apple-fix-bench.jpg',
		'cat3_title'                   => 'Audio & Power Gear',
		'cat3_count'                   => 'AirPods, GaN & MagSafe',
		'cat3_image'                   => $uri . '/assets/images/hero-accessories.jpg',
		'cat4_title'                   => 'iPads & Tablets',
		'cat4_count'                   => 'Apple & Samsung Displays',
		'cat4_image'                   => $uri . '/assets/images/ipad-air.jpg',
		'brands_kicker'                => 'Official Showroom Distributors',
		'brands_title'                 => 'Shop by Verified Brand',
		'brands_subtitle'              => 'Authentic distributor warranties across Nepal for Apple, Samsung, Google Pixel, OnePlus, and Xiaomi.',

		// ── 6. iPhone 16 Pro Spotlight & Apple Fix Bench ──
		'spotlight_badge'              => 'Featured Flagship in Gulariya',
		'spotlight_title'              => 'iPhone 16 Pro & Pro Max',
		'spotlight_subtitle'           => 'Grade 5 Titanium design with thinner borders, A18 Pro silicon chip, 48MP Fusion camera with 4K 120fps Dolby Vision, and revolutionary Camera Control button.',
		'spotlight_chip'               => 'A18 Pro Silicon',
		'spotlight_display'            => '6.3" & 6.9" Super Retina XDR',
		'spotlight_finish'             => 'Desert, Natural, White, Black Titanium',
		'spotlight_camera'             => '48MP Fusion + 5x Telephoto',
		'spotlight_price_text'         => 'Counter Inquiry Available',
		'spotlight_image'              => $uri . '/assets/images/iphone-16-pro-max.jpg',
		'lab_kicker'                   => 'Cleanroom Bench Setup',
		'lab_title'                    => 'Precision Microscope Level Repairs Right in Gulariya',
		'lab_subtitle'                 => 'We do not courier your valuable phone to Nepalgunj or Kathmandu. Repairs happen transparently inside our Gulariya counter laboratory with stereo zoom microscopes, anti-static thermal stations, and genuine parts.',
		'lab_stat1_num'                => '10,000+',
		'lab_stat1_label'              => 'Repairs Handled',
		'lab_stat2_num'                => '98.5%',
		'lab_stat2_label'              => 'Success Rate',
		'lab_stat3_num'                => '45 Min',
		'lab_stat3_label'              => 'Screen Turnaround',
		'lab_image'                    => $uri . '/assets/images/hero-repair-lab.jpg',

		// ── 7. Shop & 4 Zero-Risk Assurance Cards ──
		'shop_hero_badge'              => 'Gulariya Verified Showroom',
		'shop_hero_title'              => 'Official NTA Smartphones & Genuine Gear.',
		'shop_hero_desc'               => 'Discover Gulariya\'s largest verified inventory of flagship handsets: Apple iPhone 16 Series, Samsung Galaxy S24 Ultra, Google Pixel 9, OnePlus 12, and Xiaomi 14. 100% genuine IMEI bill, warranty support, and free data setup.',
		'shop_spotlight_badge'         => 'Showroom Live Inventory',
		'shop_spotlight_subtitle'      => 'Gulariya Counter',
		'shop_spotlight_m1_label'      => 'NTA Registration',
		'shop_spotlight_m1_val'        => '100% Verified Bill',
		'shop_spotlight_m2_label'      => 'Data Migration',
		'shop_spotlight_m2_val'        => 'FREE Walk-In Setup',
		'shop_spotlight_m3_label'      => 'Old Device Trade-In',
		'shop_spotlight_m3_val'        => 'Instant Valuation',
		'shop_spotlight_m4_label'      => 'Top Flagships',
		'shop_spotlight_m4_val'        => 'In Stock Today',
		'shop_spotlight_tags'          => 'Apple iPhone, Samsung Galaxy, Google Pixel, OnePlus, Xiaomi',
		'assurance_kicker'             => 'Zero-Risk Purchase',
		'assurance_title'              => 'The Ali Mobile Handset Assurance',
		'assurance_subtitle'           => 'Why hundreds of phone buyers across Bardiya trust our counter over unverified online imports.',
		'assurance1_title'             => '100% NTA Approved',
		'assurance1_desc'              => 'Compliant with Nepal Telecommunications Authority IMEI registration for uninterrupted MDMS cellular service across Nepal.',
		'assurance1_tag'               => 'MDMS Verified',
		'assurance2_title'             => 'Official VAT Bill',
		'assurance2_desc'              => 'Every single handset comes with an authorized commercial VAT serial bill enabling legitimate distributor warranty claims.',
		'assurance2_tag'               => 'Genuine Bill',
		'assurance3_title'             => 'Free Data Transfer',
		'assurance3_desc'              => 'We safely migrate your WhatsApp chats, photos, contacts, and mobile apps directly to your new phone before you leave.',
		'assurance3_tag'               => 'Walk-In Setup',
		'assurance4_title'             => 'Trade-In Counter',
		'assurance4_desc'              => 'Bring your old handset for fair, transparent counter evaluation toward the purchase of any new smartphone.',
		'assurance4_tag'               => 'Instant Valuation',

		// ── 8. Apple Fix Lab & Precision Services ──
		'services_hero_badge'          => 'Gulariya\'s Premier Mobile Clinic',
		'services_hero_title'          => 'Apple Fix Lab & Precision Repairs',
		'services_hero_desc'           => 'Component-level micro-soldering, true-tone OLED display calibrations, 0-cycle battery replacements, and ultrasonic liquid recovery performed live in Gulariya.',
		'services_spotlight_badge'     => 'Bench Handover Desk',
		'services_spotlight_sub'       => 'Gulariya-06',
		'services_spotlight_m1_label'  => 'Walk-in Diagnosis',
		'services_spotlight_m1_val'    => 'FREE (5-Min Check)',
		'services_spotlight_m2_label'  => 'Average Turnaround',
		'services_spotlight_m2_val'    => '30–45 Mins',
		'services_spotlight_m3_label'  => 'Replacement Parts',
		'services_spotlight_m3_val'    => '100% Certified Grade',
		'services_spotlight_m4_label'  => 'Counter Warranty',
		'services_spotlight_m4_val'    => '90 Days Testing Warranty',
		'services_ribbon_1'            => 'Component-Level Micro-Soldering',
		'services_ribbon_2'            => 'TrueTone & FaceID Transfer',
		'services_ribbon_3'            => 'Ultrasonic Oxidation Bath',
		'services_ribbon_4'            => 'Fast Express Counter Service',
		'services_cta_title'           => 'Need an Urgent Screen, Battery, or Board Fix?',
		'services_cta_desc'            => 'Bring your phone to our counter at Ji. Pra. Ka. Chowk or send your device fault on WhatsApp for instant evaluation.',
		'services_warranty_badge'      => '90-Day Ali Mobile Cleanroom Warranty',
		'services_warranty_desc'       => 'Every display swap and component repair is backed by a 90-day peace-of-mind warranty covering parts and labor.',
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
		'about_spotlight_badge'        => 'Heritage & Trust',
		'about_spotlight_year'         => 'Since 2014',
		'about_spotlight_m1_label'     => 'Operational Heritage',
		'about_spotlight_m1_val'       => '10+ Years in Bardiya',
		'about_spotlight_m2_label'     => 'Restored Handsets',
		'about_spotlight_m2_val'       => '15,000+ Devices',
		'about_spotlight_m3_label'     => 'Data Privacy Policy',
		'about_spotlight_m3_val'       => '100% Confidential',
		'about_spotlight_m4_label'     => 'Central Location',
		'about_spotlight_m4_val'       => 'Ji. Pra. Ka. Chowk',
		'about_ribbon_1'               => 'Cleanroom Bench Tooling',
		'about_ribbon_2'               => 'On-the-Spot Diagnostics',
		'about_ribbon_3'               => 'Certified OEM-Grade Parts',
		'about_ribbon_4'               => '90-Day Testing Warranty',
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
		'contact_spotlight_badge'      => 'Gulariya Counter Desk',
		'contact_spotlight_time'       => '9 AM – 8 PM',
		'contact_spotlight_m1_label'   => 'Direct Hotline',
		'contact_spotlight_m1_val'     => '+977 9804530786',
		'contact_spotlight_m2_label'   => 'Exact Landmark',
		'contact_spotlight_m2_val'     => 'Ji. Pra. Ka. Chowk',
		'contact_spotlight_m3_label'   => 'Walk-in Diagnosis',
		'contact_spotlight_m3_val'     => '5-Minute Free Check',
		'contact_spotlight_m4_label'   => 'Customer Parking',
		'contact_spotlight_m4_val'     => 'Easy Front Access',
		'contact_ribbon_1'             => 'Direct WhatsApp & Call Line',
		'contact_ribbon_2'             => 'Quick 5-Minute WhatsApp Quotes',
		'contact_ribbon_3'             => 'Opposite District Admin Office',
		'contact_ribbon_4'             => 'Saturday Open • 9 AM – 8 PM',
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
		'contact_card1_title'          => 'Voice Call / Counter Desk',
		'contact_card1_val'            => '+977 9804530786',
		'contact_card1_action'         => 'Call Now',
		'contact_card2_title'          => 'WhatsApp Live Support',
		'contact_card2_val'            => '9804530786',
		'contact_card2_action'         => 'Chat on WhatsApp',
		'contact_card3_title'          => 'Counter Location',
		'contact_card3_val'            => 'Gulariya-06, Ji. Pra. Ka. Chowk, Bardiya',
		'contact_card3_action'         => 'Get Directions',
		'contact_card4_title'          => 'Operating Hours',
		'contact_card4_val'            => 'Sun–Fri: 9:00 AM – 8:00 PM | Sat: Open',
		'contact_card4_action'         => 'Visit Us',

		// ── 11. Mobile Bottom Bar & Floating WhatsApp ──
		'mobile_bar_enabled'           => 1,
		'mobile_btn1_label'            => 'Call',
		'mobile_btn2_label'            => 'Repair',
		'mobile_btn3_label'            => 'Catalog',
		'mobile_btn4_label'            => 'WhatsApp',
		'floating_wa_enabled'          => 1,
		'whatsapp_widget_name'         => 'Ali Mobile Specialist',
		'whatsapp_widget_status'       => 'Online • Ready to Help',
		'whatsapp_widget_greeting'     => 'Namaste! Welcome to Ali Mobile Center & Apple Fix. How can we help you today with handsets or repairs?',
		'whatsapp_chip1_text'          => 'Today\'s iPhone 16 Price',
		'whatsapp_chip2_text'          => 'Screen Repair Estimate',
		'whatsapp_chip3_text'          => 'AirPods / MagSafe Stock',
		'whatsapp_chip4_text'          => 'Counter Location & Hours',

		// ── 12. Footer & Legal ──
		'footer_alert_title'           => 'Gulariya Counter Open Today',
		'footer_alert_desc'            => 'Walk in anytime between 9:00 AM and 8:00 PM at Ji. Pra. Ka. Chowk for instant handset inspection, free data transfer, or Apple Fix cleanroom repairs.',
		'footer_col1_title'            => 'Handset Showroom',
		'footer_col2_title'            => 'Apple Fix Lab',
		'footer_col3_title'            => 'Store Information',
		'footer_copyright'             => '© 2026 Ali Mobile Center & Apple Fix. Gulariya-06, Bardiya, Nepal. All Rights Reserved.',

		// ── 13. Search Engine Optimization (SEO) ──
		'seo_meta_title'               => 'Ali Mobile Center & Apple Fix | Official NTA Handsets & Precision Phone Repair Gulariya, Bardiya',
		'seo_meta_desc'                => 'Gulariya\'s premier mobile showroom and authorized repair laboratory at Ji. Pra. Ka. Chowk. Genuine Apple iPhone, Samsung & Xiaomi handsets with official NTA approval, 1-year VAT bills, and 45-minute display & battery repairs.',
		'seo_meta_keywords'            => 'mobile shop in gulariya, iphone repair bardiya, apple fix gulariya, ali mobile center, nta approved phone nepal, smartphone repair ji pra ka chowk, second hand iphone bardiya',
		'seo_og_image'                 => '',
		'seo_robots_index'             => '1',
		'seo_google_verify'            => '',
		'seo_bing_verify'              => '',

		// ── 14. GEO & Local Google Maps Ranking ──
		'geo_legal_name'               => 'Ali Mobile Center & Apple Fix',
		'geo_street'                   => 'Gulariya-06, Ji. Pra. Ka. Chowk (District Police Office Chowk)',
		'geo_city'                     => 'Gulariya',
		'geo_district'                 => 'Bardiya',
		'geo_province'                 => 'Lumbini Province',
		'geo_postal'                   => '21800',
		'geo_country_code'             => 'NP',
		'geo_region_code'              => 'NP-P5',
		'geo_latitude'                 => '28.2330',
		'geo_longitude'                => '81.3340',
		'geo_service_areas'            => 'Gulariya, Bansgadhi, Madhuwan, Badhaiyatal, Thakurbaba, Barbardiya, Rajapur, Kohalpur, Nepalgunj, Bardiya District',
		'geo_opening_hours'            => 'Sun–Fri: 9:00 AM – 8:00 PM | Sat: Open 9:00 AM – 6:00 PM',
		'geo_price_range'              => 'Rs. 500 - Rs. 2,50,000',
		'geo_maps_url'                 => 'https://maps.google.com/?q=Ali+Mobile+Center+Gulariya',
		'geo_gmb_review_url'           => 'https://g.page/r/alimobile/review',

		// ── 15. AEO & AI Search Citation ──
		'aeo_ai_summary'               => 'Ali Mobile Center & Apple Fix is the premier mobile phone showroom and cleanroom smartphone repair laboratory in Gulariya, Bardiya, Nepal, located at Ji. Pra. Ka. Chowk. The center retails 100% genuine NTA-approved iPhones, Samsung and Xiaomi handsets with official VAT bills, and provides component-level OLED screen, battery, and logic board micro-soldering repairs.',
		'aeo_enable_faq_schema'        => '1',
		'aeo_faq1_q'                   => 'Are all smartphones sold at Ali Mobile Center NTA approved?',
		'aeo_faq1_a'                   => 'Yes, 100% of all handsets sold at Ali Mobile Center Gulariya are officially registered with Nepal Telecommunications Authority (NTA) IMEI compliance and accompanied by legitimate serial VAT bills for official warranty claims.',
		'aeo_faq2_q'                   => 'How fast can I get my iPhone screen or battery replaced at Apple Fix Lab?',
		'aeo_faq2_a'                   => 'Most iPhone OLED display swaps and battery health calibrations are completed in 45 to 60 minutes on our cleanroom bench, right in front of the customer, backed by a 90-day warranty.',
		'aeo_faq3_q'                   => 'Where is Ali Mobile Center located in Bardiya?',
		'aeo_faq3_a'                   => 'We are located at Gulariya-06, Ji. Pra. Ka. Chowk (District Police Office Chowk), Gulariya, Bardiya, Nepal. You can call or WhatsApp us directly at +977 9804530786.',
		'aeo_faq4_q'                   => 'Does Ali Mobile Center accept trade-ins for old phones?',
		'aeo_faq4_a'                   => 'Yes, our counter offers fair, transparent trade-in valuations for your existing handset toward any new smartphone, with free safe migration of your WhatsApp chats, contacts, photos, and apps.',
		'aeo_sameas_urls'              => 'https://www.facebook.com/alimobilecenter, https://www.instagram.com/alimobilecenter, https://www.tiktok.com/@alimobilecenter, https://wa.me/9779804530786',
		'aeo_enable_llms_txt'          => '1',

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
}

/**
 * Retrieve Theme Option with Safe Fallback and Bidirectional Aliasing
 */
function mobile_pasal_get_option( $key, $default = null ) {
	$options  = get_option( 'mobile_pasal_options', array() );
	$defaults = mobile_pasal_options_defaults();

	// Alias dictionary for cross-compatibility
	$aliases = array(
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
	);

	// 1. Direct saved option
	if ( is_array( $options ) && array_key_exists( $key, $options ) && '' !== $options[ $key ] && null !== $options[ $key ] ) {
		return $options[ $key ];
	}

	// 2. Check alias in saved options
	if ( isset( $aliases[ $key ] ) && is_array( $options ) && array_key_exists( $aliases[ $key ], $options ) && '' !== $options[ $aliases[ $key ] ] && null !== $options[ $aliases[ $key ] ] ) {
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
 * Handle Theme Options Save Action (admin-post.php)
 */
function mobile_pasal_options_save() {
	if ( ! isset( $_POST['mp_options_nonce'] ) || ! wp_verify_nonce( $_POST['mp_options_nonce'], 'mobile_pasal_save_theme_options' ) ) {
		wp_die( esc_html__( 'Security check failed. Please refresh the page and try again.', 'mobile-pasal' ) );
	}
	if ( ! current_user_can( 'edit_theme_options' ) ) {
		wp_die( esc_html__( 'You do not have sufficient permissions to access this page.', 'mobile-pasal' ) );
	}

	$existing = get_option( 'mobile_pasal_options', array() );
	if ( ! is_array( $existing ) ) {
		$existing = mobile_pasal_options_defaults();
	}

	if ( isset( $_POST['mp_opt'] ) && is_array( $_POST['mp_opt'] ) ) {
		foreach ( $_POST['mp_opt'] as $key => $val ) {
			if ( is_array( $val ) ) {
				$existing[ $key ] = $val;
			} elseif ( in_array( $key, array( 'counter_map_embed', 'custom_css', 'custom_header_scripts', 'custom_footer_scripts' ), true ) ) {
				$existing[ $key ] = wp_unslash( $val );
			} else {
				$existing[ $key ] = wp_unslash( $val );
			}
		}
	}

	// Normalize unchecked toggle checkboxes
	$all_defaults = mobile_pasal_options_defaults();
	foreach ( $all_defaults as $d_key => $d_val ) {
		if ( strpos( $d_key, '_enabled' ) !== false || strpos( $d_key, 'enable_' ) !== false || strpos( $d_key, '_sticky' ) !== false || strpos( $d_key, 'topbar_show' ) !== false ) {
			if ( ! isset( $_POST['mp_opt'][ $d_key ] ) ) {
				$existing[ $d_key ] = 0;
			}
		}
	}

	update_option( 'mobile_pasal_options', $existing );

	$active_tab = isset( $_POST['current_tab'] ) ? sanitize_text_field( $_POST['current_tab'] ) : 'colors';
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
	if ( strpos( $hook, 'mobile-pasal-options' ) === false && strpos( $hook, 'mp-inquiries' ) === false ) {
		return;
	}

	wp_enqueue_media();
	wp_enqueue_style( 'wp-color-picker' );
	wp_enqueue_script( 'wp-color-picker' );

	// Font Awesome 6 Icons for modern luxury dashboard
	wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css', array(), '6.5.1' );

	$css_path = get_template_directory() . '/assets/css/admin-options.css';
	$js_path  = get_template_directory() . '/assets/js/admin-options.js';
	$css_ver  = file_exists( $css_path ) ? filemtime( $css_path ) : '3.0.0';
	$js_ver   = file_exists( $js_path ) ? filemtime( $js_path ) : '3.0.0';

	wp_enqueue_style( 'mobile-pasal-admin-options', get_template_directory_uri() . '/assets/css/admin-options.css', array(), $css_ver );
	wp_enqueue_script( 'mobile-pasal-admin-options', get_template_directory_uri() . '/assets/js/admin-options.js', array( 'jquery', 'wp-color-picker' ), $js_ver, true );

	wp_localize_script( 'mobile-pasal-admin-options', 'mobilePasalOptions', array(
		'choose_image' => __( 'Select or Upload Store Image', 'mobile-pasal' ),
		'use_image'    => __( 'Use This Media Asset', 'mobile-pasal' ),
	) );
}
add_action( 'admin_enqueue_scripts', 'mobile_pasal_options_admin_enqueue' );

/**
 * Form Field Renderers
 */
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
				'hero'                 => array( 'label' => __( 'Hero Showcase 3 Slides', 'mobile-pasal' ), 'icon' => 'fa-images' ),
				'estimator_sec'        => array( 'label' => __( 'Diagnostic Estimator', 'mobile-pasal' ), 'icon' => 'fa-calculator' ),
				'categories_brands_sec'=> array( 'label' => __( 'Bento Categories & Brands', 'mobile-pasal' ), 'icon' => 'fa-layer-group' ),
				'spotlight_lab_sec'    => array( 'label' => __( 'iPhone Spotlight & Lab', 'mobile-pasal' ), 'icon' => 'fa-star' ),
				'reviews_map_sec'      => array( 'label' => __( 'Reviews & Counter Map', 'mobile-pasal' ), 'icon' => 'fa-comments' ),
			),
		),
		'shop_group' => array(
			'group_title' => __( 'Showroom & Handset Catalog', 'mobile-pasal' ),
			'icon'        => 'fa-store',
			'items'       => array(
				'shop_hero_tab'      => array( 'label' => __( 'Shop Catalog Page Hero', 'mobile-pasal' ), 'icon' => 'fa-store' ),
				'shop_assurance_tab' => array( 'label' => __( '4 Zero-Risk Assurance Cards', 'mobile-pasal' ), 'icon' => 'fa-shield-halved' ),
				'shop_inventory_tab' => array( 'label' => __( 'Inventory CPT Quick Actions', 'mobile-pasal' ), 'icon' => 'fa-boxes-stacked' ),
			),
		),
		'services_group' => array(
			'group_title' => __( 'Apple Fix Lab & Services', 'mobile-pasal' ),
			'icon'        => 'fa-screwdriver-wrench',
			'items'       => array(
				'services_hero_tab'   => array( 'label' => __( 'Repair Services Hero', 'mobile-pasal' ), 'icon' => 'fa-screwdriver-wrench' ),
				'services_labs_tab'   => array( 'label' => __( '6 Repair Labs & Cleanroom', 'mobile-pasal' ), 'icon' => 'fa-microscope' ),
				'services_matrix_tab' => array( 'label' => __( 'Turnaround Pricing & Warranty', 'mobile-pasal' ), 'icon' => 'fa-table-cells' ),
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
				'contact_inbox_tab'     => array( 'label' => __( 'Inquiries Inbox Manager', 'mobile-pasal' ), 'icon' => 'fa-inbox' ),
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
			'group_title' => __( 'SEO, GEO & AI Search (AEO)', 'mobile-pasal' ),
			'icon'        => 'fa-bullseye',
			'items'       => array(
				'seo_meta_tab'  => array( 'label' => __( 'SEO & Meta Ranking', 'mobile-pasal' ), 'icon' => 'fa-magnifying-glass-chart' ),
				'geo_local_tab' => array( 'label' => __( 'GEO & Local Maps Ranking', 'mobile-pasal' ), 'icon' => 'fa-map-pin' ),
				'aeo_ai_tab'    => array( 'label' => __( 'AEO & AI Search Citation', 'mobile-pasal' ), 'icon' => 'fa-robot' ),
			),
		),
		'mobile_group' => array(
			'group_title' => __( 'Mobile UX & Chat Widget', 'mobile-pasal' ),
			'icon'        => 'fa-mobile-screen-button',
			'items'       => array(
				'mobile_bottom_bar_tab' => array( 'label' => __( 'Sticky Mobile Bottom Bar', 'mobile-pasal' ), 'icon' => 'fa-mobile-screen-button' ),
				'floating_wa_widget_tab'=> array( 'label' => __( 'Floating WhatsApp Widget', 'mobile-pasal' ), 'icon' => 'fa-comments' ),
				'custom_code_tab'       => array( 'label' => __( 'Custom CSS & Header Scripts', 'mobile-pasal' ), 'icon' => 'fa-code' ),
			),
		),
	);

	// Unread inquiries count for executive topbar badge
	global $wpdb;
	$table_inquiries  = $wpdb->prefix . 'mp_inquiries';
	$unread_inquiries = 0;
	if ( $wpdb->get_var( "SHOW TABLES LIKE '$table_inquiries'" ) === $table_inquiries ) {
		$unread_inquiries = (int) $wpdb->get_var( "SELECT COUNT(*) FROM $table_inquiries WHERE status = 'new'" );
	}
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
						<span class="bopt-brand-badge"><?php esc_html_e( 'Theme Options Suite 3.0', 'mobile-pasal' ); ?></span>
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

				<a href="<?php echo esc_url( admin_url( 'admin.php?page=mp-inquiries' ) ); ?>" class="bopt-messages-btn" title="<?php esc_attr_e( 'Customer Repair Dockets & Inquiries', 'mobile-pasal' ); ?>">
					<i class="fa-solid fa-envelope"></i>
					<span class="bopt-btn-text"><?php esc_html_e( 'Inquiries', 'mobile-pasal' ); ?></span>
					<?php if ( $unread_inquiries > 0 ) : ?>
						<span class="bopt-badge-pill"><?php echo esc_html( $unread_inquiries ); ?></span>
					<?php endif; ?>
				</a>

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
					<input type="text" id="boptSearchInput" placeholder="<?php esc_attr_e( 'Filter settings (e.g. WhatsApp, Slider, iPhone)...', 'mobile-pasal' ); ?>" autocomplete="off" />
					<button type="button" id="boptSearchClear" class="bopt-search-clear" style="display:none;" title="<?php esc_attr_e( 'Clear filter', 'mobile-pasal' ); ?>">
						<i class="fa-solid fa-xmark"></i>
					</button>
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
										<a href="#tab-<?php echo esc_attr( $tab_key ); ?>" class="bopt-nav-link" data-tab="<?php echo esc_attr( $tab_key ); ?>">
											<i class="fa-solid <?php echo esc_attr( $tab_data['icon'] ); ?>"></i>
											<span class="bopt-nav-label"><?php echo esc_html( $tab_data['label'] ); ?></span>
										</a>
									</li>
								<?php endforeach; ?>
							</ul>
						</div>
					<?php endforeach; ?>
				</nav>

				<div class="bopt-sidebar-footer">
					<button type="button" class="bopt-accordion-toggle-all" id="boptToggleAllAccordions">
						<i class="fa-solid fa-angles-up"></i> <?php esc_html_e( 'Toggle All Modules', 'mobile-pasal' ); ?>
					</button>
					<div class="bopt-quick-tip">
						<i class="fa-solid fa-lightbulb"></i>
						<span><?php esc_html_e( 'Tip: Press Ctrl+S anytime to save changes instantly.', 'mobile-pasal' ); ?></span>
					</div>
				</div>

			</aside>

			<div class="bopt-drawer-overlay" id="boptDrawerOverlay"></div>

			<!-- Main Settings Canvas -->
			<main class="bopt-content">

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
									mp_render_field_image( 'site_logo', __( 'Custom Header Logo', 'mobile-pasal' ), __( 'Recommended size: 240x60px transparent PNG or SVG. If empty, the stylized brand typography renders automatically.' ) );
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
									mp_render_field_toggle( 'header_search_enabled', __( 'Enable Search Button', 'mobile-pasal' ), __( 'Displays the search trigger in the header menu.' ) );
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
								<div class="bopt-card-header-icon"><i class="fa-solid fa-bullhorn"></i></div>
								<div>
									<h3 class="bopt-card-title"><?php esc_html_e( 'Counter Open Alert Banner', 'mobile-pasal' ); ?></h3>
									<p class="bopt-card-desc"><?php esc_html_e( 'Full-width banner appearing right above the footer columns.', 'mobile-pasal' ); ?></p>
								</div>
							</div>
							<div class="bopt-card-body">
								<div class="bopt-field-grid">
									<?php
									mp_render_field_text( 'footer_alert_title', __( 'Alert Banner Title', 'mobile-pasal' ), __( 'Default: Gulariya Counter Open Today.' ) );
									mp_render_field_textarea( 'footer_alert_desc', __( 'Alert Banner Description', 'mobile-pasal' ), __( 'Default: Walk in anytime between 9:00 AM and 8:00 PM at Ji. Pra. Ka. Chowk...' ), 2 );
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
							<h2><?php esc_html_e( 'Homepage Hero Showcase (3 Complete Slides)', 'mobile-pasal' ); ?></h2>
							<p><?php esc_html_e( 'Customize all 3 rotating slides: Flagship Handsets, Apple Fix Lab, and Original Accessories.', 'mobile-pasal' ); ?></p>
						</div>

						<!-- Subnav Segmented Pills for Fast Zero-Scroll Editing -->
						<div class="bopt-subnav-pills">
							<button type="button" class="bopt-subnav-pill is-active" data-subtab="subtab-hero-1">
								<i class="fa-solid fa-mobile-screen"></i>
								<span><?php esc_html_e( 'Slide 1: Flagship Handsets', 'mobile-pasal' ); ?></span>
							</button>
							<button type="button" class="bopt-subnav-pill" data-subtab="subtab-hero-2">
								<i class="fa-solid fa-screwdriver-wrench"></i>
								<span><?php esc_html_e( 'Slide 2: Apple Fix Lab', 'mobile-pasal' ); ?></span>
							</button>
							<button type="button" class="bopt-subnav-pill" data-subtab="subtab-hero-3">
								<i class="fa-solid fa-headphones"></i>
								<span><?php esc_html_e( 'Slide 3: Genuine Gear', 'mobile-pasal' ); ?></span>
							</button>
						</div>

						<!-- Slide 1 Content -->
						<div class="bopt-subnav-content is-active" id="subtab-hero-1">
							<div class="bopt-card">
								<div class="bopt-card-header">
									<div class="bopt-card-header-left">
										<div class="bopt-card-header-icon"><i class="fa-solid fa-mobile-screen"></i></div>
										<div>
											<h3 class="bopt-card-title"><?php esc_html_e( 'Hero Slide 1: Flagship Handset Showcase', 'mobile-pasal' ); ?></h3>
											<p class="bopt-card-desc"><?php esc_html_e( 'Highlights official NTA smartphones (iPhone 16, Galaxy S24, Pixel 9, OnePlus).', 'mobile-pasal' ); ?></p>
										</div>
									</div>
									<button type="button" class="bopt-card-toggle-btn" aria-label="Toggle section"><i class="fa-solid fa-chevron-up"></i></button>
								</div>
								<div class="bopt-card-body">
									<div class="bopt-field-grid">
										<?php
										mp_render_field_text( 'hero_slide1_badge', __( 'Slide 1 Pill Badge', 'mobile-pasal' ), __( 'e.g. 100% Genuine Sealed Stock' ) );
										mp_render_field_text( 'hero_slide1_title', __( 'Slide 1 Title Line 1', 'mobile-pasal' ), __( 'e.g. Official NTA Smartphones &' ) );
										mp_render_field_text( 'hero_slide1_title_highlight', __( 'Slide 1 Title Highlight (Gradient Text)', 'mobile-pasal' ), __( 'e.g. Genuine Gear.' ) );
										mp_render_field_textarea( 'hero_slide1_subtitle', __( 'Slide 1 Subtitle / Description', 'mobile-pasal' ), __( 'Explains genuine IMEI bill, warranty support, and free data transfer.' ), 3 );
										mp_render_field_text( 'hero_slide1_btn1_text', __( 'Slide 1 Button 1 Text', 'mobile-pasal' ), __( 'e.g. Filter Handsets Below' ) );
										mp_render_field_text( 'hero_slide1_btn1_url', __( 'Slide 1 Button 1 URL', 'mobile-pasal' ), __( 'e.g. #catalog or page URL' ) );
										mp_render_field_text( 'hero_slide1_btn2_text', __( 'Slide 1 Button 2 Text', 'mobile-pasal' ), __( 'e.g. Ask Today\'s Counter Price' ) );
										mp_render_field_text( 'hero_slide1_btn2_url', __( 'Slide 1 Button 2 WhatsApp Link', 'mobile-pasal' ), __( 'Direct WhatsApp prefilled inquiry URL' ) );
										mp_render_field_text( 'hero_slide1_telemetry_model', __( 'Floating Telemetry Pill: Model', 'mobile-pasal' ), __( 'e.g. iPhone 16 Series' ) );
										mp_render_field_text( 'hero_slide1_telemetry_status', __( 'Floating Telemetry Pill: Status', 'mobile-pasal' ), __( 'e.g. In Stock Now' ) );
										mp_render_field_image( 'hero_slide1_image', __( 'Slide 1 Handset Image', 'mobile-pasal' ), __( 'Transparent PNG or JPG of flagship handset in hand.' ) );
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
											<h3 class="bopt-card-title"><?php esc_html_e( 'Hero Slide 2: Certified Apple Fix Lab', 'mobile-pasal' ); ?></h3>
											<p class="bopt-card-desc"><?php esc_html_e( 'Showcases microscope repair bench, true-tone calibrations, and screen swaps.', 'mobile-pasal' ); ?></p>
										</div>
									</div>
									<button type="button" class="bopt-card-toggle-btn" aria-label="Toggle section"><i class="fa-solid fa-chevron-up"></i></button>
								</div>
								<div class="bopt-card-body">
									<div class="bopt-field-grid">
										<?php
										mp_render_field_text( 'hero_slide2_badge', __( 'Slide 2 Pill Badge', 'mobile-pasal' ), __( 'e.g. Certified Apple Fix Lab' ) );
										mp_render_field_text( 'hero_slide2_title', __( 'Slide 2 Title Line 1', 'mobile-pasal' ), __( 'e.g. Gulariya\'s Premier' ) );
										mp_render_field_text( 'hero_slide2_title_highlight', __( 'Slide 2 Title Highlight (Gradient Text)', 'mobile-pasal' ), __( 'e.g. Apple Fix & Lab.' ) );
										mp_render_field_textarea( 'hero_slide2_subtitle', __( 'Slide 2 Subtitle / Description', 'mobile-pasal' ), __( 'Explains microscope micro-soldering, true-tone OLED swaps, and battery health.' ), 3 );
										mp_render_field_text( 'hero_slide2_btn1_text', __( 'Slide 2 Button 1 Text', 'mobile-pasal' ), __( 'e.g. Interactive Repair Estimator' ) );
										mp_render_field_text( 'hero_slide2_btn1_url', __( 'Slide 2 Button 1 URL', 'mobile-pasal' ), __( 'e.g. #repair-builder' ) );
										mp_render_field_text( 'hero_slide2_btn2_text', __( 'Slide 2 Button 2 Text', 'mobile-pasal' ), __( 'e.g. Direct WhatsApp Help' ) );
										mp_render_field_text( 'hero_slide2_btn2_url', __( 'Slide 2 Button 2 WhatsApp Link', 'mobile-pasal' ), __( 'Direct WhatsApp repair consultation URL' ) );
										mp_render_field_text( 'hero_slide2_telemetry_time', __( 'Floating Telemetry Pill: Time', 'mobile-pasal' ), __( 'e.g. 30–45 Mins Average' ) );
										mp_render_field_text( 'hero_slide2_telemetry_station', __( 'Floating Telemetry Pill: Station', 'mobile-pasal' ), __( 'e.g. Counter Diagnostic' ) );
										mp_render_field_image( 'hero_slide2_image', __( 'Slide 2 Bench Image', 'mobile-pasal' ), __( 'High quality photo of technician bench or microscope.' ) );
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
										<div class="bopt-card-header-icon"><i class="fa-solid fa-shield-halved"></i></div>
										<div>
											<h3 class="bopt-card-title"><?php esc_html_e( 'Hero Slide 3: Original Audio, Power & Protection', 'mobile-pasal' ); ?></h3>
											<p class="bopt-card-desc"><?php esc_html_e( 'Showcases AirPods Pro, MagSafe 20W/65W GaN adapters, and drop cases.', 'mobile-pasal' ); ?></p>
										</div>
									</div>
									<button type="button" class="bopt-card-toggle-btn" aria-label="Toggle section"><i class="fa-solid fa-chevron-up"></i></button>
								</div>
								<div class="bopt-card-body">
									<div class="bopt-field-grid">
										<?php
										mp_render_field_text( 'hero_slide3_badge', __( 'Slide 3 Pill Badge', 'mobile-pasal' ), __( 'e.g. 100% Genuine Accessories' ) );
										mp_render_field_text( 'hero_slide3_title', __( 'Slide 3 Title Line 1', 'mobile-pasal' ), __( 'e.g. 100% Original Audio,' ) );
										mp_render_field_text( 'hero_slide3_title_highlight', __( 'Slide 3 Title Highlight (Gradient Text)', 'mobile-pasal' ), __( 'e.g. Power & Protection.' ) );
										mp_render_field_textarea( 'hero_slide3_subtitle', __( 'Slide 3 Subtitle / Description', 'mobile-pasal' ), __( 'Explains MagSafe chargers, 65W GaN dual-port adapters, and AirPods Pro 2.' ), 3 );
										mp_render_field_text( 'hero_slide3_btn1_text', __( 'Slide 3 Button 1 Text', 'mobile-pasal' ), __( 'e.g. Browse Accessories' ) );
										mp_render_field_text( 'hero_slide3_btn1_url', __( 'Slide 3 Button 1 URL', 'mobile-pasal' ), __( 'e.g. #categories' ) );
										mp_render_field_text( 'hero_slide3_btn2_text', __( 'Slide 3 Button 2 Text', 'mobile-pasal' ), __( 'e.g. Check Counter Stock' ) );
										mp_render_field_text( 'hero_slide3_btn2_url', __( 'Slide 3 Button 2 WhatsApp Link', 'mobile-pasal' ), __( 'Direct WhatsApp inquiry URL' ) );
										mp_render_field_text( 'hero_slide3_telemetry_brands', __( 'Floating Telemetry Pill: Brands', 'mobile-pasal' ), __( 'e.g. Apple • Samsung • Anker' ) );
										mp_render_field_text( 'hero_slide3_telemetry_pay', __( 'Floating Telemetry Pill: Pay', 'mobile-pasal' ), __( 'e.g. Cash & Digital Pay' ) );
										mp_render_field_image( 'hero_slide3_image', __( 'Slide 3 Accessories Shelf Image', 'mobile-pasal' ), __( 'Photo of genuine accessories shelf or charging gear.' ) );
										?>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- 2.2 Estimator -->
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

					<!-- 2.3 Bento Categories & Brands -->
					<div class="bopt-tab-pane <?php echo $active_tab === 'categories_brands_sec' ? 'is-active' : ''; ?>" id="tab-pane-categories_brands_sec">
						<div class="bopt-pane-header">
							<h2><?php esc_html_e( 'Bento Categories & Authorized Brands Showcase', 'mobile-pasal' ); ?></h2>
							<p><?php esc_html_e( 'Manage the 4 interactive Bento department cards and authorized brand distributor strip.', 'mobile-pasal' ); ?></p>
						</div>

						<div class="bopt-card">
							<div class="bopt-card-header">
								<div class="bopt-card-header-icon"><i class="fa-solid fa-layer-group"></i></div>
								<div>
									<h3 class="bopt-card-title"><?php esc_html_e( '4 Bento Department Cards', 'mobile-pasal' ); ?></h3>
									<p class="bopt-card-desc"><?php esc_html_e( 'Visual Bento grid for Smartphones, Apple Fix Lab, Audio/Power, and iPads.', 'mobile-pasal' ); ?></p>
								</div>
							</div>
							<div class="bopt-card-body">
								<div class="bopt-field-grid">
									<?php
									mp_render_field_text( 'categories_kicker', __( 'Bento Section Kicker', 'mobile-pasal' ), __( 'Default: Complete Store Department' ) );
									mp_render_field_text( 'categories_title', __( 'Bento Section Title', 'mobile-pasal' ), __( 'Default: Shop by Device Category' ) );
									mp_render_field_textarea( 'categories_subtitle', __( 'Bento Section Subtitle', 'mobile-pasal' ), __( 'Default: Every handset is sealed, verified with NTA, and backed by manufacturer warranty.' ), 2 );
									?>
									<div class="bopt-divider"><span><?php esc_html_e( 'Card 1: Flagship Smartphones', 'mobile-pasal' ); ?></span></div>
									<?php
									mp_render_field_text( 'cat1_title', __( 'Bento 1 Title', 'mobile-pasal' ), __( 'Default: Flagship Smartphones' ) );
									mp_render_field_text( 'cat1_count', __( 'Bento 1 Count Label', 'mobile-pasal' ), __( 'Default: 18+ Handset Models' ) );
									mp_render_field_image( 'cat1_image', __( 'Bento 1 Image', 'mobile-pasal' ), __( 'Image of flagship smartphone' ) );
									?>
									<div class="bopt-divider"><span><?php esc_html_e( 'Card 2: Certified Apple Fix Lab', 'mobile-pasal' ); ?></span></div>
									<?php
									mp_render_field_text( 'cat2_title', __( 'Bento 2 Title', 'mobile-pasal' ), __( 'Default: Certified Apple Fix' ) );
									mp_render_field_text( 'cat2_count', __( 'Bento 2 Count Label', 'mobile-pasal' ), __( 'Default: Microscope Lab Services' ) );
									mp_render_field_image( 'cat2_image', __( 'Bento 2 Image', 'mobile-pasal' ), __( 'Image of cleanroom microscope bench' ) );
									?>
									<div class="bopt-divider"><span><?php esc_html_e( 'Card 3: Audio & Power Gear', 'mobile-pasal' ); ?></span></div>
									<?php
									mp_render_field_text( 'cat3_title', __( 'Bento 3 Title', 'mobile-pasal' ), __( 'Default: Audio & Power Gear' ) );
									mp_render_field_text( 'cat3_count', __( 'Bento 3 Count Label', 'mobile-pasal' ), __( 'Default: AirPods, GaN & MagSafe' ) );
									mp_render_field_image( 'cat3_image', __( 'Bento 3 Image', 'mobile-pasal' ), __( 'Image of charging accessories or AirPods' ) );
									?>
									<div class="bopt-divider"><span><?php esc_html_e( 'Card 4: iPads & Tablets', 'mobile-pasal' ); ?></span></div>
									<?php
									mp_render_field_text( 'cat4_title', __( 'Bento 4 Title', 'mobile-pasal' ), __( 'Default: iPads & Tablets' ) );
									mp_render_field_text( 'cat4_count', __( 'Bento 4 Count Label', 'mobile-pasal' ), __( 'Default: Apple & Samsung Displays' ) );
									mp_render_field_image( 'cat4_image', __( 'Bento 4 Image', 'mobile-pasal' ), __( 'Image of iPad Air / Pro' ) );
									?>
								</div>
							</div>
						</div>

						<div class="bopt-card">
							<div class="bopt-card-header">
								<div class="bopt-card-header-icon"><i class="fa-solid fa-award"></i></div>
								<div>
									<h3 class="bopt-card-title"><?php esc_html_e( 'Authorized Showroom Brands Section', 'mobile-pasal' ); ?></h3>
									<p class="bopt-card-desc"><?php esc_html_e( 'Headers for Apple, Samsung, Google Pixel, OnePlus, and Xiaomi showcase.', 'mobile-pasal' ); ?></p>
								</div>
							</div>
							<div class="bopt-card-body">
								<div class="bopt-field-grid">
									<?php
									mp_render_field_text( 'brands_kicker', __( 'Brands Section Kicker', 'mobile-pasal' ), __( 'Default: Official Showroom Distributors' ) );
									mp_render_field_text( 'brands_title', __( 'Brands Section Title', 'mobile-pasal' ), __( 'Default: Shop by Verified Brand' ) );
									mp_render_field_textarea( 'brands_subtitle', __( 'Brands Section Subtitle', 'mobile-pasal' ), __( 'Default: Authentic distributor warranties across Nepal for Apple, Samsung, Google Pixel, OnePlus, and Xiaomi.' ), 2 );
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
									<p class="bopt-card-desc"><?php esc_html_e( 'Showcase the latest titanium flagship handset with hardware specs.', 'mobile-pasal' ); ?></p>
								</div>
							</div>
							<div class="bopt-card-body">
								<div class="bopt-field-grid">
									<?php
									mp_render_field_text( 'spotlight_badge', __( 'Spotlight Pill Badge', 'mobile-pasal' ), __( 'Default: Featured Flagship in Gulariya' ) );
									mp_render_field_text( 'spotlight_title', __( 'Spotlight Title', 'mobile-pasal' ), __( 'Default: iPhone 16 Pro & Pro Max' ) );
									mp_render_field_textarea( 'spotlight_subtitle', __( 'Spotlight Description', 'mobile-pasal' ), __( 'Default: Grade 5 Titanium design with thinner borders, A18 Pro silicon chip...' ), 3 );
									mp_render_field_text( 'spotlight_chip', __( 'Hardware Spec: Chip', 'mobile-pasal' ), __( 'Default: A18 Pro Silicon' ) );
									mp_render_field_text( 'spotlight_display', __( 'Hardware Spec: Display', 'mobile-pasal' ), __( 'Default: 6.3" & 6.9" Super Retina XDR' ) );
									mp_render_field_text( 'spotlight_finish', __( 'Hardware Spec: Finish', 'mobile-pasal' ), __( 'Default: Desert, Natural, White, Black Titanium' ) );
									mp_render_field_text( 'spotlight_camera', __( 'Hardware Spec: Camera', 'mobile-pasal' ), __( 'Default: 48MP Fusion + 5x Telephoto' ) );
									mp_render_field_text( 'spotlight_price_text', __( 'Counter Rate Note', 'mobile-pasal' ), __( 'Default: Counter Inquiry Available' ) );
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
									<p class="bopt-card-desc"><?php esc_html_e( 'Highlight local repair capabilities: no courier delays to Nepalgunj.', 'mobile-pasal' ); ?></p>
								</div>
							</div>
							<div class="bopt-card-body">
								<div class="bopt-field-grid">
									<?php
									mp_render_field_text( 'lab_kicker', __( 'Lab Section Kicker', 'mobile-pasal' ), __( 'Default: Cleanroom Bench Setup' ) );
									mp_render_field_text( 'lab_title', __( 'Lab Section Title', 'mobile-pasal' ), __( 'Default: Precision Microscope Level Repairs Right in Gulariya' ) );
									mp_render_field_textarea( 'lab_subtitle', __( 'Lab Section Subtitle', 'mobile-pasal' ), __( 'Default: We do not courier your valuable phone to Nepalgunj or Kathmandu...' ), 3 );
									mp_render_field_text( 'lab_stat1_num', __( 'Lab Metric 1 Number', 'mobile-pasal' ), __( 'Default: 10,000+' ) );
									mp_render_field_text( 'lab_stat1_label', __( 'Lab Metric 1 Label', 'mobile-pasal' ), __( 'Default: Repairs Handled' ) );
									mp_render_field_text( 'lab_stat2_num', __( 'Lab Metric 2 Number', 'mobile-pasal' ), __( 'Default: 98.5%' ) );
									mp_render_field_text( 'lab_stat2_label', __( 'Lab Metric 2 Label', 'mobile-pasal' ), __( 'Default: Success Rate' ) );
									mp_render_field_text( 'lab_stat3_num', __( 'Lab Metric 3 Number', 'mobile-pasal' ), __( 'Default: 45 Min' ) );
									mp_render_field_text( 'lab_stat3_label', __( 'Lab Metric 3 Label', 'mobile-pasal' ), __( 'Default: Screen Turnaround' ) );
									mp_render_field_image( 'lab_image', __( 'Lab Showcase Image', 'mobile-pasal' ), __( 'Photo of technician repair hands or stereomicroscope' ) );
									?>
								</div>
							</div>
						</div>
					</div>

					<!-- 2.5 Reviews & Map -->
					<div class="bopt-tab-pane <?php echo $active_tab === 'reviews_map_sec' ? 'is-active' : ''; ?>" id="tab-pane-reviews_map_sec">
						<div class="bopt-pane-header">
							<h2><?php esc_html_e( 'Customer Reviews & Counter Location Section', 'mobile-pasal' ); ?></h2>
							<p><?php esc_html_e( 'Manage the five-star customer feedback headers and Google Maps counter visit section.', 'mobile-pasal' ); ?></p>
						</div>

						<div class="bopt-card">
							<div class="bopt-card-header">
								<div class="bopt-card-header-icon"><i class="fa-solid fa-comments"></i></div>
								<div>
									<h3 class="bopt-card-title"><?php esc_html_e( 'Customer Reviews Header', 'mobile-pasal' ); ?></h3>
									<p class="bopt-card-desc"><?php esc_html_e( 'Manage verified customer review titles and ratings overview.', 'mobile-pasal' ); ?></p>
								</div>
							</div>
							<div class="bopt-card-body">
								<div class="bopt-field-grid">
									<?php
									mp_render_field_text( 'reviews_kicker', __( 'Reviews Section Kicker', 'mobile-pasal' ), __( 'Default: Verified Bardiya Buyers & Repair Patrons' ) );
									mp_render_field_text( 'reviews_title', __( 'Reviews Section Title', 'mobile-pasal' ), __( 'Default: Trusted by Thousands Across Bardiya' ) );
									mp_render_field_textarea( 'reviews_subtitle', __( 'Reviews Section Subtitle', 'mobile-pasal' ), __( 'Default: Real reviews from phone buyers and repair clients who chose our counter at Ji. Pra. Ka. Chowk.' ), 2 );
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

						<div class="bopt-card">
							<div class="bopt-card-header">
								<div class="bopt-card-header-icon"><i class="fa-solid fa-star"></i></div>
								<div>
									<h3 class="bopt-card-title"><?php esc_html_e( 'Shop Spotlight Inventory Card (Right Column)', 'mobile-pasal' ); ?></h3>
									<p class="bopt-card-desc"><?php esc_html_e( 'Live counter inventory metrics and tag pills displayed beside the hero.', 'mobile-pasal' ); ?></p>
								</div>
							</div>
							<div class="bopt-card-body">
								<div class="bopt-field-grid">
									<div class="bopt-field-col-2">
										<?php
										mp_render_field_text( 'shop_spotlight_badge', __( 'Card Badge', 'mobile-pasal' ), __( 'Default: Showroom Live Inventory' ) );
										mp_render_field_text( 'shop_spotlight_subtitle', __( 'Location Subtitle', 'mobile-pasal' ), __( 'Default: Gulariya Counter' ) );
										?>
									</div>
									<div class="bopt-field-col-2">
										<?php
										mp_render_field_text( 'shop_spotlight_m1_label', __( 'Metric 1 Label', 'mobile-pasal' ), __( 'Default: NTA Registration' ) );
										mp_render_field_text( 'shop_spotlight_m1_val', __( 'Metric 1 Value', 'mobile-pasal' ), __( 'Default: 100% Verified Bill' ) );
										?>
									</div>
									<div class="bopt-field-col-2">
										<?php
										mp_render_field_text( 'shop_spotlight_m2_label', __( 'Metric 2 Label', 'mobile-pasal' ), __( 'Default: Data Migration' ) );
										mp_render_field_text( 'shop_spotlight_m2_val', __( 'Metric 2 Value', 'mobile-pasal' ), __( 'Default: FREE Walk-In Setup' ) );
										?>
									</div>
									<div class="bopt-field-col-2">
										<?php
										mp_render_field_text( 'shop_spotlight_m3_label', __( 'Metric 3 Label', 'mobile-pasal' ), __( 'Default: Old Device Trade-In' ) );
										mp_render_field_text( 'shop_spotlight_m3_val', __( 'Metric 3 Value', 'mobile-pasal' ), __( 'Default: Instant Valuation' ) );
										?>
									</div>
									<div class="bopt-field-col-2">
										<?php
										mp_render_field_text( 'shop_spotlight_m4_label', __( 'Metric 4 Label', 'mobile-pasal' ), __( 'Default: Top Flagships' ) );
										mp_render_field_text( 'shop_spotlight_m4_val', __( 'Metric 4 Value', 'mobile-pasal' ), __( 'Default: In Stock Today' ) );
										?>
									</div>
									<?php
									mp_render_field_text( 'shop_spotlight_tags', __( 'Brand Tag Pills (comma-separated)', 'mobile-pasal' ), __( 'Default: Apple iPhone, Samsung Galaxy, Google Pixel, OnePlus, Xiaomi' ) );
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
										mp_render_field_text( 'assurance1_title', __( 'Card 1 Title', 'mobile-pasal' ), __( 'Default: 100% NTA Approved' ) );
										mp_render_field_textarea( 'assurance1_desc', __( 'Card 1 Description', 'mobile-pasal' ), __( 'Default: Compliant with Nepal Telecommunications Authority IMEI registration for uninterrupted MDMS cellular service across Nepal.' ), 2 );
										mp_render_field_text( 'assurance1_tag', __( 'Card 1 Footer Pill Tag', 'mobile-pasal' ), __( 'Default: MDMS Verified' ) );
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
										mp_render_field_text( 'assurance2_title', __( 'Card 2 Title', 'mobile-pasal' ), __( 'Default: Official VAT Bill' ) );
										mp_render_field_textarea( 'assurance2_desc', __( 'Card 2 Description', 'mobile-pasal' ), __( 'Default: Every single handset comes with an authorized commercial VAT serial bill enabling legitimate distributor warranty claims.' ), 2 );
										mp_render_field_text( 'assurance2_tag', __( 'Card 2 Footer Pill Tag', 'mobile-pasal' ), __( 'Default: Genuine Bill' ) );
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
										mp_render_field_text( 'assurance3_title', __( 'Card 3 Title', 'mobile-pasal' ), __( 'Default: Free Data Transfer' ) );
										mp_render_field_textarea( 'assurance3_desc', __( 'Card 3 Description', 'mobile-pasal' ), __( 'Default: We safely migrate your WhatsApp chats, photos, contacts, and mobile apps directly to your new phone before you leave.' ), 2 );
										mp_render_field_text( 'assurance3_tag', __( 'Card 3 Footer Pill Tag', 'mobile-pasal' ), __( 'Default: Walk-In Setup' ) );
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
										mp_render_field_text( 'assurance4_title', __( 'Card 4 Title', 'mobile-pasal' ), __( 'Default: Trade-In Counter' ) );
										mp_render_field_textarea( 'assurance4_desc', __( 'Card 4 Description', 'mobile-pasal' ), __( 'Default: Bring your old handset for fair, transparent counter evaluation toward the purchase of any new smartphone.' ), 2 );
										mp_render_field_text( 'assurance4_tag', __( 'Card 4 Footer Pill Tag', 'mobile-pasal' ), __( 'Default: Instant Valuation' ) );
										?>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- 3.3 Inventory CPT Quick Actions -->
					<div class="bopt-tab-pane <?php echo $active_tab === 'shop_inventory_tab' ? 'is-active' : ''; ?>" id="tab-pane-shop_inventory_tab">
						<div class="bopt-pane-header">
							<h2><?php esc_html_e( 'Handset Showroom Inventory CPT Shortcuts', 'mobile-pasal' ); ?></h2>
							<p><?php esc_html_e( 'Quick executive shortcuts to manage your live handset products, brands, and price tags.', 'mobile-pasal' ); ?></p>
						</div>

						<div class="bopt-cpt-action-box">
							<div class="bopt-cpt-action-info">
								<div class="bopt-cpt-action-icon"><i class="fa-solid fa-mobile-screen"></i></div>
								<div>
									<strong><?php esc_html_e( 'Showroom Handset Products Database', 'mobile-pasal' ); ?></strong>
									<p><?php esc_html_e( 'Manage smartphone specs, NTA verification tags, official price, and counter stock status.', 'mobile-pasal' ); ?></p>
								</div>
							</div>
							<div class="bopt-cpt-action-links">
								<a href="<?php echo esc_url( admin_url( 'post-new.php?post_type=handset' ) ); ?>" class="bopt-btn-gold-action">
									<i class="fa-solid fa-plus"></i> <?php esc_html_e( 'Add New Handset', 'mobile-pasal' ); ?>
								</a>
								<a href="<?php echo esc_url( admin_url( 'edit.php?post_type=handset' ) ); ?>" class="bopt-btn-gold-action" style="background:#1e293b;border:1px solid #334155;">
									<i class="fa-solid fa-list"></i> <?php esc_html_e( 'View All Handsets', 'mobile-pasal' ); ?>
								</a>
							</div>
						</div>

						<?php
						$handset_query = get_posts( array(
							'post_type'      => 'handset',
							'posts_per_page' => 12,
							'post_status'    => 'publish',
							'orderby'        => 'date',
							'order'          => 'DESC',
						) );
						?>
						<div class="bopt-cpt-grid">
							<?php if ( ! empty( $handset_query ) ) : ?>
								<?php foreach ( $handset_query as $h_post ) :
									$h_price   = get_post_meta( $h_post->ID, '_mp_price', true );
									$h_stock   = get_post_meta( $h_post->ID, '_mp_stock_status', true ) ?: 'in_stock';
									$h_badge   = get_post_meta( $h_post->ID, '_mp_badge', true );
									$thumb_url = get_the_post_thumbnail_url( $h_post->ID, 'medium' );
									$brands    = wp_get_post_terms( $h_post->ID, 'device_brand', array( 'fields' => 'names' ) );
									$brand_str = ! empty( $brands ) ? implode( ', ', $brands ) : '';
								?>
									<div class="bopt-cpt-card">
										<div>
											<div class="bopt-cpt-card-top">
												<div class="bopt-cpt-card-thumb" <?php echo $thumb_url ? 'style="background-image:url(\'' . esc_url( $thumb_url ) . '\'); background-size:contain; background-repeat:no-repeat;"' : ''; ?>>
													<?php if ( ! $thumb_url ) : ?>
														<i class="fa-solid fa-mobile-screen"></i>
													<?php endif; ?>
												</div>
												<div style="flex:1; min-width:0;">
													<h4 class="bopt-cpt-card-title"><?php echo esc_html( $h_post->post_title ); ?></h4>
													<?php if ( $brand_str ) : ?>
														<div class="bopt-cpt-card-meta"><i class="fa-solid fa-tag"></i> <?php echo esc_html( $brand_str ); ?></div>
													<?php endif; ?>
												</div>
											</div>
											<div style="display:flex; align-items:center; justify-content:space-between; margin-top:8px;">
												<div class="bopt-cpt-card-price"><?php echo esc_html( $h_price ? $h_price : 'Price on Call' ); ?></div>
												<span class="bopt-cpt-card-badge <?php echo esc_attr( $h_stock ); ?>">
													<?php
													$stock_labels = array(
														'in_stock'     => __( 'In Stock', 'mobile-pasal' ),
														'low_stock'    => __( 'Low Stock', 'mobile-pasal' ),
														'pre_order'    => __( 'Pre-Order', 'mobile-pasal' ),
														'out_of_stock' => __( 'Out of Stock', 'mobile-pasal' ),
													);
													echo esc_html( isset( $stock_labels[ $h_stock ] ) ? $stock_labels[ $h_stock ] : $h_stock );
													?>
												</span>
											</div>
										</div>
										<div class="bopt-cpt-card-actions">
											<a href="<?php echo esc_url( get_edit_post_link( $h_post->ID ) ); ?>" class="bopt-btn-action-small bopt-btn-edit">
												<i class="fa-solid fa-pen-to-square"></i> <?php esc_html_e( 'Edit Handset', 'mobile-pasal' ); ?>
											</a>
											<a href="<?php echo esc_url( get_permalink( $h_post->ID ) ); ?>" target="_blank" class="bopt-btn-action-small bopt-btn-view">
												<i class="fa-solid fa-arrow-up-right-from-square"></i> <?php esc_html_e( 'View', 'mobile-pasal' ); ?>
											</a>
										</div>
									</div>
								<?php endforeach; ?>
							<?php else : ?>
								<div class="bopt-empty-cpt-box">
									<i class="fa-solid fa-box-open"></i>
									<p><?php esc_html_e( 'No showroom handsets found in your catalog. Tap "Add New Handset" above to stock your first phone!', 'mobile-pasal' ); ?></p>
								</div>
							<?php endif; ?>
						</div>
					</div>

					<!-- ===================================================================
					     GROUP 4: APPLE FIX LAB & SERVICES
					     =================================================================== -->

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

						<div class="bopt-card">
							<div class="bopt-card-header">
								<div class="bopt-card-header-icon"><i class="fa-solid fa-microscope"></i></div>
								<div>
									<h3 class="bopt-card-title"><?php esc_html_e( 'Services Spotlight Desk Card (Right Column)', 'mobile-pasal' ); ?></h3>
									<p class="bopt-card-desc"><?php esc_html_e( 'Bench metrics displayed beside the hero on /services.', 'mobile-pasal' ); ?></p>
								</div>
							</div>
							<div class="bopt-card-body">
								<div class="bopt-field-grid">
									<div class="bopt-field-col-2">
										<?php
										mp_render_field_text( 'services_spotlight_badge', __( 'Card Badge', 'mobile-pasal' ), __( 'Default: Bench Handover Desk' ) );
										mp_render_field_text( 'services_spotlight_sub', __( 'Location Subtitle', 'mobile-pasal' ), __( 'Default: Gulariya-06' ) );
										?>
									</div>
									<div class="bopt-field-col-2">
										<?php
										mp_render_field_text( 'services_spotlight_m1_label', __( 'Metric 1 Label', 'mobile-pasal' ), __( 'Default: Walk-in Diagnosis' ) );
										mp_render_field_text( 'services_spotlight_m1_val', __( 'Metric 1 Value', 'mobile-pasal' ), __( 'Default: FREE (5-Min Check)' ) );
										?>
									</div>
									<div class="bopt-field-col-2">
										<?php
										mp_render_field_text( 'services_spotlight_m2_label', __( 'Metric 2 Label', 'mobile-pasal' ), __( 'Default: Average Turnaround' ) );
										mp_render_field_text( 'services_spotlight_m2_val', __( 'Metric 2 Value', 'mobile-pasal' ), __( 'Default: 30–45 Mins' ) );
										?>
									</div>
									<div class="bopt-field-col-2">
										<?php
										mp_render_field_text( 'services_spotlight_m3_label', __( 'Metric 3 Label', 'mobile-pasal' ), __( 'Default: Replacement Parts' ) );
										mp_render_field_text( 'services_spotlight_m3_val', __( 'Metric 3 Value', 'mobile-pasal' ), __( 'Default: 100% Certified Grade' ) );
										?>
									</div>
									<div class="bopt-field-col-2">
										<?php
										mp_render_field_text( 'services_spotlight_m4_label', __( 'Metric 4 Label', 'mobile-pasal' ), __( 'Default: Counter Warranty' ) );
										mp_render_field_text( 'services_spotlight_m4_val', __( 'Metric 4 Value', 'mobile-pasal' ), __( 'Default: 90 Days Testing Warranty' ) );
										?>
									</div>
								</div>
							</div>
						</div>

						<div class="bopt-card">
							<div class="bopt-card-header">
								<div class="bopt-card-header-icon"><i class="fa-solid fa-ribbon"></i></div>
								<div>
									<h3 class="bopt-card-title"><?php esc_html_e( 'Services Micro-Ribbon 4 Quick Features', 'mobile-pasal' ); ?></h3>
									<p class="bopt-card-desc"><?php esc_html_e( 'Horizontal banner icons and badges below hero.', 'mobile-pasal' ); ?></p>
								</div>
							</div>
							<div class="bopt-card-body">
								<div class="bopt-field-grid">
									<div class="bopt-field-col-2">
										<?php
										mp_render_field_text( 'services_ribbon_1', __( 'Ribbon Item 1', 'mobile-pasal' ), __( 'Default: Component-Level Micro-Soldering' ) );
										mp_render_field_text( 'services_ribbon_2', __( 'Ribbon Item 2', 'mobile-pasal' ), __( 'Default: TrueTone & FaceID Transfer' ) );
										?>
									</div>
									<div class="bopt-field-col-2">
										<?php
										mp_render_field_text( 'services_ribbon_3', __( 'Ribbon Item 3', 'mobile-pasal' ), __( 'Default: Ultrasonic Oxidation Bath' ) );
										mp_render_field_text( 'services_ribbon_4', __( 'Ribbon Item 4', 'mobile-pasal' ), __( 'Default: Fast Express Counter Service' ) );
										?>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- 4.2 6 Repair Labs -->
					<div class="bopt-tab-pane <?php echo $active_tab === 'services_labs_tab' ? 'is-active' : ''; ?>" id="tab-pane-services_labs_tab">
						<div class="bopt-pane-header">
							<h2><?php esc_html_e( '6 Repair Lab Workstations & Capabilities', 'mobile-pasal' ); ?></h2>
							<p><?php esc_html_e( 'Manage the descriptions and turnaround times for your 6 core cleanroom repair services.', 'mobile-pasal' ); ?></p>
						</div>

						<div class="bopt-cpt-action-box">
							<div class="bopt-cpt-action-info">
								<div class="bopt-cpt-action-icon"><i class="fa-solid fa-microscope"></i></div>
								<div>
									<strong><?php esc_html_e( 'Repair Services Post Database', 'mobile-pasal' ); ?></strong>
									<p><?php esc_html_e( 'Add or edit individual repair services, warranties, diagnostic pricing, and model compatibility.', 'mobile-pasal' ); ?></p>
								</div>
							</div>
							<div class="bopt-cpt-action-links">
								<a href="<?php echo esc_url( admin_url( 'post-new.php?post_type=repair_service' ) ); ?>" class="bopt-btn-gold-action">
									<i class="fa-solid fa-plus"></i> <?php esc_html_e( 'Add Repair Service', 'mobile-pasal' ); ?>
								</a>
								<a href="<?php echo esc_url( admin_url( 'edit.php?post_type=repair_service' ) ); ?>" class="bopt-btn-gold-action" style="background:#1e293b;border:1px solid #334155;">
									<i class="fa-solid fa-list"></i> <?php esc_html_e( 'View All Services', 'mobile-pasal' ); ?>
								</a>
							</div>
						</div>

						<?php
						$repair_query = get_posts( array(
							'post_type'      => 'repair_service',
							'posts_per_page' => 12,
							'post_status'    => 'publish',
							'orderby'        => 'date',
							'order'          => 'DESC',
						) );
						?>
						<div class="bopt-cpt-grid">
							<?php if ( ! empty( $repair_query ) ) : ?>
								<?php foreach ( $repair_query as $r_post ) :
									$r_price      = get_post_meta( $r_post->ID, '_mp_service_price', true );
									$r_turnaround = get_post_meta( $r_post->ID, '_mp_service_turnaround', true );
									$r_warranty   = get_post_meta( $r_post->ID, '_mp_service_warranty', true );
									$r_icon       = get_post_meta( $r_post->ID, '_mp_service_icon', true );
									$icon_class   = 'fa-screwdriver-wrench';
									switch ( $r_icon ) {
										case 'screen':   $icon_class = 'fa-mobile-screen-button'; break;
										case 'battery':  $icon_class = 'fa-battery-full'; break;
										case 'water':    $icon_class = 'fa-droplet'; break;
										case 'board':    $icon_class = 'fa-microchip'; break;
										case 'camera':   $icon_class = 'fa-camera'; break;
										case 'charging': $icon_class = 'fa-bolt'; break;
										case 'software': $icon_class = 'fa-laptop-code'; break;
									}
								?>
									<div class="bopt-cpt-card">
										<div>
											<div class="bopt-cpt-card-top">
												<div class="bopt-cpt-card-thumb" style="color:#0066cc; font-size:24px;">
													<i class="fa-solid <?php echo esc_attr( $icon_class ); ?>"></i>
												</div>
												<div style="flex:1; min-width:0;">
													<h4 class="bopt-cpt-card-title"><?php echo esc_html( $r_post->post_title ); ?></h4>
													<?php if ( $r_turnaround ) : ?>
														<div class="bopt-cpt-card-meta"><i class="fa-solid fa-clock"></i> <?php echo esc_html( $r_turnaround ); ?></div>
													<?php endif; ?>
												</div>
											</div>
											<div style="display:flex; align-items:center; justify-content:space-between; margin-top:8px;">
												<div class="bopt-cpt-card-price"><?php echo esc_html( $r_price ? $r_price : 'Diagnostic Estimate' ); ?></div>
												<?php if ( $r_warranty ) : ?>
													<span class="bopt-cpt-card-badge in_stock"><i class="fa-solid fa-shield-halved"></i> <?php echo esc_html( $r_warranty ); ?></span>
												<?php endif; ?>
											</div>
										</div>
										<div class="bopt-cpt-card-actions">
											<a href="<?php echo esc_url( get_edit_post_link( $r_post->ID ) ); ?>" class="bopt-btn-action-small bopt-btn-edit">
												<i class="fa-solid fa-pen-to-square"></i> <?php esc_html_e( 'Edit Service', 'mobile-pasal' ); ?>
											</a>
											<a href="<?php echo esc_url( get_permalink( $r_post->ID ) ); ?>" target="_blank" class="bopt-btn-action-small bopt-btn-view">
												<i class="fa-solid fa-arrow-up-right-from-square"></i> <?php esc_html_e( 'View', 'mobile-pasal' ); ?>
											</a>
										</div>
									</div>
								<?php endforeach; ?>
							<?php else : ?>
								<div class="bopt-empty-cpt-box">
									<i class="fa-solid fa-screwdriver-wrench"></i>
									<p><?php esc_html_e( 'No repair services registered. Tap "Add Repair Service" above to build your laboratory menu!', 'mobile-pasal' ); ?></p>
								</div>
							<?php endif; ?>
						</div>
					</div>

					<!-- 4.3 Matrix & Warranty -->
					<div class="bopt-tab-pane <?php echo $active_tab === 'services_matrix_tab' ? 'is-active' : ''; ?>" id="tab-pane-services_matrix_tab">
						<div class="bopt-pane-header">
							<h2><?php esc_html_e( 'Turnaround Pricing Matrix & 90-Day Warranty', 'mobile-pasal' ); ?></h2>
							<p><?php esc_html_e( 'Configure the repair turnaround schedule headers and certified warranty guarantee.', 'mobile-pasal' ); ?></p>
						</div>

						<div class="bopt-card">
							<div class="bopt-card-header">
								<div class="bopt-card-header-icon"><i class="fa-solid fa-shield-halved"></i></div>
								<div>
									<h3 class="bopt-card-title"><?php esc_html_e( '90-Day Cleanroom Warranty Guarantee', 'mobile-pasal' ); ?></h3>
									<p class="bopt-card-desc"><?php esc_html_e( 'Displayed beside the turnaround pricing matrix on /services.', 'mobile-pasal' ); ?></p>
								</div>
							</div>
							<div class="bopt-card-body">
								<div class="bopt-field-grid">
									<?php
									mp_render_field_text( 'services_warranty_badge', __( 'Warranty Box Title', 'mobile-pasal' ), __( 'Default: 90-Day Ali Mobile Cleanroom Warranty' ) );
									mp_render_field_textarea( 'services_warranty_desc', __( 'Warranty Guarantee Scope', 'mobile-pasal' ), __( 'Default: Every display swap and component repair is backed by a 90-day peace-of-mind warranty covering parts and labor.' ), 3 );
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

						<div class="bopt-card">
							<div class="bopt-card-header">
								<div class="bopt-card-header-icon"><i class="fa-solid fa-star"></i></div>
								<div>
									<h3 class="bopt-card-title"><?php esc_html_e( 'About Spotlight Heritage Card (Right Column)', 'mobile-pasal' ); ?></h3>
									<p class="bopt-card-desc"><?php esc_html_e( 'Spotlight card displayed in hero on /about.', 'mobile-pasal' ); ?></p>
								</div>
							</div>
							<div class="bopt-card-body">
								<div class="bopt-field-grid">
									<div class="bopt-field-col-2">
										<?php
										mp_render_field_text( 'about_spotlight_badge', __( 'Card Badge', 'mobile-pasal' ), __( 'Default: Heritage & Trust' ) );
										mp_render_field_text( 'about_spotlight_year', __( 'Operational Year', 'mobile-pasal' ), __( 'Default: Since 2014' ) );
										?>
									</div>
									<div class="bopt-field-col-2">
										<?php
										mp_render_field_text( 'about_spotlight_m1_label', __( 'Metric 1 Label', 'mobile-pasal' ), __( 'Default: Operational Heritage' ) );
										mp_render_field_text( 'about_spotlight_m1_val', __( 'Metric 1 Value', 'mobile-pasal' ), __( 'Default: 10+ Years in Bardiya' ) );
										?>
									</div>
									<div class="bopt-field-col-2">
										<?php
										mp_render_field_text( 'about_spotlight_m2_label', __( 'Metric 2 Label', 'mobile-pasal' ), __( 'Default: Restored Handsets' ) );
										mp_render_field_text( 'about_spotlight_m2_val', __( 'Metric 2 Value', 'mobile-pasal' ), __( 'Default: 15,000+ Devices' ) );
										?>
									</div>
									<div class="bopt-field-col-2">
										<?php
										mp_render_field_text( 'about_spotlight_m3_label', __( 'Metric 3 Label', 'mobile-pasal' ), __( 'Default: Data Privacy Policy' ) );
										mp_render_field_text( 'about_spotlight_m3_val', __( 'Metric 3 Value', 'mobile-pasal' ), __( 'Default: 100% Confidential' ) );
										?>
									</div>
									<div class="bopt-field-col-2">
										<?php
										mp_render_field_text( 'about_spotlight_m4_label', __( 'Metric 4 Label', 'mobile-pasal' ), __( 'Default: Central Location' ) );
										mp_render_field_text( 'about_spotlight_m4_val', __( 'Metric 4 Value', 'mobile-pasal' ), __( 'Default: Ji. Pra. Ka. Chowk' ) );
										?>
									</div>
								</div>
							</div>
						</div>

						<div class="bopt-card">
							<div class="bopt-card-header">
								<div class="bopt-card-header-icon"><i class="fa-solid fa-ribbon"></i></div>
								<div>
									<h3 class="bopt-card-title"><?php esc_html_e( 'About Micro-Ribbon 4 Feature Badges', 'mobile-pasal' ); ?></h3>
									<p class="bopt-card-desc"><?php esc_html_e( 'Horizontal banner icons and badges below hero.', 'mobile-pasal' ); ?></p>
								</div>
							</div>
							<div class="bopt-card-body">
								<div class="bopt-field-grid">
									<div class="bopt-field-col-2">
										<?php
										mp_render_field_text( 'about_ribbon_1', __( 'Ribbon Item 1', 'mobile-pasal' ), __( 'Default: Cleanroom Bench Tooling' ) );
										mp_render_field_text( 'about_ribbon_2', __( 'Ribbon Item 2', 'mobile-pasal' ), __( 'Default: On-the-Spot Diagnostics' ) );
										?>
									</div>
									<div class="bopt-field-col-2">
										<?php
										mp_render_field_text( 'about_ribbon_3', __( 'Ribbon Item 3', 'mobile-pasal' ), __( 'Default: Certified OEM-Grade Parts' ) );
										mp_render_field_text( 'about_ribbon_4', __( 'Ribbon Item 4', 'mobile-pasal' ), __( 'Default: 90-Day Testing Warranty' ) );
										?>
									</div>
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
								<div class="bopt-card-header-icon"><i class="fa-solid fa-star"></i></div>
								<div>
									<h3 class="bopt-card-title"><?php esc_html_e( 'Contact Spotlight Desk Card (Right Column)', 'mobile-pasal' ); ?></h3>
									<p class="bopt-card-desc"><?php esc_html_e( 'Quick hotline & landmark card beside hero on /contact.', 'mobile-pasal' ); ?></p>
								</div>
							</div>
							<div class="bopt-card-body">
								<div class="bopt-field-grid">
									<div class="bopt-field-col-2">
										<?php
										mp_render_field_text( 'contact_spotlight_badge', __( 'Card Badge', 'mobile-pasal' ), __( 'Default: Gulariya Counter Desk' ) );
										mp_render_field_text( 'contact_spotlight_time', __( 'Operating Time', 'mobile-pasal' ), __( 'Default: 9 AM – 8 PM' ) );
										?>
									</div>
									<div class="bopt-field-col-2">
										<?php
										mp_render_field_text( 'contact_spotlight_m1_label', __( 'Metric 1 Label', 'mobile-pasal' ), __( 'Default: Direct Hotline' ) );
										mp_render_field_text( 'contact_spotlight_m1_val', __( 'Metric 1 Value', 'mobile-pasal' ), __( 'Default: +977 9804530786' ) );
										?>
									</div>
									<div class="bopt-field-col-2">
										<?php
										mp_render_field_text( 'contact_spotlight_m2_label', __( 'Metric 2 Label', 'mobile-pasal' ), __( 'Default: Exact Landmark' ) );
										mp_render_field_text( 'contact_spotlight_m2_val', __( 'Metric 2 Value', 'mobile-pasal' ), __( 'Default: Ji. Pra. Ka. Chowk' ) );
										?>
									</div>
									<div class="bopt-field-col-2">
										<?php
										mp_render_field_text( 'contact_spotlight_m3_label', __( 'Metric 3 Label', 'mobile-pasal' ), __( 'Default: Walk-in Diagnosis' ) );
										mp_render_field_text( 'contact_spotlight_m3_val', __( 'Metric 3 Value', 'mobile-pasal' ), __( 'Default: 5-Minute Free Check' ) );
										?>
									</div>
									<div class="bopt-field-col-2">
										<?php
										mp_render_field_text( 'contact_spotlight_m4_label', __( 'Metric 4 Label', 'mobile-pasal' ), __( 'Default: Customer Parking' ) );
										mp_render_field_text( 'contact_spotlight_m4_val', __( 'Metric 4 Value', 'mobile-pasal' ), __( 'Default: Easy Front Access' ) );
										?>
									</div>
								</div>
							</div>
						</div>

						<div class="bopt-card">
							<div class="bopt-card-header">
								<div class="bopt-card-header-icon"><i class="fa-solid fa-ribbon"></i></div>
								<div>
									<h3 class="bopt-card-title"><?php esc_html_e( 'Contact Micro-Ribbon 4 Fast Badges', 'mobile-pasal' ); ?></h3>
									<p class="bopt-card-desc"><?php esc_html_e( 'Horizontal banner icons and badges below hero.', 'mobile-pasal' ); ?></p>
								</div>
							</div>
							<div class="bopt-card-body">
								<div class="bopt-field-grid">
									<div class="bopt-field-col-2">
										<?php
										mp_render_field_text( 'contact_ribbon_1', __( 'Ribbon Item 1', 'mobile-pasal' ), __( 'Default: Direct WhatsApp & Call Line' ) );
										mp_render_field_text( 'contact_ribbon_2', __( 'Ribbon Item 2', 'mobile-pasal' ), __( 'Default: Quick 5-Minute WhatsApp Quotes' ) );
										?>
									</div>
									<div class="bopt-field-col-2">
										<?php
										mp_render_field_text( 'contact_ribbon_3', __( 'Ribbon Item 3', 'mobile-pasal' ), __( 'Default: Opposite District Admin Office' ) );
										mp_render_field_text( 'contact_ribbon_4', __( 'Ribbon Item 4', 'mobile-pasal' ), __( 'Default: Saturday Open • 9 AM – 8 PM' ) );
										?>
									</div>
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

						<div class="bopt-card">
							<div class="bopt-card-header">
								<div class="bopt-card-header-icon"><i class="fa-solid fa-headset"></i></div>
								<div>
									<h3 class="bopt-card-title"><?php esc_html_e( '4 Direct Helpline Action Cards', 'mobile-pasal' ); ?></h3>
									<p class="bopt-card-desc"><?php esc_html_e( 'Card titles and CTA buttons on /contact.', 'mobile-pasal' ); ?></p>
								</div>
							</div>
							<div class="bopt-card-body">
								<div class="bopt-field-grid">
									<?php
									mp_render_field_text( 'contact_card1_title', __( 'Card 1 Title (Phone)', 'mobile-pasal' ), __( 'Default: Voice Call / Counter Desk' ) );
									mp_render_field_text( 'contact_card1_action', __( 'Card 1 Action Button', 'mobile-pasal' ), __( 'Default: Call Now' ) );
									mp_render_field_text( 'contact_card2_title', __( 'Card 2 Title (WhatsApp)', 'mobile-pasal' ), __( 'Default: WhatsApp Live Support' ) );
									mp_render_field_text( 'contact_card2_action', __( 'Card 2 Action Button', 'mobile-pasal' ), __( 'Default: Chat on WhatsApp' ) );
									mp_render_field_text( 'contact_card3_title', __( 'Card 3 Title (Location)', 'mobile-pasal' ), __( 'Default: Counter Location' ) );
									mp_render_field_text( 'contact_card3_action', __( 'Card 3 Action Button', 'mobile-pasal' ), __( 'Default: Get Directions' ) );
									mp_render_field_text( 'contact_card4_title', __( 'Card 4 Title (Hours)', 'mobile-pasal' ), __( 'Default: Operating Hours' ) );
									mp_render_field_text( 'contact_card4_action', __( 'Card 4 Action Button', 'mobile-pasal' ), __( 'Default: Visit Us' ) );
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
					<div class="bopt-tab-pane <?php echo $active_tab === 'contact_inbox_tab' ? 'is-active' : ''; ?>" id="tab-pane-contact_inbox_tab">
						<div class="bopt-pane-header">
							<h2><?php esc_html_e( 'Customer Inquiries & Repair Dockets Inbox', 'mobile-pasal' ); ?></h2>
							<p><?php esc_html_e( 'View, respond to, and manage customer repair tickets and product questions.', 'mobile-pasal' ); ?></p>
						</div>

						<div class="bopt-cpt-action-box">
							<div class="bopt-cpt-action-info">
								<div class="bopt-cpt-action-icon"><i class="fa-solid fa-inbox"></i></div>
								<div>
									<strong><?php esc_html_e( 'Repair Dockets & Inquiries Inbox', 'mobile-pasal' ); ?></strong>
									<p>
										<?php
										if ( $unread_inquiries > 0 ) {
											printf( esc_html__( 'You have %d unread inquiries waiting for counter review.', 'mobile-pasal' ), $unread_inquiries );
										} else {
											esc_html_e( 'All customer inquiries have been reviewed and processed.', 'mobile-pasal' );
										}
										?>
									</p>
								</div>
							</div>
							<div class="bopt-cpt-action-links">
								<a href="<?php echo esc_url( admin_url( 'admin.php?page=mp-inquiries' ) ); ?>" class="bopt-btn-gold-action">
									<i class="fa-solid fa-envelope-open-text"></i> <?php esc_html_e( 'Open Full Inquiries Suite', 'mobile-pasal' ); ?>
								</a>
							</div>
						</div>

						<?php
						global $wpdb;
						$table_name = $wpdb->prefix . 'mp_inquiries';
						$recent_dockets = array();
						if ( $wpdb->get_var( "SHOW TABLES LIKE '$table_name'" ) === $table_name ) {
							$recent_dockets = $wpdb->get_results( "SELECT * FROM $table_name ORDER BY id DESC LIMIT 6" );
						}
						?>
						<div class="bopt-cpt-grid" style="margin-top:16px;">
							<?php if ( ! empty( $recent_dockets ) ) : ?>
								<?php foreach ( $recent_dockets as $docket ) :
									$clean_phone = preg_replace( '/[^0-9]/', '', $docket->phone );
									$wa_phone    = ( strpos( $clean_phone, '977' ) === 0 ) ? $clean_phone : '977' . ltrim( $clean_phone, '0' );
									$wa_msg      = sprintf(
										__( 'Namaste %s ji! This is Ali Mobile Center & Apple Fix Gulariya regarding your %s (%s). How can we assist you today?', 'mobile-pasal' ),
										$docket->name,
										$docket->device_model ? $docket->device_model : 'Handset',
										$docket->service_type ? $docket->service_type : 'Inquiry'
									);
									$wa_url      = 'https://wa.me/' . $wa_phone . '?text=' . rawurlencode( $wa_msg );
									$tel_url     = 'tel:' . esc_attr( $docket->phone );
									$status_cls  = ( 'new' === $docket->status ) ? 'out_of_stock' : ( ( 'contacted' === $docket->status ) ? 'low_stock' : 'in_stock' );
									$status_lbl  = ( 'new' === $docket->status ) ? __( 'Pending Action', 'mobile-pasal' ) : ( ( 'contacted' === $docket->status ) ? __( 'In Progress', 'mobile-pasal' ) : __( 'Resolved', 'mobile-pasal' ) );
								?>
									<div class="bopt-cpt-card">
										<div>
											<div class="bopt-cpt-card-top">
												<div class="bopt-cpt-card-thumb" style="color:#0066cc; font-size:20px; background:#eff6ff;">
													<i class="fa-solid fa-wrench"></i>
												</div>
												<div style="flex:1; min-width:0;">
													<div style="display:flex; align-items:center; justify-content:space-between; gap:6px;">
														<h4 class="bopt-cpt-card-title"><?php echo esc_html( $docket->name ); ?></h4>
														<span style="font-size:11px; font-weight:700; color:#64748b;">#<?php echo esc_html( $docket->id ); ?></span>
													</div>
													<div class="bopt-cpt-card-meta"><i class="fa-solid fa-mobile-screen"></i> <?php echo esc_html( $docket->device_model ?: 'Smartphone' ); ?></div>
												</div>
											</div>
											<div style="display:flex; align-items:center; justify-content:space-between; margin-top:6px;">
												<span style="font-size:12px; font-weight:600; color:#334155;"><?php echo esc_html( $docket->service_type ?: 'General Inquiry' ); ?></span>
												<span class="bopt-cpt-card-badge <?php echo esc_attr( $status_cls ); ?>"><?php echo esc_html( $status_lbl ); ?></span>
											</div>
											<?php if ( $docket->message ) : ?>
												<p style="font-size:12px; color:#475569; line-height:1.4; margin:8px 0; background:#f8fafc; padding:6px 10px; border-radius:6px; border:1px solid #f1f5f9;">
													<?php echo esc_html( wp_trim_words( $docket->message, 14 ) ); ?>
												</p>
											<?php endif; ?>
											<div style="font-size:11px; color:#94a3b8; margin-top:4px;">
												<i class="fa-regular fa-clock"></i> <?php echo esc_html( date_i18n( 'M j, Y - g:i A', strtotime( $docket->created_at ) ) ); ?>
											</div>
										</div>
										<div class="bopt-cpt-card-actions">
											<a href="<?php echo esc_url( $tel_url ); ?>" class="bopt-btn-action-small" style="background:#eff6ff; color:#0066cc; border:1px solid #bfdbfe;">
												<i class="fa-solid fa-phone"></i> <?php esc_html_e( 'Call', 'mobile-pasal' ); ?>
											</a>
											<a href="<?php echo esc_url( $wa_url ); ?>" target="_blank" class="bopt-btn-action-small" style="background:#ecfdf5; color:#059669; border:1px solid #a7f3d0;">
												<i class="fa-brands fa-whatsapp"></i> <?php esc_html_e( 'WhatsApp', 'mobile-pasal' ); ?>
											</a>
										</div>
									</div>
								<?php endforeach; ?>
							<?php else : ?>
								<div class="bopt-empty-cpt-box">
									<i class="fa-solid fa-inbox"></i>
									<p><?php esc_html_e( 'Your inquiries inbox is clean. No customer repair tickets currently pending.', 'mobile-pasal' ); ?></p>
								</div>
							<?php endif; ?>
						</div>
					</div>

					<!-- ===================================================================
					     GROUP: 404 & SEARCH RESULTS PAGES
					     =================================================================== -->

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

						<!-- Rank Score Box -->
						<div class="bopt-rank-score-box">
							<div class="bopt-rank-score-header">
								<div>
									<h4 class="bopt-rank-title"><i class="fa-solid fa-gauge-high"></i> <?php esc_html_e( 'Google & Organic Search Health Score', 'mobile-pasal' ); ?></h4>
									<p class="bopt-rank-desc"><?php esc_html_e( 'Live audit of your meta tags, title lengths, and indexing configuration for search bots.', 'mobile-pasal' ); ?></p>
								</div>
								<?php if ( mp_is_rank_math_active() ) : ?>
									<span class="bopt-rank-badge bopt-rank-badge-live" style="background:rgba(16,185,129,0.18); color:#34d399; border:1px solid #10b981;">
										<i class="fa-solid fa-bolt"></i> <?php esc_html_e( 'Rank Math Synchronized', 'mobile-pasal' ); ?>
									</span>
								<?php else : ?>
									<span class="bopt-rank-badge bopt-rank-badge-live"><i class="fa-solid fa-circle-check"></i> <?php esc_html_e( 'SEO Ready 100%', 'mobile-pasal' ); ?></span>
								<?php endif; ?>
							</div>
							<div class="bopt-rank-meta-row">
								<span><i class="fa-solid fa-bullseye"></i> <strong>Focus:</strong> Gulariya, Bardiya, Apple Fix, NTA Phones</span>
								<?php if ( mp_is_rank_math_active() ) : ?>
									<span><i class="fa-solid fa-puzzle-piece"></i> <strong>Rank Math:</strong> Active (Merged Schema & Fallback Meta)</span>
								<?php else : ?>
									<span><i class="fa-solid fa-robot"></i> <strong>Robots:</strong> Index, Follow</span>
								<?php endif; ?>
								<span><i class="fa-solid fa-share-nodes"></i> <strong>OpenGraph:</strong> 1200x630 Active</span>
							</div>
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

					<!-- GEO & Local Google Maps Ranking Tab -->
					<div class="bopt-tab-pane <?php echo $active_tab === 'geo_local_tab' ? 'is-active' : ''; ?>" id="tab-pane-geo_local_tab">
						<div class="bopt-pane-header">
							<h2><?php esc_html_e( 'GEO & Local Maps Ranking (Google Local Pack & Apple Maps)', 'mobile-pasal' ); ?></h2>
							<p><?php esc_html_e( 'Coordinates, NAP (Name, Address, Phone) consistency, and schema positioning tags that push Ali Mobile Center to the #1 spot in Google Maps 3-Pack across Bardiya and Banke.', 'mobile-pasal' ); ?></p>
						</div>

						<!-- Local Pack Rank Score Box -->
						<div class="bopt-rank-score-box">
							<div class="bopt-rank-score-header">
								<div>
									<h4 class="bopt-rank-title"><i class="fa-solid fa-map-location-dot"></i> <?php esc_html_e( 'Local Pack & GEO Position Status', 'mobile-pasal' ); ?></h4>
									<p class="bopt-rank-desc"><?php esc_html_e( 'Precision GPS tags (geo.position, ICBM, Schema GeoCoordinates) embedded for Gulariya-06.', 'mobile-pasal' ); ?></p>
								</div>
								<?php if ( mp_is_rank_math_active() ) : ?>
									<span class="bopt-rank-badge bopt-rank-badge-live" style="background:rgba(16,185,129,0.18); color:#34d399; border:1px solid #10b981;">
										<i class="fa-solid fa-location-crosshairs"></i> <?php esc_html_e( 'GEO Synced with Rank Math', 'mobile-pasal' ); ?>
									</span>
								<?php else : ?>
									<span class="bopt-rank-badge bopt-rank-badge-live"><i class="fa-solid fa-location-crosshairs"></i> <?php esc_html_e( 'GPS Linked', 'mobile-pasal' ); ?></span>
								<?php endif; ?>
							</div>
							<div class="bopt-rank-meta-row">
								<span><i class="fa-solid fa-map-pin"></i> <strong>GPS:</strong> 28.2330° N, 81.3340° E</span>
								<span><i class="fa-solid fa-building-flag"></i> <strong>Region:</strong> Lumbini Province (NP-P5)</span>
								<span><i class="fa-solid fa-city"></i> <strong>City:</strong> Gulariya, Bardiya</span>
							</div>
						</div>

						<!-- Legal Business NAP Consistency Card -->
						<div class="bopt-card">
							<div class="bopt-card-header">
								<div class="bopt-card-header-left">
									<div class="bopt-card-header-icon"><i class="fa-solid fa-id-card"></i></div>
									<div>
										<h3 class="bopt-card-title"><?php esc_html_e( 'NAP (Name, Address, Phone) & Legal Entity Details', 'mobile-pasal' ); ?></h3>
										<p class="bopt-card-desc"><?php esc_html_e( 'Exact matching details used by Google Business Profile to verify local counter authenticity.', 'mobile-pasal' ); ?></p>
									</div>
								</div>
								<button type="button" class="bopt-card-toggle-btn" aria-label="Toggle card"><i class="fa-solid fa-chevron-up"></i></button>
							</div>
							<div class="bopt-card-body">
								<div class="bopt-field-grid">
									<div class="bopt-field-col-2">
										<?php
										mp_render_field_text( 'geo_legal_name', __( 'Legal Registered Business Name', 'mobile-pasal' ), __( 'Default: Ali Mobile Center & Apple Fix' ) );
										mp_render_field_text( 'geo_price_range', __( 'Showroom Price Range', 'mobile-pasal' ), __( 'Default: Rs. 500 - Rs. 2,50,000' ) );
										?>
									</div>
									<?php
									mp_render_field_text( 'geo_street', __( 'Physical Street Address', 'mobile-pasal' ), __( 'Default: Gulariya-06, Ji. Pra. Ka. Chowk (District Police Office Chowk)' ) );
									?>
									<div class="bopt-field-col-2">
										<?php
										mp_render_field_text( 'geo_city', __( 'Municipality / City', 'mobile-pasal' ), __( 'Default: Gulariya' ) );
										mp_render_field_text( 'geo_district', __( 'District', 'mobile-pasal' ), __( 'Default: Bardiya' ) );
										?>
									</div>
									<div class="bopt-field-col-2">
										<?php
										mp_render_field_text( 'geo_province', __( 'Province Name', 'mobile-pasal' ), __( 'Default: Lumbini Province' ) );
										mp_render_field_text( 'geo_postal', __( 'Postal / Zip Code', 'mobile-pasal' ), __( 'Default: 21800' ) );
										?>
									</div>
									<div class="bopt-field-col-2">
										<?php
										mp_render_field_text( 'geo_region_code', __( 'ISO Region Code (Lumbini)', 'mobile-pasal' ), __( 'Default: NP-P5' ) );
										mp_render_field_text( 'geo_country_code', __( 'ISO Country Code', 'mobile-pasal' ), __( 'Default: NP' ) );
										?>
									</div>
								</div>
							</div>
						</div>

						<!-- Exact GPS Coordinates & Map Links Card -->
						<div class="bopt-card">
							<div class="bopt-card-header">
								<div class="bopt-card-header-left">
									<div class="bopt-card-header-icon"><i class="fa-solid fa-earth-asia"></i></div>
									<div>
										<h3 class="bopt-card-title"><?php esc_html_e( 'Exact GPS Coordinates & Google Business Links', 'mobile-pasal' ); ?></h3>
										<p class="bopt-card-desc"><?php esc_html_e( 'Coordinates injected into geo.position, ICBM meta tags and Schema.org GeoCoordinates.', 'mobile-pasal' ); ?></p>
									</div>
								</div>
								<button type="button" class="bopt-card-toggle-btn" aria-label="Toggle card"><i class="fa-solid fa-chevron-up"></i></button>
							</div>
							<div class="bopt-card-body">
								<div class="bopt-field-grid">
									<div class="bopt-field-col-2">
										<?php
										mp_render_field_text( 'geo_latitude', __( 'Latitude (Decimal)', 'mobile-pasal' ), __( 'Default: 28.2330' ) );
										mp_render_field_text( 'geo_longitude', __( 'Longitude (Decimal)', 'mobile-pasal' ), __( 'Default: 81.3340' ) );
										?>
									</div>
									<?php
									mp_render_field_text( 'geo_maps_url', __( 'Google Maps Direct Showroom URL', 'mobile-pasal' ), __( 'Default: https://maps.google.com/?q=Ali+Mobile+Center+Gulariya' ) );
									mp_render_field_text( 'geo_gmb_review_url', __( 'Google Review Request URL', 'mobile-pasal' ), __( 'Direct 5-star link for satisfied counter customers.' ) );
									mp_render_field_textarea( 'geo_service_areas', __( 'Service Areas (Comma Separated)', 'mobile-pasal' ), __( 'Default: Gulariya, Bansgadhi, Madhuwan, Badhaiyatal, Thakurbaba, Barbardiya, Rajapur, Kohalpur, Nepalgunj, Bardiya District' ), 2 );
									mp_render_field_text( 'geo_opening_hours', __( 'Structured Opening Hours', 'mobile-pasal' ), __( 'Default: Sun–Fri: 9:00 AM – 8:00 PM | Sat: Open 9:00 AM – 6:00 PM' ) );
									?>
								</div>
							</div>
						</div>
					</div>

					<!-- AEO & AI Search Citation Tab -->
					<div class="bopt-tab-pane <?php echo $active_tab === 'aeo_ai_tab' ? 'is-active' : ''; ?>" id="tab-pane-aeo_ai_tab">
						<div class="bopt-pane-header">
							<h2><?php esc_html_e( 'AEO (Answer Engine Optimization) & AI Search Citation', 'mobile-pasal' ); ?></h2>
							<p><?php esc_html_e( 'Grounding facts, FAQPage JSON-LD schema, Speakable voice specifications, and /llms.txt manifest that ensure ChatGPT Search, Google Gemini, Perplexity AI, and Claude cite Ali Mobile Center as the definitive phone authority in Bardiya.', 'mobile-pasal' ); ?></p>
						</div>

						<!-- AI Search Readiness Score Box -->
						<div class="bopt-rank-score-box">
							<div class="bopt-rank-score-header">
								<div>
									<h4 class="bopt-rank-title"><i class="fa-solid fa-robot"></i> <?php esc_html_e( 'AI Answer Engine Grounding Status', 'mobile-pasal' ); ?></h4>
									<p class="bopt-rank-desc"><?php esc_html_e( 'Active grounding feeds for Perplexity, ChatGPT Search, Apple Siri, and Google Gemini Overviews.', 'mobile-pasal' ); ?></p>
								</div>
								<?php if ( mp_is_rank_math_active() ) : ?>
									<span class="bopt-rank-badge bopt-rank-badge-live" style="background:rgba(16,185,129,0.18); color:#34d399; border:1px solid #10b981;">
										<i class="fa-solid fa-brain"></i> <?php esc_html_e( 'AEO Schema in Rank Math', 'mobile-pasal' ); ?>
									</span>
								<?php else : ?>
									<span class="bopt-rank-badge bopt-rank-badge-live"><i class="fa-solid fa-brain"></i> <?php esc_html_e( 'AEO Grounded', 'mobile-pasal' ); ?></span>
								<?php endif; ?>
							</div>
							<div class="bopt-rank-meta-row">
								<span><i class="fa-solid fa-file-lines"></i> <strong>Endpoint:</strong> <a href="<?php echo esc_url( home_url( '/llms.txt' ) ); ?>" target="_blank" style="color:var(--bopt-gold-light);text-decoration:underline;">/llms.txt</a></span>
								<?php if ( mp_is_rank_math_active() ) : ?>
									<span><i class="fa-solid fa-code"></i> <strong>Schema:</strong> Merged with Rank Math</span>
								<?php else : ?>
									<span><i class="fa-solid fa-code"></i> <strong>Schema:</strong> FAQPage + Speakable</span>
								<?php endif; ?>
								<span><i class="fa-solid fa-diagram-project"></i> <strong>Entity Graph:</strong> sameAs Connected</span>
							</div>
						</div>

						<!-- AI Grounding Narrative Summary Card -->
						<div class="bopt-card">
							<div class="bopt-card-header">
								<div class="bopt-card-header-left">
									<div class="bopt-card-header-icon"><i class="fa-solid fa-newspaper"></i></div>
									<div>
										<h3 class="bopt-card-title"><?php esc_html_e( 'Direct AI Grounding Factual Summary', 'mobile-pasal' ); ?></h3>
										<p class="bopt-card-desc"><?php esc_html_e( 'This authoritative summary is ingested by LLMs when users query "best mobile shop in gulariya" or "where to fix iphone screen in bardiya".', 'mobile-pasal' ); ?></p>
									</div>
								</div>
								<button type="button" class="bopt-card-toggle-btn" aria-label="Toggle card"><i class="fa-solid fa-chevron-up"></i></button>
							</div>
							<div class="bopt-card-body">
								<div class="bopt-field-grid">
									<?php
									mp_render_field_textarea( 'aeo_ai_summary', __( 'Authoritative Business Summary for LLMs', 'mobile-pasal' ), __( 'High-density factual paragraph containing store location, phone numbers, NTA compliance, and repair specialties.' ), 4 );
									mp_render_field_textarea( 'aeo_sameas_urls', __( 'Knowledge Graph Entity URLs (sameAs)', 'mobile-pasal' ), __( 'Comma-separated links to verified Facebook page, Instagram profile, TikTok, and WhatsApp channel to establish Google Knowledge Graph entity identity.' ), 2 );
									?>
									<div class="bopt-field-col-2">
										<?php
										mp_render_field_toggle( 'aeo_enable_llms_txt', __( 'Enable /llms.txt Knowledge Endpoint', 'mobile-pasal' ), __( 'Publishes clean markdown summary at /llms.txt for AI search crawlers.' ) );
										mp_render_field_toggle( 'aeo_enable_faq_schema', __( 'Inject FAQPage JSON-LD Schema', 'mobile-pasal' ), __( 'Renders Google Rich Snippet Q&A accordion directly in search.' ) );
										?>
									</div>
								</div>
							</div>
						</div>

						<!-- Subnav Segmented Pills for 4 AEO FAQ Q&As -->
						<div class="bopt-subnav-pills">
							<button type="button" class="bopt-subnav-pill is-active" data-subtab="subtab-aeo-faq-1">
								<i class="fa-solid fa-certificate"></i>
								<span><?php esc_html_e( 'AEO Q1: NTA Approved', 'mobile-pasal' ); ?></span>
							</button>
							<button type="button" class="bopt-subnav-pill" data-subtab="subtab-aeo-faq-2">
								<i class="fa-solid fa-bolt"></i>
								<span><?php esc_html_e( 'AEO Q2: Repair Turnaround', 'mobile-pasal' ); ?></span>
							</button>
							<button type="button" class="bopt-subnav-pill" data-subtab="subtab-aeo-faq-3">
								<i class="fa-solid fa-location-dot"></i>
								<span><?php esc_html_e( 'AEO Q3: Location & Hours', 'mobile-pasal' ); ?></span>
							</button>
							<button type="button" class="bopt-subnav-pill" data-subtab="subtab-aeo-faq-4">
								<i class="fa-solid fa-arrows-rotate"></i>
								<span><?php esc_html_e( 'AEO Q4: Trade-In Counter', 'mobile-pasal' ); ?></span>
							</button>
						</div>

						<!-- AEO FAQ 1 -->
						<div class="bopt-subnav-content is-active" id="subtab-aeo-faq-1">
							<div class="bopt-card">
								<div class="bopt-card-header">
									<div class="bopt-card-header-left">
										<div class="bopt-card-header-icon"><i class="fa-solid fa-circle-question"></i></div>
										<div>
											<h3 class="bopt-card-title"><?php esc_html_e( 'AEO Question 1: NTA IMEI & Legal Invoicing', 'mobile-pasal' ); ?></h3>
											<p class="bopt-card-desc"><?php esc_html_e( 'Direct factual answer served to ChatGPT and Google Gemini for handset authenticity queries.', 'mobile-pasal' ); ?></p>
										</div>
									</div>
									<button type="button" class="bopt-card-toggle-btn" aria-label="Toggle card"><i class="fa-solid fa-chevron-up"></i></button>
								</div>
								<div class="bopt-card-body">
									<div class="bopt-field-grid">
										<?php
										mp_render_field_text( 'aeo_faq1_q', __( 'Question 1', 'mobile-pasal' ), __( 'Default: Are all smartphones sold at Ali Mobile Center NTA approved?' ) );
										mp_render_field_textarea( 'aeo_faq1_a', __( 'Answer 1 (AI Grounded)', 'mobile-pasal' ), __( 'Direct factual answer...' ), 3 );
										?>
									</div>
								</div>
							</div>
						</div>

						<!-- AEO FAQ 2 -->
						<div class="bopt-subnav-content" id="subtab-aeo-faq-2">
							<div class="bopt-card">
								<div class="bopt-card-header">
									<div class="bopt-card-header-left">
										<div class="bopt-card-header-icon"><i class="fa-solid fa-circle-question"></i></div>
										<div>
											<h3 class="bopt-card-title"><?php esc_html_e( 'AEO Question 2: Cleanroom Repair Speed', 'mobile-pasal' ); ?></h3>
											<p class="bopt-card-desc"><?php esc_html_e( 'Direct factual answer for screen and battery replacement turnaround queries.', 'mobile-pasal' ); ?></p>
										</div>
									</div>
									<button type="button" class="bopt-card-toggle-btn" aria-label="Toggle card"><i class="fa-solid fa-chevron-up"></i></button>
								</div>
								<div class="bopt-card-body">
									<div class="bopt-field-grid">
										<?php
										mp_render_field_text( 'aeo_faq2_q', __( 'Question 2', 'mobile-pasal' ), __( 'Default: How fast can I get my iPhone screen or battery replaced at Apple Fix Lab?' ) );
										mp_render_field_textarea( 'aeo_faq2_a', __( 'Answer 2 (AI Grounded)', 'mobile-pasal' ), __( 'Direct factual answer...' ), 3 );
										?>
									</div>
								</div>
							</div>
						</div>

						<!-- AEO FAQ 3 -->
						<div class="bopt-subnav-content" id="subtab-aeo-faq-3">
							<div class="bopt-card">
								<div class="bopt-card-header">
									<div class="bopt-card-header-left">
										<div class="bopt-card-header-icon"><i class="fa-solid fa-circle-question"></i></div>
										<div>
											<h3 class="bopt-card-title"><?php esc_html_e( 'AEO Question 3: Physical Showroom Location', 'mobile-pasal' ); ?></h3>
											<p class="bopt-card-desc"><?php esc_html_e( 'Direct factual answer for directions and contact queries in Bardiya.', 'mobile-pasal' ); ?></p>
										</div>
									</div>
									<button type="button" class="bopt-card-toggle-btn" aria-label="Toggle card"><i class="fa-solid fa-chevron-up"></i></button>
								</div>
								<div class="bopt-card-body">
									<div class="bopt-field-grid">
										<?php
										mp_render_field_text( 'aeo_faq3_q', __( 'Question 3', 'mobile-pasal' ), __( 'Default: Where is Ali Mobile Center located in Bardiya?' ) );
										mp_render_field_textarea( 'aeo_faq3_a', __( 'Answer 3 (AI Grounded)', 'mobile-pasal' ), __( 'Direct factual answer...' ), 3 );
										?>
									</div>
								</div>
							</div>
						</div>

						<!-- AEO FAQ 4 -->
						<div class="bopt-subnav-content" id="subtab-aeo-faq-4">
							<div class="bopt-card">
								<div class="bopt-card-header">
									<div class="bopt-card-header-left">
										<div class="bopt-card-header-icon"><i class="fa-solid fa-circle-question"></i></div>
										<div>
											<h3 class="bopt-card-title"><?php esc_html_e( 'AEO Question 4: Handset Trade-In Counter', 'mobile-pasal' ); ?></h3>
											<p class="bopt-card-desc"><?php esc_html_e( 'Direct factual answer for smartphone exchange and evaluation.', 'mobile-pasal' ); ?></p>
										</div>
									</div>
									<button type="button" class="bopt-card-toggle-btn" aria-label="Toggle card"><i class="fa-solid fa-chevron-up"></i></button>
								</div>
								<div class="bopt-card-body">
									<div class="bopt-field-grid">
										<?php
										mp_render_field_text( 'aeo_faq4_q', __( 'Question 4', 'mobile-pasal' ), __( 'Default: Does Ali Mobile Center accept trade-ins for old phones?' ) );
										mp_render_field_textarea( 'aeo_faq4_a', __( 'Answer 4 (AI Grounded)', 'mobile-pasal' ), __( 'Direct factual answer...' ), 3 );
										?>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- ===================================================================
					     GROUP 7: MOBILE UX & CHAT WIDGET
					     =================================================================== -->

					<!-- 7.1 Mobile Bottom Bar -->
					<div class="bopt-tab-pane <?php echo $active_tab === 'mobile_bottom_bar_tab' ? 'is-active' : ''; ?>" id="tab-pane-mobile_bottom_bar_tab">
						<div class="bopt-pane-header">
							<h2><?php esc_html_e( 'Sticky Mobile Bottom Quick Bar', 'mobile-pasal' ); ?></h2>
							<p><?php esc_html_e( 'Control the thumb-friendly floating bottom dock that stays pinned on mobile and smartphone screens.', 'mobile-pasal' ); ?></p>
						</div>

						<div class="bopt-card">
							<div class="bopt-card-header">
								<div class="bopt-card-header-icon"><i class="fa-solid fa-mobile-screen-button"></i></div>
								<div>
									<h3 class="bopt-card-title"><?php esc_html_e( 'Mobile Dock Configuration', 'mobile-pasal' ); ?></h3>
									<p class="bopt-card-desc"><?php esc_html_e( 'Enable/disable and rename the 4 quick action buttons (Call, Repair, Catalog, WhatsApp).', 'mobile-pasal' ); ?></p>
								</div>
							</div>
							<div class="bopt-card-body">
								<div class="bopt-field-grid">
									<?php
									mp_render_field_toggle( 'mobile_bar_enabled', __( 'Enable Sticky Mobile Bottom Bar', 'mobile-pasal' ), __( 'Pins a luxury thumb bar at the bottom of mobile screens (max-width: 768px).' ) );
									mp_render_field_text( 'mobile_btn1_label', __( 'Button 1 Label (Call)', 'mobile-pasal' ), __( 'Default: Call' ) );
									mp_render_field_text( 'mobile_btn2_label', __( 'Button 2 Label (Repair)', 'mobile-pasal' ), __( 'Default: Repair' ) );
									mp_render_field_text( 'mobile_btn3_label', __( 'Button 3 Label (Catalog)', 'mobile-pasal' ), __( 'Default: Catalog' ) );
									mp_render_field_text( 'mobile_btn4_label', __( 'Button 4 Label (WhatsApp)', 'mobile-pasal' ), __( 'Default: WhatsApp' ) );
									?>
								</div>
							</div>
						</div>
					</div>

					<!-- 7.2 Floating WhatsApp Widget -->
					<div class="bopt-tab-pane <?php echo $active_tab === 'floating_wa_widget_tab' ? 'is-active' : ''; ?>" id="tab-pane-floating_wa_widget_tab">
						<div class="bopt-pane-header">
							<h2><?php esc_html_e( 'Floating WhatsApp Customer Support Widget', 'mobile-pasal' ); ?></h2>
							<p><?php esc_html_e( 'Manage the interactive floating customer support chat widget and quick inquiry chips.', 'mobile-pasal' ); ?></p>
						</div>

						<div class="bopt-card">
							<div class="bopt-card-header">
								<div class="bopt-card-header-icon"><i class="fa-solid fa-comments"></i></div>
								<div>
									<h3 class="bopt-card-title"><?php esc_html_e( 'Chat Widget Personality & Pre-filled Chips', 'mobile-pasal' ); ?></h3>
									<p class="bopt-card-desc"><?php esc_html_e( 'Displayed in the bottom right corner on desktop and tablet screens.', 'mobile-pasal' ); ?></p>
								</div>
							</div>
							<div class="bopt-card-body">
								<div class="bopt-field-grid">
									<?php
									mp_render_field_toggle( 'floating_wa_enabled', __( 'Enable Floating WhatsApp Widget', 'mobile-pasal' ), __( 'Displays on desktop and tablets at the bottom right.' ) );
									mp_render_field_text( 'whatsapp_widget_name', __( 'Specialist Name', 'mobile-pasal' ), __( 'Default: Ali Mobile Specialist' ) );
									mp_render_field_text( 'whatsapp_widget_status', __( 'Specialist Status', 'mobile-pasal' ), __( 'Default: Online • Ready to Help' ) );
									mp_render_field_textarea( 'whatsapp_widget_greeting', __( 'Automated Welcome Message', 'mobile-pasal' ), __( 'Default: Namaste! Welcome to Ali Mobile Center & Apple Fix. How can we help you today with handsets or repairs?' ), 3 );
									mp_render_field_text( 'whatsapp_chip1_text', __( 'Quick Inquiry Chip 1', 'mobile-pasal' ), __( 'Default: Today\'s iPhone 16 Price' ) );
									mp_render_field_text( 'whatsapp_chip2_text', __( 'Quick Inquiry Chip 2', 'mobile-pasal' ), __( 'Default: Screen Repair Estimate' ) );
									mp_render_field_text( 'whatsapp_chip3_text', __( 'Quick Inquiry Chip 3', 'mobile-pasal' ), __( 'Default: AirPods / MagSafe Stock' ) );
									mp_render_field_text( 'whatsapp_chip4_text', __( 'Quick Inquiry Chip 4', 'mobile-pasal' ), __( 'Default: Counter Location & Hours' ) );
									?>
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

					<!-- Sticky Bottom Floating Action Dock -->
					<div class="bopt-floating-save-bar">
						<div class="bopt-floating-left">
							<span class="bopt-floating-status"><strong><?php esc_html_e( 'Editing:', 'mobile-pasal' ); ?></strong> <span id="boptActiveModuleLabel"><?php esc_html_e( 'Brand & Global Styles', 'mobile-pasal' ); ?></span></span>
							<span class="bopt-floating-sep">•</span>
							<span class="bopt-floating-tab" id="boptActiveTabLabel"><?php esc_html_e( 'Color Palette & System', 'mobile-pasal' ); ?></span>
						</div>
						<div class="bopt-floating-right">
							<a href="<?php echo esc_url( admin_url( 'admin.php?page=mp-inquiries' ) ); ?>" class="bopt-inbox-btn">
								<i class="fa-solid fa-inbox"></i> <?php esc_html_e( 'View Inquiries', 'mobile-pasal' ); ?>
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
						<button type="button" class="bopt-btn-mobile-top bopt-mobile-top-btn" id="boptMobileTopBtn" aria-label="<?php esc_attr_e( 'Back to top', 'mobile-pasal' ); ?>">
							<i class="fa-solid fa-arrow-up"></i>
						</button>
						<button type="button" class="bopt-btn-mobile-save bopt-mobile-save-action" id="boptMobileSaveBtn">
							<i class="fa-solid fa-floppy-disk"></i>
							<span><?php esc_html_e( 'Save All Settings', 'mobile-pasal' ); ?></span>
						</button>
					</div>

				</form>

			</main>

		</div>

	</div>
	<?php
}
