<?php

return array(
	'title'      => esc_html__( 'Single Post Settings', 'sopot' ),
	'id'         => 'single_post_setting',
	'desc'       => '',
	'subsection' => true,
	'fields'     => array(
		array(
			'id'      => 'single_source_type',
			'type'    => 'button_set',
			'title'   => esc_html__( 'Single Post Source Type', 'sopot' ),
			'options' => array(
				'd' => esc_html__( 'Default', 'sopot' ),
				'e' => esc_html__( 'Elementor', 'sopot' ),
			),
			'default' => 'd',
		),
		
		array(
			'id'       => 'single_default_st',
			'type'     => 'section',
			'title'    => esc_html__( 'Post Default', 'sopot' ),
			'indent'   => true,
			'required' => [ 'single_source_type', '=', 'd' ],
		),
		array(
			'id'      => 'single_post_date',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Date', 'sopot' ),
			'desc'    => esc_html__( 'Enable to show post publish date on posts detail page', 'sopot' ),
			'default' => true,
		),
		array(
			'id'      => 'single_post_author',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Author', 'sopot' ),
			'desc'    => esc_html__( 'Enable to show author on posts detail page', 'sopot' ),
			'default' => true,
		),
		array(
			'id'      => 'single_post_comments',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Comments', 'sopot' ),
			'desc'    => esc_html__( 'Enable to show number of comments on posts single page', 'sopot' ),
			'default' => true,
		),
		array(
			'id'      => 'single_post_tag',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Tags', 'sopot' ),
			'desc'    => esc_html__( 'Enable to show post tags on posts single page', 'sopot' ),
			'default' => true,
		),
		array(
			'id'      => 'single_social_share',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Social Share', 'sopot' ),
			'desc'    => esc_html__( 'Enable to show post share', 'sopot' ),
			'default' => true,
		),
		array(
			'id'      => 'facebook_sharing',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Facebook Post Share', 'sopot' ),
			'desc'    => esc_html__( 'Enable to show Post Share to Facebook', 'sopot' ),
			'default' => false,
		),
		array(
			'id'      => 'twitter_sharing',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Twitter Post Share', 'sopot' ),
			'desc'    => esc_html__( 'Enable to show Post Share to Twitter', 'sopot' ),
			'default' => false,
		),
		array(
			'id'      => 'linkedin_sharing',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Linkedin Post Share', 'sopot' ),
			'desc'    => esc_html__( 'Enable to show Post Share to Linkedin', 'sopot' ),
			'default' => false,
		),
		array(
			'id'      => 'pinterest_sharing',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Pinterest Post Share', 'sopot' ),
			'desc'    => esc_html__( 'Enable to show Post Share to Pinterest', 'sopot' ),
			'default' => false,
		),
		array(
			'id'      => 'reddit_sharing',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Reddit Post Share', 'sopot' ),
			'desc'    => esc_html__( 'Enable to show Post Share to Reddit', 'sopot' ),
			'default' => false,
		),
		array(
			'id'      => 'tumblr_sharing',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Tumblr Post Share', 'sopot' ),
			'desc'    => esc_html__( 'Enable to show Post Share to Tumblr', 'sopot' ),
			'default' => false,
		),
		array(
			'id'      => 'digg_sharing',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Digg Post Share', 'sopot' ),
			'desc'    => esc_html__( 'Enable to show Post Share to Digg', 'sopot' ),
			'default' => false,
		),
		array(
			'id'      => 'single_post_author_box',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Author Box', 'sopot' ),
			'desc'    => esc_html__( 'Enable to show author box on post detail page.', 'sopot' ),
			'default' => false,
		),
		array(
			'id'       => 'single_section_default_ed',
			'type'     => 'section',
			'indent'   => false,
			'required' => [ 'single_source_type', '=', 'd' ],
		),
	),
);





