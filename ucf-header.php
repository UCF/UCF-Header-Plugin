<?php
/*
Plugin Name: UCF Header
Description: Adds the UCF header to all WP pages.
Version: 1.0.0
Author: UCF Web Communications
License: GPL3
*/

if ( ! defined( 'WPINC' ) ) {
	die;
}

add_action( 'plugins_loaded', function()
{

	define( 'UCF_HEADER__PLUGIN_DIR', __FILE__ );

	require_once 'includes/header_options.php';
	require_once 'includes/header_common.php';

	add_action( 'admin_menu', array( 'UCF_Header_Config', 'add_options_page' ) );
	add_action( 'wp_head', array( 'UCF_Header_Common', 'display_header') );

} );

?>
