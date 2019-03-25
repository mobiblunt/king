/* Responsive menu */ 
( function( $ ) {
	var body    = $( 'body' ),
		_window = $( window );

	// Enable menu toggle for small screens.
	( function() {
		var nav = $( 'nav' ), button, menu;
		if ( ! nav ) {
			return;
		}

		$( '.toggle' ).on( 'click', function() {
			nav.toggleClass( 'toggled-on' );
		} );
	} )();
} )( jQuery );