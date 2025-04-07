<?php
if ( ! function_exists( "sopot_add_metaboxes" ) ) {
	function sopot_add_metaboxes( $metaboxes ) {
		$directories_array = array(
			'page.php',
		);
		foreach ( $directories_array as $dir ) {
			$metaboxes[] = require_once( sopotPLUGIN_PLUGIN_PATH . '/metabox/' . $dir );
		}

		return $metaboxes;
	}

	add_action( "redux/metaboxes/sopot_options/boxes", "sopot_add_metaboxes" );
}

