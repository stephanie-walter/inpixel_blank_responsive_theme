<?php


/****** Unregister jquery and call google api jquery 
from http://wpengineer.com/2028/small-tips-using-wordpress-and-jquery/
***********************/
/* function my_scripts_method() {
	if ( !is_admin() ) {
		wp_deregister_script( 'jquery' );
		wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js', false, '1.7.1', true ); // load in footer - true
		wp_enqueue_script( 'jquery' );
		// load js of Theme, requires jQuery
	}
}

add_action('wp_enqueue_scripts', 'my_scripts_method');





/** Cleaning up javascripts ****/ 

function my_deregister_javascript() {
	
	/**adding some cleanup for plugin **/
	// wp_deregister_script( ' ' );
	
}
add_action( 'wp_print_scripts', 'my_deregister_javascript', 100 );

/*----------------------------------------------------------------------- **/



/** Cleaning up CSS styles **** */
function my_deregister_styles() {
	
	/**adding some cleanup for plugin **/	
	// wp_deregister_style( ' ' );
	
}
add_action( 'wp_print_styles', 'my_deregister_styles', 100 );



?>