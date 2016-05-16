<?php

class Main_Theme {

	private static $instance;

	public static function get_instance() {
		if ( ! isset( self::$instance ) ) {
			self::$instance = new self;
			self::$instance->setup_constants();
			self::$instance->setup_actions();
			self::$instance->setup_filters();
			self::$instance->require_files();
			self::$instance->setup_controllers();
		}
		return self::$instance;
	}

	private function setup_constants() {

	}

	private function setup_actions() {
		add_action( 'after_setup_theme', array( $this, 'action_after_setup_theme' ) );
	}

	private function setup_filters() {

	}

	private function require_files() {

		spl_autoload_register( function( $class ) {
			$class = ltrim( $class, '\\' );
			if ( 0 !== stripos( $class, 'Main_Theme\\' ) ) {
				return;
			}

			$parts = explode( '\\', $class );
			array_shift( $parts ); // Don't need "Main_Theme"
			$last = array_pop( $parts ); // File should be 'class-[...].php'
			$last = 'class-' . $last . '.php';
			$parts[] = $last;
			$file = dirname( __FILE__ ) . '/inc/' . str_replace( '_', '-', strtolower( implode( $parts, '/' ) ) );
			if ( file_exists( $file ) ) {
				require $file;
			}
		});
	}

	private function setup_controllers() {
		$controllers = array(
			'Main_Theme\Assets',
		);
		foreach( $controllers as $controller ) {
			$controller::get_instance();
		}
	}

	public function action_after_setup_theme() {
		add_theme_support( 'title-tag' );

	}

}

Main_Theme::get_instance();
