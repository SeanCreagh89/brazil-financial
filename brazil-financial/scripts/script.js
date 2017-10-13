/*

	Theme Name: Brazil Financial
	Author: Sean Creagh
	Description: Simple Custom Theme
	Version: 1.0

*/



( function( $ ) {

	$( document ).ready( function() {

		$( '#Navigation' ).find( '.menu-item-has-children' ).hover( function() {

			$( '#Navigation' ).find( '.sub-menu' ).css( { visibility: 'visible' } );

		}, function() {

			$( '.sub-menu' ).css( { visibility: 'hidden' } );

		} );

		$( '#navicon' ).click( function() {

			$( '#navimenu' ).slideToggle();

		} );

		$( '#navimenu' ).find( 'a' ).addClass( 'remove-spacing' );

		$( '#Navimobile' ).find( '.menu-item-has-children' ).click( function() {

			$( '.sub-menu' ).slideToggle();

		} );

	} );

} )( jQuery );