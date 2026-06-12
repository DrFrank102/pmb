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

		// Reset transform before measuring so nav height is accurate
		if ( nav ) { nav.style.transform = ''; }

		if ( isDesktop ) {
			var topbarLogo = document.querySelector( '#pmb-topbar .pmb-topbar__logo' );

			// Pin masthead height to the logo height so black area matches the top bar logo
			if ( topbarLogo ) {
				var logoHeight = topbarLogo.getBoundingClientRect().height;
				masthead.style.height = logoHeight + 'px';
				mastheadHeight = logoHeight;
			}

			// Flash height = nav menu height + tight padding (8px total, 4px each side)
			var navH = nav ? nav.getBoundingClientRect().height : 40;
			flashHeight = navH + 8;

			if ( topbarLogo ) {
				flashWidth = mastheadRect.right - topbarLogo.getBoundingClientRect().right;
			} else {
				flashWidth = mastheadRect.width * 0.80;
			}
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
			var navRect     = nav.getBoundingClientRect();
			var navCenter   = ( navRect.top - mastheadRect.top ) + navRect.height / 2;
			var flashCenter = mastheadHeight - flashHeight / 2;
			var offset      = flashCenter - navCenter;
			nav.style.transform = 'translateY(' + offset + 'px)';
		}
	}

	function updateStickyState() {
		var topbar   = document.getElementById( 'pmb-topbar' );
		var masthead = document.getElementById( 'masthead' );
		if ( ! topbar || ! masthead ) { return; }
		if ( window.innerWidth < 1025 ) {
			masthead.classList.remove( 'pmb-nav-stuck' );
			return;
		}
		// Once the topbar has fully scrolled out of view, go transparent
		if ( window.scrollY >= topbar.offsetHeight ) {
			masthead.classList.add( 'pmb-nav-stuck' );
		} else {
			masthead.classList.remove( 'pmb-nav-stuck' );
		}
	}

	document.addEventListener( 'DOMContentLoaded', function () {
		alignHeader();
		updateStickyState();
	} );
	window.addEventListener( 'resize', function () {
		alignHeader();
		updateStickyState();
	} );
	window.addEventListener( 'scroll', updateStickyState, { passive: true } );
} )();
