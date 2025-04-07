<?php
return array(
	'title'      => 'Fundraisers Event Setting',
	'id'         => 'fundraisers_meta_event',
	'icon'       => 'el el-cogs',
	'position'   => 'normal',
	'priority'   => 'core',
	'post_types' => array( 'tribe_events' ),
	'sections'   => array(
		array(
			'id'     => 'fundraisers_event_meta_setting',
			'fields' => array(
				array(
					'id'    => 'event_ticket_price',
					'type'  => 'text',
					'title' => esc_html__( 'Enter Event Ticket Price', 'fundraisers' ),
				),
			),
		),
	),
);