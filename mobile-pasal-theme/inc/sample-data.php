<?php
/**
 * Mobile Pasal — Automatic Sample Data & Site Initializer
 * Populates showroom handsets, repair services, testimonials, core pages, and navigation menus.
 *
 * @package Mobile_Pasal
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Helper to get theme asset image URL
 */
function mp_asset_img( $path ) {
	return get_template_directory_uri() . '/assets/images/' . ltrim( $path, '/' );
}

/**
 * Return Default Handsets Catalog Data
 */
function mp_get_default_handsets_data() {
	return array(
		array(
			'title'       => 'Apple iPhone 16 Pro Max (Desert Titanium)',
			'slug'        => 'iphone-16-pro-max',
			'brand'       => 'Apple',
			'category'    => 'Flagship',
			'price'       => 'Rs. 1,94,999',
			'old_price'   => 'Rs. 2,05,000',
			'badge'       => 'Bestseller',
			'stock'       => 'in_stock',
			'rating'      => '4.9',
			'reviews'     => '48',
			'color_tag'   => 'Desert Titanium, Natural, Black',
			'screen'      => '6.9" Super Retina XDR OLED 120Hz ProMotion',
			'chip'        => 'Apple A18 Pro (3nm Bionic)',
			'camera'      => '48MP Fusion + 48MP Ultra-Wide + 5x Telephoto',
			'battery'     => '4,685 mAh, MagSafe & 25W Fast Charge',
			'storage'     => '256GB / 512GB / 1TB',
			'warranty'    => '1 Year Official Genxt Warranty + NTA Approved',
			'image'       => 'phones/iphone16pro.png',
			'excerpt'     => 'Grade-A Titanium flagship with groundbreaking Camera Control button, Apple Intelligence architecture, and industry-leading battery longevity.',
		),
		array(
			'title'       => 'Samsung Galaxy S24 Ultra (Titanium Gray)',
			'slug'        => 'samsung-galaxy-s24-ultra',
			'brand'       => 'Samsung',
			'category'    => 'Flagship',
			'price'       => 'Rs. 1,84,999',
			'old_price'   => 'Rs. 1,95,000',
			'badge'       => 'Galaxy AI',
			'stock'       => 'in_stock',
			'rating'      => '4.9',
			'reviews'     => '38',
			'color_tag'   => 'Titanium Gray, Black, Violet',
			'screen'      => '6.8" Flat Dynamic AMOLED 2X 120Hz (2600 nits)',
			'chip'        => 'Snapdragon 8 Gen 3 for Galaxy (4nm)',
			'camera'      => '200MP Main + 50MP Periscope 5x + 100x Space Zoom',
			'battery'     => '5,000 mAh, 45W Fast Charging + S-Pen',
			'storage'     => '256GB / 512GB / 1TB',
			'warranty'    => '1 Year Official Samsung Nepal Warranty + NTA',
			'image'       => 'phones/s24ultra.png',
			'excerpt'     => 'Built-in S-Pen, titanium chassis, anti-reflective Gorilla Armor glass, and native Galaxy AI live translations and circle-to-search.',
		),
		array(
			'title'       => 'OnePlus 12 (Flowy Emerald)',
			'slug'        => 'oneplus-12',
			'brand'       => 'OnePlus',
			'category'    => 'Flagship',
			'price'       => 'Rs. 1,39,999',
			'old_price'   => 'Rs. 1,48,000',
			'badge'       => 'Speed Flagship',
			'stock'       => 'in_stock',
			'rating'      => '4.8',
			'reviews'     => '29',
			'color_tag'   => 'Flowy Emerald, Silky Black',
			'screen'      => '6.82" 2K 120Hz ProXDR Oriental AMOLED (4500 nits)',
			'chip'        => 'Snapdragon 8 Gen 3 (4nm)',
			'camera'      => '4th Gen Hasselblad 50MP LYT-808 + 64MP Periscope',
			'battery'     => '5,400 mAh Dual-cell, 100W SUPERVOOC (Charger in box)',
			'storage'     => '16GB RAM + 512GB Storage',
			'warranty'    => '1 Year Authorized Nepal Warranty + NTA',
			'image'       => 'phones/oneplus12.png',
			'excerpt'     => 'Extreme cooling Dual Cryo-velocity VC chamber, 100W wired turbo charge in 26 minutes, and Hasselblad true-color portraits.',
		),
		array(
			'title'       => 'Xiaomi 14 Ultra (Legendary Black)',
			'slug'        => 'xiaomi-14-ultra',
			'brand'       => 'Xiaomi',
			'category'    => 'Flagship',
			'price'       => 'Rs. 1,59,999',
			'old_price'   => 'Rs. 1,68,000',
			'badge'       => 'Leica Optics',
			'stock'       => 'in_stock',
			'rating'      => '4.9',
			'reviews'     => '24',
			'color_tag'   => 'Black, White Vegan Leather',
			'screen'      => '6.73" WQHD+ 120Hz LTPO AMOLED (3000 nits)',
			'chip'        => 'Snapdragon 8 Gen 3',
			'camera'      => 'Leica Quad 50MP Cameras with 1-inch LYT-900 Sensor',
			'battery'     => '5,000 mAh, 90W HyperCharge + 80W Wireless',
			'storage'     => '16GB RAM + 512GB Storage',
			'warranty'    => '1 Year Official Xiaomi Nepal Warranty',
			'image'       => 'phones/xiaomi14ultra.png',
			'excerpt'     => 'Stepless variable aperture f/1.63-f/4.0, ultra-durable Guardian structure, and professional cinema 8K video capture.',
		),
		array(
			'title'       => 'Apple iPhone 15 (Ultramarine Blue)',
			'slug'        => 'iphone-15',
			'brand'       => 'Apple',
			'category'    => 'Flagship',
			'price'       => 'Rs. 1,18,999',
			'old_price'   => 'Rs. 1,28,000',
			'badge'       => 'Popular Choice',
			'stock'       => 'in_stock',
			'rating'      => '4.8',
			'reviews'     => '64',
			'color_tag'   => 'Blue, Pink, Yellow, Green, Black',
			'screen'      => '6.1" Super Retina XDR OLED with Dynamic Island',
			'chip'        => 'Apple A16 Bionic (4nm)',
			'camera'      => '48MP Main Camera with 2x Telephoto Sensor-Shift OIS',
			'battery'     => '3,349 mAh, USB-C Universal Port',
			'storage'     => '128GB / 256GB',
			'warranty'    => '1 Year Official Genxt Warranty + NTA Approved',
			'image'       => 'phones/iphone15.png',
			'excerpt'     => 'Dynamic Island notifications, 48MP high-resolution camera with lossless 2x zoom crop, and color-infused durable matte back glass.',
		),
		array(
			'title'       => 'Samsung Galaxy A55 5G (Awesome Iceblue)',
			'slug'        => 'samsung-galaxy-a55-5g',
			'brand'       => 'Samsung',
			'category'    => 'Mid-Range',
			'price'       => 'Rs. 53,999',
			'old_price'   => 'Rs. 58,000',
			'badge'       => 'Best Value 5G',
			'stock'       => 'in_stock',
			'rating'      => '4.7',
			'reviews'     => '52',
			'color_tag'   => 'Awesome Iceblue, Awesome Navy, Lilac',
			'screen'      => '6.6" FHD+ Super AMOLED 120Hz Vision Booster',
			'chip'        => 'Exynos 1480 (4nm) with AMD Xclipse 530 GPU',
			'camera'      => '50MP OIS Main + 12MP Ultra-Wide + 5MP Macro',
			'battery'     => '5,000 mAh 2-Day Battery + IP67 Water Resistance',
			'storage'     => '8GB RAM + 128GB / 256GB (microSD up to 1TB)',
			'warranty'    => '1 Year Official Samsung Nepal Warranty + NTA',
			'image'       => 'phones/galaxya55.png',
			'excerpt'     => 'Premium metal frame, Gorilla Glass Victus+, Knox Vault hardware security, and 4 generations of guaranteed Android OS upgrades.',
		),
		array(
			'title'       => 'Redmi Note 13 Pro+ 5G (Midnight Black)',
			'slug'        => 'redmi-note-13-pro-plus',
			'brand'       => 'Xiaomi',
			'category'    => 'Mid-Range',
			'price'       => 'Rs. 47,999',
			'old_price'   => 'Rs. 51,999',
			'badge'       => '120W Turbo',
			'stock'       => 'in_stock',
			'rating'      => '4.8',
			'reviews'     => '41',
			'color_tag'   => 'Midnight Black, Moonlight White, Aurora Purple',
			'screen'      => '6.67" 1.5K 120Hz 3D Curved AMOLED (1800 nits)',
			'chip'        => 'MediaTek Dimensity 7200-Ultra (4nm)',
			'camera'      => '200MP Samsung ISOCELL HP3 with OIS + EIS',
			'battery'     => '5,000 mAh with 120W HyperCharge (0 to 100% in 19m)',
			'storage'     => '8GB / 12GB RAM + 256GB / 512GB Storage',
			'warranty'    => '1 Year Official Xiaomi Nepal Warranty + NTA',
			'image'       => 'phones/redminote13pro.png',
			'excerpt'     => 'First curved display in Redmi Note series with IP68 flagship water protection and blistering 120W wall charger included.',
		),
		array(
			'title'       => 'Vivo V30 Pro 5G (Bloom White)',
			'slug'        => 'vivo-v30-pro-5g',
			'brand'       => 'Vivo',
			'category'    => 'Mid-Range',
			'price'       => 'Rs. 68,999',
			'old_price'   => 'Rs. 72,000',
			'badge'       => 'ZEISS Portrait',
			'stock'       => 'in_stock',
			'rating'      => '4.8',
			'reviews'     => '19',
			'color_tag'   => 'Bloom White, Lush Green, Noble Black',
			'screen'      => '6.78" 1.5K 3D Curved AMOLED 120Hz (2800 nits)',
			'chip'        => 'MediaTek Dimensity 8200 (4nm)',
			'camera'      => 'Co-Engineered ZEISS 50MP Triple Camera with Studio Aura Light',
			'battery'     => '5,000 mAh Ultra-Slim with 80W FlashCharge',
			'storage'     => '12GB RAM + 512GB Storage',
			'warranty'    => '1 Year Official Vivo Nepal Warranty + NTA',
			'image'       => 'phones/vivov30pro.png',
			'excerpt'     => 'Flagship-grade ZEISS cinematic video styles, color-changing glass, and an ultra-thin 7.45mm curved profile.',
		),
		array(
			'title'       => 'Realme 12 Pro+ 5G (Submarine Blue)',
			'slug'        => 'realme-12-pro-plus',
			'brand'       => 'Realme',
			'category'    => 'Mid-Range',
			'price'       => 'Rs. 51,999',
			'old_price'   => 'Rs. 55,000',
			'badge'       => 'Periscope Telephoto',
			'stock'       => 'in_stock',
			'rating'      => '4.7',
			'reviews'     => '27',
			'color_tag'   => 'Submarine Blue, Navigator Beige',
			'screen'      => '6.7" 120Hz Curved Vision OLED Display',
			'chip'        => 'Qualcomm Snapdragon 7s Gen 2 (4nm)',
			'camera'      => '64MP Periscope Portrait OIS (3x Optical, 120x Digital)',
			'battery'     => '5,000 mAh with 67W SUPERVOOC Charge',
			'storage'     => '12GB RAM + 256GB Storage',
			'warranty'    => '1 Year Official Realme Nepal Warranty + NTA',
			'image'       => 'phones/realme12pro.png',
			'excerpt'     => 'Luxury watch design masterminded with Ollivier Saveo, vegan leather back, and periscope optical zoom in under 55K.',
		),
		array(
			'title'       => 'Apple AirPods Pro 2 (USB-C MagSafe)',
			'slug'        => 'apple-airpods-pro-2-usbc',
			'brand'       => 'Apple',
			'category'    => 'Accessories',
			'price'       => 'Rs. 38,999',
			'old_price'   => 'Rs. 42,000',
			'badge'       => 'Original Audio',
			'stock'       => 'in_stock',
			'rating'      => '4.9',
			'reviews'     => '72',
			'color_tag'   => 'White',
			'screen'      => 'H2 Headphone Chip + U1/H2 MagSafe Case',
			'chip'        => 'Apple H2 Audio Architecture',
			'camera'      => 'Dual Beamforming Microphones + Skin Detect',
			'battery'     => 'Up to 30 hours total listening with case',
			'storage'     => 'USB-C Charging with Precision Finding Speaker',
			'warranty'    => '1 Year Official Apple Warranty',
			'image'       => 'gear/airpods_pro.png',
			'excerpt'     => '2x more Active Noise Cancellation, Adaptive Audio that automatically tailors noise control, and Personalized Spatial Audio.',
		),
		array(
			'title'       => 'Samsung Galaxy Watch 6 Classic (47mm)',
			'slug'        => 'samsung-galaxy-watch-6-classic',
			'brand'       => 'Samsung',
			'category'    => 'Accessories',
			'price'       => 'Rs. 44,999',
			'old_price'   => 'Rs. 48,000',
			'badge'       => 'Smart Health',
			'stock'       => 'in_stock',
			'rating'      => '4.8',
			'reviews'     => '21',
			'color_tag'   => 'Black, Silver Stainless Steel',
			'screen'      => '1.5" Super AMOLED Sapphire Crystal Glass',
			'chip'        => 'Exynos W930 Dual Core 1.4GHz',
			'camera'      => 'Optical Heart Rate + ECG + Blood Pressure + BIA',
			'battery'     => '425 mAh with WPC Wireless Fast Charging',
			'storage'     => '2GB RAM + 16GB Internal Storage (Wear OS)',
			'warranty'    => '1 Year Official Samsung Nepal Warranty',
			'image'       => 'gear/galaxy_watch6.png',
			'excerpt'     => 'Iconic mechanical rotating bezel, advanced sleep coaching, body composition analysis, and 5ATM / IP68 water resistance.',
		),
		array(
			'title'       => 'Anker 735 65W GaNPrime Fast Charger',
			'slug'        => 'anker-65w-ganprime-charger',
			'brand'       => 'Accessories',
			'category'    => 'Accessories',
			'price'       => 'Rs. 6,499',
			'old_price'   => 'Rs. 7,200',
			'badge'       => 'Certified Turbo',
			'stock'       => 'in_stock',
			'rating'      => '4.9',
			'reviews'     => '35',
			'color_tag'   => 'Dark Gray / Black',
			'screen'      => 'Compact GaN III Semiconductor Architecture',
			'chip'        => 'PowerIQ 4.0 Dynamic Power Distribution',
			'camera'      => 'ActiveShield 2.0 Real-time Temperature Sensor',
			'battery'     => '65W Max Output (Charges MacBook + iPhone + Watch)',
			'storage'     => '2x USB-C Ports + 1x USB-A Fast Port',
			'warranty'    => '18 Months Official Replacement Guarantee',
			'image'       => 'gear/anker_charger.png',
			'excerpt'     => 'Powers your iPhone from 0 to 50% in 25 minutes while safely powering an ultra-book and accessories simultaneously.',
		),
	);
}

