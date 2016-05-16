<?php

namespace Main_Theme;

class Assets extends Controller {

	protected function setup_actions() {
		add_action( 'admin_enqueue_scripts', array( $this, 'action_admin_enqueue_scripts' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'action_wp_enqueue_scripts' ) );
	}

	public function action_admin_enqueue_scripts() {
		// $time = filemtime( get_template_directory() . '/assets/css/editor.css' );
		// add_editor_style( get_stylesheet_directory_uri() . '/assets/css/editor.css?r=' . (int) $time );
	}

	public function action_wp_enqueue_scripts() {
		wp_enqueue_script( 'fastclick', home_url() . '/assets/lib/fastclick/fastclick.js', null, '1.0.6' );
		// wp_enqueue_script( 'modernizr', home_url() . '/assets/lib/modernizr/modernizr.js', null, '2.8.3' );

		wp_enqueue_script( 'foundation', home_url() . '/assets/lib/foundation/js/foundation/foundation.js', array( 'jquery' ), false, true );

		$time = filemtime( get_template_directory() . '/assets/css/style.css' );
		wp_enqueue_style( 'main-theme', get_template_directory_uri() . '/assets/css/style.css?r=' . (int) $time, null );

	}

}
