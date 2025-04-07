<?php

require_once get_template_directory() . '/includes/loader.php';

add_action( 'after_setup_theme', 'sopot_setup_theme' );
add_action( 'after_setup_theme', 'sopot_load_default_hooks' );


function sopot_setup_theme() {

	load_theme_textdomain( 'sopot', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-header' );
	add_theme_support( 'custom-background' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'editor-styles' );
    
	// Set the default content width.
	$GLOBALS['content_width'] = 525;
	
	/*---------- Register image sizes ----------*/
	
	//Register image sizes
	add_image_size( 'sopot_268x199', 268, 199, true ); //sopot_268x199 Events
	add_image_size( 'sopot_570x355', 570, 355, true ); //sopot_570x355 Latest News V2
	add_image_size( 'sopot_270x161', 270, 161, true ); //sopot_270x161 Latest News V2
	add_image_size( 'sopot_770x415', 770, 415, true ); //sopot_770x415 Archive Page
	add_image_size( 'sopot_1170x415', 1170, 415, true ); //sopot_1170x415 Blog Detail Page
	
	/*---------- Register image sizes ends ----------*/
	
	
	
	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'main_menu' => esc_html__( 'Main Menu', 'sopot' ),
		'onepage_menu' => esc_html__( 'OnePage Menu', 'sopot' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'      => 250,
		'height'     => 250,
		'flex-width' => true,
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, and column width.
 	 */
	add_editor_style();
	add_action( 'admin_init', 'sopot_admin_init', 2000000 );
}

/**
 * [sopot_admin_init]
 *
 * @param  array $data [description]
 *
 * @return [type]       [description]
 */


function sopot_admin_init() {
	remove_action( 'admin_notices', array( 'ReduxFramework', '_admin_notices' ), 99 );
}

// Register custom block styles
function sopot_register_block_styles() {
    // Register custom styles for blocks
    register_block_style(
        'core/paragraph', 
        array(
            'name'  => 'custom-paragraph-style',
            'label' => 'Custom Paragraph Style',
        )
    );
    
    // Add more block styles for other blocks as needed
}

add_action( 'init', 'sopot_register_block_styles' );

// Register custom block patterns
function sopot_register_block_patterns() {
    register_block_pattern(
        'sopot/custom-pattern', 
        array(
            'title'       => 'Custom Pattern',
            'description' => 'A custom pattern to help with layouts',
            'content'     => '<!-- wp:paragraph --><p>Your custom content here...</p><!-- /wp:paragraph -->',
        )
    );
}

add_action( 'init', 'sopot_register_block_patterns' );

// Add support for responsive embeds
function sopot_theme_supports() {
    // Enable responsive embeds
    add_theme_support( 'responsive-embeds' );
}

add_action( 'after_setup_theme', 'sopot_theme_supports' );


/*---------- Sidebar settings ----------*/

/**
 * [sopot_widgets_init]
 *
 * @param  array $data [description]
 *
 * @return [type]       [description]
 */
function sopot_widgets_init() {

	global $wp_registered_sidebars;

	$theme_options = get_theme_mod( 'sopot' . '_options-mods' );
	register_sidebar( array(
		'name'          => esc_html__( 'Default Sidebar', 'sopot' ),
		'id'            => 'default-sidebar',
		'description'   => esc_html__( 'Widgets in this area will be shown on the right-hand side.', 'sopot' ),
		'before_widget' => '<div id="%1$s" class="widget sidebar-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="sidebar__title"><h3>',
		'after_title'   => '</h3></div>',
	) );
	if ( class_exists( '\Elementor\Plugin' )){
	register_sidebar(array(
	  'name' => esc_html__( 'Blog Listing', 'sopot' ),
	  'id' => 'blog-sidebar',
	  'description' => esc_html__( 'Widgets in this area will be shown on the right-hand side.', 'sopot' ),
	  'before_widget'=>'<div id="%1$s" class="widget sidebar-widget %2$s">',
	  'after_widget'=>'</div>',
	  'before_title' => '<div class="sidebar__title"><h3>',
	  'after_title' => '</h3></div>'
	));
	}
	if ( class_exists( '\Elementor\Plugin' )){
		register_sidebar(array(
		  'name' => esc_html__( 'Event', 'sopot' ),
		  'id' => 'event-sidebar',
		  'description' => esc_html__( 'Widgets in this area will be shown on the right-hand side.', 'sopot' ),
		  'before_widget'=>'<div id="%1$s" class="widget sidebar-widget %2$s">',
		  'after_widget'=>'</div>',
		  'before_title' => '<div class="sidebar__title"><h3>',
		  'after_title' => '</h3></div>'
		));
	}
	if ( class_exists( '\Elementor\Plugin' )){
		register_sidebar(array(
			'name' => esc_html__( 'Campaign', 'sopot' ),
			'id' => 'campaign-sidebar',
			'description' => esc_html__( 'Widgets in this area will be shown on the right-hand side.', 'sopot' ),
			'before_widget'=>'<div id="%1$s" class="widget sidebar-widget %2$s">',
			'after_widget'=>'</div>',
			'before_title' => '<div class="sidebar__title"><h3>',
			'after_title' => '</h3></div>'
		));
	}
	if ( ! is_object( sopot_WSH() ) ) {
		return;
	}

	$sidebars = sopot_set( $theme_options, 'custom_sidebar_name' );

	foreach ( array_filter( (array) $sidebars ) as $sidebar ) {

		if ( sopot_set( $sidebar, 'topcopy' ) ) {
			continue;
		}

		$name = $sidebar;
		if ( ! $name ) {
			continue;
		}
		$slug = str_replace( ' ', '_', $name );

		register_sidebar( array(
			'name'          => $name,
			'id'            => sanitize_title( $slug ),
			'before_widget' => '<div id="%1$s" class="%2$s widget sidebar-widget">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget-title"><h2>',
			'after_title'   => '</h2></div>',
		));
	}

	update_option( 'wp_registered_sidebars', $wp_registered_sidebars );
}

add_action( 'widgets_init', 'sopot_widgets_init' );

/*---------- Sidebar settings ends ----------*/

/*---------- Gutenberg settings ----------*/

function sopot_gutenberg_editor_palette_styles() {
    add_theme_support( 'editor-color-palette', array(
        array(
            'name' => esc_html__( 'strong yellow', 'sopot' ),
            'slug' => 'strong-yellow',
            'color' => '#f7bd00',
        ),
        array(
            'name' => esc_html__( 'strong white', 'sopot' ),
            'slug' => 'strong-white',
            'color' => '#fff',
        ),
		array(
            'name' => esc_html__( 'light black', 'sopot' ),
            'slug' => 'light-black',
            'color' => '#242424',
        ),
        array(
            'name' => esc_html__( 'very light gray', 'sopot' ),
            'slug' => 'very-light-gray',
            'color' => '#797979',
        ),
        array(
            'name' => esc_html__( 'very dark black', 'sopot' ),
            'slug' => 'very-dark-black',
            'color' => '#000000',
        ),
    ) );
	
	add_theme_support( 'editor-font-sizes', array(
		array(
			'name' => esc_html__( 'Small', 'sopot' ),
			'size' => 10,
			'slug' => 'small'
		),
		array(
			'name' => esc_html__( 'Normal', 'sopot' ),
			'size' => 15,
			'slug' => 'normal'
		),
		array(
			'name' => esc_html__( 'Large', 'sopot' ),
			'size' => 24,
			'slug' => 'large'
		),
		array(
			'name' => esc_html__( 'Huge', 'sopot' ),
			'size' => 36,
			'slug' => 'huge'
		)
	) );
	
}
add_action( 'after_setup_theme', 'sopot_gutenberg_editor_palette_styles' );

/*---------- Gutenberg settings ends ----------*/

/*---------- Enqueue Styles and Scripts ----------*/

function sopot_enqueue_scripts() {
	$options = sopot_WSH()->option();
	
    //styles


	wp_enqueue_style( 'animate-min', get_template_directory_uri() . '/assets/vendors/animate/animate.min.css' );
    wp_enqueue_style( 'custom-animate', get_template_directory_uri() . '/assets/vendors/animate/custom-animate.css' );
    wp_enqueue_style( 'bootstrap-min', get_template_directory_uri() . '/assets/vendors/bootstrap/css/bootstrap.min.css' );
    wp_enqueue_style( 'bootstrap-select-min', get_template_directory_uri() . '/assets/vendors/bootstrap-select/css/bootstrap-select.min.css' );
    wp_enqueue_style( 'bxslider-css', get_template_directory_uri() . '/assets/vendors/bxslider/jquery.bxslider.css' );
    wp_enqueue_style( 'fontawesome-all-min', get_template_directory_uri() . '/assets/vendors/fontawesome/css/all.min.css' );
    wp_enqueue_style( 'magnific-popup-css', get_template_directory_uri() . '/assets/vendors/jquery-magnific-popup/jquery.magnific-popup.css' );
    wp_enqueue_style( 'nice-select-css', get_template_directory_uri() . '/assets/vendors/nice-select/nice-select.css' );
    wp_enqueue_style( 'odometer-min', get_template_directory_uri() . '/assets/vendors/odometer/odometer.min.css' );
    wp_enqueue_style( 'owl-carousel-min', get_template_directory_uri() . '/assets/vendors/owl-carousel/owl.carousel.min.css' );
    wp_enqueue_style( 'owl-carousel-theme-default-min', get_template_directory_uri() . '/assets/vendors/owl-carousel/owl.theme.default.min.css' );
    wp_enqueue_style( 'swiper-min', get_template_directory_uri() . '/assets/vendors/swiper/swiper.min.css' );
    wp_enqueue_style( 'timepicker-css', get_template_directory_uri() . '/assets/vendors/timepicker/timePicker.css' );
    wp_enqueue_style( 'tiny-slider-min', get_template_directory_uri() . '/assets/vendors/tiny-slider/tiny-slider.min.css' );
    wp_enqueue_style( 'vegas-min', get_template_directory_uri() . '/assets/vendors/vegas/vegas.min.css' );
    wp_enqueue_style( 'thm-icons-css', get_template_directory_uri() . '/assets/vendors/thm-icons/style.css' );
    wp_enqueue_style( 'slick-css', get_template_directory_uri() . '/assets/vendors/slick-slider/slick.css' );
    wp_enqueue_style( 'reey-font-css', get_template_directory_uri() . '/assets/vendors/reey-font/stylesheet.css' );

	wp_enqueue_style( 'sopot-main', get_stylesheet_uri() );
	// core
	wp_enqueue_style( 'sopot-main-style', get_template_directory_uri() .'/assets/css/style.css', array(), time() );
	wp_enqueue_style( 'sopot-responsive', get_template_directory_uri() .'/assets/css/responsive.css' );


	
    //scripts
	wp_enqueue_script( 'jquery-ui-core');

	wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/vendors/bootstrap/js/bootstrap.bundle.min.js', array('jquery'), '1.0', true);
	wp_enqueue_script('bootstrap-select', get_template_directory_uri() . '/assets/vendors/bootstrap-select/js/bootstrap-select.min.js', array('jquery'), '1.0', true);
	wp_enqueue_script('bxslider', get_template_directory_uri() . '/assets/vendors/bxslider/jquery.bxslider.min.js', array('jquery'), '1.0', true);
	wp_enqueue_script('circleType', get_template_directory_uri() . '/assets/vendors/circleType/jquery.circleType.js', array('jquery'), '1.0', true);
	wp_enqueue_script('lettering', get_template_directory_uri() . '/assets/vendors/circleType/jquery.lettering.min.js', array('jquery'), '1.0', true);
	wp_enqueue_script('isotope', get_template_directory_uri() . '/assets/vendors/isotope/isotope.js', array('jquery'), '1.0', true);
	wp_enqueue_script('appear', get_template_directory_uri() . '/assets/vendors/jquery-appear/jquery.appear.min.js', array('jquery'), '1.0', true);
	wp_enqueue_script('magnific-popup', get_template_directory_uri() . '/assets/vendors/jquery-magnific-popup/jquery.magnific-popup.min.js', array('jquery'), '1.0', true);
	wp_enqueue_script('nice-select', get_template_directory_uri() . '/assets/vendors/nice-select/jquery.nice-select.min.js', array('jquery'), '1.0', true);
	wp_enqueue_script('odometer', get_template_directory_uri() . '/assets/vendors/odometer/odometer.min.js', array('jquery'), '1.0', true);
	wp_enqueue_script('owl-carousel', get_template_directory_uri() . '/assets/vendors/owl-carousel/owl.carousel.min.js', array('jquery'), '1.0', true);
	wp_enqueue_script('parallax', get_template_directory_uri() . '/assets/vendors/parallax/parallax.min.js', array('jquery'), '1.0', true);
	wp_enqueue_script('swiper', get_template_directory_uri() . '/assets/vendors/swiper/swiper.min.js', array('jquery'), '1.0', true);
	wp_enqueue_script('timePicker', get_template_directory_uri() . '/assets/vendors/timepicker/timePicker.js', array('jquery'), '1.0', true);
	wp_enqueue_script( 'tiny-slider', get_template_directory_uri() . '/assets/vendors/tiny-slider/tiny-slider.min.js', array('jquery'), '1.0', true );
    wp_enqueue_script( 'typed', get_template_directory_uri() . '/assets/vendors/typed-2.0.11/typed-2.0.11.js', array('jquery'), '1.0', true );
    wp_enqueue_script( 'vegas', get_template_directory_uri() . '/assets/vendors/vegas/vegas.min.js', array('jquery'), '1.0', true );
    wp_enqueue_script( 'wNumb', get_template_directory_uri() . '/assets/vendors/wnumb/wNumb.min.js', array('jquery'), '1.0', true );
    wp_enqueue_script( 'wow', get_template_directory_uri() . '/assets/vendors/wow/wow.js', array('jquery'), '1.0', true );
    wp_enqueue_script( 'sidebarcontent', get_template_directory_uri() . '/assets/vendors/sidebar-content/jquery-sidebar-content.js', array('jquery'), '1.0', true );
    wp_enqueue_script( 'jarallax', get_template_directory_uri() . '/assets/vendors/jarallax/jarallax.min.js', array('jquery'), '1.0', true );
    wp_enqueue_script( 'slick-slider', get_template_directory_uri() . '/assets/vendors/slick-slider/slick.js', array('jquery'), '1.0', true );
    wp_enqueue_script( 'circle-progress', get_template_directory_uri() . '/assets/vendors/jquery-circle-progress/jquery.circle-progress.min.js', array('jquery'), '1.0', true );
    wp_enqueue_script( 'progressbar', get_template_directory_uri() . '/assets/vendors/progress-bar/knob.js', array('jquery'), '1.0', true );
    wp_enqueue_script( 'countdown', get_template_directory_uri() . '/assets/vendors/countdown/countdown.min.js', array('jquery'), '1.0', true );



	wp_enqueue_script( 'sopot-main-script', get_template_directory_uri().'/assets/js/custom.js', array(), false, true );
	if( is_singular() ) wp_enqueue_script('comment-reply');
}
add_action( 'wp_enqueue_scripts', 'sopot_enqueue_scripts' );



if (class_exists('Redux')) {
	function add_inline_styles() {
		$options = sopot_WSH()->option();
		$sopot_inline_style = ':root {
			--sopot-base: ' .  $options->get( 'theme_main_color' ) . ';
			--sopot-black: ' .  $options->get( 'theme_main_color2' ) . ';
		}';
		wp_add_inline_style( 'sopot-main-style', $sopot_inline_style );
	}
	add_action( 'wp_enqueue_scripts', 'add_inline_styles' );
}

/*---------- Enqueue styles and scripts ends ----------*/

/*---------- Google fonts ----------*/

function sopot_fonts_url() {
	
	$fonts_url = '';
									
		$font_families['Fira Sans']   = 'Fira Sans:wght@300,400,500,600,700,800,900';
		$font_families['Rubik']  		= 'Rubik:wght@300,400,500,600,700,800,900';


		$font_families = apply_filters( 'sopot/includes/classes/header_enqueue/font_families', $font_families );

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$protocol  = is_ssl() ? 'https' : 'http';
		$fonts_url = add_query_arg( $query_args, $protocol . '://fonts.googleapis.com/css' );

		return esc_url_raw($fonts_url);

}

function sopot_theme_styles() {
    wp_enqueue_style( 'sopot-theme-fonts', sopot_fonts_url(), array(), null );
}

add_action( 'wp_enqueue_scripts', 'sopot_theme_styles' );
add_action( 'admin_enqueue_scripts', 'sopot_theme_styles' );

/*---------- Google fonts ends ----------*/

/*---------- More functions ----------*/

// 1) sopot_set function

/**
 * [sopot_set description]
 *
 * @param  array $data [description]
 *
 * @return [type]       [description]
 */
if ( ! function_exists( 'sopot_set' ) ) {
	function sopot_set( $var, $key, $def = '' ) {

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

// 2) sopot_add_editor_styles function

function sopot_add_editor_styles() {
    add_editor_style( 'editor-style.css' );
}
add_action( 'admin_init', 'sopot_add_editor_styles' );

// 3) Add specific CSS class by filter body class.

$options = sopot_WSH()->option(); 
if( sopot_set($options, 'boxed_wrapper') ){

add_filter( 'body_class', function( $classes ) {
    $classes[] = 'boxed_wrapper';
    return $classes;
} );
}

add_filter('doing_it_wrong_trigger_error', function () {return false;}, 10, 0);











