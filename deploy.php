<?php

$env_config = dirname( __FILE__ ) . '/wp-config-env.php';
if ( ! file_exists( $env_config ) ) {
	echo 'Please create wp-config-env.php and add a BOWLING_CLUB_DEPLOY_SECRET';
	exit;
}

require_once $env_config;

if ( ! defined( 'BOWLING_CLUB_DEPLOY_SECRET' ) ) {
	echo 'Please create wp-config-env.php and add a BOWLING_CLUB_DEPLOY_SECRET';
	exit;
}

if ( empty( $_GET['deploy_secret'] ) || $_GET['deploy_secret'] !== BOWLING_CLUB_DEPLOY_SECRET ) {
	echo 'Invalid deploy secret';
	exit;
}

$path = dirname( __FILE__ );
system( sprintf( 'cd %s; git fetch origin; git remote prune origin; git pull -f origin master; git submodule update --init --recursive', escapeshellarg( $path ) ) );
echo 'Deployment complete';
