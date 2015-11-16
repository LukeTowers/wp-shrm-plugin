<?php
//************************************************************************************************
// Section: 		Metaboxes
// Description:		Module that handles this post type's metaboxes
//************************************************************************************************

// Load the styles for the admin page for the shrm-slide post type
function shrm_slide_load_admin_styles() {
	$currentScreen = get_current_screen();
	
	// Enqueue styles only on shrm-slide pages
    if ($currentScreen->post_type === "shrm-slide") {
		wp_enqueue_style('shrm-slide-admin-styles', SHRM_PLUGIN_URL . 'includes/css/shrm-slide-admin-styles.css', false, '1.0.0');
    }
}
add_action('admin_enqueue_scripts', 'shrm_slide_load_admin_styles');


// Register the metaboxes
function add_shrm_slide_metaboxes($post) {
	add_meta_box(
		'slide_url_metabox',		// ID of the metabox
		'Slide URL',				// Title of the metabox
		'render_slide_url_metabox',	// Callback function to print out the html for the metabox
		'shrm-slide',				// "Screen" to display metabox on, i.e. 'schedules' post type
		'normal',					// Context of the metabox
		'high'						// Priority of the metabox being displayed
	);
}
add_action('add_meta_boxes_shrm-slide', 'add_shrm_slide_metaboxes');


function save_shrm_slide($slide_id) {
	// Get the slide data from $_POST
	$slide_options = array(
		'url'		=>	@$_POST['slide_url'],
		'url_target'=>	@$_POST['url_target'],
	);
	
	update_post_meta($slide_id, 'slide_options', $slide_options);
}
add_action('save_post_shrm-slide', 'save_shrm_slide');



function render_slide_url_metabox($slide) {
	$slide_options = get_post_meta($slide->ID, 'slide_options', true);
	?>
	<p>
		<label for="slide_url">Slide URL:</label>
		<input type="text" name="slide_url" id="slide_url" value="<?php echo @$slide_options['url']; ?>">
		<small>Note: If the URL is to an external site (i.e. not a page on <?php echo site_url(); ?>), then it must start with either http:// or https://. If it is a link a page on the current site, it may remove the domain name and start with a forward slash ('/'). Example: the page "Get Involved" would normally be "http://www.shrmsk.com/get-involved/", but because it is on this site, you may use the URL "/get-involved/"</small>
	</p>
	<p>
		<label for="url_target">Open link in new tab:</label>
		<input type="checkbox" name="url_target" id="url_target" value="_blank" <?php if (!empty($slide_options['url_target'])) { checked($slide_options['url_target'], '_blank'); } ?>>
	</p>
	<?php
}