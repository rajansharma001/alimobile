<?php
/**
 * Mobile Pasal — Custom Post Types Suite
 * Registers Showroom Handsets, Repair Laboratory Services, and Verified Customer Reviews
 * Fully styled with Theme Options Luxury Design, Touch-Friendly Controls & Mobile Support
 *
 * @package Mobile_Pasal
 * @version 3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * 1. Register Custom Post Types & Taxonomies
 */
function mp_register_custom_post_types() {

	// ─── A. Handsets & Showroom Devices ───
	$handset_labels = array(
		'name'               => esc_html__( 'Showroom Handsets', 'mobile-pasal' ),
		'singular_name'      => esc_html__( 'Handset', 'mobile-pasal' ),
		'menu_name'          => esc_html__( 'Showroom Handsets', 'mobile-pasal' ),
		'name_admin_bar'     => esc_html__( 'Handset', 'mobile-pasal' ),
		'add_new'            => esc_html__( 'Add New Handset', 'mobile-pasal' ),
		'add_new_item'       => esc_html__( 'Add New Showroom Handset', 'mobile-pasal' ),
		'new_item'           => esc_html__( 'New Handset', 'mobile-pasal' ),
		'edit_item'          => esc_html__( 'Edit Handset', 'mobile-pasal' ),
		'view_item'          => esc_html__( 'View Handset', 'mobile-pasal' ),
		'all_items'          => esc_html__( 'All Handsets', 'mobile-pasal' ),
		'search_items'       => esc_html__( 'Search Handsets', 'mobile-pasal' ),
		'not_found'          => esc_html__( 'No handsets found.', 'mobile-pasal' ),
		'not_found_in_trash' => esc_html__( 'No handsets found in Trash.', 'mobile-pasal' ),
	);

	register_post_type( 'handset', array(
		'labels'             => $handset_labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'handsets', 'with_front' => false ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 5,
		'menu_icon'          => 'dashicons-smartphone',
		'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
		'show_in_rest'       => true,
	) );

	// Taxonomy: Device Brand (Apple, Samsung, Xiaomi, OnePlus, Vivo, Realme, Nothing, Tecno)
	register_taxonomy( 'device_brand', array( 'handset' ), array(
		'hierarchical'      => true,
		'labels'            => array(
			'name'              => esc_html__( 'Brands', 'mobile-pasal' ),
			'singular_name'     => esc_html__( 'Brand', 'mobile-pasal' ),
			'search_items'      => esc_html__( 'Search Brands', 'mobile-pasal' ),
			'all_items'         => esc_html__( 'All Brands', 'mobile-pasal' ),
			'edit_item'         => esc_html__( 'Edit Brand', 'mobile-pasal' ),
			'update_item'       => esc_html__( 'Update Brand', 'mobile-pasal' ),
			'add_new_item'      => esc_html__( 'Add New Brand', 'mobile-pasal' ),
			'new_item_name'     => esc_html__( 'New Brand Name', 'mobile-pasal' ),
			'menu_name'         => esc_html__( 'Brands', 'mobile-pasal' ),
		),
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'brand' ),
		'show_in_rest'      => true,
	) );

	// Taxonomy: Device Category / Segment
	register_taxonomy( 'device_category', array( 'handset' ), array(
		'hierarchical'      => true,
		'labels'            => array(
			'name'              => esc_html__( 'Device Categories', 'mobile-pasal' ),
			'singular_name'     => esc_html__( 'Category', 'mobile-pasal' ),
			'search_items'      => esc_html__( 'Search Categories', 'mobile-pasal' ),
			'all_items'         => esc_html__( 'All Categories', 'mobile-pasal' ),
			'edit_item'         => esc_html__( 'Edit Category', 'mobile-pasal' ),
			'update_item'       => esc_html__( 'Update Category', 'mobile-pasal' ),
			'add_new_item'      => esc_html__( 'Add New Category', 'mobile-pasal' ),
			'new_item_name'     => esc_html__( 'New Category Name', 'mobile-pasal' ),
			'menu_name'         => esc_html__( 'Categories', 'mobile-pasal' ),
		),
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'device-type' ),
		'show_in_rest'      => true,
	) );


	// ─── B. Apple Fix Laboratory / Repair Services ───
	$repair_labels = array(
		'name'               => esc_html__( 'Repair Services', 'mobile-pasal' ),
		'singular_name'      => esc_html__( 'Repair Service', 'mobile-pasal' ),
		'menu_name'          => esc_html__( 'Repair Lab', 'mobile-pasal' ),
		'name_admin_bar'     => esc_html__( 'Repair Service', 'mobile-pasal' ),
		'add_new'            => esc_html__( 'Add New Service', 'mobile-pasal' ),
		'add_new_item'       => esc_html__( 'Add New Repair Service', 'mobile-pasal' ),
		'new_item'           => esc_html__( 'New Repair Service', 'mobile-pasal' ),
		'edit_item'          => esc_html__( 'Edit Repair Service', 'mobile-pasal' ),
		'view_item'          => esc_html__( 'View Repair Service', 'mobile-pasal' ),
		'all_items'          => esc_html__( 'All Repair Services', 'mobile-pasal' ),
		'search_items'       => esc_html__( 'Search Services', 'mobile-pasal' ),
		'not_found'          => esc_html__( 'No repair services found.', 'mobile-pasal' ),
		'not_found_in_trash' => esc_html__( 'No services found in Trash.', 'mobile-pasal' ),
	);

	register_post_type( 'repair_service', array(
		'labels'             => $repair_labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'repairs', 'with_front' => false ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 6,
		'menu_icon'          => 'dashicons-admin-tools',
		'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
		'show_in_rest'       => true,
	) );


	// ─── C. Customer Reviews & Verified Testimonials ───
	$review_labels = array(
		'name'               => esc_html__( 'Customer Reviews', 'mobile-pasal' ),
		'singular_name'      => esc_html__( 'Customer Review', 'mobile-pasal' ),
		'menu_name'          => esc_html__( 'Customer Reviews', 'mobile-pasal' ),
		'name_admin_bar'     => esc_html__( 'Review', 'mobile-pasal' ),
		'add_new'            => esc_html__( 'Add New Review', 'mobile-pasal' ),
		'add_new_item'       => esc_html__( 'Add New Review', 'mobile-pasal' ),
		'new_item'           => esc_html__( 'New Review', 'mobile-pasal' ),
		'edit_item'          => esc_html__( 'Edit Review', 'mobile-pasal' ),
		'view_item'          => esc_html__( 'View Review', 'mobile-pasal' ),
		'all_items'          => esc_html__( 'All Reviews', 'mobile-pasal' ),
		'search_items'       => esc_html__( 'Search Reviews', 'mobile-pasal' ),
		'not_found'          => esc_html__( 'No reviews found.', 'mobile-pasal' ),
		'not_found_in_trash' => esc_html__( 'No reviews in Trash.', 'mobile-pasal' ),
	);

	register_post_type( 'mp_review', array(
		'labels'             => $review_labels,
		'public'             => false,
		'publicly_queryable' => false,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => false,
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => 7,
		'menu_icon'          => 'dashicons-star-filled',
		'supports'           => array( 'title', 'editor', 'thumbnail' ),
		'show_in_rest'       => true,
	) );
}
add_action( 'init', 'mp_register_custom_post_types' );


