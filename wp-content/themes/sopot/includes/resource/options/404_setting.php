<?php

return array(
	'title'      => esc_html__( '404 Page Settings', 'sopot' ),
	'id'         => '404_setting',
	'desc'       => '',
	'subsection' => true,
	'fields'     => array(
		array(
			'id'      => '404_source_type',
			'type'    => 'button_set',
			'title'   => esc_html__( '404 Source Type', 'sopot' ),
			'options' => array(
				'd' => esc_html__( 'Default', 'sopot' ),
				'e' => esc_html__( 'Elementor', 'sopot' ),
			),
			'default' => 'd',
		),
		array(
			'id'       => '404_elementor_template',
			'type'     => 'select',
			'title'    => __( 'Template', 'sopot' ),
			'data'     => 'posts',
			'args'     => [
				'post_type' => [ 'elementor_library' ],
			],
			'required' => [ '404_source_type', '=', 'e' ],
		),
		array(
			'id'       => '404_default_st',
			'type'     => 'section',
			'title'    => esc_html__( '404 Default', 'sopot' ),
			'indent'   => true,
			'required' => [ '404_source_type', '=', 'd' ],
		),
		array(
			'id'      => '404_page_banner',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Banner', 'sopot' ),
			'desc'    => esc_html__( 'Enable to show banner on blog', 'sopot' ),
			'default' => true,
		),
		array(
			'id'       => '404_banner_title',
			'type'     => 'text',
			'title'    => esc_html__( 'Banner Section Title', 'sopot' ),
			'desc'     => esc_html__( 'Enter the title to show in banner section', 'sopot' ),
			'required' => array( '404_page_banner', '=', true ),
		),
		array(
			'id'       => '404_page_background',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Background Image', 'sopot' ),
			'desc'     => esc_html__( 'Insert background image for banner', 'sopot' ),
			'default'  => array(
			    'url' => sopot_URI . 'assets/images/background/page-title.jpg',
		    ),
			'required' => array( '404_page_banner', '=', true ),
		),
		array(
			'id'    => '404_page_title',
			'type'  => 'text',
			'title' => esc_html__( 'Error Page Heading', 'sopot' ),
			'desc'  => esc_html__( 'Error Page Heading', 'sopot' ),
		),
		array(
			'id'    => '404_page_text',
			'type'  => 'textarea',
			'title' => esc_html__( '404 Page Description', 'sopot' ),
			'desc'  => esc_html__( '404 Page Description', 'sopot' ),
		),
		array(
			'id'    => 'back_home_btn',
			'type'  => 'switch',
			'title' => esc_html__( 'Show Button', 'sopot' ),
			'desc'  => esc_html__( 'Enable to show back to home button.', 'sopot' ),
			'default'  => true,
		),
		array(
			'id'       => 'back_home_btn_label',
			'type'     => 'text',
			'title'    => esc_html__( 'Button Label', 'sopot' ),
			'desc'     => esc_html__( 'Enter back to home button label that you want to show.', 'sopot' ),
			'default'  => esc_html__( 'Back To Home', 'sopot' ),
			'required' => array( 'back_home_btn', '=', true ),
		),
		array(
			'id'     => '404_post_settings_end',
			'type'   => 'section',
			'indent' => false,
		),
	),
);