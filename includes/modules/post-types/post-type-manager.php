<?php
//************************************************************************************************
// Section: 		Post Type Manager
// Description:		Module that handles the plugin's post types.
//************************************************************************************************

// Setup posttype path
define('SHRM_POSTTYPE_PATH', SHRM_PLUGIN_PATH . 'includes/modules/post-types/');



//************************************************************************************************
// Section: 		Cup of Joe Post Type
// Description:		Module that handles the custom post type 'cup-of-joe'
//************************************************************************************************

require_once(SHRM_POSTTYPE_PATH . 'cup-of-joe/init-handler.php');