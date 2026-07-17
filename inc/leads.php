<?php
/**
 * Leads storage from Contact Form 7.
 *
 * @package Starter_Bullet
 */

declare(strict_types=1);

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Save CF7 submission as a lead.
 *
 * @param WPCF7_ContactForm $contact_form Contact form instance.
 */
function starter_bullet_save_cf7_lead( $contact_form ): void {
	if ( ! class_exists( 'WPCF7_Submission' ) ) {
		return;
	}

	$submission = WPCF7_Submission::get_instance();

	if ( ! $submission ) {
		return;
	}

	$data = $submission->get_posted_data();

	$name    = '';
	$phone   = '';
	$email   = '';
	$message = '';

	$field_map = array(
		'name'    => array( 'your-name', 'full-name', 'name', 'שם' ),
		'phone'   => array( 'your-phone', 'phone', 'tel', 'טלפון' ),
		'email'   => array( 'your-email', 'email', 'mail', 'אימייל' ),
		'message' => array( 'your-message', 'message', 'הודעה' ),
	);

	foreach ( $field_map['name'] as $key ) {
		if ( ! empty( $data[ $key ] ) ) {
			$name = sanitize_text_field( $data[ $key ] );
			break;
		}
	}

	foreach ( $field_map['phone'] as $key ) {
		if ( ! empty( $data[ $key ] ) ) {
			$phone = sanitize_text_field( $data[ $key ] );
			break;
		}
	}

	foreach ( $field_map['email'] as $key ) {
		if ( ! empty( $data[ $key ] ) ) {
			$email = sanitize_email( $data[ $key ] );
			break;
		}
	}

	foreach ( $field_map['message'] as $key ) {
		if ( ! empty( $data[ $key ] ) ) {
			$message = sanitize_textarea_field( $data[ $key ] );
			break;
		}
	}

	if ( ! $name && ! $phone && ! $email ) {
		return;
	}

	$title = $name ? $name : ( $phone ? $phone : $email );

	$lead_id = wp_insert_post(
		array(
			'post_type'    => 'bullet_lead',
			'post_status'  => 'publish',
			'post_title'   => $title,
			'post_content' => $message,
		),
		true
	);

	if ( is_wp_error( $lead_id ) ) {
		return;
	}

	update_post_meta( $lead_id, '_bullet_lead_phone', $phone );
	update_post_meta( $lead_id, '_bullet_lead_email', $email );
	update_post_meta( $lead_id, '_bullet_lead_source', 'Contact Form 7: ' . $contact_form->title() );
}
add_action( 'wpcf7_mail_sent', 'starter_bullet_save_cf7_lead' );

/**
 * Customize leads admin columns.
 *
 * @param array $columns Columns.
 * @return array
 */
function starter_bullet_lead_columns( array $columns ): array {
	return array(
		'cb'    => $columns['cb'],
		'title' => esc_html__( 'שם', 'starter-bullet' ),
		'phone' => esc_html__( 'טלפון', 'starter-bullet' ),
		'email' => esc_html__( 'אימייל', 'starter-bullet' ),
		'date'  => esc_html__( 'תאריך', 'starter-bullet' ),
	);
}
add_filter( 'manage_bullet_lead_posts_columns', 'starter_bullet_lead_columns' );

/**
 * Render custom lead column values.
 *
 * @param string $column  Column name.
 * @param int    $post_id Post ID.
 */
function starter_bullet_lead_column_values( string $column, int $post_id ): void {
	if ( 'phone' === $column ) {
		echo esc_html( (string) get_post_meta( $post_id, '_bullet_lead_phone', true ) );
	}

	if ( 'email' === $column ) {
		echo esc_html( (string) get_post_meta( $post_id, '_bullet_lead_email', true ) );
	}
}
add_action( 'manage_bullet_lead_posts_custom_column', 'starter_bullet_lead_column_values', 10, 2 );
