<?php
/**
 * Mobile Pasal — Inquiries & Repair Docket Manager
 * Luxury Architectural UI/UX matching Theme Options Suite
 *
 * @package Mobile_Pasal
 * @version 3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * 1. Create Inquiries Database Table
 */
function mp_create_inquiries_table() {
	global $wpdb;
	$table_name      = $wpdb->prefix . 'mp_inquiries';
	$charset_collate = $wpdb->get_charset_collate();

	$sql = "CREATE TABLE IF NOT EXISTS {$table_name} (
		id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
		docket_no varchar(32) NOT NULL DEFAULT '',
		type varchar(50) NOT NULL DEFAULT 'repair_docket',
		customer_name varchar(191) NOT NULL,
		phone varchar(50) NOT NULL,
		email varchar(191) NOT NULL DEFAULT '',
		device_brand varchar(100) NOT NULL DEFAULT '',
		device_model varchar(100) NOT NULL DEFAULT '',
		service_needed varchar(191) NOT NULL DEFAULT '',
		urgency varchar(50) NOT NULL DEFAULT 'Normal',
		message text NOT NULL,
		status varchar(30) NOT NULL DEFAULT 'pending',
		notes text NOT NULL DEFAULT '',
		created_at datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
		PRIMARY KEY  (id),
		KEY docket_no (docket_no),
		KEY status (status),
		KEY type (type),
		KEY created_at (created_at)
	) $charset_collate;";

	require_once ABSPATH . 'wp-admin/includes/upgrade.php';
	dbDelta( $sql );
}
add_action( 'after_switch_theme', 'mp_create_inquiries_table' );
add_action( 'admin_init', function() {
	if ( ! get_option( 'mp_inquiries_table_v2' ) ) {
		mp_create_inquiries_table();
		update_option( 'mp_inquiries_table_v2', 1 );
	}
} );

/**
 * 2. Admin Menu for Dockets & Inquiries
 */
function mp_register_inquiries_admin_menu() {
	add_menu_page(
		esc_html__( 'Repair Dockets & Inquiries', 'mobile-pasal' ),
		esc_html__( 'Inquiries / Dockets', 'mobile-pasal' ),
		'manage_options',
		'mp-inquiries',
		'mp_render_inquiries_admin_page',
		'dashicons-clipboard',
		25
	);
}
add_action( 'admin_menu', 'mp_register_inquiries_admin_menu' );

/**
 * 3. Render Luxury Full-Width Inquiries Dashboard
 */