/**
 * 2. Enqueue Custom Post Types Admin Assets
 */
function mp_admin_cpt_enqueue( $hook ) {
	$screen = get_current_screen();
	if ( ! $screen ) {
		return;
	}

	$target_types = array( 'handset', 'repair_service', 'mp_review' );
	if ( in_array( $screen->post_type, $target_types, true ) ) {
		wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css', array(), '6.5.1' );

		$css_path = get_template_directory() . '/assets/css/admin-cpt.css';
		$js_path  = get_template_directory() . '/assets/js/admin-cpt.js';
		$css_ver  = file_exists( $css_path ) ? filemtime( $css_path ) : '3.5.0';
		$js_ver   = file_exists( $js_path ) ? filemtime( $js_path ) : '3.5.0';

		wp_enqueue_style( 'mp-admin-cpt', get_template_directory_uri() . '/assets/css/admin-cpt.css', array(), $css_ver );
		wp_enqueue_script( 'mp-admin-cpt', get_template_directory_uri() . '/assets/js/admin-cpt.js', array( 'jquery' ), $js_ver, true );
	}
}
add_action( 'admin_enqueue_scripts', 'mp_admin_cpt_enqueue' );


/**
 * 3. Executive Top Header Banner for CPT Edit Screens
 */
function mp_cpt_edit_header_banner() {
	$screen = get_current_screen();
	if ( ! $screen || 'post' !== $screen->base ) {
		return;
	}

	$cpt = $screen->post_type;
	if ( ! in_array( $cpt, array( 'handset', 'repair_service', 'mp_review' ), true ) ) {
		return;
	}

	$title     = '';
	$icon      = '';
	$desc      = '';
	$theme_tab = '';

	if ( 'handset' === $cpt ) {
		$title     = __( 'Showroom Handset Studio', 'mobile-pasal' );
		$icon      = 'fa-mobile-screen';
		$desc      = __( 'Configure smartphone retail price, NTA approval, counter stock status, and hardware specifications.', 'mobile-pasal' );
		$theme_tab = 'shop_inventory_tab';
	} elseif ( 'repair_service' === $cpt ) {
		$title     = __( 'Apple Fix Repair Lab Studio', 'mobile-pasal' );
		$icon      = 'fa-screwdriver-wrench';
		$desc      = __( 'Configure cleanroom repair diagnostic fee, turnaround warranty, and supported smartphone models.', 'mobile-pasal' );
		$theme_tab = 'services_labs_tab';
	} elseif ( 'mp_review' === $cpt ) {
		$title     = __( 'Customer Review Desk', 'mobile-pasal' );
		$icon      = 'fa-star';
		$desc      = __( 'Verify Bardiya buyer feedback, 5-star ratings, and customer testimonial quotes.', 'mobile-pasal' );
		$theme_tab = 'reviews_map_sec';
	}
	?>
	<div class="mp-cpt-banner">
		<div class="mp-cpt-banner-left">
			<div class="mp-cpt-banner-icon"><i class="fa-solid <?php echo esc_attr( $icon ); ?>"></i></div>
			<div>
				<h1 class="mp-cpt-banner-title"><?php echo esc_html( $title ); ?></h1>
				<p class="mp-cpt-banner-desc"><?php echo esc_html( $desc ); ?></p>
			</div>
		</div>
		<div class="mp-cpt-banner-right">
			<a href="<?php echo esc_url( admin_url( 'admin.php?page=mobile-pasal-options&tab=' . $theme_tab ) ); ?>" class="mp-cpt-btn-action">
				<i class="fa-solid fa-sliders"></i> <?php esc_html_e( 'Theme Options', 'mobile-pasal' ); ?>
			</a>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" target="_blank" class="mp-cpt-btn-action">
				<i class="fa-solid fa-arrow-up-right-from-square"></i> <?php esc_html_e( 'View Live Site', 'mobile-pasal' ); ?>
			</a>
		</div>
	</div>
	<?php
}
add_action( 'edit_form_top', 'mp_cpt_edit_header_banner' );


/**
 * 4. Handset Meta Boxes
 */
