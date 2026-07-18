<?php
/**
 * Helper functions.
 *
 * @package Starter_Bullet
 */

declare(strict_types=1);

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Get hero background image URL for the current page.
 */
function sb_get_page_hero_image_url(): string {
	if ( has_post_thumbnail() ) {
		$url = get_the_post_thumbnail_url( null, 'full' );
		if ( is_string( $url ) && $url !== '' ) {
			return $url;
		}
	}

	$default_id = (int) sb_get_site_option( 'page_default_image_id', 0 );
	return sb_get_image_url( $default_id, 'full' );
}

/**
 * Get brand icon attachment IDs (transparent bar + scrolled/dark bar).
 *
 * @return array{transparent: int, scrolled: int}
 */
function sb_get_brand_icon_ids(): array {
	$saved = get_option( 'starter_bullet_site_settings', array() );
	if ( ! is_array( $saved ) ) {
		$saved = array();
	}

	$transparent_id = (int) ( $saved['brand_icon_transparent'] ?? 0 );
	$scrolled_id    = (int) ( $saved['brand_icon_scrolled'] ?? 0 );
	$legacy_id      = (int) ( $saved['brand_icon_id'] ?? 0 );

	if ( ! $transparent_id && $legacy_id ) {
		$transparent_id = $legacy_id;
	}

	if ( ! $scrolled_id && $legacy_id ) {
		$scrolled_id = $legacy_id;
	}

	if ( $transparent_id && ! $scrolled_id ) {
		$scrolled_id = $transparent_id;
	}

	if ( $scrolled_id && ! $transparent_id ) {
		$transparent_id = $scrolled_id;
	}

	return array(
		'transparent' => $transparent_id,
		'scrolled'    => $scrolled_id,
	);
}

/**
 * Render site logo / name with optional tagline.
 */