function mp_render_inquiries_admin_page() {
	global $wpdb;
	$table_name = $wpdb->prefix . 'mp_inquiries';

	$notice = '';

	// Handle status update & deletion
	if ( isset( $_GET['action'], $_GET['id'] ) && check_admin_referer( 'mp_inquiry_action' ) ) {
		$item_id = absint( $_GET['id'] );
		if ( 'delete' === $_GET['action'] ) {
			$wpdb->delete( $table_name, array( 'id' => $item_id ), array( '%d' ) );
			$notice = esc_html__( 'Inquiry record deleted successfully.', 'mobile-pasal' );
		} elseif ( in_array( $_GET['action'], array( 'pending', 'contacted', 'in_progress', 'completed', 'cancelled' ), true ) ) {
			$wpdb->update( $table_name, array( 'status' => sanitize_text_field( $_GET['action'] ) ), array( 'id' => $item_id ), array( '%s' ), array( '%d' ) );
			$notice = esc_html__( 'Status updated successfully.', 'mobile-pasal' );
		}
	}

	$current_status = isset( $_GET['status'] ) ? sanitize_text_field( $_GET['status'] ) : 'all';
	$where = '1=1';
	if ( 'all' !== $current_status ) {
		$where .= $wpdb->prepare( ' AND status = %s', $current_status );
	}

	$items = $wpdb->get_results( "SELECT * FROM {$table_name} WHERE {$where} ORDER BY created_at DESC LIMIT 100" );

	$total_count     = (int) $wpdb->get_var( "SELECT COUNT(*) FROM {$table_name}" );
	$pending_count   = (int) $wpdb->get_var( "SELECT COUNT(*) FROM {$table_name} WHERE status = 'pending'" );
	$in_prog_count   = (int) $wpdb->get_var( "SELECT COUNT(*) FROM {$table_name} WHERE status = 'in_progress'" );
	$completed_count = (int) $wpdb->get_var( "SELECT COUNT(*) FROM {$table_name} WHERE status = 'completed'" );
	?>
	<div class="bopt-app-wrap">
		<!-- Sticky Top Bar -->
		<header class="bopt-topbar">
			<div class="bopt-topbar-left">
				<div class="bopt-brand">
					<div class="bopt-brand-icon"><i class="fa-solid fa-clipboard-list"></i></div>
					<div class="bopt-brand-info">
						<span class="bopt-brand-title"><?php echo esc_html( mp_opt( 'site_brand_name', 'Ali Mobile Center & Apple Fix' ) ); ?></span>
						<span class="bopt-brand-badge"><?php esc_html_e( 'Customer Inquiries & Dockets Suite', 'mobile-pasal' ); ?></span>
					</div>
				</div>
			</div>

			<div class="bopt-topbar-right">
				<a href="<?php echo esc_url( admin_url( 'admin.php?page=mobile-pasal-options' ) ); ?>" class="bopt-messages-btn">
					<i class="fa-solid fa-sliders"></i>
					<span><?php esc_html_e( 'Theme Options', 'mobile-pasal' ); ?></span>
				</a>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" target="_blank" class="bopt-preview-btn">
					<i class="fa-solid fa-arrow-up-right-from-square"></i>
					<span><?php esc_html_e( 'View Live Site', 'mobile-pasal' ); ?></span>
				</a>
			</div>
		</header>

		<!-- Inquiries Container -->
		<div class="bopt-inquiries-container">
			<?php if ( ! empty( $notice ) ) : ?>
				<div class="bopt-save-alert" style="margin-bottom: 20px; display: inline-flex;">
					<i class="fa-solid fa-circle-check"></i>
					<span><?php echo esc_html( $notice ); ?></span>
				</div>
			<?php endif; ?>

			<!-- Filter Bar -->
			<div class="bopt-filter-bar">
				<div class="bopt-filter-pills">
					<a href="<?php echo esc_url( admin_url( 'admin.php?page=mp-inquiries' ) ); ?>" class="bopt-filter-pill <?php echo 'all' === $current_status ? 'is-active' : ''; ?>">
						<span><?php esc_html_e( 'All Dockets', 'mobile-pasal' ); ?></span>
						<span class="bopt-pill-count"><?php echo esc_html( $total_count ); ?></span>
					</a>
					<a href="<?php echo esc_url( admin_url( 'admin.php?page=mp-inquiries&status=pending' ) ); ?>" class="bopt-filter-pill <?php echo 'pending' === $current_status ? 'is-active' : ''; ?>">
						<span><?php esc_html_e( 'Pending Action', 'mobile-pasal' ); ?></span>
						<span class="bopt-pill-count"><?php echo esc_html( $pending_count ); ?></span>
					</a>
					<a href="<?php echo esc_url( admin_url( 'admin.php?page=mp-inquiries&status=in_progress' ) ); ?>" class="bopt-filter-pill <?php echo 'in_progress' === $current_status ? 'is-active' : ''; ?>">
						<span><?php esc_html_e( 'In Progress', 'mobile-pasal' ); ?></span>
						<span class="bopt-pill-count"><?php echo esc_html( $in_prog_count ); ?></span>
					</a>
					<a href="<?php echo esc_url( admin_url( 'admin.php?page=mp-inquiries&status=completed' ) ); ?>" class="bopt-filter-pill <?php echo 'completed' === $current_status ? 'is-active' : ''; ?>">
						<span><?php esc_html_e( 'Completed', 'mobile-pasal' ); ?></span>
						<span class="bopt-pill-count"><?php echo esc_html( $completed_count ); ?></span>
					</a>
				</div>

				<div class="bopt-inquiries-search">
					<i class="fa-solid fa-magnifying-glass"></i>
					<input type="text" id="boptInquiriesSearchInput" placeholder="<?php esc_attr_e( 'Search by customer, phone, device...', 'mobile-pasal' ); ?>" autocomplete="off">
				</div>
			</div>

			<!-- Desktop Table View -->
			<div class="bopt-table-wrap">
				<table class="bopt-table">
					<thead>
						<tr>
							<th style="width: 130px;"><?php esc_html_e( 'Docket No.', 'mobile-pasal' ); ?></th>
							<th style="width: 170px;"><?php esc_html_e( 'Customer', 'mobile-pasal' ); ?></th>
							<th style="width: 140px;"><?php esc_html_e( 'Phone', 'mobile-pasal' ); ?></th>
							<th><?php esc_html_e( 'Device & Issue', 'mobile-pasal' ); ?></th>
							<th style="width: 120px;"><?php esc_html_e( 'Status', 'mobile-pasal' ); ?></th>
							<th style="width: 140px;"><?php esc_html_e( 'Submitted', 'mobile-pasal' ); ?></th>
							<th style="width: 220px;"><?php esc_html_e( 'Quick Actions', 'mobile-pasal' ); ?></th>
						</tr>
					</thead>
					<tbody>
						<?php if ( empty( $items ) ) : ?>
							<tr>
								<td colspan="7" style="text-align: center; padding: 40px; color: #64748b;">
									<i class="fa-regular fa-folder-open" style="font-size: 28px; display: block; margin-bottom: 8px;"></i>
									<?php esc_html_e( 'No customer inquiries found for this status.', 'mobile-pasal' ); ?>
								</td>
							</tr>
						<?php else : ?>
							<?php foreach ( $items as $row ) :
								$clean_phone = preg_replace( '/[^0-9]/', '', $row->phone );
								if ( 10 === strlen( $clean_phone ) ) {
									$clean_phone = '977' . $clean_phone;
								}
								$docket_num = $row->docket_no ? $row->docket_no : ( 'ALI-' . $row->id );
								$device_txt = trim( $row->device_brand . ' ' . $row->device_model );
								$wa_reply_msg = sprintf(
									'Namaste %s, regarding your Ali Mobile repair docket (%s)%s. How can we assist you further today?',
									$row->customer_name,
									$docket_num,
									! empty( $device_txt ) ? " for {$device_txt}" : ''
								);
								$wa_url = 'https://wa.me/' . $clean_phone . '?text=' . rawurlencode( $wa_reply_msg );
								?>
								<tr>
									<td>
										<strong style="font-family: monospace; color: #0066cc;"><?php echo esc_html( $docket_num ); ?></strong><br>
										<small style="color: #64748b;"><?php echo esc_html( ucfirst( str_replace( '_', ' ', $row->type ) ) ); ?></small>
									</td>
									<td>
										<strong style="color: #0f172a;"><?php echo esc_html( $row->customer_name ); ?></strong>
										<?php if ( ! empty( $row->email ) ) : ?>
											<br><small><a href="mailto:<?php echo esc_attr( $row->email ); ?>" style="color: #64748b;"><?php echo esc_html( $row->email ); ?></a></small>
										<?php endif; ?>
									</td>
									<td>
										<a href="tel:+<?php echo esc_attr( $clean_phone ); ?>" style="font-weight: 700; color: #0066cc; text-decoration: none;">
											<i class="fa-solid fa-phone" style="font-size: 11px;"></i> <?php echo esc_html( $row->phone ); ?>
										</a>
									</td>
									<td>
										<?php if ( ! empty( $device_txt ) ) : ?>
											<strong><?php echo esc_html( $device_txt ); ?></strong> &bull;
										<?php endif; ?>
										<span><?php echo esc_html( $row->service_needed ); ?></span>
										<?php if ( ! empty( $row->message ) ) : ?>
											<p style="margin: 4px 0 0; color: #64748b; font-size: 12px; font-style: italic;"><?php echo esc_html( wp_trim_words( $row->message, 12 ) ); ?></p>
										<?php endif; ?>
									</td>
									<td>
										<span class="bopt-status-badge <?php echo esc_attr( $row->status ); ?>">
											<?php echo esc_html( ucfirst( str_replace( '_', ' ', $row->status ) ) ); ?>
										</span>
									</td>
									<td>
										<small style="color: #64748b;"><?php echo esc_html( date_i18n( 'M j, Y g:i A', strtotime( $row->created_at ) ) ); ?></small>
									</td>
									<td>
										<div style="display: flex; gap: 6px; flex-wrap: wrap;">
											<a href="<?php echo esc_url( $wa_url ); ?>" target="_blank" class="bopt-btn-wa-reply" title="<?php esc_attr_e( 'Reply on WhatsApp', 'mobile-pasal' ); ?>">
												<i class="fa-brands fa-whatsapp"></i> WhatsApp
											</a>
											<a href="tel:+<?php echo esc_attr( $clean_phone ); ?>" class="bopt-btn-call" title="<?php esc_attr_e( 'Call Customer', 'mobile-pasal' ); ?>">
												<i class="fa-solid fa-phone"></i> Call
											</a>
											<?php if ( 'completed' !== $row->status ) : ?>
												<a href="<?php echo esc_url( wp_nonce_url( admin_url( 'admin.php?page=mp-inquiries&action=completed&id=' . $row->id ), 'mp_inquiry_action' ) ); ?>" class="bopt-btn-call" style="color: #16a34a; border-color: #bbf7d0;" title="<?php esc_attr_e( 'Mark Done', 'mobile-pasal' ); ?>">
													<i class="fa-solid fa-check"></i>
												</a>
											<?php endif; ?>
											<a href="<?php echo esc_url( wp_nonce_url( admin_url( 'admin.php?page=mp-inquiries&action=delete&id=' . $row->id ), 'mp_inquiry_action' ) ); ?>" class="bopt-btn-call" style="color: #ef4444; border-color: #fecaca;" onclick="return confirm('Delete this inquiry record?');" title="<?php esc_attr_e( 'Delete', 'mobile-pasal' ); ?>">
												<i class="fa-solid fa-trash-can"></i>
											</a>
										</div>
									</td>
								</tr>
							<?php endforeach; ?>
						<?php endif; ?>
					</tbody>
				</table>
			</div>

			<!-- Mobile Docket Cards View (Touch-First for Phone) -->
			<div class="bopt-dockets-mobile-list">
				<?php if ( empty( $items ) ) : ?>
					<div style="text-align: center; padding: 30px; color: #64748b; background: #fff; border-radius: 12px; border: 1px solid #e2e8f0;">
						<i class="fa-regular fa-folder-open" style="font-size: 26px; display: block; margin-bottom: 6px;"></i>
						<?php esc_html_e( 'No customer inquiries found.', 'mobile-pasal' ); ?>
					</div>
				<?php else : ?>
					<?php foreach ( $items as $row ) :
						$clean_phone = preg_replace( '/[^0-9]/', '', $row->phone );
						if ( 10 === strlen( $clean_phone ) ) {
							$clean_phone = '977' . $clean_phone;
						}
						$docket_num = $row->docket_no ? $row->docket_no : ( 'ALI-' . $row->id );
						$device_txt = trim( $row->device_brand . ' ' . $row->device_model );
						$wa_reply_msg = sprintf(
							'Namaste %s, regarding your Ali Mobile repair docket (%s)%s. How can we assist you further today?',
							$row->customer_name,
							$docket_num,
							! empty( $device_txt ) ? " for {$device_txt}" : ''
						);
						$wa_url = 'https://wa.me/' . $clean_phone . '?text=' . rawurlencode( $wa_reply_msg );
						?>
						<div class="bopt-docket-mobile-card">
							<div class="bopt-docket-card-top">
								<span class="bopt-docket-card-num"><?php echo esc_html( $docket_num ); ?></span>
								<span class="bopt-status-badge <?php echo esc_attr( $row->status ); ?>">
									<?php echo esc_html( ucfirst( str_replace( '_', ' ', $row->status ) ) ); ?>
								</span>
							</div>

							<div class="bopt-docket-card-body">
								<h4><?php echo esc_html( $row->customer_name ); ?></h4>
								<div class="bopt-docket-card-detail">
									<i class="fa-solid fa-mobile-screen" style="color: #0066cc; width: 14px;"></i>
									<span><strong>Device:</strong> <?php echo esc_html( $device_txt ?: 'Not specified' ); ?></span>
								</div>
								<div class="bopt-docket-card-detail">
									<i class="fa-solid fa-wrench" style="color: #f59e0b; width: 14px;"></i>
									<span><strong>Service:</strong> <?php echo esc_html( $row->service_needed ); ?></span>
								</div>
								<?php if ( ! empty( $row->message ) ) : ?>
									<div class="bopt-docket-card-detail" style="font-style: italic; color: #64748b;">
										&ldquo;<?php echo esc_html( wp_trim_words( $row->message, 15 ) ); ?>&rdquo;
									</div>
								<?php endif; ?>
								<div class="bopt-docket-card-detail" style="font-size: 11.5px; color: #94a3b8; margin-top: 6px;">
									<i class="fa-regular fa-clock" style="width: 14px;"></i>
									<span><?php echo esc_html( date_i18n( 'M j, Y g:i A', strtotime( $row->created_at ) ) ); ?></span>
								</div>
							</div>

							<!-- Touch Friendly Actions (Call / WhatsApp) -->
							<div class="bopt-docket-card-actions">
								<a href="<?php echo esc_url( $wa_url ); ?>" target="_blank" class="bopt-btn-wa-reply">
									<i class="fa-brands fa-whatsapp"></i> WhatsApp Reply
								</a>
								<a href="tel:+<?php echo esc_attr( $clean_phone ); ?>" class="bopt-btn-call">
									<i class="fa-solid fa-phone"></i> Call Now
								</a>
							</div>

							<div style="display: flex; justify-content: space-between; align-items: center; margin-top: 10px; padding-top: 8px; border-top: 1px solid #f8fafc;">
								<div>
									<?php if ( 'completed' !== $row->status ) : ?>
										<a href="<?php echo esc_url( wp_nonce_url( admin_url( 'admin.php?page=mp-inquiries&action=completed&id=' . $row->id ), 'mp_inquiry_action' ) ); ?>" style="color: #16a34a; font-size: 12px; font-weight: 700; text-decoration: none;">
											<i class="fa-solid fa-circle-check"></i> <?php esc_html_e( 'Mark Done', 'mobile-pasal' ); ?>
										</a>
									<?php endif; ?>
								</div>
								<div>
									<a href="<?php echo esc_url( wp_nonce_url( admin_url( 'admin.php?page=mp-inquiries&action=delete&id=' . $row->id ), 'mp_inquiry_action' ) ); ?>" style="color: #ef4444; font-size: 12px; text-decoration: none;" onclick="return confirm('Delete this record?');">
										<i class="fa-solid fa-trash"></i> <?php esc_html_e( 'Delete', 'mobile-pasal' ); ?>
									</a>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<?php
}

