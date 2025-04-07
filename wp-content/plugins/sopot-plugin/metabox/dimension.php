<?php
	return array(
		'title'      => 'sopot post Setting',
		'id'         => 'sopot_post',
		'icon'       => 'el el-cogs',
		'position'   => 'normal',
		'priority'   => 'core',
		'post_types' => array( 'post' ),
		'sections'   => array(
			array(
				'fields' => array(
					array(
						'id'    => 'quote_description',
						'type'  => 'textarea',
						'title' => esc_html__('Quote Description', 'sopot'),
					),
				),
			),
		),
	);


?>