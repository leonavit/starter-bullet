<?php
/**
 * Home page sections admin settings (no ACF).
 *
 * @package Starter_Bullet
 */

declare(strict_types=1);

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Default home section configuration.
 *
 * @return array<string, array<string, mixed>>
 */
function starter_bullet_default_sections(): array {
	return array(
		'hero' => array(
			'enabled'            => 1,
			'title'              => 'פתרונות אינסטלציה מקצועיים בתל אביב',
			'subtitle'           => 'אנחנו כאן בשבילכם — שירות מהיר, אמין ומקצועי עם אחריות מלאה על כל עבודה.',
			'btn_primary_text'   => 'התקשרו עכשיו',
			'btn_primary_url'    => 'tel:031234567',
			'btn_secondary_text' => 'למידע נוסף',
			'btn_secondary_url'  => '#about',
			'cf7_shortcode'      => '[contact-form-7 id="bb50bbb" title="טופס יצירת קשר 1"]',
			'benefit_1_title'    => 'אינסטלציה למגורים',
			'benefit_1_desc'     => 'שירותי אינסטלציה מקיפים לבתים פרטיים.',
			'benefit_1_icon'     => 'home',
			'benefit_1_lordicon' => '',
			'benefit_2_title'    => 'אינסטלציה מסחרית',
			'benefit_2_desc'     => 'פתרונות אינסטלציה מותאמים למבנים מסחריים.',
			'benefit_2_icon'     => 'building',
			'benefit_2_lordicon' => '',
			'benefit_3_title'    => 'אינסטלציה בחירום',
			'benefit_3_desc'     => 'מענה מהיר 24/7 למצבי חירום.',
			'benefit_3_icon'     => 'clock',
			'benefit_3_lordicon' => '',
			'image_id'           => 0,
		),
		'about' => array(
			'enabled'    => 1,
			'title'      => 'מי אנחנו',
			'content'    => 'אנו חברת אינסטלציה מובילה עם ניסיון של שנים רבות. אנו מספקים פתרונות מקיפים ללקוחות פרטיים ועסקיים.',
			'btn_text'   => 'קראו עוד',
			'btn_url'    => '#',
			'image_id'   => 0,
		),
		'stats' => array(
			'enabled' => 1,
			'stat_1_number' => '30',
			'stat_1_label'  => 'שנות ניסיון',
			'stat_2_number' => '25K+',
			'stat_2_label'  => 'לקוחות מרוצים',
			'stat_3_number' => '10',
			'stat_3_label'  => 'סניפים',
			'stat_4_number' => '191',
			'stat_4_label'  => 'פרויקטים',
		),
		'features' => array(
			'enabled' => 1,
			'title'   => 'למה לבחור בנו?',
			'item_1_title' => 'מקצועיות',
			'item_1_desc'  => 'צוות מוסמך עם ניסיון עשיר בכל סוגי העבודות.',
			'item_2_title' => 'זמינות',
			'item_2_desc'  => 'מענה מהיר ושירות חירום בכל שעות היממה.',
			'item_3_title' => 'אמינות',
			'item_3_desc'  => 'אחריות מלאה על כל עבודה ושקיפות מלאה במחירים.',
		),
		'secondary' => array(
			'enabled'  => 1,
			'title'    => 'מערכות סינון מים מתקדמות',
			'content'  => 'אנו מתמחים בהתקנה ותחזוקה של מערכות סינון מים איכותיות לבית ולעסק.',
			'item_1'   => 'התקנה מקצועית',
			'item_2'   => 'תחזוקה שוטפת',
			'item_3'   => 'חלפים מקוריים',
			'item_4'   => 'אחריות יצרן',
			'image_id' => 0,
		),
		'services' => array(
			'enabled'  => 1,
			'title'    => 'השירותים שלנו',
			'btn_text' => 'לכל השירותים',
			'btn_url'  => '#',
			'count'    => 3,
		),
		'faq' => array(
			'enabled'  => 1,
			'title'    => 'התשובות לשאלות שלכם',
			'content'  => 'ריכזנו עבורכם את השאלות הנפוצות ביותר. לא מצאתם תשובה? צרו קשר.',
			'btn_text' => 'צרו קשר',
			'btn_url'  => '#contact',
			'count'    => 6,
		),
		'testimonials' => array(
			'enabled'        => 1,
			'title'          => 'מה הלקוחות אומרים',
			'subtitle'       => 'אלפי לקוחות מרוצים בוחרים בנו שוב ושוב',
			'midrag_logo_id' => 0,
			'midrag_score'   => '9.86',
			'midrag_label'   => 'ציון כללי במידרג',
			'midrag_reviews' => '237 חוות דעת',
			'count'          => 4,
		),
		'blog' => array(
			'enabled'  => 1,
			'title'    => 'מאמרים אחרונים',
			'subtitle' => 'טיפים, מדריכים וחדשות מהתחום',
			'count'    => 3,
		),
		'cta' => array(
			'enabled'  => 1,
			'title'    => 'צריכים אינסטלטור בדחיפות?',
			'btn_text' => 'התקשרו עכשיו',
			'phone'    => '03-1234567',
		),
	);
}