/**
 * Return Default Apple Fix Laboratory Services Data
 */
function mp_get_default_repair_services_data() {
	return array(
		array(
			'title'      => 'Retina & OLED Display Replacement',
			'slug'       => 'oled-display-replacement',
			'icon'       => 'screen',
			'turnaround' => '45–60 Minutes Express',
			'warranty'   => '6 Months Replacement Warranty',
			'price'      => 'From Rs. 2,500',
			'badge'      => 'Cleanroom Certified',
			'models'     => 'iPhone 11 through 16 Pro Max, Samsung Galaxy S/Z Series, OnePlus, Xiaomi',
			'symptoms'   => "Cracked outer cover glass or green lines on screen\nTouch response lag, ghost touches, or dead zones\nComplete black screen while phone still vibrates or rings\nFlickering display or discoloration after accidental drops",
			'excerpt'    => 'Precision cold-press frame laminated OLEDs with 100% True Tone transfer, ambient light sensor calibration, and factory oleophobic coating.',
			'content'    => 'Ali Mobile operates Bardiya’s premier dust-free cleanroom workstation. When you break your iPhone or high-end OLED Android screen, you do not need to send it away to Kathmandu. We stock genuine OEM-grade replacement displays for immediate counter installation. Every display replacement includes EEPROM IC serial reprogramming to retain True Tone and auto-brightness functionality.',
		),
		array(
			'title'      => 'OEM High-Capacity Battery Replacement',
			'slug'       => 'battery-replacement',
			'icon'       => 'battery',
			'turnaround' => '30–45 Minutes',
			'warranty'   => '6 Months Replacement Warranty',
			'price'      => 'From Rs. 1,800',
			'badge'      => '100% Health Calibrated',
			'models'     => 'All iPhones, Samsung Galaxy, Redmi, Vivo, Realme, OnePlus',
			'symptoms'   => "Battery draining rapidly within 3 to 4 hours\nUnexpected shutdowns at 20% or 30% battery level\nPhone running uncomfortably hot during regular calls or charging\niOS Settings displaying 'Service' or health below 80%\nBattery swelling causing the back glass or screen to lift",
			'excerpt'    => 'New grade-A zero-cycle cobalt lithium cells with BMS micro-welding to preserve genuine battery health percentage without error popups.',
			'content'    => 'Degraded lithium batteries degrade performance and cause CPU thermal throttling. At Ali Mobile, we use calibrated spot micro-welders to migrate your original Battery Management System (BMS) board to a brand new zero-cycle high-density cell. This prevents the "Unknown Part" warning on newer iOS versions and ensures accurate 100% battery capacity reporting.',
		),
		array(
			'title'      => 'Ultrasonic Water & Liquid Damage De-Oxidation',
			'slug'       => 'water-damage-restoration',
			'icon'       => 'water',
			'turnaround' => '24–48 Hours',
			'warranty'   => '90 Days Component Warranty',
			'price'      => 'From Rs. 3,500',
			'badge'      => '8-Stage Chemical Lab',
			'models'     => 'All smartphones, tablets, smartwatches, and smart earplugs',
			'symptoms'   => "Device dropped in river, irrigation canal, bucket, or rain\nUnit refuses to turn on, showing red moisture contact indicators\nFogged front or rear camera lenses with condensation\nAudio crackling or short circuits causing rapid heating",
			'excerpt'    => 'Full motherboard teardown, ultrasonic solvent bath, microscopic corrosion brush, and power rail diagnostics to rescue your critical data.',
			'content'    => 'Do NOT put a wet phone in rice—rice starch clogs speaker grills and accelerates internal copper track corrosion. Bring it directly to our lab. We disassemble the logic board and immerse it in an ultrasonic tank with specialized de-ionizing solvents to strip away mineral calcification before measuring resistance across main voltage rails (VDD_MAIN).',
		),
		array(
			'title'      => 'Logic Board & Micro-Soldering (IC Overhaul)',
			'slug'       => 'board-micro-soldering',
			'icon'       => 'board',
			'turnaround' => '2–3 Business Days',
			'warranty'   => '90 Days Lab Warranty',
			'price'      => 'From Rs. 4,500',
			'badge'      => 'High-Magnification Scope',
			'models'     => 'iPhone X through 16 Pro Max, iPad Pro, Samsung Exynos/Snapdragon Boards',
			'symptoms'   => "Phone completely dead; draws 0.00A or peaks at high short on DC power supply\nNo service / Searching for network (Baseband PMU failure)\nAudio IC glitch (greyed-out speakerphone icon, voice memos failing)\nNAND storage corruption, reboot bootloops, or iTunes Error 4013",
			'excerpt'    => 'Component-level board surgery under 45x stereo zoom microscope. We replace power management PMUs, baseband chips, and reball soldered sandwich boards.',
			'content'    => 'Most shops simply tell you that your phone is "dead" and needs an expensive full motherboard replacement. Ali Mobile’s micro-soldering station is equipped with regulated hot-air reflow tools, stereoscopic optical microscopes, and high-precision thermal imaging to isolate microscopic shorted ceramic capacitors and BGA integrated circuits.',
		),
		array(
			'title'      => 'Camera Module & OIS Sensor Repair',
			'slug'       => 'camera-sensor-repair',
			'icon'       => 'camera',
			'turnaround' => '60–90 Minutes',
			'warranty'   => '6 Months Replacement Warranty',
			'price'      => 'From Rs. 2,800',
			'badge'      => 'Original Sapphire',
			'models'     => 'iPhone 11 through 16 Pro, Samsung S21-S24 Ultra, Xiaomi, OnePlus',
			'symptoms'   => "Camera vibrating with buzzing motor sound (OIS coil damage)\nBlack screen when opening native camera app or switching to 3x zoom\nCracked outer sapphire camera lens glass\nBlurry photos unable to lock autofocus",
			'excerpt'    => 'Replacing cracked external sapphire lens caps and restoring optical image stabilization modules damaged by motorcycle handlebar vibration.',
			'content'    => 'High-frequency engine vibration from motorcycles is the number one cause of broken camera stabilization (OIS) across Nepal. We keep OEM camera assemblies and genuine sapphire crystal lens caps in stock to restore razor-sharp 4K video recording within an hour.',
		),
		array(
			'title'      => 'Charging Port & Lightning/Type-C Replacement',
			'slug'       => 'charging-port-replacement',
			'icon'       => 'charging',
			'turnaround' => '30–45 Minutes',
			'warranty'   => '6 Months Replacement Warranty',
			'price'      => 'From Rs. 1,500',
			'badge'      => 'Fast Charge Assured',
			'models'     => 'All USB-C and Apple Lightning handsets & tablets',
			'symptoms'   => "Cable has to be wiggled or bent at a specific angle to start charging\nSlow charging notification or moisture-detected warnings\nMicrophone failure during speakerphone calls\nComputer does not recognize phone via USB data cable",
			'excerpt'    => 'Precision debris extraction, ultrasonic contact cleaning, or full flex ribbon assembly replacement to restore maximum wattage fast charging.',
			'content'    => 'Over months of daily pocket use, lint and moisture pack tightly into the charging cavity. We first perform non-destructive microscope probing. If the copper contact pins are permanently corroded or broken, we replace the entire dock flex ribbon assembly including the bottom noise-canceling microphone.',
		),
	);
}

