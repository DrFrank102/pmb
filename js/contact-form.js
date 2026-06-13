( function () {
	var form = document.getElementById( 'pmb-hero-form' );
	if ( ! form ) { return; }

	form.addEventListener( 'submit', function ( e ) {
		e.preventDefault();

		var btn = form.querySelector( '.pmb-form-card__submit' );
		var msg = form.querySelector( '.pmb-form-card__msg' );

		btn.disabled    = true;
		btn.textContent = 'Sending…';
		msg.className   = 'pmb-form-card__msg';
		msg.textContent = '';

		var data = new FormData( form );
		data.append( 'action', 'pmb_contact' );
		data.append( 'nonce',  pmbContact.nonce );

		fetch( pmbContact.ajaxUrl, { method: 'POST', body: data } )
			.then( function ( r ) { return r.json(); } )
			.then( function ( res ) {
				if ( res && res.success ) {
					msg.textContent = res.data;
					msg.className   = 'pmb-form-card__msg pmb-form-card__msg--ok';
					form.reset();
				} else {
					msg.textContent = ( res && typeof res.data === 'string' && res.data )
						? res.data
						: 'Something went wrong. Please refresh the page and try again.';
					msg.className = 'pmb-form-card__msg pmb-form-card__msg--err';
				}
				btn.disabled    = false;
				btn.textContent = 'Contact us';
			} )
			.catch( function () {
				msg.textContent = 'Connection error. Please call us at ' + pmbContact.phone + '.';
				msg.className   = 'pmb-form-card__msg pmb-form-card__msg--err';
				btn.disabled    = false;
				btn.textContent = 'Contact us';
			} );
	} );
} )();

( function () {
	document.querySelectorAll( '[data-prefill-service]' ).forEach( function ( btn ) {
		btn.addEventListener( 'click', function () {
			var service = btn.getAttribute( 'data-prefill-service' );
			var message = btn.getAttribute( 'data-prefill-message' );
			setTimeout( function () {
				var sel = document.getElementById( 'pmb-service' );
				var txt = document.getElementById( 'pmb-message' );
				if ( sel && service ) { sel.value = service; }
				if ( txt && message ) { txt.value = message; }
			}, 300 );
		} );
	} );
} )();

( function () {
	var form = document.getElementById( 'pmb-contact-form' );
	if ( ! form ) { return; }

	form.addEventListener( 'submit', function ( e ) {
		e.preventDefault();

		var btn = form.querySelector( '[type="submit"]' );
		var msg = form.querySelector( '.pmb-form__msg' );

		btn.disabled    = true;
		btn.textContent = 'Sending…';
		msg.className   = 'pmb-form__msg';
		msg.textContent = '';

		var data = new FormData( form );
		data.append( 'action', 'pmb_simple_contact' );
		data.append( 'nonce',  pmbContact.nonce );

		fetch( pmbContact.ajaxUrl, { method: 'POST', body: data } )
			.then( function ( r ) { return r.json(); } )
			.then( function ( res ) {
				if ( res && res.success ) {
					msg.textContent = res.data;
					msg.className   = 'pmb-form__msg pmb-form__msg--ok';
					form.reset();
				} else {
					msg.textContent = ( res && typeof res.data === 'string' && res.data )
						? res.data
						: 'Something went wrong. Please refresh the page and try again.';
					msg.className = 'pmb-form__msg pmb-form__msg--err';
				}
				btn.disabled    = false;
				btn.textContent = 'Send Message';
			} )
			.catch( function () {
				msg.textContent = 'Connection error. Please call us at ' + pmbContact.phone + '.';
				msg.className   = 'pmb-form__msg pmb-form__msg--err';
				btn.disabled    = false;
				btn.textContent = 'Send Message';
			} );
	} );
} )();
