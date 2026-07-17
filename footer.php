</main>

<?php if ( sb_section_enabled( 'cta' ) ) : ?>
	<?php get_template_part( 'template-parts/home/section', 'cta' ); ?>
<?php endif; ?>

<footer class="bg-navy text-white">
	<div class="mx-auto grid max-w-7xl gap-10 px-4 py-14 sm:grid-cols-2 lg:grid-cols-4 lg:px-8">
		<div>
			<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
				<?php dynamic_sidebar( 'footer-1' ); ?>
			<?php else : ?>
				<?php if ( has_custom_logo() ) : ?>
					<?php the_custom_logo(); ?>
				<?php else : ?>
					<p class="text-lg font-bold"><?php bloginfo( 'name' ); ?></p>
				<?php endif; ?>
				<p class="mt-4 text-sm text-white/70">
					<?php bloginfo( 'description' ); ?>
				</p>
			<?php endif; ?>
		</div>

		<div>
			<?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
				<?php dynamic_sidebar( 'footer-2' ); ?>
			<?php else : ?>
				<h3 class="mb-4 font-bold"><?php esc_html_e( 'קישורים מהירים', 'starter-bullet' ); ?></h3>
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'footer',
						'container'      => false,
						'menu_class'     => 'space-y-2 text-sm text-white/70',
						'fallback_cb'    => 'starter_bullet_fallback_menu',
					)
				);
				?>
			<?php endif; ?>
		</div>

		<div>
			<?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
				<?php dynamic_sidebar( 'footer-3' ); ?>
			<?php else : ?>
				<h3 class="mb-4 font-bold"><?php esc_html_e( 'השירותים שלנו', 'starter-bullet' ); ?></h3>
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'footer_services',
						'container'      => false,
						'menu_class'     => 'space-y-2 text-sm text-white/70',
						'fallback_cb'    => false,
					)
				);
				?>
			<?php endif; ?>
		</div>

		<div>
			<?php if ( is_active_sidebar( 'footer-4' ) ) : ?>
				<?php dynamic_sidebar( 'footer-4' ); ?>
			<?php else : ?>
				<h3 class="mb-4 font-bold"><?php esc_html_e( 'צור קשר', 'starter-bullet' ); ?></h3>
				<ul class="space-y-2 text-sm text-white/70">
					<?php $phone = sb_get_header_phone(); ?>
					<?php if ( $phone ) : ?>
						<li><a href="tel:<?php echo esc_attr( sb_sanitize_phone_link( $phone ) ); ?>" class="hover:text-accent-yellow"><?php echo esc_html( $phone ); ?></a></li>
					<?php endif; ?>
					<?php $address = get_theme_mod( 'starter_bullet_address' ); ?>
					<?php if ( $address ) : ?>
						<li><?php echo esc_html( $address ); ?></li>
					<?php endif; ?>
				</ul>
			<?php endif; ?>
		</div>
	</div>

	<div class="border-t border-white/10 py-4 text-center text-xs text-white/50">
		&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?>
	</div>
</footer>

<?php
$whatsapp = sb_get_site_option( 'whatsapp_number', '' );
$wa_pos   = sb_get_site_option( 'whatsapp_position', 'bottom-right' );

if ( $whatsapp ) :
	$wa_class = 'bottom-left' === $wa_pos ? 'sb-whatsapp--left' : 'sb-whatsapp--right';
	?>
	<a
		href="https://wa.me/<?php echo esc_attr( sb_sanitize_phone_link( $whatsapp ) ); ?>"
		class="sb-whatsapp <?php echo esc_attr( $wa_class ); ?>"
		target="_blank"
		rel="noopener noreferrer"
		aria-label="WhatsApp"
	>
		<svg class="h-7 w-7" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
			<path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.435 9.884-9.881 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
		</svg>
	</a>
<?php endif; ?>

<?php wp_footer(); ?>
</body>
</html>