function sb_render_site_branding(): void {
	$tagline   = trim( (string) get_bloginfo( 'description', 'display' ) );
	$icon_ids  = sb_get_brand_icon_ids();
	$site_name = get_bloginfo( 'name', 'display' );

	// Full logo images replace the icon + text branding entirely.
	$logo_transparent_id  = (int) sb_get_site_option( 'logo_transparent', 0 );
	$logo_scrolled_id     = (int) sb_get_site_option( 'logo_scrolled', 0 );
	$logo_transparent_url = sb_get_image_url( $logo_transparent_id, 'medium' );
	$logo_scrolled_url    = sb_get_image_url( $logo_scrolled_id, 'medium' );

	if ( $logo_transparent_url || $logo_scrolled_url ) {
		if ( ! $logo_scrolled_url ) {
			$logo_scrolled_url = $logo_transparent_url;
		}
		if ( ! $logo_transparent_url ) {
			$logo_transparent_url = $logo_scrolled_url;
		}
		?>
		<div class="site-branding">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-branding__name flex items-center gap-2">
				<span class="site-branding__mark-wrap site-branding__logo-wrap">
					<img
						class="site-branding__logo-img site-branding__mark--transparent-state"
						src="<?php echo esc_url( $logo_transparent_url ); ?>"
						alt="<?php echo esc_attr( $site_name ); ?>"
						loading="eager"
						decoding="async"
					>
					<img
						class="site-branding__logo-img site-branding__mark--scrolled-state"
						src="<?php echo esc_url( $logo_scrolled_url ); ?>"
						alt="<?php echo esc_attr( $site_name ); ?>"
						loading="eager"
						decoding="async"
					>
				</span>
			</a>
		</div>
		<?php
		return;
	}

	$transparent_url = sb_get_image_url( $icon_ids['transparent'], 'medium' );
	$scrolled_url      = sb_get_image_url( $icon_ids['scrolled'], 'medium' );
	$has_icons         = $transparent_url || $scrolled_url;

	if ( $transparent_url && ! $scrolled_url ) {
		$scrolled_url = $transparent_url;
	}
	if ( $scrolled_url && ! $transparent_url ) {
		$transparent_url = $scrolled_url;
	}

	$transparent_alt = get_post_meta( $icon_ids['transparent'], '_wp_attachment_image_alt', true );
	$scrolled_alt    = get_post_meta( $icon_ids['scrolled'], '_wp_attachment_image_alt', true );
	?>
	<div class="site-branding">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-branding__name flex items-center gap-2">
			<?php if ( $has_icons ) : ?>
				<span class="site-branding__mark-wrap">
					<?php if ( $transparent_url ) : ?>
						<img
							class="site-branding__mark site-branding__mark--image site-branding__mark--transparent-state"
							src="<?php echo esc_url( $transparent_url ); ?>"
							alt="<?php echo esc_attr( is_string( $transparent_alt ) && $transparent_alt !== '' ? $transparent_alt : $site_name ); ?>"
							width="46"
							height="46"
							loading="eager"
							decoding="async"
						>
					<?php endif; ?>
					<?php if ( $scrolled_url ) : ?>
						<img
							class="site-branding__mark site-branding__mark--image site-branding__mark--scrolled-state"
							src="<?php echo esc_url( $scrolled_url ); ?>"
							alt="<?php echo esc_attr( is_string( $scrolled_alt ) && $scrolled_alt !== '' ? $scrolled_alt : $site_name ); ?>"
							width="46"
							height="46"
							loading="eager"
							decoding="async"
						>
					<?php endif; ?>
				</span>
			<?php elseif ( has_custom_logo() ) : ?>
				<span class="site-branding__mark-wrap site-branding__mark--logo">
					<?php the_custom_logo(); ?>
				</span>
			<?php else : ?>
				<span class="site-branding__mark-wrap site-branding__mark--fallback flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-accent-yellow text-navy">★</span>
			<?php endif; ?>
			<span class="site-branding__text">
				<span class="site-branding__title"><?php echo esc_html( $site_name ); ?></span>
				<?php if ( $tagline !== '' ) : ?>
					<span class="site-branding__tagline"><?php echo esc_html( $tagline ); ?></span>
				<?php endif; ?>
			</span>
		</a>
	</div>
	<?php
}

/**
 * Get home section settings.
 *
 * @param string               $section Section key.
 * @param string|null          $field   Optional field key.
 * @param string|array|int|bool $default Default value.
 * @return mixed
 */
function sb_get_section( string $section, ?string $field = null, $default = '' ) {
	$sections = function_exists( 'starter_bullet_get_sections' )
		? starter_bullet_get_sections()
		: get_option( 'starter_bullet_home_sections', array() );

	if ( ! isset( $sections[ $section ] ) ) {
		return $default;
	}

	if ( null === $field ) {
		return $sections[ $section ];
	}

	return $sections[ $section ][ $field ] ?? $default;
}

/**
 * Check if a home section is enabled.
 *
 * @param string $section Section key.
 */
function sb_section_enabled( string $section ): bool {
	return (bool) sb_get_section( $section, 'enabled', false );
}

/**
 * Extract YouTube video ID from a URL (youtu.be, watch, embed, shorts) or raw ID.
 *
 * @param string $url YouTube URL or ID.
 */
function sb_youtube_id( string $url ): string {
	$url = trim( $url );

	if ( '' === $url ) {
		return '';
	}

	if ( preg_match( '~(?:youtu\.be/|youtube\.com/(?:watch\?(?:[^#]*&)?v=|embed/|shorts/|v/))([A-Za-z0-9_-]{6,15})~', $url, $m ) ) {
		return $m[1];
	}

	if ( preg_match( '~^[A-Za-z0-9_-]{6,15}$~', $url ) ) {
		return $url;
	}

	return '';
}

/**
 * Convert a hex color to rgba() notation.
 *
 * @param string $hex   Hex color (#rgb or #rrggbb).
 * @param float  $alpha Alpha 0-1.
 */
