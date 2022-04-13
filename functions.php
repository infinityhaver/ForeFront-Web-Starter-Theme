<?php
/**
 * ForeFront Web Starter Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package ForeFront_Starter
 */

if ( ! defined( '_S_VERSION' ) ) {
	define( '_S_VERSION', '2.15.0' );
}

if (!function_exists('forefront_starter_setup')) :
	function forefront_starter_setup() {
		add_theme_support('automatic-feed-links');
		add_theme_support('title-tag');
		add_theme_support('post-thumbnails');
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// navigation menus
		register_nav_menus( array(
			'primary'   => 'Primary Menu',
			'utility'   => 'Utility Menu',
//			'footer'   	=> 'Footer Menu'
		));

		// remove ul from wp_nav_menu for quicker and/or better access to selectors
		function remove_ul ( $menu ){
			return preg_replace( array( '#^<ul[^>]*>#', '#</ul>$#' ), '', $menu );
		}
		add_filter( 'wp_nav_menu', 'remove_ul' );

		// add class "active" to active menu item
		add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);
		function special_nav_class($classes, $item){
			if( in_array('current-menu-item', $classes) ){
				$classes[] = 'active ';
			}
			return $classes;
		}

		// add class to first and last menu items for wp_nav_menu
		function first_and_last_menu_class($items) {
			$items[1]->classes[] = 'first';
			$items[count($items)]->classes[] = 'last';
			return $items;
		}
		add_filter('wp_nav_menu_objects', 'first_and_last_menu_class');

	}
endif;
add_action( 'after_setup_theme', 'forefront_starter_setup' );

// declare woocommerce support
function forefront_starter_add_woocommerce_support() {
	add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'forefront_starter_add_woocommerce_support' );

// allow shortcodes in widgets
add_filter('widget_text', 'do_shortcode');

// allow shortcodes in acf textareas
function text_area_shortcode($value, $post_id, $field) {
	if (is_admin()) {
		return $value;
	}
	return do_shortcode($value);
}
add_filter('acf/load_value/type=textarea', 'text_area_shortcode', 10, 3);

