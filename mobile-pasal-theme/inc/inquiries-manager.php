<?php
/**
 * Mobile Pasal — Separated Repair Orders & General Inquiries CRM Suite
 * Includes Full Admin Management (Status, Cost, Advance, IMEI, Technician, Warranty, Notes)
 * and Detailed A4 Printable PDF Job Sheet / Invoice with Brand Logo & Complete Business Details.
 *
 * @package Mobile_Pasal
 * @version 4.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * 1. Create & Auto-Upgrade Inquiries Database Table
 */
function mp_create_inquiries_table() {
	global $wpdb;
	$table_name      = $wpdb->prefix . 'mp_inquiries';
	$charset_collate = $wpdb->get_charset_collate();

	$sql = "CREATE TABLE {$table_name} (
		id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
		docket_no varchar(32) NOT NULL DEFAULT '',
		type varchar(50) NOT NULL DEFAULT 'repair_docket',
		customer_name varchar(191) NOT NULL,
		phone varchar(50) NOT NULL,
		email varchar(191) NOT NULL DEFAULT '',
		device_brand varchar(100) NOT NULL DEFAULT '',
		device_model varchar(100) NOT NULL DEFAULT '',
		imei_serial varchar(100) NOT NULL DEFAULT '',
		device_passcode varchar(100) NOT NULL DEFAULT '',
		accessories_received varchar(191) NOT NULL DEFAULT '',
		service_needed varchar(191) NOT NULL DEFAULT '',
		urgency varchar(50) NOT NULL DEFAULT 'Normal',
		repair_cost varchar(60) NOT NULL DEFAULT '',
		advance_paid varchar(60) NOT NULL DEFAULT '0',
		payment_status varchar(40) NOT NULL DEFAULT 'unpaid',
		payment_method varchar(60) NOT NULL DEFAULT '',
		technician_name varchar(100) NOT NULL DEFAULT '',
		estimated_delivery varchar(100) NOT NULL DEFAULT '',
		warranty_days int(11) NOT NULL DEFAULT 90,
		message text NOT NULL,
		status varchar(30) NOT NULL DEFAULT 'pending',
		notes text NOT NULL,
		internal_notes text NOT NULL,
		created_at datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
		PRIMARY KEY  (id),
		KEY docket_no (docket_no),
		KEY status (status),
		KEY type (type),
		KEY created_at (created_at)
	) $charset_collate;";

	if ( ! function_exists( 'dbDelta' ) && file_exists( ABSPATH . 'wp-admin/includes/upgrade.php' ) ) {
		require_once ABSPATH . 'wp-admin/includes/upgrade.php';
	}
	dbDelta( $sql );
}
add_action( 'after_switch_theme', 'mp_create_inquiries_table' );

/**
 * Ensure all v4 columns exist on existing installations
 */
function mp_ensure_inquiries_schema() {
	if ( get_option( 'mp_inquiries_table_v4' ) ) {
		return;
	}
	mp_create_inquiries_table();

	global $wpdb;
	$table_name = $wpdb->prefix . 'mp_inquiries';
	if ( $wpdb->get_var( "SHOW TABLES LIKE '{$table_name}'" ) !== $table_name ) {
		return;
	}

	$existing_cols = $wpdb->get_col( "DESC {$table_name}", 0 );
	$new_columns   = array(
		'imei_serial'          => "VARCHAR(100) NOT NULL DEFAULT ''",
		'device_passcode'      => "VARCHAR(100) NOT NULL DEFAULT ''",
		'accessories_received' => "VARCHAR(191) NOT NULL DEFAULT ''",
		'repair_cost'          => "VARCHAR(60) NOT NULL DEFAULT ''",
		'advance_paid'         => "VARCHAR(60) NOT NULL DEFAULT '0'",
		'payment_status'       => "VARCHAR(40) NOT NULL DEFAULT 'unpaid'",
		'payment_method'       => "VARCHAR(60) NOT NULL DEFAULT ''",
		'technician_name'      => "VARCHAR(100) NOT NULL DEFAULT ''",
		'estimated_delivery'   => "VARCHAR(100) NOT NULL DEFAULT ''",
		'warranty_days'        => "INT(11) NOT NULL DEFAULT 90",
		'notes'                => "TEXT NOT NULL",
		'internal_notes'       => "TEXT NOT NULL",
	);

	foreach ( $new_columns as $col => $definition ) {
		if ( ! in_array( $col, $existing_cols, true ) ) {
			$wpdb->query( "ALTER TABLE {$table_name} ADD COLUMN {$col} {$definition}" );
		}
	}

	update_option( 'mp_inquiries_table_v4', 1 );
}
add_action( 'init', 'mp_ensure_inquiries_schema' );

/**
 * Helper: Check if a record type belongs to Repair Orders
 */
function mp_is_repair_record_type( $type ) {
	return in_array( $type, array( 'repair_docket', 'walkin_docket', 'repair' ), true );
}

/**
 * 2. Register Separated Admin Menus for Repair Dockets & General Inquiries
 */
function mp_register_inquiries_admin_menu() {
	global $wpdb;
	$table_name   = $wpdb->prefix . 'mp_inquiries';
	$pending_cnt  = 0;
	$rep_pend_cnt = 0;
	$gen_pend_cnt = 0;

	if ( $wpdb->get_var( "SHOW TABLES LIKE '{$table_name}'" ) === $table_name ) {
		$rep_pend_cnt = (int) $wpdb->get_var( "SELECT COUNT(*) FROM {$table_name} WHERE type IN ('repair_docket','walkin_docket','repair') AND status IN ('pending','new')" );
		$gen_pend_cnt = (int) $wpdb->get_var( "SELECT COUNT(*) FROM {$table_name} WHERE type NOT IN ('repair_docket','walkin_docket','repair') AND status IN ('pending','new')" );
		$pending_cnt  = $rep_pend_cnt + $gen_pend_cnt;
	}

	$menu_label = esc_html__( 'Inquiries & Repairs', 'mobile-pasal' );
	if ( $pending_cnt > 0 ) {
		$menu_label .= sprintf( ' <span class="awaiting-mod count-%1$d"><span class="pending-count">%1$d</span></span>', $pending_cnt );
	}

	add_menu_page(
		esc_html__( 'Inquiries & Repair Orders', 'mobile-pasal' ),
		$menu_label,
		'manage_options',
		'mp-inquiries',
		'mp_render_inquiries_admin_page',
		'dashicons-clipboard',
		25
	);

	$rep_sub_label = '<span class="dashicons dashicons-hammer" style="font-size:16px;line-height:1.3;vertical-align:text-bottom;margin-right:4px;"></span> ' . esc_html__( 'Repair Orders', 'mobile-pasal' );
	if ( $rep_pend_cnt > 0 ) {
		$rep_sub_label .= sprintf( ' <span class="awaiting-mod count-%1$d"><span class="pending-count">%1$d</span></span>', $rep_pend_cnt );
	}

	$gen_sub_label = '<span class="dashicons dashicons-email-alt" style="font-size:16px;line-height:1.3;vertical-align:text-bottom;margin-right:4px;"></span> ' . esc_html__( 'General Inquiries', 'mobile-pasal' );
	if ( $gen_pend_cnt > 0 ) {
		$gen_sub_label .= sprintf( ' <span class="awaiting-mod count-%1$d"><span class="pending-count">%1$d</span></span>', $gen_pend_cnt );
	}

	add_submenu_page(
		'mp-inquiries',
		esc_html__( 'Repair Orders', 'mobile-pasal' ),
		$rep_sub_label,
		'manage_options',
		'mp-inquiries',
		'mp_render_inquiries_admin_page'
	);

	add_submenu_page(
		'mp-inquiries',
		esc_html__( 'General Inquiries', 'mobile-pasal' ),
		$gen_sub_label,
		'manage_options',
		'mp-general-inquiries',
		'mp_render_general_inquiries_submenu_redirect'
	);

	add_submenu_page(
		'mp-inquiries',
		esc_html__( 'Repair Reports & Sales Summary', 'mobile-pasal' ),
		'<span class="dashicons dashicons-chart-bar" style="font-size:16px;line-height:1.3;vertical-align:text-bottom;margin-right:4px;"></span> ' . esc_html__( 'Repair Reports', 'mobile-pasal' ),
		'manage_options',
		'mp-repair-reports',
		'mp_render_repair_reports_submenu_redirect'
	);
}
add_action( 'admin_menu', 'mp_register_inquiries_admin_menu' );

function mp_render_general_inquiries_submenu_redirect() {
	$_GET['tab'] = 'general';
	mp_render_inquiries_admin_page();
}

function mp_render_repair_reports_submenu_redirect() {
	$_GET['tab'] = 'reports';
	mp_render_inquiries_admin_page();
}

/**
 * 2b. Export Inquiries / Repair Dockets to CSV (Supports Tab Filtering)
 */