/**
 * Section labels for admin UI.
 *
 * @return array<string, string>
 */
function starter_bullet_section_labels(): array {
	return array(
		'hero'         => 'סקשן 1: Hero / כותרת ראשית',
		'about'        => 'סקשן 2: אודות',
		'stats'        => 'סקשן 3: סטטיסטיקות',
		'features'     => 'סקשן 4: יתרונות',
		'secondary'    => 'סקשן 5: מידע משני',
		'services'     => 'סקשן 6: שירותים',
		'faq'          => 'סקשן 7: שאלות נפוצות',
		'testimonials' => 'סקשן 8: חוות דעת',
		'blog'         => 'סקשן 9: בלוג',
		'cta'          => 'סקשן 10: CTA תחתון',
	);
}

/**
 * Merge saved sections with defaults.
 *
 * @return array<string, array<string, mixed>>
 */
function starter_bullet_get_sections(): array {
	$saved    = get_option( 'starter_bullet_home_sections', array() );
	$defaults = starter_bullet_default_sections();
	$merged   = array();

	foreach ( $defaults as $key => $fields ) {
		$merged[ $key ] = array_merge( $fields, $saved[ $key ] ?? array() );
	}

	return starter_bullet_migrate_midrag_to_testimonials( $merged, $saved );
}

/**
 * Move legacy Midrag fields from hero to testimonials (section 8).
 *
 * @param array<string, array<string, mixed>> $merged  Merged sections.
 * @param array<string, array<string, mixed>> $saved   Raw saved option.
 * @return array<string, array<string, mixed>>
 */
function starter_bullet_migrate_midrag_to_testimonials( array $merged, array $saved ): array {
	$keys = array( 'midrag_logo_id', 'midrag_score', 'midrag_label', 'midrag_reviews' );
	$hero = $saved['hero'] ?? array();

	$hero_logo = (int) ( $hero['midrag_logo_id'] ?? 0 );
	if ( $hero_logo <= 0 ) {
		return $merged;
	}

	$testimonials_saved = $saved['testimonials'] ?? array();
	$test_logo          = (int) ( $testimonials_saved['midrag_logo_id'] ?? 0 );

	if ( $test_logo > 0 ) {
		return $merged;
	}

	foreach ( $keys as $key ) {
		if ( isset( $hero[ $key ] ) && $hero[ $key ] !== '' && ( 'midrag_logo_id' !== $key || (int) $hero[ $key ] > 0 ) ) {
			$merged['testimonials'][ $key ] = $hero[ $key ];
		}
	}

	if ( get_option( 'starter_bullet_midrag_migrated', false ) ) {
		return $merged;
	}

	$saved['testimonials'] = array_merge( $testimonials_saved, array_intersect_key( $hero, array_flip( $keys ) ) );
	foreach ( $keys as $key ) {
		unset( $saved['hero'][ $key ] );
	}

	update_option( 'starter_bullet_home_sections', $saved );
	update_option( 'starter_bullet_midrag_migrated', 1 );

	return $merged;
}

