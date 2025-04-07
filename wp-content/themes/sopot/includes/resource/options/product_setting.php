<?php

return array(
	'title'      => esc_html__( 'Product Settings', 'sopot' ),
	'id'         => 'product_setting',
	'desc'       => '',
	'icon'       => '',
	'subsection' => true,
	'fields'     => array(
		array(
			'id'      => 'product_source_type',
			'type'    => 'button_set',
			'title'   => esc_html__( 'Product Source Type', 'sopot' ),
			'options' => array(
				'd' => esc_html__( 'Default', 'sopot' ),
				'e' => esc_html__( 'Elementor', 'sopot' ),
			),
			'default' => 'd',
		),
		array(
			'id'       => 'product_elementor_template',
			'type'     => 'select',
			'title'    => __( 'Template', 'sopot' ),
			'data'     => 'posts',
			'args'     => [
				'post_type' => [ 'elementor_library' ],
				'posts_per_page'=> -1,
			],
			'required' => [ 'product_source_type', '=', 'e' ],
		),

		array(
			'id'       => 'product_default_st',
			'type'     => 'section',
			'title'    => esc_html__( 'shop Default', 'sopot' ),
			'indent'   => true,
			'required' => [ 'product_source_type', '=', 'd' ],
		),
		array(
			'id'      => 'product_page_banner',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Banner', 'sopot' ),
			'desc'    => esc_html__( 'Enable to show banner on blog', 'sopot' ),
			'default' => true,
		),
		array(
			'id'       => 'product_banner_title',
			'type'     => 'text',
			'title'    => esc_html__( 'Banner Section Title', 'sopot' ),
			'desc'     => esc_html__( 'Enter the title to show in banner section', 'sopot' ),
			'required' => array( 'product_page_banner', '=', true ),
		),
	
		array(
			'id'       => 'product_page_background',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Background Image', 'sopot' ),
			'desc'     => esc_html__( 'Insert background image for banner', 'sopot' ),
			'default'  => array(
				'url' => sopot_URI . 'assets/images/pagetitle.jpg',
			),
			'required' => array( 'product_page_banner', '=', true ),
		),

		array(
			'id'       => 'product_sidebar_layout',
			'type'     => 'image_select',
			'title'    => esc_html__( 'Layout', 'sopot' ),
			'subtitle' => esc_html__( 'Select main content and sidebar alignment.', 'sopot' ),
			'options'  => array(

				'left'  => array(
					'alt' => esc_html__( '2 Column Left', 'sopot' ),
					'img' => get_template_directory_uri() . '/assets/images/redux/2cl.png',
				),
				'full'  => array(
					'alt' => esc_html__( '1 Column', 'sopot' ),
					'img' => get_template_directory_uri() . '/assets/images/redux/1col.png',
				),
				'right' => array(
					'alt' => esc_html__( '2 Column Right', 'sopot' ),
					'img' => get_template_directory_uri() . '/assets/images/redux/2cr.png',
				),
			),

			'default' => 'right',
		),

		array(
			'id'       => 'product_page_sidebar',
			'type'     => 'select',
			'title'    => esc_html__( 'Sidebar', 'sopot' ),
			'desc'     => esc_html__( 'Select sidebar to show at blog listing page', 'sopot' ),
			'required' => array(
				array( 'product_sidebar_layout', '=', array( 'left', 'right' ) ),
			),
			'options'  => sopot_get_sidebars(),
		),
	

		array(
			'id'       => 'product_default_ed',
			'type'     => 'section',
			'indent'   => false,
			'required' => [ 'product_source_type', '=', 'd' ],
		),
	),
);





