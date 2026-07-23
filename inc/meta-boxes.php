<?php
/**
 * Native meta boxes for CPTs.
 *
 * @package Starter_Bullet
 */

declare(strict_types=1);

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register meta boxes.
 */
function starter_bullet_register_meta_boxes(): void {
	add_meta_box(
		'bullet_review_meta',
		esc_html__( 'פרטי חוות דעת', 'starter-bullet' ),
		'starter_bullet_review_meta_box_html',
		'bullet_review',
		'normal',
		'high'
	);

	add_meta_box(
		'bullet_lead_meta',
		esc_html__( 'פרטי ליד', 'starter-bullet' ),
		'starter_bullet_lead_meta_box_html',
		'bullet_lead',
		'normal',
		'high'
	);

	add_meta_box(
		'bullet_faq_services',
		esc_html__( 'שיוך לעמודי שירות', 'starter-bullet' ),
		'starter_bullet_faq_services_meta_box_html',
		'bullet_faq',
		'side',
		'default'
	);
}
add_action( 'add_meta_boxes', 'starter_bullet_register_meta_boxes' );

/**
 * Review meta box HTML.
 *
 * @param WP_Post $post Post object.
 */
function starter_bullet_review_meta_box_html( WP_Post $post ): void {
	wp_nonce_field( 'starter_bullet_review_meta', 'starter_bullet_review_nonce' );

	$rating = (int) get_post_meta( $post->ID, '_bullet_rating', true );
	$name   = get_post_meta( $post->ID, '_bullet_reviewer_name', true );

	if ( $rating < 1 || $rating > 5 ) {
		$rating = 5;
	}
	?>
	<p>
		<label for="bullet_reviewer_name"><strong><?php esc_html_e( 'שם הלקוח', 'starter-bullet' ); ?></strong></label><br>
		<input type="text" id="bullet_reviewer_name" name="bullet_reviewer_name" value="<?php echo esc_attr( $name ); ?>" class="widefat">
	</p>
	<p>
		<label for="bullet_rating"><strong><?php esc_html_e( 'דירוג (1-5)', 'starter-bullet' ); ?></strong></label><br>
		<select id="bullet_rating" name="bullet_rating">
			<?php for ( $i = 5; $i >= 1; $i-- ) : ?>
				<option value="<?php echo esc_attr( (string) $i ); ?>" <?php selected( $rating, $i ); ?>><?php echo esc_html( (string) $i ); ?></option>
			<?php endfor; ?>
		</select>
	</p>
	<?php
}

/**
 * Lead meta box HTML.
 *
 * @param WP_Post $post Post object.
 */
function starter_bullet_lead_meta_box_html( WP_Post $post ): void {
	$phone  = get_post_meta( $post->ID, '_bullet_lead_phone', true );
	$email  = get_post_meta( $post->ID, '_bullet_lead_email', true );
	$source = get_post_meta( $post->ID, '_bullet_lead_source', true );
	?>
	<table class="form-table">
		<tr>
			<th><?php esc_html_e( 'טלפון', 'starter-bullet' ); ?></th>
			<td><?php echo esc_html( $phone ); ?></td>
		</tr>
		<tr>
			<th><?php esc_html_e( 'אימייל', 'starter-bullet' ); ?></th>
			<td><?php echo esc_html( $email ); ?></td>
		</tr>
		<tr>
			<th><?php esc_html_e( 'מקור', 'starter-bullet' ); ?></th>
			<td><?php echo esc_html( $source ); ?></td>
		</tr>
	</table>
	<?php
}

/**
 * Save review meta.
 *
 * @param int $post_id Post ID.
 */
