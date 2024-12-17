<?php
/**
 * Initializes theme
 */

use WPPJS\Theme;

if ( ! defined( 'WPINC' ) ) {
	die();
}

// $content_width = 1200;

// Theme autoloader
require_once 'autoload.php';

require_once dirname( __FILE__ ) . '/inc/theme.php';

Theme::get_instance()->init();
