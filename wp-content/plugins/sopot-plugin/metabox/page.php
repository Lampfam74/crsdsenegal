<?php
return array(
	'title'      => 'sopot Setting',
	'id'         => 'sopot_meta',
	'icon'       => 'el el-cogs',
	'position'   => 'normal',
	'priority'   => 'core',
	'post_types' => array( 'page', 'post', 'campaign', 'tribe_events' ),
	'sections'   => array(
		require_once sopotPLUGIN_PLUGIN_PATH . '/metabox/header.php',
		require_once sopotPLUGIN_PLUGIN_PATH . '/metabox/banner.php',
		require_once sopotPLUGIN_PLUGIN_PATH . '/metabox/sidebar.php',
		require_once sopotPLUGIN_PLUGIN_PATH . '/metabox/footer.php',
	),
);