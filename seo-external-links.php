<?php
/*
* Plugin Name: SEO External Links
* Plugin URI: http://andrewgunn.xyz/seo-external-links
* Description: Super lightweight solution to changing all external links and internal PDF attachments to open in a new tab.
* Version: 1.2
* Author: Andrew Gunn
* Author URI: http://andrewgunn.xyz
* Text Domain: seo-external-links
* License: GPL2
*/
defined( 'ABSPATH' ) or die( 'Plugin file cannot be accessed directly.' );
define( 'SEO_EXTERNAL_LINKS_PLUGINBASENAME', plugin_basename(__FILE__) );
define( 'SEO_EXTERNAL_LINKS_PLUGINFILE', basename(__FILE__) );

/**
* Include js/php combo file
*/
include_once('script-styles.php');

/**
* Adding links to plugin Settings on plugins list view
*/
add_filter( 'plugin_action_links', 'seo_external_links_plugin_links', 10, 5 );

function seo_external_links_plugin_links( $actions, $plugin_file )
{
	static $plugin;

	if (!isset($plugin))
		$plugin = plugin_basename(__FILE__);

		if ($plugin == $plugin_file) {

			$settings = array(
				'Details' => '<a target="_blank" href="http://andrewgunn.xyz">' . __('Details', 'General') . '</a>'
				);

    		$actions = array_merge($settings, $actions);
		}

		return $actions;
}
