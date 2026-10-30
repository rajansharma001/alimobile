/**
 * Ali Mobile Center & Apple Fix - Custom Post Types Admin Script
 * Handles Interactive Stock Selector, Star Rating Picker, and Mobile Sticky Action Dock
 *
 * @package Mobile_Pasal
 * @version 3.5.0
 */

( function ( $ ) {
	'use strict';

	$( document ).ready( function () {

		// 1. Interactive Stock Status Pills
		$( document ).on( 'click', '.mp-stock-pill-btn', function ( e ) {
			e.preventDefault();
			var status = $( this ).data( 'stock' );
			var $select = $( '#mp_stock_status' );

			if ( $select.length ) {
				$select.val( status ).trigger( 'change' );
			}

			$( '.mp-stock-pill-btn' ).removeClass( 'is-selected' );
			$( this ).addClass( 'is-selected' );
		} );

		// Sync initial stock selection from hidden select
		var currentStock = $( '#mp_stock_status' ).val();
		if ( currentStock ) {
			$( '.mp-stock-pill-btn[data-stock="' + currentStock + '"]' ).addClass( 'is-selected' );
		}

		// 2. Interactive Star Rating Picker for Customer Reviews
		$( document ).on( 'click', '.mp-star-item', function () {
			var score = parseInt( $( this ).data( 'score' ), 10 );
			var $select = $( '#mp_review_rating' );

			if ( $select.length ) {
				$select.val( score ).trigger( 'change' );
			}

			highlightStars( score );
		} );

		function highlightStars( score ) {
			$( '.mp-star-item' ).each( function () {
				var itemScore = parseInt( $( this ).data( 'score' ), 10 );
				if ( itemScore <= score ) {
					$( this ).removeClass( 'fa-regular' ).addClass( 'fa-solid is-active' );
				} else {
					$( this ).removeClass( 'fa-solid is-active' ).addClass( 'fa-regular' );
				}
			} );
		}

		// Initial star rating highlight
		var initialRating = parseInt( $( '#mp_review_rating' ).val(), 10 ) || 5;
		highlightStars( initialRating );

		// 3. Mobile Sticky Bottom Action Dock (Screens <= 782px)
		function initMobileDock() {
			if ( $( '#mp-cpt-mobile-dock' ).length || $( '#publish' ).length === 0 ) {
				return;
			}

			var isPublished = $( '#original_post_status' ).val() === 'publish';
			var btnLabel    = isPublished ? 'Save & Update' : 'Publish Now';

			var dockHtml = '<div id="mp-cpt-mobile-dock">' +
				'<button type="button" class="mp-dock-btn-save" id="mpDockSaveBtn">' +
					'<i class="fa-solid fa-floppy-disk"></i> <span>' + btnLabel + '</span>' +
				'</button>' +
				'<button type="button" class="mp-dock-btn-preview" id="mpDockPreviewBtn">' +
					'<i class="fa-solid fa-eye"></i>' +
				'</button>' +
			'</div>';

			$( 'body' ).append( dockHtml );

			// Hook mobile save button to standard WP publish button
			$( document ).on( 'click', '#mpDockSaveBtn', function ( e ) {
				e.preventDefault();
				$( this ).prop( 'disabled', true ).find( 'span' ).text( 'Saving...' );
				$( '#publish' ).trigger( 'click' );
			} );

			// Hook mobile preview button
			$( document ).on( 'click', '#mpDockPreviewBtn', function ( e ) {
				e.preventDefault();
				var $preview = $( '#post-preview' );
				if ( $preview.length ) {
					$preview.trigger( 'click' );
				}
			} );
		}

		if ( window.innerWidth <= 782 ) {
			initMobileDock();
		}

		$( window ).on( 'resize', function () {
			if ( window.innerWidth <= 782 ) {
				initMobileDock();
			} else {
				$( '#mp-cpt-mobile-dock' ).remove();
			}
		} );

	} );

} )( jQuery );
