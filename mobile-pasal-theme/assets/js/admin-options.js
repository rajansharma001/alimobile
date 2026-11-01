/**
 * Ali Mobile Center & Apple Fix — Theme Options Dashboard Engine
 * Clean Single-Sidebar Navigation, Instant Tab Switching, Accordion Categories,
 * Live Search Filter, Native wp.media, Preset Swatches, Unsaved Change Alerts & Touch-Friendly Mobile UI
 *
 * @package Mobile_Pasal
 * @version 3.5.0
 */
( function ( $ ) {
	'use strict';

	window.mobilePasalOptions = window.mobilePasalOptions || {};

	/**
	 * 1. Instant Tab Switching
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
			$( 'body' ).removeClass( 'bopt-drawer-active' );
		}
	};

	/**
	 * 2. Hash Initialization on Page Load & History Back/Forward Support
	 */
	function initActiveTabFromUrl() {
		var hash = window.location.hash;
		var urlParams = window.URLSearchParams ? new URLSearchParams( window.location.search ) : null;
		var tabFromQuery = urlParams ? urlParams.get( 'tab' ) : '';
		var initialTab = tabFromQuery || $( '#boptCurrentTabInput' ).val() || 'colors';

		if ( ! tabFromQuery && hash && hash.indexOf( '#tab-' ) === 0 ) {
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
		// Open drawer
		$( document ).on( 'click', '#boptSidebarToggle', function ( e ) {
			e.preventDefault();
			$( '#boptSidebar' ).addClass( 'is-mobile-open' );
			$( 'body' ).addClass( 'bopt-drawer-active' );
		} );

		// Close drawer with close icon or clicking backdrop
		$( document ).on( 'click', '#boptDrawerClose, #boptDrawerOverlay', function ( e ) {
			e.preventDefault();
			$( '#boptSidebar' ).removeClass( 'is-mobile-open' );
			$( 'body' ).removeClass( 'bopt-drawer-active' );
		} );
	}

	/**
	 * 6. Live Cross-Tab Global Search & Real-Time Filter (Ctrl+K)
	 */
	function initSearchFilter() {
		var $input      = $( '#boptSearchInput' );
		var $clearBtn   = $( '#boptSearchClear' );
		var $resultsBox = $( '#boptGlobalSearchResults' );

		if ( ! $input.length ) return;

		// Build a fast in-memory index of all fields across all 31 tabs once on load
		var globalFieldIndex = [];
		$( '.bopt-tab-pane' ).each( function () {
			var $pane    = $( this );
			var paneId   = $pane.attr( 'id' ) || '';
			var tabSlug  = paneId.replace( 'tab-pane-', '' );
			var $navLink = $( '.bopt-nav-item[data-tab-target="' + tabSlug + '"]' );
			var tabTitle = $navLink.length ? $navLink.text().trim() : ( $pane.find( '.bopt-pane-header h2' ).text().trim() || tabSlug );

			$pane.find( '.bopt-field' ).each( function () {
				var $field     = $( this );
				var key        = $field.data( 'field-key' ) || '';
				var label      = $field.find( '.bopt-label' ).first().text().trim() || key;
				var desc       = $field.find( '.bopt-desc' ).first().text().trim() || '';
				var subtabPane = $field.closest( '.bopt-subnav-content' );
				var subtabId   = subtabPane.length ? subtabPane.attr( 'id' ) : '';

				globalFieldIndex.push( {
					tabSlug:    tabSlug,
					tabTitle:   tabTitle,
					key:        key,
					label:      label,
					desc:       desc,
					subtabId:   subtabId,
					searchText: ( tabTitle + ' ' + label + ' ' + desc + ' ' + key ).toLowerCase(),
					$field:     $field
				} );
			} );
		} );

		$input.on( 'input keyup', function () {
			var query = $( this ).val().toLowerCase().trim();

			if ( query.length > 0 ) {
				$clearBtn.show();
			} else {
				$clearBtn.hide();
				$resultsBox.hide().empty();
			}

			if ( ! query ) {
				$( '.bopt-nav-item' ).show();
				$( '.bopt-nav-group' ).show();
				$( '.bopt-field' ).show();
				$( '.bopt-card' ).show();
				return;
			}

			// 1. Render Cross-Tab Global Search Dropdown (up to 15 instant matches across all tabs)
			var matches = [];
			for ( var i = 0; i < globalFieldIndex.length; i++ ) {
				if ( globalFieldIndex[ i ].searchText.indexOf( query ) !== -1 ) {
					matches.push( globalFieldIndex[ i ] );
					if ( matches.length >= 15 ) break;
				}
			}

			if ( matches.length > 0 ) {
				var html = '<div class="bopt-gs-header">Found across tabs (' + matches.length + ( matches.length === 15 ? '+' : '' ) + ')</div>';
				for ( var m = 0; m < matches.length; m++ ) {
					var item = matches[ m ];
					html += '<button type="button" class="bopt-gs-item" data-tab="' + item.tabSlug + '" data-key="' + item.key + '" data-subtab="' + item.subtabId + '">' +
						'<span class="bopt-gs-item-label">' + $( '<div>' ).text( item.label ).html() + '</span>' +
						'<span class="bopt-gs-item-meta"><i class="fa-solid fa-folder-tree"></i> ' + $( '<div>' ).text( item.tabTitle ).html() + ' <code>' + item.key + '</code></span>' +
						'</button>';
				}
				$resultsBox.html( html ).show();
			} else {
				$resultsBox.html( '<div class="bopt-gs-empty">No matching fields found for "' + $( '<div>' ).text( query ).html() + '"</div>' ).show();
			}

			// 2. Also filter sidebar nav items that match tab title OR contain matching fields
			var matchingTabs = {};
			for ( var j = 0; j < globalFieldIndex.length; j++ ) {
				if ( globalFieldIndex[ j ].searchText.indexOf( query ) !== -1 ) {
					matchingTabs[ globalFieldIndex[ j ].tabSlug ] = true;
				}
			}

			$( '.bopt-nav-item' ).each( function () {
				var text   = $( this ).text().toLowerCase();
				var target = $( this ).data( 'tab-target' ) || '';
				if ( text.indexOf( query ) !== -1 || target.toLowerCase().indexOf( query ) !== -1 || matchingTabs[ target ] ) {
					$( this ).show();
				} else {
					$( this ).hide();
				}
			} );

			$( '.bopt-nav-group' ).each( function () {
				var visibleCount = $( this ).find( '.bopt-nav-item:visible' ).length;
				if ( visibleCount > 0 ) {
					$( this ).show().removeClass( 'is-collapsed' ).addClass( 'is-expanded' );
					$( this ).find( '.bopt-nav-list' ).show();
				} else {
					$( this ).hide();
				}
			} );
		} );

		// Click on a Cross-Tab Global Search Result -> Switch Tab, Open Subtab, Scroll & Highlight Field
		$( document ).on( 'click', '.bopt-gs-item', function ( e ) {
			e.preventDefault();
			var tabSlug  = $( this ).data( 'tab' );
			var fieldKey = $( this ).data( 'key' );
			var subtabId = $( this ).data( 'subtab' );

			$resultsBox.hide();
			$( '.bopt-field, .bopt-card' ).show();

			window.boptSwitchTab( tabSlug );

			setTimeout( function () {
				var $pane = $( '#tab-pane-' + tabSlug );
				if ( subtabId ) {
					$pane.find( '.bopt-subnav-pill[data-subtab="' + subtabId + '"]' ).trigger( 'click' );
				}
				var $targetField = $pane.find( '.bopt-field[data-field-key="' + fieldKey + '"]' );
				if ( $targetField.length ) {
					$targetField.closest( '.bopt-card' ).removeClass( 'is-collapsed' );
					$( 'html, body' ).animate( {
						scrollTop: Math.max( 0, $targetField.offset().top - 110 )
					}, 250 );
					$targetField.addClass( 'bopt-field-highlight' );
					setTimeout( function () {
						$targetField.removeClass( 'bopt-field-highlight' );
					}, 2200 );
				}
			}, 80 );
		} );

		// Hide search results dropdown when clicking outside
		$( document ).on( 'click', function ( e ) {
			if ( ! $( e.target ).closest( '.bopt-search-box' ).length ) {
				$resultsBox.hide();
			}
		} );

		// Clear search button
		$clearBtn.on( 'click', function ( e ) {
			e.preventDefault();
			$input.val( '' ).trigger( 'input' ).focus();
			$clearBtn.hide();
			$resultsBox.hide();
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
					triggerUnsavedChange();
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
			triggerUnsavedChange();
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
			triggerUnsavedChange();
		} );
	}

	/**
	 * 8. Color Pickers & 1-Click Preset Palettes
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
						triggerUnsavedChange();
					},
					clear: function () {
						$tagWrap.text( '#______' );
						triggerUnsavedChange();
					}
				} );
			} );
		}

		// 1-Click Preset Color Scheme Swatches
		$( document ).on( 'click', '.bopt-preset-swatch', function ( e ) {
			e.preventDefault();
			var primary = $( this ).data( 'primary' );
			var dark    = $( this ).data( 'dark' );
			var light   = $( this ).data( 'light' );

			if ( primary && $( '#opt_color_primary' ).length ) {
				updateColorField( '#opt_color_primary', primary );
			}
			if ( dark && $( '#opt_color_primary_dark' ).length ) {
				updateColorField( '#opt_color_primary_dark', dark );
			}
			if ( light && $( '#opt_color_primary_light' ).length ) {
				updateColorField( '#opt_color_primary_light', light );
			}

			triggerUnsavedChange();
		} );

		function updateColorField( selector, hex ) {
			var $input = $( selector );
			if ( ! $input.length ) return;
			$input.val( hex );
			if ( $input.data( 'wpColorPicker' ) ) {
				$input.wpColorPicker( 'color', hex );
			}
			var $tagWrap = $input.closest( '.bopt-color-wrap' ).find( '.bopt-color-hex-tag' );
			if ( $tagWrap.length ) {
				$tagWrap.text( hex );
			}
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
			triggerUnsavedChange();
		} );
	}

	/**
	 * 10. Unsaved Changes Floating Badge & Instant Toast Helper
	 */
	function triggerUnsavedChange() {
		var $badge = $( '#boptUnsavedPill' );
		if ( ! $badge.length ) {
			$badge = $( '<div class="bopt-unsaved-pill" id="boptUnsavedPill"><i class="fa-solid fa-circle-dot"></i> <span>Unsaved changes • Tap Save</span></div>' );
			$( 'body' ).append( $badge );
		}
		$badge.fadeIn( 250 );
	}

	function showBoptToast( message, isError ) {
		var $toast = $( '#boptToast' );
		if ( ! $toast.length ) {
			$toast = $( '<div class="bopt-toast" id="boptToast"><i class="fa-solid fa-circle-check bopt-toast-icon"></i><span class="bopt-toast-msg" id="boptToastMsg"></span></div>' );
			$( 'body' ).append( $toast );
		}
		$toast.toggleClass( 'is-error', !! isError );
		$toast.find( '.bopt-toast-icon' )
			.attr( 'class', isError ? 'fa-solid fa-triangle-exclamation bopt-toast-icon' : 'fa-solid fa-circle-check bopt-toast-icon' );
		$( '#boptToastMsg' ).text( message );
		$toast.stop( true, true ).fadeIn( 200 );
		setTimeout( function () {
			$toast.fadeOut( 350 );
		}, 3800 );
	}

	function initUnsavedTracker() {
		$( document ).on( 'input change', '#bopt-main-form input, #bopt-main-form textarea, #bopt-main-form select', function () {
			triggerUnsavedChange();
		} );
	}

	/**
	 * 10b. Instant AJAX Save, Tab Reset, Factory Reset, JSON Import & Snapshot Rollback
	 */
	function initAjaxSaveAndBackupActions() {
		var isSaving = false;

		$( document ).on( 'submit', '#bopt-main-form', function ( e ) {
			if ( ! window.mobilePasalOptions || ! window.mobilePasalOptions.ajax_url ) {
				return true; // fallback to normal submit
			}
			e.preventDefault();
			if ( isSaving ) return false;
			isSaving = true;

			var $form       = $( this );
			var $saveBtns   = $( '.bopt-save-btn' );
			var $mobSaveBtn = $( '#boptMobileSaveBtn' );

			$saveBtns.addClass( 'is-saving' ).prop( 'disabled', true );
			$mobSaveBtn.html( '<i class="fa-solid fa-spinner fa-spin"></i> <span>Saving...</span>' ).prop( 'disabled', true );

			var payload = $form.serialize() + '&action=mobile_pasal_ajax_save_options';

			$.post( window.mobilePasalOptions.ajax_url, payload )
				.done( function ( res ) {
					if ( res && res.success ) {
						$( '#boptUnsavedPill' ).fadeOut( 150 );
						showBoptToast( ( res.data && res.data.message ) ? res.data.message : 'All changes saved!', false );
					} else {
						showBoptToast( ( res && res.data && res.data.message ) ? res.data.message : 'Could not save changes.', true );
					}
				} )
				.fail( function () {
					// Fallback to normal submit if AJAX fails
					$form.off( 'submit' ).trigger( 'submit' );
				} )
				.always( function () {
					isSaving = false;
					$saveBtns.removeClass( 'is-saving' ).prop( 'disabled', false );
					$saveBtns.each( function () {
						if ( $( this ).attr( 'id' ) === 'boptTopbarSaveBtn' ) {
							$( this ).html( '<i class="fa-solid fa-floppy-disk"></i><span class="bopt-btn-text-full">Save Changes</span><span class="bopt-btn-text-short">Save</span><span class="bopt-key-hint">Ctrl+S</span>' );
						} else {
							$( this ).html( '<i class="fa-solid fa-floppy-disk"></i><span class="bopt-btn-text-full">Save All Settings</span><span class="bopt-btn-text-short">Save</span><span class="bopt-key-hint">Ctrl+S</span>' );
						}
					} );
					$mobSaveBtn.html( '<i class="fa-solid fa-floppy-disk"></i> <span>Save All Settings</span>' ).prop( 'disabled', false );
				} );

			return false;
		} );

		// Reset Current Active Tab to Defaults
		$( document ).on( 'click', '#boptResetCurrentTabBtn', function ( e ) {
			e.preventDefault();
			var $activePane = $( '.bopt-tab-pane.is-active' );
			var keys = [];
			$activePane.find( '.bopt-field[data-field-key]' ).each( function () {
				var k = $( this ).data( 'field-key' );
				if ( k ) keys.push( k );
			} );
			if ( ! keys.length ) {
				showBoptToast( 'No resettable fields in this tab.', true );
				return;
			}
			var tabName = $( '#boptActiveTabLabel' ).text() || 'this tab';
			if ( ! window.confirm( 'Reset all ' + keys.length + ' settings in "' + tabName + '" back to their factory defaults? (An automatic snapshot backup will be saved first.)' ) ) {
				return;
			}
			var $btn = $( this );
			$btn.prop( 'disabled', true ).html( '<i class="fa-solid fa-spinner fa-spin"></i> Resetting...' );
			$.post( window.mobilePasalOptions.ajax_url, {
				action:      'mobile_pasal_reset_options',
				nonce:       window.mobilePasalOptions.nonce,
				reset_scope: 'tab',
				field_keys:  keys
			} ).done( function ( res ) {
				if ( res && res.success ) {
					showBoptToast( res.data.message || 'Tab reset to defaults!', false );
					setTimeout( function () { window.location.reload(); }, 700 );
				} else {
					showBoptToast( 'Reset failed.', true );
					$btn.prop( 'disabled', false ).html( '<i class="fa-solid fa-rotate-left"></i> Reset Tab' );
				}
			} );
		} );

		// Factory Reset All Theme Options
		$( document ).on( 'click', '#boptFactoryResetAllBtn', function ( e ) {
			e.preventDefault();
			if ( ! window.confirm( 'Are you sure you want to restore ALL 639+ Theme Options to factory defaults? Your current settings will be backed up in the 5-Snapshot Time Machine.' ) ) {
				return;
			}
			var $btn = $( this );
			$btn.prop( 'disabled', true ).html( '<i class="fa-solid fa-spinner fa-spin"></i> Restoring Factory Defaults...' );
			$.post( window.mobilePasalOptions.ajax_url, {
				action:      'mobile_pasal_reset_options',
				nonce:       window.mobilePasalOptions.nonce,
				reset_scope: 'all'
			} ).done( function ( res ) {
				if ( res && res.success ) {
					showBoptToast( res.data.message || 'Factory defaults restored!', false );
					setTimeout( function () { window.location.reload(); }, 800 );
				} else {
					showBoptToast( 'Factory reset failed.', true );
					$btn.prop( 'disabled', false );
				}
			} );
		} );

		// Restore Snapshot from Time Machine
		$( document ).on( 'click', '.bopt-restore-snapshot-btn', function ( e ) {
			e.preventDefault();
			var backupId = $( this ).data( 'backup-id' );
			if ( ! backupId || ! window.confirm( 'Restore this configuration snapshot? Your current state will also be backed up automatically.' ) ) {
				return;
			}
			var $btn = $( this );
			$btn.prop( 'disabled', true ).html( '<i class="fa-solid fa-spinner fa-spin"></i> Restoring...' );
			$.post( window.mobilePasalOptions.ajax_url, {
				action:       'mobile_pasal_restore_backup',
				nonce:        window.mobilePasalOptions.nonce,
				restore_mode: 'snapshot',
				backup_id:    backupId
			} ).done( function ( res ) {
				if ( res && res.success ) {
					showBoptToast( res.data.message || 'Snapshot restored!', false );
					setTimeout( function () { window.location.reload(); }, 800 );
				} else {
					showBoptToast( ( res && res.data && res.data.message ) ? res.data.message : 'Restore failed.', true );
					$btn.prop( 'disabled', false ).html( '<i class="fa-solid fa-rotate-left"></i> Restore This Snapshot' );
				}
			} );
		} );

		// Read JSON File into Import Textarea
		$( document ).on( 'change', '#boptImportFileInput', function ( e ) {
			var file = e.target.files && e.target.files[ 0 ];
			if ( ! file ) return;
			var reader = new FileReader();
			reader.onload = function ( evt ) {
				$( '#boptImportJsonTextarea' ).val( evt.target.result );
			};
			reader.readAsText( file );
		} );

		// Import JSON Button
		$( document ).on( 'click', '#boptImportJsonBtn', function ( e ) {
			e.preventDefault();
			var rawJson = $( '#boptImportJsonTextarea' ).val().trim();
			if ( ! rawJson ) {
				showBoptToast( 'Please select a .json file or paste JSON content first.', true );
				return;
			}
			var $btn = $( this );
			$btn.prop( 'disabled', true ).html( '<i class="fa-solid fa-spinner fa-spin"></i> Importing...' );
			$.post( window.mobilePasalOptions.ajax_url, {
				action:       'mobile_pasal_restore_backup',
				nonce:        window.mobilePasalOptions.nonce,
				restore_mode: 'json',
				import_json:  rawJson
			} ).done( function ( res ) {
				if ( res && res.success ) {
					showBoptToast( res.data.message || 'JSON imported successfully!', false );
					setTimeout( function () { window.location.reload(); }, 800 );
				} else {
					showBoptToast( ( res && res.data && res.data.message ) ? res.data.message : 'Invalid JSON.', true );
					$btn.prop( 'disabled', false ).html( '<i class="fa-solid fa-file-import"></i> Import & Restore JSON' );
				}
			} );
		} );
	}

	/**
	 * 11. Keyboard Shortcuts: Ctrl+S (Save) & Ctrl+K (Global Search)
	 */
	function initKeyboardShortcuts() {
		$( document ).on( 'keydown', function ( e ) {
			if ( ( e.ctrlKey || e.metaKey ) && ( e.key === 's' || e.keyCode === 83 ) ) {
				e.preventDefault();
				var $form = $( '#bopt-main-form' );
				if ( $form.length ) {
					$form.trigger( 'submit' );
				}
			}
			if ( ( e.ctrlKey || e.metaKey ) && ( e.key === 'k' || e.keyCode === 75 ) ) {
				var $search = $( '#boptSearchInput' );
				if ( $search.length ) {
					e.preventDefault();
					$search.focus().select();
				}
			}
		} );
	}

	/**
	 * 12. Top Bar Save Alert Dismissal
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
	 * 13. Inquiries Page Real-Time Filter
	 */
	function initInquiriesFilter() {
		var $inqSearch = $( '#boptInquiriesSearchInput' );
		if ( ! $inqSearch.length ) return;

		$inqSearch.on( 'input keyup', function () {
			var q = $( this ).val().toLowerCase().trim();
			// Filter desktop rows
			$( '.bopt-table tbody tr' ).each( function () {
				var rowText = $( this ).text().toLowerCase();
				if ( rowText.indexOf( q ) !== -1 ) {
					$( this ).show();
				} else {
					$( this ).hide();
				}
			} );
			// Filter mobile cards
			$( '.bopt-docket-mobile-card' ).each( function () {
				var cardText = $( this ).text().toLowerCase();
				if ( cardText.indexOf( q ) !== -1 ) {
					$( this ).show();
				} else {
					$( this ).hide();
				}
			} );
		} );
	}

	/**
	 * 14. Zero-Scroll UX: Subnav Pills, Card Collapses, Pane Anchors & Mobile Save Dock
	 */
	function initZeroScrollUX() {
		// Subnav Pill Switchers (e.g. Hero Slide 1 / 2 / 3, FAQs 1-5, Assurance 1-4)
		$( document ).on( 'click', '.bopt-subnav-pill', function ( e ) {
			e.preventDefault();
			var target = $( this ).data( 'subtab' );
			var $wrap  = $( this ).closest( '.bopt-tab-pane' );

			$wrap.find( '.bopt-subnav-pill' ).removeClass( 'is-active' );
			$( this ).addClass( 'is-active' );

			$wrap.find( '.bopt-subnav-content' ).removeClass( 'is-active' ).hide();
			$wrap.find( '#' + target ).addClass( 'is-active' ).fadeIn( 150 );
		} );

		// Clickable Card Header Collapses
		$( document ).on( 'click', '.bopt-card-header', function ( e ) {
			if ( $( e.target ).is( 'input, select, textarea, a' ) || $( e.target ).closest( 'a, input, select, textarea' ).length ) {
				return;
			}
			var $card = $( this ).closest( '.bopt-card' );
			$card.toggleClass( 'is-collapsed' );
		} );

		// Global Pane Collapse/Expand All Cards
		$( document ).on( 'click', '.bopt-pane-collapse-all', function ( e ) {
			e.preventDefault();
			var $pane     = $( this ).closest( '.bopt-tab-pane' );
			var $cards    = $pane.find( '.bopt-card' );
			var isAnyOpen = $cards.not( '.is-collapsed' ).length > 0;

			if ( isAnyOpen ) {
				$cards.addClass( 'is-collapsed' );
				$( this ).html( '<i class="fa-solid fa-angles-down"></i> ' + ( $( this ).data( 'expand-text' ) || 'Expand All Cards' ) );
			} else {
				$cards.removeClass( 'is-collapsed' );
				$( this ).html( '<i class="fa-solid fa-angles-up"></i> ' + ( $( this ).data( 'collapse-text' ) || 'Collapse All Cards' ) );
			}
		} );

		// Smooth In-Page Anchor Chips Scroll
		$( document ).on( 'click', '.bopt-anchor-chip', function ( e ) {
			e.preventDefault();
			var target  = $( this ).attr( 'href' );
			var $target = $( target );
			if ( $target.length ) {
				if ( $target.hasClass( 'is-collapsed' ) ) {
					$target.removeClass( 'is-collapsed' );
				}
				$( 'html, body' ).animate( {
					scrollTop: $target.offset().top - 90
				}, 250 );
			}
		} );

		// Mobile Quick Save Dock
		$( document ).on( 'click', '#boptMobileSaveBtn', function ( e ) {
			e.preventDefault();
			$( this ).html( '<i class="fa-solid fa-spinner fa-spin"></i> <span>Saving...</span>' );
			$( '#bopt-main-form' ).trigger( 'submit' );
		} );

		$( document ).on( 'click', '#boptMobileTopBtn', function ( e ) {
			e.preventDefault();
			$( 'html, body' ).animate( { scrollTop: 0 }, 200 );
		} );
	}

	/**
	 * Document Ready Bootstrapper
	 */
	
	/**
	 * Icon Picker & Live Preview System
	 */
	function initIconPickers() {
		// Global update helper for inline onchange / chip clicks
		window.mpUpdateIconPreview = function ( selectElem ) {
			if ( ! selectElem ) return;
			var $select  = $( selectElem );
			var slug     = $select.val();
			var targetId = $select.data( 'preview-target' );
			var $preview = targetId ? $( targetId ) : $select.closest( '.bopt-icon-picker-wrap' ).find( '.bopt-icon-preview-box' );
			var $wrap    = $select.closest( '.bopt-icon-picker-wrap' );

			if ( window.mobilePasalOptions && window.mobilePasalOptions.icons && window.mobilePasalOptions.icons[ slug ] ) {
				$preview.html( window.mobilePasalOptions.icons[ slug ] );
			}

			// Update chips active state
			$wrap.find( '.bopt-icon-chip' ).removeClass( 'is-active' );
			$wrap.find( '.bopt-icon-chip[data-icon-slug="' + slug + '"]' ).addClass( 'is-active' );
		};

		window.mpPickIconChip = function ( chipElem ) {
			if ( ! chipElem ) return;
			var $chip        = $( chipElem );
			var slug         = $chip.data( 'icon-slug' );
			var targetSelect = $chip.data( 'target-select' );
			var $select      = $( targetSelect );

			if ( $select.length ) {
				$select.val( slug ).trigger( 'change' );
				window.mpUpdateIconPreview( $select[ 0 ] );
			}
		};

		// Delegate event listener for selects
		$( document ).on( 'change', '.bopt-icon-select', function () {
			window.mpUpdateIconPreview( this );
		} );

		// Delegate event listener for quick chips
		$( document ).on( 'click', '.bopt-icon-chip', function ( e ) {
			e.preventDefault();
			window.mpPickIconChip( this );
		} );
	}

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
		initUnsavedTracker();
		initAjaxSaveAndBackupActions();
		initKeyboardShortcuts();
		initSaveAlertAutoDismiss();
		initInquiriesFilter();
		initZeroScrollUX();
		initIconPickers();
	} );

} )( jQuery );