function sb_hex_to_rgba( string $hex, float $alpha ): string {
	$hex = ltrim( $hex, '#' );

	if ( 3 === strlen( $hex ) ) {
		$hex = $hex[0] . $hex[0] . $hex[1] . $hex[1] . $hex[2] . $hex[2];
	}

	$r = hexdec( substr( $hex, 0, 2 ) );
	$g = hexdec( substr( $hex, 2, 2 ) );
	$b = hexdec( substr( $hex, 4, 2 ) );

	return sprintf( 'rgba(%d,%d,%d,%s)', $r, $g, $b, rtrim( rtrim( number_format( $alpha, 2 ), '0' ), '.' ) );
}

/**
 * Darken a hex color by a given factor (for hover states).
 *
 * @param string $hex    Hex color.
 * @param float  $factor 0-1, how much to darken (0.1 = 10% darker).
 */
function sb_darken_hex( string $hex, float $factor = 0.1 ): string {
	$hex = ltrim( $hex, '#' );

	if ( 3 === strlen( $hex ) ) {
		$hex = $hex[0] . $hex[0] . $hex[1] . $hex[1] . $hex[2] . $hex[2];
	}

	$rgb = array(
		hexdec( substr( $hex, 0, 2 ) ),
		hexdec( substr( $hex, 2, 2 ) ),
		hexdec( substr( $hex, 4, 2 ) ),
	);

	foreach ( $rgb as $i => $channel ) {
		$rgb[ $i ] = max( 0, (int) round( $channel * ( 1 - $factor ) ) );
	}

	return sprintf( '#%02x%02x%02x', $rgb[0], $rgb[1], $rgb[2] );
}

/**
 * Build inline style attribute (CSS variables) for the hero form card.
 *
 * Controls the card background color + opacity and the submit button color.
 * Returns an escaped ` style="..."` attribute or empty string when defaults apply.
 *
 * @param array<string, mixed> $d Hero section data.
 */
function sb_hero_form_style( array $d ): string {
	$bg_color  = sanitize_hex_color( (string) ( $d['form_bg_color'] ?? '' ) );
	$opacity   = max( 0, min( 100, (int) ( $d['form_bg_opacity'] ?? 100 ) ) );
	$btn_color = sanitize_hex_color( (string) ( $d['form_btn_color'] ?? '' ) );

	$vars = array();

	if ( $bg_color || $opacity < 100 ) {
		$base   = $bg_color ? $bg_color : '#E3EAF2';
		$vars[] = '--sb-form-bg:' . sb_hex_to_rgba( $base, $opacity / 100 );
	}

	if ( $btn_color ) {
		$vars[] = '--sb-form-btn-bg:' . $btn_color;
		$vars[] = '--sb-form-btn-hover:' . sb_darken_hex( $btn_color, 0.12 );
	}

	if ( ! $vars ) {
		return '';
	}

	return ' style="' . esc_attr( implode( ';', $vars ) ) . '"';
}

/**
 * Resolve icon width/height from section settings (defaults to 28).
 *
 * @param array<string, mixed> $d Section data.
 * @return array{0:int,1:int}
 */
function sb_resolve_icon_size( array $d ): array {
	$iw = absint( $d['icon_width'] ?? 0 );
	$ih = absint( $d['icon_height'] ?? 0 );

	if ( $iw < 12 && $ih < 12 ) {
		return array( 28, 28 );
	}
	if ( $iw < 12 ) {
		return array( $ih, $ih );
	}
	if ( $ih < 12 ) {
		return array( $iw, $iw );
	}

	return array( $iw, $ih );
}

/**
 * Build inline style for the circular icon background wrapper.
 *
 * @param array<string, mixed> $d        Section data.
 * @param int                  $icon_box Outer circle size in px.
 * @param string               $fallback Default background when no custom color (CSS value).
 */
