<?php
//************************************************************************************************
// Section: 		Post Type Manager
// Description:		Module that handles the plugin's post types.
//************************************************************************************************

// Setup posttype path
define('SHRM_POSTTYPE_PATH', SHRM_PLUGIN_PATH . 'includes/modules/post-types/');



//************************************************************************************************
// Section: 		SHRM Slide Post Type
// Description:		Module that handles the custom post type 'shrm-slide'
//************************************************************************************************

require_once(SHRM_POSTTYPE_PATH . 'shrm-slide/init-handler.php');



//************************************************************************************************
// Section: 		Cup of Joe Post Type
// Description:		Module that handles the custom post type 'cup-of-joe'
//************************************************************************************************

require_once(SHRM_POSTTYPE_PATH . 'cup-of-joe/init-handler.php');



//************************************************************************************************
// Section: 		Ways To Donate Post Type
// Description:		Module that handles the custom post type 'wtd'
//************************************************************************************************

require_once(SHRM_POSTTYPE_PATH . 'wtd/init-handler.php');



//************************************************************************************************
// Section: 		Media Item Post Type
// Description:		Module that handles the custom post type 'media-item'
//************************************************************************************************

require_once(SHRM_POSTTYPE_PATH . 'media-item/init-handler.php');



//************************************************************************************************
// Section: 		Success Stories Post Type
// Description:		Module that handles the custom post type 'success-story'
//************************************************************************************************

require_once(SHRM_POSTTYPE_PATH . 'success-story/init-handler.php');



//************************************************************************************************
// Section: 		Staff Post Type
// Description:		Module that handles the custom post type 'staff'
//************************************************************************************************

require_once(SHRM_POSTTYPE_PATH . 'staff/init-handler.php');