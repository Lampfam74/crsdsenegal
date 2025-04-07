<?php

define( 'sopot_ROOT', get_template_directory() . '/' );

require_once get_template_directory() . '/includes/functions/functions.php';
include_once get_template_directory() . '/includes/classes/base.php';
include_once get_template_directory() . '/includes/classes/dotnotation.php';
include_once get_template_directory() . '/includes/classes/header-enqueue.php';
include_once get_template_directory() . '/includes/classes/options.php';
include_once get_template_directory() . '/includes/classes/ajax.php';
include_once get_template_directory() . '/includes/classes/common.php';
include_once get_template_directory() . '/includes/classes/bootstrap_walker.php';
include_once get_template_directory() . '/includes/library/class-tgm-plugin-activation.php';
require_once get_template_directory() . '/includes/library/hook.php';



add_action( 'after_setup_theme', 'sopot_wp_load', 5 );

function sopot_wp_load() {

	defined( 'sopot_URL' ) or define( 'sopot_URL', get_template_directory_uri() . '/' );
	define(  'sopot_KEY','!@#sopot');
	define(  'sopot_URI', get_template_directory_uri() . '/');

	if ( ! defined( 'sopot_NONCE' ) ) {
		define( 'sopot_NONCE', 'sopot_wp_theme' );
	}

	( new \sopot\Includes\Classes\Base )->loadDefaults();
	( new \sopot\Includes\Classes\Ajax )->actions();

}
add_action( 'init', 'sopot_bunch_theme_init');
function sopot_bunch_theme_init()
{
	$bunch_exlude_hooks = include_once get_template_directory(). '/includes/resource/remove_action.php';
	foreach( $bunch_exlude_hooks as $k => $v )
	{
		foreach( $v as $value )
		remove_action( $k, $value[0], $value[1] );
	}

}
