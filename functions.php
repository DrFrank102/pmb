<?php
/**
 * **********************************************************************
 * Kadence Child Theme — Functions
 *
 * Enqueues theme stylesheets and loads feature modules from inc/.
 *
 * @package  KadenceChild
 * @version  1.0.0
 * @updated  2026-06-11
 * **********************************************************************
 */

// =============================================================================
// Styles
// =============================================================================

add_action( 'wp_enqueue_scripts', function () {

	// ── Google Fonts ──────────────────────────────────────────────────────────
	wp_enqueue_style(
		'pmb-google-fonts',
		'https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap',
		[],
		null
	);

	// ── Child stylesheet ──────────────────────────────────────────────────────
	wp_enqueue_style(
		'kadence-child-style',
		get_stylesheet_uri(),
		[ 'kadence-global', 'pmb-google-fonts' ],
		filemtime( get_stylesheet_directory() . '/style.css' )
	);

	// ── Top-bar stylesheet ───────────────────────────────────────────────────
	wp_enqueue_style(
		'kadence-child-topbar',
		get_stylesheet_directory_uri() . '/css/topbar.css',
		[ 'kadence-child-style' ],
		filemtime( get_stylesheet_directory() . '/css/topbar.css' )
	);

	// ── Footer stylesheet ─────────────────────────────────────────────────────
	wp_enqueue_style(
		'kadence-child-footer',
		get_stylesheet_directory_uri() . '/css/footer.css',
		[ 'kadence-child-style' ],
		filemtime( get_stylesheet_directory() . '/css/footer.css' )
	);

	// ── Header JS (flash image alignment) ────────────────────────────────────
	wp_enqueue_script(
		'kadence-child-header',
		get_stylesheet_directory_uri() . '/js/header.js',
		[],
		filemtime( get_stylesheet_directory() . '/js/header.js' ),
		true
	);

	// ── Home page stylesheet ───────────────────────────────────────────────────
	if ( is_front_page() ) {
		wp_enqueue_style(
			'kadence-child-home',
			get_stylesheet_directory_uri() . '/css/home.css',
			[ 'kadence-child-style' ],
			filemtime( get_stylesheet_directory() . '/css/home.css' )
		);
	}

} );

// =============================================================================
// Cache-Control for logged-out visitors
// =============================================================================

// Cloudflare overrides LiteSpeed's browser-cache TTL and sends max-age=604800
// (7 days) for public pages. Setting max-age=300 + must-revalidate here ensures
// the cached copy is only trusted for 5 minutes.
add_action( 'send_headers', function () {
	if ( ! is_admin() && ! is_user_logged_in() ) {
		header( 'Cache-Control: public, max-age=300, must-revalidate' );
	}
} );

// =============================================================================
// Modules
// =============================================================================

// require get_stylesheet_directory() . '/inc/example.php';

// =============================================================================
// Top Bar (desktop only — scrolls away, leaving sticky nav)
// =============================================================================

add_action( 'kadence_before_header', function () {
	$book_url = esc_url( home_url( '/#contact' ) );
	?>
	<div id="pmb-topbar">
		<div class="pmb-topbar__inner">

			<div class="pmb-topbar__logo">
				<?php if ( has_custom_logo() ) {
					the_custom_logo();
				} else {
					echo '<span class="pmb-topbar__sitename">' . esc_html( get_bloginfo( 'name' ) ) . '</span>';
				} ?>
			</div>

			<div class="pmb-topbar__blocks">

				<div class="pmb-topbar__block">
					<svg class="pmb-topbar__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
						<circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/>
					</svg>
					<div class="pmb-topbar__block-text">
						<span class="pmb-topbar__label">Hours</span>
						<strong class="pmb-topbar__value">24/7 Service</strong>
					</div>
				</div>

				<div class="pmb-topbar__block">
					<svg class="pmb-topbar__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
						<path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 9.81 19.79 19.79 0 0 1 1.62 1.18 2 2 0 0 1 3.62.18h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 7.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/>
					</svg>
					<div class="pmb-topbar__block-text">
						<span class="pmb-topbar__label">Call Us</span>
						<strong class="pmb-topbar__value">781-484-8550</strong>
					</div>
				</div>

				<div class="pmb-topbar__block">
					<svg class="pmb-topbar__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
						<path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/>
					</svg>
					<div class="pmb-topbar__block-text">
						<span class="pmb-topbar__label">Servicing the</span>
						<strong class="pmb-topbar__value">Greater Boston Area</strong>
					</div>
				</div>

				<a href="<?php echo $book_url; ?>" class="pmb-topbar__book">Book Now</a>

			</div><!-- .pmb-topbar__blocks -->
		</div><!-- .pmb-topbar__inner -->
	</div><!-- #pmb-topbar -->
	<?php
} );
