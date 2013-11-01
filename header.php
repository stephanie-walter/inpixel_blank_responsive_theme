<!DOCTYPE html>
<!--[if lt IE 7 ]> <html <?php language_attributes(); ?> class="lteie9 lteie8 lteie7 lteie6 ie6 no-js"> <![endif]-->
<!--[if IE 7 ]>    <html <?php language_attributes(); ?> class="lteie9 lteie8 lteie7 ie7 no-js"> <![endif]-->
<!--[if IE 8 ]>    <html <?php language_attributes(); ?> class="lteie9 lteie8 ie8 no-js"> <![endif]-->
<!--[if IE 9 ]>    <html <?php language_attributes(); ?> class="lteie9 ie9 no-js"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'themename' ), max( $paged, $page ) );

	?></title>
	
	<!--  Mobile Viewport Fix -->
	<meta name="viewport" content="initial-scale=1.0">
    
	<!-- Place favicon.ico and apple-touch-icon.png in the images folder -->
	<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico">
	<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/images/apple-touch-icon.png"><!--60X60-->
	
	<link rel="profile" href="http://gmpg.org/xfn/11">
	
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css" media="screen, projection">
	
	<?php // Use this url to get your personnal build http://www.modernizr.com/download/ ?>
	<script src="<?php echo get_template_directory_uri(); ?>/js/modernizr.custom.js"></script>

	<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	
	<!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
	
	<?php wp_head(); ?>
	
	</head>

<body <?php body_class(); ?> >
	<div class="hfeed container">
		<header role="banner">
			<hgroup>
					<h1 class="site-title"><span><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></span></h1>
					<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
				</hgroup>

	
			
			<nav class="main-menu" id="menu" role="navigation">
				<h3 class="assistive-text"><?php _e( 'Main menu', 'themename' ); ?></h3>			
				
				<div class="skip-link"><a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to primary content', 'themename' ); ?>"><?php _e( 'Skip to primary content', 'themename' ); ?></a>
				</div>

				<?php   
					// wp_nav_menu( array( 'container_class' => 'menu main-navigation', 'theme_location' => 'primary','walker' => new Has_Subnav_Walker() ) );  
					wp_nav_menu( array( 'container_class' => 'menu', 'theme_location' => 'primary' ) );
					?>
			</nav>

		</header>

		<div class="line gut">

			<?php 
			//  If it's not a page (= a blog post, archive, etc) we display the sidebar on the right side 
			if (!(is_page())){?>
			<section id="content" role="region" class="content mod left w70">
			<?php } 
			

