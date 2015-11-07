<?php
//************************************************************************************************
// Section: 		Success Stories Post Type - Initilization Handler
// Description:		Module that handles the initilization of the success-story custom post type
//					and its components
//************************************************************************************************

// Create the success-story post type on wordpress initialization
add_action( 'init', 'create_success_story_post_type' );
function create_success_story_post_type() {
	register_post_type( 'success-story',
		array(
			'labels' => array(
				'name' 					=> 'Success Stories',
				'singular_name' 		=> 'Success Stories',
			    'add_new'				=> 'Add New',
			    'add_new_item'			=> 'Add New Success Story',
			    'edit_item'				=> 'Edit Success Story',
			    'new_item'				=> 'New Success Story',
			    'all_items'				=> 'All Success Stories',
			    'view_item'				=> 'View Success Story',
			    'search_items'			=> 'Search Success Stories',
			    'not_found'				=> 'No Success Stories found',
			    'not_found_in_trash'	=> 'No Success Stories found in Trash',
			    'parent_item_colon'		=> '',
			    'menu_name'				=> 'Success Stories'
			),
			'public' => true,
			'exclude_from_search'	=> false,
			'show_ui' => true,
			'has_archive' => true,
			'menu_icon' => 'dashicons-thumbs-up',
			'description' => 'Manage Success Stories',
			'supports'	=> array('title', 'editor', 'thumbnail', 'revisions'),
			'rewrite'	=> array('slug'=>'success-stories'),
		)
	);
}