function mp_export_inquiries_csv() {
	if ( ! isset( $_GET['_wpnonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_GET['_wpnonce'] ) ), 'mp_export_inquiries_csv' ) ) {
		wp_die( esc_html__( 'Security check failed.', 'mobile-pasal' ) );
	}
	if ( ! current_user_can( 'manage_options' ) ) {
		wp_die( esc_html__( 'Permission denied.', 'mobile-pasal' ) );
	}

	global $wpdb;
	$table_name = $wpdb->prefix . 'mp_inquiries';
	$tab        = isset( $_GET['tab'] ) ? sanitize_text_field( wp_unslash( $_GET['tab'] ) ) : 'all';

	$where = '1=1';
	if ( 'repairs' === $tab ) {
		$where .= " AND type IN ('repair_docket','walkin_docket','repair')";
	} elseif ( 'general' === $tab ) {
		$where .= " AND type NOT IN ('repair_docket','walkin_docket','repair')";
	}

	$rows     = $wpdb->get_results( "SELECT * FROM {$table_name} WHERE {$where} ORDER BY created_at DESC", ARRAY_A );
	$filename = 'ali-mobile-' . $tab . '-' . gmdate( 'Y-m-d-His' ) . '.csv';

	nocache_headers();
	header( 'Content-Type: text/csv; charset=utf-8' );
	header( 'Content-Disposition: attachment; filename=' . $filename );

	$out = fopen( 'php://output', 'w' );
	fputcsv( $out, array(
		'ID', 'Docket/Ref No', 'Category Type', 'Status', 'Customer Name', 'Phone', 'Email',
		'Brand', 'Model', 'IMEI / Serial', 'Accessories Received', 'Service / Subject', 'Priority',
		'Total Cost (NPR)', 'Advance Paid (NPR)', 'Payment Status', 'Payment Method',
		'Technician', 'Estimated Delivery', 'Warranty Days',
		'Customer Message', 'Technician Report / Notes', 'Internal Staff Notes', 'Created At'
	) );

	if ( ! empty( $rows ) ) {
		foreach ( $rows as $r ) {
			fputcsv( $out, array(
				$r['id'],
				$r['docket_no'],
				$r['type'],
				$r['status'],
				$r['customer_name'],
				$r['phone'],
				$r['email'],
				$r['device_brand'],
				$r['device_model'],
				isset( $r['imei_serial'] ) ? $r['imei_serial'] : '',
				isset( $r['accessories_received'] ) ? $r['accessories_received'] : '',
				$r['service_needed'],
				$r['urgency'],
				isset( $r['repair_cost'] ) ? $r['repair_cost'] : '',
				isset( $r['advance_paid'] ) ? $r['advance_paid'] : '0',
				isset( $r['payment_status'] ) ? $r['payment_status'] : 'unpaid',
				isset( $r['payment_method'] ) ? $r['payment_method'] : '',
				isset( $r['technician_name'] ) ? $r['technician_name'] : '',
				isset( $r['estimated_delivery'] ) ? $r['estimated_delivery'] : '',
				isset( $r['warranty_days'] ) ? $r['warranty_days'] : '90',
				$r['message'],
				isset( $r['notes'] ) ? $r['notes'] : '',
				isset( $r['internal_notes'] ) ? $r['internal_notes'] : '',
				$r['created_at'],
			) );
		}
	}
	fclose( $out );
	exit;
}
add_action( 'admin_post_mp_export_inquiries_csv', 'mp_export_inquiries_csv' );

/**
 * 2c. Executive Printable A4 PDF Job Sheet, Service Invoice & Customer Inquiry Receipt
 * Designed to Exactly Match the Website's Clean Apple-Style UI/UX Design System
 */
function mp_print_repair_docket_receipt() {
	$valid_nonce = isset( $_GET['_wpnonce'] ) && wp_verify_nonce( sanitize_text_field( wp_unslash( $_GET['_wpnonce'] ) ), 'mp_print_docket' );
	if ( ! $valid_nonce && ! current_user_can( 'manage_options' ) ) {
		wp_die( esc_html__( 'Security check failed or session expired. Please refresh your admin dashboard.', 'mobile-pasal' ) );
	}
	if ( ! current_user_can( 'manage_options' ) ) {
		wp_die( esc_html__( 'Permission denied.', 'mobile-pasal' ) );
	}

	global $wpdb;
	$table_name = $wpdb->prefix . 'mp_inquiries';
	$item_id    = isset( $_GET['id'] ) ? absint( $_GET['id'] ) : 0;
	$row        = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM {$table_name} WHERE id = %d", $item_id ) );

	if ( ! $row ) {
		wp_die( esc_html__( 'Record not found.', 'mobile-pasal' ) );
	}

	$is_repair  = mp_is_repair_record_type( $row->type );
	$docket_num = ! empty( $row->docket_no ) ? $row->docket_no : ( ( $is_repair ? 'AF-' : 'INQ-' ) . $row->id );

	// Store Brand & Contact Details from Theme Options
	$store_name    = mp_opt( 'site_brand_name', 'Ali Mobile Center & Apple Fix' );
	$store_addr    = mp_opt( 'counter_address', mp_opt( 'store_address', 'Gulariya-06, Ji. Pra. Ka. Chowk, Bardiya, Nepal' ) );
	$store_phone   = mp_opt( 'contact_phone', mp_opt( 'store_phone', '+977 9804530786' ) );
	$store_email   = mp_opt( 'counter_email', get_option( 'admin_email', 'alimobilecenter@gmail.com' ) );
	$store_website = home_url( '/' );
	$currency      = mp_opt( 'currency_symbol', 'NPR' );

	// Resolve Brand Logo with Multiple Fallbacks
	$logo_url = mp_opt( 'site_logo', '' );
	if ( empty( $logo_url ) ) {
		$logo_url = mp_opt( 'logo_image', '' );
	}
	if ( empty( $logo_url ) && function_exists( 'has_custom_logo' ) && has_custom_logo() ) {
		$custom_logo_id = get_theme_mod( 'custom_logo' );
		$logo_url       = wp_get_attachment_image_url( $custom_logo_id, 'full' );
	}
	if ( empty( $logo_url ) && file_exists( get_template_directory() . '/assets/images/logo-full.png' ) ) {
		$logo_url = get_template_directory_uri() . '/assets/images/logo-full.png';
	}

	// Device & Financial Calculations
	$device_str  = trim( $row->device_brand . ' ' . $row->device_model );
	$raw_cost    = isset( $row->repair_cost ) ? trim( (string) $row->repair_cost ) : '';
	$cost_num    = (float) preg_replace( '/[^0-9.]/', '', $raw_cost );
	$raw_adv     = isset( $row->advance_paid ) ? trim( (string) $row->advance_paid ) : '0';
	$adv_num     = (float) preg_replace( '/[^0-9.]/', '', $raw_adv );
	$balance_num = max( 0, $cost_num - $adv_num );
	$pay_status  = ! empty( $row->payment_status ) ? strtolower( $row->payment_status ) : 'unpaid';
	$pay_method  = ! empty( $row->payment_method ) ? $row->payment_method : 'Cash at Counter / Fonepay QR';

	$cost_display    = $cost_num > 0 ? $currency . ' ' . number_format( $cost_num, 2 ) : ( ! empty( $raw_cost ) ? $raw_cost : __( 'To Be Confirmed', 'mobile-pasal' ) );
	$advance_display = $adv_num > 0 ? $currency . ' ' . number_format( $adv_num, 2 ) : $currency . ' 0.00';
	$balance_display = $cost_num > 0 ? ( 'paid' === $pay_status ? $currency . ' 0.00 (PAID)' : $currency . ' ' . number_format( $balance_num, 2 ) ) : __( 'To Be Confirmed', 'mobile-pasal' );

	// Warranty Calculation
	$warranty_days   = isset( $row->warranty_days ) ? (int) $row->warranty_days : 90;
	$created_ts      = strtotime( $row->created_at ) ?: current_time( 'timestamp' );
	$warranty_expiry = $warranty_days > 0 ? date_i18n( 'M j, Y', $created_ts + ( $warranty_days * DAY_IN_SECONDS ) ) : '';

	// Live Online Tracking URL & QR Code
	$track_url  = home_url( '/services/?docket=' . rawurlencode( $docket_num ) . '#repair-tracker' );
	$qr_img_url = 'https://api.qrserver.com/v1/create-qr-code/?size=160x160&margin=2&data=' . rawurlencode( $track_url );

	// Map status to 5-stage progress stepper (exactly matching website shortcode)
	$stage = 1;
	if ( in_array( $row->status, array( 'pending', 'new' ), true ) ) {
		$stage = 1;
	} elseif ( in_array( $row->status, array( 'diagnosing' ), true ) ) {
		$stage = 2;
	} elseif ( in_array( $row->status, array( 'in_progress', 'waiting_parts' ), true ) ) {
		$stage = 3;
	} elseif ( in_array( $row->status, array( 'testing' ), true ) ) {
		$stage = 4;
	} elseif ( in_array( $row->status, array( 'ready', 'completed' ), true ) ) {
		$stage = 5;
	}

	$status_labels = array(
		'pending'       => __( 'Checked In', 'mobile-pasal' ),
		'diagnosing'    => __( 'Diagnosing', 'mobile-pasal' ),
		'in_progress'   => __( 'Bench Repair', 'mobile-pasal' ),
		'waiting_parts' => __( 'Waiting for Parts', 'mobile-pasal' ),
		'testing'       => __( 'Testing & QA', 'mobile-pasal' ),
		'ready'         => __( 'Ready for Pickup', 'mobile-pasal' ),
		'completed'     => __( 'Completed / Delivered', 'mobile-pasal' ),
		'contacted'     => __( 'Contacted', 'mobile-pasal' ),
		'quoted'        => __( 'Price Quoted', 'mobile-pasal' ),
		'resolved'      => __( 'Resolved', 'mobile-pasal' ),
		'cancelled'     => __( 'Cancelled', 'mobile-pasal' ),
	);
	$status_title = isset( $status_labels[ $row->status ] ) ? $status_labels[ $row->status ] : ucwords( str_replace( '_', ' ', $row->status ) );

	nocache_headers();
	header( 'Content-Type: text/html; charset=utf-8' );
	?>
	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?php echo esc_html( $docket_num . ' — ' . $store_name ); ?></title>
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,400..800;1,9..40,400..800&family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
		<style>
			@page {
				size: A4 portrait;
				margin: 10mm 12mm;
			}
			*, *::before, *::after {
				box-sizing: border-box;
				-webkit-print-color-adjust: exact !important;
				print-color-adjust: exact !important;
			}
			body {
				font-family: "DM Sans", "Plus Jakarta Sans", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
				background: #f7faff;
				color: #071b3b;
				margin: 0;
				padding: 24px 16px 48px;
				font-size: 13px;
				line-height: 1.5;
			}
			.pdf-toolbar {
				max-width: 780px;
				margin: 0 auto 16px;
				display: flex;
				justify-content: space-between;
				align-items: center;
				background: #071b3b;
				color: #ffffff;
				padding: 12px 20px;
				border-radius: 14px;
				box-shadow: 0 10px 25px rgba(7, 27, 59, 0.18);
			}
			.pdf-toolbar strong {
				font-size: 15px;
				color: #38bdf8;
				font-family: monospace;
			}
			.pdf-btn {
				display: inline-flex;
				align-items: center;
				gap: 6px;
				background: #0066cc;
				color: #ffffff;
				border: none;
				padding: 9px 18px;
				border-radius: 8px;
				font-weight: 700;
				cursor: pointer;
				font-size: 13px;
				text-decoration: none;
			}
			.pdf-btn.secondary {
				background: rgba(255, 255, 255, 0.12);
				color: #e2e8f0;
			}
			/* Website Matching Card Canvas */
			.pdf-sheet {
				max-width: 780px;
				margin: 0 auto;
				background: #ffffff;
				border: 1px solid #e2e8f0;
				border-radius: 20px;
				padding: 32px 36px;
				box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
			}
			/* Header matching Ali Mobile Center navbar & brand */
			.pdf-header {
				display: flex;
				justify-content: space-between;
				align-items: flex-start;
				border-bottom: 1px solid #e2e8f0;
				padding-bottom: 20px;
				margin-bottom: 22px;
				gap: 20px;
			}
			.pdf-brand-col {
				display: flex;
				align-items: center;
				gap: 16px;
			}
			.pdf-logo-img {
				max-height: 52px;
				max-width: 160px;
				width: auto;
				object-fit: contain;
				display: block;
			}
			.pdf-brand-title {
				margin: 0 0 4px;
				font-size: 22px;
				font-weight: 900;
				color: #071b3b;
				letter-spacing: -0.02em;
			}
			.pdf-brand-sub {
				margin: 0 0 6px;
				font-size: 12.5px;
				color: #0066cc;
				font-weight: 700;
			}
			.pdf-brand-contact {
				font-size: 11.5px;
				color: #52627e;
				line-height: 1.45;
			}
			.pdf-meta-right {
				text-align: right;
			}
			.pdf-docket-badge {
				display: inline-block;
				background: rgba(0, 102, 204, 0.08);
				border: 1px solid #bfdbfe;
				color: #0066cc;
				font-family: monospace;
				font-size: 16px;
				font-weight: 800;
				padding: 6px 14px;
				border-radius: 999px;
				margin-bottom: 8px;
			}
			.pdf-meta-date {
				font-size: 11.5px;
				color: #64748b;
				margin-bottom: 6px;
			}
			.pdf-status-pill {
				display: inline-block;
				padding: 4px 12px;
				border-radius: 999px;
				font-size: 11px;
				font-weight: 800;
				text-transform: uppercase;
				letter-spacing: 0.03em;
			}
			.pdf-status-pill.ready, .pdf-status-pill.completed, .pdf-status-pill.paid {
				background: #e8f9ee;
				color: #1ea952;
			}
			.pdf-status-pill.in_progress, .pdf-status-pill.partial {
				background: #fffbeb;
				color: #b45309;
			}
			.pdf-status-pill.pending, .pdf-status-pill.unpaid {
				background: #edf4ff;
				color: #0862e9;
			}

			/* Website 5-Stage Repair Progress Stepper */
			.pdf-stepper {
				display: flex;
				align-items: center;
				justify-content: space-between;
				position: relative;
				margin: 0 0 24px;
				padding: 0 8px;
			}
			.pdf-stepper::before {
				content: '';
				position: absolute;
				top: 15px;
				left: 6%;
				right: 6%;
				height: 2.5px;
				background: #e2e8f0;
				z-index: 1;
			}
			.pdf-step-item {
				position: relative;
				z-index: 2;
				text-align: center;
				flex: 1;
			}
			.pdf-step-circle {
				width: 30px;
				height: 30px;
				border-radius: 50%;
				background: #f8fafc;
				color: #94a3b8;
				border: 2px solid #cbd5e1;
				display: flex;
				align-items: center;
				justify-content: center;
				margin: 0 auto 6px;
				font-size: 11px;
				font-weight: 800;
			}
			.pdf-step-item.is-completed .pdf-step-circle {
				background: #16a34a;
				border-color: #16a34a;
				color: #ffffff;
			}
			.pdf-step-item.is-active .pdf-step-circle {
				background: #0066cc;
				border-color: #0066cc;
				color: #ffffff;
				box-shadow: 0 0 0 3px rgba(0, 102, 204, 0.15);
			}
			.pdf-step-label {
				font-size: 11px;
				font-weight: 700;
				color: #64748b;
			}
			.pdf-step-item.is-active .pdf-step-label {
				color: #0066cc;
				font-weight: 800;
			}

			/* Website .mp-docket-summary-box Component */
			.pdf-summary-box {
				display: grid;
				grid-template-columns: repeat(4, 1fr);
				gap: 12px;
				background: #f8fafc;
				border: 1px solid #e2e8f0;
				border-radius: 14px;
				padding: 16px 20px;
				margin-bottom: 20px;
			}
			.pdf-prop strong {
				display: block;
				font-size: 10px;
				text-transform: uppercase;
				letter-spacing: 0.5px;
				color: #64748b;
				margin-bottom: 3px;
			}
			.pdf-prop span {
				font-size: 13px;
				font-weight: 800;
				color: #071b3b;
			}
			.pdf-prop .mono {
				font-family: monospace;
				font-size: 12px;
				color: #0066cc;
			}

			/* Service Details Section */
			.pdf-service-card {
				border: 1px solid #e2e8f0;
				border-radius: 14px;
				padding: 14px 20px;
				margin-bottom: 14px;
				background: #ffffff;
			}
			.pdf-service-head {
				display: flex;
				justify-content: space-between;
				align-items: center;
			}
			.pdf-service-subtitle {
				font-size: 10px;
				text-transform: uppercase;
				letter-spacing: 0.5px;
				color: #64748b;
				font-weight: 700;
				margin-bottom: 2px;
			}
			.pdf-service-name {
				font-size: 15px;
				font-weight: 800;
				color: #071b3b;
				margin: 0;
			}
			.pdf-warranty-tag {
				background: #e8f9ee;
				color: #1ea952;
				border: 1px solid #bbf7d0;
				padding: 3px 10px;
				border-radius: 999px;
				font-size: 11px;
				font-weight: 800;
			}

			/* Customer Original Message / Reported Symptoms */
			.pdf-customer-note {
				background: rgba(0, 102, 204, 0.04);
				border: 1px solid rgba(0, 102, 204, 0.16);
				border-left: 3.5px solid #0066cc;
				border-radius: 12px;
				padding: 11px 16px;
				margin-bottom: 14px;
				font-size: 12px;
				line-height: 1.45;
			}
			.pdf-customer-note .pdf-note-title {
				font-size: 10.5px;
				text-transform: uppercase;
				letter-spacing: 0.5px;
				color: #0066cc;
				font-weight: 800;
				margin-bottom: 4px;
				display: flex;
				align-items: center;
				gap: 5px;
			}
			.pdf-customer-note .pdf-note-body {
				color: #0f172a;
				font-size: 12.5px;
				font-weight: 500;
			}

			/* Website .mp-technician-note Component */
			.pdf-tech-note {
				background: rgba(245, 158, 11, 0.08);
				border: 1px solid rgba(245, 158, 11, 0.25);
				border-left: 3.5px solid #f59e0b;
				border-radius: 12px;
				padding: 11px 16px;
				margin-bottom: 18px;
				font-size: 12px;
				line-height: 1.45;
			}
			.pdf-tech-note .pdf-note-title {
				font-size: 10.5px;
				text-transform: uppercase;
				letter-spacing: 0.5px;
				color: #92400e;
				font-weight: 800;
				margin-bottom: 4px;
				display: flex;
				align-items: center;
				gap: 5px;
			}
			.pdf-tech-note .pdf-note-body {
				color: #78350f;
				font-size: 12.5px;
				font-weight: 500;
			}

			/* 2-Column: QR Online Tracker + Financial Summary */
			.pdf-bottom-grid {
				display: grid;
				grid-template-columns: 1fr 1fr;
				gap: 16px;
				margin-bottom: 24px;
			}
			.pdf-card {
				border: 1px solid #e2e8f0;
				border-radius: 14px;
				padding: 18px 20px;
				background: #ffffff;
			}
			.pdf-qr-wrap {
				display: flex;
				align-items: center;
				gap: 16px;
			}
			.pdf-qr-wrap img {
				width: 80px;
				height: 80px;
				border-radius: 8px;
				border: 1px solid #cbd5e1;
				padding: 3px;
				background: #fff;
				flex-shrink: 0;
			}
			.pdf-qr-info h4 {
				margin: 0 0 4px;
				font-size: 13px;
				font-weight: 800;
				color: #071b3b;
			}
			.pdf-qr-info p {
				margin: 0 0 4px;
				font-size: 11.5px;
				color: #64748b;
				line-height: 1.4;
			}
			.pdf-qr-info .url {
				font-size: 10px;
				color: #0066cc;
				font-weight: 700;
				word-break: break-all;
			}

			/* Financial Table */
			.pdf-calc-row {
				display: flex;
				justify-content: space-between;
				font-size: 12.5px;
				padding: 4px 0;
				color: #475569;
			}
			.pdf-calc-row strong {
				color: #071b3b;
			}
			.pdf-calc-total {
				display: flex;
				justify-content: space-between;
				align-items: center;
				margin-top: 8px;
				padding-top: 8px;
				border-top: 1.5px solid #e2e8f0;
				font-size: 14px;
				font-weight: 800;
				color: #071b3b;
			}
			.pdf-calc-total .val {
				color: #0066cc;
				font-size: 16px;
				font-weight: 900;
			}

			/* Signatures & Footer */
			.pdf-signatures {
				display: flex;
				justify-content: space-between;
				gap: 48px;
				margin-top: 28px;
				margin-bottom: 20px;
			}
			.pdf-sig-col {
				flex: 1;
				border-top: 1px solid #cbd5e1;
				padding-top: 6px;
				text-align: center;
				font-size: 11px;
				font-weight: 700;
				color: #475569;
			}
			.pdf-footer {
				border-top: 1px solid #f1f5f9;
				padding-top: 12px;
				text-align: center;
				font-size: 11px;
				color: #94a3b8;
			}
			@media print {
				body { background: #ffffff !important; padding: 0 !important; margin: 0 !important; }
				.pdf-toolbar { display: none !important; }
				.pdf-sheet { border: none !important; box-shadow: none !important; padding: 0 !important; max-width: 100% !important; border-radius: 0 !important; }
			}
		</style>
	</head>
	<body>
		<div class="pdf-toolbar">
			<div>
				<strong><?php echo esc_html( $docket_num ); ?></strong> &bull; <?php echo esc_html( $row->customer_name ); ?>
			</div>
			<div>
				<a href="<?php echo esc_url( admin_url( 'admin.php?page=mp-inquiries&tab=' . ( $is_repair ? 'repairs' : 'general' ) ) ); ?>" class="pdf-btn secondary">&larr; <?php esc_html_e( 'Back to Admin Desk', 'mobile-pasal' ); ?></a>
				<button type="button" class="pdf-btn" onclick="window.print();"><i class="fa-solid fa-print"></i> <?php esc_html_e( 'Print Receipt', 'mobile-pasal' ); ?></button>
			</div>
		</div>

		<div class="pdf-sheet">
			<!-- Header -->
			<div class="pdf-header">
				<div class="pdf-brand-col">
					<?php if ( ! empty( $logo_url ) ) : ?>
						<img src="<?php echo esc_url( $logo_url ); ?>" alt="<?php echo esc_attr( $store_name ); ?>" class="pdf-logo-img" />
					<?php endif; ?>
					<div>
						<h1 class="pdf-brand-title"><?php echo esc_html( $store_name ); ?></h1>
						<div class="pdf-brand-sub"><?php echo esc_html( $is_repair ? __( 'Smartphone Showroom & Apple Fix Precision Lab', 'mobile-pasal' ) : __( 'Official Smartphone Showroom & Inquiries', 'mobile-pasal' ) ); ?></div>
						<div class="pdf-brand-contact">
							<?php echo esc_html( $store_addr ); ?><br>
							Phone: <?php echo esc_html( $store_phone ); ?> &bull; Web: <?php echo esc_html( preg_replace( '(^https?://|/$)', '', $store_website ) ); ?> &bull; Email: <?php echo esc_html( $store_email ); ?>
						</div>
					</div>
				</div>
				<div class="pdf-meta-right">
					<div class="pdf-docket-badge"><?php echo esc_html( $docket_num ); ?></div>
					<div class="pdf-meta-date"><?php echo esc_html( date_i18n( 'M j, Y • g:i A', $created_ts ) ); ?></div>
					<span class="pdf-status-pill <?php echo esc_attr( $row->status ); ?>"><?php echo esc_html( $status_title ); ?></span>
				</div>
			</div>

			<!-- Website 5-Stage Stepper (Only for Repairs) -->
			<?php if ( $is_repair ) : ?>
				<div class="pdf-stepper">
					<?php
					$steps = array(
						__( 'Checked In', 'mobile-pasal' ),
						__( 'Diagnostic', 'mobile-pasal' ),
						__( 'Bench Repair', 'mobile-pasal' ),
						__( 'Quality QA', 'mobile-pasal' ),
						__( 'Ready for Pickup', 'mobile-pasal' ),
					);
					for ( $i = 1; $i <= 5; $i++ ) :
						$cls = $i < $stage ? 'is-completed' : ( $i === $stage ? 'is-active' : '' );
						?>
						<div class="pdf-step-item <?php echo esc_attr( $cls ); ?>">
							<div class="pdf-step-circle"><?php echo $i < $stage ? '✓' : $i; ?></div>
							<div class="pdf-step-label"><?php echo esc_html( $steps[ $i - 1 ] ); ?></div>
						</div>
					<?php endfor; ?>
				</div>
			<?php endif; ?>

			<!-- Summary Grid (Matching .mp-docket-summary-box) -->
			<div class="pdf-summary-box">
				<div class="pdf-prop">
					<strong><?php esc_html_e( 'Customer Name', 'mobile-pasal' ); ?></strong>
					<span><?php echo esc_html( $row->customer_name ); ?></span>
				</div>
				<div class="pdf-prop">
					<strong><?php esc_html_e( 'Mobile Number', 'mobile-pasal' ); ?></strong>
					<span><?php echo esc_html( $row->phone ); ?></span>
				</div>
				<div class="pdf-prop">
					<strong><?php echo esc_html( $is_repair ? __( 'Handset Model', 'mobile-pasal' ) : __( 'Device / Model', 'mobile-pasal' ) ); ?></strong>
					<span><?php echo esc_html( $device_str ?: 'Handset' ); ?></span>
				</div>
				<div class="pdf-prop">
					<strong><?php esc_html_e( 'IMEI / Serial', 'mobile-pasal' ); ?></strong>
					<span class="mono"><?php echo esc_html( ! empty( $row->imei_serial ) ? $row->imei_serial : 'Recorded at Counter' ); ?></span>
				</div>
				<div class="pdf-prop">
					<strong><?php echo esc_html( $is_repair ? __( 'Technician', 'mobile-pasal' ) : __( 'Staff Assigned', 'mobile-pasal' ) ); ?></strong>
					<span><?php echo esc_html( ! empty( $row->technician_name ) ? $row->technician_name : 'Counter Team' ); ?></span>
				</div>
				<div class="pdf-prop">
					<strong><?php echo esc_html( $is_repair ? __( 'Estimated Delivery', 'mobile-pasal' ) : __( 'Follow-Up Date', 'mobile-pasal' ) ); ?></strong>
					<span><?php echo esc_html( ! empty( $row->estimated_delivery ) ? $row->estimated_delivery : 'Same-Day' ); ?></span>
				</div>
				<div class="pdf-prop">
					<strong><?php esc_html_e( 'Accessories', 'mobile-pasal' ); ?></strong>
					<span><?php echo esc_html( ! empty( $row->accessories_received ) ? $row->accessories_received : 'Device Only' ); ?></span>
				</div>
				<div class="pdf-prop">
					<strong><?php esc_html_e( 'Priority', 'mobile-pasal' ); ?></strong>
					<span><?php echo esc_html( ! empty( $row->urgency ) ? $row->urgency : 'Normal' ); ?></span>
				</div>
			</div>

			<!-- Service Requested Card -->
			<div class="pdf-service-card">
				<div class="pdf-service-head">
					<div>
						<div class="pdf-service-subtitle"><?php echo esc_html( $is_repair ? __( 'Service Requested', 'mobile-pasal' ) : __( 'Inquiry Subject', 'mobile-pasal' ) ); ?></div>
						<h3 class="pdf-service-name"><?php echo esc_html( $row->service_needed ?: ( $is_repair ? __( 'General Inspection & Diagnostics', 'mobile-pasal' ) : __( 'General Inquiry', 'mobile-pasal' ) ) ); ?></h3>
					</div>
					<?php if ( $is_repair && $warranty_days > 0 ) : ?>
						<span class="pdf-warranty-tag">✓ <?php echo esc_html( $warranty_days ); ?>-Day Warranty</span>
					<?php endif; ?>
				</div>
			</div>

			<!-- Customer Original Message / Reported Symptoms -->
			<?php $customer_msg = ! empty( $row->message ) ? trim( $row->message ) : ''; ?>
			<div class="pdf-customer-note">
				<div class="pdf-note-title">
					<i class="fa-solid fa-comment-dots" style="color:#0066cc;margin-right:6px;"></i> <?php esc_html_e( 'Customer Problem / Request', 'mobile-pasal' ); ?>
				</div>
				<div class="pdf-note-body">
					<?php if ( ! empty( $customer_msg ) ) : ?>
						<?php echo nl2br( esc_html( $customer_msg ) ); ?>
					<?php else : ?>
						<span style="color: #64748b; font-style: italic;"><?php esc_html_e( 'No specific symptoms noted at intake (Standard intake inspection).', 'mobile-pasal' ); ?></span>
					<?php endif; ?>
				</div>
			</div>

			<!-- Technician Diagnostic Report (Matching .mp-technician-note) -->
			<?php if ( ! empty( $row->notes ) ) : ?>
				<div class="pdf-tech-note">
					<div class="pdf-note-title">
						<i class="fa-solid fa-clipboard-check" style="color:#16a34a;margin-right:6px;"></i> <?php echo esc_html( $is_repair ? __( 'Technician Note & Problem Fixed', 'mobile-pasal' ) : __( 'Counter Response / Notes', 'mobile-pasal' ) ); ?>
					</div>
					<div class="pdf-note-body">
						<?php echo nl2br( esc_html( $row->notes ) ); ?>
					</div>
				</div>
			<?php endif; ?>

			<!-- 2-Column: QR Code + Billing -->
			<div class="pdf-bottom-grid">
				<!-- QR Code Card -->
				<div class="pdf-card">
					<div class="pdf-qr-wrap">
						<img src="<?php echo esc_url( $qr_img_url ); ?>" alt="Track QR">
						<div class="pdf-qr-info">
							<h4><?php esc_html_e( 'Scan to Track Online', 'mobile-pasal' ); ?></h4>
							<p><?php esc_html_e( 'Scan with your phone camera to view live progress and warranty verification:', 'mobile-pasal' ); ?></p>
							<span class="url"><?php echo esc_html( $track_url ); ?></span>
							<?php if ( $is_repair && $warranty_days > 0 && ! empty( $warranty_expiry ) ) : ?>
								<div style="font-size: 11px; color: #1ea952; font-weight: 700; margin-top: 4px;">
									Valid Until: <?php echo esc_html( $warranty_expiry ); ?>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>

				<!-- Financial Summary -->
				<div class="pdf-card">
					<div class="pdf-calc-row">
						<span><?php echo esc_html( $is_repair ? __( 'Total Service Cost:', 'mobile-pasal' ) : __( 'Quoted Price:', 'mobile-pasal' ) ); ?></span>
						<strong><?php echo esc_html( $cost_display ); ?></strong>
					</div>
					<div class="pdf-calc-row">
						<span><?php esc_html_e( 'Advance Received:', 'mobile-pasal' ); ?></span>
						<strong style="color: #1ea952;"><?php echo esc_html( $advance_display ); ?></strong>
					</div>
					<div class="pdf-calc-row">
						<span><?php esc_html_e( 'Payment Method:', 'mobile-pasal' ); ?></span>
						<strong><?php echo esc_html( $pay_method ); ?></strong>
					</div>
					<div class="pdf-calc-total">
						<span><?php esc_html_e( 'Balance Due:', 'mobile-pasal' ); ?></span>
						<span class="val"><?php echo esc_html( $balance_display ); ?></span>
					</div>
				</div>
			</div>

			<!-- Signatures -->
			<div class="pdf-signatures">
				<div class="pdf-sig-col"><?php esc_html_e( 'Customer Signature', 'mobile-pasal' ); ?></div>
				<div class="pdf-sig-col"><?php echo esc_html( sprintf( __( 'Authorized Signature (%s)', 'mobile-pasal' ), $store_name ) ); ?></div>
			</div>

			<!-- Minimal Footer -->
			<div class="pdf-footer">
				<?php echo esc_html( sprintf( __( 'Thank you for choosing %1$s • %2$s • Tel: %3$s', 'mobile-pasal' ), $store_name, $store_addr, $store_phone ) ); ?>
			</div>
		</div>
	</body>
	</html>
	<?php
	exit;
}
add_action( 'admin_post_mp_print_docket', 'mp_print_repair_docket_receipt' );

/**
 * 3. Render Separated Repair Orders & General Inquiries Admin Suite
 */
/**
 * 3. Render Separated Repair Orders, General Inquiries & Repair Reports Admin Suite
 * Mobile-First Responsive, Executive Analytics & Advanced Filter System
 */
function mp_render_inquiries_admin_page() {
	mp_ensure_inquiries_schema();

	global $wpdb;
	$table_name = $wpdb->prefix . 'mp_inquiries';
	$notice     = '';
	$currency   = mp_opt( 'currency_symbol', 'NPR' );

	// A. Handle Create New Record (Walk-In Repair Docket OR General Inquiry)
	if ( isset( $_POST['mp_create_record_submit'], $_POST['mp_create_record_nonce'] ) && wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['mp_create_record_nonce'] ) ), 'mp_create_record_action' ) ) {
		$rec_type      = isset( $_POST['w_type'] ) ? sanitize_text_field( wp_unslash( $_POST['w_type'] ) ) : 'walkin_docket';
		$w_name        = isset( $_POST['w_name'] ) ? sanitize_text_field( wp_unslash( $_POST['w_name'] ) ) : '';
		$w_phone       = isset( $_POST['w_phone'] ) ? sanitize_text_field( wp_unslash( $_POST['w_phone'] ) ) : '';
		$w_email       = isset( $_POST['w_email'] ) ? sanitize_email( wp_unslash( $_POST['w_email'] ) ) : '';
		$w_brand       = isset( $_POST['w_brand'] ) ? sanitize_text_field( wp_unslash( $_POST['w_brand'] ) ) : '';
		$w_model       = isset( $_POST['w_model'] ) ? sanitize_text_field( wp_unslash( $_POST['w_model'] ) ) : '';
		$w_imei        = isset( $_POST['w_imei'] ) ? sanitize_text_field( wp_unslash( $_POST['w_imei'] ) ) : '';
		$w_passcode    = isset( $_POST['w_passcode'] ) ? sanitize_text_field( wp_unslash( $_POST['w_passcode'] ) ) : '';
		$w_accessories = isset( $_POST['w_accessories'] ) ? sanitize_text_field( wp_unslash( $_POST['w_accessories'] ) ) : 'Device Only';
		$w_service     = isset( $_POST['w_service'] ) ? sanitize_text_field( wp_unslash( $_POST['w_service'] ) ) : '';
		$w_urgency     = isset( $_POST['w_urgency'] ) ? sanitize_text_field( wp_unslash( $_POST['w_urgency'] ) ) : 'Normal';
		$w_cost        = isset( $_POST['w_cost'] ) ? sanitize_text_field( wp_unslash( $_POST['w_cost'] ) ) : '';
		$w_advance     = isset( $_POST['w_advance'] ) ? sanitize_text_field( wp_unslash( $_POST['w_advance'] ) ) : '0';
		$w_pay_status  = isset( $_POST['w_payment_status'] ) ? sanitize_text_field( wp_unslash( $_POST['w_payment_status'] ) ) : 'unpaid';
		$w_pay_method  = isset( $_POST['w_payment_method'] ) ? sanitize_text_field( wp_unslash( $_POST['w_payment_method'] ) ) : 'Cash';
		$w_tech        = isset( $_POST['w_technician'] ) ? sanitize_text_field( wp_unslash( $_POST['w_technician'] ) ) : '';
		$w_delivery    = isset( $_POST['w_delivery'] ) ? sanitize_text_field( wp_unslash( $_POST['w_delivery'] ) ) : 'Same-Day';
		$w_warranty    = isset( $_POST['w_warranty'] ) ? absint( $_POST['w_warranty'] ) : 90;
		$w_status      = isset( $_POST['w_status'] ) ? sanitize_text_field( wp_unslash( $_POST['w_status'] ) ) : 'in_progress';
		$w_message     = isset( $_POST['w_message'] ) ? sanitize_textarea_field( wp_unslash( $_POST['w_message'] ) ) : '';
		$w_notes       = isset( $_POST['w_notes'] ) ? sanitize_textarea_field( wp_unslash( $_POST['w_notes'] ) ) : '';
		$w_internal    = isset( $_POST['w_internal_notes'] ) ? sanitize_textarea_field( wp_unslash( $_POST['w_internal_notes'] ) ) : '';

		if ( ! empty( $w_name ) && ! empty( $w_phone ) ) {
			$prefix     = mp_is_repair_record_type( $rec_type ) ? 'AF-' : 'INQ-';
			$new_docket = $prefix . gmdate( 'Y' ) . '-' . wp_rand( 1000, 9999 );
			$wpdb->insert(
				$table_name,
				array(
					'docket_no'            => $new_docket,
					'type'                 => $rec_type,
					'customer_name'        => $w_name,
					'phone'                => $w_phone,
					'email'                => $w_email,
					'device_brand'         => $w_brand,
					'device_model'         => $w_model,
					'imei_serial'          => $w_imei,
					'device_passcode'      => $w_passcode,
					'accessories_received' => $w_accessories,
					'service_needed'       => $w_service ?: ( mp_is_repair_record_type( $rec_type ) ? 'Counter Walk-In Diagnosis' : 'General Showroom Inquiry' ),
					'urgency'              => $w_urgency,
					'repair_cost'          => $w_cost,
					'advance_paid'         => $w_advance,
					'payment_status'       => $w_pay_status,
					'payment_method'       => $w_pay_method,
					'technician_name'      => $w_tech,
					'estimated_delivery'   => $w_delivery,
					'warranty_days'        => $w_warranty,
					'message'              => $w_message,
					'status'               => $w_status,
					'notes'                => $w_notes,
					'internal_notes'       => $w_internal,
					'created_at'           => current_time( 'mysql' ),
				)
			);
			$notice = sprintf( esc_html__( 'Record %s created successfully!', 'mobile-pasal' ), $new_docket );
		}
	}

	// B. Handle Full Admin Edit / Update Modal Form Submission (Status, Cost, Notes, IMEI, etc.)
	if ( isset( $_POST['mp_update_record_submit'], $_POST['mp_update_record_nonce'] ) && wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['mp_update_record_nonce'] ) ), 'mp_update_record_action' ) ) {
		$edit_id = isset( $_POST['edit_id'] ) ? absint( $_POST['edit_id'] ) : 0;
		if ( $edit_id > 0 ) {
			$wpdb->update(
				$table_name,
				array(
					'type'                 => isset( $_POST['edit_type'] ) ? sanitize_text_field( wp_unslash( $_POST['edit_type'] ) ) : 'repair_docket',
					'status'               => isset( $_POST['edit_status'] ) ? sanitize_text_field( wp_unslash( $_POST['edit_status'] ) ) : 'pending',
					'customer_name'        => isset( $_POST['edit_customer_name'] ) ? sanitize_text_field( wp_unslash( $_POST['edit_customer_name'] ) ) : '',
					'phone'                => isset( $_POST['edit_phone'] ) ? sanitize_text_field( wp_unslash( $_POST['edit_phone'] ) ) : '',
					'email'                => isset( $_POST['edit_email'] ) ? sanitize_email( wp_unslash( $_POST['edit_email'] ) ) : '',
					'device_brand'         => isset( $_POST['edit_brand'] ) ? sanitize_text_field( wp_unslash( $_POST['edit_brand'] ) ) : '',
					'device_model'         => isset( $_POST['edit_model'] ) ? sanitize_text_field( wp_unslash( $_POST['edit_model'] ) ) : '',
					'imei_serial'          => isset( $_POST['edit_imei'] ) ? sanitize_text_field( wp_unslash( $_POST['edit_imei'] ) ) : '',
					'device_passcode'      => isset( $_POST['edit_passcode'] ) ? sanitize_text_field( wp_unslash( $_POST['edit_passcode'] ) ) : '',
					'accessories_received' => isset( $_POST['edit_accessories'] ) ? sanitize_text_field( wp_unslash( $_POST['edit_accessories'] ) ) : '',
					'service_needed'       => isset( $_POST['edit_service'] ) ? sanitize_text_field( wp_unslash( $_POST['edit_service'] ) ) : '',
					'urgency'              => isset( $_POST['edit_urgency'] ) ? sanitize_text_field( wp_unslash( $_POST['edit_urgency'] ) ) : 'Normal',
					'repair_cost'          => isset( $_POST['edit_repair_cost'] ) ? sanitize_text_field( wp_unslash( $_POST['edit_repair_cost'] ) ) : '',
					'advance_paid'         => isset( $_POST['edit_advance_paid'] ) ? sanitize_text_field( wp_unslash( $_POST['edit_advance_paid'] ) ) : '0',
					'payment_status'       => isset( $_POST['edit_payment_status'] ) ? sanitize_text_field( wp_unslash( $_POST['edit_payment_status'] ) ) : 'unpaid',
					'payment_method'       => isset( $_POST['edit_payment_method'] ) ? sanitize_text_field( wp_unslash( $_POST['edit_payment_method'] ) ) : '',
					'technician_name'      => isset( $_POST['edit_technician'] ) ? sanitize_text_field( wp_unslash( $_POST['edit_technician'] ) ) : '',
					'estimated_delivery'   => isset( $_POST['edit_delivery'] ) ? sanitize_text_field( wp_unslash( $_POST['edit_delivery'] ) ) : '',
					'warranty_days'        => isset( $_POST['edit_warranty_days'] ) ? absint( $_POST['edit_warranty_days'] ) : 90,
					'message'              => isset( $_POST['edit_message'] ) ? sanitize_textarea_field( wp_unslash( $_POST['edit_message'] ) ) : '',
					'notes'                => isset( $_POST['edit_notes'] ) ? sanitize_textarea_field( wp_unslash( $_POST['edit_notes'] ) ) : '',
					'internal_notes'       => isset( $_POST['edit_internal_notes'] ) ? sanitize_textarea_field( wp_unslash( $_POST['edit_internal_notes'] ) ) : '',
				),
				array( 'id' => $edit_id ),
				null,
				array( '%d' )
			);
			$notice = esc_html__( 'Record details, cost, status & notes saved successfully!', 'mobile-pasal' );
		}
	}

	// C. Handle Quick Inline Status Change or Deletion
	if ( isset( $_GET['action'], $_GET['id'] ) && check_admin_referer( 'mp_inquiry_action' ) ) {
		$item_id = absint( $_GET['id'] );
		$act     = sanitize_text_field( wp_unslash( $_GET['action'] ) );
		if ( 'delete' === $act ) {
			$wpdb->delete( $table_name, array( 'id' => $item_id ), array( '%d' ) );
			$notice = esc_html__( 'Record deleted permanently.', 'mobile-pasal' );
		} elseif ( in_array( $act, array( 'pending', 'diagnosing', 'in_progress', 'waiting_parts', 'testing', 'ready', 'completed', 'contacted', 'quoted', 'resolved', 'cancelled' ), true ) ) {
			$wpdb->update( $table_name, array( 'status' => $act ), array( 'id' => $item_id ), array( '%s' ), array( '%d' ) );
			$notice = sprintf( esc_html__( 'Status updated to %s.', 'mobile-pasal' ), ucwords( str_replace( '_', ' ', $act ) ) );
		}
	}

	// Quick Inline Payment Status Change
	if ( isset( $_GET['pay_action'], $_GET['id'] ) && check_admin_referer( 'mp_inquiry_action' ) ) {
		$item_id = absint( $_GET['id'] );
		$new_pay = strtolower( sanitize_text_field( wp_unslash( $_GET['pay_action'] ) ) );
		if ( in_array( $new_pay, array( 'unpaid', 'partial', 'paid' ), true ) ) {
			$update_data = array( 'payment_status' => $new_pay );
			if ( 'paid' === $new_pay ) {
				$curr = $wpdb->get_row( $wpdb->prepare( "SELECT repair_cost, advance_paid FROM {$table_name} WHERE id = %d", $item_id ) );
				if ( $curr && (float) $curr->advance_paid <= 0 && (float) $curr->repair_cost > 0 ) {
					$update_data['advance_paid'] = $curr->repair_cost;
				}
			}
			$wpdb->update( $table_name, $update_data, array( 'id' => $item_id ), null, array( '%d' ) );
			$notice = sprintf( esc_html__( 'Payment status updated to %s.', 'mobile-pasal' ), strtoupper( $new_pay ) );
		}
	}

	// Active Workspace Tab: 'repairs' (default), 'general', 'reports', or 'all'
	$active_tab     = isset( $_GET['tab'] ) ? sanitize_text_field( wp_unslash( $_GET['tab'] ) ) : 'repairs';
	$current_status = isset( $_GET['status'] ) ? sanitize_text_field( wp_unslash( $_GET['status'] ) ) : 'all';
	$current_pay    = isset( $_GET['payment'] ) ? sanitize_text_field( wp_unslash( $_GET['payment'] ) ) : 'all';
	$current_urgency = isset( $_GET['urgency'] ) ? sanitize_text_field( wp_unslash( $_GET['urgency'] ) ) : 'all';
	$current_date   = isset( $_GET['date_filter'] ) ? sanitize_text_field( wp_unslash( $_GET['date_filter'] ) ) : ( 'reports' === $active_tab ? 'all' : 'all' );
	$sort_by        = isset( $_GET['sort'] ) ? sanitize_text_field( wp_unslash( $_GET['sort'] ) ) : 'date_desc';
	$search_query   = isset( $_GET['s'] ) ? sanitize_text_field( wp_unslash( $_GET['s'] ) ) : '';
	$per_page       = isset( $_GET['per_page'] ) ? min( 100, max( 10, absint( $_GET['per_page'] ) ) ) : 25;
	$paged          = isset( $_GET['paged'] ) ? max( 1, absint( $_GET['paged'] ) ) : 1;

	// Total Counts for Separated Tabs
	$repairs_total   = (int) $wpdb->get_var( "SELECT COUNT(*) FROM {$table_name} WHERE type IN ('repair_docket','walkin_docket','repair')" );
	$repairs_pending = (int) $wpdb->get_var( "SELECT COUNT(*) FROM {$table_name} WHERE type IN ('repair_docket','walkin_docket','repair') AND status IN ('pending','new')" );
	$repairs_bench   = (int) $wpdb->get_var( "SELECT COUNT(*) FROM {$table_name} WHERE type IN ('repair_docket','walkin_docket','repair') AND status IN ('diagnosing','in_progress','waiting_parts','testing')" );
	$repairs_ready   = (int) $wpdb->get_var( "SELECT COUNT(*) FROM {$table_name} WHERE type IN ('repair_docket','walkin_docket','repair') AND status IN ('ready','completed')" );

	$general_total   = (int) $wpdb->get_var( "SELECT COUNT(*) FROM {$table_name} WHERE type NOT IN ('repair_docket','walkin_docket','repair')" );
	$general_pending = (int) $wpdb->get_var( "SELECT COUNT(*) FROM {$table_name} WHERE type NOT IN ('repair_docket','walkin_docket','repair') AND status IN ('pending','new')" );

	$all_total       = $repairs_total + $general_total;

	// Build Date Clause
	$date_where = '';
	if ( 'today' === $current_date ) {
		$date_where = " AND DATE(created_at) = CURDATE()";
	} elseif ( 'this_week' === $current_date ) {
		$date_where = " AND YEARWEEK(created_at, 1) = YEARWEEK(CURDATE(), 1)";
	} elseif ( 'this_month' === $current_date ) {
		$date_where = " AND MONTH(created_at) = MONTH(CURDATE()) AND YEAR(created_at) = YEAR(CURDATE())";
	} elseif ( 'last_month' === $current_date ) {
		$date_where = " AND created_at >= DATE_SUB(DATE_FORMAT(NOW(), '%Y-%m-01'), INTERVAL 1 MONTH) AND created_at < DATE_FORMAT(NOW(), '%Y-%m-01')";
	} elseif ( 'this_year' === $current_date ) {
		$date_where = " AND YEAR(created_at) = YEAR(CURDATE())";
	} elseif ( 'custom' === $current_date && ! empty( $_GET['start_date'] ) && ! empty( $_GET['end_date'] ) ) {
		$s_date     = sanitize_text_field( wp_unslash( $_GET['start_date'] ) );
		$e_date     = sanitize_text_field( wp_unslash( $_GET['end_date'] ) );
		$date_where = $wpdb->prepare( " AND DATE(created_at) BETWEEN %s AND %s", $s_date, $e_date );
	}

	// -------------------------------------------------------------
	// IF TAB === 'reports': Compute Comprehensive Business Intelligence
	// -------------------------------------------------------------
	if ( 'reports' === $active_tab ) {
		$report_rows = $wpdb->get_results( "SELECT * FROM {$table_name} WHERE type IN ('repair_docket','walkin_docket','repair') {$date_where} ORDER BY created_at DESC" );

		$rep_kpi_rev      = 0.0;
		$rep_kpi_adv      = 0.0;
		$rep_kpi_bal      = 0.0;
		$rep_status_cnt   = array();
		$rep_brand_stats  = array();
		$rep_service_stats = array();
		$rep_tech_stats   = array();
		$rep_pay_stats    = array();

		foreach ( $report_rows as $row_item ) {
			$raw_c  = (float) preg_replace( '/[^0-9.]/', '', str_replace( ',', '', (string) $row_item->repair_cost ) );
			$raw_a  = (float) preg_replace( '/[^0-9.]/', '', str_replace( ',', '', (string) $row_item->advance_paid ) );
			$pay_st = ! empty( $row_item->payment_status ) ? strtolower( trim( $row_item->payment_status ) ) : 'unpaid';

			if ( 'paid' === $pay_st ) {
				$collected = $raw_c > 0 ? $raw_c : $raw_a;
				$balance   = 0.0;
			} elseif ( 'partial' === $pay_st ) {
				$collected = $raw_a > 0 ? $raw_a : 0.0;
				$balance   = max( 0.0, $raw_c - $collected );
			} else { // unpaid
				$collected = $raw_a > 0 ? $raw_a : 0.0;
				$balance   = max( 0.0, $raw_c - $collected );
			}

			$rep_kpi_rev += $raw_c;
			$rep_kpi_adv += $collected;
			$rep_kpi_bal += $balance;

			// Status aggregation
			$st_k = ! empty( $row_item->status ) ? $row_item->status : 'pending';
			$rep_status_cnt[ $st_k ] = isset( $rep_status_cnt[ $st_k ] ) ? $rep_status_cnt[ $st_k ] + 1 : 1;

			// Brand aggregation
			$b_name = ! empty( $row_item->device_brand ) ? trim( $row_item->device_brand ) : 'Other / Generic';
			if ( ! isset( $rep_brand_stats[ $b_name ] ) ) {
				$rep_brand_stats[ $b_name ] = array( 'count' => 0, 'rev' => 0.0 );
			}
			$rep_brand_stats[ $b_name ]['count']++;
			$rep_brand_stats[ $b_name ]['rev'] += $raw_c;

			// Service category aggregation
			$s_name = ! empty( $row_item->service_needed ) ? trim( $row_item->service_needed ) : 'General Service';
			if ( ! isset( $rep_service_stats[ $s_name ] ) ) {
				$rep_service_stats[ $s_name ] = array( 'count' => 0, 'rev' => 0.0 );
			}
			$rep_service_stats[ $s_name ]['count']++;
			$rep_service_stats[ $s_name ]['rev'] += $raw_c;

			// Technician productivity
			$t_name = ! empty( $row_item->technician_name ) ? trim( $row_item->technician_name ) : 'Unassigned / Counter';
			if ( ! isset( $rep_tech_stats[ $t_name ] ) ) {
				$rep_tech_stats[ $t_name ] = array( 'assigned' => 0, 'completed' => 0, 'rev' => 0.0 );
			}
			$rep_tech_stats[ $t_name ]['assigned']++;
			if ( in_array( $st_k, array( 'ready', 'completed' ), true ) ) {
				$rep_tech_stats[ $t_name ]['completed']++;
			}
			$rep_tech_stats[ $t_name ]['rev'] += $raw_c;

			// Payment method breakdown (attribute actual money settled)
			$p_meth = ! empty( $row_item->payment_method ) ? trim( $row_item->payment_method ) : 'Cash at Counter';
			if ( ! isset( $rep_pay_stats[ $p_meth ] ) ) {
				$rep_pay_stats[ $p_meth ] = array( 'count' => 0, 'rev' => 0.0 );
			}
			if ( $collected > 0 || 'paid' === $pay_st ) {
				$rep_pay_stats[ $p_meth ]['count']++;
				$rep_pay_stats[ $p_meth ]['rev'] += ( $collected > 0 ? $collected : $raw_c );
			}
		}

		$rep_total_dockets = count( $report_rows );
		$rep_completed_cnt = ( isset( $rep_status_cnt['ready'] ) ? $rep_status_cnt['ready'] : 0 ) + ( isset( $rep_status_cnt['completed'] ) ? $rep_status_cnt['completed'] : 0 );
		$rep_bench_cnt     = ( isset( $rep_status_cnt['diagnosing'] ) ? $rep_status_cnt['diagnosing'] : 0 ) + ( isset( $rep_status_cnt['in_progress'] ) ? $rep_status_cnt['in_progress'] : 0 ) + ( isset( $rep_status_cnt['waiting_parts'] ) ? $rep_status_cnt['waiting_parts'] : 0 ) + ( isset( $rep_status_cnt['testing'] ) ? $rep_status_cnt['testing'] : 0 );
		$rep_success_rate  = $rep_total_dockets > 0 ? round( ( $rep_completed_cnt / $rep_total_dockets ) * 100, 1 ) : 0;
		$rep_avg_cost      = $rep_total_dockets > 0 ? round( $rep_kpi_rev / $rep_total_dockets, 2 ) : 0;

		// Sort arrays descending by count
		uasort( $rep_brand_stats, function( $a, $b ) { return $b['count'] - $a['count']; } );
		uasort( $rep_service_stats, function( $a, $b ) { return $b['count'] - $a['count']; } );
		uasort( $rep_tech_stats, function( $a, $b ) { return $b['assigned'] - $a['assigned']; } );
		uasort( $rep_pay_stats, function( $a, $b ) { return $b['count'] - $a['count']; } );
	} else {
		// -------------------------------------------------------------
		// RECORD TABLES: Apply Filters, Search & SQL Pagination
		// -------------------------------------------------------------
		$where = '1=1';
		if ( 'repairs' === $active_tab ) {
			$where .= " AND type IN ('repair_docket','walkin_docket','repair')";
		} elseif ( 'general' === $active_tab ) {
			$where .= " AND type NOT IN ('repair_docket','walkin_docket','repair')";
		}

		if ( 'all' !== $current_status ) {
			$where .= $wpdb->prepare( ' AND status = %s', $current_status );
		}
		if ( 'all' !== $current_pay ) {
			$where .= $wpdb->prepare( ' AND LOWER(payment_status) = %s', strtolower( $current_pay ) );
		}
		if ( 'all' !== $current_urgency ) {
			$where .= $wpdb->prepare( ' AND urgency = %s', $current_urgency );
		}

		$where .= $date_where;

		if ( ! empty( $search_query ) ) {
			$like = '%' . $wpdb->esc_like( $search_query ) . '%';
			$where .= $wpdb->prepare(
				" AND (docket_no LIKE %s OR customer_name LIKE %s OR phone LIKE %s OR email LIKE %s OR device_brand LIKE %s OR device_model LIKE %s OR imei_serial LIKE %s OR service_needed LIKE %s OR message LIKE %s OR notes LIKE %s)",
				$like, $like, $like, $like, $like, $like, $like, $like, $like, $like
			);
		}

		$order_clause = 'ORDER BY created_at DESC';
		if ( 'date_asc' === $sort_by ) {
			$order_clause = 'ORDER BY created_at ASC';
		} elseif ( 'cost_desc' === $sort_by ) {
			$order_clause = 'ORDER BY CAST(REPLACE(REPLACE(repair_cost, ",", ""), "NPR", "") AS DECIMAL(10,2)) DESC, created_at DESC';
		} elseif ( 'cost_asc' === $sort_by ) {
			$order_clause = 'ORDER BY CAST(REPLACE(REPLACE(repair_cost, ",", ""), "NPR", "") AS DECIMAL(10,2)) ASC, created_at DESC';
		} elseif ( 'name_asc' === $sort_by ) {
			$order_clause = 'ORDER BY customer_name ASC';
		}

		$total_items = (int) $wpdb->get_var( "SELECT COUNT(*) FROM {$table_name} WHERE {$where}" );
		$total_pages = max( 1, (int) ceil( $total_items / $per_page ) );
		if ( $paged > $total_pages ) {
			$paged = $total_pages;
		}
		$offset = ( $paged - 1 ) * $per_page;

		$items = $wpdb->get_results( "SELECT * FROM {$table_name} WHERE {$where} {$order_clause} LIMIT {$per_page} OFFSET {$offset}" );
	}
	?>
	<style>
		/* Mobile-First Layout & Theme Variables (Matching main.css) */
		:root {
			--mp-admin-blue: #0862e9;
			--mp-admin-blue-hover: #074ec0;
			--mp-admin-navy: #071b3b;
			--mp-admin-dark: #071b3b;
			--mp-admin-slate: #1e293b;
			--mp-admin-muted: #52627e;
			--mp-admin-border: #dce7f8;
			--mp-admin-surface: #f7faff;
			--mp-admin-green: #1ea952;
			--mp-admin-amber: #d97706;
			--mp-admin-red: #dc2626;
			--font-head: "Plus Jakarta Sans", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
			--font-body: "DM Sans", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
		}
		.bopt-app-wrap {
			font-family: var(--font-body);
			background: var(--mp-admin-surface);
			color: var(--mp-admin-dark);
			min-height: 100vh;
			box-sizing: border-box;
			-webkit-font-smoothing: antialiased;
		}
		.bopt-app-wrap h1,
		.bopt-app-wrap h2,
		.bopt-app-wrap h3,
		.bopt-app-wrap h4,
		.bopt-app-wrap h5,
		.bopt-app-wrap h6,
		.bopt-brand-title,
		.mp-crm-tab-title,
		.mp-report-card-title,
		.mp-report-kpi-val,
		.mp-report-kpi-title {
			font-family: var(--font-head);
			letter-spacing: -0.02em;
		}
		/* WordPress Core Mobile White Space Fix */
		@media screen and (max-width: 782px), screen and (max-width: 600px) {
			html.wp-toolbar { padding-top: 46px !important; }
			#wpbody, body #wpbody, div#wpbody, body.toplevel_page_mp-inquiries #wpbody {
				padding-top: 0 !important;
				margin-top: 0 !important;
			}
			body #wpcontent, div#wpcontent, body #wpbody-content, div#wpbody-content {
				padding-top: 0 !important;
				margin-top: 0 !important;
			}
		}

		.bopt-topbar {
			background: #030d1d;
			border-bottom: 3px solid var(--mp-admin-blue);
			padding: 10px 24px;
			display: flex;
			align-items: center;
			justify-content: space-between;
			gap: 12px;
			position: sticky;
			top: 32px;
			z-index: 1000;
			box-shadow: 0 4px 18px rgba(0, 0, 0, 0.25);
			flex-wrap: nowrap;
			box-sizing: border-box;
		}
		.bopt-btn-text-short {
			display: none;
		}
		.bopt-btn-text-full {
			display: inline;
		}
		@media screen and (max-width: 782px) {
			.bopt-topbar {
				top: 46px !important;
				padding: 8px 12px !important;
				gap: 8px !important;
				flex-wrap: nowrap !important;
				min-height: 50px !important;
			}
			.bopt-topbar-left {
				flex: 1 1 auto !important;
				min-width: 0 !important;
				overflow: hidden !important;
			}
			.bopt-brand {
				display: flex !important;
				align-items: center !important;
				gap: 8px !important;
				min-width: 0 !important;
			}
			.bopt-brand-icon {
				width: 32px !important;
				height: 32px !important;
				font-size: 14px !important;
				flex-shrink: 0 !important;
			}
			.bopt-brand-info {
				min-width: 0 !important;
				overflow: hidden !important;
			}
			.bopt-brand-title {
				display: block !important;
				font-size: 13px !important;
				font-weight: 800 !important;
				color: #ffffff !important;
				white-space: nowrap !important;
				overflow: hidden !important;
				text-overflow: ellipsis !important;
				max-width: 120px !important;
			}
			.bopt-brand-badge {
				display: none !important;
			}
			.bopt-topbar-right {
				display: flex !important;
				align-items: center !important;
				gap: 6px !important;
				flex-shrink: 0 !important;
				width: auto !important;
			}
			.bopt-topbar-right button,
			.bopt-topbar-right a {
				flex-shrink: 0 !important;
				font-size: 11.5px !important;
				padding: 6px 10px !important;
				min-height: 34px !important;
				height: 34px !important;
			}
			.bopt-btn-text-full {
				display: none !important;
			}
			.bopt-btn-text-short {
				display: inline !important;
			}
			.bopt-desk-only {
				display: none !important;
			}
		}
		@media screen and (max-width: 400px) {
			.bopt-brand-title {
				max-width: 85px !important;
				font-size: 12px !important;
			}
			.bopt-topbar-right button,
			.bopt-topbar-right a {
				padding: 5px 8px !important;
				font-size: 11px !important;
			}
		}

		/* Unified High Contrast Buttons */
		.bopt-btn-secondary {
			display: inline-flex;
			align-items: center;
			justify-content: center;
			gap: 6px;
			padding: 8px 14px;
			border-radius: 8px;
			background: #ffffff;
			border: 1.5px solid var(--mp-admin-border);
			color: var(--mp-admin-dark) !important;
			font-size: 12.5px;
			font-weight: 700;
			text-decoration: none;
			transition: all 0.2s ease;
			min-height: 38px;
			cursor: pointer;
		}
		.bopt-btn-secondary:hover {
			background: #edf4ff;
			border-color: var(--mp-admin-blue);
			color: var(--mp-admin-blue) !important;
		}
		.bopt-topbar .bopt-messages-btn {
			color: #ffffff !important;
			background: rgba(255, 255, 255, 0.08);
			border: 1px solid rgba(255, 255, 255, 0.2);
			font-weight: 600;
		}
		.bopt-topbar .bopt-messages-btn:hover {
			color: #ffffff !important;
			background: rgba(8, 98, 233, 0.35);
			border-color: rgba(8, 98, 233, 0.6);
		}
		.bopt-topbar .bopt-messages-btn.is-active {
			background: var(--mp-admin-blue) !important;
			border-color: var(--mp-admin-blue) !important;
			color: #ffffff !important;
		}

		.bopt-inquiries-container {
			max-width: 1440px;
			margin: 0 auto;
			padding: 24px 20px 80px;
			width: 100%;
			box-sizing: border-box;
		}
		@media screen and (max-width: 782px) {
			.bopt-inquiries-container {
				padding: 16px 12px 80px;
			}
		}
		/* 4 Workspace CRM Tabs */
		.mp-crm-tabs {
			display: grid;
			grid-template-columns: repeat(4, 1fr);
			gap: 14px;
			margin-bottom: 22px;
		}
		@media screen and (max-width: 1024px) {
			.mp-crm-tabs {
				grid-template-columns: repeat(2, 1fr);
			}
		}
		@media screen and (max-width: 540px) {
			.mp-crm-tabs {
				grid-template-columns: 1fr;
				gap: 10px;
			}
		}
		.mp-crm-tab-card {
			display: flex;
			align-items: center;
			justify-content: space-between;
			padding: 15px 18px;
			background: #ffffff;
			border: 2px solid #e2e8f0;
			border-radius: 14px;
			text-decoration: none;
			color: var(--mp-admin-dark);
			transition: all 0.2s ease;
			box-shadow: 0 2px 8px rgba(15, 23, 42, 0.03);
		}
		.mp-crm-tab-card:hover {
			border-color: #93c5fd;
			transform: translateY(-1px);
			box-shadow: 0 6px 16px rgba(0, 102, 204, 0.08);
		}
		.mp-crm-tab-card.is-active {
			border-color: var(--mp-admin-blue);
			background: #f0f7ff;
			box-shadow: 0 8px 20px rgba(0, 102, 204, 0.12);
		}
		.mp-crm-tab-left {
			display: flex;
			align-items: center;
			gap: 12px;
			min-width: 0;
		}
		.mp-crm-tab-icon {
			width: 42px;
			height: 42px;
			border-radius: 10px;
			background: #eff6ff;
			color: var(--mp-admin-blue);
			display: flex;
			align-items: center;
			justify-content: center;
			font-size: 18px;
			flex-shrink: 0;
		}
		.mp-crm-tab-card.is-active .mp-crm-tab-icon {
			background: var(--mp-admin-blue);
			color: #ffffff;
		}
		.mp-crm-tab-title {
			display: block;
			font-size: 14px;
			font-weight: 800;
			color: var(--mp-admin-dark);
			white-space: nowrap;
			overflow: hidden;
			text-overflow: ellipsis;
		}
		.mp-crm-tab-sub {
			display: block;
			font-size: 11.5px;
			color: var(--mp-admin-muted);
			margin-top: 2px;
			white-space: nowrap;
			overflow: hidden;
			text-overflow: ellipsis;
		}
		.mp-crm-tab-count {
			font-size: 18px;
			font-weight: 900;
			color: var(--mp-admin-blue);
			background: #ffffff;
			border: 1px solid #bfdbfe;
			padding: 3px 10px;
			border-radius: 999px;
			flex-shrink: 0;
		}
		.mp-crm-tab-card.is-active .mp-crm-tab-count {
			background: var(--mp-admin-blue);
			color: #ffffff;
			border-color: var(--mp-admin-blue);
		}

		/* Filter Toolbar */
		.bopt-filter-bar {
			background: #ffffff;
			border: 1px solid #e2e8f0;
			border-radius: 14px;
			padding: 16px 18px;
			margin-bottom: 20px;
			box-shadow: 0 2px 10px rgba(15, 23, 42, 0.03);
		}
		.bopt-filter-pills {
			display: flex;
			gap: 8px;
			flex-wrap: wrap;
			margin-bottom: 14px;
			padding-bottom: 12px;
			border-bottom: 1px solid #f1f5f9;
		}
		.bopt-filter-pill {
			display: inline-flex;
			align-items: center;
			gap: 6px;
			padding: 7px 14px;
			border-radius: 999px;
			background: #f8fafc;
			border: 1px solid #cbd5e1;
			color: var(--mp-admin-slate);
			font-size: 12.5px;
			font-weight: 700;
			text-decoration: none;
			transition: all 0.15s ease;
		}
		.bopt-filter-pill:hover {
			border-color: #93c5fd;
			color: var(--mp-admin-blue);
			background: #eff6ff;
		}
		.bopt-filter-pill.is-active {
			background: var(--mp-admin-blue);
			color: #ffffff;
			border-color: var(--mp-admin-blue);
		}
		.bopt-filter-pill .bopt-pill-count {
			background: rgba(0, 0, 0, 0.08);
			padding: 1px 7px;
			border-radius: 999px;
			font-size: 11px;
		}
		.bopt-filter-pill.is-active .bopt-pill-count {
			background: rgba(255, 255, 255, 0.25);
			color: #ffffff;
		}

		/* Secondary Filter Controls Grid */
		.mp-filter-controls-row {
			display: flex;
			align-items: center;
			justify-content: space-between;
			gap: 12px;
			flex-wrap: wrap;
		}
		.mp-filter-selects {
			display: flex;
			gap: 8px;
			flex-wrap: wrap;
			align-items: center;
		}
		.mp-filter-select {
			height: 38px;
			padding: 6px 12px;
			border-radius: 8px;
			border: 1.5px solid #cbd5e1;
			background: #ffffff;
			color: var(--mp-admin-dark);
			font-size: 12.5px;
			font-weight: 600;
			cursor: pointer;
		}
		.mp-filter-select:focus {
			border-color: var(--mp-admin-blue);
			outline: none;
		}
		.mp-search-form {
			display: flex;
			gap: 8px;
			align-items: center;
			flex-grow: 1;
			max-width: 440px;
			min-width: 240px;
		}
		@media screen and (max-width: 782px) {
			.mp-filter-controls-row {
				flex-direction: column;
				align-items: stretch;
			}
			.mp-filter-selects {
				flex-direction: column;
				align-items: stretch;
			}
			.mp-filter-select {
				width: 100%;
			}
			.mp-search-form {
				max-width: 100%;
			}
		}
		.mp-search-input-wrap {
			position: relative;
			flex: 1;
		}
		.mp-search-input-wrap i {
			position: absolute;
			left: 12px;
			top: 50%;
			transform: translateY(-50%);
			color: #64748b;
			font-size: 13px;
		}
		.mp-search-input-wrap input {
			width: 100%;
			height: 38px;
			padding: 6px 12px 6px 36px !important;
			border-radius: 8px !important;
			border: 1.5px solid #cbd5e1 !important;
			background: #ffffff !important;
			color: var(--mp-admin-dark) !important;
			font-size: 13px !important;
		}
		.mp-search-input-wrap input:focus {
			border-color: var(--mp-admin-blue) !important;
			outline: none !important;
		}
		.mp-search-btn {
			height: 38px;
			padding: 0 16px;
			background: var(--mp-admin-blue);
			color: #ffffff;
			border: none;
			border-radius: 8px;
			font-size: 13px;
			font-weight: 700;
			cursor: pointer;
			transition: background 0.15s ease;
		}
		.mp-search-btn:hover {
			background: var(--mp-admin-blue-hover);
		}
		.mp-reset-filters-btn {
			font-size: 12px;
			font-weight: 700;
			color: #dc2626;
			text-decoration: none;
			padding: 6px 10px;
			border-radius: 6px;
			background: #fef2f2;
			border: 1px solid #fecaca;
			display: inline-flex;
			align-items: center;
			gap: 4px;
		}
		.mp-reset-filters-btn:hover {
			background: #fee2e2;
			color: #991b1b;
		}

		/* Pagination UI */
		.mp-pagination-bar {
			display: flex;
			align-items: center;
			justify-content: space-between;
			gap: 12px;
			flex-wrap: wrap;
			padding: 12px 16px;
			background: #ffffff;
			border: 1px solid #e2e8f0;
			border-radius: 12px;
			margin: 16px 0;
		}
		.mp-pagination-info {
			font-size: 13px;
			color: var(--mp-admin-muted);
			font-weight: 600;
		}
		.mp-pagination-info strong {
			color: var(--mp-admin-dark);
		}
		.mp-pagination-links {
			display: flex;
			gap: 5px;
			align-items: center;
			flex-wrap: wrap;
		}
		.mp-page-btn {
			min-width: 36px;
			height: 36px;
			padding: 0 10px;
			display: inline-flex;
			align-items: center;
			justify-content: center;
			border-radius: 8px;
			border: 1px solid #cbd5e1;
			background: #ffffff;
			color: var(--mp-admin-dark);
			font-size: 13px;
			font-weight: 700;
			text-decoration: none;
			transition: all 0.15s ease;
		}
		.mp-page-btn:hover {
			border-color: var(--mp-admin-blue);
			color: var(--mp-admin-blue);
			background: #eff6ff;
		}
		.mp-page-btn.is-active {
			background: var(--mp-admin-blue);
			color: #ffffff;
			border-color: var(--mp-admin-blue);
		}
		.mp-page-btn.disabled {
			opacity: 0.4;
			cursor: not-allowed;
			pointer-events: none;
		}

		/* High Contrast Badges & Status */
		.mp-cost-pill {
			display: inline-block;
			font-size: 12.5px;
			font-weight: 800;
			color: var(--mp-admin-dark);
			background: #f1f5f9;
			border: 1px solid #cbd5e1;
			padding: 3px 8px;
			border-radius: 6px;
		}
		.mp-pay-badge {
			display: inline-block;
			font-size: 10px;
			font-weight: 800;
			text-transform: uppercase;
			padding: 2px 7px;
			border-radius: 4px;
			margin-top: 3px;
			border: 1px solid transparent;
		}
		.mp-pay-badge.paid { background: #dcfce7; color: #166534; border-color: #bbf7d0; }
		.mp-pay-badge.partial { background: #fef3c7; color: #92400e; border-color: #fde68a; }
		.mp-pay-badge.unpaid { background: #fee2e2; color: #991b1b; border-color: #fecaca; }

		/* Report Analytics View Styles */
		.mp-report-toolbar {
			display: flex;
			align-items: center;
			justify-content: space-between;
			gap: 14px;
			flex-wrap: wrap;
			background: #ffffff;
			border: 1px solid #e2e8f0;
			border-radius: 14px;
			padding: 16px 20px;
			margin-bottom: 22px;
			box-shadow: 0 2px 10px rgba(15, 23, 42, 0.03);
		}
		.mp-report-date-pills {
			display: flex;
			gap: 8px;
			flex-wrap: wrap;
			align-items: center;
		}
		.mp-report-btn-row {
			display: inline-flex;
			align-items: center;
			gap: 8px;
		}
		.mp-report-kpi-grid {
			display: grid;
			grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
			gap: 16px;
			margin-bottom: 24px;
		}
		.mp-report-kpi-card {
			background: #ffffff;
			border: 1px solid #e2e8f0;
			border-radius: 14px;
			padding: 20px;
			box-shadow: 0 2px 10px rgba(15, 23, 42, 0.03);
			position: relative;
			overflow: hidden;
		}
		.mp-report-kpi-card::before {
			content: '';
			position: absolute;
			top: 0;
			left: 0;
			right: 0;
			height: 4px;
			background: #cbd5e1;
		}
		.mp-report-kpi-card.blue::before { background: var(--mp-admin-blue); }
		.mp-report-kpi-card.green::before { background: #16a34a; }
		.mp-report-kpi-card.amber::before { background: #d97706; }
		.mp-report-kpi-card.purple::before { background: #7c3aed; }
		.mp-report-kpi-card.teal::before { background: #0d9488; }
		.mp-report-kpi-card.red::before { background: #dc2626; }

		.mp-report-kpi-header {
			display: flex;
			justify-content: space-between;
			align-items: flex-start;
			margin-bottom: 8px;
		}
		.mp-report-kpi-title {
			font-size: 11px;
			font-weight: 800;
			text-transform: uppercase;
			letter-spacing: 0.5px;
			color: var(--mp-admin-muted);
		}
		.mp-report-kpi-icon {
			font-size: 18px;
			color: var(--mp-admin-blue);
		}
		.mp-report-kpi-val {
			font-size: 24px;
			font-weight: 900;
			color: var(--mp-admin-dark);
			line-height: 1.2;
			margin-bottom: 6px;
		}
		.mp-report-kpi-sub {
			font-size: 12px;
			color: var(--mp-admin-muted);
			display: flex;
			align-items: center;
			gap: 6px;
		}
		.mp-report-grid-2 {
			display: grid;
			grid-template-columns: 1fr 1fr;
			gap: 20px;
			margin-bottom: 24px;
		}
		@media screen and (max-width: 900px) {
			.mp-report-grid-2 {
				grid-template-columns: 1fr;
			}
		}
		.mp-report-card {
			background: #ffffff;
			border: 1px solid #e2e8f0;
			border-radius: 14px;
			padding: 22px;
			box-shadow: 0 2px 10px rgba(15, 23, 42, 0.03);
		}
		.mp-report-card-title {
			font-size: 15px;
			font-weight: 800;
			color: var(--mp-admin-dark);
			margin: 0 0 16px 0;
			display: flex;
			align-items: center;
			justify-content: space-between;
		}
		.mp-brand-bar-item {
			margin-bottom: 14px;
		}
		.mp-brand-bar-head {
			display: flex;
			justify-content: space-between;
			font-size: 13px;
			font-weight: 700;
			color: var(--mp-admin-dark);
			margin-bottom: 5px;
		}
		.mp-progress-track {
			height: 8px;
			background: #f1f5f9;
			border-radius: 999px;
			overflow: hidden;
		}
		.mp-progress-fill {
			height: 100%;
			background: var(--mp-admin-blue);
			border-radius: 999px;
		}
		.mp-table-responsive {
			width: 100%;
			overflow-x: auto;
			-webkit-overflow-scrolling: touch;
			margin: 0;
			padding-bottom: 6px;
			border-radius: 8px;
		}
		.mp-tech-table {
			width: 100%;
			min-width: 440px;
			border-collapse: collapse;
		}
		.mp-tech-table th, .mp-tech-table td {
			padding: 10px 12px;
			border-bottom: 1px solid #f1f5f9;
			text-align: left;
			font-size: 12.5px;
		}
		.mp-tech-table th {
			background: #f8fafc;
			font-size: 11px;
			font-weight: 800;
			text-transform: uppercase;
			color: var(--mp-admin-muted);
		}

		/* Mobile-First Responsive Breakpoint for Reports & CRM (< 782px) */
		@media screen and (max-width: 782px) {
			.mp-crm-tabs {
				display: flex !important;
				flex-wrap: nowrap !important;
				overflow-x: auto !important;
				-webkit-overflow-scrolling: touch !important;
				scrollbar-width: none !important;
				gap: 8px !important;
				padding-bottom: 4px !important;
				margin-bottom: 16px !important;
			}
			.mp-crm-tabs::-webkit-scrollbar {
				display: none !important;
			}
			.mp-crm-tab-card {
				flex: 0 0 auto !important;
				min-width: 180px !important;
				max-width: 220px !important;
				padding: 10px 14px !important;
				border-radius: 12px !important;
			}
			.bopt-filter-pills {
				flex-wrap: nowrap !important;
				overflow-x: auto !important;
				-webkit-overflow-scrolling: touch !important;
				scrollbar-width: none !important;
				padding-bottom: 8px !important;
				margin-bottom: 12px !important;
			}
			.bopt-filter-pills::-webkit-scrollbar {
				display: none !important;
			}
			.bopt-filter-pill {
				flex-shrink: 0 !important;
				white-space: nowrap !important;
			}
			.mp-report-toolbar {
				padding: 14px !important;
				gap: 12px !important;
				flex-direction: column !important;
				align-items: stretch !important;
			}
			.mp-report-toolbar h3 {
				font-size: 15px !important;
				line-height: 1.3 !important;
			}
			.mp-report-toolbar p {
				font-size: 11.5px !important;
			}
			.mp-report-actions-wrap {
				display: flex !important;
				flex-direction: column !important;
				gap: 10px !important;
				width: 100% !important;
			}
			.mp-report-date-pills {
				display: flex !important;
				flex-wrap: nowrap !important;
				overflow-x: auto !important;
				-webkit-overflow-scrolling: touch !important;
				scrollbar-width: none !important;
				gap: 6px !important;
				padding-bottom: 4px !important;
				width: 100% !important;
			}
			.mp-report-date-pills::-webkit-scrollbar {
				display: none !important;
			}
			.mp-report-date-pills .bopt-filter-pill {
				flex-shrink: 0 !important;
				white-space: nowrap !important;
				padding: 6px 12px !important;
				font-size: 11.5px !important;
			}
			.mp-report-btn-row {
				display: grid !important;
				grid-template-columns: 1fr 1fr !important;
				gap: 8px !important;
				width: 100% !important;
			}
			.mp-report-btn-row .bopt-btn-secondary {
				width: 100% !important;
				justify-content: center !important;
				min-height: 42px !important;
				font-size: 12px !important;
				padding: 8px 10px !important;
			}
			/* 2-Column Bento Grid for Mobile */
			.mp-report-kpi-grid {
				grid-template-columns: repeat(2, 1fr) !important;
				gap: 10px !important;
				margin-bottom: 16px !important;
			}
			.mp-report-kpi-card {
				padding: 12px 12px !important;
				border-radius: 12px !important;
			}
			.mp-report-kpi-title {
				font-size: 9.5px !important;
				letter-spacing: 0.2px !important;
				line-height: 1.2 !important;
			}
			.mp-report-kpi-icon {
				font-size: 15px !important;
			}
			.mp-report-kpi-val {
				font-size: clamp(15px, 4.5vw, 19px) !important;
				margin-bottom: 2px !important;
			}
			.mp-report-kpi-sub {
				font-size: 10px !important;
				line-height: 1.2 !important;
			}
			.mp-report-card {
				padding: 14px !important;
				border-radius: 12px !important;
			}
			.mp-report-card-title {
				font-size: 13.5px !important;
				margin-bottom: 12px !important;
				flex-wrap: wrap !important;
				gap: 6px !important;
			}
			.mp-brand-bar-head {
				font-size: 12px !important;
				gap: 8px !important;
			}
			/* Mobile input auto-zoom prevention */
			.mp-search-input-wrap input,
			.mp-filter-select,
			.mp-admin-field input,
			.mp-admin-field select,
			.mp-admin-field textarea,
			.mp-inline-status-select {
				font-size: 16px !important;
			}
		}
		@media screen and (max-width: 400px) {
			.mp-report-kpi-grid {
				grid-template-columns: 1fr 1fr !important;
				gap: 8px !important;
			}
			.mp-report-kpi-card {
				padding: 10px 8px !important;
			}
			.mp-report-kpi-val {
				font-size: 15px !important;
			}
			.mp-report-btn-row {
				grid-template-columns: 1fr 1fr !important;
			}
		}

		/* Modal Full Bottom-Sheet on Mobile (< 782px) */
		.mp-admin-modal-backdrop {
			position: fixed;
			inset: 0;
			background: rgba(15, 23, 42, 0.65);
			backdrop-filter: blur(3px);
			z-index: 99999;
			display: none;
			align-items: center;
			justify-content: center;
			padding: 20px;
		}
		.mp-admin-modal-backdrop.open {
			display: flex;
		}
		.mp-admin-modal-box {
			background: #ffffff;
			width: 100%;
			max-width: 820px;
			max-height: 90vh;
			overflow-y: auto;
			border-radius: 18px;
			border: 1px solid #cbd5e1;
			box-shadow: 0 25px 50px rgba(15, 23, 42, 0.25);
			padding: 26px 28px;
		}
		.mp-admin-form-grid {
			display: grid;
			grid-template-columns: repeat(auto-fit, minmax(195px, 1fr));
			gap: 14px;
			margin-bottom: 14px;
		}
		.mp-admin-field label {
			display: block;
			font-size: 11.5px;
			font-weight: 800;
			text-transform: uppercase;
			letter-spacing: 0.04em;
			color: var(--mp-admin-slate);
			margin-bottom: 5px;
		}
		.mp-admin-field input,
		.mp-admin-field select,
		.mp-admin-field textarea {
			width: 100%;
			padding: 8px 11px;
			border: 1px solid #cbd5e1;
			border-radius: 8px;
			font-size: 13px;
			color: var(--mp-admin-dark);
			background: #f8fafc;
		}
		.mp-admin-field input:focus,
		.mp-admin-field select:focus,
		.mp-admin-field textarea:focus {
			border-color: var(--mp-admin-blue);
			background: #ffffff;
			outline: none;
			box-shadow: 0 0 0 3px rgba(0, 102, 204, 0.12);
		}
		.mp-inline-status-select {
			padding: 6px 10px;
			border-radius: 8px;
			border: 1px solid #cbd5e1;
			font-size: 12px;
			font-weight: 700;
			background: #f8fafc;
			color: var(--mp-admin-dark);
			cursor: pointer;
		}

		@media screen and (max-width: 782px) {
			.mp-admin-modal-backdrop {
				padding: 0 !important;
				align-items: flex-end !important;
			}
			.mp-admin-modal-box {
				width: 100% !important;
				max-width: 100% !important;
				max-height: 94vh !important;
				border-radius: 20px 20px 0 0 !important;
				padding: 18px 16px 20px !important;
			}
			.mp-admin-form-grid {
				grid-template-columns: 1fr !important;
			}
			.mp-modal-sticky-footer {
				position: sticky;
				bottom: -20px;
				background: #ffffff;
				padding: 12px 0 0;
				border-top: 1px solid #e2e8f0;
				z-index: 10;
			}
		}

		/* Print Styling for Executive Report */
		@media print {
			#wpadminbar, #adminmenumain, .bopt-topbar, .mp-crm-tabs, .mp-report-toolbar, .bopt-filter-bar, .mp-pagination-bar {
				display: none !important;
			}
			body, #wpbody-content, .bopt-app-wrap, .bopt-inquiries-container {
				background: #ffffff !important;
				padding: 0 !important;
				margin: 0 !important;
				width: 100% !important;
			}
			.mp-report-kpi-card, .mp-report-card {
				box-shadow: none !important;
				border: 1px solid #cbd5e1 !important;
				break-inside: avoid;
			}
		}
	</style>

	<div class="bopt-app-wrap">
		<!-- Sticky Top Bar -->
		<header class="bopt-topbar">
			<div class="bopt-topbar-left">
				<div class="bopt-brand">
					<div class="bopt-brand-icon"><i class="fa-solid fa-screwdriver-wrench"></i></div>
					<div class="bopt-brand-info">
						<span class="bopt-brand-title"><?php echo esc_html( mp_opt( 'site_brand_name', 'Ali Mobile Center & Apple Fix' ) ); ?></span>
						<span class="bopt-brand-badge"><?php esc_html_e( 'Repair Orders, Inquiries & Revenue Analytics Suite', 'mobile-pasal' ); ?></span>
					</div>
				</div>
			</div>

			<div class="bopt-topbar-right">
				<button type="button" class="bopt-save-btn" onclick="mpOpenCreateForm('walkin_docket');" style="padding: 8px 14px; font-size: 13px;">
					<i class="fa-solid fa-plus"></i>
					<span class="bopt-btn-text-full"><?php esc_html_e( '+ New Repair Docket', 'mobile-pasal' ); ?></span>
					<span class="bopt-btn-text-short"><?php esc_html_e( '+ Docket', 'mobile-pasal' ); ?></span>
				</button>
				<button type="button" class="bopt-messages-btn" onclick="mpOpenCreateForm('general_inquiry');">
					<i class="fa-solid fa-comment-dots"></i>
					<span class="bopt-btn-text-full"><?php esc_html_e( '+ Log General Inquiry', 'mobile-pasal' ); ?></span>
					<span class="bopt-btn-text-short"><?php esc_html_e( '+ Inquiry', 'mobile-pasal' ); ?></span>
				</button>
				<a href="<?php echo esc_url( admin_url( 'admin.php?page=mp-inquiries&tab=reports' ) ); ?>" class="bopt-messages-btn bopt-desk-only <?php echo 'reports' === $active_tab ? 'is-active' : ''; ?>">
					<i class="fa-solid fa-chart-line" style="color:#0284c7;"></i>
					<span class="bopt-btn-text"><?php esc_html_e( 'Repair Report', 'mobile-pasal' ); ?></span>
				</a>
				<a href="<?php echo esc_url( wp_nonce_url( admin_url( 'admin-post.php?action=mp_export_inquiries_csv&tab=' . $active_tab ), 'mp_export_inquiries_csv' ) ); ?>" class="bopt-messages-btn bopt-desk-only" title="<?php esc_attr_e( 'Export current view to CSV', 'mobile-pasal' ); ?>">
					<i class="fa-solid fa-file-csv"></i>
					<span class="bopt-btn-text"><?php esc_html_e( 'Export CSV', 'mobile-pasal' ); ?></span>
				</a>
				<a href="<?php echo esc_url( admin_url( 'admin.php?page=mp-bulk-price-editor' ) ); ?>" class="bopt-messages-btn bopt-desk-only">
					<i class="fa-solid fa-tags"></i>
					<span class="bopt-btn-text"><?php esc_html_e( 'Bulk Prices', 'mobile-pasal' ); ?></span>
				</a>
				<a href="<?php echo esc_url( admin_url( 'admin.php?page=mobile-pasal-options' ) ); ?>" class="bopt-messages-btn" title="<?php esc_attr_e( 'Theme Options', 'mobile-pasal' ); ?>">
					<i class="fa-solid fa-sliders"></i>
					<span class="bopt-btn-text bopt-desk-only"><?php esc_html_e( 'Theme Options', 'mobile-pasal' ); ?></span>
				</a>
			</div>
		</header>

		<div class="bopt-inquiries-container">
			<?php if ( ! empty( $notice ) ) : ?>
				<div class="bopt-save-alert" style="margin-bottom: 18px; display: inline-flex;">
					<i class="fa-solid fa-circle-check"></i>
					<span><?php echo esc_html( $notice ); ?></span>
				</div>
			<?php endif; ?>

			<!-- 4 CRM Workspace Tabs (Repairs, General Inquiries, Reports, All Orders & Inquiries) -->
			<div class="mp-crm-tabs">
				<a href="<?php echo esc_url( admin_url( 'admin.php?page=mp-inquiries&tab=repairs' ) ); ?>" class="mp-crm-tab-card <?php echo 'repairs' === $active_tab ? 'is-active' : ''; ?>">
					<div class="mp-crm-tab-left">
						<div class="mp-crm-tab-icon"><i class="fa-solid fa-screwdriver-wrench"></i></div>
						<div>
							<span class="mp-crm-tab-title"><?php esc_html_e( 'Repair Orders', 'mobile-pasal' ); ?></span>
							<span class="mp-crm-tab-sub"><?php printf( esc_html__( '%1$d New • %2$d In Progress • %3$d Done', 'mobile-pasal' ), $repairs_pending, $repairs_bench, $repairs_ready ); ?></span>
						</div>
					</div>
					<span class="mp-crm-tab-count"><?php echo esc_html( $repairs_total ); ?></span>
				</a>

				<a href="<?php echo esc_url( admin_url( 'admin.php?page=mp-inquiries&tab=general' ) ); ?>" class="mp-crm-tab-card <?php echo 'general' === $active_tab ? 'is-active' : ''; ?>">
					<div class="mp-crm-tab-left">
						<div class="mp-crm-tab-icon"><i class="fa-solid fa-envelope-open-text"></i></div>
						<div>
							<span class="mp-crm-tab-title"><?php esc_html_e( 'General Inquiries', 'mobile-pasal' ); ?></span>
							<span class="mp-crm-tab-sub"><?php printf( esc_html__( '%d Unread / Follow-Up', 'mobile-pasal' ), $general_pending ); ?></span>
						</div>
					</div>
					<span class="mp-crm-tab-count"><?php echo esc_html( $general_total ); ?></span>
				</a>

				<a href="<?php echo esc_url( admin_url( 'admin.php?page=mp-inquiries&tab=reports' ) ); ?>" class="mp-crm-tab-card <?php echo 'reports' === $active_tab ? 'is-active' : ''; ?>">
					<div class="mp-crm-tab-left">
						<div class="mp-crm-tab-icon"><i class="fa-solid fa-chart-pie"></i></div>
						<div>
							<span class="mp-crm-tab-title"><?php esc_html_e( 'Repair Reports', 'mobile-pasal' ); ?></span>
							<span class="mp-crm-tab-sub"><?php esc_html_e( 'Sales, Cash & Stats', 'mobile-pasal' ); ?></span>
						</div>
					</div>
					<span class="mp-crm-tab-count" style="background:#0284c7; color:#fff; border-color:#0284c7;"><i class="fa-solid fa-arrow-trend-up"></i></span>
				</a>

				<a href="<?php echo esc_url( admin_url( 'admin.php?page=mp-inquiries&tab=all' ) ); ?>" class="mp-crm-tab-card <?php echo 'all' === $active_tab ? 'is-active' : ''; ?>">
					<div class="mp-crm-tab-left">
						<div class="mp-crm-tab-icon"><i class="fa-solid fa-layer-group"></i></div>
						<div>
							<span class="mp-crm-tab-title"><?php esc_html_e( 'All Orders & Inquiries', 'mobile-pasal' ); ?></span>
							<span class="mp-crm-tab-sub"><?php esc_html_e( 'Repairs & general messages', 'mobile-pasal' ); ?></span>
						</div>
					</div>
					<span class="mp-crm-tab-count"><?php echo esc_html( $all_total ); ?></span>
				</a>
			</div>

			<!-- Expandable Create New Repair Docket / General Inquiry Card -->
			<div id="mpWalkinFormCard" style="display:none; background:#ffffff; border:2px solid #0066cc; border-radius:16px; padding:22px 24px; margin-bottom:22px; box-shadow:0 12px 28px rgba(0,102,204,0.1);">
				<div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:16px; border-bottom:1px solid #e2e8f0; padding-bottom:10px;">
					<h3 id="mpCreateCardHeading" style="margin:0; font-size:16px; color:#0f172a;">
						<i class="fa-solid fa-screwdriver-wrench" style="color:#0066cc; margin-right:6px;"></i>
						<span><?php esc_html_e( 'Register New Counter Repair Docket / Customer Inquiry', 'mobile-pasal' ); ?></span>
					</h3>
					<button type="button" onclick="document.getElementById('mpWalkinFormCard').style.display='none';" style="background:none;border:none;font-size:22px;cursor:pointer;color:#64748b;">&times;</button>
				</div>
				<form method="post" action="">
					<?php wp_nonce_field( 'mp_create_record_action', 'mp_create_record_nonce' ); ?>
					<div class="mp-admin-form-grid">
						<div class="mp-admin-field">
							<label><?php esc_html_e( 'Record Category', 'mobile-pasal' ); ?></label>
							<select name="w_type" id="mpCreateTypeSelect">
								<option value="walkin_docket"><?php esc_html_e( 'Repair Order (AF-...)', 'mobile-pasal' ); ?></option>
								<option value="general_inquiry"><?php esc_html_e( 'General Inquiry (INQ-...)', 'mobile-pasal' ); ?></option>
							</select>
						</div>
						<div class="mp-admin-field">
							<label><?php esc_html_e( 'Customer Name *', 'mobile-pasal' ); ?></label>
							<input type="text" name="w_name" required placeholder="e.g. Suman Tharu">
						</div>
						<div class="mp-admin-field">
							<label><?php esc_html_e( 'Phone / WhatsApp *', 'mobile-pasal' ); ?></label>
							<input type="text" name="w_phone" required placeholder="98XXXXXXXX">
						</div>
						<div class="mp-admin-field">
							<label><?php esc_html_e( 'Customer Email', 'mobile-pasal' ); ?></label>
							<input type="email" name="w_email" placeholder="customer@email.com">
						</div>
						<div class="mp-admin-field">
							<label><?php esc_html_e( 'Device Brand', 'mobile-pasal' ); ?></label>
							<input type="text" name="w_brand" placeholder="Apple / Samsung / Xiaomi">
						</div>
						<div class="mp-admin-field">
							<label><?php esc_html_e( 'Device Model *', 'mobile-pasal' ); ?></label>
							<input type="text" name="w_model" required placeholder="e.g. iPhone 15 Pro Max">
						</div>
						<div class="mp-admin-field">
							<label><?php esc_html_e( 'IMEI / Serial No.', 'mobile-pasal' ); ?></label>
							<input type="text" name="w_imei" placeholder="35XXXXXXXXXXXXX">
						</div>
						<div class="mp-admin-field">
							<label><?php esc_html_e( 'Accessories Received', 'mobile-pasal' ); ?></label>
							<input type="text" name="w_accessories" value="Device Only" placeholder="Device Only, SIM Tray, Cover">
						</div>
						<div class="mp-admin-field">
							<label><?php esc_html_e( 'Service / Subject *', 'mobile-pasal' ); ?></label>
							<input type="text" name="w_service" required placeholder="e.g. Original OLED Screen Swap">
						</div>
						<div class="mp-admin-field">
							<label><?php esc_html_e( 'Repair / Quote Cost (NPR)', 'mobile-pasal' ); ?></label>
							<input type="text" name="w_cost" placeholder="e.g. 8500">
						</div>
						<div class="mp-admin-field">
							<label><?php esc_html_e( 'Advance Paid (NPR)', 'mobile-pasal' ); ?></label>
							<input type="text" name="w_advance" value="0" placeholder="e.g. 2000">
						</div>
						<div class="mp-admin-field">
							<label><?php esc_html_e( 'Payment Status', 'mobile-pasal' ); ?></label>
							<select name="w_payment_status">
								<option value="unpaid"><?php esc_html_e( 'Unpaid', 'mobile-pasal' ); ?></option>
								<option value="partial"><?php esc_html_e( 'Advance / Partial Paid', 'mobile-pasal' ); ?></option>
								<option value="paid"><?php esc_html_e( 'Paid in Full', 'mobile-pasal' ); ?></option>
							</select>
						</div>
						<div class="mp-admin-field">
							<label><?php esc_html_e( 'Payment Method', 'mobile-pasal' ); ?></label>
							<select name="w_payment_method">
								<option value="Cash"><?php esc_html_e( 'Cash at Counter', 'mobile-pasal' ); ?></option>
								<option value="Fonepay QR"><?php esc_html_e( 'Fonepay QR', 'mobile-pasal' ); ?></option>
								<option value="eSewa / Khalti"><?php esc_html_e( 'eSewa / Khalti', 'mobile-pasal' ); ?></option>
								<option value="Bank Transfer"><?php esc_html_e( 'Bank Transfer', 'mobile-pasal' ); ?></option>
							</select>
						</div>
						<div class="mp-admin-field">
							<label><?php esc_html_e( 'Assigned Technician', 'mobile-pasal' ); ?></label>
							<input type="text" name="w_technician" placeholder="e.g. Master Tech Ali">
						</div>
						<div class="mp-admin-field">
							<label><?php esc_html_e( 'Estimated Delivery', 'mobile-pasal' ); ?></label>
							<input type="text" name="w_delivery" value="Same-Day (45 Mins)" placeholder="e.g. Today 5:00 PM">
						</div>
						<div class="mp-admin-field">
							<label><?php esc_html_e( 'Warranty Coverage', 'mobile-pasal' ); ?></label>
							<select name="w_warranty">
								<option value="90"><?php esc_html_e( '90 Days Lab Warranty', 'mobile-pasal' ); ?></option>
								<option value="180"><?php esc_html_e( '180 Days (6 Months)', 'mobile-pasal' ); ?></option>
								<option value="365"><?php esc_html_e( '365 Days (1 Year)', 'mobile-pasal' ); ?></option>
								<option value="30"><?php esc_html_e( '30 Days Testing Warranty', 'mobile-pasal' ); ?></option>
								<option value="0"><?php esc_html_e( 'No Warranty / Inspection', 'mobile-pasal' ); ?></option>
							</select>
						</div>
						<div class="mp-admin-field">
							<label><?php esc_html_e( 'Initial Status', 'mobile-pasal' ); ?></label>
							<select name="w_status">
								<option value="in_progress"><?php esc_html_e( 'In Progress (On Bench)', 'mobile-pasal' ); ?></option>
								<option value="pending"><?php esc_html_e( 'Checked In / Pending', 'mobile-pasal' ); ?></option>
								<option value="diagnosing"><?php esc_html_e( 'Diagnosing', 'mobile-pasal' ); ?></option>
								<option value="ready"><?php esc_html_e( 'Ready for Pickup', 'mobile-pasal' ); ?></option>
								<option value="completed"><?php esc_html_e( 'Completed / Delivered', 'mobile-pasal' ); ?></option>
							</select>
						</div>
					</div>
					<div class="mp-admin-form-grid" style="grid-template-columns: 1fr 1fr;">
						<div class="mp-admin-field">
							<label><?php esc_html_e( 'Customer Reported Symptoms / Inquiry Message', 'mobile-pasal' ); ?></label>
							<textarea name="w_message" rows="2" placeholder="Customer's description of fault or inquiry..."></textarea>
						</div>
						<div class="mp-admin-field">
							<label><?php esc_html_e( 'Technician Diagnostic Note (Printed on PDF & Live Tracker)', 'mobile-pasal' ); ?></label>
							<textarea name="w_notes" rows="2" placeholder="Technician findings, parts replaced, or official quote note..."></textarea>
						</div>
					</div>
					<div style="display:flex; justify-content:flex-end; gap:10px; margin-top:8px;">
						<button type="button" class="bopt-btn-secondary" onclick="document.getElementById('mpWalkinFormCard').style.display='none';"><?php esc_html_e( 'Cancel', 'mobile-pasal' ); ?></button>
						<button type="submit" name="mp_create_record_submit" value="1" class="bopt-save-btn" style="padding:10px 22px;">
							<i class="fa-solid fa-check"></i> <?php esc_html_e( 'Save Record & Generate Docket', 'mobile-pasal' ); ?>
						</button>
					</div>
				</form>
			</div>

			<?php if ( 'reports' === $active_tab ) : ?>
				<!-- ========================================================= -->
				<!-- REPAIR REPORTS & REVENUE ANALYTICS VIEW                   -->
				<!-- ========================================================= -->
				<div class="mp-report-toolbar">
					<div>
						<h3 style="margin:0 0 4px; font-size:18px; font-weight:900; color:#0f172a;">
							<i class="fa-solid fa-chart-line" style="color:#0066cc; margin-right:6px;"></i>
							<?php esc_html_e( 'Repair Performance & Sales Summary', 'mobile-pasal' ); ?>
						</h3>
						<p style="margin:0; font-size:12px; color:#475569;">
							<?php esc_html_e( 'Sales totals, cash collected, phone brands repaired, and payment methods.', 'mobile-pasal' ); ?>
						</p>
					</div>

					<div class="mp-report-actions-wrap" style="display:flex; align-items:center; gap:10px; flex-wrap:wrap;">
						<div class="mp-report-date-pills">
							<?php
							$date_options = array(
								'today'      => __( 'Today', 'mobile-pasal' ),
								'this_week'  => __( 'This Week', 'mobile-pasal' ),
								'this_month' => __( 'This Month', 'mobile-pasal' ),
								'last_month' => __( 'Last Month', 'mobile-pasal' ),
								'this_year'  => __( 'This Year', 'mobile-pasal' ),
								'all'        => __( 'All Time', 'mobile-pasal' ),
							);
							$rep_base_url = admin_url( 'admin.php?page=mp-inquiries&tab=reports' );
							foreach ( $date_options as $d_k => $d_lbl ) :
								$d_url = add_query_arg( 'date_filter', $d_k, $rep_base_url );
								?>
								<a href="<?php echo esc_url( $d_url ); ?>" class="bopt-filter-pill <?php echo $current_date === $d_k ? 'is-active' : ''; ?>">
									<span><?php echo esc_html( $d_lbl ); ?></span>
								</a>
							<?php endforeach; ?>
						</div>

						<div class="mp-report-btn-row">
							<button type="button" onclick="window.print();" class="bopt-btn-secondary">
								<i class="fa-solid fa-print"></i> <span><?php esc_html_e( 'Print Report', 'mobile-pasal' ); ?></span>
							</button>
						<a href="<?php echo esc_url( wp_nonce_url( admin_url( 'admin-post.php?action=mp_export_inquiries_csv&tab=repairs' ), 'mp_export_inquiries_csv' ) ); ?>" class="bopt-btn-secondary">
							<i class="fa-solid fa-file-csv" style="color:var(--mp-admin-green);"></i> <span><?php esc_html_e( 'Export Data', 'mobile-pasal' ); ?></span>
						</a>
						</div>
					</div>
				</div>

				<!-- Executive KPI Bento Grid -->
				<div class="mp-report-kpi-grid">
					<div class="mp-report-kpi-card blue">
						<div class="mp-report-kpi-header">
							<span class="mp-report-kpi-title"><?php esc_html_e( 'Total Repair Sales', 'mobile-pasal' ); ?></span>
							<i class="fa-solid fa-sack-dollar mp-report-kpi-icon"></i>
						</div>
						<div class="mp-report-kpi-val"><?php echo esc_html( $currency . ' ' . number_format( $rep_kpi_rev, 2 ) ); ?></div>
						<div class="mp-report-kpi-sub">
							<span><?php printf( esc_html__( 'Avg %1$s %2$s / repair', 'mobile-pasal' ), $currency, number_format( $rep_avg_cost, 0 ) ); ?></span>
						</div>
					</div>

					<div class="mp-report-kpi-card green">
						<div class="mp-report-kpi-header">
							<span class="mp-report-kpi-title"><?php esc_html_e( 'Cash Collected', 'mobile-pasal' ); ?></span>
							<i class="fa-solid fa-circle-check mp-report-kpi-icon" style="color:#16a34a;"></i>
						</div>
						<div class="mp-report-kpi-val" style="color:#16a34a;"><?php echo esc_html( $currency . ' ' . number_format( $rep_kpi_adv, 2 ) ); ?></div>
						<div class="mp-report-kpi-sub">
							<span><?php printf( esc_html__( '%d%% Collected', 'mobile-pasal' ), $rep_kpi_rev > 0 ? round( ( $rep_kpi_adv / $rep_kpi_rev ) * 100 ) : 0 ); ?></span>
						</div>
					</div>

					<div class="mp-report-kpi-card amber">
						<div class="mp-report-kpi-header">
							<span class="mp-report-kpi-title"><?php esc_html_e( 'Balance Due', 'mobile-pasal' ); ?></span>
							<i class="fa-solid fa-hourglass-half mp-report-kpi-icon" style="color:#d97706;"></i>
						</div>
						<div class="mp-report-kpi-val" style="color:#d97706;"><?php echo esc_html( $currency . ' ' . number_format( $rep_kpi_bal, 2 ) ); ?></div>
						<div class="mp-report-kpi-sub">
							<span><?php esc_html_e( 'Uncollected balance due', 'mobile-pasal' ); ?></span>
						</div>
					</div>

					<div class="mp-report-kpi-card purple">
						<div class="mp-report-kpi-header">
							<span class="mp-report-kpi-title"><?php esc_html_e( 'Total Repairs Booked', 'mobile-pasal' ); ?></span>
							<i class="fa-solid fa-mobile-screen mp-report-kpi-icon" style="color:#7c3aed;"></i>
						</div>
						<div class="mp-report-kpi-val"><?php echo esc_html( number_format( $rep_total_dockets ) ); ?></div>
						<div class="mp-report-kpi-sub">
							<span><?php printf( esc_html__( '%d Completed • %d In Progress', 'mobile-pasal' ), $rep_completed_cnt, $rep_bench_cnt ); ?></span>
						</div>
					</div>

					<div class="mp-report-kpi-card teal">
						<div class="mp-report-kpi-header">
							<span class="mp-report-kpi-title"><?php esc_html_e( 'Completion Rate', 'mobile-pasal' ); ?></span>
							<i class="fa-solid fa-shield-halved mp-report-kpi-icon" style="color:#0d9488;"></i>
						</div>
						<div class="mp-report-kpi-val" style="color:#0d9488;"><?php echo esc_html( $rep_success_rate . '%' ); ?></div>
						<div class="mp-report-kpi-sub">
							<span><?php printf( esc_html__( '%d Fixed & Delivered', 'mobile-pasal' ), $rep_completed_cnt ); ?></span>
						</div>
					</div>

					<div class="mp-report-kpi-card red">
						<div class="mp-report-kpi-header">
							<span class="mp-report-kpi-title"><?php esc_html_e( 'Repairs In Progress', 'mobile-pasal' ); ?></span>
							<i class="fa-solid fa-microchip mp-report-kpi-icon" style="color:#dc2626;"></i>
						</div>
						<div class="mp-report-kpi-val" style="color:#dc2626;"><?php echo esc_html( number_format( $rep_bench_cnt ) ); ?></div>
						<div class="mp-report-kpi-sub">
							<span><?php esc_html_e( 'Under inspection & repair', 'mobile-pasal' ); ?></span>
						</div>
					</div>
				</div>

				<!-- 2-Column Analytics: Brand Distribution & Common Services -->
				<div class="mp-report-grid-2">
					<!-- Brand Share -->
					<div class="mp-report-card">
						<h4 class="mp-report-card-title">
							<span><i class="fa-solid fa-brands fa-apple" style="color:#0066cc; margin-right:6px;"></i> <?php esc_html_e( 'Phones Repaired by Brand', 'mobile-pasal' ); ?></span>
							<small style="font-size:12px; color:#475569; font-weight:600;"><?php echo esc_html( count( $rep_brand_stats ) ); ?> <?php esc_html_e( 'Brands Handled', 'mobile-pasal' ); ?></small>
						</h4>
						<?php if ( empty( $rep_brand_stats ) ) : ?>
							<p style="color:#64748b; font-size:13px;"><?php esc_html_e( 'No device repair data recorded in this period.', 'mobile-pasal' ); ?></p>
						<?php else : ?>
							<?php
							$top_brands = array_slice( $rep_brand_stats, 0, 6, true );
							foreach ( $top_brands as $b_name => $b_data ) :
								$b_pct = $rep_total_dockets > 0 ? round( ( $b_data['count'] / $rep_total_dockets ) * 100, 1 ) : 0;
								?>
								<div class="mp-brand-bar-item">
									<div class="mp-brand-bar-head">
										<span style="min-width:0; flex:1 1 auto; white-space:nowrap; overflow:hidden; text-overflow:ellipsis;"><?php echo esc_html( $b_name ); ?> <small style="color:#64748b; font-weight:normal;">(<?php echo esc_html( $b_data['count'] ); ?> units)</small></span>
										<span style="flex-shrink:0; margin-left:8px;"><?php echo esc_html( $b_pct . '%' ); ?> &bull; <?php echo esc_html( $currency . ' ' . number_format( $b_data['rev'] ) ); ?></span>
									</div>
									<div class="mp-progress-track">
										<div class="mp-progress-fill" style="width: <?php echo esc_attr( $b_pct ); ?>%;"></div>
									</div>
								</div>
							<?php endforeach; ?>
						<?php endif; ?>
					</div>

					<!-- Most Common Repair Categories -->
					<div class="mp-report-card">
						<h4 class="mp-report-card-title">
							<span><i class="fa-solid fa-screwdriver-wrench" style="color:#16a34a; margin-right:6px;"></i> <?php esc_html_e( 'Top Repair Services', 'mobile-pasal' ); ?></span>
							<small style="font-size:12px; color:#475569; font-weight:600;"><?php echo esc_html( count( $rep_service_stats ) ); ?> <?php esc_html_e( 'Categories', 'mobile-pasal' ); ?></small>
						</h4>
						<?php if ( empty( $rep_service_stats ) ) : ?>
							<p style="color:#64748b; font-size:13px;"><?php esc_html_e( 'No service repairs recorded in this period.', 'mobile-pasal' ); ?></p>
						<?php else : ?>
							<?php
							$top_services = array_slice( $rep_service_stats, 0, 6, true );
							foreach ( $top_services as $s_name => $s_data ) :
								$s_pct = $rep_total_dockets > 0 ? round( ( $s_data['count'] / $rep_total_dockets ) * 100, 1 ) : 0;
								?>
								<div class="mp-brand-bar-item">
									<div class="mp-brand-bar-head">
										<span style="min-width:0; flex:1 1 auto; white-space:nowrap; overflow:hidden; text-overflow:ellipsis;"><?php echo esc_html( $s_name ); ?> <small style="color:#64748b; font-weight:normal;">(<?php echo esc_html( $s_data['count'] ); ?>)</small></span>
										<span style="flex-shrink:0; margin-left:8px;"><?php echo esc_html( $s_pct . '%' ); ?> &bull; <?php echo esc_html( $currency . ' ' . number_format( $s_data['rev'] ) ); ?></span>
									</div>
									<div class="mp-progress-track">
										<div class="mp-progress-fill" style="background:#16a34a; width: <?php echo esc_attr( $s_pct ); ?>%;"></div>
									</div>
								</div>
							<?php endforeach; ?>
						<?php endif; ?>
					</div>
				</div>

				<!-- 2-Column Analytics: Technician Productivity & Payment Settlements -->
				<div class="mp-report-grid-2">
					<!-- Technician Repairs -->
					<div class="mp-report-card">
						<h4 class="mp-report-card-title">
							<span><i class="fa-solid fa-user-gear" style="color:#0284c7; margin-right:6px;"></i> <?php esc_html_e( 'Technician Repairs', 'mobile-pasal' ); ?></span>
						</h4>
						<?php if ( empty( $rep_tech_stats ) ) : ?>
							<p style="color:#64748b; font-size:13px;"><?php esc_html_e( 'No assigned technician data in this period.', 'mobile-pasal' ); ?></p>
						<?php else : ?>
							<div class="mp-table-responsive">
							<table class="mp-tech-table">
								<thead>
									<tr>
										<th><?php esc_html_e( 'Technician', 'mobile-pasal' ); ?></th>
										<th><?php esc_html_e( 'Assigned', 'mobile-pasal' ); ?></th>
										<th><?php esc_html_e( 'Completed', 'mobile-pasal' ); ?></th>
										<th><?php esc_html_e( 'Efficiency', 'mobile-pasal' ); ?></th>
										<th><?php esc_html_e( 'Turnover', 'mobile-pasal' ); ?></th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ( $rep_tech_stats as $t_name => $t_data ) :
										$t_eff = $t_data['assigned'] > 0 ? round( ( $t_data['completed'] / $t_data['assigned'] ) * 100 ) : 0;
										?>
										<tr>
											<td><strong><?php echo esc_html( $t_name ); ?></strong></td>
											<td><?php echo esc_html( $t_data['assigned'] ); ?></td>
											<td style="color:#16a34a; font-weight:700;"><?php echo esc_html( $t_data['completed'] ); ?></td>
											<td>
												<span style="display:inline-block; padding:2px 8px; border-radius:99px; font-size:11px; font-weight:800; background:<?php echo $t_eff >= 75 ? '#dcfce7' : '#fef3c7'; ?>; color:<?php echo $t_eff >= 75 ? '#166534' : '#92400e'; ?>;">
													<?php echo esc_html( $t_eff . '%' ); ?>
												</span>
											</td>
											<td style="font-weight:800; color:#0f172a;"><?php echo esc_html( $currency . ' ' . number_format( $t_data['rev'] ) ); ?></td>
										</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
							</div>
						<?php endif; ?>
					</div>

					<!-- Settlement & Payment Modes -->
					<div class="mp-report-card">
						<h4 class="mp-report-card-title">
							<span><i class="fa-solid fa-credit-card" style="color:#7c3aed; margin-right:6px;"></i> <?php esc_html_e( 'Payment Methods & Collected Cash', 'mobile-pasal' ); ?></span>
						</h4>
						<?php if ( empty( $rep_pay_stats ) ) : ?>
							<p style="color:#64748b; font-size:13px;"><?php esc_html_e( 'No payment settlement transactions recorded.', 'mobile-pasal' ); ?></p>
						<?php else : ?>
							<div class="mp-table-responsive">
							<table class="mp-tech-table">
								<thead>
									<tr>
										<th><?php esc_html_e( 'Payment Mode', 'mobile-pasal' ); ?></th>
										<th><?php esc_html_e( 'Transactions', 'mobile-pasal' ); ?></th>
										<th><?php esc_html_e( 'Share', 'mobile-pasal' ); ?></th>
										<th><?php esc_html_e( 'Settled Value', 'mobile-pasal' ); ?></th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ( $rep_pay_stats as $p_meth => $p_data ) :
										$p_pct = $rep_total_dockets > 0 ? round( ( $p_data['count'] / $rep_total_dockets ) * 100, 1 ) : 0;
										?>
										<tr>
											<td><strong><?php echo esc_html( $p_meth ); ?></strong></td>
											<td><?php echo esc_html( $p_data['count'] ); ?></td>
											<td><?php echo esc_html( $p_pct . '%' ); ?></td>
											<td style="font-weight:800; color:#0f172a;"><?php echo esc_html( $currency . ' ' . number_format( $p_data['rev'] ) ); ?></td>
										</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
							</div>
						<?php endif; ?>
					</div>
				</div>

			<?php else : ?>
				<!-- ========================================================= -->
				<!-- RECORD TABLES VIEW (REPAIRS, GENERAL INQUIRIES, ALL)     -->
				<!-- ========================================================= -->

				<!-- Filter & Search Bar with Live Pagination Support -->
				<div class="bopt-filter-bar">
					<!-- 1. Quick Status Pills -->
					<div class="bopt-filter-pills">
						<?php
						$base_tab_url = admin_url( 'admin.php?page=mp-inquiries&tab=' . $active_tab );
						if ( 'general' === $active_tab ) {
							$status_filters = array(
								'all'       => __( 'All Inquiries', 'mobile-pasal' ),
								'pending'   => __( 'New / Unread', 'mobile-pasal' ),
								'contacted' => __( 'Contacted', 'mobile-pasal' ),
								'quoted'    => __( 'Price Quoted', 'mobile-pasal' ),
								'resolved'  => __( 'Resolved / Closed', 'mobile-pasal' ),
							);
						} else {
							$status_filters = array(
								'all'           => __( 'All Dockets', 'mobile-pasal' ),
								'pending'       => __( 'Pending Check-In', 'mobile-pasal' ),
								'diagnosing'    => __( 'Diagnosing', 'mobile-pasal' ),
								'in_progress'   => __( 'On Bench (In Progress)', 'mobile-pasal' ),
								'waiting_parts' => __( 'Waiting Parts', 'mobile-pasal' ),
								'ready'         => __( 'Ready for Pickup', 'mobile-pasal' ),
								'completed'     => __( 'Completed / Delivered', 'mobile-pasal' ),
							);
						}
						foreach ( $status_filters as $s_key => $s_label ) :
							$pill_url = 'all' === $s_key ? remove_query_arg( array( 'status', 'paged' ), $base_tab_url ) : add_query_arg( array( 'status' => $s_key, 'paged' => 1 ), $base_tab_url );
							?>
							<a href="<?php echo esc_url( $pill_url ); ?>" class="bopt-filter-pill <?php echo $current_status === $s_key ? 'is-active' : ''; ?>">
								<span><?php echo esc_html( $s_label ); ?></span>
							</a>
						<?php endforeach; ?>
					</div>

					<!-- 2. Secondary Filter Controls & Live Search Form -->
					<form method="get" action="" class="mp-filter-controls-row">
						<input type="hidden" name="page" value="mp-inquiries">
						<input type="hidden" name="tab" value="<?php echo esc_attr( $active_tab ); ?>">
						<?php if ( 'all' !== $current_status ) : ?>
							<input type="hidden" name="status" value="<?php echo esc_attr( $current_status ); ?>">
						<?php endif; ?>

						<div class="mp-filter-selects">
							<!-- Payment Status Filter -->
							<select name="payment" class="mp-filter-select" onchange="this.form.submit();">
								<option value="all" <?php selected( $current_pay, 'all' ); ?>><?php esc_html_e( 'All Payments', 'mobile-pasal' ); ?></option>
								<option value="paid" <?php selected( $current_pay, 'paid' ); ?>><?php esc_html_e( 'Paid in Full', 'mobile-pasal' ); ?></option>
								<option value="partial" <?php selected( $current_pay, 'partial' ); ?>><?php esc_html_e( 'Advance / Partial', 'mobile-pasal' ); ?></option>
								<option value="unpaid" <?php selected( $current_pay, 'unpaid' ); ?>><?php esc_html_e( 'Unpaid', 'mobile-pasal' ); ?></option>
							</select>

							<!-- Urgency / Priority Filter -->
							<select name="urgency" class="mp-filter-select" onchange="this.form.submit();">
								<option value="all" <?php selected( $current_urgency, 'all' ); ?>><?php esc_html_e( 'All Priorities', 'mobile-pasal' ); ?></option>
								<option value="Express 45-Min" <?php selected( $current_urgency, 'Express 45-Min' ); ?>><?php esc_html_e( 'Express 45-Min', 'mobile-pasal' ); ?></option>
								<option value="Urgent Same-Day" <?php selected( $current_urgency, 'Urgent Same-Day' ); ?>><?php esc_html_e( 'Urgent Same-Day', 'mobile-pasal' ); ?></option>
								<option value="Normal" <?php selected( $current_urgency, 'Normal' ); ?>><?php esc_html_e( 'Normal Priority', 'mobile-pasal' ); ?></option>
							</select>

							<!-- Date Filter -->
							<select name="date_filter" class="mp-filter-select" onchange="this.form.submit();">
								<option value="all" <?php selected( $current_date, 'all' ); ?>><?php esc_html_e( 'All Dates', 'mobile-pasal' ); ?></option>
								<option value="today" <?php selected( $current_date, 'today' ); ?>><?php esc_html_e( 'Today', 'mobile-pasal' ); ?></option>
								<option value="this_week" <?php selected( $current_date, 'this_week' ); ?>><?php esc_html_e( 'This Week', 'mobile-pasal' ); ?></option>
								<option value="this_month" <?php selected( $current_date, 'this_month' ); ?>><?php esc_html_e( 'This Month', 'mobile-pasal' ); ?></option>
							</select>

							<!-- Sort Dropdown -->
							<select name="sort" class="mp-filter-select" onchange="this.form.submit();">
								<option value="date_desc" <?php selected( $sort_by, 'date_desc' ); ?>><?php esc_html_e( 'Newest First', 'mobile-pasal' ); ?></option>
								<option value="date_asc" <?php selected( $sort_by, 'date_asc' ); ?>><?php esc_html_e( 'Oldest First', 'mobile-pasal' ); ?></option>
								<option value="cost_desc" <?php selected( $sort_by, 'cost_desc' ); ?>><?php esc_html_e( 'Cost: High to Low', 'mobile-pasal' ); ?></option>
								<option value="cost_asc" <?php selected( $sort_by, 'cost_asc' ); ?>><?php esc_html_e( 'Cost: Low to High', 'mobile-pasal' ); ?></option>
								<option value="name_asc" <?php selected( $sort_by, 'name_asc' ); ?>><?php esc_html_e( 'Name: A-Z', 'mobile-pasal' ); ?></option>
							</select>

							<!-- Per Page Dropdown -->
							<select name="per_page" class="mp-filter-select" onchange="this.form.submit();">
								<option value="25" <?php selected( $per_page, 25 ); ?>>25 <?php esc_html_e( '/ page', 'mobile-pasal' ); ?></option>
								<option value="50" <?php selected( $per_page, 50 ); ?>>50 <?php esc_html_e( '/ page', 'mobile-pasal' ); ?></option>
								<option value="100" <?php selected( $per_page, 100 ); ?>>100 <?php esc_html_e( '/ page', 'mobile-pasal' ); ?></option>
							</select>
						</div>

						<!-- Search Input Form -->
						<div class="mp-search-form">
							<div class="mp-search-input-wrap">
								<i class="fa-solid fa-magnifying-glass"></i>
								<input type="text" name="s" id="boptInquiriesSearchInput" value="<?php echo esc_attr( $search_query ); ?>" placeholder="<?php esc_attr_e( 'Search docket, customer, phone, IMEI...', 'mobile-pasal' ); ?>" autocomplete="off">
							</div>
							<button type="submit" class="mp-search-btn"><?php esc_html_e( 'Search', 'mobile-pasal' ); ?></button>
							<?php if ( ! empty( $search_query ) || 'all' !== $current_status || 'all' !== $current_pay || 'all' !== $current_urgency || 'all' !== $current_date || 'date_desc' !== $sort_by ) : ?>
								<a href="<?php echo esc_url( admin_url( 'admin.php?page=mp-inquiries&tab=' . $active_tab ) ); ?>" class="mp-reset-filters-btn" title="<?php esc_attr_e( 'Reset all filters', 'mobile-pasal' ); ?>">
									<i class="fa-solid fa-xmark"></i> <?php esc_html_e( 'Reset', 'mobile-pasal' ); ?>
								</a>
							<?php endif; ?>
						</div>
					</form>
				</div>

				<!-- Top Pagination Bar -->
				<?php if ( $total_items > 0 ) : ?>
					<div class="mp-pagination-bar">
						<div class="mp-pagination-info">
							<?php
							$from_item = $offset + 1;
							$to_item   = min( $total_items, $offset + $per_page );
							printf(
								esc_html__( 'Showing %1$d–%2$d of %3$d records', 'mobile-pasal' ),
								$from_item,
								$to_item,
								$total_items
							);
							?>
						</div>

						<?php if ( $total_pages > 1 ) : ?>
							<div class="mp-pagination-links">
								<?php
								$base_paginate_url = add_query_arg(
									array(
										'page'        => 'mp-inquiries',
										'tab'         => $active_tab,
										'status'      => $current_status,
										'payment'     => $current_pay,
										'urgency'     => $current_urgency,
										'date_filter' => $current_date,
										'sort'        => $sort_by,
										'per_page'    => $per_page,
										's'           => $search_query,
									),
									admin_url( 'admin.php' )
								);

								// Previous button
								if ( $paged > 1 ) {
									echo '<a href="' . esc_url( add_query_arg( 'paged', $paged - 1, $base_paginate_url ) ) . '" class="mp-page-btn">&laquo; ' . esc_html__( 'Prev', 'mobile-pasal' ) . '</a>';
								} else {
									echo '<span class="mp-page-btn disabled">&laquo; ' . esc_html__( 'Prev', 'mobile-pasal' ) . '</span>';
								}

								// Numeric page links with sliding window
								$start_p = max( 1, $paged - 2 );
								$end_p   = min( $total_pages, $paged + 2 );

								if ( $start_p > 1 ) {
									echo '<a href="' . esc_url( add_query_arg( 'paged', 1, $base_paginate_url ) ) . '" class="mp-page-btn">1</a>';
									if ( $start_p > 2 ) {
										echo '<span class="mp-page-btn disabled">&hellip;</span>';
									}
								}

								for ( $i = $start_p; $i <= $end_p; $i++ ) {
									$cls = ( $i === $paged ) ? 'mp-page-btn is-active' : 'mp-page-btn';
									echo '<a href="' . esc_url( add_query_arg( 'paged', $i, $base_paginate_url ) ) . '" class="' . esc_attr( $cls ) . '">' . esc_html( $i ) . '</a>';
								}

								if ( $end_p < $total_pages ) {
									if ( $end_p < $total_pages - 1 ) {
										echo '<span class="mp-page-btn disabled">&hellip;</span>';
									}
									echo '<a href="' . esc_url( add_query_arg( 'paged', $total_pages, $base_paginate_url ) ) . '" class="mp-page-btn">' . esc_html( $total_pages ) . '</a>';
								}

								// Next button
								if ( $paged < $total_pages ) {
									echo '<a href="' . esc_url( add_query_arg( 'paged', $paged + 1, $base_paginate_url ) ) . '" class="mp-page-btn">' . esc_html__( 'Next', 'mobile-pasal' ) . ' &raquo;</a>';
								} else {
									echo '<span class="mp-page-btn disabled">' . esc_html__( 'Next', 'mobile-pasal' ) . ' &raquo;</span>';
								}
								?>
							</div>
						<?php endif; ?>
					</div>
				<?php endif; ?>

				<!-- Main Desktop Records Table -->
				<div class="bopt-table-wrap has-mobile-cards">
					<table class="bopt-table">
						<thead>
							<tr>
								<th style="width: 140px;"><?php esc_html_e( 'Docket / Ref', 'mobile-pasal' ); ?></th>
								<th style="width: 175px;"><?php esc_html_e( 'Customer & Contact', 'mobile-pasal' ); ?></th>
								<th><?php echo esc_html( 'general' === $active_tab ? __( 'Subject, Device & Message', 'mobile-pasal' ) : __( 'Device, Fault & Technician Notes', 'mobile-pasal' ) ); ?></th>
								<th style="width: 145px;"><?php echo esc_html( 'general' === $active_tab ? __( 'Quoted Price', 'mobile-pasal' ) : __( 'Repair Cost & Pay', 'mobile-pasal' ) ); ?></th>
								<th style="width: 165px;"><?php esc_html_e( 'Quick Status', 'mobile-pasal' ); ?></th>
								<th style="width: 245px;"><?php esc_html_e( 'Admin Actions & PDF', 'mobile-pasal' ); ?></th>
							</tr>
						</thead>
						<tbody>
							<?php if ( empty( $items ) ) : ?>
								<tr>
									<td colspan="6" style="text-align: center; padding: 44px; color: #64748b;">
										<i class="fa-regular fa-folder-open" style="font-size: 28px; display: block; margin-bottom: 8px;"></i>
										<?php echo esc_html( 'general' === $active_tab ? __( 'No general inquiries found matching your filters.', 'mobile-pasal' ) : __( 'No repair lab dockets found matching your filters.', 'mobile-pasal' ) ); ?>
									</td>
								</tr>
							<?php else : ?>
								<?php foreach ( $items as $row ) :
									$is_rep      = mp_is_repair_record_type( $row->type );
									$clean_phone = preg_replace( '/[^0-9]/', '', $row->phone );
									if ( 10 === strlen( $clean_phone ) ) {
										$clean_phone = '977' . $clean_phone;
									}
									$docket_num = ! empty( $row->docket_no ) ? $row->docket_no : ( ( $is_rep ? 'AF-' : 'INQ-' ) . $row->id );
									$device_txt = trim( $row->device_brand . ' ' . $row->device_model );
									$cost_val   = isset( $row->repair_cost ) ? trim( (string) $row->repair_cost ) : '';
									$adv_val    = isset( $row->advance_paid ) ? trim( (string) $row->advance_paid ) : '0';
									$pay_stat   = ! empty( $row->payment_status ) ? $row->payment_status : 'unpaid';
									$track_link = home_url( '/services/?docket=' . rawurlencode( $docket_num ) . '#repair-tracker' );

									if ( $is_rep ) {
										$wa_reply_msg = sprintf(
											"Namaste %s! Update from Ali Mobile Center & Apple Fix (Gulariya):\n• Docket No: %s\n• Device: %s\n• Service: %s\n• Current Status: %s%s%s\nTrack live status & warranty: %s",
											$row->customer_name,
											$docket_num,
											$device_txt ?: 'Handset',
											$row->service_needed,
											strtoupper( str_replace( '_', ' ', $row->status ) ),
											! empty( $cost_val ) ? "\n• Repair Cost: {$currency} {$cost_val}" : '',
											! empty( $row->notes ) ? "\n• Technician Note: {$row->notes}" : '',
											$track_link
										);
									} else {
										$wa_reply_msg = sprintf(
											"Namaste %s! Thank you for contacting Ali Mobile Center (Gulariya) regarding %s (%s).%s How can we help you today?",
											$row->customer_name,
											$row->service_needed,
											$docket_num,
											! empty( $cost_val ) ? " Counter Offer Price: {$currency} {$cost_val}." : ''
										);
									}
									$wa_url = 'https://wa.me/' . $clean_phone . '?text=' . rawurlencode( $wa_reply_msg );

									$edit_payload = wp_json_encode( array(
										'id'                   => (int) $row->id,
										'docket_no'            => $docket_num,
										'type'                 => $row->type,
										'status'               => $row->status,
										'customer_name'        => $row->customer_name,
										'phone'                => $row->phone,
										'email'                => $row->email,
										'device_brand'         => $row->device_brand,
										'device_model'         => $row->device_model,
										'imei_serial'          => isset( $row->imei_serial ) ? $row->imei_serial : '',
										'device_passcode'      => isset( $row->device_passcode ) ? $row->device_passcode : '',
										'accessories_received' => isset( $row->accessories_received ) ? $row->accessories_received : 'Device Only',
										'service_needed'       => $row->service_needed,
										'urgency'              => $row->urgency,
										'repair_cost'          => $cost_val,
										'advance_paid'         => $adv_val,
										'payment_status'       => $pay_stat,
										'payment_method'       => isset( $row->payment_method ) ? $row->payment_method : 'Cash',
										'technician_name'      => isset( $row->technician_name ) ? $row->technician_name : '',
										'estimated_delivery'   => isset( $row->estimated_delivery ) ? $row->estimated_delivery : '',
										'warranty_days'        => isset( $row->warranty_days ) ? (int) $row->warranty_days : 90,
										'message'              => $row->message,
										'notes'                => isset( $row->notes ) ? $row->notes : '',
										'internal_notes'       => isset( $row->internal_notes ) ? $row->internal_notes : '',
									) );
									?>
									<tr>
										<td>
											<strong style="font-family: monospace; font-size: 13.5px; color: #0066cc;"><?php echo esc_html( $docket_num ); ?></strong><br>
											<span style="display:inline-block; margin-top:3px; font-size:10.5px; font-weight:700; padding:2px 6px; border-radius:4px; background:<?php echo $is_rep ? '#eff6ff' : '#f5f3ff'; ?>; color:<?php echo $is_rep ? '#1d4ed8' : '#6d28d9'; ?>;">
												<?php echo esc_html( $is_rep ? 'Repair Order' : 'Inquiry' ); ?>
											</span>
											<div style="font-size:11px; color:#64748b; margin-top:4px;"><?php echo esc_html( date_i18n( 'M j, Y g:i A', strtotime( $row->created_at ) ) ); ?></div>
										</td>

										<td>
											<strong style="color: #0f172a; font-size:13.5px;"><?php echo esc_html( $row->customer_name ); ?></strong><br>
											<a href="tel:+<?php echo esc_attr( $clean_phone ); ?>" style="font-weight: 700; color: #0066cc; text-decoration: none; font-size:12.5px;">
												<i class="fa-solid fa-phone" style="font-size: 10px;"></i> <?php echo esc_html( $row->phone ); ?>
											</a>
											<?php if ( ! empty( $row->email ) ) : ?>
												<br><small><a href="mailto:<?php echo esc_attr( $row->email ); ?>" style="color: #64748b;"><?php echo esc_html( $row->email ); ?></a></small>
											<?php endif; ?>
										</td>

										<td>
											<?php if ( ! empty( $device_txt ) ) : ?>
												<strong style="color:#071b3b;"><?php echo esc_html( $device_txt ); ?></strong> &bull;
											<?php endif; ?>
											<span style="font-weight:700; color:#0066cc;"><?php echo esc_html( $row->service_needed ); ?></span>
											<?php if ( ! empty( $row->imei_serial ) ) : ?>
												<span style="font-size:11px; color:#475569; background:#f1f5f9; padding:1px 6px; border-radius:4px; margin-left:4px;">IMEI: <?php echo esc_html( $row->imei_serial ); ?></span>
											<?php endif; ?>
											<?php if ( ! empty( $row->message ) ) : ?>
												<div style="margin-top: 4px; color: #475569; font-size: 12px;">
													<strong>Customer:</strong> <?php echo esc_html( wp_trim_words( $row->message, 16 ) ); ?>
												</div>
											<?php endif; ?>
											<?php if ( ! empty( $row->notes ) ) : ?>
												<div style="margin-top: 4px; color: #1e40af; background:#eff6ff; padding:4px 8px; border-radius:6px; font-size: 11.5px;">
													<strong><i class="fa-solid fa-clipboard-check"></i> Tech Note:</strong> <?php echo esc_html( wp_trim_words( $row->notes, 16 ) ); ?>
												</div>
											<?php endif; ?>
											<?php if ( ! empty( $row->internal_notes ) ) : ?>
												<div style="margin-top: 3px; color: #92400e; font-size: 11px;">
													<i class="fa-solid fa-lock"></i> <em>Staff: <?php echo esc_html( wp_trim_words( $row->internal_notes, 12 ) ); ?></em>
												</div>
											<?php endif; ?>
										</td>

										<td>
											<?php if ( ! empty( $cost_val ) ) : ?>
												<span class="mp-cost-pill"><?php echo esc_html( $currency . ' ' . $cost_val ); ?></span><br>
												<?php if ( (float) $adv_val > 0 && 'paid' !== strtolower( $pay_stat ) ) : ?>
													<small style="color:#475569; font-size:11px;">Adv: <?php echo esc_html( $currency . ' ' . $adv_val ); ?></small><br>
												<?php endif; ?>
												<select class="mp-inline-status-select mp-inline-pay-select" onchange="if(this.value) window.location.href=this.value;" style="margin-top:4px; font-size:11px; padding:2px 6px; height:auto; border-radius:6px; font-weight:700; <?php echo 'paid' === strtolower($pay_stat) ? 'background:#dcfce7;color:#166534;border-color:#bbf7d0;' : ('partial' === strtolower($pay_stat) ? 'background:#fef3c7;color:#92400e;border-color:#fde68a;' : 'background:#fee2e2;color:#991b1b;border-color:#fecaca;'); ?>">
													<option value="<?php echo esc_url( wp_nonce_url( admin_url( 'admin.php?page=mp-inquiries&tab=' . $active_tab . '&pay_action=unpaid&id=' . $row->id ), 'mp_inquiry_action' ) ); ?>" <?php selected( strtolower( $pay_stat ), 'unpaid' ); ?>><?php esc_html_e( 'Unpaid', 'mobile-pasal' ); ?></option>
													<option value="<?php echo esc_url( wp_nonce_url( admin_url( 'admin.php?page=mp-inquiries&tab=' . $active_tab . '&pay_action=partial&id=' . $row->id ), 'mp_inquiry_action' ) ); ?>" <?php selected( strtolower( $pay_stat ), 'partial' ); ?>><?php esc_html_e( 'Advance Paid', 'mobile-pasal' ); ?></option>
													<option value="<?php echo esc_url( wp_nonce_url( admin_url( 'admin.php?page=mp-inquiries&tab=' . $active_tab . '&pay_action=paid&id=' . $row->id ), 'mp_inquiry_action' ) ); ?>" <?php selected( strtolower( $pay_stat ), 'paid' ); ?>><?php esc_html_e( 'Paid in Full', 'mobile-pasal' ); ?></option>
												</select>
											<?php else : ?>
												<button type="button" onclick="mpOpenEditModal(this);" data-record="<?php echo esc_attr( $edit_payload ); ?>" style="background:#f8fafc; border:1px dashed #94a3b8; color:#475569; border-radius:6px; padding:4px 8px; font-size:11.5px; font-weight:700; cursor:pointer;">
													+ Set Cost
												</button>
											<?php endif; ?>
										</td>

										<td>
											<select class="mp-inline-status-select" onchange="if(this.value) window.location.href=this.value;">
												<?php
												$status_options = $is_rep
													? array(
														'pending'       => 'Pending Check-In',
														'diagnosing'    => 'Diagnosing',
														'in_progress'   => 'In Progress (Bench)',
														'waiting_parts' => 'Waiting for Parts',
														'testing'       => 'Testing & QA',
														'ready'         => 'Ready for Pickup',
														'completed'     => 'Completed / Delivered',
														'cancelled'     => 'Cancelled',
													)
													: array(
														'pending'   => 'New / Unread',
														'contacted' => 'Contacted',
														'quoted'    => 'Price Quoted',
														'resolved'  => 'Resolved / Closed',
														'cancelled' => 'Cancelled',
													);
												foreach ( $status_options as $st_k => $st_v ) :
													$st_url = wp_nonce_url( admin_url( 'admin.php?page=mp-inquiries&tab=' . $active_tab . '&action=' . $st_k . '&id=' . $row->id ), 'mp_inquiry_action' );
													?>
													<option value="<?php echo esc_url( $st_url ); ?>" <?php selected( $row->status, $st_k ); ?>>
														<?php echo esc_html( $st_v ); ?>
													</option>
												<?php endforeach; ?>
											</select>
										</td>

										<td>
											<div style="display: flex; gap: 6px; flex-wrap: wrap;">
												<button type="button" class="bopt-btn-call" style="background:#eff6ff; color:#0066cc; border-color:#93c5fd; font-weight:800; cursor:pointer;" onclick="mpOpenEditModal(this);" data-record="<?php echo esc_attr( $edit_payload ); ?>" title="<?php esc_attr_e( 'Edit Status, Repair Cost, Notes, IMEI & Warranty', 'mobile-pasal' ); ?>">
													<i class="fa-solid fa-pen-to-square"></i> Edit
												</button>
												<a href="<?php echo esc_url( wp_nonce_url( admin_url( 'admin-post.php?action=mp_print_docket&id=' . $row->id ), 'mp_print_docket' ) ); ?>" target="_blank" class="bopt-btn-call" style="color: #0f172a; border-color: #cbd5e1;" title="<?php esc_attr_e( 'Print Detailed PDF Job Sheet / Invoice', 'mobile-pasal' ); ?>">
													<i class="fa-solid fa-file-pdf" style="color:#dc2626;"></i> PDF
												</a>
												<a href="<?php echo esc_url( $wa_url ); ?>" target="_blank" class="bopt-btn-wa-reply" title="<?php esc_attr_e( 'Send WhatsApp Update with Status & Cost', 'mobile-pasal' ); ?>">
													<i class="fa-brands fa-whatsapp"></i> WA
												</a>
												<a href="<?php echo esc_url( wp_nonce_url( admin_url( 'admin.php?page=mp-inquiries&tab=' . $active_tab . '&action=delete&id=' . $row->id ), 'mp_inquiry_action' ) ); ?>" class="bopt-btn-call" style="color: #ef4444; border-color: #fecaca;" onclick="return confirm('Delete this record permanently?');" title="<?php esc_attr_e( 'Delete', 'mobile-pasal' ); ?>">
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

				<!-- Mobile Responsive Cards List (100% Touch First for Phones) -->
				<div class="bopt-dockets-mobile-list">
					<?php if ( empty( $items ) ) : ?>
						<div class="bopt-docket-mobile-card" style="text-align: center; color: #64748b; padding: 32px 16px;">
							<i class="fa-regular fa-folder-open" style="font-size: 28px; display: block; margin-bottom: 8px;"></i>
							<?php echo esc_html( 'general' === $active_tab ? __( 'No general inquiries found.', 'mobile-pasal' ) : __( 'No repair lab dockets found.', 'mobile-pasal' ) ); ?>
						</div>
					<?php else : ?>
						<?php foreach ( $items as $row ) :
							$is_rep      = mp_is_repair_record_type( $row->type );
							$clean_phone = preg_replace( '/[^0-9]/', '', $row->phone );
							if ( 10 === strlen( $clean_phone ) ) {
								$clean_phone = '977' . $clean_phone;
							}
							$docket_num = ! empty( $row->docket_no ) ? $row->docket_no : ( ( $is_rep ? 'AF-' : 'INQ-' ) . $row->id );
							$device_txt = trim( $row->device_brand . ' ' . $row->device_model );
							$cost_val   = isset( $row->repair_cost ) ? trim( (string) $row->repair_cost ) : '';
							$adv_val    = isset( $row->advance_paid ) ? trim( (string) $row->advance_paid ) : '0';
							$pay_stat   = ! empty( $row->payment_status ) ? $row->payment_status : 'unpaid';
							$track_link = home_url( '/services/?docket=' . rawurlencode( $docket_num ) . '#repair-tracker' );

							if ( $is_rep ) {
								$wa_reply_msg = sprintf(
									"Namaste %s! Update from Ali Mobile Center & Apple Fix (Gulariya):\n• Docket No: %s\n• Device: %s\n• Service: %s\n• Current Status: %s%s%s\nTrack live status & warranty: %s",
									$row->customer_name,
									$docket_num,
									$device_txt ?: 'Handset',
									$row->service_needed,
									strtoupper( str_replace( '_', ' ', $row->status ) ),
									! empty( $cost_val ) ? "\n• Repair Cost: {$currency} {$cost_val}" : '',
									! empty( $row->notes ) ? "\n• Technician Note: {$row->notes}" : '',
									$track_link
								);
							} else {
								$wa_reply_msg = sprintf(
									"Namaste %s! Thank you for contacting Ali Mobile Center (Gulariya) regarding %s (%s).%s How can we help you today?",
									$row->customer_name,
									$row->service_needed,
									$docket_num,
									! empty( $cost_val ) ? " Counter Offer Price: {$currency} {$cost_val}." : ''
								);
							}
							$wa_url = 'https://wa.me/' . $clean_phone . '?text=' . rawurlencode( $wa_reply_msg );

							$edit_payload = wp_json_encode( array(
								'id'                   => (int) $row->id,
								'docket_no'            => $docket_num,
								'type'                 => $row->type,
								'status'               => $row->status,
								'customer_name'        => $row->customer_name,
								'phone'                => $row->phone,
								'email'                => $row->email,
								'device_brand'         => $row->device_brand,
								'device_model'         => $row->device_model,
								'imei_serial'          => isset( $row->imei_serial ) ? $row->imei_serial : '',
								'device_passcode'      => isset( $row->device_passcode ) ? $row->device_passcode : '',
								'accessories_received' => isset( $row->accessories_received ) ? $row->accessories_received : 'Device Only',
								'service_needed'       => $row->service_needed,
								'urgency'              => $row->urgency,
								'repair_cost'          => $cost_val,
								'advance_paid'         => $adv_val,
								'payment_status'       => $pay_stat,
								'payment_method'       => isset( $row->payment_method ) ? $row->payment_method : 'Cash',
								'technician_name'      => isset( $row->technician_name ) ? $row->technician_name : '',
								'estimated_delivery'   => isset( $row->estimated_delivery ) ? $row->estimated_delivery : '',
								'warranty_days'        => isset( $row->warranty_days ) ? (int) $row->warranty_days : 90,
								'message'              => $row->message,
								'notes'                => isset( $row->notes ) ? $row->notes : '',
								'internal_notes'       => isset( $row->internal_notes ) ? $row->internal_notes : '',
							) );
							?>
							<div class="bopt-docket-mobile-card">
								<div class="bopt-docket-card-top">
									<div>
										<span class="bopt-docket-card-num"><?php echo esc_html( $docket_num ); ?></span>
										<span style="display:inline-block; margin-left:6px; font-size:10.5px; font-weight:700; padding:2px 6px; border-radius:4px; background:<?php echo $is_rep ? '#eff6ff' : '#f5f3ff'; ?>; color:<?php echo $is_rep ? '#1d4ed8' : '#6d28d9'; ?>;">
											<?php echo esc_html( $is_rep ? 'Repair' : 'Inquiry' ); ?>
										</span>
									</div>
									<span style="font-size:11px; color:#64748b;"><?php echo esc_html( date_i18n( 'M j, g:i A', strtotime( $row->created_at ) ) ); ?></span>
								</div>

								<div class="bopt-docket-card-body">
									<h4><?php echo esc_html( $row->customer_name ); ?></h4>
									<div class="bopt-docket-card-detail">
										<span><i class="fa-solid fa-phone" style="font-size:11px;color:#0066cc;"></i> <strong>Phone:</strong> <a href="tel:+<?php echo esc_attr( $clean_phone ); ?>" style="color:#0066cc;font-weight:700;text-decoration:none;"><?php echo esc_html( $row->phone ); ?></a></span>
									</div>
									<?php if ( ! empty( $device_txt ) ) : ?>
										<div class="bopt-docket-card-detail">
											<span><i class="fa-solid fa-mobile-screen" style="font-size:11px;color:#0066cc;"></i> <strong>Device:</strong> <?php echo esc_html( $device_txt ); ?></span>
										</div>
									<?php endif; ?>
									<div class="bopt-docket-card-detail">
										<span><i class="fa-solid fa-wrench" style="font-size:11px;color:#0066cc;"></i> <strong>Service:</strong> <?php echo esc_html( $row->service_needed ); ?></span>
									</div>
									<div class="bopt-docket-card-detail" style="align-items:center; justify-content:space-between; flex-wrap:wrap; gap:6px; margin-top:6px;">
										<div>
											<strong>Cost:</strong> <?php echo esc_html( ! empty( $cost_val ) ? $currency . ' ' . $cost_val : 'Not set' ); ?>
											<?php if ( (float) $adv_val > 0 && 'paid' !== strtolower( $pay_stat ) ) : ?>
												<small style="color:#475569;">(Adv: <?php echo esc_html( $currency . ' ' . $adv_val ); ?>)</small>
											<?php endif; ?>
										</div>
										<select class="mp-inline-status-select mp-inline-pay-select" onchange="if(this.value) window.location.href=this.value;" style="font-size:11.5px; padding:3px 8px; border-radius:6px; font-weight:700; <?php echo 'paid' === strtolower($pay_stat) ? 'background:#dcfce7;color:#166534;border-color:#bbf7d0;' : ('partial' === strtolower($pay_stat) ? 'background:#fef3c7;color:#92400e;border-color:#fde68a;' : 'background:#fee2e2;color:#991b1b;border-color:#fecaca;'); ?>">
											<option value="<?php echo esc_url( wp_nonce_url( admin_url( 'admin.php?page=mp-inquiries&tab=' . $active_tab . '&pay_action=unpaid&id=' . $row->id ), 'mp_inquiry_action' ) ); ?>" <?php selected( strtolower( $pay_stat ), 'unpaid' ); ?>><?php esc_html_e( 'Pay: Unpaid', 'mobile-pasal' ); ?></option>
											<option value="<?php echo esc_url( wp_nonce_url( admin_url( 'admin.php?page=mp-inquiries&tab=' . $active_tab . '&pay_action=partial&id=' . $row->id ), 'mp_inquiry_action' ) ); ?>" <?php selected( strtolower( $pay_stat ), 'partial' ); ?>><?php esc_html_e( 'Pay: Advance Paid', 'mobile-pasal' ); ?></option>
											<option value="<?php echo esc_url( wp_nonce_url( admin_url( 'admin.php?page=mp-inquiries&tab=' . $active_tab . '&pay_action=paid&id=' . $row->id ), 'mp_inquiry_action' ) ); ?>" <?php selected( strtolower( $pay_stat ), 'paid' ); ?>><?php esc_html_e( 'Pay: Paid in Full', 'mobile-pasal' ); ?></option>
										</select>
									</div>
									<div style="margin-top:10px;">
										<select class="mp-inline-status-select" style="width:100%;" onchange="if(this.value) window.location.href=this.value;">
											<?php
											$m_status_options = $is_rep
												? array(
													'pending'       => 'Status: Pending Check-In',
													'diagnosing'    => 'Status: Diagnosing',
													'in_progress'   => 'Status: In Progress (Bench)',
													'waiting_parts' => 'Status: Waiting for Parts',
													'testing'       => 'Status: Testing & QA',
													'ready'         => 'Status: Ready for Pickup',
													'completed'     => 'Status: Completed / Delivered',
													'cancelled'     => 'Status: Cancelled',
												)
												: array(
													'pending'   => 'Status: New / Unread',
													'contacted' => 'Status: Contacted',
													'quoted'    => 'Status: Price Quoted',
													'resolved'  => 'Status: Resolved / Closed',
													'cancelled' => 'Status: Cancelled',
												);
											foreach ( $m_status_options as $st_k => $st_v ) :
												$st_url = wp_nonce_url( admin_url( 'admin.php?page=mp-inquiries&tab=' . $active_tab . '&action=' . $st_k . '&id=' . $row->id ), 'mp_inquiry_action' );
												?>
												<option value="<?php echo esc_url( $st_url ); ?>" <?php selected( $row->status, $st_k ); ?>>
													<?php echo esc_html( $st_v ); ?>
												</option>
											<?php endforeach; ?>
										</select>
									</div>
								</div>

								<div class="bopt-docket-card-actions">
									<a href="tel:+<?php echo esc_attr( $clean_phone ); ?>" class="bopt-btn-call">
										<i class="fa-solid fa-phone"></i> <?php esc_html_e( 'Call', 'mobile-pasal' ); ?>
									</a>
									<a href="<?php echo esc_url( $wa_url ); ?>" target="_blank" class="bopt-btn-wa-reply">
										<i class="fa-brands fa-whatsapp"></i> <?php esc_html_e( 'WhatsApp', 'mobile-pasal' ); ?>
									</a>
									<button type="button" class="bopt-btn-call" style="background:#eff6ff; color:#0066cc; border-color:#93c5fd;" onclick="mpOpenEditModal(this);" data-record="<?php echo esc_attr( $edit_payload ); ?>">
										<i class="fa-solid fa-pen-to-square"></i> <?php esc_html_e( 'Edit / Cost', 'mobile-pasal' ); ?>
									</button>
									<a href="<?php echo esc_url( wp_nonce_url( admin_url( 'admin-post.php?action=mp_print_docket&id=' . $row->id ), 'mp_print_docket' ) ); ?>" target="_blank" class="bopt-btn-call">
										<i class="fa-solid fa-file-pdf" style="color:#dc2626;"></i> <?php esc_html_e( 'PDF Sheet', 'mobile-pasal' ); ?>
									</a>
								</div>
							</div>
						<?php endforeach; ?>
					<?php endif; ?>
				</div>

				<!-- Bottom Pagination Bar -->
				<?php if ( $total_items > 0 && $total_pages > 1 ) : ?>
					<div class="mp-pagination-bar" style="margin-top:20px;">
						<div class="mp-pagination-info">
							<?php
							printf(
								esc_html__( 'Page %1$d of %2$d (%3$d total dockets)', 'mobile-pasal' ),
								$paged,
								$total_pages,
								$total_items
							);
							?>
						</div>

						<div class="mp-pagination-links">
							<?php
							// Previous button
							if ( $paged > 1 ) {
								echo '<a href="' . esc_url( add_query_arg( 'paged', $paged - 1, $base_paginate_url ) ) . '" class="mp-page-btn">&laquo; ' . esc_html__( 'Prev', 'mobile-pasal' ) . '</a>';
							}

							for ( $i = $start_p; $i <= $end_p; $i++ ) {
								$cls = ( $i === $paged ) ? 'mp-page-btn is-active' : 'mp-page-btn';
								echo '<a href="' . esc_url( add_query_arg( 'paged', $i, $base_paginate_url ) ) . '" class="' . esc_attr( $cls ) . '">' . esc_html( $i ) . '</a>';
							}

							// Next button
							if ( $paged < $total_pages ) {
								echo '<a href="' . esc_url( add_query_arg( 'paged', $paged + 1, $base_paginate_url ) ) . '" class="mp-page-btn">' . esc_html__( 'Next', 'mobile-pasal' ) . ' &raquo;</a>';
							}
							?>
						</div>
					</div>
				<?php endif; ?>

			<?php endif; ?>
		</div>
	</div>

	<!-- Full Admin Edit / Manage Record Modal (Status, Repair Cost, Advance, IMEI, Warranty, Notes) -->
	<div class="mp-admin-modal-backdrop" id="mpAdminEditModal">
		<div class="mp-admin-modal-box">
			<div style="display:flex; justify-content:space-between; align-items:center; border-bottom:1.5px solid #e2e8f0; padding-bottom:12px; margin-bottom:16px;">
				<div>
					<span id="mpEditModalDocketBadge" style="font-family:monospace; font-size:13px; font-weight:900; color:#0066cc; background:#eff6ff; padding:3px 10px; border-radius:6px; border:1px solid #93c5fd;">AF-0000</span>
					<h3 style="margin:6px 0 0; font-size:18px; color:#0f172a;"><?php esc_html_e( 'Manage Record: Status, Cost, Lab Details & Notes', 'mobile-pasal' ); ?></h3>
				</div>
				<button type="button" onclick="mpCloseEditModal();" style="background:none; border:none; font-size:24px; cursor:pointer; color:#64748b;">&times;</button>
			</div>

			<form method="post" action="">
				<?php wp_nonce_field( 'mp_update_record_action', 'mp_update_record_nonce' ); ?>
				<input type="hidden" name="edit_id" id="mpEditId" value="">

				<div class="mp-admin-form-grid">
					<div class="mp-admin-field">
						<label><?php esc_html_e( 'Record Category', 'mobile-pasal' ); ?></label>
						<select name="edit_type" id="mpEditType">
							<option value="repair_docket"><?php esc_html_e( 'Repair Order Docket', 'mobile-pasal' ); ?></option>
							<option value="walkin_docket"><?php esc_html_e( 'Walk-In Repair Order', 'mobile-pasal' ); ?></option>
							<option value="general_inquiry"><?php esc_html_e( 'General Inquiry', 'mobile-pasal' ); ?></option>
						</select>
					</div>
					<div class="mp-admin-field">
						<label><?php esc_html_e( 'Current Status', 'mobile-pasal' ); ?></label>
						<select name="edit_status" id="mpEditStatus">
							<option value="pending"><?php esc_html_e( 'Pending / Checked In', 'mobile-pasal' ); ?></option>
							<option value="diagnosing"><?php esc_html_e( 'Diagnosing (Microscope)', 'mobile-pasal' ); ?></option>
							<option value="in_progress"><?php esc_html_e( 'In Progress (On Bench)', 'mobile-pasal' ); ?></option>
							<option value="waiting_parts"><?php esc_html_e( 'Waiting for Parts', 'mobile-pasal' ); ?></option>
							<option value="testing"><?php esc_html_e( 'Testing & Quality QA', 'mobile-pasal' ); ?></option>
							<option value="ready"><?php esc_html_e( 'Ready for Counter Pickup', 'mobile-pasal' ); ?></option>
							<option value="completed"><?php esc_html_e( 'Completed / Delivered', 'mobile-pasal' ); ?></option>
							<option value="contacted"><?php esc_html_e( 'Inquiry: Contacted', 'mobile-pasal' ); ?></option>
							<option value="quoted"><?php esc_html_e( 'Inquiry: Price Quoted', 'mobile-pasal' ); ?></option>
							<option value="resolved"><?php esc_html_e( 'Inquiry: Resolved / Closed', 'mobile-pasal' ); ?></option>
							<option value="cancelled"><?php esc_html_e( 'Cancelled', 'mobile-pasal' ); ?></option>
						</select>
					</div>
					<div class="mp-admin-field">
						<label><?php esc_html_e( 'Priority / Urgency', 'mobile-pasal' ); ?></label>
						<input type="text" name="edit_urgency" id="mpEditUrgency" placeholder="Normal / Express Same-Day">
					</div>
				</div>

				<div class="mp-admin-form-grid">
					<div class="mp-admin-field">
						<label><?php esc_html_e( 'Customer Name', 'mobile-pasal' ); ?></label>
						<input type="text" name="edit_customer_name" id="mpEditCustomerName" required>
					</div>
					<div class="mp-admin-field">
						<label><?php esc_html_e( 'Phone / WhatsApp', 'mobile-pasal' ); ?></label>
						<input type="text" name="edit_phone" id="mpEditPhone" required>
					</div>
					<div class="mp-admin-field">
						<label><?php esc_html_e( 'Customer Email', 'mobile-pasal' ); ?></label>
						<input type="email" name="edit_email" id="mpEditEmail">
					</div>
				</div>

				<div class="mp-admin-form-grid">
					<div class="mp-admin-field">
						<label><?php esc_html_e( 'Device Brand', 'mobile-pasal' ); ?></label>
						<input type="text" name="edit_brand" id="mpEditBrand">
					</div>
					<div class="mp-admin-field">
						<label><?php esc_html_e( 'Device Model', 'mobile-pasal' ); ?></label>
						<input type="text" name="edit_model" id="mpEditModel">
					</div>
					<div class="mp-admin-field">
						<label><?php esc_html_e( 'IMEI / Serial Number', 'mobile-pasal' ); ?></label>
						<input type="text" name="edit_imei" id="mpEditImei" placeholder="35XXXXXXXXXXXXX">
					</div>
					<div class="mp-admin-field">
						<label><?php esc_html_e( 'Accessories Received', 'mobile-pasal' ); ?></label>
						<input type="text" name="edit_accessories" id="mpEditAccessories" placeholder="Device Only, SIM Tray...">
					</div>
				</div>

				<!-- Financial & Billing Controls -->
				<div style="background:#f0f7ff; border:1px solid #bfdbfe; border-radius:12px; padding:14px 16px; margin-bottom:14px;">
					<h4 style="margin:0 0 10px; font-size:12.5px; text-transform:uppercase; color:#0066cc;"><i class="fa-solid fa-coins"></i> <?php esc_html_e( 'Repair Cost, Advance & Payment Details (Printed on PDF Invoice)', 'mobile-pasal' ); ?></h4>
					<div class="mp-admin-form-grid" style="margin-bottom:0;">
						<div class="mp-admin-field">
							<label><?php esc_html_e( 'Total Repair / Quote Cost (NPR)', 'mobile-pasal' ); ?></label>
							<input type="text" name="edit_repair_cost" id="mpEditRepairCost" placeholder="e.g. 6500">
						</div>
						<div class="mp-admin-field">
							<label><?php esc_html_e( 'Advance Paid (NPR)', 'mobile-pasal' ); ?></label>
							<input type="text" name="edit_advance_paid" id="mpEditAdvancePaid" placeholder="e.g. 1500">
						</div>
						<div class="mp-admin-field">
							<label><?php esc_html_e( 'Payment Status', 'mobile-pasal' ); ?></label>
							<select name="edit_payment_status" id="mpEditPaymentStatus">
								<option value="unpaid"><?php esc_html_e( 'Unpaid', 'mobile-pasal' ); ?></option>
								<option value="partial"><?php esc_html_e( 'Advance / Partial Paid', 'mobile-pasal' ); ?></option>
								<option value="paid"><?php esc_html_e( 'Paid in Full', 'mobile-pasal' ); ?></option>
							</select>
						</div>
						<div class="mp-admin-field">
							<label><?php esc_html_e( 'Payment Method', 'mobile-pasal' ); ?></label>
							<input type="text" name="edit_payment_method" id="mpEditPaymentMethod" placeholder="Cash / Fonepay QR / eSewa">
						</div>
					</div>
				</div>

				<div class="mp-admin-form-grid">
					<div class="mp-admin-field">
						<label><?php esc_html_e( 'Service / Fault / Subject', 'mobile-pasal' ); ?></label>
						<input type="text" name="edit_service" id="mpEditService">
					</div>
					<div class="mp-admin-field">
						<label><?php esc_html_e( 'Assigned Technician', 'mobile-pasal' ); ?></label>
						<input type="text" name="edit_technician" id="mpEditTechnician" placeholder="Senior Lab Technician">
					</div>
					<div class="mp-admin-field">
						<label><?php esc_html_e( 'Estimated Delivery', 'mobile-pasal' ); ?></label>
						<input type="text" name="edit_delivery" id="mpEditDelivery" placeholder="Today 5:00 PM">
					</div>
					<div class="mp-admin-field">
						<label><?php esc_html_e( 'Warranty Coverage (Days)', 'mobile-pasal' ); ?></label>
						<select name="edit_warranty_days" id="mpEditWarrantyDays">
							<option value="90"><?php esc_html_e( '90 Days Lab Warranty', 'mobile-pasal' ); ?></option>
							<option value="180"><?php esc_html_e( '180 Days (6 Months)', 'mobile-pasal' ); ?></option>
							<option value="365"><?php esc_html_e( '365 Days (1 Year)', 'mobile-pasal' ); ?></option>
							<option value="60"><?php esc_html_e( '60 Days Warranty', 'mobile-pasal' ); ?></option>
							<option value="30"><?php esc_html_e( '30 Days Testing Warranty', 'mobile-pasal' ); ?></option>
							<option value="0"><?php esc_html_e( '0 Days (No Warranty)', 'mobile-pasal' ); ?></option>
						</select>
					</div>
				</div>

				<div class="mp-admin-form-grid" style="grid-template-columns: 1fr;">
					<div class="mp-admin-field">
						<label><?php esc_html_e( 'Technician Diagnostic Report / Customer Note (Visible on PDF Receipt & Website Tracker)', 'mobile-pasal' ); ?></label>
						<textarea name="edit_notes" id="mpEditNotes" rows="3" placeholder="Enter detailed diagnostic report, parts replaced, or official counter response..."></textarea>
					</div>
					<div class="mp-admin-field">
						<label><?php esc_html_e( 'Customer Original Message / Reported Symptoms', 'mobile-pasal' ); ?></label>
						<textarea name="edit_message" id="mpEditMessage" rows="2"></textarea>
					</div>
					<div class="mp-admin-field">
						<label><?php esc_html_e( 'Private Internal Staff Notes (Admin Eyes Only — Not Printed on Customer PDF)', 'mobile-pasal' ); ?></label>
						<textarea name="edit_internal_notes" id="mpEditInternalNotes" rows="2" placeholder="Internal parts supplier cost, passcode, or staff remarks..."></textarea>
					</div>
				</div>

				<div class="mp-modal-sticky-footer" style="display:flex; justify-content:space-between; align-items:center; margin-top:16px; padding-top:14px; border-top:1px solid #e2e8f0;">
					<a href="#" id="mpEditModalPrintBtn" target="_blank" class="bopt-btn-secondary" style="text-decoration:none;">
						<i class="fa-solid fa-file-pdf" style="color:#dc2626;"></i> <?php esc_html_e( 'Open Printable PDF Job Sheet', 'mobile-pasal' ); ?>
					</a>
					<div style="display:flex; gap:10px;">
						<button type="button" class="bopt-btn-secondary" onclick="mpCloseEditModal();"><?php esc_html_e( 'Cancel', 'mobile-pasal' ); ?></button>
						<button type="submit" name="mp_update_record_submit" value="1" class="bopt-save-btn" style="padding:10px 24px;">
							<i class="fa-solid fa-floppy-disk"></i> <?php esc_html_e( 'Save Changes', 'mobile-pasal' ); ?>
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>

	<script>
	function mpOpenCreateForm(typeVal) {
		var card = document.getElementById('mpWalkinFormCard');
		var sel = document.getElementById('mpCreateTypeSelect');
		if (card) card.style.display = 'block';
		if (sel && typeVal) sel.value = typeVal;
		if (card) card.scrollIntoView({ behavior: 'smooth', block: 'start' });
	}
	function mpOpenEditModal(btn) {
		var raw = btn.getAttribute('data-record');
		if (!raw) return;
		try {
			var d = JSON.parse(raw);
			document.getElementById('mpEditId').value = d.id || '';
			document.getElementById('mpEditModalDocketBadge').textContent = d.docket_no || ('ID #' + d.id);
			document.getElementById('mpEditType').value = d.type || 'repair_docket';
			document.getElementById('mpEditStatus').value = d.status || 'pending';
			document.getElementById('mpEditUrgency').value = d.urgency || 'Normal';
			document.getElementById('mpEditCustomerName').value = d.customer_name || '';
			document.getElementById('mpEditPhone').value = d.phone || '';
			document.getElementById('mpEditEmail').value = d.email || '';
			document.getElementById('mpEditBrand').value = d.device_brand || '';
			document.getElementById('mpEditModel').value = d.device_model || '';
			document.getElementById('mpEditImei').value = d.imei_serial || '';
			document.getElementById('mpEditAccessories').value = d.accessories_received || 'Device Only';
			document.getElementById('mpEditRepairCost').value = d.repair_cost || '';
			document.getElementById('mpEditAdvancePaid').value = d.advance_paid || '0';
			document.getElementById('mpEditPaymentStatus').value = d.payment_status || 'unpaid';
			document.getElementById('mpEditPaymentMethod').value = d.payment_method || 'Cash';
			document.getElementById('mpEditService').value = d.service_needed || '';
			document.getElementById('mpEditTechnician').value = d.technician_name || '';
			document.getElementById('mpEditDelivery').value = d.estimated_delivery || '';
			document.getElementById('mpEditWarrantyDays').value = String(d.warranty_days !== undefined ? d.warranty_days : 90);
			document.getElementById('mpEditNotes').value = d.notes || '';
			document.getElementById('mpEditMessage').value = d.message || '';
			document.getElementById('mpEditInternalNotes').value = d.internal_notes || '';

			var printBtn = document.getElementById('mpEditModalPrintBtn');
			if (printBtn) {
				printBtn.href = '<?php echo esc_js( admin_url( 'admin-post.php?action=mp_print_docket&_wpnonce=' . wp_create_nonce( 'mp_print_docket' ) . '&id=' ) ); ?>' + encodeURIComponent(d.id);
			}

			var modal = document.getElementById('mpAdminEditModal');
			if (modal) modal.classList.add('open');
		} catch (e) {}
	}
	function mpCloseEditModal() {
		var modal = document.getElementById('mpAdminEditModal');
		if (modal) modal.classList.remove('open');
	}
	document.addEventListener('DOMContentLoaded', function() {
		var searchInput = document.getElementById('boptInquiriesSearchInput');
		if (searchInput) {
			searchInput.addEventListener('input', function() {
				var q = this.value.toLowerCase().trim();
				document.querySelectorAll('.bopt-table tbody tr').forEach(function(tr) {
					var txt = tr.textContent.toLowerCase();
					tr.style.display = (!q || txt.indexOf(q) !== -1) ? '' : 'none';
				});
				document.querySelectorAll('.bopt-dockets-mobile-list .bopt-docket-mobile-card').forEach(function(card) {
					var txt = card.textContent.toLowerCase();
					card.style.display = (!q || txt.indexOf(q) !== -1) ? '' : 'none';
				});
			});
		}
	});
	</script>
	<?php
}


/**
 * 4. AJAX Submission: Repair Estimator & Single Service Docket (`mp_submit_repair_docket` & `mp_submit_inquiry`)
 */
function mp_ajax_submit_repair_docket() {
	mp_ensure_inquiries_schema();

	$name    = isset( $_POST['customer_name'] ) ? sanitize_text_field( wp_unslash( $_POST['customer_name'] ) ) : ( isset( $_POST['name'] ) ? sanitize_text_field( wp_unslash( $_POST['name'] ) ) : '' );
	$phone   = isset( $_POST['phone'] ) ? sanitize_text_field( wp_unslash( $_POST['phone'] ) ) : '';
	$brand   = isset( $_POST['brand'] ) ? sanitize_text_field( wp_unslash( $_POST['brand'] ) ) : '';
	$model   = isset( $_POST['model'] ) ? sanitize_text_field( wp_unslash( $_POST['model'] ) ) : ( isset( $_POST['device'] ) ? sanitize_text_field( wp_unslash( $_POST['device'] ) ) : '' );
	$issue   = isset( $_POST['issue'] ) ? sanitize_text_field( wp_unslash( $_POST['issue'] ) ) : ( isset( $_POST['service'] ) ? sanitize_text_field( wp_unslash( $_POST['service'] ) ) : 'Repair Service' );
	$urgency = isset( $_POST['urgency'] ) ? sanitize_text_field( wp_unslash( $_POST['urgency'] ) ) : 'Normal';
	$notes   = isset( $_POST['notes'] ) ? sanitize_textarea_field( wp_unslash( $_POST['notes'] ) ) : ( isset( $_POST['message'] ) ? sanitize_textarea_field( wp_unslash( $_POST['message'] ) ) : '' );

	if ( empty( $name ) || empty( $phone ) ) {
		wp_send_json_error( array( 'message' => esc_html__( 'Please provide your name and mobile number.', 'mobile-pasal' ) ) );
	}

	global $wpdb;
	$table_name = $wpdb->prefix . 'mp_inquiries';
	$docket_no  = 'AF-' . gmdate( 'Y' ) . '-' . wp_rand( 1000, 9999 );

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
			'warranty_days'  => 90,
			'created_at'     => current_time( 'mysql' ),
		)
	);

	if ( false === $result ) {
		wp_send_json_error( array( 'message' => esc_html__( 'Database error. Please try again or WhatsApp us directly.', 'mobile-pasal' ) ) );
	}

	$wa_phone = mp_opt( 'whatsapp_number', '9779804530786' );
	$wa_phone = preg_replace( '/[^0-9]/', '', $wa_phone );
	$wa_text  = rawurlencode( "Namaste Ali Mobile! I booked a repair docket online.\nDocket: {$docket_no}\nName: {$name}\nDevice: {$brand} {$model}\nService: {$issue}\nUrgency: {$urgency}" );
	$wa_link  = "https://wa.me/{$wa_phone}?text={$wa_text}";

	wp_send_json_success( array(
		'message'   => esc_html__( 'Your repair docket has been created successfully!', 'mobile-pasal' ),
		'docket_no' => $docket_no,
		'docket'    => $docket_no,
		'wa_link'   => $wa_link,
	) );
}
add_action( 'wp_ajax_mp_submit_repair_docket', 'mp_ajax_submit_repair_docket' );
add_action( 'wp_ajax_nopriv_mp_submit_repair_docket', 'mp_ajax_submit_repair_docket' );
add_action( 'wp_ajax_mp_submit_inquiry', 'mp_ajax_submit_repair_docket' );
add_action( 'wp_ajax_nopriv_mp_submit_inquiry', 'mp_ajax_submit_repair_docket' );

/**
 * 5. AJAX Submission: General Contact Form (`mp_submit_contact_form`)
 */
function mp_ajax_submit_contact_form() {
	mp_ensure_inquiries_schema();

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
	$docket_no  = 'INQ-' . gmdate( 'ym' ) . '-' . wp_rand( 1000, 9999 );

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
			'warranty_days'  => 0,
			'created_at'     => current_time( 'mysql' ),
		)
	);

	if ( false === $result ) {
		wp_send_json_error( array( 'message' => esc_html__( 'Failed to send message. Please contact us via WhatsApp.', 'mobile-pasal' ) ) );
	}

	wp_send_json_success( array(
		'message'   => esc_html__( 'Thank you! Your inquiry has been received. Our team will contact you shortly.', 'mobile-pasal' ),
		'docket_no' => $docket_no,
	) );
}
add_action( 'wp_ajax_mp_submit_contact_form', 'mp_ajax_submit_contact_form' );
add_action( 'wp_ajax_nopriv_mp_submit_contact_form', 'mp_ajax_submit_contact_form' );

/**
 * 6. AJAX: Track Repair Docket Status (Public Customer Self-Service)
 */
function mp_ajax_track_repair_docket() {
	mp_ensure_inquiries_schema();

	$query_term = isset( $_POST['query'] ) ? sanitize_text_field( wp_unslash( $_POST['query'] ) ) : '';
	if ( empty( $query_term ) ) {
		wp_send_json_error( array( 'message' => esc_html__( 'Please enter your Docket Number or Phone Number.', 'mobile-pasal' ) ) );
	}

	global $wpdb;
	$table_name  = $wpdb->prefix . 'mp_inquiries';
	$clean_phone = preg_replace( '/[^0-9]/', '', $query_term );

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

	$status_raw   = strtolower( trim( $docket->status ) );
	$stage        = 1;
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
		case 'waiting_parts':
		case 'repairing':
		case 'processing':
			$stage        = 3;
			$status_label = 'waiting_parts' === $status_raw ? __( 'Waiting for Genuine Spare Part', 'mobile-pasal' ) : __( 'Component Repair On Cleanroom Bench', 'mobile-pasal' );
			$status_desc  = __( 'Hardware replacement, hot-air micro-soldering, or display bonding is currently active on our technician workbench.', 'mobile-pasal' );
			$status_color = '#d97706';
			break;
		case 'testing':
		case 'qa':
		case 'quoted':
			$stage        = 4;
			$status_label = __( 'Quality Assurance & Calibration', 'mobile-pasal' );
			$status_desc  = __( 'Repair work is complete. Device is passing burn-in, touchscreen sensitivity, thermal, and sensor diagnostics.', 'mobile-pasal' );
			$status_color = '#2563eb';
			break;
		case 'ready':
		case 'completed':
		case 'resolved':
			$stage        = 5;
			$status_label = 'completed' === $status_raw ? __( 'Completed & Handed Over', 'mobile-pasal' ) : __( 'Ready for Counter Pickup!', 'mobile-pasal' );
			$status_desc  = __( 'All testing has passed with 100% success! Your phone is ready at Ji. Pra. Ka. Chowk. Walk in anytime 9AM–8PM.', 'mobile-pasal' );
			$status_color = '#16a34a';
			break;
	}

	$name_parts  = explode( ' ', trim( $docket->customer_name ) );
	$masked_name = $name_parts[0];
	if ( count( $name_parts ) > 1 ) {
		$masked_name .= ' ' . mb_substr( $name_parts[1], 0, 1 ) . '***';
	}

	$wa_phone = mp_opt( 'whatsapp_number', '9779804530786' );
	$wa_msg   = sprintf(
		__( 'Namaste Ali Mobile, checking on my docket %s (%s). Current status: %s.', 'mobile-pasal' ),
		$docket->docket_no,
		$docket->device_model ? $docket->device_model : 'Handset',
		$status_label
	);
	$wa_url = 'https://wa.me/' . $wa_phone . '?text=' . rawurlencode( $wa_msg );

	$warranty_total_days = isset( $docket->warranty_days ) ? (int) $docket->warranty_days : 90;
	$created_ts          = strtotime( $docket->created_at ) ?: current_time( 'timestamp' );
	$expiry_ts           = $created_ts + ( $warranty_total_days * DAY_IN_SECONDS );
	$now_ts              = current_time( 'timestamp' );
	$days_remaining      = $warranty_total_days > 0 ? max( 0, (int) ceil( ( $expiry_ts - $now_ts ) / DAY_IN_SECONDS ) ) : 0;
	$warranty_expiry     = $warranty_total_days > 0 ? date_i18n( 'M j, Y', $expiry_ts ) : __( 'N/A', 'mobile-pasal' );
	$is_warranty_active  = ( $warranty_total_days > 0 && $days_remaining > 0 && 'cancelled' !== $docket->status );

	if ( $warranty_total_days <= 0 ) {
		$warranty_badge = __( 'Standard Counter Inspection', 'mobile-pasal' );
	} elseif ( 'completed' === $docket->status && $is_warranty_active ) {
		$warranty_badge = sprintf( __( 'Active %1$d-Day Lab Warranty • %2$d Days Remaining', 'mobile-pasal' ), $warranty_total_days, $days_remaining );
	} elseif ( $is_warranty_active ) {
		$warranty_badge = sprintf( __( '%1$d-Day Lab Warranty Pre-Registered (Valid until %2$s)', 'mobile-pasal' ), $warranty_total_days, $warranty_expiry );
	} else {
		$warranty_badge = sprintf( __( 'Warranty Period Ended on %s', 'mobile-pasal' ), $warranty_expiry );
	}

	$currency  = mp_opt( 'currency_symbol', 'NPR' );
	$cost_raw  = isset( $docket->repair_cost ) ? trim( (string) $docket->repair_cost ) : '';
	$cost_text = ! empty( $cost_raw ) ? ( is_numeric( $cost_raw ) ? $currency . ' ' . number_format( (float) $cost_raw ) : $cost_raw ) : __( 'Confirmed at Counter', 'mobile-pasal' );

	wp_send_json_success( array(
		'docket_no'       => $docket->docket_no,
		'customer'        => $masked_name,
		'device'          => trim( $docket->device_brand . ' ' . $docket->device_model ) ?: __( 'Handset', 'mobile-pasal' ),
		'service'         => $docket->service_needed ?: __( 'Precision Repair', 'mobile-pasal' ),
		'repair_cost'     => $cost_text,
		'payment_status'  => ! empty( $docket->payment_status ) ? strtoupper( $docket->payment_status ) : 'UNPAID',
		'technician'      => ! empty( $docket->technician_name ) ? $docket->technician_name : __( 'Senior Lab Engineer', 'mobile-pasal' ),
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
					<span><?php esc_html_e( 'Live Lab Bench Telemetry & Digital Warranty Checker', 'mobile-pasal' ); ?></span>
				</div>
				<h3 class="mp-tracker-title"><?php esc_html_e( 'Track Device Repair Status, Cost & Digital Warranty', 'mobile-pasal' ); ?></h3>
				<p class="mp-tracker-desc"><?php esc_html_e( 'Enter your Docket ID (e.g., AF-2026-8419) or registered 10-digit mobile number to view live bench progress, repair cost, and remaining warranty days.', 'mobile-pasal' ); ?></p>
			</div>

			<form class="mp-tracker-form" id="mpTrackerForm" onsubmit="mpHandleTrackerSubmit(event);">
				<div class="mp-tracker-input-group">
					<svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2.2"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
					<input type="text" id="mpTrackerQuery" class="mp-tracker-input" placeholder="<?php esc_attr_e( 'Enter Docket No (AF-...) or Mobile Number', 'mobile-pasal' ); ?>" required autocomplete="off" />
					<button type="submit" class="mp-tracker-submit-btn" id="mpTrackerSubmitBtn">
						<span class="mp-btn-text"><?php esc_html_e( 'Check Status', 'mobile-pasal' ); ?></span>
						<span class="mp-btn-spinner" style="display:none;"><i class="fa-solid fa-spinner fa-spin"></i></span>
					</button>
				</div>
				<div class="mp-tracker-error" id="mpTrackerError" style="display:none;"></div>
			</form>

			<div class="mp-tracker-result" id="mpTrackerResult" style="display:none;"></div>
		</div>
	</div>

	<style>
	.mp-tracker-widget { width: 100%; max-width: 720px; margin: 24px auto; font-family: inherit; }
	.mp-tracker-card { background: var(--bg-card, #ffffff); border: 1px solid var(--border-color, #e2e8f0); border-radius: 20px; padding: clamp(24px, 4vw, 36px); box-shadow: 0 10px 30px rgba(0,0,0,0.06); }
	.mp-tracker-header { text-align: center; margin-bottom: 24px; }
	.mp-tracker-badge { display: inline-flex; align-items: center; gap: 8px; background: rgba(8, 98, 233, 0.08); color: var(--blue, #0862e9); padding: 5px 14px; border-radius: 999px; font-size: 0.8rem; font-weight: 700; margin-bottom: 12px; }
	.mp-tracker-title { font-size: clamp(1.3rem, 2.8vw, 1.7rem); font-weight: 900; color: var(--navy, #071b3b); margin: 0 0 8px; font-family: "Plus Jakarta Sans", sans-serif; }
	.mp-tracker-desc { font-size: 0.94rem; color: var(--muted, #52627e); margin: 0; font-family: "DM Sans", sans-serif; }
	.mp-tracker-input-group { display: flex; align-items: center; gap: 12px; background: #ffffff; border: 1.5px solid var(--line, #dce7f8); border-radius: 14px; padding: 6px 6px 6px 16px; transition: border-color 0.2s, box-shadow 0.2s; }
	.mp-tracker-input-group:focus-within { border-color: var(--blue, #0862e9); box-shadow: 0 0 0 4px rgba(8, 98, 233, 0.15); background: #ffffff; }
	.mp-tracker-input-group svg { color: var(--muted, #52627e); flex-shrink: 0; }
	.mp-tracker-input { flex: 1; border: none; background: transparent; outline: none; font-size: 0.98rem; color: var(--navy, #071b3b); min-width: 0; font-family: "DM Sans", sans-serif; }
	.mp-tracker-submit-btn { background: var(--blue, #0862e9); color: #ffffff; border: none; border-radius: 10px; padding: 12px 22px; font-weight: 800; font-size: 0.94rem; cursor: pointer; white-space: nowrap; flex-shrink: 0; font-family: "Plus Jakarta Sans", sans-serif; }
	.mp-tracker-error { margin-top: 14px; padding: 12px 16px; background: #fef2f2; color: #991b1b; border: 1px solid #fecaca; border-radius: 10px; font-size: 0.88rem; font-weight: 600; }
	.mp-tracker-result { margin-top: 24px; padding-top: 24px; border-top: 1px dashed var(--border-color, #e2e8f0); }
	.mp-docket-summary-box { display: grid; grid-template-columns: repeat(auto-fit, minmax(130px, 1fr)); gap: 12px; background: var(--bg-surface, #f8fafc); border-radius: 12px; padding: 14px 18px; margin-bottom: 24px; }
	.mp-docket-prop strong { display: block; font-size: 0.72rem; text-transform: uppercase; letter-spacing: 0.5px; color: var(--text-muted, #64748b); margin-bottom: 2px; }
	.mp-docket-prop span { font-size: 0.92rem; font-weight: 800; color: var(--text-heading, #0f172a); }
	.mp-tracker-stepper { display: flex; align-items: center; justify-content: space-between; position: relative; margin: 32px 0 24px; }
	.mp-tracker-stepper::before { content: ''; position: absolute; top: 18px; left: 5%; right: 5%; height: 3px; background: #e2e8f0; z-index: 1; }
	.mp-step-item { position: relative; z-index: 2; text-align: center; flex: 1; }
	.mp-step-circle { width: 36px; height: 36px; border-radius: 50%; background: #f1f5f9; color: #94a3b8; border: 2px solid #cbd5e1; display: flex; align-items: center; justify-content: center; margin: 0 auto 8px; font-size: 0.85rem; font-weight: 800; }
	.mp-step-item.is-completed .mp-step-circle { background: #16a34a; border-color: #16a34a; color: #ffffff; }
	.mp-step-item.is-active .mp-step-circle { background: var(--primary, #0066cc); border-color: var(--primary, #0066cc); color: #ffffff; box-shadow: 0 0 0 4px rgba(0, 102, 204, 0.2); }
	.mp-step-label { font-size: 0.75rem; font-weight: 700; color: #64748b; line-height: 1.25; }
	.mp-step-item.is-active .mp-step-label { color: var(--primary, #0066cc); font-weight: 900; }
	.mp-status-banner { padding: 16px 20px; border-radius: 12px; margin-bottom: 20px; border-left: 4px solid; }
	.mp-status-banner-title { font-size: 1.05rem; font-weight: 900; margin: 0 0 4px; }
	.mp-status-banner-desc { font-size: 0.9rem; margin: 0; line-height: 1.5; }
	.mp-technician-note { background: rgba(245, 158, 11, 0.08); border: 1px solid rgba(245, 158, 11, 0.25); border-radius: 10px; padding: 12px 16px; margin-bottom: 20px; font-size: 0.88rem; color: #92400e; }
	.mp-tracker-wa-btn { display: flex; align-items: center; justify-content: center; gap: 10px; background: #16a34a; color: #ffffff; text-decoration: none; border-radius: 12px; padding: 14px 20px; font-weight: 800; font-size: 0.95rem; }
	@media (max-width: 640px) {
		.mp-tracker-input-group { flex-direction: column; padding: 10px; gap: 8px; }
		.mp-tracker-input-group svg { display: none; }
		.mp-tracker-input, .mp-tracker-submit-btn { width: 100%; text-align: center; }
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

		fetch(ajaxEndpoint, { method: 'POST', body: formData })
		.then(function(r) { return r.json(); })
		.then(function(res) {
			btn.disabled = false;
			textSpan.style.display = 'inline-block';
			spinSpan.style.display = 'none';

			if (!res.success) {
				errBox.textContent = res.data.message || 'No docket found.';
				errBox.style.display = 'block';
				resBox.style.display = 'none';
				return;
			}

			var d = res.data;
			var stages = ['Checked In', 'Diagnostic', 'Bench Repair', 'Quality QA', 'Pickup Ready'];
			var stepperHtml = '<div class="mp-tracker-stepper">';
			for (var i = 1; i <= 5; i++) {
				var cls = i < d.stage ? 'is-completed' : (i === d.stage ? 'is-active' : '');
				stepperHtml += '<div class="mp-step-item ' + cls + '"><div class="mp-step-circle">' + (i < d.stage ? '✓' : i) + '</div><div class="mp-step-label">' + stages[i-1] + '</div></div>';
			}
			stepperHtml += '</div>';

			var noteHtml = d.notes ? '<div class="mp-technician-note"><strong>Technician Diagnostic Note: </strong>' + mpEscHtml(d.notes) + '</div>' : '';
			var safeColor = /^#[0-9a-fA-F]{3,6}$/.test(d.status_color || '') ? d.status_color : '#0066cc';

			var warrantyHtml = '';
			if (d.warranty_badge) {
				var wBg = d.warranty_active ? '#ecfdf5' : '#f8fafc';
				var wBorder = d.warranty_active ? '#a7f3d0' : '#cbd5e1';
				var wColor = d.warranty_active ? '#047857' : '#475569';
				warrantyHtml = '<div style="display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:10px;padding:13px 16px;border-radius:12px;background:' + wBg + ';border:1px solid ' + wBorder + ';color:' + wColor + ';margin-bottom:18px;font-size:0.88rem;">' +
					'<div style="display:flex;align-items:center;gap:8px;font-weight:800;"><i class="fa-solid fa-shield-halved" style="color:#16a34a;margin-right:4px;"></i> ' + mpEscHtml(d.warranty_badge) + '</div>' +
					'<span style="font-size:0.78rem;font-weight:700;">Valid Until: ' + mpEscHtml(d.warranty_expiry || '') + '</span>' +
				'</div>';
			}

			var html = '<div class="mp-docket-summary-box">' +
				'<div class="mp-docket-prop"><strong>Docket No</strong><span>' + mpEscHtml(d.docket_no) + '</span></div>' +
				'<div class="mp-docket-prop"><strong>Customer</strong><span>' + mpEscHtml(d.customer) + '</span></div>' +
				'<div class="mp-docket-prop"><strong>Device Model</strong><span>' + mpEscHtml(d.device) + '</span></div>' +
				'<div class="mp-docket-prop"><strong>Service</strong><span>' + mpEscHtml(d.service) + '</span></div>' +
				'<div class="mp-docket-prop"><strong>Repair Cost</strong><span style="color:#0066cc;">' + mpEscHtml(d.repair_cost || 'Confirmed at Counter') + ' (' + mpEscHtml(d.payment_status || 'UNPAID') + ')</span></div>' +
				'</div>' +
				stepperHtml +
				'<div class="mp-status-banner" style="background:' + safeColor + '15; border-color:' + safeColor + '; color:' + safeColor + ';">' +
				'<h4 class="mp-status-banner-title">' + mpEscHtml(d.status_label) + '</h4>' +
				'<p class="mp-status-banner-desc" style="color:var(--text-heading, #0f172a);">' + mpEscHtml(d.status_desc) + '</p>' +
				'</div>' +
				warrantyHtml +
				noteHtml +
				'<a href="' + mpEscHtml(d.wa_url) + '" target="_blank" rel="noopener" class="mp-tracker-wa-btn">' +
				'<span>Inquire About This Docket on WhatsApp</span>' +
				'</a>';

			resBox.innerHTML = html;
			resBox.style.display = 'block';
		})
		.catch(function() {
			btn.disabled = false;
			textSpan.style.display = 'inline-block';
			spinSpan.style.display = 'none';
			errBox.textContent = 'Network error. Please try again.';
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
