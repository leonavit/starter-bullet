<?php
/**
 * Theme setup.
 *
 * @package Starter_Bullet
 */

declare(strict_types=1);

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register theme features.
 */
function starter_bullet_setup(): void {
	load_theme_textdomain( 'starter-bullet', STARTER_BULLET_DIR . '/languages' );

	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 80,
			'width'       => 240,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);
	add_theme_support(
		'html5',
		array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' )
	);

	register_nav_menus(
		array(
			'primary'   => esc_html__( 'תפריט ראשי', 'starter-bullet' ),
			'footer'    => esc_html__( 'תפריט פוטר', 'starter-bullet' ),
			'footer_services' => esc_html__( 'שירותים בפוטר', 'starter-bullet' ),
		)
	);
}
add_action( 'after_setup_theme', 'starter_bullet_setup' );

/**
 * Use classic editor for pages and CPTs.
 */
function starter_bullet_use_classic_editor(): void {
	add_filter( 'use_block_editor_for_post_type', 'starter_bullet_disable_block_editor', 10, 2 );
}
add_action( 'after_setup_theme', 'starter_bullet_use_classic_editor' );

/**
 * Disable block editor for selected post types.
 *
 * @param bool   $use_block_editor Whether to use block editor.
 * @param string $post_type        Post type.
 */
function starter_bullet_disable_block_editor( bool $use_block_editor, string $post_type ): bool {
	$classic_types = array( 'page', 'bullet_service', 'bullet_faq', 'bullet_review', 'bullet_lead' );

	if ( in_array( $post_type, $classic_types, true ) ) {
		return false;
	}

	return $use_block_editor;
}

/**
 * Set RTL direction on html element.
 *
 * @param string $language_attributes Language attributes.
 */
function starter_bullet_rtl_attributes( string $language_attributes ): string {
	if ( is_rtl() ) {
		return $language_attributes . ' dir="rtl"';
	}

	return $language_attributes;
}
add_filter( 'language_attributes', 'starter_bullet_rtl_attributes' );