// check to see if acf is active and then do stuff or don't
include_once(ABSPATH . 'wp-admin/includes/plugin.php'); 
if(is_plugin_active('advanced-custom-fields-pro/acf.php')) {

	// register widget areas
//	function forefront_starter_widgets_init() {
//		register_sidebar( array(
//			'name' 			=> 'Footer 1',
//			'id' 			=> 'footer-1',
//			'before_widget' => '<div id="footer-widget-1" class="footer-widget footer-widget-1 %2$s">',
//			'after_widget' 	=> '</div>',
//			'before_title' 	=> '<h4 class="footer-widget-title footer-widget-title-1">',
//			'after_title' 	=> '</h4>',
//		));
//		register_sidebar( array(
//			'name' 			=> 'Footer 2',
//			'id' 			=> 'footer-2',
//			'before_widget' => '<div id="footer-widget-2" class="footer-widget footer-widget-2 %2$s">',
//			'after_widget' 	=> '</div>',
//			'before_title' 	=> '<h4 class="footer-widget-title footer-widget-title-2">',
//			'after_title' 	=> '</h4>',
//		));
//		register_sidebar( array(
//			'name' 			=> 'Footer 3',
//			'id' 			=> 'footer-3',
//			'before_widget' => '<div id="footer-widget-3" class="footer-widget footer-widget-3 %2$s">',
//			'after_widget' 	=> '</div>',
//			'before_title' 	=> '<h4 class="footer-widget-title footer-widget-title-3">',
//			'after_title' 	=> '</h4>',
//		));
//		register_sidebar( array(
//			'name' 			=> 'Footer 4',
//			'id' 			=> 'footer-4',
//			'before_widget' => '<div id="footer-widget-4" class="footer-widget footer-widget-4 %2$s">',
//			'after_widget' 	=> '</div>',
//			'before_title' 	=> '<h4 class="footer-widget-title footer-widget-title-4">',
//			'after_title' 	=> '</h4>',
//		));
//	}
//	add_action( 'widgets_init', 'forefront_starter_widgets_init' );

	// set favicon
	function add_my_favicon() {
		$favicon_path = get_field('favicon', 'options');
		echo '<link rel="shortcut icon" href="' . esc_url($favicon_path) . '" />';
	}
	add_action( 'wp_head', 'add_my_favicon' ); // front end
	add_action( 'admin_head', 'add_my_favicon' ); // admin end

	// enable gutenberg for posts and gutenberg-page-template.php ONLY
	add_filter( 'use_block_editor_for_post', 'disable_gutenberg', 10, 2 );
	function disable_gutenberg( $can_edit, $post ) {
		if( ($post->post_type == 'page' && get_page_template_slug( $post->ID ) == 'gutenberg-page-template.php' ) || $post->post_type == 'post') {
			return true;
		}
		return false;
	}

	// acf options pages
	if ( function_exists( 'acf_add_options_page' ) ) {
		$child = acf_add_options_sub_page(array(
			'page_title' 		=> 'Theme Options',
			'menu_title' 		=> 'Theme Options',
			'menu_slug'   		=> 'theme-options',
			'parent_slug' 		=> 'themes.php',
			'show_in_graphql' 	=> true,
		));
		$child = acf_add_options_sub_page(array(
			'page_title' 		=> 'Blog Settings',
			'menu_title' 		=> 'Blog Settings',
			'menu_slug'   		=> 'blog-settings',
			'parent_slug' 		=> 'edit.php',
			'show_in_graphql' 	=> true,
		));
		$child = acf_add_options_sub_page(array(
			'page_title' 		=> 'Admin Menu Links',
			'menu_title' 		=> 'Admin Menu Links',
			'menu_slug'   		=> 'admin-menu-links',
			'position' 			=> '9.123',
			'parent_slug' 		=> 'options-general.php',
			'show_in_graphql' 	=> true,
		));
		if(have_rows('settings_pages', 'options')) : 
			while(have_rows('settings_pages', 'options')) : the_row();
				$dashicon 		= get_sub_field('dashicon');
				$page_title 	= get_sub_field('page_title');
				$menu_title 	= get_sub_field('menu_title');
				$menu_slug 		= get_sub_field('menu_slug');
				$parent_slug 	= get_sub_field('parent_slug');
				if($dashicon) {
					$icon = $dashicon;
				} else {
					$icon = 'dashicons-admin-generic';
				}
				if($parent_slug) {
					$child = acf_add_options_sub_page(array(
						'page_title' 	=> $page_title,
						'menu_title'	=> $menu_title,
						'menu_slug' 	=> $menu_slug,
						'parent_slug' 	=> $parent_slug,
						'show_in_graphql' 	=> true,
					));
				} else {
					acf_add_options_page(array(
						'page_title' 	=> $page_title,
						'menu_title'	=> $menu_title,
						'menu_slug' 	=> $menu_slug,
						'capability'	=> 'edit_posts',
						'icon_url' 		=> $icon,
						'show_in_graphql' 	=> true,
					));
				}
			endwhile;
		endif;
	}

	if(have_rows('forefront_links', 'options')) : 
		function forefront_admin_links($wp_admin_bar) {
			$icon_url = get_template_directory_uri() . '/img/link.png';
			$iconspan = '<span class="custom-icon" style="float:left; width:22px !important; height:22px !important; margin-left: 5px !important; margin-top: 5px !important; margin-right: 10px; background-image:url(' . $icon_url . '); background-size: cover; background-repeat: no-repeat; background-position: center;"></span>';
			$title = 'Links';
			$args = array(
				'id' => 'forefront',
				'title' => $title,
				'href' => '#!',
				'meta' => array(
					'class' => 'forefront', 
					'title' => 'Helpful links',
					'target' => '_self'
				)
			);
			$wp_admin_bar->add_node($args);
			$i = 1;
			while(have_rows('forefront_links', 'options')) : the_row();
				$j 					= $i++;
				$link 				= get_sub_field('link');
				if($link) {
					$link_url 		= $link['url'];
					$link_title 	= $link['title'];
					$link_target 	= $link['target'] ? $link['target'] : '_self';
				}
				$args = array(
					'id' => 'forefront-admin-' . $j,
					'title' => $link_title, 
					'href' => $link_url,
					'parent' => 'forefront', 
					'meta' => array(
						'class' => 'forefront-admin-' . $j, 
						'title' => $link_title,
						'target' => $link_target
					)
				);
				$wp_admin_bar->add_node($args);
				if(have_rows('child_links')) : 
					$k = 1;
					while(have_rows('child_links')) : the_row();
						$l 						= $k++;
						$child_link 			= get_sub_field('child_link');
						if($child_link) {
							$child_link_url 	= $child_link['url'];
							$child_link_title 	= $child_link['title'];
							$child_link_target 	= $child_link['target'] ? $child_link['target'] : '_self';
						}
						$args = array(
							'id' => 'forefront-admin-child' . $l,
							'title' => $child_link_title, 
							'href' => $child_link_url,
							'parent' => 'forefront-admin-' . $j, 
							'meta' => array(
								'class' => 'wpbeginner-themes', 
								'title' => $child_link_title,
								'target' => $child_link_target
							)
						);
						$wp_admin_bar->add_node($args);
					endwhile;
				endif;
			endwhile;
		}
		add_action('admin_bar_menu', 'forefront_admin_links', 999);
	endif;

	// remove wp logo from admin bar
	function remove_logo_wp_admin() {
		global $wp_admin_bar;
		$wp_admin_bar->remove_menu( 'wp-logo' );
	}
	add_action( 'wp_before_admin_bar_render', 'remove_logo_wp_admin', 0 );
}

