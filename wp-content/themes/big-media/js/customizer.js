/* global wp, jQuery */
/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

	wp.customize( 'big_bob_link_color', function( value ) {
		value.bind( function( newval ) {
			$( 'a' ).css( 'color', newval );
			$( 'a:visited' ).css( 'color', newval );
			$( '.nav-menu li a' ).css( 'color', newval );
		} );
	
	} );

})(jQuery);