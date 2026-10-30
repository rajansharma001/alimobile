<?php
/**
 * Mobile Pasal — Inquiries & Repair Docket Manager
 * Manages customer inquiries, repair reservations, and contact messages
 *
 * @package Mobile_Pasal
 * @version 1.0.0
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
	if ( ! get_option( 'mp_inquiries_table_v1' ) ) {
		mp_create_inquiries_table();
		update_option( 'mp_inquiries_table_v1', 1 );
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
		26
	);
}
add_action( 'admin_menu', 'mp_register_inquiries_admin_menu' );

/**
 * Render Admin Inquiries Page
 */
function mp_render_inquiries_admin_page() {
	global $wpdb;
	$table_name = $wpdb->prefix . 'mp_inquiries';

	// Handle status update
	if ( isset( $_GET['action'], $_GET['id'] ) && check_admin_referer( 'mp_inquiry_action' ) ) {
		$item_id = absint( $_GET['id'] );
		if ( 'delete' === $_GET['action'] ) {
			$wpdb->delete( $table_name, array( 'id' => $item_id ), array( '%d' ) );
			echo '<div class="notice notice-success is-dismissible"><p>' . esc_html__( 'Inquiry record deleted.', 'mobile-pasal' ) . '</p></div>';
		} elseif ( in_array( $_GET['action'], array( 'pending', 'contacted', 'in_progress', 'completed', 'cancelled' ), true ) ) {
			$wpdb->update( $table_name, array( 'status' => sanitize_text_field( $_GET['action'] ) ), array( 'id' => $item_id ), array( '%s' ), array( '%d' ) );
			echo '<div class="notice notice-success is-dismissible"><p>' . esc_html__( 'Status updated successfully.', 'mobile-pasal' ) . '</p></div>';
		}
	}

	$current_status = isset( $_GET['status'] ) ? sanitize_text_field( $_GET['status'] ) : 'all';
	$where = '1=1';
	if ( 'all' !== $current_status ) {
		$where .= $wpdb->prepare( ' AND status = %s', $current_status );
	}

	$items = $wpdb->get_results( "SELECT * FROM {$table_name} WHERE {$where} ORDER BY created_at DESC LIMIT 100" );

	$total_count     = $wpdb->get_var( "SELECT COUNT(*) FROM {$table_name}" );
	$pending_count   = $wpdb->get_var( "SELECT COUNT(*) FROM {$table_name} WHERE status = 'pending'" );
	$in_prog_count   = $wpdb->get_var( "SELECT COUNT(*) FROM {$table_name} WHERE status = 'in_progress'" );
	$completed_count = $wpdb->get_var( "SELECT COUNT(*) FROM {$table_name} WHERE status = 'completed'" );
	?>
	<div class="wrap">
		<h1 style="display:flex; align-items:center; gap:10px;">
			<span class="dashicons dashicons-clipboard" style="font-size:28px;"></span>
			<?php esc_html_e( 'Repair Dockets & Customer Inquiries', 'mobile-pasal' ); ?>
		</h1>

		<ul class="subsubsub" style="margin: 15px 0 20px;">
			<li><a href="<?php echo esc_url( admin_url( 'admin.php?page=mp-inquiries' ) ); ?>" class="<?php echo 'all' === $current_status ? 'current' : ''; ?>"><?php esc_html_e( 'All', 'mobile-pasal' ); ?> <span class="count">(<?php echo esc_html( $total_count ); ?>)</span></a> |</li>
			<li><a href="<?php echo esc_url( admin_url( 'admin.php?page=mp-inquiries&status=pending' ) ); ?>" class="<?php echo 'pending' === $current_status ? 'current' : ''; ?>"><?php esc_html_e( 'Pending Action', 'mobile-pasal' ); ?> <span class="count">(<?php echo esc_html( $pending_count ); ?>)</span></a> |</li>
			<li><a href="<?php echo esc_url( admin_url( 'admin.php?page=mp-inquiries&status=in_progress' ) ); ?>" class="<?php echo 'in_progress' === $current_status ? 'current' : ''; ?>"><?php esc_html_e( 'In Progress', 'mobile-pasal' ); ?> <span class="count">(<?php echo esc_html( $in_prog_count ); ?>)</span></a> |</li>
			<li><a href="<?php echo esc_url( admin_url( 'admin.php?page=mp-inquiries&status=completed' ) ); ?>" class="<?php echo 'completed' === $current_status ? 'current' : ''; ?>"><?php esc_html_e( 'Completed', 'mobile-pasal' ); ?> <span class="count">(<?php echo esc_html( $completed_count ); ?>)</span></a></li>
		</ul>

		<table class="wp-list-table widefat fixed striped" style="margin-top:10px;">
			<thead>
				<tr>
					<th style="width:130px;"><?php esc_html_e( 'Docket No.', 'mobile-pasal' ); ?></th>
					<th style="width:160px;"><?php esc_html_e( 'Customer', 'mobile-pasal' ); ?></th>
					<th style="width:130px;"><?php esc_html_e( 'Phone', 'mobile-pasal' ); ?></th>
					<th><?php esc_html_e( 'Device & Issue', 'mobile-pasal' ); ?></th>
					<th style="width:110px;"><?php esc_html_e( 'Status', 'mobile-pasal' ); ?></th>
					<th style="width:140px;"><?php esc_html_e( 'Submitted', 'mobile-pasal' ); ?></th>
					<th style="width:180px;"><?php esc_html_e( 'Actions', 'mobile-pasal' ); ?></th>
				</tr>
			</thead>
			<tbody>
				<?php if ( empty( $items ) ) : ?>
					<tr>
						<td colspan="7" style="text-align:center; padding:30px; color:#64748b;">
							<?php esc_html_e( 'No inquiries or repair dockets found.', 'mobile-pasal' ); ?>
						</td>
					</tr>
				<?php else : ?>
					<?php foreach ( $items as $row ) :
						$status_colors = array(
							'pending'     => '#f59e0b',
							'contacted'   => '#3b82f6',
							'in_progress' => '#8b5cf6',
							'completed'   => '#10b981',
							'cancelled'   => '#ef4444',
						);
						$color = isset( $status_colors[ $row->status ] ) ? $status_colors[ $row->status ] : '#64748b';
						?>
						<tr>
							<td>
								<strong><code><?php echo esc_html( $row->docket_no ?: ( 'ALI-' . $row->id ) ); ?></code></strong><br>
								<small style="color:#64748b;"><?php echo esc_html( ucfirst( str_replace( '_', ' ', $row->type ) ) ); ?></small>
							</td>
							<td>
								<strong><?php echo esc_html( $row->customer_name ); ?></strong>
								<?php if ( ! empty( $row->email ) ) : ?>
									<br><small><a href="mailto:<?php echo esc_attr( $row->email ); ?>"><?php echo esc_html( $row->email ); ?></a></small>
								<?php endif; ?>
							</td>
							<td>
								<a href="tel:<?php echo esc_attr( $row->phone ); ?>" style="font-weight:600; text-decoration:none;"><?php echo esc_html( $row->phone ); ?></a><br>
								<a href="https://wa.me/<?php echo esc_attr( preg_replace( '/[^0-9]/', '', $row->phone ) ); ?>" target="_blank" style="color:#16a34a; font-size:11px; text-decoration:none;">WhatsApp</a>
							</td>
							<td>
								<?php if ( ! empty( $row->device_brand ) || ! empty( $row->device_model ) ) : ?>
									<strong><?php echo esc_html( $row->device_brand . ' ' . $row->device_model ); ?></strong> &bull;
								<?php endif; ?>
								<span><?php echo esc_html( $row->service_needed ); ?></span>
								<?php if ( ! empty( $row->message ) ) : ?>
									<p style="margin:4px 0 0; color:#475569; font-size:12px; font-style:italic;"><?php echo esc_html( wp_trim_words( $row->message, 15 ) ); ?></p>
								<?php endif; ?>
							</td>
							<td>
								<span style="display:inline-block; padding:3px 8px; border-radius:12px; font-size:11px; font-weight:700; color:#fff; background:<?php echo esc_attr( $color ); ?>;">
									<?php echo esc_html( ucfirst( str_replace( '_', ' ', $row->status ) ) ); ?>
								</span>
							</td>
							<td>
								<?php echo esc_html( date_i18n( 'M j, Y g:i A', strtotime( $row->created_at ) ) ); ?>
							</td>
							<td>
								<div style="display:flex; gap:6px; flex-wrap:wrap;">
									<?php if ( 'completed' !== $row->status ) : ?>
										<a href="<?php echo esc_url( wp_nonce_url( admin_url( 'admin.php?page=mp-inquiries&action=completed&id=' . $row->id ), 'mp_inquiry_action' ) ); ?>" class="button button-small" style="color:#059669; border-color:#059669;"><?php esc_html_e( 'Done', 'mobile-pasal' ); ?></a>
									<?php endif; ?>
									<?php if ( 'in_progress' !== $row->status ) : ?>
										<a href="<?php echo esc_url( wp_nonce_url( admin_url( 'admin.php?page=mp-inquiries&action=in_progress&id=' . $row->id ), 'mp_inquiry_action' ) ); ?>" class="button button-small"><?php esc_html_e( 'In Progress', 'mobile-pasal' ); ?></a>
									<?php endif; ?>
									<a href="<?php echo esc_url( wp_nonce_url( admin_url( 'admin.php?page=mp-inquiries&action=delete&id=' . $row->id ), 'mp_inquiry_action' ) ); ?>" class="button button-small button-link-delete" onclick="return confirm('Delete this record?');"><?php esc_html_e( 'Delete', 'mobile-pasal' ); ?></a>
								</div>
							</td>
						</tr>
					<?php endforeach; ?>
				<?php endif; ?>
			</tbody>
		</table>
	</div>
	<?php
}

