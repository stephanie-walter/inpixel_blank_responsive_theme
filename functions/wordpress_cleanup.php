<?php


 add_action('after_setup_theme','wpce_setup');
 if( !function_exists('wpce_setup'))  {
 function wpce_setup() {
	
	/*** calling clean up fonctions, comment to disable a function----------------------------------------*/
	
	/* admin part cleanups */
	add_action('admin_menu','remove_dashboard_widgets');// cleaning dashboard widgets	
	add_action('admin_menu', 'delete_menu_items');// deleting menu items from admin area
	add_action('admin_menu','customize_meta_boxes');// remove some meta boxes from pages and posts edition page
	add_filter('manage_posts_columns', 'custom_post_columns');// remove column entries from list of posts
	add_filter('manage_pages_columns', 'custom_pages_columns');// remove column entries from list of page
	add_action('wp_before_admin_bar_render', 'wce_admin_bar_render' );// clean up the admin bar
	add_action('widgets_init', 'unregister_default_widgets', 11);// remove widgets from the widget page

	/* selfish frshstart plugins code parts*/
	add_action('admin_notices','rynonuke_update_notification_nonadmins',1);// remove notification for enayone but admin
	add_action('pre_ping','rynonuke_self_pings');// disable self-trackbacking
	add_action('admin_init','rynonuke_dolly');// remove the hello dolly plugin
	add_filter('user_contactmethods','rynonuke_contactmethods',10,1);	// add facebook and twitter account to user profil

 /* admin page wp-login enhancements */
	add_filter( 'login_headerurl', 'custom_login_url' );// Make admin link point to the home of the site
	add_filter( 'login_headertitle', 'custom_login_title' );// Change alt title of admin logo to use blog name

	
	
	/* other clean ups */
	// add_action( 'init', 'wce_remove_l1on' ); remove the l10n.js script http://eligrey.com/blog/post/passive-localization-in-javascript

	/**---------------------------------------------------------------------------------------------------*/
	
	
	
	
	/***************** Security + header clean-ups ************************/
	/** remove the wlmanifest (useless !!) */
	remove_action('wp_head', 'wlwmanifest_link');
	remove_action('wp_head', 'rsd_link');
	remove_action( 'wp_head', 'index_rel_link' );// index link
	remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );// prev link
	remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );// start link
	// remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 );// Display relational links for the posts adjacent to the current post.
	// remove_action( 'wp_head', 'feed_links_extra', 3 );// Display the links to the extra feeds such as category feeds
	//remove_action( 'wp_head', 'feed_links', 2 );// Display the links to the general feeds: Post and Comment Feed
	remove_action('wp_head','start_post_rel_link');
	remove_action('wp_head','adjacent_posts_rel_link_wp_head');
	remove_action('wp_head', 'wp_generator');// remove WP version from header
	remove_action('wp_head','wp_shortlink_wp_head');
	remove_filter( 'the_content', 'capital_P_dangit' );// Get outta my Wordpress codez dangit!
	remove_filter( 'the_title', 'capital_P_dangit' );
	remove_filter( 'comment_text', 'capital_P_dangit' );

	// removes detailed login error information for security
	add_filter('login_errors',create_function('$a', "return null;")); 
	/**---------------------------------------------------------------------------------------------------*/	
	
	}
}

 /* Here come my different fonctions 
	* 
	* 
	* */
	
/*** cleaning up the dashboard- ----------------------------------------*/
if( !function_exists('remove_dashboard_widgets'))  {
	function remove_dashboard_widgets(){
		//remove_meta_box('dashboard_right_now','dashboard','core');// right now overview box
		remove_meta_box('dashboard_incoming_links','dashboard','core');// incoming links box
		//remove_meta_box('dashboard_quick_press','dashboard','core');// quick press box
		remove_meta_box('dashboard_plugins','dashboard','core');// new plugins box
		//remove_meta_box('dashboard_recent_drafts','dashboard','core');// recent drafts box
		remove_meta_box('dashboard_recent_comments','dashboard','core');// recent comments box
		remove_meta_box('dashboard_primary','dashboard','core');// wordpress development blog box
		remove_meta_box('dashboard_secondary','dashboard','core');// other wordpress news box
	}
}
/*----------------------------------------------------------------------*/