function sb_icon_circle_style( array $d, int $icon_box, string $fallback = 'rgba(37,99,235,0.1)' ): string {
	$style = 'width:' . $icon_box . 'px;height:' . $icon_box . 'px;';

	if ( 'hide' === ( $d['icon_bg_visible'] ?? 'show' ) ) {
		return $style . 'background:transparent;';
	}

	$color = sanitize_hex_color( (string) ( $d['icon_bg_color'] ?? '' ) );
	$style .= 'background:' . ( $color ? $color : $fallback ) . ';';

	return $style;
}

/**
 * Get inline style attribute for a section's custom background color.
 *
 * Returns an escaped ` style="..."` attribute (or empty string) that overrides
 * the section's default background, including gradient backgrounds.
 *
 * @param string $section Section key.
 */
function sb_section_bg_style( string $section ): string {
	$color = sanitize_hex_color( (string) sb_get_section( $section, 'bg_color', '' ) );

	if ( ! $color ) {
		return '';
	}

	return ' style="background-color:' . esc_attr( $color ) . ';background-image:none;"';
}

/**
 * Get attachment image URL by ID.
 *
 * @param int    $attachment_id Attachment ID.
 * @param string $size          Image size.
 */
function sb_get_image_url( int $attachment_id, string $size = 'large' ): string {
	if ( $attachment_id <= 0 ) {
		return '';
	}

	$url = wp_get_attachment_image_url( $attachment_id, $size );

	return $url ? $url : '';
}

/**
 * Output escaped image or skeleton placeholder.
 *
 * @param int    $attachment_id Attachment ID.
 * @param string $alt           Alt text.
 * @param string $class         CSS classes.
 * @param string $size          Image size.
 */
function sb_render_image( int $attachment_id, string $alt, string $class = '', string $size = 'large' ): void {
	if ( $attachment_id <= 0 ) {
		printf(
			'<div class="skeleton %s" aria-hidden="true"></div>',
			esc_attr( $class )
		);
		return;
	}

	printf(
		'<img src="%s" alt="%s" class="%s sb-lazy-img" loading="lazy" decoding="async" width="800" height="600">',
		esc_url( sb_get_image_url( $attachment_id, $size ) ),
		esc_attr( $alt ),
		esc_attr( $class )
	);
}

/**
 * Sanitize phone number for tel: links.
 *
 * @param string $phone Phone string.
 */
function sb_sanitize_phone_link( string $phone ): string {
	return preg_replace( '/[^0-9+]/', '', $phone ) ?? '';
}

/**
 * Get header phone number from site settings.
 */
function sb_get_header_phone(): string {
	$saved = get_option( 'starter_bullet_site_settings', false );

	if ( is_array( $saved ) && array_key_exists( 'header_phone', $saved ) ) {
		return (string) $saved['header_phone'];
	}

	return (string) get_theme_mod( 'starter_bullet_phone', '03-1234567' );
}

/**
 * Get main contact form title from site settings.
 */
function sb_get_form_title(): string {
	return (string) sb_get_site_option( 'form_title', 'קבלו הצעת מחיר חינם' );
}

/**
 * Get header style: transparent or solid.
 */
function sb_get_header_style(): string {
	$style = (string) sb_get_site_option( 'header_style', 'transparent' );
	return in_array( $style, array( 'transparent', 'solid' ), true ) ? $style : 'transparent';
}

/**
 * Whether the header should render transparent over the hero.
 */
function sb_is_transparent_header(): bool {
	return sb_get_header_style() === 'transparent' && is_front_page();
}

/**
 * Get solid header background color.
 */
function sb_get_header_bg_color(): string {
	$color = sanitize_hex_color( (string) sb_get_site_option( 'header_bg_color', '#1A1D2E' ) );
	return $color ? $color : '#1A1D2E';
}

/**
 * Render Midrag rating badge.
 *
 * @param array<string, mixed> $data Section data with midrag_* fields.
 */
