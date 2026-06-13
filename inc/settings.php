<?php
// =============================================================================
// PMB Settings — live/test email & URL switcher
// =============================================================================

define( 'PMB_DEFAULT_LIVE_EMAIL', 'service@pmboisvertplumbing.com' );
define( 'PMB_DEFAULT_LIVE_URL',   'pmboisvertplumbing.com' );

// ── Helper functions used across the theme ───────────────────────────────────

function pmb_active_email() {
	$mode = get_option( 'pmb_mode', 'live' );
	$key  = ( $mode === 'test' ) ? 'pmb_test_email' : 'pmb_live_email';
	return get_option( $key, PMB_DEFAULT_LIVE_EMAIL );
}

function pmb_active_url() {
	$mode = get_option( 'pmb_mode', 'live' );
	$key  = ( $mode === 'test' ) ? 'pmb_test_url' : 'pmb_live_url';
	return get_option( $key, PMB_DEFAULT_LIVE_URL );
}

function pmb_active_phone() {
	$mode = get_option( 'pmb_mode', 'live' );
	$key  = ( $mode === 'test' ) ? 'pmb_test_phone' : 'pmb_live_phone';
	return get_option( $key, '781-484-8550' );
}

function pmb_active_phone_digits() {
	$digits = preg_replace( '/\D/', '', pmb_active_phone() );
	// Prepend country code if not already present (US/Canada = 10 digits)
	return ( strlen( $digits ) === 10 ) ? '+1' . $digits : '+' . $digits;
}

function pmb_is_test_mode() {
	return get_option( 'pmb_mode', 'live' ) === 'test';
}

// ── Admin page registration ───────────────────────────────────────────────────

// Purge page cache whenever any PMB setting changes.
add_action( 'updated_option', function ( $option ) {
	$pmb_options = [
		'pmb_live_email', 'pmb_live_url', 'pmb_live_phone',
		'pmb_test_email', 'pmb_test_url', 'pmb_test_phone',
		'pmb_mode',
	];
	if ( in_array( $option, $pmb_options, true ) ) {
		do_action( 'litespeed_purge_all' );
	}
} );

add_action( 'admin_menu', function () {
	add_options_page(
		'PMB Site Settings',
		'PMB Settings',
		'manage_options',
		'pmb-settings',
		'pmb_render_settings_page'
	);
} );

add_action( 'admin_init', function () {
	register_setting( 'pmb_settings_group', 'pmb_live_email', [ 'sanitize_callback' => 'sanitize_email' ] );
	register_setting( 'pmb_settings_group', 'pmb_live_url',   [ 'sanitize_callback' => 'sanitize_text_field' ] );
	register_setting( 'pmb_settings_group', 'pmb_test_email', [ 'sanitize_callback' => 'sanitize_email' ] );
	register_setting( 'pmb_settings_group', 'pmb_test_url',   [ 'sanitize_callback' => 'sanitize_text_field' ] );
	register_setting( 'pmb_settings_group', 'pmb_mode',        [ 'sanitize_callback' => 'sanitize_text_field' ] );
	register_setting( 'pmb_settings_group', 'pmb_live_phone',  [ 'sanitize_callback' => 'sanitize_text_field' ] );
	register_setting( 'pmb_settings_group', 'pmb_test_phone',  [ 'sanitize_callback' => 'sanitize_text_field' ] );
} );

// ── Settings page renderer ────────────────────────────────────────────────────

