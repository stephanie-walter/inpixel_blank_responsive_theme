<?php


/****** Unregister jquery and call google api jquery 
from http://wpengineer.com/2028/small-tips-using-wordpress-and-jquery/
***********************/
if( !function_exists('my_scripts_method'))  {
	 function my_scripts_method() {

			wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js', false, '1.7.1', true ); // load in footer - true
			wp_enqueue_script( 'jquery' );

	}
}

add_action('wp_enqueue_scripts', 'my_scripts_method');//wp_enqueue_scripts is the hook for the front-end, !is_admin() is useless





/** Cleaning up javascripts and stylesheets ****/ 
if( !function_exists('my_deregister_script_styles'))  {
	function my_deregister_script_styles() {
		
		/**adding some cleanup for plugin **/
		// wp_deregister_script( ' ' );
		
		/**adding some cleanup for plugin **/	
		// wp_deregister_style( ' ' );
		
	}
}
add_action( 'wp_enqueue_scripts', 'my_deregister_script_styles', 100 );

/*----------------------------------------------------------------------- **/

?>
