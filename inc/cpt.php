<?php
/**
 * Custom Post Types.
 *
 * @package Starter_Bullet
 */

declare(strict_types=1);

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register theme CPTs.
 */
function starter_bullet_register_cpts(): void {
	register_post_type(
		'bullet_service',
		array(
			'labels'       => array(
				'name'          => esc_html__( 'שירותים', 'starter-bullet' ),
				'singular_name' => esc_html__( 'שירות', 'starter-bullet' ),
				'add_new_item'  => esc_html__( 'הוסף שירות', 'starter-bullet' ),
				'edit_item'     => esc_html__( 'ערוך שירות', 'starter-bullet' ),
			),
			'public'       => true,
			'has_archive'  => false,
			'show_in_rest' => false,
			'menu_icon'    => 'dashicons-hammer',
			'menu_position'=> 25,
			'supports'     => array( 'title', 'editor', 'thumbnail', 'excerpt', 'page-attributes' ),
			'rewrite'      => array( 'slug' => 'service' ),
		)
	);

	register_post_type(
		'bullet_faq',
		array(
			'labels'       => array(
				'name'          => esc_html__( 'שאלות נפוצות', 'starter-bullet' ),
				'singular_name' => esc_html__( 'שאלה', 'starter-bullet' ),
				'add_new_item'  => esc_html__( 'הוסף שאלה', 'starter-bullet' ),
				'edit_item'     => esc_html__( 'ערוך שאלה', 'starter-bullet' ),
			),
			'public'       => false,
			'show_ui'      => true,
			'show_in_rest' => false,
			'menu_icon'    => 'dashicons-editor-help',
			'menu_position'=> 26,
			'supports'     => array( 'title', 'editor', 'page-attributes' ),
		)
	);

	register_post_type(
		'bullet_review',
		array(
			'labels'       => array(
				'name'          => esc_html__( 'חוות דעת (מידרג)', 'starter-bullet' ),
				'singular_name' => esc_html__( 'חוות דעת', 'starter-bullet' ),
				'add_new_item'  => esc_html__( 'הוסף חוות דעת', 'starter-bullet' ),
				'edit_item'     => esc_html__( 'ערוך חוות דעת', 'starter-bullet' ),
			),
			'public'       => false,
			'show_ui'      => true,
			'show_in_rest' => false,
			'menu_icon'    => 'dashicons-star-filled',
			'menu_position'=> 27,
			'supports'     => array( 'title', 'editor', 'thumbnail', 'page-attributes' ),
		)
	);

	register_post_type(
		'bullet_lead',
		array(
			'labels'       => array(
				'name'          => esc_html__( 'לידים', 'starter-bullet' ),
				'singular_name' => esc_html__( 'ליד', 'starter-bullet' ),
				'add_new_item'  => esc_html__( 'הוסף ליד', 'starter-bullet' ),
				'edit_item'     => esc_html__( 'ערוך ליד', 'starter-bullet' ),
			),
			'public'       => false,
			'show_ui'      => true,
			'show_in_rest' => false,
			'menu_icon'    => 'dashicons-email-alt',
			'menu_position'=> 28,
			'capabilities' => array(
				'create_posts' => 'manage_options',
			),
			'map_meta_cap' => true,
			'supports'     => array( 'title', 'editor' ),
		)
	);
}
add_action( 'init', 'starter_bullet_register_cpts' );

/**
 * Flush rewrite rules on theme switch.
 */
function starter_bullet_flush_rewrites(): void {
	starter_bullet_register_cpts();
	flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'starter_bullet_flush_rewrites' );
