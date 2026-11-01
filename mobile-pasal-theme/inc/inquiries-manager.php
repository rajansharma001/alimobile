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
 * 2b. Export All Inquiries / Repair Dockets to CSV
 */
function mp_export_inquiries_csv() {
	if ( ! isset( $_GET['_wpnonce'] ) || ! wp_verify_nonce( $_GET['_wpnonce'], 'mp_export_inquiries_csv' ) ) {
		wp_die( esc_html__( 'Security check failed.', 'mobile-pasal' ) );
	}
	if ( ! current_user_can( 'manage_options' ) ) {
		wp_die( esc_html__( 'Permission denied.', 'mobile-pasal' ) );
	}

	global $wpdb;
	$table_name = $wpdb->prefix . 'mp_inquiries';
	$rows       = $wpdb->get_results( "SELECT * FROM {$table_name} ORDER BY created_at DESC", ARRAY_A );

	$filename = 'ali-mobile-inquiries-' . gmdate( 'Y-m-d-His' ) . '.csv';
	nocache_headers();
	header( 'Content-Type: text/csv; charset=utf-8' );
	header( 'Content-Disposition: attachment; filename=' . $filename );

	$out = fopen( 'php://output', 'w' );
	fputcsv( $out, array( 'ID', 'Docket No', 'Type', 'Customer Name', 'Phone', 'Email', 'Brand', 'Model', 'Service Needed', 'Urgency', 'Message', 'Status', 'Created At' ) );
	if ( ! empty( $rows ) ) {
		foreach ( $rows as $r ) {
			fputcsv(
				$out,
				array(
					$r['id'],
					$r['docket_no'],
					$r['type'],
					$r['customer_name'],
					$r['phone'],
					$r['email'],
					$r['device_brand'],
					$r['device_model'],
					$r['service_needed'],
					$r['urgency'],
					$r['message'],
					$r['status'],
					$r['created_at'],
				)
			);
		}
	}
	fclose( $out );
	exit;
}
add_action( 'admin_post_mp_export_inquiries_csv', 'mp_export_inquiries_csv' );

/**
 * 2c. Printable Repair Job Sheet & Counter Handover Receipt (with Live Tracker QR Code)
 */
