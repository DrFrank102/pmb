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

	// ── Child stylesheet ──────────────────────────────────────────────────────
	wp_enqueue_style(
		'kadence-child-style',
		get_stylesheet_uri(),
		[ 'kadence-global' ],
		filemtime( get_stylesheet_directory() . '/style.css' )
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
