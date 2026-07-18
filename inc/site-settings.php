<?php
/**
 * General site settings admin.
 *
 * @package Starter_Bullet
 */

declare(strict_types=1);

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Default site settings.
 *
 * @return array<string, mixed>
 */
function starter_bullet_default_site_settings(): array {
	return array(
		'logo_transparent'       => 0,
		'logo_scrolled'          => 0,
		'brand_icon_transparent' => 0,
		'brand_icon_scrolled'    => 0,
		'favicon_id'             => 0,
		'page_default_image_id'  => 0,
		'header_phone'           => '03-1234567',
		'header_style'      => 'transparent',
		'header_bg_color'   => '#1A1D2E',
		'header_nav_effect' => 'show',
		'form_title'        => 'קבלו הצעת מחיר חינם',
		'mobile_menu_style' => 'overlay',
		'font_family'       => 'Assistant',
		'font_menu'         => '14',
		'font_h1'           => '40',
		'font_h2'           => '32',
		'font_h3'           => '24',
		'font_h4'           => '20',
		'font_p'            => '16',
		'font_cta'          => '16',
		'whatsapp_number'   => '',
		'whatsapp_position' => 'bottom-right',
	);
}

/**
 * Hebrew Google Fonts list.
 *
 * @return array<string, string>
 */
function starter_bullet_google_fonts(): array {
	return array(
		'Assistant'         => 'Assistant',
		'Heebo'             => 'Heebo',
		'Rubik'             => 'Rubik',
		'Alef'              => 'Alef',
		'Frank Ruhl Libre'  => 'Frank Ruhl Libre',
		'Noto Sans Hebrew'  => 'Noto Sans Hebrew',
		'Varela Round'      => 'Varela Round',
		'Secular One'       => 'Secular One',
	);
}

/**
 * Get merged site settings.
 *
 * @return array<string, mixed>
 */
function starter_bullet_get_site_settings(): array {
	$saved = get_option( 'starter_bullet_site_settings', array() );
	return array_merge( starter_bullet_default_site_settings(), is_array( $saved ) ? $saved : array() );
}

/**
 * Get single site setting.
 *
 * @param string $key     Setting key.
 * @param mixed  $default Default value.
 * @return mixed
 */
function sb_get_site_option( string $key, $default = '' ) {
	$settings = starter_bullet_get_site_settings();
	return $settings[ $key ] ?? $default;
}

/**
 * Register site settings.
 */
function starter_bullet_register_site_settings(): void {
	register_setting(
		'starter_bullet_site',
		'starter_bullet_site_settings',
		array(
			'type'              => 'array',
			'sanitize_callback' => 'starter_bullet_sanitize_site_settings',
			'default'           => starter_bullet_default_site_settings(),
		)
	);
}
add_action( 'admin_init', 'starter_bullet_register_site_settings' );

/**
 * Sanitize site settings.
 *
 * @param array<string, mixed> $input Raw input.
 * @return array<string, mixed>
 */
function starter_bullet_sanitize_site_settings( array $input ): array {
	$defaults = starter_bullet_default_site_settings();
	$output   = array();

	$output['mobile_menu_style'] = in_array( $input['mobile_menu_style'] ?? '', array( 'overlay', 'slide-right' ), true )
		? $input['mobile_menu_style']
		: 'overlay';

	$fonts = array_keys( starter_bullet_google_fonts() );
	$font  = sanitize_text_field( $input['font_family'] ?? $defaults['font_family'] );
	$output['font_family'] = in_array( $font, $fonts, true ) ? $font : 'Assistant';

	foreach ( array( 'font_menu', 'font_h1', 'font_h2', 'font_h3', 'font_h4', 'font_p', 'font_cta' ) as $size_key ) {
		$output[ $size_key ] = (string) max( 10, min( 72, absint( $input[ $size_key ] ?? $defaults[ $size_key ] ) ) );
	}

	$output['header_phone'] = sanitize_text_field( $input['header_phone'] ?? $defaults['header_phone'] );
	$output['form_title']   = sanitize_text_field( $input['form_title'] ?? $defaults['form_title'] );
	$output['logo_transparent']       = absint( $input['logo_transparent'] ?? $defaults['logo_transparent'] );
	$output['logo_scrolled']          = absint( $input['logo_scrolled'] ?? $defaults['logo_scrolled'] );
	$output['brand_icon_transparent'] = absint( $input['brand_icon_transparent'] ?? $defaults['brand_icon_transparent'] );
	$output['brand_icon_scrolled']    = absint( $input['brand_icon_scrolled'] ?? $defaults['brand_icon_scrolled'] );
	$output['favicon_id']             = absint( $input['favicon_id'] ?? $defaults['favicon_id'] );
	$output['page_default_image_id']  = absint( $input['page_default_image_id'] ?? $defaults['page_default_image_id'] );

	$output['header_style'] = in_array( $input['header_style'] ?? '', array( 'transparent', 'solid' ), true )
		? $input['header_style']
		: 'transparent';

	$header_color = sanitize_hex_color( (string) ( $input['header_bg_color'] ?? $defaults['header_bg_color'] ) );
	$output['header_bg_color'] = $header_color ? $header_color : '#1A1D2E';

	$output['header_nav_effect'] = in_array( $input['header_nav_effect'] ?? $input['header_bg_visible'] ?? '', array( 'show', 'hide' ), true )
		? ( $input['header_nav_effect'] ?? $input['header_bg_visible'] )
		: 'show';

	$output['whatsapp_number'] = sanitize_text_field( $input['whatsapp_number'] ?? '' );
	$output['whatsapp_position'] = in_array( $input['whatsapp_position'] ?? '', array( 'bottom-right', 'bottom-left' ), true )
		? $input['whatsapp_position']
		: 'bottom-right';

	return $output;
}

