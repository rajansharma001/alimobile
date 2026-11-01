<?php
/**
 * Ali Mobile Center — Spreadsheet-Style Bulk Handset Price, Stock & Visibility Editor
 *
 * Allows the showroom counter manager to update prices, strikethrough prices,
 * promotional badges, stock statuses, and global/per-device price visibility
 * for all handsets in one screen with instant AJAX save.
 *
 * @package Mobile_Pasal
 * @version 3.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register Bulk Price Editor in Admin Menu (Under Theme Options & Handsets CPT)
 */
function mobile_pasal_register_bulk_price_editor_menu() {
	add_submenu_page(
		'mobile-pasal-options',
		__( 'Bulk Handset Price & Stock Editor', 'mobile-pasal' ),
		__( 'Bulk Price Editor', 'mobile-pasal' ),
		'edit_theme_options',
		'mp-bulk-price-editor',
		'mobile_pasal_render_bulk_price_editor'
	);

	add_submenu_page(
		'edit.php?post_type=handset',
		__( 'Bulk Price & Stock Editor', 'mobile-pasal' ),
		__( 'Bulk Price Editor', 'mobile-pasal' ),
		'edit_theme_options',
		'mp-bulk-price-editor',
		'mobile_pasal_render_bulk_price_editor'
	);
}
add_action( 'admin_menu', 'mobile_pasal_register_bulk_price_editor_menu', 20 );

/**
 * AJAX Handler: Save All Handset Prices, Stock & Global Price Visibility
 */
function mobile_pasal_ajax_bulk_save_handsets() {
	check_ajax_referer( 'mp_bulk_price_editor_nonce', 'nonce' );

	if ( ! current_user_can( 'edit_theme_options' ) ) {
		wp_send_json_error( array( 'message' => __( 'Permission denied.', 'mobile-pasal' ) ), 403 );
	}

	// 1. Update Global Price Visibility & Hidden Price Text in Theme Options
	$options = get_option( 'mobile_pasal_options', array() );
	if ( ! is_array( $options ) ) {
		$options = mobile_pasal_options_defaults();
	}

	if ( isset( $_POST['global_show_price'] ) ) {
		$options['handset_show_price'] = ( '1' === (string) $_POST['global_show_price'] ) ? 1 : 0;
	}
	if ( isset( $_POST['global_hidden_text'] ) ) {
		$options['handset_hidden_price_text'] = sanitize_text_field( wp_unslash( $_POST['global_hidden_text'] ) );
	}
	if ( isset( $_POST['global_hidden_note'] ) ) {
		$options['handset_hidden_price_note'] = sanitize_text_field( wp_unslash( $_POST['global_hidden_note'] ) );
	}
	update_option( 'mobile_pasal_options', $options );
	if ( function_exists( 'mobile_pasal_flush_options_cache' ) ) {
		mobile_pasal_flush_options_cache();
	}

	// 2. Update Handset Post Meta Rows
	$updated_count = 0;
	$allowed_stock = array( 'in_stock', 'low_stock', 'pre_order', 'out_of_stock' );
	$allowed_vis   = array( 'inherit', 'show', 'hide' );

	if ( isset( $_POST['items'] ) && is_array( $_POST['items'] ) ) {
		foreach ( $_POST['items'] as $post_id => $fields ) {
			$post_id = absint( $post_id );
			if ( ! $post_id || 'handset' !== get_post_type( $post_id ) ) {
				continue;
			}

			if ( isset( $fields['price'] ) ) {
				update_post_meta( $post_id, '_mp_price', sanitize_text_field( wp_unslash( $fields['price'] ) ) );
			}
			if ( isset( $fields['old_price'] ) ) {
				update_post_meta( $post_id, '_mp_old_price', sanitize_text_field( wp_unslash( $fields['old_price'] ) ) );
			}
			if ( isset( $fields['badge'] ) ) {
				update_post_meta( $post_id, '_mp_badge', sanitize_text_field( wp_unslash( $fields['badge'] ) ) );
			}
			if ( isset( $fields['stock'] ) ) {
				$st = sanitize_key( $fields['stock'] );
				if ( in_array( $st, $allowed_stock, true ) ) {
					update_post_meta( $post_id, '_mp_stock_status', $st );
				}
			}
			if ( isset( $fields['show_price'] ) ) {
				$vis = sanitize_key( $fields['show_price'] );
				if ( in_array( $vis, $allowed_vis, true ) ) {
					update_post_meta( $post_id, '_mp_show_price', $vis );
					update_post_meta( $post_id, '_mp_hide_price', 'hide' === $vis ? '1' : '0' );
				}
			}

			$updated_count++;
		}
	}

	wp_send_json_success(
		array(
			'message' => sprintf(
				/* translators: %d: number of updated handsets */
				__( 'Saved global price rules & updated %d handsets!', 'mobile-pasal' ),
				$updated_count
			),
			'count'   => $updated_count,
		)
	);
}
add_action( 'wp_ajax_mp_bulk_save_handsets', 'mobile_pasal_ajax_bulk_save_handsets' );

