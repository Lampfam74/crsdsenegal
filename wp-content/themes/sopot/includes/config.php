<?php
/**
 * Theme config file.
 *
 * @package sopot
 * @author  thememx
 * @version 1.0
 * changed
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Restricted' );
}

$config = array();

$config['default']['sopot_main_header'][] 	= array( 'sopot_preloader', 98 );
$config['default']['sopot_main_header'][] 	= array( 'sopot_main_header_area', 99 );

$config['default']['sopot_main_footer'][] 	= array( 'sopot_preloader', 98 );
$config['default']['sopot_main_footer'][] 	= array( 'sopot_main_footer_area', 99 );

$config['default']['sopot_sidebar'][] 	    = array( 'sopot_sidebar', 99 );

$config['default']['sopot_banner'][] 	    = array( 'sopot_banner', 99 );


return $config;
