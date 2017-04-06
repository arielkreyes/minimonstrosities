<?php
 /*
 * Plugin Name: Monster23 Gallery Image Post Type
 * Description: Registers the post type and taxonomies for the Gallery
 * Author: Ariel Reyes
 * Version: 0.1
 * Liscense: GPLv3
 */
 //*==Register the post type
 add_action('init', 'monster23_create_post_type');
 function monster23_create_post_type(){
   register_post_type( 'gallery', array(
     'labels'  => array(
        'name' =>  __('Gallery Images'),
        'singular_name'  =>  __('Gallery Image'),
        'add_new_item' =>  'Add New Image',
        'not_found' =>  'No Images Found',
        'search_images' =>  'Search Images'
        ),
      'public'  => true,
      'has_archive' => true,
      'menu_icon' =>  'dashicons-format-gallery',
      'menu_position' =>  10,
      'rewrite' =>  array('slug' => 'Gallery'),
      'supports'  =>  array( 'title', 'custom-fields', 'revisions', 'comments'),
   ));
   //attach 'uploaded date' taxonomy to gallery Images
   register_taxonomy('datetaken', 'gallery', array(
     'hierarchical' => true,
     'show_ui'  => true,
      
   ));
 } //end of function monster23_create_post_type! <3
 
 /**
  * Flush permalinks(rewrite rules) when this plugin is activated.
  * Prevents 404 errors
  */
function monster23_flush(){
  monster23_create_post_type();
  flush_rewrite_rules();
}
register_activation_hook(__FILE__, 'monster23_flush');