/**
 * Register settings.
 */
function starter_bullet_register_home_settings(): void {
	register_setting(
		'starter_bullet_home',
		'starter_bullet_home_sections',
		array(
			'type'              => 'array',
			'sanitize_callback' => 'starter_bullet_sanitize_home_sections',
			'default'           => starter_bullet_default_sections(),
		)
	);
}
add_action( 'admin_init', 'starter_bullet_register_home_settings' );

/**
 * Sanitize home sections input.
 *
 * @param array<string, mixed> $input Raw input.
 * @return array<string, array<string, mixed>>
 */
function starter_bullet_sanitize_home_sections( array $input ): array {
	$defaults = starter_bullet_default_sections();
	$output   = array();

	foreach ( $defaults as $section_key => $fields ) {
		$section_input = $input[ $section_key ] ?? array();
		$output[ $section_key ] = array();

		foreach ( $fields as $field_key => $default_value ) {
			if ( 'enabled' === $field_key ) {
				$output[ $section_key ][ $field_key ] = ! empty( $section_input[ $field_key ] ) ? 1 : 0;
				continue;
			}

			if ( 'image_id' === $field_key || 'count' === $field_key || 'midrag_logo_id' === $field_key ) {
				$output[ $section_key ][ $field_key ] = absint( $section_input[ $field_key ] ?? $default_value );
				continue;
			}

			if ( 'cf7_shortcode' === $field_key ) {
				$output[ $section_key ][ $field_key ] = sanitize_text_field( $section_input[ $field_key ] ?? $default_value );
				continue;
			}

			if ( 'content' === $field_key ) {
				$output[ $section_key ][ $field_key ] = wp_kses_post( $section_input[ $field_key ] ?? $default_value );
				continue;
			}

			$output[ $section_key ][ $field_key ] = sanitize_text_field( $section_input[ $field_key ] ?? $default_value );
		}
	}

	return $output;
}

/**
 * Enqueue admin scripts for media uploader.
 *
 * @param string $hook Current admin page hook.
 */
function starter_bullet_admin_assets( string $hook ): void {
	if ( ! in_array( $hook, array( 'toplevel_page_starter-bullet-home', 'toplevel_page_starter-bullet-site' ), true ) ) {
		return;
	}

	wp_enqueue_media();

	$admin_js = STARTER_BULLET_DIR . '/assets/js/admin.js';

	wp_enqueue_script(
		'starter-bullet-admin',
		STARTER_BULLET_URI . '/assets/js/admin.js',
		array( 'jquery' ),
		file_exists( $admin_js ) ? (string) filemtime( $admin_js ) : STARTER_BULLET_VERSION,
		true
	);
}
add_action( 'admin_enqueue_scripts', 'starter_bullet_admin_assets' );

/**
 * Render image upload field.
 *
 * @param string $section Section key.
 * @param string $field   Field key.
 * @param int    $value   Attachment ID.
 */
function starter_bullet_render_image_field( string $section, string $field, int $value ): void {
	$url = $value ? wp_get_attachment_image_url( $value, 'thumbnail' ) : '';
	$name = sprintf( 'starter_bullet_home_sections[%s][%s]', $section, $field );
	?>
	<div class="sb-media-field" data-field="<?php echo esc_attr( $section . '_' . $field ); ?>">
		<input type="hidden" name="<?php echo esc_attr( $name ); ?>" id="<?php echo esc_attr( $section . '_' . $field ); ?>" value="<?php echo esc_attr( (string) $value ); ?>">
		<div class="sb-media-preview" style="margin-bottom:8px;">
			<?php if ( $url ) : ?>
				<img src="<?php echo esc_url( $url ); ?>" style="max-width:120px;height:auto;border-radius:4px;">
			<?php endif; ?>
		</div>
		<button type="button" class="button sb-upload-image" data-target="<?php echo esc_attr( $section . '_' . $field ); ?>">
			<?php esc_html_e( 'בחר תמונה', 'starter-bullet' ); ?>
		</button>
		<button type="button" class="button sb-remove-image" data-target="<?php echo esc_attr( $section . '_' . $field ); ?>">
			<?php esc_html_e( 'הסר', 'starter-bullet' ); ?>
		</button>
	</div>
	<?php
}

