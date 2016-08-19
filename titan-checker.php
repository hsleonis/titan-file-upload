<?php

require_once( TFU_PATH . 'lib/class-tgm-plugin-activation.php');

add_action( 'tgmpa_register', 'tfu_register_required_plugins' );
function tfu_register_required_plugins() {
	$plugins = array(
		array(
			'name'      => 'Titan Framework',
			'slug'      => 'titan-framework',
			'required'  => true,
		)
	);

	$config = array(
		'id'           => 'TFU_I18NDOMAIN',
		'default_path' => '',
		'menu'         => 'tfu-install-plugins',
		'parent_slug'  => 'plugins.php',
		'capability'   => 'manage_options',
		'has_notices'  => true,
		'dismissable'  => false,
		'dismiss_msg'  => '',
		'is_automatic' => false,
		'message'      => 'Titan File Upload extension requires Titan Framework.',
		'strings'      => array(
			'page_title' => __( 'TFU Required Plugins', 'TFU_I18NDOMAIN' ),
			'menu_title' => __( 'Install Plugins', 'TFU_I18NDOMAIN' ),
		)
	);

	tgmpa( $plugins, $config );
}