/**
 * 3. AJAX Submission: Repair Estimator Docket
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
 * 4. AJAX Submission: General Contact Form
 */
function mp_ajax_submit_contact_form() {
	check_ajax_referer( 'mp_theme_nonce', 'nonce' );

	$name    = isset( $_POST['name'] ) ? sanitize_text_field( wp_unslash( $_POST['name'] ) ) : '';
	$phone   = isset( $_POST['phone'] ) ? sanitize_text_field( wp_unslash( $_POST['phone'] ) ) : '';
	$email   = isset( $_POST['email'] ) ? sanitize_email( wp_unslash( $_POST['email'] ) ) : '';
	$subject = isset( $_POST['subject'] ) ? sanitize_text_field( wp_unslash( $_POST['subject'] ) ) : '';
	$message = isset( $_POST['message'] ) ? sanitize_textarea_field( wp_unslash( $_POST['message'] ) ) : '';

	if ( empty( $name ) || empty( $phone ) || empty( $message ) ) {
		wp_send_json_error( array( 'message' => esc_html__( 'Please complete all required fields.', 'mobile-pasal' ) ) );
	}

	global $wpdb;
	$table_name = $wpdb->prefix . 'mp_inquiries';
	$docket_no  = 'MSG-' . date( 'ym' ) . '-' . wp_rand( 100, 999 );

	$result = $wpdb->insert(
		$table_name,
		array(
			'docket_no'      => $docket_no,
			'type'           => 'general_contact',
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
