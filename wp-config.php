<?php

if ( file_exists( dirname( dirname( __FILE__ ) ) . '/wp-config-env.php' ) ) {
	require_once dirname( dirname( __FILE__ ) ) . '/wp-config-env.php';
} else if ( file_exists( dirname( __FILE__ ) . '/wp-config-env.php' ) ) {
	require_once dirname( __FILE__ ) . '/wp-config-env.php';
}

/** Required environment values **/
foreach( array(
	'BOWLING_CLUB_ENV',
	'DB_NAME',
	'DB_USER',
	'DB_PASSWORD',
	'DOMAIN_CURRENT_SITE',
) as $key ) {
	if ( ! defined( $key ) ) {
		echo "'{$key}' must be defined in wp-config-env.php";
		exit;
	}
}

/** Default configuration values **/
foreach( array(
	'DB_HOST'             => 'localhost',
	'WP_DEFAULT_THEME'    => 'main-theme',
	'AUTH_KEY'            => 'G3J^|~^v]j9x@@|{W:?F+0],dzLD+te23U7uCJSj}7dHqyG7)XfUL!Ki2Wh&BL*n',
	'SECURE_AUTH_KEY'     => 'xp].Fmd+V?72J]X#!E){}*uT=O-Cv>82c6|P{;K9}!l+!-9VZN/,:syd,J(T,vi}',
	'LOGGED_IN_KEY'       => 'QS$1u(:z:#HV;lQh,VZFi}!W&w8]-frMBcnqodp5 :Q@^ee&y7B1DbAK8EXcPVH8',
	'LOGGED_IN_SALT'      => '=E~Nzv/zY*}N+g.B?9p0{8f.-U?~TG]0?$?.OX_@_-=]x){n4Li+Ytq9QxGf>3i7',
	'NONCE_KEY'           => 'kTGz~trN(/G0?g?bavwKN|Kgm2?*nO)X;qx-At&k~>Ikxe~J-b^mAHwm{@40y3++',
	'NONCE_SALT'          => '9t)C8GD>dd-$H9Q~&AbKQJDB*0X63y#*D_p}U^YwPnJP}TS,fTV+##P-Hzhpnh]N',
	'AUTH_SALT'           => 'Aj(}9x}k)(t[!+BzE D^&;/o#69bl4&MtNVh(l4+NN.9vaUEmp4/kP7I]155|RN<',
) as $key => $value ) {
	if ( ! defined( $key ) ) {
		define( $key, $value );
	}
}

/** Required configuration values **/

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/** Don't ever permit file modifications in any environment **/
define( 'DISALLOW_FILE_MODS', true );

/** MU plugins are loaded from the root **/
define( 'WPMU_PLUGIN_DIR', dirname( __FILE__ ) . '/mu-plugins' );


/** Multisite **/
define( 'WP_ALLOW_MULTISITE', true );
define( 'MULTISITE', true );
define( 'SUBDOMAIN_INSTALL', true );
$base = '/';
define( 'PATH_CURRENT_SITE', '/' );
define( 'SITE_ID_CURRENT_SITE', 1 );
define( 'BLOG_ID_CURRENT_SITE', 1 );


$table_prefix = 'wp_';

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