/**
 * Return Default Testimonials Data
 */
function mp_get_default_testimonials_data() {
	return array(
		array(
			'name'     => 'Bikram Thapa',
			'location' => 'Gulariya Main Chowk, Bardiya',
			'product'  => 'iPhone 16 Pro Max (Desert Titanium 256GB)',
			'rating'   => 5,
			'verified' => 1,
			'content'  => 'I was hesitant about buying an iPhone in Bardiya instead of Kathmandu. Ali Mobile not only provided an official Genxt VAT bill with NTA registration, but also safely transferred all my WhatsApp chats and photos right across the counter. Exceptional service!',
		),
		array(
			'name'     => 'Pooja Shrestha',
			'location' => 'Bansgadhi, Bardiya',
			'product'  => 'Samsung Galaxy S24 Ultra Display Replacement',
			'rating'   => 5,
			'verified' => 1,
			'content'  => 'My S24 Ultra screen shattered during a bike ride. Two shops in Nepalgunj told me I had to leave the phone for 5 days. Ali Mobile fixed it in their cleanroom lab in under an hour while I had tea next door. Touch and color are 100% perfect.',
		),
		array(
			'name'     => 'Dharmendra Yadav',
			'location' => 'Rajapur, Bardiya',
			'product'  => 'Samsung Galaxy A55 5G + Anker Fast Charger',
			'rating'   => 5,
			'verified' => 1,
			'content'  => 'Honest pricing without hidden markup. They clearly explained the warranty difference between unverified grey imports and official NTA-registered models. Highly recommended for genuine phones in Western Nepal.',
		),
		array(
			'name'     => 'Anil Chaudhary',
			'location' => 'Badhaiyatal, Bardiya',
			'product'  => 'iPhone 13 Battery Replacement (Micro-welded)',
			'rating'   => 5,
			'verified' => 1,
			'content'  => 'My battery health was down to 74% and causing phone slowdowns. They replaced it with original-grade cell and re-coded the BMS so there is no annoying battery error in settings. Lasts a full day and a half now!',
		),
	);
}

