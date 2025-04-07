<?php

return array(
	'title'      => esc_html__( 'Footer Setting', 'sopot' ),
	'id'         => 'footer_setting',
	'desc'       => '',
	'subsection' => false,
	'fields'     => array(
		array(
			'id'      => 'footer_source_type',
			'type'    => 'button_set',
			'title'   => esc_html__( 'Footer Source Type', 'sopot' ),
			'options' => array(
				'd' => esc_html__( 'Default', 'sopot' ),
				'e' => esc_html__( 'Elementor', 'sopot' ),
			),
			'default' => 'd',
		),
		array(
			'id'       => 'footer_elementor_template',
			'type'     => 'select',
			'title'    => __( 'Template', 'sopot' ),
			'data'     => 'posts',
			'args'     => [
				'post_type' => [ 'footer' ],
				'posts_per_page'	=> -1
			],
			'required' => [ 'footer_source_type', '=', 'e' ],
		),

		//Copy Right Text
		array(
			'id'      => 'copyright_text',
			'type'    => 'textarea',
			'title'   => __( 'Copyright Text', 'sopot' ),
		),
		
				
		array(
			'id'       => 'footer_default_ed',
			'type'     => 'section',
			'indent'   => false,
			'required' => [ 'footer_source_type', '=', 'd' ],
		),
	),
);

