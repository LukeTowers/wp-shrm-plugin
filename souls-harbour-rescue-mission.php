<?php
/*
Plugin Name: Souls Harbour Rescue Mission
Plugin URI: http://www.shrmsk.com/
Description: Custom plugin for Soul Harbour Rescue Mission's site
Version: 1.0.1
Author: Luke Towers
Author URI: https://luketowers.ca
Plugin Prefix: SHRM (Souls Harbour Rescue Mission)
*/

//************************************************************************************************
// Section: 		Plugin Setup
// Description:
//************************************************************************************************

// Setup plugin path
define('SHRM_PLUGIN_PATH', plugin_dir_path(__FILE__));

// Setup plugin url
define('SHRM_PLUGIN_URL', plugin_dir_url(__FILE__));

// Setup main plugin file path
define('SHRM_PLUGIN_FILE', __FILE__);



//************************************************************************************************
// Section: 		Post Type Manager
// Description:		Module that handles the plugin's post types.
//************************************************************************************************

require_once(SHRM_PLUGIN_PATH . 'includes/modules/post-types/post-type-manager.php');




// Disables GF file upload security .htaccess file. Maybe add to main plugin as a fusion only type of setting?
add_filter( 'gform_upload_root_htaccess_rules', '__return_false' );


// Disables XML-RPC functionality, we don't use it
add_filter('xmlrpc_enabled', '__return_false');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
