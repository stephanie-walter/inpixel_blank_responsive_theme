<?php
  

/*** clean ups and enhancements, uncomment to use */
require_once('functions/wordpress_cleanup.php'); //admin cleanups 
// require_once('functions/custom_post_types.php'); // boiler template for CPT
require_once('functions/script_style_cleanups.php'); // javascript cleanups
// require_once('functions/remove-comments-absolute.php'); //to remove comments completely
require_once ( 'functions/theme-options.php' );


/**
 * Make theme available for translation
 * Translations can be filed in the /languages/ directory
 */
load_theme_textdomain( 'themename', get_template_directory() . '/languages' );

$locale = get_locale();
$locale_file = get_template_directory() . "/languages/$locale.php";
if ( is_readable( $locale_file ) )
	require_once( $locale_file );

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 640;


/**
 * This theme uses wp_nav_menus() for the header menu, utility menu and footer menu.
 */
register_nav_menus( array(
	'primary' => __( 'Primary Menu', 'themename' )
) );



/**
 *	This theme supports editor styles
 */

add_editor_style("/css/editor-style.css");


/**** Add some theme support, uncomment what you need ****/
/** 
 * Add default posts and comments RSS feed links to head
 */
add_theme_support( 'automatic-feed-links' );

/**
 * This theme uses post thumbnails
 */
add_theme_support( 'post-thumbnails' );


/**
 * This enables post formats. If you use this, make sure to delete any that you aren't going to use.
 */
//add_theme_support( 'post-formats', array( 'aside', 'audio', 'image', 'video', 'gallery', 'chat', 'link', 'quote', 'status' ) );


/**
 * Disable the admin bar in 3.1
 */
//show_admin_bar( false );


/**
 * Register widgetized area and update sidebar with default widgets
 */

if( !function_exists('handcraftedwp_widgets_init'))  {

	function handcraftedwp_widgets_init() {
		register_sidebar( array (
			'name' => __( 'Sidebar', 'themename' ),
			'id' => 'sidebar',
			'before_widget' => '<aside id="%1$s" class="widget %2$s" role="complementary">',
			'after_widget' => "</aside>",
			'before_title' => '<h4 class="widget-title">',
			'after_title' => '</h4>',
		) );
		
			// Area 3, located in the footer. Empty by default.
		register_sidebar( array(
			'name' => __( 'Footer', 'themename' ),
			'id' => 'footer-widget-area',
			'description' => __( 'The footer area', 'themename' ),
			'before_widget' => '<aside id="%1$s" class="widget-container %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
		) );
	}

}
add_action( 'init', 'handcraftedwp_widgets_init' );


// This theme uses wp_nav_menu() in one location.
register_nav_menu( 'primary', __( 'Primary Menu', 'themename' ) );





/* Change the lenght of the excerpt */

if( !function_exists('twentyeleven_excerpt_length'))  {

	function twentyeleven_excerpt_length( $length ) {
		return 80;
	}
}

add_filter( 'excerpt_length', 'twentyeleven_excerpt_length' );

/**
 * Returns a "Continue Reading" link for excerpts
 */
 
if( !function_exists('twentyeleven_continue_reading_link'))  {

	function twentyeleven_continue_reading_link() {
		return ' <span class="readmore"><a title="'.get_the_title().'" href="'. esc_url( get_permalink() ) . '"><span class="icon-arrow-right-3" > </span>' . __( 'Continue reading', 'themename' ) . '</a></span>';
	}
}
/**
 * Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis and twentyeleven_continue_reading_link()
 */

if( !function_exists('twentyeleven_auto_excerpt_more'))  {
 
	function twentyeleven_auto_excerpt_more( $more ) {
		return ' &hellip;' . twentyeleven_continue_reading_link();
	}
}

add_filter( 'excerpt_more', 'twentyeleven_auto_excerpt_more' );

/**
 * Adds a pretty "Continue Reading" link to custom post excerpts.
 *
 */
 
if( !function_exists('twentyeleven_custom_excerpt_more'))  {
 
	function twentyeleven_custom_excerpt_more( $output ) {
		if ( has_excerpt() && ! is_attachment() ) {
			$output .= twentyeleven_continue_reading_link();
		}
		return $output;
	}
}
add_filter( 'get_the_excerpt', 'twentyeleven_custom_excerpt_more' );



/**************** Adding some html5 functionnalities to comments************/