function mp_add_handset_meta_boxes() {
	add_meta_box(
		'mp_handset_details',
		esc_html__( 'Showroom Handset Specifications & Pricing Matrix', 'mobile-pasal' ),
		'mp_render_handset_meta_box',
		'handset',
		'normal',
		'high'
	);
}
add_action( 'add_meta_boxes', 'mp_add_handset_meta_boxes' );

function mp_render_handset_meta_box( $post ) {
	wp_nonce_field( 'mp_save_handset_meta', 'mp_handset_meta_nonce' );

	$price         = get_post_meta( $post->ID, '_mp_price', true );
	$old_price     = get_post_meta( $post->ID, '_mp_old_price', true );
	$show_price    = get_post_meta( $post->ID, '_mp_show_price', true );
	$hide_price    = ( 'hide' === $show_price || '1' === get_post_meta( $post->ID, '_mp_hide_price', true ) ) ? '1' : '0';
	$badge         = get_post_meta( $post->ID, '_mp_badge', true );
	$stock_status  = get_post_meta( $post->ID, '_mp_stock_status', true ) ?: 'in_stock';
	$rating        = get_post_meta( $post->ID, '_mp_rating', true ) ?: '4.9';
	$reviews_count = get_post_meta( $post->ID, '_mp_reviews_count', true ) ?: '36';
	$color_tag     = get_post_meta( $post->ID, '_mp_color_tag', true );

	// Hardware Specs
	$spec_screen   = get_post_meta( $post->ID, '_mp_spec_screen', true );
	$spec_chip     = get_post_meta( $post->ID, '_mp_spec_chip', true );
	$spec_camera   = get_post_meta( $post->ID, '_mp_spec_camera', true );
	$spec_battery  = get_post_meta( $post->ID, '_mp_spec_battery', true );
	$spec_storage  = get_post_meta( $post->ID, '_mp_spec_storage', true );
	$spec_warranty = get_post_meta( $post->ID, '_mp_spec_warranty', true );
	$whatsapp_msg  = get_post_meta( $post->ID, '_mp_whatsapp_msg', true );
	?>

	<!-- Section 1: Pricing & Stock Availability -->
	<div class="mp-meta-section">
		<div class="mp-meta-section-header">
			<div class="mp-meta-section-icon"><i class="fa-solid fa-tag"></i></div>
			<h3 class="mp-meta-section-title"><?php esc_html_e( 'Retail Pricing & Counter Stock Status', 'mobile-pasal' ); ?></h3>
		</div>
		<div class="mp-meta-grid">
			<div class="mp-meta-field">
				<label for="mp_price"><i class="fa-solid fa-money-bill-wave"></i> <?php esc_html_e( 'Display Price (e.g. Rs. 1,94,999)', 'mobile-pasal' ); ?></label>
				<input type="text" id="mp_price" name="_mp_price" value="<?php echo esc_attr( $price ); ?>" placeholder="Rs. 1,94,999">
			</div>

			<div class="mp-meta-field">
				<label for="mp_old_price"><i class="fa-solid fa-strikethrough"></i> <?php esc_html_e( 'Regular / Crossed Price (optional)', 'mobile-pasal' ); ?></label>
				<input type="text" id="mp_old_price" name="_mp_old_price" value="<?php echo esc_attr( $old_price ); ?>" placeholder="Rs. 2,05,000">
			</div>

			<div class="mp-meta-field">
				<label for="mp_badge"><i class="fa-solid fa-award"></i> <?php esc_html_e( 'Showcase Badge', 'mobile-pasal' ); ?></label>
				<input type="text" id="mp_badge" name="_mp_badge" value="<?php echo esc_attr( $badge ); ?>" placeholder="Official NTA Approved">
			</div>

			<div class="mp-meta-field">
				<label for="mp_hide_price"><i class="fa-solid fa-eye-slash"></i> <?php esc_html_e( 'Price Visibility', 'mobile-pasal' ); ?></label>
				<label style="display:inline-flex;align-items:center;gap:8px;font-weight:600;cursor:pointer;margin-top:8px;">
					<input type="checkbox" id="mp_hide_price" name="_mp_hide_price" value="1" <?php checked( $hide_price, '1' ); ?>>
					<span><?php esc_html_e( 'Hide price on this product (show "Inquire for Price")', 'mobile-pasal' ); ?></span>
				</label>
			</div>

			<div class="mp-meta-field">
				<label for="mp_stock_status"><i class="fa-solid fa-boxes-stacked"></i> <?php esc_html_e( 'Counter Stock Availability', 'mobile-pasal' ); ?></label>
				<!-- Touch Pills for Fast Mobile Selection -->
				<div class="mp-stock-pills">
					<button type="button" class="mp-stock-pill-btn in_stock" data-stock="in_stock">
						<i class="fa-solid fa-check"></i> <?php esc_html_e( 'In Stock', 'mobile-pasal' ); ?>
					</button>
					<button type="button" class="mp-stock-pill-btn low_stock" data-stock="low_stock">
						<i class="fa-solid fa-triangle-exclamation"></i> <?php esc_html_e( 'Low Stock', 'mobile-pasal' ); ?>
					</button>
					<button type="button" class="mp-stock-pill-btn pre_order" data-stock="pre_order">
						<i class="fa-solid fa-clock"></i> <?php esc_html_e( 'Pre-Order', 'mobile-pasal' ); ?>
					</button>
					<button type="button" class="mp-stock-pill-btn out_of_stock" data-stock="out_of_stock">
						<i class="fa-solid fa-xmark"></i> <?php esc_html_e( 'Out of Stock', 'mobile-pasal' ); ?>
					</button>
				</div>
				<select id="mp_stock_status" name="_mp_stock_status" style="display:none;">
					<option value="in_stock" <?php selected( $stock_status, 'in_stock' ); ?>><?php esc_html_e( 'In Stock at Gulariya Showroom', 'mobile-pasal' ); ?></option>
					<option value="low_stock" <?php selected( $stock_status, 'low_stock' ); ?>><?php esc_html_e( 'Limited Units Available (Low Stock)', 'mobile-pasal' ); ?></option>
					<option value="pre_order" <?php selected( $stock_status, 'pre_order' ); ?>><?php esc_html_e( 'Available for Pre-Order / Booking', 'mobile-pasal' ); ?></option>
					<option value="out_of_stock" <?php selected( $stock_status, 'out_of_stock' ); ?>><?php esc_html_e( 'Temporarily Out of Stock', 'mobile-pasal' ); ?></option>
				</select>
			</div>
		</div>
	</div>

	<!-- Section 2: Ratings & Color Variants -->
	<div class="mp-meta-section">
		<div class="mp-meta-section-header">
			<div class="mp-meta-section-icon"><i class="fa-solid fa-star"></i></div>
			<h3 class="mp-meta-section-title"><?php esc_html_e( 'Customer Score & Color Options', 'mobile-pasal' ); ?></h3>
		</div>
		<div class="mp-meta-grid">
			<div class="mp-meta-field">
				<label for="mp_rating"><i class="fa-solid fa-star-half-stroke"></i> <?php esc_html_e( 'Rating Score (e.g. 4.9)', 'mobile-pasal' ); ?></label>
				<input type="text" id="mp_rating" name="_mp_rating" value="<?php echo esc_attr( $rating ); ?>" placeholder="4.9">
			</div>

			<div class="mp-meta-field">
				<label for="mp_reviews_count"><i class="fa-solid fa-comments"></i> <?php esc_html_e( 'Review Count (e.g. 42)', 'mobile-pasal' ); ?></label>
				<input type="text" id="mp_reviews_count" name="_mp_reviews_count" value="<?php echo esc_attr( $reviews_count ); ?>" placeholder="42">
			</div>

			<div class="mp-meta-field span-full">
				<label for="mp_color_tag"><i class="fa-solid fa-palette"></i> <?php esc_html_e( 'Color Variants (e.g. Desert Titanium, Natural, Black)', 'mobile-pasal' ); ?></label>
				<input type="text" id="mp_color_tag" name="_mp_color_tag" value="<?php echo esc_attr( $color_tag ); ?>" placeholder="Desert Titanium, Black, White">
			</div>
		</div>
	</div>

	<!-- Section 3: Hardware Specifications Matrix -->
	<div class="mp-meta-section">
		<div class="mp-meta-section-header">
			<div class="mp-meta-section-icon"><i class="fa-solid fa-microchip"></i></div>
			<h3 class="mp-meta-section-title"><?php esc_html_e( 'Hardware Specifications Matrix', 'mobile-pasal' ); ?></h3>
		</div>
		<div class="mp-meta-grid">
			<div class="mp-meta-field">
				<label for="mp_spec_screen"><i class="fa-solid fa-mobile-screen"></i> <?php esc_html_e( 'Display / Screen', 'mobile-pasal' ); ?></label>
				<input type="text" id="mp_spec_screen" name="_mp_spec_screen" value="<?php echo esc_attr( $spec_screen ); ?>" placeholder="6.9 inch Super Retina XDR OLED 120Hz">
			</div>

			<div class="mp-meta-field">
				<label for="mp_spec_chip"><i class="fa-solid fa-microchip"></i> <?php esc_html_e( 'Processor / Chipset', 'mobile-pasal' ); ?></label>
				<input type="text" id="mp_spec_chip" name="_mp_spec_chip" value="<?php echo esc_attr( $spec_chip ); ?>" placeholder="Apple A18 Pro 3nm Bionic">
			</div>

			<div class="mp-meta-field">
				<label for="mp_spec_camera"><i class="fa-solid fa-camera"></i> <?php esc_html_e( 'Camera Setup', 'mobile-pasal' ); ?></label>
				<input type="text" id="mp_spec_camera" name="_mp_spec_camera" value="<?php echo esc_attr( $spec_camera ); ?>" placeholder="48MP Fusion + 48MP Ultra Wide + 5x Telephoto">
			</div>

			<div class="mp-meta-field">
				<label for="mp_spec_battery"><i class="fa-solid fa-battery-full"></i> <?php esc_html_e( 'Battery & Charging', 'mobile-pasal' ); ?></label>
				<input type="text" id="mp_spec_battery" name="_mp_spec_battery" value="<?php echo esc_attr( $spec_battery ); ?>" placeholder="4,685 mAh, MagSafe & USB-C Fast Charge">
			</div>

			<div class="mp-meta-field">
				<label for="mp_spec_storage"><i class="fa-solid fa-hard-drive"></i> <?php esc_html_e( 'Storage Configurations', 'mobile-pasal' ); ?></label>
				<input type="text" id="mp_spec_storage" name="_mp_spec_storage" value="<?php echo esc_attr( $spec_storage ); ?>" placeholder="256GB / 512GB / 1TB">
			</div>

			<div class="mp-meta-field">
				<label for="mp_spec_warranty"><i class="fa-solid fa-shield-halved"></i> <?php esc_html_e( 'Warranty & Official IMEI', 'mobile-pasal' ); ?></label>
				<input type="text" id="mp_spec_warranty" name="_mp_spec_warranty" value="<?php echo esc_attr( $spec_warranty ); ?>" placeholder="1 Year Official Warranty + NTA Registered">
			</div>
		</div>
	</div>

	<!-- Section 4: WhatsApp Direct Order Message -->
	<div class="mp-meta-section">
		<div class="mp-meta-section-header">
			<div class="mp-meta-section-icon" style="background:#ecfdf5; color:#059669;"><i class="fa-brands fa-whatsapp"></i></div>
			<h3 class="mp-meta-section-title"><?php esc_html_e( 'WhatsApp Direct Counter Order', 'mobile-pasal' ); ?></h3>
		</div>
		<div class="mp-meta-field span-full">
			<label for="mp_whatsapp_msg"><?php esc_html_e( 'Custom WhatsApp Order Message (Leave empty for automatic format)', 'mobile-pasal' ); ?></label>
			<input type="text" id="mp_whatsapp_msg" name="_mp_whatsapp_msg" value="<?php echo esc_attr( $whatsapp_msg ); ?>" placeholder="Namaste Ali Mobile, I am interested in purchasing this handset. Is it available in stock today?">
		</div>
	</div>
	<?php
}