function pmb_render_settings_page() {
	if ( ! current_user_can( 'manage_options' ) ) { return; }

	$mode        = get_option( 'pmb_mode', 'live' );
	$live_email  = get_option( 'pmb_live_email',  PMB_DEFAULT_LIVE_EMAIL );
	$live_url    = get_option( 'pmb_live_url',    PMB_DEFAULT_LIVE_URL );
	$live_phone  = get_option( 'pmb_live_phone',  '781-484-8550' );
	$test_email  = get_option( 'pmb_test_email',  '' );
	$test_url    = get_option( 'pmb_test_url',    '' );
	$test_phone  = get_option( 'pmb_test_phone',  '' );
	$is_test    = ( $mode === 'test' );
	?>
	<div class="wrap pmb-sw">
		<h1>PMB Site Settings</h1>

		<form method="post" action="options.php">
			<?php settings_fields( 'pmb_settings_group' ); ?>

			<?php /* Hidden input carries the mode value; JS updates it when the toggle changes */ ?>
			<input type="hidden" name="pmb_mode" id="pmb-mode-hidden" value="<?php echo esc_attr( $mode ); ?>">

			<div class="pmb-sw__toggle-row">
				<span class="pmb-sw__label <?php echo ! $is_test ? 'pmb-sw__label--on' : ''; ?>">LIVE</span>
				<label class="pmb-sw__switch" title="Toggle between Live and Test mode">
					<input type="checkbox" id="pmb-mode-toggle" <?php checked( $is_test ); ?>>
					<span class="pmb-sw__knob"></span>
				</label>
				<span class="pmb-sw__label <?php echo $is_test ? 'pmb-sw__label--on' : ''; ?>">TEST</span>
				<span class="pmb-sw__badge pmb-sw__badge--<?php echo $is_test ? 'test' : 'live'; ?>">
					Active: <?php echo $is_test ? 'TEST MODE' : 'LIVE MODE'; ?>
				</span>
			</div>

			<div class="pmb-sw__grid">
				<div class="pmb-sw__col">
					<h2 class="pmb-sw__col-title pmb-sw__col-title--live">Live</h2>
					<label class="pmb-sw__field-label" for="pmb_live_email">Email</label>
					<input type="email" id="pmb_live_email" name="pmb_live_email"
						value="<?php echo esc_attr( $live_email ); ?>" class="regular-text pmb-sw__input">
					<label class="pmb-sw__field-label" for="pmb_live_url">URL</label>
					<input type="text" id="pmb_live_url" name="pmb_live_url"
						value="<?php echo esc_attr( $live_url ); ?>" class="regular-text pmb-sw__input">
					<label class="pmb-sw__field-label" for="pmb_live_phone">Phone</label>
					<input type="tel" id="pmb_live_phone" name="pmb_live_phone"
						value="<?php echo esc_attr( $live_phone ); ?>" class="regular-text pmb-sw__input">
				</div>

				<div class="pmb-sw__col">
					<h2 class="pmb-sw__col-title pmb-sw__col-title--test">Test</h2>
					<label class="pmb-sw__field-label" for="pmb_test_email">Email</label>
					<input type="email" id="pmb_test_email" name="pmb_test_email"
						value="<?php echo esc_attr( $test_email ); ?>" class="regular-text pmb-sw__input"
						placeholder="e.g. youremail@example.com">
					<label class="pmb-sw__field-label" for="pmb_test_url">URL</label>
					<input type="text" id="pmb_test_url" name="pmb_test_url"
						value="<?php echo esc_attr( $test_url ); ?>" class="regular-text pmb-sw__input"
						placeholder="e.g. staging.example.com">
					<label class="pmb-sw__field-label" for="pmb_test_phone">Phone</label>
					<input type="tel" id="pmb_test_phone" name="pmb_test_phone"
						value="<?php echo esc_attr( $test_phone ); ?>" class="regular-text pmb-sw__input"
						placeholder="e.g. 555-000-0000">
				</div>
			</div>

			<div class="pmb-sw__active-row">
				<strong>Currently active values —</strong>
				Email: <code><?php echo esc_html( pmb_active_email() ); ?></code>
				&nbsp;|&nbsp;
				URL: <code><?php echo esc_html( pmb_active_url() ); ?></code>
				&nbsp;|&nbsp;
				Phone: <code><?php echo esc_html( pmb_active_phone() ); ?></code>
			</div>

			<?php submit_button( 'Save Settings' ); ?>
		</form>
	</div>

	<style>
	.pmb-sw { max-width: 760px; }
	.pmb-sw__toggle-row {
		display: flex; align-items: center; gap: 14px;
		padding: 18px 24px; background: #f6f7f7;
		border: 1px solid #c3c4c7; border-radius: 6px; margin: 20px 0 28px;
	}
	.pmb-sw__label { font-weight: 700; font-size: 0.95rem; color: #aaa; }
	.pmb-sw__label--on { color: #1d2327; }
	.pmb-sw__switch { position: relative; width: 52px; height: 26px; display: inline-block; }
	.pmb-sw__switch input { opacity: 0; width: 0; height: 0; }
	.pmb-sw__knob {
		position: absolute; inset: 0; cursor: pointer;
		background: #2271b1; border-radius: 26px; transition: background 0.25s;
	}
	.pmb-sw__knob::before {
		content: ''; position: absolute;
		width: 20px; height: 20px; left: 3px; top: 3px;
		background: #fff; border-radius: 50%; transition: transform 0.25s;
	}
	#pmb-mode-toggle:checked + .pmb-sw__knob { background: #d63638; }
	#pmb-mode-toggle:checked + .pmb-sw__knob::before { transform: translateX(26px); }
	.pmb-sw__badge {
		margin-left: auto; padding: 4px 14px;
		border-radius: 4px; font-size: 0.78rem; font-weight: 700;
	}
	.pmb-sw__badge--live { background: #00a32a; color: #fff; }
	.pmb-sw__badge--test { background: #d63638; color: #fff; }
	.pmb-sw__grid { display: grid; grid-template-columns: 1fr 1fr; gap: 24px; margin-bottom: 24px; }
	.pmb-sw__col {
		background: #fff; border: 1px solid #c3c4c7;
		border-radius: 6px; padding: 20px 24px;
		display: flex; flex-direction: column; gap: 6px;
	}
	.pmb-sw__col-title { margin: 0 0 12px; font-size: 1rem; }
	.pmb-sw__col-title--live { color: #2271b1; }
	.pmb-sw__col-title--test { color: #d63638; }
	.pmb-sw__field-label { font-weight: 600; font-size: 0.82rem; text-transform: uppercase; color: #50575e; margin-top: 10px; }
	.pmb-sw__input { width: 100% !important; margin-top: 4px; }
	.pmb-sw__active-row {
		padding: 12px 18px; background: #fff;
		border-left: 4px solid #2271b1; margin-bottom: 20px;
		font-size: 0.9rem;
	}
	</style>

	<script>
	( function () {
		var toggle  = document.getElementById( 'pmb-mode-toggle' );
		var hidden  = document.getElementById( 'pmb-mode-hidden' );
		if ( ! toggle || ! hidden ) { return; }
		toggle.addEventListener( 'change', function () {
			hidden.value = toggle.checked ? 'test' : 'live';
		} );
	} )();
	</script>
	<?php
}
