( function () {
	function alignFlash() {
		var branding  = document.querySelector( '#masthead .site-branding' );
		var masthead  = document.getElementById( 'masthead' );
		if ( ! branding || ! masthead ) { return; }

		var brandingRight  = branding.getBoundingClientRect().right;
		var mastheadRight  = masthead.getBoundingClientRect().right;
		var mastheadHeight = masthead.getBoundingClientRect().height;
		var flashWidth     = mastheadRight - brandingRight;

		masthead.style.setProperty( '--pmb-flash-width',  flashWidth  + 'px' );
		masthead.style.setProperty( '--pmb-flash-height', mastheadHeight + 'px' );
	}

	document.addEventListener( 'DOMContentLoaded', alignFlash );
	window.addEventListener( 'resize', alignFlash );
} )();
