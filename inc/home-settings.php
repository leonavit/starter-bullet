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
			'bg_color'           => '',
			'title'              => 'פתרונות אינסטלציה מקצועיים בתל אביב',
			'subtitle'           => 'אנחנו כאן בשבילכם — שירות מהיר, אמין ומקצועי עם אחריות מלאה על כל עבודה.',
			'btn_primary_text'   => 'התקשרו עכשיו',
			'btn_primary_url'    => 'tel:031234567',
			'btn_secondary_text' => 'למידע נוסף',
			'btn_secondary_url'  => '#about',
			'cf7_shortcode'      => '[contact-form-7 id="bb50bbb" title="טופס יצירת קשר 1"]',
			'form_bg_color'      => '',
			'form_bg_opacity'    => 100,
			'form_btn_color'     => '',
			'image_id'           => 0,
			'image_mobile_id'    => 0,
			'bg_type'            => 'image',
			'video_youtube'      => '',
			'video_file_id'      => 0,
		),
		'benefits' => array(
			'enabled'         => 1,
			'bg_color'        => '',
			'icon_width'      => '',
			'icon_height'     => '',
			'icon_bg_visible' => 'show',
			'icon_bg_color'   => '',
			'items'           => array(
				array(
					'title'    => 'אינסטלציה למגורים',
					'desc'     => 'שירותי אינסטלציה מקיפים לבתים פרטיים.',
					'icon'     => 'home',
					'lordicon' => '',
					'url'      => '',
				),
				array(
					'title'    => 'אינסטלציה מסחרית',
					'desc'     => 'פתרונות אינסטלציה מותאמים למבנים מסחריים.',
					'icon'     => 'building',
					'lordicon' => '',
					'url'      => '',
				),
				array(
					'title'    => 'אינסטלציה בחירום',
					'desc'     => 'מענה מהיר 24/7 למצבי חירום.',
					'icon'     => 'clock',
					'lordicon' => '',
					'url'      => '',
				),
			),
		),
		'about' => array(
			'enabled'    => 1,
			'bg_color'   => '',
			'title'      => 'מי אנחנו',
			'content'    => 'אנו חברת אינסטלציה מובילה עם ניסיון של שנים רבות. אנו מספקים פתרונות מקיפים ללקוחות פרטיים ועסקיים.',
			'btn_text'   => 'קראו עוד',
			'btn_url'    => '#',
			'image_id'   => 0,
		),
		'stats' => array(
			'enabled'      => 1,
			'bg_color'     => '',
			'number_color' => '',
			'number_size'  => '',
			'number_weight'=> '',
			'label_color'  => '',
			'label_size'   => '',
			'label_weight' => '',
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
			'enabled'         => 1,
			'bg_color'        => '',
			'title'           => 'למה לבחור בנו?',
			'columns'         => 3,
			'icon_width'      => '',
			'icon_height'     => '',
			'icon_bg_visible' => 'show',
			'icon_bg_color'   => '',
			'items'           => array(
				array(
					'title'    => 'מקצועיות',
					'desc'     => 'צוות מוסמך עם ניסיון עשיר בכל סוגי העבודות.',
					'icon'     => 'badge',
					'lordicon' => '',
				),
				array(
					'title'    => 'זמינות',
					'desc'     => 'מענה מהיר ושירות חירום בכל שעות היממה.',
					'icon'     => 'clock',
					'lordicon' => '',
				),
				array(
					'title'    => 'אמינות',
					'desc'     => 'אחריות מלאה על כל עבודה ושקיפות מלאה במחירים.',
					'icon'     => 'shield',
					'lordicon' => '',
				),
			),
		),
		'secondary' => array(
			'enabled'  => 1,
			'bg_color' => '',
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
			'bg_color' => '',
			'title'    => 'השירותים שלנו',
			'btn_text' => 'לכל השירותים',
			'btn_url'  => '#',
			'count'    => 3,
		),
		'faq' => array(
			'enabled'  => 1,
			'bg_color' => '',
			'title'    => 'התשובות לשאלות שלכם',
			'content'  => 'ריכזנו עבורכם את השאלות הנפוצות ביותר. לא מצאתם תשובה? צרו קשר.',
			'btn_text' => 'צרו קשר',
			'btn_url'  => '#contact',
			'count'    => 6,
		),
		'testimonials' => array(
			'enabled'        => 1,
			'bg_color'       => '',
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
			'bg_color' => '',
			'title'    => 'מאמרים אחרונים',
			'subtitle' => 'טיפים, מדריכים וחדשות מהתחום',
			'count'    => 3,
		),
		'cta' => array(
			'enabled'        => 1,
			'home_only'      => 0,
			'bg_color'       => '',
			'title'          => 'צריכים אינסטלטור בדחיפות?',
			'btn_text'       => 'התקשרו עכשיו',
			'btn_bg_color'   => '',
			'btn_text_color' => '',
			'phone'          => '03-1234567',
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
		'benefits'     => 'סקשן: פס יתרונות',
		'about'        => 'סקשן 2: אודות',
		'stats'        => 'סקשן 3: סטטיסטיקות',
		'features'     => 'סקשן 4: יתרונות (כרטיסים)',
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

	$merged = starter_bullet_migrate_midrag_to_testimonials( $merged, $saved );
	$merged = starter_bullet_migrate_features_items( $merged, $saved );

	return starter_bullet_migrate_benefits_from_hero( $merged, $saved );
}

/**
 * Convert legacy fixed features fields (item_1_title...) to the items repeater.
 *
 * @param array<string, array<string, mixed>> $merged Merged sections.
 * @param array<string, array<string, mixed>> $saved  Raw saved option.
 * @return array<string, array<string, mixed>>
 */
