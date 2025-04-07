<?php
return array(
	'title'      => 'sopot Project Setting',
	'id'         => 'sopot_meta_projects',
	'icon'       => 'el el-cogs',
	'position'   => 'normal',
	'priority'   => 'core',
	'post_types' => array( 'project' ),
	'sections'   => array(
		array(
			'id'     => 'sopot_projects_meta_setting',
			'fields' => array(
				array(
					'id'    => 'project_designation',
					'type'  => 'text',
					'title' => esc_html__( 'Designation', 'sopot' ),
				),
				array(
					'id'    => 'project_link',
					'type'  => 'text',
					'title' => esc_html__( 'Enter Link', 'sopot' ),
				),
			),
		),
	),
);