/**
 * Return Default Core Pages Data
 */
function mp_get_default_pages_data() {
	return array(
		array(
			'title'    => 'Home',
			'slug'     => 'home',
			'template' => 'front-page.php',
			'content'  => 'Welcome to Ali Mobile — Bardiya’s Premier Smartphone Counter & Apple Fix Laboratory.',
		),
		array(
			'title'    => 'Shop Catalog',
			'slug'     => 'shop',
			'template' => 'page-shop.php',
			'content'  => 'Explore our collection of 100% genuine, NTA-approved flagship smartphones and accessories with official manufacturer warranties.',
		),
		array(
			'title'    => 'Apple Fix Lab',
			'slug'     => 'services',
			'template' => 'page-services.php',
			'content'  => 'Advanced mobile motherboard micro-soldering, cleanroom screen lamination, and certified battery replacements at Ali Mobile Gulariya.',
		),
		array(
			'title'    => 'About Ali Mobile',
			'slug'     => 'about',
			'template' => 'page-about.php',
			'content'  => 'Serving Bardiya for over a decade with genuine electronics, transparent service dockets, and verified after-sales support.',
		),
		array(
			'title'    => 'Contact & Location',
			'slug'     => 'contact',
			'template' => 'page-contact.php',
			'content'  => 'Visit our showroom counter in Gulariya Bazaar, call our helpline, or generate an online repair docket for instant queue priority.',
		),
	);
}

