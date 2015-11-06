<?php
//************************************************************************************************
// Section: 		Media Item Post Type - Initilization Handler
// Description:		Module that handles the initilization of the media-item custom post type
//					and its components
//************************************************************************************************

// Create the success-story post type on wordpress initialization
add_action( 'init', 'create_media_item_post_type' );
function create_media_item_post_type() {
	register_post_type( 'media-item',
		array(
			'labels' => array(
				'name' 					=> 'Media Room',
				'singular_name' 		=> 'Media Item',
			    'add_new'				=> 'Add New',
			    'add_new_item'			=> 'Add New Media Item',
			    'edit_item'				=> 'Edit Media Item',
			    'new_item'				=> 'New Media Item',
			    'all_items'				=> 'All Media Items',
			    'view_item'				=> 'View Media Item',
			    'search_items'			=> 'Search Media Items',
			    'not_found'				=> 'No Media Items found',
			    'not_found_in_trash'	=> 'No Media Items found in Trash',
			    'parent_item_colon'		=> '',
			    'menu_name'				=> 'Media Room'
			),
			'public' => true,
			'exclude_from_search'	=> false,
			'show_ui' => true,
			'has_archive' => true,
			'menu_icon' => 'dashicons-megaphone',
			'description' => 'Manage Media Items',
			'supports'	=> array('title', 'editor', 'thumbnail', 'revisions'),
			'rewrite'	=> array('slug'=>'media-room'),
		)
	);
}