function sb_render_midrag_badge( array $data ): void {
	$logo_id = (int) ( $data['midrag_logo_id'] ?? 0 );
	if ( ! $logo_id ) {
		$hero_fallback = sb_get_section( 'hero' );
		$logo_id       = (int) ( $hero_fallback['midrag_logo_id'] ?? 0 );
	}

	$score = trim( (string) ( $data['midrag_score'] ?? '' ) );
	if ( $score === '' ) {
		$hero_fallback = $hero_fallback ?? sb_get_section( 'hero' );
		$score         = trim( (string) ( $hero_fallback['midrag_score'] ?? '' ) );
	}

	$label   = (string) ( $data['midrag_label'] ?? '' );
	$reviews = (string) ( $data['midrag_reviews'] ?? '' );

	if ( $label === '' || $reviews === '' ) {
		$hero_fallback = $hero_fallback ?? sb_get_section( 'hero' );
		if ( $label === '' ) {
			$label = (string) ( $hero_fallback['midrag_label'] ?? '' );
		}
		if ( $reviews === '' ) {
			$reviews = (string) ( $hero_fallback['midrag_reviews'] ?? '' );
		}
	}

	$logo = sb_get_image_url( $logo_id, 'medium' );
	if ( ! $logo && $score === '' ) {
		return;
	}
	?>
	<div class="sb-midrag mt-8 flex items-end justify-center gap-5">
		<?php if ( $logo ) : ?>
			<img class="sb-midrag__logo h-16 w-auto shrink-0 object-contain" src="<?php echo esc_url( $logo ); ?>" alt="<?php esc_attr_e( 'מידרג', 'starter-bullet' ); ?>" loading="lazy" width="120" height="64">
		<?php endif; ?>
		<div class="sb-midrag__rating text-right">
			<div class="sb-midrag__stars" aria-hidden="true">★★★★★</div>
			<div class="sb-midrag__meta">
				<?php if ( $score !== '' ) : ?>
					<p class="sb-midrag__score"><?php echo esc_html( $score ); ?></p>
				<?php endif; ?>
				<div class="sb-midrag__text">
					<?php if ( $label !== '' ) : ?>
						<p class="sb-midrag__label"><?php echo esc_html( $label ); ?></p>
					<?php endif; ?>
					<?php if ( $reviews !== '' ) : ?>
						<p class="sb-midrag__reviews"><?php echo esc_html( $reviews ); ?></p>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
	<?php
}

/**
 * Icon library for hero benefits bar (Heroicons outline, 24x24).
 *
 * @return array<string, array{label: string, path: string}>
 */
