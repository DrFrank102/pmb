( function () {
	var wrap    = document.querySelector( '.pmb-brands__wrap' );
	var imgEl   = wrap && wrap.querySelector( '.pmb-brands__img' );
	var logosEl = wrap && wrap.querySelector( '.pmb-brands__logos' );

	if ( ! wrap || ! imgEl || ! logosEl ) { return; }

	var blueEndRatio = null; // cached ratio (0–1) of where blue ends

	function isBlue( r, g, b ) {
		return b > 80 && b > r * 1.4 && b > g * 1.2;
	}

	function measureBlue( img ) {
		try {
			var canvas = document.createElement( 'canvas' );
			canvas.width  = img.naturalWidth;
			canvas.height = img.naturalHeight;
			var ctx = canvas.getContext( '2d' );
			ctx.drawImage( img, 0, 0 );

			var midY = Math.floor( img.naturalHeight / 2 );
			var row  = ctx.getImageData( 0, midY, img.naturalWidth, 1 ).data;

			var lastBlueX = 0;
			for ( var x = 0; x < img.naturalWidth; x++ ) {
				var i = x * 4;
				if ( isBlue( row[ i ], row[ i + 1 ], row[ i + 2 ] ) ) {
					lastBlueX = x;
				}
			}

			blueEndRatio = ( lastBlueX + 1 ) / img.naturalWidth;
		} catch ( e ) {
			blueEndRatio = null;
		}
		applyPadding();
	}

	function applyPadding() {
		if ( blueEndRatio === null ) { return; }
		var displayedWidth = imgEl.offsetWidth;
		var gap            = Math.round( displayedWidth * 0.02 ); // 2% breathing room
		var offset         = Math.round( displayedWidth * blueEndRatio ) + gap;
		logosEl.style.paddingLeft = offset + 'px';
	}

	function init() {
		var proxy = new Image();
		proxy.crossOrigin = 'anonymous';
		proxy.onload  = function () { measureBlue( proxy ); };
		proxy.onerror = function () { blueEndRatio = null; };
		proxy.src = imgEl.src + ( imgEl.src.indexOf( '?' ) === -1 ? '?' : '&' ) + '_cb=' + Date.now();
	}

	if ( imgEl.complete && imgEl.naturalWidth ) {
		init();
	} else {
		imgEl.addEventListener( 'load', init );
	}

	window.addEventListener( 'resize', applyPadding );
} )();
