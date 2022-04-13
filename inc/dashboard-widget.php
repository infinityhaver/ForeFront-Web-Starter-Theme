<?php 
	add_action('wp_dashboard_setup', 'my_custom_dashboard_widgets');
  
	function my_custom_dashboard_widgets() {
		global $wp_meta_boxes;
 		wp_add_dashboard_widget('custom_help_widget', 'ForeFront Web Support Request', 'custom_dashboard_widget');
	}
 
	function custom_dashboard_widget() {
		global $current_user;
		$site_name 			= get_bloginfo('name');
		$website 			= get_bloginfo('url');
		$username 			= $current_user->display_name;
		$user_email 		= $current_user->user_email;
		$user_level 		= $current_user->user_level;
		$user_firstname 	= $current_user->user_firstname;
		$user_lastname 		= $current_user->user_lastname;
		$user_id 			= $current_user->ID;
		$current_date_time 	= date_i18n('l F d, Y h:i:s A');
		echo do_shortcode('[gravityform id="2" title="false" description="false" ajax="true" field_values="first_name=' . $user_firstname . '&last_name=' . $user_lastname . '&website=' . $website .'&company=' . $site_name .'&email=' . $user_email . '"]'); 
	} 
