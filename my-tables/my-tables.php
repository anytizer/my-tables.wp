<?php
/**
 * Plugin Name: My Tables
 * Plugin URI: http://bimal.org.np/
 * Description: Displays MySQL Tables Status
 * Author: Bimal Poudel
 * Author URI: http://bimal.org.np/
 * Version: 1.0.0
 */

function my_tables_list_show()
{
	require_once(dirname(__FILE__).'/classes/class.my_tables_proecssor.inc.php');
	require_once(dirname(__FILE__).'/pages/help.php');
}

add_action( 'admin_menu', 'my_tables_list');
function my_tables_list(){
	$icon = 'dashicons-info';
	add_menu_page('My Tables', 'My Tables', 'manage_options', 'my-tables/my-tables.php', 'my_tables_list_show', $icon, 80 );
	wp_enqueue_style('my-tables', plugins_url( 'pages/css/style.css', __FILE__));
}