function mp_save_handset_meta( $post_id ) {
	if ( ! isset( $_POST['mp_handset_meta_nonce'] ) || ! wp_verify_nonce( $_POST['mp_handset_meta_nonce'], 'mp_save_handset_meta' ) ) {
		return;
	}
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	$fields = array(
		'_mp_price',
		'_mp_old_price',
		'_mp_badge',
		'_mp_stock_status',
		'_mp_rating',
		'_mp_reviews_count',
		'_mp_color_tag',
		'_mp_spec_screen',
		'_mp_spec_chip',
		'_mp_spec_camera',
		'_mp_spec_battery',
		'_mp_spec_storage',
		'_mp_spec_warranty',
		'_mp_whatsapp_msg',
	);

	foreach ( $fields as $f ) {
		if ( isset( $_POST[ $f ] ) ) {
			update_post_meta( $post_id, $f, sanitize_text_field( wp_unslash( $_POST[ $f ] ) ) );
		}
	}

	$is_hidden = isset( $_POST['_mp_hide_price'] ) && '1' === (string) $_POST['_mp_hide_price'];
	update_post_meta( $post_id, '_mp_hide_price', $is_hidden ? '1' : '0' );
	$current_show = get_post_meta( $post_id, '_mp_show_price', true );
	if ( $is_hidden ) {
		update_post_meta( $post_id, '_mp_show_price', 'hide' );
	} elseif ( 'hide' === $current_show ) {
		update_post_meta( $post_id, '_mp_show_price', 'inherit' );
	}
}
add_action( 'save_post_handset', 'mp_save_handset_meta' );