/**
 * Register top-level admin menus.
 */
function starter_bullet_register_admin_menus(): void {
	add_menu_page(
		esc_html__( 'הגדרות עמוד בית', 'starter-bullet' ),
		esc_html__( 'הגדרות עמוד בית', 'starter-bullet' ),
		'manage_options',
		'starter-bullet-home',
		'starter_bullet_home_settings_page_html',
		'dashicons-admin-generic',
		28.1
	);

	add_menu_page(
		esc_html__( 'הגדרות כלליות לאתר', 'starter-bullet' ),
		esc_html__( 'הגדרות כלליות לאתר', 'starter-bullet' ),
		'manage_options',
		'starter-bullet-site',
		'starter_bullet_site_settings_page_html',
		'dashicons-admin-settings',
		28.2
	);
}
add_action( 'admin_menu', 'starter_bullet_register_admin_menus' );

/**
 * Site settings admin page.
 */
function starter_bullet_site_settings_page_html(): void {
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}

	$s = starter_bullet_get_site_settings();
	$fonts = starter_bullet_google_fonts();
	?>
	<div class="wrap" dir="rtl">
		<h1><?php esc_html_e( 'הגדרות כלליות לאתר', 'starter-bullet' ); ?></h1>

		<form method="post" action="options.php">
			<?php settings_fields( 'starter_bullet_site' ); ?>

			<div style="display:flex;align-items:center;gap:8px;margin-top:16px;">
				<?php submit_button( esc_html__( 'שמור שינויים', 'starter-bullet' ), 'primary', 'submit-top', false ); ?>
				<span style="margin-inline-start:auto;display:inline-flex;gap:8px;">
					<button type="button" class="button sb-sections-collapse-all"><?php esc_html_e( 'סגור הכל', 'starter-bullet' ); ?></button>
					<button type="button" class="button sb-sections-expand-all"><?php esc_html_e( 'פתח הכל', 'starter-bullet' ); ?></button>
				</span>
			</div>

			<div class="postbox" style="margin-top:20px;padding:16px;">
				<h2 style="margin-top:0;display:flex;align-items:center;gap:12px;">
					<?php esc_html_e( 'לוגו', 'starter-bullet' ); ?>
					<button type="button" class="button sb-section-toggle" aria-expanded="false" title="<?php esc_attr_e( 'קפל / פתח סקשן', 'starter-bullet' ); ?>" style="margin-inline-start:auto;width:30px;height:30px;padding:0;font-size:18px;line-height:1;font-weight:700;">+</button>
				</h2>
				<table class="form-table" style="display:none;">
					<tr>
						<th><?php esc_html_e( 'לוגו מלא — בר שקוף', 'starter-bullet' ); ?></th>
						<td>
							<?php starter_bullet_render_site_image_field( 'logo_transparent', (int) ( $s['logo_transparent'] ?? 0 ) ); ?>
							<p class="description"><?php esc_html_e( 'לוגו מלא (תמונה עם שם העסק). כשמוגדר — מחליף את הסמל + שם האתר בטקסט. מוצג כשהבר שקוף.', 'starter-bullet' ); ?></p>
						</td>
					</tr>
					<tr>
						<th><?php esc_html_e( 'לוגו מלא — בר כהה', 'starter-bullet' ); ?></th>
						<td>
							<?php starter_bullet_render_site_image_field( 'logo_scrolled', (int) ( $s['logo_scrolled'] ?? 0 ) ); ?>
							<p class="description"><?php esc_html_e( 'מוצג אחרי גלילה או כשהבר במצב מלא/כהה. אם ריק — ישמש הלוגו של הבר השקוף.', 'starter-bullet' ); ?></p>
						</td>
					</tr>
					<tr>
						<th><?php esc_html_e( 'אייקון — בר שקוף', 'starter-bullet' ); ?></th>
						<td>
							<?php starter_bullet_render_site_image_field( 'brand_icon_transparent', (int) ( $s['brand_icon_transparent'] ?? 0 ) ); ?>
							<p class="description"><?php esc_html_e( 'מוצג כשהבר שקוף, לפני גלילה (Header שקוף).', 'starter-bullet' ); ?></p>
						</td>
					</tr>
					<tr>
						<th><?php esc_html_e( 'אייקון — בר כהה', 'starter-bullet' ); ?></th>
						<td>
							<?php starter_bullet_render_site_image_field( 'brand_icon_scrolled', (int) ( $s['brand_icon_scrolled'] ?? 0 ) ); ?>
							<p class="description"><?php esc_html_e( 'מוצג אחרי גלילה או כשהבר במצב מלא/כהה.', 'starter-bullet' ); ?></p>
						</td>
					</tr>
					<tr>
						<th><?php esc_html_e( 'סמל האתר (Favicon)', 'starter-bullet' ); ?></th>
						<td>
							<?php starter_bullet_render_site_image_field( 'favicon_id', (int) ( $s['favicon_id'] ?? 0 ) ); ?>
							<p class="description"><?php esc_html_e( 'מוצג בטאב הדפדפן ובמועדפים. מומלץ תמונה ריבועית בגודל 512×512 פיקסלים.', 'starter-bullet' ); ?></p>
						</td>
					</tr>
				</table>
			</div>

			<div class="postbox" style="margin-top:20px;padding:16px;">
				<h2 style="margin-top:0;display:flex;align-items:center;gap:12px;">
					<?php esc_html_e( 'עמודים', 'starter-bullet' ); ?>
					<button type="button" class="button sb-section-toggle" aria-expanded="false" title="<?php esc_attr_e( 'קפל / פתח סקשן', 'starter-bullet' ); ?>" style="margin-inline-start:auto;width:30px;height:30px;padding:0;font-size:18px;line-height:1;font-weight:700;">+</button>
				</h2>
				<table class="form-table" style="display:none;">
					<tr>
						<th><?php esc_html_e( 'תמונה ראשית — ברירת מחדל', 'starter-bullet' ); ?></th>
						<td>
							<?php starter_bullet_render_site_image_field( 'page_default_image_id', (int) ( $s['page_default_image_id'] ?? 0 ) ); ?>
							<p class="description"><?php esc_html_e( 'מוצגת ב-Hero של עמודי תוכן (PAGE) כשלא הוגדרה תמונה ראשית לעמוד.', 'starter-bullet' ); ?></p>
						</td>
					</tr>
				</table>
			</div>

			<div class="postbox" style="margin-top:20px;padding:16px;">
				<h2 style="margin-top:0;display:flex;align-items:center;gap:12px;">
					<?php esc_html_e( 'בר עליון', 'starter-bullet' ); ?>
					<button type="button" class="button sb-section-toggle" aria-expanded="false" title="<?php esc_attr_e( 'קפל / פתח סקשן', 'starter-bullet' ); ?>" style="margin-inline-start:auto;width:30px;height:30px;padding:0;font-size:18px;line-height:1;font-weight:700;">+</button>
				</h2>
				<table class="form-table" style="display:none;">
					<tr>
						<th><?php esc_html_e( 'סוג Header', 'starter-bullet' ); ?></th>
						<td>
							<label><input type="radio" name="starter_bullet_site_settings[header_style]" value="transparent" <?php checked( $s['header_style'], 'transparent' ); ?>> <?php esc_html_e( 'שקוף — תמונת ההירו עד ראש העמוד', 'starter-bullet' ); ?></label><br>
							<label><input type="radio" name="starter_bullet_site_settings[header_style]" value="solid" <?php checked( $s['header_style'], 'solid' ); ?>> <?php esc_html_e( 'מלא — בר צבעוני קבוע', 'starter-bullet' ); ?></label>
						</td>
					</tr>
					<tr>
						<th><?php esc_html_e( 'צבע בר (מצב מלא)', 'starter-bullet' ); ?></th>
						<td>
							<input type="color" value="<?php echo esc_attr( (string) $s['header_bg_color'] ); ?>" oninput="this.nextElementSibling.value=this.value" aria-hidden="true">
							<input type="text" name="starter_bullet_site_settings[header_bg_color]" value="<?php echo esc_attr( (string) $s['header_bg_color'] ); ?>" class="regular-text" pattern="^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$" placeholder="#1A1D2E">
							<p class="description"><?php esc_html_e( 'ברירת מחדל: #1A1D2E', 'starter-bullet' ); ?></p>
						</td>
					</tr>
					<tr>
						<th><?php esc_html_e( 'אפקט רקע לתפריט', 'starter-bullet' ); ?></th>
						<td>
							<?php
							$nav_effect = (string) ( $s['header_nav_effect'] ?? $s['header_bg_visible'] ?? 'show' );
							$nav_effect = ( 'hide' === $nav_effect ) ? 'hide' : 'show';
							?>
							<label><input type="radio" name="starter_bullet_site_settings[header_nav_effect]" value="show" <?php checked( 'show', $nav_effect ); ?>> <?php esc_html_e( 'חשוף — גלולה שקופה עם טשטוש מאחורי התפריט', 'starter-bullet' ); ?></label><br>
							<label><input type="radio" name="starter_bullet_site_settings[header_nav_effect]" value="hide" <?php checked( 'hide', $nav_effect ); ?>> <?php esc_html_e( 'מוסתר — בלי רקע על התפריט האמצעי', 'starter-bullet' ); ?></label>
							<p class="description"><?php esc_html_e( 'שולט רק באפקט הרקע של תפריט הניווט באמצע הבר, לא ברקע של כל הבר.', 'starter-bullet' ); ?></p>
						</td>
					</tr>
					<tr>
						<th><?php esc_html_e( 'מספר טלפון (כפתור צהוב)', 'starter-bullet' ); ?></th>
						<td>
							<input type="text" name="starter_bullet_site_settings[header_phone]" value="<?php echo esc_attr( (string) $s['header_phone'] ); ?>" class="regular-text" placeholder="03-1234567">
							<p class="description"><?php esc_html_e( 'מוצג בצד שמאל של הבר העליון. השאר ריק כדי להסתיר.', 'starter-bullet' ); ?></p>
						</td>
					</tr>
				</table>
			</div>

			<div class="postbox" style="margin-top:20px;padding:16px;">
				<h2 style="margin-top:0;display:flex;align-items:center;gap:12px;">
					<?php esc_html_e( 'טופס יצירת קשר', 'starter-bullet' ); ?>
					<button type="button" class="button sb-section-toggle" aria-expanded="false" title="<?php esc_attr_e( 'קפל / פתח סקשן', 'starter-bullet' ); ?>" style="margin-inline-start:auto;width:30px;height:30px;padding:0;font-size:18px;line-height:1;font-weight:700;">+</button>
				</h2>
				<table class="form-table" style="display:none;">
					<tr>
						<th><?php esc_html_e( 'כותרת ראשית של הטופס', 'starter-bullet' ); ?></th>
						<td>
							<input type="text" name="starter_bullet_site_settings[form_title]" value="<?php echo esc_attr( (string) $s['form_title'] ); ?>" class="regular-text" placeholder="קבלו הצעת מחיר חינם">
							<p class="description"><?php esc_html_e( 'מוצג מעל שדות הטופס בבלוק ההירו.', 'starter-bullet' ); ?></p>
						</td>
					</tr>
				</table>
			</div>

			<div class="postbox" style="margin-top:20px;padding:16px;">
				<h2 style="margin-top:0;display:flex;align-items:center;gap:12px;">
					<?php esc_html_e( 'תפריט מובייל', 'starter-bullet' ); ?>
					<button type="button" class="button sb-section-toggle" aria-expanded="false" title="<?php esc_attr_e( 'קפל / פתח סקשן', 'starter-bullet' ); ?>" style="margin-inline-start:auto;width:30px;height:30px;padding:0;font-size:18px;line-height:1;font-weight:700;">+</button>
				</h2>
				<table class="form-table" style="display:none;">
					<tr>
						<th><?php esc_html_e( 'סגנון פתיחה', 'starter-bullet' ); ?></th>
						<td>
							<label><input type="radio" name="starter_bullet_site_settings[mobile_menu_style]" value="overlay" <?php checked( $s['mobile_menu_style'], 'overlay' ); ?>> <?php esc_html_e( 'Overlay — מסך מלא עם אנימציה עדינה', 'starter-bullet' ); ?></label><br>
							<label><input type="radio" name="starter_bullet_site_settings[mobile_menu_style]" value="slide-right" <?php checked( $s['mobile_menu_style'], 'slide-right' ); ?>> <?php esc_html_e( 'בר נפתח מימין', 'starter-bullet' ); ?></label>
						</td>
					</tr>
				</table>
			</div>

			<div class="postbox" style="margin-top:20px;padding:16px;">
				<h2 style="margin-top:0;display:flex;align-items:center;gap:12px;">
					<?php esc_html_e( 'גודל פונטים', 'starter-bullet' ); ?>
					<button type="button" class="button sb-section-toggle" aria-expanded="false" title="<?php esc_attr_e( 'קפל / פתח סקשן', 'starter-bullet' ); ?>" style="margin-inline-start:auto;width:30px;height:30px;padding:0;font-size:18px;line-height:1;font-weight:700;">+</button>
				</h2>
				<table class="form-table" style="display:none;">
					<tr>
						<th><?php esc_html_e( 'משפחת פונטים', 'starter-bullet' ); ?></th>
						<td>
							<select name="starter_bullet_site_settings[font_family]">
								<?php foreach ( $fonts as $slug => $label ) : ?>
									<option value="<?php echo esc_attr( $slug ); ?>" <?php selected( $s['font_family'], $slug ); ?>><?php echo esc_html( $label ); ?></option>
								<?php endforeach; ?>
							</select>
						</td>
					</tr>
					<?php
					$size_labels = array(
						'font_menu' => 'תפריט ראשי',
						'font_h1'   => 'H1 — כותרות ראשיות',
						'font_h2'   => 'H2 — כותרת סקשן',
						'font_h3'   => 'H3 — כותרות וידג\'טים בפוטר',
						'font_h4'   => 'H4 — כותרת בשורת מידע (פוטר)',
						'font_p'    => 'P — טקסט רגיל ותת-כותרות',
						'font_cta'  => 'כפתור הנעה לפעולה',
					);
					foreach ( $size_labels as $key => $label ) :
						?>
						<tr>
							<th><?php echo esc_html( $label ); ?></th>
							<td>
								<input type="number" name="starter_bullet_site_settings[<?php echo esc_attr( $key ); ?>]" value="<?php echo esc_attr( (string) $s[ $key ] ); ?>" min="10" max="72" class="small-text"> px
							</td>
						</tr>
					<?php endforeach; ?>
				</table>
			</div>

			<div class="postbox" style="margin-top:20px;padding:16px;">
				<h2 style="margin-top:0;display:flex;align-items:center;gap:12px;">
					<?php esc_html_e( 'הגדרות WhatsApp', 'starter-bullet' ); ?>
					<button type="button" class="button sb-section-toggle" aria-expanded="false" title="<?php esc_attr_e( 'קפל / פתח סקשן', 'starter-bullet' ); ?>" style="margin-inline-start:auto;width:30px;height:30px;padding:0;font-size:18px;line-height:1;font-weight:700;">+</button>
				</h2>
				<table class="form-table" style="display:none;">
					<tr>
						<th><?php esc_html_e( 'מספר נייד', 'starter-bullet' ); ?></th>
						<td><input type="text" name="starter_bullet_site_settings[whatsapp_number]" value="<?php echo esc_attr( (string) $s['whatsapp_number'] ); ?>" class="regular-text" placeholder="972501234567"></td>
					</tr>
					<tr>
						<th><?php esc_html_e( 'מיקום אייקון', 'starter-bullet' ); ?></th>
						<td>
							<label><input type="radio" name="starter_bullet_site_settings[whatsapp_position]" value="bottom-right" <?php checked( $s['whatsapp_position'], 'bottom-right' ); ?>> <?php esc_html_e( 'תחתון ימין', 'starter-bullet' ); ?></label><br>
							<label><input type="radio" name="starter_bullet_site_settings[whatsapp_position]" value="bottom-left" <?php checked( $s['whatsapp_position'], 'bottom-left' ); ?>> <?php esc_html_e( 'תחתון שמאל', 'starter-bullet' ); ?></label>
						</td>
					</tr>
				</table>
			</div>

			<?php submit_button(); ?>
		</form>
	</div>
	<?php
}

