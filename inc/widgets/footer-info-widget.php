<?php
/**
 * Footer info rows widget (icon + title + subtitle).
 *
 * @package Starter_Bullet
 */

declare(strict_types=1);

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Footer info widget.
 */
class Starter_Bullet_Footer_Info_Widget extends WP_Widget {

	/**
	 * Max item rows in the widget form.
	 */
	private const MAX_ITEMS = 6;

	/**
	 * Constructor.
	 */
	public function __construct() {
		parent::__construct(
			'starter_bullet_footer_info',
			esc_html__( 'פוטר: שורות מידע', 'starter-bullet' ),
			array(
				'description' => esc_html__( 'רשימת פריטים עם אייקון, כותרת ותת-כותרת — מתאים לעמודת יצירת קשר בפוטר.', 'starter-bullet' ),
				'classname'   => 'widget_sb-footer-info',
			)
		);
	}

	/**
	 * Available icon keys.
	 *
	 * @return array<string, string>
	 */
	public static function icon_options(): array {
		return array(
			'phone'    => esc_html__( 'טלפון', 'starter-bullet' ),
			'whatsapp' => esc_html__( 'וואטסאפ', 'starter-bullet' ),
			'location' => esc_html__( 'מיקום', 'starter-bullet' ),
			'clock'    => esc_html__( 'שעון / שעות', 'starter-bullet' ),
			'email'    => esc_html__( 'אימייל', 'starter-bullet' ),
			'link'     => esc_html__( 'קישור', 'starter-bullet' ),
		);
	}

	/**
	 * Render widget output.
	 *
	 * @param array<string, mixed> $args     Widget arguments.
	 * @param array<string, mixed> $instance Widget instance.
	 */
	public function widget( $args, $instance ): void {
		$items = $this->get_visible_items( $instance );
		if ( empty( $items ) ) {
			return;
		}

		echo $args['before_widget']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

		$title = trim( (string) ( $instance['title'] ?? '' ) );
		if ( $title !== '' ) {
			echo $args['before_title'] . esc_html( $title ) . $args['after_title']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		}

		echo '<ul class="sb-footer-info">';
		foreach ( $items as $item ) {
			$this->render_item( $item );
		}
		echo '</ul>';

		echo $args['after_widget']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}

