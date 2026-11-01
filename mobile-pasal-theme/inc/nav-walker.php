<?php
/**
 * Custom Navigation Walker for Mobile Pasal Theme
 *
 * Provides full dynamic WordPress menu support with desktop dropdowns,
 * mobile drawer accordion navigation, active page highlighting,
 * and elegant fallback handling.
 *
 * @package MobilePasal
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class MP_Nav_Walker extends Walker_Nav_Menu {

	/**
	 * Starts the list before the elements are added.
	 *
	 * @param string   $output Used to append additional content (passed by reference).
	 * @param int      $depth  Depth of menu item. Used for padding.
	 * @param stdClass $args   An object of wp_nav_menu() arguments.
	 */
	public function start_lvl( &$output, $depth = 0, $args = null ) {
		$indent  = str_repeat( "\t", $depth );
		$output .= "\n{$indent}<ul class=\"sub-menu sub-depth-{$depth}\">\n";
	}

	/**
	 * Starts the element output.
	 *
	 * @param string   $output            Used to append additional content (passed by reference).
	 * @param WP_Post  $data_object       Menu item data object.
	 * @param int      $depth              Depth of menu item. Used for padding.
	 * @param stdClass $args               An object of wp_nav_menu() arguments.
	 * @param int      $current_object_id Optional. ID of the current menu item. Default 0.
	 */
	public function start_el( &$output, $data_object, $depth = 0, $args = null, $current_object_id = 0 ) {
		$item   = $data_object;
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$classes   = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;

		$has_children = in_array( 'menu-item-has-children', $classes, true );

		// Detect active state
		$is_active = in_array( 'current-menu-item', $classes, true ) ||
		             in_array( 'current_page_item', $classes, true ) ||
		             in_array( 'current-menu-ancestor', $classes, true ) ||
		             in_array( 'current_page_ancestor', $classes, true );

		$class_names = implode( ' ', array_filter( $classes ) );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

		$output .= $indent . '<li' . $class_names . '>';

		$atts           = array();
		$atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
		$atts['target'] = ! empty( $item->target ) ? $item->target : '';
		$atts['rel']    = ! empty( $item->xfn ) ? $item->xfn : '';
		$atts['href']   = ! empty( $item->url ) ? $item->url : '';

		if ( $is_active ) {
			$atts['class'] = 'active';
		}

		$attributes = '';
		foreach ( $atts as $attr => $value ) {
			if ( ! empty( $value ) ) {
				$value       = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
				$attributes .= ' ' . $attr . '="' . $value . '"';
			}
		}

		$title = apply_filters( 'the_title', $item->title, $item->ID );

		$item_output  = isset( $args->before ) ? $args->before : '';
		$item_output .= '<a' . $attributes . '>';
		$item_output .= ( isset( $args->link_before ) ? $args->link_before : '' ) . $title . ( isset( $args->link_after ) ? $args->link_after : '' );

		if ( $has_children && 0 === $depth ) {
			$item_output .= '<span class="sub-arrow-wrap" aria-hidden="true"><svg viewBox="0 0 24 24" width="11" height="11" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="6 9 12 15 18 9"></polyline></svg></span>';
		} elseif ( $has_children && $depth > 0 ) {
			$item_output .= '<span class="sub-arrow-wrap right-arrow" aria-hidden="true"><svg viewBox="0 0 24 24" width="11" height="11" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="9 18 15 12 9 6"></polyline></svg></span>';
		}

		$item_output .= '</a>';

		if ( $has_children ) {
			$item_output .= '<button type="button" class="mobile-dropdown-btn" aria-label="' . esc_attr__( 'Toggle submenu', 'mobile-pasal' ) . '" aria-expanded="false"><svg viewBox="0 0 24 24" width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="6 9 12 15 18 9"></polyline></svg></button>';
		}

		$item_output .= isset( $args->after ) ? $args->after : '';

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}

/**
 * Fallback callback when no primary nav menu is assigned under Appearance > Menus
 */
function mp_nav_fallback() {
	?>
	<ul class="primary-menu-list">
		<li class="<?php echo is_front_page() ? 'current-menu-item' : ''; ?>">
			<a class="<?php echo is_front_page() ? 'active' : ''; ?>" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'mobile-pasal' ); ?></a>
		</li>
		<li class="<?php echo is_page( 'shop' ) ? 'current-menu-item' : ''; ?>">
			<a class="<?php echo is_page( 'shop' ) ? 'active' : ''; ?>" href="<?php echo esc_url( home_url( '/shop/' ) ); ?>"><?php esc_html_e( 'Shop Handsets', 'mobile-pasal' ); ?></a>
		</li>
		<li class="<?php echo is_page( 'services' ) ? 'current-menu-item' : ''; ?>">
			<a class="<?php echo is_page( 'services' ) ? 'active' : ''; ?>" href="<?php echo esc_url( home_url( '/services/' ) ); ?>"><?php esc_html_e( 'Services & Lab', 'mobile-pasal' ); ?></a>
		</li>
		<li>
			<a href="<?php echo is_front_page() ? '#flagship' : esc_url( home_url( '/#flagship' ) ); ?>"><?php esc_html_e( 'iPhone 16 Pro', 'mobile-pasal' ); ?></a>
		</li>
		<li class="<?php echo is_page( 'about' ) ? 'current-menu-item' : ''; ?>">
			<a class="<?php echo is_page( 'about' ) ? 'active' : ''; ?>" href="<?php echo esc_url( home_url( '/about/' ) ); ?>"><?php esc_html_e( 'About', 'mobile-pasal' ); ?></a>
		</li>
		<li class="<?php echo is_page( 'contact' ) ? 'current-menu-item' : ''; ?>">
			<a class="<?php echo is_page( 'contact' ) ? 'active' : ''; ?>" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Contact', 'mobile-pasal' ); ?></a>
		</li>
	</ul>
	<?php
}
