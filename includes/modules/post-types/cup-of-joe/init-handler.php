<?php
//************************************************************************************************
// Section: 		Cup of Joe Post Type - Initilization Handler
// Description:		Module that handles the initilization of the cup-of-joe custom post type
//					and its components
//************************************************************************************************

// Create the cup-of-joe post type on wordpress initialization
add_action( 'init', 'create_cup_of_joe_post_type' );
function create_cup_of_joe_post_type() {
	register_post_type( 'cup-of-joe',
		array(
			'labels' => array(
				'name' 					=> 'Cup of Joe',
				'singular_name' 		=> 'Cup of Joe',
			    'add_new'				=> 'Add New',
			    'add_new_item'			=> 'Add New Cup of Joe',
			    'edit_item'				=> 'Edit Cup of Joe',
			    'new_item'				=> 'New Cup of Joe',
			    'all_items'				=> 'All Cups of Joe',
			    'view_item'				=> 'View Cup of Joe',
			    'search_items'			=> 'Search Cups of Joe',
			    'not_found'				=> 'No Cups of Joe found',
			    'not_found_in_trash'	=> 'No Cups of Joe found in Trash',
			    'parent_item_colon'		=> '',
			    'menu_name'				=> 'Cup of Joe'
			),
			'public' => true,
			'exclude_from_search'	=> false,
			'show_ui' => true,
			'has_archive' => true,
			'menu_icon' => 'dashicons-format-status',
			'description' => 'Manage Cups of Joe',
			'supports'	=> array('title', 'editor', 'thumbnail', 'revisions'),
		)
	);
}