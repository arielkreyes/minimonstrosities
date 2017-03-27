<?php
//turn on sleeping features

//adding a logo to the theme. 'custom_logo()'
add_theme_support( 'custom-logo', array(
  'width'   =>  319,
  'height'  =>  140,
));
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
    'utility_menu' => 'User Menu'
  ));
}
add_action( 'init', 'monster23_menus');
