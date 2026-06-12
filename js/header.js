( function () {
	function alignHeader() {
		var branding = document.querySelector( '#masthead .site-branding' );
		var nav      = document.querySelector( '#masthead .header-navigation' );
		var masthead = document.getElementById( 'masthead' );
		if ( ! branding || ! masthead ) { return; }

		var mastheadRect   = masthead.getBoundingClientRect();
		var mastheadHeight = mastheadRect.height;
		var flashHeight    = mastheadHeight * 0.33;
		var flashWidth     = mastheadRect.right - branding.getBoundingClientRect().right;

		// Size the flash pseudo-element
		masthead.style.setProperty( '--pmb-flash-width',  flashWidth + 'px' );
		masthead.style.setProperty( '--pmb-flash-height', flashHeight + 'px' );

		// Center the nav vertically within the flash zone (bottom 33%)
		if ( nav ) {
			nav.style.transform = '';  // reset before measuring
			var navRect       = nav.getBoundingClientRect();
			var navCenter     = ( navRect.top - mastheadRect.top ) + navRect.height / 2;
			var flashCenter   = mastheadHeight - flashHeight / 2;
			var offset        = flashCenter - navCenter;
			nav.style.transform = 'translateY(' + offset + 'px)';
		}
	}

	document.addEventListener( 'DOMContentLoaded', alignHeader );
	window.addEventListener( 'resize', alignHeader );
} )();