/**
 * 4. AJAX Submission: Repair Estimator Docket
 */
function mp_ajax_submit_repair_docket() {
	check_ajax_referer( 'mp_theme_nonce', 'nonce' );

	$name     = isset( $_POST['customer_name'] ) ? sanitize_text_field( wp_unslash( $_POST['customer_name'] ) ) : '';
	$phone    = isset( $_POST['phone'] ) ? sanitize_text_field( wp_unslash( $_POST['phone'] ) ) : '';
	$brand    = isset( $_POST['brand'] ) ? sanitize_text_field( wp_unslash( $_POST['brand'] ) ) : '';
	$model    = isset( $_POST['model'] ) ? sanitize_text_field( wp_unslash( $_POST['model'] ) ) : '';
	$issue    = isset( $_POST['issue'] ) ? sanitize_text_field( wp_unslash( $_POST['issue'] ) ) : '';
	$urgency  = isset( $_POST['urgency'] ) ? sanitize_text_field( wp_unslash( $_POST['urgency'] ) ) : 'Normal';
	$notes    = isset( $_POST['notes'] ) ? sanitize_textarea_field( wp_unslash( $_POST['notes'] ) ) : '';

	if ( empty( $name ) || empty( $phone ) ) {
		wp_send_json_error( array( 'message' => esc_html__( 'Please provide your name and mobile number.', 'mobile-pasal' ) ) );
	}

	global $wpdb;
	$table_name = $wpdb->prefix . 'mp_inquiries';
	$docket_no  = 'ALI-' . date( 'ym' ) . '-' . wp_rand( 1000, 9999 );

	$result = $wpdb->insert(
		$table_name,
		array(
			'docket_no'      => $docket_no,
			'type'           => 'repair_docket',
			'customer_name'  => $name,
			'phone'          => $phone,
			'device_brand'   => $brand,
			'device_model'   => $model,
			'service_needed' => $issue,
			'urgency'        => $urgency,
			'message'        => $notes,
			'status'         => 'pending',
			'created_at'     => current_time( 'mysql' ),
		),
		array( '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s' )
	);

	if ( false === $result ) {
		wp_send_json_error( array( 'message' => esc_html__( 'Database error. Please try again or WhatsApp us directly.', 'mobile-pasal' ) ) );
	}

	// Prepare WhatsApp direct link
	$wa_phone = mp_opt( 'contact_whatsapp_number', '9779848000000' );
	$wa_phone = preg_replace( '/[^0-9]/', '', $wa_phone );
	$wa_text  = rawurlencode( "Namaste Ali Mobile! I generated a repair docket online.\nDocket: {$docket_no}\nName: {$name}\nDevice: {$brand} {$model}\nIssue: {$issue}\nUrgency: {$urgency}" );
	$wa_link  = "https://wa.me/{$wa_phone}?text={$wa_text}";

	wp_send_json_success( array(
		'message'   => esc_html__( 'Your repair docket has been created successfully!', 'mobile-pasal' ),
		'docket_no' => $docket_no,
		'wa_link'   => $wa_link,
	) );
}
add_action( 'wp_ajax_mp_submit_repair_docket', 'mp_ajax_submit_repair_docket' );
add_action( 'wp_ajax_nopriv_mp_submit_repair_docket', 'mp_ajax_submit_repair_docket' );

