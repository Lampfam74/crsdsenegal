<?php
return array(
	'title'      => esc_html__( 'Header Setting', 'sopot' ),
	'id'         => 'headers_setting',
	'desc'       => '',
	'subsection' => false,
	'fields'     => array(
		array(
			'id'      => 'header_source_type',
			'type'    => 'button_set',
			'title'   => esc_html__( 'Header Source Type', 'sopot' ),
			'options' => array(
				'd' => esc_html__( 'Default', 'sopot' ),
				'e' => esc_html__( 'Elementor', 'sopot' ),
			),
			'default' => 'd',
		),
		array(
			'id'       => 'header_elementor_template',
			'type'     => 'select',
			'title'    => __( 'Template', 'sopot' ),
			'data'     => 'posts',
			'args'     => [
				'post_type' => [ 'elementor_library' ],
				'posts_per_page'	=> -1
			],
			'required' => [ 'header_source_type', '=', 'e' ],
		),
		array(
			'id'       => 'header_style_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Header Settings', 'sopot' ),
			'required' => array( 'header_source_type', '=', 'd' ),
		),

		//Header Settings
		array(
		    'id'       => 'header_style_settings',
		    'type'     => 'image_select',
		    'title'    => esc_html__( 'Choose Header Styles', 'sopot' ),
		    'subtitle' => esc_html__( 'Choose Header Styles', 'sopot' ),
		    'options'  => array(
				'header_v1'  => array(
				    'alt' => esc_html__( 'Header Style 1', 'sopot' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/header/header-1.png',
			    ),
			    'header_v2'  => array(
				    'alt' => esc_html__( 'Header Style 2', 'sopot' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/header/header-2.png',
			    ),
			),
			'required' => array( 'header_source_type', '=', 'd' ),
			'default' => 'header_v1',
	    ),


		
		
		//Header Top
		array(
            'id' => 'show_topbar1',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Header Top', 'sopot'),
            'default' => false,
        ),

		array(
            'id' => 'show_sticky_header',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Sticky Header', 'sopot'),
            'default' => true,
        ),

		array(
            'id' => 'show_search1',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Search Icon', 'sopot'),
            'default' => false,
        ),

		
		/***********************************************************************
								Header Version 1 Start
		************************************************************************/
		array(
			'id'       => 'header_v1_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Header Style One Settings', 'sopot' ),
			'required' => array( 'header_style_settings', '=', 'header_v1' ),
		),

		array(
		    'id'       => 'phone_no',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Phone Number', 'sopot' ),
		    'desc'     => esc_html__( 'Enter The Phone Number', 'sopot' ),
	    ),
		array(
		    'id'       => 'phone_tel',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Phone Tel', 'sopot' ),
		    'desc'     => esc_html__( 'Enter The Phone Tel', 'sopot' ),
		),
		array(
		    'id'       => 'email',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Email', 'sopot' ),
		    'desc'     => esc_html__( 'Enter Your Email Address', 'sopot' ),
		),
		array(
		    'id'       => 'address',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Address', 'sopot' ),
		    'desc'     => esc_html__( 'Enter Your Address', 'sopot' ),
		),
		array(
		    'id'       => 'btn_title',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Button Title', 'sopot' ),
		    'desc'     => esc_html__( 'Enter The Button Title', 'sopot' ),
	    ),
		array(
		    'id'       => 'btn_link',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Button Link', 'sopot' ),
		    'desc'     => esc_html__( 'Enter The Button Link', 'sopot' ),
	    ),
		array(
		    'id'       => 'btn2_title',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Button Title', 'sopot' ),
		    'desc'     => esc_html__( 'Enter The Button Title', 'sopot' ),
	    ),
		array(
		    'id'       => 'btn2_link',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Button Link', 'sopot' ),
		    'desc'     => esc_html__( 'Enter The Button Link', 'sopot' ),
	    ),
		
		
		
		
		
		/***********************************************************************
								Header Version 2 Start
		************************************************************************/

		array(
			'id'       => 'header_v2_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Header Style Two Settings', 'sopot' ),
			'required' => array( 'header_style_settings', '=', 'header_v2' ),
		),
		array(
		    'id'       => 'btn_title2',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Button Title', 'sopot' ),
		    'desc'     => esc_html__( 'Enter The Button Title', 'sopot' ),
	    ),
		array(
		    'id'       => 'btn_link2',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Button Link', 'sopot' ),
		    'desc'     => esc_html__( 'Enter The Button Link', 'sopot' ),
	    ),
		

	),
);