function starter_bullet_migrate_features_items( array $merged, array $saved ): array {
	$features_saved = $saved['features'] ?? array();

	// Already migrated (or freshly saved with the repeater).
	if ( isset( $features_saved['items'] ) && is_array( $features_saved['items'] ) ) {
		return $merged;
	}

	$legacy = array();
	for ( $i = 1; $i <= 3; $i++ ) {
		$title = (string) ( $features_saved[ "item_{$i}_title" ] ?? '' );
		$desc  = (string) ( $features_saved[ "item_{$i}_desc" ] ?? '' );
		if ( '' !== $title || '' !== $desc ) {
			$legacy[] = array(
				'title' => $title,
				'desc'  => $desc,
			);
		}
	}

	if ( $legacy ) {
		$merged['features']['items'] = $legacy;
	}

	return $merged;
}

/**
 * Move legacy hero benefit fields into the dedicated benefits section.
 *
 * @param array<string, array<string, mixed>> $merged Merged sections.
 * @param array<string, array<string, mixed>> $saved  Raw saved option.
 * @return array<string, array<string, mixed>>
 */
function starter_bullet_migrate_benefits_from_hero( array $merged, array $saved ): array {
	$benefits_saved = $saved['benefits'] ?? array();

	if ( isset( $benefits_saved['items'] ) && is_array( $benefits_saved['items'] ) && $benefits_saved['items'] ) {
		return $merged;
	}

	$hero  = $saved['hero'] ?? array();
	$items = array();

	for ( $i = 1; $i <= 3; $i++ ) {
		$title    = (string) ( $hero[ "benefit_{$i}_title" ] ?? '' );
		$desc     = (string) ( $hero[ "benefit_{$i}_desc" ] ?? '' );
		$icon     = (string) ( $hero[ "benefit_{$i}_icon" ] ?? '' );
		$lordicon = (string) ( $hero[ "benefit_{$i}_lordicon" ] ?? '' );

		if ( '' === $title && '' === $desc && '' === $lordicon && '' === $icon ) {
			continue;
		}

		$items[] = array(
			'title'    => $title,
			'desc'     => $desc,
			'icon'     => $icon ? $icon : 'home',
			'lordicon' => $lordicon,
		);
	}

	if ( $items ) {
		$merged['benefits']['items'] = $items;
	}

	return $merged;
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
 * Sanitize an optional icon size in pixels (empty or 12–120).
 *
 * @param mixed $value Raw value.
 */
function starter_bullet_sanitize_icon_size( $value ): string {
	if ( '' === $value || null === $value ) {
		return '';
	}

	return (string) max( 12, min( 120, absint( $value ) ) );
}

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
			if ( 'enabled' === $field_key || 'home_only' === $field_key ) {
				$output[ $section_key ][ $field_key ] = ! empty( $section_input[ $field_key ] ) ? 1 : 0;
				continue;
			}

			if ( 'items' === $field_key ) {
				$items   = array();
				$library = function_exists( 'sb_benefit_icon_library' ) ? array_keys( sb_benefit_icon_library() ) : array();
				foreach ( (array) ( $section_input['items'] ?? array() ) as $item ) {
					if ( ! is_array( $item ) ) {
						continue;
					}
					$title = sanitize_text_field( (string) ( $item['title'] ?? '' ) );
					$desc  = sanitize_text_field( (string) ( $item['desc'] ?? '' ) );
					if ( '' === $title && '' === $desc ) {
						continue;
					}
					$icon = sanitize_text_field( (string) ( $item['icon'] ?? 'badge' ) );
					if ( $library && ! in_array( $icon, $library, true ) ) {
						$icon = 'badge';
					}
					$items[] = array(
						'title'    => $title,
						'desc'     => $desc,
						'icon'     => $icon,
						'lordicon' => sanitize_text_field( (string) ( $item['lordicon'] ?? '' ) ),
						'url'      => esc_url_raw( (string) ( $item['url'] ?? '' ) ),
					);
				}
				$output[ $section_key ][ $field_key ] = $items;
				continue;
			}

			if ( 'columns' === $field_key ) {
				$columns = absint( $section_input[ $field_key ] ?? $default_value );
				$output[ $section_key ][ $field_key ] = max( 1, min( 4, $columns ) );
				continue;
			}

			if ( 'bg_color' === $field_key || 'form_bg_color' === $field_key || 'form_btn_color' === $field_key || 'number_color' === $field_key || 'label_color' === $field_key || 'btn_bg_color' === $field_key || 'btn_text_color' === $field_key ) {
				$color = sanitize_hex_color( (string) ( $section_input[ $field_key ] ?? '' ) );
				$output[ $section_key ][ $field_key ] = $color ? $color : '';
				continue;
			}

			if ( 'icon_width' === $field_key || 'icon_height' === $field_key ) {
				$output[ $section_key ][ $field_key ] = starter_bullet_sanitize_icon_size( $section_input[ $field_key ] ?? '' );
				continue;
			}

			if ( 'icon_bg_visible' === $field_key ) {
				$output[ $section_key ][ $field_key ] = ( ( $section_input[ $field_key ] ?? 'show' ) === 'hide' ) ? 'hide' : 'show';
				continue;
			}

			if ( 'icon_bg_color' === $field_key ) {
				$color = sanitize_hex_color( (string) ( $section_input[ $field_key ] ?? '' ) );
				$output[ $section_key ][ $field_key ] = $color ? $color : '';
				continue;
			}

			if ( 'number_size' === $field_key || 'label_size' === $field_key ) {
				$raw = $section_input[ $field_key ] ?? '';
				if ( '' === $raw || null === $raw ) {
					$output[ $section_key ][ $field_key ] = '';
				} else {
					$output[ $section_key ][ $field_key ] = (string) max( 10, min( 96, absint( $raw ) ) );
				}
				continue;
			}

			if ( 'number_weight' === $field_key || 'label_weight' === $field_key ) {
				$raw = $section_input[ $field_key ] ?? '';
				if ( '' === $raw || null === $raw ) {
					$output[ $section_key ][ $field_key ] = '';
				} else {
					$weight = absint( $raw );
					// Snap to nearest hundred between 100–800.
					$weight = (int) ( round( $weight / 100 ) * 100 );
					$output[ $section_key ][ $field_key ] = (string) max( 100, min( 800, $weight ) );
				}
				continue;
			}

			if ( 'form_bg_opacity' === $field_key ) {
				$opacity = absint( $section_input[ $field_key ] ?? $default_value );
				$output[ $section_key ][ $field_key ] = min( 100, $opacity );
				continue;
			}

			if ( 'bg_type' === $field_key ) {
				$bg_type = (string) ( $section_input[ $field_key ] ?? 'image' );
				$output[ $section_key ][ $field_key ] = in_array( $bg_type, array( 'image', 'video' ), true ) ? $bg_type : 'image';
				continue;
			}

			if ( 'video_youtube' === $field_key ) {
				$output[ $section_key ][ $field_key ] = esc_url_raw( (string) ( $section_input[ $field_key ] ?? '' ) );
				continue;
			}

			if ( 'image_id' === $field_key || 'image_mobile_id' === $field_key || 'count' === $field_key || 'midrag_logo_id' === $field_key || 'video_file_id' === $field_key ) {
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
	wp_enqueue_style( 'wp-color-picker' );

	$admin_js = STARTER_BULLET_DIR . '/assets/js/admin.js';

	wp_enqueue_script(
		'starter-bullet-admin',
		STARTER_BULLET_URI . '/assets/js/admin.js',
		array( 'jquery', 'wp-color-picker' ),
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
 * Render video upload field (media library, video files).
 *
 * @param string $section Section key.
 * @param string $field   Field key.
 * @param int    $value   Attachment ID.
 */
function starter_bullet_render_video_field( string $section, string $field, int $value ): void {
	$name     = sprintf( 'starter_bullet_home_sections[%s][%s]', $section, $field );
	$id       = $section . '_' . $field;
	$filename = $value ? wp_basename( (string) wp_get_attachment_url( $value ) ) : '';
	?>
	<div class="sb-media-field" data-field="<?php echo esc_attr( $id ); ?>">
		<input type="hidden" name="<?php echo esc_attr( $name ); ?>" id="<?php echo esc_attr( $id ); ?>" value="<?php echo esc_attr( (string) $value ); ?>">
		<div class="sb-media-preview" style="margin-bottom:8px;">
			<?php if ( $filename ) : ?>
				<code><?php echo esc_html( $filename ); ?></code>
			<?php endif; ?>
		</div>
		<button type="button" class="button sb-upload-video" data-target="<?php echo esc_attr( $id ); ?>">
			<?php esc_html_e( 'בחר וידאו', 'starter-bullet' ); ?>
		</button>
		<button type="button" class="button sb-remove-image" data-target="<?php echo esc_attr( $id ); ?>">
			<?php esc_html_e( 'הסר', 'starter-bullet' ); ?>
		</button>
	</div>
	<?php
}

/**
 * Render visual icon picker (grid of clickable icons).
 *
 * @param string      $section Section key.
 * @param string      $field   Field key.
 * @param string      $value   Selected icon key.
 * @param string|null $name    Optional custom input name (for repeaters).
 * @param string|null $id      Optional custom input id (for repeaters).
 */
function starter_bullet_render_icon_picker( string $section, string $field, string $value, ?string $name = null, ?string $id = null ): void {
	$library = sb_benefit_icon_library();
	$name    = $name ?? sprintf( 'starter_bullet_home_sections[%s][%s]', $section, $field );
	$id      = $id ?? ( $section . '_' . $field );

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
 * Render shared icon-size + icon-circle background controls.
 *
 * @param string               $section Section key.
 * @param array<string, mixed> $data    Section data.
 */
function starter_bullet_render_icon_style_fields( string $section, array $data ): void {
	$bg_visible = ( ( $data['icon_bg_visible'] ?? 'show' ) === 'hide' ) ? 'hide' : 'show';
	?>
	<tr><th><?php esc_html_e( 'גודל אייקון (לכל הפריטים)', 'starter-bullet' ); ?></th><td>
		<label style="margin-left:12px;"><?php esc_html_e( 'רוחב', 'starter-bullet' ); ?>
			<input type="number" name="starter_bullet_home_sections[<?php echo esc_attr( $section ); ?>][icon_width]" value="<?php echo esc_attr( (string) ( $data['icon_width'] ?? '' ) ); ?>" min="12" max="120" step="1" style="width:70px;" placeholder="28"> px
		</label>
		<label><?php esc_html_e( 'גובה', 'starter-bullet' ); ?>
			<input type="number" name="starter_bullet_home_sections[<?php echo esc_attr( $section ); ?>][icon_height]" value="<?php echo esc_attr( (string) ( $data['icon_height'] ?? '' ) ); ?>" min="12" max="120" step="1" style="width:70px;" placeholder="28"> px
		</label>
		<p class="description"><?php esc_html_e( 'השאירו ריק לברירת מחדל (28px).', 'starter-bullet' ); ?></p>
	</td></tr>
	<tr><th><?php esc_html_e( 'רקע עגול לאייקון', 'starter-bullet' ); ?></th><td>
		<label><input type="radio" name="starter_bullet_home_sections[<?php echo esc_attr( $section ); ?>][icon_bg_visible]" value="show" <?php checked( 'show', $bg_visible ); ?>> <?php esc_html_e( 'חשוף', 'starter-bullet' ); ?></label><br>
		<label><input type="radio" name="starter_bullet_home_sections[<?php echo esc_attr( $section ); ?>][icon_bg_visible]" value="hide" <?php checked( 'hide', $bg_visible ); ?>> <?php esc_html_e( 'מוסתר', 'starter-bullet' ); ?></label>
	</td></tr>
	<tr><th><?php esc_html_e( 'צבע רקע עגול לאייקון', 'starter-bullet' ); ?></th><td>
		<?php starter_bullet_render_color_field( $section, 'icon_bg_color', (string) ( $data['icon_bg_color'] ?? '' ) ); ?>
		<p class="description"><?php esc_html_e( 'רלוונטי כשהרקע העגול חשוף. השאירו ריק לברירת מחדל.', 'starter-bullet' ); ?></p>
	</td></tr>
	<?php
}

/**
 * Render icon-items repeater (title/desc/icon/lordicon[/url]) for features & benefits.
 *
 * @param string                           $section   Section key.
 * @param array<int, array<string, mixed>> $items     Items.
 * @param bool                             $with_link Whether to show link picker per item.
 */
function starter_bullet_render_icon_items_repeater( string $section, array $items, bool $with_link = false ): void {
	static $template_printed = false;
	$base = sprintf( 'starter_bullet_home_sections[%s][items]', $section );
	?>
	<div class="sb-repeater" data-name="<?php echo esc_attr( $base ); ?>" data-type="icon-items" data-section="<?php echo esc_attr( $section ); ?>" data-with-link="<?php echo $with_link ? '1' : '0'; ?>">
		<div class="sb-repeater__rows">
			<?php foreach ( array_values( $items ) as $idx => $item ) : ?>
				<?php
				$icon_name     = sprintf( '%s[%d][icon]', $base, $idx );
				$icon_id       = $section . '_item_' . $idx . '_icon';
				$lordicon_name = sprintf( '%s[%d][lordicon]', $base, $idx );
				$url_name      = sprintf( '%s[%d][url]', $base, $idx );
				$url_id        = $section . '_item_' . $idx . '_url';
				?>
				<div class="sb-repeater__row" style="display:flex;gap:8px;align-items:flex-start;margin-bottom:10px;padding:10px;background:#f6f7f7;border:1px solid #dcdcde;border-radius:4px;">
					<div style="flex:1;">
						<input type="text" name="<?php echo esc_attr( sprintf( '%s[%d][title]', $base, $idx ) ); ?>" value="<?php echo esc_attr( (string) ( $item['title'] ?? '' ) ); ?>" class="regular-text" placeholder="<?php esc_attr_e( 'כותרת', 'starter-bullet' ); ?>" style="width:100%;margin-bottom:6px;">
						<textarea name="<?php echo esc_attr( sprintf( '%s[%d][desc]', $base, $idx ) ); ?>" rows="2" class="large-text" placeholder="<?php esc_attr_e( 'תיאור', 'starter-bullet' ); ?>"><?php echo esc_textarea( (string) ( $item['desc'] ?? '' ) ); ?></textarea>
						<p style="margin:10px 0 4px;"><strong><?php esc_html_e( 'אייקון מהספרייה', 'starter-bullet' ); ?></strong></p>
						<?php starter_bullet_render_icon_picker( $section, 'item_icon_' . $idx, (string) ( $item['icon'] ?? 'badge' ), $icon_name, $icon_id ); ?>
						<p style="margin:10px 0 4px;"><strong><?php esc_html_e( 'או אייקון Lordicon (מנצח על הספרייה)', 'starter-bullet' ); ?></strong></p>
						<input type="text" name="<?php echo esc_attr( $lordicon_name ); ?>" value="<?php echo esc_attr( (string) ( $item['lordicon'] ?? '' ) ); ?>" class="regular-text" placeholder="https://cdn.lordicon.com/….json" style="width:100%;">
						<p class="description"><?php esc_html_e( 'הדביקו קישור JSON מ-lordicon.com או רק את המזהה. השאירו ריק לשימוש באייקון מהספרייה.', 'starter-bullet' ); ?></p>
						<?php if ( $with_link ) : ?>
							<p style="margin:10px 0 4px;"><strong><?php esc_html_e( 'קישור (לא חובה)', 'starter-bullet' ); ?></strong></p>
							<?php starter_bullet_render_link_field( $section, 'item_url_' . $idx, (string) ( $item['url'] ?? '' ), $url_name, $url_id ); ?>
							<p class="description"><?php esc_html_e( 'קישור ידני או בחירת עמוד/פוסט. אם ריק — הפריט לא יהיה לחיץ.', 'starter-bullet' ); ?></p>
						<?php endif; ?>
					</div>
					<button type="button" class="button sb-repeater__remove" aria-label="<?php esc_attr_e( 'הסר פריט', 'starter-bullet' ); ?>">&times;</button>
				</div>
			<?php endforeach; ?>
		</div>
		<button type="button" class="button button-secondary sb-repeater__add"><?php esc_html_e( '+ הוסף פריט', 'starter-bullet' ); ?></button>
	</div>
	<?php if ( ! $template_printed ) : ?>
		<?php $template_printed = true; ?>
		<template id="sb-icon-items-template">
			<div class="sb-repeater__row" style="display:flex;gap:8px;align-items:flex-start;margin-bottom:10px;padding:10px;background:#f6f7f7;border:1px solid #dcdcde;border-radius:4px;">
				<div style="flex:1;">
					<input type="text" data-field="title" class="regular-text" placeholder="<?php esc_attr_e( 'כותרת', 'starter-bullet' ); ?>" style="width:100%;margin-bottom:6px;">
					<textarea data-field="desc" rows="2" class="large-text" placeholder="<?php esc_attr_e( 'תיאור', 'starter-bullet' ); ?>"></textarea>
					<p style="margin:10px 0 4px;"><strong><?php esc_html_e( 'אייקון מהספרייה', 'starter-bullet' ); ?></strong></p>
					<?php starter_bullet_render_icon_picker( 'tpl', 'item_icon_tpl', 'badge', '__ICON_NAME__', '__ICON_ID__' ); ?>
					<p style="margin:10px 0 4px;"><strong><?php esc_html_e( 'או אייקון Lordicon (מנצח על הספרייה)', 'starter-bullet' ); ?></strong></p>
					<input type="text" data-field="lordicon" class="regular-text" placeholder="https://cdn.lordicon.com/….json" style="width:100%;">
					<p class="description"><?php esc_html_e( 'הדביקו קישור JSON מ-lordicon.com או רק את המזהה. השאירו ריק לשימוש באייקון מהספרייה.', 'starter-bullet' ); ?></p>
					<div class="sb-icon-item-link" data-link-block style="display:none;">
						<p style="margin:10px 0 4px;"><strong><?php esc_html_e( 'קישור (לא חובה)', 'starter-bullet' ); ?></strong></p>
						<?php starter_bullet_render_link_field( 'tpl', 'item_url_tpl', '', '__URL_NAME__', '__URL_ID__' ); ?>
						<p class="description"><?php esc_html_e( 'קישור ידני או בחירת עמוד/פוסט. אם ריק — הפריט לא יהיה לחיץ.', 'starter-bullet' ); ?></p>
					</div>
				</div>
				<button type="button" class="button sb-repeater__remove" aria-label="<?php esc_attr_e( 'הסר פריט', 'starter-bullet' ); ?>">&times;</button>
			</div>
		</template>
	<?php endif; ?>
	<?php
}

/**
 * Render link field with source picker (pages / posts / manual URL).
 *
 * The final URL is always stored in the same text field, so the front-end
 * keeps working unchanged.
 *
 * @param string $section Section key.
 * @param string $field   Field key.
 * @param string $value   Current URL value.
 */
function starter_bullet_render_link_field( string $section, string $field, string $value, ?string $name = null, ?string $id = null ): void {
	static $pages = null;
	static $posts = null;

	if ( null === $pages ) {
		$pages = get_pages( array( 'sort_column' => 'post_title' ) );
		$posts = get_posts(
			array(
				'numberposts' => 100,
				'post_status' => 'publish',
				'orderby'     => 'title',
				'order'       => 'ASC',
			)
		);
	}

	$name = $name ?? sprintf( 'starter_bullet_home_sections[%s][%s]', $section, $field );
	$id   = $id ?? ( $section . '_' . $field );

	// Detect whether the saved URL points to a page or a post.
	$source     = 'manual';
	$normalized = untrailingslashit( $value );

	$page_options = array();
	foreach ( $pages as $page ) {
		$permalink = untrailingslashit( (string) get_permalink( $page ) );
		$page_options[ $permalink ] = $page->post_title;
		if ( '' !== $normalized && $permalink === $normalized ) {
			$source = 'page';
		}
	}

	$post_options = array();
	foreach ( $posts as $post_item ) {
		$permalink = untrailingslashit( (string) get_permalink( $post_item ) );
		$post_options[ $permalink ] = $post_item->post_title;
		if ( '' !== $normalized && $permalink === $normalized && 'page' !== $source ) {
			$source = 'post';
		}
	}
	?>
	<div class="sb-link-field" style="display:flex;flex-wrap:wrap;gap:6px;align-items:center;">
		<select class="sb-link-source">
			<option value="manual" <?php selected( 'manual', $source ); ?>><?php esc_html_e( 'קישור ידני', 'starter-bullet' ); ?></option>
			<option value="page" <?php selected( 'page', $source ); ?>><?php esc_html_e( 'עמוד', 'starter-bullet' ); ?></option>
			<option value="post" <?php selected( 'post', $source ); ?>><?php esc_html_e( 'פוסט', 'starter-bullet' ); ?></option>
		</select>

		<select class="sb-link-items sb-link-items--page" style="max-width:220px;<?php echo 'page' === $source ? '' : 'display:none;'; ?>">
			<option value=""><?php esc_html_e( '— בחרו עמוד —', 'starter-bullet' ); ?></option>
			<?php foreach ( $page_options as $url => $title ) : ?>
				<option value="<?php echo esc_url( $url ); ?>" <?php selected( 'page' === $source && $url === $normalized ); ?>><?php echo esc_html( $title ); ?></option>
			<?php endforeach; ?>
		</select>

		<select class="sb-link-items sb-link-items--post" style="max-width:220px;<?php echo 'post' === $source ? '' : 'display:none;'; ?>">
			<option value=""><?php esc_html_e( '— בחרו פוסט —', 'starter-bullet' ); ?></option>
			<?php foreach ( $post_options as $url => $title ) : ?>
				<option value="<?php echo esc_url( $url ); ?>" <?php selected( 'post' === $source && $url === $normalized ); ?>><?php echo esc_html( $title ); ?></option>
			<?php endforeach; ?>
		</select>

		<input type="text" name="<?php echo esc_attr( $name ); ?>" id="<?php echo esc_attr( $id ); ?>" value="<?php echo esc_attr( $value ); ?>" class="regular-text sb-link-url" placeholder="https://" <?php echo 'manual' === $source ? '' : 'readonly'; ?>>
	</div>
	<?php
}

/**
 * Render background color picker field.
 *
 * @param string $section Section key.
 * @param string $field   Field key.
 * @param string $value   Hex color value.
 */
function starter_bullet_render_color_field( string $section, string $field, string $value ): void {
	$name = sprintf( 'starter_bullet_home_sections[%s][%s]', $section, $field );
	printf(
		'<input type="text" name="%s" value="%s" class="sb-color-picker" data-default-color="">',
		esc_attr( $name ),
		esc_attr( $value )
	);
	printf(
		'<p class="description">%s</p>',
		esc_html__( 'השאירו ריק לצבע ברירת המחדל של הסקשן. לחיצה על "נקה" מחזירה לברירת מחדל.', 'starter-bullet' )
	);
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
		<p><?php esc_html_e( 'נהלו את סקשני עמוד הבית. ניתן להדליק/לכבות כל סקשן בנפרד.', 'starter-bullet' ); ?></p>

		<form method="post" action="options.php">
			<?php settings_fields( 'starter_bullet_home' ); ?>

			<div style="display:flex;align-items:center;gap:8px;">
				<?php submit_button( esc_html__( 'שמור שינויים', 'starter-bullet' ), 'primary', 'submit-top', false ); ?>
				<span style="margin-inline-start:auto;display:inline-flex;gap:8px;">
					<button type="button" class="button sb-sections-collapse-all"><?php esc_html_e( 'סגור הכל', 'starter-bullet' ); ?></button>
					<button type="button" class="button sb-sections-expand-all"><?php esc_html_e( 'פתח הכל', 'starter-bullet' ); ?></button>
				</span>
			</div>

			<?php foreach ( $labels as $section_key => $label ) : ?>
				<?php $data = $sections[ $section_key ]; ?>
				<div class="postbox" style="margin-top:20px;padding:16px;">
					<h2 style="margin-top:0;display:flex;align-items:center;gap:12px;">
						<label>
							<input type="checkbox" name="starter_bullet_home_sections[<?php echo esc_attr( $section_key ); ?>][enabled]" value="1" <?php checked( ! empty( $data['enabled'] ) ); ?>>
							<?php echo esc_html( $label ); ?>
						</label>
						<button type="button" class="button sb-section-toggle" aria-expanded="false" title="<?php esc_attr_e( 'קפל / פתח סקשן', 'starter-bullet' ); ?>" style="margin-inline-start:auto;width:30px;height:30px;padding:0;font-size:18px;line-height:1;font-weight:700;">+</button>
					</h2>

					<table class="form-table" role="presentation" style="display:none;">
						<tr><th><?php esc_html_e( 'צבע רקע', 'starter-bullet' ); ?></th><td><?php starter_bullet_render_color_field( $section_key, 'bg_color', (string) ( $data['bg_color'] ?? '' ) ); ?></td></tr>
						<?php if ( 'hero' === $section_key ) : ?>
							<tr><th><?php esc_html_e( 'כותרת', 'starter-bullet' ); ?></th><td><?php starter_bullet_render_field( $section_key, 'title', (string) $data['title'] ); ?></td></tr>
							<tr><th><?php esc_html_e( 'תת-כותרת', 'starter-bullet' ); ?></th><td><?php starter_bullet_render_field( $section_key, 'subtitle', (string) $data['subtitle'], 'textarea' ); ?></td></tr>
							<tr><th><?php esc_html_e( 'כפתור ראשי', 'starter-bullet' ); ?></th><td><?php starter_bullet_render_field( $section_key, 'btn_primary_text', (string) $data['btn_primary_text'] ); ?><div style="margin-top:6px;"><?php starter_bullet_render_link_field( $section_key, 'btn_primary_url', (string) $data['btn_primary_url'] ); ?></div></td></tr>
							<tr><th><?php esc_html_e( 'כפתור משני', 'starter-bullet' ); ?></th><td><?php starter_bullet_render_field( $section_key, 'btn_secondary_text', (string) $data['btn_secondary_text'] ); ?><div style="margin-top:6px;"><?php starter_bullet_render_link_field( $section_key, 'btn_secondary_url', (string) $data['btn_secondary_url'] ); ?></div></td></tr>
							<tr><th><?php esc_html_e( 'שורטקוד CF7', 'starter-bullet' ); ?></th><td><?php starter_bullet_render_field( $section_key, 'cf7_shortcode', (string) $data['cf7_shortcode'] ); ?></td></tr>
							<tr><th><?php esc_html_e( 'צבע רקע הטופס', 'starter-bullet' ); ?></th><td><?php starter_bullet_render_color_field( $section_key, 'form_bg_color', (string) ( $data['form_bg_color'] ?? '' ) ); ?></td></tr>
							<tr><th><?php esc_html_e( 'שקיפות רקע הטופס', 'starter-bullet' ); ?></th><td>
								<input type="number" name="starter_bullet_home_sections[hero][form_bg_opacity]" value="<?php echo esc_attr( (string) ( $data['form_bg_opacity'] ?? 100 ) ); ?>" min="0" max="100" step="5" style="width:80px;"> %
								<p class="description"><?php esc_html_e( '100 = אטום לגמרי, 0 = שקוף לגמרי.', 'starter-bullet' ); ?></p>
							</td></tr>
							<tr><th><?php esc_html_e( 'צבע רקע כפתור הטופס', 'starter-bullet' ); ?></th><td><?php starter_bullet_render_color_field( $section_key, 'form_btn_color', (string) ( $data['form_btn_color'] ?? '' ) ); ?></td></tr>
							<tr><th><?php esc_html_e( 'תמונת רקע', 'starter-bullet' ); ?></th><td><?php starter_bullet_render_image_field( $section_key, 'image_id', (int) $data['image_id'] ); ?></td></tr>
							<tr><th><?php esc_html_e( 'סוג רקע', 'starter-bullet' ); ?></th><td>
								<?php $hero_bg_type = ( ( $data['bg_type'] ?? 'image' ) === 'video' ) ? 'video' : 'image'; ?>
								<label><input type="radio" name="starter_bullet_home_sections[hero][bg_type]" value="image" <?php checked( 'image', $hero_bg_type ); ?>> <?php esc_html_e( 'תמונה', 'starter-bullet' ); ?></label><br>
								<label><input type="radio" name="starter_bullet_home_sections[hero][bg_type]" value="video" <?php checked( 'video', $hero_bg_type ); ?>> <?php esc_html_e( 'וידאו', 'starter-bullet' ); ?></label>
							</td></tr>
							<tr><th><?php esc_html_e( 'וידאו — קישור YouTube', 'starter-bullet' ); ?></th><td>
								<?php starter_bullet_render_field( $section_key, 'video_youtube', (string) ( $data['video_youtube'] ?? '' ) ); ?>
								<p class="description"><?php esc_html_e( 'אם נבחר "וידאו" ולא הוזן קישור ולא נבחר קובץ — יוצג סרטון ברירת המחדל.', 'starter-bullet' ); ?></p>
							</td></tr>
							<tr><th><?php esc_html_e( 'וידאו — קובץ מדיה', 'starter-bullet' ); ?></th><td>
								<?php starter_bullet_render_video_field( $section_key, 'video_file_id', (int) ( $data['video_file_id'] ?? 0 ) ); ?>
								<p class="description"><?php esc_html_e( 'קובץ MP4 מספריית המדיה. אם נבחר קובץ — הוא מנצח על קישור ה-YouTube.', 'starter-bullet' ); ?></p>
							</td></tr>
							<tr><th><?php esc_html_e( 'תמונת רקע למובייל (לא חובה)', 'starter-bullet' ); ?></th><td>
								<?php starter_bullet_render_image_field( $section_key, 'image_mobile_id', (int) ( $data['image_mobile_id'] ?? 0 ) ); ?>
								<p class="description"><?php esc_html_e( 'בתצוגת מובייל: כשנבחר וידאו — התמונה תוצג במקום הסרטון. כשנבחרה תמונה — תוצג במקום תמונת הרקע הראשית. אם ריק — יוצגו הווידאו/התמונה הראשית גם במובייל.', 'starter-bullet' ); ?></p>
							</td></tr>
						<?php elseif ( 'benefits' === $section_key ) : ?>
							<?php starter_bullet_render_icon_style_fields( $section_key, $data ); ?>
							<tr><th><?php esc_html_e( 'פריטים', 'starter-bullet' ); ?></th><td>
								<?php starter_bullet_render_icon_items_repeater( $section_key, is_array( $data['items'] ?? null ) ? $data['items'] : array(), true ); ?>
							</td></tr>
						<?php elseif ( 'about' === $section_key || 'secondary' === $section_key ) : ?>
							<tr><th><?php esc_html_e( 'כותרת', 'starter-bullet' ); ?></th><td><?php starter_bullet_render_field( $section_key, 'title', (string) $data['title'] ); ?></td></tr>
							<tr><th><?php esc_html_e( 'תוכן', 'starter-bullet' ); ?></th><td><?php starter_bullet_render_field( $section_key, 'content', (string) $data['content'], 'textarea' ); ?></td></tr>
							<?php if ( 'about' === $section_key ) : ?>
								<tr><th><?php esc_html_e( 'כפתור', 'starter-bullet' ); ?></th><td><?php starter_bullet_render_field( $section_key, 'btn_text', (string) $data['btn_text'] ); ?><div style="margin-top:6px;"><?php starter_bullet_render_link_field( $section_key, 'btn_url', (string) $data['btn_url'] ); ?></div></td></tr>
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
							<tr><th><?php esc_html_e( 'צבע מספרים', 'starter-bullet' ); ?></th><td><?php starter_bullet_render_color_field( $section_key, 'number_color', (string) ( $data['number_color'] ?? '' ) ); ?></td></tr>
							<tr><th><?php esc_html_e( 'גודל מספרים', 'starter-bullet' ); ?></th><td>
								<input type="number" name="starter_bullet_home_sections[stats][number_size]" value="<?php echo esc_attr( (string) ( $data['number_size'] ?? '' ) ); ?>" min="10" max="96" step="1" style="width:80px;" placeholder="36"> px
								<p class="description"><?php esc_html_e( 'השאירו ריק לברירת מחדל (כ־36px).', 'starter-bullet' ); ?></p>
							</td></tr>
							<tr><th><?php esc_html_e( 'משקל מספרים', 'starter-bullet' ); ?></th><td>
								<select name="starter_bullet_home_sections[stats][number_weight]">
									<option value=""><?php esc_html_e( 'ברירת מחדל (800)', 'starter-bullet' ); ?></option>
									<?php for ( $w = 100; $w <= 800; $w += 100 ) : ?>
										<option value="<?php echo esc_attr( (string) $w ); ?>" <?php selected( (string) ( $data['number_weight'] ?? '' ), (string) $w ); ?>><?php echo esc_html( (string) $w ); ?></option>
									<?php endfor; ?>
								</select>
							</td></tr>
							<tr><th><?php esc_html_e( 'צבע תוויות', 'starter-bullet' ); ?></th><td><?php starter_bullet_render_color_field( $section_key, 'label_color', (string) ( $data['label_color'] ?? '' ) ); ?></td></tr>
							<tr><th><?php esc_html_e( 'גודל תוויות', 'starter-bullet' ); ?></th><td>
								<input type="number" name="starter_bullet_home_sections[stats][label_size]" value="<?php echo esc_attr( (string) ( $data['label_size'] ?? '' ) ); ?>" min="10" max="96" step="1" style="width:80px;" placeholder="14"> px
								<p class="description"><?php esc_html_e( 'השאירו ריק לברירת מחדל (כ־14px).', 'starter-bullet' ); ?></p>
							</td></tr>
							<tr><th><?php esc_html_e( 'משקל תוויות', 'starter-bullet' ); ?></th><td>
								<select name="starter_bullet_home_sections[stats][label_weight]">
									<option value=""><?php esc_html_e( 'ברירת מחדל', 'starter-bullet' ); ?></option>
									<?php for ( $w = 100; $w <= 800; $w += 100 ) : ?>
										<option value="<?php echo esc_attr( (string) $w ); ?>" <?php selected( (string) ( $data['label_weight'] ?? '' ), (string) $w ); ?>><?php echo esc_html( (string) $w ); ?></option>
									<?php endfor; ?>
								</select>
							</td></tr>
							<?php for ( $i = 1; $i <= 4; $i++ ) : ?>
								<tr><th><?php printf( esc_html__( 'סטט %d', 'starter-bullet' ), $i ); ?></th><td>
									<?php starter_bullet_render_field( $section_key, "stat_{$i}_number", (string) $data[ "stat_{$i}_number" ] ); ?>
									<?php starter_bullet_render_field( $section_key, "stat_{$i}_label", (string) $data[ "stat_{$i}_label" ] ); ?>
								</td></tr>
							<?php endfor; ?>
						<?php elseif ( 'features' === $section_key ) : ?>
							<tr><th><?php esc_html_e( 'כותרת', 'starter-bullet' ); ?></th><td><?php starter_bullet_render_field( $section_key, 'title', (string) $data['title'] ); ?></td></tr>
							<tr><th><?php esc_html_e( 'מספר עמודות', 'starter-bullet' ); ?></th><td>
								<select name="starter_bullet_home_sections[features][columns]">
									<?php for ( $c = 1; $c <= 4; $c++ ) : ?>
										<option value="<?php echo esc_attr( (string) $c ); ?>" <?php selected( (int) ( $data['columns'] ?? 3 ), $c ); ?>><?php echo esc_html( (string) $c ); ?></option>
									<?php endfor; ?>
								</select>
								<p class="description"><?php esc_html_e( 'כמות העמודות בדסקטופ. במובייל תמיד עמודה אחת.', 'starter-bullet' ); ?></p>
							</td></tr>
							<?php starter_bullet_render_icon_style_fields( $section_key, $data ); ?>
							<tr><th><?php esc_html_e( 'כרטיסים', 'starter-bullet' ); ?></th><td>
								<?php starter_bullet_render_icon_items_repeater( $section_key, is_array( $data['items'] ?? null ) ? $data['items'] : array(), false ); ?>
							</td></tr>
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
								<tr><th><?php esc_html_e( 'כפתור', 'starter-bullet' ); ?></th><td><?php starter_bullet_render_field( $section_key, 'btn_text', (string) $data['btn_text'] ); ?><div style="margin-top:6px;"><?php starter_bullet_render_link_field( $section_key, 'btn_url', (string) $data['btn_url'] ); ?></div></td></tr>
							<?php endif; ?>
							<tr><th><?php esc_html_e( 'כמות פריטים', 'starter-bullet' ); ?></th><td><?php starter_bullet_render_field( $section_key, 'count', (string) $data['count'], 'number' ); ?></td></tr>
							<tr><td colspan="2"><em><?php esc_html_e( 'הפריטים נמשכים אוטומטית מה-CPT המתאים.', 'starter-bullet' ); ?></em></td></tr>
						<?php elseif ( 'cta' === $section_key ) : ?>
							<tr><td colspan="2"><em><?php esc_html_e( 'מוצג מעל הפוטר. ניתן להגביל לעמוד הבית בלבד.', 'starter-bullet' ); ?></em></td></tr>
							<tr>
								<th><?php esc_html_e( 'הצגה', 'starter-bullet' ); ?></th>
								<td>
									<label>
										<input type="checkbox" name="starter_bullet_home_sections[<?php echo esc_attr( $section_key ); ?>][home_only]" value="1" <?php checked( ! empty( $data['home_only'] ) ); ?>>
										<?php esc_html_e( 'הצג רק בעמוד הבית', 'starter-bullet' ); ?>
									</label>
									<p class="description"><?php esc_html_e( 'כשמסומן — הסקשן מוסר מכל העמודים חוץ מעמוד הבית.', 'starter-bullet' ); ?></p>
								</td>
							</tr>
							<tr><th><?php esc_html_e( 'כותרת', 'starter-bullet' ); ?></th><td><?php starter_bullet_render_field( $section_key, 'title', (string) $data['title'] ); ?></td></tr>
							<tr><th><?php esc_html_e( 'טלפון', 'starter-bullet' ); ?></th><td><?php starter_bullet_render_field( $section_key, 'phone', (string) $data['phone'] ); ?></td></tr>
							<tr><th><?php esc_html_e( 'טקסט כפתור', 'starter-bullet' ); ?></th><td><?php starter_bullet_render_field( $section_key, 'btn_text', (string) $data['btn_text'] ); ?></td></tr>
							<tr><th><?php esc_html_e( 'צבע רקע הכפתור', 'starter-bullet' ); ?></th><td><?php starter_bullet_render_color_field( $section_key, 'btn_bg_color', (string) ( $data['btn_bg_color'] ?? '' ) ); ?></td></tr>
							<tr><th><?php esc_html_e( 'צבע טקסט הכפתור', 'starter-bullet' ); ?></th><td><?php starter_bullet_render_color_field( $section_key, 'btn_text_color', (string) ( $data['btn_text_color'] ?? '' ) ); ?></td></tr>
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