/**
 * Render visual icon picker (grid of clickable icons).
 *
 * @param string $section Section key.
 * @param string $field   Field key.
 * @param string $value   Selected icon key.
 */
function starter_bullet_render_icon_picker( string $section, string $field, string $value ): void {
	$library = sb_benefit_icon_library();
	$name    = sprintf( 'starter_bullet_home_sections[%s][%s]', $section, $field );
	$id      = $section . '_' . $field;

	if ( ! isset( $library[ $value ] ) ) {
		$value = (string) array_key_first( $library );
	}
	?>
	<div class="sb-icon-picker" style="display:flex;flex-wrap:wrap;gap:6px;max-width:480px;">
		<input type="hidden" name="<?php echo esc_attr( $name ); ?>" id="<?php echo esc_attr( $id ); ?>" value="<?php echo esc_attr( $value ); ?>">
		<?php foreach ( $library as $icon_key => $icon ) : ?>
			<button
				type="button"
				class="button sb-icon-picker__option<?php echo $icon_key === $value ? ' sb-icon-picker__option--selected' : ''; ?>"
				data-target="<?php echo esc_attr( $id ); ?>"
				data-value="<?php echo esc_attr( $icon_key ); ?>"
				title="<?php echo esc_attr( $icon['label'] ); ?>"
				aria-label="<?php echo esc_attr( $icon['label'] ); ?>"
				aria-pressed="<?php echo $icon_key === $value ? 'true' : 'false'; ?>"
				style="display:inline-flex;align-items:center;justify-content:center;width:44px;height:44px;padding:0;<?php echo $icon_key === $value ? 'border:2px solid #2271b1;background:#f0f6fc;box-shadow:0 0 0 1px #2271b1;' : ''; ?>"
			>
				<svg width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><?php echo $icon['path']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></svg>
			</button>
		<?php endforeach; ?>
	</div>
	<?php
}

/**
 * Render text field.
 *
 * @param string $section Section key.
 * @param string $field   Field key.
 * @param string $value   Value.
 * @param string $type    Input type.
 */
function starter_bullet_render_field( string $section, string $field, string $value, string $type = 'text' ): void {
	$name = sprintf( 'starter_bullet_home_sections[%s][%s]', $section, $field );

	if ( 'textarea' === $type ) {
		printf(
			'<textarea name="%s" rows="4" class="large-text">%s</textarea>',
			esc_attr( $name ),
			esc_textarea( $value )
		);
		return;
	}

	printf(
		'<input type="%s" name="%s" value="%s" class="regular-text">',
		esc_attr( $type ),
		esc_attr( $name ),
		esc_attr( $value )
	);
}

/**
 * Admin settings page HTML.
 */
