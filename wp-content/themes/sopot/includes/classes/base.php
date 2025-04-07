<?php

namespace sopot\Includes\Classes;

use sopot\Includes\Classes\Header_Enqueue;
use sopot\Includes\Classes\Options;

/**
 * Base class to handle theme initialization and configuration.
 */
class Base {

    public static $instance;

    /**
     * Set this value for theme options key
     *
     * @var string
     */
    private $option_key = 'sopot';

    /**
     * Protocol for the theme (http or https)
     *
     * @var string
     */
    private $protocol;

    /**
     * Constructor method to initialize the class.
     */
    function __construct() {
        // Initialization logic can go here
    }

    /**
     * Load default settings, enqueue header scripts/styles, and initialize options.
     */
    function loadDefaults() {
        // Set protocol based on whether the site is using SSL
        $this->protocol = ( is_ssl() ) ? 'https' : 'http';

        // Initialize Header_Enqueue and Options classes
        Header_Enqueue::init();
        ( new Options )->init();
    }

    /**
     * Singleton pattern to ensure a single instance of the class.
     *
     * @return Base
     */
    public static function instance() {
        // Return existing instance if already set
        if ( isset( $GLOBALS['sopot_base'] ) ) {
            return $GLOBALS['sopot_base'];
        }

        // Create new instance if not set
        if ( is_null( self::$instance ) ) {
            self::$instance = new self();
        }

        // Set the instance globally
        $GLOBALS['taon_base'] = self::$instance;

        return self::$instance;
    }

    /**
     * Return the theme options.
     *
     * @param  string $key The key for the option to retrieve.
     * @return mixed The value of the option.
     */
    function option( $key = '' ) {
        // Get theme options stored in the database
        $options = (array) get_theme_mod( 'sopot' . '_options-mods' );

        // Convert options array to DotNotation
        $dn = sopot_dot( $options );

        // If a key is provided, return the specific option value
        if ( $key ) {
            return $dn->get( $key );
        }

        // Otherwise, return all options
        return $dn;
    }

    /**
     * Get configuration settings.
     *
     * @param  string $name The name of the configuration setting to retrieve.
     * @return mixed The configuration value.
     */
    function config( $name = '' ) {
        // Load configuration from a PHP file
        $config = include get_template_directory() . '/includes/config.php';

        // Convert the configuration to DotNotation
        $dn = new DotNotation( $config );

        // Try to get the specified configuration value
        $found = $dn->get( $name );

        // Return the found configuration or the whole config
        if ( $found ) {
            return $found;
        }

        return $config;
    }

    /**
     * Get post meta for the current post.
     *
     * @param  string $key The key of the meta field.
     * @param  string $id  The post ID (optional).
     * @return mixed The meta value or false if not found.
     */
    function get_meta( $key = '', $id = '' ) {
        global $post, $post_type;

        // If no post type is set, return
        if ( ! $post_type ) {
            return;
        }

        // Use the current post ID if not provided
        $id = ( $id ) ? $id : sopot_set( $post, 'ID' );

        // Default key for post type settings
        $key = ( $key ) ? $key : '_sh_' . $post_type . '_settings';

        // Get the post meta value
        $meta = get_post_meta( $id, $key, true );

        // Return the meta value or false if not found
        return ( $meta ) ? $meta : false;
    }
}