/* Remove some menus froms the admin area*/
if( !function_exists('delete_menu_items'))  {
	function delete_menu_items() {
	
	/*** Remove menu http://codex.wordpress.org/Function_Reference/remove_menu_page 
	syntaxe : remove_menu_page( $menu_slug )	**/
	//remove_menu_page('index.php');// Dashboard
	//remove_menu_page('edit.php');// Posts
	//remove_menu_page('upload.php');// Media
	//remove_menu_page('link-manager.php');// Links
	//remove_menu_page('edit.php?post_type=page');// Pages
	//remove_menu_page('edit-comments.php');// Comments
	//remove_menu_page('themes.php');// Appearance
	//remove_menu_page('plugins.php');// Plugins
	//remove_menu_page('users.php');// Users
	//remove_menu_page('tools.php');// Tools
	//remove_menu_page('options-general.php');// Settings
	
	
	
	/*** Remove submenu http://codex.wordpress.org/Function_Reference/remove_submenu_page 
	syntaxe : remove_submenu_page( $menu_slug, $submenu_slug ) **/
	//remove_submenu_page( 'edit.php', 'edit-tags.php?taxonomy=post_tag' );// remove tags from edit
	}
}

/*----------------------------------------------------------------------*/


/* remove some meta boxes from pages and posts -------------------------
feel free to comment / uncomment	*/
if( !function_exists('customize_meta_boxes'))  {
	function customize_meta_boxes() {
		/* Removes meta boxes from Posts */
		//remove_meta_box('postcustom','post','normal');// custom fields metabox
		//remove_meta_box('trackbacksdiv','post','normal');// trackbacks metabox 
		//remove_meta_box('commentstatusdiv','post','normal');// comment status metabox 
		//remove_meta_box('commentsdiv','post','normal');// comments	metabox 
		//remove_meta_box('postexcerpt','post','normal');// post excerpts metabox 
		//remove_meta_box('authordiv','post','normal');// author metabox 
		//remove_meta_box('revisionsdiv','post','normal');// revisions	metabox 
		//remove_meta_box('tagsdiv-post_tag','post','normal');// tags
		//remove_meta_box('slugdiv','post','normal');// slug metabox 
		//remove_meta_box('categorydiv','post','normal');// comments metabox
		//remove_meta_box('postimagediv','post','normal');// featured image metabox
		//remove_meta_box('formatdiv','post','normal');// format metabox 
		
		
		/* Removes meta boxes from pages */	
		//remove_meta_box('postcustom','page','normal');// custom fields metabox
		//remove_meta_box('trackbacksdiv','page','normal');// trackbacks metabox
		//remove_meta_box('commentstatusdiv','page','normal');// comment status metabox 
		//remove_meta_box('commentsdiv','page','normal');// comments	metabox 
		//remove_meta_box('authordiv','page','normal');// author metabox 
		//remove_meta_box('revisionsdiv','page','normal');// revisions	metabox 
		//remove_meta_box('postimagediv','page','side');// featured image metabox
		//remove_meta_box('slugdiv','page','normal');// slug metabox 
	 
		
		
		/* remove meta boxes for links **/
		//remove_meta_box('linkcategorydiv','link','normal');
		//remove_meta_box('linkxfndiv','link','normal');
		//remove_meta_box('linkadvanceddiv','link','normal');
	}
}

/*-----------------------------------------------------------------------*/





/** removing parts from column ------------------------------------------*/
/* use the column id, if you need to hide more of them
syntaxe : unset($defaults['columnID']);	*/

/** remove column entries from posts **/
if( !function_exists('custom_post_columns'))  {
	function custom_post_columns($defaults) {
		unset($defaults['comments']);// comments 
		unset($defaults['author']);// authors
		unset($defaults['tags']);// tag 
		//unset($defaults['date']);// date
		//unset($defaults['categories']);// categories	
		return $defaults;
	}
}

/** remove column entries from pages **/
if( !function_exists('custom_pages_columns'))  {
	function custom_pages_columns($defaults) {
		unset($defaults['comments']);// comments 
		unset($defaults['author']);// authors
		unset($defaults['date']);	// date 
		return $defaults;
	}
}
/*-----------------------------------------------------------------------**/