/**
 * Main Auto Seeder Function
 */
function mp_auto_seed_sample_data( $force = false ) {
	if ( ! $force && get_option( 'mp_sample_data_seeded_v1' ) ) {
		return;
	}

	// 1. Seed Core Pages
	$pages_data = mp_get_default_pages_data();
	$page_map   = array();

	foreach ( $pages_data as $p ) {
		$existing = get_page_by_path( $p['slug'] );
		if ( ! $existing ) {
			$page_id = wp_insert_post( array(
				'post_title'   => $p['title'],
				'post_name'    => $p['slug'],
				'post_content' => $p['content'],
				'post_status'  => 'publish',
				'post_type'    => 'page',
			) );
		} else {
			$page_id = $existing->ID;
		}

		if ( $page_id && ! is_wp_error( $page_id ) ) {
			$page_map[ $p['slug'] ] = $page_id;
			if ( ! empty( $p['template'] ) ) {
				update_post_meta( $page_id, '_wp_page_template', $p['template'] );
			}
		}
	}

	// Set Homepage to Home page if exists
	if ( isset( $page_map['home'] ) ) {
		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', $page_map['home'] );
	}

	// 2. Seed Handsets
	$existing_handsets = get_posts( array(
		'post_type'      => 'handset',
		'posts_per_page' => 1,
		'post_status'    => 'publish',
	) );

	if ( empty( $existing_handsets ) || $force ) {
		$handsets_data = mp_get_default_handsets_data();
		foreach ( $handsets_data as $h ) {
			$post_id = wp_insert_post( array(
				'post_title'   => $h['title'],
				'post_name'    => $h['slug'],
				'post_excerpt' => $h['excerpt'],
				'post_content' => $h['excerpt'] . "\n\n" . "Available with official warranty at Ali Mobile counter in Gulariya, Bardiya.",
				'post_status'  => 'publish',
				'post_type'    => 'handset',
			) );

			if ( $post_id && ! is_wp_error( $post_id ) ) {
				update_post_meta( $post_id, '_mp_price', $h['price'] );
				update_post_meta( $post_id, '_mp_old_price', $h['old_price'] );
				update_post_meta( $post_id, '_mp_badge', $h['badge'] );
				update_post_meta( $post_id, '_mp_stock_status', $h['stock'] );
				update_post_meta( $post_id, '_mp_rating', $h['rating'] );
				update_post_meta( $post_id, '_mp_reviews_count', $h['reviews'] );
				update_post_meta( $post_id, '_mp_color_tag', $h['color_tag'] );
				update_post_meta( $post_id, '_mp_spec_screen', $h['screen'] );
				update_post_meta( $post_id, '_mp_spec_chip', $h['chip'] );
				update_post_meta( $post_id, '_mp_spec_camera', $h['camera'] );
				update_post_meta( $post_id, '_mp_spec_battery', $h['battery'] );
				update_post_meta( $post_id, '_mp_spec_storage', $h['storage'] );
				update_post_meta( $post_id, '_mp_spec_warranty', $h['warranty'] );
				update_post_meta( $post_id, '_mp_asset_image', $h['image'] );

				// Assign Brand taxonomy
				if ( ! empty( $h['brand'] ) ) {
					wp_set_object_terms( $post_id, $h['brand'], 'device_brand', true );
				}
				// Assign Category taxonomy
				if ( ! empty( $h['category'] ) ) {
					wp_set_object_terms( $post_id, $h['category'], 'device_category', true );
				}
			}
		}
	}

	// 3. Seed Repair Services
	$existing_repairs = get_posts( array(
		'post_type'      => 'repair_service',
		'posts_per_page' => 1,
		'post_status'    => 'publish',
	) );

	if ( empty( $existing_repairs ) || $force ) {
		$repairs_data = mp_get_default_repair_services_data();
		foreach ( $repairs_data as $r ) {
			$post_id = wp_insert_post( array(
				'post_title'   => $r['title'],
				'post_name'    => $r['slug'],
				'post_excerpt' => $r['excerpt'],
				'post_content' => $r['content'],
				'post_status'  => 'publish',
				'post_type'    => 'repair_service',
			) );

			if ( $post_id && ! is_wp_error( $post_id ) ) {
				update_post_meta( $post_id, '_mp_service_icon', $r['icon'] );
				update_post_meta( $post_id, '_mp_service_turnaround', $r['turnaround'] );
				update_post_meta( $post_id, '_mp_service_warranty', $r['warranty'] );
				update_post_meta( $post_id, '_mp_service_price', $r['price'] );
				update_post_meta( $post_id, '_mp_service_badge', $r['badge'] );
				update_post_meta( $post_id, '_mp_service_models', $r['models'] );
				update_post_meta( $post_id, '_mp_service_symptoms', $r['symptoms'] );
			}
		}
	}

	// 4. Seed Customer Reviews
	$existing_reviews = get_posts( array(
		'post_type'      => 'mp_review',
		'posts_per_page' => 1,
		'post_status'    => 'publish',
	) );

	if ( empty( $existing_reviews ) || $force ) {
		$reviews_data = mp_get_default_testimonials_data();
		foreach ( $reviews_data as $t ) {
			$post_id = wp_insert_post( array(
				'post_title'   => $t['name'],
				'post_content' => $t['content'],
				'post_status'  => 'publish',
				'post_type'    => 'mp_review',
			) );

			if ( $post_id && ! is_wp_error( $post_id ) ) {
				update_post_meta( $post_id, '_mp_review_location', $t['location'] );
				update_post_meta( $post_id, '_mp_review_product', $t['product'] );
				update_post_meta( $post_id, '_mp_review_rating', $t['rating'] );
				update_post_meta( $post_id, '_mp_review_verified', $t['verified'] );
			}
		}
	}

	// 5. Create Primary Navigation Menu if empty
	$menu_name = 'Main Header Navigation';
	$menu_obj  = wp_get_nav_menu_object( $menu_name );

	if ( ! $menu_obj ) {
		$menu_id = wp_create_nav_menu( $menu_name );
		if ( ! is_wp_error( $menu_id ) ) {
			// Add Home
			if ( isset( $page_map['home'] ) ) {
				wp_update_nav_menu_item( $menu_id, 0, array(
					'menu-item-title'     => esc_html__( 'Home', 'mobile-pasal' ),
					'menu-item-object'    => 'page',
					'menu-item-object-id' => $page_map['home'],
					'menu-item-type'      => 'post_type',
					'menu-item-status'    => 'publish',
				) );
			}
			// Add Shop
			if ( isset( $page_map['shop'] ) ) {
				wp_update_nav_menu_item( $menu_id, 0, array(
					'menu-item-title'     => esc_html__( 'Handsets & Gear', 'mobile-pasal' ),
					'menu-item-object'    => 'page',
					'menu-item-object-id' => $page_map['shop'],
					'menu-item-type'      => 'post_type',
					'menu-item-status'    => 'publish',
				) );
			}
			// Add Services
			if ( isset( $page_map['services'] ) ) {
				wp_update_nav_menu_item( $menu_id, 0, array(
					'menu-item-title'     => esc_html__( 'Apple Fix Lab', 'mobile-pasal' ),
					'menu-item-object'    => 'page',
					'menu-item-object-id' => $page_map['services'],
					'menu-item-type'      => 'post_type',
					'menu-item-status'    => 'publish',
				) );
			}
			// Add About
			if ( isset( $page_map['about'] ) ) {
				wp_update_nav_menu_item( $menu_id, 0, array(
					'menu-item-title'     => esc_html__( 'About Counter', 'mobile-pasal' ),
					'menu-item-object'    => 'page',
					'menu-item-object-id' => $page_map['about'],
					'menu-item-type'      => 'post_type',
					'menu-item-status'    => 'publish',
				) );
			}
			// Add Contact
			if ( isset( $page_map['contact'] ) ) {
				wp_update_nav_menu_item( $menu_id, 0, array(
					'menu-item-title'     => esc_html__( 'Contact & Docket', 'mobile-pasal' ),
					'menu-item-object'    => 'page',
					'menu-item-object-id' => $page_map['contact'],
					'menu-item-type'      => 'post_type',
					'menu-item-status'    => 'publish',
				) );
			}

			// Assign to theme primary location
			$locations = get_theme_mod( 'nav_menu_locations' );
			$locations['primary'] = $menu_id;
			$locations['footer']  = $menu_id;
			set_theme_mod( 'nav_menu_locations', $locations );
		}
	}

	update_option( 'mp_sample_data_seeded_v1', 1 );
}
add_action( 'after_switch_theme', 'mp_auto_seed_sample_data' );