/**
 * 5. Repair Service Meta Boxes
 */
function mp_add_repair_service_meta_boxes() {
	add_meta_box(
		'mp_repair_details',
		esc_html__( 'Apple Fix Laboratory Service & Turnaround Specs', 'mobile-pasal' ),
		'mp_render_repair_meta_box',
		'repair_service',
		'normal',
		'high'
	);
}
add_action( 'add_meta_boxes', 'mp_add_repair_service_meta_boxes' );

function mp_render_repair_meta_box( $post ) {
	wp_nonce_field( 'mp_save_repair_meta', 'mp_repair_meta_nonce' );

	$icon_key    = get_post_meta( $post->ID, '_mp_service_icon', true ) ?: 'screen';
	$turnaround  = get_post_meta( $post->ID, '_mp_service_turnaround', true ) ?: '45–60 Minutes';
	$warranty    = get_post_meta( $post->ID, '_mp_service_warranty', true ) ?: '6 Months Replacement Warranty';
	$price_start = get_post_meta( $post->ID, '_mp_service_price', true ) ?: 'From Rs. 2,500';
	$badge       = get_post_meta( $post->ID, '_mp_service_badge', true ) ?: 'Express Lab Service';
	$symptoms    = get_post_meta( $post->ID, '_mp_service_symptoms', true );
	$models      = get_post_meta( $post->ID, '_mp_service_models', true );
	?>
	<div class="mp-meta-section">
		<div class="mp-meta-section-header">
			<div class="mp-meta-section-icon"><i class="fa-solid fa-microscope"></i></div>
			<h3 class="mp-meta-section-title"><?php esc_html_e( 'Laboratory Turnaround & Diagnostic Pricing', 'mobile-pasal' ); ?></h3>
		</div>
		<div class="mp-meta-grid">
			<div class="mp-meta-field">
				<label for="mp_service_icon"><i class="fa-solid fa-icons"></i> <?php esc_html_e( 'Service Workstation Icon', 'mobile-pasal' ); ?></label>
				<select id="mp_service_icon" name="_mp_service_icon">
					<option value="screen" <?php selected( $icon_key, 'screen' ); ?>><?php esc_html_e( 'Display / OLED Screen Replacement', 'mobile-pasal' ); ?></option>
					<option value="battery" <?php selected( $icon_key, 'battery' ); ?>><?php esc_html_e( 'Battery Replacement / Health Calibration', 'mobile-pasal' ); ?></option>
					<option value="water" <?php selected( $icon_key, 'water' ); ?>><?php esc_html_e( 'Water Damage & Ultrasonic De-Oxidation', 'mobile-pasal' ); ?></option>
					<option value="board" <?php selected( $icon_key, 'board' ); ?>><?php esc_html_e( 'Logic Board & IC Micro-Soldering', 'mobile-pasal' ); ?></option>
					<option value="camera" <?php selected( $icon_key, 'camera' ); ?>><?php esc_html_e( 'Camera Lens, OIS & Sensor Repair', 'mobile-pasal' ); ?></option>
					<option value="charging" <?php selected( $icon_key, 'charging' ); ?>><?php esc_html_e( 'Charging Port & Lightning/Type-C Replacement', 'mobile-pasal' ); ?></option>
					<option value="software" <?php selected( $icon_key, 'software' ); ?>><?php esc_html_e( 'iOS / Android Firmware, Unlocking & Recovery', 'mobile-pasal' ); ?></option>
				</select>
			</div>

			<div class="mp-meta-field">
				<label for="mp_service_turnaround"><i class="fa-solid fa-stopwatch"></i> <?php esc_html_e( 'Express Turnaround Time', 'mobile-pasal' ); ?></label>
				<input type="text" id="mp_service_turnaround" name="_mp_service_turnaround" value="<?php echo esc_attr( $turnaround ); ?>" placeholder="45–60 Minutes">
			</div>

			<div class="mp-meta-field">
				<label for="mp_service_warranty"><i class="fa-solid fa-shield-halved"></i> <?php esc_html_e( 'Counter Warranty Period', 'mobile-pasal' ); ?></label>
				<input type="text" id="mp_service_warranty" name="_mp_service_warranty" value="<?php echo esc_attr( $warranty ); ?>" placeholder="6 Months Replacement Warranty">
			</div>

			<div class="mp-meta-field">
				<label for="mp_service_price"><i class="fa-solid fa-money-bill-wave"></i> <?php esc_html_e( 'Starting Estimate', 'mobile-pasal' ); ?></label>
				<input type="text" id="mp_service_price" name="_mp_service_price" value="<?php echo esc_attr( $price_start ); ?>" placeholder="From Rs. 2,500">
			</div>

			<div class="mp-meta-field">
				<label for="mp_service_badge"><i class="fa-solid fa-award"></i> <?php esc_html_e( 'Service Badge (optional)', 'mobile-pasal' ); ?></label>
				<input type="text" id="mp_service_badge" name="_mp_service_badge" value="<?php echo esc_attr( $badge ); ?>" placeholder="Cleanroom Lab">
			</div>
		</div>
	</div>

	<div class="mp-meta-section">
		<div class="mp-meta-section-header">
			<div class="mp-meta-section-icon"><i class="fa-solid fa-screwdriver-wrench"></i></div>
			<h3 class="mp-meta-section-title"><?php esc_html_e( 'Hardware Compatibility & Common Fault Symptoms', 'mobile-pasal' ); ?></h3>
		</div>
		<div class="mp-meta-grid">
			<div class="mp-meta-field span-full">
				<label for="mp_service_models"><i class="fa-solid fa-mobile-screen"></i> <?php esc_html_e( 'Supported Devices (e.g. iPhone 11 through 16 Pro Max, Samsung S Series, OnePlus)', 'mobile-pasal' ); ?></label>
				<input type="text" id="mp_service_models" name="_mp_service_models" value="<?php echo esc_attr( $models ); ?>" placeholder="iPhone 11 through 16 Pro Max, Samsung S/Note Series, iPad, OnePlus">
			</div>

			<div class="mp-meta-field span-full">
				<label for="mp_service_symptoms"><i class="fa-solid fa-list-check"></i> <?php esc_html_e( 'Typical Symptoms (One per line)', 'mobile-pasal' ); ?></label>
				<textarea id="mp_service_symptoms" name="_mp_service_symptoms" rows="4" placeholder="Cracked glass or green lines on display&#10;Touch screen unresponsive&#10;Black screen while phone still vibrates"><?php echo esc_textarea( $symptoms ); ?></textarea>
			</div>
		</div>
	</div>
	<?php
}

