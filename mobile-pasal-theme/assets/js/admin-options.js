/**
 * Ali Mobile Center & Apple Fix — Theme Options Dashboard Engine
 * Clean Single-Sidebar Navigation, Instant Tab Switching, Accordion Categories,
 * Live Search Filter, Native wp.media & Keyboard Shortcuts (Ctrl+S)
 *
 * @package Mobile_Pasal
 * @version 3.0.0
 */
( function ( $ ) {
	'use strict';

	window.mobilePasalOptions = window.mobilePasalOptions || {};

	/**
	 * 1. Instant, Reliable Tab Switching Without Page Reload
	 */
	window.boptSwitchTab = function ( tabKey, event ) {
		if ( event && typeof event.preventDefault === 'function' ) {
			event.preventDefault();
		}

		if ( ! tabKey ) return;

		// Clean key if passed as hash '#tab-...'
		tabKey = tabKey.replace( /^#tab-/, '' ).replace( /^#/, '' );

		// Validate pane exists, fallback if not found
		var $targetPane = $( '#tab-pane-' + tabKey );
		if ( ! $targetPane.length ) {
			tabKey = 'colors';
			$targetPane = $( '#tab-pane-colors' );
		}

		// 1. Sidebar Nav Items: Highlight active item
		$( '.bopt-nav-item' ).removeClass( 'is-active' );
		var $activeItem = $( '.bopt-nav-item[data-tab-target="' + tabKey + '"]' );
		if ( $activeItem.length ) {
			$activeItem.addClass( 'is-active' );

			// Ensure parent accordion group is expanded
			var $group = $activeItem.closest( '.bopt-nav-group' );
			$( '.bopt-nav-group' ).removeClass( 'is-active-group' );
			$group.addClass( 'is-active-group is-expanded' ).removeClass( 'is-collapsed' );
			$group.find( '.bopt-nav-list' ).show();
		}

		// 2. Tab Panes: Hide all, show target pane
		$( '.bopt-tab-pane' ).hide().removeClass( 'is-active' );
		if ( $targetPane.length ) {
			$targetPane.show().addClass( 'is-active' );
		}

		// 3. Update floating footer status labels & breadcrumbs
		var tabTitle = $activeItem.find( '.bopt-nav-label' ).text().trim() || $activeItem.text().trim() || tabKey;
		var groupTitle = $activeItem.closest( '.bopt-nav-group' ).find( '.bopt-group-title-left span' ).text().trim();
		if ( $( '#boptActiveTabLabel' ).length && tabTitle ) {
			$( '#boptActiveTabLabel' ).text( tabTitle );
		}
		if ( $( '#boptActiveModuleLabel' ).length && groupTitle ) {
			$( '#boptActiveModuleLabel' ).text( groupTitle );
		}
		if ( $( '#boptBreadcrumbModule' ).length && groupTitle ) {
			$( '#boptBreadcrumbModule' ).text( groupTitle );
		}
		if ( $( '#boptBreadcrumbTab' ).length && tabTitle ) {
			$( '#boptBreadcrumbTab' ).text( tabTitle );
		}

		// 4. Update hidden form input so saving preserves active tab
		$( '#boptCurrentTabInput' ).val( tabKey );

		// 5. Update browser URL hash cleanly without jumping
		var targetHash = '#tab-' + tabKey;
		if ( window.location.hash !== targetHash ) {
			if ( window.history && window.history.replaceState ) {
				window.history.replaceState( null, null, targetHash );
			} else {
				window.location.hash = targetHash;
			}
		}

		// 6. Scroll smoothly to top of content canvas
		var $content = $( '.bopt-content' );
		if ( $content.length && $( window ).scrollTop() > 100 ) {
			$( 'html, body' ).animate( { scrollTop: 0 }, 150 );
		}

		// 7. On mobile/tablet, close drawer after selection
		if ( $( window ).width() <= 1024 ) {
			$( '#boptSidebar' ).removeClass( 'is-mobile-open' );
		}
	};

	/**
	 * 2. Hash Initialization on Page Load & History Back/Forward Support
	 */
	function initActiveTabFromUrl() {
		var hash = window.location.hash;
		var initialTab = $( '#boptCurrentTabInput' ).val() || 'colors';

		if ( hash && hash.indexOf( '#tab-' ) === 0 ) {
			var tabFromHash = hash.replace( '#tab-', '' );
			if ( $( '#tab-pane-' + tabFromHash ).length ) {
				initialTab = tabFromHash;
			}
		}

		window.boptSwitchTab( initialTab );
	}

	function initHashChangeListener() {
		$( window ).on( 'hashchange', function () {
			var hash = window.location.hash;
			if ( hash && hash.indexOf( '#tab-' ) === 0 ) {
				var tabKey = hash.replace( '#tab-', '' );
				if ( $( '#tab-pane-' + tabKey ).length ) {
					window.boptSwitchTab( tabKey );
				}
			}
		} );
	}

	/**
	 * 3. Direct Event Delegation for Sidebar Tab Clicks
	 */
	function initTabClickHandlers() {
		$( document ).on( 'click', '.bopt-nav-link', function ( e ) {
			e.preventDefault();
			var tabKey = $( this ).data( 'tab' ) || $( this ).closest( '.bopt-nav-item' ).data( 'tab-target' );
			if ( tabKey ) {
				window.boptSwitchTab( tabKey, e );
			}
		} );

		$( document ).on( 'click', '.bopt-nav-item', function ( e ) {
			if ( $( e.target ).closest( '.bopt-nav-link' ).length ) return;
			e.preventDefault();
			var tabKey = $( this ).data( 'tab-target' );
			if ( tabKey ) {
				window.boptSwitchTab( tabKey, e );
			}
		} );
	}

	/**
	 * 4. Collapsible Accordion Groups in Left Sidebar
	 */
	function initAccordionGroups() {
		$( document ).on( 'click', '.bopt-nav-group-title', function ( e ) {
			e.preventDefault();
			var $group = $( this ).closest( '.bopt-nav-group' );
			var $list = $group.find( '.bopt-nav-list' );

			if ( $group.hasClass( 'is-collapsed' ) ) {
				$group.removeClass( 'is-collapsed' ).addClass( 'is-expanded' );
				$list.slideDown( 180 );
			} else {
				$group.addClass( 'is-collapsed' ).removeClass( 'is-expanded' );
				$list.slideUp( 180 );
			}
		} );

		// Expand all / Collapse all toggle button
		$( document ).on( 'click', '#boptToggleAllAccordions', function ( e ) {
			e.preventDefault();
			var $groups = $( '.bopt-nav-group' );
			var anyCollapsed = $groups.filter( '.is-collapsed' ).length > 0;

			if ( anyCollapsed ) {
				$groups.removeClass( 'is-collapsed' ).addClass( 'is-expanded' );
				$( '.bopt-nav-list' ).slideDown( 180 );
				$( this ).html( '<i class="fa-solid fa-angles-up"></i> Collapse All' );
			} else {
				$groups.addClass( 'is-collapsed' ).removeClass( 'is-expanded' );
				$( '.bopt-nav-list' ).slideUp( 180 );
				$( this ).html( '<i class="fa-solid fa-angles-down"></i> Expand All' );
			}
		} );
	}

	/**
	 * 5. Responsive Mobile & Tablet Sidebar Drawer Toggle
	 */
	function initMobileDrawer() {
		$( document ).on( 'click', '#boptSidebarToggle', function ( e ) {
			e.preventDefault();
			$( '#boptSidebar' ).toggleClass( 'is-mobile-open' );
		} );

		// Close drawer when clicking outside on mobile
		$( document ).on( 'click', function ( e ) {
			if ( $( window ).width() <= 1024 ) {
				if ( ! $( e.target ).closest( '#boptSidebar, #boptSidebarToggle' ).length ) {
					$( '#boptSidebar' ).removeClass( 'is-mobile-open' );
				}
			}
		} );
	}

	/**
	 * 6. Live Search & Real-Time Filter
	 */
	function initSearchFilter() {
		var $input    = $( '#boptSearchInput' );
		var $clearBtn = $( '#boptSearchClear' );

		if ( ! $input.length ) return;

		$input.on( 'input keyup', function () {
			var query = $( this ).val().toLowerCase().trim();

			if ( query.length > 0 ) {
				$clearBtn.show();
			} else {
				$clearBtn.hide();
			}

			if ( ! query ) {
				$( '.bopt-nav-item' ).show();
				$( '.bopt-nav-group' ).show();
				$( '.bopt-field' ).show();
				$( '.bopt-card' ).show();
				return;
			}

			// 1. Filter sidebar nav items
			$( '.bopt-nav-item' ).each( function () {
				var text = $( this ).text().toLowerCase();
				var target = $( this ).data( 'tab-target' ) || '';
				if ( text.indexOf( query ) !== -1 || target.toLowerCase().indexOf( query ) !== -1 ) {
					$( this ).show();
				} else {
					$( this ).hide();
				}
			} );

			// 2. Expand & show groups with matching items
			$( '.bopt-nav-group' ).each( function () {
				var visibleCount = $( this ).find( '.bopt-nav-item:visible' ).length;
				if ( visibleCount > 0 ) {
					$( this ).show().removeClass( 'is-collapsed' ).addClass( 'is-expanded' );
					$( this ).find( '.bopt-nav-list' ).show();
				} else {
					$( this ).hide();
				}
			} );

			// 3. Filter fields in currently active tab pane
			var $activePane = $( '.bopt-tab-pane.is-active' );
			$activePane.find( '.bopt-field' ).each( function () {
				var fieldText = $( this ).text().toLowerCase();
				var key = $( this ).data( 'field-key' ) || '';
				if ( fieldText.indexOf( query ) !== -1 || key.toLowerCase().indexOf( query ) !== -1 ) {
					$( this ).show();
				} else {
					$( this ).hide();
				}
			} );

			// Also show/hide cards based on whether they have visible fields
			$activePane.find( '.bopt-card' ).each( function () {
				var visibleFields = $( this ).find( '.bopt-field:visible' ).length;
				if ( visibleFields > 0 ) {
					$( this ).show();
				} else {
					$( this ).hide();
				}
			} );
		} );

		// Clear search button
		$clearBtn.on( 'click', function ( e ) {
			e.preventDefault();
			$input.val( '' ).trigger( 'input' ).focus();
			$clearBtn.hide();
		} );
	}

	/**
	 * 7. Native WordPress Media Uploader (wp.media)
	 */
	function initMediaPicker() {
		$( document ).on( 'click', '.bopt-image-pick', function ( e ) {
			e.preventDefault();
			var $wrap  = $( this ).closest( '.bopt-image' );
			var $input = $wrap.find( '.bopt-image-input' );

			if ( typeof wp === 'undefined' || typeof wp.media === 'undefined' ) {
				alert( 'WordPress Media Library is unavailable. Please check permissions.' );
				return;
			}

			var frame = wp.media( {
				title:    window.mobilePasalOptions.choose_image || 'Select Store Media Asset',
				button:   { text: window.mobilePasalOptions.use_image || 'Use This Image' },
				multiple: false
			} );

			frame.on( 'select', function () {
				var attachment = frame.state().get( 'selection' ).first().toJSON();
				if ( attachment && attachment.url ) {
					$input.val( attachment.url ).trigger( 'change' );
					$wrap.find( '.bopt-image-preview' )
						.css( 'background-image', 'url(' + attachment.url + ')' )
						.html( '' );
					$wrap.find( '.bopt-image-clear' ).show();
				}
			} );

			frame.open();
		} );

		// Clear image
		$( document ).on( 'click', '.bopt-image-clear', function ( e ) {
			e.preventDefault();
			var $wrap = $( this ).closest( '.bopt-image' );
			$wrap.find( '.bopt-image-input' ).val( '' ).trigger( 'change' );
			$wrap.find( '.bopt-image-preview' )
				.css( 'background-image', '' )
				.html( '<span class="bopt-image-placeholder"><i class="fa-regular fa-image"></i></span>' );
			$( this ).hide();
		} );

		// Live preview on manual input
		$( document ).on( 'input change', '.bopt-image-input', function () {
			var url   = $( this ).val().trim();
			var $wrap = $( this ).closest( '.bopt-image' );
			if ( url ) {
				$wrap.find( '.bopt-image-preview' )
					.css( 'background-image', 'url(' + url + ')' )
					.html( '' );
				$wrap.find( '.bopt-image-clear' ).show();
			} else {
				$wrap.find( '.bopt-image-preview' )
					.css( 'background-image', '' )
					.html( '<span class="bopt-image-placeholder"><i class="fa-regular fa-image"></i></span>' );
				$wrap.find( '.bopt-image-clear' ).hide();
			}
		} );
	}

	/**
	 * 8. Color Pickers Initialization
	 */
	function initColorPickers() {
		if ( $.fn.wpColorPicker ) {
			$( '.bopt-color-input' ).each( function () {
				var $input   = $( this );
				var $tagWrap = $input.closest( '.bopt-color-wrap' ).find( '.bopt-color-hex-tag' );

				$input.wpColorPicker( {
					change: function ( event, ui ) {
						var hex = ui.color.toString();
						$tagWrap.text( hex );
					},
					clear: function () {
						$tagWrap.text( '#______' );
					}
				} );
			} );
		}
	}

	/**
	 * 9. Toggle Switch Live Text Updates
	 */
	function initToggleSwitches() {
		$( document ).on( 'change', '.bopt-switch input[type="checkbox"]', function () {
			var isChecked = $( this ).is( ':checked' );
			var $state = $( this ).closest( '.bopt-toggle-wrap' ).find( '.bopt-toggle-state' );
			$state.text( isChecked ? 'Active' : 'Disabled' );
		} );
	}

	/**
	 * 10. Keyboard Shortcut Ctrl+S / Cmd+S to Save Immediately
	 */
	function initKeyboardShortcuts() {
		$( document ).on( 'keydown', function ( e ) {
			if ( ( e.ctrlKey || e.metaKey ) && ( e.key === 's' || e.keyCode === 83 ) ) {
				e.preventDefault();
				var $form = $( '#bopt-main-form' );
				if ( $form.length ) {
					var $btn = $( '.bopt-save-btn' ).first();
					$btn.html( '<i class="fa-solid fa-spinner fa-spin"></i> Saving...' );
					$form.trigger( 'submit' );
				}
			}
		} );
	}

	/**
	 * 11. Top Bar Save Alert Dismissal
	 */
	function initSaveAlertAutoDismiss() {
		var $alert = $( '#boptSaveAlert' );
		if ( $alert.length ) {
			setTimeout( function () {
				$alert.fadeOut( 400 );
			}, 4000 );
		}
	}

	/**
	 * Document Ready Bootstrapper
	 */
	$( document ).ready( function () {
		initActiveTabFromUrl();
		initHashChangeListener();
		initTabClickHandlers();
		initAccordionGroups();
		initMobileDrawer();
		initSearchFilter();
		initMediaPicker();
		initColorPickers();
		initToggleSwitches();
		initKeyboardShortcuts();
		initSaveAlertAutoDismiss();
	} );

} )( jQuery );
