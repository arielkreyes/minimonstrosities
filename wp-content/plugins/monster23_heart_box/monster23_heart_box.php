<?php 
/*
 * Plugin Name: Monster23 Heart Box
 * Description: A "like" function similar to social media "likes", but in floating heart form that appears at the end of a single post.
 * Author: Ariel Aguilar
 * Version: 0.1
 * License: GPLv3
 */
 
/*
 *== MARKUP for the Heart Box <3
 */
function heart_box_html(){
?>
  <div class="heart-box">
  <div class="heart"></div>
  </div>
<?php
}//end of function heart_box_html
add_action( 'wp_footer', 'heart_box_html');
 /*
  *== ATTACH the stylesheet, jquery, and my custom javascript file <3
  */
 function heart_box_scripts(){
   //**stylesheet
   $style_url  = plugins_url('heart_box_style.css', __FILE__);
   wp_enqueue_script('heart_box_style-css', $style_url);
   //**load jquery
   wp_enqueue_script('jquery');
   //**custom script
   $script_url   = plugins_url('heart_box_script.js', __FILE__); 
   //tell WP to put it on the page
   wp_enqueue_script('heart_box_script-js', $script_url, array('jquery'), '0.1', true);
 }
 add_action('wp_enqueue_scripts', 'heart_box_scripts');
