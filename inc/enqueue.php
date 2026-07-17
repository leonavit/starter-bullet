<?php
/**
 * Enqueue assets.
 *
 * @package Starter_Bullet
 */

declare(strict_types=1);

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueue front-end styles and scripts.
 */
function starter_bullet_enqueue_assets(): void {
	$css_path = STARTER_BULLET_DIR . '/dist/css/main.css';
	$js_path  = STARTER_BULLET_DIR . '/dist/js/main.js';

	$css_version = file_exists( $css_path ) ? (string) filemtime( $css_path ) : STARTER_BULLET_VERSION;
	$js_version  = file_exists( $js_path ) ? (string) filemtime( $js_path ) : STARTER_BULLET_VERSION;

	wp_enqueue_style(
		'starter-bullet-main',
		STARTER_BULLET_URI . '/dist/css/main.css',
		array(),
		$css_version
	);

	wp_enqueue_script(
		'starter-bullet-main',
		STARTER_BULLET_URI . '/dist/js/main.js',
		array(),
		$js_version,
		true
	);
}
add_action( 'wp_enqueue_scripts', 'starter_bullet_enqueue_assets' );

/**
 * Preconnect to Google Fonts for performance.
 *
 * @param array  $urls          URLs.
 * @param string $relation_type Relation type.
 * @return array
 */
function starter_bullet_resource_hints( array $urls, string $relation_type ): array {
	if ( 'preconnect' === $relation_type ) {
		$urls[] = array( 'href' => 'https://fonts.googleapis.com', 'crossorigin' => 'anonymous' );
		$urls[] = array( 'href' => 'https://fonts.gstatic.com', 'crossorigin' => 'anonymous' );
	}

	return $urls;
}
add_filter( 'wpcf7_load_css', '__return_false' );

/**
 * Dequeue CF7 default styles if still registered.
 */
function starter_bullet_dequeue_cf7_styles(): void {
	wp_dequeue_style( 'contact-form-7' );
	wp_deregister_style( 'contact-form-7' );
}
add_action( 'wp_enqueue_scripts', 'starter_bullet_dequeue_cf7_styles', 99 );
