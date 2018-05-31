<?php
//************************************************************************************************
// Section: 		SHRM Slide Post Type - Initilization Handler
// Description:		Module that handles the initilization of the shrm-slide custom post type
//					and its components
//************************************************************************************************

// Create the shrm-slide post type on wordpress initialization
add_action( 'init', 'create_shrm_slide_post_type' );
function create_shrm_slide_post_type() {
	register_post_type( 'shrm-slide',
		array(
			'labels' => array(
				'name' 					=> 'Slides',
				'singular_name' 		=> 'Slide',
			    'add_new'				=> 'Add New',
			    'add_new_item'			=> 'Add New Slide',
			    'edit_item'				=> 'Edit Slide',
			    'new_item'				=> 'New Slide',
			    'all_items'				=> 'All Slides',
			    'view_item'				=> 'View Slide',
			    'search_items'			=> 'Search Slides',
			    'not_found'				=> 'No Slides found',
			    'not_found_in_trash'	=> 'No Slides found in Trash',
			    'parent_item_colon'		=> '',
			    'menu_name'				=> 'Slides'
			),
			'public' => false,
			'exclude_from_search'	=> true,
			'show_ui' => true,
			'has_archive' => false,
			'menu_icon' => 'dashicons-images-alt2',
			'description' => 'Manage Slides',
			'supports'	=> array('title', 'thumbnail', 'revisions'),
			'rewrite'	=> array('slug'=>'slides'),
		)
	);
}



//************************************************************************************************
// Section: 		Metaboxes
// Description:		Module that handles this post type's metaboxes
//************************************************************************************************

require_once(SHRM_POSTTYPE_PATH . 'shrm-slide/metaboxes.php');



//************************************************************************************************
// Section: 		Widgets
// Description:		Module that handles this post type's widgets
//************************************************************************************************

require_once(SHRM_POSTTYPE_PATH . 'shrm-slide/widgets.php');



function generate_shrm_slider_html($args = array()) {
	$number_of_slides = @$args['number_of_slides'];
	if (empty($number_of_slides)) { $number_of_slides = 10; }
	
	$output = "";
	
	$slidesArgs = array(
		'post_type'		=>	'shrm-slide',
		'post_status'	=>	'publish',
		'posts_per_page'=>	$number_of_slides,
		'order'			=>	'ASC',
	);
	
	$slidesQuery = new WP_Query($slidesArgs);
	
	if ($slidesQuery->have_posts()) {
		$output = '<div class="shrm-slider cycle-slideshow"
			data-cycle-fx="scrollHorz"
			data-cycle-timeout="5000"
			data-cycle-pause-on-hover="true"
			data-cycle-swipe="true"
		    data-cycle-swipe-fx="scrollHorz"
			data-cycle-slides="> .shrm-slide"
			data-cycle-prev="#prevslide"
		    data-cycle-next="#nextslide"
		    data-cycle-pager-template=\'<span class="">{{slideNum}}<span>\'
		>';
		
		while ($slidesQuery->have_posts()) : $slidesQuery->the_post();
			$image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');
			if (empty($image[0])) {
				// Skip displaying this slide
				continue;
			}
			
			$output .= '<div class="shrm-slide" style="background-image: url(\'' . $image[0] . '\');">';
				$slide_options = get_post_meta(get_the_ID(), 'slide_options', true);
				if (!empty($slide_options['url'])) {
					$output .= '<a href="' . $slide_options['url'] . '" target="' . @$slide_options['url_target'] . '"></a>';
				}
				
				if (empty($slide_options['hide_title']) || $slide_options['hide_title'] !== 'true') {
					$title = get_the_title();
					if (!empty($title)) {
						$output .= '<div class="title">' . $title . '</div>';
					}
				}
				// Load the caption - currently disabled until styling for this can be done
				/*
					$caption = get_the_excerpt();
					if (!empty($caption)) {
						$output .= '<div class="caption">' . $caption . '</div>';
					}
				*/
			$output .= '</div>';
		endwhile; 
		
		$output .= '<a href="#" id="prevslide" class="slide-control"></a>';
		$output .= '<a href="#" id="nextslide" class="slide-control"></a>';
		$output .= '<div class="cycle-pager"></div>';
		$output .= '</div>';
	} else {
		$output = '<p>There are no slides to display</p>';
	}
	
	return $output;
}



function load_shrm_slider_resources() {
	// Need to be dynamic to support loading the slider where ever displayed from
	if (is_front_page()) {
		wp_enqueue_style('shrm-slider', SHRM_PLUGIN_URL . "includes/css/shrm-slider.css");
		wp_enqueue_script('cycle2', SHRM_PLUGIN_URL . 'includes/js/jquery.cycle2.min.js', array('jquery'), '2.1.6', false);
		
		require_once(SHRM_PLUGIN_PATH . 'includes/modules/mobile-detection.php');
		$detect = new Mobile_Detect;
		if ($detect->isMobile()) {
			wp_enqueue_script('cycle2swipe', SHRM_PLUGIN_URL . 'includes/js/jquery.cycle2.swipe.min.js', array('jquery'), '2.1.6', false);
		}
	}
}
add_action('load_resources_if_required', 'load_shrm_slider_resources');