/**
 * Set default site settings on theme activation.
 */
function starter_bullet_set_default_site_settings(): void {
	if ( false === get_option( 'starter_bullet_site_settings', false ) ) {
		update_option( 'starter_bullet_site_settings', starter_bullet_default_site_settings() );
	}
}
add_action( 'after_switch_theme', 'starter_bullet_set_default_site_settings' );

/**
 * Render image field for site settings.
 *
 * @param string $field Field key.
 * @param int    $value Attachment ID.
 */
function starter_bullet_render_site_image_field( string $field, int $value ): void {
	$url  = $value ? wp_get_attachment_image_url( $value, 'thumbnail' ) : '';
	$name = sprintf( 'starter_bullet_site_settings[%s]', $field );
	$id   = 'site_' . $field;
	?>
	<div class="sb-media-field" data-field="<?php echo esc_attr( $id ); ?>">
		<input type="hidden" name="<?php echo esc_attr( $name ); ?>" id="<?php echo esc_attr( $id ); ?>" value="<?php echo esc_attr( (string) $value ); ?>">
		<div class="sb-media-preview" style="margin-bottom:8px;">
			<?php if ( $url ) : ?>
				<img src="<?php echo esc_url( $url ); ?>" style="max-width:120px;height:auto;border-radius:4px;">
			<?php endif; ?>
		</div>
		<button type="button" class="button sb-upload-image" data-target="<?php echo esc_attr( $id ); ?>">
			<?php esc_html_e( 'בחר תמונה', 'starter-bullet' ); ?>
		</button>
		<button type="button" class="button sb-remove-image" data-target="<?php echo esc_attr( $id ); ?>">
			<?php esc_html_e( 'הסר', 'starter-bullet' ); ?>
		</button>
	</div>
	<?php
}

