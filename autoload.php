<?php
/**
 * Autoloader
 */

spl_autoload_register( 'wppjs_autoload' );

/**
 * Autoloads classes namespaced by directory (i.e. namespace K12S\inc\api).
 */
function wppjs_autoload( $class_name ) {
	/*
	 * If the class does not lie under the "WPPJS" namespace, then we can exit immediately.
	 */
	if ( substr( $class_name, 0, 6 ) !== 'WPPJS\\' ) {
		return;
	}

	$class = str_replace( '\\', '/', str_replace( '_', '-', strtolower( $class_name ) ) );

	// create the actual file path
	$file_path = dirname( get_template_directory() ) . '/' . preg_replace( '/^wppjs\//', 'wp-parceljs/', $class ) . '.php';

	// check if the file exists
	if ( file_exists( $file_path ) ) {
		require_once $file_path;
	} else {
		error_log( '$class: ' . $class );
		error_log( 'Cannot load ' . $file_path );
	}
}
