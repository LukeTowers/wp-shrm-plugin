<?php
//************************************************************************************************
// Section: 		Widgets
// Description:		Module that handles this post type's widgets
//************************************************************************************************

function register_shrm_slide_widgets() {
	register_widget('SHRM_Slider');
}
add_action('widgets_init', 'register_shrm_slide_widgets');



// SHRM slider widget
class SHRM_Slider extends WP_Widget {
	
	// Initialization
	public function __construct() {
		$widget_opts = array(
			'classname' => 'shrm-slider-widget',
			'description' => 'Displays the SHRM Slider'
		);
		
		parent::__construct(
			'shrm-widget-slider',	// Widget ID
			'SHRM Slider',			// Widget Name
			$widget_opts
		);
	}
	
	public function form($instance) {
		$number_of_slides = @$instance['number_of_slides'];
		if (!isset($instance['number_of_slides'])) { $number_of_slides = 10; }
		?>
		<p>
			<label for="<?php echo $this->get_field_id('number_of_slides'); ?>">Number of slides to display:</label>
			<input class="widefat" id="<?php echo $this->get_field_id('number_of_slides'); ?>" name="<?php echo $this->get_field_name('number_of_slides'); ?>" type="text" value="<?php echo $number_of_slides; ?>"/>
		</p>
		<?php
	}
	
	public function update($new_instance, $old_instance) {
		$instance['number_of_slides'] = (int) @$new_instance['number_of_slides'];
		
		return $instance;
	}
	
	public function widget($args, $instance) {
		if (empty($instance['number_of_slides'])) {
			$instance['number_of_slides'] = 10;
		}
		
		echo generate_shrm_slider_html(array('number_of_slides'=>$instance['number_of_slides']));
	}
}