/**
 * Try to attach default brand icon from uploads once.
 */
function starter_bullet_maybe_migrate_brand_icon(): void {
	if ( get_option( 'starter_bullet_brand_icon_migrated', false ) ) {
		return;
	}

	$saved = get_option( 'starter_bullet_site_settings', array() );
	if ( ! is_array( $saved ) ) {
		$saved = array();
	}

	$transparent_id = (int) ( $saved['brand_icon_transparent'] ?? 0 );
	$scrolled_id    = (int) ( $saved['brand_icon_scrolled'] ?? 0 );
	$legacy_id      = (int) ( $saved['brand_icon_id'] ?? 0 );

	if ( $transparent_id > 0 || $scrolled_id > 0 ) {
		update_option( 'starter_bullet_brand_icon_migrated', 1 );
		return;
	}

	$attachment_id = $legacy_id;
	if ( ! $attachment_id ) {
		$filename = 'אגם-מערכות-מים.png';
		$posts    = get_posts(
			array(
				'post_type'      => 'attachment',
				'posts_per_page' => 1,
				'post_status'    => 'inherit',
				'meta_query'     => array( // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_meta_query
					array(
						'key'     => '_wp_attached_file',
						'value'   => $filename,
						'compare' => 'LIKE',
					),
				),
			)
		);

		$attachment_id = (int) ( $posts[0]->ID ?? 0 );
		if ( ! $attachment_id ) {
			$upload_dir = wp_upload_dir();
			$candidate  = trailingslashit( $upload_dir['baseurl'] ) . '2026/07/' . rawurlencode( $filename );
			$attachment_id = (int) attachment_url_to_postid( $candidate );
		}
	}

	if ( $attachment_id ) {
		$saved['brand_icon_transparent'] = $attachment_id;
		unset( $saved['brand_icon_id'], $saved['brand_icon_bg'] );
		update_option( 'starter_bullet_site_settings', $saved );
	}

	update_option( 'starter_bullet_brand_icon_migrated', 1 );
}
add_action( 'admin_init', 'starter_bullet_maybe_migrate_brand_icon' );

