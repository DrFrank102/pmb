<?php
add_action( 'wp_ajax_pmb_contact',        'pmb_handle_contact' );
add_action( 'wp_ajax_nopriv_pmb_contact', 'pmb_handle_contact' );

function pmb_handle_contact() {
	if ( ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['nonce'] ?? '' ) ), 'pmb_contact_nonce' ) ) {
		wp_send_json_error( 'Your session has expired. Please refresh the page and try again.' );
	}

	$first   = sanitize_text_field( wp_unslash( $_POST['first_name'] ?? '' ) );
	$last    = sanitize_text_field( wp_unslash( $_POST['last_name']  ?? '' ) );
	$phone   = sanitize_text_field( wp_unslash( $_POST['phone']      ?? '' ) );
	$email   = sanitize_email(      wp_unslash( $_POST['email']      ?? '' ) );
	$street  = sanitize_text_field( wp_unslash( $_POST['street']     ?? '' ) );
	$unit    = sanitize_text_field( wp_unslash( $_POST['unit']       ?? '' ) );
	$city    = sanitize_text_field( wp_unslash( $_POST['city']       ?? '' ) );
	$zip     = sanitize_text_field( wp_unslash( $_POST['zip']        ?? '' ) );
	$country = sanitize_text_field( wp_unslash( $_POST['country']    ?? '' ) );
	$state   = sanitize_text_field( wp_unslash( $_POST['state']      ?? '' ) );
	$service = sanitize_textarea_field( wp_unslash( $_POST['service']  ?? '' ) );
	$referral = sanitize_text_field( wp_unslash( $_POST['referral']  ?? '' ) );

	if ( empty( $first ) || empty( $last ) || empty( $phone ) ) {
		wp_send_json_error( 'Please fill in your name and phone number.' );
	}

	$to      = 'howard188usa@gmail.com';
	$subject = "New Lead: {$first} {$last} — PM Boisvert Plumbing";

	$body  = "New contact form submission from pmb.kelwynmanor.org\n\n";
	$body .= "Name:  {$first} {$last}\n";
	$body .= "Phone: {$phone}\n";
	$body .= "Email: {$email}\n\n";
	$body .= "Address:\n";
	$body .= $street . ( $unit ? ", {$unit}" : '' ) . "\n";
	$body .= "{$city}, {$state} {$zip}\n";
	$body .= "{$country}\n\n";
	$body .= "Service Details: " . ( $service  ?: '(not provided)' ) . "\n";
	$body .= "How they heard: "  . ( $referral ?: '(not provided)' ) . "\n";

	$headers = [ 'Content-Type: text/plain; charset=UTF-8' ];
	if ( $email ) {
		$headers[] = "Reply-To: {$first} {$last} <{$email}>";
	}

	$sent = wp_mail( $to, $subject, $body, $headers );

	if ( $sent ) {
		wp_send_json_success( "Thank you! We'll be in touch shortly." );
	} else {
		wp_send_json_error( 'There was a problem sending your request. Please call us at 781-484-8550.' );
	}
}
