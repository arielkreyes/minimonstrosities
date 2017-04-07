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
 $wp_admin_bar->remove_node('wp-admin-bar-wp-logo');
 //add our own 'help' Button
 $wp_admin_bar->add_node( array(
   'id'  =>  'monster23-help-menu',
   'title' =>  'Contact Ariel', 
   'href'  =>  'http://melissacabral.com',
   'meta'  =>  array( 'target' =>  '_blank'),//open into new tab
 ));
}
add_action( 'admin_bar_menu', 'monster23_modify_toolbar', 999);
//TODO: edit the dashboard widgets for ze admin stuffs
//TODO: Edit the user interface for ze contributors :) (mom and peoples) :)