/**
 * Output dynamic CSS variables and font.
 */
function starter_bullet_output_dynamic_styles(): void {
	$s    = starter_bullet_get_site_settings();
	$font_slug = str_replace( ' ', '+', (string) $s['font_family'] );

	wp_enqueue_style(
		'starter-bullet-dynamic-font',
		'https://fonts.googleapis.com/css2?family=' . $font_slug . ':wght@400;500;600;700;800&display=swap',
		array(),
		null
	);

	$css = sprintf(
		':root{
			--sb-font-family:%1$s, ui-sans-serif, system-ui, sans-serif;
			--sb-font-menu:%2$spx;
			--sb-font-h1:%3$spx;
			--sb-font-h2:%4$spx;
			--sb-font-h3:%5$spx;
			--sb-font-h4:%6$spx;
			--sb-font-p:%7$spx;
			--sb-font-cta:%8$spx;
			--sb-header-bg:%9$s;
			--sb-header-height:6rem;
		}
		body{font-family:var(--sb-font-family);}
		h1,.sb-h1{font-size:var(--sb-font-h1);}
		h2,.sb-h2{font-size:var(--sb-font-h2);}
		h3,.sb-h3{font-size:var(--sb-font-h3);}
		h4,.sb-h4{font-size:var(--sb-font-h4);}
		p,.prose p{font-size:var(--sb-font-p);}
		footer .widget-title,
		footer h3.widget-title{font-size:var(--sb-font-h3);}
		footer .sb-footer-info__title{font-size:var(--sb-font-h4);}
		footer .sb-footer-info__subtitle{font-size:var(--sb-font-p);}
		.sb-nav-primary > li > a{font-size:var(--sb-font-menu);}
		.sb-cta,.sb-btn-cta,input[type=submit].btn-send{font-size:var(--sb-font-cta);}
		.site-header--solid{background-color:var(--sb-header-bg);}
		body.sb-header-nav-effect-hidden .site-header--transparent .primary-nav .sb-nav-primary,
		body.sb-header-nav-effect-hidden .primary-nav .sb-nav-primary,
		.site-header--nav-effect-hidden .primary-nav .sb-nav-primary{
			background:transparent!important;
			background-color:transparent!important;
			backdrop-filter:none!important;
			-webkit-backdrop-filter:none!important;
			box-shadow:none!important;
		}',
		esc_attr( (string) $s['font_family'] ),
		(int) $s['font_menu'],
		(int) $s['font_h1'],
		(int) $s['font_h2'],
		(int) $s['font_h3'],
		(int) $s['font_h4'],
		(int) $s['font_p'],
		(int) $s['font_cta'],
		esc_attr( (string) $s['header_bg_color'] )
	);

	wp_add_inline_style( 'starter-bullet-main', $css );
}
add_action( 'wp_enqueue_scripts', 'starter_bullet_output_dynamic_styles', 20 );