function mp_save_repair_meta( $post_id ) {
	if ( ! isset( $_POST['mp_repair_meta_nonce'] ) || ! wp_verify_nonce( $_POST['mp_repair_meta_nonce'], 'mp_save_repair_meta' ) ) {
		return;
	}
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	$fields = array(
		'_mp_service_icon',
		'_mp_service_turnaround',
		'_mp_service_warranty',
		'_mp_service_price',
		'_mp_service_badge',
		'_mp_service_models',
	);

	foreach ( $fields as $f ) {
		if ( isset( $_POST[ $f ] ) ) {
			update_post_meta( $post_id, $f, sanitize_text_field( wp_unslash( $_POST[ $f ] ) ) );
		}
	}

	if ( isset( $_POST['_mp_service_symptoms'] ) ) {
		update_post_meta( $post_id, '_mp_service_symptoms', sanitize_textarea_field( wp_unslash( $_POST['_mp_service_symptoms'] ) ) );
	}
}
add_action( 'save_post_repair_service', 'mp_save_repair_meta' );


/**
 * 6. Customer Review Meta Boxes
 */
function mp_add_review_meta_boxes() {
	add_meta_box(
		'mp_review_details',
		esc_html__( 'Customer Review Verification Details', 'mobile-pasal' ),
		'mp_render_review_meta_box',
		'mp_review',
		'normal',
		'high'
	);
}
add_action( 'add_meta_boxes', 'mp_add_review_meta_boxes' );

