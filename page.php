<?php
/**
 * Default page template.
 *
 * @package Starter_Bullet
 */

declare(strict_types=1);

get_header();

while ( have_posts() ) :
	the_post();
	get_template_part( 'template-parts/content/page', 'hero' );
	get_template_part( 'template-parts/content/page', 'content' );
endwhile;

get_footer();