/** remove widgets from the widget page ------------------------------------*/
/* Credits : http://wpmu.org/how-to-remove-default-wordpress-widgets-and-clean-up-your-widgets-page/ 
uncomment what you want to remove	*/
if( !function_exists('unregister_default_widgets'))  {
	 function unregister_default_widgets() {
		// unregister_widget('WP_Widget_Pages');
		// unregister_widget('WP_Widget_Calendar');
		// unregister_widget('WP_Widget_Archives');
		// unregister_widget('WP_Widget_Links');
		// unregister_widget('WP_Widget_Meta');
		// unregister_widget('WP_Widget_Search');
		// unregister_widget('WP_Widget_Text');
		// unregister_widget('WP_Widget_Categories');
		// unregister_widget('WP_Widget_Recent_Posts');
		// unregister_widget('WP_Widget_Recent_Comments');
		// unregister_widget('WP_Widget_RSS');
		// unregister_widget('WP_Widget_Tag_Cloud');
		//unregister_widget('WP_Nav_Menu_Widget');
		//unregister_widget('Twenty_Eleven_Ephemera_Widget');
	 }
}

/****** removings items froms admin bars 
use the last part of the ID after "wp-admin-bar-" to add some menu to the list	exemple for comments : id="wp-admin-bar-comments" so the id to use is "comments"	***********/
if( !function_exists('wce_admin_bar_render'))  {
	function wce_admin_bar_render() {
	global $wp_admin_bar;
		// $wp_admin_bar->remove_menu('comments'); //remove comments
		$wp_admin_bar->remove_menu('wp-logo'); //remove the whole wordpress logo, help etc part
		
	}
}
/*-----------------------------------------------------------------------**/




/**	Other usefull cleanups from selfish fresh start plugin http://wordpress.org/extend/plugins/selfish-fresh-start/ --------------------*/

// remove update notifications for everybody except admin users
if( !function_exists('rynonuke_update_notification_nonadmins'))  {
	function rynonuke_update_notification_nonadmins() {
		if (!current_user_can('administrator')) 
		remove_action('admin_notices','update_nag',3);
	}
}

// disable self-trackbacking
if( !function_exists('rynonuke_self_pings'))  {
	function rynonuke_self_pings( &$links ) {
		foreach ( $links as $l => $link )
			if ( 0 === strpos( $link, home_url() ) )
				unset($links[$l]);
	}
}

// adios dolly : remove the hello dolly plugin
if( !function_exists('rynonuke_dolly'))  {
	function rynonuke_dolly() {
		if (is_admin() && file_exists(WP_PLUGIN_DIR.'/hello.php'))
		@unlink(WP_PLUGIN_DIR.'/hello.php');
	}
}
/*----------------------------------------------------------------------- **/



/** WordPress user profil cleanups	------------------------------------*/
	
/* remove the color scheme options */
if( !function_exists('admin_color_scheme'))  {
		function admin_color_scheme() {
		global $_wp_admin_css_colors;
		$_wp_admin_css_colors = 0;
	}
}

// add_action('admin_head', 'admin_color_scheme');

// rem/add user profile fields
if( !function_exists('rynonuke_contactmethods'))  {
	function rynonuke_contactmethods($contactmethods) {
		unset($contactmethods['yim']);
		unset($contactmethods['aim']);
		unset($contactmethods['jabber']);
		$contactmethods['rynonuke_twitter']='Twitter';
		$contactmethods['rynonuke_facebook']='Facebook';
		return $contactmethods;
	}
}

/*----------------------------------------------------------------------- **/


/** Remove l1on script---------------------------------------------------------
 * /!\ beware this script is used by many plugins for javascript translation ------------ */
if( !function_exists('wce_remove_l1on'))  {
	function wce_remove_l1on() {
		if ( !is_admin() ) {
			wp_deregister_script('l10n');
		}
	}
}
	
/** Custom admin login header link	------------------------------------*/
/* Make admin link point to the home of the site	*/
if( !function_exists('custom_login_url'))  {
	function custom_login_url() {
		return home_url( '/' );
	}
}

/** Custom admin login header link alt text	------------------------------------*/
if( !function_exists('custom_login_title'))  {
	function custom_login_title() {
		return get_option( 'blogname' );
	}
}

/*----------------------------------------------------------------------- **/

?>