add_filter('comment_form_default_fields', 'twentytenfive_comments');
if( !function_exists('twentytenfive_comments'))  {

	function twentytenfive_comments() {

	$req = get_option('require_name_email');

	$fields =  array(
	'author' => '<p>' . '<label for="author">' . __( 'Name','themename' ) . '</label> ' . ( $req ? '<span>*</span>' : '' ) .
	'<input id="author" name="author" type="text" value="' . '" size="30"' . ' placeholder ='.__( '"What shall we call you?"', 'themename' ) . ( $req ? ' required' : '' ) . '/></p>',

	'email'  => '<p><label for="email">' . __( 'Email','themename' ) . '</label> ' . ( $req ? '<span>*</span>' : '' ) .
	'<input id="email" name="email" type="email" value="' .'" size="30"' . ' placeholder ='.__( '"Leave us a valid email adress"', 'themename' ) . ( $req ? ' required' : '' ) . ' /></p>',

	'url'    => '<p><label for="url">' . __( 'Website','themename' ) . '</label>' .
	'<input id="url" name="url" type="url" value="' . '" size="30" placeholder='.__( '"Have you got a nice website ?"', 'themename' ) . '/></p>'

	);
	return $fields;
	}
}

add_filter('comment_form_field_comment', 'twentytenfive_commentfield');
if( !function_exists('twentytenfive_commentfield'))  {

	function twentytenfive_commentfield() {
	$commentArea = '<p><label for="comment">' . __( 'Comment', 'themename') . '</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" required placeholder ='.__( '"What\'s in your mind ?"', 'themename').'  ></textarea></p>';
	return $commentArea;
	}
}

/** Adding html5 functionnalities to searchform ***/
if( !function_exists('html5_search_form'))  {
	function html5_search_form( $form ) {
		$form = '<form role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" >
		<p><label class="screen-reader-text" for="s">' . __('Search for:','themename') . '</label>
		<input type="search" value="' . get_search_query() . '" name="s" id="s"  autocomplete="on" placeholder ='.__( '"What are you looking for?"', 'themename' ) . ' />
		<input type="submit" id="searchsubmit" value="'. esc_attr__('Search') .'" />
		</p>
		</form>';
		return $form;
	}
}

add_filter( 'get_search_form', 'html5_search_form' );


/** we need a second form not to duplicate ids on the search result page when there is no results */
if( !function_exists('get_search_form_HTML5_bis'))  {
	function get_search_form_HTML5_bis() {
		echo '<form role="search" method="get" id="searchform_bis" action="' . home_url( '/' ) . '" >
		<p><label class="screen-reader-text" for="s2">' . __('Search for:','themename') . '</label>
		<input type="search" value="' . get_search_query() . '" name="s" id="s2"  autocomplete="on" placeholder ='.__( '"What are you looking for?"', 'themename' ) . ' />
		<input type="submit" id="searchsubmit_bis" value="'. esc_attr__('Search','themename') .'" />
		</p>
		</form>';
	}
}


/*** Add a login stylesheet and a wordpress specifiq stylesheet------------
Special thanks to Valentin Brandt :  
http://www.geekeries.fr/snippet/personnaliser-interface-ui-wordpress-3-2/ 
comment code if not needed -----------*/

if( !function_exists('gk_ui_wp32_login'))  {
	function gk_ui_wp32_login() {
		echo '<link rel="stylesheet" type="text/css" href="'.get_bloginfo('template_directory') . '/css/custom_login.css"/>';
	}
}

if( !function_exists('gk_ui_wp32_admin'))  {
	function gk_ui_wp32_admin() {
		wp_enqueue_style( 'admin', get_bloginfo('template_directory') . '/css/custom_admin.css');
	}
}

add_action('login_head', 'gk_ui_wp32_login');
add_action('admin_enqueue_scripts', 'gk_ui_wp32_admin');


/*----------------------------------------------------------------------- **/

/*  please don't but if you need to remove width/height on template use this */
/* add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10 );
if( !function_exists('function remove_thumbnail_dimensions'))  {
	function remove_thumbnail_dimensions( $html ) {
		$html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
		return $html;
	} 
}*/



 // asynchronous google analytics: mathiasbynens.be/notes/async-analytics-snippet
//	 change the UA-XXXXX-X to be your site's ID
/*add_action('wp_head', 'async_google_analytics');
if( !function_exists('async_google_analytics'))  {
	function async_google_analytics() { ?>
		<script>
		var _gaq = [['_setAccount', 'UA-XXXXX-X'], ['_trackPageview']];
			(function(d, t) {
				var g = d.createElement(t),
					s = d.getElementsByTagName(t)[0];
				g.async = true;
				g.src = ('https:' == location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
				s.parentNode.insertBefore(g, s);
			})(document, 'script');
		</script>
	<?php }
}*/ 

?>
