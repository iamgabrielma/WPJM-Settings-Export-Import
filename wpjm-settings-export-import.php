<?php
/**
 * Plugin Name: WPJM Settings Export Import
 * Plugin URI: 
 * Description: 
 * Version: 1.0.0
 * Author: Gabriel Maldonado
 * Author URI: http://tilcode.blog/
 * Text Domain: wpjm-settings-export-import
 * Domain Path: /languages
 *
 * License: GPLv2 or later
 */

/**
 * Prevent direct access data leaks
 **/
if ( ! defined( 'ABSPATH' ) ) {
    exit; 
}

if ( !class_exists( 'WP_Job_Manager' ) ) {

	add_action( 'admin_notices', 'gma_wpjmsei_admin_notice__error' );

} else { 
	
	//add_action('job_manager_settings', 'gma_wpjmsei_new_setting');
	add_filter( 'job_manager_settings', 'gma_wpjmsei_add_setting_field' );
}

function gma_wpjmsei_add_setting_field( $settings ){

	// $foo = array(
	// 	'hello' => 'desc'
	// );
	// ## TODO: Add this to pillowsoft debugging tool
	?>
	<pre>
		<?php 
			// echo var_dump($settings['general'][1]);
			// echo '---------------------------------';
			// echo '<br>';
		?>
	</pre>

	<?php 
	//$settings[] = $foo;
	//$default_settings = $settings['general'][1];
	// locate default settings
	//$old_settings = $settings['general'][1];
	//create new setting
	//$new_setting = 	
	$settings['general'][1][] =

	array(
							'name'    => 'job_manager_export_tool',
							'std'     => 'relative',
							'label'   => __( 'Export Tool', 'wp-job-manager' ),
							'desc'    => __( 'Export Tool.', 'wp-job-manager' ),
							'type'    => 'radio',
							'options' => array(
								'relative' => __( 'Relative to the current date (e.g., 1 day, 1 week, 1 month ago)', 'wp-job-manager' ),
								'default'  => __( 'Default date format as defined in Settings', 'wp-job-manager' ),
							)
					);
	// Add new setting to the array
	//$old_settings[] = $new_setting;
	//$settings[] = $old_settings;


		?>
	<pre>
		<?php 
			//echo var_dump($old_settings);
			// echo '---------------------------------';
			// echo '<br>';
			//die();
		?>
	</pre>

	<?php 



	return $settings;
	//die();
}

/**
 * Display an error message notice in the admin if WP Job Manager is not active
 */
function gma_wpjmsei_admin_notice__error() {
	
  $class = 'notice notice-error';
	$message = __( 'An error has occurred. WP Job Manager must be installed in order to use this plugin', 'wpjm-settings-export-import' );

	printf( '<div class="%1$s"><p>%2$s</p></div>', esc_attr( $class ), esc_html( $message ) ); 

}