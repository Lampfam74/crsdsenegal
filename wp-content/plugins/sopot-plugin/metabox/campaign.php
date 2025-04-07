<?php
return array(
	'title'      => 'Fundraisers Campaign Setting',
	'id'         => 'fundraisers_meta_campaign',
	'icon'       => 'el el-cogs',
	'position'   => 'normal',
	'priority'   => 'core',
	'post_types' => array( 'campaign' ),
	'sections'   => array(
		array(
			'id'     => 'fundraisers_campaign_meta_setting',
			'fields' => array(
				array(
					'id'    => 'supporters',
					'type'  => 'text',
					'title' => esc_html__( 'Number Of Supporters', 'fundraisers' ),
				),
				array(
					'id'    => 'days',
					'type'  => 'text',
					'title' => esc_html__( 'Number Of Days', 'fundraisers' ),
				),
			),
		),
	),
);