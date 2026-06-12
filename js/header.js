( function () {
	function alignHeader() {
		var branding = document.querySelector( '#masthead .site-branding' );
		var nav      = document.querySelector( '#masthead .header-navigation' );
		var masthead = document.getElementById( 'masthead' );
		if ( ! masthead ) { return; }

		var isDesktop = window.innerWidth >= 1025;

		// Reset nav transform before measuring so heights are accurate
		if ( nav ) { nav.style.transform = ''; }

		if ( isDesktop ) {
			var navH        = nav ? nav.getBoundingClientRect().height : 40;
			var flashHeight = navH + 8; // 4px breathing room above and below the menu

			// Pin masthead to exactly the flash height → 0px gap between logo bottom and flash top
			masthead.style.height = flashHeight + 'px';

			// Re-measure after the height is applied (forces layout reflow)
			var mr         = masthead.getBoundingClientRect();
			var topbarLogo = document.querySelector( '#pmb-topbar .pmb-topbar__logo' );
			var flashWidth = topbarLogo
				? mr.right - topbarLogo.getBoundingClientRect().right
				: mr.width * 0.80;

			masthead.style.setProperty( '--pmb-flash-width',  flashWidth  + 'px' );
			masthead.style.setProperty( '--pmb-flash-height', flashHeight + 'px' );

			// Center nav vertically — flash fills the full masthead so center = flashHeight / 2
			if ( nav ) {
				var nr     = nav.getBoundingClientRect();
				var offset = flashHeight / 2 - ( ( nr.top - mr.top ) + nr.height / 2 );
				nav.style.transform = 'translateY(' + offset + 'px)';
			}
		} else {
			// Clear desktop height override so Kadence controls mobile height
			masthead.style.height = '';

			var mr2 = masthead.getBoundingClientRect();
			var mh  = mr2.height;
			if ( ! branding ) { return; }

			var flashHeight2 = mh * 0.33;
			var flashWidth2  = mr2.right - branding.getBoundingClientRect().right;

			masthead.style.setProperty( '--pmb-flash-width',  flashWidth2  + 'px' );
			masthead.style.setProperty( '--pmb-flash-height', flashHeight2 + 'px' );

			if ( nav ) {
				var nr2     = nav.getBoundingClientRect();
				var offset2 = ( mh - flashHeight2 / 2 ) - ( ( nr2.top - mr2.top ) + nr2.height / 2 );
				nav.style.transform = 'translateY(' + offset2 + 'px)';
			}
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
