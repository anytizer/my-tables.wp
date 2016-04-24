<?php
/**
 * Plugin Name: My Tables
 * Plugin URI: http://bimal.org.np/
 * Description: Displays list of MySQL Tables and basic Status
 * Author: Bimal Poudel
 * Author URI: http://bimal.org.np/
 * Version: 1.0.0
 */

define('__MY_TABLES__', dirname(__FILE__));
require_once(__MY_TABLES__.'/classes/class.my_tables.inc.php');
require_once(__MY_TABLES__.'/classes/class.my_tables_processor.inc.php');

$whoami = basename(__MY_TABLES__).'/'.basename(__FILE__);
new my_tables($whoami);
