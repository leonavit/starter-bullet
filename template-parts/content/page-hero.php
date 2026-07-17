<?php
/**
 * Page hero — full-width featured image with title overlay.
 *
 * @package Starter_Bullet
 */

declare(strict_types=1);

$image_url = sb_get_page_hero_image_url();
$hero_class = $image_url !== '' ? 'page-hero' : 'page-hero page-hero--no-image';
?>
<section class="<?php echo esc_attr( $hero_class ); ?>">
	<?php if ( $image_url ) : ?>
		<div class="page-hero__bg" style="background-image:url('<?php echo esc_url( $image_url ); ?>')"></div>
	<?php endif; ?>
	<div class="page-hero__overlay"></div>
	<div class="page-hero__inner">
		<h1 class="page-hero__title"><?php the_title(); ?></h1>
	</div>
</section>