/**
 * 5. AJAX Submission: General Contact Form
 */
function mp_ajax_submit_contact_form() {
	check_ajax_referer( 'mp_theme_nonce', 'nonce' );

	$name    = isset( $_POST['name'] ) ? sanitize_text_field( wp_unslash( $_POST['name'] ) ) : '';
	$phone   = isset( $_POST['phone'] ) ? sanitize_text_field( wp_unslash( $_POST['phone'] ) ) : '';
	$email   = isset( $_POST['email'] ) ? sanitize_email( wp_unslash( $_POST['email'] ) ) : '';
	$subject = isset( $_POST['subject'] ) ? sanitize_text_field( wp_unslash( $_POST['subject'] ) ) : 'General Inquiry';
	$message = isset( $_POST['message'] ) ? sanitize_textarea_field( wp_unslash( $_POST['message'] ) ) : '';

	if ( empty( $name ) || empty( $phone ) || empty( $message ) ) {
		wp_send_json_error( array( 'message' => esc_html__( 'Please complete all required fields.', 'mobile-pasal' ) ) );
	}

	global $wpdb;
	$table_name = $wpdb->prefix . 'mp_inquiries';
	$docket_no  = 'INQ-' . date( 'ym' ) . '-' . wp_rand( 1000, 9999 );

	$result = $wpdb->insert(
		$table_name,
		array(
			'docket_no'      => $docket_no,
			'type'           => 'general_inquiry',
			'customer_name'  => $name,
			'phone'          => $phone,
			'email'          => $email,
			'service_needed' => $subject,
			'message'        => $message,
			'status'         => 'pending',
			'created_at'     => current_time( 'mysql' ),
		),
		array( '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s' )
	);

	if ( false === $result ) {
		wp_send_json_error( array( 'message' => esc_html__( 'Failed to send message. Please contact us via WhatsApp.', 'mobile-pasal' ) ) );
	}

	wp_send_json_success( array(
		'message' => esc_html__( 'Thank you! Your message has been received. Our team will contact you shortly.', 'mobile-pasal' ),
	) );
}
add_action( 'wp_ajax_mp_submit_contact_form', 'mp_ajax_submit_contact_form' );
add_action( 'wp_ajax_nopriv_mp_submit_contact_form', 'mp_ajax_submit_contact_form' );
