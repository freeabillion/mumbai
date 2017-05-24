(function( $ ) {
	$( document ).ready(function() {

		function wn_header_builder_functionality() {
			var $wrap = $( '.w-header-builder-wrap' ),
				$current_col,
				$current_align_col,
				$current_el,
				$current_modal_edit;

			// show modal box
			$wrap.find( '.w-add-element' ).on( 'click', function( event ) {
				event.preventDefault();
				$wrap.find( '.whb-elements' ).show();
				$current_col = $(this);
				$current_align_col = $current_col.attr( 'data-align-col' );
			});
			
			// hide modal box
			$wrap.find( '.whb-modal-header i, .whb_close' ).on( 'click', function( event ) {
				event.preventDefault();
				$wrap.find( '.whb-modal-wrap' ).hide();
			});

			// items
			$wrap.find( '.whb-elements-item' ).find( 'a' ).on( 'click', function( event ) {
				event.preventDefault();
				$current_col
					.siblings( '.whb-elements-place' )
					.append( $(this).parent().clone().removeClass( '.w-col-sm-4' ) )
					.find( '.whb-elements-item' )
					.attr( 'data-align-col', $current_align_col )
					.prepend( '<span class="whb-controls"><i class="whb-control whb-move-btn sl-cursor-move"></i><i class="whb-control whb-edit-btn sl-pencil"></i><i class="whb-control whb-delete-btn ti-close"></i></span>' );
				$wrap.find( '.whb-modal-wrap' ).hide();
			});

			// bind events
			$( document )

			// delete btn
			.on( 'click', '.whb-delete-btn', function( event ) {
				event.preventDefault();
				$(this).closest( '.whb-elements-item' ).remove();
			})

			// edit btn
			.on( 'click', '.whb-edit-btn', function( event ) {
				event.preventDefault();
				$current_el			= $(this).closest( '.whb-elements-item' );
				$current_modal_edit	= $wrap.find( '.whb-modal-wrap[data-element-target="' + $current_el.data( 'element' ) + '"]' );
				$wrap.find( '.whb-modal-wrap' ).hide();
				$current_modal_edit.show();
				// menu settings
				if ( $current_el.data( 'element' ) == 'menu' ) {
					if ( typeof $current_el.data( 'menu' ) != 'undefind' ) {
						$current_modal_edit.find( '.whb-field-select' ).val( $current_el.data( 'menu' ) );
					}
				}
				// search settings
				if ( $current_el.data( 'element' ) == 'search' ) {
					if ( typeof $current_el.data( 'search-placeholder' ) != 'undefind' ) {
						$current_modal_edit.find( '.whb-field-search-placeholder' ).find( 'input' ).val( $current_el.data( 'search-placeholder' ) );
					}
				}
				// image settings
				if ( $current_el.data( 'element' ) == 'image' ) {
					if ( typeof $current_el.data( 'image-url' ) != 'undefind' ) {
						$current_modal_edit.find( '.whb-field-image-url' ).find( 'input' ).val( $current_el.data( 'image-url' ) );
					}
					if ( typeof $current_el.data( 'image-width' ) != 'undefind' ) {
						$current_modal_edit.find( '.whb-field-image-width' ).find( 'input' ).val( $current_el.data( 'image-width' ) );
					}
					if ( typeof $current_el.data( 'image-height' ) != 'undefind' ) {
						$current_modal_edit.find( '.whb-field-image-height' ).find( 'input' ).val( $current_el.data( 'image-height' ) );
					}
				}
				// text settings
				if ( $current_el.data( 'element' ) == 'text' ) {
					if ( typeof $current_el.data( 'text' ) != 'undefind' ) {
						$current_modal_edit.find( '.whb-field-text' ).find( 'input' ).val( $current_el.data( 'text' ) );
					}
					if ( typeof $current_el.data( 'link-url' ) != 'undefind' ) {
						$current_modal_edit.find( '.whb-field-link-url' ).find( 'input' ).val( $current_el.data( 'link-url' ) );
					}
				}
			});

			// save btn
			$wrap.find( '.whb_save' ).on( 'click', function( event ) {
				event.preventDefault();
				// menu
				if ( $current_el.data( 'element' ) == 'menu' ) {
					$current_el.attr({
						'data-menu': $current_modal_edit.find( '.whb-field-select' ).val()
					});
				}
				// search
				if ( $current_el.data( 'element' ) == 'search' ) {
					$current_el.attr({
						'data-search-placeholder': $current_modal_edit.find( '.whb-field-search-placeholder' ).find( 'input' ).val()
					});
				}
				// image
				if ( $current_el.data( 'element' ) == 'image' ) {
					$current_el.attr({
						'data-image-url': $current_modal_edit.find( '.whb-field-image-url' ).find( 'input' ).val(),
						'data-image-width': $current_modal_edit.find( '.whb-field-image-width' ).find( 'input' ).val(),
						'data-image-height': $current_modal_edit.find( '.whb-field-image-height' ).find( 'input' ).val()
					});
				}
				// text
				if ( $current_el.data( 'element' ) == 'text' ) {
					$current_el.attr({
						'data-text': $current_modal_edit.find( '.whb-field-text' ).find( 'input' ).val(),
						'data-link-url': $current_modal_edit.find( '.whb-field-link-url' ).find( 'input' ).val()
					});
				}
				$wrap.find( '.whb-modal-wrap' ).hide();
			});

			// drag and drop
			$wrap.find( '#whb-columns' ).find( '.whb-elements-place' ).sortable({
				receive: function( event, ui ) {
					var $this		= $(ui.item),
						align_col	= $this.closest( '.whb-col' ).data('align-col');
					$this.attr( 'data-align-col', align_col );
				},
				connectWith: '.whb-elements-place'
			}).disableSelection();
		}

		$.ajax({
			type: 'POST',
			url: ajaxurl,
			data: {
				action : 'wn_header_builder_menus',
			},
			success: function(data) {
				$( '.w-header-builder-wrap' ).find( '.whb-menu-dropdown' ).html( data );
			}
		});

		wn_header_builder_functionality();

		$( '#redux_save' ).on( 'click', function() {
			$.ajax({
				type: 'POST',
				url: ajaxurl,
				data: {
					action : 'wn_backend_header_builder',
					from : $( document ).find('.w-header-builder-wrap').html()
				},
				success: function(data) {
					$( document ).find('.w-header-builder-wrap').html( data );
					wn_header_builder_functionality();
				}
			}).promise().done(function() {
				var from_obj = {};
				$( '.whb-elements-place' ).find( '.whb-elements-item' ).each( function( index, el ) {
					current_from_obj = $(this).data();
					delete current_from_obj.sortableItem;
					from_obj[++index] = current_from_obj;
				});
				// console.log( from_obj );
				$.ajax({
					type: 'POST',
					url: ajaxurl,
					data: {
						action : 'wn_frontend_header_builder',
						from : from_obj
					},
					dataType: 'json',
					done: function(data) {
					}
				}); // end ajax
			}); // end done
		});

	}); // end document ready
})(jQuery);