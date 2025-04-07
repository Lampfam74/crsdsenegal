<?php
$styles = [];
foreach(range(1, 28) as $val) {
    $styles[$val] = sprintf(esc_html__('Style %s', 'sopot'), $val);
}

return  array(
    'title'      => esc_html__( 'Mobile Header Setting', 'sopot' ),
    'id'         => 'mobile_header_setting',
    'desc'       => '',
    'fields'     => array(
        array(
            'id' => 'show_mobile_menu',
            'type' => 'switch',
            'title' => esc_html__('Enable Mobile Menu', 'sopot'),
            'default' => true,
        ),
		//Email Address
		array(
            'id' => 'show_mobile_email',
            'type' => 'switch',
            'title' => esc_html__('Enable Email Address', 'sopot'),
            'default' => true,
			'required' => array( 'show_mobile_menu', '=', true ),
        ),
		array(
			'id'      => 'mobile_email',
			'type'    => 'text',
			'title'   => __( 'Email Address', 'sopot' ),
			'required' => array( 'show_mobile_email', '=', true ),
		),
		//Phone Number
		array(
            'id' => 'show_mobile_phone',
            'type' => 'switch',
            'title' => esc_html__('Enable Phone Number', 'sopot'),
            'default' => true,
			'required' => array( 'show_mobile_menu', '=', true ),
        ),
		array(
			'id'      => 'mobile_phone_no',
			'type'    => 'text',
			'title'   => __( 'Phone', 'sopot' ),
			'required' => array( 'show_mobile_phone', '=', true ),
		),
		//social media
		array(
            'id' => 'show_mobile_social_icons',
            'type' => 'switch',
            'title' => esc_html__('Enable Social Icons', 'sopot'),
            'default' => true,
			'required' => array( 'show_mobile_menu', '=', true ),
        ),
		array(
			'id'      => 'mobile_social_icons',
			'type'    => 'textarea',
			'title'   => __( '', 'sopot' ),
			'required' => array( 'show_mobile_social_icons', '=', true ),
		),
    ),
);