/**
 * Provide manual trigger in Theme Options admin
 */
add_action( 'admin_init', function() {
	if ( isset( $_GET['mp_action'] ) && 'seed_sample_data' === $_GET['mp_action'] && current_user_can( 'manage_options' ) ) {
		check_admin_referer( 'mp_seed_nonce' );
		mp_auto_seed_sample_data( true );
		wp_safe_redirect( add_query_arg( array( 'page' => 'mobile-pasal-options', 'seeded' => '1' ), admin_url( 'admin.php' ) ) );
		exit;
	}
} );

/**
 * Smart helper: Get handset image URL (uses featured image or theme asset fallback)
 */
function mp_get_handset_img_url( $post_id ) {
	if ( has_post_thumbnail( $post_id ) ) {
		return get_the_post_thumbnail_url( $post_id, 'large' );
	}
	$asset = get_post_meta( $post_id, '_mp_asset_image', true );
	if ( $asset && file_exists( get_template_directory() . '/assets/images/' . $asset ) ) {
		return mp_asset_img( $asset );
	}
	// Smart title mapping to local assets
	$title = strtolower( get_the_title( $post_id ) );
	if ( strpos( $title, '16 pro max' ) !== false ) return mp_asset_img( 'iphone-16-pro-max.jpg' );
	if ( strpos( $title, '16 pro' ) !== false ) return mp_asset_img( 'iphone-16-pro.jpg' );
	if ( strpos( $title, 'iphone 16' ) !== false || strpos( $title, 'iphone 15' ) !== false ) return mp_asset_img( 'iphone-16-colors.jpg' );
	if ( strpos( $title, 's24' ) !== false ) return mp_asset_img( 'samsung-s24-ultra.jpg' );
	if ( strpos( $title, 'fold' ) !== false ) return mp_asset_img( 'samsung-z-fold6.jpg' );
	if ( strpos( $title, 'a55' ) !== false ) return mp_asset_img( 'samsung-a55.jpg' );
	if ( strpos( $title, 'oneplus 12' ) !== false ) return mp_asset_img( 'oneplus-12.jpg' );
	if ( strpos( $title, 'nord' ) !== false ) return mp_asset_img( 'oneplus-nord-4.jpg' );
	if ( strpos( $title, 'xiaomi' ) !== false || strpos( $title, 'redmi' ) !== false ) return mp_asset_img( 'xiaomi-14.jpg' );
	if ( strpos( $title, 'pixel 9 pro' ) !== false ) return mp_asset_img( 'pixel-9-pro.jpg' );
	if ( strpos( $title, 'pixel' ) !== false ) return mp_asset_img( 'google-pixel-9.jpg' );
	if ( strpos( $title, 'reno' ) !== false || strpos( $title, 'oppo' ) !== false || strpos( $title, 'vivo' ) !== false || strpos( $title, 'realme' ) !== false ) return mp_asset_img( 'oppo-reno12.jpg' );
	if ( strpos( $title, 'airpods' ) !== false ) return mp_asset_img( 'acc-airpods.jpg' );
	if ( strpos( $title, 'watch' ) !== false ) return mp_asset_img( 'acc-watch.jpg' );
	if ( strpos( $title, 'charger' ) !== false || strpos( $title, 'anker' ) !== false ) return mp_asset_img( 'acc-charger.jpg' );
	if ( strpos( $title, 'case' ) !== false ) return mp_asset_img( 'acc-cases.jpg' );
	return mp_asset_img( 'iphone-16-pro.jpg' );
}