function mp_render_review_meta_box( $post ) {
	wp_nonce_field( 'mp_save_review_meta', 'mp_review_meta_nonce' );

	$location = get_post_meta( $post->ID, '_mp_review_location', true ) ?: 'Gulariya, Bardiya';
	$product  = get_post_meta( $post->ID, '_mp_review_product', true );
	$rating   = intval( get_post_meta( $post->ID, '_mp_review_rating', true ) ?: 5 );
	$verified = get_post_meta( $post->ID, '_mp_review_verified', true ) !== '0';
	?>
	<div class="mp-meta-section">
		<div class="mp-meta-section-header">
			<div class="mp-meta-section-icon" style="background:#fffbeb; color:#f59e0b;"><i class="fa-solid fa-star"></i></div>
			<h3 class="mp-meta-section-title"><?php esc_html_e( 'Customer Verification & Rating Score', 'mobile-pasal' ); ?></h3>
		</div>
		<div class="mp-meta-grid">
			<div class="mp-meta-field">
				<label for="mp_review_location"><i class="fa-solid fa-location-dot"></i> <?php esc_html_e( 'Customer Location (e.g. Gulariya / Bansgadhi / Kohalpur)', 'mobile-pasal' ); ?></label>
				<input type="text" id="mp_review_location" name="_mp_review_location" value="<?php echo esc_attr( $location ); ?>">
			</div>

			<div class="mp-meta-field">
				<label for="mp_review_product"><i class="fa-solid fa-mobile-screen"></i> <?php esc_html_e( 'Device / Service Purchased', 'mobile-pasal' ); ?></label>
				<input type="text" id="mp_review_product" name="_mp_review_product" value="<?php echo esc_attr( $product ); ?>" placeholder="iPhone 16 Pro Max 256GB">
			</div>

			<div class="mp-meta-field">
				<label><i class="fa-solid fa-star"></i> <?php esc_html_e( 'Rating Score (1 - 5 Stars)', 'mobile-pasal' ); ?></label>
				<div class="mp-star-rating-picker">
					<?php for ( $i = 1; $i <= 5; $i++ ) : ?>
						<i class="fa-<?php echo $i <= $rating ? 'solid' : 'regular'; ?> fa-star mp-star-item <?php echo $i <= $rating ? 'is-active' : ''; ?>" data-score="<?php echo esc_attr( $i ); ?>"></i>
					<?php endfor; ?>
				</div>
				<select id="mp_review_rating" name="_mp_review_rating" style="display:none;">
					<option value="5" <?php selected( $rating, 5 ); ?>>5 Stars</option>
					<option value="4" <?php selected( $rating, 4 ); ?>>4 Stars</option>
					<option value="3" <?php selected( $rating, 3 ); ?>>3 Stars</option>
					<option value="2" <?php selected( $rating, 2 ); ?>>2 Stars</option>
					<option value="1" <?php selected( $rating, 1 ); ?>>1 Star</option>
				</select>
			</div>

			<div class="mp-meta-field" style="align-self: flex-end;">
				<label class="mp-toggle-wrap">
					<input type="checkbox" name="_mp_review_verified" value="1" <?php checked( $verified, true ); ?>>
					<span class="mp-toggle-label"><i class="fa-solid fa-circle-check" style="color:#16a34a;"></i> <?php esc_html_e( 'Display Verified Buyer / Client Badge', 'mobile-pasal' ); ?></span>
				</label>
			</div>
		</div>
	</div>
	<?php
}

function mp_save_review_meta( $post_id ) {
	if ( ! isset( $_POST['mp_review_meta_nonce'] ) || ! wp_verify_nonce( $_POST['mp_review_meta_nonce'], 'mp_save_review_meta' ) ) {
		return;
	}
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	$fields = array( '_mp_review_location', '_mp_review_product', '_mp_review_rating' );
	foreach ( $fields as $f ) {
		if ( isset( $_POST[ $f ] ) ) {
			update_post_meta( $post_id, $f, sanitize_text_field( wp_unslash( $_POST[ $f ] ) ) );
		}
	}

	$verified = isset( $_POST['_mp_review_verified'] ) ? '1' : '0';
	update_post_meta( $post_id, '_mp_review_verified', $verified );
}
add_action( 'save_post_mp_review', 'mp_save_review_meta' );


/**
 * 7. Custom Columns for Admin Lists
 */

// A. Showroom Handsets Columns
function mp_handset_columns( $columns ) {
	$new_columns = array();
	foreach ( $columns as $k => $v ) {
		$new_columns[ $k ] = $v;
		if ( 'title' === $k ) {
			$new_columns['mp_thumb'] = esc_html__( 'Preview', 'mobile-pasal' );
			$new_columns['mp_brand'] = esc_html__( 'Brand', 'mobile-pasal' );
			$new_columns['mp_price'] = esc_html__( 'Price', 'mobile-pasal' );
			$new_columns['mp_stock'] = esc_html__( 'Stock Status', 'mobile-pasal' );
		}
	}
	return $new_columns;
}
add_filter( 'manage_handset_posts_columns', 'mp_handset_columns' );

function mp_handset_custom_column( $column, $post_id ) {
	switch ( $column ) {
		case 'mp_thumb':
			if ( has_post_thumbnail( $post_id ) ) {
				echo get_the_post_thumbnail( $post_id, array( 50, 50 ), array( 'style' => 'width:50px; height:50px; object-fit:contain; border-radius:6px; background:#f8fafc; border:1px solid #e2e8f0;' ) );
			} else {
				echo '<div style="width:50px; height:50px; border-radius:6px; background:#f1f5f9; border:1px solid #cbd5e1; display:flex; align-items:center; justify-content:center; color:#94a3b8;"><i class="fa-solid fa-mobile-screen"></i></div>';
			}
			break;
		case 'mp_brand':
			$terms = get_the_term_list( $post_id, 'device_brand', '', ', ' );
			echo $terms ? $terms : '<span style="color:#94a3b8;">—</span>';
			break;
		case 'mp_price':
			$price = get_post_meta( $post_id, '_mp_price', true );
			echo $price ? '<strong style="color:#0f172a;">' . esc_html( $price ) . '</strong>' : '<span style="color:#94a3b8;">—</span>';
			break;
		case 'mp_stock':
			$stock = get_post_meta( $post_id, '_mp_stock_status', true ) ?: 'in_stock';
			$labels = array(
				'in_stock'     => '<span class="mp-badge-stock-in"><i class="fa-solid fa-check"></i> In Stock</span>',
				'low_stock'    => '<span class="mp-badge-stock-low"><i class="fa-solid fa-triangle-exclamation"></i> Low Stock</span>',
				'pre_order'    => '<span class="mp-badge-stock-pre"><i class="fa-solid fa-clock"></i> Pre-Order</span>',
				'out_of_stock' => '<span class="mp-badge-stock-out"><i class="fa-solid fa-xmark"></i> Out of Stock</span>',
			);
			echo isset( $labels[ $stock ] ) ? $labels[ $stock ] : '<span class="mp-badge-stock-in">In Stock</span>';
			break;
	}
}
add_action( 'manage_handset_posts_custom_column', 'mp_handset_custom_column', 10, 2 );