function mp_print_repair_docket_receipt() {
	if ( ! isset( $_GET['_wpnonce'], $_GET['id'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_GET['_wpnonce'] ) ), 'mp_print_docket' ) ) {
		wp_die( esc_html__( 'Security check failed.', 'mobile-pasal' ) );
	}
	if ( ! current_user_can( 'manage_options' ) ) {
		wp_die( esc_html__( 'Permission denied.', 'mobile-pasal' ) );
	}

	global $wpdb;
	$table_name = $wpdb->prefix . 'mp_inquiries';
	$item_id    = absint( $_GET['id'] );
	$row        = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM {$table_name} WHERE id = %d", $item_id ) );

	if ( ! $row ) {
		wp_die( esc_html__( 'Repair docket not found.', 'mobile-pasal' ) );
	}

	$docket_num  = ! empty( $row->docket_no ) ? $row->docket_no : ( 'ALI-' . $row->id );
	$store_name  = mp_opt( 'site_brand_name', 'Ali Mobile Center & Apple Fix' );
	$store_addr  = mp_opt( 'store_address', 'Ji. Pra. Ka. Chowk, Gulariya-06, Bardiya, Nepal' );
	$store_phone = mp_opt( 'contact_phone', '+977 9804530786' );
	$device_str  = trim( $row->device_brand . ' ' . $row->device_model );
	$track_url   = home_url( '/services/?docket=' . rawurlencode( $docket_num ) . '#repair-tracker' );
	$qr_img_url  = 'https://api.qrserver.com/v1/create-qr-code/?size=130x130&margin=4&data=' . rawurlencode( $track_url );

	nocache_headers();
	header( 'Content-Type: text/html; charset=utf-8' );
	?>
	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="utf-8">
		<title><?php echo esc_html( $docket_num . ' — ' . $store_name . ' Job Sheet' ); ?></title>
		<style>
			* { box-sizing: border-box; }
			body {
				font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Arial, sans-serif;
				background: #f1f5f9;
				color: #0f172a;
				margin: 0;
				padding: 28px 16px;
			}
			.print-toolbar {
				max-width: 760px;
				margin: 0 auto 16px;
				display: flex;
				justify-content: space-between;
				align-items: center;
				background: #0f172a;
				color: #fff;
				padding: 12px 20px;
				border-radius: 12px;
			}
			.print-btn {
				background: #0066cc;
				color: #fff;
				border: none;
				padding: 9px 18px;
				border-radius: 8px;
				font-weight: 700;
				cursor: pointer;
				font-size: 13.5px;
			}
			.sheet-card {
				max-width: 760px;
				margin: 0 auto;
				background: #fff;
				border: 1.5px solid #cbd5e1;
				border-radius: 16px;
				padding: 32px;
			}
			.sheet-header {
				display: flex;
				justify-content: space-between;
				align-items: flex-start;
				border-bottom: 2px solid #0f172a;
				padding-bottom: 18px;
				margin-bottom: 22px;
			}
			.sheet-brand h1 {
				margin: 0 0 4px;
				font-size: 22px;
				font-weight: 900;
				color: #071b3b;
			}
			.sheet-brand p {
				margin: 2px 0;
				font-size: 12.5px;
				color: #475569;
			}
			.sheet-docket-box {
				text-align: right;
			}
			.sheet-docket-pill {
				display: inline-block;
				background: #eff6ff;
				border: 1.5px solid #93c5fd;
				color: #1d4ed8;
				font-family: monospace;
				font-size: 17px;
				font-weight: 900;
				padding: 6px 14px;
				border-radius: 8px;
				margin-bottom: 6px;
			}
			.sheet-grid {
				display: grid;
				grid-template-columns: 1fr 1fr;
				gap: 16px;
				margin-bottom: 20px;
			}
			.sheet-box {
				border: 1px solid #e2e8f0;
				border-radius: 10px;
				padding: 14px 16px;
				background: #f8fafc;
			}
			.sheet-box h3 {
				margin: 0 0 8px;
				font-size: 11px;
				text-transform: uppercase;
				letter-spacing: 0.06em;
				color: #64748b;
			}
			.sheet-row {
				display: flex;
				justify-content: space-between;
				font-size: 13px;
				padding: 4px 0;
				border-bottom: 1px dashed #e2e8f0;
			}
			.sheet-row:last-child { border-bottom: none; }
			.sheet-qr-section {
				display: flex;
				align-items: center;
				justify-content: space-between;
				gap: 20px;
				border: 1.5px dashed #93c5fd;
				background: #f8fbff;
				border-radius: 12px;
				padding: 14px 18px;
				margin-bottom: 20px;
			}
			.sheet-terms {
				font-size: 11px;
				color: #64748b;
				line-height: 1.55;
				margin-bottom: 28px;
			}
			.sheet-signatures {
				display: flex;
				justify-content: space-between;
				gap: 40px;
				margin-top: 36px;
			}
			.sig-line {
				flex: 1;
				border-top: 1px solid #64748b;
				padding-top: 6px;
				text-align: center;
				font-size: 12px;
				font-weight: 700;
				color: #334155;
			}
			@media print {
				body { background: #fff; padding: 0; }
				.print-toolbar { display: none !important; }
				.sheet-card { border: 1px solid #94a3b8; box-shadow: none; max-width: 100%; }
			}
		</style>
	</head>
	<body>
		<div class="print-toolbar">
			<span><strong><?php echo esc_html( $docket_num ); ?></strong> &bull; Counter Handover Job Sheet</span>
			<div>
				<button type="button" class="print-btn" onclick="window.print();">🖨️ Print Job Sheet / Save PDF</button>
			</div>
		</div>
		<div class="sheet-card">
			<div class="sheet-header">
				<div class="sheet-brand">
					<h1><?php echo esc_html( $store_name ); ?></h1>
					<p><?php echo esc_html( $store_addr ); ?></p>
					<p><strong>Counter Helpline:</strong> <?php echo esc_html( $store_phone ); ?></p>
				</div>
				<div class="sheet-docket-box">
					<div class="sheet-docket-pill"><?php echo esc_html( $docket_num ); ?></div>
					<div style="font-size:12px;color:#475569;"><strong>Date:</strong> <?php echo esc_html( date_i18n( 'M j, Y g:i A', strtotime( $row->created_at ) ) ); ?></div>
					<div style="font-size:12px;color:#0f172a;margin-top:2px;"><strong>Status:</strong> <?php echo esc_html( strtoupper( str_replace( '_', ' ', $row->status ) ) ); ?></div>
				</div>
			</div>

			<div class="sheet-grid">
				<div class="sheet-box">
					<h3>Customer Details</h3>
					<div class="sheet-row"><span>Customer Name:</span><strong><?php echo esc_html( $row->customer_name ); ?></strong></div>
					<div class="sheet-row"><span>Phone / WhatsApp:</span><strong><?php echo esc_html( $row->phone ); ?></strong></div>
					<div class="sheet-row"><span>Booking Type:</span><strong><?php echo esc_html( ucfirst( str_replace( '_', ' ', $row->type ) ) ); ?></strong></div>
				</div>
				<div class="sheet-box">
					<h3>Device &amp; Lab Assignment</h3>
					<div class="sheet-row"><span>Device Model:</span><strong><?php echo esc_html( $device_str ?: 'Specified at Counter' ); ?></strong></div>
					<div class="sheet-row"><span>Reported Fault:</span><strong><?php echo esc_html( $row->service_needed ); ?></strong></div>
					<div class="sheet-row"><span>Priority:</span><strong><?php echo esc_html( $row->urgency ?: 'Normal' ); ?></strong></div>
				</div>
			</div>

			<?php if ( ! empty( $row->message ) || ! empty( $row->notes ) ) : ?>
			<div class="sheet-box" style="margin-bottom: 18px;">
				<h3>Diagnostic Notes &amp; Customer Remarks</h3>
				<?php if ( ! empty( $row->message ) ) : ?>
					<p style="margin:0 0 6px;font-size:13px;"><strong>Customer Note:</strong> <?php echo esc_html( $row->message ); ?></p>
				<?php endif; ?>
				<?php if ( ! empty( $row->notes ) ) : ?>
					<p style="margin:0;font-size:13px;color:#1e40af;"><strong>Technician Note:</strong> <?php echo esc_html( $row->notes ); ?></p>
				<?php endif; ?>
			</div>
			<?php endif; ?>

			<div class="sheet-qr-section">
				<div>
					<strong style="font-size:14px;color:#071b3b;display:block;margin-bottom:4px;">📱 Scan to Track Live Repair Status Online</strong>
					<p style="margin:0 0 4px;font-size:12.5px;color:#475569;">Scan the QR code with your phone camera or enter Docket <strong><?php echo esc_html( $docket_num ); ?></strong> at:</p>
					<code style="font-size:11.5px;color:#0066cc;"><?php echo esc_html( $track_url ); ?></code>
				</div>
				<img src="<?php echo esc_url( $qr_img_url ); ?>" alt="QR Code" width="96" height="96" style="border-radius:8px;border:1px solid #bfdbfe;background:#fff;padding:4px;" />
			</div>

			<div class="sheet-terms">
				<strong>Counter Assurance &amp; Warranty Terms:</strong>
				1. Please present this docket slip (or Docket ID) when collecting your device at the Gulariya counter.
				2. Replaced OEM displays and batteries carry our counter testing warranty as specified on your invoice (physical or liquid damage post-handover is excluded).
				3. Devices not collected within 60 days of repair completion notice may incur storage handling charges.
			</div>

			<div class="sheet-signatures">
				<div class="sig-line">Customer Signature</div>
				<div class="sig-line">Authorized Technician (<?php echo esc_html( $store_name ); ?>)</div>
			</div>
		</div>
	</body>
	</html>
	<?php
	exit;
}
add_action( 'admin_post_mp_print_docket', 'mp_print_repair_docket_receipt' );

/**
 * 3. Render Luxury Full-Width Inquiries Dashboard
 */
function mp_render_inquiries_admin_page() {
	global $wpdb;
	$table_name = $wpdb->prefix . 'mp_inquiries';

	$notice = '';

	// Handle Manual Walk-In Repair Docket Creation
	if ( isset( $_POST['mp_walkin_submit'], $_POST['mp_walkin_nonce'] ) && wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['mp_walkin_nonce'] ) ), 'mp_create_walkin_docket' ) ) {
		$w_name    = isset( $_POST['w_name'] ) ? sanitize_text_field( wp_unslash( $_POST['w_name'] ) ) : '';
		$w_phone   = isset( $_POST['w_phone'] ) ? sanitize_text_field( wp_unslash( $_POST['w_phone'] ) ) : '';
		$w_brand   = isset( $_POST['w_brand'] ) ? sanitize_text_field( wp_unslash( $_POST['w_brand'] ) ) : '';
		$w_model   = isset( $_POST['w_model'] ) ? sanitize_text_field( wp_unslash( $_POST['w_model'] ) ) : '';
		$w_service = isset( $_POST['w_service'] ) ? sanitize_text_field( wp_unslash( $_POST['w_service'] ) ) : '';
		$w_status  = isset( $_POST['w_status'] ) ? sanitize_text_field( wp_unslash( $_POST['w_status'] ) ) : 'in_progress';
		$w_notes   = isset( $_POST['w_notes'] ) ? sanitize_textarea_field( wp_unslash( $_POST['w_notes'] ) ) : '';

		if ( ! empty( $w_name ) && ! empty( $w_phone ) ) {
			$new_docket = 'AF-' . gmdate( 'Y' ) . '-' . wp_rand( 1000, 9999 );
			$wpdb->insert(
				$table_name,
				array(
					'docket_no'      => $new_docket,
					'type'           => 'walkin_docket',
					'customer_name'  => $w_name,
					'phone'          => $w_phone,
					'email'          => '',
					'device_brand'   => $w_brand,
					'device_model'   => $w_model,
					'service_needed' => $w_service ?: 'Counter Walk-In Diagnosis',
					'urgency'        => 'Counter Walk-In',
					'message'        => $w_notes,
					'status'         => $w_status,
					'notes'          => $w_notes,
					'created_at'     => current_time( 'mysql' ),
				),
				array( '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s' )
			);
			$notice = sprintf( esc_html__( 'Walk-In Repair Docket %s created successfully!', 'mobile-pasal' ), $new_docket );
		}
	}

	// Handle status update & deletion
	if ( isset( $_GET['action'], $_GET['id'] ) && check_admin_referer( 'mp_inquiry_action' ) ) {
		$item_id = absint( $_GET['id'] );
		if ( 'delete' === $_GET['action'] ) {
			$wpdb->delete( $table_name, array( 'id' => $item_id ), array( '%d' ) );
			$notice = esc_html__( 'Inquiry record deleted successfully.', 'mobile-pasal' );
		} elseif ( in_array( $_GET['action'], array( 'pending', 'contacted', 'in_progress', 'ready', 'completed', 'cancelled' ), true ) ) {
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
				<button type="button" class="bopt-save-btn" onclick="var el=document.getElementById('mpWalkinFormCard');el.style.display=(el.style.display==='none'?'block':'none');" style="padding: 8px 14px; font-size: 13px;">
					<i class="fa-solid fa-plus"></i>
					<span><?php esc_html_e( 'New Walk-In Docket', 'mobile-pasal' ); ?></span>
				</button>
				<a href="<?php echo esc_url( wp_nonce_url( admin_url( 'admin-post.php?action=mp_export_inquiries_csv' ), 'mp_export_inquiries_csv' ) ); ?>" class="bopt-messages-btn" title="<?php esc_attr_e( 'Download all inquiries as CSV spreadsheet', 'mobile-pasal' ); ?>">
					<i class="fa-solid fa-file-csv"></i>
					<span class="bopt-btn-text"><?php esc_html_e( 'Export CSV', 'mobile-pasal' ); ?></span>
				</a>
				<a href="<?php echo esc_url( admin_url( 'admin.php?page=mp-bulk-price-editor' ) ); ?>" class="bopt-messages-btn" title="<?php esc_attr_e( 'Bulk Handset Price Editor', 'mobile-pasal' ); ?>">
					<i class="fa-solid fa-tags"></i>
					<span class="bopt-btn-text"><?php esc_html_e( 'Bulk Prices', 'mobile-pasal' ); ?></span>
				</a>
				<a href="<?php echo esc_url( admin_url( 'admin.php?page=mobile-pasal-options' ) ); ?>" class="bopt-messages-btn" title="<?php esc_attr_e( 'Theme Options', 'mobile-pasal' ); ?>">
					<i class="fa-solid fa-sliders"></i>
					<span class="bopt-btn-text"><?php esc_html_e( 'Theme Options', 'mobile-pasal' ); ?></span>
				</a>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" target="_blank" class="bopt-preview-btn" title="<?php esc_attr_e( 'View Live Site', 'mobile-pasal' ); ?>">
					<i class="fa-solid fa-arrow-up-right-from-square"></i>
					<span class="bopt-btn-text"><?php esc_html_e( 'View Live Site', 'mobile-pasal' ); ?></span>
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

			<!-- Quick Walk-In Repair Docket Creator Card -->
			<div id="mpWalkinFormCard" style="display:none; background:#ffffff; border:1.5px solid #93c5fd; border-radius:16px; padding:22px 24px; margin-bottom:22px; box-shadow:0 10px 25px rgba(0,102,204,0.08);">
				<div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:14px;">
					<h3 style="margin:0; font-size:16px; color:#0f172a;"><i class="fa-solid fa-screwdriver-wrench" style="color:#0066cc; margin-right:6px;"></i> <?php esc_html_e( 'Register Counter Walk-In Repair Docket', 'mobile-pasal' ); ?></h3>
					<button type="button" onclick="document.getElementById('mpWalkinFormCard').style.display='none';" style="background:none;border:none;font-size:18px;cursor:pointer;color:#64748b;">&times;</button>
				</div>
				<form method="post" action="">
					<?php wp_nonce_field( 'mp_create_walkin_docket', 'mp_walkin_nonce' ); ?>
					<div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(180px, 1fr)); gap:12px; margin-bottom:12px;">
						<div>
							<label style="display:block;font-size:12px;font-weight:700;margin-bottom:4px;"><?php esc_html_e( 'Customer Name *', 'mobile-pasal' ); ?></label>
							<input type="text" name="w_name" required placeholder="e.g. Suman Tharu" style="width:100%;padding:8px 10px;border:1px solid #cbd5e1;border-radius:8px;">
						</div>
						<div>
							<label style="display:block;font-size:12px;font-weight:700;margin-bottom:4px;"><?php esc_html_e( 'Customer Phone *', 'mobile-pasal' ); ?></label>
							<input type="text" name="w_phone" required placeholder="98XXXXXXXX" style="width:100%;padding:8px 10px;border:1px solid #cbd5e1;border-radius:8px;">
						</div>
						<div>
							<label style="display:block;font-size:12px;font-weight:700;margin-bottom:4px;"><?php esc_html_e( 'Brand', 'mobile-pasal' ); ?></label>
							<input type="text" name="w_brand" placeholder="Apple / Samsung" style="width:100%;padding:8px 10px;border:1px solid #cbd5e1;border-radius:8px;">
						</div>
						<div>
							<label style="display:block;font-size:12px;font-weight:700;margin-bottom:4px;"><?php esc_html_e( 'Device Model *', 'mobile-pasal' ); ?></label>
							<input type="text" name="w_model" required placeholder="e.g. iPhone 14 Pro" style="width:100%;padding:8px 10px;border:1px solid #cbd5e1;border-radius:8px;">
						</div>
						<div>
							<label style="display:block;font-size:12px;font-weight:700;margin-bottom:4px;"><?php esc_html_e( 'Repair Service / Fault *', 'mobile-pasal' ); ?></label>
							<input type="text" name="w_service" required placeholder="e.g. OLED Display Swap" style="width:100%;padding:8px 10px;border:1px solid #cbd5e1;border-radius:8px;">
						</div>
						<div>
							<label style="display:block;font-size:12px;font-weight:700;margin-bottom:4px;"><?php esc_html_e( 'Initial Lab Status', 'mobile-pasal' ); ?></label>
							<select name="w_status" style="width:100%;padding:8px 10px;border:1px solid #cbd5e1;border-radius:8px;">
								<option value="in_progress"><?php esc_html_e( 'In Progress (On Bench)', 'mobile-pasal' ); ?></option>
								<option value="pending"><?php esc_html_e( 'Checked In (Pending)', 'mobile-pasal' ); ?></option>
								<option value="ready"><?php esc_html_e( 'Ready for Pickup', 'mobile-pasal' ); ?></option>
								<option value="completed"><?php esc_html_e( 'Completed / Delivered', 'mobile-pasal' ); ?></option>
							</select>
						</div>
					</div>
					<div style="display:flex; gap:12px; align-items:center; flex-wrap:wrap;">
						<input type="text" name="w_notes" placeholder="<?php esc_attr_e( 'Technician notes, estimated price (e.g. NPR 8,500), or IMEI/Passcode notes...', 'mobile-pasal' ); ?>" style="flex:1; min-width:240px; padding:9px 12px; border:1px solid #cbd5e1; border-radius:8px;">
						<button type="submit" name="mp_walkin_submit" value="1" class="bopt-save-btn" style="padding:9px 20px;">
							<i class="fa-solid fa-check"></i> <?php esc_html_e( 'Create Docket & Generate ID', 'mobile-pasal' ); ?>
						</button>
					</div>
				</form>
			</div>

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
											<a href="<?php echo esc_url( wp_nonce_url( admin_url( 'admin-post.php?action=mp_print_docket&id=' . $row->id ), 'mp_print_docket' ) ); ?>" target="_blank" class="bopt-btn-call" style="color: #0066cc; border-color: #bfdbfe;" title="<?php esc_attr_e( 'Print Job Sheet / Customer Receipt', 'mobile-pasal' ); ?>">
												<i class="fa-solid fa-print"></i> Receipt
											</a>
											<?php if ( 'in_progress' !== $row->status && 'completed' !== $row->status ) : ?>
												<a href="<?php echo esc_url( wp_nonce_url( admin_url( 'admin.php?page=mp-inquiries&action=in_progress&id=' . $row->id ), 'mp_inquiry_action' ) ); ?>" class="bopt-btn-call" style="color: #d97706; border-color: #fde68a;" title="<?php esc_attr_e( 'Mark In Progress (On Bench)', 'mobile-pasal' ); ?>">
													<i class="fa-solid fa-screwdriver-wrench"></i>
												</a>
											<?php endif; ?>
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
	$nonce = isset( $_POST['nonce'] ) ? sanitize_text_field( wp_unslash( $_POST['nonce'] ) ) : '';
	if ( ! wp_verify_nonce( $nonce, 'mp_theme_nonce' ) && ! wp_verify_nonce( $nonce, 'mp_public_nonce' ) ) {
		wp_send_json_error( array( 'message' => esc_html__( 'Security verification failed. Please refresh and try again.', 'mobile-pasal' ) ), 403 );
	}

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
	$nonce = isset( $_POST['nonce'] ) ? sanitize_text_field( wp_unslash( $_POST['nonce'] ) ) : '';
	if ( ! wp_verify_nonce( $nonce, 'mp_theme_nonce' ) && ! wp_verify_nonce( $nonce, 'mp_public_nonce' ) ) {
		wp_send_json_error( array( 'message' => esc_html__( 'Security verification failed. Please refresh and try again.', 'mobile-pasal' ) ), 403 );
	}

	$name    = isset( $_POST['name'] ) ? sanitize_text_field( wp_unslash( $_POST['name'] ) ) : '';
	$phone   = isset( $_POST['phone'] ) ? sanitize_text_field( wp_unslash( $_POST['phone'] ) ) : '';
	$email   = isset( $_POST['email'] ) ? sanitize_email( wp_unslash( $_POST['email'] ) ) : '';
	$device  = isset( $_POST['device'] ) ? sanitize_text_field( wp_unslash( $_POST['device'] ) ) : '';
	$subject = isset( $_POST['service'] ) ? sanitize_text_field( wp_unslash( $_POST['service'] ) ) : ( isset( $_POST['subject'] ) ? sanitize_text_field( wp_unslash( $_POST['subject'] ) ) : 'General Inquiry' );
	$message = isset( $_POST['message'] ) ? sanitize_textarea_field( wp_unslash( $_POST['message'] ) ) : ( isset( $_POST['notes'] ) ? sanitize_textarea_field( wp_unslash( $_POST['notes'] ) ) : '' );

	if ( empty( $name ) || empty( $phone ) ) {
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
			'device_model'   => $device,
			'service_needed' => $subject,
			'message'        => $message,
			'status'         => 'pending',
			'created_at'     => current_time( 'mysql' ),
		),
		array( '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s' )
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

/**
 * 6. AJAX: Track Repair Docket Status (Public Customer Self-Service)
 */
function mp_ajax_track_repair_docket() {
	$query_term = isset( $_POST['query'] ) ? sanitize_text_field( wp_unslash( $_POST['query'] ) ) : '';

	if ( empty( $query_term ) ) {
		wp_send_json_error( array( 'message' => esc_html__( 'Please enter your Docket Number or Phone Number.', 'mobile-pasal' ) ) );
	}

	global $wpdb;
	$table_name  = $wpdb->prefix . 'mp_inquiries';
	$clean_phone = preg_replace( '/[^0-9]/', '', $query_term );

	// Search by exact docket_no or phone number
	if ( ! empty( $clean_phone ) && strlen( $clean_phone ) >= 7 ) {
		$docket = $wpdb->get_row( $wpdb->prepare(
			"SELECT * FROM {$table_name} WHERE docket_no = %s OR phone LIKE %s ORDER BY id DESC LIMIT 1",
			$query_term,
			'%' . $wpdb->esc_like( $clean_phone ) . '%'
		) );
	} else {
		$docket = $wpdb->get_row( $wpdb->prepare(
			"SELECT * FROM {$table_name} WHERE docket_no = %s ORDER BY id DESC LIMIT 1",
			$query_term
		) );
	}

	if ( ! $docket ) {
		wp_send_json_error( array(
			'message' => esc_html__( 'No repair docket found matching that ID or phone number. Please check your docket slip or contact our counter desk.', 'mobile-pasal' ),
		) );
	}

	// Calculate stage index (1 to 5)
	$status_raw = strtolower( trim( $docket->status ) );
	$stage = 1;
	$status_label = __( 'Device Checked In & Queued', 'mobile-pasal' );
	$status_desc  = __( 'Your device has been safely received at our Ji. Pra. Ka. Chowk counter and is scheduled for technician inspection.', 'mobile-pasal' );
	$status_color = '#0066cc';

	switch ( $status_raw ) {
		case 'contacted':
		case 'diagnosing':
		case 'inspecting':
			$stage        = 2;
			$status_label = __( 'Microscope Diagnostic Underway', 'mobile-pasal' );
			$status_desc  = __( 'Our technician is inspecting logic board circuits, solder pads, and display connectors under stereo optical zoom.', 'mobile-pasal' );
			$status_color = '#0284c7';
			break;
		case 'in_progress':
		case 'repairing':
		case 'processing':
			$stage        = 3;
			$status_label = __( 'Component Repair On Cleanroom Bench', 'mobile-pasal' );
			$status_desc  = __( 'Hardware replacement, hot-air micro-soldering, or display bonding is currently active on our technician workbench.', 'mobile-pasal' );
			$status_color = '#d97706';
			break;
		case 'testing':
		case 'qa':
			$stage        = 4;
			$status_label = __( 'Quality Assurance & TrueTone Calibration', 'mobile-pasal' );
			$status_desc  = __( 'Repair work is complete. Device is passing 30-minute burn-in, touchscreen sensitivity, thermal, and sensor diagnostics.', 'mobile-pasal' );
			$status_color = '#2563eb';
			break;
		case 'ready':
		case 'completed':
		case 'resolved':
			$stage        = 5;
			$status_label = __( 'Ready for Counter Pickup!', 'mobile-pasal' );
			$status_desc  = __( 'All testing has passed with 100% success! Your phone is ready for collection at Ji. Pra. Ka. Chowk. Walk in anytime 9AM–8PM.', 'mobile-pasal' );
			$status_color = '#16a34a';
			break;
	}

	// Mask name for privacy (e.g. "Ramesh K***")
	$name_parts  = explode( ' ', trim( $docket->customer_name ) );
	$masked_name = $name_parts[0];
	if ( count( $name_parts ) > 1 ) {
		$masked_name .= ' ' . mb_substr( $name_parts[1], 0, 1 ) . '***';
	}

	$wa_phone = mp_opt( 'whatsapp_number', '9779804530786' );
	$wa_msg   = sprintf(
		__( 'Namaste Ali Mobile, checking on my repair docket %s (%s). Current status says: %s.', 'mobile-pasal' ),
		$docket->docket_no,
		$docket->device_model ? $docket->device_model : 'Handset',
		$status_label
	);
	$wa_url   = 'https://wa.me/' . $wa_phone . '?text=' . rawurlencode( $wa_msg );

	// Calculate 90-Day Repair Lab Warranty Coverage
	$created_ts         = strtotime( $docket->created_at ) ?: current_time( 'timestamp' );
	$expiry_ts          = $created_ts + ( 90 * DAY_IN_SECONDS );
	$now_ts             = current_time( 'timestamp' );
	$days_remaining     = max( 0, (int) ceil( ( $expiry_ts - $now_ts ) / DAY_IN_SECONDS ) );
	$warranty_expiry    = date_i18n( 'M j, Y', $expiry_ts );
	$is_warranty_active = ( $days_remaining > 0 && 'cancelled' !== $docket->status );

	if ( 'completed' === $docket->status && $is_warranty_active ) {
		$warranty_badge = sprintf( __( 'Active 90-Day Lab Warranty • %d Days Remaining', 'mobile-pasal' ), $days_remaining );
	} elseif ( $is_warranty_active ) {
		$warranty_badge = sprintf( __( '90-Day Lab Warranty Pre-Registered (Valid until %s)', 'mobile-pasal' ), $warranty_expiry );
	} else {
		$warranty_badge = sprintf( __( 'Warranty Period Ended on %s', 'mobile-pasal' ), $warranty_expiry );
	}

	wp_send_json_success( array(
		'docket_no'       => $docket->docket_no,
		'customer'        => $masked_name,
		'device'          => trim( $docket->device_brand . ' ' . $docket->device_model ) ?: __( 'Handset', 'mobile-pasal' ),
		'service'         => $docket->service_needed ?: __( 'Precision Repair', 'mobile-pasal' ),
		'date'            => date_i18n( get_option( 'date_format' ) . ' • g:i A', $created_ts ),
		'stage'           => $stage,
		'status_label'    => $status_label,
		'status_desc'     => $status_desc,
		'status_color'    => $status_color,
		'notes'           => ! empty( $docket->notes ) ? $docket->notes : '',
		'wa_url'          => $wa_url,
		'warranty_active' => $is_warranty_active,
		'warranty_days'   => $days_remaining,
		'warranty_expiry' => $warranty_expiry,
		'warranty_badge'  => $warranty_badge,
	) );
}
add_action( 'wp_ajax_mp_track_repair_docket', 'mp_ajax_track_repair_docket' );
add_action( 'wp_ajax_nopriv_mp_track_repair_docket', 'mp_ajax_track_repair_docket' );

/**
 * 7. Shortcode: [mp_repair_tracker]
 * Interactive Live Repair Status Tracker Card
 */
function mp_shortcode_repair_tracker( $atts = array() ) {
	$ajax_url = admin_url( 'admin-ajax.php' );
	ob_start();
	?>
	<div class="mp-tracker-widget" id="mpRepairTrackerWidget">
		<div class="mp-tracker-card">
			<div class="mp-tracker-header">
				<div class="mp-tracker-badge">
					<svg viewBox="0 0 24 24" width="13" height="13" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"></path></svg>
					<span><?php esc_html_e( 'Live Lab Bench Telemetry & 90-Day Warranty Checker', 'mobile-pasal' ); ?></span>
				</div>
				<h3 class="mp-tracker-title"><?php esc_html_e( 'Track Device Repair Status & Digital Warranty', 'mobile-pasal' ); ?></h3>
				<p class="mp-tracker-desc"><?php esc_html_e( 'Enter your Docket ID (e.g., AF-2026-8419) or registered 10-digit mobile number to view live bench progress and remaining 90-day warranty days.', 'mobile-pasal' ); ?></p>
			</div>

			<form class="mp-tracker-form" id="mpTrackerForm" onsubmit="mpHandleTrackerSubmit(event);">
				<div class="mp-tracker-input-group">
					<svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2.2"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
					<input type="text" id="mpTrackerQuery" class="mp-tracker-input" placeholder="<?php esc_attr_e( 'Enter Docket No (ALI-...) or Mobile Number', 'mobile-pasal' ); ?>" required autocomplete="off" />
					<button type="submit" class="mp-tracker-submit-btn" id="mpTrackerSubmitBtn">
						<span class="mp-btn-text"><?php esc_html_e( 'Check Status', 'mobile-pasal' ); ?></span>
						<span class="mp-btn-spinner" style="display:none;"><i class="fa-solid fa-spinner fa-spin"></i></span>
					</button>
				</div>
				<div class="mp-tracker-error" id="mpTrackerError" style="display:none;"></div>
			</form>

			<div class="mp-tracker-result" id="mpTrackerResult" style="display:none;">
				<!-- Rendered dynamically via JavaScript -->
			</div>
		</div>
	</div>

	<style>
	.mp-tracker-widget {
		width: 100%;
		max-width: 720px;
		margin: 24px auto;
		font-family: inherit;
	}
	.mp-tracker-card {
		background: var(--bg-card, #ffffff);
		border: 1px solid var(--border-color, #e2e8f0);
		border-radius: 20px;
		padding: clamp(24px, 4vw, 36px);
		box-shadow: 0 10px 30px rgba(0,0,0,0.06);
	}
	.mp-tracker-header {
		text-align: center;
		margin-bottom: 24px;
	}
	.mp-tracker-badge {
		display: inline-flex;
		align-items: center;
		gap: 8px;
		background: rgba(0, 102, 204, 0.08);
		color: var(--primary, #0066cc);
		padding: 5px 14px;
		border-radius: 999px;
		font-size: 0.8rem;
		font-weight: 700;
		margin-bottom: 12px;
	}
	.mp-tracker-dot {
		width: 8px;
		height: 8px;
		border-radius: 50%;
		background: #16a34a;
		box-shadow: 0 0 0 3px rgba(22, 163, 74, 0.2);
		animation: mpPulse 2s infinite;
	}
	@keyframes mpPulse {
		0%, 100% { opacity: 1; transform: scale(1); }
		50% { opacity: 0.4; transform: scale(0.9); }
	}
	.mp-tracker-title {
		font-size: clamp(1.3rem, 2.8vw, 1.7rem);
		font-weight: 900;
		color: var(--text-heading, #0f172a);
		margin: 0 0 8px;
	}
	.mp-tracker-desc {
		font-size: 0.94rem;
		color: var(--text-muted, #64748b);
		margin: 0;
	}
	.mp-tracker-input-group {
		display: flex;
		align-items: center;
		gap: 12px;
		background: var(--bg-surface, #f8fafc);
		border: 1.5px solid var(--border-color, #cbd5e1);
		border-radius: 14px;
		padding: 6px 6px 6px 16px;
		transition: border-color 0.2s, box-shadow 0.2s;
	}
	.mp-tracker-input-group:focus-within {
		border-color: var(--primary, #0066cc);
		box-shadow: 0 0 0 4px rgba(0, 102, 204, 0.12);
		background: #ffffff;
	}
	.mp-tracker-input-group svg {
		color: var(--text-muted, #64748b);
		flex-shrink: 0;
	}
	.mp-tracker-input {
		flex: 1;
		border: none;
		background: transparent;
		outline: none;
		font-size: 0.98rem;
		color: var(--text-heading, #0f172a);
		min-width: 0;
	}
	.mp-tracker-submit-btn {
		background: var(--primary, #0066cc);
		color: #ffffff;
		border: none;
		border-radius: 10px;
		padding: 12px 22px;
		font-weight: 800;
		font-size: 0.94rem;
		cursor: pointer;
		white-space: nowrap;
		flex-shrink: 0;
		transition: background 0.2s, transform 0.1s;
	}
	.mp-tracker-submit-btn:hover {
		background: var(--primary-dark, #004c99);
	}
	.mp-tracker-submit-btn:active {
		transform: scale(0.98);
	}
	.mp-tracker-error {
		margin-top: 14px;
		padding: 12px 16px;
		background: #fef2f2;
		color: #991b1b;
		border: 1px solid #fecaca;
		border-radius: 10px;
		font-size: 0.88rem;
		font-weight: 600;
	}
	.mp-tracker-result {
		margin-top: 24px;
		padding-top: 24px;
		border-top: 1px dashed var(--border-color, #e2e8f0);
	}
	.mp-docket-summary-box {
		display: grid;
		grid-template-columns: repeat(auto-fit, minmax(130px, 1fr));
		gap: 12px;
		background: var(--bg-surface, #f8fafc);
		border-radius: 12px;
		padding: 14px 18px;
		margin-bottom: 24px;
	}
	.mp-docket-prop strong {
		display: block;
		font-size: 0.72rem;
		text-transform: uppercase;
		letter-spacing: 0.5px;
		color: var(--text-muted, #64748b);
		margin-bottom: 2px;
	}
	.mp-docket-prop span {
		font-size: 0.92rem;
		font-weight: 800;
		color: var(--text-heading, #0f172a);
	}
	.mp-tracker-stepper {
		display: flex;
		align-items: center;
		justify-content: space-between;
		position: relative;
		margin: 32px 0 24px;
	}
	.mp-tracker-stepper::before {
		content: '';
		position: absolute;
		top: 18px;
		left: 5%;
		right: 5%;
		height: 3px;
		background: #e2e8f0;
		z-index: 1;
	}
	.mp-step-item {
		position: relative;
		z-index: 2;
		text-align: center;
		flex: 1;
	}
	.mp-step-circle {
		width: 36px;
		height: 36px;
		border-radius: 50%;
		background: #f1f5f9;
		color: #94a3b8;
		border: 2px solid #cbd5e1;
		display: flex;
		align-items: center;
		justify-content: center;
		margin: 0 auto 8px;
		font-size: 0.85rem;
		font-weight: 800;
		transition: all 0.3s;
	}
	.mp-step-item.is-completed .mp-step-circle {
		background: #16a34a;
		border-color: #16a34a;
		color: #ffffff;
	}
	.mp-step-item.is-active .mp-step-circle {
		background: var(--primary, #0066cc);
		border-color: var(--primary, #0066cc);
		color: #ffffff;
		box-shadow: 0 0 0 4px rgba(0, 102, 204, 0.2);
	}
	.mp-step-label {
		font-size: 0.75rem;
		font-weight: 700;
		color: #64748b;
		line-height: 1.25;
	}
	.mp-step-item.is-active .mp-step-label {
		color: var(--primary, #0066cc);
		font-weight: 900;
	}
	.mp-status-banner {
		padding: 16px 20px;
		border-radius: 12px;
		margin-bottom: 20px;
		border-left: 4px solid;
	}
	.mp-status-banner-title {
		font-size: 1.05rem;
		font-weight: 900;
		margin: 0 0 4px;
	}
	.mp-status-banner-desc {
		font-size: 0.9rem;
		margin: 0;
		line-height: 1.5;
	}
	.mp-technician-note {
		background: rgba(245, 158, 11, 0.08);
		border: 1px solid rgba(245, 158, 11, 0.25);
		border-radius: 10px;
		padding: 12px 16px;
		margin-bottom: 20px;
		font-size: 0.88rem;
		color: #92400e;
	}
	.mp-technician-note strong {
		color: #78350f;
	}
	.mp-tracker-wa-btn {
		display: flex;
		align-items: center;
		justify-content: center;
		gap: 10px;
		background: #16a34a;
		color: #ffffff;
		text-decoration: none;
		border-radius: 12px;
		padding: 14px 20px;
		font-weight: 800;
		font-size: 0.95rem;
		transition: background 0.2s, transform 0.1s;
	}
	.mp-tracker-wa-btn:hover {
		background: #15803d;
	}
	@media (max-width: 640px) {
		.mp-tracker-card {
			padding: 20px 16px;
		}
		.mp-tracker-input-group {
			flex-direction: column;
			padding: 10px;
			gap: 8px;
		}
		.mp-tracker-input-group svg {
			display: none;
		}
		.mp-tracker-input {
			width: 100%;
			text-align: center;
			padding: 8px 0;
		}
		.mp-tracker-submit-btn {
			width: 100%;
			justify-content: center;
		}
		.mp-tracker-stepper {
			flex-direction: column;
			align-items: flex-start;
			gap: 16px;
			margin: 20px 0;
			padding-left: 8px;
		}
		.mp-tracker-stepper::before {
			top: 10px;
			bottom: 10px;
			left: 25px;
			right: auto;
			width: 2px;
			height: auto;
		}
		.mp-step-item {
			display: flex;
			align-items: center;
			gap: 14px;
			width: 100%;
			text-align: left;
		}
		.mp-step-circle {
			margin: 0;
			flex-shrink: 0;
			width: 34px;
			height: 34px;
		}
		.mp-step-label {
			display: block !important;
			font-size: 0.88rem;
			color: var(--text-heading, #0f172a);
		}
	}
	</style>

	<script>
	function mpEscHtml(str) {
		var div = document.createElement('div');
		div.textContent = (str === null || str === undefined) ? '' : String(str);
		return div.innerHTML;
	}
	function mpHandleTrackerSubmit(e) {
		e.preventDefault();
		var query = document.getElementById('mpTrackerQuery').value.trim();
		var errBox = document.getElementById('mpTrackerError');
		var resBox = document.getElementById('mpTrackerResult');
		var btn = document.getElementById('mpTrackerSubmitBtn');
		var textSpan = btn.querySelector('.mp-btn-text');
		var spinSpan = btn.querySelector('.mp-btn-spinner');

		if (!query) return;

		errBox.style.display = 'none';
		textSpan.style.display = 'none';
		spinSpan.style.display = 'inline-block';
		btn.disabled = true;

		var formData = new FormData();
		formData.append('action', 'mp_track_repair_docket');
		formData.append('query', query);

		var ajaxEndpoint = (window.mpAjax && window.mpAjax.ajaxurl) ? window.mpAjax.ajaxurl : '<?php echo esc_url( $ajax_url ); ?>';

		fetch(ajaxEndpoint, {
			method: 'POST',
			body: formData
		})
		.then(function(r) { return r.json(); })
		.then(function(res) {
			btn.disabled = false;
			textSpan.style.display = 'inline-block';
			spinSpan.style.display = 'none';

			if (!res.success) {
				errBox.textContent = res.data.message || '<?php echo esc_js( __( 'No docket found.', 'mobile-pasal' ) ); ?>';
				errBox.style.display = 'block';
				resBox.style.display = 'none';
				return;
			}

			var d = res.data;
			var stages = [
				'<?php echo esc_js( __( 'Checked In', 'mobile-pasal' ) ); ?>',
				'<?php echo esc_js( __( 'Diagnostic', 'mobile-pasal' ) ); ?>',
				'<?php echo esc_js( __( 'Bench Repair', 'mobile-pasal' ) ); ?>',
				'<?php echo esc_js( __( 'Quality QA', 'mobile-pasal' ) ); ?>',
				'<?php echo esc_js( __( 'Pickup Ready', 'mobile-pasal' ) ); ?>'
			];

			var stepperHtml = '<div class="mp-tracker-stepper">';
			for (var i = 1; i <= 5; i++) {
				var cls = '';
				if (i < d.stage) cls = 'is-completed';
				else if (i === d.stage) cls = 'is-active';
				stepperHtml += '<div class="mp-step-item ' + cls + '">';
				stepperHtml += '<div class="mp-step-circle">' + (i < d.stage ? '✓' : i) + '</div>';
				stepperHtml += '<div class="mp-step-label">' + stages[i-1] + '</div>';
				stepperHtml += '</div>';
			}
			stepperHtml += '</div>';

			var noteHtml = '';
			if (d.notes) {
				noteHtml = '<div class="mp-technician-note"><strong><?php echo esc_js( __( 'Technician Counter Note: ', 'mobile-pasal' ) ); ?></strong>' + mpEscHtml(d.notes) + '</div>';
			}

			var safeColor = /^#[0-9a-fA-F]{3,6}$/.test(d.status_color || '') ? d.status_color : '#0066cc';

			var warrantyHtml = '';
			if (d.warranty_badge) {
				var wBg = d.warranty_active ? '#ecfdf5' : '#f8fafc';
				var wBorder = d.warranty_active ? '#a7f3d0' : '#cbd5e1';
				var wColor = d.warranty_active ? '#047857' : '#475569';
				warrantyHtml = '<div style="display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:10px;padding:13px 16px;border-radius:12px;background:' + wBg + ';border:1px solid ' + wBorder + ';color:' + wColor + ';margin-bottom:18px;font-size:0.88rem;">' +
					'<div style="display:flex;align-items:center;gap:8px;font-weight:800;">' +
						'<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.4"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>' +
						'<span>' + mpEscHtml(d.warranty_badge) + '</span>' +
					'</div>' +
					'<span style="font-size:0.78rem;font-weight:700;opacity:0.9;">Valid Until: ' + mpEscHtml(d.warranty_expiry || '') + '</span>' +
				'</div>';
			}

			var html = '<div class="mp-docket-summary-box">' +
				'<div class="mp-docket-prop"><strong><?php echo esc_js( __( 'Docket No', 'mobile-pasal' ) ); ?></strong><span>' + mpEscHtml(d.docket_no) + '</span></div>' +
				'<div class="mp-docket-prop"><strong><?php echo esc_js( __( 'Customer', 'mobile-pasal' ) ); ?></strong><span>' + mpEscHtml(d.customer) + '</span></div>' +
				'<div class="mp-docket-prop"><strong><?php echo esc_js( __( 'Device Model', 'mobile-pasal' ) ); ?></strong><span>' + mpEscHtml(d.device) + '</span></div>' +
				'<div class="mp-docket-prop"><strong><?php echo esc_js( __( 'Service', 'mobile-pasal' ) ); ?></strong><span>' + mpEscHtml(d.service) + '</span></div>' +
				'</div>' +
				stepperHtml +
				'<div class="mp-status-banner" style="background:' + safeColor + '15; border-color:' + safeColor + '; color:' + safeColor + ';">' +
				'<h4 class="mp-status-banner-title">' + mpEscHtml(d.status_label) + '</h4>' +
				'<p class="mp-status-banner-desc" style="color:var(--text-heading, #0f172a);">' + mpEscHtml(d.status_desc) + '</p>' +
				'</div>' +
				warrantyHtml +
				noteHtml +
				'<a href="' + mpEscHtml(d.wa_url) + '" target="_blank" rel="noopener" class="mp-tracker-wa-btn">' +
				'<svg viewBox="0 0 24 24" width="18" height="18" fill="currentColor"><path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0 0 12.04 2"/></svg>' +
				'<span><?php echo esc_js( __( 'Inquire About This Docket on WhatsApp', 'mobile-pasal' ) ); ?></span>' +
				'</a>';

			resBox.innerHTML = html;
			resBox.style.display = 'block';
		})
		.catch(function(err) {
			btn.disabled = false;
			textSpan.style.display = 'inline-block';
			spinSpan.style.display = 'none';
			errBox.textContent = '<?php echo esc_js( __( 'Network error. Please try again or WhatsApp our counter directly.', 'mobile-pasal' ) ); ?>';
			errBox.style.display = 'block';
		});
	}
	document.addEventListener('DOMContentLoaded', function() {
		try {
			var params = new URLSearchParams(window.location.search);
			var docketParam = params.get('docket');
			if (docketParam) {
				var input = document.getElementById('mpTrackerQuery');
				var form = document.getElementById('mpTrackerForm') || document.getElementById('mpRepairTrackerForm');
				if (input && form) {
					input.value = docketParam;
					mpHandleTrackerSubmit({ preventDefault: function(){} });
				}
			}
		} catch (e) {}
	});
	</script>
	<?php
	return ob_get_clean();
}
add_shortcode( 'mp_repair_tracker', 'mp_shortcode_repair_tracker' );