/**
 * Export Handset Prices & Stock to CSV
 */
function mobile_pasal_export_prices_csv() {
	if ( ! current_user_can( 'edit_theme_options' ) ) {
		wp_die( esc_html__( 'Permission denied.', 'mobile-pasal' ) );
	}
	check_admin_referer( 'mp_bpe_csv_export' );

	$handsets = get_posts( array(
		'post_type'      => 'handset',
		'posts_per_page' => -1,
		'post_status'    => array( 'publish', 'draft' ),
		'orderby'        => 'title',
		'order'          => 'ASC',
	) );

	$filename = 'ali-mobile-handset-prices-' . gmdate( 'Y-m-d' ) . '.csv';
	header( 'Content-Type: text/csv; charset=utf-8' );
	header( 'Content-Disposition: attachment; filename=' . $filename );

	$out = fopen( 'php://output', 'w' );
	fputcsv( $out, array( 'ID', 'Model_Name', 'Brand', 'Price', 'Old_Price', 'Badge', 'Stock_Status', 'Price_Visibility' ) );

	foreach ( $handsets as $h ) {
		$pid        = $h->ID;
		$terms      = wp_get_post_terms( $pid, 'device_brand', array( 'fields' => 'names' ) );
		$brand_str  = ! empty( $terms ) && ! is_wp_error( $terms ) ? implode( ', ', $terms ) : 'Handset';
		$price      = get_post_meta( $pid, '_mp_price', true );
		$old_price  = get_post_meta( $pid, '_mp_old_price', true );
		$badge      = get_post_meta( $pid, '_mp_badge', true );
		$stock      = get_post_meta( $pid, '_mp_stock_status', true ) ?: 'in_stock';
		$show_price = get_post_meta( $pid, '_mp_show_price', true ) ?: 'inherit';

		fputcsv( $out, array( $pid, $h->post_title, $brand_str, $price, $old_price, $badge, $stock, $show_price ) );
	}
	fclose( $out );
	exit;
}
add_action( 'admin_post_mp_export_prices_csv', 'mobile_pasal_export_prices_csv' );

/**
 * Import Handset Prices & Stock from CSV
 */
function mobile_pasal_import_prices_csv() {
	if ( ! current_user_can( 'edit_theme_options' ) ) {
		wp_die( esc_html__( 'Permission denied.', 'mobile-pasal' ) );
	}
	check_admin_referer( 'mp_bpe_csv_import', 'mp_bpe_csv_nonce' );

	if ( empty( $_FILES['mp_csv_file']['tmp_name'] ) ) {
		wp_safe_redirect( admin_url( 'admin.php?page=mp-bulk-price-editor&csv_err=1' ) );
		exit;
	}

	$handle = fopen( $_FILES['mp_csv_file']['tmp_name'], 'r' );
	if ( ! $handle ) {
		wp_safe_redirect( admin_url( 'admin.php?page=mp-bulk-price-editor&csv_err=1' ) );
		exit;
	}

	$allowed_stock = array( 'in_stock', 'low_stock', 'pre_order', 'out_of_stock' );
	$allowed_vis   = array( 'inherit', 'show', 'hide' );
	$updated       = 0;
	$row_num       = 0;

	while ( ( $row = fgetcsv( $handle ) ) !== false ) {
		$row_num++;
		if ( 1 === $row_num && ! is_numeric( $row[0] ) ) {
			continue; // Skip header row
		}
		$pid = isset( $row[0] ) ? absint( $row[0] ) : 0;
		if ( ! $pid || 'handset' !== get_post_type( $pid ) ) {
			continue;
		}
		if ( isset( $row[3] ) ) {
			update_post_meta( $pid, '_mp_price', sanitize_text_field( $row[3] ) );
		}
		if ( isset( $row[4] ) ) {
			update_post_meta( $pid, '_mp_old_price', sanitize_text_field( $row[4] ) );
		}
		if ( isset( $row[5] ) ) {
			update_post_meta( $pid, '_mp_badge', sanitize_text_field( $row[5] ) );
		}
		if ( isset( $row[6] ) ) {
			$st = sanitize_key( $row[6] );
			if ( in_array( $st, $allowed_stock, true ) ) {
				update_post_meta( $pid, '_mp_stock_status', $st );
			}
		}
		if ( isset( $row[7] ) ) {
			$vis = sanitize_key( $row[7] );
			if ( in_array( $vis, $allowed_vis, true ) ) {
				update_post_meta( $pid, '_mp_show_price', $vis );
				update_post_meta( $pid, '_mp_hide_price', 'hide' === $vis ? '1' : '0' );
			}
		}
		$updated++;
	}
	fclose( $handle );

	wp_safe_redirect( admin_url( 'admin.php?page=mp-bulk-price-editor&csv_imported=' . $updated ) );
	exit;
}
add_action( 'admin_post_mp_import_prices_csv', 'mobile_pasal_import_prices_csv' );

