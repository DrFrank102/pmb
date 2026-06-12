( function () {
	function alignHeader() {
		var branding = document.querySelector( '#masthead .site-branding' );
		var nav      = document.querySelector( '#masthead .header-navigation' );
		var masthead = document.getElementById( 'masthead' );
		if ( ! masthead ) { return; }

		var mastheadRect   = masthead.getBoundingClientRect();
		var mastheadHeight = mastheadRect.height;
		var isDesktop      = window.innerWidth >= 1025;
		var flashHeight, flashWidth;

		if ( isDesktop ) {
			// Desktop: logo is in the top bar, flash fills the entire nav bar
			flashHeight = mastheadHeight;
			flashWidth  = mastheadRect.width;
		} else {
			// Mobile: logo is in the masthead, flash covers the bottom 33%
			if ( ! branding ) { return; }
			flashHeight = mastheadHeight * 0.33;
			flashWidth  = mastheadRect.right - branding.getBoundingClientRect().right;
		}

		masthead.style.setProperty( '--pmb-flash-width',  flashWidth  + 'px' );
		masthead.style.setProperty( '--pmb-flash-height', flashHeight + 'px' );

		// Center the nav vertically within the flash zone
		if ( nav ) {
			nav.style.transform = '';
			var navRect     = nav.getBoundingClientRect();
			var navCenter   = ( navRect.top - mastheadRect.top ) + navRect.height / 2;
			var flashCenter = mastheadHeight - flashHeight / 2;
			var offset      = flashCenter - navCenter;
			nav.style.transform = 'translateY(' + offset + 'px)';
		}
	}

	document.addEventListener( 'DOMContentLoaded', alignHeader );
	window.addEventListener( 'resize', alignHeader );
} )();
