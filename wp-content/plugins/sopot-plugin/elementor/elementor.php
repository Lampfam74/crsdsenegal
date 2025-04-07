<?php

namespace sopotPLUGIN\Element;


class Elementor {
	static $widgets = array(
		'about',
		'about_v2',
		'about_icon',
		'brand',
		'banner_v1',
		'banner_v2',
		'banner_v3',
		'blog',
		'cta',
		'cta_v2',
		'contact',
		'contact_info',
		'gallery',
		'skill',
		'social_links',
		'team',
		'team_icon',
		'team_contact',
		'help',
		'comming_up',
		'faq',
		'feature',
		'feature_v2',
		'funfact',
		'footer_list',
		'project',
		'project_info',
		'project_video',
		'video',
		'testimonial',
		'testimonial_single',
		'testimonial_v2',
		'causes',
		'events',
	);

	static function init() {
		add_action( 'elementor/init', array( __CLASS__, 'loader' ) );
		add_action( 'elementor/elements/categories_registered', array( __CLASS__, 'register_cats' ) );
	}

	static function loader() {

		foreach ( self::$widgets as $widget ) {

			$file = sopotPLUGIN_PLUGIN_PATH . '/elementor/' . $widget . '.php';
			if ( file_exists( $file ) ) {
				require_once $file;
			}

			add_action( 'elementor/widgets/register', array( __CLASS__, 'register' ) );
		}
	}

	static function register( $elemntor ) {
		foreach ( self::$widgets as $widget ) {
			$class = '\\sopotPLUGIN\\Element\\' . ucwords( $widget );

			if ( class_exists( $class ) ) {
				$elemntor->register( new $class );
			}
		}
	}

	static function register_cats( $elements_manager ) {

		$elements_manager->add_category(
			'sopot',
			[
				'title' => esc_html__( 'sopot', 'sopot' ),
				'icon'  => 'fa fa-plug',
			]
		);

	}
}

Elementor::init();