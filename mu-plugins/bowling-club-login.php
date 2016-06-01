<?php

/**
 * Tweaks to the WordPress login experience
 */

/**
 * Add the Bowling Club logo to the login header
 */
add_action( 'login_head', function() {
	?>
	<style>
		.login {
			background-color: #0e3824;
		}
		.login h1 a {
			background-image: url( '<?php echo esc_url( home_url( "assets/images/logo_white_h320.png" ) ); ?>' );
			width: 320px;
			height: 128px;
			background-size: 320px;
		}
		.login #backtoblog a, .login #nav a {
			color: #FFF;
		}
	</style>
	<?php
});
