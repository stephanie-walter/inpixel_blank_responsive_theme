<?php
/********************  custom post type ************************/     
/** We are going to create a custom post type for **** !!! **/
add_action( 'init', 'add_cpt' );
function add_cpt() {
  $labels = array(
    'name' => __('Name', 'themename'),
    'singular_name' => __('Name', 'themename'),
    'add_new' => __('Add a ... ', 'themename'),
    'add_new_item' => __('Add a new ... ', 'themename'),
    'edit_item' => __('Edit the ... ', 'themename'),
    'new_item' => __('New ', 'themename'),
    'view_item' => __('See the', 'themename'),
    'search_items' => __('Find a ... ', 'themename'),
    'not_found' =>  __('No ... found', 'themename'),
    'not_found_in_trash' => __('No ... found in trash', 'themename'),
    'parent_item_colon' => ''
  );

  $supports = array('title', 'page-attributes', 'editor', 'thumbnail' );

  register_post_type( 'nom',
    array(
      'labels' => $labels,
      'description' => ' description goes here',
      'public' => true,
      'supports' => $supports,
      'capability_type' => 'page',
      //'rewrite' => array( 'slug' => 'nom ', 
      //'hierarchical'=> true ),      
      //'exclude_from_search' => true,
      'has_archive' => true,
               
    )
  );
}


//create taxonomy type
add_action( 'init', 'create_type_taxonomies', 0 );
function create_type_taxonomies() 
{
  // Add new taxonomy, make it hierarchical (like categories)
  $labels = array(
    'name' => _x( 'Name  ', 'taxonomy general name' ),
    'singular_name' => _x( 'Name ', 'taxonomy singular name' , 'themename'),
    'search_items' =>  __( 'Search item  ' , 'themename'),
    'all_items' => __( ' All items  ', 'themename' ),
    'parent_item' => __( 'Parent item ', 'themename' ),
    'parent_item_colon' => __( 'Parent item colon ' , 'themename'),
    'edit_item' => __( 'Edit item ' , 'themename'), 
    'update_item' => __( 'Update item', 'themename' ),
    'add_new_item' => __( 'Add new item' , 'themename'),
    'new_item_name' => __( 'New item name', 'themename' ),
    'menu_name' => __( 'Menu name', 'themename' ),
  ); 	

  register_taxonomy('type',array('nom'), 
	array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_tagcloud' => false,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'type'),
  ));
  
 }
/*----------------------------------------------------------------------- **/



?>
