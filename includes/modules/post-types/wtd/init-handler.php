<?php
//************************************************************************************************
// Section: 		Ways to Donate Post Type - Initilization Handler
// Description:		Module that handles the initilization of the wtd custom post type
//					and its components
//************************************************************************************************

// Create the success-story post type on wordpress initialization
add_action('init', 'create_wtd_post_type');
function create_wtd_post_type() {
	register_post_type( 'wtd',
		array(
			'labels' => array(
				'name' 					=> 'Ways To Donate',
				'singular_name' 		=> 'Way To Donate',
			    'add_new'				=> 'Add New',
			    'add_new_item'			=> 'Add New Way To Donate',
			    'edit_item'				=> 'Edit Way To Donate',
			    'new_item'				=> 'New Way To Donate',
			    'all_items'				=> 'All Ways To Donate',
			    'view_item'				=> 'View Way To Donate',
			    'search_items'			=> 'Search Ways To Donate',
			    'not_found'				=> 'No Ways To Donate found',
			    'not_found_in_trash'	=> 'No Ways To Donate found in Trash',
			    'parent_item_colon'		=> '',
			    'menu_name'				=> 'WTD'
			),
			'public' => true,
			'exclude_from_search'	=> false,
			'show_ui' => true,
			'has_archive' => true,
			'menu_icon' => 'dashicons-heart',
			'description' => 'Manage Ways to Donate',
			'supports'	=> array('title', 'editor', 'thumbnail', 'revisions'),
			'rewrite'	=> array('slug'=>'get-involved/donate/ways-to-donate'),
		)
	);
}