<?php
namespace WPPJS;

use WPPJS\Inc as Inc;

/**
 * Theme setup
 *
 * @package K12S
 */
class Theme {
	const THEME_NAME = 'wppjs';
	public static $version;

	/**
	 * Unique instance of Theme class
	 *
	 * @var Theme
	 */
	private static $instance = null;

	public static $classes = [];

	public function __construct() {
		$package_json = file_get_contents( get_stylesheet_directory() . '/package.json' );
		$package_json = json_decode( $package_json, true );

		self::$version = $package_json['version'];
	}

	/**
	 * Get instance of class
	 *
	 * @return Theme|null
	 */
	public static function get_instance() {
		if ( null == self::$instance ) {
			self::$instance = new self;
		}

		return self::$instance;
	}

	/**
	 * Initializes theme
	 */
	public function init() {
		self::$classes = [];

		// self::$classes[] = new Inc\Scripts\Coordinator();
		// self::$classes[] = new Inc\Styles\Coordinator();

		foreach ( self::$classes as $class ) {
			$class->init();
		}
	}
}