function starter_bullet_save_review_meta( int $post_id ): void {
	if ( ! isset( $_POST['starter_bullet_review_nonce'] ) ) {
		return;
	}

	if ( ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['starter_bullet_review_nonce'] ) ), 'starter_bullet_review_meta' ) ) {
		return;
	}

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	if ( isset( $_POST['bullet_reviewer_name'] ) ) {
		update_post_meta( $post_id, '_bullet_reviewer_name', sanitize_text_field( wp_unslash( $_POST['bullet_reviewer_name'] ) ) );
	}

	if ( isset( $_POST['bullet_rating'] ) ) {
		$rating = absint( $_POST['bullet_rating'] );
		$rating = max( 1, min( 5, $rating ) );
		update_post_meta( $post_id, '_bullet_rating', $rating );
	}
}
add_action( 'save_post_bullet_review', 'starter_bullet_save_review_meta' );

/**
 * FAQ → services association meta box HTML.
 *
 * @param WP_Post $post FAQ post.
 */
function starter_bullet_faq_services_meta_box_html( WP_Post $post ): void {
	wp_nonce_field( 'starter_bullet_faq_services', 'starter_bullet_faq_services_nonce' );

	$selected = get_post_meta( $post->ID, '_bullet_faq_service_id' );
	$selected = is_array( $selected ) ? array_map( 'absint', $selected ) : array();

	// Backward compat with older array meta.
	if ( ! $selected ) {
		$legacy = get_post_meta( $post->ID, '_bullet_faq_service_ids', true );
		if ( is_array( $legacy ) ) {
			$selected = array_map( 'absint', $legacy );
		}
	}

	$services = get_posts(
		array(
			'post_type'      => 'bullet_service',
			'posts_per_page' => -1,
			'orderby'        => 'menu_order title',
			'order'          => 'ASC',
			'post_status'    => array( 'publish', 'draft', 'private' ),
		)
	);
	?>
	<p class="description" style="margin-top:0;">
		<?php esc_html_e( 'סמנו את עמודי השירות שבהם תוצג השאלה־תשובה הזו.', 'starter-bullet' ); ?>
	</p>
	<?php if ( ! $services ) : ?>
		<p><em><?php esc_html_e( 'עדיין לא נוספו שירותים.', 'starter-bullet' ); ?></em></p>
		<?php
		return;
	endif;
	?>
	<div style="max-height:280px;overflow:auto;padding:4px 0;border:1px solid #dcdcde;border-radius:4px;background:#fff;">
		<ul style="margin:0;padding:8px 10px;list-style:none;">
			<?php foreach ( $services as $service ) : ?>
				<li style="margin:0 0 8px;">
					<label style="display:flex;align-items:flex-start;gap:8px;cursor:pointer;">
						<input
							type="checkbox"
							name="bullet_faq_service_ids[]"
							value="<?php echo esc_attr( (string) $service->ID ); ?>"
							<?php checked( in_array( (int) $service->ID, $selected, true ) ); ?>
							style="margin-top:3px;"
						>
						<span><?php echo esc_html( get_the_title( $service ) ); ?></span>
					</label>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
	<?php
}

/**
 * Save FAQ → services association.
 *
 * @param int $post_id FAQ post ID.
 */
function starter_bullet_save_faq_services_meta( int $post_id ): void {
	if ( ! isset( $_POST['starter_bullet_faq_services_nonce'] ) ) {
		return;
	}

	if ( ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['starter_bullet_faq_services_nonce'] ) ), 'starter_bullet_faq_services' ) ) {
		return;
	}

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	$raw = isset( $_POST['bullet_faq_service_ids'] ) ? (array) wp_unslash( $_POST['bullet_faq_service_ids'] ) : array();
	$ids = array();

	foreach ( $raw as $id ) {
		$id = absint( $id );
		if ( $id > 0 && 'bullet_service' === get_post_type( $id ) ) {
			$ids[] = $id;
		}
	}

	$ids = array_values( array_unique( $ids ) );

	delete_post_meta( $post_id, '_bullet_faq_service_id' );
	delete_post_meta( $post_id, '_bullet_faq_service_ids' );

	foreach ( $ids as $id ) {
		add_post_meta( $post_id, '_bullet_faq_service_id', $id, false );
	}
}
add_action( 'save_post_bullet_faq', 'starter_bullet_save_faq_services_meta' );
