<?php
/**
 * Required plugins
 *
 * @package Starter
 */

/**
 * TGM Plugin Activation
 */
require_once get_template_directory() . '/inc/vendor/class-tgm-plugin-activation.php';

/**
 * Register required plugins
 */
function starter_register_required_plugins() {
	$plugins 	= array(
//		array(
//			'name'      			=> 'ForeFront Plugins',
//			'slug'      			=> 'ffw-plugins',
//			'force_activation'   	=> false,
//			'required'  			=> true,
//			'source'    			=> 'https://github.com/infinityhaver/ffw-plugins/archive/refs/heads/main.zip',
//		),
//		array(
//			'name'      			=> 'Advanced Custom Fields Pro',
//			'slug'      			=> 'advanced-custom-fields-pro',
//			'force_activation'   	=> false,
//			'required'  			=> true,
//			'source'    			=> 'https://github.com/infinityhaver/advanced-custom-fields-pro/archive/refs/heads/main.zip',
//		),
//		array(
//			'name'      			=> 'Gravity Forms',
//			'slug'      			=> 'gravityforms',
//			'force_activation'   	=> false,
//			'required'  			=> true,
//			'source'    			=> 'https://github.com/infinityhaver/gravityforms/archive/refs/heads/main.zip',
//		),
//		array(
//			'name'      			=> 'FacetWP',
//			'slug'      			=> 'facetwp',
//			'force_activation'   	=> false,
//			'required'  			=> true,
//			'source'    			=> 'https://github.com/infinityhaver/facetwp/archive/refs/heads/main.zip',
//		),
//		array(
//			'name'      			=> 'WP All Import Pro',
//			'slug'      			=> 'wp-all-import-pro',
//			'force_activation'   	=> false,
//			'required'  			=> true,
//			'source'    			=> 'https://github.com/infinityhaver/wp-all-import-pro/archive/refs/heads/main.zip',
//		),
//		array(
//			'name'      			=> 'WP All Import ACF Add-On',
//			'slug'      			=> 'wpai-acf-add-on',
//			'force_activation'   	=> false,
//			'required'  			=> true,
//			'source'    			=> 'https://github.com/infinityhaver/wpai-acf-add-on/archive/refs/heads/main.zip',
//		),
//		array(
//			'name'      			=> 'WP All Export Pro',
//			'slug'      			=> 'wp-all-export-pro',
//			'force_activation'   	=> false,
//			'required'  			=> true,
//			'source'    			=> 'https://github.com/infinityhaver/wp-all-export-pro/archive/refs/heads/main.zip',
//		),
//		array(
//			'name'      			=> 'WP All Export ACF Add-On',
//			'slug'      			=> 'wpae-acf-add-on',
//			'force_activation'   	=> false,
//			'required'  			=> true,
//			'source'    			=> 'https://github.com/infinityhaver/wpae-acf-add-on/archive/refs/heads/main.zip',
//		),
//		array(
//			'name'      			=> 'Admin Columns Pro',
//			'slug'      			=> 'admin-columns-pro',
//			'force_activation'   	=> false,
//			'required'  			=> true,
//			'source'    			=> 'https://github.com/infinityhaver/admin-columns-pro/archive/refs/heads/main.zip',
//		),
//		array(
//			'name'      			=> 'Admin Columns Pro - Advanced Custom Fields (ACF)',
//			'slug'      			=> 'ac-addon-acf',
//			'force_activation'   	=> false,
//			'required'  			=> true,
//			'source'    			=> 'https://github.com/infinityhaver/ac-addon-acf/archive/refs/heads/main.zip',
//		),
//		array(
//			'name'      			=> 'FacetWP - Relevanssi integration',
//			'slug'      			=> 'facetwp-relevanssi',
//			'force_activation'   	=> false,
//			'source'    			=> 'https://github.com/infinityhaver/facetwp-relevanssi/archive/refs/heads/main.zip',
//		),
//		array(
//			'name'      			=> 'Gravity Forms + Custom Post Types',
//			'slug'      			=> 'gravity-forms-custom-post-types',
//			'required'  			=> true,
//			'force_activation'   	=> false,
//		),
//		array(
//			'name'      			=> 'ACF RGBA Color Picker',
//			'slug'      			=> 'acf-rgba-color-picker',
//			'required'  			=> true,
//			'force_activation'   	=> false,
//		),
//		array(
//			'name'      			=> 'BulkPress',
//			'slug'      			=> 'bulkpress',
//			'required'  			=> true,
//			'force_activation'   	=> false,
//		),
//		array(
//			'name'      			=> 'Relevanssi',
//			'slug'      			=> 'relevanssi',
//			'required'  			=> true,
//			'force_activation'   	=> false,
//		),
//		array(
//			'name'      			=> 'Redirection',
//			'slug'      			=> 'redirection',
//			'required'  			=> true,
//			'force_activation'   	=> false,
//		)
	);
	$config  = array(
		'id'           => 'starter',
		'default_path' => '',
		'menu'         => 'tgmpa-install-plugins',
		'parent_slug'  => 'themes.php',
		'capability'   => 'edit_theme_options',
		'has_notices'  => true,
		'dismissable'  => true,
		'dismiss_msg'  => '',
		'is_automatic' => false,
		'message'      => '',
	);

	tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'starter_register_required_plugins' );