	/**
	 * Render a single info row.
	 *
	 * @param array<string, string> $item Item data.
	 */
	private function render_item( array $item ): void {
		$icon     = $item['icon'];
		$title    = $item['title'];
		$subtitle = $item['subtitle'];
		$url      = $item['url'];
		$tag      = $url !== '' ? 'a' : 'div';
		$attrs    = $url !== '' ? ' href="' . esc_url( $url ) . '"' : '';
		?>
		<li class="sb-footer-info__item">
			<<?php echo esc_html( $tag ); ?> class="sb-footer-info__link"<?php echo $attrs; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
				<span class="sb-footer-info__icon" aria-hidden="true">
					<?php echo starter_bullet_footer_info_icon( $icon ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
				</span>
				<span class="sb-footer-info__body">
					<span class="sb-footer-info__title"><?php echo esc_html( $title ); ?></span>
					<?php if ( $subtitle !== '' ) : ?>
						<span class="sb-footer-info__subtitle"><?php echo esc_html( $subtitle ); ?></span>
					<?php endif; ?>
				</span>
			</<?php echo esc_html( $tag ); ?>>
		</li>
		<?php
	}

	/**
	 * Widget settings form.
	 *
	 * @param array<string, mixed> $instance Widget instance.
	 */
	public function form( $instance ): void {
		$title = (string) ( $instance['title'] ?? '' );
		$items = $this->normalize_items( $instance );
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'כותרת אזור (אופציונלי)', 'starter-bullet' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p><em><?php esc_html_e( 'הוסיפו עד 6 שורות. שורות ריקות לא יוצגו בפרונט.', 'starter-bullet' ); ?></em></p>
		<?php
		for ( $i = 0; $i < self::MAX_ITEMS; $i++ ) {
			$item = $items[ $i ] ?? $this->empty_item();
			?>
			<div style="margin:12px 0;padding:12px;border:1px solid #dcdcde;border-radius:6px;background:#f6f7f7;">
				<p style="margin:0 0 8px;font-weight:600;"><?php printf( esc_html__( 'שורה %d', 'starter-bullet' ), $i + 1 ); ?></p>
				<p>
					<label for="<?php echo esc_attr( $this->get_field_id( "items_{$i}_icon" ) ); ?>"><?php esc_html_e( 'אייקון', 'starter-bullet' ); ?></label>
					<select class="widefat" id="<?php echo esc_attr( $this->get_field_id( "items_{$i}_icon" ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( "items_{$i}_icon" ) ); ?>">
						<?php foreach ( self::icon_options() as $key => $label ) : ?>
							<option value="<?php echo esc_attr( $key ); ?>" <?php selected( $item['icon'], $key ); ?>><?php echo esc_html( $label ); ?></option>
						<?php endforeach; ?>
					</select>
				</p>
				<p>
					<label for="<?php echo esc_attr( $this->get_field_id( "items_{$i}_title" ) ); ?>"><?php esc_html_e( 'כותרת', 'starter-bullet' ); ?></label>
					<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( "items_{$i}_title" ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( "items_{$i}_title" ) ); ?>" type="text" value="<?php echo esc_attr( $item['title'] ); ?>">
				</p>
				<p>
					<label for="<?php echo esc_attr( $this->get_field_id( "items_{$i}_subtitle" ) ); ?>"><?php esc_html_e( 'תת-כותרת', 'starter-bullet' ); ?></label>
					<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( "items_{$i}_subtitle" ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( "items_{$i}_subtitle" ) ); ?>" type="text" value="<?php echo esc_attr( $item['subtitle'] ); ?>">
				</p>
				<p>
					<label for="<?php echo esc_attr( $this->get_field_id( "items_{$i}_url" ) ); ?>"><?php esc_html_e( 'קישור (אופציונלי)', 'starter-bullet' ); ?></label>
					<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( "items_{$i}_url" ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( "items_{$i}_url" ) ); ?>" type="url" value="<?php echo esc_attr( $item['url'] ); ?>" placeholder="tel:0542083940 או https://wa.me/...">
				</p>
			</div>
			<?php
		}
	}

	/**
	 * Save widget settings.
	 *
	 * @param array<string, mixed> $new_instance New instance.
	 * @param array<string, mixed> $old_instance Old instance.
	 * @return array<string, mixed>
	 */
	public function update( $new_instance, $old_instance ): array {
		$instance          = array();
		$instance['title'] = sanitize_text_field( (string) ( $new_instance['title'] ?? '' ) );
		$instance['items'] = array();

		$allowed_icons = array_keys( self::icon_options() );

		for ( $i = 0; $i < self::MAX_ITEMS; $i++ ) {
			$icon = sanitize_key( (string) ( $new_instance[ "items_{$i}_icon" ] ?? 'phone' ) );
			if ( ! in_array( $icon, $allowed_icons, true ) ) {
				$icon = 'phone';
			}

			$instance['items'][] = array(
				'icon'     => $icon,
				'title'    => sanitize_text_field( (string) ( $new_instance[ "items_{$i}_title" ] ?? '' ) ),
				'subtitle' => sanitize_text_field( (string) ( $new_instance[ "items_{$i}_subtitle" ] ?? '' ) ),
				'url'      => starter_bullet_sanitize_widget_link( (string) ( $new_instance[ "items_{$i}_url" ] ?? '' ) ),
			);
		}

		return $instance;
	}

	/**
	 * Normalize stored items for the form.
	 *
	 * @param array<string, mixed> $instance Widget instance.
	 * @return array<int, array<string, string>>
	 */
	private function normalize_items( array $instance ): array {
		$items = array();

		if ( ! empty( $instance['items'] ) && is_array( $instance['items'] ) ) {
			foreach ( $instance['items'] as $item ) {
				if ( ! is_array( $item ) ) {
					continue;
				}
				$items[] = array(
					'icon'     => sanitize_key( (string) ( $item['icon'] ?? 'phone' ) ),
					'title'    => (string) ( $item['title'] ?? '' ),
					'subtitle' => (string) ( $item['subtitle'] ?? '' ),
					'url'      => (string) ( $item['url'] ?? '' ),
				);
			}
		}

		while ( count( $items ) < self::MAX_ITEMS ) {
			$items[] = $this->empty_item();
		}

		return $items;
	}

	/**
	 * Return items that should render on the front end.
	 *
	 * @param array<string, mixed> $instance Widget instance.
	 * @return array<int, array<string, string>>
	 */
	private function get_visible_items( array $instance ): array {
		$items = array();

		foreach ( $this->normalize_items( $instance ) as $item ) {
			if ( trim( $item['title'] ) === '' ) {
				continue;
			}
			$items[] = $item;
		}

		return $items;
	}

	/**
	 * Empty item defaults.
	 *
	 * @return array<string, string>
	 */
	private function empty_item(): array {
		return array(
			'icon'     => 'phone',
			'title'    => '',
			'subtitle' => '',
			'url'      => '',
		);
	}
}

/**
 * Return SVG icon markup for footer info widget.
 *
 * @param string $icon Icon key.
 */
function starter_bullet_footer_info_icon( string $icon ): string {
	$paths = array(
		'phone'    => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>',
		'whatsapp' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>',
		'location' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>',
		'clock'    => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>',
		'email'    => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>',
		'link'     => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/>',
	);

	$path = $paths[ $icon ] ?? $paths['phone'];

	return '<svg class="sb-footer-info__svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">' . $path . '</svg>';
}

/**
 * Sanitize optional widget link (tel, mailto, https).
 *
 * @param string $url Raw URL.
 */
function starter_bullet_sanitize_widget_link( string $url ): string {
	$url = trim( $url );
	if ( $url === '' ) {
		return '';
	}

	if ( preg_match( '/^(https?|tel|mailto):/i', $url ) ) {
		return esc_url_raw( $url );
	}

	return esc_url_raw( 'https://' . ltrim( $url, '/' ) );
}

/**
 * Register footer info widget.
 */
function starter_bullet_register_footer_info_widget(): void {
	register_widget( 'Starter_Bullet_Footer_Info_Widget' );
}
add_action( 'widgets_init', 'starter_bullet_register_footer_info_widget' );
