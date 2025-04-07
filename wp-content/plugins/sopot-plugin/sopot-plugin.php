<?php
/**
 * Plugin Name: sopot Plugin
 * Plugin URI: http://themeforest.net/user/thememx/
 * Description: Supported plugin for sopot WordPress theme
 * Author: Thememx
 * Version: 1.0
 * Author URI: https://themeforest.net/user/thememx/
 *
 * @package sopot-plugin
 */

defined( 'sopotPLUGIN_PLUGIN_PATH' ) || define( 'sopotPLUGIN_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'sopot_PLUGIN_URI', plugins_url( 'sopot-plugin' ) . '/' );
require_once plugin_dir_path( __FILE__ ) . 'file_crop.php';
function sopot_custom_widget()
{
	if( class_exists( 'sopot_Popular_Post' ) )register_widget( 'sopot_Popular_Post' );
}
add_action( 'widgets_init', 'sopot_custom_widget' );	

class sopotPLUGIN_Plugin_Core {

	/**
	 * The instance variable.
	 *
	 * @var [type]
	 */
	public static $instance;

	/**
	 * The main constructor
	 */
	function __construct() {
		self::includes();
		$this->init();

	}

	/**
	 * Load the instance.
	 *
	 * @return [type] [description]
	 */
	public static function instance() {

		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	public static function includes() {
		require_once sopotPLUGIN_PLUGIN_PATH . '/inc/helpers/functions.php';
		require_once sopotPLUGIN_PLUGIN_PATH . '/elementor/elementor.php';
		require_once sopotPLUGIN_PLUGIN_PATH . '/customicon/cicon.php';
		require_once sopotPLUGIN_PLUGIN_PATH . '/inc/abstracts/class-post-type-abstract.php';
		require_once sopotPLUGIN_PLUGIN_PATH . '/inc/abstracts/class-taxonomy-abstract.php';
		require_once sopotPLUGIN_PLUGIN_PATH . '/inc/helpers/widgets.php';
		
		require_once sopotPLUGIN_PLUGIN_PATH . '/inc/taxonomies.php';
		if ( ! class_exists( 'Redux' ) ) {
			require_once sopotPLUGIN_PLUGIN_PATH . 'redux-framework/redux-framework.php';
			require_once sopotPLUGIN_PLUGIN_PATH . '/metabox/metaboxes.php';
		}
	}

	function init() {
		add_action( 'init', array( '\sopotPLUGIN\Inc\Taxonomies', 'init' ) );
	}
}

/**
 * [sopot_get_sidebars description]
 *
 * @param  boolean $multi [description].
 *
 * @return [type]         [description]
 */
function sopots_get_sidebars( $multi = false ) {
	global $wp_registered_sidebars;

	$sidebars = ! ( $wp_registered_sidebars ) ? get_option( 'wp_registered_sidebars' ) : $wp_registered_sidebars;

	if ( $multi ) {
		$data[] = array( 'value' => '', 'label' => 'No Sidebar' );
	} else {
		$data = array( '' => esc_html__( 'No Sidebar', 'hlc' ) );
	}

	foreach ( ( array ) $sidebars as $sidebar ) {

		if ( $multi ) {

			$data[] = array( 'value' => sopot_set( $sidebar, 'id' ), 'label' => sopot_set( $sidebar, 'name' ) );
		} else {

			$data[ sopot_set( $sidebar, 'id' ) ] = sopot_set( $sidebar, 'name' );
		}
	}

	return $data;
}


function custom_footer_post_type() {

	$labels = array(
		'name'                  => _x( 'Footer Templates', 'Post Type General Name', 'lsicool-plugin' ),
		'singular_name'         => _x( 'Footer Template', 'Post Type Singular Name', 'lsicool-plugin' ),
		'menu_name'             => __( 'Footer', 'lsicool-plugin' ),
		'name_admin_bar'        => __( 'Footer Templates', 'lsicool-plugin' ),
		'archives'              => __( 'List Archives', 'lsicool-plugin' ),
		'parent_item_colon'     => __( 'Parent List:', 'lsicool-plugin' ),
		'all_items'             => __( 'All Footer Templates', 'lsicool-plugin' ),
		'add_new_item'          => __( 'Add New  Template', 'lsicool-plugin' ),
		'add_new'               => __( 'Add New', 'lsicool-plugin' ),
		'new_item'              => __( 'New Template', 'lsicool-plugin' ),
		'edit_item'             => __( 'Edit Template', 'lsicool-plugin' ),
		'update_item'           => __( 'Update  Template', 'lsicool-plugin' ),
		'view_item'             => __( 'View Footer Template', 'lsicool-plugin' ),
		'search_items'          => __( 'Search Footer Template', 'lsicool-plugin' ),
		'not_found'             => __( 'Not found', 'lsicool-plugin' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'lsicool-plugin' )
	);
	$args = array(
		'label'                 => __( 'Post List', 'lsicool-plugin' ),
		'labels'                => $labels,
		'supports'              => array( 'title','editor' ),
		'public'                => true,
		'rewrite'               => false,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'show_in_nav_menus'     => false,
		'exclude_from_search'   => true,
		'capability_type'       => 'post',
		'hierarchical'          => false,
		  'menu_icon' => 'dashicons-admin-post',
	
		'menu_position' => 60
	);
	register_post_type( 'footer', $args );
	add_post_type_support( 'footer', 'elementor' );
}
add_action( 'init', 'custom_footer_post_type' );


function sopotPLUGIN_P() {

	if ( ! isset( $GLOBALS['sopotPLUGIN_Plugin_p'] ) ) {
		$GLOBALS['sopotPLUGIN_Plugin'] = sopotPLUGIN_Plugin_Core::instance();
	}

	return $GLOBALS['sopotPLUGIN_Plugin'];
}

sopotPLUGIN_P();
if ( ! function_exists( 'sopot_set' ) ) {

	function sopot_set( $var, $key, $def = '' ) {
		/*if (!$var)
		return false;*/

		if ( is_object( $var ) && isset( $var->$key ) ) {
			return $var->$key;
		} elseif ( is_array( $var ) && isset( $var[ $key ] ) ) {
			return $var[ $key ];
		} elseif ( $def ) {
			return $def;
		} else {
			return false;
		}
	}

}

function sopot_encrypt( $param ) {
	return base64_encode( $param );
}


function sopot_decrypt( $param ) {
	return base64_decode( $param );
}

