<?php
/**
 * Widget areas.
 *
 * @package Starter_Bullet
 */

declare(strict_types=1);

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once STARTER_BULLET_DIR . '/inc/widgets/footer-info-widget.php';

/**
 * Register widget sidebars.
 */
function starter_bullet_widgets_init(): void {
	$defaults = array(
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title sb-h3 mb-4 font-bold">',
		'after_title'   => '</h3>',
	);

	$areas = array(
		'footer-1' => array(
			'name'        => esc_html__( 'פוטר — עמודה 1', 'starter-bullet' ),
			'description' => esc_html__( 'לוגו ותיאור האתר', 'starter-bullet' ),
		),
		'footer-2' => array(
			'name'        => esc_html__( 'פוטר — עמודה 2', 'starter-bullet' ),
			'description' => esc_html__( 'קישורים מהירים', 'starter-bullet' ),
		),
		'footer-3' => array(
			'name'        => esc_html__( 'פוטר — עמודה 3', 'starter-bullet' ),
			'description' => esc_html__( 'שירותים', 'starter-bullet' ),
		),
		'footer-4' => array(
			'name'        => esc_html__( 'פוטר — עמודה 4', 'starter-bullet' ),
			'description' => esc_html__( 'פרטי יצירת קשר — השתמשו בווידג\'ט "פוטר: שורות מידע"', 'starter-bullet' ),
		),
		'sidebar'  => array(
			'name'        => esc_html__( 'סיידבר', 'starter-bullet' ),
			'description' => esc_html__( 'סיידבר לעמודי בלוג וארכיון', 'starter-bullet' ),
		),
	);

	foreach ( $areas as $id => $area ) {
		register_sidebar(
			array_merge(
				$defaults,
				array(
					'id'          => $id,
					'name'        => $area['name'],
					'description' => $area['description'],
				)
			)
		);
	}
}
add_action( 'widgets_init', 'starter_bullet_widgets_init' );

/**
 * Use classic widgets screen (matches classic editor approach).
 *
 * @param bool $use_block_editor Whether to use the block widgets editor.
 */
function starter_bullet_use_classic_widgets( bool $use_block_editor ): bool {
	return false;
}
add_filter( 'use_widgets_block_editor', 'starter_bullet_use_classic_widgets' );
