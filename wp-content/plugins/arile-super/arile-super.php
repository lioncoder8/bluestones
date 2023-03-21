<?php
/**
* Plugin Name:       	Arile Super
* Plugin URI:        	https://themearile.com/aasta-theme/
* Description:       	Arile Super Enhances ThemeArile with additional functionality.
* Version:           	0.8
* Author: 				ThemeArile
* Author URI: 			https://themearile.com/
* Tested up to: 		6.0
* Requires: 			4.6 or higher
* License: 				GPLv3 or later
* License URI: 			http://www.gnu.org/licenses/gpl-3.0.html
* Requires PHP: 		5.6
* Text Domain: 			arile-super
* Domain Path: 			/languages
*/

define( 'arile_super_plugin_url', plugin_dir_url( __FILE__ ) );
define( 'arile_super_plugin_dir', plugin_dir_path( __FILE__ ) );



if( !function_exists('arile_super_init') ){
	function arile_super_init(){
		$activate_theme_data = wp_get_theme(); // getting current theme data
		$activate_theme = $activate_theme_data->name;
		
		if( 'Aasta' == $activate_theme || 'Aasta Light' == $activate_theme || 'InteriorHub' == $activate_theme || 'AgencyWP' == $activate_theme || 'Consultexo' == $activate_theme || 'Appointech' == $activate_theme || 'Architect Studio' == $activate_theme || 'StockPress' == $activate_theme){
			require("inc/aasta/aasta.php");
		}
	}
	add_action( 'init', 'arile_super_init' );
}


/**
 * Define plugin textdomain.
 */
function arile_super_textdomain() {
  load_plugin_textdomain( 'arile-super', false, plugin_dir_url(__FILE__). 'languages' ); 
}
add_action( 'init', 'arile_super_textdomain' );

/**
 * The code during plugin activation.
 */
function activate_arile_super() {
	require_once plugin_dir_path( __FILE__ ) . 'inc/arile-super-activator.php';
	Arile_Super_Activator::activate();
}
register_activation_hook( __FILE__, 'activate_arile_super' );