/**
 * Output favicon link tags from the uploaded favicon setting.
 */
function starter_bullet_output_favicon(): void {
	$favicon_id = (int) sb_get_site_option( 'favicon_id', 0 );

	if ( $favicon_id <= 0 ) {
		return;
	}

	$url = wp_get_attachment_image_url( $favicon_id, 'full' );

	if ( ! $url ) {
		return;
	}

	printf( '<link rel="icon" href="%s">' . "\n", esc_url( $url ) );
	printf( '<link rel="apple-touch-icon" href="%s">' . "\n", esc_url( $url ) );
}
add_action( 'wp_head', 'starter_bullet_output_favicon', 5 );
add_action( 'admin_head', 'starter_bullet_output_favicon', 5 );
add_action( 'login_head', 'starter_bullet_output_favicon', 5 );

/**
 * Add body classes for mobile nav style.
 *
 * @param array $classes Body classes.
 * @return array
 */
function starter_bullet_body_classes( array $classes ): array {
	$classes[] = 'sb-mobile-nav-' . sb_get_site_option( 'mobile_menu_style', 'overlay' );

	if ( sb_is_transparent_header() ) {
		$classes[] = 'sb-header-transparent';
	} else {
		$classes[] = 'sb-header-solid';
	}

	if ( 'hide' === sb_get_site_option( 'header_nav_effect', sb_get_site_option( 'header_bg_visible', 'show' ) ) ) {
		$classes[] = 'sb-header-nav-effect-hidden';
	}

	return $classes;
}
add_filter( 'body_class', 'starter_bullet_body_classes' );
