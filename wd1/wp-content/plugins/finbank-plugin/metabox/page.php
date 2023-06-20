<?php
return array(
	'title'      => 'Finbank Setting',
	'id'         => 'finbank_meta',
	'icon'       => 'el el-cogs',
	'position'   => 'normal',
	'priority'   => 'core',
	'post_types' => array( 'page', 'post', 'team', 'project', 'service' ),
	'sections'   => array(
		require_once FINBANKPLUGIN_PLUGIN_PATH . '/metabox/header.php',
		require_once FINBANKPLUGIN_PLUGIN_PATH . '/metabox/banner.php',
		require_once FINBANKPLUGIN_PLUGIN_PATH . '/metabox/sidebar.php',
		require_once FINBANKPLUGIN_PLUGIN_PATH . '/metabox/footer.php',
	),
);