<?php
//turn on sleeping features

//adding support for a featured image 
add_theme_support('post-thumbnails');

//adding a logo to the theme. 'custom_logo()'
add_theme_support( 'custom-logo', array(
  'width'   =>  319,
  'height'  =>  140,
));

//adding a customizable header image *don't forget to show it in the header.php file :)
add_theme_support('custom-header', array(
  'width' =>  960,
  'height'  =>  700,
  'flex-width'  =>  true,
  'flex-height' => true,
));

//adding a customizable Background 
add_theme_support('custom-background');

//creates a post format for the gallery and its images
add_theme_support('post-formats', array('image', 'video'));

//improving RSS Fed Links. *required since a blog is utilized
add_theme_support('automatic-feed-links');

//improve title tag for SEO(feeds google :D) and inserts using the wp_head(); & *remember to remove the <title> from header.php
add_theme_support('title-tag');

//improve the markup of Wordpress generated code
add_theme_support('html5', array('search-form', 'comment-list', 'comment-form', 'gallery', 'caption',));


/**
  *Create two menu locations. Display them with wp_nav_menu() in your templates
*/
function monster23_menus(){
  register_nav_menus( array(
    'main_menu' => 'Main Navigation',
    'utility_menu' => 'Utility Menu',
  ));
}
add_action( 'init', 'monster23_menus');

/*
 *==REGISTER WIDGET AREAS(Dynamic Sidebars)
 * Call dynamic_sidebar() in ze templates to display them :)
 */
 function monster23_widget_areas(){
   register_sidebar( array(
     'name' => 'Blog Sidebar',
     'id' => 'blog-sidebar',
     'description'  =>  'Appears next to blog and archive pages',
     'before_widget'  =>  '<section id="%S1s" class="widget %2$s"',
     'after_widge'  =>  '</section',
     'before_title' =>  '<h3 class="widgettitle">',
     'after_title'  =>  '</h3>',
     'after_widget' =>  '</section>',
   ));
   register_sidebar( array(
     'name' => 'Event Sidebar',
     'id' => 'event-sidebar',
     'description'  =>  'Appears next to events and important dates pages',
     'before_widget'  =>  '<section id="%S1s" class="widget %2$s"',
     'after_widge'  =>  '</section',
     'before_title' =>  '<h3 class="widgettitle">',
     'after_title'  =>  '</h3>',
     'after_widget' =>  '</section>',
   ));
 }//end of function aka_widget_areas
 add_action('widgets_init', 'monster23_widget_areas');
