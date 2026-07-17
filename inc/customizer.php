<?php
/**
 * Theme Customizer settings.
 *
 * @package Starter_Bullet
 */

declare(strict_types=1);

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register customizer settings.
 *
 * @param WP_Customize_Manager $wp_customize Customizer manager.
 */
function starter_bullet_customize_register( WP_Customize_Manager $wp_customize ): void {
	$wp_customize->add_section(
		'starter_bullet_contact',
		array(
			'title'    => esc_html__( 'פרטי קשר', 'starter-bullet' ),
			'priority' => 30,
		)
	);

	$wp_customize->add_setting(
		'starter_bullet_phone',
		array(
			'default'           => '03-1234567',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'starter_bullet_phone',
		array(
			'label'   => esc_html__( 'מספר טלפון', 'starter-bullet' ),
			'section' => 'starter_bullet_contact',
			'type'    => 'text',
		)
	);

	$wp_customize->add_setting(
		'starter_bullet_whatsapp',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'starter_bullet_whatsapp',
		array(
			'label'   => esc_html__( 'WhatsApp', 'starter-bullet' ),
			'section' => 'starter_bullet_contact',
			'type'    => 'text',
		)
	);

	$wp_customize->add_setting(
		'starter_bullet_address',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_textarea_field',
		)
	);

	$wp_customize->add_control(
		'starter_bullet_address',
		array(
			'label'   => esc_html__( 'כתובת', 'starter-bullet' ),
			'section' => 'starter_bullet_contact',
			'type'    => 'textarea',
		)
	);
}
add_action( 'customize_register', 'starter_bullet_customize_register' );