function sb_benefit_icon_library(): array {
	return array(
		'home'      => array(
			'label' => 'בית',
			'path'  => '<path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>',
		),
		'building'  => array(
			'label' => 'בניין / מסחרי',
			'path'  => '<path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>',
		),
		'clock'     => array(
			'label' => 'שעון / 24-7',
			'path'  => '<path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>',
		),
		'wrench'    => array(
			'label' => 'מפתח / תיקונים',
			'path'  => '<path stroke-linecap="round" stroke-linejoin="round" d="M11.42 15.17l-4.655 5.653a2.548 2.548 0 11-3.586-3.586l6.836-5.63m5.108-.233c.55-.164 1.163-.188 1.743-.14a4.5 4.5 0 004.486-6.336l-3.276 3.277a3.004 3.004 0 01-2.25-2.25l3.276-3.276a4.5 4.5 0 00-6.336 4.486c.091 1.076-.071 2.264-.904 2.95l-.102.085m-1.745 1.437l5.001 5.001"/>',
		),
		'shield'    => array(
			'label' => 'מגן / אחריות',
			'path'  => '<path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z"/>',
		),
		'phone'     => array(
			'label' => 'טלפון',
			'path'  => '<path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z"/>',
		),
		'bolt'      => array(
			'label' => 'ברק / מהירות',
			'path'  => '<path stroke-linecap="round" stroke-linejoin="round" d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z"/>',
		),
		'badge'     => array(
			'label' => 'תו איכות',
			'path'  => '<path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z"/>',
		),
		'truck'     => array(
			'label' => 'משאית / משלוח',
			'path'  => '<path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 01-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 00-3.213-9.193 2.056 2.056 0 00-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 00-10.026 0 1.106 1.106 0 00-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12"/>',
		),
		'star'      => array(
			'label' => 'כוכב',
			'path'  => '<path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z"/>',
		),
		'sparkles'  => array(
			'label' => 'ניצוצות / ניקיון',
			'path'  => '<path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904L9 18.75l-.813-2.846a4.5 4.5 0 00-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 003.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 003.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 00-3.09 3.09zM18.259 8.715L18 9.75l-.259-1.035a3.375 3.375 0 00-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 002.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 002.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 00-2.456 2.456zM16.894 20.567L16.5 21.75l-.394-1.183a2.25 2.25 0 00-1.423-1.423L13.5 18.75l1.183-.394a2.25 2.25 0 001.423-1.423l.394-1.183.394 1.183a2.25 2.25 0 001.423 1.423l1.183.394-1.183.394a2.25 2.25 0 00-1.423 1.423z"/>',
		),
		'droplet'   => array(
			'label' => 'טיפת מים',
			'path'  => '<path stroke-linecap="round" stroke-linejoin="round" d="M12 21a7 7 0 007-7c0-3.866-4.03-8.833-6.11-11.13a1.2 1.2 0 00-1.78 0C9.03 5.167 5 10.134 5 14a7 7 0 007 7z"/>',
		),
		'fire'      => array(
			'label' => 'אש / חימום',
			'path'  => '<path stroke-linecap="round" stroke-linejoin="round" d="M15.362 5.214A8.252 8.252 0 0112 21 8.25 8.25 0 016.038 7.048 8.287 8.287 0 009 9.6a8.983 8.983 0 013.361-6.867 8.21 8.21 0 003 2.48z"/><path stroke-linecap="round" stroke-linejoin="round" d="M12 18a3.75 3.75 0 00.495-7.467 5.99 5.99 0 00-1.925 3.546 5.974 5.974 0 01-2.133-1A3.75 3.75 0 0012 18z"/>',
		),
		'users'     => array(
			'label' => 'לקוחות / צוות',
			'path'  => '<path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"/>',
		),
	);
}

/**
 * Render a Heroicon or Lordicon.
 *
 * @param string               $icon_key Icon library key.
 * @param string               $lordicon Lordicon URL or id (wins when set).
 * @param array<string, mixed> $args     Optional render args.
 */
