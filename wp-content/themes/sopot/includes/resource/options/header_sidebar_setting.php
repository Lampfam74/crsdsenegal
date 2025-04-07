<?php
$styles = [];
foreach(range(1, 28) as $val) {
    $styles[$val] = sprintf(esc_html__('Style %s', 'sopot'), $val);
}

return  array(
    'title'      => esc_html__( 'Header Sidebar Setting', 'sopot' ),
    'id'         => 'header_sidebar_setting',
    'desc'       => '',
    'fields'     => array(
        array(
            'id' => 'show_side_menu_bar',
            'type' => 'switch',
            'title' => esc_html__('Enable Header Sidebar Info', 'sopot'),
            'default' => false,
        ),
		//Sidebar Title
		array(
            'id' => 'show_sidebar_title2_v1',
            'type' => 'switch',
            'title' => esc_html__('Enable Sidebar Title', 'sopot'),
            'default' => false,
			'required' => array( 'show_side_menu_bar', '=', true ),
        ),
		array(
			'id'      => 'sidebar_title2_v1',
			'type'    => 'text',
			'title'   => __( 'Title', 'sopot' ),
			'required' => array( 'show_sidebar_title2_v1', '=', true ),
		),
		//Sidebar Content
		array(
            'id' => 'show_sidebar_content2_v1',
            'type' => 'switch',
            'title' => esc_html__('Enable Sidebar Descripton', 'sopot'),
            'default' => false,
			'required' => array( 'show_side_menu_bar', '=', true ),
        ),
		array(
			'id'      => 'sidebar_content2_v1',
			'type'    => 'textarea',
			'title'   => __( 'Descripton', 'sopot' ),
			'required' => array( 'show_sidebar_content2_v1', '=', true ),
		),
		//Info Title
		array(
            'id' => 'show_header_info_v1',
            'type' => 'switch',
            'title' => esc_html__('Enable Sidebar Info Title', 'sopot'),
            'default' => false,
			'required' => array( 'show_side_menu_bar', '=', true ),
        ),
		array(
			'id'      => 'header_info_v1',
			'type'    => 'text',
			'title'   => __( 'Info Title', 'sopot' ),
			'required' => array( 'show_header_info_v1', '=', true ),
		),
		//Address
		array(
            'id' => 'show_header_address2_v1',
            'type' => 'switch',
            'title' => esc_html__('Enable Sidebar Address', 'sopot'),
            'default' => false,
			'required' => array( 'show_side_menu_bar', '=', true ),
        ),
		array(
			'id'      => 'header_address2_v1',
			'type'    => 'text',
			'title'   => __( 'Address', 'sopot' ),
			'required' => array( 'show_header_address2_v1', '=', true ),
		),
		//Email Address
		array(
            'id' => 'show_email2_address_v1',
            'type' => 'switch',
            'title' => esc_html__('Enable Sidebar Email Address', 'sopot'),
            'default' => false,
			'required' => array( 'show_side_menu_bar', '=', true ),
        ),
		array(
			'id'      => 'email_address2_v1',
			'type'    => 'text',
			'title'   => __( 'Email Address', 'sopot' ),
			'required' => array( 'show_email2_address_v1', '=', true ),
		),
		//Phone Number
		array(
            'id' => 'show_phone_no2_v1',
            'type' => 'switch',
            'title' => esc_html__('Enable Sidebar Phone Number', 'sopot'),
            'default' => false,
			'required' => array( 'show_side_menu_bar', '=', true ),
        ),
		array(
			'id'      => 'phone_number2_v1',
			'type'    => 'text',
			'title'   => __( 'Phone Number', 'sopot' ),
			'required' => array( 'show_phone_no2_v1', '=', true ),
		),
		// Form
		array(
            'id' => 'show_form',
            'type' => 'switch',
            'title' => esc_html__('Enable Sidebar Form', 'sopot'),
            'default' => false,
			'required' => array( 'show_side_menu_bar', '=', true ),
        ),
		array(
			'id'      => 'sidebar_form_title',
			'type'    => 'text',
			'title'   => __( 'Form Title', 'sopot' ),
			'required' => array( 'show_form', '=', true ),
		),
		array(
			'id'      => 'sidebar_form_url',
			'type'    => 'text',
			'title'   => __( 'Form Shortcode', 'sopot' ),
			'required' => array( 'show_form', '=', true ),
		),
		//social media
		array(
            'id' => 'show_sidebar_social_icons',
            'type' => 'switch',
            'title' => esc_html__('Enable Sidebar Social Icons', 'sopot'),
            'default' => false,
			'required' => array( 'show_side_menu_bar', '=', true ),
        ),
		array(
			'id'      => 'sidebar_social_icons',
			'type'    => 'textarea',
			'title'   => __( '', 'sopot' ),
			'required' => array( 'show_sidebar_social_icons', '=', true ),
		),
    ),
);

