<?php
/**
 * @package ThemeStudio_Shortcodes
 * @version 1.0
 */
/*
Plugin Name: ThemeStudio Shortcodes
Plugin URI: http://themestudio.net/plugins/#shortcodes
Description: This plugin is required in order to run themes version 1.0 built by themestudio
Author: ThemeStudio
Version: 1.0
Author URI: http://themestudio.net
*/

// define('THEMESTUDIO_SHORTCODE', true);
define('THEMESTUDIO_SHORTCODE_VERSION', '1.0');
define('THEMESTUDIO_SHORTCODE_PATH', dirname(__FILE__));

require THEMESTUDIO_SHORTCODE_PATH . '/inc/themestudio.shortcode.class.php';

if(!function_exists('print_admin_notices')):
	function print_admin_notices() {

	}
	add_action( 'admin_notices', 'print_admin_notices' );
endif;

if(!function_exists('add_plugin_css')):
	function add_plugin_css() {

	}
	add_action( 'admin_head', 'add_plugin_css' );
endif;

if(!function_exists('add_plugin_admin_css_js')):
function add_plugin_admin_css_js(){
	if(is_admin()){
			wp_enqueue_script('jquery-ui-core');
			wp_enqueue_script('jquery-ui-sortable');
			
		wp_enqueue_style('ts-plugin-style' , plugin_dir_url(__FILE__).'assets/css/admin.css');
		wp_enqueue_script( 'ts-plugin-script',  plugin_dir_url(__FILE__).'assets/js/admin.js', 'jquery', '1.0.0', true); 
	}
}
add_action( 'admin_enqueue_scripts', 'add_plugin_admin_css_js' );
endif;

if(!function_exists('themestudio_add_styles_and_scripts')):
	function themestudio_add_styles_and_scripts(){
		
		if(!is_admin() && !is_login_page()){
			wp_enqueue_style('shortcodes-style' , plugin_dir_url(__FILE__).'assets/css/shortcodes.css');
			wp_enqueue_style('font-awesome' , plugin_dir_url(__FILE__).'assets/css/font-awesome.css');
			wp_enqueue_style('simple-line-icons' , plugin_dir_url(__FILE__).'assets/css/simple-line-icons.css');
			wp_enqueue_style('shortcodes-typography' , plugin_dir_url(__FILE__).'assets/css/typography.css');
			
			wp_enqueue_script('jquery');
			wp_enqueue_script('jquery-ui-accordion');
			wp_enqueue_script('bostrap-min',plugin_dir_url(__FILE__).'assets/js/bootstrap.min.js', 'jquery', '1.0.0', true);
			//wp_enqueue_script('all',plugin_dir_url(__FILE__).'assets/js/all.js', 'jquery', '1.0.0', true);
			wp_enqueue_script('shortcodes-script', plugin_dir_url(__FILE__).'assets/js/shortcodes.js', 'jquery', '1.0.0', true); 
			
			global $smof_data;
			$new_lines = array("\r\n","\r","\n");

						
			$scripts = array(
				// 'jquery.flexslider',
			);
			foreach($scripts as $script){
				wp_enqueue_script( $script, get_template_directory_uri() . '/js/'.$script.'.js', 'jquery', '1.0', true );
			}
			

			// Loads our stylesheets.
			$styles = array(
			'flexslider',
			
			);
			foreach($styles as $style){
				wp_enqueue_style( $style, get_template_directory_uri().'/css/'.$style.'.css');
			}
		}
	}
	add_action('wp_enqueue_scripts', 'themestudio_add_styles_and_scripts');
endif;

if(!function_exists('is_login_page')):
	function is_login_page() {
		return in_array($GLOBALS['pagenow'], array('wp-login.php', 'wp-register.php'));
	}
endif;


add_filter('deprecated_function_trigger_error', '_no_deprecated_func_alert');
function _no_deprecated_func_alert($x){
	return false;
}