function sb_render_icon( string $icon_key = '', string $lordicon = '', array $args = array() ): void {
	$args = array_merge(
		array(
			'svg_class'       => 'h-7 w-7',
			'lordicon_colors' => 'primary:#2563eb,secondary:#f9bc2f',
			'lordicon_size'   => '40px',
			'fallback_key'    => 'badge',
			'width'           => 0,
			'height'          => 0,
		),
		$args
	);

	$width  = absint( $args['width'] );
	$height = absint( $args['height'] );
	$lordicon = trim( $lordicon );

	if ( $lordicon !== '' ) {
		if ( ! preg_match( '/^https?:\/\//i', $lordicon ) ) {
			$lordicon = 'https://cdn.lordicon.com/' . ltrim( $lordicon, '/' );
		}
		if ( ! str_ends_with( strtolower( $lordicon ), '.json' ) ) {
			$lordicon .= '.json';
		}

		$lord_w = $width >= 12 ? $width . 'px' : (string) $args['lordicon_size'];
		$lord_h = $height >= 12 ? $height . 'px' : (string) $args['lordicon_size'];

		wp_enqueue_script( 'lordicon', 'https://cdn.lordicon.com/lordicon.js', array(), null, true ); // phpcs:ignore WordPress.WP.EnqueuedResourceParameters.MissingVersion
		?>
		<lord-icon
			src="<?php echo esc_url( $lordicon ); ?>"
			trigger="loop"
			delay="2000"
			colors="<?php echo esc_attr( (string) $args['lordicon_colors'] ); ?>"
			style="width:<?php echo esc_attr( $lord_w ); ?>;height:<?php echo esc_attr( $lord_h ); ?>"
		></lord-icon>
		<?php
		return;
	}

	$library = sb_benefit_icon_library();
	if ( ! isset( $library[ $icon_key ] ) ) {
		$icon_key = (string) $args['fallback_key'];
	}
	if ( ! isset( $library[ $icon_key ] ) ) {
		$icon_key = (string) array_key_first( $library );
	}

	$style = '';
	if ( $width >= 12 || $height >= 12 ) {
		$style_parts = array();
		if ( $width >= 12 ) {
			$style_parts[] = 'width:' . $width . 'px';
		}
		if ( $height >= 12 ) {
			$style_parts[] = 'height:' . $height . 'px';
		}
		$style = ' style="' . esc_attr( implode( ';', $style_parts ) ) . '"';
	}

	printf(
		'<svg class="%s shrink-0"%s fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" aria-hidden="true">%s</svg>',
		esc_attr( (string) $args['svg_class'] ),
		$style, // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		$library[ $icon_key ]['path'] // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	);
}

/**
 * Render icon for a hero benefit item (Heroicon or Lordicon).
 *
 * @param array<string, mixed> $data  Hero section data.
 * @param int                  $index Benefit index 1-3.
 */
function sb_render_benefit_icon( array $data, int $index ): void {
	$defaults = array( 1 => 'home', 2 => 'building', 3 => 'clock' );

	sb_render_icon(
		(string) ( $data[ "benefit_{$index}_icon" ] ?? '' ),
		(string) ( $data[ "benefit_{$index}_lordicon" ] ?? '' ),
		array(
			'svg_class'       => 'h-10 w-10',
			'lordicon_colors' => 'primary:#ffffff,secondary:#f9bc2f',
			'lordicon_size'   => '40px',
			'fallback_key'    => $defaults[ $index ] ?? 'home',
		)
	);
}

/**
 * Render a single testimonial card.
 *
 * @param WP_Post $post Review post.
 */
function sb_render_testimonial_card( WP_Post $post ): void {
	$rating = (int) get_post_meta( $post->ID, '_bullet_rating', true );
	$rating = $rating >= 1 && $rating <= 5 ? $rating : 5;
	$name   = get_post_meta( $post->ID, '_bullet_reviewer_name', true ) ?: $post->post_title;
	?>
	<article class="testimonial-card shrink-0" dir="rtl">
		<div class="mb-3 flex gap-0.5 text-accent-yellow" aria-label="<?php echo esc_attr( sprintf( __( 'דירוג %d מתוך 5', 'starter-bullet' ), $rating ) ); ?>">
			<?php for ( $s = 0; $s < $rating; $s++ ) : ?>★<?php endfor; ?>
		</div>
		<div class="text-sm text-gray-600"><?php echo wp_kses_post( apply_filters( 'the_content', $post->post_content ) ); ?></div>
		<div class="mt-4 flex items-center gap-3">
			<?php if ( has_post_thumbnail( $post ) ) : ?>
				<?php echo get_the_post_thumbnail( $post, 'thumbnail', array( 'class' => 'h-10 w-10 rounded-full object-cover' ) ); ?>
			<?php else : ?>
				<div class="flex h-10 w-10 items-center justify-center rounded-full bg-royal-blue/10 text-sm font-bold text-royal-blue"><?php echo esc_html( mb_substr( $name, 0, 1 ) ); ?></div>
			<?php endif; ?>
			<p class="text-sm font-bold text-navy"><?php echo esc_html( $name ); ?></p>
		</div>
	</article>
	<?php
}
