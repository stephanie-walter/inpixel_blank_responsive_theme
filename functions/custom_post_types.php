<?php


/********************  custom post type ************************/     
/** We are going to create a custom post type for **** !!! **/
add_action( 'init', 'ajouter_CPT' );
function ajouter_CPT() {
  $labels = array(
    'name' => _('Nom', 'themename'),
    'singular_name' => _('Nom', 'themename'),
    'add_new' => _('Ajouter un ', 'themename'),
    'add_new_item' => __('Ajouter un nouveau ', 'themename'),
    'edit_item' => __('Editer le ', 'themename'),
    'new_item' => __('Nouveau ', 'themename'),
    'view_item' => __('Voir le ', 'themename'),
    'search_items' => __('Rechercher un ', 'themename'),
    'not_found' =>  __('Aucun de trouv&eacute', 'themename'),
    'not_found_in_trash' => __('Aucun  de trouv&eacute dans la poubelle', 'themename'),
    'parent_item_colon' => ''
  );

  $supports = array('title', 'page-attributes', 'editor', 'thumbnail' );

  register_post_type( 'nom',
    array(
      'labels' => $labels,
      'description' => 'Cr&eacuteer et ajouter des produits, et les classer en utilisant les types de produits',
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
    'name' => _x( 'Types de  ', 'taxonomy general name' ),
    'singular_name' => _x( 'Type de  ', 'taxonomy singular name' , 'themename'),
    'search_items' =>  __( 'Chercher un type de  ' , 'themename'),
    'all_items' => __( 'Tous les types de  ', 'themename' ),
    'parent_item' => __( 'Parent du type de ', 'themename' ),
    'parent_item_colon' => __( 'Parent type:' , 'themename'),
    'edit_item' => __( 'Editer le type' , 'themename'), 
    'update_item' => __( 'Mettre &agrev; jour le type', 'themename' ),
    'add_new_item' => __( 'Ajouter un nouveau type' , 'themename'),
    'new_item_name' => __( 'Nom du nouveau type', 'themename' ),
    'menu_name' => __( 'Type de  ' ),
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
