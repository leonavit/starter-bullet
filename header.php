<!DOCTYPE html>
<html <?php language_attributes(); ?> dir="rtl">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class( 'bg-white text-navy antialiased' ); ?>>
<?php wp_body_open(); ?>

<a class="sr-only focus:not-sr-only focus:absolute focus:top-4 focus:right-4 focus:z-50 focus:rounded-lg focus:bg-accent-yellow focus:px-4 focus:py-2 focus:text-navy" href="#main-content">
	<?php esc_html_e( 'דלג לתוכן', 'starter-bullet' ); ?>
</a>

<?php $phone = sb_get_header_phone(); ?>
<?php
$transparent_header = sb_is_transparent_header();
$header_classes       = array(
	'site-header',
	'text-white',
	$transparent_header ? 'site-header--transparent' : 'site-header--solid',
);

if ( 'hide' === sb_get_site_option( 'header_nav_effect', sb_get_site_option( 'header_bg_visible', 'show' ) ) ) {
	$header_classes[] = 'site-header--nav-effect-hidden';
}
?>

<header id="site-header" class="<?php echo esc_attr( implode( ' ', $header_classes ) ); ?>">
	<div class="mx-auto flex max-w-7xl items-center justify-between gap-4 px-4 py-5 lg:px-8">
		<div class="flex items-center gap-3">
			<?php sb_render_site_branding(); ?>
		</div>

		<nav class="primary-nav hidden lg:block" aria-label="<?php esc_attr_e( 'תפריט ראשי', 'starter-bullet' ); ?>">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'primary',
					'container'      => false,
					'menu_class'     => 'sb-nav-primary flex items-center gap-6 font-medium',
					'fallback_cb'    => 'starter_bullet_fallback_menu',
				)
			);
			?>
		</nav>

		<?php if ( $phone ) : ?>
			<?php $phone_lordicon = trim( (string) sb_get_site_option( 'header_phone_lordicon', '' ) ); ?>
			<a href="tel:<?php echo esc_attr( sb_sanitize_phone_link( $phone ) ); ?>" class="sb-cta sb-btn-cta sb-header-phone hidden items-center gap-2 rounded-full bg-accent-yellow px-5 py-2.5 font-bold text-navy transition hover:bg-yellow-300 sm:inline-flex">
				<span><?php echo esc_html( $phone ); ?></span>
				<?php
				if ( '' !== $phone_lordicon ) {
					sb_render_icon(
						'',
						$phone_lordicon,
						array(
							'lordicon_colors' => 'primary:#1A1D2E,secondary:#1A1D2E',
							'lordicon_size'   => '22px',
							'width'           => 22,
							'height'          => 22,
						)
					);
				}
				?>
			</a>
		<?php endif; ?>

		<?php
		$hamburger_style = (string) sb_get_site_option( 'hamburger_style', 'lines' );
		$hamburger_size  = (string) sb_get_site_option( 'hamburger_size', 'small' );
		if ( ! in_array( $hamburger_style, array( 'lines', 'bars', 'grid' ), true ) ) {
			$hamburger_style = 'lines';
		}
		if ( ! in_array( $hamburger_size, array( 'small', 'large' ), true ) ) {
			$hamburger_size = 'small';
		}
		$hamburger_class = 'sb-hamburger sb-hamburger--' . $hamburger_style . ' sb-hamburger--' . $hamburger_size;
		?>
		<button type="button" id="mobile-menu-toggle" class="<?php echo esc_attr( $hamburger_class ); ?> rounded-lg p-2 hover:bg-white/10 lg:hidden" aria-expanded="false" aria-controls="mobile-menu-panel" aria-label="<?php esc_attr_e( 'פתח תפריט', 'starter-bullet' ); ?>">
			<?php if ( 'bars' === $hamburger_style ) : ?>
				<svg class="sb-hamburger__icon" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><rect x="3" y="5" width="18" height="3" rx="1.5"/><rect x="3" y="10.5" width="18" height="3" rx="1.5"/><rect x="3" y="16" width="18" height="3" rx="1.5"/></svg>
			<?php elseif ( 'grid' === $hamburger_style ) : ?>
				<svg class="sb-hamburger__icon" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><circle cx="6" cy="6" r="2"/><circle cx="12" cy="6" r="2"/><circle cx="18" cy="6" r="2"/><circle cx="6" cy="12" r="2"/><circle cx="12" cy="12" r="2"/><circle cx="18" cy="12" r="2"/><circle cx="6" cy="18" r="2"/><circle cx="12" cy="18" r="2"/><circle cx="18" cy="18" r="2"/></svg>
			<?php else : ?>
				<svg class="sb-hamburger__icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
			<?php endif; ?>
		</button>
	</div>
</header>

<div id="mobile-menu-overlay" class="mobile-menu-overlay" aria-hidden="true">
	<div id="mobile-menu-panel" class="mobile-menu-panel" role="dialog" aria-modal="true" aria-label="<?php esc_attr_e( 'תפריט ניווט', 'starter-bullet' ); ?>">
		<button type="button" id="mobile-menu-close" class="mobile-menu-close" aria-label="<?php esc_attr_e( 'סגור תפריט', 'starter-bullet' ); ?>">×</button>
		<nav aria-label="<?php esc_attr_e( 'תפריט מובייל', 'starter-bullet' ); ?>">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'primary',
					'container'      => false,
					'menu_class'     => 'mobile-nav-links sb-nav-primary',
					'fallback_cb'    => 'starter_bullet_fallback_menu',
				)
			);
			?>
		</nav>
	</div>
</div>

<main id="main-content">
