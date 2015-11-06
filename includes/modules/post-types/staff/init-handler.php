<?php
//************************************************************************************************
// Section: 		Staff Post Type - Initilization Handler
// Description:		Module that handles the initilization of the staff custom post type
//					and its components
//************************************************************************************************

// Create the success-story post type on wordpress initialization
add_action( 'init', 'create_staff_post_type' );
function create_staff_post_type() {
	register_post_type( 'staff',
		array(
			'labels' => array(
				'name' 					=> 'Staff',
				'singular_name' 		=> 'Staff',
			    'add_new'				=> 'Add New',
			    'add_new_item'			=> 'Add New Staff Member',
			    'edit_item'				=> 'Edit Staff Member',
			    'new_item'				=> 'New Staff Member',
			    'all_items'				=> 'All Staff',
			    'view_item'				=> 'View Staff Member',
			    'search_items'			=> 'Search Staff',
			    'not_found'				=> 'No Staff found',
			    'not_found_in_trash'	=> 'No Staff found in Trash',
			    'parent_item_colon'		=> '',
			    'menu_name'				=> 'Staff'
			),
			'public' => true,
			'exclude_from_search'	=> false,
			'show_ui' => true,
			'has_archive' => true,
			'menu_icon' => 'dashicons-groups',
			'description' => 'Manage Staff',
			'supports'	=> array('title', 'editor', 'thumbnail', 'revisions', 'page-attributes'),
		)
	);
}