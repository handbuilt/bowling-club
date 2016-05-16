<?php

/**
 * Resolve incorrect default WPMU_PLUGINS_URL before any plugins have been loaded
 */
add_filter( 'plugins_url', function( $url ) {
	return str_replace( '/wp-content/mu-plugins/', '/mu-plugins/', $url );
});

if ( ! defined( 'WP_INSTALLING' ) ) {
	register_theme_directory( ABSPATH . 'themes' );
	// register_theme_directory() really needs two directories to work
	// this second directory will never have themes
	register_theme_directory( WPMU_PLUGIN_DIR . '/lib' );
}
