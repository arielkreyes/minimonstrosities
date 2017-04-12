<?php 
/*
 * Plugin Name: Monster23 Admin Tweaks
 * Description: Customizes the Login Form, Register form, and Admin Screens
 * Author: Ariel Aguilar
 * Version: 0.1
 * License: GPLv3
 */
 // Save Zis Shit for My Website Yo!
 /**
   * TODO: Must be Logged IN to view the website otherwise register and wait for confirmation code from admin aka ME >:)
   * Style the Login, Register, and Forgot Password Fomrs with an external stylesheet ^_^
   */
   
function monster23_login_style(){
  $style_url  = plugins_url('css/login.css',  __FILE__);
  //put zis on ze page // handle, url
  wp_enqueue_style( 'login_css', $style_url );
}
add_action('login_enqueue_scripts', 'monster23_login_style');

//change the "wordpress.org" link on the logo
function  monster23_login_logo_link(){
  return home_url();
}
add_filter( 'login_headerurl', 'monster23_login_logo_link');

//change the tooltip on the login logo
function monster23_login_logo_title(){
  return 'Go Back To ' .  get_bloginfo( 'name' );
}
add_filter('login_headertitle', monster23_login_logo_title);
function monster23_modify_toolbar($wp_admin_bar){
 //get rid of wordpress logo and its dropdown menu
 $wp_admin_bar->remove_node('wp-logo');
 //add our own 'help' Button
}
add_action( 'admin_bar_menu', 'monster23_modify_toolbar', 999);
/*
 * Remove Unwanted Dashboard Widgets and Add My Own
 */
function monster23_dashboard_widgets(){
  //id of the box, screen located on, column
  //remove widget boxes using parameters above
  remove_meta_box('dashboard_quick_press', 'dashboard', 'side');
  remove_meta_box('dashboard_primary', 'dashboard', 'side');
  //$id, $title, $callback, $screen, $context, $priority, $callback_args
  //add widget boxes here using parameters above
}
add_action('admin_init', 'monster23_dashboard_widgets');






//TODO: Edit the user interface for ze contributors :) (mom and peoples) :)