// B. Repair Services Columns
function mp_repair_service_columns( $columns ) {
	$new_columns = array();
	foreach ( $columns as $k => $v ) {
		$new_columns[ $k ] = $v;
		if ( 'title' === $k ) {
			$new_columns['mp_service_icon']       = esc_html__( 'Workstation Icon', 'mobile-pasal' );
			$new_columns['mp_service_price']      = esc_html__( 'Estimate', 'mobile-pasal' );
			$new_columns['mp_service_turnaround'] = esc_html__( 'Turnaround', 'mobile-pasal' );
			$new_columns['mp_service_warranty']   = esc_html__( 'Warranty', 'mobile-pasal' );
		}
	}
	return $new_columns;
}
add_filter( 'manage_repair_service_posts_columns', 'mp_repair_service_columns' );

function mp_repair_service_custom_column( $column, $post_id ) {
	switch ( $column ) {
		case 'mp_service_icon':
			$icon = get_post_meta( $post_id, '_mp_service_icon', true ) ?: 'screen';
			$icon_fa = 'fa-screwdriver-wrench';
			switch ( $icon ) {
				case 'screen':   $icon_fa = 'fa-mobile-screen-button'; break;
				case 'battery':  $icon_fa = 'fa-battery-full'; break;
				case 'water':    $icon_fa = 'fa-droplet'; break;
				case 'board':    $icon_fa = 'fa-microchip'; break;
				case 'camera':   $icon_fa = 'fa-camera'; break;
				case 'charging': $icon_fa = 'fa-bolt'; break;
				case 'software': $icon_fa = 'fa-laptop-code'; break;
			}
			echo '<span class="mp-cpt-table-icon"><i class="fa-solid ' . esc_attr( $icon_fa ) . '"></i> ' . esc_html( ucfirst( $icon ) ) . '</span>';
			break;
		case 'mp_service_price':
			$price = get_post_meta( $post_id, '_mp_service_price', true );
			echo $price ? '<strong style="color:#0f172a;">' . esc_html( $price ) . '</strong>' : '<span style="color:#94a3b8;">—</span>';
			break;
		case 'mp_service_turnaround':
			$turnaround = get_post_meta( $post_id, '_mp_service_turnaround', true );
			echo $turnaround ? '<span class="mp-badge-turnaround"><i class="fa-regular fa-clock"></i> ' . esc_html( $turnaround ) . '</span>' : '<span style="color:#94a3b8;">—</span>';
			break;
		case 'mp_service_warranty':
			$warranty = get_post_meta( $post_id, '_mp_service_warranty', true );
			echo $warranty ? '<span class="mp-badge-warranty"><i class="fa-solid fa-shield-halved"></i> ' . esc_html( $warranty ) . '</span>' : '<span style="color:#94a3b8;">—</span>';
			break;
	}
}
add_action( 'manage_repair_service_posts_custom_column', 'mp_repair_service_custom_column', 10, 2 );


// C. Customer Reviews Columns
function mp_review_columns( $columns ) {
	$new_columns = array();
	foreach ( $columns as $k => $v ) {
		$new_columns[ $k ] = $v;
		if ( 'title' === $k ) {
			$new_columns['mp_review_rating']   = esc_html__( 'Rating Score', 'mobile-pasal' );
			$new_columns['mp_review_product']  = esc_html__( 'Purchased Item', 'mobile-pasal' );
			$new_columns['mp_review_location'] = esc_html__( 'Location', 'mobile-pasal' );
			$new_columns['mp_review_verified'] = esc_html__( 'Verified Badge', 'mobile-pasal' );
		}
	}
	return $new_columns;
}
add_filter( 'manage_mp_review_posts_columns', 'mp_review_columns' );

function mp_review_custom_column( $column, $post_id ) {
	switch ( $column ) {
		case 'mp_review_rating':
			$rating = intval( get_post_meta( $post_id, '_mp_review_rating', true ) ?: 5 );
			echo '<div style="color:#f59e0b; display:inline-flex; gap:3px; font-size:13px;">';
			for ( $i = 1; $i <= 5; $i++ ) {
				echo '<i class="fa-' . ( $i <= $rating ? 'solid' : 'regular' ) . ' fa-star"></i>';
			}
			echo '</div>';
			break;
		case 'mp_review_product':
			$product = get_post_meta( $post_id, '_mp_review_product', true );
			echo $product ? '<strong style="color:#0f172a;">' . esc_html( $product ) . '</strong>' : '<span style="color:#94a3b8;">—</span>';
			break;
		case 'mp_review_location':
			$loc = get_post_meta( $post_id, '_mp_review_location', true );
			echo $loc ? '<span style="color:#475569;"><i class="fa-solid fa-location-dot" style="color:#0066cc;"></i> ' . esc_html( $loc ) . '</span>' : '<span style="color:#94a3b8;">—</span>';
			break;
		case 'mp_review_verified':
			$verified = get_post_meta( $post_id, '_mp_review_verified', true ) !== '0';
			if ( $verified ) {
				echo '<span class="mp-badge-stock-in"><i class="fa-solid fa-circle-check"></i> ' . esc_html__( 'Verified Buyer', 'mobile-pasal' ) . '</span>';
			} else {
				echo '<span style="color:#94a3b8; font-size:12px;">' . esc_html__( 'Standard Review', 'mobile-pasal' ) . '</span>';
			}
			break;
	}
}
add_action( 'manage_mp_review_posts_custom_column', 'mp_review_custom_column', 10, 2 );
