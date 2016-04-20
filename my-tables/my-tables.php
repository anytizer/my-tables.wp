<?php
/**
 * Plugin Name: My Tables
 * Plugin URI: http://bimal.org.np/
 * Description: Displays list of MySQL Tables and basic Status
 * Author: Bimal Poudel
 * Author URI: http://bimal.org.np/
 * Version: 1.0.0
 */

/**
 * Main page to display contents
 */
function my_tables_list_show()
{
	require_once(dirname(__FILE__).'/classes/class.my_tables_proecssor.inc.php');
	require_once(dirname(__FILE__).'/pages/help.php');
}

/**
 * Put a menu in bar
 */
add_action( 'admin_menu', 'my_tables_list');
function my_tables_list(){
	$icon = 'dashicons-info';
	add_menu_page('My Tables', 'My Tables', 'manage_options', 'my-tables/my-tables.php', 'my_tables_list_show', $icon, 80 );
	wp_enqueue_style('my-tables', plugins_url( 'pages/css/style.css', __FILE__));
}

/**
 * Adds a link within list of plugins
 */
$my_tables_self=basename(dirname(__FILE__)).'/'.basename(__FILE__);
add_filter("plugin_action_links_{$my_tables_self}", 'my_tables_settings_link');
function my_tables_settings_link($links) {
	global $my_tables_self;
	$actions = array(
		"<a href='?page={$my_tables_self}'>View Tables</a>",
	);
	$links = array_merge($actions, $links);
	return $links;
}
