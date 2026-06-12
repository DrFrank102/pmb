( function () {
	var carousel = document.getElementById( 'pmb-about-carousel' );
	if ( ! carousel ) { return; }

	var slides  = carousel.querySelectorAll( '.pmb-carousel__slide' );
	var total   = slides.length;
	var current = 0;

	if ( total < 2 ) { return; }

	function advance() {
		slides[ current ].classList.remove( 'pmb-carousel__slide--active' );
		current = ( current + 1 ) % total;
		slides[ current ].classList.add( 'pmb-carousel__slide--active' );
	}

	setInterval( advance, 3500 );
} )();
