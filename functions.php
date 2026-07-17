<?php
/**
 * Theme bootstrap.
 *
 * @package Starter_Bullet
 */

declare(strict_types=1);

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'STARTER_BULLET_VERSION', '1.0.0' );
define( 'STARTER_BULLET_DIR', get_template_directory() );
define( 'STARTER_BULLET_URI', get_template_directory_uri() );

require_once STARTER_BULLET_DIR . '/inc/helpers.php';
require_once STARTER_BULLET_DIR . '/inc/fallback-menu.php';
require_once STARTER_BULLET_DIR . '/inc/setup.php';
require_once STARTER_BULLET_DIR . '/inc/widgets.php';
require_once STARTER_BULLET_DIR . '/inc/enqueue.php';
require_once STARTER_BULLET_DIR . '/inc/cf7.php';
require_once STARTER_BULLET_DIR . '/inc/customizer.php';
require_once STARTER_BULLET_DIR . '/inc/cpt.php';
require_once STARTER_BULLET_DIR . '/inc/meta-boxes.php';
require_once STARTER_BULLET_DIR . '/inc/home-settings.php';
require_once STARTER_BULLET_DIR . '/inc/site-settings.php';
require_once STARTER_BULLET_DIR . '/inc/leads.php';