/**
 * Printable A4 Showroom Counter Rate Sheet
 */
function mobile_pasal_print_price_sheet() {
	if ( ! current_user_can( 'edit_theme_options' ) ) {
		wp_die( esc_html__( 'Permission denied.', 'mobile-pasal' ) );
	}

	$store_name  = mp_opt( 'site_brand_name', 'Ali Mobile Center & Apple Fix' );
	$store_phone = mp_opt( 'contact_phone', '+977 9804530786' );
	$store_addr  = mp_opt( 'contact_address', 'Ji. Pra. Ka. Chowk, Gulariya-06, Bardiya' );
	$store_email = mp_opt( 'counter_email', get_option( 'admin_email', 'alimobilecenter@gmail.com' ) );
	$shop_url    = home_url( '/shop/' );
	$qr_src      = 'https://api.qrserver.com/v1/create-qr-code/?size=120x120&data=' . rawurlencode( $shop_url );

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

	$handsets = get_posts( array(
		'post_type'      => 'handset',
		'posts_per_page' => -1,
		'post_status'    => 'publish',
		'orderby'        => 'title',
		'order'          => 'ASC',
	) );

	$grouped = array();
	foreach ( $handsets as $h ) {
		$terms     = wp_get_post_terms( $h->ID, 'device_brand', array( 'fields' => 'names' ) );
		$brand_str = ! empty( $terms ) && ! is_wp_error( $terms ) ? $terms[0] : 'Other Handsets';
		$grouped[ $brand_str ][] = $h;
	}
	ksort( $grouped );
	?>
	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="utf-8">
		<title><?php echo esc_html( $store_name . ' — Daily Counter Rate Sheet' ); ?></title>
		<style>
			* { box-sizing: border-box; }
			body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif; color: #0f172a; margin: 0; padding: 24px; background: #f1f5f9; }
			.sheet { max-width: 840px; margin: 0 auto; background: #fff; padding: 32px 36px; border-radius: 14px; box-shadow: 0 10px 30px rgba(0,0,0,0.08); }
			.sheet-head { display: flex; justify-content: space-between; align-items: center; border-bottom: 2px solid #0066cc; padding-bottom: 18px; margin-bottom: 22px; }
			.sheet-title { margin: 0 0 4px; font-size: 24px; font-weight: 900; color: #071b3b; }
			.sheet-sub { margin: 0; font-size: 13px; color: #475569; font-weight: 600; }
			.brand-block { margin-bottom: 22px; page-break-inside: avoid; }
			.brand-heading { margin: 0 0 8px; font-size: 14px; font-weight: 900; text-transform: uppercase; letter-spacing: 0.05em; color: #0066cc; background: #eff6ff; padding: 6px 12px; border-radius: 6px; border-left: 4px solid #0066cc; }
			table { width: 100%; border-collapse: collapse; font-size: 13px; }
			th, td { padding: 8px 10px; border-bottom: 1px solid #e2e8f0; text-align: left; }
			th { font-size: 11px; text-transform: uppercase; color: #64748b; background: #f8fafc; }
			.price-col { font-weight: 800; color: #0066cc; font-size: 13.5px; }
			.stock-tag { display: inline-block; padding: 2px 8px; border-radius: 99px; font-size: 11px; font-weight: 700; }
			.st-in_stock { background: #dcfce7; color: #166534; }
			.st-low_stock { background: #fef3c7; color: #92400e; }
			.st-pre_order { background: #dbeafe; color: #1e40af; }
			.st-out_of_stock { background: #fee2e2; color: #991b1b; }
			.no-print { text-align: center; margin-bottom: 16px; }
			.print-btn { background: #0066cc; color: #fff; border: none; padding: 10px 22px; border-radius: 8px; font-weight: 800; cursor: pointer; font-size: 14px; }
			@media print {
				body { background: #fff; padding: 0; }
				.sheet { box-shadow: none; padding: 10px; max-width: 100%; }
				.no-print { display: none !important; }
			}
		</style>
	</head>
	<body>
		<div class="no-print">
			<button type="button" class="print-btn" onclick="window.print();">🖨️ Print A4 Counter Rate Sheet</button>
		</div>
		<div class="sheet">
			<div class="sheet-head">
				<div style="display:flex;align-items:center;gap:16px;">
					<?php if ( ! empty( $logo_url ) ) : ?>
						<img src="<?php echo esc_url( $logo_url ); ?>" alt="<?php echo esc_attr( $store_name ); ?>" style="max-height:52px;max-width:160px;object-fit:contain;" />
					<?php else : ?>
						<div style="width:48px;height:48px;border-radius:10px;background:#071b3b;color:#fff;display:flex;align-items:center;justify-content:center;font-weight:900;font-size:20px;">AM</div>
					<?php endif; ?>
					<div>
						<h1 class="sheet-title"><?php echo esc_html( $store_name ); ?></h1>
						<p class="sheet-sub"><?php echo esc_html( $store_addr . ' • Hotline: ' . $store_phone . ' • ' . $store_email ); ?></p>
						<p class="sheet-sub" style="margin-top:4px;color:#059669;">✓ 100% NTA MDMS Registered &bull; Official 13% VAT Bill &bull; Updated: <?php echo esc_html( date_i18n( 'F j, Y' ) ); ?></p>
					</div>
				</div>
				<div style="text-align:center;">
					<img src="<?php echo esc_url( $qr_src ); ?>" alt="QR" width="76" height="76" style="border:1px solid #cbd5e1;padding:3px;border-radius:8px;" />
					<div style="font-size:10px;font-weight:700;color:#475569;margin-top:2px;">Scan Live Catalog</div>
				</div>
			</div>

			<?php foreach ( $grouped as $brand_name => $items ) : ?>
				<div class="brand-block">
					<h2 class="brand-heading"><?php echo esc_html( $brand_name ); ?> (<?php echo count( $items ); ?>)</h2>
					<table>
						<thead>
							<tr>
								<th style="width:36%;">Handset Model</th>
								<th style="width:28%;">Key Specs / Storage</th>
								<th style="width:20%;">Counter Price</th>
								<th style="width:16%;">Availability</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ( $items as $item ) :
								$pid    = $item->ID;
								$price  = get_post_meta( $pid, '_mp_price', true );
								$p_fmt  = is_numeric( $price ) ? 'NPR ' . number_format( (float) $price ) : ( $price ?: 'Inquire' );
								$stock  = get_post_meta( $pid, '_mp_stock_status', true ) ?: 'in_stock';
								$chip   = get_post_meta( $pid, '_mp_spec_chip', true ) ?: get_post_meta( $pid, '_mp_processor', true );
								$stor   = get_post_meta( $pid, '_mp_spec_storage', true );
								$specs  = implode( ' • ', array_filter( array( $chip, $stor ) ) );
								$st_lbl = array(
									'in_stock'     => 'In Stock',
									'low_stock'    => 'Low Stock',
									'pre_order'    => 'Pre-Order',
									'out_of_stock' => 'Out of Stock',
								);
							?>
							<tr>
								<td><strong><?php echo esc_html( $item->post_title ); ?></strong></td>
								<td style="color:#475569;font-size:12px;"><?php echo esc_html( $specs ?: 'Official Sealed Unit' ); ?></td>
								<td class="price-col"><?php echo esc_html( $p_fmt ); ?></td>
								<td><span class="stock-tag st-<?php echo esc_attr( $stock ); ?>"><?php echo esc_html( isset( $st_lbl[ $stock ] ) ? $st_lbl[ $stock ] : 'In Stock' ); ?></span></td>
							</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			<?php endforeach; ?>
		</div>
	</body>
	</html>
	<?php
	exit;
}
add_action( 'admin_post_mp_print_price_sheet', 'mobile_pasal_print_price_sheet' );

/**
 * Render the Spreadsheet-Style Bulk Handset Price & Stock Editor
 */
function mobile_pasal_render_bulk_price_editor() {
	if ( ! current_user_can( 'edit_theme_options' ) ) {
		return;
	}

	$global_show_price  = mp_opt( 'handset_show_price', 1 );
	$global_hidden_text = mp_opt( 'handset_hidden_price_text', 'Inquire for Today\'s Best Counter Rate' );
	$global_hidden_note = mp_opt( 'handset_hidden_price_note', 'Official NTA stock. Contact our counter directly for today\'s cash/card offer.' );

	$handsets = get_posts(
		array(
			'post_type'      => 'handset',
			'posts_per_page' => -1,
			'post_status'    => array( 'publish', 'draft' ),
			'orderby'        => 'title',
			'order'          => 'ASC',
		)
	);

	$brands = get_terms(
		array(
			'taxonomy'   => 'device_brand',
			'hide_empty' => false,
		)
	);

	$nonce = wp_create_nonce( 'mp_bulk_price_editor_nonce' );
	?>
	<div class="bopt-app-wrap mp-bpe-app">
		<!-- Top Executive Header -->
		<header class="bopt-topbar">
			<div class="bopt-topbar-left">
				<div class="bopt-brand">
					<div class="bopt-brand-icon"><i class="fa-solid fa-tags"></i></div>
					<div class="bopt-brand-info">
						<span class="bopt-brand-title"><?php esc_html_e( 'Bulk Handset Price & Stock Editor', 'mobile-pasal' ); ?></span>
						<span class="bopt-brand-badge"><?php echo esc_html( sprintf( '%d Showroom Devices', count( $handsets ) ) ); ?></span>
					</div>
				</div>
			</div>
			<div class="bopt-topbar-right">
				<a href="<?php echo esc_url( admin_url( 'admin-post.php?action=mp_print_price_sheet' ) ); ?>" target="_blank" class="bopt-messages-btn" title="<?php esc_attr_e( 'Print A4 Showroom Rate Sheet', 'mobile-pasal' ); ?>">
					<i class="fa-solid fa-print"></i>
					<span class="bopt-btn-text"><?php esc_html_e( 'Print Rate Sheet', 'mobile-pasal' ); ?></span>
				</a>
				<a href="<?php echo esc_url( wp_nonce_url( admin_url( 'admin-post.php?action=mp_export_prices_csv' ), 'mp_bpe_csv_export' ) ); ?>" class="bopt-messages-btn" title="<?php esc_attr_e( 'Download Prices as CSV', 'mobile-pasal' ); ?>">
					<i class="fa-solid fa-file-csv"></i>
					<span class="bopt-btn-text"><?php esc_html_e( 'Export CSV', 'mobile-pasal' ); ?></span>
				</a>
				<button type="button" class="bopt-messages-btn" onclick="document.getElementById('mpBpeCsvImportBox').style.display = document.getElementById('mpBpeCsvImportBox').style.display === 'none' ? 'block' : 'none';">
					<i class="fa-solid fa-file-import"></i>
					<span class="bopt-btn-text"><?php esc_html_e( 'Import CSV', 'mobile-pasal' ); ?></span>
				</button>
				<a href="<?php echo esc_url( admin_url( 'post-new.php?post_type=handset' ) ); ?>" class="bopt-messages-btn">
					<i class="fa-solid fa-plus"></i>
					<span class="bopt-btn-text"><?php esc_html_e( 'Add Handset', 'mobile-pasal' ); ?></span>
				</a>
				<a href="<?php echo esc_url( home_url( '/shop/' ) ); ?>" target="_blank" class="bopt-preview-btn">
					<i class="fa-solid fa-arrow-up-right-from-square"></i>
					<span class="bopt-btn-text"><?php esc_html_e( 'View Showroom', 'mobile-pasal' ); ?></span>
				</a>
				<button type="button" class="bopt-save-btn" id="mpBpeSaveAllTopBtn">
					<i class="fa-solid fa-floppy-disk"></i>
					<span><?php esc_html_e( 'Save All Prices & Stock', 'mobile-pasal' ); ?></span>
					<span class="bopt-key-hint">Ctrl+S</span>
				</button>
			</div>
		</header>

		<div class="bopt-inquiries-container" style="max-width:1480px;">
			<?php if ( isset( $_GET['csv_imported'] ) ) : ?>
				<div style="background:#ecfdf5;border:1px solid #a7f3d0;color:#065f46;padding:12px 18px;border-radius:10px;margin-bottom:16px;font-weight:700;">
					✓ <?php printf( esc_html__( 'Successfully imported & updated %d handsets from CSV!', 'mobile-pasal' ), absint( $_GET['csv_imported'] ) ); ?>
				</div>
			<?php endif; ?>

			<div id="mpBpeCsvImportBox" class="bopt-card" style="display:none;margin-bottom:18px;border:1.5px dashed #0066cc;background:#f8fbff;">
				<div class="bopt-card-body">
					<form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" enctype="multipart/form-data" style="display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:14px;">
						<input type="hidden" name="action" value="mp_import_prices_csv" />
						<?php wp_nonce_field( 'mp_bpe_csv_import', 'mp_bpe_csv_nonce' ); ?>
						<div>
							<strong style="display:block;font-size:14px;color:#0f172a;"><?php esc_html_e( 'Bulk Import Prices & Stock via CSV', 'mobile-pasal' ); ?></strong>
							<span style="font-size:12.5px;color:#475569;"><?php esc_html_e( 'Tip: Click "Export CSV" first, edit prices in Excel or Google Sheets, and upload the saved CSV file here.', 'mobile-pasal' ); ?></span>
						</div>
						<div style="display:flex;align-items:center;gap:10px;">
							<input type="file" name="mp_csv_file" accept=".csv,text/csv" required />
							<button type="submit" class="bopt-save-btn" style="padding:8px 18px;">
								<i class="fa-solid fa-upload"></i> <?php esc_html_e( 'Upload & Apply CSV', 'mobile-pasal' ); ?>
							</button>
						</div>
					</form>
				</div>
			</div>
			<form id="mpBpeForm" onsubmit="return false;">
				<input type="hidden" name="nonce" value="<?php echo esc_attr( $nonce ); ?>" />

				<!-- Global Price Visibility Master Bar -->
				<div class="bopt-card" style="margin-bottom:20px;">
					<div class="bopt-card-header">
						<div class="bopt-card-header-left">
							<div class="bopt-card-header-icon"><i class="fa-solid fa-eye"></i></div>
							<div>
								<h3 class="bopt-card-title"><?php esc_html_e( 'Master Handset Price Visibility & Inquiry Mode', 'mobile-pasal' ); ?></h3>
								<p class="bopt-card-desc"><?php esc_html_e( 'Toggle whether retail prices are shown across your website, or switch to "Inquire for Counter Rate" during rapid market price fluctuations.', 'mobile-pasal' ); ?></p>
							</div>
						</div>
					</div>
					<div class="bopt-card-body">
						<div style="display:grid;grid-template-columns:1fr 1.2fr 1.4fr;gap:18px;align-items:center;">
							<div>
								<label style="display:flex;align-items:center;gap:12px;cursor:pointer;font-weight:700;color:#0f172a;font-size:14px;">
									<span class="bopt-switch">
										<input type="hidden" name="global_show_price" value="0" />
										<input type="checkbox" id="mpBpeGlobalShowPrice" name="global_show_price" value="1" <?php checked( ! empty( $global_show_price ) ); ?> />
										<span class="bopt-slider"></span>
									</span>
									<span id="mpBpeGlobalStateLabel">
										<?php echo ! empty( $global_show_price ) ? esc_html__( 'Prices Visible Globally', 'mobile-pasal' ) : esc_html__( 'Prices Hidden (Inquiry Mode)', 'mobile-pasal' ); ?>
									</span>
								</label>
								<p class="bopt-desc" style="margin-top:6px;"><?php esc_html_e( 'You can also override price visibility per individual phone in the table below.', 'mobile-pasal' ); ?></p>
							</div>
							<div>
								<label class="bopt-label" style="display:block;margin-bottom:4px;font-size:12px;"><?php esc_html_e( 'Hidden Price Badge Text', 'mobile-pasal' ); ?></label>
								<input type="text" name="global_hidden_text" value="<?php echo esc_attr( $global_hidden_text ); ?>" class="bopt-text-input" />
							</div>
							<div>
								<label class="bopt-label" style="display:block;margin-bottom:4px;font-size:12px;"><?php esc_html_e( 'Hidden Price Sub-Note', 'mobile-pasal' ); ?></label>
								<input type="text" name="global_hidden_note" value="<?php echo esc_attr( $global_hidden_note ); ?>" class="bopt-text-input" />
							</div>
						</div>
					</div>
				</div>

				<!-- Filter & Search Bar -->
				<div class="bopt-filter-bar" style="background:#fff;padding:14px 18px;border-radius:12px;border:1px solid #e2e8f0;margin-bottom:18px;">
					<div class="bopt-filter-pills" id="mpBpeBrandPills">
						<button type="button" class="bopt-filter-pill is-active" data-brand="all">
							<?php esc_html_e( 'All Brands', 'mobile-pasal' ); ?>
							<span class="bopt-pill-count"><?php echo count( $handsets ); ?></span>
						</button>
						<?php if ( ! is_wp_error( $brands ) && ! empty( $brands ) ) : ?>
							<?php foreach ( $brands as $brand ) : ?>
								<button type="button" class="bopt-filter-pill" data-brand="<?php echo esc_attr( strtolower( $brand->name ) ); ?>">
									<?php echo esc_html( $brand->name ); ?>
									<span class="bopt-pill-count"><?php echo esc_html( $brand->count ); ?></span>
								</button>
							<?php endforeach; ?>
						<?php endif; ?>
					</div>

					<div style="display:flex;gap:10px;align-items:center;flex-wrap:wrap;">
						<select id="mpBpeStockFilter" style="border-radius:8px;border:1.5px solid #cbd5e1;padding:6px 12px;font-size:13px;font-weight:600;min-height:38px;">
							<option value="all"><?php esc_html_e( 'All Stock Statuses', 'mobile-pasal' ); ?></option>
							<option value="in_stock"><?php esc_html_e( 'In Stock Only', 'mobile-pasal' ); ?></option>
							<option value="low_stock"><?php esc_html_e( 'Low Stock Only', 'mobile-pasal' ); ?></option>
							<option value="pre_order"><?php esc_html_e( 'Pre-Order Only', 'mobile-pasal' ); ?></option>
							<option value="out_of_stock"><?php esc_html_e( 'Out of Stock Only', 'mobile-pasal' ); ?></option>
						</select>
						<div class="bopt-inquiries-search">
							<i class="fa-solid fa-magnifying-glass"></i>
							<input type="text" id="mpBpeSearchInput" placeholder="<?php esc_attr_e( 'Search model, price, badge...', 'mobile-pasal' ); ?>" />
						</div>
					</div>
				</div>

				<!-- Spreadsheet Table -->
				<div class="bopt-table-wrap" style="display:block;overflow-x:auto;">
					<table class="bopt-table mp-bpe-table" style="min-width:960px;">
						<thead>
							<tr>
								<th style="width:28%;"><?php esc_html_e( 'Handset Model & Brand', 'mobile-pasal' ); ?></th>
								<th style="width:16%;"><?php esc_html_e( 'Showroom Price', 'mobile-pasal' ); ?></th>
								<th style="width:15%;"><?php esc_html_e( 'Old Price (Strikethrough)', 'mobile-pasal' ); ?></th>
								<th style="width:14%;"><?php esc_html_e( 'Promo Badge', 'mobile-pasal' ); ?></th>
								<th style="width:14%;"><?php esc_html_e( 'Stock Status', 'mobile-pasal' ); ?></th>
								<th style="width:13%;"><?php esc_html_e( 'Price Display', 'mobile-pasal' ); ?></th>
							</tr>
						</thead>
						<tbody id="mpBpeTableBody">
							<?php foreach ( $handsets as $h ) :
								$pid        = $h->ID;
								$price      = get_post_meta( $pid, '_mp_price', true );
								$old_price  = get_post_meta( $pid, '_mp_old_price', true );
								$badge      = get_post_meta( $pid, '_mp_badge', true );
								$stock      = get_post_meta( $pid, '_mp_stock_status', true ) ?: 'in_stock';
								$show_price = get_post_meta( $pid, '_mp_show_price', true ) ?: 'inherit';
								$thumb      = get_the_post_thumbnail_url( $pid, 'thumbnail' );
								$term_names = wp_get_post_terms( $pid, 'device_brand', array( 'fields' => 'names' ) );
								$brand_str  = ! empty( $term_names ) && ! is_wp_error( $term_names ) ? implode( ', ', $term_names ) : 'Uncategorized';
								$proc       = get_post_meta( $pid, '_mp_processor', true );
							?>
								<tr class="mp-bpe-row"
									data-brand="<?php echo esc_attr( strtolower( $brand_str ) ); ?>"
									data-stock="<?php echo esc_attr( $stock ); ?>"
									data-search="<?php echo esc_attr( strtolower( $h->post_title . ' ' . $brand_str . ' ' . $price . ' ' . $badge . ' ' . $proc ) ); ?>">
									<td>
										<div style="display:flex;align-items:center;gap:12px;">
											<div class="bopt-cpt-card-thumb" style="width:44px;height:44px;<?php echo $thumb ? 'background-image:url(\'' . esc_url( $thumb ) . '\');background-size:contain;background-repeat:no-repeat;' : ''; ?>">
												<?php if ( ! $thumb ) : ?>
													<i class="fa-solid fa-mobile-screen"></i>
												<?php endif; ?>
											</div>
											<div>
												<strong style="display:block;font-size:13.5px;color:#0f172a;"><?php echo esc_html( $h->post_title ); ?></strong>
												<div style="display:flex;gap:8px;align-items:center;margin-top:3px;font-size:11.5px;color:#64748b;">
													<span style="background:#eff6ff;color:#0066cc;padding:1px 7px;border-radius:4px;font-weight:700;"><?php echo esc_html( $brand_str ); ?></span>
													<a href="<?php echo esc_url( get_edit_post_link( $pid ) ); ?>" style="color:#475569;text-decoration:none;"><i class="fa-solid fa-pen"></i> <?php esc_html_e( 'Edit Specs', 'mobile-pasal' ); ?></a>
													<a href="<?php echo esc_url( get_permalink( $pid ) ); ?>" target="_blank" style="color:#0066cc;text-decoration:none;"><i class="fa-solid fa-arrow-up-right-from-square"></i> <?php esc_html_e( 'View', 'mobile-pasal' ); ?></a>
												</div>
											</div>
										</div>
									</td>
									<td>
										<input type="text"
											   name="items[<?php echo esc_attr( $pid ); ?>][price]"
											   value="<?php echo esc_attr( $price ); ?>"
											   placeholder="Rs. 51,999"
											   class="bopt-text-input"
											   style="font-weight:700;color:#0f172a;" />
									</td>
									<td>
										<input type="text"
											   name="items[<?php echo esc_attr( $pid ); ?>][old_price]"
											   value="<?php echo esc_attr( $old_price ); ?>"
											   placeholder="Rs. 55,000"
											   class="bopt-text-input"
											   style="color:#64748b;" />
									</td>
									<td>
										<input type="text"
											   name="items[<?php echo esc_attr( $pid ); ?>][badge]"
											   value="<?php echo esc_attr( $badge ); ?>"
											   placeholder="NTA Official"
											   class="bopt-text-input" />
									</td>
									<td>
										<select name="items[<?php echo esc_attr( $pid ); ?>][stock]" class="bopt-text-input" style="padding:6px 10px;font-weight:600;">
											<option value="in_stock" <?php selected( $stock, 'in_stock' ); ?>><?php esc_html_e( 'In Stock', 'mobile-pasal' ); ?></option>
											<option value="low_stock" <?php selected( $stock, 'low_stock' ); ?>><?php esc_html_e( 'Low Stock', 'mobile-pasal' ); ?></option>
											<option value="pre_order" <?php selected( $stock, 'pre_order' ); ?>><?php esc_html_e( 'Pre-Order', 'mobile-pasal' ); ?></option>
											<option value="out_of_stock" <?php selected( $stock, 'out_of_stock' ); ?>><?php esc_html_e( 'Out of Stock', 'mobile-pasal' ); ?></option>
										</select>
									</td>
									<td>
										<select name="items[<?php echo esc_attr( $pid ); ?>][show_price]" class="bopt-text-input" style="padding:6px 10px;">
											<option value="inherit" <?php selected( $show_price, 'inherit' ); ?>><?php esc_html_e( 'Global Rule', 'mobile-pasal' ); ?></option>
											<option value="show" <?php selected( $show_price, 'show' ); ?>><?php esc_html_e( 'Always Show', 'mobile-pasal' ); ?></option>
											<option value="hide" <?php selected( $show_price, 'hide' ); ?>><?php esc_html_e( 'Hide Price', 'mobile-pasal' ); ?></option>
										</select>
									</td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>

				<div style="margin-top:20px;display:flex;justify-content:flex-end;">
					<button type="button" class="bopt-save-btn" id="mpBpeSaveAllBottomBtn" style="padding:12px 26px;font-size:14px;">
						<i class="fa-solid fa-floppy-disk"></i>
						<span><?php esc_html_e( 'Save All Handset Prices & Stock (Ctrl+S)', 'mobile-pasal' ); ?></span>
					</button>
				</div>
			</form>
		</div>

		<div class="bopt-toast" id="mpBpeToast" style="display:none;" role="status" aria-live="polite">
			<i class="fa-solid fa-circle-check bopt-toast-icon"></i>
			<span class="bopt-toast-msg" id="mpBpeToastMsg"></span>
		</div>
	</div>

	<script>
	jQuery(function($) {
		var activeBrand = 'all';
		var activeStock = 'all';

		function filterRows() {
			var q = ($('#mpBpeSearchInput').val() || '').toLowerCase().trim();
			$('.mp-bpe-row').each(function() {
				var $r = $(this);
				var b  = String($r.data('brand') || '');
				var s  = String($r.data('stock') || '');
				var st = String($r.data('search') || '');
				var matchBrand = (activeBrand === 'all') || (b.indexOf(activeBrand) !== -1);
				var matchStock = (activeStock === 'all') || (s === activeStock);
				var matchQuery = (!q) || (st.indexOf(q) !== -1);
				$r.toggle(matchBrand && matchStock && matchQuery);
			});
		}

		$('#mpBpeBrandPills').on('click', '.bopt-filter-pill', function() {
			$('#mpBpeBrandPills .bopt-filter-pill').removeClass('is-active');
			$(this).addClass('is-active');
			activeBrand = $(this).data('brand') || 'all';
			filterRows();
		});

		$('#mpBpeStockFilter').on('change', function() {
			activeStock = $(this).val() || 'all';
			filterRows();
		});

		$('#mpBpeSearchInput').on('input keyup', filterRows);

		$('#mpBpeGlobalShowPrice').on('change', function() {
			$('#mpBpeGlobalStateLabel').text(this.checked ? 'Prices Visible Globally' : 'Prices Hidden (Inquiry Mode)');
		});

		function saveAllPrices() {
			var $btns = $('#mpBpeSaveAllTopBtn, #mpBpeSaveAllBottomBtn');
			$btns.prop('disabled', true).html('<i class="fa-solid fa-spinner fa-spin"></i> <span>Saving All Handsets...</span>');

			var payload = $('#mpBpeForm').serialize() + '&action=mp_bulk_save_handsets';
			$.post(ajaxurl, payload)
				.done(function(res) {
					var $toast = $('#mpBpeToast');
					if (res && res.success) {
						$toast.removeClass('is-error');
						$('#mpBpeToastMsg').text(res.data.message || 'Saved successfully!');
					} else {
						$toast.addClass('is-error');
						$('#mpBpeToastMsg').text((res && res.data && res.data.message) ? res.data.message : 'Save failed.');
					}
					$toast.stop(true, true).fadeIn(200);
					setTimeout(function() { $toast.fadeOut(350); }, 3800);
				})
				.always(function() {
					$btns.prop('disabled', false).html('<i class="fa-solid fa-floppy-disk"></i> <span>Save All Prices & Stock</span> <span class="bopt-key-hint">Ctrl+S</span>');
				});
		}

		$('#mpBpeSaveAllTopBtn, #mpBpeSaveAllBottomBtn').on('click', function(e) {
			e.preventDefault();
			saveAllPrices();
		});

		$(document).on('keydown', function(e) {
			if ((e.ctrlKey || e.metaKey) && (e.key === 's' || e.keyCode === 83)) {
				e.preventDefault();
				saveAllPrices();
			}
		});
	});
	</script>
	<?php
}