function starter_bullet_home_settings_page_html(): void {
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}

	$sections = starter_bullet_get_sections();
	$labels   = starter_bullet_section_labels();
	?>
	<div class="wrap" dir="rtl">
		<h1><?php esc_html_e( 'הגדרות עמוד בית', 'starter-bullet' ); ?></h1>
		<p><?php esc_html_e( 'נהלו את 10 הסקשנים של עמוד הבית. ניתן להדליק/לכבות כל סקשן בנפרד.', 'starter-bullet' ); ?></p>

		<form method="post" action="options.php">
			<?php settings_fields( 'starter_bullet_home' ); ?>

			<?php submit_button( esc_html__( 'שמור שינויים', 'starter-bullet' ), 'primary', 'submit-top' ); ?>

			<?php foreach ( $labels as $section_key => $label ) : ?>
				<?php $data = $sections[ $section_key ]; ?>
				<div class="postbox" style="margin-top:20px;padding:16px;">
					<h2 style="margin-top:0;display:flex;align-items:center;gap:12px;">
						<label>
							<input type="checkbox" name="starter_bullet_home_sections[<?php echo esc_attr( $section_key ); ?>][enabled]" value="1" <?php checked( ! empty( $data['enabled'] ) ); ?>>
							<?php echo esc_html( $label ); ?>
						</label>
					</h2>

					<table class="form-table" role="presentation">
						<?php if ( 'hero' === $section_key ) : ?>
							<tr><th><?php esc_html_e( 'כותרת', 'starter-bullet' ); ?></th><td><?php starter_bullet_render_field( $section_key, 'title', (string) $data['title'] ); ?></td></tr>
							<tr><th><?php esc_html_e( 'תת-כותרת', 'starter-bullet' ); ?></th><td><?php starter_bullet_render_field( $section_key, 'subtitle', (string) $data['subtitle'], 'textarea' ); ?></td></tr>
							<tr><th><?php esc_html_e( 'כפתור ראשי', 'starter-bullet' ); ?></th><td><?php starter_bullet_render_field( $section_key, 'btn_primary_text', (string) $data['btn_primary_text'] ); ?> <?php starter_bullet_render_field( $section_key, 'btn_primary_url', (string) $data['btn_primary_url'] ); ?></td></tr>
							<tr><th><?php esc_html_e( 'כפתור משני', 'starter-bullet' ); ?></th><td><?php starter_bullet_render_field( $section_key, 'btn_secondary_text', (string) $data['btn_secondary_text'] ); ?> <?php starter_bullet_render_field( $section_key, 'btn_secondary_url', (string) $data['btn_secondary_url'] ); ?></td></tr>
							<tr><th><?php esc_html_e( 'שורטקוד CF7', 'starter-bullet' ); ?></th><td><?php starter_bullet_render_field( $section_key, 'cf7_shortcode', (string) $data['cf7_shortcode'] ); ?></td></tr>
							<?php for ( $i = 1; $i <= 3; $i++ ) : ?>
								<tr><th><?php printf( esc_html__( 'פס יתרונות %d', 'starter-bullet' ), $i ); ?></th><td>
									<?php starter_bullet_render_field( $section_key, "benefit_{$i}_title", (string) ( $data[ "benefit_{$i}_title" ] ?? '' ) ); ?><br>
									<?php starter_bullet_render_field( $section_key, "benefit_{$i}_desc", (string) ( $data[ "benefit_{$i}_desc" ] ?? '' ), 'textarea' ); ?>
									<p style="margin:10px 0 4px;"><strong><?php esc_html_e( 'אייקון מהספרייה', 'starter-bullet' ); ?></strong></p>
									<?php starter_bullet_render_icon_picker( $section_key, "benefit_{$i}_icon", (string) ( $data[ "benefit_{$i}_icon" ] ?? '' ) ); ?>
									<p style="margin:10px 0 4px;"><strong><?php esc_html_e( 'או אייקון Lordicon (מנצח על הספרייה)', 'starter-bullet' ); ?></strong></p>
									<?php starter_bullet_render_field( $section_key, "benefit_{$i}_lordicon", (string) ( $data[ "benefit_{$i}_lordicon" ] ?? '' ) ); ?>
									<p class="description"><?php esc_html_e( 'הדביקו קישור JSON מ-lordicon.com (למשל https://cdn.lordicon.com/abcdefgh.json) או רק את המזהה. השאירו ריק לשימוש באייקון מהספרייה.', 'starter-bullet' ); ?></p>
								</td></tr>
							<?php endfor; ?>
							<tr><th><?php esc_html_e( 'תמונת רקע', 'starter-bullet' ); ?></th><td><?php starter_bullet_render_image_field( $section_key, 'image_id', (int) $data['image_id'] ); ?></td></tr>
						<?php elseif ( 'about' === $section_key || 'secondary' === $section_key ) : ?>
							<tr><th><?php esc_html_e( 'כותרת', 'starter-bullet' ); ?></th><td><?php starter_bullet_render_field( $section_key, 'title', (string) $data['title'] ); ?></td></tr>
							<tr><th><?php esc_html_e( 'תוכן', 'starter-bullet' ); ?></th><td><?php starter_bullet_render_field( $section_key, 'content', (string) $data['content'], 'textarea' ); ?></td></tr>
							<?php if ( 'about' === $section_key ) : ?>
								<tr><th><?php esc_html_e( 'כפתור', 'starter-bullet' ); ?></th><td><?php starter_bullet_render_field( $section_key, 'btn_text', (string) $data['btn_text'] ); ?> <?php starter_bullet_render_field( $section_key, 'btn_url', (string) $data['btn_url'] ); ?></td></tr>
							<?php endif; ?>
							<?php if ( 'secondary' === $section_key ) : ?>
								<tr><th><?php esc_html_e( 'פריטים', 'starter-bullet' ); ?></th><td>
									<?php starter_bullet_render_field( $section_key, 'item_1', (string) $data['item_1'] ); ?><br>
									<?php starter_bullet_render_field( $section_key, 'item_2', (string) $data['item_2'] ); ?><br>
									<?php starter_bullet_render_field( $section_key, 'item_3', (string) $data['item_3'] ); ?><br>
									<?php starter_bullet_render_field( $section_key, 'item_4', (string) $data['item_4'] ); ?>
								</td></tr>
							<?php endif; ?>
							<tr><th><?php esc_html_e( 'תמונה', 'starter-bullet' ); ?></th><td><?php starter_bullet_render_image_field( $section_key, 'image_id', (int) $data['image_id'] ); ?></td></tr>
						<?php elseif ( 'stats' === $section_key ) : ?>
							<?php for ( $i = 1; $i <= 4; $i++ ) : ?>
								<tr><th><?php printf( esc_html__( 'סטט %d', 'starter-bullet' ), $i ); ?></th><td>
									<?php starter_bullet_render_field( $section_key, "stat_{$i}_number", (string) $data[ "stat_{$i}_number" ] ); ?>
									<?php starter_bullet_render_field( $section_key, "stat_{$i}_label", (string) $data[ "stat_{$i}_label" ] ); ?>
								</td></tr>
							<?php endfor; ?>
						<?php elseif ( 'features' === $section_key ) : ?>
							<tr><th><?php esc_html_e( 'כותרת', 'starter-bullet' ); ?></th><td><?php starter_bullet_render_field( $section_key, 'title', (string) $data['title'] ); ?></td></tr>
							<?php for ( $i = 1; $i <= 3; $i++ ) : ?>
								<tr><th><?php printf( esc_html__( 'כרטיס %d', 'starter-bullet' ), $i ); ?></th><td>
									<?php starter_bullet_render_field( $section_key, "item_{$i}_title", (string) $data[ "item_{$i}_title" ] ); ?><br>
									<?php starter_bullet_render_field( $section_key, "item_{$i}_desc", (string) $data[ "item_{$i}_desc" ], 'textarea' ); ?>
								</td></tr>
							<?php endfor; ?>
						<?php elseif ( 'testimonials' === $section_key ) : ?>
							<tr><th><?php esc_html_e( 'כותרת', 'starter-bullet' ); ?></th><td><?php starter_bullet_render_field( $section_key, 'title', (string) $data['title'] ); ?></td></tr>
							<tr><th><?php esc_html_e( 'תת-כותרת', 'starter-bullet' ); ?></th><td><?php starter_bullet_render_field( $section_key, 'subtitle', (string) $data['subtitle'] ); ?></td></tr>
							<tr><th colspan="2"><strong><?php esc_html_e( 'מידרג', 'starter-bullet' ); ?></strong></th></tr>
							<tr><th><?php esc_html_e( 'מידרג — לוגו', 'starter-bullet' ); ?></th><td><?php starter_bullet_render_image_field( $section_key, 'midrag_logo_id', (int) ( $data['midrag_logo_id'] ?? 0 ) ); ?></td></tr>
							<tr><th><?php esc_html_e( 'מידרג — ציון', 'starter-bullet' ); ?></th><td><?php starter_bullet_render_field( $section_key, 'midrag_score', (string) ( $data['midrag_score'] ?? '' ) ); ?></td></tr>
							<tr><th><?php esc_html_e( 'מידרג — כותרת', 'starter-bullet' ); ?></th><td><?php starter_bullet_render_field( $section_key, 'midrag_label', (string) ( $data['midrag_label'] ?? '' ) ); ?></td></tr>
							<tr><th><?php esc_html_e( 'מידרג — חוות דעת', 'starter-bullet' ); ?></th><td><?php starter_bullet_render_field( $section_key, 'midrag_reviews', (string) ( $data['midrag_reviews'] ?? '' ) ); ?></td></tr>
							<tr><th><?php esc_html_e( 'כמות פריטים', 'starter-bullet' ); ?></th><td><?php starter_bullet_render_field( $section_key, 'count', (string) $data['count'], 'number' ); ?></td></tr>
							<tr><td colspan="2"><em><?php esc_html_e( 'הפריטים נמשכים אוטומטית מה-CPT המתאים.', 'starter-bullet' ); ?></em></td></tr>
						<?php elseif ( in_array( $section_key, array( 'services', 'faq', 'blog' ), true ) ) : ?>
							<tr><th><?php esc_html_e( 'כותרת', 'starter-bullet' ); ?></th><td><?php starter_bullet_render_field( $section_key, 'title', (string) $data['title'] ); ?></td></tr>
							<?php if ( isset( $data['subtitle'] ) ) : ?>
								<tr><th><?php esc_html_e( 'תת-כותרת', 'starter-bullet' ); ?></th><td><?php starter_bullet_render_field( $section_key, 'subtitle', (string) $data['subtitle'] ); ?></td></tr>
							<?php endif; ?>
							<?php if ( isset( $data['content'] ) ) : ?>
								<tr><th><?php esc_html_e( 'תוכן', 'starter-bullet' ); ?></th><td><?php starter_bullet_render_field( $section_key, 'content', (string) $data['content'], 'textarea' ); ?></td></tr>
							<?php endif; ?>
							<?php if ( isset( $data['btn_text'] ) ) : ?>
								<tr><th><?php esc_html_e( 'כפתור', 'starter-bullet' ); ?></th><td><?php starter_bullet_render_field( $section_key, 'btn_text', (string) $data['btn_text'] ); ?> <?php starter_bullet_render_field( $section_key, 'btn_url', (string) $data['btn_url'] ); ?></td></tr>
							<?php endif; ?>
							<tr><th><?php esc_html_e( 'כמות פריטים', 'starter-bullet' ); ?></th><td><?php starter_bullet_render_field( $section_key, 'count', (string) $data['count'], 'number' ); ?></td></tr>
							<tr><td colspan="2"><em><?php esc_html_e( 'הפריטים נמשכים אוטומטית מה-CPT המתאים.', 'starter-bullet' ); ?></em></td></tr>
						<?php elseif ( 'cta' === $section_key ) : ?>
							<tr><td colspan="2"><em><?php esc_html_e( 'מוצג מעל הפוטר בכל דפי האתר.', 'starter-bullet' ); ?></em></td></tr>
							<tr><th><?php esc_html_e( 'כותרת', 'starter-bullet' ); ?></th><td><?php starter_bullet_render_field( $section_key, 'title', (string) $data['title'] ); ?></td></tr>
							<tr><th><?php esc_html_e( 'טלפון', 'starter-bullet' ); ?></th><td><?php starter_bullet_render_field( $section_key, 'phone', (string) $data['phone'] ); ?></td></tr>
							<tr><th><?php esc_html_e( 'טקסט כפתור', 'starter-bullet' ); ?></th><td><?php starter_bullet_render_field( $section_key, 'btn_text', (string) $data['btn_text'] ); ?></td></tr>
						<?php endif; ?>
					</table>
				</div>
			<?php endforeach; ?>

			<?php submit_button( esc_html__( 'שמור שינויים', 'starter-bullet' ) ); ?>
		</form>
	</div>
	<?php
}

/**
 * Set default options on theme activation.
 */
function starter_bullet_set_default_home_sections(): void {
	if ( false === get_option( 'starter_bullet_home_sections', false ) ) {
		update_option( 'starter_bullet_home_sections', starter_bullet_default_sections() );
	}
}
add_action( 'after_switch_theme', 'starter_bullet_set_default_home_sections' );