// remove site health dashboard widget
add_action('wp_dashboard_setup', 'remove_site_health_dashboard_widget');
function remove_site_health_dashboard_widget() {
	remove_meta_box('dashboard_site_health', 'dashboard', 'normal');
}

// remove site health sub menu item
add_action( 'admin_menu', 'remove_site_health_menu' );	
function remove_site_health_menu(){
	remove_submenu_page( 'tools.php','site-health.php' ); 
}

// disable custom css in customizer
add_action('customize_register', 'jt_customize_register');
function jt_customize_register($wp_customize) {
	$wp_customize->remove_control('custom_css');
}

// disable autosave
add_action( 'admin_init', 'disable_autosave' );
function disable_autosave() {
	wp_deregister_script( 'autosave' );
}

// disable file edits
function disable_file_edit_action() {
	define('DISALLOW_FILE_EDIT', true);
}
add_action('init','disable_file_edit_action');

// allow additional upload mime types
function forefront_starter_upload_mimes( $mimes ) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter('upload_mimes', 'forefront_starter_upload_mimes');

$login_logo = get_field('login_logo', 'options');
if($login_logo) { 
	require_once get_template_directory() . '/inc/custom-login.php';
}

require_once get_template_directory() . '/inc/required-plugins.php';
require_once get_template_directory() . '/inc/shortcodes.php';
// require_once get_template_directory() . '/inc/dashboard-widget.php';

// acf flexible content image preview file path is /img/block-previews/ - images must be 732px wide x 300px high
add_filter( 'acf-flexible-content-preview.img/block-previews', $path );

// set query args for person archive
function project_query_args($query) {
	if(is_admin() || !$query->is_main_query()) {
		return;
	}
	if(is_post_type_archive('person')) {
		$query->set('posts_per_page', 21);
		$query->set('orderby', 'menu_order');
		$query->set('order', 'ASC');
	}
}
add_filter('pre_get_posts', 'project_query_args');

// use site search page for search results
add_filter('get_search_form', function($form) {
	$form = str_replace('name="s"', 'name="_keywords"', $form);
	$form = preg_replace('/action=".*"/', 'action="/site-search/"', $form);
	return $form;
});

// get that gravity forms "add form" button back from it's silly hiding spot
add_filter( 'gform_display_add_form_button', '__return_true' );

// custom tinymce buttons
add_action('init', 'wysiwyg_add_my_button');
function wysiwyg_add_my_button() {
	global $typenow;
	// Check user permissions
	if ( !current_user_can('edit_posts') && !current_user_can('edit_pages') ) {
		return;
	}
	// Check if WYSIWYG is enabled
	if ( get_user_option('rich_editing') == 'true') {
		add_filter('mce_external_plugins', 'wysiwyg_add_tinymce_plugin');
		add_filter('mce_buttons', 'wysiwyg_register_my_button');
	}
	// Register the CSS files if using custom icons via the CSS property background-image
	wp_register_style( 'wysiwyg_button_css', get_template_directory_uri() . '/inc/wysiwyg-btns.css', false, '1.0.0' );
	wp_enqueue_style( 'wysiwyg_button_css' );
}
// Create the custom TinyMCE plugins
function wysiwyg_add_tinymce_plugin($plugin_array) {
//	$plugin_array['wysiwyg_simple_accordion'] = get_template_directory_uri() . '/inc/wysiwyg-btns.js';
	$plugin_array['wysiwyg_button'] = get_template_directory_uri() . '/inc/wysiwyg-btns.js';
//	$plugin_array['wysiwyg_list'] = get_template_directory_uri() . '/inc/wysiwyg-btns.js';
	return $plugin_array;
}
// Add the buttons to the TinyMCE array of buttons that display, so they appear in the WYSIWYG editor
function wysiwyg_register_my_button($buttons) {
//	array_push($buttons, 'wysiwyg_simple_accordion');
	array_push($buttons, 'wysiwyg_button');
//	array_push($buttons, 'wysiwyg_list');
	return $buttons;
}

// scripts n' styles
function forefront_starter_scripts() {
	wp_enqueue_style( 'starter-styles', get_template_directory_uri() . '/build/bundle.css', null, '20220111' );
	wp_enqueue_script( 'starter-scripts', get_template_directory_uri() . '/build/bundle.js', null, '20220111' );
}
add_action( 'wp_enqueue_scripts', 'forefront_starter_scripts' );

function forefront_starter_enqueue_admin_stuff() {
	wp_register_style( 'custom_wp_admin_css', get_template_directory_uri() . '/admin/admin.css', false, '2.15.0' );
	wp_enqueue_style( 'custom_wp_admin_css' );

	wp_enqueue_script('custom_wp_admin_script', get_template_directory_uri() . '/admin/admin.js', array('jquery'));
}
add_action( 'admin_enqueue_scripts', 'forefront_starter_enqueue_admin_stuff' );